<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminproducts extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Product_modal');
    	$this->load->model('user_modal');
    	$this->load->library('encryption');
	 }

	 public function index()
	{
	if(isset($_SESSION['adminusertp'])){
		$a = array('content' => 'adminproductmanage_view');
		$this->load->view('admintemplate',$a);
		}else{
			$this->load->view('adminlogin_view');
		}
		
	}

	public function getproduct(){
		 $userid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 	if($userid == 'admin001'){
		 		$a['tabledata'] = $this->Product_modal->displayprodadmin();
		 	}else{
		 		$a['tabledata'] = $this->Product_modal->displaybyproduserid('product',$userid);
		 	} 
		 //	echo $userid;

		 //	print_r( $a['tabledata']);// = $this->Product_modal->display('product');
		 	//die();
		 	$this->load->view('admintables/adminproducttable_view',$a);	
		//$a['tabledata'] = $this->Product_modal->displayprodadmin();
		//$this->load->view('admintables/adminproducttable_view',$a);
	}

}
