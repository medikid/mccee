<?php

function get_schema_dummy_mcq(&$schema){ 
$schema['dummy_mcq'] = array(
  'description' => 'TODO: please describe this table!',
  'fields' => array(
    'dummy_mcq_id' => array(
      'description' => 'Dummy mcq database',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'processed' => array(
      'description' => 'Dummy mcq database',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'd_qid' => array(
      'description' => 'Dummy mcq database',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'd_complete_text' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '9999',
      'not null' => FALSE,
    ),
    'd_question_text' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_choice_a' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '9999',
      'not null' => FALSE,
    ),
    'd_choice_b' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_choice_c' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_choice_d' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_choice_e' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_question_media_yn' => array(
      'description' => 'Dummy mcq database',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'd_answer' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'length' => '1',
      'not null' => FALSE,
    ),
    'd_notes' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '9999',
      'not null' => FALSE,
    ),
    'd_notes_a' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_notes_b' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_notes_c' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_notes_d' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_notes_e' => array(
      'description' => 'Dummy mcq database',
      'type' => 'varchar',
      'type' => 'text',
      'length' => '999',
      'not null' => FALSE,
    ),
    'd_hints_yn' => array(
      'description' => 'Dummy mcq database',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('dummy_mcq_id'),
);
}
?>
