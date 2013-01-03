<?php
/**
* This file has the install functions in it.
*
* @version     $Id: installer.php,v 1.37 2008/02/20 22:06:02 chris Exp $
* @author Chris <chris@interspire.com>
*
* @package SendStudio
* @subpackage SendStudio_Functions
*/

/**
 * Make sure that the installer CANNOT be loaded again if the application has already been installed
 */
	$tempFile = dirname(__FILE__) . '/../includes/config.php';
	if (is_file($tempFile)) {
		require_once $tempFile;
		if (defined('SENDSTUDIO_IS_SETUP') && SENDSTUDIO_IS_SETUP == 1) {
			header('Location: ' . SENDSTUDIO_APPLICATION_URL);
			die('Redirecting .... to <a href="' . SENDSTUDIO_APPLICATION_URL . '">' . SENDSTUDIO_APPLICATION_URL . '</a>');
		}
	}
	unset($tempFile);
/**
 * -----
 */


/**
* Include the base sendstudio functions.
*/
require_once(dirname(__FILE__) . '/sendstudio_functions.php');

/**
 * Include the whitelabel file.
 */
require_once(IEM_PATH . '/language/default/whitelabel.php');

/**
* Class for the welcome page. Includes quickstats and so on.
*
* @package SendStudio
* @subpackage SendStudio_Functions
*/
class Installer extends SendStudio_Functions
{
	/**
	 * Installer API
	 */
	private $_api;

	/**
	* Constructor
	* Doesn't do anything.
	*
	* @return Void Doesn't return anything.
	*/
	public function __construct()
	{
	    // if iem is already installed, then we redirect to the home page
	    if (IEM::isInstalled()) {
	        header('Locatin: index.php');
	        
	        exit;
	    }
	    
		$this->_api = new IEM_Installer();
	}

	/**
	* Process
	* Works out which step we are up to in the install process and passes it off for the other methods to handle.
	*
	* @return Void Works out which step you are up to and that's it.
	*/
	public function Process()
	{
		$errors = $db_errors = $permission_errors = $server_errors = array();

		// Check permissions
		list($error, $msgs) = $this->_api->CheckPermissions();
		if ($error) {
			$permission_errors = $msgs;
		}
		// Check some server settings
		list($error, $msgs) = $this->_api->CheckServerSettings();
		if ($error) {
			$server_errors = $msgs;
		}

		$step = 0;
		if (isset($_GET['Step'])) {
			$step = (int)$_GET['Step'];
		}

		switch ($step) {
			case '1':
				$lk_check        = array();
				$required_fields = array(
					'applicationurl'         => 'application url',
					'contactemail'           => 'application email address',
					'admin_username'         => 'administrator username',
					'admin_password'         => 'administrator password',
					'admin_password_confirm' => 'confirmation password'
				);

				// Verify the admin password confirmation checks out
				if (isset($_POST['admin_password']) && $_POST['admin_password'] != '') {
					if (isset($_POST['admin_password_confirm']) && $_POST['admin_password_confirm'] != '') {
						if ($_POST['admin_password'] != $_POST['admin_password_confirm']) {
							$errors[] = 'Your passwords do not match. Please enter your password again and confirm it to make sure they are the same';
						}
					}
				}

				// Collect database settings
				if (!isset($_POST['dbtype'])) {
					$errors[] = 'Please choose the type of database you want to use';
				} else {
					$found_missing_db_field = false;
					$required_db_fields = array ('dbusername' => 'database username', 'dbhostname' => 'database hostname', 'dbname' => 'database name');
					foreach ($required_db_fields as $field => $desc) {
						if ($_POST['dbtype'] == 'mysql') {
							$field = 'mysql_' . $field;
							$db_type_message = 'MySQL';
						} elseif ($_POST['dbtype'] == 'pgsql') {
							$field = 'pgsql_' . $field;
							$db_type_message = 'PostgreSQL';
						} else {
							$errors[] = 'Please choose a valid database type. We currently only support MySQL or PostgreSQL';
							break;
						}

						$show_n = false;
						if (in_array(substr(strtolower($desc), 0, 1), array('a','e','i','o','u'))) {
							$show_n = true;
						}
						$error_message = 'Please enter a' . (($show_n) ? 'n' : '') . ' ' . $db_type_message . ' ' . $desc;
						if (!isset($_POST[$field]) || $_POST[$field] == '') {
							$errors[] = $error_message;
							$found_missing_db_field = true;
							continue;
						}
					}

					// Return to form with error messages if there were errors.
					// We do this here so that it won't load the DB schema unless everything else has checked out so far.
					if (count(array_merge($permission_errors, $server_errors, $errors, $db_errors))) {
						$this->ShowForm($permission_errors, $server_errors, $errors, $db_errors);
						break;
					}

					// Collect the required settings
					$settings = array();

					$from_form = array (
						'DATABASE_TYPE'		=> 'dbtype',
						'APPLICATION_URL'	=> 'applicationurl',
						'EMAIL_ADDRESS'		=> 'contactemail',
					);

					foreach ($from_form as $option => $post_field) {
						$settings[$option] = $_POST[$post_field];
					}

					$db_fields_from_form = array (
						'DATABASE_USER'	=> 'dbusername',
						'DATABASE_PASS'	=> 'dbpassword',
						'DATABASE_HOST'	=> 'dbhostname',
						'DATABASE_NAME'	=> 'dbname',
						'TABLEPREFIX'	=> 'tableprefix',
					);

					foreach ($db_fields_from_form as $option => $post_field) {
						if ($settings['DATABASE_TYPE'] == 'mysql') {
							$post_field = 'mysql_' . $post_field;
						} else {
							$post_field = 'pgsql_' . $post_field;
						}
						$settings[$option] = $_POST[$post_field];
					}

					// Load the required settings into the API
					$this->_api->LoadRequiredSettings($settings);

					if (!$found_missing_db_field) {

						// Set up the database
						list($errcode, $msg) = $this->_api->SetupDatabase();
						switch ($errcode) {
							case IEM_Installer::SUCCESS:
								// nothing to do
								break;
							case IEM_Installer::DB_CONN_FAILED:
								$errors[] = 'E-Mail Marketer was unable to connect to the database. Please check the settings and try again. The error message is: <br/>' . $msg;
								break;
							case IEM_Installer::DB_BAD_VERSION:
								$errors[] = 'E-Mail Marketer requires ' . $msg['product'] . ' ' . $msg['req_version'] . ' or above to work properly. Your server is running ' . $msg['version'] . '. To complete the installation, your web host must upgrade ' . $msg['product'] . ' to this version. Please note that this is not a software problem and it is something only your web host can change.';
								break;
							case IEM_Installer::DB_UNSUPPORTED:
								$errors[] = 'This database type is not supported.';
								break;
							case IEM_Installer::DB_ALREADY_INSTALLED:
								$errors[] = 'E-Mail Marketer seems to be already installed in this database. To continue with this installation, you will need to delete the data from this database or select a different database. You may need to contact your administrator or web hosting provider to do this.';
								break;
							case IEM_Installer::DB_OLD_INSTALL:
								$errors[] = 'An older version of E-Mail Marketer is already installed in this database. If you are attempting to upgrade your existing version of E-Mail Marketer, you will need to ensure that your existing includes/config.inc.php file exists on the server. E-Mail Marketer will detect if this config file exists and will automatically start up the upgrade wizard.<br><br>If you would like to install a fresh copy of E-Mail Marketer, then either delete the data from this database (contact your administrator or web host if you need help) or select a new database.';
								break;
							case IEM_Installer::DB_INSUFFICIENT_PRIV:
								$errors[] = 'The database user does not have sufficient privileges to install the database. Please ensure the database user has permission to CREATE, CREATE INDEX, INSERT, SELECT, UPDATE, DELETE, ALTER and DROP.';
								break;
							case IEM_Installer::DB_QUERY_ERROR:
								foreach ($msg as $errmsg) {
									$db_errors[] = 'Unable to run the following query: ' . $errmsg;
								}
								break;
							default:
								$errors[] = 'There was an error setting up the database. Please contact your host about this problem. The error was: ' . $msg;
								break;
						}
					}
				}

				// Save the default settings into the database
				if (empty($errors) && empty($db_errors)) {
					list($error, $msg) = $this->_api->SaveDefaultSettings();
					
					if ($error) {
						$errors[] = 'There was a problem loading the default settings. The error was: ' . $msg;
					}
				}

				// Register the Event Listeners
				try {
					IEM_Installer::RegisterEventListeners();
				} catch (Exception $e) {
					$errors[] = 'There was a problem registering the Event Listeners.';
				}

				// Return to form with error messages if there were errors
				if (count(array_merge($permission_errors, $server_errors, $errors, $db_errors))) {
					$this->ShowForm($permission_errors, $server_errors, $errors, $db_errors);
					break;
				}

				// If we get to this point then the installation has been successful.

				// Create the default custom fields
				$this->_api->CreateCustomFields();

				// Install the default add-ons
				$this->_api->RegisterAddons();
				$this->PrintHeader();
				?>
					<div id="box" style="width: 600px; top: 20px; margin:auto;">
						<br /><br /><br /><br />
						<table style="margin:auto;"><tr><td style="border:solid 2px #DDD; padding:20px; background-color:#FFF; width:450px">
						<table>
						  <tr>
							<td class="Heading1">
								<img src="images/logo.jpg" />
							</td>
						  </tr>
						  <tr>
							<td style="padding:10px 0px 5px 0px">
								E-Mail Marketer has been installed successfully. Your control panel username is 
								<b style='font-size:14px; color:#FF5C1B'><?php echo $_POST['admin_username']; ?></b> and your password is <b
								style='font-size:14px; color:#FF5C1B'><?php echo $_POST['admin_password']; ?></b>.
								<br /><br />

								<input type="button" value="Login Now" onClick="document.location.href='./index.php'" style="font-size:11px" />
							</td>
						  </tr>
						</table>
						</td></tr></table>
						<div style="padding:10px; margin-bottom:20px; text-align:center" class="InstallPageFooter">
							Powered by E-Mail Marketer &copy; 2004-<?php echo date('Y'); ?>
						</div>
					</div>
				<?php
				$this->PrintFooter();
			break;

			default:
				$this->ShowForm($permission_errors, $server_errors);
		}
	}

	/**
	 * ShowForm
	 * Show install form
	 *
	 * @param Array $permission_errors File/dir permission error messages
	 * @param Array $server_errors Errors related to server configuration
	 * @param Array $install_errors Install error messages
	 * @param Array $db_errors DB error messages
	 *
	 * @return Void Returns nothing
	 */
	private function ShowForm($permission_errors=array(), $server_errors=array(), $install_errors=array(), $db_errors=array())
	{

		$error_message = '';

		if (!empty($server_errors) || !empty($permission_errors)) {
			$error_message = '<h3>Installing E-Mail Marketer</h3>';
			if (!empty($server_errors)) {
				$error_message .= 'The following configuration problems were found with the server and must be resolved before installation can continue:<br />';
				$error_message .= '<ul><li>' . implode('</li><li>', $server_errors) . '</li></ul>';
			} elseif (!empty($permission_errors)) {
				$error_message .= 'Before you can install E-Mail Marketer you need to set the appropriate permissions on the files/folders listed below:<br/>';
				$error_message .= '<ul><li>' . implode('</li><li>', $permission_errors) . '</li></ul>';
			}
			$error_message .= '<input type=\'button\' value=\'Try Again\' style=\'margin-bottom:20px; font-size:11px\' onclick="window.location.href=\'./index.php\'" />';
		}

		$base_url = preg_replace('%/admin/index.php%', '', $_SERVER['PHP_SELF']);

		$http = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
		$applicationurl = $http . '://' . $_SERVER['HTTP_HOST'] . $base_url;

		$this->PrintHeader();
		?>
		<form method="post" action="index.php?Page=Installer&amp;Step=1" onSubmit="return CheckForm(this);">
			<div id="box" style="width: 600px; top: 20px; margin:auto;">
				<br />
				<table style="margin:auto;">
					<tr>
						<td style="border:solid 2px #DDD; padding:20px; background-color:#FFF; width:450px">
							<table>
								<tr>
									<td class="Heading1">
										<img src="images/logo.jpg" />
									</td>
								</tr>
								<?php if (!empty($install_errors)) { ?>
									<?php $install_error_message = implode('<br/><br/>', $install_errors); ?>
									<tr>
										<td class="HelpInfo">
											<h3 style='padding-bottom:10px; color: red;'>Oops, something went wrong...</h3>
											<?php echo $install_error_message; ?>
										</td>
									</tr>
								<?php } elseif (!empty($db_errors)) { ?>
									<?php $db_error_message = implode('<br/><br/>', $db_errors); ?>
									<tr>
										<td class="HelpInfo">
											<h3 style='padding-bottom:10px; color: red;'>Oops, something went wrong...</h3>
											While trying to install the database the following errors occurred:<br/>
											<?php echo $db_error_message; ?>
										</td>
									</tr>
								<?php } else { ?>
									<tr>
										<td class="HelpInfo" colspan="2">
											<h3 style='padding-bottom:10px'>Install E-Mail Marketer</h3>
											Complete the form below to install E-Mail Marketer. Required fields are marked with an asterisk. Move your mouse over the help icons for help.<br/><br/>
										</td>
									</tr>
								<?php } ?>
											<tr>
												<td nowrap="nowrap" colspan="2"><br/><h3>Email Marketer Details</h3></td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Application URL:</td>
												<td>
													<input	type="text"
															name="applicationurl"
															id="applicationurl"
															class="Field250"
															style="width: 200px;"
															value="<?php echo htmlentities($applicationurl, ENT_QUOTES, 'UTF-8'); ?>" />
													<img	onmouseout="HideHelp('applicationurl_help');"
															onmouseover="ShowHelp('applicationurl_help', 'Email Marketer Web Site', 'The full path to your email marketer as you would type it into a web browser. This does not include the admin/ folder.')"
															src="images/help.gif"
															width="24"
															height="16"
															border="0" />
													<div style="display:none" id="applicationurl_help"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2"><br/><h3>Admin Account Details</h3></td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Email Address:</td>
												<td>
													<input	type="text"
															name="contactemail"
															id="contactemail"
															class="Field250"
															style="width: 200px;"
															value="<?php echo (isset($_POST['contactemail'])) ? htmlentities($_POST['contactemail'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img	onmouseout="HideHelp('contactemail_help');"
															onmouseover="ShowHelp('contactemail_help', 'Application Email Address', 'Type your email address here. Your email address is used when you need to retrieve or change the password for your user account.')"
															src="images/help.gif"
															width="24"
															height="16"
															border="0" />
													<div style="display:none" id="contactemail_help"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Administrator Username:</td>
												<td>
												    <input  type="text"
												            name="admin_username"
												            id="admin_username"
												            class="Field250"
												            style="width: 200px;"
												            value="<?php echo (isset($_POST['admin_username'])) ? htmlentities($_POST['admin_username'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
												    <img    onmouseout="HideHelp('admin_username_help');"
												            onmouseover="ShowHelp('admin_username_help', 'Administrator Username', 'Type the username you would like to user for the global administrator account.')"
												            src="images/help.gif"
												            width="24"
												            height="16"
												            border="0" />
												    <div style="display:none" id="admin_username_help"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Choose a Password:</td>
												<td>
													<input	type="password"
															name="admin_password"
															id="admin_password"
															class="Field250"
															style="width: 200px;"
															value=""
															autocomplete="off" />
													<img	onmouseout="HideHelp('admin_password_help');"
															onmouseover="ShowHelp('admin_password_help', 'Please enter a password', 'Please choose a password for the global administrator account.')"
															src="images/help.gif"
															width="24"
															height="16"
															border="0" />
													<div style="display:none" id="admin_password_help"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Confirm Your Password:</td>
												<td>
													<input	type="password"
															name="admin_password_confirm"
															id="admin_password_confirm"
															class="Field250"
															style="width: 200px;"
															value=""
															autocomplete="off" />
													<img	onmouseout="HideHelp('admin_password_confirm_help');"
															onmouseover="ShowHelp('admin_password_confirm_help', 'Confirm your password', 'Please confirm the administrator password.')"
															src="images/help.gif"
															width="24"
															height="16"
															border="0" />
													<div style="display:none" id="admin_password_confirm_help"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2"><br/><h3>Database Details</h3></td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2">
													<input	type="radio"
															name="dbtype"
															id="dbtype_mysql"
															value="mysql"
															onclick="javascript:showDB('mysql');"
															<?php echo (isset($_POST['dbtype']) && $_POST['dbtype'] == 'mysql') ? ' CHECKED' : ''; ?> />
													<label for="dbtype_mysql">I want to use a MySQL Database</label>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2">
													<input	type="radio"
															name="dbtype"
															id="dbtype_pgsql"
															value="pgsql"
															onclick="javascript:showDB('pgsql');"
															<?php echo (isset($_POST['dbtype']) && $_POST['dbtype'] == 'pgsql') ? ' CHECKED' : ''; ?> />
													<label for="dbtype_pgsql">I want to use a PostgreSQL Database</label>
												</td>
											</tr>
										</table>

										<table class="mysql_DBDetails">
											<tr>
												<td nowrap="nowrap" colspan="2"><br/><h3>MySQL Database Details</h3></td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2">
													<input	type="radio"
															name="mysql_db_choice"
															id="mysql_db_choice1"
															value="mysql_db_choice1"
															onclick="javascript:showDbDetails('mysql', 1);"
															<?php echo (isset($_POST['mysql_db_choice']) && $_POST['mysql_db_choice'] == 'mysql_db_choice1') ? ' CHECKED' : ''; ?> />
													<label for="mysql_db_choice1">I have already created a MySQL database</label>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2" >
													<input	type="radio"
															name="mysql_db_choice"
															id="mysql_db_choice2"
															value="mysql_db_choice2"
															onclick="javascript:showDbDetails('mysql', 2);"
															<?php echo (isset($_POST['mysql_db_choice']) && $_POST['mysql_db_choice'] == 'mysql_db_choice2') ? ' CHECKED' : ''; ?> />
													<label for="mysql_db_choice2">I have not created a MySQL database</label>
												</td>
											</tr>
										</table>

										<table class="mysql_DBDetails_created">
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Database User:</td>
												<td>
													<input type="text" name="mysql_dbusername" id="mysql_dbusername" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['mysql_dbusername'])) ? htmlentities($_POST['mysql_dbusername'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('mysql_dbusernamehelp');" onMouseOver="ShowHelp('mysql_dbusernamehelp', 'Database User', 'The username of the MySQL account that has access to your database, such as \'root\'.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="mysql_dbusernamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap">&nbsp;&nbsp; Database Password:</td>
												<td>
													<input type="password" name="mysql_dbpassword" id="mysql_dbpassword" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['mysql_dbpassword'])) ? htmlentities($_POST['mysql_dbpassword'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('mysql_dbpasshelp');" onMouseOver="ShowHelp('mysql_dbpasshelp', 'Database Password', 'The password of the MySQL account that has access to your database. This field is optional as not all MySQL accounts have passwords.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="mysql_dbpasshelp"></div>
												</td>
											</tr>
											<tr>

												<td nowrap="nowrap"><span class="required">*</span> Database Hostname:</td>
												<td>
													<input type="text" name="mysql_dbhostname" id="mysql_dbhostname" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['mysql_dbhostname'])) ? htmlentities($_POST['mysql_dbhostname'], ENT_QUOTES, 'UTF-8') : 'localhost'; ?>" />
													<img onMouseOut="HideHelp('mysql_dbhostnamehelp');" onMouseOver="ShowHelp('mysql_dbhostnamehelp', 'Database Hostname', 'The server where your MySQL database is located. Most of the time this is simply \'localhost\', however your web host might have a separate database server. If this is the case then type your database hostname here, such as \'db1.myhost.com\'.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="mysql_dbhostnamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Database Name:</td>
												<td>
													<input type="text" name="mysql_dbname" id="mysql_dbname" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['mysql_dbname'])) ? htmlentities($_POST['mysql_dbname'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('mysql_dbnamehelp');" onMouseOver="ShowHelp('mysql_dbnamehelp', 'Database Name', 'The name of your MySQL database, which you should have already created from either your web hosting control panel or the database tool PHPMyAdmin.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="mysql_dbnamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap">&nbsp;&nbsp; Database Table Prefix:</td>
												<td>
													<input type="text" name="mysql_tableprefix" id="mysql_tableprefix" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['mysql_tableprefix'])) ? htmlentities($_POST['mysql_tableprefix'], ENT_QUOTES, 'UTF-8') : 'email_'; ?>" />
													<img onMouseOut="HideHelp('mysql_dbprefixhelp');" onMouseOver="ShowHelp('mysql_dbprefixhelp', 'Database Table Prefix', 'An optional word or phrase that will be prefixed to each table in your MySQL database before they are created.<br /><br />If you have multiple applications installed and are using the same database then you can specify a table prefix to make it easier for you to tell which tables are used by which applications.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="mysql_dbprefixhelp"></div>
												</td>
											</tr>
										</table>

										<table class="mysql_DBDetails_help">
											<tr>
												<td colspan="2" class="HelpInfo">
													<h3 style="padding-bottom:10px">What is a MySQL Database?</h3>
													A MySQL database is where E-Mail Marketer saves your list of products, orders, customers, etc. You need to create a MySQL database before the installer can continue:
													<ul>
														<li><a href="#" onClick="DBHelp('cpanel'); return false;">Help on how to create a database in CPanel</a></li>
														<li><a href="#" onClick="DBHelp('plesk'); return false;">Help on how to create a database in Plesk</a></li>
														<li><a href="#" onClick="DBHelp('other'); return false;">My hosting company runs a different control panel</a></li>
													</ul>
												</td>
											</tr>
										</table>

										<table class="pgsql_DBDetails">
											<tr>
												<td nowrap="nowrap" colspan="2"><br/><h3>PostgreSQL Database Details</h3></td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2">
													<input type="radio" name="pgsql_db_choice" id="pgsql_db_choice1" value="pgsql_db_choice1" onClick="javascript:showDbDetails('pgsql', 1);"<?php echo (isset($_POST['pgsql_db_choice']) && $_POST['pgsql_db_choice'] == 'pgsql_db_choice1') ? ' CHECKED' : ''; ?> />
													<label for="pgsql_db_choice1">I have already created a PostgreSQL database</label>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap" colspan="2">
													<input type="radio" name="pgsql_db_choice" id="pgsql_db_choice2" value="pgsql_db_choice2" onClick="javascript:showDbDetails('pgsql', 2);" />
													<label for="pgsql_db_choice2"<?php echo (isset($_POST['pgsql_db_choice']) && $_POST['pgsql_db_choice'] == 'pgsql_db_choice2') ? ' CHECKED' : ''; ?>>I have not created a PostgreSQL database</label>
												</td>
											</tr>
										</table>
										<table class="pgsql_DBDetails_created">
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Database User:</td>
												<td>
													<input type="text" name="pgsql_dbusername" id="pgsql_dbusername" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['pgsql_dbusername'])) ? htmlentities($_POST['pgsql_dbusername'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('pgsql_dbusernamehelp');" onMouseOver="ShowHelp('pgsql_dbusernamehelp', 'Database User', 'The username of the PostgreSQL account that has access to your database, such as \'email\'.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="pgsql_dbusernamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap">&nbsp;&nbsp; Database Password:</td>
												<td>
													<input type="password" name="pgsql_dbpassword" id="pgsql_dbpassword" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['pgsql_dbpassword'])) ? htmlentities($_POST['pgsql_dbpassword'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('pgsql_dbpasshelp');" onMouseOver="ShowHelp('pgsql_dbpasshelp', 'Database Password', 'The password of the PostgreSQL account that has access to your database. This field is optional as not all PostgreSQL accounts have passwords.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="pgsql_dbpasshelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Database Hostname:</td>
												<td>
													<input type="text" name="pgsql_dbhostname" id="pgsql_dbhostname" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['pgsql_dbhostname'])) ? htmlentities($_POST['pgsql_dbhostname'], ENT_QUOTES, 'UTF-8') : 'localhost'; ?>" />
													<img onMouseOut="HideHelp('pgsql_dbhostnamehelp');" onMouseOver="ShowHelp('pgsql_dbhostnamehelp', 'Database Hostname', 'The server where your PostgreSQL database is located. Most of the time this is simply \'localhost\', however your web host might have a separate database server. If this is the case then type your database hostname here, such as \'db1.myhost.com\'.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="pgsql_dbhostnamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap"><span class="required">*</span> Database Name:</td>
												<td>
													<input type="text" name="pgsql_dbname" id="pgsql_dbname" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['pgsql_dbname'])) ? htmlentities($_POST['pgsql_dbname'], ENT_QUOTES, 'UTF-8') : ''; ?>" />
													<img onMouseOut="HideHelp('pgsql_dbnamehelp');" onMouseOver="ShowHelp('pgsql_dbnamehelp', 'Database Name', 'The name of your PostgreSQL database, which you should have already created from either your web hosting control panel or the database tool PHPPGAdmin.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="pgsql_dbnamehelp"></div>
												</td>
											</tr>
											<tr>
												<td nowrap="nowrap">&nbsp;&nbsp; Database Table Prefix:</td>
												<td>
													<input type="text" name="pgsql_tableprefix" id="pgsql_tableprefix" class="Field250" style="width: 200px;" value="<?php echo (isset($_POST['pgsql_tableprefix'])) ? htmlentities($_POST['pgsql_tableprefix'], ENT_QUOTES, 'UTF-8') : 'email_'; ?>" />
													<img onMouseOut="HideHelp('pgsql_dbprefixhelp');" onMouseOver="ShowHelp('pgsql_dbprefixhelp', 'Database Table Prefix', 'An optional word or phrase that will be prefixed to each table in your PostgreSQL database before they are created.<br /><br />If you have multiple applications installed and are using the same database then you can specify a table prefix to make it easier for you to tell which tables are used by which applications.')" src="images/help.gif" width="24" height="16" border="0" />
													<div style="display:none" id="pgsql_dbprefixhelp"></div>
												</td>
											</tr>
										</table>

										<table class="pgsql_DBDetails_help">
											<tr>
												<td colspan="2" class="HelpInfo">
													<h3 style="padding-bottom:10px">What is a PostgreSQL Database?</h3>
													A PostgreSQL database is where E-Mail Marketer saves your list of products, orders, customers, etc. You need to create a PostgreSQL database before the installer can continue:
													<ul>
														<li><a href="#" onClick="DBHelp('cpanel'); return false;">Help on how to create a database in CPanel</a></li>
														<li><a href="#" onClick="DBHelp('plesk'); return false;">Help on how to create a database in Plesk</a></li>
														<li><a href="#" onClick="DBHelp('other'); return false;">My hosting company runs a different control panel</a></li>
													</ul>
												</td>
											</tr>
										</table>

										<table>
											
											<tr>
											<td>&nbsp;</td>
												<td>
													<br />
													<input type="submit" name="SubmitButton" value="Continue" class="FormButton" />
												</td>
											</tr>
											<tr>
												<td class="Gap"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				<div style="padding:10px; margin-bottom:20px; text-align:center" class="InstallPageFooter">
					Powered by E-Mail Marketer [Nulled by LeetWolf - Bad Syntax]
				</div>
			</div>
		</form>

		<div id="permissionsBox" style="display:none;">
			<div style="background-image:url('images/permissions_error.gif'); background-position:right bottom; background-repeat:no-repeat; height:100%; margin-right:20px;">
				<?php echo $error_message; ?>
			</div>
		</div>

		<?php if (!empty($permission_errors) || !empty($server_errors)) { ?>
			<script>
				$(document).ready(function() {
					tb_show('', '#TB_inline?height=300&width=450&inlineId=permissionsBox&modal=true', '');
				});
			</script>
		<?php } ?>

		<script>
			$(function() {
				$('form input').focus(function() { this.select(); });
			});

			function CheckForm(form)
			{
				if (form.applicationurl.value == '') {
					alert("Please enter the applications url.");
					form.applicationurl.focus();
					return false;
				}

				if ($('#contactemail').val().indexOf('@') == -1 || $('#contactemail').val().indexOf('.') == -1 || $('#contactemail').val().length <= 3) {
					alert('Please enter a valid email address.');
					$('#contactemail').focus();
					$('#contactemail').select();
					return false;
				}

				// validate the admin username
				// it is required
				if (form.admin_username.value == '') {
				    alert('Please enter an administrator username.');
                    
				    form.admin_username.select();
				    form.admin_username.focus();
                    
				    return false;
				}

				// validate the administrator password
				// it must be greater than 3 characters and is required
				if (form.admin_password.value == '' || form.admin_password.value.length < 3) {
					alert("Please enter an administrator password at least 3 characters long.");
					form.admin_password.select();
					form.admin_password.focus();
					return false;
				}

				// the confirmation password is required
				if (form.admin_password_confirm.value == '') {
					alert("Please confirm the administrator password.");
					form.admin_password_confirm.focus();
					return false;
				}

				// the confirmation password must match the first administrator password
				if (form.admin_password.value != form.admin_password_confirm.value) {
					alert("The passwords do not match. Please try again.");
					form.admin_password_confirm.select();
					form.admin_password_confirm.focus();
					return false;
				}

				dbval = $("input[@name='dbtype']:checked").val();
				if (!dbval) {
					alert("Please choose the type of database you wish to use.");
					return false;
				}

				if (dbval == 'mysql') {
					$('#mysql_db_choice1').click();
					if (form.mysql_dbusername.value == '') {
						alert("Please enter your mysql username");
						form.mysql_dbusername.focus();
						return false;
					}

					if (form.mysql_dbhostname.value == '') {
						alert("Please enter your mysql hostname");
						form.mysql_dbhostname.focus();
						return false;
					}

					if (form.mysql_dbname.value == '') {
						alert("Please enter your mysql database name");
						form.mysql_dbname.focus();
						return false;
					}
				}

				if (dbval == 'pgsql') {
					$('#pgsql_db_choice1').click();
					if (form.pgsql_dbusername.value == '') {
						alert("Please enter your postgresql username");
						form.pgsql_dbusername.focus();
						return false;
					}

					if (form.pgsql_dbhostname.value == '') {
						alert("Please enter your postgresql hostname");
						form.pgsql_dbhostname.focus();
						return false;
					}

					if (form.pgsql_dbname.value == '') {
						alert("Please enter your postgresql database name");
						form.pgsql_dbname.focus();
						return false;
					}
				}

				return true;
			}

			function showDB(dbtype)
			{
				var display_classes = new Array (
						'DBDetails',
						'DBDetails_created',
						'DBDetails_help'
					);

				for (var j = 0; j < display_classes.length; j++) {
					classname = '.mysql_' + display_classes[j];
					$(classname).hide();
					classname = '.pgsql_' + display_classes[j];
					$(classname).hide();
				}

				if (dbtype == 'mysql') {
					$('.mysql_DBDetails').show();
				} else {
					$('.pgsql_DBDetails').show();
				}
			}

			function showDbDetails(dbtype, choice)
			{
				showDB(dbtype);
				if (dbtype == 'mysql') {
					if (choice == 1) {
						$('.mysql_DBDetails_created').show();
					}
					if (choice == 2) {
						$('.mysql_DBDetails_help').show();
					}
				}
				if (dbtype == 'pgsql') {
					if (choice == 1) {
						$('.pgsql_DBDetails_created').show();
					}
					if (choice == 2) {
						$('.pgsql_DBDetails_help').show();
					}
				}
			}

			$(document).ready(function() {
				dbval = $("input[@name='dbtype']:checked").val();
				if (dbval == 'mysql') {
					chosen_value = $("input[@name='mysql_db_choice']:checked").val();
					choice = 0;
					if (chosen_value == 'mysql_db_choice1') {
						choice = 1;
					}
					if (chosen_value == 'mysql_db_choice2') {
						choice = 2;
					}
					showDbDetails('mysql', choice);
					return;
				}
				if (dbval == 'pgsql') {
					chosen_value = $("input[@name='pgsql_db_choice']:checked").val();
					choice = 0;
					if (chosen_value == 'pgsql_db_choice1') {
						choice = 1;
					}
					if (chosen_value == 'pgsql_db_choice2') {
						choice = 2;
					}
					showDbDetails('pgsql', choice);
					return;
				}
			});

		</script>
		<?php
		$this->PrintFooter();
	}

	/**
	 * PrintHeader
	 * Print HTML header
	 * @return Void Returns nothing
	 */
	public function PrintHeader()
	{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html>
		<head>
			<title>E-Mail Marketer</title>
			<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
			<link rel="stylesheet" href="includes/styles/stylesheet.css" type="text/css" />
			<link rel="stylesheet" href="includes/styles/tabmenu.css" type="text/css" />
			<link rel="stylesheet" href="includes/styles/thickbox.css" type="text/css" />

			<!--[if IE]>
			<style type="text/css">
				@import url("includes/styles/ie.css");
			</style>
			<![endif]-->

			<script src="includes/js/jquery.js"></script>
			<script src="includes/js/jquery/thickbox.js"></script>
			<script src="includes/js/javascript.js"></script>
			<style>
				.InstallPageFooter {
					color:#676767;
					font-family:Tahoma,Arial;
					font-size:11px;
				}

				h3
				{
					margin: 1px;
					padding: 2px;
					font-size:13px;
				}

				.mysql_DBDetails,
				.mysql_DBDetails_created,
				.mysql_DBDetails_help,
				.pgsql_DBDetails,
				.pgsql_DBDetails_created,
				.pgsql_DBDetails_help
				{
					padding:10px 10px 10px 20px;
					display: none;
				}

				.HelpInfo {
					background:lightyellow url(images/warning.gif) no-repeat scroll 10px 7px;
					border:1px solid #EAEAEA;
					margin:5px;
					padding:10px 10px 10px 36px;
				}

			</style>

		</head>

		<body>

		<?php
	}

	/**
	 * PrintFooter
	 * Print HTML footer
	 * @return Void Returns nothing
	 */
	public function PrintFooter()
	{
		?>
		</body>
		</html>
		<?php
	}

}
