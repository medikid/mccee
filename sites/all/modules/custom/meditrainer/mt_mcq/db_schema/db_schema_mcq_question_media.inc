<?php

function get_schema_mcq_question_media(&$schema){
    $schema['mcq_question_media'] = array(
    'description' => '',
    'fields' => array(
      'mdid' => array(
	'description' => '',
	'type' => 'serial',
	'not null' => TRUE,
      ),
      'qid' => array(
	'description' => '',
	'type' => 'int',
	'not null' => TRUE,
      ),
      'question_media_type' => array(
	'description' => '',
	'type' => 'varchar',
	'length' => '20',
	'not null' => FALSE,
      ),
      'question_media_filename' => array(
	'description' => '',
	'type' => 'varchar',
	'length' => '99',
	'not null' => FALSE,
      ),
    ),
    'primary key' => array('mdid'),
  );

}
?>
