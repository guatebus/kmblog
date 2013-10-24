<?php
class Loaddatatablesdata extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datatables_Data_Model');
	}

	public function index()
	{
		$data['data'] = $this->Datatables_Data_Model->get_posts_data_json();
		
		$this->load->view('datatables/data', $data);
	}
}

?>