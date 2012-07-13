<?php

function mcq_import(&$form, &$form_state) {
    
    $MODULE_NAME = 'mt_mcq';
    $FILE_NAME = $form_state['values']['import_file_name'];
    
    $FILE_FORMAT = $form_state['values']['import_file_format'];
    $TABLE = $form_state['values']['import_table'];
    $FILE = drupal_get_path('module', $MODULE_NAME) . "/import/" . $FILE_NAME . ".".$FILE_FORMAT;
    $NON_STRING_ARRAY = array('qid', 'nid', 'vid');
    $ROW_RANGE = array(1, 100);
    
  
    
    if ($FILE_FORMAT == 'csv' && $TABLE = 'mcq_qa_bank'){
      $csv_data_array =  csv_to_array($FILE, $NON_STRING_ARRAY, $ROW_RANGE);
      
      foreach($csv_data_array as $row_number=>$row_data){
          $mcq = new mcq();
          $mcq->from_array($row_data);
          $mcq->save();
          
      }
      
       
    }//if ends
    
}


function csv_to_array($csv_file_name, $non_string_array, $row_range){
     $csv_data_array = array();
    $row = 0;
    $column = 1;
    
    $records = file($csv_file_name);
        foreach($records as $line){
            $record = csv_row_to_array($line);
        if ($row == 0) {
            foreach ($record as $i => $column_name) {
                $FIELD_NAMES_ARRAY[$i] = trim($column_name);
               // $FIELD_NAMES .= $i == 0 ? "`" . trim($value) . "`" : ", `" . trim($value) . "`";
            }
        } else {
            
            foreach ($record as $column => $value) {
                if (in_array($FIELD_NAMES_ARRAY[$column], $non_string_array)){
                    $csv_data_array[$row][$FIELD_NAMES_ARRAY[$column]] = $value;
                   
                } elseif (trim($value) == "NULL"){
                    $csv_data_array[$row][$FIELD_NAMES_ARRAY[$column]] = NULL;
                }else {
                    $csv_data_array[$row][$FIELD_NAMES_ARRAY[$column]] = $value;
                }
            }
            
        }//else ends
        
        $row++;
    }//foreach records
    
    return $csv_data_array;
}