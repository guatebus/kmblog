<?php
class Wurflinfo extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Kitmaker_Wurfl');
	}

	public function index()
	{
		$data['requestingDevice'] = $this->kitmaker_wurfl->requestingDevice;
		$data['ua'] = $this->kitmaker_wurfl->ua;
		$data['wurflInfo'] = $this->kitmaker_wurfl->wurflInfo;
		
		parent::load_data($data);
		
		$this->load->view('templates/header', $data);
		$this->load->view('wurfl/info', $data);
		$this->load->view('templates/footer');
	}
}

?>