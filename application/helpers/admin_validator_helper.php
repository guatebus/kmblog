<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Library to handle admin user validation.
 */

class Admin_Validator_Helper {

	public static function isAdmin()
	{
		$CI =& get_instance();
		$CI->load->library('session');
		return $CI->session->userdata($CI->config->item('username')) === $CI->config->item('administratorUserName');
	}

}

?>