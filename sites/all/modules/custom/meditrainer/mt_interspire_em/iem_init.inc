<?php
// Make sure that the IEM controller does NOT redirect request.
if (!defined('IEM_NO_CONTROLLER')) {
    define('IEM_NO_CONTROLLER', true);
}

//load iem settings
module_load_include('inc', 'mt_interspire_em', 'iem_settings');
$IEM_SETTINGS = iem_settings_load();
if (count($IEM_SETTINGS) == 0){
    unset($IEM_SETTINGS);
    $IEM_SETTINGS = iem_settings_load_from_csv();
}

// Require base sendstudio functionality. This connects to the database, sets up our base paths and so on.
// This example file was located in the IEM main directory (the same directory where the admin, includes, and users directories are located)
require_once( realpath(".") . "/" . $IEM_SETTINGS['IEM_FOLDER_NAME'] . '/admin/index.php' );


// This file lets us get api's, load language files and parse templates.
require_once( SENDSTUDIO_FUNCTION_DIRECTORY. '/sendstudio_functions.php' );

?>
