<?php

 
    /*
     * new product class of membership is setup
     * tables involved = node type, uc_product_classes
     */
    function setup_membership_class(){
        $TABLE_NAME = 'node_type';
        $csv_data_node_type = load_csv($TABLE_NAME, get_csv_data_filepath('mt_memberships', $TABLE_NAME));
        foreach ($csv_data_node_type[$TABLE_NAME] as $row => $data_node_type) {
            $upload = db_insert($TABLE_NAME)->fields($data_node_type)->execute();
            }
        
        $TABLE_NAME = 'uc_product_classes';
        $csv_data_uc_product_class = load_csv($TABLE_NAME, get_csv_data_filepath('mt_memberships', $TABLE_NAME));
        foreach($csv_data_uc_product_class[$TABLE_NAME] as $row=>$data_uc_product_class){
        $upload = db_insert($TABLE_NAME)->fields($data_uc_product_class)->execute();
        }
        
    }
    
    function delete_membership_class(){
        $TABLE_NAME = 'node_type';
        db_delete_from_csv('mt_memberships', $TABLE_NAME, $TABLE_NAME, array('name','description'));
        
        $TABLE_NAME = 'uc_product_classes';
        db_delete_from_csv('mt_memberships', $TABLE_NAME, $TABLE_NAME, array('name','description'));
    }
        
    function setup_roles(){
        $TABLE_NAME = 'role';
        $csv_data_roles = load_csv($TABLE_NAME, get_csv_data_filepath('mt_memberships', $TABLE_NAME));
        foreach ($csv_data_roles[$TABLE_NAME] as $row => $data_roles) {
            $data_roles['rid'] = NULL;
            $upload = db_insert($TABLE_NAME)->fields($data_roles)->execute();
            }
    }
    
    function delete_roles(){
        $TABLE_NAME = 'role';
        db_delete_from_csv('mt_memberships', $TABLE_NAME, $TABLE_NAME, array('name','weight'));
    }
  
    /*
     * new product class of membership is setup
     * tables involved = node type, uc_product_classes
     */
    function setup_roles_and_memberships(){
        $data_node = load_csv('node', get_csv_data_filepath('mt_memberships', 'node'));
        $data_uc_products = load_csv('uc_products', get_csv_data_filepath('mt_memberships', 'uc_products'));
        $data_uc_product_features = load_csv('uc_product_features', get_csv_data_filepath('mt_memberships', 'uc_product_features'));
        $data_uc_roles_products = load_csv('uc_roles_products', get_csv_data_filepath('mt_memberships', 'uc_roles_products'));
       
        for($row=1;$row<=count($data_uc_products['uc_products']);$row++){
            create_membership_and_role(
                    $data_node['node'][$row],
                    $data_uc_products['uc_products'][$row],
                    $data_uc_product_features['uc_product_features'][$row],
                    $data_uc_roles_products['uc_roles_products'][$row]);
        }
    }
    
    function delete_roles_and_memberships(){
        $NODE_TYPE = 'membership';
        $select_nodes = db_select('node','nd')
        ->fields('nd', array('nid', 'vid'))
                ->condition('type', $NODE_TYPE)
                ->execute();
        while($nids_vids = $select_nodes->fetchAssoc()){
        //delete node data from table node
        node_delete($nids_vids['nid']);
        
        //delete node data from uc_products
        $delete_us_product = db_delete('uc_products')
                ->condition('nid',$nids_vids['nid'])
                ->condition('vid',$nids_vids['vid'])
                ->execute();
        
        
        //delete node data from uc_product_features
        $delete_us_product = db_delete('uc_product_features')
                ->condition('nid',$nids_vids['nid'])
                ->condition('fid','role')
                ->execute();
        
        //delete node data from uc_roles_products
        $delete_us_product = db_delete('uc_roles_products')
                ->condition('nid',$nids_vids['nid'])
                ->execute();
        
        }
        
    }
    
    /*
     * create new membership and populates node and uc_products table
     * parameters @data_node=row data from csv table  ex $data_node[$row_id]
     * parameters @data_oc_products=row data from csv table  ex $data_uc_products[$row_id]
     * 
     * returns new node id (nid) that was created
     */
    function create_membership_and_role($data_node, $data_uc_products, $data_uc_product_features, $data_uc_roles_products){
        
      require_once 'modules/node/node.pages.inc'; // Required for node_object_prepare();
      global $user;
      
      $node = new stdClass();
      $node->type = 'membership';

      node_object_prepare($node); // This sets up all the default node fields so we don't accidentally leave something off.
   
        //struction of node;
        $node->type = $data_node['type'];
        $node->title = $data_node['title'];
        $node->uid = $user->uid;
        $node->status = $data_node['status'];
        $node->comment = $data_node['comment'];
        $node->promote = $data_node['promote'];
        $node->sticky = $data_node['sticky'];
        $node->created = REQUEST_TIME;

        //structure of uc_product
        //$node->revision =  NULL;
        $node->model = $data_uc_products['model'];
        $node->list_price =  $data_uc_products['list_price'];
        $node->cost = $data_uc_products['cost'];
        $node->sell_price = $data_uc_products['sell_price'];
        $node->weight = $data_uc_products['weight'];
        $node->weight_units = $data_uc_products['weight_units'];
        $node->length = $data_uc_products['length'];
        $node->width = $data_uc_products['width'];
        $node->height = $data_uc_products['height'];
        $node->length_units = $data_uc_products['length_units'];
        $node->pkg_qty = $data_uc_products['pkg_qty'];
        $node->default_qty = $data_uc_products['default_qty'];
        $node->ordering = $data_uc_products['ordering'];
        $node->shippable = $data_uc_products['shippable'];

        $node->menu = Array
                        (
                            'link_title' => '',
                            'mlid' => 0,
                            'plid' => 0,
                            'menu_name' => 'main-menu',
                            'weight' => 0,
                            'options' => Array(),
                            'module' => 'menu',
                            'expanded' => 0,
                            'hidden' => 0,
                            'has_children' => 0,
                            'customized' => 0,
                            'parent_depth_limit' => 8
                        );

        // Prepare the node for saving
        if ($node = node_submit($node)) {
        // Save it
        node_save($node);
        }
        $node_id = $node->nid;
        
        $pfid = next_available_index('uc_product_features', 'pfid');
        //save product_feature - related to role feature
        $role_feature_data = array(
            'pfid'=> NULL,
            'nid'=>$node_id,
            'fid'=>$data_uc_product_features['fid'],
            'description'=>$data_uc_product_features['description']
        );
        uc_product_feature_save($role_feature_data);
        
        $data_uc_roles_products['pfid']= $pfid;
        $data_uc_roles_products['nid']=  $node_id;
        $csv_role_decode_old= get_csv_role_decode();
        $rid = db_select('role', 'rl')
                ->fields('rl', array('rid'))
                ->condition('name',$csv_role_decode_old[$data_uc_roles_products['rid']],'=')
                ->execute()
                ->fetchAssoc();
        //now assign the current rid
        $data_uc_roles_products['rid'] = $rid['rid'];
        $data_insert_uc_roles_products = db_insert('uc_roles_products')
                                        ->fields($data_uc_roles_products)
                                        ->execute();
    
    }
    
    function get_csv_role_decode(){
        $TABLE_NAME = 'role';
        $data_roles = load_csv($TABLE_NAME, get_csv_data_filepath('mt_memberships', $TABLE_NAME));
        foreach($data_roles[$TABLE_NAME] as $key=>$value){
            $csv_role_decode[$value['rid']]= $value['name'];
        }
        
        return $csv_role_decode;        
    }  