<?php

function get_lotto_max_charts_form($form, &$form_state){    
    drupal_add_library('system', 'ui.slider');
    drupal_add_js(drupal_get_path('module', 'lotto') . '/js/ui_slider.js');    
    $defaults = get_chart_defaults();
    
    $form = array();
    
    $form['chart'] = get_chart();
    
    $form['chart_type'] = array(
	'#type' => 'select',
	'#title' => t('Select Chart Type: '),
	'#options' => get_chart_types(),
	'#default_value' => $defaults['chart_type']
    );
    
     $form['data'] = array(
	 '#type' => 'hidden',
	 '#value' => get_chart_data()
    );
    
    $form['range_start'] = array(
	'#type' => 'textfield',
	'#title' => t('From:'),
	'#default_value' => $defaults['range_start'],
	'#size' => 40
    );
    
    $form['range_end'] = array(
	'#type' => 'textfield',
	'#title' => t('To:'),
	'#default_value' => $defaults['range_end'],
	'#size' => 40

    );
    
    $form['range_slider'] = array(
	'#type' => 'item',
	'#title' => t('Select Draw Range:'),
	'#suffix'=>'<div id="range-slider"></div>'
    );
    
     $form['submit'] = array(
         '#type'=>'submit',
         '#value' => t('View Chart'),
         '#submit' => array('chart_view')
     );    
    
    
    return $form;
}

function chart_view($form, $form_state){
    
}

function get_chart_defaults(){
    $defaults = array();
    $defaults['chart_type'] = CHART_TYPE_BAR_V;
    $defaults['range_start'] = 1;
    $defaults['range_end'] = 1010;
    
    return $defaults;
}

function get_chart_types(){
    $chart_types = array(
	0 => 'Select Chart Type',
	CHART_TYPE_BAR_V => 'Bar Chart - Vertical',
	CHART_TYPE_BAR_H => 'Bar Chart - Horizontal',
	CHART_TYPE_PIE_3D => 'Pie Chart',
	CHART_TYPE_LINE_XY => 'Line chart',
	CHART_TYPE_SCATTER => 'Scatter Chart'
    );
    
    return $chart_types;
}

function get_chart(){
    array(
   '#theme' => 'chart',
   '#chart_id' => 'test_chart',
   '#title' => t('Servings'),
   '#type' => CHART_TYPE_BAR_V, //CHART_TYPE_PIE_3D, //CHART_TYPE_PIE, 
   '#labels' => array( t('Fruits'), t('Meats'), t('Dairy'), t('Fr'), t('Me'), t('Da'),t('Fruit'), t('Meat'), t('Dair'), ),
   '#data' => array(
     'fruits' => 30,
     'meats' => 20,
     'dairy' => 5,
     'Fr' =>30,
     'Me' => 20,
     'Da' => 50,
     'Frui' => 30,
     'Meet' => 20,
     'Dair' => 5,
	),
    '#size' => chart_size(400, 200),
    '#data_colors'=>array(  )
	);
    /*
     $form['chart'] = array(
   '#theme' => 'chart',
   '#chart_id' => 'test_chart',
   '#title' => t('Servings'),
   '#type' => CHART_TYPE_BAR_V, //CHART_TYPE_PIE_3D, //CHART_TYPE_PIE, 
   '#labels' => array( t('Fruits'), t('Meats'), t('Dairy'), t('Fr'), t('Me'), t('Da'),t('Fruit'), t('Meat'), t('Dair'), ),
   '#data' => array(
     'fruits' => 30,
     'meats' => 20,
     'dairy' => 5,
     'Fr' =>30,
     'Me' => 20,
     'Da' => 50,
     'Frui' => 30,
     'Meet' => 20,
     'Dair' => 5,
	),
    '#size' => chart_size(400, 200),
    '#data_colors'=>array(
	chart_unique_color('test_a'),
	chart_unique_color('test_b'),
	chart_unique_color('test_c'),
       chart_unique_color('test_d'),
	chart_unique_color('test_a5'),
       chart_unique_color('test_a6'),
	chart_unique_color('test_a7'),
       chart_unique_color('test_a8'),
	chart_unique_color('test_a9'))

     );
   
     * /
     */
}

function get_chart_data(){
    
}
?>
