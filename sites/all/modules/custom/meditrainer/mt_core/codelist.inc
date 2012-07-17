<?php
 //const CODELIST_TABLE = 'mt_code_list';
//define("CODELIST_TABLE", "mt_code_list");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 * 
 * @author chinnu
 */
class codelist {

    public $code_id, $cat, $sub_cat, $name, $sub_name, $code, $sub_code, $code_dependency, $sub_code_dependency, $disabled, $date_disabled;
 
    function load($db_record){
            $this->code_id = $db_record['code_id'];
            $this->cat= $db_record['cat'];
            $this->sub_cat= $db_record['sub_cat'];
            $this->name= $db_record['name'];
            $this->sub_name= $db_record['sub_name'];
            $this->code= $db_record['code'];
            $this->sub_code= $db_record['sub_code'];
            $this->code_dependency= $db_record['code_dependency'];
            $this->sub_code_dependency= $db_record['sub_code_dependency'];
            $this->disabled= $db_record['disabled'];
            $this->date_disabled= $db_record['date_disabled'];
    }
    
    function load_by_id($cid){
        $query = 'SELECT * FROM `mt_code_list` WHERE `code_id`=$cid';
        $result = db_query($query);
        $this->load($result);
    }
    
function get_var_name( &$var, $scope=false, $prefix='UNIQUE', $suffix='VARIABLE' ){
    if($scope) {
        $vals = $scope;
    } else {
        $vals = $GLOBALS;
    }
    $old = $var;
    $var = $new = $prefix.rand().$suffix;
    $vname = FALSE;
    foreach($vals as $key => $val) {
        if($val === $new) $vname = $key;
    }
    $var = $old;
    return $vname;
}

    
    function decode($var_name, $code){
      $results = db_select('mt_codelist', 'cl')
                ->fields('cl')
                ->condition('sub_cat', $var_name)
                ->condition('code', $code)
                ->execute()
                ->fetchAssoc();
        
        return $results;
    }
    
    function get_dropdown($varname){
        $result = db_select('mt_codelist', 'n')
                ->fields('n')
                ->condition('n.sub_cat', $varname)
                ->execute();
        $options = array();
        while ($value = $result->fetchAssoc()) {
            $options[$value['code']] = $value['name'];
        }

        return $options;
    }
    
    function get_dropdown_default_selection($varname){
        $result = db_select('mt_codelist', 'n')
                ->fields('n')
                ->condition('n.sub_cat', $varname)
                ->condition('n.sub_name', 'default')
                ->execute();
        $default_selection = array();
        while ($value = $result->fetchassoc()) {
            $default_selection = $value['code'];
        }

        return $default_selection;
    }
    
    
  //  eval( '$query = db_select('node', 'n'); $query->join('mt_codelist', 'c', 'n.title = c.name'); $result = $query ->fields('n', array('nid', 'title', 'type')) ->fields('c', array('code_id','name', 'code','sub_name', 'sub_code')) ->condition('n.type','membership','=') ->condition('c.sub_name','nid','=') ->execute(); $mismatches=array(); 
   //     foreach ($result as $row) { 
    
}