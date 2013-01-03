<?php

Function get_schema_lotto_keno_bets(&$schema){
    $schema['lotto_keno_bets'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'lkbid' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'uid' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'draw_number' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'live_bets_flag' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'live_bets_done' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'pattern_type' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'picks' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'matches' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'wager' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'win' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b1' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b2' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b3' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b4' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b5' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b6' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b7' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b8' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b9' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'b10' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'bonus' => array(
      'description' => 'TODO: please describe this field!',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('lkbid'),
);

}
?>
