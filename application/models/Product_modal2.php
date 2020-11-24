<?php 
class Product_modal extends CI_Model 
{
	function displayprodadmin()
   {
   		$selqry="SELECT * FROM product LEFT JOIN user ON prod_agent_id=user_id";
    	$query =$this->db->query($selqry);
    	return $query->result();
   }
   function displaybyproduserid($a,$userid)
	{
		$this->db->where('prod_agent_id',$userid);
		$query = $this->db->get($a);  
        return $query->result();   
	}

}
?> 