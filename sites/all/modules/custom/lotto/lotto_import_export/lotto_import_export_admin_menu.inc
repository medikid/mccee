<?php
function lotto_import_export_menu(){
    $items=array();


        $items['admin/lotto/import_export'] = array(
        'title' => 'Import/Export',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );

        $items['admin/lotto/import_export/import'] = array(
        'title' => 'Import',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('lotto_import_form'),
        'access arguments' => array('Import Tables or Objects'),
        );
	
	return $items;
}
?>
