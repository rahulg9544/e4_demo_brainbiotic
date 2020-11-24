<?php 
class Admin_contactus_model extends CI_Model 
{
	function updatecontinfo($data1,$contid)
	{
		$this->db->where('contact_id',$contid);
		$query=$this->db->update('contact',$data1);
		return $query;
	}

	function getconinf_edit($contid)
	{
		$this->db->where('contact_id',$contid);
		$query = $this->db->get('contact');
		return $query->row();
	}

	function display_continf()
	{
	  	$selqry="SELECT * FROM contact";
	  	$query=$this->db->query($selqry);
	  	return $query->result();
	}
}