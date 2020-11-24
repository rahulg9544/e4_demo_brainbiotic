<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_faq extends CI_Controller {

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
    
    	$this->load->model('Admin_faq_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    
        	$a = array('content' => 'admin_faq_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }

    public function updatetcinfo()
    {
    	$termsid=$this->input->post('tuid');

    	$data1=array(
         'faq_title1'=>$this->input->post('tutitle1'), 
         'faq_title1_ar'=>$this->input->post('tutitle1_arab'),        
         'faq_title2'=>$this->input->post('tutitle2'), 
         'faq_title2'=>$this->input->post('tutitle2_arab'), 
         'faq_content1'=>$this->input->post('tucontent1'), 
         'faq_content1_ar'=>$this->input->post('tucontent1_arab'),
         'faq_content2'=>$this->input->post('tucontent2'),
         'faq_content2_ar'=>$this->input->post('tucontent2_arab'),
         'faq_date'=>date('Y-m-d')
    	);

    	if($termsid!='')
    	{
    		$res321=$this->Admin_faq_model->updatetermsinf($data1,$termsid);
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


    public function editaboutinfo()
    {
    	$abtid=$this->input->post('id');

    	$res=$this->Admin_faq_model->getconinf_edit($abtid);
    	echo json_encode($res);
    }

    public function get_aboutinf()
    {
    	$a['tabledata'] = $this->Admin_faq_model->display_about();
		 	$this->load->view('admintables/adminfaqtable_view',$a);
    }
}    