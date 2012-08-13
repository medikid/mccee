<?php

class mcq {
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
/*   
function load($qid){
        $query = db_select('mcq_question_bank', 'q');
        $query->join('mcq_answer_bank', 'a', 'a.qid = q.qid');
        $query->fields('q');
        $query->fields('a');
        $query->condition('q.qid', $qid);
        $result = $query->execute();
        
       foreach($result as $colName=>$value){
           $this->qid = $value['qid']; 
            $this->id = $value['nid'];
            $this->vid = $value['vid'];
            $this->question_text = $value['question_text'];
            $this->choice_a = $value['choice_a'];
            $this->choice_b = $value['choice_b'];
            $this->choice_c = $value['choice_c'];
            $this->choice_d = $value['choice_d'];
            $this->choice_e = $value['choice_e'];
            $this->speciality = $value['speciality'];
            $this->sub_speciality = $value['sub_speciality'];
                    
            $this->answer = $value['answer'];
            $this->rating = $value['rating'];
            $this->notes = $value['notes'];
       }
        
  }
  
  
  function save(){
        $node = new stdClass();
        $node->type = 'mcq';

        node_object_prepare($node);
        $node->nid=NULL;

        $node->question_text = $this->question_text;
        $node->choice_a = $this->choice_a;
        $node->choice_b = $this->choice_b;
        $node->choice_c = $this->choice_c;
        $node->choice_d = $this->choice_d;
        $node->choice_e = $this->choice_e;
        $node->speciality = $this->speciality;
        $node->sub_speciality = $this->sub_speciality;

        //set_node_answer($node, $this->answer);
        $node->answer = $this->answer;
        $node->rating = $this->rating;
        $node->notes = $this->notes;
        
        node_save($node);
  }
  
  /*
   * convert object to array
   */
   /*
  function to_array(){
     $mcq_array = array(); 
      
        $mcq_array['qid'] = $this->qid;
        $mcq_array['nid'] = $this->nid;
        $mcq_array['vid'] = $this->vid;
        $mcq_array['question_text'] = $this->question_text;
        $mcq_array['choice_a'] = $this->choice_a;
        $mcq_array['choice_b'] = $this->choice_b;
        $mcq_array['choice_c'] = $this->choice_c;
        $mcq_array['choice_d'] = $this->choice_d;
        $mcq_array['choice_e'] = $this->choice_e;
        $mcq_array['speciality'] = $this->speciality;
        $mcq_array['sub_speciality'] = $this->sub_speciality;

        $mcq_array['answer'] = $this->answer;
        $mcq_array['rating'] = $this->rating;
        $mcq_array['notes'] = $this->notes;
     
     
    return $mcq_array;  
  }
  
  function from_array($mcq_array){
      
        $this->qid = isset($mcq_array['qid']) ? $mcq_array['qid'] : NULL;
        $this->nid = isset($mcq_array['nid']) ? $mcq_array['nid'] : NULL;
        $this->vid = isset($mcq_array['vid']) ? $mcq_array['vid'] : NULL;
        $this->question_text = isset($mcq_array['question_text']) ? $mcq_array['question_text'] : NULL;
        $this->choice_a = isset($mcq_array['choice_a']) ? $mcq_array['choice_a'] : NULL;
        $this->choice_b = isset($mcq_array['choice_b']) ? $mcq_array['choice_b'] : NULL;
        $this->choice_c = isset($mcq_array['choice_c']) ? $mcq_array['choice_c'] : NULL;
        $this->choice_d = isset($mcq_array['choice_d']) ? $mcq_array['choice_d'] : NULL;
        $this->choice_e = isset($mcq_array['choice_e']) ? $mcq_array['choice_e'] : NULL;
        $this->speciality = isset($mcq_array['speciality']) ? $mcq_array['speciality'] : NULL;
        $this->sub_speciality = isset($mcq_array['sub_speciality']) ? $mcq_array['sub_speciality'] : NULL;

        $this->answer = isset($mcq_array['answer']) ? $mcq_array['answer'] : NULL;
        $this->rating = isset($mcq_array['rating']) ? $mcq_array['rating'] : NULL;
        $this->notes = isset($mcq_array['notes']) ? $mcq_array['notes'] : NULL;
          
      }  
      
      */
      
   function fromJson($jsonString, $loadType){
	    $jsonObject = json_decode(jsonString);
	    $this->question_text = $jsonObject->question_text;
	    $this->qid = $jsonObject->qid;
            $this->nid = $jsonObject->nid ;
            $this->nid = $jsonObject->nid ;
            $this->question_text = $jsonObject->question_text ;
            $this->choice_a = $jsonObject->choice_a ;
            $this->choice_b = $jsonObject->choice_b ;
            $this->choice_c = $jsonObject->choice_c ;
            $this->choice_d = $jsonObject->choice_d ;
            $this->choice_e = $jsonObject->choice_e ;
	    $this->question_media_yn = $jsonObject->question_media_yn ;
            $this->speciality = $jsonObject->speciality ;
            $this->sub_speciality = $jsonObject->sub_speciality ;
                    
            $this->answer = $jsonObject->answer ;
            $this->conf_rating = $jsonObject->conf_rating ;
            $this->notes = $jsonObject->notes ;
	    $this->notes_a = $jsonObject->notes_a ;
	    $this->notes_b = $jsonObject->notes_b ;
	    $this->notes_c = $jsonObject->notes_c ;
	    $this->notes_d = $jsonObject->notes_d ;
	    $this->notes_e = $jsonObject->notes_e ;
	    $this->exam = $jsonObject->exam ;
	    $this->exam_level = $jsonObject->exam_level ;
	    $this->expert_level = $jsonObject->expert_level ;
	    $this->hints_yn = $jsonObject->hints_yn ;
	    $this->validity_yn = $jsonObject->validity_yn ;
	    $this->objection_yn = $jsonObject->objection_yn ;
	    $this->disc_board_yn = $jsonObject->disc_board_yn ;
   }      
  

   
   
} //end of class mcq

class MCQ_LOAD_TYPE{
    
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