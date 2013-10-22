<?php
class LoginModel extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('LoginError');
		$this->load->helper('encryptor_decryptor');
	}
	
	public function validateUserCredentials($username, $password)
	{
		$query = $this->db->get_where('user', array('name' => $username));
		if ($query->num_rows() === 1)
		{
			$row = $query->row();
			if ($row->pass === EncryptorDecryptor::hash($row->salt.$password))
			{
				return TRUE;
			}
		}
		$this->loginerror->createError();
		return $this->loginerror;
	}
}

?>