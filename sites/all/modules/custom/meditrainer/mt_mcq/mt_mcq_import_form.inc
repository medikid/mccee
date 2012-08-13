<?php
module_load_include('inc', 'mt_mcq','mcq_import');

function mcq_import_form($form, &$form_state){
    
    $form['#prefix'] = '<div id="mcq_import_form_wrapper">';
    $form['#suffix'] = '</div>';
    
   $form['import_table'] = array(
        '#type' => 'select',
        '#title' => t('Select Database Table'),
        '#options'=>array(
            'mcq_qa_bank'=>'Question and Answer Bank',
            'mcq_question_bank'=> 'Question Bank',
            'mcq_answer_bank' => 'Answer Bank'
        ),
        
        '#default_value'=>'mcq_qa_bank'
        
    );
   
    $form['import_file_name'] = array(
        '#type' => 'textfield',
        '#title' => t('Select Data Source file'),
        '#description'=>t('Provide the source file name that is saved in "mcq/import" folder'),
        '#size' => 40,
    );
    
    $form['import_file_format'] = array(
        '#type' => 'radios',
        '#title' => t('Select File Format'),
        '#options'=>array(
            'csv'=> '.csv',
            'sql' => '.sql'
        ),
        '#default_value'=>'csv'
    );
    

    
    $form['import_submit'] = array(
        '#type' => 'submit',
        '#title' => t('Import Now'),
        '#value'=>t('Import Now'),
        '#submit'=>array('mcq_import')
    );
    
    
    return $form;
    
}