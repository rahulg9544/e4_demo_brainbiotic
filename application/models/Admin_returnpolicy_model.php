<?php 
class Admin_returnpolicy_model extends CI_Model 
{
	function display_about()
	{
		$query=$this->db->get('returnpolicy');
		return $query->result();
	}

	function updatetermsinf($data1,$termsid)
	{
		$this->db->where('returnpolicy_id',$termsid);
		$query = $this->db->update('returnpolicy',$data1);
		return $query;
	}

	function getconinf_edit($termsid)
	{
		$this->db->where('returnpolicy_id',$termsid);
		$query = $this->db->get('returnpolicy');
		return $query->row();
	}
}