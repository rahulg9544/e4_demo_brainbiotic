<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
    }

    function get_event_list()
    {
	 $squery="SELECT * FROM events";

		$query = $this->db->query($squery);
		return $query->result();
    }


  

}