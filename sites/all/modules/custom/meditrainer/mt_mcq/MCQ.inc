<?php
module_load_include('inc', 'mt_mcq','iMCQ');

class MCQ implements iMCQ {
   public   $qid, 
            $nid,
            $vid,
            $question_text,
            $choice_a,
            $choice_b,
            $choice_c,
            $choice_d,
            $choice_e,
	    $question_media_yn,
            $speciality,
            $sub_speciality,
                    
            $answer,
            $conf_rating,
            $notes,
	    $notes_a,
	    $notes_b,
	    $notes_c,
	    $notes_d,
	    $notes_e,
	    $exam,
	    $exam_level,
	    $expert_level,
	    $hints_yn,
	    $validity_yn,
	    $objection_yn,
	    $disc_board_yn,
                    
	    $mcqLoadType;
   
   //constructor
   function __construct($qid=null, $mcqLoadType=2){
       $this->qid = $qid;
       $this->mcqLoadType = $mcqLoadType ;
   }
 
   function getFromDB(){
	switch ($this->mcqLoadType){
	    case 1:
		 $attrArrayMIN = array('qid', 'nid', 'vid','question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn');
		$results = db_select('mcq_question_bank', 'q')
			->fields(q, $attrArrayMIN)
			->condition('q.qid', $this->qid)
			->execute()
			->fetchAssoc();
		break;
	    case 2:
		$attrArrayBASIC = array('qid', 'nid', 'vid','question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn');
		$attrArrayBASIC_a = array('answer');
		$query = db_select('mcq_question_bank', 'q')
			->fields('q', $attrArrayBASIC)
			->fields('a', $attrArrayBASIC_a);
		$query->join('mcq_answer_bank', 'a', 'q.qid = a.qid');
		$query->condition('q.qid', $this->qid);
		$results = $query->execute()
			->fetchAssoc();
		break;
	    case 3:
		$attrArrayNORMAL = array('qid', 'nid', 'vid','question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn');
		$attrArrayNORMAL_a = array('answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn');
		$query = db_select('mcq_question_bank', 'q')
			->fields('q', $attrArrayNORMAL)
			->fields('a', $attrArrayNORMAL_a);
		$query->join('mcq_answer_bank', 'a', 'q.qid = a.qid');
		$query->condition('q.qid', $this->qid);
		$results = $query->execute()
			->fetchAssoc();
		break;
	    case 4:
		$attrArrayMED = array('qid', 'nid', 'vid','question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'speciality', 'sub_speciality');
		$attrArrayMED_a = array( 'answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn',  'conf_rating', 'exam', 'exam_level', 'expert_level');
		$query = db_select('mcq_question_bank', 'q')
			->fields('q', $attrArrayMED)
			->fields('a', $attrArrayMED_a);
		$query->join('mcq_answer_bank', 'a', 'q.qid = a.qid');
		$query->condition('q.qid', $this->qid);
		$results = $query->execute()
			->fetchAssoc();
		break;
	    case 5:
		$attrArrayMAX = array('qid', 'nid', 'vid','question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'speciality', 'sub_speciality');
		$attrArrayMAX_a = array( 'answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn',  'conf_rating', 'exam', 'exam_level', 'expert_level', 'validity_yn', 'objection_yn', 'disc_board_yn');
		$query = db_select('mcq_question_bank', 'q')
			->fields('q', $attrArrayMAX)
			->fields('a', $attrArrayMAX_a);
		$query->join('mcq_answer_bank', 'a', 'q.qid = a.qid');
		$query->condition('q.qid', $this->qid);
		$results = $query->execute()
			->fetchAssoc();
		break;
	}
	return $results;
       }

       function loadFromDB(){
	   $results = $this->getFromDB();
	    $this->fromArray($results);
       }
       
       function fromArray($assocArray){
	   if (is_array($assocArray) && count($assocArray) > 0) {

	       foreach ($assocArray as $key => $value){
		   $name = strtolower(trim($key));
			   $this->$name = $value;	
	       }
	    }
       }
    function toArray(){
	$mcqArray;
	switch ($this->mcqLoadType){
	    case 1:
		$mcqArray = $this->toArrayMIN();
		break;
	    case 2:
		$mcqArray = $this->toArrayBASIC();
		break;
	    case 3:
		$mcqArray = $this->toArrayNORMAL();
		break;
	    case 4:
		$mcqArray = $this->toArrayMED();
		break;
	    case 5:
		$mcqArray = $this->toArrayMAX();
		break;
	}

	return $mcqArray;
}

function toArrayMIN(){
    $arrayMIN = array();
	$arrayMIN['qid'] = $this->qid ; 
	$arrayMIN['nid'] = $this->nid ; 
	$arrayMIN['vid'] = $this->vid;
	$arrayMIN['question_text'] = $this->question_text ; 
	$arrayMIN['choice_a'] = $this->choice_a ; 
	$arrayMIN['choice_b'] = $this->choice_b ; 
	$arrayMIN['choice_c'] = $this->choice_c ; 
	$arrayMIN['choice_d'] = $this->choice_d ; 
	$arrayMIN['choice_e'] = $this->choice_e ; 
	$arrayMIN['question_media_yn'] = $this->question_media_yn ;
    return $arrayMIN;
}

function toArrayBASIC(){
    $arrayBASIC = $this->toArrayMIN();
    $arrayBASIC['answer'] = $this->answer ;
    return $arrayBASIC;
}

function toArrayNORMAL(){
	    $arrayNORMAL = $this->toArrayBASIC();
	    $arrayNORMAL['notes'] = $this->notes ;
	    $arrayNORMAL['notes'] = $this->notes ; 
	    $arrayNORMAL['notes_a'] = $this->notes_a ; 
	    $arrayNORMAL['notes_b'] = $this->notes_b ; 
	    $arrayNORMAL['notes_c'] = $this->notes_c ; 
	    $arrayNORMAL['notes_d'] = $this->notes_d ; 
	    $arrayNORMAL['notes_e'] = $this->notes_e ; 
	    $arrayNORMAL['hints_yn'] = $this->hints_yn ;
    return $arrayNORMAL;
}
function toArrayMED(){
	    $arrayMED = $this->toArrayNORMAL();
	    $arrayMED['speciality'] = $this->speciality ; 
	    $arrayMED['sub_speciality'] = $this->sub_speciality ;  
	    $arrayMED['conf_rating'] = $this->conf_rating ; 
	    $arrayMED['exam'] = $this->exam ; 
	    $arrayMED['exam_level'] = $this->exam_level ; 
	    $arrayMED['expert_level'] = $this->expert_level ;
    return $arrayMED;
}

function toArrayMAX(){
	    $arrayMAX = $this->toArrayMED();
	    $arrayMAX['validity_yn'] = $this->validity_yn ; 
	    $arrayMAX['objection_yn'] = $this->objection_yn ; 
	    $arrayMAX['disc_board_yn'] = $this->disc_board_yn;
	    return $arrayMAX;
}

function fromJson($jsonString){
	    $jsonArray = json_decode($jsonString, true);//will get associative array
	    $this->fromArray($jsonArray);
   }
   
   function toJson(){
       $jsonArray = $this->toArray();
       $jsonString = json_encode($jsonArray);
       return $jsonString;
   }
   
   function saveAsNode(){
       $node = new stdClass();
            $node->type = 'mcq';
            node_object_prepare($node); //prepare a generic node
	    $node->nid=NULL;

	$node->question_text = $this->question_text;
        $node->choice_a = $this->choice_a;
        $node->choice_b = $this->choice_b;
        $node->choice_c = $this->choice_c;
        $node->choice_d = $this->choice_d;
        $node->choice_e = $this->choice_e;
	$node->question_media_yn = $this->question_media_yn;
        $node->speciality = $this->speciality;
        $node->sub_speciality = $this->sub_speciality;

        //set_node_answer($node, $this->answer);
        $node->answer = $this->answer; //
        $node->conf_rating = $this->conf_rating;
        $node->notes = $this->notes;
        $node->notes_a = $this->notes_a;
	$node->notes_b = $this->notes_b;
	$node->notes_c = $this->notes_c;
	$node->notes_d = $this->notes_d;
	$node->notes_e = $this->notes_e;
	$node->exam  = $this->exam; //
	$node->exam_level = $this->exam_level; //
	$node->expert_level = $this->expert_level;
	$node->hints_yn = $this->hints_yn;
	$node->validity_yn = $this->validity_yn;
	$node->objection_yn = $this->objection_yn;
	$node->disc_board_yn = $this->disc_board_yn;
	
        node_save($node);
   }
   
   
} //end of class mcq





class MCQ_LOAD_TYPE {
 
 const MIN = 1;
 const BASIC = 2;
 const NORMAL = 3;
 const MED = 4;
 const MAX = 5;
 
// private int $mcqLoadType;
    
   function toString(){
       
   }
   
 public static function getAttrArray($mcqLoadType){
     $attrArray;
     
       switch($mcqLoadType){
	   case 1:
	       $attrArray_min = array('qid', 'question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn');
	       break;
	   case 2:
	       $attrArray = array('qid', 'question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'answer');
	       break;
	   case 3:
	       $attrArray = array('qid', 'question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn' );
	       break;
	   case 4:
	       $attrArray = array('qid', 'question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn', 'speciality', 'sub_speciality',  'conf_rating', 'exam', 'exam_level', 'expert_level' );
	       break;
	   case 5:
	       $attrArray = array('qid', 'question_text', 'choice_a', 'choice_b', 'choice_c', 'choice_d', 'choice_e', 'question_media_yn', 'answer', 'notes', 'notes_a', 'notes_b', 'notes_c', 'notes_d', 'notes_e', 'hints_yn', 'speciality', 'sub_speciality',  'conf_rating', 'exam', 'exam_level', 'expert_level', 'validity_yn', 'objection_yn', 'disc_board_yn');
	       break;
       }
       return $attrArray;
   }
}

?>
