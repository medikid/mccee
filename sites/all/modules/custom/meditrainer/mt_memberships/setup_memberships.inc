<?php


function get_membership_codelist(){
   $query = db_select('mt_codelist', 'cdl')
	    ->fields('cdl')
	    ->condition('sub_cat', 'membership_type')
	    ->execute();
    $data = array();
    while($result = $query->fetchAssoc()){
	$data[$result['code']] ['name'] = $result['name'];
	  $data[$result['code']]['code'] = $result['code'];
	   $data[$result['code']][$result['sub_name']]= $result['sub_code'];
    }
    return $data;
}

function get_membership_data(){
    $membership_data = array();
    $codelist_data = get_membership_codelist();
    
    foreach ($codelist_data as $key=>$value){
	$d = explode("-", $value['name']);
	$e = explode(" ", trim($d[1]));
	
	$membership_data[$key]['name'] = $value['name'];
	$membership_data[$key]['model'] = $value['code'];
	$membership_data[$key]['sell_price'] = $value['price'];
	$membership_data[$key]['role_name'] = trim($d[0]);
	$membership_data[$key]['role_type'] = trim(str_ireplace("User", " ", $d[0]));
	$membership_data[$key]['duration'] = trim($e[0]);
	$membership_data[$key]['granularity'] = trim($e[1]);
    }
    
    return $membership_data;
}

/*
 * adds memberships products to Node and uc_products tables
 */
function add_new_memberships($membership_data){
    $node = new stdClass();
    $node->type = "membership";
    $node->title = $membership_data['name'];
    $node->comment = 0;
    node_object_prepare($node);
    
    $node->model = $membership_data['model'];
    $node->sell_price = $membership_data['sell_price'];
    $node->shippable = 0;
    
    node_save($node);
    
    return $node->nid;
}

function delete_memberships($nid){
    node_delete($nid);
}

function add_new_role($membership_data){
    $entry_count = db_select('role', 'rl')
		    ->fields('rl')
		    ->condition('name',$membership_data['role_name'])
		    ->execute()
		    ->rowCount();
    $rid=0;
    if ($entry_count > 0){
	$rid = db_select('role', 'rl')
		    ->fields('rl', array('rid'))
		    ->condition('name', $membership_data['role_name'])
		    ->execute()
		    ->fetchField();
    } else {    
	    $r = new stdClass();
	    $r->name = $membership_data['role_name'];
	    user_role_save($r);
	    $rid = $r->rid;
    }
    
    return $rid;
}

/*
 * add a node type to node_type
 */
function add_membership_node_type($node_type_name){
    $node_type = new stdClass();
    $node_type->type = strtolower($node_type_name);
    $node_type->name = $node_type_name;
    $node_type->base = "uc_product";
    $node_type->module = "uc_product";
    $node_type->description = "Site Membership Subscription";
    $node_type->title_label = "Name";
    
    node_type_set_defaults($node_type);
    
    return node_type_save($node_type);
}

function delete_membership_node_type($node_type_name){    
    db_delete('node_type')->condition('name', $node_type_name)->execute();
}
/*
 * add node_type to product_classes of membership
 */
function add_membership_product_class($node_type_name){
    $node_type = db_select('node_type', 'nt')
		    ->fields('nt')
		    ->condition('name', $node_type_name)
		    ->execute()
		    ->fetchAssoc();
    
    $membership_product_class = array(
	'pcid'=>$node_type['type'],
	'name'=>$node_type['name'],
	'description'=>$node_type['description']
    );
    
    $is_saved = db_insert('uc_product_classes')
		->fields($membership_product_class)
		->execute();
    return $is_saved;
}

function delete_membership_product_class($node_type_name){
    db_delete('uc_product_classes')->condition('name', $node_type_name)->execute();
}

function add_membership_product_features($membership_data, $nid){
    
    $data_product_features = array(
	'pfid'=>NULL,
	'nid'=>$nid,
	'fid'=>'role',
	'description'=>	"<strong>SKU:</strong>".$membership_data['model']
	."<br /><strong>Role:</strong>".$membership_data['role_name']
	."<br /><strong>Expiration:</strong>".$membership_data['duration']." ".$membership_data['granularity']."(s)"
	."<br /><strong>Shippable:</strong> No<br /><strong>Multiply by quantity:</strong> No"
    );
    
    $pfid = db_insert('uc_product_features')->fields($data_product_features)->execute();
    
    return $pfid;
}

function delete_membership_product_features($nid){
    db_delete('uc_product_features')->condition('nid', $nid)->execute();
}

function add_roles_products($membership_data, $nid, $pfid, $rid){
 $data_roles_products = array(
     'rpid' => NULL,
     'pfid' => $pfid,
     'nid' => $nid,
     'model' => $membership_data['model'],
     'rid' => $rid,
     'start_override' => 0,
     'start_time' => 0,
     'end_override' => 1,
     'end_time' => 0,
     'duration' => $membership_data['duration'],
     'granularity' => $membership_data['granularity'],
     'shippable' => 0,
     'by_quantity' => 0
     );
 $rpid = db_insert('uc_roles_products')->fields($data_roles_products)->execute();
 return $rpid;
}

function delete_roles_products($nid){
    db_delete('uc_roles_products')->condition('nid', $nid)->execute();
}

function memberships_install(){
    $membership_node_type_name = "Membership";
    add_membership_node_type($membership_node_type_name);
    add_membership_product_class($membership_node_type_name);
    
    $memberships_data = get_membership_data();
   
    foreach($memberships_data as $membership_data){
	$nid = add_new_memberships($membership_data);
	$pfid = add_membership_product_features($membership_data, $nid);
	$rid = add_new_role($membership_data);
	$rpid = add_roles_products($membership_data, $nid, $pfid, $rid);
    }
    
}

function memberships_uninstall(){
    $membership_node_type_name = "Membership";
    $node = db_select('node', 'nd')->fields('nd')->condition('type', strtolower($membership_node_type_name))->execute();

    while ($r = $node->fetchAssoc()){
	$rp = db_select('uc_roles_products', 'rp')->fields('rp')->condition('nid', $r['nid'])->execute()->fetchAssoc();
	$nid = $rp['nid'];
	
	delete_roles_products($nid);
	delete_membership_product_features($nid);
	delete_memberships($nid);

	//$rid = $rp['rid'];
	//db_delete('role')->condition('rid', $rid)->execute();
    }
    
    delete_membership_node_type($membership_node_type_name);
    delete_membership_product_class($membership_node_type_name);
}

    function activate_payment_gateway($payment_gateway_name, $activate_yn){
     $gateway_variable = 'uc_payment_method_'. $payment_gateway_name .'_checkout';
        variable_set($gateway_variable, $activate_yn);
    }