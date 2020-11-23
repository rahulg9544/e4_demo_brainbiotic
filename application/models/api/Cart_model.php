<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
    }
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

function changecartqty($data,$crtid,$userid)
{
	$this->db->where('cart_id',$crtid);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->update('cart',$data);
    return $query;
}

function getcartitems($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";

	// echo $this->db->last_query();

	// exit;
	$query= $this->db->query($squery);
	return $query->result();
} 

function removecartitem($crtid,$userid)
{
	$this->db->where('cart_id',$crtid);
	$this->db->where('cart_user_id',$userid);
	$this->db->where('cart_ordr_status',0);
	$query = $this->db->delete('cart');
    return $query;
}

function clearcart($userid)
{
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

//single product page

//checkout

function getcartitemsforcheck($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);

	// echo $this->db->last_query();
	// exit;
	return $query;
}

function getcartitemforcheckconfirm($userid)
{
	$squery="SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
	$query= $this->db->query($squery);
	return $query->result();
}

function getuseraddrscheck($userid)
{
	
	$squery="SELECT * FROM addressprofile LEFT JOIN user ON user.user_id=addressprofile.addressprofile_userid WHERE addressprofile_userid = '$userid'";
	$query= $this->db->query($squery);

	// echo $this->db->last_query();
	// exit;

	return $query->result();
}


}
