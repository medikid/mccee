<?php
function QuestionNavigator_form($form, &$form_state){
   drupal_add_js(drupal_get_path('module', 'mt_exam') . '/js/QuestionNavigator.js');
   drupal_add_js(drupal_get_path('module', 'mt_exam') . '/js/mt_timer.js');
   
   $as = new AnswerSheet(1,1);
   
    $form['mcq_viewer']=array(
      '#type'=>'fieldset',
      '#title'=>t('Question Sheet'),
	'#prefix'=>'<div id="q_viewer_wrapper">'	
    );
    
    $form['mcq_viewer']['qnav'] = array(
	'#type'=>'fieldset',
	'#title'=>t('Nav List')
	 );
    $form['mcq_viewer']['qnav']['qnav_html'] = array(
	'#type'=>'item',
	'#markup'=>t($as->get_qnav_html())
	 );
    
     $form['mcq_viewer']['timer'] = array(
	'#type'=>'fieldset',
	'#title'=>t('Timer')
	 );
	    
   $form['mcq_viewer']['timer']['time']=array(
       '#type'=>'markup',
       '#markup'=>'<div class="timer" id="time"></div>',
       '#prefix'=>'<div class="container-inline">',
       '#suffix'=>'</div>'
   );
   
   $form['mcq_viewer']['timer']['time_total']=array(
       '#type'=>'hidden',
       '#value'=> 122 * 60
   );
   
   $form['mcq_viewer']['timer']['time_remaining']=array(
       '#type'=>'hidden',
       '#value'=> 122 * 60,
       '#suffix'=>'<script type="text/javascript"> 
	   var Timer = jQuery.timer();
	   Timer.init();
	   Timer.start();
	</script>'
   );
   
   $form['mcq_viewer']['timer']['time']=array(
       '#type'=>'markup',
       '#markup'=>'<div class="timer" id="time"></div>',
       '#prefix'=>'<div class="container-inline">',
       '#suffix'=>'</div>'
   );
   $form['mcq_viewer']['navigation']=array(
	'#type'=>'fieldset',
	'#title'=>t('Navigation')
    );
   
   $form['mcq_viewer']['navigation']['q_current']=array(
	'#type'=>'item',
	'#markup'=>1,
	'#prefix'=>'<div class="container-inline">'
    );
   $form['mcq_viewer']['navigation']['q_total']=array(
	'#type'=>'item',
	'#markup'=>100,
	'#prefix'=>' / ',
	'#suffix'=>'</div>',
    );
   
   $form['mcq_viewer']['question'] = array(
	'#type'=>'fieldset',
	'#title'=>t('Question')
	 );
       
    $form['mcq_viewer']['question']['question_text']=array(     
			'#title' => t('1. '),
			'#type' => 'item',
			'#markup' => 'Question Text goes here',
                        '#prefix'=>'<div class="container-inline">',
                        '#suffix'=>'</div>',
    );
    
    $form['mcq_viewer']['question']['choice_a']=array(
	'#type'=>'radio',
	'#field_prefix'=>'A. ',
	'#title'=>'Choice a Text'	
    );
    
    $form['mcq_viewer']['question']['choice_b']=array(
	'#type'=>'radio',
	'#field_prefix'=>'B. ',
	'#title'=>'Choice b Text'	
    );
    
    $form['mcq_viewer']['question']['choice_c']=array(
	'#type'=>'radio',
	'#field_prefix'=>'C. ',
	'#title'=>'Choice c Text'	
    );
    
    $form['mcq_viewer']['question']['choice_d']=array(
	'#type'=>'radio',
	'#field_prefix'=>'D. ',
	'#title'=>'Choice d Text'	
    );
    
    $form['mcq_viewer']['question']['choice_e']=array(
	'#type'=>'radio',
	'#field_prefix'=>'E. ',
	'#title'=>'Choice e Text'	
    );
    
    $form['mcq_viewer']['notes_viewer']=array(
      '#type'=>'fieldset',
      '#title'=>t('Explanation')
    );
    
    $form['mcq_viewer']['notes_viewer']['notes_text']=array(     
			'#title' => t('Correct Answer is A. '),
			'#type' => 'item',
			'#markup' => 'You answered A; however, the correct was A because....',
                        '#prefix'=>'<div class="container-inline">',
                        '#suffix'=>'</div>',
    );
    
    $form['mcq_viewer']['nav_buttons']=array(
    '#type'=>'fieldset',
      '#title'=>t('Buttons'),
	'#ajax' => array(
	    'callback' => 'ajx_get_prev_q',
	    'wrapper' => 'q_viewer',
	    'effect' => 'fade',
	    'method' => 'replace',
	    'prevent' => 'mousedown'
	    )
    );
    $form['mcq_viewer']['nav_buttons']['prev']=array(
	'#type' => 'submit', 
	'#value' => t('Prev'),
	'#ajax' => array(
	    'callback' => 'ajx_get_prev_q',
	    'wrapper' => 'q_viewer_wrapper',
	    'method' => 'replace'
	    )
    );
    
    $form['mcq_viewer']['nav_buttons']['submit']=array(
	'#type' => 'submit', 
	'#value' => t('Submit Answer'),
	'#ajax' => array(
	    'callback' => 'ajx_get_subm_q',
	    'wrapper' => 'q_viewer_wrapper',
	    'method' => 'replace'
	    )
	);
    
    $form['mcq_viewer']['nav_buttons']['next']=array(
	'#type' => 'submit', 
	'#value' => t('Next'),
	'#ajax' => array(
	    'callback' => 'ajx_get_next_q',
	    'wrapper' => 'q_viewer_wrapper',
	    'method' => 'replace'
	    ),
	'#suffix'=>'</div>'
     
    ); 
    
    return $form;
    
}

function ajx_get_subm_q($form, &$form_state){
print_r($form);
}

function ajx_get_next_q($form, &$form_state){
    $form['mcq_viewer'] = reset_q_viewer($form);
    $form['mcq_viewer']['navigation']['q_current']['#markup'] = 2;
    
    return $form['mcq_viewer'];
    
}

function ajx_get_prev_q($form, &$form_state){
    $form['mcq_viewer'] = reset_q_viewer($form);
    $form['mcq_viewer']['navigation']['q_current']['#markup']= 0;
    
    return $form['mcq_viewer'];
}

function reset_q_viewer($form){
    $form['mcq_viewer']['question_text']['#title'] = '';
    $form['mcq_viewer']['question_text']['#markup'] = '';
    
    $form['mcq_viewer']['choice_a']['#title'] = '';
    $form['mcq_viewer']['choice_b']['#title'] = '';
    $form['mcq_viewer']['choice_c']['#title'] = '';
    $form['mcq_viewer']['choice_d']['#title'] = '';    
    $form['mcq_viewer']['choice_e']['#title'] = '';
    
    $form['mcq_viewer']['notes_viewer']['#title'] = '';
    
    $form['mcq_viewer']['notes_viewer']['notes_text']['#title'] = '';
    $form['mcq_viewer']['notes_viewer']['notes_text']['#markup'] = '';
    
    return $form['mcq_viewer'];
}

function get_q_nav_html(){
    
}

?>
