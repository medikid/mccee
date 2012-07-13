<?php 

class member{
    
    
	public $new_member, $uid, $name, $mail, $pass, $first_name, $last_name, $opt_newsletter, $aspiring_exam_can, $membership_category, $membership_type, $membership_role;
	
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
		/* $new_member=true;
		$uid = 1;
		
		$this->set_member_var($this->name, $form_state['storage']['name'] );
		$this->set_member_var($this->mail, $form_state['storage']['mail']);
		$this->set_member_var($this->pass, $form_state['storage']['pass']);
		$this->set_member_var($this->first_name, $form_state['storage']['first_name']);
		$this->set_member_var($this->last_name, $form_state['storage']['last_name']);
		
		$this->set_member_var($this->asp_exam, $form_state['storage']['asp_exam']);
		$this->set_member_var($this->mem_type, $form_state['storage']['mem_type']);
		$this->set_member_var($this->rate_card, $form_state['storage']['rate_card']);
		$role_type = 0;	
 */
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
	
	public function load_new_member_from_session()
	{
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
	
}