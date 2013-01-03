<?php
require_once('iem_init.inc');
$IEM_API_CUSTOMFIELD = $sendstudio_functions->GetApi('CustomFields');

function iem_customfield_load($field_id=0, $load_list_associations=true, $return_options=false) {
    return $IEM_API_CUSTOMFIELD->Load($field_id, $load_list_associations, $return_options);
}

function iem_customfield_create() {
    return $IEM_API_CUSTOMFIELD->Create();
}

function iem_customfield_delete($fieldid=0) {
    return $IEM_API_CUSTOMFIELD->Delete($fieldid);
}

function iem_customfield_save() {
    return $IEM_API_CUSTOMFIELD->Save();
}

function iem_customfield_getCustomFields($ownerid=0, $sortinfo=array(), $countonly=false, $start=0, $perpage=10) {
    return $IEM_API_CUSTOMFIELD->GetCustomFields($ownerid, $sortinfo, $countonly, $start, $perpage);
}

function iem_customfield_setAssociations($associations = array(), &$user_object) {
    return $IEM_API_CUSTOMFIELD->SetAssociations($associations, $user_object);
}

function iem_customfield_getCustomFieldsForLists($list_ids = array(), $fieldids = array(), $fieldTypes = array()) {
    return $IEM_API_CUSTOMFIELD->GetCustomFieldsForLists($list_ids, $fieldids, $fieldTypes);
}
/*
function iem_customfield_ {
    return $IEM_API_CUSTOMFIELD->;
}
*/
?>
