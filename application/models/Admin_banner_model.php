<?php 
class Admin_banner_model extends CI_Model 
{
	function get_banner()
   {
   		$query = $this->db->get('banner');
   		return $query->result();
   }

   function get_bannerid($id)
   {
   	$this->db->where('banner_id',$id);
   	$query = $this->db->get('banner');
   	return $query->row();
   }

   function update_banner($id,$data1)
   {
   	$this->db->where('banner_id',$id);
   	$query = $this->db->update('banner',$data1);
   	return $query;
   }

   function insert_banner($data1)
      {
         $query = $this->db->insert('banner',$data1);
         return $query;
      }


}
