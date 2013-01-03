<?php
module_load_include('inc', 'mt_interspire_em', 'api_plugins/iem_init');

//$IEM_API_USER = $IEM_API->GetApi('User');
$IEM_API = new SendStudio_Functions();
$IEM_API_USER = $IEM_API->GetApi('User');

function iem_user_load($userid=0, $load_permissions=true) {
    return $IEM_API_USER->Load($userid=0, $load_permissions=true);
}

function iem_user_loadPermissions($userid=0) {
    return $IEM_API_USER->LoadPermissions($userid=0);
}
function iem_user_create() {
    return $IEM_API_USER->Create();
}
function iem_user_find($username='') {
    return $IEM_API_USER->Find($username='');
}
function iem_user_delete($userid=0) {
    return $IEM_API_USER->Delete($userid=0);
}
function iem_user_save($update_perms = true) {
    return $IEM_API_USER->Save($update_perms = true);
}
function iem_user_resetForgotCode($code='') {
    return $IEM_API_USER->ResetForgotCode($code='');
}
function iem_user_setUserData($userData){
    $IEM_API_USER->username = $userData['username'];
    $IEM_API_USER->password = $userData['password'];
    
    $IEM_API_USER->fullname = $userData['fullname'];
    $IEM_API_USER->emailaddress = $userData['emailaddress'];
    
    $IEM_API_USER->systemadmin = $userData['systemadmin'];
    $IEM_API_USER->admintype = $userData['admintype'];
}
   
function iem_user_setUserDataAdvanced($userDataAdvanced){
    
    $IEM_API_USER->listadmin = $userData['listadmin'];
    $IEM_API_USER->listadmintype = $userData['listadmintype'];
    $IEM_API_USER->ListAdminTypes = $userData['ListAdminTypes'];
    
    $IEM_API_USER->usertimezone = $userData['usertimezone'];

   // $IEM_API_USER->  = $userData[''];
}
?>
