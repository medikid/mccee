<?php


function message_activate_granted_free_role($user){
    $user_role = get_free_user_role_by_uid($user->uid);
    $user_one_time_login_url = user_pass_reset_url($user);
    
    $from = "[site:name]<[site:mail]>";//$site_name."<".$site_mail.">";
    $to = $user->mail;
    
    $subject = "[site:name] has granted you ".$user_role->role_title." membership";
    $body = "Dear ".$user->first_name.",";
    $body .= "\n\n";
    $body .= "Thank you for registering at Meditrainer. You have now been granted the following membership.";
    $body .= "\n\n";
    $body .= "Membership Name: ".$user_role->role_title."\n";
    $body .= "Membership Duration: ".$user_role->role_duration." ".$user_role->role_granularity."\n";
    $body .= "Membership expires on: ".date('d-M-Y', $user_role->expiration_timestamp)."\n";
    $body .= "\n\n";
    $body .= "You may now log in by clicking this link or copying and pasting it to your browser:";
    $body .= "\n\n";
    $body .= "".$user_one_time_login_url;
    $body .= "\n\n";
    $body .= "This link can be used only once to log in and will lead you to a page where you can set your password. ";
    $body .= "After setting your password, you will be able to log in using the following login details.";
    $body .= "\n\n";
    $body .= "Username: [user:name] \n";//.$user->name."\n";
    $body .= "Password: **Password you choose at the time of email activation** \n";
    $body .= "Email Activation link: ".$user_one_time_login_url."\n";
    $body .= "User Login link: [site:login-url]";
    $body .= "\n\n";
    $body .= "With Regards,";
    $body .= "\n";
    $body .= "[site:name] team";//$site_name." team";
    
    $message['from']=token_replace($from);
    $message['to'] = token_replace($to);
    $message['subject'] = token_replace($subject);
    $message['body'][] = token_replace($body, array('user'=>$user));
   
    return $message;

}
?>
