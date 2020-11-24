<?php 
class Delivery_modal extends CI_Model 
{
	function user_insert($data1)
	{
		
		$count = $this->db->insert('user',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function dboyassign($ord,$dt,$tm,$dboy,$ddate){

		$this->db->where ('dc_order_id',$ord); 
		$this->db->where ('dc_date',$dt);
		$this->db->where ('dc_time',$tm);
		$data1 = array('dc_agent_id' => $dboy,'dc_delivery_date' => $ddate);
         if($count = $this->db->update('deliverycharge',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}   
	}
	function user_update($id,$data1)
	{
		$this->db->where ('user_id',$id); 
		if($count = $this->db->update('user',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function edituser($id,$table)
	{
		$this->db->where('user_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	function logincheck($username)
	{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$username);

        // $this->db->or_where('phone_number',$username);
        
		$query = $this->db->get();  
         return $query;   
	}
	
	function checkemail($emailid)
	{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$emailid);

        // $this->db->or_where('phone_number',$username);
        
		$query = $this->db->get();  
         return $query;   
	}
	function checkemailupd($userid,$emailid)
	{
        
		$selqry = "SELECT * FROM `user` WHERE user_name != '$userid' AND user_name = '$emailid'";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query;   
	}
	
	function findagent($userid)
	{
        
		$selqry = "SELECT * FROM `user` where user_id = '$userid'";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query->row();   
	}
	function findstore($storeid)
	{
        
		$selqry = "SELECT * FROM `store` where store_id = '$storeid'";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query->row();   
	}
	function findaddress($addressid)
	{
        
		$selqry = "SELECT * FROM `address` where address_id = '$addressid'";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query->row();   
	}
	function displaydelivery()
	{
        
		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id GROUP BY deliverycharge.dc_id ORDER BY dc_date DESC";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query->result;   
	}
	// new one start
	public function get_usersbyuserid($userid)
	{
		
		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN address ON address.address_id = deliverycharge.dc_address_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN firebase_user ON cart.cart_user_id = firebase_user.firebase_user_id WHERE deliverycharge.dc_agent_id = '$userid' AND deliverycharge.dc_cancel_order = 0 GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC";


      

		$query = $this->db->query($selqry);

         
	    
	 //    $return = array();

	 //    foreach ($query->result() as $users)
	 //    {
	 //        $return[$users->user_id] = $users;
	 //        $return[$users->user_id]->deliv = $this->get_delivery($userid); 
	 //    }

	    return $query->result();
	}
public function get_usersbyuseridforhome($userid)
	{
		
		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id  WHERE deliverycharge.dc_agent_id = '$userid'  AND deliverycharge.dc_status = 1 AND deliverycharge.order_status = 1 GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC";

		$query = $this->db->query($selqry);

         
	    
	 //    $return = array();

	 //    foreach ($query->result() as $users)
	 //    {
	 //        $return[$users->user_id] = $users;
	 //        $return[$users->user_id]->deliv = $this->get_delivery($userid); 
	 //    }

	    return $query->result();
	}
	public function get_users()
	{
		
	
// 		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN addressprofile ON deliverycharge.dc_user_id = addressprofile.addressprofile_userid  GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC";
    
    $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN orders ON orders.orders_uniq_id=deliverycharge.dc_order_id LEFT JOIN addressprofile ON deliverycharge.dc_user_id = addressprofile.addressprofile_userid GROUP BY dc_order_id ORDER BY `deliverycharge`.`dc_id` DESC ";
    
		$query = $this->db->query($selqry);
         
	   
	    $return = array();

	    foreach ($query->result() as $users)
	    {
	        $return[$users->dc_id] = $users;
	        $return[$users->dc_id]->dboy = $this->get_dboy($users->dc_agent_id); // Get the categories sub categories
	    }

	    return $return;

	    // return $query->result();
	}
	public function get_dboy($dboyid){
		$selqry = "SELECT * FROM `user` WHERE user.user_id = '$dboyid'";
		$query = $this->db->query($selqry);
		return $query->row();
	}
public function get_usersforadmin()
	{
		
		// $selqry = "SELECT * FROM `deliverycharge` ";
		$selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id WHERE deliverycharge.dc_status = 1 AND deliverycharge.order_status = 1 GROUP BY deliverycharge.dc_order_id ORDER BY dc_date,dc_time DESC";
		$query = $this->db->query($selqry);
         
	    // $query = $this->db->get('user');
	    // $return = array();

	    // foreach ($query->result() as $users)
	    // {
	    //     $return[$users->user_id] = $users;
	    //     $return[$users->user_id]->deliv = $this->get_delivery($users->user_id); // Get the categories sub categories
	    // }

	    // return $return;

	    return $query->result();
	}

	public function get_deliverymulitpleall($id,$dat,$tim,$filt)
	{
	    
	    $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id WHERE deliverycharge.dc_order_id = '$id' and dc_time = '$tim' and dc_date = '$dat' ".$filt."GROUP BY deliverycharge.dc_id ORDER BY deliverycharge.dc_date DESC";

		$query = $this->db->query($selqry);
         return $query;   
	}
    
    public function getorderaddress($id)
    {
    	$selqry="SELECT * FROM addressprofile WHERE addressprofile_id='$id'";
    	$query= $this->db->query($selqry);
    	return $query->row();
    }
    
    function getorderadrsdel($id)
    {
        $this->db->where('orders_uniq_id',$id);
        $query = $this->db->get('orders');
        return $query->row();
    }

	public function get_deliverymulitpledual($id,$dat,$tim,$filt)
	{
	    
	    $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id LEFT JOIN address ON deliverycharge.dc_address_id=address.address_id WHERE deliverycharge.dc_order_id = '$id' and dc_time = '$tim' and dc_date = '$dat' ".$filt." GROUP BY deliverycharge.dc_id ORDER BY deliverycharge.dc_date DESC";
		$query = $this->db->query($selqry);
         return $query;   
	}

	public function deliverystatus($id,$dat,$tim,$order_id)
	{
		//$this->db->where('dc_agent_id',$usid);
	    $this->db->where('dc_user_id',$id);
	    $this->db->where('dc_time',$tim);
	    $this->db->where('dc_date',$dat);
	    $data = array( 'dc_status' => '1',
						'dc_delivery_date' => date('Y-m-d'),
						'dc_delivery_time' => date("H:i:s"));  
		$this->db->update('deliverycharge',$data);  
		if($this->db->affected_rows() > 0)
		{
			$data1=array('orders_status'=>3);
			$this->db->where('orders_uniq_id',$order_id);
			$this->db->update('orders',$data1);
			if($this->db->affected_rows() > 0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}   
	}
	
	public function shippedstatus($id,$dat,$tim,$order_id)
	{
		//$this->db->where('dc_agent_id',$usid);
	    $this->db->where('dc_user_id',$id);
	    $this->db->where('dc_time',$tim);
	    $this->db->where('dc_date',$dat);
	    $data = array( 'order_status' => '1',
	    				'dc_shipped_date' => date('Y-m-d'),
						'dc_shipped_time' => date("H:i:s"));  
		$this->db->update('deliverycharge',$data);  
		if($this->db->affected_rows() > 0)
		{
			$data1=array('orders_status'=>2);
			$this->db->where('orders_uniq_id',$order_id);
			$this->db->update('orders',$data1);
			if($this->db->affected_rows() > 0)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
		}
		else
		{
			return 0;
		}   
	}
	public function get_delivery($userid)
	{
	    
	    $selqry = "SELECT * FROM `deliverycharge` LEFT JOIN cart ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN product ON cart.cart_product_id = product.product_id LEFT JOIN user ON cart.cart_user_id = user.user_id WHERE user.user_id = '$userid' GROUP BY deliverycharge.dc_date,deliverycharge.dc_time ORDER BY deliverycharge.dc_date DESC";
		$query = $this->db->query($selqry);
         return $query->result();   
	}
	// new one end
    function display($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
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


 function delete_user($id)
 {	
	$this->db->where('user_id', $id);
	
	if($count = $this->db->delete('user'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }


 function getthisorderfulldetls($id)
 {
 	$this->db->where('orders_uniq_id',$id);
 	$query = $this->db->get('orders');
 	return $query->row();
 }

 function getuserdtldelvry($userid)
 {
 	$this->db->where('user_id',$userid);
 	$query = $this->db->get('user');
 	return $query->row();
 }


 function cancelorderfull($orderid,$data_dc,$data_orders)
 {
 	$this->db->where('dc_order_id',$orderid);
 	if($this->db->update('deliverycharge',$data_dc))
 	{
 		$this->db->where('orders_uniq_id',$orderid);
 		$query = $this->db->update('orders',$data_orders);
 		return $query;
 	}
 	else
 	{
 		return 0;
 	}
 }


}
?>