<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Placeorder extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('api/placeorder_model', 'placeorder_model');
        $this->load->model('api/m_main', 'M_main');
    }

    public function placeorder_post()
    {
        $jwt = $this->input->post('token');
        $add_id = $this->input->post('add_id');
        $kunci = $this->config->item('thekey');

        try {
            $decode = JWT::decode($jwt, $kunci, array('HS256'));
        } catch (Exception $e) {
            $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
            $this->response($invalid, 401); //401
            exit;
        }


        $q = array('user_id' => $decode->id);

        $val = $this->M_main->get_user($q)->row();

        $userid = $val->user_id;

        $invalidLogin = ['status' => 'Not a user'];


        if ($this->M_main->get_user_id($q)->num_rows() == 0) {
            $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        } else {

            $add = array('addressprofile_id ' => $add_id);

            $val = $this->placeorder_model->get_city($add)->row();

            $city_id = $val->addressprofile_area;

            $del_charge = $this->placeorder_model->get_delivery_charge($city_id);

            $getcartitems = $this->placeorder_model->getcartitemsforcheck($userid);

            $del = $del_charge->delivery_charge;

            foreach ($getcartitems as $row) {

                $prodprice = $row->product_sell_price;

                $totalprodprice = $prodprice * $row->cart_quantity;
            }

            $tot = $totalprodprice + $del;

            $result = array(
                'sub_total' => $totalprodprice,
                'delivery_charge' => $del,
                'grand_total' => $tot
            );

            $this->response([
                'message' => 'success',
                'data' => $result
            ], REST_Controller::HTTP_OK);
        }
    }

    public function placeorder_submit_post()
    {
        $jwt = $this->input->post('token');
        $kunci = $this->config->item('thekey');
        $paymod = $this->input->post('paymod');

        try {
            $decode = JWT::decode($jwt, $kunci, array('HS256'));
        } catch (Exception $e) {
            $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
            $this->response($invalid, 401); //401
            exit;
        }

        $q = array('user_id' => $decode->id);

        $val = $this->M_main->get_user($q)->row();

        $userid = $val->user_id;

        $invalidLogin = ['status' => 'Not a user'];

        if ($this->M_main->get_user_id($q)->num_rows() == 0) {
            $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        } else {

            //$add = array('addressprofile_id ' => $add_id);


            $getcartitems = $this->placeorder_model->getcartitemsforcheck($userid);

            $cartsubtot = 0;
            $carttotlqty = 0;

            $randno = rand(100, 999);

            $unq_ordrid = "brainbiotic" . $userid . $randno;

            $otime = date('H:i:s');
            $odate = date('Y-m-d');

            foreach ($getcartitems as $row) {

                $prodname = $row->product_name;
                $produnicid = $row->product_unique_id;


                $prodcolors = $row->product_color;

                $prodselprise = $row->product_sellpricewise;

                $prodmrp = $row->product_mrpwise;

                $proddscnt = $row->product_discountwise;

                $exp_prodcolors = explode(',', $prodcolors);

                $exp_prodselprise = explode(',', $prodselprise);

                $exp_prodmrp = explode(',', $prodmrp);

                $exp_proddscnt = explode(',', $proddscnt);


                $cartsize = $row->cart_size;

                $cartclr = $row->cart_color;


                $prodprise = $row->product_sell_price;

                $prodsqty = 0;

                $image = $row->product_image;

                // echo $row->prod_rating; 

                if (strpos($image, ',') !== false) {

                    $exp_imagename = explode(',', $image);

                    $prodimage = $exp_imagename[0];
                } else {
                    $prodimage = $row->product_image;
                }


                $prodtotal = $row->cart_quantity * $prodprise;
                $cartid = $row->cart_id;

                $data_check = array(
                    'dc_cart_id' => $cartid,
                    'dc_user_id' => $userid,
                    'dc_prod_id' => $row->product_id,
                    'dc_order_id' => $unq_ordrid,
                    'dc_prod_name' => $prodname,
                    'dc_prod_image' => $prodimage,
                    'dc_prod_quantity' => $row->cart_quantity,
                    'dc_prod_size' => $row->cart_size,
                    'dc_prod_color' => $row->cart_color,
                    'dc_prod_commoffer' => $prodtotal,
                    'dc_prod_actualstoreprice' => $prodprise,
                    'dc_time' => $otime,
                    'dc_date' => $odate,
                    'dc_cancel_order' => 0,
                    'dc_payment_mode' => $paymod
                );

                $res123 = $this->placeorder_model->insertcheck($data_check, $cartid);

                if ($res123 == 0) {

                    $this->response([
                        'message' => 'Failed',
                    ], REST_Controller::HTTP_BAD_REQUEST);
                    die();
                }

                $cartsubtot = $cartsubtot + $prodtotal;
                $carttotlqty = $carttotlqty + $row->cart_quantity;
            }

            $data_oder = array(
                'orders_uniq_id' => $unq_ordrid,
                'orders_user_id' => $userid,
                'orders_total_amount' => $cartsubtot,
                'orders_total_qty' => $carttotlqty,
                'orders_delcharge' => 0,
                'orders_status' => 1,
                'orders_cancel_status' => 0,
                'orders_date' => $odate,
                'orders_time' => $otime
            );

            $res321 = $this->placeorder_model->insertorder($data_oder);

            // $tot = $totalprodprice + $del;

            // $result = array(
            //     'sub_total' => $totalprodprice,
            //     'delivery_charge' => $del,
            //     'grand_total' => $tot
            // );
            if ($res321) {
                $this->response([
                    'message' => 'success',
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'message' => 'Failed',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
