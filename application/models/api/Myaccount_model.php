<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		// Load the database library
		$this->load->database();

		$this->userTbl = '';
	}

	function getadrscountedit($userid)
	{
		$squery = "SELECT count(*) as adrscount FROM addressprofile WHERE addressprofile_userid='$userid'";
		$query = $this->db->query($squery);
		return $query->row();
	}

	function insertadrs($data)
	{
		$query = $this->db->insert('addressprofile', $data);
		return $query;
	}

	function updateadrs($data, $adrid)
	{
		$this->db->where('addressprofile_id ', $adrid);
		$query = $this->db->update('addressprofile', $data);
		return $query;
	}

	function getorders($userid)
	{
		$this->db->where('orders_user_id', $userid);
		$query = $this->db->get('orders');
		return $query->result_array();
	}

	function getordergeneraldetals($orderid, $userid)
	{
		$this->db->where('orders_uniq_id', $orderid);
		$this->db->where('orders_user_id', $userid);
		$query = $this->db->get('orders');
		return $query->row();
	}
	function getproductdtails($orderid, $userid)
	{

		$squery = "SELECT * FROM deliverycharge LEFT JOIN product ON dc_prod_id = product_id WHERE dc_order_id = '$orderid' AND dc_user_id= '$userid'";
		$query = $this->db->query($squery);
		return $query->result();
	}
	function getaddressdtls($userid)
	{
		$this->db->where('addressprofile_userid', $userid);
		$query = $this->db->get('addressprofile');
		return $query->row();
	}
	function updateuserinfo($userid, $data)
	{
		$this->db->where('user_id', $userid);
		$query = $this->db->update('user', $data);
		return $query;
	}

	function getadressusershow($userid)
	{
		$this->db->where('addressprofile_userid', $userid);
		$query = $this->db->get('addressprofile');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return $query->result_array();
		}
	}

	function get_city()
	{
		$query = $this->db->get('city');

		return $query->result_array();
	}
}
