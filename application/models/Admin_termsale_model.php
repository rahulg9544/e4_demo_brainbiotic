<?php 
class Admin_termsale_model extends CI_Model 
{
	function display_about()
	{
		$query=$this->db->get('termsale');
		return $query->result();
	}

	function updatetermsinf($data1,$termsid)
	{
		$this->db->where('termsale_id',$termsid);
		$query = $this->db->update('termsale',$data1);
		return $query;
	}

	function getconinf_edit($termsid)
	{
		$this->db->where('termsale_id',$termsid);
		$query = $this->db->get('termsale');
		return $query->row();
	}
}