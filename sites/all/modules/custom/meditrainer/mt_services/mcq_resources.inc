<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function _mcq_resource_retrieve($qid){
    $node = get_mcq_node_by_qid($qid);
    return $node;
}

function _mcq_resource_index($page, $parameters) {
  global $user;

  $mcqs = array();
  $res = db_query('SELECT * FROM `mcq_question_bank` q, `mcq_answer_bank`a WHERE q.qid = a.qid');

  foreach ($res as $mcq) {
    $mcqs[] = $mcq;
  }

  return $mcqs;
}

/**
* Access callback for the mcq resource.
*
* @param string $op
*  The operation that's going to be performed.
* @param array $args
*  The arguments that will be passed to the callback.
* @return bool
*  Whether access is given or not.
*/

function _mcq_resource_access($op, $args) {
  global $user;
  $access = FALSE;

  switch ($op) {
    case 'view':
      $note = get_mcq_node_by_qid($args[0]);
      $access = user_access('MCQ Resource view any question');
      $access = $access || $note->uid == $user->uid && user_access('MCQ Resource view own questions');
      break;
  }
  $access = TRUE;
 
  return $access;
}

?>
