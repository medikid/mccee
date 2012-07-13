<?php


function setup_mcq_add_form(&$form, &$form_state){
//question category
drupal_add_js(drupal_get_path('module', 'mt_mcq') . '/js/mcq_add_form.js');
  $form['save_btn'] = array(
    '#type'=>'submit',
       '#value'=>t('Save'),
      '#submit'=>  array('node_form_submit')
   );
    $node = $form['#node'];
    
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
                        '#prefix'=>'    '
                        
         );
        
        $form['question_category']['rating'] = array(
			'#type' => 'select',
                        '#title' => t('Rating: '),
                        '#options' => dropdown_mcq_rating(),
                        '#default_value' => !empty($node->rating) ? $node->rating : '',
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
                        '#rows'=>1,
                        '#suffix'=>'</div>',
        );
        
        $form['notes'] = array(
			'#type' => 'fieldset',
                        '#title' => t('Notes')
         );
        
        $form['notes']['notes'] = array(
			'#title' => t('Notes: '),
			'#type' => 'textarea',
			'#required' => FALSE,
			'#default_value' => !empty($node->notes) ? $node->notes : '',
                        '#rows'=>10
        );
        
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

function dropdown_mcq_rating(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('rating');
    return $options;
}
