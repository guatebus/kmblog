<?php
class Datatables_Data_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_posts_data_json()
	{
		$query = $this->db->get('posts');
		$result = $query->result_array();
		
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $this->db->count_all('posts'),
			"iTotalDisplayRecords" => count($result),
			"aaData" => array()
		);
		
		$aColumns = array( 'id', 'title', 'slug', 'censored' );
		
		for ( $i=0 ; $i<count($result) ; $i++ )
		{
			$row = array();
			for ( $j=0 ; $j<count($aColumns) ; $j++ )
			{
				$row[] = $result[$i][$aColumns[$j]];
			}
			$output['aaData'][] = $row;
		}
		
		return json_encode($output);
	}
}

?>