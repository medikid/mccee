<?php

function setup_paypal_wps($is_sandbox = false){
    if ($is_sandbox == true){
/********
  * Paypal sandbox settings
 *********/
variable_set('uc_paypal_wps_server', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
variable_set('uc_paypal_wps_email', 'seller_1255269103_biz@meditrainer.com' );
    } else {

/********
  * Paypal production settings
 *********/
//variable_set('uc_paypal_wps_server', 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
//variable_set('uc_paypal_wps_email', 'seller_1255269103_biz@meditrainer.com' );
    }

/********
  * Paypal common settings
 *********/
variable_set('uc_paypal_wps_address_override', 1);
variable_set('uc_paypal_wps_address_selection', 'billing');
variable_set('uc_paypal_wps_cancel_return_url', 'cart' );
variable_set('uc_paypal_wps_checkout_button', 'Submit Order' );
variable_set('uc_paypal_wps_currency', 'CAD' );
variable_set('uc_paypal_wps_debug_ipn', 0 );
variable_set('uc_paypal_wps_language', 'US' );
variable_set('uc_paypal_wps_no_shipping', 1 );
variable_set('uc_paypal_wps_payment_action', 'Sale' );
variable_set('uc_paypal_wps_submit_method', 'single' );
}



?>
