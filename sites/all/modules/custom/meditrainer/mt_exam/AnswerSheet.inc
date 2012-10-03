<?php

class AnswerSheet{  
    
    public  $qsid,
	    $uid,
	    $qs,
	    $qnav,
	    $fl,
	    $vw,
	    $qn,
	    $an,
	    $va,
	    $dur;
    
    function __construct($user_id, $qsid = null) {
	$this->uid = $user_id;
	$this->qsid = $qsid;
    }
    
    function generate_as(){
	$query = db_insert('mcq_answer_sheet')
		->fields(array(
		    'asid'=>null,
		    'qsid'=>$this->qsid,
		    'uid'=>$this->uid
		))
		->execute();
    }
    function generate_qnav(){
	$query = db_select('mcq_question_sheet', 'qs')
		->fields('qs', array('total_questions'))
		->condition('qsid', $this->qsid)
		->condition('uid', $this->uid)
		->execute();
	$results = $query->fetchAssoc();
	$qtot = $results['total_questions'];
	
	$i = 1;
	while ($i <= $qtot){
	   $query = db_insert('mcq_question_sheet_nav')
		    ->fields(array(
			'qsnid'=>null,
			'qsid'=>$this->qsid,
			'uid'=>$this->uid,
			'qn'=>$i
		    ))
		   ->execute();
	   $i++;
	}
    }
    
    function generate(){
	$this->generate_as();
	$this->generate_qnav();
    }
    
    function save() {
    }
    
    function load_qnav(){
	$query_a = db_select('mcq_answer_sheet', 'an')
		->fields('an')
		->condition('uid', $this->uid)
		->condition('qsid', $this->qsid)
		->execute(); 
	$result_a = $query_a->fetchAssoc();
	
	$query = db_select('mcq_question_sheet_nav', 'qnav')
		->fields('qnav')
		->condition('uid', $this->uid)
		->condition('qsid', $this->qsid)
		->execute();
	
	$this->qnav = array();	
	while (	$result = $query->fetchAssoc() ){
	    $this->qnav[$result['qn']]['qn'] = $result['qn'];
	    $this->qnav[$result['qn']]['is_current'] = $result['is_current'];
	    $this->qnav[$result['qn']]['fl'] = $result['fl'];
	    $this->qnav[$result['qn']]['vw'] = $result['vw'];
	    $this->qnav[$result['qn']]['an'] = $result_a['a'.$result['qn']];
	    $this->qnav[$result['qn']]['va'] = $result['va'];
	    $this->qnav[$result['qn']]['dur'] = $result['dur'];	    
	}
    }
    
    function get_qnav_html(){
	$this->load_qnav();
	
	$qnav_items = '<ul class="qnav_items" >';
	
	foreach($this->qnav as $key=>$value){
	    $mod = $key % 2;
	    
	    $qnav_items .= '<li class="qnav_item" id="'.$key.'" onclick="q_retr(this.id);"><ul ';
	    if ($mod == 0){
		    $qnav_items .= 'id="even"';	
		} else $qnav_items .= 'id="odd"';
		
	    $qnav_items .='><li class="fl">'.$value['fl'].'</li>';
	    $qnav_items .='<li class="vw">'.$value['vw'].'</li>';
	    $qnav_items .='<li class="qn">'.$value['qn'].'</li>';
	    $qnav_items .='<li class="an">'.$value['an'].'</li>';
	    $qnav_items .='<li class="va">'.$value['va'].'</li>';
	    $qnav_items .='<li class="du">'.$value['dur'].'</li>';
	    $qnav_items .='</ul></li>';

	}
	$qnav_items .='</ul>';
	
	return $qnav_items;
    }
}
?>
