<?php
// $Id: emf_interspire.settings.inc,v 1.1 2010/06/03 14:02:49 bonked Exp $

/**
 * @file
 * Settings functions and callbacks.
 *
 * @author Kurt Maet <kurt@coworks.be>
 */

function emf_interspire_settings() {
  $form = array();

  // Required variables ar the XML path, username and token.
  // http://idn.interspire.com/articles/27/1/Interspire-Email-Marketer-XML-API-Documentation/Page1.html#requirements

  $form['emf_interspire_xml_path'] = array(
    '#type' => 'textfield',
    '#title' => t('XML Path'),
    '#description' => t('Enter your Interspire XML Path.'),
    '#default_value' => variable_get('emf_interspire_xml_path', ''),
    '#required' => TRUE,
  );
  $form['emf_interspire_xml_user'] = array(
    '#type' => 'textfield',
    '#title' => t('XML Username'),
    '#description' => t('Enter your Interspire XML Username.'),
    '#default_value' => variable_get('emf_interspire_xml_user', ''),
    '#required' => TRUE,
  );
  $form['emf_interspire_xml_token'] = array(
    '#type' => 'textfield',
    '#title' => t('XML Token'),
    '#description' => t('Enter your Interspire XML Token.'),
    '#default_value' => variable_get('emf_interspire_xml_token', ''),
    '#required' => TRUE,
  );
  return system_settings_form($form);
}

// To run an API token test, call:
// $result = _emf_interspire_api_call('xmlapitest');