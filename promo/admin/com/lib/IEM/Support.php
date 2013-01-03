<?php

/**
 * @author     Trey Shugart
 * @package    IEM
 * @subpackage Support
 */

/**
 * Contains methods for feature detection so we can determine if a particular
 * feature, or even IEM as a whole will work on any given server configuration.
 */
class IEM_Support
{
	/**
	 * Returns whether or not the server has the GD Library installed.
	 * 
	 * @return boolean
	 */
	static public function hasGdLibrary()
	{
		return function_exists('gd_info');
	}
	
	/**
	 * Returns whether or not the server has support for PDO.
	 * 
	 * @return boolean
	 */
	static public function hasPdo()
	{
		return class_exists('PDO', false);
	}
}