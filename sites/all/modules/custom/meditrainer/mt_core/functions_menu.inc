<?php

function get_mlid_by_title($menu_title){
    $result = db_select('menu_links', 'm')
    ->fields('m', array('mlid'))
    ->condition('link_title', $menu_title )
    ->execute()
    ->fetchAssoc();
    
    return $result['mlid'];
}

function get_mlid_by_linkpath($menu_linkpath){
    $result = db_select('menu_links', 'm')
    ->fields('m', array('mlid'))
    ->condition('link_path', $menu_linkpath )
    ->execute()
    ->fetchAssoc();
    
    return $result['mlid'];
}

function create_admin_menu($menu_title, $menu_linkpath, $parent_mlid = false){
           
    $item = array(
        'menu_name' => "Management",
        'mlid' => 0,
        'plid' => $parent_mlid == false ? 1 : $parent_mlid, //plid = 1 is main menu
        'link_path' => $menu_linkpath, // or drupal
        'link_title' => $menu_title,
        'router_path'=> $menu_linkpath

    );
    $mlid = menu_link_save($item);
    update_menu_link_table($mlid, 'module', 'system');
    update_menu_link_table($mlid, 'router_path', $menu_linkpath);
    return $mlid;
}

function change_menu_parent($current_child_mlid, $new_parent_mlid){
     $oldLinkItem = menu_link_load($current_child_mlid);
    $oldLinkItem['plid'] = $new_parent_mlid;
    menu_link_save($oldLinkItem);
}

function update_menu_link_table($mlid, $field_name, $field_value){
    $update = db_update('menu_links')
                ->fields(array(
                    $field_name => $field_value  
                    ))
            ->condition('mlid', $mlid)
            ->execute();
}

function get_menu_family_tree($mlid){
    
}

/*
 * returns an array of all children of the given father(one level)
 */
function get_menu_children($mlid){
    $menu_children = array();

        $children = db_select('menu_links', 'm')
                ->fields('m', array('mlid'))
                ->condition('plid', $mlid )
                ->execute()
                ->fetchAll(PDO::FETCH_ASSOC);

    foreach ($children as $value){
    array_push($menu_children, $value['mlid']);
    }
  
    return $menu_children;
}

function append_family_tree_children(&$fathers_array){
    foreach($fathers_array as $key => $value){
        $children = get_menu_children($value);
        if (count($children) > 0){
        $children_array = array($value => $children);
        array_push($fathers_array,$children_array);
        
        }
    }
    
    return $fathers_array;
}


function get_family_tree_below($mlid){
    $family_tree_below = array($mlid);
    $children_array = get_menu_children($mlid);
    
    if (count($children_array) > 0){
     $family_tree_below[$mlid] = $children_array;
    
     array_walk_recursive($family_tree_below[$mlid], "append_family_tree_children");
    }
    
    return $family_tree_below;
}

function has_children_menu($mlid){
    $has_child = false;
    
    
}


function delete_menu($mlid){
  $delete_menu =  db_delete('menu_links')
                    ->condition('mlid', $mlid)
                    ->execute();
}

?>