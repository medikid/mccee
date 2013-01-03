<?php

// Make sure that the IEM controller does NOT redirect request.
if (!defined('IEM_NO_CONTROLLER')) {
    define('IEM_NO_CONTROLLER', true);
}


// Require base sendstudio functionality. This connects to the database, sets up our base paths and so on.
// This example file was located in the IEM main directory (the same directory where the admin, includes, and users directories are located)

require_once(dirname(__FILE__) . '/admin/index.php');


// This file lets us get api's, load language files and parse templates.

require_once(SENDSTUDIO_FUNCTION_DIRECTORY . '/sendstudio_functions.php');

$sendstudio_functions = new Sendstudio_Functions();

$subscriberapi = $sendstudio_functions->GetApi('Subscribers');

//$response = $subscriberapi->AddToList('email@address.com', 'Test');

/*if (!$response) {
    echo "AddToList failed.";
} else {
    echo "Subscriber added successfully. Subscriber ID: $response.";
}*/
$jobsSendApi=$sendstudio_functions->GetApi('Jobs_Send');
$jobsSendApi=$sendstudio_functions->GetApi('Stats');
$newJob= new Jobs_Send_API();
$subscriber= new Subscribers_API();
//$subscriberInfo= $subscriber->LoadSubscriberBasicInformation(1,1);
/******
 *Following are required class function 
 * API:CreateQue, AddToQue
 * JOBS_API:Create,ApproveJob,StartJob,FinishJob
 * JOBS_SEND_API:FetchJOb, ProcessJob, ActionJob
 * working:ResetJob,LoadJobDetails
 */
//$recepients=array(1,1);

//$jobId=$newJob->Create('Send',$timenow(),1,$details=array($subscriberid=2),'newsletter',1,1,1);
//$approveJob=$newJob->ApproveJob($jobId,'1','1');

//$QueueId=$newJob->CreateQueue('SEND',$recipients);

//$queId=$newJob->CreateQueue('Send',$recepients); //works
//$sent=$newJob->SendToRecipient($subscriberInfo,$queId,'send');

/*$processJob=$newJob->SetupJob(11,3);

$actionJob=$newJob->ActionJob(11,3);
$sent=$newJob->SendToRecipient(2,3,'send');
$details=Array( "NewsletterChosen" => 0,
				"Lists" =>  1, 
				"SendCriteria" => Array ( 
									"Email" => 'admin@meditrainer.com',
				 					"Confirmed" => 1, 
				 					"List" =>  1 
				 					), 
				 "Newsletter" => 1, 
				 "SendFromName" => 'admin', 
				 "SendFromEmail" => 'admin@meditrainer.com', 
				 "ReplyToEmail" => 'admin@meditrainer.com'
				 			
				 ); 
			*/

/*$details=Array( "NewsletterChosen" => 2,
				"Lists" =>  1, 
				"SendCriteria" => Array ( 
									"Email" => 'admin@meditrainer.com',
				 					"Confirmed" => 1, 
				 					"List" =>  1 
				 					), 
				 "Newsletter" => 2, 
				 "SendFromName" => 'admin', 
				 "SendFromEmail" => 'admin@meditrainer.com', 
				 "ReplyToEmail" => 'admin@meditrainer.com'
				 			
				 ); 
*/
//$details=$newJob->LoadJobDetails(1);//works - loads details of job if you provide jid
//$jid=$newJob->Create('Send',NOW,1,$details,'newsletter',2,1,1);//works - will add a new job
//$fetch=$newJob->FetchJob(); //works - gets next available first available 'w'ating job and returns jid
//$process=$newJob->ProcessJob($fetch); //works - will process that job
//$action=$newJob->ActionJob($fetch,10); //works - will set complete. 

//$reset=$newJob->ResetSend(1);
//$r=$newJob->ResendJob_Setup(1);
//$t=$newJob->ResendJob(1);
 
$cf = $sendstudio_functions->GetApi('CustomFields');


//$q = iem_db_query_construct_select('', array('customfields'), array(array('fieldid',3,"<","and"), array('fieldid',10,">",null) ));
//$cf = new API();

//$result = $cf->Db->Query("Select * From " . SENDSTUDIO_TABLEPREFIX . "customfields WHERE fieldid=2 ");
//$q = $cf->Db->Fetch($result);

//$cf->Settings['FieldName'] = 'mt_uid';
//$cf->fieldtype = 'number';
//$cf->Associations = array();
//$cf->ownerid = 11;
//$cf->isglobal = 1;

$cf->Load(12);
//$q = $cf->Create();
echo "<pre>";
print_r($cf);
echo "</pre>";


?>
