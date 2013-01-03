<?php

function get_lotto_keno_results_form($form, &$form_state){
    drupal_add_css(drupal_get_path('module', 'lotto') . '/css/number_grid.css', array('group' => CSS_DEFAULT, 'type' => 'file'));
    
    $form=array();
    
    $form['pattern_grid'] = array(
	//'#markup'=> lotto_results_grid_create('lotto_keno', $results)
	'#markup'=> lotto_pattern_grid_create("lotto_keno")
    );
    
    return $form;
}
?>
