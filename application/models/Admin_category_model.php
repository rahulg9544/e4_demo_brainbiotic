<?php 
class Admin_category_model extends CI_Model 
{

 function insert($data1)
 {
 	$query = $this->db->insert('category',$data1);

 	return $query;
 }

function display()
 {
 		$selqry =  "SELECT * FROM `category` ORDER BY category_id DESC";
		$query = $this->db->query($selqry);  
		return $query->result(); 
 }

 function display1($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
        return $query->result();   
	}

 function edit($id)
 {
 	$this->db->where('category_id',$id);
 	$query = $this->db->get('category');
 	return $query->row();
 }

 function update($id,$data1)
 {
 	$this->db->where('category_id',$id);
 	$query = $this->db->update('category',$data1);
 	return $query;
 }


 function delete($id)
 {
 	$this->db->where('category_id',$id);
 	$query = $this->db->delete('category');

 	return $query;
 }
 
}