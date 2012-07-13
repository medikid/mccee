<?php

function get_schema_mt_codelist(&$schema){

    $schema['mt_codelist'] = array(
  'description' => 'Table to store codelist library',
  'fields' => array(
    'code_id' => array(
      'description' => 'Codelist index id',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'cat' => array(
      'description' => 'Equivalent to class(ex Membership Types)',
      'type' => 'varchar',
      'length' => '50',
      'not null' => TRUE,
    ),
    'sub_cat' => array(
      'description' => 'class variable name(ex mem_type)',
      'type' => 'varchar',
      'length' => '50',
      'not null' => FALSE,
    ),
    'name' => array(
      'description' => 'object(value) name(ex 15 Days Regular)',
      'type' => 'varchar',
      'length' => '200',
      'not null' => TRUE,
    ),
    'sub_name' => array(
      'description' => 'object property (ex Price)',
      'type' => 'varchar',
      'length' => '200',
      'not null' => FALSE,
    ),
    'code' => array(
      'description' => 'Key (ex 2)',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'sub_code' => array(
      'description' => 'Object Property Value(ex 15.00)',
      'type' => 'varchar',
      'length' => '10',
      'not null' => FALSE,
    ),
    'code_dependency' => array(
      'description' => 'Code value if depent on any code ids',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'sub_code_dependency' => array(
      'description' => 'dependency codeids for subcode(ex YN code is used for yes/no values)',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'disabled' => array(
      'description' => '1=true if disabled',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'date_disabled' => array(
      'description' => 'timestamp when codeids disabled',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('code_id'),
);
  
return $schema; 
};