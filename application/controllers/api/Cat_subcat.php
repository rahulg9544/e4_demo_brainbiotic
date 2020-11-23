<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';

class Cat_subcat extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('api/catsubcat_model','catsubcat_model');
    }

	public function index_get()
	{
	    
        $result=$this->catsubcat_model->get_categories();

        $imgurl = base_url().'uploads/category';

        // print_r($result);
        // exit;

        $this->response([
            'data' => $result,
            'cat_image_url'=> $imgurl
        ], REST_Controller::HTTP_OK);

    }

    public function product_post()
	{
	    $catid = $this->input->post('cid');
        $subcatid = $this->input->post('sid');
        $imgurl = base_url().'uploads';

        if($catid!="" && $subcatid ==""){

            $getsubprods = $this->catsubcat_model->getcatprods($catid);

            $this->response([
                    'data' => $getsubprods,
                    'image_url' => $imgurl
                ], REST_Controller::HTTP_OK);
        }
        else if($catid=="" && $subcatid !=""){

            $getsubprods = $this->catsubcat_model->getsubcatprods($subcatid);

            $this->response([
                    'data' => $getsubprods,
                    'image_url' => $imgurl
                ], REST_Controller::HTTP_OK);
        }

        else if($catid!="" && $subcatid !=""){

            $getcatsubprods = $this->catsubcat_model->getcatsubcatprods($catid,$subcatid);

            $this->response([
                    'data' => $getcatsubprods,
                    'image_url' => $imgurl
                ], REST_Controller::HTTP_OK);
        }
        else {

            $this->response([
                'message' => 'No category or subcategory id',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        

    }




}