<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 function db_export_form($form, &$form_state){
    
     $form['export_settings'] = array(
         '#type' => 'fieldset',
         '#title' => 'Export Table or Objects',
         '#collapsible' => TRUE,
         '#collapsed' => FALSE,
     );
     
     $form['export_settings']['table_or_object'] = array(
            '#type' => 'radios',
            '#title' => t('Export:'),
            '#options' => array(
            1 => t('Table'),
            2 => t('Object'),
            ),
            '#default_value' => 1,
            '#description' => t('Select the item you would like to export.'),
     );
     
     $form['export_settings']['db_table_name'] = array(
            '#type' => 'select',
            '#title' => t('Table Name:'),
            '#options' => dropdown_db_table_name(),
            '#ajax' => array(
                'callback' => 'ajax_set_export_file_settings',
                'wrapper' => 'export_file_settings_div',
                'event' => 'change',
                'method' => 'replace'
                ),
            '#states' => array(
                'invisible' => array(
                ':input[name="table_or_object"]' => array('value' => 2)
                    )
                )
     );
     
     $form['export_settings']['object_name'] = array(
         '#type' => 'select',
            '#title' => t('Object Name:'),
            '#options' => dropdown_object_name(),
         '#default_value' =>  0,
         '#ajax' => array(
            'callback' => 'ajax_set_export_file_settings',
            'wrapper' => 'export_file_settings_div',
             'event' => 'change',
             'method' => 'replace'
            ),
         '#states' => array(
            // Hide the settings when the cancel notify checkbox is disabled.
            'invisible' => array(
            ':input[name="table_or_object"]' => array('value' => 1)
                )
             )
     );
     
  $form['export_file_settings'] = array(
         '#type' => 'fieldset',
         '#title' => 'Exported File Settings',
         '#collapsible' => TRUE,
         '#collapsed' => FALSE,
         '#prefix' => '<div id="export_file_settings_div">',
         '#suffix' => '</div>',
         
     );
     $form['export_file_settings']['folder_name'] = array(
         '#type'=>'textfield',
         '#title' => 'Folder Name:',
         '#value' => ''
     );
     
     $form['export_file_settings']['file_name'] = array(
         '#type'=>'textfield',
         '#title' => 'File Name:',
         '#value' => ''
     );
     
     $form['submit'] = array(
         '#type'=>'submit',
         '#value' => t('export'),
         '#submit' => array('db_export_form_submit')
     );
     
     return $form;
 }
 
 
 function ajax_set_export_file_settings($form, &$form_state){
  /*   $form['export_file_settings'] = array(
         '#type' => 'fieldset',
         '#title' => 'Exported File Settings',
         '#collapsible' => TRUE,
         '#collapsed' => FALSE,
         '#prefix' => '<div id="export_file_settings_div">',
         '#suffix' => '</div>',
     );
     
     $form['export_file_settings']['folder_name'] = array(
         '#type'=>'textfield',
         '#title' => 'Folder Name:',
         '#value'=>get_export_foldername(),
     );
     
     $form['export_file_settings']['file_name'] = array(
         '#type'=>'textfield',
         '#title' => 'File Name:',
         '#value' =>(isset($form_state['input']['object_name']) || isset($form_state['input']['db_table_name']))
         ? get_export_filename($form_state['triggering_element']['#name'], $form_state['input'][$form_state['triggering_element']['#name']], '.csv')
         : '',
     );
    */
     $form['export_file_settings']['#collapsed'] = FALSE;
     $form['export_file_settings']['#prefix'] = '<div id="export_file_settings_div">';
     $form['export_file_settings']['#suffix'] = '</div>';
   
     $form['export_file_settings']['folder_name']['#value'] = get_export_foldername();
     $form['export_file_settings']['file_name'] ['#value'] = (isset($form_state['input']['object_name']) || isset($form_state['input']['db_table_name']))
         ? get_export_filename($form_state['triggering_element']['#name'], $form_state['input'][$form_state['triggering_element']['#name']], '.csv')
         : '' ;
    return $form['export_file_settings'];
     
 }
 
 function dropdown_db_table_name(){
     dropdown_aspiring_exam_can();
     $codelist = new codelist();
     $options = $codelist->get_dropdown('db_table_name');
     return $options;
 }
 
 function dropdown_object_name(){
     dropdown_aspiring_exam_can();
     $codelist = new codelist();
     $options = $codelist->get_dropdown('object_name');
     return $options;
 }
 
 function get_export_foldername(){
    $folder_name = get_import_export_folder_name('export');
    return $folder_name;
 }
 function get_export_filename($dropdown_varname, $dropdown_code, $file_extension){
     $codelist = new codelist();
     $decoded = $codelist->decode($dropdown_varname, $dropdown_code);
     $file_name = $decoded['name'].$file_extension;
     
     return $file_name;
 }
 
 function db_export_form_submit($form, &$form_state){
     $form_state['rebuild']= true;
     
     $table_or_object = $form_state['input']['table_or_object'];
     $db_table_name = $form_state['input']['db_table_name'];
     $object_name = $form_state['input']['object_name'];
     $folder_name = $form_state['input']['folder_name'];
     $file_name = $form_state['input']['file_name'];
     $export_file_path = get_export_file_path($file_name, $folder_name);
     
     $array = array($table_or_object, $db_table_name, $object_name, $folder_name, $file_name, $export_file_path);
   //  dsm('<pre>'.print_r($form_state['values']).'</pre>');
    
    $file_path = get_export_file_path($file_name, $folder_name);
     $file_handle = fopen($file_path, 'w');
     export_to_csv($file_handle, $array);
     return dpm($file_path);
 }
 
 function data_exceldownload($query = '') {
        $filename = 'test.xls';
        drupal_add_http_header('Content-Type: application/octet-stream');
        drupal_add_http_header('Content-Disposition: attachment; filename=' . $filename);
        drupal_add_http_header("Pragma: no-cache");
        drupal_add_http_header("Expires: 0");
        @$result = db_query($query);
        $count = $result->field_count;
        for($i = 0; $i < $count; $i++){
        $finfo = $result->fetch_field_direct($i);
        $header[] = $finfo->name ."\t";
        }
        $header = implode(" ", $header) ."\r\n";
        while($row = db_query($query)) {
        $line = '';
        $data = '';
        foreach($row as $value){
        if(!isset($value) || $value == ""){
        $value = "\t";
        } else {
        $value = str_replace('"', '""', $value);
        $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
        }
        $data .= trim($line)."\n";
        }
        $data = str_replace("\r", "", $data);
        if ($data == "") {
        $data = "\no matching records found\n";
        }
        print($header.$data);
   }
 
?>
