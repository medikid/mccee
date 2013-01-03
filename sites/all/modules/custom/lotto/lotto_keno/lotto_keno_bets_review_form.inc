<?php

function get_lotto_keno_bets_review_form($form, &$form_state){
    drupal_add_css(drupal_get_path('module', 'lotto') . '/css/number_grid.css', array('group' => CSS_DEFAULT, 'type' => 'file'));
    
    $form = array();
    $bets_grid_all = lotto_bets_grid_create('lotto_keno');
    $form['current_draw_number']=array(
	'#type'=>  'textfield',
	'#title'=>t("Current Draw#: "),
	'#default_value'=> getKenoCurrentDrawNumber(),
	'#size'=> 11	
    );
    
    $form['bets_grid'] = array(
	'#markup'=>$bets_grid_all
    );
    
    return $form;
}

function getKenoCurrentDrawNumber(){
    $results = lotto_last_result_available('lotto_keno');
    $lastDrawNumber = $results['draw_number'];
    $nextDrawNumber = $lastDrawNumber + 1;
    
    return $nextDrawNumber;
}
?>
