<?php

function get_schema_mcq_test_profiles(&$schema){

    $schema['mcq_test_profiles'] = array(
  'description' => 'Stores User-Specific customized test profiles',
  'fields' => array(
    'profq_id' => array(
      'description' => '',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'uid' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'profq_name' => array(
      'description' => '',
      'type' => 'varchar',
      'length' => '100',
      'not null' => TRUE,
    ),
    'profq_test' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'profq_total' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'profq_duration' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'profq_test_mode' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),      
    'profq_customize' => array(
      'description' => '',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'profq_composition' => array(
      'description' => '',
      'type' => 'blob',
      'not null' => TRUE,
    ),
    'profq_user_default' => array(
      'description' => '',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('profq_id'),
);

}