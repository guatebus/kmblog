<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Kitmaker_Wurfl {

	public $ua;
	public $wurflInfo;
	public $requestingDevice;

	public function __construct()
	{
		require(dirname(__FILE__).'/../../wurfl/examples/demo/inc/wurfl_config_standard.php');
		
		$this->ua = $_SERVER['HTTP_USER_AGENT'];
		$this->wurflInfo = $wurflManager->getWURFLInfo();
		$this->requestingDevice = $wurflManager->getDeviceForHttpRequest($_SERVER);
	}

}

?>