<?php

function mt_iem_settings_form($form, &$form_state) {
    // Required variables ar the XML path, username and token.
  // http://idn.interspire.com/articles/27/1/Interspire-Email-Marketer-XML-API-Documentation/Page1.html#requirements

  $form['iem_direct_or_xml'] = array(
	'#type' => 'radios',
	'#title' => t('Data Transfer Method'),
	'#default_value' => variable_get('comment_preview', 1),
	'#options' => array( 
	    1 => t('Direct'),
	    2 => t('XML'))
  );
  /********************IEM DIRECT***********************/
  $form['iem_folder_name'] = array(
    '#type' => 'textfield',
    '#title' => t('IEM Folder Name'),
    '#description' => t('Enter your IEM Folder Name.'),
    '#default_value' => iem_settings_get('IEM_FOLDER_NAME'),
    '#required' => TRUE,
      '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 2)
                )
             ),
  );
  
  /********************IEM XML***********************/
  $form['iem_xml_url_path'] = array(
    '#type' => 'textfield',
    '#title' => t('XML URL Path'),
    '#description' => t('Enter your Interspire XML Path.'),
    '#default_value' => iem_settings_get('IEM_XML_URL_PATH'),
    '#required' => TRUE,
    '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 1)
                )
             ),
           
  );
  
  $form['iem_mt_users_list_admin'] = array(
    '#type' => 'textfield',
    '#title' => t('List Admin Username'),
    '#description' => t('Enter your Interspire Username.'),
    '#default_value' => iem_settings_get('IEM_MT_USERS_LIST_ADMIN'),
    '#required' => TRUE,
  );
  
  $form['iem_mt_users_list_admin_password'] = array(
    '#type' => 'textfield',
    '#title' => t('List Admin Password'),
    '#description' => t('Enter your List Admin Password.'),
    '#default_value' => '',
    '#required' => TRUE,
      '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 2)
                )
             ),
  );

   $form['iem_mt_users_list_admin_email'] = array(
    '#type' => 'textfield',
    '#title' => t('List Admin Email'),
    '#description' => t('Enter your List Admin Email.'),
    '#default_value' => iem_settings_get('IEM_MT_USERS_LIST_ADMIN_EMAIL'),
    '#required' => TRUE,
       '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 2)
                )
             ),
  );
    $form['iem_mt_users_list_admin_email_noreply'] = array(
    '#type' => 'textfield',
    '#title' => t('List Admin NoReply Email'),
    '#description' => t('Enter your List Admin Usermail.'),
    '#default_value' => iem_settings_get('IEM_MT_USERS_LIST_ADMIN_EMAIL_NOREPLY'),
    '#required' => TRUE,
	'#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 2)
                )
             ),
  );
    
      $form['iem_mt_users_list_admin_xml_token'] = array(
    '#type' => 'textfield',
    '#title' => t('List Admin XML Token'),
    '#description' => t('Enter your Interspire XML Token.'),
    '#default_value' => iem_settings_get('IEM_MT_USERS_LIST_ADMIN_XML_TOKEN'),
    '#required' => TRUE,
	  '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="iem_direct_or_xml"]' => array('value' => 1)
                )
             ),
  );
  return $form;
}

?>