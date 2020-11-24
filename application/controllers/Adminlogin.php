<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
    	parent::__construct();
    	$this->load->model('display_modal');
    	$this->load->model('User_modal');
    	$this->load->library('encryption');
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		

		if(!isset($_SESSION['adminuser'])){
			$this->load->view('adminlogin_view');
		}else{
			
			$data = array(
					'content' =>'adminhome_view'
			);
			        	$data['allusers'] = $this->display_modal->countusers();
        	$data['countorders'] = $this->display_modal->countordersforadmin();
        	$data['countdelivered'] = $this->display_modal->countdeliveredforadmin();
        	$data['countmonthlydelivered'] = $this->display_modal->countmonthlydeliveredforadmin();
        	$data['countmonthlyordered'] = $this->display_modal->countmonthlyorderedforadmin();
        	$data['countproducts'] = $this->display_modal->countprodforadmin();
        	$data['countproductsapprove'] = $this->display_modal->countprodforadminapproved();
        	$data['subtotalofsales'] = $this->display_modal->sumofsalesforadmin();
        	$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforadmin();
        	$data['countstores'] = $this->display_modal->countdisplay('store');
        	$data['countbanslide'] = $this->display_modal->countbanslide('banner_slider');
        	$data['countbrands'] = $this->display_modal->countdisplay('brand');
        // 	$data['totalcommiss'] = $this->display_modal->admincalcommission();
        	$data['countpromo'] = $this->display_modal->countdisplay('promocode');
        	$data['allstores'] = $this->display_modal->display('store');
        	
        	$data['totalcommission'] = $this->display_modal->counttotalcommission();
        	if($_SESSION['adminusertp'] == 'agent' ){
        		$agentid = $this->encryption->decrypt($_SESSION['adminuserid']);
        		$data['allusers'] = '';
        		$data['countstores'] = '';
        		$data['countbanslide'] = '';
        		$data['countbrands'] = '';
        		$data['totalcommission'] = '';
        		$data['countorders'] = $this->display_modal->countordersbyagent($agentid);
        		$data['countdelivered'] = $this->display_modal->countdeliveredbyagent($agentid);
        		$data['countmonthlydelivered'] = $this->display_modal->countmonthlydeliveredbyagent($agentid);
        		$data['countmonthlyordered'] = $this->display_modal->countmonthlyorderedbyagent($agentid);
        		$data['countproducts'] = $this->display_modal->countprodagentid($agentid);
        		$data['countproductsapprove'] = $this->display_modal->countprodapproved($agentid);
        		$data['subtotalofsales'] = $this->display_modal->sumofsalesforagent($agentid);
        		$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforagent($agentid);
        		$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforagent($agentid);
        		$data['totalcommiss'] = $this->display_modal->agentcalcommission($agentid);
        		$data['allstores'] = $this->display_modal->display('store');
        	}
			$this->load->view('admintemplate',$data);
		}

	}

	public function checkadminlogin()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');//
		$this->load->model('User_modal');   
		$reslog = $this->User_modal->logincheck($username);
		if($username == 'admin@dentaklik.com' && $password == 'admin'){
			$adminlogindata = array(
     			'admindisplay' => 'super admin',
		        'adminuser'  => $username,
		        'adminuserid' => $this->encryption->encrypt('admin001'),
		        'adminusertp' => 'admin',
		        'adminlogged_in' => TRUE,
		        'vendor_id' => 0
			);
			$this->session->set_userdata($adminlogindata);
			echo "success";
		}else
		if($reslog->num_rows() == 1){
			$res = $reslog->row();
			
     		if(($username == $res->user_name) && ($password == $this->encryption->decrypt($res->user_pwd)) 
     			&& ($res->user_type !== 'user') && ($res->user_status == 1))
     		{

     			//vendor login
     		
     		$adminlogindata = array(
     			'admindisplay' => $res->user_displayname,
		        'adminuser'  => $username,
		        'adminuserid' => $this->encryption->encrypt($res->user_id),
		        'adminusertp' => $res->user_type,
		        'adminlogged_in' => TRUE,
		        'vendor_id' => $res->user_id
			);
			$this->session->set_userdata($adminlogindata);
			echo "success";
				
			}

			else
			{
				//waiting for approval for vendor


				if( ($username == $res->user_name) 
     			&& ($password == $this->encryption->decrypt($res->user_pwd)) 
     			&& ($res->user_type !== 'user') && ($res->user_status == 0)){
					echo 'waiting';
				}else{

					echo 'failed';
				}
			}
		}
			
		else{

			echo 'failed';
		}				
	}
	public function signup(){
		$this->load->view('adminsignup_view');
	}

	// public function adminlogin(){
	// 	$this->load->view('adminsignup_view');
	// }

	public function adminlogout()
	{

	if($_SESSION['adminusertp'] == "agent")
		{
			unset(
			$_SESSION['id'],
			$_SESSION['type'],
			$_SESSION['username'],
			$_SESSION['validate'],	
	        $_SESSION['adminuser'],
	        $_SESSION['admindisplay'],
	        $_SESSION['adminusertp'],
	        $_SESSION['access'],
	        $_SESSION['adminlogged_in']);
	        redirect('index.php/admin_login');

		}
		else
		{
			unset(
			$_SESSION['id'],
			$_SESSION['type'],
			$_SESSION['username'],
			$_SESSION['validate'],	
	        $_SESSION['adminuser'],
	        $_SESSION['admindisplay'],
	        $_SESSION['adminusertp'],
	        $_SESSION['access'],
	        $_SESSION['adminlogged_in']);
			redirect('index.php/admin_login');
		}	
			
			
	}
	

}