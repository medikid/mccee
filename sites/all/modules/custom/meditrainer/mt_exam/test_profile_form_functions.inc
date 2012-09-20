<?php

function dropdown_tp_name(){
   global $user;
    $options=array();
   $test_profiles = db_select('mcq_test_profiles','tp')
           ->fields('tp',array('tpid','tp_name'))
           ->condition('uid',$user->uid,'=')
           ->execute();
    foreach($test_profiles as $key=>$test_profile){
       $options[$test_profile->tpid]=$test_profile->tp_name;
   }
   $options[0]='Select saved profile';
    return $options;
}

function dropdown_default_selection_tp_name(){
    global $user;
     $default_tp_name=0;
    $default_test_profile = db_select('mcq_test_profiles','tp')
           ->fields('tp',array('tpid'))
           ->condition('uid',$user->uid,'=')
           ->condition('tp_is_user_default',1)
           ->execute()
           ->fetchAssoc();
  if (!empty($default_test_profile)) {
      foreach($default_test_profile as $tpid )
      $default_tp_name = $tpid;
  }
  
    return $default_tp_name;
    
}


function dropdown_tp_exam(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam_can');
    return $options;
}

function print_selected_tp_exam($selected_tp_exam){
     $markup = '<label>Selected Exam:      </label>';
     if ($selected_tp_exam){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','aspiring_exam_can')
                ->condition('code',$selected_tp_exam)
                ->execute();
        $tp_exam_name = $query->fetchField(0);
        $markup .= $tp_exam_name;
        }     
    
    return $markup;
    
}


function dropdown_tp_total(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('tp_total');
    return $options;
}

function dropdown_default_selection_tp_total(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('tp_total');
    return $default_selection;
}

function dropdown_tp_duration(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('tp_duration');
    return $options;
}

function dropdown_default_selection_tp_duration(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('tp_duration');
    return $default_selection;
}


function dropdown_default_selection_tp_test_mode(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('tp_test_mode');
    return $default_selection;
}



function dropdown_tp_test_mode(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('tp_test_mode');
    return $options;
}

function dropdown_tp_is_customized(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('tp_is_customized');
    return $options;
}

function dropdown_default_selection_tp_is_customized(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('tp_is_customized');
    return $default_selection;
}

function dropdown_tp_composition(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('speciality');
       
   //remove none option
   unset($options[0]);
    return $options;
}



function print_selected_tp_composition($checkboxes_checked_array){
    
    
    $markup = '<label>Selected Specialities:</label>';
    
   if (in_array('0', $checkboxes_checked_array)){
       $markup .= '<span color="black"><h4>All Specialities(100%)</h4></span>';
           
   } else {
       $percentage = round(100 / count($checkboxes_checked_array), 1);
    foreach($checkboxes_checked_array as $key=>$value){
       
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','speciality')
                ->condition('code',$value)
                ->execute();
        $spec_name = $query->fetchField(0);
        
        $markup .= '<h4>'.$spec_name.' ('.$percentage.'%)</h4>';
        } 
    }
    
    return $markup;
}


function print_selected_test_mode($selected_test_mode){
     $markup = '<label>Selected Test Mode:      </label>';
   if ($selected_test_mode){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','tp_test_mode')
                ->condition('code',$selected_test_mode)
                ->execute();
        $test_mode_name = $query->fetchField(0);
        $markup .= $test_mode_name;
        }     
    
    return $markup;
}

function print_selected_tp_total($selected_tp_total){
   $markup = '<label>Selected Total Number of Questions:      </label>';
    if ($selected_tp_total){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','tp_total')
                ->condition('code',$selected_tp_total)
                ->execute();
        $test_QTotal = $query->fetchField(0);
        $markup .= $test_QTotal;
        }  
    return $markup;
}

function print_selected_tp_duration($selected_tp_duration){
    $markup = '<label>Selected Total Test Duration:      </label>';
   if ($selected_tp_duration){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','tp_duration')
                ->condition('code',$selected_tp_duration)
                ->execute();
        $test_QDuration = $query->fetchField(0);
        $markup .= $test_QDuration;
        }  
    return $markup;
}


function load_selected_test_profile($selected_profile_id){
    $result=  db_select('mcq_test_profiles','tp')
        ->fields('tp')
        ->condition('tpid',$selected_profile_id)
        ->execute();
    
    $selected_profile = $result->fetchAssoc();
    return $selected_profile;
}


?>