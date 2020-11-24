<?php 
class Promocode_modal extends CI_Model 
{
	function promo_insert($data1)
	{
		
		$count = $this->db->insert('promocode',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function promo_update($id,$data1)
	{
		$this->db->where ('promo_id',$id); 
		if($count = $this->db->update('promocode',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function category_sub_update($id,$subid)
	{
		$this->db->where ('cat_id',$id); 
		$data1 = array('cat_sub_id' =>$subid);
		if($count = $this->db->update('category',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function category_sub_updatedelete($subid)
	{
		$this->db->where ('cat_sub_id',$subid); 
		$data1 = array('cat_sub_id' =>'');
		if($count = $this->db->update('category',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function editcategory($id,$table)
	{
		$this->db->where('cat_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	function displaysubcategory($id,$table)
	{
		$this->db->where('cat_sub_id',$id);  
		$query = $this->db->get($table);  
		return $query; 	
	}
	
	function subcategorydisplay($id)
	{
		$this->db->where('sub_cat_id');  
		$query = $this->db->get('subcategory');  
		return $query; 	
	}
    function display($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
        return $query->result();   
	}


 function delete_promocode($id)
 {	
	$this->db->where('promo_id', $id);
	
	if($count = $this->db->delete('promocode'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }

 function priority($id,$status)
	{
		
		$this->db->where ('promo_id',$id); 
		if($status == '1'){
			$data1 = array('promo_status' => 0);
		}else{
			$data1 = array('promo_status' => 1);
		}
		
		if($count = $this->db->update('promocode',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}


}
?>