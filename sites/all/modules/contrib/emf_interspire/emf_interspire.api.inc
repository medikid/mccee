<?php
// $Id: emf_interspire.api.inc,v 1.1 2010/06/03 14:02:49 bonked Exp $

/**
 * @file
 * Interspire API call wrappers
 *
 * @author Kurt Maet <kurt@coworks.be>
 */

/**
 * Subscribe a user to a list.
 *
 * @param $email
 *   String; E-mail address to subscribe
 * @param $fields
 *   Array; Array of custom field values. Key is field. Value is value for the field.
 * @param $lid
 *   String; List ID of the list to subscribe to.
 * @return
 *   Boolean; TRUE if user is subscribed. FALSE if not.
 */
function emf_interspire_api_subscribe($email, $fields, $lid) {
  drupal_set_message("Subscribe");
  // do api call
  $result = _emf_interspire_api_call('AddSubscriberToList', array($lid, $email, $fields, 'html'));
  if (!$result) return FALSE;
  return TRUE;
}

/**
 * Unsubscribe a user from a list.
 *
 * @param $email
 *   String; E-mail address to subscribe
 * @param $lid
 *   String; List ID of the list to subscribe to.
 * @return
 *   Boolean; TRUE if user is subscribed. FALSE if not.
 */
function emf_interspire_api_unsubscribe($email, $lid) {
  // do api call
  $result = _emf_interspire_api_call('DeleteSubscriber', array($lid, $email));
  if (!$result) return FALSE;
  return TRUE;
}

/**
 * Fetch subscribed subscribers from API.
 *
 * @param $date
 *   Mixed; If a string, should be in the date() format of 'Y-m-d H:i:s', otherwise, a Unix timestamp.
 * @param $lid
 *   String; List ID
 * @return
 *   Array; List of subscriber lists.
 */
function emf_interspire_api_get_subscribers_subscribed($date = 0, $lid = NULL, $search = '@') {
  $members = array();
  $results = _emf_interspire_api_call('GetSubscribers', array($lid, '@'));
  foreach ($results->data->subscriberlist->item as $result) {
    if ($result->unsubscribed == "0") $members[] = (string)$result->emailaddress;
  }
  //var_dump($members);
  return $members;
}
/**
 * Fetch unsubscribed subscribers from API.
 *
 * @param $date
 *   Mixed; If a string, should be in the date() format of 'Y-m-d H:i:s', otherwise, a Unix timestamp.
 * @param $lid
 *   String; List ID
 * @return
 *   Array; List of subscriber lists.
 */
function emf_interspire_api_get_subscribers_unsubscribed($date = 0, $lid = NULL) {
  $unsubscribers = array();
  $results = _emf_interspire_api_call('GetSubscribers', array($lid, '@'));
  foreach ($results->data->subscriberlist->item as $result) {
    if ((int)$result->unsubscribed > $date) $unsubscribers[] = (string)$result->emailaddress;
  }
  //var_dump($unsubscribers);
  return $unsubscribers;
}


/**
 * Fetch lists from API.
 *
 * @return
 *   Array; List of subscriber lists.
 */
function emf_interspire_api_get_lists() {
  $fields = array(
    'lid' => 'listid',
    'name_api' => 'name',
    //subscribecount � A count of how many subscribed contacts.
    //unsubscribecount � A count of how many unsubscribed contacts.
    //autorespondercount � A count of how many autoresponders are linked to the Contact List.
  );
  return _emf_interspire_api_get_array_call('GetLists', array(), $fields, 'lid');
}
/**
 * Fetch custom fields for some list from API.
 *
 * @param $lid
 *   String; List ID of the list.
 * @return
 *   Array; List of custom fields.
 */
function emf_interspire_api_get_custom_fields($lid) {
  $fields = array(
    'key' => 'fieldid',
    'name' => 'name',
    'type' => 'fieldtype',
    //'options' => , // Can we use fieldsettings for this?
    //defaultvalue � If you set a default value it will appear here.
    //required � If this field is required to be filled in (1 or 0).
    //fieldsettings � Serialized version of the custom fields settings
  );

  // do call
  $result = _emf_interspire_api_get_array_call('GetCustomFields', array($lid), $fields, 'key');
  unset($result['EMAIL']);
  return $result;
}

/**
 * Do API call.
 *
 * @param $method
 *   String; The API method to call.
 * @param $params
 *   Array; Parameters for the API call.
 * @return
 *   Array; API result array.
 */
function _emf_interspire_api_call($method, $params = array()) {
  $url = variable_get('emf_interspire_xml_path', '');
  $user = variable_get('emf_interspire_xml_user', '');
  $token = variable_get('emf_interspire_xml_token', '');

  if (empty($url) || empty($user) || empty($token)) {
    // one of the needed vars isn't set.
    return FALSE;
  }
  else {
    switch ($method) {
      case 'AddSubscriberToList':
        $req_type = 'subscribers';
        $details = '<emailaddress>' . $params[1] . '</emailaddress>';
        $details .= '<mailinglist>' . $params[0] . '</mailinglist>';
        $details .= '<format>' . $params[3] . '</format>';
        $details .= '<confirmed>yes</confirmed>';
        $details .= '<customfields>';
        foreach ($params[2] as $fieldid => $value) {
          $details .= '<item>';
          $details .= '<fieldid>' . $fieldid . '</fieldid>';
          $details .= '<value>' . $value . '</value>';
          $details .= '</item>';
        }
        $details .= '</customfields>';
        break;
      case 'DeleteSubscriber':
        $req_type = 'subscribers';
        $details = '<emailaddress>' . $params[1] . '</emailaddress>';
        $details .= '<list>' . $params[0] . '</list>';
        break;
      case 'GetSubscribers':
        $req_type = 'subscribers';
        $details = '<searchinfo>';
        $details .= '<List>' . $params[0] . '</List>';
        $details .= '<Email>' . $params[1] . '</Email>';
        $details .= '</searchinfo>';
        break;
      case 'GetLists':
        $req_type = 'user';
        break;
      case 'GetCustomFields':
        $req_type = 'lists';
        $details = '<listids>' . $params[0] . '</listids>';
        break;
      case 'xmlapitest':
        $req_type = 'authentication';
        break;
    }
    $xml = '<xmlrequest>';
    $xml .= '<username>' . $user . '</username>';
    $xml .= '<usertoken>' . $token . '</usertoken>';
    $xml .= '<requesttype>' . $req_type . '</requesttype>';
    $xml .= '<requestmethod>' . $method . '</requestmethod>';
    $xml .= '<details>
    ';
    $xml .= $details;
    $xml .= '</details>';
    $xml .= '</xmlrequest>';
    //var_dump($xml);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $result = @curl_exec($ch);
    if ($result === FALSE)  {
      watchdog('EMF Interspire', t('Error performing XML request'), NULL, WATCHDOG_ERROR);
    }
    else {
      //var_dump($result);
      $xml_doc = simplexml_load_string($result);
      if ($xml_doc->status == 'SUCCESS') {
        return $xml_doc;
      }
      else {
        watchdog('EMF Interspire', t('Error performing XML request'), NULL, WATCHDOG_ERROR);
      }
    }
  }
}
/**
 * Do API call and parse the $results as an array.
 *
 * @param $method
 *   String; The API method to call.
 * @param $params
 *   Array; Parameters for the API call.
 * @param $type
 *   Array; API type used as index under $result['anyType'].
 * @param $fields
 *   Array; Indexed array for field mapping. Keys are local fields. Values are API fields.
 * @param $key
 *   String; Local field which value will be used to index the result array.
 * @return
 *   Array; Result array.
 */
function _emf_interspire_api_get_array_call($method, $params, $fields, $key = NULL) {
  $items = array();

  // do api call
  $results = _emf_interspire_api_call($method, $params);

  if (!$results) return FALSE;
  // converting api result to array
  foreach ($results->data->item as $result) {
    $result = (array)$result;
    $object = new stdClass();
    foreach ($fields as $local_field => $api_field) {
      $object->{$local_field} = $result[$api_field];
    }
    if ($key) {
      $items[$object->{$key}] = $object;
    }
  }
  return $items;
}


function emf_interspire_api_unix_to_service_time($timestamp = 0) {
  if ($timestamp) {
    return date('Y-m-d H:i:s', $timestamp);
  }
  return 0;
}
?>