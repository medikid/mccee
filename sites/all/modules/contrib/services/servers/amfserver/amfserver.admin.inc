<?php
/**
 * @file
 * admin related resources are defined in this file, as defined in hook_menu() for this module
 */




/**
* The main page configuration settings for the amfserver
*/
function amfserver_configuration_settings() {
  $output = "<p>";
  $output = t("visit the help page for more information about the amfserver:") . " " . l(t("amfserver help"), AMFSERVER_PATH_HELP);
  $output .= "<br />";
  $output .= t("for configuring the endpoint(s) of the amfserver visit the") . " " . l(t("services configuration"), AMFSERVER_SERVICES_CONFIGURATION);
  $output .= "<br />";
  $output .= t("for configuring the classmapping(s) of the amfserver visit the") . " " . l(t("amfserver classmapping"), AMFSERVER_PATH_ADMIN_CLASSMAPPING);
  $output .= "<br />";
  $output .= t("for configuring the permissions of the amfserver visit the") . " " . l(t("amfserver permissions"), AMFSERVER_PATH_PERMISSIONS);
  return $output;
}


/**
 * the classmapping page
 * @return the output for the whole classmapping page
 */
function amfserver_configuration_classmapping() {
  $output = '';
  $output .= t("Classmapping can be configured here. 
  Classmapping means you can create a mapping between a php class and an actionscript class for automatic conversion of a domain object on one side to a domain object on the other side.");
  $output .= "<br />";
  $output .= "<br />";
  $output .= t("Classmappings can be used in your custom made service module, 
  so you can have strong typing and use classes both for the php side and the actionscript side of your application, 
  without having to write code to do the conversion of flash data to php data and vice versa. You can use the data sent from flash as a native php object and vice versa.");
  $output .= "<br />";
  $output .= "<br />";
  $output .= t("See the actionscript demo code in the class org.drupal.amfserver.DrupalAmfServer (included in the module) and in the drupal module file amfserver.resources.inc to see how it can be implemented in your own module.");
  $output .= "<br />";
  $output .= t("In essence you will have to mirror your php and actionscript classes' public properties 
  and use the flash.net.registerClassAlias function in actionscript to map the object that is coming in from php to a Class in actionscript via the tag/alias that has been sent from php."); 
  $output .= "<br />";
  $output .= t("The php code (our custom service module in this case) will have a similar mapping that maps the 'org.drupal.amfserver.User' tag/alias to a php class.
  In the form presented below you can add the php mapping. When a mapping is defined via this form, each time you send a php object to flash via the services it will automatically be tagged with the as3 mapping");
  $output .= "<br />";
  $output .= "<br />";
  $output .= t("In the example actionscript code you have the actionscript mapping in this line of code:");
  $output .= "<br />";
  $output .= t("<code>registerClassAlias('org.drupal.amfserver.User', User);</code>");
  $output .= "<br />";
  $output .= t("Each time a php object is sent from php with the tag/alias 'org.drupal.amfserver.User', 
  that object will automatically be mapped by flash to an instance of the User class (defined in the actionscript example with the same public properties as the php class).");
  $output .= t("<br />");
  $output .= t("Each time you will create a User object on the actionscript client and send the whole object via amf to the server, 
  it will be tagged with the 'org.drupal.amfserver.User' alias and can be mapped to the php class by mapping the tag/alias to a php class.
  In this example we have used the php class 'AmfServerUser'.");
  $output .= "<br />";
  $output .= "<br />";
  $output .= t("The classmapping can be defined in php by using the form below and setting the name of the actionscript alias/tag and the name of the php class you are using.");
  $output .= "<br />";
  $output .= t("The classmapping can be defined in flash/air with the registerClassAlias('org.drupal.amfserver.User', User) function in the class that's using the object.");
  $output .= "<br />";
  $output .= t("The classmapping can be defined in flex with the [Bindable] and [RemoteClass(alias='org.drupal.amfserver.User')] metatags just before the class definition of the as3 class ('public class User' in our example).");
  $output .= "<br />";
  $output .= "<br />";
  $output .= t("The default classmapping presented on installation of the module is for the demo service and testsuite included with the amfserver module");
  $output .= "<br />";
  $output .= "<br />";
  $output .= l(t("Find out more about classmapping in this video"), "http://www.screencast.com/users/wadearnold/folders/Default/media/a1188f2c-997f-436c-ac44-25285e96aec1");
  $output .= "<br />";
  $output .= l(t("Find out more about classmapping in the Zend amf documentation"), "http://framework.zend.com/manual/en/zend.amf.server.html");
  $output .= "<br />";
  $output .= l(t("Find out about registerClassAlias in the adobe documentation"), "http://help.adobe.com/en_US/FlashPlatform/reference/actionscript/3/flash/net/package.html#registerClassAlias()");
  $output .= drupal_render(drupal_get_form('amfserver_classmapping'));
  $output .= drupal_render(drupal_get_form('amfserver_existing_classmapping'));
  return $output;
}

/**
 * The form for storing a classmapping
 * @return a form array
 */
function amfserver_classmapping($form, &$form_state) {
  $form['mapping'] = array(
    "#type" => 'fieldset',
    "#description" => t("Add a new classmapping")
  );
  $form['mapping']['amfserver_class_php'] = array(
    '#title' => t("php class to map"),
    '#type' => 'textfield',
    '#description' => t("enter the (case sensitive) name of the php class in your service module"),
  );
  $form['mapping']['amfserver_class_as3'] = array(
    '#title' => t("as3 class to map"),
    '#type' => 'textfield',
    '#description' => t("enter the (case sensitive) name of the as3 class alias in your actionscript client."),
  );
  $form['mapping']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('add classmapping')
  );
  return $form;
}

/**
 * The form for removing a classmapping
 * @return a form array
 */function amfserver_existing_classmapping($form, &$form_state) {
  $form['existing_mapping'] = array(
    "#type" => 'fieldset',
    "#description" => t("Remove an existing classmapping")
    );
  $options = array();
  $mappings = db_query('SELECT id, class_php, class_as3 FROM {amfserver_classmapping}');
  foreach ($mappings as $mapping) {
     $options[$mapping->id] = 'php: ' . $mapping->class_php . ' - as3: ' . $mapping->class_as3;
  }

    
  $form['existing_mapping']['mappings'] = array(
    '#type' => 'checkboxes', 
    '#title' => t('existing mappings'), 
    '#description' => t('check the checkboxes for the mappings you wish to remove'),
    '#options' => $options,
  );
 
  $form['existing_mapping']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('remove a classmapping')
  );
  
  return $form;
}


/**
 * The submit handler for removing a classmapping
 */
function amfserver_existing_classmapping_submit($form, &$form_state) {
  $mappings = db_query('SELECT id, class_php, class_as3 FROM {amfserver_classmapping}');
  foreach ($mappings as $mapping) {
    $id = $form_state['values']['mappings'][$mapping->id];
    if ($id != 0) {
      db_delete('amfserver_classmapping')->condition('id', $id)->execute();
      drupal_set_message(check_plain(t("removed mapping:") . " " . 'php: ' . ($mapping->class_php) . ' - as3: ' . ($mapping->class_as3)));
    }
  }
}


/**
 * The submit handler for adding a classmapping
 */
function amfserver_classmapping_submit($form, &$form_state) {
  global $user;
  $nid = db_insert('amfserver_classmapping')->fields(array(
    'class_php' => trim($form_state['values']['amfserver_class_php']),
    'class_as3' => trim($form_state['values']['amfserver_class_as3']),
  ))->execute();
  drupal_set_message(t("@name, your classmapping has been stored (for all endpoints).", array("@name" => $user->name)));
}


/**
 * The validation handler for saving a classmapping
 */
function amfserver_classmapping_validate($form, &$form_state) {
  if ($form_state['values']['amfserver_class_php'] == "") {
    form_set_error('amfserver_class_php', t("fill in the name of the php class please"));
  }
  if ($form_state['values']['amfserver_class_as3'] == "") {
    form_set_error('amfserver_class_as3', t("fill in the name of the fully qualified as3 class"));
  }
}



