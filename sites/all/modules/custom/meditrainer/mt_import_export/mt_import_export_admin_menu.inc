<?php
    
function mt_import_export_menu(){
    $items=array();


        $items['admin/meditrainer/import_export'] = array(
        'title' => 'Import/Export',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );

        $items['admin/meditrainer/import_export/import'] = array(
        'title' => 'Import',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('db_import_form'),
        'access arguments' => array('Import Tables or Objects'),
        );
        
        $items['admin/meditrainer/import_export/export'] = array(
        'title' => 'Export',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('db_export_form'),
        'access arguments' => array('Export tables or objects'),
        );
        
        $items['admin/meditrainer/import_export/backup'] = array(
        'title' => 'Backup',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );
        
    return $items;
}
?>