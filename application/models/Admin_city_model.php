<?php 
class Admin_city_model extends CI_Model 
{

 function insert($data1)
 {
 	$query = $this->db->insert('city',$data1);

 	return $query;
 }

function display()
 {
 		$selqry =  "SELECT * FROM `city` ORDER BY city_id DESC";
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
 	$this->db->where('city_id',$id);
 	$query = $this->db->get('city');
 	return $query->row();
 }

 function update($id,$data1)
 {
 	$this->db->where('city_id',$id);
 	$query = $this->db->update('city',$data1);
 	return $query;
 }


 function delete($id)
 {
 	$this->db->where('city_id',$id);
 	$query = $this->db->delete('city');

 	return $query;
 }
 
}