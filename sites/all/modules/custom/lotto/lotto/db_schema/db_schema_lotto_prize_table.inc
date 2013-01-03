<?php

function get_schema_lotto_prize_table(&$schema){
$schema['lotto_prize_table'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'lptid' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'lottery_name' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '20',
      'not null' => TRUE,
    ),
    'picks' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'matches' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'bonus' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'win' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
  ),
  'primary key' => array('lptid'),
);   
    
}
?>
