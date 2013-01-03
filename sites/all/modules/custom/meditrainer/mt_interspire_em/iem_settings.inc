<?php

function iem_settings_load(){
    $iem_settings = array();
    $query = db_select('mt_codelist', 'mtc')
		->fields('mtc')
		->condition('cat', 'mt_interspire_em')
		->condition('sub_cat', 'iem_settings')
		->execute();    
    
    while ($result=$query->fetchAssoc()){
	    $iem_settings[$result['name']] = $result['sub_name'];	
    }
    return $iem_settings;    
}

function iem_settings_load_from_csv(){
    $csv_file_path = realpath(".") ."/".get_csv_data_filepath('mt_interspire_em', 'mt_codelist');

    $data = load_csv('mt_codelist', $csv_file_path);
    $iem_settings_csv = array();
    foreach($data['mt_codelist'] as $row){
	$iem_settings_csv[$row['name']] = $row['sub_name'];
    }
    return $iem_settings_csv;
}
?>
