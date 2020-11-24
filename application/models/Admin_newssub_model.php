<?php 
class Admin_newssub_model extends CI_Model 
{
	function display_offertext()
	{
		$query=$this->db->get('newssub');
		return $query->result();
	}

}