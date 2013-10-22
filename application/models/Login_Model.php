<?php
class Login_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('Login_Error');
		$this->load->helper('encryptor_decryptor');
	}
	
	public function validate_user_credentials($username, $password)
	{
		$query = $this->db->get_where('user', array('name' => $username));
		if ($query->num_rows() === 1)
		{
			$row = $query->row();
			if ($row->pass === Encryptor_Decryptor::hash($row->salt.$password))
			{
				return TRUE;
			}
		}
		$this->login_error->create_error();
		return $this->login_error;
	}
}

?>