<?php 
class Admin_products_model extends CI_Model 
{
	function get_products()
   {
      $selqry = 'SELECT * FROM `product` LEFT JOIN category ON product.product_category = category.category_id LEFT JOIN subcategory ON product.product_subcategory = subcategory.subcategory_id GROUP BY product.product_id';
      $query = $this->db->query($selqry);  
      return $query->result(); 
      
   }
 
   function get_productsid($id)
   {
   	$this->db->where('product_id',$id);
   	$query = $this->db->get('product');
   	return $query->row();
   }

   function get_productsidedit($id)
   {
      $squery="SELECT * FROM product LEFT JOIN category ON product_category=category_id LEFT JOIN subcategory ON product_subcategory=subcategory_id LEFT JOIN division ON product_division=division_id WHERE product_id='$id'";
      $query=$this->db->query($squery);
      return $query->row();
   }

   function update_products($id,$data1)
   {
   	$this->db->where('product_id',$id);
   	$query = $this->db->update('product',$data1);
   	return $query;
   }

   function insert_products($data)
      {
         $query = $this->db->insert('product',$data);
         return $query;
      }

   function findprodimg($id){
      $this->db->where ('product_id',$id); 
      $query = $this->db->get('product');
      return $query->row()->product_image;
   }
   function deleteprodimg($id,$img){
      $selqry = "UPDATE product SET product_image = REPLACE(product_image,'$img',
        '') where product_id = '$id'";
       
      $this->db->query($selqry);
      return $this->db->affected_rows();
   }
      
  function updatestatus($id,$data1)
   {
      $this->db->where('product_id',$id);
      $query = $this->db->update('product',$data1);
      return $query;
   }
   
    function delete_products($id)
   {
      $this->db->where('product_id',$id);
      $query = $this->db->delete('product');
      return $query;
   }

   function productavailable($id,$status)
	{
		$this->db->where ('product_id',$id); 
		if($status == 'yes'){
			$data1 = array('product_available' => 1);
		}else{
			$data1 = array('product_available' => 0);
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

    function getbrands()
   {
         $query = $this->db->get('brand');
         return $query->result();
   }

    function accessories()
   {
         $query = "SELECT * FROM category";
         $result= $this->db->query($query);
         return $result->result();
   }

    function nonaccessories()
   {
         $query = "SELECT * FROM category";
         $result= $this->db->query($query);
         return $result->result();
   }

   function subcategories()
   {
         $query = $this->db->get('subcategory');
         return $query->result();
   }

   function get_quantity($id)
   {
      $this->db->where('product_id',$id);
      $query = $this->db->get('product');
      return $query->result();
   }

   function subname($subnm){
      $selqry = "select * from subcategory where subcategory_name = '$subnm'";
      $query = $this->db->query($selqry);
      return $query->row();
   }

   function displaysubcategory($catid){
      $selqry = "select * from subcategory where subcategory_category = '$catid'";
      $query = $this->db->query($selqry);
      return $query->row();
   }
   function displaycategory($catid){
      $selqry = "select * from subcategory where subcategory_name = '$catid'";
      $query = $this->db->query($selqry);
      return $query->row();
   }


   function getsubsoncat($catid)
   {
      $this->db->where('subcategory_category',$catid);
      $query=$this->db->get('subcategory');

      return $query->result();
   }

   function getsubdetails($sbname)
   {
      $this->db->where('subcategory_name',$sbname);
      $query= $this->db->get('subcategory');
      return $query->row();
   }

   function getdivsonsub($subid)
   {
      $this->db->where('division_subcat',$subid);
      $query=$this->db->get('division');
      return $query->result();
   }

   function getsubsid($subcatname)
   {
      $selqry="SELECT * FROM subcategory WHERE subcategory_name='$subcatname' LIMIT 1";
      $query = $this->db->query($selqry);
      return $query->row();
   }

}
?>