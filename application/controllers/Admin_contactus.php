<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contactus extends CI_Controller {

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
    
    	$this->load->model('Admin_contactus_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    	
        	$a = array('content' => 'admin_contactus_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }

    public function updatecontact()
    {
    	$contid=$this->input->post('contid');


    	$data1=array(
         
         'contact_address'=>$this->input->post('contaddress'),
         'contact_phon'=>$this->input->post('contphon'),
         'contact_mail'=>$this->input->post('contmail'),
         
         'contact_date'=>date('Y-m-d')
    	);

    	if($contid!='')
    	{
    		$res321=$this->Admin_contactus_model->updatecontinfo($data1,$contid);
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


    public function editcontactinfo()
    {
    	$contid=$this->input->post('id');

    	$res=$this->Admin_contactus_model->getconinf_edit($contid);
    	echo json_encode($res);
    }

    public function get_continfo()
    {
    	$a['tabledata'] = $this->Admin_contactus_model->display_continf();
		 	$this->load->view('admintables/admincontacttable_view',$a);
    }
}    