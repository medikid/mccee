<?php
module_load_include('inc', 'mt_core','functions_menu');

function create_page_node($page_title, $page_content="", $allow_comment = false){
    $node_type =  'book';
    global $user;  
    
    $node = new stdClass();
      $node->type = $node_type;

      node_object_prepare($node); // This sets up all the default node fields so we don't accidentally leave something off.
   
        //struction of node;
        $node->type = $node_type;
        $node->title = $page_title;
        $node->uid = $user->uid;
        $node->status = 1;
        $node->comment = $allow_comment == false ? 1 : 2;
        $node->promote = "";
        $node->sticky = "";
        $node->created = REQUEST_TIME;
        $node->language = LANGUAGE_NONE;
        
        $node->body[$node->language][0]['value']   = $page_content;
        $node->body[$node->language][0]['summary'] = text_summary($page_content);
        $node->body[$node->language][0]['format']  = 'full_html';

        node_save($node);
       
        $nid = $node->nid;
        return $nid;
}

function link_page_menu($current_page_nid, $parent_page_nid){
    $current_page_node = node_load($current_page_nid);
    $parent_page_node = load_book_node($parent_page_nid);
    
    $item = array(
        'menu_name' => $parent_page_node['menu_name'],
        'mlid' => 0,
        'plid' => $parent_page_node['mlid'],
        'link_path' => 'node/'.$current_page_node->nid, // or drupal
        'link_title' => $current_page_node->title

    );
    $mlid = menu_link_save($item);
    update_menu_link_table($mlid, 'module', 'book');
    return $mlid;
}

function change_page_link($current_page_nid, $new_parent_nid){
    $current_node_mlid = get_mlid_by_nid($current_page_nid);
    $new_parent_node_mlid = get_mlid_by_nid($new_parent_nid);
    
    
    $oldLinkItem = menu_link_load($current_node_mlid);
    $oldLinkItem['plid'] = $new_parent_node_mlid;
    menu_link_save($oldLinkItem);
}

function get_mlid_by_nid($nid){
    $result = db_select('menu_links', 'm')
    ->fields('m', array('mlid'))
    ->condition('link_path', "node/".$nid )
    ->execute()
    ->fetchAssoc();
    
    return $result['mlid'];
}

function create_book_page($page_title, $page_content, $parent_page_title){
    $parent_page_nid = get_nid_by_title($parent_page_title);
    $parent_page_node = load_book_node($parent_page_nid);
    
    $current_page_nid = create_page_node($page_title, $page_content);
    
    $mlid = link_page_menu($current_page_nid, $parent_page_nid);
    
    $page_menu_id = db_insert('book') // Table name no longer needs {}
        ->fields(array(
        'mlid' => $mlid,
        'nid' => $current_page_nid,
        'bid' => $parent_page_node['bid'],
        ))
        ->execute();
    
    return $page_menu_id;
}

function get_nid_by_title($title){
    $result = db_query("SELECT n.nid FROM {node} n WHERE n.title = :title ", array(":title"=> $title));
    $book_nid = $result->fetchField();

    return $book_nid ;
}


function load_book_node($nid){
    $node = new stdClass();
    $node->type = 'book';
    node_object_prepare($node);
    $node = node_load($nid);

    $book_node = $node->book;

    return $book_node;
}




?>