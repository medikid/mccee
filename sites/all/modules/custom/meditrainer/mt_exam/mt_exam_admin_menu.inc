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
     
    $items['admin/meditrainer/exam/start_test'] = array(
    'title' => 'Start Test Form',
    'description' => 'Create New Test Profile and Start Test.',
    'file'=>'test_profile_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('test_profile_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );
           
    $items['admin/meditrainer/exam/start_test/test_profile'] = array(
    'title' => 'Question Navigator Form',
    'description' => 'View MCQs.',
    'file'=>'QuestionNavigator_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('QuestionNavigator_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );
    
    $items['admin/meditrainer/exam/question_navigator'] = array(
    'title' => 'Question Navigator Form',
    'description' => 'View MCQs.',
    'file'=>'QuestionNavigator_form.inc',
    'page callback' => 'drupal_get_form',
    'page arguments' =>array('QuestionNavigator_form'),
    'access arguments' => array(true),
     //   'type' => MENU_CALLBACK,
    );
    
    $items['admin/meditrainer/exam/view_test_results'] = array(
        'title'=> 'View MCQ Test results',
        'description'=> 'View Test Results',
        'type'=>MENU_NORMAL_ITEM,
        'file'=>'mcq_test_viewer.inc',
        'page callback'=>'drupal_get_form',
        'page arguments'=>array('mcq_test_view'),
        //'access arguments' => array('Test View'),
        //'access callback'=>TRUE
    );
    

    $items['meditrainer/exam/mcq_viewer'] = array(
    'title' => 'MCQ Viewer', 
    'page callback' => 'QuestionNavigator_form', 
    'access arguments' => array('access test'), 
    'type' => MENU_CALLBACK,
  );

    return $items;
}

?>
