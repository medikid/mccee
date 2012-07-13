<?php

function get_schema_mcq_answer_bank(&$schema){
    $schema['mcq_answer_bank'] = array(
        'description' => 'Table catures answer and notes inputs',
        'fields' => array(
            'qid' => array(
                'description' => 'answer entry for coresponding qid in question bank',
                'type' => 'int',
                'not null' => TRUE,
            ),
            'answer' => array(
                'description' => 'answer key',
                'type' => 'varchar',
                'length' => '1',
                'not null' => FALSE,
            ),
            'rating' => array(
                'description' => 'rating for each answer entry',
                'type' => 'int',
                'not null' => FALSE,
            ),
            'notes' => array(
                'description' => 'notes - explaination for chosen for answer',
                'type' => 'varchar',
                'length' => '9999',
                'not null' => FALSE,
            ),
        ),
        'primary key' => array('qid'),
    );
}