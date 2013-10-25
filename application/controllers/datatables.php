<?php
class Datatables extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Datatables Usage';
		
		parent::load_data($data);
		
		$this->load->view('templates/header', $data);
		$this->load->view('datatables/table', $data);
		$this->load->view('templates/footer');
	}
}

?>