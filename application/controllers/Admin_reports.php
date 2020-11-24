<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_reports extends CI_Controller {

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
    
    	$this->load->model('Admin_reports_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    
        	$a = array('content' => 'admin_salesreport_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }
    

     public function getsalesreport()
     {
     	$a['res'] = $this->Admin_reports_model->getsalesreport();

     	$this->load->view('admintables/admin_salesreporttable_view',$a);
     }

     public function getsalesreport_datewise()
     {
     	$from =$this->input->post('from');
     	$to =$this->input->post('to');

     	$a['res'] = $this->Admin_reports_model->getsalesreport_datewise($from,$to);

     	$this->load->view('admintables/admin_salesreporttable_view',$a);
     }

}    
