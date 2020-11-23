<?php 
class Admin_offers_model extends CI_Model 
{

 function insert($data1)
 {
 	$query = $this->db->insert('offers',$data1);
 	return $query;
 }

 function display()
 {
 	$selqry = 'SELECT * FROM offers LEFT JOIN subcategory ON offers.offers_sub_cat_id = subcategory.subcategory_id LEFT JOIN category ON subcategory.subcategory_category = category.category_id';
		$query = $this->db->query($selqry);  
		return $query->result(); 
 }

 function edit($id)
 {
 	$this->db->where('offers_id',$id);
 	$query = $this->db->get('offers');
 	return $query->row();
 }

 function update($id,$data1)
 {
 	$this->db->where('offers_id',$id);
 	$query = $this->db->update('offers',$data1);
 	return $query;
 }


 function delete($id)
 {
 	$this->db->where('offers_id',$id);
 	$query = $this->db->delete('offers');

 	return $query;
 }

 function subcategory()
   {
       $query= $this->db->get('subcategory');
       return $query->result();
   }

    function status_update($id,$status)
	{
		$this->db->where ('offers_id',$id); 
		if($status == '0'){
			$data1 = array('offers_status ' => 1);
		}else{
			$data1 = array('offers_status ' => 0);
		}
		
		if($count = $this->db->update('offers',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
 
}