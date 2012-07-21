<?php

function get_schema_mcq_question_bank(&$schema){
   
    $schema['mcq_question_bank'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'qid' => array(
      'description' => 'Question Index - unique number',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'nid' => array(
      'description' => 'Node ID that corresponds to each node entry in node table',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'vid' => array(
      'description' => 'Version ID for each node',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'question_text' => array(
      'description' => 'Question text',
      'type' => 'varchar',
      'length' => '9999',
      'not null' => TRUE,
    ),
    'choice_a' => array(
      'description' => 'Choice A',
      'type' => 'varchar',
      'length' => '999',
      'not null' => TRUE,
    ),
    'choice_b' => array(
      'description' => 'Choice B',
      'type' => 'varchar',
      'length' => '999',
      'not null' => TRUE,
    ),
    'choice_c' => array(
      'description' => 'Choice C',
      'type' => 'varchar',
      'length' => '999',
      'not null' => TRUE,
    ),
    'choice_d' => array(
      'description' => 'Choice D',
      'type' => 'varchar',
      'length' => '999',
      'not null' => TRUE,
    ),
    'choice_e' => array(
      'description' => 'Choice E',
      'type' => 'varchar',
      'length' => '999',
      'not null' => FALSE,
    ),
    'question_media_yn' => array(
      'description' => 'Media item present in question yes/no',
      'type' => 'int',
      'size' => 'tiny',
      'not null' => FALSE,
    ),
    'speciality' => array(
      'description' => 'Main Speciality',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'sub_speciality' => array(
      'description' => 'Sub Speciality under the main speciality',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('qid'),
);
      
}