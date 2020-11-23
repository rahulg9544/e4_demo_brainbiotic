<?php 
class Admin_subcategory_model extends CI_Model 
{

 function insert($data1)
 {
 	$query = $this->db->insert('subcategory',$data1);

 	return $query;
 }

 function display()
 {
 	$selqry = 'SELECT * FROM `subcategory` LEFT JOIN category ON subcategory.subcategory_category = category.category_id GROUP BY subcategory.subcategory_id';
		$query = $this->db->query($selqry);  
		return $query->result(); 
 }

 function edit($id)
 {
 	$this->db->where('subcategory_id',$id);
 	$query = $this->db->get('subcategory');
 	return $query->row();
 }

 function update($id,$data1)
 {
 	$this->db->where('subcategory_id',$id);
 	$query = $this->db->update('subcategory',$data1);
 	return $query;
 }


 function delete($id)
 {
 	$this->db->where('subcategory_id',$id);
 	$query = $this->db->delete('subcategory');

 	return $query;
 }

 function categories()
   {
       $query= $this->db->get('category');
       return $query->result();
   }
 
}