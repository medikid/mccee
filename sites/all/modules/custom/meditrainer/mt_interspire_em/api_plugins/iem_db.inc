<?php
require_once('iem_init.inc');
$IEM_API_DB = new API();

function iem_db_query_construct_select($select='', $from, $where=''){
    $query = "";
    
    if ( !is_array($select) || $select == ''){
	$query .= " SELECT * ";
    } else {
	$query .= " SELECT ";
	foreach ($select as $value){
	    $query .= "`".$value."`, ";
	}
    }
    
    if (is_array($from)){
	$query .= " FROM ";
	foreach ($from as $value){
	    $query .= "".SENDSTUDIO_TABLEPREFIX .$value." ";
	}
    }
    
    if ( !is_array($where) || $where == ''){
	$query .= " ";
    } else {
	$query .= " WHERE ";
	foreach ($where as $condition){
	    $key = $condition[0];
	    $value = $condition[1];
	    if (isset($condition[2]) || isset($condition[3])){
	    $operator = $condition[2];
	    $and_or = ($condition[3] == null) ? "": $condition[3] ;
	    } else {
		$operator = "=";
		$and_or = "";
	    }
	   
	    $query .= "".$key."";
	    $query .= "$operator";
	    $query .= "".$value." ";
	    $query .= "".$and_or." ";
	}
    }
    
    return $query;
}

function iem_db_query_query($query){
    $result = $cf->Db->Query($query);
    return $result;
}

function iem_db_query_fetch($result){
  $result_array =  $cf->Db->Fetch($result);
  return $result_array;
}


?>
