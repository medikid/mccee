<?php

function get_schema_mt_members(&$schema){    

    $schema['mt_members'] = array(
  'description' => 'Table stores members details',
  'fields' => array(
    'muid' => array(
      'description' => 'Membership ID(an uid can have multiple memberships id)',
      'type' => 'serial',
      'not null' => TRUE,
    ),
    'uid' => array(
      'description' => 'userid of drupal system',
      'type' => 'int',
      'not null' => TRUE,
    ),
      'iem_subscriber_id' => array(
      'description' => 'userid of IEM mailing system',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'first_name' => array(
      'description' => 'First Name of member',
      'type' => 'text',
      'not null' => TRUE,
    ),
    'last_name' => array(
      'description' => 'Last Name of member',
      'type' => 'text',
      'not null' => TRUE,
    ),
    'membership_type' => array(
      'description' => 'Type of membership',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'parked_user_reason' => array(
      'description' => 'Reason Code for parking membership',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'aspiring_exam_can' => array(
      'description' => 'Canada - Mcc exam chosen for membership',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'aspiring_exam_us' => array(
      'description' => 'US - USMLE exam chosen for membership',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'aspiring_exam_uk' => array(
      'description' => 'UK - PLAB exam chosen for membership',
      'type' => 'int',
      'not null' => TRUE,
       'default' => 0, 
    ),
    'aspiring_exam_au' => array(
      'description' => 'Australia - AMC exam chosen for membership',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'reg_date' => array(
      'description' => 'Date Account created',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'reg_expiry' => array(
      'description' => 'Expiry Date for membership',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'opt_newsletter' => array(
      'description' => '1=true if opted for newsletter',
      'type' => 'int',
      'not null' => TRUE,
    ),
    'acc_status' => array(
      'description' => 'Account Status',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'acc_susp' => array(
      'description' => '1=true if account suspected',
      'type' => 'int',
      'not null' => TRUE,
      'default' => 0,
    ),
    'payment_status' => array(
      'description' => 'payment status from ubercart module',
      'type' => 'int',
      'not null' => FALSE,
    ),
    'payment_id' => array(
      'description' => 'payment id from ubercart module',
      'type' => 'int',
      'not null' => FALSE,
    ),
  ),
  'primary key' => array('muid'),
);

return $schema;
};