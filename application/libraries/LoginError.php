<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once(dirname(__FILE__)."/BaseKitmakerError.php");

/**
 * Object to hold Login Error details.
 */

class LoginError extends BaseKitmakerError {

	const INVALID_CREDENTIALS_TYPE = "INVALID_USER_CREDENTIALS";
	
	const INVALID_CREDENTIALS_CODE = 1;
	
	const INVALID_CREDENTIALS_MESSAGE = "Invalid username or password";

	public function __construct()
	{
		parent::__construct();
	}
	
	public function createError()
	{
		$this->type = self::INVALID_CREDENTIALS_TYPE;
		$this->code = self::INVALID_CREDENTIALS_CODE;
		$this->message = self::INVALID_CREDENTIALS_MESSAGE;
	}

}

?>