<?php
class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
	}

	public function index()
	{
		// LOAD LIBRARIES
        $this->load->library('form_validation');

        // LOAD HELPERS
        $this->load->helper('form');
		
		$data['title'] = 'User Login';
		
		parent::load_data($data);
		
		$this->form_validation->set_rules( 'user_name', 'username', 'required|xss_clean' );
		$this->form_validation->set_rules( 'user_pass', 'password', 'required' );
		$this->form_validation->set_rules( 'notice', 'credentialsValidation', 'callback_validate_user_credentials' );
		$this->form_validation->set_error_delimiters( '<em>','</em>' );
		
		if ( $this->input->post('login') ) 
		{
			if ( $this->form_validation->run() ) 
			{
				$userInfo = array(
					$this->config->item('my_sess_user_name')	=> $this->input->post('user_name'),
					$this->config->item('my_sess_login_time')	=> date("F j, Y, G:i"));
				$this->session->set_userdata($userInfo);
				$this->session->set_flashdata('message', 'User logged in correctly');
				redirect(site_url('posts'));
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('user/login', $data);
		$this->load->view('templates/footer');
	}
	
	public function validate_user_credentials()
	{
		$user_name = $this->input->post('user_name');
		$user_pass = $this->input->post('user_pass');
		
		if(!empty($user_name) && !empty($user_pass))
		{
			$credentialsResult = $this->Login_Model->validate_user_credentials($user_name, $user_pass);
			
			if ($credentialsResult instanceof Login_Error)
			{
				$this->form_validation->set_message('validate_user_credentials', $credentialsResult->message);
				return FALSE;
			}
			else if ($credentialsResult === TRUE)
			{
				return TRUE;
			}
		}
		else
		{
			return null;
		}
	}
	
}

?>