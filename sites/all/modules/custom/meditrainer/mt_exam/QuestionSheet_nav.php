<?php

class QuestionSheet_nav {
    
  public  $qsid,
	    $uid,
	    $qs,
	    $fl,
	    $vw,
	    $qno,
	    $an,
	    $va,
	    $dur,
	    $subm_time;
    
    function __construct($user_id, $qsid = null, $qno = null) {
	$this->uid = $user_id;
	$this->qsid = $qsid;
	$this->qno = $qno;
    }
    
   function load_nav(){
       $query = db_select('mcq_question_sheet_nav', 'qsn')
	       ->fields('qsn')
	       ->condition('uid', $this->uid)
	       ->condition('qsid', $this->qsid)
	       ->condition('qno', $this->qno)
	       ->execute();
       
       $result = $query->fetchAssoc();
       $this->fl = $result['fl'];
       $this->vw = $result['vs'];
       $this->va = $result['va'];
       $this->dur = $result['dur'];
       $this->subm_time = $result['submitted_time'];
   }
   
   function load_an(){
       $query_a = db_select('mcq_answer_sheet', 'as')
	       ->fields('as')	       
	       ->condition('uid', $this->uid)
	       ->condition('qsid', $this->qsid)
	       ->execute();
       $result_a = $query_a->fetchAssoc();
       $this->an = $result_a['a'.$this->qno];
   }
   
   function load(){
       $this->load_nav();
       $this->load_an();
   }
   
   function save_nav(){
       $query =  db_update('mcq_question_sheet_nav')
       ->fields(array(
	   'fl'=>$this->fl,
	   'vw'=>$this->vw,
	   'va'=>$this->va,
	   'duration'=>$this->dur
	    ))
	       ->condition('uid', $this->uid)
	       ->condition('qsid', $this->qsid)
	       ->condition('qno', $this->qno)
	     ->execute(); 
   }
   
   function save_an(){
       $query = db_update('mcq_answer_sheet')
	->fields(array(
	    'a'.$this->qno =>$this->an
	))
	        ->condition('uid', $this->uid)
	       ->condition('qsid', $this->qsid)
	       ->execute();
   }
   
   function save(){
       $this->save_nav();
       $this->save_an();
   }    
}
?>
