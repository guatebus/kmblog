<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once(dirname(__FILE__)."/Base_Kitmaker_Error.php");

/**
 * Object to hold Login Error details.
 */

class Login_Error extends Base_Kitmaker_Error {

	const INVALID_CREDENTIALS_TYPE = "INVALID_USER_CREDENTIALS";
	
	const INVALID_CREDENTIALS_CODE = 1;
	
	const INVALID_CREDENTIALS_MESSAGE = "Invalid username or password"; //Ambiguity in error detail for security reasons

	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_error()
	{
		$this->type = self::INVALID_CREDENTIALS_TYPE;
		$this->code = self::INVALID_CREDENTIALS_CODE;
		$this->message = self::INVALID_CREDENTIALS_MESSAGE;
	}

}

?>