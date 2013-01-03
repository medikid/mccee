<?php
include_once 'mt_iem_api_init.inc';

function mt_iem_user_create($username, $password, $email, $fullname, $isSystemAdmin = true) {
    
    include_once SENDSTUDIO_API_DIRECTORY.'/user.php';
    $IEM_API_USER = new User_API();
    
    $IEM_API_USER->username = $username;
    $IEM_API_USER->password = $password;


    $IEM_API_USER->fullname = $fullname;
    $IEM_API_USER->emailaddress = $email;

    $IEM_API_USER->groupid = 1;
    $IEM_API_USER->usertimezone = 'GMT-8:00';
    $IEM_API_USER->status = true;

    $IEM_API_USER->systemadmin = $isSystemAdmin;
    $IEM_API_USER->admintype = "a";
    $user_id = $IEM_API_USER->Create();
    
    //mt_iem_api_unload($IEM_API);
    unset($IEM_API_USER);
    
    return $user_id;
}

function mt_iem_xml_user_create($username, $password, $email, $fullname, $isSystemAdmin = true) {    
    include_once SENDSTUDIO_API_DIRECTORY.'/user.php';
    $IEM_API_USER = new User_API();
    
    $IEM_API_USER->username = $username;
    $IEM_API_USER->password = $password;


    $IEM_API_USER->fullname = $fullname;
    $IEM_API_USER->emailaddress = $email;
    
    $IEM_API_USER->xmlapi = true;

    $IEM_API_USER->groupid = 1;
    $IEM_API_USER->usertimezone = 'GMT-8:00';
    $IEM_API_USER->status = true;

    $IEM_API_USER->systemadmin = $isSystemAdmin;
    $IEM_API_USER->admintype = "a";
    $user_id = $IEM_API_USER->Create();
    unset($IEM_API_USER);
    
    mt_iem_xml_user_data_pull($user_id);
    
    return $user_id;
}

function mt_iem_xml_user_data_pull($user_id){
    include_once SENDSTUDIO_API_DIRECTORY.'/user.php';
    $IEM_API_USER = new User_API();
    $IEM_API_USER->Load($user_id);
    
    iem_settings_set('IEM_MT_USERS_LIST_ADMIN', $IEM_API_USER->username);
    iem_settings_set('IEM_MT_USERS_LIST_ADMIN_ID', $IEM_API_USER->userid);
    iem_settings_set('IEM_MT_USERS_LIST_ADMIN_NAME', $IEM_API_USER->fullname);
    iem_settings_set('IEM_MT_USERS_LIST_ADMIN_EMAIL', $IEM_API_USER->emailaddress);
    iem_settings_set('IEM_MT_USERS_LIST_ADMIN_XML_TOKEN', $IEM_API_USER->xmltoken);
    
    unset($IEM_API_USER);
}

?>
