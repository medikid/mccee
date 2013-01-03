<?php

function lotto_menu(){

    $items=array();
    
    $items['admin/lotto'] = array(
    'title' => 'Lotto',
    'description' => 'Lotto Core',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    'type' => MENU_LOCAL_TASK,
      'access callback' => true,
      'weight' => 11
    );

    $items['admin/lotto/manage'] = array(
        'title' => 'Lotto',
        'type' => MENU_DEFAULT_LOCAL_TASK,
        'description' => 'description',
        'weight' => -11,
    );
    
  

    return $items;
}

?>
