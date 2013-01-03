<?php
/*
 * This is an alternative for drupal mail, called by drupal mail wrapper
 */
function mt_iem_mail($module_name, $key, $email, $language, $params){
    switch($key){
	case 'email_activate_granted_free_role':
	    $user = $params['user'];
	    $uid = $user->uid;
	    $subscriber_id = mt_iem_subscriber_id_get($uid);
	    mt_iem_newsletter_send($key, array($subscriber_id));
	    break;
	case 'email_activate_granted_paid_role':
	    $order = $params['order'];
	    $uid = $order->uid;
	    $subscriber_id = mt_iem_subscriber_id_get($uid);
	    mt_iem_newsletter_send($key, array($subscriber_id));
	    break;
    }
    return true;
}
?>
