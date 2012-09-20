<?php
$EXAM ="";
$EXAM_LEVEL ="";
$QUESTION_BANK_SOURCE="";
function import_mcq_caqb($folderName, $fileName){
    $codelist = new codelist();
    switch($fileName){
	case "mccee.csv":
	    $EXAM = $codelist->get_code('MCQ', 'aspiring_exam', 'MCC (Canada)' );
	    $EXAM_LEVEL = $codelist->get_code('MCQ', 'aspiring_exam_can', 'MCCEE (Canada Step 1)' );
	    $QUESTION_BANK_SOURCE = $codelist->get_code('MCQ', 'question_bank_source', 'CAQB' );
	    break;
	case "mccqe1.csv":
	    $EXAM = $codelist->get_code('MCQ', 'aspiring_exam', 'MCC (Canada)' );
	    $EXAM_LEVEL = $codelist->get_code('MCQ', 'aspiring_exam_can', 'MCCQE1 (Canada Step 2)' );
	    $QUESTION_BANK_SOURCE = $codelist->get_code('MCQ', 'question_bank_source', 'CAQB' );
	    break;
    }
    
    $module_name = "mt_import_export";
    $CSV_FILE_NAME = trim($folderName).trim($fileName);
    
    $records = file(drupal_get_path('module', $module_name) . "/data/" . $CSV_FILE_NAME );
    foreach ($records as $line) {
        $record = csv_row_to_array($line);
        if ($row == 0) {
            foreach ($record as $i => $value) {
                $FIELD_NAMES_ARRAY[$i] = trim($value);
                $FIELD_NAMES .= $i == 0 ? "`" . trim($value) . "`" : ", `" . trim($value) . "`";
            }
        } else {
	    
	    foreach ($record as $i => $val) {
	    $VALUES[$FIELD_NAMES_ARRAY[$i]] = $val;	   
	    }
	    $mcq = caqb_to_mcq($VALUES);
	    
	    $mcq->exam = $EXAM;
	    $mcq->exam_level = $EXAM_LEVEL;
	    $mcq->question_bank_source = $QUESTION_BANK_SOURCE;
	    
	    $mcq->saveAsNode();
	    
            //reset VALUES
            $VALUES = "";
        }
        $row++;
    }
}

function caqb_to_mcq_answer($caqb_answer){
    $answer="";
    switch($caqb_answer){
	case "1":
	    $answer="a";
	    break;
	case "2":
	    $answer="b";
	    break;
	case "3":
	    $answer="c";
	    break;
	case "4":
	    $answer="d";
	    break;
	case "5":
	    $answer="e";
	    break;
    }
    return $answer;
}


function caqb_to_mcq_speciality($caqb_speciality){
    $speciality="";
    switch($caqb_speciality){
	case "Medicine":
	    $speciality = 1;
	    break;
	case "Surgery":
	    $speciality = 2;
	    break;
	case "OBGYN":
	    $speciality = 3;
	    break;
	case "Pediatrics":
	    $speciality = 5;
	    break;
	case "Psychiatry":
	    $speciality = 6;
	    break;
	case "PMCH":
	    $speciality = 10;
	    break;
    }
    return $speciality;
}

function caqb_to_mcq($caqb_row){
    
    $mcq = new MCQ();
    $mcq->question_text = $caqb_row['question'];
    $mcq->choice_a = $caqb_row['option1'];
    $mcq->choice_b = $caqb_row['option2'];
    $mcq->choice_c = $caqb_row['option3'];
    $mcq->choice_d = $caqb_row['option4'];
    $mcq->choice_e = $caqb_row['option5'];
    
    if (strlen($caqb_row['pictures']) > 0){
	$mcq->question_media_yn =  1 ;
	$mcq->question_media_filename = $caqb_row['pictures'] ;
	$file = new mt_file($mcq->question_media_filename);
	
	$codelist = new codelist();	
	$mcq->question_media_type = $codelist->get_code("MCQ", "question_media_type", $file->fileType);	
    } else $mcq->question_media_yn =  0;
    
    $mcq->speciality = caqb_to_mcq_speciality($caqb_row['categoryname']);
    $mcq->sub_speciality = 0;
    $mcq->answer = caqb_to_mcq_answer($caqb_row['answer']);
    
    switch($mcq->answer){
	case "a":
	    $mcq->notes_a = $caqb_row['explanation'];
	    break;
	case "b":
	    $mcq->notes_b = $caqb_row['explanation'];
	    break;
	case "c":
	    $mcq->notes_c = $caqb_row['explanation'];
	    break;
	case "d":
	    $mcq->notes_d = $caqb_row['explanation'];
	    break;
	case "e":
	    $mcq->notes_e = $caqb_row['explanation'];
	    break;
	default :
	    $mcq->notes = $caqb_row['explanation'];
	    break;
    }
      
    return $mcq;
    
}


?>
