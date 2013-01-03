<?php
/**
 * This file contains Maintenance functions.
 *
 * @package interspire.iem.lib
 */

/**
 * Maintenance class
 *
 * This class provide all maintainace functions currently the maintanance provides
 * - Clearing up stall or user error import temp files
 * - Clearing up stall export data
 * - Clearing up unused cookies
 *
 *
 * @package interspire.iem.lib
 *
 */
class Maintenance
{
	/**
	 * IMPORT_EXPIRY_TIME
	 * @var import files expiry time to be 5 days old
	 */
	const IMPORT_EXPIRY_TIME = 432000;

	/**
	 * EXPORT_STALL_TIME
	 * @var export database query expiry time set to be 4 hour
	 */
	const EXPORT_STALL_TIME = 10800;



	/**
	 * Database access layer
	 * @var Db Database access layer
	 */
	private $_db = null;



	/**
	 * CONSTRUCTOR
	 * @return Maintenance Returns an instance of this object
	 */
	public function __construct()
	{
		$this->_db = IEM::getDatabase();
	}




	/**
	 * clearImportFiles
	 * Clearing the import files (from import to contact list).
	 *
	 * Files are cleared if they are older than the cutoff date.
	 * Cutoff date is specified in the class constat IMPORT_EXPIRY_TIME.
	 *
	 * The import files mainly exist because of fail export operation,
	 * or user stop during process and leaving the garbage temp file
	 *
	 * @return boolean Returns TRUE if successful, FALSE otherwise
	 *
	 * @uses Maintenance::IMPORT_EXPIRY_TIME
	 */
	public function clearImportFiles()
	{
		$importdir = IEM_STORAGE_PATH . '/import';

		// Since this might not necessarily a failure (No import have been done before)
		if (!is_dir($importdir)) {
			return true;
		}


		$handle = @opendir($importdir);
		if (!$handle) {
			trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Unable to read import directory', E_USER_WARNING);
			return false;
		}

		$cutoff_time = time() - self::IMPORT_EXPIRY_TIME;

		while (false !== ($file = @readdir($handle))) {
			if ($file{0} == '.') {
				continue;
			}

			$filedate = @filemtime($importdir . '/' . $file);
			if ($filedate === false) {
				trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Unable to obtain import file timestamp', E_USER_WARNING);
				continue;
			}

			if ($filedate < $cutoff_time) {
				if (!unlink($importdir . '/' . $file)) {
					trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Unable to delete old import file', E_USER_WARNING);
					continue;
				}
			}
		}

		@closedir($handle);

		return true;
	}

	/**
	 * pruneExportQueries
	 * To clear up all the unused entry in the export table...
	 * Check for any stalled or unused query that are stuck in the export table
	 *
	 * Finding out all the export query that are still longer than the EXPORT_STALL_TIME,
	 * foreach of the stalled job there, clear up the related entry in the email queues table.
	 * after all the email queues have been clear, clear up the jobs table entry.
	 *
	 * @return boolean Returns TRUE if successful, FALSE otherwise
	 */
	public function pruneExportQueries()
	{
		$stalljobs = array();
		$stalljobsId = array();
		$stallqueuesId = array();

		$cutoff_time = time() - self::EXPORT_STALL_TIME;

		$selectQuery = "
			SELECT	jobid, jobdetails
			FROM	[|PREFIX|]jobs
			WHERE	jobtype = 'export'
					AND jobtime <= {$cutoff_time}
		";

		$result = $this->_db->Query($selectQuery);
		if (!$result) {
			trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Export Query Error', E_USER_WARNING);
			return false;
		}

		while ($row = $this->_db->Fetch($result)) {
			array_push($stalljobs, $row['jobdetails']);
			array_push($stalljobsId, $row['jobid']);
		}

		$this->_db->FreeResult($result);

		// Since the queueid is stored inside a serialized jobdetails, we will need to process it.
		foreach ($stalljobs as $stalljob) {
			$jobdetails = unserialize($stalljob);
			if (empty($jobdetails) || !isset($jobdetails['ExportQueue']) || !is_array($jobdetails['ExportQueue'])) {
				continue;
			}

			foreach ($jobdetails['ExportQueue'] as $jobs_queue) {
				if(isset($jobs_queue['queueid'])) {
					array_push($stallqueuesId, $jobs_queue['queueid']);
				}
			}
		}

		// clearing all the stall queues
		if (!empty($stallqueuesId)) {
			$delSchedulesQuery = "
				DELETE FROM [|PREFIX|]queues
				WHERE 	queueid IN (" . implode(',', $stallqueuesId) . ")
						AND queuetype = 'export'
			";

			$status = $this->_db->Query($delSchedulesQuery);
			if (!$status) {
				trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Cannot delete export queue -- ' . $this->_db->Error(), E_USER_NOTICE);
				return false;
			}
		}

		// now after finish clearing up queues.. clear the actual job from the email_jobs;

		if (!empty($stalljobsId)) {
			$delJobsQuery = "
				DELETE from [|PREFIX|]jobs
				WHERE	jobid IN (" . implode(',', $stalljobsId) . ")
						AND jobtype = 'export'
			";

			$status = $this->_db->Query($delJobsQuery);
			if (!$status) {
				trigger_error(__CLASS__ . '::' . __METHOD__ . ' -- Cannot delete export job -- ' . $this->_db->Error(), E_USER_NOTICE);
				return false;
			}
		}

		return true;
	}

	/**
	 * clearOldSession
	 * Clearing up unwanted session files.
	 *
	 * In some servers, session files were not being cleaned up by the server automatically.
	 * This function will attempt to delete these older session files.
	 *
	 * @return boolean Returns TRUE if successful, FALSE otherwise
	 *
	 * @todo implementation
	 */
	public function clearOldSession()
	{
		// TODO this method has not been implemented yet
		return true;
	}
}
