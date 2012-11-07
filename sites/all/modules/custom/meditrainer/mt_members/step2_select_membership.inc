<?php
module_load_include('inc', 'mt_members', 'class_member');

function setup_select_membership_form(&$form, &$form_state){

	$new_member = new member();
	$new_member->load_new_member_from_session();


	$form['aspiring_exam_can'] = array(
			'#type' => 'select',
			'#title' => t('Select Exam'),
			'#options' => dropdown_aspiring_exam_can(),
			'#default_value' => !empty($new_member->aspiring_exam_can) ? $new_member->aspiring_exam_can : dropdown_default_selection_aspiring_exam_can()
	);
	
	$form['membership_category'] = array(
			'#title'=>'Select Membership Type',
			'#options'=>array(0=>'Free Membership(1-Day Trial)',1=>'Paid Membership'),
			'#type'=>'radios',
			'#default_value' => !empty($new_member->membership_category) ? $new_member->membership_category : NULL,
                        '#ajax' => array(
                            'callback' => 'mem_category_selection_callback',
                            'wrapper' => 'reg_submit_button_wrapper',
                            'effect' => 'fade',
                        ),
            );
		
	$form['membership_package'] = array(
			'#title' => 'Select Membership Package',
			'#type' => 'fieldset',
			'#collapsible' => TRUE,
			'#collapsed' => FALSE,
			'#weight'=>'10',
			'#states' => array(
					'visible' => array(
							':input[name="membership_category"]' => array('value' => '1'),
					),
			),
	);
		
		
	module_load_include('inc', 'mt_members', 'membership_ratecard');
		
	$form['membership_package']['membership_type'] = array
	(
			'#type' => 'tableselect',
			'#header' => get_header(),
			'#options' => get_options(),
			'#empty' => t('No membership types found'),
			'#multiple' => false,
			'#default_value' => !empty($new_member->membership_type) ? $new_member->membership_type : NULL
	);
		
		
	//$form['aspiring_exam_can']['#default_value'] = !empty($new_member->aspiring_exam_can) ? $new_member->aspiring_exam_can : NULL;
	//$form['membership_type']['#default_value'] = !empty($new_member->membership_type) ? $new_member->membership_type : NULL;
	//$form['membership_category']['#default_value'] = !empty($new_member->membership_category) ? $new_member->membership_category : NULL;
		
	
		
	$form['#group_children']['membership_package']='group_membership_info';	
	$form['#group_children']['aspiring_exam_can']='group_membership_info';
	$form['#group_children']['membership_category']='group_membership_info';
	$form['#group_children']['membership_type']='group_membership_info';
	$form['#group_children']['group_membership_info']='group_multistep_reg';
	
	disable_step1_form($form);
}

function disable_step1_form(&$form){

	$form['first_name']['#access']=false;
	$form['last_name']['#access']=false;
	$form['account']['name']['#access'] = false;
	$form['account']['mail']['#access'] = false;
	$form['account']['pass']['#access'] = false;
	$form['opt_newsletter']['#access']=false;
	
	$form['#group_children']['group_account_info']['#access'] = false;
	
	//disable step1 validation rules
	unset($form['#validate']);
}

function save_step2_form_to_session(&$form, &$form_state){
        $new_member = new member();
	$new_member->load_new_member_from_session();
	
	$new_member->aspiring_exam_can = isset($form_state['input']['aspiring_exam_can']) ? $form_state['input']['aspiring_exam_can'] : '';
	$new_member->membership_category = isset($form_state['input']['membership_category']) ? $form_state['input']['membership_category'] : '';
	$new_member->membership_type = isset($form_state['input']['membership_type']) ? $form_state['input']['membership_type'] : '';
	//$new_member->aspiring_exam_can = $form_state['input']['aspiring_exam_can'];
	//$new_member->membership_category = $form_state['input']['membership_category'];
	//$new_member->membership_type = $form_state['input']['membership_type'];
	
        
        
	$new_member->save_new_member_to_session();
}

function mem_category_selection_callback(&$form, &$form_state){
    
    switch ($form['membership_category']['#value']){
     case 0:
         $button_text = 'Create User Account';
        $proceed_to = '_eventhandler_create_user_account';
         break;
     case 1:
         $button_text = 'Proceed To Payment';
         $proceed_to = '_eventhandler_proceed_to_checkout';
         break;
     
    }
        unset($form['actions']['proceed']);
	$form['actions']['proceed'] = array(
			'#type'   => 'submit',
			'#value'  => t($button_text),
			'#submit' => array('button_click_handler'),
                        '#prefix' => '<div id="reg_submit_button_wrapper" style="float: left">',            
			'#suffix' => '</div>',
                        '#ajax'   => array()
                        );
    
    return $form['actions']['proceed'];

}


function dropdown_aspiring_exam_can(){
    $codelist = new codelist;
    $options = $codelist->get_dropdown('aspiring_exam_can');
    return $options;
}

function dropdown_default_selection_aspiring_exam_can(){
    $codelist = new codelist;
    $default_selection = $codelist->get_dropdown_default_selection('aspiring_exam_can');
    return $default_selection;
}