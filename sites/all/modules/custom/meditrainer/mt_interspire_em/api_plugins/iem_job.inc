<?php
require_once('iem_init.inc');
$IEM_API_JOB  = new Jobs_API();

function iem_job_create($jobtype=null, $when=0, $ownerid=0, $details=array(), $fktype='newsletter', $fkid=0, $lists=array(), $approved=0){
    return $IEM_API_JOB->Create($jobtype, $when, $ownerid, $details, $fktype, $fkid, $lists, $approved);
}

function iem_job_approveJob($job_id=0, $userid=0, $authorisedtosend=0){
    return $IEM_API_JOB->ApproveJob($job_id, $userid, $authorisedtosend);
}

function iem_job_delete($job_id=0){
    return $IEM_API_JOB->Delete($job_id);
}

function iem_job_startJob($job_id=0){
    return $IEM_API_JOB->StartJob($job_id);
}

function iem_job_pauseJob($job_id=0){
    return $IEM_API_JOB->PauseJob($job_id);
}

function iem_job_resumeJob($job_id=0){
    return $IEM_API_JOB->ResumeJob($job_id);
}

function iem_job_loadJobDetails($job_id=0){
    return $IEM_API_JOB->LoadJobDetails($job_id);
}

function iem_job_loadJob($job_id=0){
    return $IEM_API_JOB->LoadJob($job_id);
}

function iem_job_findJob($jobtype='send', $queuetype='newsletter', $fkid=0, $only_approved=false, $include_complete_jobs=true, $include_paused_jobs=true){
    return $IEM_API_JOB->findJob($jobtype, $queuetype, $fkid, $only_approved, $include_complete_jobs, $include_paused_jobs);
}

function iem_job_finishJob($job_id=0){
    return $IEM_API_JOB->finishJob($job_id);
}

function iem_job_isJobStarted($job_id=0){
    return $IEM_API_JOB->JobStarted($job_id);
}

function iem_job_getJobQueue($job_id=0){
    return $IEM_API_JOB->GetJobQueue($job_id);
}

function iem_job_fetchJob($jobtype=null){
    return $IEM_API_JOB->FetchJob($jobtype);
}

function iem_job_processJob($job_id=0){
    return $IEM_API_JOB->ProcessJob($job_id);
}

function iem_job_getJobLists($jobtype='send', $queuetype='newsletter', $ids=array(), $countonly=false, $start=0, $perpage=0, $include_unapproved=false, $chronological=true, $userid=0){
    return $IEM_API_JOB->GetJobLists($jobtype, $queuetype, $ids, $countonly, $start, $perpage, $include_unapproved, $chronological, $userid);
}

function iem_job_getJobStatus($status='c'){
    return $IEM_API_JOB->getJobStatus($status);
}

function iem_job_resendJob($job_id=0){
    return $IEM_API_JOB->ResendJob($job_id);
}
?>
