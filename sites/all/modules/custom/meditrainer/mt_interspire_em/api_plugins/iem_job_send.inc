<?php
require_once('iem_init.inc');
$IEM_API_JOB_SEND = new Jobs_Send_API();

function iem_job_send_loadJobDetails($job_id){
    return $IEM_API_JOB_SEND->LoadJobDetails($job_id);
}

/**
	* FetchJob
	* Fetches the next 'send' jobtype from the queue that is 'w'aiting.
	* It also checks for stalled sends, which are ones that haven't had a lastupdatetime update in the last 30 minutes.
	*
	* @return Int|False Returns false if there is no next job. Otherwise returns the jobid to run.
	*/
function iem_job_send_fetchJob(){
    return $IEM_API_JOB_SEND->FetchJob();
}

function iem_job_send_processJob($job_id){
    return $IEM_API_JOB_SEND->ProcessJob($job_id);
}

function iem_job_send_actionJob($job_id, $que_id){
    return $IEM_API_JOB_SEND->ActionJob($job_id, $que_id);
}

?>
