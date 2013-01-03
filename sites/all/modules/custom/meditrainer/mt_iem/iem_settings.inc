<?php

function iem_settings_load(){
    $iem_settings = array();
    $query = db_select('mt_codelist', 'mtc')
		->fields('mtc')
		->condition('cat', 'mt_iem')
		->condition('sub_cat', 'iem_settings')
		->execute();    
    
    while ($result=$query->fetchAssoc()){
	    $iem_settings[$result['name']] = $result['sub_name'];	
    }
    return $iem_settings;    
}

function iem_settings_load_from_csv(){
    $csv_file_path = realpath(".") ."/".get_csv_data_filepath('mt_iem', 'mt_codelist');

    $data = load_csv('mt_codelist', $csv_file_path);
    $iem_settings_csv = array();
    foreach($data['mt_codelist'] as $row){
	$iem_settings_csv[$row['name']] = $row['sub_name'];
    }
    return $iem_settings_csv;
}

function iem_settings_setup(){
    $iem_settings = iem_settings_load();
    
    $iem_settings['DRUPAL_ROOT_PATH'] = realpath(".");
    iem_settings_set('DRUPAL_ROOT_PATH', $iem_settings['DRUPAL_ROOT_PATH']);
    
    $iem_settings['IEM_ROOT_PATH'] = $iem_settings['DRUPAL_ROOT_PATH'] . "/" .$iem_settings['IEM_FOLDER_NAME'];
    iem_settings_set('IEM_ROOT_PATH', $iem_settings['IEM_ROOT_PATH']);
    
    $iem_settings['IEM_MT_USERS_LIST_ADMIN_ID'] = mt_iem_xml_user_create(
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN'],
	    'drupal123',
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_EMAIL'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_NAME']) ;
    
    $list_id = $iem_settings['IEM_MT_USERS_LIST_ID'] = mt_iem_user_list_create(
	    $iem_settings['IEM_MT_USERS_LIST_NAME'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_NAME'],
	    $custom_fields = array(),
	    $notify_owner = false,
	    $reply_to_email = $iem_settings['IEM_MT_USERS_LIST_ADMIN_EMAIL_NOREPLY']);
    
	module_load_include('inc', 'mt_iem', 'iem_api_init');
     	$iem_xml_folder_name = $iem_settings['IEM_XML_FOLDER_NAME'];
	$iem_xml_url_path = SENDSTUDIO_APPLICATION_URL.'/'.$iem_xml_folder_name.'/xml.php';
	iem_settings_set('IEM_XML_URL_PATH', $iem_xml_url_path);
}

function iem_settings_set($name, $value){
    $update = db_update('mt_codelist')
	    ->fields(array(
		'sub_name' => $value
		))
	    ->condition('cat', 'mt_iem')
	    ->condition('sub_cat', 'iem_settings')
	    ->condition('name', $name)
	    ->execute();
    return $update;
}

function iem_settings_get($name){
    $query = db_select('mt_codelist', 'mtc')
	    ->fields('mtc')
	    ->condition('cat', 'mt_iem')
	    ->condition('sub_cat', 'iem_settings')
	    ->condition('name', $name)
	    ->execute()
	    ->fetchAssoc();
    $value = $query['sub_name'];
    return $value;
}

?>