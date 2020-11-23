<?php 
class Admin_brand_model extends CI_Model 
{

 function insert($data1)
 {
 	$query = $this->db->insert('brand',$data1);

 	return $query;
 }

 function display()
 {
 		$query1 = $this->db->get('brand');
		return $query1->result();
 }

 function edit($id)
 {
 	$this->db->where('brand_id',$id);
 	$query = $this->db->get('brand');
 	return $query->row();
 }

 function update($id,$data1)
 {
 	$this->db->where('brand_id',$id);
 	$query = $this->db->update('brand',$data1);
 	return $query;
 }


 function delete($id)
 {
 	$this->db->where('brand_id',$id);
 	$query = $this->db->delete('brand');

 	return $query;
 }

 function categories()
   {
       $query= $this->db->get('category');
       return $query->result();
   }
 
}