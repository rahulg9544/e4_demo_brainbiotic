<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Checkout extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('api/checkout_model','checkout_model');
        $this->load->model('api/m_main', 'M_main');
    }
// checkoutpage	

	public function checkout_get()
	{

         if(isset($_SESSION['cusername']) || isset($_SESSION["cgustid"]))
           {
            
            if(isset($_SESSION['cusername']))
              {
                  $userid  = base64_decode($_SESSION['userid']);
              }
              else
              {
                       if(isset($_SESSION["cgustid"]))
                       {
                         $userid  = base64_decode($_SESSION['cgustid']);
                       }
              } 
     
          $coupon=base64_decode($this->input->get('cpn'));
          $couponcartamnt=base64_decode($this->input->get('crtamnt'));
    
    
          $getcartitems = $this->checkout_model->getcartitemsforcheck($userid);
    
          if($getcartitems->num_rows()==0)
          {
             
              
              $this->response(['message' => 'Your Cart is Empty.',
                'data' => $result
            ], REST_Controller::HTTP_OK);

         
          }
          else
          {
    
          $getuseraddrs=$this->checkout_model->getuseraddrscheck($userid);
    
    
      		$result=array(
      			     'tabproducts'=>$this->checkout_model->get_categories(),
                 'cartitems'=>$getcartitems,
                 'useradrs'=>$getuseraddrs,
                 'coupon'=>$coupon,
                 'copncamnt'=>$couponcartamnt,
                 'content' => 'checkout'  
                  );
      		
      		    $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);
          }
        }
        else
        {
            $this->response([
                'message' => 'Please login',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }

    public function add_address_post()
    { 
      $jwt = $this->input->post('token');
      $kunci = $this->config->item('thekey');
       
      try {
        $decode = JWT::decode($jwt, $kunci, array('HS256'));
      } catch (Exception $e) {
        $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
        $this->response($invalid, 401); //401
        exit;
      }
         
      $q = array('user_id' => $decode->id);
        
      $invalidLogin = ['status' => 'Not a user'];
       

      if ($this->M_main->get_user_id($q)->num_rows() == 0) {
        $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
      } else {

        $val = $this->M_main->get_user($q)->row();

        $userid = $val->user_id;
        
        $tdate= date('Y-m-d');

            # Form Validation
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('option', 'Option', 'trim|required');
            $this->form_validation->set_rules('city_id', 'City', 'trim|required');
            $this->form_validation->set_rules('block', 'Block', 'trim|required');
            $this->form_validation->set_rules('street', 'Street', 'trim|required');
            $this->form_validation->set_rules('house', 'House', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
          // Form Validation Errors
          $message = array(
              'status' => false,
              'error' => $this->form_validation->error_array(),
          );

          $this->response($message, REST_Controller::HTTP_NOT_FOUND);
          exit;
      }

        $adrsary=array
        (
          'addressprofile_userid'=>$userid,
          'addressprofile_fname'=>$this->input->post('fname'),
          'addressprofile_lname'=>$this->input->post('lname'),
          'addressprofile_email'=>$this->input->post('email'),
          'addressprofile_phone'=>$this->input->post('phone'),
          'addressprofile_country'=>$this->input->post('country'),
          'addressprofile_option'=>$this->input->post('option'),
          'addressprofile_area'=>$this->input->post('city_id'),
          'addressprofile_block'=>$this->input->post('block'),
          'addressprofile_street'=>$this->input->post('street'),
          'addressprofile_house'=>$this->input->post('house'),
          'addressprofile_date'=>$tdate
        );
           
          $res = $this->db->insert('addressprofile',$adrsary);
          
            //  print_r($res);
            //  exit;
           if ($res == 1) {
          $this->response([
            'message' => 'success'
          ], REST_Controller::HTTP_OK);
        } else {
          $this->response([
            'message' => 'Failed',
          ], REST_Controller::HTTP_BAD_REQUEST);
        }


      }
    }
    

}