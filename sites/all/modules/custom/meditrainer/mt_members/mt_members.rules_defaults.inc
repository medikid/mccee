<?php
module_load_include('inc', 'mt_members', 'mt_members.rules');

/*
 * implements hook_defualt_rules_configuration().
 */
function mt_members_default_rules_configuration(){
    $configs = array();
    
    $rule = rules_reaction_rule();
    //$rule->name = 'mt_members_activate_granted_paid_role';
    $rule->label = 'Email notify to activate granted role';
    $rule->active = true;
    $rule->dependencies(array("mt_members", "uc_roles"));
    $rule->event("uc_roles_notify_grant");
    $rule->action("email_activate_granted_paid_role", array('order:select'=>'order'));
    
    //$rule->integrityCheck();
    //$rule->save();
    
    $configs['mt_members_activate_granted_paid_role'] = $rule;
    
    return $configs;
}



?>
