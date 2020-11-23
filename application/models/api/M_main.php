<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		return $this->db->get_where('user',$q);
	}

	function get_user_id($q) {
		return $this->db->get_where('user',$q);
	}

	
}