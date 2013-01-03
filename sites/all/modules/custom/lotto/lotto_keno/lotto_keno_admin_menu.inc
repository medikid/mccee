<?php

function lotto_keno_menu(){
    $items=array();


        $items['admin/lotto/lottokeno'] = array(
        'title' => 'Lotto Keno',
        'description' => 'Lotto Keno',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
        );

        $items['admin/lotto/lottokeno/charts'] = array(
        'title' => 'Charts',
        'description' => 'Get charts',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_charts_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	$items['admin/lotto/lottokeno/bets'] = array(
        'title' => 'Bets Review',
        'description' => 'Review Beets',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_bets_review_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	$items['admin/lotto/lottokeno/results'] = array(
        'title' => 'Results',
        'description' => 'Get Results',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_results_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	$items['admin/lotto/lottokeno/results/sync'] = array(
        'title' => 'Sync Results',
        'description' => 'Sync Results with bclc',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_results_sync_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	$items['admin/lotto/lottokeno/results/pattern'] = array(
        'title' => 'Results Pattern',
        'description' => 'View results trend',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_results_pattern_form'),
        'access arguments' => array('Access Lotto Keno Charts'),
        );
	
	$items['admin/lotto/lottokeno/analysis'] = array(
        'title' => 'Analysis',
        'description' => 'Analyze results',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('get_lotto_keno_results_analysis_form'),
        'access arguments' => array('Access Lotto Max Charts'),
        );
	
	return $items;
}
?>
