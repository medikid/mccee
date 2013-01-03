<?php
require_once('iem_init.inc');
$IEM_API_SUBSCRIBER  = new Subscribers_API();

function iem_subscriber_loadSubscriberBasicInformation($subscriberid=0, $listids=Array()){
       return $IEM_API_SUBSCRIBER->LoadSubscriberBasicInformation($subscriberid, $listids);
}

function iem_subscriber_getAllListsForEmailAddress($email='', $listids=array(), $main_listid=0) {
       return $IEM_API_SUBSCRIBER->GetAllListsForEmailAddress($email, $listids, $main_listid) ;
}

function iem_subscriber_getEmailForSubscriber($subscriberid=0) {
       return $IEM_API_SUBSCRIBER->GetEmailForSubscriber($subscriberid) ;
}

function iem_subscriber_loadSubscriberCustomFields($subscriberid=0, $listid=0, $customfields=array()) {
       return $IEM_API_SUBSCRIBER->LoadSubscriberCustomFields($subscriberid, $listid, $customfields ) ;
}

function iem_subscriber_getAllSubscriberCustomFields($listids=array(), $limit_fields=array(), $subscriberids=array(), $custom_fieldids=array()) {
       return $IEM_API_SUBSCRIBER->GetAllSubscriberCustomFields($listids, $limit_fields, $subscriberids, $custom_fieldids) ;
}

function iem_subscriber_AddToList($emailaddress='', $listid=null, $add_to_autoresponders=true, $skip_listcheck=false) {
   $IEM_API_SUBSCRIBER->AddToList($emailaddress, $listid, $add_to_autoresponders, $skip_listcheck) ;
}

function iem_subscriber_isSubscriberHasOpenedNewsletters($emailAddress='', $newsletterIds = array(), $subscriberId=0){
    return $IEM_API_SUBSCRIBER->IsSubscriberHasOpenedNewsletters($emailAddress, $newsletterIds, $subscriberId);
}

function iem_subscriber_isSubscriberOnList($emailaddress='', $listids=array(), $subscriberid=0, $activeonly=false, $not_bounced=false, $return_listid=false) {
    return $IEM_API_SUBSCRIBER->IsSubscriberOnList($emailaddress, $listids , $subscriberid , $activeonly , $not_bounced , $return_listid ); ;
}

function iem_subscriber_deleteSubscriber($emailaddress='', $listid=0, $subscriberid=0) {
    return $IEM_API_SUBSCRIBER->DeleteSubscriber($emailaddress , $listid , $subscriberid ) ;
}

function iem_subscriber_isDuplicate($emailaddress='', $listid=0, $ignore_subscriberid=0) {
    return $IEM_API_SUBSCRIBER->IsDuplicate($emailaddress, $listid, $ignore_subscriberid) ;
}
/*
function iem_subscriber_ {
    return $IEM_API_SUBSCRIBER-> ;
}
*/
?>
