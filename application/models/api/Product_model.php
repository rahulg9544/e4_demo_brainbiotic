<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
    }

    function getsingleprod($pid)
{
	 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_id='$pid'";

		$query = $this->db->query($squery);
		$query = $query->row();
           
         $query->product_image = explode(',',$query -> product_image);
         $query->product_sizeno = explode(',',$query -> product_sizeno);
         $query->product_sizeletter = explode(',',$query -> product_sizeletter);
         $query->product_quantity = explode(',',$query -> product_quantity);
         $query->product_mrpwise = explode(',',$query -> product_mrpwise);
         $query->product_sellpricewise = explode(',',$query -> product_sellpricewise);
         $query->product_discountwise = explode(',',$query -> product_discountwise);
         $query->product_color = explode(',',$query -> product_color);
         $a[] = $query;

		return $a;

}

    function getprodsubdetils_single($prod_sub)
    {
        $this->db->where('subcategory_id',$prod_sub);
        $query = $this->db->get('subcategory');
        return $query->row();
	}
	
	function get_similiar_products($prod_sub)
    {
        $this->db->where('product_subcategory',$prod_sub);
        $query = $this->db->get('product');
		return $query->result();
		
		foreach ($query->result() as $product)
	    {         
			
		//	print_r($product);
           
		$product->product_image = explode(',',$product -> product_image);
		$product->product_sizeno = explode(',',$product -> product_sizeno);
		$product->product_sizeletter = explode(',',$product -> product_sizeletter);
		$product->product_quantity = explode(',',$product -> product_quantity);
		$product->product_mrpwise = explode(',',$product -> product_mrpwise);
		$product->product_sellpricewise = explode(',',$product -> product_sellpricewise);
		$product->product_discountwise = explode(',',$product -> product_discountwise);
		$product->product_color = explode(',',$product -> product_color);
		$a[] = $product;
	   }
	   exit;
	   return $a;
    }

    public function get_categories()
	{
		$this->db->from('category');
		// $this->db->order_by("cat_priority", "DESC");
	    $query = $this->db->get();

	    $return = array();

	    foreach ($query->result() as $category)
	    {
	        $return[$category->category_id] = $category;
	        $return[$category->category_id]->subs = $this->get_sub_categories($category->category_id);
	        
	         // Get the categories sub categories
	    }
	    
	    return $return;
	}

}