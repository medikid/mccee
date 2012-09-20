<?php


function save_test_profile($form, &$form_state){
    global $user;
    $test_profile_data =  $_REQUEST;
    $profq_id = NULL;
    if ($_SESSION['TEST_PROFILE_DISPLAY_MODE'] == 1){
        if ($test_profile_data['profq_is_customized'] == '0'){
            $test_profile_data['profq_composition'][0]='0';
        }
        
    $query = db_insert('mcq_test_profiles')
        ->fields(array(
        'profq_id'=>NULL,
        'uid'=>$user->uid,
        'profq_name'=> $test_profile_data['profq_new_profile_name'],
        'profq_test'=>$test_profile_data['profq_test'],
        'profq_total'=>$test_profile_data['profq_total'],
        'profq_duration'=>$test_profile_data['profq_duration'],
        'profq_test_mode'=>$test_profile_data['profq_test_mode'],
        'profq_is_customized'=>$test_profile_data['profq_is_customized'],    
        'profq_composition'=>serialize($test_profile_data['profq_composition'])
    ));
    $profq_id = $query->execute();
    unset($_SESSION['TEST_PROFILE_DISPLAY_MODE']);
    dsm($profq_id);
    } 
    else if ($_SESSION['TEST_PROFILE_DISPLAY_MODE'] == 2){
        $profq_id = $test_profile_data['profq_name'];
        unset($_SESSION['TEST_PROFILE_DISPLAY_MODE']);
    } 
    else {
        
    }
}


function dropdown_profq_name(){
   global $user;
    $options=array();
   $test_profiles = db_select('mcq_test_profiles','tp')
           ->fields('tp',array('profq_id','profq_name'))
           ->condition('uid',$user->uid,'=')
           ->execute();
    foreach($test_profiles as $key=>$test_profile){
       $options[$test_profile->profq_id]=$test_profile->tp_name;
   }
   $options[0]='Select saved profile';
    return $options;
}

function dropdown_default_selection_profq_name(){
    global $user;
     $default_profq_name=0;
    $default_test_profile = db_select('mcq_test_profiles','tp')
           ->fields('tp',array('profq_id'))
           ->condition('uid',$user->uid,'=')
           ->condition('profq_is_user_default',1)
           ->execute()
           ->fetchAssoc();
  if (!empty($default_test_profile)) {
      foreach($default_test_profile as $profq_id)
      $default_profq_name = $profq_id;
  }
  
    return $default_profq_name;
    
}


function dropdown_profq_test(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('aspiring_exam_can');
    return $options;
}

function print_selected_profq_test($selected_profq_test){
     $markup = '<label>Selected Test:      </label>';
     if ($selected_profq_test){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','aspiring_exam_can')
                ->condition('code',$selected_profq_test)
                ->execute();
        $profq_test_name = $query->fetchField(0);
        $markup .= $profq_test_name;
        }     
    
    return $markup;
    
}


function dropdown_profq_total(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('profq_total');
    return $options;
}

function dropdown_default_selection_profq_total(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('profq_total');
    return $default_selection;
}

function dropdown_profq_duration(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('profq_duration');
    return $options;
}

function dropdown_default_selection_profq_duration(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('profq_duration');
    return $default_selection;
}


function dropdown_default_selection_profq_test_mode(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('profq_test_mode');
    return $default_selection;
}



function dropdown_profq_test_mode(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('profq_test_mode');
    return $options;
}

function dropdown_profq_is_customized(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('profq_is_customized');
    return $options;
}

function dropdown_default_selection_profq_is_customized(){
    $codelist = new codelist();
    $default_selection = $codelist->get_dropdown_default_selection('profq_is_customized');
    return $default_selection;
}

function dropdown_profq_composition(){
    $codelist = new codelist();
    $options = $codelist->get_dropdown('speciality');
       
   //remove none option
   unset($options[0]);
    return $options;
}



function print_selected_test_composition($checkboxes_checked_array){
    
    
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
                ->condition('sub_cat','profq_test_mode')
                ->condition('code',$selected_test_mode)
                ->execute();
        $test_mode_name = $query->fetchField(0);
        $markup .= $test_mode_name;
        }     
    
    return $markup;
}

function print_selected_profq_total($selected_profq_total){
   $markup = '<label>Selected Total Number of Questions:      </label>';
    if ($selected_profq_total){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','profq_total')
                ->condition('code',$selected_profq_total)
                ->execute();
        $test_QTotal = $query->fetchField(0);
        $markup .= $test_QTotal;
        }  
    return $markup;
}

function print_selected_profq_duration($selected_profq_duration){
    $markup = '<label>Selected Total Test Duration:      </label>';
   if ($selected_profq_duration){
        $query = db_select('mt_codelist','cd')
                ->fields('cd',array('name'))
                ->condition('sub_cat','profq_duration')
                ->condition('code',$selected_profq_duration)
                ->execute();
        $test_QDuration = $query->fetchField(0);
        $markup .= $test_QDuration;
        }  
    return $markup;
}
