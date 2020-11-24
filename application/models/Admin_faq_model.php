<?php 
class Admin_faq_model extends CI_Model 
{
	function display_about()
	{
		$query=$this->db->get('faq');
		return $query->result();
	}

	function updatetermsinf($data1,$termsid)
	{
		$this->db->where('faq_id',$termsid);
		$query = $this->db->update('faq',$data1);
		return $query;
	}

	function getconinf_edit($termsid)
	{
		$this->db->where('faq_id',$termsid);
		$query = $this->db->get('faq');
		return $query->row();
	}
}