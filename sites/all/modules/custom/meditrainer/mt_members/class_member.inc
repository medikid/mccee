<?php 

class member{
    
    
	public $new_member,
		$uid,
		$name,
		$mail,
		$pass,
		$first_name,
		$last_name,
		$opt_newsletter,
		$aspiring_exam_can,
		$membership_category,
		$membership_type,
		$membership_role;
	
	public function set_member_var($source_var, &$target_var){
		if (isset($source_var)){
	
			if (empty($target_var) || $target_var == ''){
				$target_var = $source_var;
			} elseif ($target_var != $source_var){
				$target_var = $source_var;
			}
		}
	}
	
	public function create_member_from_reg_form(&$form, &$form_state)
	{
		$new_member=true;
		
		$this->set_member_var( $form_state['input']['name'], $this->name );
		$this->set_member_var( $form_state['input']['mail'], $this->mail);
		$this->set_member_var( $form_state['input']['pass'], $this->pass);
		$this->set_member_var( $form_state['input']['first_name'], $this->first_name);
		$this->set_member_var( $form_state['input']['last_name'], $this->last_name);
		$this->set_member_var( $form_state['input']['opt_newsletter'], $this->opt_newsletter);
		
		$this->set_member_var( $form_state['input']['aspiring_exam_can'], $this->aspiring_exam_can);
		$this->set_member_var( $form_state['input']['membership_category'], $this->membership_category);
		$this->set_member_var( $form_state['input']['membership_type'], $this->membership_type);
		$membership_role = 0;
	
	}
	
	public function load_new_member_from_session(){
		if (isset($_SESSION['member_registration']['new_member'])){
		$new_member=true;
		$uid = 1;
		
		$this->set_member_var($_SESSION['member_registration']['new_member']['name'], $this->name );
		$this->set_member_var($_SESSION['member_registration']['new_member']['mail'], $this->mail);
		$this->set_member_var($_SESSION['member_registration']['new_member']['pass'], $this->pass);
		$this->set_member_var($_SESSION['member_registration']['new_member']['first_name'], $this->first_name);
		$this->set_member_var($_SESSION['member_registration']['new_member']['last_name'], $this->last_name);
		$this->set_member_var($_SESSION['member_registration']['new_member']['opt_newsletter'], $this->opt_newsletter);
		
		$this->set_member_var($_SESSION['member_registration']['new_member']['aspiring_exam_can'], $this->aspiring_exam_can);
-		$this->set_member_var($_SESSION['member_registration']['new_member']['membership_category'], $this->membership_category);
		$this->set_member_var($_SESSION['member_registration']['new_member']['membership_type'], $this->membership_category);
		$membership_role = 0;
                }
	}
	
	public function load(){
	     $member_data = db_select('mt_members', 'm')->fields('m')->condition('uid', $this->uid)->execute()->fetchAssoc();

	    $this->muid = $member_data['muid'];
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
	
	public function append_member_data(&$user){
	    $uid = $user->uid;
	    $this->uid = $uid;
	    $this->load();
	    
	    $user->muid = $this->muid ;
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
	
	public function save_new_member_to_session()
	{
		$new_member=true;
		$uid = 1;
		
		$_SESSION['member_registration']['new_member']['name'] = $this->name ;
		$_SESSION['member_registration']['new_member']['mail'] = $this->mail ;
		$_SESSION['member_registration']['new_member']['pass'] = $this->pass ;
		$_SESSION['member_registration']['new_member']['first_name'] = $this->first_name ;
		$_SESSION['member_registration']['new_member']['last_name'] = $this->last_name ;
		$_SESSION['member_registration']['new_member']['opt_newsletter'] = $this->opt_newsletter ;
		
		$_SESSION['member_registration']['new_member']['aspiring_exam_can'] = $this->aspiring_exam_can ;
		$_SESSION['member_registration']['new_member']['membership_category'] = $this->membership_category ;
		$_SESSION['member_registration']['new_member']['membership_type'] = $this->membership_type ;
		
		$membership_role = 0;
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
	
	public function update($field_array){
	    $q = db_update('mt_members')->fields($field_array)->condition('uid', $this->uid)->execute();
	}
	
	
}