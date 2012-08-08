<?php

/*
 * this file describes the data definitions/structure and various action request to service
 *
 * 
 */

/*

/*@@@@@@@@@@@@@@@@@@@@@@@@@--REQUEST--@@@@@@@@@@@@@@@@@@@@@@@

URL_REQUESTED:  mcq-api/tp/2356.json where 2356 is the testpaper_id
 */
 $json_data = array(
    'uid'=>3,
     'application'=>'test_panel/android_app',
     'tpid'=>2356,
     'cookie'=>'SES2458899664444745.25669874445555',
     'current_qno'=>5,//options var not set, null value, 0, 1, over 1
     'action_requests'=>array(
	 'ans_submit'=>array(
	     5=>"a"
	 ),
	 'skip'=>array(
	     5=>true
	 ),
	 'retr'=>array(
	     5=>array('q'=>array('question_text'=>'This is the question text',
		 'choice_a'=>'answer text a',
		 'choice_b'=>'answer text b',
		 'choice_c'=>'answer text c',
		 'choice_d'=>'answer text d',
		 'choice_e'=>'answer text e',
		 'question_media_yn'=>false
		 ),
		 'a'=>'choice_b' //this is the answer checked by the user
		 ),
		 'v'=>'choice_a' //this is the correct answer
	 ),
	 'retr_next'=>array(
	     6=>array('q'=>array('question_text'=>'This is the question text',
		 'choice_a'=>'answer text a',
		 'choice_b'=>'answer text b',
		 'choice_c'=>'answer text c',
		 'choice_d'=>'answer text d',
		 'choice_e'=>'answer text e',
		 'question_media_yn'=>true,
		 'media'=>array(
		     'video'=>'http://youtube.com/command.mov'
		 )
		)
	    )
	),
	 'retr_prev'=>array(
		4=>array('q') 
	  ),
	 //retr.val, do we need???? same as notes?? to retrive feedback for the answer submtted, but is this
	 'retr_val'=>array(
	 ),
	 //retr.notes to retrive notes for the answer submitted or to all the wrong answers
	 'retr_note'=>array(
	     'mode'=>'corr_ans'// or 'wrong_ans' if wrong ans or 'corr_or_wrong' both corr and wrong or 'all
	 ),
	 'retr.hint'=>array(
	     5=>array(1=>'this is hint#1, so guess!') //first comment for qno 5
	 ),
	 'set_flag'=>array(
	     5=>true,
	     6=>false,
	 ),
	 'set_timer'=>array(
		 'action'=>array('pause'=>true, //resume, reset, start, end, reset_to
		 'time'=>true //elapsed, reset_to
		     )
		 
	     )
	)
);

	 $json_response=array(
	     'uid'=>3,
	'application'=>'test_panel',
	'tpid'=>2356,
	'cookie'=>'SES2458899664444745.25669874445555',
	'current_qno'=>5,
	'action_requests'=>array(
	    'ans.submit'=>array(
		5=>'b'
	    ),
	    'skip'=>array(

	    ),
	    'retr'=>array(
		5=>'q',
	    ),
	    'retr.next'=>array(
		6=>array('q', // for q and choices,
		    'a', // question with answser box checked,
		    'v', // q_v question with answer as well as wrong anser highted in red or green for correct
		    )
	    ),
	    'retr.prev'=>array(
		    4=>array('q') 
	    ),
	    //retr.val, do we need???? same as notes?? to retrive feedback for the answer submtted, but is this
	    'retr.val'=>array(
	    ),
	    //retr.notes to retrive notes for the answer submitted or to all the wrong answers
	    'retr.note'=>array(
		'mode'=>'corr_ans'// or 'wrong_ans' if wrong ans or 'corr_or_wrong' both corr and wrong or 'all
	    ),
	    'retr.hint'=>array(
		5=>1 //first comment for qno 5
	    ),
	    'set_flag'=>array(
		5=>true,
		6=>false,
	    ),
	    'set_timer'=>array(
		    'action'=>'pause', //resume, reset, start, end, reset_to
		    'time'=>array('remaining'=>'04:05' //elapsed, reset_to
			)

		)
	    )
	 );




/*

 */




?>
