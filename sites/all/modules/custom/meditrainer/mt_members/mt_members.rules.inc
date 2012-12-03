<?php

/*
 * implements hook_rules_event_info()
 */

function mt_members_rules_event_info(){
    $items=array();
    
    $items['free_roles_notify_grant'] = array(
	'label'=>t('Email notify for granted free roles'),
	'group'=>t('Notification'),
	'variables'=> array(
	    'user' =>array(
		'type'=>'user',
		'label'=>t('User')
	    )
	)
    );
    
    return $items;
}

/*
 * implements hook_action
 */
function mt_members_rules_action_info() {
    $actions = array();

  $actions['email_activate_granted_paid_role'] = array(
	    'label' => t('Send email to activate a newly granted paid role'), 
	    'parameter' => array(
	      'order' => array(
		'type' => 'uc_order',
		'label' => t('Order'),
	      ),
	    ), 
	    'group' => t('Notification')
	  );
  
  $actions['email_activate_granted_free_role'] = array(
	    'label' => t('Send email to activate a newly granted free role'), 
	    'parameter' => array(
	      'user' => array(
		'type' => 'user',
		'label' => t('User'),
	      ),
	    ), 
	    'group' => t('Notification')
	  );
   
  return $actions;
}

 function email_activate_granted_paid_role($order){
      $params = array('order'=>$order);
      
      $email_sent = drupal_mail('mt_message',
				'email_activate_granted_paid_role',
				$order->primary_email,
				language_default(),
				$params);
  
      if(!$email_sent){
	  return false;
      } else return true;
	  
  }
  
   function email_activate_granted_free_role($user){
      $params = array('user'=>$user);
      
      $email_sent = drupal_mail('mt_message',
				'email_activate_granted_free_role',
				$user->mail,
				language_default(),
				$params);
  
      if(!$email_sent){
	  return false;
      } else return true;
	  
  }
  
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function import_rule_activate_granted_role(){
    $rule_to_inactivate = "uc_role_notify_grant";
    $loaded_rule = rules_config_load($rule_to_inactivate);
    $e = json_decode($loaded_rule->export());
    $from_email = $e->uc_role_notify_grant->DO[0]->uc_roles_order_email->from;
    inactivate_rule($rule_to_inactivate);
    
    
   $export = array(
       "notify_activate_paid_role" => array(
	   "LABEL" => "Notify customer when a role is granted",
	    "PLUGIN" =>"reaction rule",
	    "REQUIRES" => array("rules", "uc_roles"),
	    "ON" =>array("uc_roles_notify_grant"),
	    "IF" =>array(
		array(
		"data_is" => array(
		    "data" => array("order:order-status"),
	       "value" => "payment_received" )
		    )
		),
	   "DO" => array(
		array(
		  "uc_roles_order_email" => array(
		  "order" => array( "order" ),
		  "expiration" => array( "expiration" ),
		  "from" => ".$from_email.",
		  "addresses" =>  "[order:email]",
		  "subject" =>  "[store:name] has granted you [uc_role:name] membership",
		  "message" =>  "Dear [user:name], \n\nThank you for ordering paid membership at Meditrainer. Your order has been approved and you have now been granted the following membership.\nOrder#: [uc_order:link]\nMembership: [uc_role:name]\nMembership Expires on: [uc_role:expiration]\n\nYou may now log in by clicking this link or copying and pasting it to your browser:\n[user:one-time-login-url]\nThis link can only be used once to log in and will lead you to a page where you can set your password.\nAfter setting your password, you will be able to log in at [site:login-url] in the future using:\n\nusername: [user:name]\npassword: <Password you choose during account activation>\nAccount Activation Link: [user:one-time-login-url]\n\nWith Regards,\n\n[site:name] team",
		  "format" => "filtered_html" )
		   )
	      )
	   )
       );
   $json_export = json_encode($export);
   $rule = rules_import($json_export);
   $rule->integrityCheck();
   $rule->save();
   
   
}

function inactivate_rule($rule_name){
     $rule = rules_config_load($rule_name);
    $rule->active = FALSE;
    $rule->save();
}

function activate_rule($rule_name){
     $rule = rules_config_load($rule_name);
    $rule->active = TRUE;
    $rule->save();
}

?>
