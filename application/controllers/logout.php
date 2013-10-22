<?php
class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$userInfo = array(
			$this->config->item('my_sess_user_name')	=> $this->session->userdata($this->config->item('my_sess_user_name')),
			$this->config->item('my_sess_login_time') => $this->session->userdata($this->config->item('my_sess_login_time')));
		$this->session->unset_userdata($userInfo);
		redirect(site_url('posts'));
	}
}

?>