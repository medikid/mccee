<?php

function mt_iem_menu(){
    $items=array();

        $items['admin/meditrainer/iem'] = array(
        'title' => 'IEM',
        'description' => 'IEM Plugin',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );

        $items['admin/meditrainer/iem/settings'] = array(
        'title' => 'Settings',
        'description' => 'Config Settings',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('mt_iem_settings_form'),
        'access arguments' => array('Configuration Settings for IEM'),
        );
	$items['admin/meditrainer/iem/newsletter'] = array(
        'title' => 'Newsletter',
        'description' => 'Config Settings',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('mt_iem_settings_form'),
        'access arguments' => array('Configuration Settings for IEM'),
        );
	$items['admin/meditrainer/iem/newsletter/add'] = array(
        'title' => 'Add',
        'description' => 'Add Newsletter',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('mt_iem_newsletter_form'),
        'access arguments' => array('Configuration Settings for IEM'),
        );
	$items['admin/meditrainer/iem/newsletter/edit'] = array(
        'title' => 'Edit',
        'description' => 'Edit Newsletter',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('mt_iem_newsletter_form'),
        'access arguments' => array('Configuration Settings for IEM'),
        );

    return $items;
}

?>