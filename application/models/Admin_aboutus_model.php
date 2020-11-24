<?php 
class Admin_aboutus_model extends CI_Model 
{
	function display_about()
	{
		$query=$this->db->get('about');
		return $query->result();
	}

	function updatetermsinf($data1,$termsid)
	{
		$this->db->where('about_id',$termsid);
		$query = $this->db->update('about',$data1);
		return $query;
	}

	function getconinf_edit($termsid)
	{
		$this->db->where('about_id',$termsid);
		$query = $this->db->get('about');
		return $query->row();
	}
}