<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Events extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('api/event_model','event_model');
   //     $this->load->model('api/m_main','M_main');
    }

	public function index_get()
	{
	    
		 $result=$this->event_model->get_event_list();
        
        $this->response([
            'data' => $result
        ], REST_Controller::HTTP_OK);


    }


}