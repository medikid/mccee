<?php

Function get_schema_lotto_max(&$schema){
   $schema['lotto_max'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'lmxid' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'draw_number' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'draw_sequence' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'draw_date' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n1' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n2' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n3' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n4' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n5' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n6' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'n7' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'bn' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
  ),
  'primary key' => array('lmxid'),
);
 
}
?>
