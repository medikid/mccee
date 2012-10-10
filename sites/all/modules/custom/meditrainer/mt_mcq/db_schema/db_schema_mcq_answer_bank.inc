<?php

function get_schema_mcq_answer_bank(&$schema){
    $schema['mcq_answer_bank'] = array(
    'description' => 'Table catures answer and notes inputs',
    'fields' => array(
      'qid' => array(
	'description' => 'answer entry for coresponding qid in question bank',
	'type' => 'int',
	'not null' => TRUE,
      ),
      'answer' => array(
	'description' => 'answer key',
	'type' => 'varchar',
	'length' => '1',
	'not null' => FALSE,
      ),
      'conf_rating' => array(
	'description' => 'rating for each answer entry',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'notes' => array(
	'description' => 'notes - explaination for chosen for answer',
	'type' => 'varchar',
	'length' => '9999',
	'not null' => FALSE,
      ),
      'notes_a' => array(
	'description' => 'Notes for answer a',
	'type' => 'text',
	'size' => 'medium',
	'not null' => FALSE,
      ),
      'notes_b' => array(
	'description' => 'Notes for answer b',
	'type' => 'text',
	'size' => 'medium',
	'not null' => FALSE,
      ),
      'notes_c' => array(
	'description' => 'Notes for answer c',
	'type' => 'text',
	'size' => 'medium',
	'not null' => FALSE,
      ),
      'notes_d' => array(
	'description' => 'Notes for answer d',
	'type' => 'text',
	'size' => 'medium',
	'not null' => FALSE,
      ),
      'notes_e' => array(
	'description' => 'Notes for answer e',
	'type' => 'text',
	'size' => 'medium',
	'not null' => FALSE,
      ),
      'exam' => array(
	'description' => 'Related exam type',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'exam_level' => array(
	'description' => 'Sub part of the exam',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'expert_level' => array(
	'description' => 'Expert level required for this question',
	'type' => 'int',
	'not null' => FALSE,
      ),
      'hints_yn' => array(
	'description' => 'hints present yes/no',
	'type' => 'int',
	'size' => 'tiny',
	'not null' => FALSE,
      ),
      'validity_yn' => array(
	'description' => 'Validity discussion/objection present y/n',
	'type' => 'int',
	'size' => 'tiny',
	'not null' => FALSE,
      ),
      'objection_yn' => array(
	'description' => 'Validity objection exisit yes/no',
	'type' => 'int',
	'size' => 'tiny',
	'not null' => FALSE,
      ),
      'disc_board_yn' => array(
	'description' => 'validity disuccsion board topic exist y/n',
	'type' => 'int',
	'size' => 'tiny',
	'not null' => FALSE,
      ),
    ),
    'primary key' => array('qid'),
  );

}