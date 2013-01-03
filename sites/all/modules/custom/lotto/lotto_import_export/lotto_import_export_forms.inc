<?php

function lotto_import_form($form, &$form_state){
    drupal_add_library('system', 'ui.slider');
    
    $form=array();   
    
   
    $form['data_file_name']=array(
	'#type' => 'select',
            '#title' => t('Table Name:'),
            '#options' => dropdown_data_file_name(),
	    '#suffix'=>'<div id="range-slider" ></div>'
    );
    
    $form['table_name'] = array(
	'#type' => 'select',
            '#title' => t('Table Name:'),
            '#options' => dropdown_lotto_table_name(),         
    );
    

    
    $form['submit'] = array(
         '#type'=>'submit',
         '#value' => t('Import'),
         '#submit' => array('import_data_file')
     );
    
   
   
    return $form;
}

function import_data_file($form, $form_state){
 $file_to_import = $form_state['values']['data_file_name'];
   switch($file_to_import){
       case 1:
	   lotto_data_upload_from_csv('lotto_import_export', 'lotto_max', 'LOTTOMAX');
	   break;
       case 2:
	   lotto_data_upload_from_csv('lotto_import_export', 'lotto_max_extra', 'LOTTOMAXExtra');
	   break;
       case 3:
	   lotto_data_upload_from_csv('lotto_import_export', 'lotto_keno', 'YearlyAKeno');
	   break;
       case 4:
	   lotto_data_upload_from_csv('lotto_import_export', 'lotto_keno', 'YearlyBKeno');
	   break;
   }
    
}

function dropdown_lotto_table_name(){
    $db_tables = array(
	1=>'lotto_max',
	2=>'lotto_max_extra',
	3=>'lotto_keno'
    );
    
    return $db_tables;
}

function dropdown_data_file_name(){
    $data_file_name = array(
	1=>'lotto_max',
	2=>'lotto_max_extra',
	3=>'lotto_keno_A',
	4=>'lotto_keno_B'
    );
    
    return $data_file_name;
}


?>
