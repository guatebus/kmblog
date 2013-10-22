<?php
class Posts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Posts_Model');
		$this->load->helper('admin_validator');
	}

	public function index()
	{
		$data['posts'] = $this->Posts_Model->get_post();
		$data['title'] = 'Posts archive';
		
		parent::load_data($data);

		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug)
	{
		$data['post_item'] = $this->Posts_Model->get_post($slug);
		if (empty($data['post_item']))
		{
			show_404();
		}
		else
		{
			$data['title'] = $data['post_item']['title'];
			
			parent::load_data($data);

			$this->load->view('templates/header', $data);
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

		$data['title'] = 'Create a blog post';
		
		parent::load_data($data);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_error_delimiters( '<em>','</em>' );

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('posts/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->Posts_Model->set_post();
			$this->load->view('templates/header', $data);
			$this->load->view('posts/success');
			$this->load->view('templates/footer');
		}
	}
	
	public function censor($slug)
	{
		$data['post_item'] = $this->Posts_Model->get_post($slug);
		if (empty($data['post_item']))
		{
			show_404();
		}
		else
		{
			if(Admin_Validator_Helper::isAdmin())
			{
				$this->Posts_Model->censor_post($slug);
				redirect(site_url('posts'));
			}
		}
	}
	
}

?>