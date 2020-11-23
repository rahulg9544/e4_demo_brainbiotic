<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';

class Language_ar extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
    }
    
       
    public function index()
	{
		 $result=array(
            'content' => 'ar/index');
        
        $this->response([
            'data' => $result
        ], REST_Controller::HTTP_OK);    
	}
	public function about()
	{
		$result=array(
            'content' => 'ar/about');
		 
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}

	public function cart()
	{
		$result=array(
            'content' => 'ar/cart');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}

	public function checkout()
	{
		//$result=array(
       //     'content' => 'ar/checkout');
       $this->response([
        'data' => $result
    ], REST_Controller::HTTP_OK);   

	}

	public function contact()
	{
		$result=array(
            'content' => 'ar/contact');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function faq()
	{
		$result=array(
            'content' => 'ar/faq');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
		public function login()
	{
		$result=array(
            'content' => 'ar/login');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function myaccount()
	{
		$result=array(
            'content' => 'ar/my-account');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function offers()
	{
		$result=array(
            'content' => 'ar/offers');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}

	public function productdetails()
	{
		$result=array(
            'content' => 'ar/product-details');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function products()
	{
		$result=array(
            'content' => 'ar/products');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
		public function recruitment()
	{
		$result=array(
            'content' => 'ar/recruitment');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function notice()
	{
		$result=array(
            'content' => 'ar/rgpd-notice');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function help()
	{
		$result=array(
            'content' => 'ar/shopping-help');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function sitemap()
	{
		$result=array(
            'content' => 'ar/sitemap');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
		public function store()
	{
		$result=array(
            'content' => 'ar/store');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function sale()
	{
		$result=array(
            'content' => 'ar/terms-of-sale');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}
	public function use()
	{
		$result=array(
            'content' => 'ar/terms-of-use');
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);   
	}

    

}