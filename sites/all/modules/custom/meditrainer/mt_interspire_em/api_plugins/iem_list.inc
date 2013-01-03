<?php
module_load_include('inc', 'mt_interspire_em', 'api_plugins/iem_init');
//$IEM_API_LIST  = new Lists_API();
$IEM_API = new SendStudio_Functions();
$IEM_API_LIST = $IEM_API->GetApi('Lists');

function iem_list_load($list_id=0){
   return $IEM_API_LIST->Load($list_id);
}

function iem_list_create(){
    return $IEM_API_LIST->Create();
}

function iem_list_find($list_name=false){
    return $IEM_API_LIST->Find($list_name);
}

function iem_list_delete($list_id=0, $userid=0) {
    return $IEM_API_LIST->Delete($list_id, $userid) ;
}

function iem_list_deleteAllSubscribers($list_id=0, $called_inside_lists=false) {
    return $IEM_API_LIST->DeleteAllSubscribers($list_id, $called_inside_lists ) ;
}

function iem_list_changeSubscriberFormat($format='html', $list_id ) {
    return $IEM_API_LIST->ChangeSubscriberFormat($format, $list_id ) ;
}

function iem_list_changeSubscriberStatus($status='active', $list_id=0) {
    return $IEM_API_LIST->ChangeSubscriberStatus($status, $list_id ) ;
}

function iem_list_changeSubscriberConfirm($status='confirm', $list_id=0) {
    return $IEM_API_LIST->ChangeSubscriberConfirm($status , $list_id ) ;
}

function iem_list_getSubscriberCount($list_id=0, $counttype=''){
    return $IEM_API_LIST->GetSubscriberCount($list_id , $counttype );
}

function iem_list_save(){
    return $IEM_API_LIST->Save();
}

function iem_list_getCustomFields($list_ids=array(), $type="")  {
    return $IEM_API_LIST->GetCustomFields($list_ids , $type) ;
}

function iem_list_getLists($lists=null, $sortinfo=array(), $countonly=false, $start=0, $perpage=10){
    return $IEM_API_LIST->GetLists($lists , $sortinfo , $countonly , $start , $perpage ) ;
}

function iem_list_GetListByUserID($userid = 0, $getUnconfirmedCount = false, $getAutoresponderCount = true)  {
    return $IEM_API_LIST->GetListByUserID($userid , $getUnconfirmedCount , $getAutoresponderCount ) ;
}
/*
function iem_list_  {
    return $IEM_API_LIST-> ;
}
*/	
?>
