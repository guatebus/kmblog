<?php
class Datatables extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Datatables_Model');
	}

	public function index()
	{
		// $data['postsData'] = $this->Datatables_Model->get_posts_data();
		$data['title'] = 'Datatables Usage';
		
		parent::load_data($data);
		
		$this->load->view('templates/header', $data);
		$this->load->view('datatables/table', $data);
		$this->load->view('templates/footer');
	}
}

?>