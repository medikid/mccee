<?php


function mcq_extract_dummytext_form($form, $form_state){
    drupal_add_js(drupal_get_path('module', 'mt_mcq') . '/js/custom_context_menu.js');
    drupal_add_css(drupal_get_path('module', 'mt_mcq') . '/css/custom_context_menu.css', array('group' => CSS_DEFAULT, 'type' => 'file'));
    drupal_add_js(drupal_get_path('module', 'mt_mcq') . '/js/mcq_extract_dummytext_form.js');
    
   // $json_data = '{"type":"mcq","status":1,"promote":1,"sticky":0,"uid":"1","created":1344473289,"revision":false,"book":{"original_bid":0,"menu_name":"","nid":"new","bid":0,"router_path":"node/%","plid":0,"mlid":0,"has_children":0,"weight":0,"module":"book","options":[],"parent_depth_limit":8},"comment":2,"menu":{"link_title":"","mlid":0,"plid":0,"menu_name":"main-menu","weight":0,"options":[],"module":"menu","expanded":0,"hidden":0,"has_children":0,"customized":0,"parent_depth_limit":8},"nid":"nid"}';
    
   $form['submit'] = array(
                '#type'=>'submit',
                '#value'=>t('Submit'),
                '#submit'=>  array('mcq_extract_dummytext_form_submit'),
		'#prefix'=> getJsonPasteTrail(),
            );   
     
    $form['dummy_mcq_json_object'] = array(
		'#type'=>'hidden',
                '#default_value'=>'',
		'#suffix' => '<div class="dummy_mcq_json"></div>',
    );
    $form['dummy_mcq_text'] = array(
	'#title' => t('Paste Your Dummy MCQ Text here:'),
	'#type' => 'textarea',
	'#description' => 'Paste Dummy mcq text here',
	'#default_value' => 'Dummy MCQ Text goes here',
	'#rows'=>60,
	'#resizable'=>true,
	'#suffix' => get_mcq_extract_custom_menu("custom_context_menu")
    );
    
    return $form;
    
}

function mcq_extract_dummytext_form_submit($form, &$form_state){
   
    $jsonString = $form_state['values']['dummy_mcq_json_object']; //get jsonstring from hidden field
    saveToDummyDB($jsonString); //now save it to dummy DB
	   
}

function convertToDummyMCQ($jsonString){
    $jsonArray = json_decode($jsonString, true);
    $dummyMCQ = array();
    foreach ($jsonArray as $key=>$value){
	switch(trim($key)){
	    case 'complete_text':
		$dummyMCQ['d_complete_text'] = $value;
		break;
	    case 'question_text':
		$dummyMCQ['d_question_text'] = $value;
		break;
	    case 'choice_a':
		$dummyMCQ['d_choice_a'] = $value;
		break;
	     case 'choice_b':
		 $dummyMCQ['d_choice_b'] = $value;
		break;
	     case 'choice_c':
		 $dummyMCQ['d_choice_c'] = $value;
		break;
	     case 'choice_d':
		 $dummyMCQ['d_choice_d'] = $value;
		break;
	     case 'choice_e':
		 $dummyMCQ['d_choice_e'] = $value;
		break;
	     case 'answer':
		 $dummyMCQ['d_answer'] = $value;
		break;
	    case 'notes':
		$dummyMCQ['d_notes'] = $value;
		break;
	    case 'notes_a':
		$dummyMCQ['d_notes_a'] = $value;
		break;
	    case 'notes_b':
		$dummyMCQ['d_notes_b'] = $value;
		break;
	    case 'notes_c':
		$dummyMCQ['d_notes_c'] = $value;
		break;
	    case 'notes_d':
		$dummyMCQ['d_notes_d'] = $value;
		break;
	    case 'notes_e':
		$dummyMCQ['d_notes_e'] = $value;
		break;
	}
    }
    return $dummyMCQ;
}

function saveToDummyDB($jsonString){    
    $dummy_mcq = convertToDummyMCQ($jsonString);
   $upload = db_insert('dummy_mcq')
	    ->fields($dummy_mcq)
	   ->execute();
}

function get_mcq_extract_custom_menu($menuDivClass){
    $cust_menu ="";
    $cust_menu .= '<div class="'.$menuDivClass.'">';
    $cust_menu .= '<ul class="menu">';
    
    $cust_menu .= '<li id="complete_text" ><a>Complete Text</a></li>';
    $cust_menu .= '<li id="question_text" ><a>Question Text</a></li>';
    
    $cust_menu .= '<li id="choices" ><a>Choices</a>';
    $cust_menu .= '<ul class="submenu">';
    $cust_menu .= '<li id="choice_a" ><a>Choice A</a></li>';
    $cust_menu .= '<li id="choice_b" ><a>Choice B</a></li>';
    $cust_menu .= '<li id="choice_c" ><a>Choice C</a></li>';
    $cust_menu .= '<li id="choice_d" ><a>Choice D</a></li>';
    $cust_menu .= '<li id="choice_e" ><a>Choice E</a></li>';
    $cust_menu .= '</ul>';
    $cust_menu .= '</li>';
    
    $cust_menu .= '<li id="notes" ><a>Notes</a>';
    $cust_menu .= '<ul class="submenu">';
    $cust_menu .= '<li id="notes_a" ><a>Notes A</a></li>';
    $cust_menu .= '<li id="notes_b" ><a>Notes B</a></li>';
    $cust_menu .= '<li id="notes_c" ><a>Notes C</a></li>';
    $cust_menu .= '<li id="notes_d" ><a>Notes D</a></li>';
    $cust_menu .= '<li id="notes_e" ><a>Notes E</a></li>';
    $cust_menu .= '</ul>';
    $cust_menu .= '</li>';
    
    $cust_menu .= '<li id="answer" ><a>Answer</a>';
    $cust_menu .= '<ul class="submenu">';
    $cust_menu .= '<li id="answer" ><a>A</a></li>';
    $cust_menu .= '<li id="answer" ><a>B</a></li>';
    $cust_menu .= '<li id="answer" ><a>C</a></li>';
    $cust_menu .= '<li id="answer" ><a>D</a></li>';
    $cust_menu .= '<li id="answer" ><a>E</a></li>';
    $cust_menu .= '</ul>';
    $cust_menu .= '</li>';
    
    $cust_menu .= '</ul>';
    $cust_menu .= '</div>';
    
    return $cust_menu;
}

function getJsonPasteTrail(){
    $pasteTrail = '';
    $pasteTrail = '<div class="container-inline">';
    $pasteTrail .= '<div class="json_paste_trail">';
    $pasteTrail .= '<div>>></div><div id=question_text>questionText</div>';
    $pasteTrail .= '<div>>></div><div id="choice_a">choiceA</div>';
    $pasteTrail .= '<div>>></div><div id="choice_b">choiceB</div>';
    $pasteTrail .= '<div>>></div><div id="choice_c">choiceC</div>';
    $pasteTrail .= '<div>>></div><div id="choice_d">choiceD </div>';
    $pasteTrail .= '<div>>></div><div id="choice_e">choiceE</div>';
    $pasteTrail .= '<div>>></div><div id="answer">answer</div>';
    $pasteTrail .= '<div>>></div><div id="notes_a">notesA</div>';
    $pasteTrail .= '<div>>></div><div id="notes_b">notesB</div>';
    $pasteTrail .= '<div>>></div><div id="notes_c">notesC</div>';
    $pasteTrail .= '<div>>></div><div id="notes_d">notesD</div>';
    $pasteTrail .= '<div>>></div><div id="notes_e">notesE</div>';    
    $pasteTrail .= '<div>>></div><div id="notes">notes</div>';
    $pasteTrail .= '</div>';
    $pasteTrail .= '</div>';
	
return $pasteTrail;
}

function indent_json($json) {

    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
        
        // If this character is the end of an element, 
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element, 
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }
            
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        $prevChar = $char;
    }

    return $result;
}

?>
