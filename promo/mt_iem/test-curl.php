<?php
/*
 jQuery(document).ready(function(){
    jQuery.ajax({
      url     : "http://localhost/mccee/promo/admin/index.php?Page=Users&Action=GenerateToken",
      type    : "post",
      dataType: "json",
      data: { username: "mt_xml_user1",
  fullname: "XML User 1",
  emailaddress:"admin@meditrainer.com" },
      success :  function( data ) {
	alert(data)
        } 
      })
    });
 */
$url = "http://localhost/mccee/promo/admin/index.php?Page=Users&Action=GenerateToken";
$post_data = "{ username : 'mt_xml_user1',
  fullname : 'XML User 1',
  emailaddress : 'admin@meditrainer.com' }";

$post_data_array = array();
$post_data_array['username'] = 'mt_xml_user1';
$post_data_array['fullname'] = 'XML User 1';
$post_data_array['emailaddress'] = 'admin@meditrainer.com' ;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data_array );
$result = @curl_exec($ch);
if($result === false) {
echo "Error performing request";
}
else {
    /*
$xml_doc = simplexml_load_string($result);
echo 'Status is ', $xml_doc->status, '<br/>';
if ($xml_doc->status == 'SUCCESS') {
echo 'Data is ', $xml_doc->data, '<br/>';
} else {
echo 'Error is ', $xml_doc->errormessage, '<br/>';
}*/
}


    echo $result;
?>