<?php
/**
 * @file
 * provides common definitions and logic to both the install file and the module file.
 */

//constants used 
define('AMFSERVER_LIBRARY_DIRECTORY', 'sites/all/libraries');
define('AMFSERVER_MODULE_DIRECTORY_PREFERRED', drupal_get_path('module', 'amfserver'));
define('AMFSERVER_MODULE_DIRECTORY_OPTIONAL',  drupal_get_path('module', 'services').'/servers/amfserver');
define('AMFSERVER_PERM_ADMIN', 'administer amfserver');
define('AMFSERVER_PATH_ADMIN_HELP', 'admin/help#amfserver');
define('AMFSERVER_PATH_HELP', 'admin/help/amfserver');
define('AMFSERVER_PATH_ADMIN', 'admin/config/services/amfserver');
define('AMFSERVER_PATH_PERMISSIONS', 'admin/people/permissions');
define('AMFSERVER_PATH_ADMIN_SETTINGS', 'admin/config/services/amfserver/settings');
define('AMFSERVER_PATH_ADMIN_CLASSMAPPING', 'admin/config/services/amfserver/classmapping');
define('AMFSERVER_SERVICES_CONFIGURATION', 'admin/structure/services');
//ini set for easy acces to includes
ini_set('include_path', get_include_path() . PATH_SEPARATOR . DRUPAL_ROOT . PATH_SEPARATOR . AMFSERVER_LIBRARY_DIRECTORY);

/**
 * helper method that checks if the zend library is installed correctly
 */
function amfserver_has_zend() {
  //basic check to see if the library or part of it is in place.
  return file_exists(AMFSERVER_LIBRARY_DIRECTORY) && file_exists(AMFSERVER_LIBRARY_DIRECTORY . '/Zend/Amf/Server.php');
}

/**
 * get the version of the amfserver
 */
function amfserver_get_version() {
    //preferred installation path
    $file = AMFSERVER_MODULE_DIRECTORY_PREFERRED . '/amfserver.info';
    if (file_exists($file)) {
      $info = drupal_parse_info_file($file);
       return isset($info['version']) ? $info['version'] : 'not specified in info file';
    }
    //optional installation path
    $file = AMFSERVER_MODULE_DIRECTORY_OPTIONAL . PATH_SEPARATOR . 'amfserver.info';
    if (file_exists($file)) {
      $info = drupal_parse_info_file($file);
      return isset($info['version']) ? $info['version'] : 'not specified in info file';
    }
    //not found
    return 'unknown: no amfserver.info file found, is the amfserver installed in the correct place?';
}