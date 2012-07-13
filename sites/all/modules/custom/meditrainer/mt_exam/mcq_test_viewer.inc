<?php

function mcq_test_view(){
     $form=array();
    $form['radios']= array(
        '#type' => 'checkboxes',
        '#options' => array(1=>'SAT',2=>'ACT'),
        '#title' => 'What standardized tests did you take',
    );
    
    
/*
    $form['submit']=array(
        '#type'=>'submit',
        '#value'=>t('Start Test'),
        '#submit'=>array('save_test_config')
    );
    */
    return $form;
}