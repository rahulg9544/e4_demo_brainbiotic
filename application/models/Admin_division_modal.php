<?php 
class Admin_division_modal extends CI_Model 
{
   function getsubs($cat)
   {
   	$this->db->where('subcategory_category',$cat);
   	$query = $this->db->get('subcategory');
   	return $query->result();
   }

   function getdivs()
   {
   	// $query = $this->db->get('division');
    
    $selquery ="SELECT * FROM division LEFT JOIN category ON division.division_cat = category.category_id LEFT JOIN subcategory ON division.division_subcat=subcategory.subcategory_id";
    $query = $this->db->query($selquery);
   	return $query->result();
   }

   function insertdivision($data)
   {
   	$query = $this->db->insert('division',$data);
   	return $query;
   }

   function updatedivision($divid,$data)
   {
   	 $this->db->where('division_id',$divid);
   	 $query = $this->db->update('division',$data);
   	 return $query;
   }

   function getdiv_edit($divid)
   {
   	$this->db->where('division_id',$divid);
   	$query = $this->db->get('division');
   	return $query->row();
   }

   function delete_division($did)
   {
   	$this->db->where('division_id',$did);
   	$query = $this->db->delete('division');
   	return $query;
   }
}