<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
// require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Cart extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    // Load the model
    $this->load->model('api/home_model', 'home_model');
    $this->load->model('api/cart_model', 'cart_model');
    $this->load->model('api/m_main', 'M_main');
  }
  public function cart_post()
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

    //  print_r($decode);
    //  exit;

    $q = array('user_id' => $decode->id);

    $invalidLogin = ['status' => 'Not a user'];


    if ($this->M_main->get_user_id($q)->num_rows() == 0) {
      $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
    } else {

      $val = $this->M_main->get_user($q)->row();

      // print_r($val);
      // exit;

      $result = array(
        'tabproducts' => $this->home_model->get_categories(),
        'content' => 'cart'
      );

      $this->response([
        'data' => $result
      ], REST_Controller::HTTP_OK);
    }
  }

  public function getcartitems_get()
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

      $a['cartitems'] = $this->cart_model->getcartitems($userid);

      $this->response([
        'message' => 'success',
        'data' => $a,
        'image_url' => $imgurl,
      ], REST_Controller::HTTP_OK);
    }
  }



  public function addcart_post()
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

      $prodid = $this->input->post('prodid');
      $selcolor = $this->input->post('selcolor');
      $selesize = $this->input->post('selesize');
      $seleprice = $this->input->post('seleprice');
      $sizecolorstat = $this->input->post('sizecolorstat');
      $qty = $this->input->post('qty');

      $getsameprodcart = $this->cart_model->getsameprodcart($prodid, $selcolor, $selesize, $userid);

      $date = date('Y-m-d');

      if ($getsameprodcart->num_rows() == 0) {


        $data = array(
          'cart_user_id' => $userid,
          'cart_product_id' => $prodid,
          'cart_quantity' => $qty,
          'cart_size' => $selesize,
          'cart_color' => $selcolor,
          'cart_sizecolorstat' => $sizecolorstat,
          'cart_status' => 1,
          'cart_ordr_status' => 0,
          'cart_date' => $date
        );

        $res = $this->cart_model->insertcart($data);

        if ($res == 1) {
          $this->response([
            'message' => 'success'
          ], REST_Controller::HTTP_OK);
        } else {
          $this->response([
            'message' => 'Failed',
          ], REST_Controller::HTTP_BAD_REQUEST);
        }
      } else {
        $sameprodscrt = $getsameprodcart->row();

        $sameprodscrt_qty = $sameprodscrt->cart_quantity;

        $new_qty = $sameprodscrt_qty + $qty;

        $data = array(
          'cart_quantity' => $new_qty,
          'cart_date' => $date
        );

        $res = $this->cart_model->updatecart($data, $prodid, $selcolor, $selesize, $userid);

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


  public function changecartqty_post()
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

      $newqty = $this->input->post('newqty');

      $crtid = $this->input->post('crtid');

      $date = date('Y-m-d');

      $data = array('cart_quantity' => $newqty, 'cart_date' => $date);

      $res = $this->cart_model->changecartqty($data, $crtid, $userid);

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

  public function removecartitm_post()
  {
    $jwt = $this->input->post('token');
    $kunci = $this->config->item('thekey');
    $crtid = $this->input->post('crtid');

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


      $res = $this->cart_model->removecartitem($crtid, $userid);
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

  public function clearcart_post()
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


      $res = $this->cart_model->clearcart($userid);
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

  public function getcartcount_get()
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


      $res = $this->cart_model->getcartcout($userid);

      $this->response([
        'message' => 'success',
        'count' => $res
      ], REST_Controller::HTTP_OK);
    }
  }

  public function getmincartcart_post()
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


      $res['miniacrt'] = $this->cart_model->getmincartcart($userid);

      $this->response([
        'data' => $res
      ], REST_Controller::HTTP_OK);
    }
  }


  public function checkout_get()
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

      // $coupon = base64_decode($this->input->get('cpn'));
      // $couponcartamnt = base64_decode($this->input->get('crtamnt'));


      $getcartitems = $this->cart_model->getcartitemsforcheck($userid);

      // print_r($getcartitems);
      // exit;

      if ($getcartitems->num_rows() == 0) {

        $this->response([
          'data' => 'No cart item',
        ], REST_Controller::HTTP_OK);
      } else {

        $cartitems = $this->cart_model->getcartitemforcheckconfirm($userid);

        //  $getuseraddrs = $this->cart_model->getuseraddrscheck($userid);



        foreach ($cartitems as $row) {


          $prodprice = $row->product_sell_price;

          $totalprodprice = $prodprice * $row->cart_quantity;
        }

        echo $totalprodprice;

        exit;

        $result = array(
          'useradrs' => $getuseraddrs,
        );

        $this->response([
          'data' => $result
        ], REST_Controller::HTTP_OK);
      }
    }
  }
}
