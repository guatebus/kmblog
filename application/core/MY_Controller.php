<?php

	class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		if (!array_key_exists($this->config->item('my_sess_device'), $this->session->all_userdata()))
		{
			$this->load->library('Kitmaker_Wurfl');
			$device = $this->kitmaker_wurfl->requestingDevice;
			
			$this->load->helper('wurfl_device');
			
			$deviceInfo = array(
				$this->config->item('my_sess_device') => WURFL_Device_Helper::identify_device($device),
				$this->config->item('my_sess_is_handheld') => WURFL_Device_Helper::is_handheld($device));
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