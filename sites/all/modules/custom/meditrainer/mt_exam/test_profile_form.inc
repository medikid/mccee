<?php
drupal_add_js(drupal_get_path('module', 'mt_exam') . '/js/mcq_test_profile.js');
module_load_include('inc', 'mt_exam','TestProfile');
module_load_include('inc', 'mt_exam','test_profile_form_functions');


function test_profile_form($form, &$form_state){
    
    $form['select_profile']=array(
      '#type'=>'fieldset',
      '#title'=>t('Exam Configuration Profile Setup')
    );
    
    
    $form['select_profile']['tp_name']=array(
      '#type'=>'select',
        '#title'=>'Choose Previously Saved Profile:  ',
        '#options'=>  dropdown_tp_name(),
        '#default_value'=> dropdown_default_selection_tp_name(),
        '#ajax'=>array(
            'callback'=>'ajx_load_saved_exam_profile',
            //'wrapper'=>'selected_tp_data_wrapper',
	    'wrapper'=>'test_profile_data_wrapper',
	    'event'=>'change'
            ),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div><p>'
    );    

    $form['select_profile']['OR_statement']=array(
        '#type'=>'markup',
        '#markup'=>'<p><span style="text-align : left; font-weight: bold">OR</span><p>',
    );
    
    
    $form['select_profile']['tp_create_new']=array(
        '#type'=>'checkbox',
        '#title'=>t(' Create new profile'),
        '#attributes'=>array('style'=>"text-weight:bold"),
        '#ajax'=>array(
            'callback'=>'ajx_load_create_exam_profile_form',
            'wrapper'=>'test_profile_wrapper',
            'method' => 'replace',
        )
    );
    
    $form['select_profile']['tp_new_profile_name'] = array(
            '#type'=>'textfield',
            '#title'=>t('New Profile Name: '),
            '#prefix'=>'<div class="container-inline">',
            '#suffix'=>'</div>',
            '#states'=>array(
                'visible'=>array(
                    ':input[name="tp_create_new"]'=>array('checked'=>true),
                ),                
            ),
        );
       
    $form['wrapper']=array(
        '#type'=>'markup',
        '#markup'=>'<div id="test_profile_data_wrapper"></div>',
    );
    
   //NOW STARTS EXAM PROFILE DETAILS
    
 //   if (!empty($form_state['values']['tp_create_new']) && $form_state['values']['tp_create_new']) {
  
        
        
       $form['new_profile'] =array(
      '#type'=>'fieldset',
      '#title'=>t('Exam Configuration Details'),
      '#prefix'=>'<div id="test_profile_wrapper">',
      '#suffix'=>'</div>' 
    
    );
 
      
      $form['new_profile']['tp_exam']=array(
      '#type'=>'select',
        '#title'=>'Select Exam: ',
        '#options'=>  dropdown_tp_exam(),
       //'#default_value'=> ,
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
    );
     
  
    $form['new_profile']['tp_total']=array(
      '#type'=>'select',
        '#title'=>'Total Number of Questions: ',
        '#options'=>  dropdown_tp_total(),
        '#default_value'=>  dropdown_default_selection_tp_total(),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'     
    );
    
     $form['new_profile']['tp_duration']=array(
      '#type'=>'select',
        '#title'=>'Test Duration: ',
        '#options'=>  dropdown_tp_duration(),
        '#default_value'=>  dropdown_default_selection_tp_duration(),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'    
    );
   
      $form['new_profile']['tp_test_mode']=array(
        '#type'=>'radios',
        '#title'=>'Test Mode: ',
        '#options'=> dropdown_tp_test_mode(),
        '#default_value'=>  dropdown_default_selection_tp_test_mode(),
    );

   $form['new_profile']['tp_is_customized']=array(
        '#type'=>'radios',
        '#title'=>'Questions Distribution By Speciality: ',
        '#options'=> dropdown_tp_is_customized(),
        '#default_value'=>dropdown_default_selection_tp_is_customized(),
    
    );
      
      
    $form['new_profile']['tp_composition']=array(
        '#type'=>'checkboxes',
        '#title'=>'Select Speciality: ',
        '#options'=>  dropdown_tp_composition(),
        '#default_value'=>array('0'=>'0'),
        '#states'=>array(
                'visible'=>array(
                    ':input[name="tp_is_customized"]'=>array('value'=>'1'),
                ),                
            ),
    
    );
    
//}   
     
    //display saved profile
   // if ($_SERVER['TEST_PROFILE_DISPLAY_MODE'] == 2) {
    if (!empty($form_state['values']['tp_name']) && $form_state['values']['tp_name'] != '0') {
   
    }
    
    //SUBMIT BUTTON

    $form['submit']=array(
        '#type'=>'submit',
        '#value'=>t('Start Test'),
        '#submit'=>array('save_test_profile')
    );
    
    return $form;  
    
}






function ajx_load_saved_exam_profile($form, &$form_state){
    $selected_profile_id=$form_state['values']['tp_name'];
     
    if ($selected_profile_id == '0'){
       $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 0;
       
     } else {
	 global $user;
	 $selected_tp = new TestProfile($user->uid, $selected_profile_id );
	 $selected_tp->load();
	 $selected_profile_json = $selected_tp->get_data_json();
	
	$form['tp_data']['selected_tp_data']=array(
	    '#type'=>'hidden',
	    '#value'=>$selected_profile_json,
	    '#prefix'=>'<div id="test_profile_data_wrapper">',
	    '#suffix'=>'<script type="text/javascript"> set_tp_data('.$selected_profile_json.');</script></div>'
	    ); 
	return $form['tp_data'];
	 
     }
}

function save_test_profile($form, &$form_state){
    global $user;
    $test_profile_data =  $_REQUEST;
        if ($test_profile_data['tp_is_customized'] == 0 ){
            $test_profile_data['tp_composition'][0]='0';
        }
    
	$tp = new TestProfile($user->uid);
	
	if ($test_profile_data['tp_name'] == 0){	
	$tp->tpid = null;
        $tp->tp_name = $test_profile_data['tp_new_profile_name'];
	} else {
	    $tp->tpid = $test_profile_data['tp_name'];
	    $tp->tp_name = null;
	}
	
        $tp->tp_exam = $test_profile_data['tp_exam'];
        $tp->tp_total = $test_profile_data['tp_total'];
        $tp->tp_duration = $test_profile_data['tp_duration'];
        $tp->tp_test_mode = $test_profile_data['tp_test_mode'];
        $tp->tp_is_customized = $test_profile_data['tp_is_customized'];    
        $tp->tp_composition = $test_profile_data['tp_composition'];
	
	$tp->save();
}




?>
