<?php

function get_lotto_keno_results_analysis_form($form, &$form_state){
    drupal_add_css(drupal_get_path('module', 'lotto') . '/css/number_grid.css', array('group' => CSS_DEFAULT, 'type' => 'file'));
    $form=array(
	'#prefix'=>'<div id="grid_form_wrapper">',
	'#suffix'=>'</div>'
	
    );
    $form['prev_btn']= array(
	'#type' => 'submit',
	'#value' => t('Prev'),
	'#prefix'=>'<div class="container-inline">',
	'#ajax' => array(
		'callback' => 'ajx_results_analysis_load_prev',
		'wrapper' => 'grid_form_wrapper',
		'method' => 'replace',
		'effect' => 'fade',
	      )
      );
    
    $form['lotto_stat_id'] = array(
	   '#type' => 'textfield',
	  '#title' => t('Stat ID:'),
	  '#default_value' => "",
	  '#size' => 12,
	  '#maxlength' => 12,
	   '#ajax' => array(
		'callback' => 'ajx_results_analysis_load',
		'wrapper' => 'grid_wrapper',
		'method' => 'replace',
		'effect' => 'fade',
	      )
	);
    $form['next_btn']= array(
	'#type' => 'submit',
	'#value' => t('Next'),
	'#suffix'=>'<div>',
	'#ajax' => array(
		'callback' => 'ajx_results_analysis_load_next',
		'wrapper' => 'grid_form_wrapper',
		'method' => 'replace',
		'effect' => 'fade',
	      )
      );  
    
    $form['grid']=array(
	'#type' => 'fieldset',
	'#title' => t('Results Analysis: '),
	'#collapsible' => TRUE,
	'#collapsed' => FALSE,
	'#prefix'=>'<div id="grid_wrapper" >',
	'#suffix'=>'</div>'
    );
    

    
    $form['grid']['result_grid'] = array(
	'#markup' => ''
    );
    
    $form['grid']['skipped_grid'] = array(
	'#markup' => ''
    );
    
    return $form;
}

function ajx_results_analysis_load($form, $form_state){
    $lotto_stat_id = $form_state['values']['lotto_stat_id'];
    $form['grid']['#collapsed'] = FALSE ;
    $form['grid']['#prefix']='<div id="grid_wrapper" >';
    $form['grid']['#suffix']='</div>';
    
    $form['grid']['result_grid']['#markup'] = lotto_result_grid_analysis('lotto_keno', $lotto_stat_id);
    $form['grid']['skipped_grid']['#markup'] = lotto_skipped_grid_analysis('lotto_keno', $lotto_stat_id);
    
    return $form['grid'];
}

function ajx_results_analysis_load_next($form, $form_state){
    $lotto_stat_id = $form_state['input']['lotto_stat_id'];
    $lotto_stat_id_next = $lotto_stat_id + 1;
    $form['lotto_stat_id']['#value'] = $lotto_stat_id_next;
    
    $form['grid']['#collapsed'] = FALSE ;
    $form['grid']['#prefix']='<div id="grid_wrapper" >';
    $form['grid']['#suffix']='</div>';
    
    $form['grid']['result_grid']['#markup'] = lotto_result_grid_analysis('lotto_keno', $lotto_stat_id_next);
    $form['grid']['skipped_grid']['#markup'] = lotto_skipped_grid_analysis('lotto_keno', $lotto_stat_id_next);
    
    return $form;
}
function ajx_results_analysis_load_prev($form, $form_state){
     $lotto_stat_id = $form_state['input']['lotto_stat_id'];
    $lotto_stat_id_prev = $lotto_stat_id - 1;
    $form['lotto_stat_id']['#value'] = $lotto_stat_id_prev;
    
    $form['grid']['#collapsed'] = FALSE ;
    $form['grid']['#prefix']='<div id="grid_wrapper" >';
    $form['grid']['#suffix']='</div>';
    
    $form['grid']['result_grid']['#markup'] = lotto_result_grid_analysis('lotto_keno', $lotto_stat_id_prev);
    $form['grid']['skipped_grid']['#markup'] = lotto_skipped_grid_analysis('lotto_keno', $lotto_stat_id_prev);
    
    return $form;
}
?>
