<?php

/************USER DATA********************/
function mt_iem_customfield_user_setup(){
    //mt_iem_customfield_add('mt_uid', 'number', array($MT_USERS_LIST_NAME),$MT_USERS_LIST_ADMIN);
    $MT_USER_CUSTOMFIELDS = array();
    $MT_USER_CUSTOMFIELDS[] = array('mt_uid', 'number');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_name', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_mail', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_first_name', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_last_name', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_membership_type', 'number');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_title', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_name', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_duration', 'number');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_granularity', 'text');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_expiration_timestamp', 'number');
    $MT_USER_CUSTOMFIELDS[] = array('mt_role_expiration_timestamp_f', 'date');
    $MT_USER_CUSTOMFIELDS[] = array('mt_user_one_time_login_url', 'text');

    foreach($MT_USER_CUSTOMFIELDS as $field_data){
	$field_id = mt_iem_customfield_add($field_data[0], $field_data[1], array($MT_USERS_LIST_NAME), $MT_USERS_LIST_ADMIN);
    }
}
/***************ORDER DATA*****************************/
function mt_iem_customfield_order_setup(){
    $MT_ORDER_CUSTOMFIELDS = array();
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_uid', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_id', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_primary_email', 'text');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_first_name', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_last_name', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_link', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_membership_type', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_ammount', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_currency', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_status', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_date', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_date_f', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_completion_date', 'number');
    $MT_ORDER_CUSTOMFIELDS[] = array('mt_order_completion_date_f', 'number');

    foreach($MT_ORDER_CUSTOMFIELDS as $field_data){
	$field_id = mt_iem_customfield_add($field_data[0], $field_data[1], array($MT_USERS_LIST_NAME), $MT_USERS_LIST_ADMIN);
    }
}
/**************************************************************/
?>
