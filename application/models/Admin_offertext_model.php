<?php 
class Admin_offertext_model extends CI_Model 
{
	function display_offertext()
	{
		$query=$this->db->get('offertext');
		return $query->result();
	}

	function updatoffertext($data1,$offertest_id)
	{
		$this->db->where('offertext_id',$offertest_id);
		$query = $this->db->update('offertext',$data1);
		return $query;
	}

	function getoffertext_edit($offertest_id)
	{
		$this->db->where('offertext_id',$offertest_id);
		$query = $this->db->get('offertext');
		return $query->row();
	}
}