<?php
class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		// LOAD LIBRARIES
        $this->load->library('form_validation');

        // LOAD HELPERS
        $this->load->helper('form');
		
		$data['title'] = 'User Login';
		
		parent::loadData($data);
		
		$this->form_validation->set_rules( 'user_name', 'username', 'required' );
		$this->form_validation->set_rules( 'user_pass', 'password', 'required' );
		$this->form_validation->set_error_delimiters( '<em>','</em>' );
		
		if ( $this->input->post('login') ) 
		{
			if ( $this->form_validation->run() ) 
			{
				$user_name = $this->input->post('user_name');
				$user_pass = $this->input->post('user_pass');
				
				$credentialsResult = $this->LoginModel->validateUserCredentials($user_name, $user_pass);
				
				if ($credentialsResult instanceof LoginError)
				{
					$this->session->set_flashdata('message', $credentialsResult->message);
					redirect(site_url('login'));
				}
				else if ($credentialsResult === TRUE)
				{
					//user logged in successfully
					$userInfo = array(
						$this->config->item('username')	=> $user_name,
						$this->config->item('loginTime') => date("F j, Y, G:i"));
					$this->session->set_userdata($userInfo);
					$this->session->set_flashdata('message', 'User logged in correctly');
					redirect(site_url('posts'));
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('user/login', $data);
		$this->load->view('templates/footer');
	}
}

?>