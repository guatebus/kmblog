<?php

	class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		//device detection - we do this only once (when user first enters the site) and store the info on cookie until expiration.
		if (!array_key_exists($this->config->item('my_sess_device'), $this->session->all_userdata()))
		{
			$this->load->library('Kitmaker_Wurfl');
			$device = $this->kitmaker_wurfl->requestingDevice;
			
			$this->load->helper('wurfl_device');
			$isHandheld = WURFL_Device_Helper::is_handheld($device);
			
			// if ($isHandheld)
			// {
				// $platform = WURFL_Device_Helper::get_device_platform($device);
			// }
			// else
			// {
				$this->load->helper('km_user_agent');
				$platform = KM_User_Agent_Helper::get_user_agent_platform();
			// }
			
			$deviceInfo = array(
				$this->config->item('my_sess_is_handheld') => $isHandheld,
				$this->config->item('my_sess_device') => WURFL_Device_Helper::identify_device($device),
				$this->config->item('my_sess_platform') => $platform);
			$this->session->set_userdata($deviceInfo);
		}
    }
	
	function load_data(&$data)
	{
		$data['cssLocation'] = $this->config->item('cssLocation');
		$data['jsLocation'] = $this->config->item('jsLocation');
	}
	
}

?>