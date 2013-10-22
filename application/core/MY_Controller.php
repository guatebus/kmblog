<?php

	class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
	
	function loadData(&$data)
	{
		$data['base_url'] = $this->config->item('base_url');
		$data['index_page'] = $this->config->item('index_page');
		$data['cssLocation'] = $this->config->item('cssLocation');
		$data['jsLocation'] = $this->config->item('jsLocation');
	}
	
}

?>