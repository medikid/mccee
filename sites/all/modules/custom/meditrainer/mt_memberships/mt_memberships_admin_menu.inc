<?php
function mt_memberships_menu(){
    $items = array();
    
    $items['admin/meditrainer/memberships'] = array(
    'title' => 'Memberships',
    'description' => 'description',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );

    
    return $items;
    
}
?>
