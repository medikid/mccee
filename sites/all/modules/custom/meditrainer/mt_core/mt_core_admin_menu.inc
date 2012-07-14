<?php

function mt_core_menu(){

    $items=array();
    
    $items['admin/meditrainer'] = array(
    'title' => 'Meditrainer',
    'description' => 'description',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );

    $items['admin/meditrainer/manage'] = array(
        'title' => 'Meditrainer',
        'type' => MENU_DEFAULT_LOCAL_TASK,
        'description' => 'description',
        'weight' => -10,
    );

    return $items;
}

?>
