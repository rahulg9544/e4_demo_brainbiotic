<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	function __construct()
   {
     parent::__construct();
     $this->load->model('Admin_login_model');
 }
 public function index()
 {	
 	$this->load->library('session');  
 	 
 	 $result = $this->Admin_login_model->validate_login();
//echo $result;
 	 if(!$result)
 	 { ?>
 	 	
 	 	<?php 
 	 	$a=array('content'=>'adminhome_view');
 	 	$this->load->view('adminlogin_view');
 	 }
 	 else{
 	 	redirect('Admin_login/welcome');
 	 }
 }

 public function welcome(){
 	if(isset($_SESSION['username']))
 	{
//  		$a=array('content'=>'adminhome_view');
//  		$this->load->view('admintemplate',$a);
       
       redirect('Adminhome');
 	}	
 }
 public function logout(){
//  	$this->session->sess_destroy();
 	$this->load->view('adminlogin_view');
 }
}
?>