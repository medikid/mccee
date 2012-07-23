<?php

/*
 * This file list settings for the default endpoint
 */

    /**
     * Implements hook_default_services_endpoint().
     */
    function mt_services_default_services_endpoint() {
      $endpoints = array();

      $endpoint = new stdClass();
	$endpoint->disabled = FALSE; /* Edit this to true to make a default endpoint disabled initially */
	$endpoint->api_version = 3;
	$endpoint->name = 'mcc_api';
	$endpoint->server = 'rest_server';
	$endpoint->path = 'mcc_api';
	$endpoint->authentication = array(
	'services' => 'services',
	);
	$endpoint->server_settings = array();
	$endpoint->resources = array(
	'mcq' => array(
	    'operations' => array(
	    'retrieve' => array(
		'enabled' => 1,
	    ),
	    'index' => array(
		'enabled' => 1,
	    ),
	    ),
	),
	'node' => array(
	    'operations' => array(
	    'retrieve' => array(
		'enabled' => 1,
	    ),
	    'create' => array(
		'enabled' => 1,
	    ),
	    'update' => array(
		'enabled' => 1,
	    ),
	    'delete' => array(
		'enabled' => 1,
	    ),
	    'index' => array(
		'enabled' => 1,
	    ),
	    ),
	    'relationships' => array(
	    'files' => array(
		'enabled' => 1,
	    ),
	    'comments' => array(
		'enabled' => 1,
	    ),
	    ),
	),
	);
	$endpoint->debug = 1;
      $endpoints[] = $endpoint;

      return $endpoints;
    }


?>
