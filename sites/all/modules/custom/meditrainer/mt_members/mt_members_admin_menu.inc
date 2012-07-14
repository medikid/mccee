<?php

function mt_members_menu(){

    $items=array();
    
    $items['admin/meditrainer/members'] = array(
    'title' => 'Members',
    'description' => 'description',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );

     $items['admin/meditrainer/members/add'] = array(
    'title' => 'Add',
    'description' => 'Add Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );
     
    $items['admin/meditrainer/members/edit'] = array(
    'title' => 'Edit',
    'description' => 'Edit Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );
    
     $items['admin/meditrainer/members/delete'] = array(
    'title' => 'Delete',
    'description' => 'Delete Members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
);

return $items;
}

?>
