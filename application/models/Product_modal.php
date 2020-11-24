<?php 
class Product_modal extends CI_Model 
{
	function product_insert($data1)
	{
		
		$count = $this->db->insert('product',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	// function store_user($filt){
	// 	$selqry = "SELECT * FROM `user` INNER JOIN store ON user.user_agent_id = store.store_id WHERE store.store_id IS NOT NULL"."$filt";
	// 	$qry = $this->db->query($selqry);
	// 	return $qry->result();
	// }
	function store_user($filt){
		$selqry = "SELECT * FROM `store`";
		$qry = $this->db->query($selqry);
		return $qry->result();
	}
	function product_insertbatch($data1)
	{
		//print_r($data1);
		//echo $count = $this->db->insert_batch('product',$data1);
		$count = $this->db->insert('product',$data1);
		$lastinsert_id = $this->db->insert_id();
		if($this->db->affected_rows()>0)
		{
			// return 1;
			return $lastinsert_id;
		}
		else
		{
			return 0;
		}
	}

    function insertpreview($data4)
    {
    	$query = $this->db->insert('review',$data4);
    	return $query;
    }


	function displayall($a){
		$query = $this->db->get($a);
		return $query->result();
	}

    function displayprodadmin()
    {
    	$selqry="SELECT * FROM product LEFT JOIN user ON prod_agent_id=user_id";
    	$query =$this->db->query($selqry);
    	return $query->result();
    }

	function display_approved_brand($a){
		// $this->get->where('brand_status', 0);
		// $query = $this->db->get($a);
		$selqry = "select * from brand where brand_status = '0'";
		$query = $this->db->query($selqry);
		return $query->result();
	} 
	function findprodimg($id){
		$this->db->where ('prod_id',$id); 
		$query = $this->db->get('product');
		return $query->row()->prod_image;
	}
	function deleteprodimg($id,$img){
		$selqry = "UPDATE product SET prod_image = REPLACE(prod_image,'$img',
        '') where prod_id = '$id'";
		 
		$this->db->query($selqry);
		return $this->db->affected_rows();
	}
	function displaysubcategory($catid){
		$selqry = "select * from subcategory where sub_cat_id = '$catid'";
		$query = $this->db->query($selqry);
		return $query->row();
	}
	function displaycategory($catid){
		$selqry = "select * from subcategory where sub_id = '$catid'";
		$query = $this->db->query($selqry);
		return $query->row();
	}
	
	function product_update($id,$data1)
	{
		$this->db->where ('prod_id',$id); 
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function product_updateold($id,$data1)
	{
		// $this->db->where ('prod_id',$id); 
		if($count = $this->db->update_batch('product',$data1,'prod_id'))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function displaybyproduserid($a,$userid)
	{
		$this->db->where('prod_agent_id',$userid);
		$query = $this->db->get($a);  
        return $query->result();   
	}
	function approveproduct($id)
	{
		$this->db->where ('prod_id',$id); 
		$data1 = array('prod_admin_approved' => 1,'prod_reject_reason' => '');
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function productavailable($id,$status)
	{
		$this->db->where ('prod_id',$id); 
		if($status == 'yes'){
			$data1 = array('prod_deactive' => 1);
		}else{
			$data1 = array('prod_deactive' => 0);
		}
		
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	
	function rejectproduct($id,$reason)
	{
		$this->db->where ('prod_id',$id); 
		$data1 = array('prod_admin_approved' => 0,'prod_reject_reason' => $reason);
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function product_sub_update($id,$subid)
	{
		$this->db->where ('cat_id',$id); 
		$data1 = array('cat_sub_id' =>$subid);
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function product_sub_updatedelete($subid)
	{
		$this->db->where ('cat_sub_id',$subid); 
		$data1 = array('cat_sub_id' =>'');
		if($count = $this->db->update('product',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function editproduct($id,$table)
	{
		$this->db->where('prod_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	function displaysubproduct($id,$table)
	{
		$this->db->where('cat_sub_id',$id);  
		$query = $this->db->get($table);  
		return $query; 	
	}
	
	function subproductdisplay($id)
	{
		$this->db->where('sub_cat_id');  
		$query = $this->db->get('subproduct');  
		return $query; 	
	}
    function display($a)
	{

  //       $this->load->database();
		// $query = $this->db->get($a);  
  //       return $query->result();   
		$selqry = "select * from product ORDER BY prod_admin_approved ASC";
		$query = $this->db->query($selqry);
		return $query->result();
	}

 //    function display_selected_id($a)
	// 					{

	// 				 $this->db->select('*'); 
	// 				 $this->db->from('add_driver');
	// 				 $this->db->where('driver_id',$a);
	// 				 $query = $this->db->get();
	// 				 return $query->result();  
	// 					}

	// function edit_driver($data1,$id)
	// {
	// $this->db->where('driver_id',$id);	
	// $count = $this->db->update('add_driver',$data1);
	// if($count>0)
	// {
	// 	return 1;
	// }
	// else
	// {
	// 	return 0;
	// }
	// }


// function deleteimage($id,$img)
//  {	
// 	$this->db->where('prod_id', $id);
// 	str_replace($img.',', '', subject)
// 	if($count = $this->db->delete('product'))
// 		{
// 			return true;

// 		}

// 		else
// 		{
// 			return false;
// 		}
//  }

 function delete_product($id)
 {	
	$this->db->where('prod_id', $id);
	
	if($count = $this->db->delete('product'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }

  
  function getvenors()
  {
  	$this->db->where('user_type','agent');
  	$this->db->where('user_status','1');
  	$query = $this->db->get('user');
  	return $query->result();
  }

}
?>