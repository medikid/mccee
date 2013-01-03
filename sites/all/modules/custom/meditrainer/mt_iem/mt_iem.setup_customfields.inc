<?php


/************Install Customfield DATA********************/
function iem_list_customfield_setup($customfield_category){
    $MT_USERS_LIST_NAME = iem_settings_get('IEM_MT_USERS_LIST_NAME');
    $MT_USERS_LIST_ADMIN = iem_settings_get('IEM_MT_USERS_LIST_ADMIN');
    
    $IEM_CUSTOMFIELDS = iem_customfield_settings_get($customfield_category);
    
    foreach($IEM_CUSTOMFIELDS as $field_data){
	$field_id = mt_iem_customfield_add($field_data['name'], $field_data['sub_name'], array($MT_USERS_LIST_NAME), $MT_USERS_LIST_ADMIN);
	$updated = iem_customfield_field_id_set($field_data['name'], $field_id);
   }
}


function iem_list_customfield_unset($customfield_category){
     $IEM_CUSTOMFIELDS = iem_customfield_settings_get($customfield_category);
      
    foreach($IEM_CUSTOMFIELDS as $field_data){
	mt_iem_customfield_delete($field_data['name']);
    }
    return true;
}


function iem_list_customfield_install(){
    iem_list_customfield_setup('iem_customfield_user');
    iem_list_customfield_setup('iem_customfield_role');
    iem_list_customfield_setup('iem_customfield_order');
}

function iem_list_customfield_uninstall(){
    iem_list_customfield_unset('iem_customfield_user');
    iem_list_customfield_unset('iem_customfield_role');
    iem_list_customfield_unset('iem_customfield_order');
}
/********************************************/
?>