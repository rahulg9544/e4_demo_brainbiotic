<?php 
class Admin_termuse_model extends CI_Model 
{
	function display_about()
	{
		$query=$this->db->get('termuse');
		return $query->result();
	}

	function updatetermsinf($data1,$termsid)
	{
		$this->db->where('termuse_id',$termsid);
		$query = $this->db->update('termuse',$data1);
		return $query;
	}

	function getconinf_edit($termsid)
	{
		$this->db->where('termuse_id',$termsid);
		$query = $this->db->get('termuse');
		return $query->row();
	}
}