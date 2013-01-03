<?php


function get_lotto_keno_results_sync_form($form, &$form_state) {
    $form=array();
    
    $last_result = lotto_last_result_available('lotto_keno');
    
    $form['sync_results']=array(
	'#type'=>'button',
	'#value'=>'Sync Results',
	'#ajax'=>array(
	    'callback' => 'ajx_keno_results_sync',
	    'wrapper'=>'ajx_keno_results_wrapper',
	    'method'=>'replace'
	)
    );
    
    $form['keno_results'] = array(
	'#type' => 'fieldset',
	'#title' => t('Keno results: '),
	'#prefix'=>'<div id="ajx_keno_results_wrapper" >',
	'#suffix'=>'</div>'
    );
    
    $form['keno_results']['draw_date_time'] = array(
	'#type' => 'textfield',
	'#title' => t('Draw Date/Time:'),
	'#value'=> date('Y-m-d h:i:s A', $last_result['draw_date'])

	);
    
     $form['keno_results']['draw_id'] = array(
	 '#type' => 'textfield',
	'#title' => t('Draw ID:'),
	 '#value'=>$last_result['draw_number']

	);

    return $form;
}

function ajx_keno_results_sync($form, &$form_state){
    lotto_results_get_uptodate('lotto_keno');
    lotto_stats_get_uptodate('lotto_keno');
    $last_result = lotto_last_result_available('lotto_keno');
    
    $form['keno_results']['draw_date_time']['#value'] = date('Y-m-d h:i:s A', $last_result['draw_date']);
    $form['keno_results']['draw_id']['#value'] = $last_result['draw_number'];
    
    return $form['keno_results'];
}


?>
