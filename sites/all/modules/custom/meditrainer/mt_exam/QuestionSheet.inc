<?php

class QuestionSheet{
    
    public  $qsid,
	    $uid,
	    $generated_on,
	    $tpid,
	    $tp,
	    $questions,
	    $mcqLoadType = 2;
    
    function __construct($user_id, $tpid = null, $qsid = null) {
	$this->uid = $user_id;
	$this->tpid = $tpid;
	$this->qsid = $qsid;	
	
	if ($tpid != null){
	    $this->tp = new TestProfile($user_id, $tpid);
	    $this->tp->load();
	}
    }
    
   
    function save_qs(){
	$this->generated_on = time();
	
	$fields = array(
	    'qsid' => $this->qsid,
	    'uid'=>$this->uid,
	    'tpid'=>$this->tpid,
	    'total_questions'=>$this->tp->tp_total,
	    'generated_on'=>$this->generated_on
	);
	
	$this->get_rand_questions();
	$fields = $fields + $this->questions;
	
	$query = db_insert('mcq_question_sheet')
		->fields($fields);
	
	$this->qsid = $query->execute();
    }
    
    function save_qnav(){
	
    }
    
    function load(){
	$query = db_select('mcq_question_sheet', 'qs')
		->fields('qs')
		->condition('qsid', $this->qsid)
		->execute();
	$result = $query->fetchAssoc();
	
	$this->tpid = $result['tpid'];
	$this->generated_on = $result['generated_on'];
	$questions = array();
	
	$i = 1;
	while ($i <= $result['total_questions']){
	    $questions['q'.$i] = $result['q'.$i];
	    $i++;
	}
	
	$this->questions = $questions;
    }
    
    function generate_questions(){
	
    }
    
    function get_questions_pool(){
	$question_pool = array();
	$query = db_select('mcq_question_bank', 'qb')
		->fields('qb', array('qid'))
		->execute();
	
	$i = 1;
	while ($qs = $query->fetchAssoc()){
	    foreach( $qs as $key => $value ){
		$question_pool[$i] = $value;
		$i++;
	    }
	}
	
	return $question_pool;
    }
    
    function get_rand_questions(){
	$question_pool = $this->get_questions_pool();	
	srand((float) microtime() * 10000000);
	$randomKeys = array_rand($question_pool, $this->tp->tp_total);
	$randKeys = array();
	
	$x = 1;
	foreach($randomKeys as $key=>$value){
			$randKeys['q'.$x]=$value;
			$x++;
		}
		
/*		while ($x<=200){
			$randKeys['q'.$x]='0';
			$x++;	 
		}
 */
	 
	$this->questions = $randKeys;
    }
    
    function get_qid($questionNumber){
	return $this->questions['q'.$questionNumber];
    }
    
    function get_mcq($question_number){
	$qid = $this->get_qid($question_number);
	$mcq = new MCQ($qid, $this->mcqLoadType);
	$mcq->loadFromDB();
	return $mcq->toArray();
    }
    
}
?>
