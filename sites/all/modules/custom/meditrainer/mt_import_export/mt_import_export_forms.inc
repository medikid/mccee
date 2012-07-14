<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_db_export_form(){
    return drupal_get_form('export_form');
}

 function db_export_form(){
     $form['folder_name'] = array(
         '#type'=>'textfield',
         '#title' => 'Folder Name:'
     );
     
     $form['file_name'] = array(
         '#type'=>'textfield',
         '#title' => 'File Name:'
     );
     
     $form['table_or_object'] = array(
            '#type' => 'radios',
            '#title' => t('Table OR Object:'),
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
            '#default_value' => $category['selected']
     );
     
     $form['object_name'] = array(
         '#type' => 'select',
            '#title' => t('Object Name:'),
            '#options' => array(
                0 => t('Select Object name'),
                1 => t('mcq'),
                2 => t('book'),
            ),
            '#default_value' => $category['selected']
     );
     
     $form['submit'] = array(
         '#type'=>'submit',
         '#value' => t('export')
     );
     
     return $form;
 }
?>
