<?php
/**
 * @file
 * This file holds some resources/classes that are used by the module.
 * 
 * 
 */

//required files
require_once 'Zend/Amf/Server.php';
require_once 'Zend/Amf/Auth/Abstract.php';
require_once 'Zend/Amf/Server/Exception.php';
require_once 'Zend/Amf/Value/Messaging/ErrorMessage.php';
require_once 'Zend/Amf/Value/MessageHeader.php';
require_once 'Zend/Amf/Request/Http.php';


 /**
 * subclass of Zend_Amf_Server to provide the functionality to handle all requests from a client without making use of service classes to hand the request to.
 * Since ZendAmf handles calls by loading a class (that has been set on it) and calling a method on it, and drupal uses procedural methods, 
 * we have to find a workaround. the workaround is implemented here.
 */
class AmfServerServer extends Zend_Amf_Server{
  
  /**
  * overriden method from the Zend_Amf_Server
  * By overriding this method, we can route the incoming calls to the proxy class that handles the actual work
  * of looking up the resources.
  */
  protected function _dispatch($method, $params = NULL, $source = NULL) {
    //recreate the source.method pair as the first argument
    $resource = $source . '.' . $method;
    array_unshift($params, $resource);
    //route the request to the AmfServerServiceProxy so it can do it's magic
    return parent::_dispatch('execute', $params, 'AmfServerServiceProxy');
  }
  
  /**
  * override this so we can at least get a description of what went wrong on a production server.
  * in the zend implementation, nothing is returned to the user, but you'd like to at least know what went wrong.
  * minor adjustment.
  */ 
  protected function _errorMessage($objectEncoding, $message, $description, $detail, $code, $line) {
    $return = NULL;
    switch ($objectEncoding) {
      case Zend_Amf_Constants::AMF0_OBJECT_ENCODING :
        return array(
        'description' => $description,
        'detail' => ($this->isProduction()) ? '' : $detail,
        'line' => ($this->isProduction()) ? 0 : $line,
        'code' => $code
        );
      case Zend_Amf_Constants::AMF3_OBJECT_ENCODING :
        $return = new Zend_Amf_Value_Messaging_ErrorMessage($message);
        $return->faultString = $description;
        $return->faultCode = $code;
        $return->faultDetail = $this->isProduction () ? '' : $detail;
      break;
    }
    return $return;
  }
}

/**
 * AmfServerServiceProxy is a proxy class to forward requests to the right resource
 */
class AmfServerServiceProxy {
  //holds the endpoint reference of this amfserver
  public static $endpoint;
  //holds a reference to the AmfServerServer
  public static $server;
 
  function execute() {
    $arguments = func_get_args();
    $function = array_shift($arguments);
    try{
     $controller = services_controller_get($function, self::$endpoint->name);
     if ($controller == NULL) {
     //the resource is not found, so stop execution and inform user (reason: resource not defined on endpoint)
      throw new Zend_Amf_Server_Exception(t('requested resource not found:') . ' "' . $function . '". ' . t("Is this resource enabled via the amfserver endpoint?"));
     }
    
    //check if we can use a session and function with the logged in user's permission
    $succes = $this->use_session();
    
    //next, we sanitize the arguments (see issue: http://drupal.org/node/1124960 in essence, this should be handled by services itself...)
    //check required arguments and set defaults for optional arguments
    $number_of_passed_arguments = count($arguments);
    //check the 'args', some services resources do not provide this (notably system.connect)
    if(!isset($controller['args']) || !is_array($controller['args'])){
      $controller['args'] = array();
    }
    $number_of_potential_arguments = count($controller['args']); 
    
    //check for too many arguments
    if ($number_of_passed_arguments > $number_of_potential_arguments) {
      throw new Zend_Amf_Server_Exception(t('Too many arguments supplied, expected a maximum of @expected but got @got', array(
        '@got' => $number_of_passed_arguments , '@expected' => $number_of_potential_arguments)), 400);
    }
    
    //loop through the arguments definitions for the callback to check for required arguments and set default values for optional arguments
    $number_of_required_arguments = 0;
    //we need to parse the arguments into a format that keeps the original (associative or indexed only): http://drupal.org/node/1218070 thanks to g10 for a fix.
    $parsed_arguments = array();
    $i = 0;
    foreach ($controller['args'] as $key => $value) {
      if (isset($value['optional']) && $value['optional'] == FALSE) {
        $number_of_required_arguments++;
      }
      else {
        //check and set default values for optional arguments
        if (isset($value['default value'])) {
          //if not set, create a default value
          if (!isset($arguments[$i])) {
            $arguments[$i] = $value['default value'];
          }
        }
      } 
      
      //keep the format of the original array (named or indexed) with the right values
      $parsed_arguments[$key]  = $arguments[$i];
      
       if (isset($value['type']) && $value['type'] == 'array' ) {
           $parsed_arguments[$key]  = (array)$arguments[$i];
       }
      	++$i;
    }
    
    //check for too few arguments
    if ($number_of_required_arguments > $number_of_passed_arguments) {
      throw new Zend_Amf_Server_Exception(t('Too few arguments supplied, expected a minimum of @expected required arguments but got only @got', array(
        '@got' => $number_of_passed_arguments , '@expected' => $number_of_required_arguments)), 400);
    }
    
    
     $options = array();
     //call the controller with the correctly parsed arguments
     $data = services_controller_execute($controller, $parsed_arguments, $options);
     return $data;
    } catch (Exception $e) {
     //convert it to the right type of exception to let zendamf handle it.
     throw new Zend_Amf_Server_Exception($e->getMessage());
    }
  }   
  

  
  /**
   * can we use a session?
   * this is for cookie disabled clients like the standalone flash player, air applications and the flash and flex authoring tool
   * read the comments, an actionscript client implementation needs custom amf headers for this to work
   * 
   * clients that run in the browser and can use cookies, will use the normal session authentication of drupal
   */
  function use_session() {
    /*
     sessions are no longer used in services as parameters coming in from the remote call like in D6
     instead sessions are handled via the normal mechanism: cookies
     If this is a standalone actionscript client (flash player, flash authoring tool, air application etc.) cookies cannot be sent.
     this can only be done via the browser the flash player runs in.
     we need the session to be able to log in as a certain user and stay logged in (with the permissions from the logged in user) during consecutive calls.
     
     in D6, key authentication and session authentication was part of the method signature to the amfphp implementation.
     here, in the amfserver for D7, we will do it another way.
     NO authentication or session data will come in except via the amf headers (see actionscript Netconnection.addHeader), 
     keeping all method calls extremely clean. Actionscript libraries should handle this for the user.

     in case of session authentication, which is part of the normal drupal flow, this can also be handled by the amf headers we sent, baked into the actionscript library
     in this way, there will not be a need to alter the arguments we send via the amf body as in D6 and have a cleaner solution
     
     we want to be able to check if we have either a session and logged in user in place,
     if not, we possibly have a standalone flash client and we have to fake this via the amfheaders.
     these amf headers have to be passed via actionscript clients in the way used below if they want to function independently
     
     the header name should be 'amfserver' and it should have an object with 'sessid' and 'session_name' in it, which you get from a call to user.login
     example: netconnection.addHeader("amfserver", false, {sessid: "blablabla", session_name: "yadayadayada"})
     */
     
     
     //if we are not able to use normal session authentication...
     if (!$this->is_using_session()) {
       //we check if amfheaders are used by cookie disabled clients
       
       //get the current request from the amfserver
       $request = self::$server->getRequest();
       //get the headers from the request
       $headers = $request->getAmfHeaders();
       
       //it's an array, loop through it
       foreach ($headers as $header => $value) {
             //throw new Zend_Amf_Server_Exception('headers exists, key: '. $header . ', name: ' . $value->name);
           
           //if we have a header called amfserver, we know it is specifically sent from the actionscript client
           if ($value->name == 'amfserver') {
            
             //we check for sessid and session_name (these will originally have come from a call to system.connect and user.login)
             //and have to be set by the actionscript client
             $sessid = $value->data->sessid;
             $session_name =  $value->data->session_name;
            
             /*
              no need to load a session if we do system.connect or user.login or if there is no sessionid provided.
              in case of no sessionid passed from the actionscript client, we can be:
               - not logged in
               - having an actionscript client that doesnt care to write the code for standalone applications (in other words, no actionscript framework with drupal capabilities used)
               - having a functional cookie and have a normal session via drupal bootstrap in which case we won't be in this if statement
              * 
              * it's not really necessary to check for which method we call, but it saves some work for those calls
              */
               if ($sessid != '' && $sessid != NULL && $function != 'user.login' && $function != "system.connect") {
               //load a session that belongs to this sessionid. it will populate the global $user object from drupal if the sessid exists and we will be able to operate with that user's permissions from here on
               $this->load_session($sessid);
               //throw new Zend_Amf_Server_Exception(t ('session_name  ') . $value->data->session_name . ' = ' . t ('sessionid  ') . $value->data->sessid);
               return TRUE;
             }
           }
         }
         //we did not break out of the foreach. therefore it did not work and we don't have a session and we don't have amfheaders set. probably just not logged in yet.
         return FALSE;
     } 
     else {
      //we are able to use normal session authentication, so bypass all amf header arguments that could be sent from the client to recreate the session for cookie disabled clients
      //we'll have session capabilities associated to the user account belonging to the session
      return TRUE;
     }
     
  }


  /**
   * check if we have a cookie set with the current session name. if not, maybe the client cannot send cookies, or we are not logged in and don't have a cookie set.
   */
  function is_using_session() {
    //this is a way of checking if we have a session
    return isset($_COOKIE[ session_name()]);
  }

    
  /**
   * loads the session data in the $user object when the $sessid is correct
   * some low level drupal stuff in here.
   * TODO: expert drupal screening needed
   */
  function load_session($sessid) {
    global $user;
  
    // If user's session is already loaded, just return current user's data
    if ($user->sid == $sessid) {
      return $user;
    }
  
    // Make backup of current user and session data
    $backup = $user;
    $backup->session = session_encode();
  
    // Empty current session data
    $_SESSION = array();
  
    // Load session data
    session_id($sessid);
    
    //hack, originally from the rc-1 of services. set the cookie value so we can trick the drupal session loading mechanism in believing there is a valid cookie
    $_COOKIE[ session_name() ] = $sessid;
    
    //drupal docs say not to call this method directly, but it is _the_ way to create the whole $user object from a sessionId.
    //as of yet, no alternative. get clarification from docs team.
    _drupal_session_read($sessid);
  
    // Check if it really loaded user. If not, then revert automatically.
    if ($user->sid != $sessid) {
      //TODO, is this the right method to call?
      drupal_session_destroy_uid($user->uid);
      return NULL;
    }
  
    // Prevent saving of this impersonation in case of unexpected failure.
    //question remains if this is needed. after this, we don't alter the global $user object anymore
    drupal_save_session(FALSE);
  
    return $backup;
  }
  
  
}



/**
 * test class for classmapping
 * Prefixed to avoid potential future naming conflicts with drupal
 */
class AmfServerUser {
  public $id;
  public $name;
}




/**
 * service method for the amfserver, returns a classmapped object to flash
 * it's a testing method for the amfserver, provided as an implementation example
 * Classmapping is now a configuration setting, so users can implement it in their own modules.
 * this shows how classmapping works: http://www.screencast.com/users/wadearnold/folders/Default/media/a1188f2c-997f-436c-ac44-25285e96aec1
 */
function _amfserver_service_get_user() {
  $user = new AmfServerUser();
  //$user = new stdClass();
  //we can either set _explicitType or use the setClassMap method on the drupal server. setClassMap can be made configurable :)
  //$user ->_explicitType = "org.drupal.amfserver.User";
  $user->id = 1;
  $user->name = "awesome!";
  //we could also have created an instance from the User class defined here
  return $user;
}

/**
 * classmapped from flash to php.
 * service method for the amfserver
 * it's a testing method for the amfserver, provided as an implementation example
 */
function _amfserver_service_send_user($user) {
  //return immediately, it should be the right datatype for flash again (org.drupal.amfserver.Drupal7AmfServer)
  return $user;
}

/**
 * service method for the amfserver
 * it's a testing method for the amfserver, provided as an implementation example
 */
function _amfserver_service_retrieve() {
  return amfserver_get_version();
}

/**
 * service method for the amfserver
 * it's a testing method for the amfserver, provided as an implementation example
 */
function _amfserver_service_sleep($seconds) {
  if ($seconds >= 1 && $seconds <= 10) {
    sleep($seconds);
  }
  return "amfservice says: argument to 'sleep' should be between 1 to 10 , yours was: " . $seconds;
}

/**
 * service method for the amfserver
 * it's a testing method for the amfserver, provided as an implementation example
 */
function _amfserver_service_ping($message = "nothing") {
  return 'hello, you said: "' . $message . '"';
}

/**
 * access callback for the service resources
 */
function _amfserver_service_permission() {
  return TRUE;
}

