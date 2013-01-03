<?php
function get_schema_mt_newsletter_log(&$schema){
    $schema['mt_newsletter_log'] = array(
      'description' => 'TODO: please describe this table!',
      'fields' => array(
	'nllgid' => array(
	  'description' => 'Field description goes here',
	  'type' => 'serial',
	  'not null' => TRUE,
	),
	'nlid' => array(
	  'description' => 'Field description goes here',
	  'type' => 'int',
	  'not null' => TRUE,
	),
	'uid' => array(
	  'description' => 'Field description goes here',
	  'type' => 'int',
	  'not null' => TRUE,
	),
	'sent_timestamp' => array(
	  'description' => 'Field description goes here',
	  'type' => 'int',
	  'not null' => TRUE,
	),
      ),
      'primary key' => array('nllgid'),
    );
}
?>
