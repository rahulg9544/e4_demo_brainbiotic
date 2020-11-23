<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Placeorder_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		// Load the database library
		$this->load->database();

		$this->userTbl = '';
	}

	function get_city($add)
	{
		return $this->db->get_where('addressprofile', $add);
	}

	function get_delivery_charge($city_id)
	{
		$squery = "SELECT delivery_charge FROM city WHERE city_id=$city_id";
		$query = $this->db->query($squery);
		return $query->row();
	}

	function getcartitemsforcheck($userid)
	{
		$squery = "SELECT * FROM cart LEFT JOIN product ON cart_product_id=product_id WHERE cart_user_id = '$userid' AND cart_ordr_status= 0 ";
		$query = $this->db->query($squery);
		return $query->result();
	}

	function insertcheck($data_check, $cartid)
	{
		if ($this->db->insert('deliverycharge', $data_check)) {

			$cartstat = array('cart_ordr_status' => 1);

			$this->db->where('cart_id', $cartid);
			$query = $this->db->update('cart', $cartstat);

			return $query;
		} else {
			return 0;
		}
	}

	function insertorder($data_oder)
	{
		$query = $this->db->insert('orders', $data_oder);
		return $query;
	}

	function getuseraddrscheck($userid)
	{

		$squery = "SELECT * FROM addressprofile LEFT JOIN user ON addressprofile_userid=user_id WHERE addressprofile_userid = '$userid'";
		$query = $this->db->query($squery);
		return $query;
	}
}
