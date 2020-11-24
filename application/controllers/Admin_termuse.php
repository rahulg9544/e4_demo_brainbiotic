<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_termuse extends CI_Controller {

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
    
    	$this->load->model('Admin_termuse_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    
        	$a = array('content' => 'admin_termuse_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }

    public function updatetcinfo()
    {
    	$termsid=$this->input->post('tuid');

    	$data1=array(
         'termuse_content'=>$this->input->post('tucontent'),
         'termuse_content_arab'=>$this->input->post('tucontent_arab'),        
         'termuse_date'=>date('Y-m-d')
    	);

    	if($termsid!='')
    	{
    		$res321=$this->Admin_termuse_model->updatetermsinf($data1,$termsid);
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

    	$res=$this->Admin_termuse_model->getconinf_edit($abtid);
    	echo json_encode($res);
    }

    public function get_aboutinf()
    {
    	$a['tabledata'] = $this->Admin_termuse_model->display_about();
		 	$this->load->view('admintables/admintermusetable_view',$a);
    }
}    