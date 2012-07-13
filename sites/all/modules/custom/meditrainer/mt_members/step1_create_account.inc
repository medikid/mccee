<?php
include_once '/class_member.inc';

function setup_create_account_form(&$form, &$form_state){
	
	$new_member = new member();
	$new_member->load_new_member_from_session();
	//$new_member = $_SESSION['member_registration']['new_member'];
	
	$form['account']['name']['#default_value'] = !empty($new_member->name) ? $new_member->name : '';
	$form['account']['mail']['#default_value'] = !empty($new_member->mail) ? $new_member->mail : '';
	//$form['account']['pass']['#process'] = array(
	//											    'form_process_password_confirm',
	//											    'mt_members_form_process_password_confirm'
	//										  );
	
	$form['first_name'] = array(
			'#title' => t('First Name'),
			'#type' => 'textfield',
			'#required' => TRUE,
			'#description' => t('Enter Your First Name'),
			'#default_value' => !empty($new_member->first_name) ? $new_member->first_name : ''
			
	);
		
	$form['last_name'] = array(
			'#title' => t('Last Name'),
			'#type' => 'textfield',
			'#required' => TRUE,
			'#description' => t('Enter Your Last Name'),
			'#default_value' => !empty($new_member->last_name) ? $new_member->last_name : ''
	);
	
	$form['opt_newsletter'] = array(
			'#title' => t('Subscribe to newsletter?'),
			'#type' => 'radios',			
			'#description' => t('Check Yes to subscribe to weekly newsletter'),
			'#options'=>array(0=>'No', 1=>'Yes'),
			'#default_value' => 1
			);
	
	$form['#group_children']['opt_newsletter']='group_personal_info';
	$form['#group_children']['first_name']='group_personal_info';
	$form['#group_children']['last_name']='group_personal_info';
	$form['#group_children']['group_personal_info']='group_multistep_reg';
	$form['#group_children']['group_account_info']='group_multistep_reg';
		
	
		
	$form['actions']['next']['#limit_validation_errors'][] = array('name','mail','pass','first_name','last_name', 'opt_newsletter');
}

function mt_members_form_process_password_confirm($element){
	$new_member = new member();
	$new_member->load_new_member_from_session();
	$element['pass1']['#value'] =!empty($new_member->pass) ? $new_member->pass : '';
	
	$element['pass2']['#value'] = !empty($new_member->pass) ? $new_member->pass : '';
	return $element;

}

function save_step1_form_to_session(&$form, &$form_state){
    
    $new_member = new member();
	$new_member->load_new_member_from_session();
	
	$new_member->first_name = !empty($form_state['input']['first_name']) ? $form_state['input']['first_name'] : '';
	$new_member->last_name = !empty($form_state['input']['last_name']) ? $form_state['input']['last_name'] : '';
	$new_member->name = !empty($form_state['input']['name']) ? $form_state['input']['name'] : '';
	$new_member->mail = !empty($form_state['input']['mail']) ? $form_state['input']['mail'] : '';
	$new_member->pass = !empty($form_state['input']['pass']) ? $form_state['input']['pass'] : '';
	$new_member->opt_newsletter = !empty($form_state['input']['opt_newsletter']) ? $form_state['input']['opt_newsletter'] : '';
	$new_member->save_new_member_to_session();
}