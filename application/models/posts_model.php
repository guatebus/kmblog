<?php
class Posts_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_post($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get_where('posts', array('censored' => 0));
			return $query->result_array();
		}

		$query = $this->db->get_where('posts', array('slug' => $slug, 'censored' => 0));
		return $query->row_array();
	}
	
	public function set_post()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'content' => $this->input->post('content')
		);

		return $this->db->insert('posts', $data);
	}
}

?>