<?php 
class User_modal extends CI_Model 
{
	function user_insert($data1)
	{
		
		$count = $this->db->insert('user',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	// function dboy(){
	// 	$selqry = "SELECT * FROM user where user_type = 'agent'";
	// 	$qry = $this->db->query($selqry);
	// 	return $qry->result();

	// }
	function homeaddressinsert($data1)
	{
		
		$count = $this->db->insert('address',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function checkstore($id){
		$selqry = "SELECT * FROM user where user_agent_id = '$id'";
		$qry = $this->db->query($selqry);
		return $qry;

	}
	function checkstoreupd($strid,$strid2)
	{
        
		$selqry = "SELECT * FROM `user` WHERE user_agent_id = '$strid' and user_agent_id != '$strid2'";
		
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query;   
	}
	function user_update($id,$data1)
	{
		$this->db->where ('user_id',$id); 
		if($count = $this->db->update('user',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function passretrieve($username){
		$selqry = "SELECT * FROM `user` WHERE user_name = '$username'";
		$query = $this->db->query($selqry);
		return $query->row();
	}
	function checkexistaddr ($id,$type){
		$selqry = "SELECT * FROM `address` WHERE address_user_id = '$id' AND address_type = '$type'";
		$query = $this->db->query($selqry);
         return $query->num_rows();   
	}
	function getaddress ($id,$type){
		$selqry = "SELECT * FROM `address` WHERE address_user_id = '$id'";
		$query = $this->db->query($selqry);
         return $query->num_rows();   
	}
	function homeaddressupdate($id,$data1,$type)
	{
		$this->db->where ('address_user_id',$id);
		$this->db->where ('address_type',$type); 
		if($count = $this->db->update('address',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function user_checkpassword($usrid){
		$selqry = "SELECT * FROM user  WHERE user_id = '$usrid' ";
		$query  = $this->db->query($selqry);
		return $query->row();
	}
	// function user_checkpassword2($usrid,$pwd){
	// 	$selqry = "SELECT * FROM user  WHERE user_id = '$usrid' AND user_pwd = '$pwd'";
	// 	$query  = $this->db->query('$selqry');
	// 	return $query->;
	// }
	function edituser($id,$table)
	{
		$this->db->where('user_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	function logincheck($username)
	{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$username);

        // $this->db->or_where('phone_number',$username);
        
		$query = $this->db->get();  
         return $query;   
	}
	
	function checkemail($emailid)
	{
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$emailid);

        // $this->db->or_where('phone_number',$username);
        
		$query = $this->db->get();  
         return $query;   
	}
	function checkemailupd($userid,$emailid)
	{
        
		$selqry = "SELECT * FROM `user` WHERE user_name != '$userid' AND user_name = '$emailid'";
		$query = $this->db->query($selqry);
        // $this->db->where('user_name !=',$emailid);
        // $this->db->where('user_name',$userid);
        // // $this->db->or_where('phone_number',$username);
        
		// $query = $this->db->get('user');  
         return $query;   
	}
    function display($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
        return $query->result();   
	}
	function displaybyrow($a,$id)
	{

        $this->load->database();
        $this->db->where('user_id',$id);
		$query = $this->db->get($a);  
        return $query->row();   
	}
	function displaybyagents($usertype)
	{

  if($usertype == 'dboy')
  	$user = 'agent';
 if($usertype == 'customer')
  	$user = 'user';  
		
        
        // $select = "SELECT * FROM user LEFT JOIN store ON user.user_agent_id = store.store_id WHERE user_type = '$user'";
  $select = "SELECT * FROM user LEFT JOIN addressprofile ON user_id=addressprofile_userid";

		$query = $this->db->query($select);  
        return $query->result();   
	}
	function displaybyuserid($userid){
 		// $this->db->where('user_id',$userid);
 		$select = "SELECT * FROM user LEFT JOIN store ON user.user_agent_id = store.store_id LEFT JOIN address ON user.user_id = address.address_user_id  WHERE user.user_id = '$userid'";
		$query = $this->db->query($select);  
        return $query->result();   
 	}

 //    function display_selected_id($a)
	// 					{

	// 				 $this->db->select('*'); 
	// 				 $this->db->from('add_driver');
	// 				 $this->db->where('driver_id',$a);
	// 				 $query = $this->db->get();
	// 				 return $query->result();  
	// 					}

	// function edit_driver($data1,$id)
	// {
	// $this->db->where('driver_id',$id);	
	// $count = $this->db->update('add_driver',$data1);
	// if($count>0)
	// {
	// 	return 1;
	// }
	// else
	// {
	// 	return 0;
	// }
	// }


 function delete_user($id)
 {	
	$this->db->where('user_id', $id);
	
	if($count = $this->db->delete('user'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }

 function verify_user($id,$st)
 {	
	$this->db->where('user_id', $id);
	if($st == 1){
		$data1 = array('user_status' => 0);

		if($count = $this->db->update('user',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}

	else

	{
		$data1 = array('user_status' => 1);

		if($count = $this->db->update('user',$data1))
		{

           $this->db->where('user_id',$id);
           $query=$this->db->get('user');
           
           $userdtls=$query->row(); 

           $frommail ="ansib@e4technosolutions.com";

			        


			$pageaddress = $_SERVER['HTTP_REFERER'];


			        

			        $message = '<html>
			<head>
			  <title>Dentaklik Welcome mail</title>
			</head>
			<body>

			<h2>Dentaklik</h2>

			<p>Congratulation '.$userdtls->user_displayname.' !.. Your Request for Join our Family As a Vendor Has approved.From this moment your company '.$userdtls->user_businessnameame.' will be a part of our family.
			<p>

			<h3><a href="https://awadalmurtajijointkw.com/dentaklik/index.php/Adminlogin">click here to login</a></h3>

			</body>
			';

			    $subject='Registraion code';

			    $headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			$headers .= "From: ". $frommail."\r\n";
			$headers .= "";
			$a=mail($mailid,$subject,$message,$headers,"-f$frommail");


			if($a)
			{
					return true;
			}
			else
			{
				    return true;
			}
			

		}

		else
		{
			return false;
		}
	}
	
	
 }


}
?>