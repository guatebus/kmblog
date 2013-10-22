<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Object wrapper to handle default encryption and decryption.
 */

class EncryptorDecryptor {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('encrypt');
	}
	
	public function encrypt($value)
	{
		return $this->CI->encrypt->encode($value);
	}
	public function decrypt($value)
	{
		return $this->CI->decrypt->encode($value);
	}
	
	public function hashPassword($value)
	{
		
	}

}

?>