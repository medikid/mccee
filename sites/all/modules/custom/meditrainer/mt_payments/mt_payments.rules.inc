<?php

/*
 * implements hook_rules_
 */
/*
function mt_payments_default_rules_configuration() {
  $rule = rules_reaction_rule();
  $rule->label = 'Notify and Activate Paid Role';
  $rule->active = FALSE;
  $rule->event('uc_roles_notify_grant');
  //$rule->condition(rules_condition('data_is', array('data:select' => 'node:status', 'value' => TRUE))->negate());
  $rule->condition('data_is', array('data:select' => 'order:order-status', 'value' => 'payment_received'));
  $rule->action('drupal_message', array('message' => 'A node has been updated.'));

  $configs['notify_activate_paid_role'] = $rule;
  return $configs;
}

function mt_payments_rules_action_info(){
    return array(
    'email_notify_activate_paid_role' => array(
      'label' => t('Send an email to a user for activation of paid role'), 
      'parameter' => array(
        'order' => array(
          'type' => 'user',
          'label' => t('Recipient'),
        ),
      ), 
      'group' => t('System'), 
      'base' => 'rules_action_mail_user', 
      'callbacks' => array(
        'validate' => 'rules_action_custom_validation', 
        'help' => 'rules_mail_help',
      ),
    ),
  );
}
*/


  
    /*
   $rule_export = { "uc_role_notify_grant" : {
    "LABEL" : "Notify customer when a role is granted",
    "PLUGIN" : "reaction rule",
    "REQUIRES" : [ "rules", "uc_roles" ],
    "ON" : [ "uc_roles_notify_grant" ],
    "IF" : [
      { "data_is" : { "data" : [ "order:order-status" ], "value" : "payment_received" } }
    ],
    "DO" : [
      { "uc_roles_order_email" : {
          "order" : [ "order" ],
          "expiration" : [ "expiration" ],
          "from" : "MCCEE \u003Cdr_somashekar@shaw.ca\u003E",
          "addresses" : "[order:email]",
          "subject" : "[store:name]: [uc_role:name] role granted",
          "message" : "[uc_order:first-name] [uc_order:last-name], \n\nThanks to your order, [uc_order:link], at [store:name] you now have a new role, [uc_role:name].\n\nThanks again, \n\n[store:name]\n[site:slogan]",
          "format" : "filtered_html"
        }
      }
    ]
  };
}
     * */

?>
