<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function export_object_mcq(){
    
$query = db_select('mcq_question_bank', 'q');
$query->join('mcq_answer_bank', 'a', 'q.qid = a.qid');
$query->fields('q');//SELECT the fields from node
$query->fields('a');//SELECT the fields from user
$results = $query->execute();
$mcqs = $results->fetchAll(PDO::FETCH_ASSOC);

return $mcqs;
}
?>
