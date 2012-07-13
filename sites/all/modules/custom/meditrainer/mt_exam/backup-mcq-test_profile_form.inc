<?php
/*
if (!isset($_SESSION['TEST_PROFILE_DISPLAY_MODE'])){
    $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 0;
}

module_load_include('inc', 'mt_exam','mcq_test_profile');
drupal_add_js(drupal_get_path('module', 'mt_exam') . '/js/mcq_test_profile.js');


function mcq_test_profile_form($form, &$form_state){
   
    $selected_profile=NULL;
    
    $form['select_profile']=array(
      '#type'=>'fieldset',
      '#title'=>t('Exam Configuration Profile Setup')
    );
    
    
    $form['select_profile']['profq_name']=array(
      '#type'=>'select',
        '#title'=>'Choose Previously Saved Profile:  ',
        '#options'=>  dropdown_profq_name(),
        '#default_value'=>'0',
        '#ajax'=>array(
            //'callback'=>'load_selected_profile_callback',
            'callback'=>'ajx_load_saved_exam_profile',
            'wrapper'=>'test_profile_wrapper',
            // replace the wrapper
            //'method' => 'replace',

            ),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div><p>'
    );
    
    $form['select_profile']['OR_statement']=array(
        '#type'=>'markup',
        '#markup'=>'<p><span style="text-align : left; font-weight: bold">OR</span><p>',
    );
    
    
    $form['select_profile']['profq_create_new']=array(
        '#type'=>'checkbox',
        '#title'=>t(' Create new profile'),
        '#attributes'=>array('style'=>"text-weight:bold"),
        '#ajax'=>array(
            'callback'=>'ajx_load_create_exam_profile_form',
            'wrapper'=>'test_profile_wrapper',
            'method' => 'replace',
        )
    );
    
    $form['select_profile']['profq_new_name'] = array(
            '#type'=>'textfield',
            '#title'=>t('New Profile Name: '),
            '#prefix'=>'<div class="container-inline">',
            '#suffix'=>'</div>',
            '#states'=>array(
                'visible'=>array(
                    ':input[name="profq_create_new"]'=>array('checked'=>true),
                ),                
            ),
        );
       
    $form['wrapper']=array(
        '#type'=>'markup',
        '#markup'=>'<div id="test_profile_wrapper"></div>',
    );
    
     
    //NOW STARTS EXAM PROFILE DETAILS
    
    if (!empty($form_state['values']['profq_create_new']) && $form_state['values']['profq_create_new']) {
  
        
        
       $form['new_profile'] =array(
      '#type'=>'fieldset',
      '#title'=>t('Exam Configuration Details'),
      '#prefix'=>'<div id="test_profile_wrapper">',
      '#suffix'=>'</div>' 
    
    );
  
 
        
     $form['new_profile']['profq_new_profile_name'] = array(
            '#type'=>'textfield',
            '#title'=>t('New Profile Name: '),
            '#prefix'=>'<div class="container-inline">',
            '#suffix'=>'</div>'
        );
      
      $form['new_profile']['profq_test']=array(
      '#type'=>'select',
        '#title'=>'Select Exam: ',
        '#options'=>  dropdown_profq_test(),
       //'#default_value'=> ,
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
    );
     
  
    $form['new_profile']['profq_total']=array(
      '#type'=>'select',
        '#title'=>'Total Number of Questions: ',
        '#options'=>  dropdown_profq_total(),
        '#default_value'=>  dropdown_default_selection_profq_total(),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'     
    );
    
     $form['new_profile']['profq_duration']=array(
      '#type'=>'select',
        '#title'=>'Test Duration: ',
        '#options'=>  dropdown_profq_duration(),
        '#default_value'=>  dropdown_default_selection_profq_duration(),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'    
    );
   
      $form['new_profile']['profq_test_mode']=array(
        '#type'=>'radios',
        '#title'=>'Test Mode: ',
        '#options'=> dropdown_profq_test_mode(),
        '#default_value'=>  dropdown_default_selection_profq_test_mode(),
    );

    $form['new_profile']['profq_composition']=array(
        '#type'=>'checkboxes',
        '#title'=>'Select Speciality: ',
        '#options'=>  dropdown_profq_composition(),
        '#default_value'=>array('0'=>'0'),
    
    );
}   
     
    //display saved profile
   // if ($_SERVER['TEST_PROFILE_DISPLAY_MODE'] == 2) {
if (!empty($form_state['values']['profq_name']) && $form_state['values']['profq_name'] != '0') {
   
    }
    
    //SUBMIT BUTTON

    $form['submit']=array(
        '#type'=>'submit',
        '#value'=>t('Start Test'),
        '#submit'=>array('save_test_profile')
    );
    
    return $form;
}


function ajx_load_create_exam_profile_form($form, &$form_state){
    if ($form_state['values']['profq_create_new']==1){  
       
             
        $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 1;
        return $form['new_profile'];
            
        } else {
                $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 0;

                unset($form['new_profile']);
                $form['new_profile']=array(
                '#type'=>'hidden',
                '#value'=>'test_profile',
                '#prefix'=>'<div id="test_profile_wrapper">',
                '#suffix'=>'</div>'
                    );
                return $form['new_profile'];
            }
   
}

function ajx_load_saved_exam_profile($form, &$form_state){
     $selected_profile_id=$form_state['values']['profq_name'];
     if ($selected_profile_id == '0'){
       $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 0;
       
       $form['saved_profile']=array(
           '#type'=>'hidden',
           '#value'=>'test_profile',
           '#prefix'=>'<div id="test_profile_wrapper">',
           '#suffix'=>'</div>'
           
       );
       
       return $form['saved_profile'];
     } else {
        
     $_SESSION['TEST_PROFILE_DISPLAY_MODE'] = 2;
     $selected_profile = load_selected_test_profile($selected_profile_id);
    
     $form['saved_profile'] =array(
      '#type'=>'fieldset',
      '#title'=>t('Test Profile Name: '.$selected_profile['profq_name']),
      '#prefix'=>'<div id="test_profile_wrapper">',
      '#suffix'=>'</div>' 
    
    );    
    
    $form['saved_profile']['profq_test']=array(
        '#type'=>'markup',
        '#markup'=> print_selected_profq_test($selected_profile['profq_test']),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'   
    );
    
    $form['saved_profile']['profq_total']=array(
        '#type'=>'markup',
        '#markup'=> print_selected_profq_total($selected_profile['profq_total']),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'   
    );
    
    $form['saved_profile']['profq_duration']=array(
        '#type'=>'markup',
        '#markup'=> print_selected_profq_duration($selected_profile['profq_duration']),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'   
    );
    
    
    $form['saved_profile']['profq_test_mode']=array(
        '#type'=>'markup',
        '#markup'=> print_selected_test_mode($selected_profile['profq_test_mode']),
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'   
    );
    
    
    $form['saved_profile']['profq_composition']=array(
        '#type'=>'markup',
        '#markup'=> print_selected_test_composition(unserialize($selected_profile['profq_composition']))
    );
    
  return $form['saved_profile'];
    
  } 
    
    
    
}

function load_selected_test_profile($selected_profile_id){
    $result=  db_select('mcq_test_profiles','tp')
        ->fields('tp')
        ->condition('profq_id',$selected_profile_id)
        ->execute();
    
    $selected_profile = $result->fetchAssoc();
    return $selected_profile;
}

function create_new_profile_textfield_callback(&$form, &$form_state){
   unset($form);
    $form = mcq_test_config_form();
    
    if($form_state['values']['profq_create_new']==1) {  
       $form['profile_details']['profq_new_profile_name'] = array(
            '#type'=>'textfield',
            '#title'=>t('New Profile Name: '),
            '#prefix'=>'<div class="container-inline">',
            '#suffix'=>'</div>'
        );
       
       $form['profile_details']['profq_create_new']['#value']==1;
   } else unset($form['profile_details']['profq_new_profile_name']);
    
   return $form;
}
 
 */
