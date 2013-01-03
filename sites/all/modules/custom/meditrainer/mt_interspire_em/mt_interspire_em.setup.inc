<?php
module_load_include('inc', 'mt_interspire_em', 'mt_interspire_em.setup_customfields');

function mt_interspire_em_setup(){
    iem_settings_setup();
    
    //mt_iem_customfield_user_setup();
    //mt_iem_customfield_order_setup();
}

function iem_settings_setup(){
    $iem_settings = iem_settings_load();
    
    $iem_settings['DRUPAL_ROOT_PATH'] = realpath(".");
    iem_settings_set('DRUPAL_ROOT_PATH', $iem_settings['DRUPAL_ROOT_PATH']);
    
    $iem_settings['IEM_ROOT_PATH'] = $iem_settings['DRUPAL_ROOT_PATH'] . "/" .$iem_settings['IEM_FOLDER_NAME'];
    iem_settings_set('IEM_ROOT_PATH', $iem_settings['IEM_ROOT_PATH']);
    
    $iem_settings['IEM_MT_USERS_LIST_ADMIN_ID'] = mt_iem_user_create(
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_PASSWORD'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_EMAIL'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_NAME']) ;
    iem_settings_set('IEM_MT_USERS_ADMIN_ID', $iem_settings['IEM_MT_USERS_ADMIN_ID']);
    
    $iem_settings['IEM_MT_USERS_LIST_ID'] = mt_iem_list_create(
	    $iem_settings['IEM_MT_USERS_LIST_NAME'],
	    $iem_settings['IEM_MT_USERS_LIST_ADMIN_NAME'],
	    $custom_fields = array(),
	    $notify_owner = false,
	    $reply_to_email = $iem_settings['IEM_MT_USERS_LIST_ADMIN_EMAIL_NOREPLY']);
    iem_settings_set('IEM_MT_USERS_LIST_ID', $iem_settings['IEM_MT_USERS_LIST_ID']);
    
}

function iem_settings_set($name, $value){
    $update = db_update('mt_codelist')
	    ->fields(array(
		'sub_name' => $value
		))
	    ->condition('cat', 'mt_interspire_em')
	    ->condition('sub_cat', 'iem_settings')
	    ->condition('name', $name)
	    ->execute();
    return $update;
}

function iem_settings_get($name){
    $query = db_select('mt_codelist', 'mtc')
	    ->fields('mtc')
	    ->condition('cat', 'mt_interspire_em')
	    ->condition('sub_cat', 'iem_settings')
	    ->condition('name', $name)
	    ->execute()
	    ->fetchAssoc();
    $value = $query['sub_name'];
    return $value;
}
?>
