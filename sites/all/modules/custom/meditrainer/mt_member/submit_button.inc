<?php

function setup_submit_button(&$form, &$form_state)
{
	unset($form['#submit']);
	      
        $form['actions']['proceed'] = array(
			'#type'   => 'submit',
			'#value'  => t('Create User Account'),
			'#submit' => array('button_click_handler'),
			'#prefix' => '<div id="reg_submit_button_wrapper" style="float: left">',
                        '#suffix' => '</div>',
                        '#ajax' => array( )
	);
}


function save_user_info($form, &$form_state){
	
	
	/*
	unset($form['#validate']);
	
	$new_member = new member();
	$new_member->load_new_member_from_session();
	
	$new_member->asp_exam = !empty($form_state['values']['asp_exam']) ? $form_state['values']['asp_exam'] : '';
	$new_member->mem_category = !empty($form_state['values']['mem_category']) ? $form_state['values']['mem_category'] : '';
	$new_member->mem_type = !empty($form_state['values']['mem_type']) ? $form_state['values']['mem_type'] : '';
	
	$new_member->save_new_member_to_session();
	
	
	$form_state['account']['name'] = $new_member->name;
	$form_state['account']['mail'] = $new_member->mail;
	$form_state['account']['pass'] = $new_member->pass;
	$form_state['first_name'] = $new_member->first_name;
	$form_state['last_name'] = $new_member->last_name;
	$form_state['is_newsletter'] = $new_member->is_newsletter;
	$form_state['asp_exam'] = $new_member->asp_exam;
	$form_state['mem_category'] = $new_member->mem_category;
	$form_state['mem_type'] = $new_member->mem_type;
	
	$form_state['values']['name'] = $new_member->name;
	$form_state['values']['mail'] = $new_member->mail;
	$form_state['values']['pass'] = $new_member->pass;
	$form_state['values']['first_name'] = $new_member->first_name;
	$form_state['values']['last_name'] = $new_member->last_name;
	$form_state['values']['is_newsletter'] = $new_member->is_newsletter;
	$form_state['values']['asp_exam'] = $new_member->asp_exam;
	$form_state['values']['mem_category'] = $new_member->mem_category;
	$form_state['values']['mem_type'] = $new_member->mem_type;
	*/
	
	
	//$package_id = $new_member->mem_type;
	//$package = eiab_packages($package_id);

	// Run it now so we can get the roles.
	//autoassignrole_user('insert', $form_state['values'], $user, NULL);

	// Store submitted form information.	

	//uc_cart_remove_item($package_id);
	uc_cart_add_item(2,1,NULL,NULL,FALSE);

	drupal_goto('cart/checkout');

}