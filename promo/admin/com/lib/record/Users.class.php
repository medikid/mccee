<?php
/**
 * This file contains record_Users class definition
 *
 * @package interspire.iem.lib.record
 */

/**
 * User Record class definition
 *
 * This class will provide encapsulation to access record level information from a database.
 * It mainly provide an interface for developers to have their code cleaner.
 *
 * NOTE:
 * - There are two valid types of user status currently available 0 and 1 to indicate "Active" and "Inactive" status.
 * - Two types of "admintype" is currently recognized a and c to indicate "System Admin" and "Regular User".
 * - Two types of "listadmintype": a and c to indicate "List Admin" and "Non list admin" -- This is hardly used, its use might need to be reconsidered.
 * - Two types of "segmentadmintype": a and c to indicate "Segment Admin" and "Non segment admin" -- This is hardly used, its use might need to be reconsidered.
 *
 * @property integer $userid User ID
 * @property integer $groupid User group ID
 * @property string $username Username
 * @property string $password User password
 * @property string $status User status. See note above about user status
 * @property string $admintype Admin type. See note above about admin type
 * @property string $listadmintype List Admin type. See not above about list admin type
 *
 * @property integer $permonth Email limit per month
 *
 * @property integer $credit_warning_time Time of which last warning was sent
 * @property integer $credit_warning_percentage The percentage level of credit when user received the last warning (used by monthly credit)
 * @property integer $credit_warning_fixed The credit level of credit when user received the last warning (used by fixed credit)
 *
 * @package interspire.iem.lib.record
 *
 * @todo all
 */
class record_Users extends IEM_baseRecord
{
	public function __construct($data = array())
	{
		$this->properties = array(
			'userid'						=> null,
			'groupid'						=> null,
			'trialuser'						=> '0',
			'username'						=> null,
			'password'						=> null,
			'status'						=> '0',
			'admintype'						=> 'c',
			'listadmintype'					=> 'c',
			'templateadmintype'				=> 'c',
			'segmentadmintype'				=> 'c',
			'fullname'						=> null,
			'emailaddress'					=> null,
			'settings'						=> null,
			'editownsettings'				=> '0',
			'usertimezone'					=> null,
			'textfooter'					=> null,
			'htmlfooter'					=> null,
			'infotips'						=> '0',
			'smtpserver'					=> null,
			'smtpusername'					=> null,
			'smtppassword'					=> null,
			'smtpport'						=> 0,
			'createdate'					=> 0,
			'lastloggedin'					=> 0,
			'forgotpasscode'				=> null,
			'usewysiwyg'					=> '1',
			'xmlapi'						=> '0',
			'xmltoken'						=> null,
			'gettingstarted'				=> 0,
			'googlecalendarusername'		=> null,
			'googlecalendarpassword'		=> null,
			'user_language'					=> 'default',
			'unique_token'					=> null,
			'enableactivitylog'				=> '1',
			'eventactivitytype'				=> null,
			'forcedoubleoptin'				=> '0',
			'credit_warning_time'			=> null,
			'credit_warning_percentage'		=> null,
			'credit_warning_fixed'			=> null,
			'adminnotify_email'				=> null,
			'adminnotify_send_flag'			=> '0',
			'adminnotify_send_threshold'	=> null,
			'adminnotify_send_emailtext'	=> null,
			'adminnotify_import_flag'		=> '0',
			'adminnotify_import_threshold'	=> null,
			'adminnotify_import_emailtext'	=> null,
		);

		parent::__construct($data);
	}
	
	/**
	 * Returns the group associated to the current user.
	 * 
	 * @return record_UserGroups
	 */
	public function getGroup()
	{
		return API_USERGROUPS::getRecordById($this->groupid);
	}

	/**
	 * Returns whether or not the current user is an administrator..
	 * 
	 * @return bool
	 */
	public function isAdmin()
	{
		return $this->getGroup()->isAdmin();
	}
	
	/**
	 * Retrieves the amount of credit the user has used this hour.
	 * 
	 * @return int
	 */
	public function getUsedHourlyCredit()
	{
		$thisHour = AdjustTime(array (date('H')    , 0, 0, date('n'), date('j'), date('Y')), true, null, true);
		$nextHour = AdjustTime(array (date('H') + 1, 0, 0, date('n'), date('j'), date('Y')), true, null, true);
		
		return $this->getUsedCredit($thisHour, $nextHour);
	}
	
	/**
	 * Retrieves the amount of credit the user has used this month.
	 * 
	 * @return int
	 */
	public function getUsedMonthlyCredit()
	{
	    $thisMonth = AdjustTime(array(0, 0, 0,  date('m')      , 1, date('Y')), true, null, true);
		$nextMonth = AdjustTime(array(0, 0, 0, (date('m') + 1) , 1, date('Y')), true, null, true);
		
		return $this->getUsedCredit($thisMonth, $nextMonth);
	}
	
	/**
	 * Retrieves the amount of credit used in total by the current user.
	 * 
	 * @param int|number|string $startDate A start date, or timestamp of when
	 *                                     the credit range should start.
	 * @param int|number|string $endDate   An end date, or timestamp of when
	 *                                     the credit range should end.
	 * 
	 * @return int
	 */
	public function getUsedCredit($startDate = null, $endDate = null)
	{
	    $db    = IEM::getDatabase();
	    $query = "
			SELECT
				SUM(emailssent) as sendsize
			FROM
				[|PREFIX|]user_stats_emailsperhour
			WHERE
				userid = {$this->userid}
		";
	    
	    if ($startDate) {
	    	if (is_numeric($startDate)) {
	        	strtotime($startDate);
	    	}
	    	
	        $query .= ' AND sendtime >= ' . $startDate;
	    }
	    
	    if ($endDate) {
	    	if (is_numeric($endDate)) {
	        	strtotime($endDate);
	    	}
	    	
	        $query .= ' AND sendtime < ' . $endDate;
	    }
	    
	    $query   .= ' AND statid != 0';
	    $result   = $db->FetchOne($query);
		$credits  = (int) $result;
        
		$db->FreeResult($result);
		
		// retrieve the number of current items in the user's queue
		$result = $db->Query("
			SELECT
				ls.emailaddress
			FROM
				[|PREFIX|]jobs             AS j,
				[|PREFIX|]jobs_lists       AS jl,
				[|PREFIX|]list_subscribers AS ls
			WHERE
				j.ownerid    = {$this->userid} AND
				j.approved  != 0               AND
				j.jobtype    = 'send'          AND
				j.jobstatus != 'c'             AND
				jl.jobid     = j.jobid         AND
				ls.listid    = jl.listid
			GROUP BY
				ls.emailaddress
		");
		
		// add on the current queue
		while ($row = $db->Fetch($result)) {
			$credits += 1;
		}
		
		$db->FreeResult($result);
		
		return $credits;
	}
}
