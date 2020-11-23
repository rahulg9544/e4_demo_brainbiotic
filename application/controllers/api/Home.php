<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Home extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load the user model
        $this->load->model('api/home_model', 'home_model');
        $this->load->model('api/m_main', 'M_main');
    }

    // homepage
    public function index_get()
    {
        $gettopselprods = $this->home_model->gettopselprods();

        $cat_img_url = base_url() . 'uploads/category';
        $blog_img_url = base_url() . 'uploads/blog';
        $banner_img_url = base_url() . 'uploads';

        $result = array(
            'tabproducts' => $this->home_model->get_categories(),
            'newprods' => $this->home_model->getnewprodshome(),
            'topsells' => $gettopselprods,
            'slides' => $this->home_model->getslides(),
            'blog' => $this->home_model->getblog_details(),
            'content' => 'index'
        );

        $this->response([
            'data' => $result, 'cat_img_url' => $cat_img_url, 'blog_img_url' => $blog_img_url, 'banner_img_url' => $banner_img_url
        ], REST_Controller::HTTP_OK);
    }


    public function searchitem_post()

    {
        $searchkey = $this->input->post('searchkey');

        if ($searchkey == "") {
            $this->response([
                'message' => 'No search value',
                'status' => 'false',
            ], REST_Controller::HTTP_BAD_REQUEST);
            exit;
        }

        $getsearchprds = $this->home_model->getsearchprds($searchkey);


        $prodcount = $getsearchprds->num_rows();

        $imgurl = base_url() . 'uploads';


        $result = array(
            'searchprods' => $getsearchprds->result(),
            'prodcount' => $prodcount,
        );

        $this->response([
            'data' => $result,
            'image_url' => $imgurl
        ], REST_Controller::HTTP_OK);
    }


    public function  wishlist_get()
    {

        $jwt = $this->input->get('token');
        $kunci = $this->config->item('thekey');
        $imgurl = base_url() . 'uploads';

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

            $result = $this->home_model->getwishlistitems($userid);

            $this->response([
                'data' => $result,
                'image_url' => $imgurl
            ], REST_Controller::HTTP_OK);
        }
    }

    function getwishlistcount_get()
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

            $getwishcount = $this->home_model->getwishcount($userid);

            $this->response([
                'message' => 'success',
                'count' => $getwishcount
            ], REST_Controller::HTTP_OK);
        }
    }

    //wishlist

    public function wishlistadding_post()
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

            $prodid = $this->input->post('pid');

            $getsameprodwishcount = $this->home_model->getsameprodwishcount($prodid, $userid);

            $date = date('Y-m-d');

            if ($getsameprodwishcount == 0) {
                $data = array(
                    'wishlist_prod_id' => $prodid,
                    'wishlist_user_id' => $userid,
                    'wishlist_date' => $date
                );

                $res = $this->home_model->insertwishlist($data);
                if ($res == 1) {
                    $this->response([
                        'message' => 'success',
                        'status' => 'true',
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'message' => 'failed',
                        'status' => 'false',
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response([
                    'message' => 'Product exist',
                    'status' => 'false',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }



    public function getwishlisttable_get()
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

            $res['wish'] = $this->home_model->getwishlistitems($userid);

            $this->response([
                'data' => $res
            ], REST_Controller::HTTP_OK);
        }
    }

    public function removewishitem_post()
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

            $wishid = $this->input->post('wid');

            $res = $this->home_model->removewishitem($userid, $wishid);

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


    // myaccount	
    public function myaccount()
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

            $getuserdetails = $this->home_model->getuserdtls($userid);

            $result = array(
                'tabproducts' => $this->home_model->get_categories(),
                'userinf' => $getuserdetails,
                'pagetype' => 'myaccount',
                'content' => 'my-account'
            );
            $this->response([
                'data' => $result
            ], REST_Controller::HTTP_OK);
        }
    }
}
