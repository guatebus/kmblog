<?php
class Datatables_Data_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_posts_data_json()
	{
		/* Array of database columns */
		$aColumns = array( 'id', 'title', 'slug', 'censored' );
		
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = "id";
		
		/* DB table to use */
		$sTable = 'posts';
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
				intval( $_GET['iDisplayLength'] );
		}
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
						($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".$this->db->escape_str( $_GET['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".$this->db->escape_str($_GET['sSearch_'.$i])."%' ";
			}
		}
		
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
			";
		$rResult = $this->db->query($sQuery);
		$result = $rResult->result_array();
		
		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS() AS filteredtotal
		";
		$rResultFilterTotal = $this->db->query($sQuery);
		$aResultFilterTotal = $rResultFilterTotal->result_array();
		$iFilteredTotal = $aResultFilterTotal[0]['filteredtotal'];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`) AS total
			FROM   $sTable
		";
		$rResultTotal = $this->db->query($sQuery);
		$aResultTotal = $rResultTotal->result_array();
		$iTotal = $aResultTotal[0]['total'];
		
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		
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