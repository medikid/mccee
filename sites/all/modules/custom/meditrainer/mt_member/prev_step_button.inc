<?php
function setup_prevstep_button(&$form, &$form_state)
{
	
	$form['actions']['previous'] = array(
				'#type'   => 'submit',
				'#value'  => t('Previous Step'),
				//'#submit' => array('multiform_node_form_previous', 'user_account_form'),
				'#submit' => array('button_click_handler'),
				// -1 so that it appears before the "Next" button added later.
				'#weight' => -1,
				'#limit_validation_errors' => array(),
                                '#prefix' => '<div id="navigation_button_wrapper" style="float: left">',
                                '#suffix' => '</div>',
				'#ajax' => array(
                                        'callback' => 'ajax_form_navigation_callback',
					'wrapper' => 'user_register_form_wrapper',
					
			),
		);
}

function _eventhandler_prev_button($form, &$form_state) {
    
    save_step2_form_to_session($form, $form_state);
    
	//$_SESSION['member_registration']['current_step']--;
        $_SESSION['member_registration']['current_step'] = 1;
	$form_state['rebuild'] = true;
	
}