<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Myaccount extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load the user model
        $this->load->model('api/myaccount_model', 'myaccount_model');
        $this->load->model('api/m_main', 'M_main');
    }
    public function updateadrs_post()
    {

        $jwt = $this->input->post('token');
        $adrid = $this->input->post('adrid');
        $kunci = $this->config->item('thekey');

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('adr_fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('adr_lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('adr_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('adr_strname', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('adr_city', 'City', 'trim|required');
        $this->form_validation->set_rules('adr_state', 'State', 'trim|required');
        $this->form_validation->set_rules('adr_country', 'Country', 'trim|required');
        $this->form_validation->set_rules('adr_pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('adr_phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('adrid', 'Address ID', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {


            try {
                $decode = JWT::decode($jwt, $kunci, array('HS256'));
            } catch (Exception $e) {
                $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
                $this->response($invalid, 401); //401
                exit;
            }

            //  print_r($decode);
            //  exit;


            $q = array('user_id' => $decode->id);

            $invalidLogin = ['status' => 'Not a user'];


            if ($this->M_main->get_user_id($q)->num_rows() == 0) {
                $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
            } else {

                $val = $this->M_main->get_user($q)->row();

                $userid = $val->user_id;

                //$userid=base64_decode($_SESSION['userid']);

                $getadrscount = $this->myaccount_model->getadrscountedit($userid);
                $adrscount = $getadrscount->adrscount;


                if ($adrscount != 0) {
                    $data = array(

                        'addressprofile_userid' => $userid,
                        'addressprofile_fname' => $this->input->post('adr_fname'),
                        'addressprofile_lname' => $this->input->post('adr_lname'),
                        'addressprofile_email' => $this->input->post('adr_email'),
                        'addressprofile_street' => $this->input->post('adr_strname'),
                        'addressprofile_city' => $this->input->post('adr_city'),
                        'addressprofile_state' => $this->input->post('adr_state'),
                        'addressprofile_country' => $this->input->post('adr_country'),
                        'addressprofile_pin' => $this->input->post('adr_pincode'),
                        'addressprofile_phone' => $this->input->post('adr_phone'),
                        'addressprofile_date' => date('Y-m-d')

                    );

                    $res = $this->myaccount_model->updateadrs($data, $adrid);

                    if ($res == 1) {
                        $this->response([
                            'message' => 'success',
                            'status' => 'true'
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'message' => 'failed',
                            'status' => 'false'
                        ], REST_Controller::HTTP_BAD_REQUEST);
                    }
                }
            }
        }
    }



    public function insertadrs_post()
    {

        $jwt = $this->input->post('token');
        $kunci = $this->config->item('thekey');

        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('adr_fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('adr_lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('adr_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('adr_strname', 'Street Name', 'trim|required');
        $this->form_validation->set_rules('adr_city', 'City', 'trim|required');
        $this->form_validation->set_rules('adr_state', 'State', 'trim|required');
        $this->form_validation->set_rules('adr_country', 'Country', 'trim|required');
        $this->form_validation->set_rules('adr_pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('adr_phone', 'Phone', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {


            try {
                $decode = JWT::decode($jwt, $kunci, array('HS256'));
            } catch (Exception $e) {
                $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
                $this->response($invalid, 401); //401
                exit;
            }

            //  print_r($decode);
            //  exit;


            $q = array('user_id' => $decode->id);

            $invalidLogin = ['status' => 'Not a user'];


            if ($this->M_main->get_user_id($q)->num_rows() == 0) {
                $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
            } else {

                $val = $this->M_main->get_user($q)->row();

                $userid = $val->user_id;

                $data = array(
                    'addressprofile_userid' => $userid,
                    'addressprofile_fname' => $this->input->post('adr_fname'),
                    'addressprofile_lname' => $this->input->post('adr_lname'),
                    'addressprofile_email' => $this->input->post('adr_email'),
                    'addressprofile_street' => $this->input->post('adr_strname'),
                    'addressprofile_city' => $this->input->post('adr_city'),
                    'addressprofile_state' => $this->input->post('adr_state'),
                    'addressprofile_country' => $this->input->post('adr_country'),
                    'addressprofile_pin' => $this->input->post('adr_pincode'),
                    'addressprofile_phone' => $this->input->post('adr_phone'),
                    'addressprofile_date' => date('Y-m-d')

                );

                $res = $this->myaccount_model->insertadrs($data);
                if ($res == 1) {
                    $this->response([
                        'message' => 'success',
                        'status' => 'true'
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'message' => 'failed',
                        'status' => 'false'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }



    public function getorders_post()
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


            $a = $this->myaccount_model->getorders($userid);

            //   print_r($a['getorders']);
            //   exit;

            $this->response([
                'message' => 'success',
                'getorders' => $a
            ], REST_Controller::HTTP_OK);
        }
    }


    public function orderdetails_post()
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

            $orderid = $this->input->post('oid');

            $generaldtls = $this->myaccount_model->getordergeneraldetals($orderid, $userid);

            $productdtails = $this->myaccount_model->getproductdtails($orderid, $userid);

            $addressdtls = $this->myaccount_model->getaddressdtls($userid);

            $result = array(
                'gen' => $generaldtls,
                'adrs' => $addressdtls,
                'prods' => $productdtails,
                'content' => 'orderdetails'
            );

            $this->response([
                'message' => 'success',
                'data' => $result
            ], REST_Controller::HTTP_OK);
        }
    }

    public function update_personalinfo_post()
    {
        $jwt = $this->input->post('token');
        $kunci = $this->config->item('thekey');

        $curpass = $this->input->post('curpass');
        $newpass = $this->input->post('newpass');
        $confpass = $this->input->post('confpass');

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

            $dbpass = $val->user_password;

            // $gender=$this->input->post('check_method');

            $date = date('Y-m-d');

            // $newpass=$this->input->post('unewpass');

            if ($dbpass != base64_encode($curpass)) {
                $this->response([
                    'message' => 'current password incorrect',
                    'status' => 'false'
                ], REST_Controller::HTTP_BAD_REQUEST);
                exit;
            } else if ($newpass !== $confpass) {
                $this->response([
                    'message' => 'confirm password incorrect',
                    'status' => 'false'
                ], REST_Controller::HTTP_BAD_REQUEST);
                exit;
            }

            if ($newpass != '') {

                $data = array(
                    'user_password' => base64_encode($newpass),
                    'user_date' => $date
                );
            }

            $res = $this->myaccount_model->updateuserinfo($userid, $data);

            if ($res == 1) {
                $this->response([
                    'message' => 'success',
                    'status' => 'true'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'message' => 'confirm password incorrect',
                    'status' => 'false'
                ], REST_Controller::HTTP_BAD_REQUEST);
                exit;
            }
        }
    }


    public function filladressview_post()
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

            $getadress = $this->myaccount_model->getadressusershow($userid);

            //   print_r($getadress);
            //   exit;

            if (empty($getadress)) {
                $getadress = (object) array(
                    'addressprofile_fname' => '',
                    'addressprofile_lname' => '',
                    'addressprofile_company' => '',
                    'addressprofile_address' => '',
                    'addressprofile_state' => '',
                    'addressprofile_city' => '',
                    'addressprofile_street' => '',
                    'addressprofile_pin' => ''
                );

                $this->response([
                    'message' => 'success',
                    'data' => $getadress
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'message' => 'success',
                    'data' => $getadress
                ], REST_Controller::HTTP_OK);
            }
        }
    }

    public function city_view_get()
    {
        $jwt = $this->input->get('token');
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

            $getcity = $this->myaccount_model->get_city($userid);



            $this->response([
                'message' => 'success',
                'data' => $getcity
            ], REST_Controller::HTTP_OK);
        }
    }
}
