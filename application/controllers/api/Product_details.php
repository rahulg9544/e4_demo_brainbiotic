<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';

class Product_details extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load the user model

        $this->load->model('api/product_model', 'product_model');
    }

    public function productdetails_post()
    {

        $pid = $this->input->post('pid');

        $getsingleprod = $this->product_model->getsingleprod($pid);

        // print_r($getsingleprod);
        // exit;

        $imgurl = base_url() . 'uploads';

        $getprodsubdetils_single = array();

        if (!empty($getsingleprod)) {
            $prod_sub = $getsingleprod[0]->product_subcategory;
            $getprodsubdetils_single = $this->product_model->getprodsubdetils_single($prod_sub);
            $get_similiar_products = $this->product_model->get_similiar_products($prod_sub);
        }

        $result = array(
            'singleprod' => $getsingleprod,
            'prod_subcat' => $getprodsubdetils_single,
            'similiar_products' => $get_similiar_products,
            'pro_img_url' => $imgurl,
            'content' => 'product-details'
        );
        $this->response([
            'data' => $result
        ], REST_Controller::HTTP_OK);
    }
}
