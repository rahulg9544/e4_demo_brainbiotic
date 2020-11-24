<?php 
class Display_modal extends CI_Model 
{
	

    function display($a)
	{

		$query = $this->db->get($a);  
        return $query->result();   
	}
	function displayonerow($a)
	{

		$query = $this->db->get($a);  
        return $query->row();   
	}
	function countdisplay($a)
	{

		$query = $this->db->get($a);  
        return $query->num_rows();   
	}
	 function displaybyrow($a,$colid,$passid)
	{
		$this->db->where($colid,$passid);
		$query = $this->db->get($a);  
        return $query->row();   
	}
	function getstorebyuser($usrid){
		$selquery = "SELECT * FROM `user` WHERE user_id = '$usrid'";

		$query = $this->db->query($selquery); 
        return $query->row()->user_agent_id;   
	}


	function update_cart($id)
	{
		$selquery = "UPDATE cart SET cart_ordr_status = '1' WHERE cart.cart_id = '$id'";
		$query = $this->db->query($selquery); 
	    return $query;
	}

	function update_payment($order,$pay_id)
	{
		$selquery = "UPDATE payment_records SET payment_order_id = '$order' WHERE payment_records.payment_payment_id = '$pay_id'";
		$query = $this->db->query($selquery); 
	    return $query;
	}


	function get_invoice_details ($payid)
	{
			$selqry = "SELECT * FROM payment_records LEFT JOIN user ON payment_records.payment_user_id = user.user_id WHERE payment_payment_id = '$payid'";
			$query = $this->db->query($selqry);
	        return $query->row();   
	}

	function get_products ($order_id)
	{
			$selqry = "SELECT * FROM deliverycharge WHERE dc_order_id = '$order_id'";
			$query = $this->db->query($selqry);
	        return $query->result();   
	}


	
	public function sendmailcontact($subject,$htmlBody,$to){

            $this->load->library ( 'email' );
            $config ['protocol'] = 'smtp';
            $config ['smtp_host'] = 'mail.nuevoinformatica.com';
            $config ['smtp_port'] = '587';
            $config ['smtp_user'] = 'abinjose@nuevoinformatica.com';
            $config ['smtp_pass'] = 'abin15';
            $config ['mailtype'] = 'html';
            $config ['charset'] = 'utf-8';
            $config ['wordwrap'] = TRUE;
            $config ['newline'] = "\r\n";
            
           
            $this->email->initialize ( $config );
           
           
            $this->email->from ( 'abinjose@nuevoinformatica.com', 'nuevo' );
            
            $this->email->to ( $to );
            $this->email->reply_to('abinjose@nuevoinformatica.com', 'nuevo');
            $this->email->subject ( $subject );
//          $this->email->message ( $htmlBody);
            $this->email->message($htmlBody);
//          $this->email->send ();
            
        
        if($this->email->send()){   
            return 1;
        } else {
            return 0;
            // echo  $this->email->print_debugger();
        }
    }
	function getcommcal($stid,$filt)
	{

		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 and store.store_id = '$stid'".$filt;

		$query = $this->db->query($selquery); 
        return $query;   
	}
	function getcommcalforadmin2($filt,$joincondition)
	{

		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id
		LEFT JOIN paid_collect ON
		store.store_id = paid_collect.paid_store_id ".$joincondition." WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 ".$filt."GROUP BY deliverycharge.dc_id ";
		
		$query = $this->db->query($selquery); 
		return $query;
		// foreach ($query->result() as $storecal)
		// {
		// 	$return[$storecal->store_id] = $storecal;
		// 	$return[$storecal->store_id]->totbalance = $this->findtotalbalance($storecal->store_id);

		// $salesrep->outlet_user,$salesrep->location_user,$salesrep->staff_id);

		// Get the categories sub categories
		// }
  //       return $query;   
	}
	function getcommcalforadmin($filt,$joincondition)
	{

		$selquery = "SELECT *,sum(deliverycharge.dc_prod_commoffer) as prodcommoffer,sum(deliverycharge.dc_prod_tax) as prodtax,sum(deliverycharge.dc_prod_actualcommission) as actualcommiss,sum(deliverycharge.dc_prod_actualstoreprice) as actualstoreprice FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id
		LEFT JOIN paid_collect ON
		store.store_id = paid_collect.paid_store_id ".$joincondition." WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 ".$filt."GROUP BY store.store_id ";
		
		$query = $this->db->query($selquery); 
		$return = array();
		foreach ($query->result() as $storecal)
		{
		$return[$storecal->store_id] = $storecal;
		$return[$storecal->store_id]->totbalance = $this->findtotalbalance($storecal->store_id);

		// $salesrep->outlet_user,$salesrep->location_user,$salesrep->staff_id);

		// Get the categories sub categories
		}
        return $query;   
	}
	function getcommcalforadminoldnew($filt,$joincondition)
	{

		$selquery = "SELECT *,sum(deliverycharge.dc_prod_commoffer) as prodcommoffer,sum(deliverycharge.dc_prod_tax) as prodtax,sum(deliverycharge.dc_prod_actualcommission) as actualcommiss,sum(deliverycharge.dc_prod_actualstoreprice) as actualstoreprice FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id
		LEFT JOIN paid_collect ON
		store.store_id = paid_collect.paid_store_id ".$joincondition." WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 ".$filt."GROUP BY store.store_id ";
		
		$query = $this->db->query($selquery); 
		$return = array();
		foreach ($query->result() as $storecal)
		{
		$return[$storecal->store_id] = $storecal;
		$return[$storecal->store_id]->totbalance = $this->findtotalbalance($storecal->store_id);

		// $salesrep->outlet_user,$salesrep->location_user,$salesrep->staff_id);

		// Get the categories sub categories
		}
        return $query;   
	}
	function getcommcalforadminold($filt,$joincondition)
	{

		$selquery = "SELECT *,sum(deliverycharge.dc_prod_commoffer) as prodcommoffer,sum(deliverycharge.dc_prod_tax) as prodtax FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id
		LEFT JOIN paid_collect ON
		store.store_id = paid_collect.paid_store_id ".$joincondition." WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 ".$filt."GROUP BY store.store_id ";
		// echo $selquery;
		$query = $this->db->query($selquery); 
        return $query;   
	}
	function findtotalbalance($storeid){
		$selquery = "SELECT *,sum(deliverycharge.dc_prod_commoffer) as prodcommofferall,sum(deliverycharge.dc_prod_actualcommission) as actualcommissall,sum(deliverycharge.dc_prod_actualstoreprice) as actualstorepriceall ,sum(paid_collect.paid_amount) as paidtotal FROM `deliverycharge` LEFT JOIN user ON deliverycharge.dc_agent_id = user.user_id LEFT JOIN store ON user.user_agent_id = store.store_id 
		LEFT JOIN paid_collect ON
		store.store_id = paid_collect.paid_store_id  WHERE store.store_id = '$storeid' AND deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 GROUP BY store.store_id ";
		// echo $selquery;
		$query = $this->db->query($selquery);
		return $query->row();
	}
	function counttotalcommission(){
		$selquery = "SELECT SUM(dc_prod_actualcommission) as newvalue FROM `deliverycharge`";
		
		$query = $this->db->query($selquery); 
        return $query->row(); 
	}
// 	function admincalcommission()
// 	{

// 		$selquery = "SELECT SUM(prod_addedcomm) - SUM(prod_rate) as newvalue FROM `product` WHERE product_status = 1"; 
// 		$query = $this->db->query($selquery); 
//         return $query->row()->newvalue;   
// 	}
	function agentcalcommission($agentid)
	{

		$selquery = "SELECT SUM(dc_prod_actualcommission) as newvalue FROM `deliverycharge` WHERE  dc_agent_id = '$agentid'"; 
		$query = $this->db->query($selquery); 
        return $query->row()->newvalue;   
	}

	function countprodagentid($userid)
	{
		$this->db->where('prod_agent_id',$userid);

		$query = $this->db->get('product');  
        return $query->num_rows();   
	}
	
	
	function sumofsalesforagent($agentid)
	{
		$selquery = "SELECT  IFNULL(sum(deliverycharge.dc_prod_commoffer + deliverycharge.dc_prod_tax),0) as subtotal FROM `deliverycharge` WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 AND deliverycharge.dc_agent_id = '$agentid' ";
		$query = $this->db->query($selquery);  
        return $query->row()->subtotal;   
	}
	function sumofmonthlysalesforagent($agentid)
	{
		$selquery = "SELECT  IFNULL(sum(deliverycharge.dc_prod_commoffer + deliverycharge.dc_prod_tax),0) as subtotal FROM `deliverycharge` WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 AND deliverycharge.dc_agent_id = '$agentid' AND  MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE()) ";
		$query = $this->db->query($selquery);  
        return $query->row()->subtotal;   
	}
	
	function countprodforadminapproved()
	{
		$this->db->where('product_status', 1);
		$query = $this->db->get('product');  
        return $query->num_rows();   
	}
	function countprodapproved($userid)
	{
		$this->db->where('prod_agent_id',$userid);
		$this->db->where('product_status', 1);
		$query = $this->db->get('product');  
        return $query->num_rows();   
	}
	
	function cart_exist($userid,$puniqid){
		$selquery = "SELECT * FROM cart WHERE cart_user_id = '$userid' AND cart_prod_unique_id = '$puniqid' AND cart_ordr_status = 0";
		$query = $this->db->query($selquery);  
        return $query->row(); 
	}
	function cart_update($cartid,$data){
		$this->db->where('cart_id',$cartid);
		
		if($count = $this->db->update('cart',$data))
		{
			return true;

		}

		else
		{
			return false;
		} 
        
	}
	function countordersbyagent($userid)
	{
		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id  WHERE deliverycharge.dc_agent_id = '$userid' AND dc_status = 0 AND order_status = 0 AND dc_cancel_order = 0 GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC ";

		$query = $this->db->query($selquery);  
        return $query->num_rows();   
	}
	
	function countdeliveredbyagent($userid)
	{
		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id  WHERE deliverycharge.dc_agent_id = '$userid' AND dc_status = 1 AND order_status = 1 GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC ";

		$query = $this->db->query($selquery);  
        return $query->num_rows();   
	}
	
	
	function countmonthlydeliveredbyagent($userid)
	{
		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id  WHERE deliverycharge.dc_agent_id = '$userid' AND dc_status = 1 AND order_status = 1 AND  MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE()) GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC ";

		$query = $this->db->query($selquery);  
        return $query->num_rows();   
	}
	
	function countmonthlyorderedbyagent($userid)
	{
		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id  WHERE deliverycharge.dc_agent_id = '$userid' AND dc_status = 0 AND dc_cancel_order = 0 AND order_status = 0 AND  MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE()) GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC ";

		$query = $this->db->query($selquery);  
        return $query->num_rows();   
	}
	function displayproduct($a)
	{
		
		// $this->db->where('product_status',1);
		// $this->db->where('prod_priority',0);
		// $this->db->order_by('prod_rating','DESC');
		// $this->db->limit(10);  
		// $query = $this->db->get($a);  
        
         $squery="SELECT product.product_id,product.prod_rate,product.prod_unique_id,product.prod_sell_price,product.prod_brand_id,product.prod_image,product.prod_deactive,product.prod_packtype,product.prod_rating,product.prod_stock_qty,product.prod_short_desc,product.prod_disc,product.prod_descr,review.review_prod_id,count(review.review_prod_id) as reviewcont,subcategory.sub_id,product.prod_name,product.prod_code,product.prod_uom,brand.brand_name,user.user_id,user.user_businessnameame,category.cat_name,category.cat_id from review left join product on product.product_id = review.review_prod_id LEFT join subcategory on subcategory.sub_id=product.prod_sub_cat_id LEFT join brand on brand.brand_id=product.prod_brand_id LEFT JOIN user on product.prod_agent_id=user.user_id LEFT JOIN category ON category.cat_id=product.prod_cat_id WHERE product.product_status = 1 GROUP BY review.review_prod_id ORDER BY product.prod_rating DESC LIMIT 10";
        $query= $this->db->query($squery);
        return $query->result();   
	}
	
	function display_recent_product()
	{

		$selquery = "SELECT * FROM product LEFT JOIN category ON product.prod_cat_id = category.cat_id WHERE product.product_status = 1  ORDER BY product.product_id DESC LIMIT 3";
		$query = $this->db->query($selquery);  
        return $query->result();   
	}




	function displayrow($a,$id)
	{

		$this->db->where('prod_id',$id);  
		$query = $this->db->get($a);  
        return $query->row();   
	}
	function displayrowprodid($id)
	{
		$selquery = "SELECT * FROM product LEFT JOIN store ON store.store_id = product.prod_store_id WHERE product.product_id = '$id'";
		$query = $this->db->query($selquery);
		// $this->db->where('prod_id',$id);  
		// $query = $this->db->get($a);  
        return $query->row();   
	}
	function getcategorynames()
	{
		$selquery = "SELECT * FROM `category`";  
		$query = $this->db->query($selquery);  
        return $query->result();   
	}
	function getcategorynames_priority()
	{
		$selquery = "SELECT * FROM category ORDER BY cat_priority DESC LIMIT 5 ";  
		$query = $this->db->query($selquery);  
        return $query->result();   
	}
	function getsinglecategoryname($id,$sid,$bid)
	{
		if(!empty($id)){
			$selquery = "SELECT * FROM `category`  where cat_id = $id"; 
		}else{
			if(!empty($sid)){
				$selquery = "SELECT * FROM `category` LEFT JOIN subcategory ON category.cat_id = subcategory.sub_cat_id where sub_id = $sid"; 
			}else{
				$selquery = "SELECT * FROM `brand` LEFT JOIN product ON brand.brand_id = product.prod_brand_id where brand.brand_id = $bid"; 
			}
			
			
		}
		$query = $this->db->query($selquery);  
        return $query->row();   
	}
	function getsingleprodcatname($id)
	{
			$selquery = "SELECT * FROM `product` LEFT JOIN category ON product.prod_cat_id = category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE product.product_id = '$id'"; 
		
		$query = $this->db->query($selquery);  
        return $query->row();   
	}

	function get_related_products($id)
	{
		$selquery = "SELECT * FROM `product` LEFT JOIN category ON product.prod_cat_id = category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id WHERE product.product_id = '$id'"; 
		$query = $this->db->query($selquery);  
        $excute =  $query->row();  
        $cat_id = $excute->cat_id; 

        $selquery1 = "SELECT * FROM `product` LEFT JOIN category ON product.prod_cat_id = category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE product.prod_cat_id = '$cat_id' ORDER BY RAND ()";  
		$query1 = $this->db->query($selquery1);  
        return $query1->result();   


	}
	
	function getcategorynamestest()
	{
		$selquery = "SELECT * FROM `category` LEFT JOIN subcategory ON category.cat_id = subcategory.sub_cat_id";  
		$query = $this->db->query($selquery);  
        return $query;   
	}
	
	function getbrands()
	{
		$selquery = "SELECT * FROM `brand` LEFT JOIN product ON brand.brand_id = product.prod_brand_id GROUP BY brand.brand_id";  
		$query = $this->db->query($selquery);  
        return $query->result();   
	}
	// new one start
	public function get_categories()
	{
		$this->db->from('category');
		$this->db->order_by("cat_priority", "DESC");
	    $query = $this->db->get();

	    $return = array();

	    foreach ($query->result() as $category)
	    {
	        $return[$category->cat_id] = $category;
	        $return[$category->cat_id]->subs = $this->get_sub_categories($category->cat_id);
	        
	         // Get the categories sub categories
	    }
	    
	    return $return;
	}

	public function get_brandimages($id)
	{
	    $selquery = "SELECT * FROM product LEFT JOIN brand ON prod_brand_id = brand_id WHERE product.prod_cat_id = '$id' AND brand_status ='0'";  
		$query = $this->db->query($selquery);  
        return $query->result();   
	}

	public function get_sub_category($id)
	{
	    $selquery = "SELECT * FROM subcategory WHERE sub_cat_id = '$id'";  
		$query = $this->db->query($selquery);  
        return $query->result();   
	}

	public function get_categoryid_using_brand($id){
			$selqry = "SELECT prod_cat_id FROM `product` WHERE prod_brand_id = '$id'";
			$query = $this->db->query($selqry);
	        return $query->row();   
		}

	public function get_categoryid_using_subcategory($id){
			 $selquery = "SELECT sub_cat_id FROM `subcategory` WHERE sub_id = '$id'";  
			 $query = $this->db->query($selquery);
	         return $query->row();   
		}

	function getaddressforhome ($id){
			$selqry = "SELECT * FROM `address` WHERE address_user_id = '$id' and address_type = 'home'";
			$query = $this->db->query($selqry);
	         return $query->row();   
		}
	function getaddressforother ($id){
			$selqry = "SELECT * FROM `address` WHERE address_user_id = '$id' and address_type = 'other'";
			$query = $this->db->query($selqry);
	         return $query->row();   
		}
	public function get_sub_categories($category_id)
	{
	    $this->db->where('sub_cat_id', $category_id);
	    $query = $this->db->get('subcategory');
	    return $query->result();
	}
	public function getcat_brandsbycatid($category_id,$stores)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
		$this->db->where('product.prod_cat_id', $category_id);
		$this->db->where('product.product_status', 1);
		$this->db->where('product.prod_brand_id !=', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('brand.brand_id');
		// $selqry = "SELECT * FROM `product` LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE product.prod_cat_id = '$category_id' AND product_status = 1 and prod_brand_id != 0  GROUP BY brand.brand_id";
		//  $query = $this->db->query($selqry);
	   $query = $this->db->get();
	    return $query->result();
	}
	public function getcat_brandsbybrandid($brand_id,$stores)
	{

		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
		$this->db->where('product.prod_brand_id', $brand_id);
		$this->db->where('product.product_status', 1);
		$this->db->where('product.prod_brand_id !=', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('brand.brand_id');

		// $selqry = "SELECT * FROM `product` LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE product.prod_brand_id = '$brand_id' AND product_status = 1 and prod_brand_id != 0  GROUP BY brand.brand_id";
	    $query = $this->db->get();
	    return $query->result();
	}
	public function getcat_brandsbysubcatid($category_sub_id,$stores)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
		$this->db->where('product.prod_sub_cat_id', $category_sub_id);
		$this->db->where('product.product_status', 1);
		$this->db->where('product.prod_brand_id !=', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('brand.brand_id');
		// $selqry = "SELECT * FROM `product` LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE product.prod_sub_cat_id = '$category_sub_id' AND product_status = 1 and prod_brand_id != 0 GROUP BY brand.brand_id";
	    $query = $this->db->get();
	    return $query->result();
	}
	
		
	public function getsinglebrand($brandid)
	{
	    $this->db->where('brand_id', $brandid);
	    $query = $this->db->get('brand');
	    return $query->row();
	}
	function getbrandsbyid($mainids,$stores,$limits,$sorts)
	{
			$this->db->select('*');
			$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_brand_id',$mainids);
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
	// new one end
	function getproductsbyidbrandid($brandid,$stores,$limits,$sorts)
	{
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_brand_id',$brandid);
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
	function getproductsbyidbrandidoffer($brandid,$stores,$offer,$limits,$sorts)
	{
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_brand_id',$brandid);
			$this->db->where('product.prod_disc',$offer);
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
		function getproductsbyidcategoryoffer($mainid,$stores,$offer,$limits,$sorts)
	{
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_cat_id',$mainid);
			
			
		
			 $this->db->where('product.prod_disc >', $offer); 
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
	function getproductsbyidcategory($mainid,$stores,$limits,$sorts)
	{
			$this->db->select('*');
			$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_cat_id',$mainid);
			
			
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}

	public function get_userdelivery($userid)
	{
	    
	    $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN brand  ON product.prod_brand_id = brand.brand_id LEFT JOIN user ON cart.cart_user_id = user.user_id WHERE user.user_id = '$userid'  GROUP BY deliverycharge.dc_order_id ORDER BY deliverycharge.dc_id DESC ,deliverycharge.dc_date DESC ";
		$query = $this->db->query($selqry);
        $return = array();
	    foreach($query->result() as $row){
	    	$return[$row->dc_order_id] = $row;
	     	$return[$row->dc_order_id]->allitems = $this->allitems($row->dc_order_id);
	    } 
	    return $return;  
	}
	public function allitems($ordid){
		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN brand  ON product.prod_brand_id = brand.brand_id WHERE deliverycharge.dc_order_id = '$ordid'";
		$query = $this->db->query($selqry);
		return $query->result();
	}



    function get_userdelivery_oderonly($userid)
    {
    	$this->db->where('orders_user_id',$userid);
    	$query = $this->db->get('orders');
    	return $query->result();
    }




			function getsearches($searchitem,$stores,$limits,$sorts)
	{
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			// $this->db->where('prod_cat_id',$mainid);
			// $this->db->group_start();
			// $this->db->like('prod_name', $searchitem);
			$this->db->where("prod_name LIKE '%$searchitem%'");
			// $this->db->or_like('prod_descr', $searchitem);
			// $this->db->group_end();
			
			
			// $this->db->like('prod_code', $searchitem);
			 // $this->db->where('product.prod_disc >', $offer); 
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');
		// echo $this->db->last_query();
		// die();
        return $query->result();   
	}
		function getproductsbyidsubcategory($subid,$stores,$limits,$sorts)
	{
			$this->db->select('*');
			$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
			$this->db->where('product_status',1);
			$this->db->where('prod_sub_cat_id',$subid);
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
	function getproductsbyidsubcategoryoffer($subid,$stores,$offer,$limits,$sorts)
		{
			$this->db->where('product_status',1);
			// $this->db->where('prod_priority',0);
			$this->db->where('prod_sub_cat_id',$subid);
			$this->db->where('product.prod_disc >', $offer);
			// start
			if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
			// end
		
		switch ($sorts) {
		    case 'latest':
		        $this->db->order_by("prod_modified", "asc");  
		        break;
		    case 'nameasc':
		        $this->db->order_by("prod_name", "asc");  
		        break;
		    case 'namedesc':
		        $this->db->order_by("prod_name", "desc");  
		        break;
		    case 'priceasc':
		        $this->db->order_by("prod_rate", "asc");  
		        break;
		    case 'pricedesc':
		        $this->db->order_by("prod_rate", "desc");  
		        break;
		    default:
		        $this->db->order_by("prod_disc", "desc");  
		        break;
		}
		
    	 $this->db->limit($limits);
		$query = $this->db->get('product');    
        return $query->result();   
	}
	function getautoproductsbycategory($stores){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'product.prod_cat_id = category.cat_id', 'left');
		$this->db->where('product.product_status', 1);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('product.product_id'); 
		// $this->db->limit(6); 

		$query = $this->db->get(); 

		// $selquery = "SELECT * FROM `product` LEFT JOIN category ON product.prod_cat_id = category.cat_id WHERE product.product_status = 1 AND product.prod_priority = 0 GROUP BY product.product_id ";  
		// $query = $this->db->query($selquery);  
        return $query;   
	}
	function updatecartitem($cartid,$userid,$dataquant)
	{
		$this->db->where ('cart_id',$cartid);
		$this->db->where ('cart_user_id',$userid);
		if($count = $this->db->update('cart',$dataquant))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function cancelorder($deliveryid,$data)
	{
		$this->db->where ('dc_id',$deliveryid);
		
		if($count = $this->db->update('deliverycharge',$data))
		{
			return 1;

		}

		else
		{
			return 0;
		}
	}
	function cart_insert($data1)
	{
		
		$count = $this->db->insert('cart',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function wishlist_insert($data1)
	{
		
		$count = $this->db->insert('wishlists',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function insertorder($data1)
	{
		$res = $this->db->insert_batch('deliverycharge',$data1);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
	}
	function countcartold($userid){
		$selqry = "SELECT count(*) as cartcount FROM `cart` LEFT JOIN product ON cart.cart_product_id = product.product_id WHERE cart_user_id = '$userid' AND  prod_deactive = 0 AND cart_ordr_status = 0";
		$query = $this->db->query($selqry);  
        return $query->row();  
	}
	function countcart($userid,$stores){
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->join('product', 'cart.cart_product_id = product.product_id', 'left');
		$this->db->where('cart_user_id', $userid);
		$this->db->where('cart_ordr_status', 0);
		$this->db->where('product.prod_deactive', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('cart.cart_id');   
		$query = $this->db->get();
		// $selqry = "SELECT * FROM `cart` LEFT JOIN product ON cart.cart_product_id = product.product_id  WHERE cart_user_id = '$userid' AND cart_ordr_status = 0 AND product.prod_deactive = 0 GROUP BY cart.cart_id";
		// $query = $this->db->query($selqry);  
        return $query->num_rows();  
	}
	function countwishlist($userid){
		$selqry = "SELECT count(*) as wishlistcount FROM `wishlists` WHERE wishlists_user_id = '$userid'";
		$query = $this->db->query($selqry);  
        return $query->row();  
	}
	function cartitems($userid){
		$selqry = "SELECT * FROM `cart` LEFT JOIN product ON cart.cart_product_id = product.product_id  WHERE cart_user_id = '$userid' AND cart_ordr_status = 0
		AND prod_deactive = 0 GROUP BY cart.cart_id";
		$query = $this->db->query($selqry);  
        return $query->result();  
	}
	function getstoreidincart($userid,$stid){
		$selqry = "SELECT * FROM cart LEFT JOIN product ON cart.cart_product_id = product.product_id WHERE cart_user_id = '$userid' AND product.prod_store_id = '$stid' AND cart.cart_ordr_status = 0 AND product.prod_deactive = 0";
		$query = $this->db->query($selqry);
		 return $query->result();
	}

	function getstoreidinaddress($userid){
		$selqry = "SELECT * FROM cart LEFT JOIN product ON cart.cart_product_id = product.product_id WHERE cart_user_id = '$userid' AND product.prod_store_id = '$stid' AND cart.cart_ordr_status = 0 AND product.prod_deactive = 0";
		$query = $this->db->query($selqry);
		 return $query->result();
	}
	function cartitemscheckout($userid,$stores){
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->join('product', 'cart.cart_product_id = product.product_id', 'left');
		$this->db->join('brand', 'product.prod_brand_id = brand.brand_id', 'left');
		$this->db->where('cart_user_id', $userid);
		$this->db->where('cart_ordr_status', 0);
		$this->db->where('product.prod_deactive', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('cart.cart_id');   
		$query = $this->db->get();
		// $selqry = "SELECT * FROM `cart` LEFT JOIN product ON cart.cart_product_id = product.product_id  WHERE cart_user_id = '$userid' AND cart_ordr_status = 0 AND product.prod_deactive = 0 GROUP BY cart.cart_id";
		// $query = $this->db->query($selqry);  
        return $query->result();  
	}
		function cartitemscheckoutdistinct($userid,$stores){
		$this->db->distinct();
		$this->db->select('product.prod_store_id');
		$this->db->from('cart');
		$this->db->join('product', 'cart.cart_product_id = product.product_id', 'left');
		$this->db->where('cart_user_id', $userid);
		$this->db->where('cart_ordr_status', 0);
		$this->db->where('product.prod_deactive', 0);
		if (substr($stores, -1, 1) == ',')
		{
		  $stores = substr($stores, 0, -1);
		}
		$stid = explode(",", $stores);
		if(!empty($stid)){
			$this->db->group_start();
			$this->db->or_where('prod_store_id',$stid[0]);
			for ($i =1; $i< count($stid); $i++) {
				$this->db->or_where('prod_store_id',$stid[$i]);
			}
			$this->db->group_end();
		}
		$this->db->group_by('cart.cart_id');   
		$query = $this->db->get();
		// $selqry = "SELECT * FROM `cart` LEFT JOIN product ON cart.cart_product_id = product.product_id  WHERE cart_user_id = '$userid' AND cart_ordr_status = 0 AND product.prod_deactive = 0 GROUP BY cart.cart_id";
		// $query = $this->db->query($selqry);  
        return $query->result();  
	}
	function wishlistitems($userid){
		$selqry = "SELECT * FROM `wishlists` LEFT JOIN product ON wishlists.wishlists_prod_id = product.product_id  WHERE wishlists.wishlists_user_id = '$userid' GROUP BY wishlists.wishlists_id";
		$query = $this->db->query($selqry);  
        return $query->result();  
	}
	function deletcartitem($userid,$cartid){
		$this->db->where('cart_id',$cartid);
		$this->db->where('cart_user_id',$userid);  
		
		if($count = $this->db->delete('cart'))
		{
			return 1;

		}

		else
		{
			return 0;
		}
	}
	function deletewishlist($userid,$wishid){
		$this->db->where('wishlists_id',$wishid);
		$this->db->where('wishlists_user_id',$userid);  
		
		if($count = $this->db->delete('wishlists'))
		{
			return 1;

		}

		else
		{
			return 0;
		}
	}
	function deletcartitemcheckout($userid){
		
		$this->db->where('cart_user_id',$userid); 
		$data = array('cart_ordr_status' => 1); 
		
		if($count = $this->db->update('cart',$data))
		{
			return 1;

		}

		else
		{
			return 0;
		}
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


  function getsubcats()
  {
  	// $selqry="SELECT * FROM subcategory LIMIT 10";
  	  

  	$squery = "SELECT product.*,subcategory.*, dc_prod_id, COUNT(*) AS counts FROM deliverycharge LEFT JOIN product ON deliverycharge.dc_prod_id = product.product_id LEFT JOIN  subcategory ON subcategory.sub_id = product.prod_sub_cat_id GROUP BY dc_prod_id HAVING COUNT(*) > 0 ORDER BY counts DESC LIMIT 10";

  	$query = $this->db->query($squery);
  	return $query->result();
  }

  function getbrand()
  {
  	$selqry="SELECT * FROM brand WHERE brand_status='0' LIMIT 10";
  	$query = $this->db->query($selqry);
  	return $query->result();
  }

  function getnewprods()
  {
     $sevenday = date('Y-m-d', strtotime('-7 days'));
     
     // $selqry="SELECT * FROM product WHERE product_status= 1 AND prod_priority= 0 AND prod_modified > '$sevenday' LIMIT 20";

    $squery="SELECT product.product_id,product.prod_rate,product.prod_unique_id,product.prod_sell_price,product.prod_brand_id,product.prod_image,product.prod_deactive,product.prod_packtype,product.prod_rating,product.prod_stock_qty,product.prod_short_desc,product.prod_disc,product.prod_descr,review.review_prod_id,count(review.review_prod_id) as reviewcont,subcategory.sub_id,product.prod_name,product.prod_code,product.prod_uom,brand.brand_name,user.user_id,user.user_businessnameame,category.cat_name,category.cat_id from review left join product on product.product_id = review.review_prod_id LEFT join subcategory on subcategory.sub_id=product.prod_sub_cat_id LEFT join brand on brand.brand_id=product.prod_brand_id LEFT JOIN user on product.prod_agent_id=user.user_id LEFT JOIN category ON category.cat_id=product.prod_cat_id WHERE product.product_status = 1 AND product.prod_priority= 0 AND product.prod_modified > '$sevenday' GROUP BY review.review_prod_id ORDER BY product.prod_modified DESC LIMIT 10";

     $query= $this->db->query($squery);
     return $query->result();
  	// $this->db->where('product_status',1);
  	// $this->db->where('prod_priority',0);
  	// $this->db->
  }


  function getnewarrprods()
  {
  	$sevenday = date('Y-m-d', strtotime('-7 days'));
     
     $selqry="SELECT * FROM product WHERE product_status= 1 AND prod_priority= 0 AND prod_modified > '$sevenday'";
     $query= $this->db->query($selqry);
     return $query->result();
  }

  function getlargnewarrv()
  {
  	$sevenday = date('Y-m-d', strtotime('-7 days'));
     
     $selqry="SELECT * FROM product WHERE product_status= 1 AND prod_priority= 0 AND prod_modified > '$sevenday' ORDER BY prod_sell_price DESC LIMIT 1";
     $query1= $this->db->query($selqry);
     if($query1->num_rows()!=0)
     {
     $query=$query1->row();

     return $price=$query->prod_sell_price;
     }
     else
     {
     	return 0;
     }
  }


  function getsmalnewarrv()
  {
  	$sevenday = date('Y-m-d', strtotime('-7 days'));
     
     $selqry="SELECT * FROM product WHERE product_status= 1 AND prod_priority= 0 AND prod_modified > '$sevenday' ORDER BY prod_sell_price ASC LIMIT 1";
     $query1= $this->db->query($selqry);
     if($query1->num_rows()!=0)
     {
     $query=$query1->row();

     return $price=$query->prod_sell_price;
     }
     else
     {
     	return 0;
     }
  }

  function getbrndviseprods($brandid)
  {
  	$selqry="SELECT * FROM product WHERE product_status= 1 AND prod_priority= 0 AND prod_brand_id = '$brandid' ";
     $query= $this->db->query($selqry);
     return $query->result();
  }

  function getthisbrand($brandid)
  {
  	$this->db->where('brand_id',$brandid);
  	$query = $this->db->get('brand');
  	return $query->row();
  }

  function getthisprod($pid)
  {
  	$this->db->where('prod_id',$pid);
  	$query = $this->db->get('product');
  	return $query->row();
  }

  function getcartcount($userid)
  {
  	$selqry = "SELECT count(*) AS cartcount FROM cart WHERE cart_user_id='$userid' AND cart_ordr_status=0";
  	$query=$this->db->query($selqry);
  	return $query->row();
  }

  function getcartitemsthump($userid)
  {
  	$selqry = "SELECT * FROM cart LEFT JOIN product ON cart.cart_prod_unique_id=product.prod_unique_id WHERE cart.cart_user_id='$userid' AND cart.cart_ordr_status=0";
  	$query = $this->db->query($selqry);
  	return $query->result();

  }

  function removecartitem($userid,$cid)
  {
  	$this->db->where('cart_id',$cid);
  	$this->db->where('cart_user_id',$userid);
  	$query=$this->db->delete('cart');
  	return $query;
  }

  function changecqty($data1,$cartId,$userid)
  {
  	$this->db->where('cart_id',$cartId);
  	$this->db->where('cart_user_id',$userid);
  	$query = $this->db->update('cart',$data1);
  	return $query;
  }

  function getexistitemcont($userid,$pid)
  {
  	$this->db->where('wishlists_user_id',$userid);
  	$this->db->where('wishlists_prod_id',$pid);
  	$query = $this->db->get('wishlists');
  	return $query;
  }


 

  function getordersdetails($orderid)
  {
  	$this->db->where('dc_order_id',$orderid);
  	$query = $this->db->get('deliverycharge');
  	return $query->result();
  }

  function getordercomontls($orderid)
  {
  	$this->db->where('orders_uniq_id',$orderid);
  	$query = $this->db->get('orders');
  	return $query->row();
  }

  function gettestmonils()
  {
  	$selqry = "SELECT * FROM testimonials ORDER BY testimonials_date DESC limit 6";
  	$query = $this->db->query($selqry);
  	return $query->result();
  }

  function getorderusermail($order_user)
  {
  	$this->db->where('user_id',$order_user);
  	$query = $this->db->get('user');
  	return $query->row();
  }



  function get_contactpagedtls()
  {
  	$selqry="SELECT * FROM contact LIMIT 1";
  	$query=$this->db->query($selqry);
  	return $query->row();
  }

  function get_terms()
  {
  	$selqry="SELECT * FROM terms LIMIT 1";
  	$query=$this->db->query($selqry);
  	return $query->row();
  }

  function get_aboutpagedtls()
  {
  	$selqry="SELECT * FROM about LIMIT 1";
  	$query=$this->db->query($selqry);
  	return $query->row();
  }


 //home reports

function countbanslide()
{
	$query = $this->db->get('banner');
	return $query->num_rows();

}

function countprodforadmin()
	{
		
		$query = $this->db->get('product');  
        return $query->num_rows();   
	}

function countordersforadmin()
	{
		
       //$query = $this->db->get('orders');
        $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN addressprofile ON deliverycharge.dc_user_id = addressprofile.addressprofile_userid  GROUP BY dc_order_id ORDER BY dc_id DESC";
    
		$query = $this->db->query($selqry);

        return $query->num_rows();    
	}	

function countdeliveredforadmin()
	{
		
        // $this->db->where('orders_status',3);
        // $query = $this->db->get('orders');
        $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN addressprofile ON deliverycharge.dc_user_id = addressprofile.addressprofile_userid WHERE  deliverycharge.dc_status = '1' GROUP BY dc_order_id ORDER BY dc_id DESC";
    
		$query = $this->db->query($selqry);

        return $query->num_rows();   
	}	

function countmonthlydeliveredforadmin()
	{
		$selquery = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id WHERE dc_status = 1 AND order_status = 1 AND  MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE()) GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC";
		$query = $this->db->query($selquery);  
        return $query->num_rows();   
	}	

function sumofsalesforadmin()
	{
		$selquery = "SELECT  IFNULL(sum(deliverycharge.dc_prod_commoffer),0) as subtotal FROM `deliverycharge` WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1 AND deliverycharge.dc_cancel_order = 0";
		$query = $this->db->query($selquery);  
        return $query->row()->subtotal;   
	}	

function sumofmonthlysalesforadmin()
	{
		$selquery = "SELECT  IFNULL(sum(deliverycharge.dc_prod_commoffer),0) as subtotal FROM `deliverycharge` WHERE deliverycharge.order_status = 1 AND deliverycharge.dc_status = 1  AND deliverycharge.dc_cancel_order = 0 AND MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE())";
		$query = $this->db->query($selquery);  
        return $query->row()->subtotal;   
	}

function countmonthlyorderedforadmin()
	{
		
			// $selquery="SELECT * FROM orders WHERE MONTH(orders_date) = MONTH(CURRENT_DATE()) AND YEAR(orders_date) = YEAR(CURRENT_DATE())";
		// $query = $this->db->query($selquery);
		 $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN addressprofile ON deliverycharge.dc_user_id = addressprofile.addressprofile_userid WHERE MONTH(dc_date) = MONTH(CURRENT_DATE()) AND YEAR(dc_date) = YEAR(CURRENT_DATE()) GROUP BY dc_order_id ORDER BY dc_id DESC"; 
		
		$query = $this->db->query($selqry);  
        return $query->num_rows();  
	}	

function countusers()
	{
		// $selquery = "SELECT COUNT(user_type) as user FROM user WHERE user_type = 'agent' UNION SELECT COUNT(user_type) as agent FROM user WHERE user_type = 'user'";
		$selquery = "SELECT COUNT(*)as usercount FROM user";
		
		$query1 = $this->db->query($selquery);
		$query = $query1->row();     
        return $query->usercount;
	}	


  //home reports


 
}
?>