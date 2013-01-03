<?php

class member{        
		var $new_member;
		var $uid;
		var $name;
		var $mail;
		var $pass;		
		var $membership_category;
		var $membership_role;
		var $muid;
		var $iem_subscriber_id;
		var $first_name;
		var $last_name;
		var $membership_type;
		var $parked_user_reason = 0;
		var $aspiring_exam_can = 0;
		var $aspiring_exam_us = 0;
		var $aspiring_exam_uk = 0;
		var $aspiring_exam_au = 0;
		var $reg_date;
		var $reg_expiry;
		var $opt_newsletter = 1;
		var $acc_status = 1;
		var $acc_susp = 0;
		var $payment_status = 0;
		var $payment_id = 0;
		
    public function __construct($uid=0) {
		    $this->uid = $uid;
    }
		
    public function set_member_var(&$target_var, $source_var){
		if (isset($source_var)){
	
			if (empty($target_var) || $target_var == ''){
				$target_var = $source_var;
			} elseif ($target_var != $source_var){
				$target_var = $source_var;
			}
		}
	}
		
	public function create_user(){
	    $account = new stdClass();
	    $account->is_new = TRUE;
	    $account->status = TRUE;
	    
	    $user_creation_args = array(
	    'name' => $this->name,
	    'pass' => (empty($this->pass) || !isset($this->pass)) ? user_password() : $this->pass,
	    'mail' => $this->mail,
	    'init' => $this->mail,
	    'roles' => array(2=>'authenticated user')
		);
	
	   $new_user = user_save($account, $user_creation_args);
	   $this->uid = $new_user->uid;
	}
	
	public function upgrade_to_member(){
	    if ($this->uid > 1 ){
		$member_creation_args = array(
		    'muid'=>null,
		    'uid'=>$this->uid,
		    'iem_subscriber_id' => $this->iem_subscriber_id,
                    'first_name' => $this->first_name,
                    'last_name'=> $this->last_name,
                    'membership_type'=>(int)$this->membership_type,
		    'parked_user_reason'=>$this->parked_user_reason,
		    'aspiring_exam_can'=>(int)$this->aspiring_exam_can,
		    'aspiring_exam_us'=> (int)$this->aspiring_exam_us,
		    'aspiring_exam_uk'=> (int)$this->aspiring_exam_uk,
		    'aspiring_exam_au'=> (int)$this->aspiring_exam_au,
                    'reg_date'=> REQUEST_TIME,
                    'reg_expiry'=>set_membership_duration((int)$this->membership_type),
		    'opt_newsletter'=>(int)$this->opt_newsletter,
                    'account_status'=>(int)$this->account_status,
		    'account_susp'=>(int)$this->account_susp,
		    'payment_status'=>(int)$this->payment_status,
		    'payment_id'=>(int)$this->payment_id
		);
		$member_id = db_insert('mt_members')
			    ->fields($member_creation_args)
			    ->execute();
		$this->muid = $member_id;
	    }
	}
	
	public function save_to_session()
	{	
		$session_var = array(
		    'new_member'=>$this->new_member,
		    'uid'=>$this->uid,
		    'name' => $this->name ,
		    'mail' => $this->mail ,
		    'pass' => $this->pass ,
		    'first_name' => $this->first_name ,
		    'last_name' => $this->last_name ,
		    'opt_newsletter' => $this->opt_newsletter ,

		    'aspiring_exam_can' => $this->aspiring_exam_can ,
		    'membership_category' => $this->membership_category ,
		    'membership_type' => $this->membership_type,
		    'membership_role'=>$this->membership_role
		);
		
		$_SESSION['member_registration']['new_member'] = $session_var;
	}
	
	public function load_from_session(){
	    $member_data = $_SESSION['member_registration']['new_member'];
	    $this->new_member = $member_data['new_member'];
	    $this->uid = $member_data['uid'];
	    $this->name = $member_data['name'];
	    $this->mail = $member_data['mail'];
	    $this->pass = $member_data['pass'];
	    $this->first_name = $member_data['first_name'];
	    $this->last_name = $member_data['last_name'];
	    $this->opt_newsletter = $member_data['opt_newsletter'];
	    
	    $this->aspiring_exam_can = $member_data['aspiring_exam_can'];
	    $this->membership_category = $member_data['membership_category'];
	    $this->membership_type = $member_data['membership_type'];
	    $this->membership_role = $member_data['membership_role'];
	    
	    
	    $this->iem_subscriber_id = $member_data['iem_subscriber_id'];
	     $this->parked_user_reason = $member_data['parked_user_reason'];
	     $this->aspiring_exam_us = $member_data['aspiring_exam_us'];
	     $this->aspiring_exam_uk = $member_data['aspiring_exam_uk'];
	     $this->aspiring_exam_au = $member_data['aspiring_exam_au'];
	     $this->reg_date = $member_data['reg_date'];
	     $this->reg_expiry = $member_data['reg_expiry'];
	     $this->opt_newsletter = $member_data['opt_newsletter'];
	     $this->acc_status = $member_data['acc_status'];
	     $this->acc_susp = $member_data['acc_susp'];
	     $this->payment_status = $member_data['payment_status'];
	     $this->payment_id = $member_data['payment_id'];    
	}
	
	public function load(){
	    //$member_data = db_select('mt_members', 'm')->fields('m')->condition('uid', $this->uid)->execute()->fetchAssoc();
	    
	    $member_data = user_load($this->uid);
	    $this->name = $member_data['name'];
	    $this->mail = $member_data['mail'];
	    $this->membership_role = $member_data['roles'];
	    
	    $this->muid = $member_data['muid'];
	    $this->iem_subscriber_id = $member_data['iem_subscriber_id'];
	     $this->first_name = $member_data['first_name'];
	     $this->last_name = $member_data['last_name'];
	     $this->membership_type = $member_data['membership_type'];
	     $this->parked_user_reason = $member_data['parked_user_reason'];
	     $this->aspiring_exam_can = $member_data['aspiring_exam_can'];
	     $this->aspiring_exam_us = $member_data['aspiring_exam_us'];
	     $this->aspiring_exam_uk = $member_data['aspiring_exam_uk'];
	     $this->aspiring_exam_au = $member_data['aspiring_exam_au'];
	     $this->reg_date = $member_data['reg_date'];
	     $this->reg_expiry = $member_data['reg_expiry'];
	     $this->opt_newsletter = $member_data['opt_newsletter'];
	     $this->acc_status = $member_data['acc_status'];
	     $this->acc_susp = $member_data['acc_susp'];
	     $this->payment_status = $member_data['payment_status'];
	     $this->payment_id = $member_data['payment_id'];
	}
	
	public function save(){
	    $account = user_load($this->uid);
	    
	    user_save((object)array('uid'=>$this->uid), (array)$account_data);
	}
	
	public function to_array(){
	    $array = array();
	    !empty($this->uid) ? $array['uid'] = $this->uid : 0;
	    !empty($this->name) ? $array['name'] = $this->name : '';
	    !empty($this->mail) ? $array['mail'] = $this->mail : '';
	    !empty($this->pass) ? $array['pass'] = $this->pass : '';
	    !empty($this->first_name) ? $array['first_name'] = $this->first_name : '';
	    !empty($this->last_name) ? $array['last_name'] = $this->last_name : '';
	    !empty($this->opt_newsletter) ? $array['opt_newsletter'] = $this->opt_newsletter : '';
	    
	    !empty($this->aspiring_exam_can) ? $array['aspiring_exam_can'] = $this->aspiring_exam_can : '';
	    !empty($this->aspiring_exam_us) ? $array['aspiring_exam_us'] = $this->aspiring_exam_us : '';
	    !empty($this->aspiring_exam_uk) ? $array['aspiring_exam_uk'] = $this->aspiring_exam_uk : '';
	    !empty($this->aspiring_exam_au) ? $array['aspiring_exam_au'] = $this->aspiring_exam_au : '';
	    !empty($this->membership_category) ? $array['membership_category'] = $this->membership_category : '';
	    !empty($this->membership_type) ? $array['membership_type'] = $this->membership_type : '';
	    !empty($this->membership_role) ? $array['membership_role'] = $this->membership_role : '';
	    
	    !empty($this->iem_subscriber_id) ? $array['iem_subscriber_id'] = $this->iem_subscriber_id : '';
	    
	    !empty($this->reg_date) ? $array['reg_date'] = $this->reg_date : '';
	    !empty($this->reg_expiry) ? $array['reg_expiry'] = $this->reg_expiry : '';
	    
	    !empty($this->account_status) ? $array['account_status'] = $this->account_status : '';
	    !empty($this->account_susp) ? $array['account_susp'] = $this->account_susp : '';
	    !empty($this->parked_user_reason) ? $array['parked_user_reason'] = $this->parked_user_reason : '';
	        
	    !empty($this->uid) ? $array['payment_status'] = $this->uid : '';
	    !empty($this->uid) ? $array['payment_id'] = $this->uid : '';	    
	    
	    return $array;
	}
	
	public function from_array($array){
	    isset($array['uid']) ? $this->uid = $array['uid'] : 0 ;
	    isset($array['name']) ? $this->name = $array['name'] : '' ;
	    isset($array['mail']) ? $this->mail = $array['mail'] : '' ;
	    isset($array['pass']) ? $this->pass = $array['pass'] : '' ;
	    isset($array['first_name']) ? $this->first_name = $array['first_name'] : '' ;
	    isset($array['last_name']) ? $this->last_name = $array['last_name'] : '' ;
	    isset($array['opt_newsletter']) ? $this->opt_newsletter = $array['opt_newsletter'] : 1 ;
	    
	    isset($array['aspiring_exam_can']) ? $this->aspiring_exam_can = $array['aspiring_exam_can'] : 0 ;
	    isset($array['membership_category']) ? $this->membership_category = $array['membership_category'] : '' ;
	    isset($array['membership_type']) ? $this->membership_type = $array['membership_type'] : '' ;
	    isset($array['membership_role']) ? $this->membership_role = $array['membership_role'] : '' ;
	    
	    
	    isset($array['iem_subscriber_id']) ? $this->iem_subscriber_id = $array['iem_subscriber_id'] : '' ;
	    isset($array['parked_user_reason']) ?  $this->parked_user_reason = $array['parked_user_reason'] : '' ;
	     isset($array['aspiring_exam_us']) ? $this->aspiring_exam_us = $array['aspiring_exam_us'] : 0 ;
	     isset($array['aspiring_exam_uk']) ? $this->aspiring_exam_uk = $array['aspiring_exam_uk'] : 0 ;
	     isset($array['aspiring_exam_au']) ? $this->aspiring_exam_au = $array['aspiring_exam_au'] : 0 ;
	     isset($array['reg_date']) ? $this->reg_date = $array['reg_date'] : '' ;
	     isset($array['reg_expiry']) ? $this->reg_expiry = $array['reg_expiry'] : '' ;
	     isset($array['opt_newsletter']) ? $this->opt_newsletter = $array['opt_newsletter'] : 1 ;
	     isset($array['acc_status']) ? $this->acc_status = $array['acc_status'] : 0 ;
	     isset($array['acc_susp']) ? $this->acc_susp = $array['acc_susp'] : 0 ;
	     isset($array['payment_status']) ? $this->payment_status = $array['payment_status'] : 0 ;
	     isset($array['payment_id']) ? $this->payment_id = $array['payment_id'] : 0 ; 
	}
	
	public function append_member_data(&$user){
	    $uid = $user->uid;
	    $this->uid = $uid;
	    $this->load();
	    
	    $user->muid = $this->muid ;
	    $user->iem_subscriber_id = $this->iem_subscriber_id;
	     $user->first_name = $this->first_name ;
	     $user->last_name = $this->last_name ;
	     $user->membership_type = $this->membership_type ;
	     $user->parked_user_reason = $this->parked_user_reason ;
	     $user->aspiring_exam_can = $this->aspiring_exam_can ;
	     $user->aspiring_exam_us = $this->aspiring_exam_us ;
	     $user->aspiring_exam_uk = $this->aspiring_exam_uk ;
	     $user->aspiring_exam_au = $this->aspiring_exam_au ;
	     $user->reg_date = $this->reg_date ;
	     $user->reg_expiry = $this->reg_expiry ;
	     $user->opt_newsletter = $this->opt_newsletter ;
	     $user->acc_status = $this->acc_status ;
	     $user->acc_susp = $this->acc_susp ;
	     $user->payment_status = $this->payment_status ;
	     $user->payment_id = $this->payment_id ;
	    
	}
	
	public function park_user_account($park_reason){
	    switch($park_reason){
		case 0:
		    $this->activate_user_account(true);
		    $q = db_update('mt_members')->fields(array('parked_user_reason' => $park_reason ))->condition('uid', $this->uid)->execute();
		   break;
	       default :
		   $this->activate_user_account(false);
		   $q = db_update('mt_members')->fields(array('parked_user_reason' => $park_reason ))->condition('uid', $this->uid)->execute();
		   break;
	    }
	}
	
	public function activate_user_account($activate = true){
	    $status = 0;
	    if ($activate == true){
	    $status = 1;
	    }
	    $q = db_update('users')->fields(array('status' => $status ))->condition('uid', $this->uid)->execute();
	}
	
	public  function is_free_member(){
	    $uid = $this->uid;
	    $is_free_user = true;
	    $query = db_select('mt_members', 'mtmb')
		    ->fields('mtmb')
		    ->condition('uid', $uid)
		    ->execute()
		    ->fetchAssoc();
	    if ($query['membership_type'] == 0){
		$is_free_user = true;
	    } else if($query['membership_type'] > 0){
		$is_free_user = false;
	    }

	    return $is_free_user;
	}
}
?>