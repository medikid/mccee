<?php
function get_schema_mt_newsletter(&$schema){
    $schema['mt_newsletter'] = array(
      'description' => 'TODO: please describe this table!',
      'fields' => array(
	'nlid' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'serial',
	  'not null' => TRUE,
	),
	'iem_newsletter_id' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'int',
	  'not null' => FALSE,
	),
	'active' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'int',
	  'not null' => FALSE,
	  'default' => 0,
	),
	'newsletter_name' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'varchar',
	  'length' => '255',
	  'not null' => FALSE,
	),
	'newsletter_key' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'varchar',
	  'length' => '255',
	  'not null' => FALSE,
	),
	'mail_format' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'char',
	  'length' => '1',
	  'not null' => FALSE,
	),
	'subject' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'varchar',
	  'length' => '255',
	  'not null' => FALSE,
	),
	'text_body' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'text',
	  'size' => 'big',
	  'not null' => FALSE,
	),
	'html_body' => array(
	  'description' => 'TODO: please describe this field!',
	  'type' => 'text',
	  'size' => 'big',
	  'not null' => FALSE,
	),
      ),
      'primary key' => array('nlid'),
    );
}
?>
