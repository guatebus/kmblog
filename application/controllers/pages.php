<?php

class Pages extends MY_Controller {

	public function view($page = 'home')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page);
		
		parent::loadData($data);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

}

?>