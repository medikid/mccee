<?php
function QuestionNavigator_form($form, &$form_state){
   drupal_add_js(drupal_get_path('module', 'mt_exam') . '/js/QuestionNavigator.js');
   
    $form['mcq_viewer']=array(
      '#type'=>'fieldset',
      '#title'=>t('Question Sheet')
    );
    
    $form['mcq_viewer']['question_text']=array(     
			'#title' => t('1. '),
			'#type' => 'item',
			'#markup' => 'Question Text goes here',
                        '#prefix'=>'<div class="container-inline">',
                        '#suffix'=>'</div>',
    );
    
    $form['mcq_viewer']['choice_a']=array(
	'#type'=>'radio',
	'#field_prefix'=>'A. ',
	'#title'=>'Choice a Text'	
    );
    
    $form['mcq_viewer']['choice_b']=array(
	'#type'=>'radio',
	'#field_prefix'=>'B. ',
	'#title'=>'Choice b Text'	
    );
    
    $form['mcq_viewer']['choice_c']=array(
	'#type'=>'radio',
	'#field_prefix'=>'C. ',
	'#title'=>'Choice c Text'	
    );
    
    $form['mcq_viewer']['choice_d']=array(
	'#type'=>'radio',
	'#field_prefix'=>'D. ',
	'#title'=>'Choice d Text'	
    );
    
    $form['mcq_viewer']['choice_e']=array(
	'#type'=>'radio',
	'#field_prefix'=>'E. ',
	'#title'=>'Choice e Text'	
    );
    
    $form['notes_viewer']=array(
      '#type'=>'fieldset',
      '#title'=>t('Explanation')
    );
    
    $form['notes_viewer']['notes_text']=array(     
			'#title' => t('Correct Answer is A. '),
			'#type' => 'item',
			'#markup' => 'You answered A; however, the correct was A because....',
                        '#prefix'=>'<div class="container-inline">',
                        '#suffix'=>'</div>',
    );
    
    return $form;
    
}
?>
