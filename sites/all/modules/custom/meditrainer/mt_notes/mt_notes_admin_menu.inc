<?php
function mt_notes_menu(){
    $items = array();
    
    $items['admin/meditrainer/notes'] = array(
    'title' => 'Notes',
    'description' => 'description',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_admin_function'),
    'access arguments' => array('administer site configuration'),
    );

    
    return $items;
    
}
?>
