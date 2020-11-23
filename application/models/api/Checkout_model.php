<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
    }

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

}