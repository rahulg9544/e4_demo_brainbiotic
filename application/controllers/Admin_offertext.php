<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_offertext extends CI_Controller {

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
    
    	$this->load->model('Admin_offertext_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    
        	$a = array('content' => 'admin_offertext_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }

    public function updateofrtext()
    {
    	$offertest_id=$this->input->post('offertext_id');


    	$data1=array(
         'offertext_text'=>$this->input->post('offertext'),
         'offertext_text_arabic'=>$this->input->post('offertextar'),
         'offertext_date'=>date('Y-m-d')
    	);

    	if($offertest_id!='')
    	{
    		$res321=$this->Admin_offertext_model->updatoffertext($data1,$offertest_id);
    		if($res321==1)
    		{
    			echo "success";
    		}
    		else
    		{
    			echo "failed";
    		}	
    	}
    }


    public function editoffertext()
    {
    	$offertest_id=$this->input->post('id');

    	$res=$this->Admin_offertext_model->getoffertext_edit($offertest_id);
    	echo json_encode($res);
    }

    public function get_offertext()
    {
    	$a['tabledata'] = $this->Admin_offertext_model->display_offertext();
		 	$this->load->view('admintables/adminoffertexttable_view',$a);
    }
}    