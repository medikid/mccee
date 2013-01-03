<?php
include_once 'mt_iem_api_init.inc';

// Make sure that the IEM controller does NOT redirect request.

function mt_iem_list_create($list_name, $owner_name, $custom_fields = array(), $notify_owner = false, $reply_to_email = "") {
    include_once SENDSTUDIO_API_DIRECTORY.'/user.php';
    $IEM_API_USER = new User_API();
    
    $owner_id = $IEM_API_USER->Find($owner_name);
    $IEM_API_USER->Load($owner_id);
    
    include_once SENDSTUDIO_API_DIRECTORY.'/lists.php';
    $IEM_API_LIST = new Lists_API();

    $IEM_API_LIST->name = $list_name;
    $IEM_API_LIST->ownername = $IEM_API_USER->fullname;
    $IEM_API_LIST->owneremail = $IEM_API_USER->emailaddress;
    $IEM_API_LIST->replytoemail = $IEM_API_USER->emailaddress;
    $IEM_API_LIST->bounceemail = $IEM_API_USER->emailaddress;

    $IEM_API_LIST->customfields = $custom_fields;

    $IEM_API_LIST->notifyowner = $notify_owner;

    $list_id = $IEM_API_LIST->Create();
    
    //mt_iem_api_unload($IEM_API);
    unset($IEM_API_USER);
    unset($IEM_API_LIST);
    return $list_id;
}

function mt_iem_user_list_create($list_name, $owner_name, $custom_fields = array(), $notify_owner = false, $reply_to_email = ""){
    $list_id = mt_iem_list_create($list_name, $owner_name, $custom_fields, $notify_owner, $reply_to_email);
    mt_iem_list_pulldata($list_id);
}


function mt_iem_list_pulldata($list_id){
    $IEM_API_LIST = new Lists_API();
    $IEM_API_LIST->Load($list_id);
    
    iem_settings_set('IEM_MT_USERS_LIST_NAME', $IEM_API_LIST->name);
    iem_settings_set('IEM_MT_USERS_LIST_ID', $IEM_API_LIST->listid);
    unset($IEM_API_LIST);
}

?>
