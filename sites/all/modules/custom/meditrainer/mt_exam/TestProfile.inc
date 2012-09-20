<?php

class TestProfile {
    public  $tpid ,
	    $uid ,
	    $tp_name,
	    $tp_exam,
	    $tp_total,
	    $tp_duration,
	    $tp_test_mode,
	    $tp_is_customized,
	    $tp_composition,
	    $tp_is_user_default;
    
    function __construct($user_id, $tpid = null) {
	$this->uid = $user_id;
	$this->tpid = $tpid;
    }
    
    function save(){
	if ($this->tpid == null){
	$query = db_insert('mcq_test_profiles')
        ->fields(array(
        'tpid'=>$this->tpid,
        'uid'=>$this->uid,
        'tp_name'=> $this->tp_name,
        'tp_exam'=>$this->tp_exam,
        'tp_total'=>$this->tp_total,
        'tp_duration'=>$this->tp_duration,
        'tp_test_mode'=>$this->tp_test_mode,
        'tp_is_customized'=>$this->tp_is_customized,    
        'tp_composition'=>serialize($this->tp_composition),
	'tp_is_user_default' => $this->tp_is_user_default
	));
	
	$this->tpid = $query->execute();
	} else {
	    $query = db_update('mcq_test_profiles')
	    ->fields(array(
		'tp_exam'=>$this->tp_exam,
		'tp_total'=>$this->tp_total,
		'tp_duration'=>$this->tp_duration,
		'tp_test_mode'=>$this->tp_test_mode,
		'tp_is_customized'=>$this->tp_is_customized,    
		'tp_composition'=>serialize($this->tp_composition),
		'tp_is_user_default' => $this->tp_is_user_default
		))
	->condition('tpid', $this->tpid)
	->execute();	    
	}
    }
    
    function load(){
	$result=  db_select('mcq_test_profiles','tp')
        ->fields('tp')
        ->condition('tpid',$this->tpid)
        ->execute();
    
	$loaded_profile = $result->fetchAssoc();
	
	$this->tpid = $loaded_profile['tpid'];
	$this->uid = $loaded_profile['uid'];
	$this->tp_name = $loaded_profile['tp_name'];
	$this->tp_exam = $loaded_profile['tp_exam'];
	$this->tp_total = $loaded_profile['tp_total'];
	$this->tp_duration = $loaded_profile['tp_duration'];
	$this->tp_test_mode = $loaded_profile['tp_test_mode'];
	$this->tp_is_customized   = $loaded_profile['tp_is_customized'];
	$this->tp_composition = unserialize($loaded_profile['tp_composition']);
	$this->tp_is_user_default = $loaded_profile['tp_is_user_default'];
    }
    
    function get_data_array(){
	 
	$data_array = array(
        'tpid'=>(int)$this->tpid,
        'uid'=>(int)$this->uid,
        'tp_name'=> $this->tp_name,
        'tp_exam'=>(int)$this->tp_exam,
        'tp_total'=>(int)$this->tp_total,
        'tp_duration'=>(int)$this->tp_duration,
        'tp_test_mode'=>(int)$this->tp_test_mode,
        'tp_is_customized'=>(int)$this->tp_is_customized, 
        'tp_composition'=> $this->tp_composition,
	'tp_is_user_default' => (int)$this->tp_is_user_default
	);
	
	return $data_array;
    }
    
    function get_data_json(){    
	$data_json = json_encode($this->get_data_array());
	return $data_json;
    }
}

?>