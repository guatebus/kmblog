<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Wrapper to handle default encryption and decryption.
 */

class EncryptorDecryptor {

	public static function encrypt($value)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');
		return $CI->encrypt->encode($value);
	}
	public static function decrypt($value)
	{
		$CI =& get_instance();
		$CI->load->library('encrypt');
		return $CI->decrypt->encode($value);
	}
	
	public static function hash($value)
	{
		return hash(get_instance()->config->item('hash'), $value);
	}

}

?>