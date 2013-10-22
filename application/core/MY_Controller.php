<?php

	class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
	
	function load_data(&$data)
	{
		$data['cssLocation'] = $this->config->item('cssLocation');
		$data['jsLocation'] = $this->config->item('jsLocation');
	}
	
}

?>