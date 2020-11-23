<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = '';
    }

    function get_blog_list()
    {
	 $squery="SELECT * FROM blog_posts";

		$query = $this->db->query($squery);
		return $query->result();
    }


  

}