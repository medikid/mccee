<?php

function mcq_manage_form($form, &$form_state){

    $form['mcq_action'] = array(
        '#type' => 'select',
        '#title' => t('Select Action: '),
        '#options'=>array(
            'add'=>'Add',
            'update'=> 'Update',
            'delete' => 'Delete'
        ),
        
        '#default_value'=>'add',
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
        
    );
    
    $form['mcq_id'] = array(
        '#type' => 'select',
        '#title' => t('ID: '),
        '#options'=>array(
            'qid'=>'qid',
            'nid'=> 'nid',
            'qsid' => 'qsid',
            'asid'=>'asid',
        ),
        
        '#default_value'=>'qid',
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
    );
    
    $form['mcq_operator'] = array(
        '#type' => 'select',
        '#title' => t('Operator: '),
        '#options'=>array(
            'equal'=>'Equals',
            'not_equal'=> 'Not Equals',
            'range' => 'Between Range'
        ),
        
        '#default_value'=>'equal',
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
    );
    
    $form['mcq_selector_text'] = array(
         '#type' => 'textfield',
        '#title' => t('Select: '),
        '#states'=>array(
            'visible' =>array(
                ':input[name="mcq_operator"]'=> array('value'=>'equal')
            )
        )
    );
    
    $form['mcq_selector'] = array(
         '#type' => 'select',
        '#title' => t('Selected: '),
        '#options'=>array(
            'all'=>'All',
        ),
        
        '#default_value'=>'all',
        '#prefix'=>'<div class="container-inline">',
        '#suffix'=>'</div>'
    );
    
    $form['mcq_manage_submit'] = array(
         '#type' => 'submit',
        '#value' => t('Submit'),
        '#submit'=>array()
    );   
    
    
    return $form;

}