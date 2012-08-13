<?php

function mt_mcq_menu(){
    $items=array();
    
    $items['admin/meditrainer/mcq'] = array(
    'title' => 'MCQ',
    'description' => 'description',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('setup_mt_mcq_add_form'),
    'access arguments' => array('administer site configuration'),
    );

     $items['admin/meditrainer/mcq/add'] = array(
    'title' => 'Add',
    'description' => 'Add Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('setup_mt_mcq_add_form'),
    'access arguments' => array('Add MCQ to question bank'),
    );
     
    $items['admin/meditrainer/mcq/edit'] = array(
    'title' => 'Edit',
    'description' => 'Edit Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('setup_mt_mcq_add_form'),
    'access arguments' => array('administer site configuration'),
    );
    
     $items['admin/meditrainer/mcq/delete'] = array(
    'title' => 'Delete',
    'description' => 'Delete Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('setup_mt_mcq_add_form'),
    'access arguments' => array('administer site configuration'),
    );
     
     $items['admin/meditrainer/mcq/extract'] = array(
    'title' => 'Extract',
    'description' => 'Extract MCQ from dummy text',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('mcq_extract_dummytext_form'),
    'access arguments' => array('administer site configuration'),
    );
     
     $items['admin/meditrainer/mcq/extract/dummytext'] = array(
    'title' => 'From Dummy Text',
    'description' => 'Extract MCQ from dummy text',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('mcq_extract_dummytext_form'),
    'access arguments' => array('administer site configuration'),
    );
     
     $items['admin/meditrainer/mcq/extract/dummydb'] = array(
    'title' => 'From Dummy Database',
    'description' => 'Extract MCQ from dummy mcq database',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('mcq_extract_dummytext_form'),
    'access arguments' => array('administer site configuration'),
    );
      
    $items['mcq/import'] = array(
    'title' => 'Import Question Bank',
    'description' => 'Import MQC Question Bank.',
    'file'=>'mcq_import_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('mcq_import_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );
    
    $items['mcq/manage'] = array(
    'title' => 'Administer Question Bank',
    'description' => 'Administer MQC Question Bank.',
    'file'=>'mcq_manage_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('mcq_manage_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );

return $items;

}

?>
