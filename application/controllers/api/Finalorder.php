<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
//require APPPATH . '/libraries/REST_Controller.php';

class Finalorder extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('api/finalorder_model','finalorder_model');
    }

public function checkoutconfirm_post()
  {
    if(isset($_SESSION['cusername']))
    {

      $userid = base64_decode($_SESSION['userid']);

      $coupon_appld = $this->input->post('coupon_appld');
      $discounded_total = $this->input->post('discounded_total');
      $paymod = $this->input->post('paymod');
      
    //   echo $coupon_appld;
    //   die();

      $cartitems = $this->finalorder_model->getcartitemforcheckconfirm($userid);
       
      $cartsubtot=0;
      $carttotlqty=0;

      $randno = rand(100,999);
      
      $unq_ordrid = "toot".$userid.$randno;

      $otime=date('H:i:s');
      $odate=date('Y-m-d');

      foreach($cartitems as $row)
      {
        $prodname=$row->product_name;
        $produnicid=$row->product_unique_id;
        
         if($row->product_size_status==1)
     { 

        if($row->product_shoesizeno=='n/a' || $row->product_shoesizeno=='')
        {
            $prodsizes=$row->product_sizeno; 
        }
        else
        {
            $prodsizes=$row->product_shoesizeno; 
        }

        $prodcolors=$row->product_color;

        $prodselprise=$row->product_sellpricewise;

        $prodmrp=$row->product_mrpwise;

        $proddscnt=$row->product_discountwise;

        $exp_prodsizes = explode(',', $prodsizes);

        $exp_prodcolors = explode(',', $prodcolors);

        $exp_prodselprise = explode(',', $prodselprise);

        $exp_prodmrp = explode(',', $prodmrp);

        $exp_proddscnt = explode(',', $proddscnt);


        $cartsize=$row->cart_size;

        $cartclr=$row->cart_color;

        $prodprise=0;

        for($i=0;$i<count($exp_prodsizes);$i++)
        {

            if($exp_prodsizes[$i]==$cartsize)
            
            {

              if($exp_prodcolors[$i]==$cartclr)
                 {

                   $prodprise = $exp_prodselprise[$i];

                 }
        
             }

        }

     }
     else
    
  {
        $prodprise=$row->product_sell_price;

        $prodsqty = 0;

        
  }
          $image = $row->product_image;

                // echo $row->prod_rating; 
                 
                if( strpos( $image,',') !== false ) 
                  {
                   
                     $exp_imagename = explode(',', $image);

                     $prodimage = $exp_imagename[0];
                  }
                  else
                  {
                     $prodimage= $row->product_image;
                  }


        $prodtotal = $row->cart_quantity*$prodprise;
        $cartid = $row->cart_id;
        
        $data_check=array
        (
          'dc_cart_id'=>$cartid,
          'dc_user_id'=>$userid,
          'dc_prod_id'=>$row->product_id,
          'dc_order_id'=>$unq_ordrid,
          'dc_prod_name'=>$prodname,
          'dc_prod_image'=>$prodimage,
          'dc_prod_quantity'=>$row->cart_quantity,
          'dc_prod_size'=>$row->cart_size,
          'dc_prod_color'=>$row->cart_color,
          'dc_prod_commoffer'=>$prodtotal,
          'dc_prod_actualstoreprice'=>$prodprise,
          'dc_time'=>$otime,
          'dc_date'=>$odate,
          'dc_cancel_order'=>0,
          'dc_payment_mode'=>$paymod
        ); 

        $res123 = $this->finalorder_model->insertcheck($data_check,$cartid);

        if($res123==0)
        {

          $this->response([
            'message' => 'error occured',
        ], REST_Controller::HTTP_BAD_REQUEST);

        die();
        }

        $cartsubtot = $cartsubtot+$prodtotal;    
        $carttotlqty = $carttotlqty+$row->cart_quantity;

      }
      
      $finalcheck_amnt=0;

      if($coupon_appld!='')
      {
        $getcoupondtails=$this->finalorder_model->getcoupondetals($coupon_appld);

        if($getcoupondtails->num_rows()==1)
        {
          $coupdtls=$getcoupondtails->row();

          $coupn_discnt=$coupdtls->promo_discount;

          $coupn_type=$coupdtls->promo_type;

          $disc_amount=0;

          if($coupn_type==1)
              {
                  $disc_amount = ($coupn_discnt / 100) * $cartsubtot;
              }
              else
              {
                if($coupn_type==0)
                {

                 $disc_amount = $coupn_discnt;
                }
              }

           $finalcheck_amnt = $cartsubtot-$disc_amount;
        }
        else
        {
           $finalcheck_amnt = $cartsubtot;
        }

      }
      else
      {
        $finalcheck_amnt = $cartsubtot;
      }

      $data_oder=array
      (
        'orders_uniq_id'=>$unq_ordrid,
        'orders_user_id'=>$userid,
        'orders_total_amount'=>$cartsubtot,
        'orders_total_offer_amount'=>$finalcheck_amnt,
        'orders_promocode'=>$coupon_appld,
        'orders_total_qty'=>$carttotlqty,
        'orders_delcharge'=>0,
        'orders_status'=>1,
        'orders_cancel_status'=>0,
        'orders_date'=>$odate,
        'orders_time'=>$otime
      );

      $res321=$this->finalorder_model->insertorder($data_oder);
      if($res321==1)
      {

        unset($_SESSION['coupon']);
        unset($_SESSION['couponuser']);
        unset($_SESSION['couponcamount']);

        $successarray=array();
        

        $getordergenraldtls=$this->finalorder_model->getordergenraldtlscheck($userid,$unq_ordrid);
        
        $getinvoicedetils=$this->finalorder_model->getorderinvoicedtlscheck($userid,$unq_ordrid);

        $getuserdetails_check=$this->finalorder_model->getuserdetails_check($userid);

        $usermail = $getuserdetails_check->user_mail;



                $data=array(
                             'ordergen'=>$getordergenraldtls,
                             'ordid'=>$unq_ordrid,
                             'res'=>$getinvoicedetils,
                             'tomail'=>$usermail,
                             'offertot'=>$finalcheck_amnt,
                           );


                    require 'PHPMailer-master/src/Exception.php';
                    require 'PHPMailer-master/src/PHPMailer.php';
                    require 'PHPMailer-master/src/SMTP.php';
                    
                    // $mail = new PHPMailer();
                    $mail=new PHPMailer\PHPMailer\PHPMailer();
                    $mail->IsSMTP();
                    
                    $mail->SMTPDebug  = 0;  
                    $mail->SMTPAuth   = TRUE;
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Username   = "infotootq8@gmail.com";

                    $mail->Password   = "toot@123";
                    
                    $mail->IsHTML(true);
                    $mail->AddAddress($usermail, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "tootq8");
                    $mail->AddReplyTo("infotootq8@gmail.com", "tootq8");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Order Confirmattion";
                    $content = $this->load->view('invoice_mail_view',$data,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo $unq_ordrid;
                   
                    var_dump($mail);
                    }
                    else
                    {
                    echo $unq_ordrid;
                    
                    }

      }
      else
      {
        echo "error";
      }




    }
    else
    {
        $this->response([
            'message' => 'please login',
        ], REST_Controller::HTTP_BAD_REQUEST);
    } 
  }

  }