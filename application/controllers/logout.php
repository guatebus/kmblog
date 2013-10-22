<?php
class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$userInfo = array(
			$this->config->item('username')	=> $this->session->userdata($this->config->item('username')),
			$this->config->item('loginTime') => $this->session->userdata($this->config->item('loginTime')));
		$this->session->unset_userdata($userInfo);
		redirect(site_url('posts'));
	}
}

?>