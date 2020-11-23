<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Blog extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load the user model
        $this->load->model('api/blog_model', 'blog_model');
        //     $this->load->model('api/m_main','M_main');
    }

    public function index_get()
    {
        $result = $this->blog_model->get_blog_list();
        $imgurl = base_url().'uploads/blog';

        $this->response([
            'data' => $result,
            'image_url' => $imgurl
        ], REST_Controller::HTTP_OK);
    }
}
