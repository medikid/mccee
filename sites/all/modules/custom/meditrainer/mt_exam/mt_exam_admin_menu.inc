<?php
    
function mt_exam_menu(){
    $items=array();


        $items['admin/meditrainer/exam'] = array(
        'title' => 'Exam',
        'description' => 'description',
        'page callback' => 'drupal_get_form',
        'page arguments' => array('my_admin_function'),
        'access arguments' => array('administer site configuration'),
    );
        
           
    $items['mcq/test_profile'] = array(
    'title' => 'Test Profile Form',
    'description' => 'Create MCQ Test Profile.',
    'file'=>'mcq_test_profile_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('mcq_test_profile_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );
    
    
    $items['mcq/test_view'] = array(
        'title'=> 'MCQ Test Viewer',
        'description'=> 'Take MCQ Test',
        'type'=>MENU_NORMAL_ITEM,
        'file'=>'mcq_test_viewer.inc',
        'page callback'=>'drupal_get_form',
        'page arguments'=>array('mcq_test_view'),
        //'access arguments' => array('Test View'),
        //'access callback'=>TRUE
    );
    


    return $items;
}

?>
