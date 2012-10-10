<?php

function get_schema_mcq_test_profiles(&$schema){
$schema['mcq_test_profiles'] = array(
    'description' => 'Stores User-Specific customized test profiles',
    'fields' => array(
      'tpid' => array(
	'description' => '',
	'type' => 'serial',
	'not null' => TRUE,
      ),
      'uid' => array(
	'description' => '',
	'type' => 'int',
	'not null' => TRUE,
      ),
      'tp_name' => array(
	'description' => '',
	'type' => 'varchar',
	'length' => '100',
	'not null' => TRUE,
      ),
      'tp_exam' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'tp_total' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'tp_duration' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'tp_test_mode' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'tp_is_customized' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'tp_composition' => array(
	'description' => '',
	'type' => 'blob',
	'not null' => FALSE,
      ),
      'tp_is_user_default' => array(
	'description' => '',
	'type' => 'int',
	'not null' => FALSE,
      ),
    ),
    'primary key' => array('tpid'),
  );


}