<?php


function setup_mt_mcq_add_form($form, &$form_state){
            $node = new stdClass();
            $node->type = 'mcq';
            node_object_prepare($node); //prepare a generic node
            $form['#node'] = $node;
            
            mt_mcq_node_form($form, $form_state);
            
            $form['action_mcq'] = array(
                '#type'=>'submit',
                '#value'=>t('Save'),
                '#submit'=>  array('setup_mt_mcq_add_form_submit')
            );

            return $form;
        
}

function mt_mcq_node_form(&$form, &$form_state){
//question category
drupal_add_js(drupal_get_path('module', 'mt_mcq') . '/js/mt_mcq_add_form.js');
  
        if( isset($form['#node'])  ){
            $node = $form['#node'];
        } 
            
        
        $form['question_category'] = array(
			'#type' => 'fieldset',
                        '#title' => t('Question Category ')
         );
              
        $form['question_category']['speciality'] = array(
			'#type' => 'select',
                        '#title' => t('Speciality: '),
                        '#options' => dropdown_mcq_speciality(),
                        '#default_value' => !empty($node->speciality) ? $node->speciality : '',
                        '#prefix'=>'<div class="container-inline">',
         );
        
        $form['question_category']['sub_speciality'] = array(
			'#type' => 'select',
                        '#title' => t('Sub Speciality: '),
                        '#options' => dropdown_mcq_sub_speciality(),
                        '#default_value' => !empty($node->sub_speciality) ? $node->sub_speciality : '',
                        
         );
        
        $form['question_category']['conf_rating'] = array(
			'#type' => 'select',
                        '#title' => t('Rating(Confidence): '),
                        '#options' => dropdown_mcq_conf_rating(),
                        '#default_value' => !empty($node->conf_rating) ? $node->conf_rating : '',
         );
        
        $form['question_category']['expert_level'] = array(
			'#type' => 'select',
                        '#title' => t('Expert Level: '),
                        '#options' => dropdown_expert_level(),
                        '#default_value' => !empty($node->expert_level) ? $node->expert_level : '',
                        '#suffix'=>'</div><div></br></div>',
         );
        $form['question_category']['aspiring_exam'] = array(
			'#type' => 'select',
                        '#title' => t('Exam: '),
                        '#options' => dropdown_aspiring_exam(),
                        '#default_value' => !empty($node->exam) ? $node->exam : '',
                        '#prefix'=>'<div class="container-inline">',
         );
        
        $form['question_category']['aspiring_exam_can'] = array(
			'#type' => 'select',
                        '#title' => t('Exam Step(MCC): '),
                        '#options' => dropdown_aspiring_exam_can(),
                        '#default_value' => !empty($node->exam_part) ? $node->exam_part : '',
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="aspiring_exam"]' => array('value' => 2)
                                )
                            ),
         );
         $form['question_category']['aspiring_exam_us'] = array(
			'#type' => 'select',
                        '#title' => t('Exam Step (USMLE): '),
                        '#options' => dropdown_aspiring_exam_us(),
                        '#default_value' => !empty($node->exam_part) ? $node->exam_part : '',
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="aspiring_exam"]' => array('value' => 3)
                                )
                            ),
         );
         $form['question_category']['aspiring_exam_uk'] = array(
			'#type' => 'select',
                        '#title' => t('Exam Step (PLAB): '),
                        '#options' => dropdown_aspiring_exam_uk(), 
                        '#default_value' => !empty($node->exam_part) ? $node->exam_part : '',
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="aspiring_exam"]' => array('value' => 4)
                                )
                            ),
         );
         $form['question_category']['aspiring_exam_au'] = array(
			'#type' => 'select',
                        '#title' => t('Exam Step (AMC): '),
                        '#options' => dropdown_aspiring_exam_au(), 
                        '#default_value' => !empty($node->exam_part) ? $node->exam_part : '',
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="aspiring_exam"]' => array('value' => 5)
                                )
                            ),
                        '#suffix'=>'</div>',
         );
        
        
        $form['question'] = array(
			'#type' => 'fieldset',
                        '#title' => t('Question')
         );
        
        $form['question']['question_text'] = array(
			'#title' => t('Question Text'),
			'#type' => 'textarea',
			'#required' => TRUE,
			'#default_value' => !empty($node->question_text) ? $node->question_text : '',
                        '#rows'=>5,
                        '#cols'=>30,
                        '#prefix'=>'<div class="container-inline">',
                        '#suffix'=>'</div>',
        );
        $form['question']['question_media_yn'] = array(
                        '#title' => t('include media in question'),
                        '#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->question_media_yn)) ? 1 : 0,
        );
        
        $form['answers'] = array(
			'#type' => 'fieldset',
                        '#title' => t('Answers')
         );
        
        
        $form['answers']['answer_a'] = array(
			'#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->answer) && $node->answer=='a') ? 1 : 0,
         );
        
        $form['answers']['choice_a'] = array(
			'#title' => t('A.'),
			'#type' => 'textarea',
			'#required' => TRUE,
			'#default_value' => !empty($node->choice_a) ? $node->choice_a : '',
                        '#rows'=>1
        );
         $form['answers']['notes_a'] = array(
			'#title' => t('Notes A:'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->notes_a) ? $node->notes_a : '',
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
        $form['answers']['answer_b'] = array(
			'#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->answer) && $node->answer=='b')  ? 1 : 0
         );
        
       $form['answers']['choice_b'] = array(
			'#title' => t('B.'),
			'#type' => 'textarea',
			'#required' => TRUE,
			'#default_value' => !empty($node->choice_b) ? $node->choice_b : '',
                        '#rows'=>1
        );
         $form['answers']['notes_b'] = array(
			'#title' => t('Notes B:'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->notes_b) ? $node->notes_b : '',
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
       $form['answers']['answer_c'] = array(
			'#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->answer) && $node->answer=='c') ? 1 : 0
        );
       
        $form['answers']['choice_c'] = array(
			'#title' => t('C.'),
			'#type' => 'textarea',
			'#required' => TRUE,
			'#default_value' => !empty($node->choice_c) ? $node->choice_c : '',
                        '#rows'=>1
        );
         $form['answers']['notes_c'] = array(
			'#title' => t('Notes C:'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->notes_c) ? $node->notes_c : '',
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
        
        $form['answers']['answer_d'] = array(
			'#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->answer) && $node->answer=='d') ? 1 : 0
         );
        
        $form['answers']['choice_d'] = array(
			'#title' => t('D.'),
			'#type' => 'textarea',
			'#required' => TRUE,
			'#default_value' => !empty($node->choice_d) ? $node->choice_d : '',
                        '#rows'=>1
        );
         $form['answers']['notes_d'] = array(
			'#title' => t('Notes D:'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->notes_d) ? $node->notes_d : '',
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
        
        
        $form['answers']['answer_e'] = array(
			'#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->answer) && $node->answer=='e') ? 1 : 0
         );
        
        $form['answers']['choice_e'] = array(
			'#title' => t('E.'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->choice_e) ? $node->choice_e : '',
                        '#rows'=>1
        );
         $form['answers']['notes_e'] = array(
			'#title' => t('Notes E:'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->notes_e) ? $node->notes_e : '',
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
        
        $form['notes'] = array(
			'#type' => 'fieldset',
                        '#title' => t('Notes')
         );
        
        
        $form['notes']['additional_notes_yn'] = array(
                        '#title' => t('Any additional notes?:'),
                        '#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->additional_notes_yn)) ? 1 : 0,
        );
        
        $form['notes']['notes'] = array(
			'#title' => t('Notes: '),
			'#type' => 'textarea',
			'#required' => FALSE,
			'#default_value' => !empty($node->notes) ? $node->notes : '',
                        '#rows'=>5,
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="additional_notes_yn"]' => array('checked' => true)
                                )
                            ),
        );
        $form['notes']['hints_yn'] = array(
                        '#title' => t('Any hints?:'),
                        '#type' => 'checkbox',
                        '#prefix'=>'<div class="container-inline">',
                        '#default_value'=>(isset($node->hints_yn)) ? 1 : 0,
        );
        
        $form['notes']['hints'] = array(
			'#title' => t('Hint #1'),
			'#type' => 'textarea',
			'#default_value' => !empty($node->hints) ? $node->hints : '',
                        '#rows'=>1,
                        '#states' => array(
                            // Hide the settings when the cancel notify checkbox is disabled.
                            'visible' => array(
                            ':input[name="hints_yn"]' => array('checked' => true)
                                )
                            ),
        );
        
        /* //no need to add submitt button or return form as this is called from hook_form_alter(node_add_form)
         if (!isset($form['#node'])){
            
             $form['action_mcq'] = array(
                '#type'=>'submit',
                '#value'=>t('Save'),
                '#submit'=>  array('setup_mt_mcq_add_form_submit')
            );

            return $form;
          }
         */
        
}


function setup_mt_mcq_add_form_submit($form, &$form_state){
    //echo '<pre>'.print_r($form_state).'</pre>';
    echo 'node';
      $node =  prepare_node_from_mcq_form($form_state['values']);
     if ($form_state['values']['action_mcq'] ==  'Save'){ 
      //save node
       node_save($node);
    }
}

function dropdown_mcq_speciality(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('speciality');
    return $options;
}

function dropdown_mcq_sub_speciality(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('sub_speciality');
    return $options;
}

function dropdown_mcq_conf_rating(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('conf_rating');
    return $options;
}

function dropdown_aspiring_exam(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam');
    return $options;
}

function dropdown_aspiring_exam_us(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam_us');
    return $options;
}

function dropdown_aspiring_exam_uk(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam_uk');
    return $options;
}

function dropdown_aspiring_exam_au(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam_au');
    return $options;
}

function dropdown_expert_level(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('expert_level');
    return $options;
}