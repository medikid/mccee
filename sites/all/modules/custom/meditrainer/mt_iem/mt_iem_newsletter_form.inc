<?php

function mt_iem_newsletter_form($form, &$form_state){
    drupal_add_js(drupal_get_path('module', 'mt_iem') . '/js/mt_iem_newsletter_form.js');
    //$newsletter = newsletter_load(3);
    if (isset($form_state['values']['newsletter_selected'])){
	$id = (int)$form_state['values']['newsletter_selected'];
	$newsletter = newsletter_load($id);
    }
    
   
    
  //$defaults = !empty($form_state['values']['zip_code']) ? $form_state['values']['zip_code'] : $zipcode;
//$storename = getmystorename($defaults);
    
    $form = array( 
	'#prefix'=>'<div id="ajx-wrapper">',
        '#suffix'=>'</div>'
    );
    
   $form['add_or_edit'] = array(
       '#type' => 'radios',
	'#title' => t('Mode:	'),
	'#options' => array(0=>'Add', 1=>'Edit', 2=>'Delete'),
	'#default_value' => 0,
	'#prefix'=>'<div class="container-inline">',
       '#suffix'=>'</div>',
	'#ajax' =>array(
	    'callback'=>'ajx_change_submit_text',
	    'wrapper'=>'ajx_submit_button_wrapper',
	    'event'=>'change'
	)
   );
    $form['newsletter_selected'] = array(
       '#type' => 'select',
	'#title' => t('Selected:    '),
	'#options' => get_dropdown_newsletters(),
	'#default_value' => isset($newsletter['nlid']) ? $newsletter['nlid'] : '0' ,	
	'#ajax'=>array(
            'callback'=>'ajx_load_saved_newsletter',
	  // 'callback'=>'ajx_callback',
            //'wrapper'=>'selected_tp_data_wrapper',
	    'wrapper'=>'newsletter_data_wrapper',
	    //'wrapper' => 'ajx-wrapper',
	    'event'=>'change'
            ),
	'#prefix'=>'<div class="container-inline" >',     
	'#suffix'=>'&nbsp &nbsp &nbsp'
   );
    
    $form['submit'] = array(
	'#type' => 'submit',
	'#value' => t('Save'),
	'#submit' => array('mt_iem_newsletter_form_submit'),
	'#prefix' => '<div id="ajx_submit_button_wrapper" >',
	'#suffix' => '</div></div>'
	    );
       
   $form['newsletter']=array(
      '#type'=>'fieldset',
      '#title'=>t('Newsletter'),
      '#prefix'=>'<div id="newsletter_data_wrapper">',
      '#suffix'=>'</div>'
    );
   
    $form['newsletter']['newsletter_name'] = array(
	'#type' => 'textfield',
	'#title' => t('Name:	'),
	'#default_value' =>  isset($newsletter['newsletter_name']) ? $newsletter['newsletter_name'] : '',
	'#size' => 60,
	'#maxlength' => 128,
	'#required' => TRUE,
	'#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div><p>'
      );
    $form['newsletter']['newsletter_key'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Key:	'),
	  '#default_value' => isset($newsletter['newsletter_key']) ? $newsletter['newsletter_key'] : '',
	  '#size' => 60,
	  '#maxlength' => 128,
	  '#required' => TRUE,
	    '#prefix'=>'<div class="container-inline">',
	    '#suffix'=>'</div><p>'
	);
    $form['newsletter']['subject'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Subject:   '),
	  '#default_value' => isset($newsletter['subject']) ? $newsletter['subject'] : '',
	  '#size' => 60,
	  '#maxlength' => 128,
	  '#required' => TRUE,
	    '#prefix'=>'<div id="newsletter_data_wrapper"><div class="container-inline">',
	    '#suffix'=>'</div><p></div>'
	);
     $form['newsletter']['active'] = array(
       '#type' => 'radios',
	'#title' => t('Active:	'),
	'#options' => array(0=>'No', 1=>'Yes'),
	'#value' => isset($form['newsletter_selected']['#value']) ? $form['newsletter_selected']['#value'] : 0,
	'#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div><p>'
   );
    
    $form['newsletter']['mail_format']=array(
	'#type' => 'radios',
	'#title' => t('Format:	'),
	'#options' => array('t'=>'text', 'h'=>'html', 'b'=>'Both'),
	//'#default_value' => isset($newsletter['mail_format']) ? $newsletter['mail_format'] : 'b',
	'#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div><p>'
    );
    
    $form['newsletter']['text_body'] = array(
	'#title' => t('Text Body'),
	'#type' => 'textarea',
	'#description' => t ('The comment will be unpublished if it contains any of the phrases above. Use a case-sensitive, comma-separated list of phrases. Example: funny, bungee jumping, "Company, Inc."'),
	'#default_value' =>isset($newsletter['text_body']) ? $newsletter['text_body'] : '',
	'#states'=>array(
                'invisible'=>array(
                    ':input[name="mail_format"]'=>array('value'=>'h'),
                ),                
            ),
	);

    $form['newsletter']['html_body'] = array(
	'#title' => t('HTML Body'),
	'#type' => 'text_format',
	'#default_value' => isset($newsletter['html_body']) ? $newsletter['html_body'] : '',
	'#states'=>array(
                'invisible'=>array(
                    ':input[name="mail_format"]'=>array('value'=>'t'),
                ),                
            ),
	);
 
    return $form;
}



function get_dropdown_newsletters(){
    $existing_newsletters = array(0=>'Select Newsletter');
    $query = db_select('mt_newsletter', 'nl')
	    ->fields('nl')
	    ->execute();
    while ($newsletters = $query->fetchAssoc()){
	$existing_newsletters[$newsletters['nlid']] = $newsletters['newsletter_name'];
    }
    
    return $existing_newsletters;
}

function mt_iem_newsletter_form_submit($form, &$form_state){
    $add_or_edit = $form_state['input']['add_or_edit'];
    $newsletter = array();  
    $newsletter['nlid'] = $form_state['values']['newsletter_selected'];
    $newsletter['active'] = $form_state['values']['active'];
    $newsletter['newsletter_name'] = $form_state['values']['newsletter_name'];
    $newsletter['newsletter_key'] = $form_state['values']['newsletter_key'];
    $newsletter['mail_format'] = $form_state['values']['mail_format'];
    $newsletter['subject'] = $form_state['values']['subject'];
    $newsletter['text_body'] = $form_state['values']['text_body'];
    $newsletter['html_body'] = $form_state['values']['html_body']['value'];
    
    switch($add_or_edit){
	case '0':
	newsletter_add($newsletter);    
	    break;
	case '1':
	    newsletter_edit($newsletter);
	    break;
	case '2':
	    newsletter_delete($newsletter);
	    break;
    }
    
    
    //echo dpm($form_state);
    //return '<pre>'.print_r($form).'</pre>';
}

function newsletter_load($nlid){
    $newsletter = db_select('mt_newsletter', 'nl')
	    ->fields('nl')
	    ->condition('nlid', $nlid)
	    ->execute()
	    ->fetchAssoc();
    return $newsletter;
}

function newsletter_add($newsletter){
    if (isset($newsletter['nlid'])){ unset($newsletter['nlid']); }
    
    $newsletter_id = db_insert('mt_newsletter')->fields($newsletter)->execute();
    mt_iem_newsletter_create($newsletter['newsletter_key'], $newsletter['mail_format'], $newsletter['active']);
    drupal_set_message('Newsletter '.$newsletter['newsletter_name'].' has now been saved.');
}

function newsletter_edit($newsletter){
    $newsletter_id = db_update('mt_newsletter')->fields($newsletter)->condition('nlid', $newsletter['nlid'])->execute();
    
    $newsletter_edited = db_select('mt_newsletter', 'nl')
			    ->fields('nl')
			    ->condition('nlid', $newsletter['nlid'])
			    ->execute()
			    ->fetchAssoc();
    $updated_id = mt_iem_newsletter_update($newsletter_edited['iem_newsletter_id'], $newsletter_edited);
    
    drupal_set_message('Newsletter '.$newsletter_edited['newsletter_name'].' has now been saved.');
}

function newsletter_delete($newsletter){
    $newsletter_id = $newsletter['nlid']; 
    $newsletter_to_delete = newsletter_load($newsletter_id);
    db_delete('mt_newsletter')->condition('nlid', $newsletter_to_delete['nlid'])->execute();
    
    $deleted = mt_iem_newsletter_delete($newsletter_to_delete['iem_newsletter_id']);
    
    //drupal_set_message('Newsletter '.$newsletter['newsletter_name'].' has now been deleted.');
    dpm($newsletter_to_delete);
    return $deleted;
}

function ajx_load_saved_newsletter($form, &$form_state){
    
    $nlid = $form_state['values']['newsletter_selected'];
    $newsletter = newsletter_load($nlid);
    
    $form_state['values']['active'] = $newsletter['active'];
    $form_state['input']['active'] = $newsletter['active'];
 
    $form['newsletter']['active'][$newsletter['active']]['#value'] = $newsletter['active'];
    $form['newsletter']['mail_format'][$newsletter['mail_format']]['#value'] = $newsletter['mail_format'];
     
    $form['newsletter']['newsletter_name']['#value'] =  $newsletter['newsletter_name'];
    $form['newsletter']['newsletter_key']['#value'] =  $newsletter['newsletter_key'];
    
    $form['newsletter']['subject']['#value'] =  $newsletter['subject'];
    $form['newsletter']['text_body']['#value'] =  $newsletter['text_body'];
    $form['newsletter']['html_body']['value']['#value'] = $newsletter['html_body'];
    
    
    $radio_jsn = "{ active : '".$newsletter['active']."' , mail_format : '".$newsletter['mail_format']."' }";
    $form['newsletter']['#suffix'] = "</div><script type='text/javascript'>";
    $form['newsletter']['#suffix'] .= "var data = ".$radio_jsn."; "; 
    $form['newsletter']['#suffix'] .= "post_ajx_reload_radios( data );";
   // $form['newsletter']['#suffix'] .= "alert('html ajax suffix');";
    $form['newsletter']['#suffix'] .=  "</script>";
    
    //dpm($form);
  
    return $form['newsletter'];
}

function ajx_change_submit_text($form, $form_state){
    $mode = $form_state['input']['add_or_edit'];
    $value = '';
    switch ($mode){
	case '0':
	    $value = t('Add');
	    break;
	case '1':
	    $value = t('Edit');
	    break;
	case '2':
	    $value = t('Delete');
	    break;
    }
    $form['submit']['#value'] = $value;
    
    return $form['submit'];
}



?>
