<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
        // Load the database library
        $this->load->database();
        
        $this->userTbl = 'users';
    }

    /*
     * Get rows from the users table
     */
	function getuserdetails($username)
	{
		$this->db->where('user_mail',$username);
		$query = $this->db->get('user');
		return $query;
    }
    
    function getsameusercount($umailid)
	{
      $squery="SELECT count(*) as sameucount FROM user WHERE user_mail = '$umailid'";
      $query1 = $this->db->query($squery);
      $query=$query1->row();
      return $query->sameucount;
    }
    
    function getuserrow($umailid)
	{
      $squery="SELECT * FROM user WHERE user_mail = '$umailid'";
      $query1 = $this->db->query($squery);
      $query=$query1->row();
      return $query;
	}
    
	function insertuser($data)
	{
		$query = $this->db->insert('user',$data);
		return $query;
	}

    function insertuseradrress($data4)
    {
       $query = $this->db->insert('addressprofile',$data4);
       return $query;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){
        //add modified date if not exists
        if(!array_key_exists('modified', $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        //update user data in users table
        $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
        
        //return the status
        return $update?true:false;
    }


    public function update_user($data, $id){
        //add modified date if not exists
        // if(!array_key_exists('modified', $data)){
        //     $data['modified'] = date("Y-m-d H:i:s");
        // }
        
        //update user data in users table
        $update = $this->db->update('user', $data, array('user_mail'=>$id));
        
        //return the status
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete('users',array('id'=>$id));
        //return the status
        return $delete?true:false;
    }

}