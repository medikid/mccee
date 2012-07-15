<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_db_export_form(){
    return drupal_get_form('db_export_form');
}

 function db_export_form(){
     $form['table_or_object'] = array(
            '#type' => 'radios',
            '#title' => t('Export:'),
            '#options' => array(
            1 => t('Table'),
            2 => t('Object'),
            ),
            '#default_value' => 1,
            '#description' => t('Select the item you would like to export.'),
     );
     
     $form['db_table_name'] = array(
            '#type' => 'select',
            '#title' => t('Table Name:'),
            '#options' => array(
                0 => t('Select table name'),
                1 => t('nodes'),
                2 => t('mt_codelist'),
            ),
         '#states' => array(
      // Hide the settings when the cancel notify checkbox is disabled.
      'invisible' => array(
       ':input[name="table_or_object"]' => array('value' => 2)
          ))
     );
     
     $form['object_name'] = array(
         '#type' => 'select',
            '#title' => t('Object Name:'),
            '#options' => array(
                0 => t('Select Object name'),
                1 => t('mcq'),
                2 => t('book'),
            ),
         '#states' => array(
      // Hide the settings when the cancel notify checkbox is disabled.
      'invisible' => array(
       ':input[name="table_or_object"]' => array('value' => 1)
          ))
     );
     
     $form['folder_name'] = array(
         '#type'=>'textfield',
         '#title' => 'Folder Name:'
     );
     
     $form['file_name'] = array(
         '#type'=>'textfield',
         '#title' => 'File Name:',
         '#default_value' => $form_state['values']['object_name']

     );
     
     
     $form['submit'] = array(
         '#type'=>'submit',
         '#value' => t('export')
     );
     
     return $form;
 }
?>
