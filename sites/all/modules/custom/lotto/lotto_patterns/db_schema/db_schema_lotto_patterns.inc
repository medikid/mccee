<?php

Function get_schema_lotto_patterns(&$schema){
    $schema['lotto_patterns'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'lpid' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'lottery_name' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'text',
      'not null' => TRUE,
    ),
    'lottery_id' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'num' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'diag_step_up' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '11',
      'not null' => FALSE,
    ),
    'pillar_down' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '11',
      'not null' => FALSE,
    ),
    'diag_step_down' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '11',
      'not null' => FALSE,
    ),
    'diag_und_step_up' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '11',
      'not null' => FALSE,
    ),
    'diag_und_step_down' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'varchar',
      'length' => '11',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('lpid'),
);

}
?>
