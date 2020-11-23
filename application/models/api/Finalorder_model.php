<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
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

function getcoupondetals($couponcode)
{
    $tday=date('Y-m-d');

	$squery= "SELECT * FROM promocode WHERE promo_code='$couponcode' AND promo_status = 1 AND promo_expiry>='$tday'";
	$query = $this->db->query($squery);

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

function getuserdetails_check($userid)
{
	$this->db->where('user_id',$userid);
	$query = $this->db->get('user');
	return $query->row();
}

}