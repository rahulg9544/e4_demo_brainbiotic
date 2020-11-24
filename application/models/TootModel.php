<?php 
class TootModel extends CI_Model 
{
   
   // homepage
	function getslides()
	{    
		$this->db->order_by('banner_id','ASC');
		$query= $this->db->get('banner');
		return $query->result();
	}

	function getnewprodshome()
	{
        $sevenday = date('Y-m-d', strtotime('-10 days'));

		// $squery="SELECT * FROM product WHERE product_priority=0 ORDER BY product_date DESC LIMIT 15";
        
        $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 ORDER BY product_date DESC LIMIT 15";

		$query = $this->db->query($squery);
		return $query->result();
	}
	
	function get_all_products()
	{
        $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand";

		$query = $this->db->query($squery);
		return $query->result();
	}
	
	function gettopselprods()
	  {
	  	$squery = "SELECT * FROM product WHERE product_iconic = 1 LIMIT 15";

	  	$query = $this->db->query($squery);
	  	return $query->result();
	  }
 


  // homepage

  //common
  
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
	
	 public function get_offers()
	{
		$selqry = 'SELECT * FROM offers LEFT JOIN subcategory ON offers.offers_sub_cat_id = subcategory.subcategory_id LEFT JOIN category ON subcategory.subcategory_category = category.category_id';
		$query = $this->db->query($selqry);  
		return $query->result(); 
	}


	// public function get_sub_category($id)
	// {
	//     $selquery = "SELECT * FROM subcategory WHERE subcategory_category = '$id'";  
	// 	$query = $this->db->query($selquery);  
 //        return $query->result();   
	// }

	public function get_sub_categories($category_id)
	{
	    $this->db->where('subcategory_category', $category_id);
	    $query = $this->db->get('subcategory');
	    return $query->result();
	}

  //common	

  //userlogin_and_reg	

	function getsameusercount($umailid)
	{
      $squery="SELECT count(*) as sameucount FROM user WHERE user_mail = '$umailid'";
      $query1 = $this->db->query($squery);
      $query=$query1->row();
      return $query->sameucount;
	}

	function insertuser($data)
	{
		$query = $this->db->insert('user',$data);
		return $query;
	}

	function getuserdetails($username)
	{
		$this->db->where('user_mail',$username);
		$query = $this->db->get('user');
		return $query;
	}

//userlogin_and_reg
//myaccount	

	function getsamemail($mailid)
	{
		$this->db->where('user_mail',$mailid);
		$query = $this->db->get('user');
		return $query;
	}


	function getuserdailspas($userid)
	{
		$this->db->where('user_id',$userid);
		$query = $this->db->get('user');
		return $query->row();
	}

	function getuserdtls($userid)
	{
		$this->db->where('user_id',$userid);
		$query = $this->db->get('user');
		return $query->row();
	}

	function updateuserinfo($userid,$data)
	{
      $this->db->where('user_id',$userid);
		$query = $this->db->update('user',$data);
		return $query;
	}

	function getadrsdetlsedit($userid,$adrs_id)
	{
		$this->db->where('addressprofile_id',$adrs_id);
		$this->db->where('addressprofile_userid',$userid);
		$query = $this->db->get('addressprofile');
		
           return $query->row();
		
	}

	function getadrscountedit($userid)
	{
		$squery="SELECT count(*) as adrscount FROM addressprofile WHERE addressprofile_userid='$userid'";
		$query = $this->db->query($squery);
		return $query->row();
	}

	function insertadrs($data)
	{
		$query = $this->db->insert('addressprofile',$data);
		return $query;
	}

	function updateadrs($data,$userid,$adrid)
	{
		$this->db->where('addressprofile_userid',$userid);
		$this->db->where('addressprofile_id',$adrid);
		$query = $this->db->update('addressprofile',$data);
		return $query;
	}

	function deleteaddress($adrid,$userid)
	{
		$this->db->where('addressprofile_userid',$userid);
		$this->db->where('addressprofile_id',$adrid);
		$query = $this->db->delete('addressprofile');
		return $query;
	}

	function getadressusershow($userid)
	{
		$this->db->where('addressprofile_userid',$userid);
		$query = $this->db->get('addressprofile');
		// if($query->num_rows()==1)
		// {
  //          return $query->row();
		// }
		// else
		// {
		// 	return $query1=array();
		// }

		return $query->result();
	}

	function insertnewaddress($data)
	{
		$query = $this->db->insert('addressprofile',$data);
		return $query;
	}

//myaccount

//wishlist

function getsameprodwishcount($prodid,$userid)
{
	$this->db->where('wishlist_prod_id',$prodid);
	$this->db->where('wishlist_user_id',$userid);
	$query = $this->db->get('wishlist');
	return $query->num_rows();
}

function insertwishlist($data)
{
	$query = $this->db->insert('wishlist',$data);
	return $query;
}

function getwishcount($userid)
{
	$this->db->where('wishlist_user_id',$userid);
	$query = $this->db->get('wishlist');
	return $query->num_rows();
}

function getwishlistitems($userid)
{
	$squery="SELECT * FROM product LEFT JOIN wishlist ON product.product_id=wishlist.wishlist_prod_id WHERE wishlist.wishlist_user_id='$userid' ORDER BY wishlist_date DESC";
	$query = $this->db->query($squery);
	return $query->result();
}


function removewishitem($userid,$wishid)
{
	$this->db->where('wishlist_user_id',$userid);
	$this->db->where('wishlist_id',$wishid);
	$query = $this->db->delete('wishlist');
	return $query;
}

//wishlist	
//productspage

function getsubcatprods($subcatid)
{
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query;
}

function getsubdetials($subid)
{
	$this->db->where('subcategory_id',$subid);
	$query = $this->db->get('subcategory');
	return $query->row();
}

// function getsub_divisions($subid)
// {
// 	$this->db->where('division_subcat',$subid);
// 	$query = $this->db->get('division');
// 	return $query->result();
// }

//productspage

//product offer page


function get_offer_products($subcatid,$discount_start,$discount_end)
{
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$discount_start' AND product_discount <= '$discount_end'  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query;
}

function get_all_offer_products()
{
	$squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
	$query = $this->db->query($squery);
	return $query;
}
//product offer page

// function getsubdetials($subid)
// {
// 	$this->db->where('subcategory_id',$subid);
// 	$query = $this->db->get('subcategory');
// 	return $query->row();
// }

function getsub_divisions($subid)
{
	$this->db->where('division_subcat',$subid);
	$query = $this->db->get('division');
	return $query->result();
}

//productspage

//divisionprods

function getdivcatprods($divsid)
{
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$divsid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query;
}


function getdivsubdetils($divsid)
{
	$squery="SELECT * FROM division LEFT JOIN subcategory ON division_subcat=subcategory_id WHERE division_id='$divsid'";
	$query = $this->db->query($squery);
	return $query->row();
}

//divisionprods


//new productspage

function getnewcatprods()
{
    // $twentyday = date('Y-m-d', strtotime('-7 days'));

	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query;
}


//new productspage
//cart

function getsameprodcart($prodid,$selcolor,$selesize,$userid)
{
	$this->db->where('cart_product_id',$prodid);
	$this->db->where('cart_color',$selcolor);
	$this->db->where('cart_size',$selesize);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->get('cart');
    return $query;
}

function insertcart($data)
{
	$query = $this->db->insert('cart',$data);
	return $query;
}

function updatecart($data,$prodid,$selcolor,$selesize,$userid)
{
	$this->db->where('cart_product_id',$prodid);
	$this->db->where('cart_color',$selcolor);
	$this->db->where('cart_size',$selesize);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->update('cart',$data);
    return $query;
}


function getcartitems($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);
	return $query;
} 


function changecartqty($data,$crtid,$userid)
{
	$this->db->where('cart_id',$crtid);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->update('cart',$data);
    return $query;
}

function removecartitem($crtid,$userid)
{
	$this->db->where('cart_id',$crtid);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->delete('cart');
    return $query;
}

function getcartcout($userid)
{
	
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->get('cart');

	return $query->num_rows();
}


function getmincartcart($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);
	return $query->result();
}


function getcoupondetals($couponcode)
{
    $tday=date('Y-m-d');

	$squery= "SELECT * FROM promocode WHERE promo_code='$couponcode' AND promo_status = 1 AND promo_expiry>='$tday'";
	$query = $this->db->query($squery);

	return $query;
}

function getprocodeapplycount($userid,$couponcode)
{
	$this->db->where('orders_promocode',$couponcode);
	$this->db->where('orders_user_id',$userid);
	$query = $this->db->get('orders');
	return $query->num_rows();
}

//cart

//single product page

function getsingleprod($pid)
{
	 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_id='$pid'";

		$query = $this->db->query($squery);
		return $query->row();
}

function getprodsubdetils_single($prod_sub)
{
    $this->db->where('subcategory_id',$prod_sub);
    $query = $this->db->get('subcategory');
    return $query->row();
}

//single product page

//checkout

function getcartitemsforcheck($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);
	return $query;
}

function getuseraddrscheck($userid)
{
	
	$squery="SELECT * FROM addressprofile LEFT JOIN user ON addressprofile_userid=user_id WHERE addressprofile_userid = '$userid'";
	$query= $this->db->query($squery);
	return $query;
}

function insertdeladrsnmob($userid,$adrsary)
{
	if($this->db->insert('addressprofile',$adrsary))
	{
       // $this->db->where('user_id',$userid);
       // $query = $this->db->update('user',$umobary);

       return 1;
	}
	else
	{
		return 2;
	}
}


function getuseradrsregcheck($userid)
{
	$squery="SELECT * FROM addressprofile LEFT JOIN user ON addressprofile_userid=user_id WHERE addressprofile_userid = '$userid' ORDER BY addressprofile_id DESC LIMIT 1";
	$query= $this->db->query($squery);

	if($query->num_rows()==1)
	{
		return $query->row();
	}
	else
	{
		$query=array();
	}
}


function getcartitemforcheckconfirm($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);
	return $query->result();
}


function insertcheck($data_check,$cartid)
{
	if($this->db->insert('deliverycharge',$data_check))
	{

      $cartstat=array('cart_ordr_status'=>1);

      $this->db->where('cart_id',$cartid);
      $query = $this->db->update('cart',$cartstat);

      return $query;
	}
	else
	{
		return 0;
	}
}

function insertorder($data_oder)
{
	$query = $this->db->insert('orders',$data_oder);
	return $query;
}


function getordergenraldtlscheck($userid,$unq_ordrid)
{
	$this->db->where('orders_uniq_id',$unq_ordrid);
	$this->db->where('orders_user_id',$userid);
	$query = $this->db->get('orders');

	if($query->num_rows()==1)
	{
		return $query->row();
	}
	else
	{
		return $query1=array();
	}
}

function getorderinvoicedtlscheck($userid,$unq_ordrid)
{
	$this->db->where('dc_user_id',$userid);
	$this->db->where('dc_order_id',$unq_ordrid);
	$this->db->where('dc_cancel_order',0);
	$query = $this->db->get('deliverycharge');
	

	return $query->result();
}

function getorderadrs($adrsid)
{
	$this->db->where('addressprofile_id',$adrsid);	
	$query = $this->db->get('addressprofile');

	return $query->row();
}


function getuserdetails_check($userid)
{
	$this->db->where('user_id',$userid);
	$query = $this->db->get('user');
	return $query->row();
}


function changeuseridcartwish($userid_guest,$userlogid)
{
    $wisharry=array('wishlist_user_id'=>$userlogid);
    $cartarry=array('cart_user_id'=>$userlogid);
    
    $this->db->where('wishlist_user_id',$userid_guest);
    if($this->db->update('wishlist',$wisharry))
    {
        $this->db->where('cart_user_id',$userid_guest);
        $query=$this->db->update('cart',$cartarry);
        return $query;
    }
    else
    {
        return 0;
    }
}

function insertusercheck($userdetailsarray)
{
      $this->db->insert('user', $userdetailsarray);
   
       $insert_id = $this->db->insert_id();
    
       return  $insert_id;
  
}

function insertadrscheck($deladrsarry)
{
    $query=$this->db->insert('addressprofile',$deladrsarry);
    return $query;
}

function getthisusercheck($res)
{
    $this->db->where('user_id',$res);
    $query = $this->db->get('user');
    return $query->row();
}

function deleteinvldusercheck($res)
{
    $this->db->where('user_id',$res);
    if($this->db->delete('user'))
    {
        $this->db->where('addressprofile_userid',$res);
        $query= $this->db->delete('addressprofile');
        return $query;
    }
    else
    {
        return 0;
    }
}


//checkout
//orders

function getorders($userid)
{
	$this->db->where('orders_user_id',$userid);
	$query = $this->db->get('orders');
	return $query;
}


function getordergeneraldetals($orderid,$userid)
{
	$this->db->where('orders_uniq_id',$orderid);
	$this->db->where('orders_user_id',$userid);
	$query = $this->db->get('orders');
	return $query->row();
}

function getproductdtails($orderid,$userid)
{
// 	$this->db->where('dc_order_id',$orderid);
// 	$this->db->where('dc_user_id',$userid);
// 	$query = $this->db->get('deliverycharge');
// 	return $query->result();

  $squery = "SELECT * FROM deliverycharge LEFT JOIN product ON dc_prod_id = product_id WHERE dc_order_id = '$orderid' AND dc_user_id= '$userid'";
	$query = $this->db->query($squery);
	return $query->result();
}

function getaddressdtls($userid)
{
	
	$this->db->where('addressprofile_userid',$userid);
	$query = $this->db->get('addressprofile');
	return $query->row();
}

function cancelorder($orderid,$userid)
{
	$odrsarry=array('orders_cancel_status'=>1);

	$dc_arry=array('dc_cancel_order'=>1);


	$this->db->where('dc_order_id',$orderid);
	$this->db->where('dc_user_id',$userid);
	if($this->db->update('deliverycharge',$dc_arry))
	{
        $this->db->where('orders_uniq_id',$orderid);
	    $this->db->where('orders_user_id',$userid);
	    $query = $this->db->update('orders',$odrsarry);
	    return $query;
	}
	else
	{
		return 0;
	}

}


function getuserinfocancel($userid)
{
	$this->db->where('user_id',$userid);
	$query = $this->db->get('user');
	return $query->row();
}

//orders  


//search

function getsearchprds($searchkey)
{
   $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND (product_name LIKE '%$searchkey%' OR product_desc LIKE '%$searchkey%' OR subcategory_name LIKE '%$searchkey%' OR brand_name LIKE '%$searchkey%') ORDER BY product_date DESC LIMIT 30";
		$query = $this->db->query($squery);
		return $query;
}

//search
//prodcts sorting

function getpricenamesortprods_sub($subid,$sortkey)
{
	if($sortkey=='price_asc')
	{
		 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_sell_price ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='price_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_sell_price DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_asc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_name ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_name DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	else
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id= product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_date DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}

}

function getsizenosheo_sortprods_sub($subid,$sortkey)
{
	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' AND product_shoesizeno LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
}

function getsizeno_sortprods_sub($subid,$sortkey)
{
	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' AND product_sizeno LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
}


function getsizeltr_sortprods_sub($subid,$sortkey)
{

   if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subid' AND product_sizeletter LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}	
}

//products sorting

//product division sorting

function getpricenamesortprods_div($subid,$sortkey)
{
	if($sortkey=='price_asc')
	{
		 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_sell_price ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='price_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_sell_price DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_asc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_name ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_name DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	else
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id= product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_date DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}

}

function getsizenosheo_sortprods_div($subid,$sortkey)
{
	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' AND product_shoesizeno LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
}

function getsizeno_sortprods_div($subid,$sortkey)
{
	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' AND product_sizeno LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
}


function getsizeltr_sortprods_div($subid,$sortkey)
{

   if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_division = '$subid' AND product_sizeletter LIKE '%$sortkey%' ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}	
}

//product division sorting

//product new sorting

function getpricenamesortprods_new($sortkey)
{
	$sevenday = date('Y-m-d', strtotime('-10 days'));

	if($sortkey=='price_asc')
	{
		 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_sell_price ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='price_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_sell_price DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_asc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_name ASC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_desc')
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_name DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}
	else
	{
		$squery="SELECT * FROM product LEFT JOIN category ON category_id= product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_date DESC ";
		$query = $this->db->query($squery);
		return $query->result();
	}

}

function getsizenosheo_sortprods_new($sortkey)
{
   
   $sevenday = date('Y-m-d', strtotime('-10 days'));

	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' AND product_shoesizeno LIKE '%$sortkey%' ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query->result();
	}
}

function getsizeno_sortprods_new($sortkey)
{
  
  $sevenday = date('Y-m-d', strtotime('-10 days'));

	 if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' AND product_sizeno LIKE '%$sortkey%' ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query->result();
	}
}


function getsizeltr_sortprods_new($sortkey)
{

  $sevenday = date('Y-m-d', strtotime('-10 days'));	

   if($sortkey=='')
   {
      $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' ORDER BY product_date DESC LIMIT 20";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_date > '$sevenday' AND product_sizeletter LIKE '%$sortkey%' ORDER BY product_date LIMIT 20 ";
		$query = $this->db->query($squery);
		return $query->result();
	}	
}

//product new sorting


//product ofr sorting

function getpricenamesortprods_ofr($sortkey)
{
	$sevenday = date('Y-m-d', strtotime('-10 days'));

	if($sortkey=='price_asc')
	{
// 		 $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend'  ORDER BY product_sell_price ASC";
    
    $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage ORDER BY product_sell_price ASC";
    
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='price_desc')
	{
// 		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend'  ORDER BY product_sell_price DESC";
    
     $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage ORDER BY product_sell_price DESC";
    
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_asc')
	{
// 		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend'  ORDER BY product_name ASC";

    $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage ORDER BY product_name ASC";
    
		$query = $this->db->query($squery);
		return $query->result();
	}
	elseif($sortkey=='name_desc')
	{
// 		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend'  ORDER BY product_name DESC";

    $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage ORDER BY product_name DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
	else
	{
// 		$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend'  ORDER BY product_date DESC";

    $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}

}

function getsizenosheo_sortprods_ofr($sortkey)
{
   
   

	 if($sortkey=='')
   {
    //   $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' ORDER BY product_date DESC";
    
    $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
    
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
// 	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' product_shoesizeno LIKE '%$sortkey%' ORDER BY product_date DESC";

  $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_shoesizeno LIKE '%$sortkey%' AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
  
		$query = $this->db->query($squery);
		return $query->result();
	}
}

function getsizeno_sortprods_ofr($sortkey)
{
  
  

	 if($sortkey=='')
   {
    //   $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' ORDER BY product_date DESC";
    
     $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
// 	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' AND product_sizeno LIKE '%$sortkey%' ORDER BY product_date DESC";

     $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_sizeno LIKE '%$sortkey%' AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}
}


function getsizeltr_sortprods_ofr($sortkey)
{

  

   if($sortkey=='')
   {
    //   $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' ORDER BY product_date DESC";
    
     $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
   }
   else
   {
// 	$squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_discount >= '$dstart' AND product_discount <= '$dend' AND product_sizeletter LIKE '%$sortkey%' ORDER BY product_date DESC";

 $squery="SELECT * FROM offers LEFT JOIN  product ON offers.offers_sub_cat_id = product.product_subcategory LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_discount >= offers_start_percetage AND product_sizeletter LIKE '%$sortkey%' AND product_discount <= offers_end_percentage  ORDER BY product_date DESC";
		$query = $this->db->query($squery);
		return $query->result();
	}	
}

//product ofer sorting



//contactpage

function getcontactinf()
{
	$squery="SELECT * FROM contact LIMIT 1";
	$query = $this->db->query($squery);
	return $query->row();
}

//contactpage

//aboutpage

function getaboutcont()
{
    $squery="SELECT * FROM about LIMIT 1";
	$query = $this->db->query($squery);
	return $query->row();	
}

//aboutpage

//offer text

function getoffertext()
{
	$query = $this->db->get('offertext');

	return $query->row();
}

//offer text

//city list
function getcity()
{
	$query = $this->db->get('city');

	return $query->result();
}

//city list

//news subscription

function getmailcount_subscrp($mailid)
{
	$this->db->where('newssub_mail',$mailid);
	$query = $this->db->get('newssub');
	return $query->num_rows();
}

function insert_subscription($data)
{
	$query = $this->db->insert('newssub',$data);
	return $query;
}

//news subscription

//delivery charge

function delivery_address($adrid)
{
	$this->db->where('addressprofile_id',$adrid);
	$query = $this->db->get('addressprofile');

	return $query->row();
}


function delivery_city($delivery_city)
{
	$this->db->where('city_name',$delivery_city);
	$query = $this->db->get('city');

	return $query->row();
}

//delivery charge

//insert payment record

 function insert_payment($data1)
 {
 	$query = $this->db->insert('payment',$data1);

 	return $query;
 }

 //user details

function user_info($userid)
{
	$this->db->where('user_id',$userid);
	$query = $this->db->get('user');
	return $query->row();
}

//forgotpassword

function getformaildetails($mailid)
{
  $this->db->where('user_mail',$mailid);
  $query = $this->db->get('user');
  return $query;
}

function insertforgtkey($data,$mailid)
{
	$this->db->where('user_mail',$mailid);
  $query = $this->db->update('user',$data);
  return $query;
}

function getmaildetails_rest($resmail)
{
	$this->db->where('user_mail',$resmail);
  $query = $this->db->get('user');
  return $query->row();
}

function updatepass_frg($data1,$resmail)
{
	$this->db->where('user_mail',$resmail);
  $query = $this->db->update('user',$data1);
  return $query;
}

//forgotpassword

// usepage

function gepagetext_use()
{
	$query = $this->db->get('termuse');
	return $query->row();
}

// usepage

// salepage	

function gepagetext_sale()
{
	$query = $this->db->get('termsale');
	return $query->row();
}

// salepage

//passwordchange

function updatepasswod($data,$userid)
{
	$this->db->where('user_id',$userid);
	$query = $this->db->update('user',$data);
	return $query;
}

//passwordchange

//checkout address listing

function getuseradress_check($userid)
{
	$this->db->where('addressprofile_userid',$userid);
	$this->db->order_by('addressprofile_id','DESC');
	$query = $this->db->get('addressprofile');
	return $query->result();
}


function showproperadrs_check($adrid)
{
	$this->db->where('addressprofile_id',$adrid);	
	$query = $this->db->get('addressprofile');
	return $query->row();
}

//checkout address listing

// checkout delivery chage set

function getareadelcharge($area)
{
    $this->db->where('city_name',$area);
    $query = $this->db->get('city');
    return $query->row();
}


}