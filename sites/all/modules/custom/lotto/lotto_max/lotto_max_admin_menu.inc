<?php

function lotto_max_menu(){
    $items=array();


        $items['admin/lotto/lottomax'] = array(
        'title' => 'Lotto Max',
        'description' => 'Lotto Max',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );

        $items['admin/lotto/lottomax/charts'] = array(
        'title' => 'Charts',
        'description' => 'Get charts',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_max_charts_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	$items['admin/lotto/lottomax/results'] = array(
        'title' => 'Results',
        'description' => 'Get Results',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_max_results_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	/*
	$items['admin/lotto/lottomax/results/sync'] = array(
        'title' => 'Sync Results',
        'description' => 'Sync Results with bclc',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_max_results_sync_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	*/
	$items['admin/lotto/lottomax/analysis'] = array(
        'title' => 'Analysis',
        'description' => 'Analyze results',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_max_results_analysis_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	return $items;
}
?>
