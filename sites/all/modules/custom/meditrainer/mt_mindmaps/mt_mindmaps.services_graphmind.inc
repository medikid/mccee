<?php

function services_graphmind_import(&$endpoint) {
    $endpoint->disabled = FALSE; /* Edit this to true to make a default endpoint disabled initially */
    $endpoint->api_version = 3;
    $endpoint->name = 'services_graphmind';
    $endpoint->server = 'amfserver';
    $endpoint->path = 'services_graphmind';
    $endpoint->authentication = array(
	'services' => 'services',
    );
    $endpoint->server_settings = array();
    $endpoint->resources = array(
	'amfservice' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
	    ),
	    'actions' => array(
		'ping' => array(
		    'enabled' => '1',
		),
		'getUser' => array(
		    'enabled' => '1',
		),
		'sendUser' => array(
		    'enabled' => '1',
		),
		'sleep' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'mccee' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
		'index' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'node' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
		'create' => array(
		    'enabled' => '1',
		),
		'update' => array(
		    'enabled' => '1',
		),
		'delete' => array(
		    'enabled' => '1',
		),
		'index' => array(
		    'enabled' => '1',
		),
	    ),
	    'relationships' => array(
		'files' => array(
		    'enabled' => '1',
		),
		'comments' => array(
		    'enabled' => '1',
		),
	    ),
	    'targeted_actions' => array(
		'attach_file' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'system' => array(
	    'actions' => array(
		'connect' => array(
		    'enabled' => '1',
		),
		'get_variable' => array(
		    'enabled' => '1',
		),
		'set_variable' => array(
		    'enabled' => '1',
		),
		'del_variable' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'taxonomy_term' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
		'create' => array(
		    'enabled' => '1',
		),
		'update' => array(
		    'enabled' => '1',
		),
		'delete' => array(
		    'enabled' => '1',
		),
		'index' => array(
		    'enabled' => '1',
		),
	    ),
	    'actions' => array(
		'selectNodes' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'taxonomy_vocabulary' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
		'create' => array(
		    'enabled' => '1',
		),
		'update' => array(
		    'enabled' => '1',
		),
		'delete' => array(
		    'enabled' => '1',
		),
		'index' => array(
		    'enabled' => '1',
		),
	    ),
	    'actions' => array(
		'getTree' => array(
		    'enabled' => '1',
		),
	    ),
	),
	'user' => array(
	    'operations' => array(
		'retrieve' => array(
		    'enabled' => '1',
		),
		'create' => array(
		    'enabled' => '1',
		),
		'update' => array(
		    'enabled' => '1',
		),
		'delete' => array(
		    'enabled' => '1',
		),
		'index' => array(
		    'enabled' => '1',
		),
	    ),
	    'actions' => array(
		'login' => array(
		    'enabled' => '1',
		),
		'logout' => array(
		    'enabled' => '1',
		    'settings' => array(
			'services' => array(
			    'resource_api_version' => '1.0',
			),
		    ),
		),
		'register' => array(
		    'enabled' => '1',
		),
	    ),
	),
    );
    $endpoint->debug = 1;
}

function set_graphmind_default_endpoint($default_endpoint) {
    variable_set('graphmind_default_endpoint', $default_endpoint);
}

/**
 * Implements hook_default_services_endpoint().
 */
function services_graphmind_endpoint_new() {
    //  $endpoints = array();
    if (module_exists('services') && function_exists('services_endpoint_new')) {
	$endpoint = services_endpoint_new();
    } else
	$endpoint = new stdClass();

    services_graphmind_import($endpoint);

    //return $endpoints;

    if (module_exists('services') && function_exists('services_endpoint_save')) {
	services_endpoint_save($endpoint);
    }

    set_graphmind_default_endpoint($endpoint->path);
}

?>
