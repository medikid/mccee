<?php

function setup_nextstep_button(&$form, &$form_state)
{
	
	$form['actions']['next'] = array(
			'#type'   => 'submit',
			'#value'  => t('Next Step'),
			'#submit' => array('button_click_handler'),
            		'#ajax' => array(
                            'callback' => 'ajax_form_navigation_callback',
                            'wrapper' => 'user_register_form_wrapper',
                            )
	);
}

function _eventhandler_next_button($form, &$form_state) {
	
    save_step1_form_to_session($form, $form_state);
	
	//$_SESSION['member_registration']['current_step']++;
        $_SESSION['member_registration']['current_step'] = 2;
        $form_state['rebuild'] = true;

}