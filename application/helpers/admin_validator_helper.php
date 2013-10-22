<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Library to handle admin user validation.
 */

class Admin_Validator_Helper {

	public static function isAdmin()
	{
		$CI =& get_instance();
		$CI->load->library('session');
		return $CI->session->userdata($CI->config->item('my_sess_user_name')) === $CI->config->item('site_administrator_user_name');
	}

}

?>