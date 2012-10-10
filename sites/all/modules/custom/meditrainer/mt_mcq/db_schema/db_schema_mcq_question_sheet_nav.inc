<?php
function get_schema_mcq_question_sheet_nav(&$schema){
$schema['mcq_question_sheet_nav'] = array(
  'description' => '',
  'fields' => array(
    'qsnid' => array(
      'description' => '',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'uid' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'qsid' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'qn' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'is_current' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'fl' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'vw' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'va' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
      'default' => 0,
    ),
    'submitted_time' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'dur' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('qsnid'),
);
}

?>
