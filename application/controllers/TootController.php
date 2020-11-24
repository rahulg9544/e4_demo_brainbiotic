<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TootController extends CI_Controller {

function __construct() {
    	parent::__construct();
    	$this->load->model('TootModel');
    	$this->load->library('session');
    	// $this->load->library('encryption');
    	
	}	

// homepage
	public function index()
	{
	    $gettopselprods = $this->TootModel->gettopselprods();
	    
		 $result=array(
		 	'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
      'newprods'=>$this->TootModel->getnewprodshome(),
      'topsells'=>$gettopselprods,
		 	'slides'=>$this->TootModel->getslides(),
		 	'all_products'=>$this->TootModel->get_all_products(),
            'content' => 'index'
        );
		$this->load->view('toottemplate',$result);
	}


// homepage

// common

public function tabsortproducts()
{
	$a['tabproducts'] = $this->TootModel->get_categories();
	 	

	 	$this->load->view('frontendtable/displaytabcat',$a);
}

//common


// aboutpage	
	public function about()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
			'aboutcont'=>$this->TootModel->getaboutcont(),
            'content' => 'about');
		$this->load->view('toottemplate',$result);
	}


// aboutpage	
// cartpage
	public function cart()
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
    
      		$result=array(
      			'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'cart'
                );
      		$this->load->view('toottemplate',$result);
        }
        else
        {
              redirect('Login');
        }
	}


  public function getcartitems()
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

       $a['cartitems']=$this->TootModel->getcartitems($userid);

       $this->load->view('frondendtable/cart_table',$a);
    }
    else
    {
       redirect('Login');
    }   
  }


  public function addcart()
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

          $prodid=$this->input->post('prodid');
          $selcolor=$this->input->post('selcolor');
          $selesize=$this->input->post('selesize');
          $seleprice=$this->input->post('seleprice');
          $sizecolorstat=$this->input->post('sizecolorstat');
          $qty=$this->input->post('qty');

          $getsameprodcart=$this->TootModel->getsameprodcart($prodid,$selcolor,$selesize,$userid);
           
           $date=date('Y-m-d');

          if($getsameprodcart->num_rows()==0)
          {
            

            $data=array
            (
              'cart_user_id'=>$userid,
              'cart_product_id'=>$prodid,
              'cart_quantity'=>$qty,
              'cart_size'=>$selesize,
              'cart_color'=>$selcolor,
              'cart_sizecolorstat'=>$sizecolorstat,
              'cart_status'=>1,
              'cart_ordr_status'=>0,
              'cart_date'=>$date
            );

            $res=$this->TootModel->insertcart($data);

            if($res==1)
            {
              echo "success";
            }
            else
            {
              echo "failed";
            } 
          }
          else
          {
            $sameprodscrt = $getsameprodcart->row();

            $sameprodscrt_qty=$sameprodscrt->cart_quantity;

            $new_qty=$sameprodscrt_qty+$qty;

            $data=array
            (
              'cart_quantity'=>$new_qty,
              'cart_date'=>$date
            );

            $res=$this->TootModel->updatecart($data,$prodid,$selcolor,$selesize,$userid);

            if($res==1)
            {
              echo "success";
            }
            else
            {
              echo "failed";
            } 
          }  

        }
        else
        {
          redirect('Login');
        } 
  }


  public function changecartqty()
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
      $newqty=$this->input->post('newqty');

      $crtid=$this->input->post('crtid');

      $date=date('Y-m-d');

      $data=array('cart_quantity'=>$newqty,'cart_date'=>$date);

      $res=$this->TootModel->changecartqty($data,$crtid,$userid);

      if($res==1)
      {
        echo "success";
      }
      else
      {
        echo "failed";
      }

    }
    else
    {
      redirect('Login');
    }  
  }

  public function removecartitm()
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
      $crtid=$this->input->post('crtid');

      $res= $this->TootModel->removecartitem($crtid,$userid);
      if($res==1)
      {
        echo "success";
      }
      else
      {
        echo "failed";
      }
    }
    else
    {
      redirect('Login');
    }  
  }

  public function getcartcount()
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
      

      $res=$this->TootModel->getcartcout($userid);

      echo $res;


    }
    else
    {
      echo 0;
    } 

  }

  public function getmincartcart()
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
      

      $res['miniacrt']=$this->TootModel->getmincartcart($userid);

      
      $this->load->view('frondendtable/mincart_table',$res);

    }
    else
    {
      $res['miniacrt']=array();
      $this->load->view('frondendtable/mincart_table',$res);
    } 
  }


  public function promocodecheck()
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

      $couponcode = $this->input->post('couponcod');

      $carttotal = $this->input->post('carttotal');

      $getcoupondetals = $this->TootModel->getcoupondetals($couponcode);

      $retunary=array();

      if($getcoupondetals->num_rows()==1)
      {
         $coupndtls = $getcoupondetals->row();
         
         $coupnmin_camnt = $coupndtls->promo_min_cart_value;
         $coupnmax_amnt = $coupndtls->promo_max_amount;
         $coupnmax_use = $coupndtls->promo_use_per_user;
         $coupn_type = $coupndtls->promo_type;
         $coupn_discnt = $coupndtls->promo_discount;
         
        //  echo $carttotal."-".number_format($coupnmin_camnt,3);
        //  die();
        
           $carttotal = str_replace(',', '', $carttotal);
        
    //   echo round($carttotal, 0)."".$carttotal;
    //   die();
        
         if($carttotal >= $coupnmin_camnt)
         {
           $getsprocodeapplycount = $this->TootModel->getprocodeapplycount($userid,$couponcode);

           if($getsprocodeapplycount<$coupnmax_use)
           {

              $disc_amount=0;

              if($coupn_type==1)
              {
                  $disc_amount = ($coupn_discnt / 100) * $carttotal;
              }
              else
              {
                if($coupn_type==0)
                {

                 $disc_amount = $coupn_discnt;
                }
              }

              if($disc_amount>$coupnmax_amnt)
              {
                $discount = $coupnmax_amnt;
              }
              else
              {
                $discount = $disc_amount;
              }
              
              
              
             

              $dicount_cartamount=$carttotal-$discount;

              
              $retunary=array
              (
                'status'=>1,
                'comments'=>'Congrats you got a discount of KWD '.number_format($discount,3),
                'discnote'=>'Coupons maximum discount amount is KWD '.number_format($coupnmax_amnt,3),
                'cartamount'=>number_format($dicount_cartamount,3),
                'coupon'=>$couponcode
              );


              $setcopn=array
              (
                'coupon'=>$couponcode,
                'couponuser'=>base64_encode($userid),
                'couponcamount'=>number_format($dicount_cartamount,3)
              );

              $this->session->set_userdata($setcopn);

              echo json_encode($retunary);
              

           }
           else
           {
              $retunary=array
              (
                'status'=>0,
                'comments'=>'You have already used the coupon for Maximum allowed times',
              );

              echo json_encode($retunary);
           }
         }
         else
         {
              $retunary=array
              (
                'status'=>0,
                'comments'=>'Cart amount must be atleast KWD'.$coupnmin_camnt,
              );

              echo json_encode($retunary);
         }

         
      }
      else
      {
            $retunary=array
            (
              'status'=>0,
              'comments'=>'Coupon is invalid or expired',
            );

            echo json_encode($retunary);
      }


    }
    else
    {
      redirect('Login');
    }    
  }


// cartpage
// checkoutpage	

	public function checkout()
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
    
    
          $getcartitems = $this->TootModel->getcartitemsforcheck($userid);
    
          if($getcartitems->num_rows()==0)
          {
             ?> <script type="text/javascript">
              alert("Your Cart is Empty.");
              window.location.href="<?php echo base_url(); ?>Home";
              </script>   <?php
          }
          else
          {
    
          $getuseraddrs=$this->TootModel->getuseraddrscheck($userid);

           $get_row_address=$this->TootModel->delivery_address($userid);

           if(!empty($get_row_address->addressprofile_city))
          {
            $city = $get_row_address->addressprofile_city;
            $getusercity=$this->TootModel->delivery_city($city);

              if(!empty($getusercity->min_value))
               {
                $min_value = $getusercity->min_value;
                $delivery_charge = $getusercity->delivery_charge;
               }
               else
               {
                $min_value = 0.00;
                $delivery_charge = 0.00;
               }
          }
          else
          {
                $min_value = 0.00;
                $delivery_charge = 0.00;
          }


    
      		$result=array(
      			     'tabproducts'=>$this->TootModel->get_categories(),
                 'offertext'=>$this->TootModel->getoffertext(),
                 'city_list'=>$this->TootModel->getcity(),
                 'cartitems'=>$getcartitems,
                 'useradrs'=>$getuseraddrs,
                 'coupon'=>$coupon,
                 'copncamnt'=>$couponcartamnt,
                 'min_value'=>$min_value,
                 'delivery_charge'=>$delivery_charge,
                 'content' => 'checkout'  
                  );
      		
      		$this->load->view('toottemplate',$result);
          }
        }
        else
        {
          redirect('Login');
        }  
	}
	
	
	public function setdelchage_check()
	{
	    $area = $this->input->post('area');
	    $res = $this->TootModel->getareadelcharge($area);
	    
	    $area_delcharge = $res->delivery_charge;
	   // echo $area_delcharge;
	   
	   echo json_encode($res);
	}


  public function insertdeladrsscheck()
  {
     if(isset($_SESSION['cusername']))
    {

      $userid = base64_decode($_SESSION['userid']);

      $tdate= date('Y-m-d');

      $adrsary=array
      (
        'addressprofile_userid'=>$userid,
        'addressprofile_fname'=>$this->input->post('checkadrsfname'),
        'addressprofile_lname'=>$this->input->post('checkadrslname'),
        'addressprofile_mobile'=>$this->input->post('checkadrsmobile'),
        'addressprofile_block'=>$this->input->post('checkadrsblock'),
        'addressprofile_hb'=>$this->input->post('checkadrshb'),
        'addressprofile_avenue'=>$this->input->post('checkadrsavenue'),
        'addressprofile_city'=>$this->input->post('checkadrscity'),
        'addressprofile_street'=>$this->input->post('checkadrsstreet'),
        'addressprofile_more'=>$this->input->post('checkadrsmor'),
        'addressprofile_date'=>$tdate
      );

      // $umobary=array('user_mobile'=>$this->input->post('checkadrsmobile'));

      $res=$this->TootModel->insertdeladrsnmob($userid,$adrsary);
      if($res==1)
      {
        echo "success";
      }
      else
      {
        echo "failed";
      }

    }
    else
    {
      redirect('Login');
    }  
  }



  public function adrsfillcheck()
  {
    if(isset($_SESSION['cusername']))
    {
      $userid = base64_decode($_SESSION['userid']);

      $res=$this->TootModel->getuseradrsregcheck($userid);

      if(!empty($res))
      {
        echo json_encode($res);
      }
      else
      {
        echo "failed";
      }

    }
    else
    {
      redirect('Login');
    } 
  }

//payment gateway
  public function payment_gateway()
  {
    if(isset($_SESSION['cusername']))
    {

    $userid = base64_decode($_SESSION['userid']);

    $user_details = $this->TootModel->user_info($userid);

    $fname = $user_details->user_fname;
    $lname = $user_details->user_lname;
    $mob = $user_details->user_mobile;
    $email = $user_details->user_mail;
    $full_name = $fname." ".$lname;

    $coupon_appld = $this->input->post('coupon_appld');
    $discounded_total = $this->input->post('discounded_total');
    $paymod = $this->input->post('paymod');
    $grand_total = $this->input->post('grand_total');

    $addressid = $this->input->post('addressid');
    $delivery_charge = $this->input->post('delivery_charge');

    $randno = rand(100,999);
      
    $unq_ordrid = "toot".$userid.$randno;

    $success_url = base_url('index.php/TootController/payment_success')."?c=".$coupon_appld."&d=".$discounded_total."&p=".$paymod."&o=".$unq_ordrid."&adrid=".$addressid."&delivery_charge=".$delivery_charge."";

    $error_url = base_url('index.php/TootController/payment_error');

   

    $fields = array(
    'merchant_id'=>'1201',
    'username' => 'test',
    'password'=>stripslashes('test'), 'api_key'=>'jtest123', 
    'order_id'=>time(), // MIN 30 characters with strong unique function (like hashing function with time)
    'total_price'=>$grand_total,
    'CurrencyCode'=>'KWD',//only works in production mode
    'CstFName'=>$full_name,
    'CstEmail'=>$email,
    'CstMobile'=>$mob,
    'success_url'=>$success_url, 
    'error_url'=>$error_url,
    'test_mode'=>1, // test mode enabled
    'whitelabled'=>true, // only accept in live credentials (it will not work in test)
    'payment_gateway'=>'knet',// only works in production mode
    'ProductName'=>json_encode([]),
    'ProductQty'=>json_encode([]),
    'ProductPrice'=>json_encode([]),
    'reference'=>'Ref00001'
    );
    
    // $fields = array(
    // 'merchant_id'=>'5985',
    // 'username' => 'toot_central_souq',
    // 'password'=>stripslashes('DTSqRAuTH@tE9'), 
    // //'api_key'=>'jtest123',
    // 'api_key' =>password_hash('8HhElVj31O9KWvV8PBJSH9gbXq2FUhnm7yfkBpxn',PASSWORD_BCRYPT), 
    // 'order_id'=>time(), // MIN 30 characters with strong unique function (like hashing function with time)
    // 'total_price'=>$grand_total,
    // 'CurrencyCode'=>'KWD',//only works in production mode
    // 'CstFName'=>$full_name,
    // 'CstEmail'=>$email,
    // 'CstMobile'=>$mob,
    // 'success_url'=>$success_url, 
    // 'error_url'=>$error_url,
    // 'test_mode'=>0, // test mode desabled
    // //'whitelabled'=>true, // only accept in live credentials (it will not work in test)
    // 'payment_gateway'=>'knet',// only works in production mode
    // 'ProductName'=>json_encode([]),
    // 'ProductQty'=>json_encode([]),
    // 'ProductPrice'=>json_encode([]),
    // 'reference'=>'Ref00001'
    // );
    
    $fields_string = http_build_query($fields);
    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/payment-request");
    curl_setopt($ch, CURLOPT_URL,"https://api.upayments.com/test-payment"); 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
    // receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    $server_output = json_decode($server_output,true);
    //print_r($server_output);
    //header('Location:'.$server_output['paymentURL']);
    echo $server_output['paymentURL'];
    }
    else
    {
      redirect('Login');
    }  

  }

//success of payment gateway
public function payment_success()
{
   $PaymentID = $this->input->get('PaymentID');
   $Result = $this->input->get('Result');
   $PostDate = $this->input->get('PostDate');
   $TranID = $this->input->get('TranID');
   $Ref = $this->input->get('Ref');
   $TrackID = $this->input->get('TrackID');
   $Auth = $this->input->get('Auth');
   $OrderID = $this->input->get('OrderID');

   $coupon_appld = $this->input->get('c');
   $discounded_total = $this->input->get('d');
   $paymod = $this->input->get('p');
   $unq_ordrid = $this->input->get('o');
   

   $adrsid = $this->input->get('adrid');
   $delivery_charge = $this->input->post('delivery_charge');


   $userid = base64_decode($_SESSION['userid']);
   date_default_timezone_set("Asia/Kuwait");
   $date = date('Y-m-d h:i:sa');

    $data1 = array
      (
       'payment_user_id'=>$userid,
       'payment_order_id'=>$unq_ordrid,
       'PaymentID'=>$PaymentID,
       'Result'=>$Result,
       'PostDate'=>$PostDate,
       'TranID'=>$TranID,
       'Ref'=>$Ref,
       'TrackID'=>$TrackID,
       'Auth'=>$Auth,
       'OrderID'=>$OrderID,
       'payment_date'=>$date,
      );
      
         $result1 = $this->TootModel->insert_payment($data1);
      
      if ($result1==1)
      {
          redirect("index.php/TootController/checkoutconfirm?c=".$coupon_appld."&d=".$discounded_total."&p=".$paymod."&o=".$unq_ordrid."&adrid=".$adrsid."&delivery_charge=".$delivery_charge."");
      }
     

}

//payment error
public function payment_error()
{
   $PaymentID = $this->input->get('PaymentID');
   $Result = $this->input->get('Result');
   $PostDate = $this->input->get('PostDate');
   $TranID = $this->input->get('TranID');
   $Ref = $this->input->get('Ref');
   $TrackID = $this->input->get('TrackID');
   $Auth = $this->input->get('Auth');
   $OrderID = $this->input->get('OrderID');

   $userid = base64_decode($_SESSION['userid']);
   date_default_timezone_set("Asia/Kuwait");
   $date = date('Y-m-d h:i:sa');

    $data1 = array
      (
       'payment_user_id'=>$userid,
       'payment_order_id'=>"",
       'PaymentID'=>$PaymentID,
       'Result'=>$Result,
       'PostDate'=>$PostDate,
       'TranID'=>$TranID,
       'Ref'=>$Ref,
       'TrackID'=>$TrackID,
       'Auth'=>$Auth,
       'OrderID'=>$OrderID,
       'payment_date'=>$date,
      );
      
         $result1 = $this->TootModel->insert_payment($data1);
      
      if ($result1==1)
      {
          redirect('index.php/TootController/checkout?status=failed');
      }

}

//order_confirm  
  public function checkoutconfirm()
  {
    if(isset($_SESSION['cusername']))
    {

      $userid = base64_decode($_SESSION['userid']);

      $adrid = $this->input->get('adrid');
      
      $delivery_charge = $this->input->post('delivery_charge');

      $delivery_address_row = $this->TootModel->delivery_address($adrid);
      $delivery_city = $delivery_address_row->addressprofile_city;

      $delivery_city_row = $this->TootModel->delivery_city($delivery_city);
      if(!empty($delivery_city_row->delivery_charge))
      {
        $delivery_charge = $delivery_city_row->delivery_charge;
      }
      else
      {
        $delivery_charge = 0.000;
      }

      
      
      if(isset($_GET['o']))
      {
        //with gateway
        $coupon_appld = $this->input->get('c');
        $discounded_total = $this->input->get('d');
        $paymod = $this->input->get('p');
        $unq_ordrid = $this->input->get('o');
      }
      else
      {
        //without payment gateway

         $coupon_appld = $this->input->post('coupon_appld');
         $discounded_total = $this->input->post('discounded_total');
         $paymod = $this->input->post('paymod');
         $randno = rand(100,999);
      
         $unq_ordrid = "toot".$userid.$randno;

      }

     

      $cartitems = $this->TootModel->getcartitemforcheckconfirm($userid);
       
      $cartsubtot=0;
      $carttotlqty=0;

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
          'dc_payment_mode'=>$paymod,
          'delivery_charge'=>$delivery_charge
        ); 

        $res123 = $this->TootModel->insertcheck($data_check,$cartid);

        if($res123==0)
        {
          echo "erroroccured";
          die();
        }

        $cartsubtot = $cartsubtot+$prodtotal;    
        $carttotlqty = $carttotlqty+$row->cart_quantity;

      }
      
      $finalcheck_amnt=0;

      if($coupon_appld!='')
      {
        $getcoupondtails=$this->TootModel->getcoupondetals($coupon_appld);

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
        'orders_adrs_id'=>$adrid,
        'orders_total_amount'=>$cartsubtot,
        'orders_total_offer_amount'=>$finalcheck_amnt,
        'orders_promocode'=>$coupon_appld,
        'orders_total_qty'=>$carttotlqty,
        'orders_delcharge'=>$delivery_charge,
        'orders_status'=>1,
        'orders_cancel_status'=>0,
        'orders_date'=>$odate,
        'orders_time'=>$otime,
        'delivery_charge'=>$delivery_charge
      );

      $res321=$this->TootModel->insertorder($data_oder);
      if($res321==1)
      {

        unset($_SESSION['coupon']);
        unset($_SESSION['couponuser']);
        unset($_SESSION['couponcamount']);

        $successarray=array();
        

        $getordergenraldtls=$this->TootModel->getordergenraldtlscheck($userid,$unq_ordrid);

        $adrsid = $getordergenraldtls->orders_adrs_id;

        $orderadrs = $this->TootModel->getorderadrs($adrsid);
        
        $getinvoicedetils=$this->TootModel->getorderinvoicedtlscheck($userid,$unq_ordrid);

        $getuserdetails_check=$this->TootModel->getuserdetails_check($userid);

        $usermail = $getuserdetails_check->user_mail;



                $data=array(
                             'ordergen'=>$getordergenraldtls,
                             'ordid'=>$unq_ordrid,
                             'res'=>$getinvoicedetils,
                             'orderadrs'=>$orderadrs,
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
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Order Confirmattion";
                    $content = $this->load->view('invoice_mail_view',$data,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(isset($_GET['o']))
                    {
                      //if checkout through payment gateway
                      if(!$mail->Send()) {
                      $unq_ordrid;
                      var_dump($mail);
                      redirect("index.php/TootController/checkinvoice?od=".$unq_ordrid."");
                      }
                      else
                      {
                      $unq_ordrid;
                      redirect("index.php/TootController/checkinvoice?od=".$unq_ordrid."");
                      }
                    }
                    else
                    {
                      //normal checkout
                      if(!$mail->Send()) {
                      echo $unq_ordrid;
                      var_dump($mail);
                      }
                      else
                      {
                      echo $unq_ordrid;
                      }
                    }

      }
      else
      {
        echo "error";
      }




    }
    else
    {
      redirect('Login');
    } 
  }



  public function checkinvoice()
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
        
    $uniqorderid = $this->input->get('od');
    
    $getordergenraldtls=$this->TootModel->getordergenraldtlscheck($userid,$uniqorderid);

    $adrsid = $getordergenraldtls->orders_adrs_id;

    $orderadrs = $this->TootModel->getorderadrs($adrsid);

    $finalcheck_amnt=$getordergenraldtls->orders_total_offer_amount;
        
        $getinvoicedetils=$this->TootModel->getorderinvoicedtlscheck($userid,$uniqorderid);
    
    // $this->load->view('frontendtables/display_invoice',$getinvoicedetils);
     $a=array(
       'tabproducts'=>$this->TootModel->get_categories(),  
       'offertext'=>$this->TootModel->getoffertext(),   
       'ordergen'=>$getordergenraldtls,
       'orderadrs'=>$orderadrs,
       'ordid'=>$uniqorderid,
       'res'=>$getinvoicedetils,
       'offertot'=>$finalcheck_amnt,
       'content'=>'invoice_view'
       
     );

         

      $this->load->view('toottemplate',$a);
      
    }
    else
    {
      redirect('Login');
    }
  }
  
  
  public function logincheck_user_checkout()
  {
      if(isset($_SESSION["cgustid"]))
       {
          
          $userid_guest  = base64_decode($_SESSION['cgustid']);
          
          $username=$this->input->post('username');
          $passowrd=$this->input->post('userpass');
          $couponused=$this->input->post('couponused');
          
          $getuser = $this->TootModel->getuserdetails($username);

        	if($getuser->num_rows()==1)
        	{
               $userdetails=$getuser->row();
    
               $userpasswod=base64_decode($userdetails->user_password);
    
               $userlogid = $userdetails->user_id;
    
               if($userpasswod==$passowrd)
               {
                $userlogindata = array(
         			  'userdisplay' => $userdetails->user_fname,
    		        'cusername'  => $username,
    		        'userid' => base64_encode($userdetails->user_id),
    		        'userlogged_in' => TRUE		        
    			    );
    			    
    			    
			    $changeuseridcartwish = $this->TootModel->changeuseridcartwish($userid_guest,$userlogid);
			      
                  if($changeuseridcartwish==1)
                  {
                      
                           unset($_SESSION['cgustid']);
                           unset($_SESSION['usertp']);
                           unset($_SESSION['userlogged_in']);
                           
                           if($couponused!='')
                           {
                               unset($_SESSION['couponuser']);
                               $_SESSION["couponuser"] =base64_encode($userdetails->user_id);
                           }
                      
                          $this->session->set_userdata($userlogindata);
                          
                           
                          
			             echo "success";
                  }
                  else
                  {
                      echo "issue";
                  }
			
               }
               else
               {
               	echo "failed";
               }
        	}
        	else
        	{
        		echo "nouser";
        	}	

          
          
     
          
       }
       else
       {
           redirect('Login');
       }
  }
  
  
  public function reguser_checkout()
  {
        if(isset($_SESSION["cgustid"]))
       {
          
          $userid_guest  = base64_decode($_SESSION['cgustid']);
          
          
          $gender=$this->input->post('check_method');
          
          
          
          $date=date('Y-m-d');
          
          $umailid = $this->input->post('udmail');
          $upass = $this->input->post('udpass');
          
          $getsamemailcount = $this->TootModel->getsameusercount($umailid);
          
         if($getsamemailcount==0)
         {
          
          
          $userdetailsarray=array
          (
            'user_fname'=>$this->input->post('udfname'),
            'user_fname'=>$this->input->post('udlname'),
            'user_mail'=>$umailid,
            'user_gender'=>$gender,
            'user_password'=>base64_encode($this->input->post('udpass')),
            'user_dob'=>$this->input->post('uddob'),
            'user_mobile'=>$this->input->post('udmob'),
            'user_status'=>1,
            'user_date'=>$date
            
          );
          
          
          
          $res = $this->TootModel->insertusercheck($userdetailsarray);
          
          if($res!=0)
          {
          
          
              $deladrsarry=array
              (
                  'addressprofile_userid'=>$res,
                  'addressprofile_fname'=>$this->input->post('udelfname'),
                  'addressprofile_lname'=>$this->input->post('udellname'),
                  'addressprofile_mobile'=>$this->input->post('udelmob'),
                  'addressprofile_block'=>$this->input->post('udelblock'),
                  'addressprofile_hb'=>$this->input->post('udelhb'),
                  'addressprofile_city'=>$this->input->post('udelcity'),
                  'addressprofile_street'=>$this->input->post('udelsrt'),
                  'addressprofile_avenue'=>$this->input->post('udelvenue'),
                  'addressprofile_more'=>$this->input->post('udelmore'),
                  'addressprofile_date'=>$date
              );
              
              $res1 = $this->TootModel->insertadrscheck($deladrsarry);
              
              if($res1==1)
              {
                
                $getserdtils=$this->TootModel->getthisusercheck($res);
                
                $userlogindata = array(
         			  'userdisplay' => $getserdtils->user_fname,
    		        'cusername'  => $getserdtils->user_mail,
    		        'userid' => base64_encode($getserdtils->user_id),
    		        'userlogged_in' => TRUE		        
    			    );
                
                $this->session->set_userdata($userlogindata);
          
                if(isset($_SESSION["coupon"]))
                           {
                               unset($_SESSION['couponuser']);
                               $_SESSION["couponuser"] =base64_encode($getserdtils->user_id);
                           }
                           
                $changeuseridcartwish = $this->TootModel->changeuseridcartwish($userid_guest,$getserdtils->user_id);   
                if($changeuseridcartwish==1)
                {
                           
                     
                    
                    
                     $data2=array
                    (
                      'username'=>$umailid,
                      'password'=>$upass,
                      'tomail'=>$umailid,
                      'name'=>$this->input->post('udfname')
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
                    $mail->AddAddress($umailid, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "TooT Registration confirmattion";
                    $content = $this->load->view('register_mail_view',$data2,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "invalidmail";
                   
                      var_dump($mail);
                    
                    $delthisuser= $this->TootModel->deleteinvldusercheck($res);
                     
                    }
                    
                    else
                    {
                    echo "success";
                    
                    }

                }
                else
                {
                    echo "failed";
                }
              }
              else
              {
                  echo "erroroccur";
              }
          }
          else
          {
              echo "error";
          }
        }
        else
        {
            echo "mailexist";
        }
          
       }
       else
       {
           redirect('Login');
       }
  }

// checkoutpage
// contactpage	

	public function contact()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
			'contactinf'=>$this->TootModel->getcontactinf(),
            'content' => 'contact');
		$this->load->view('toottemplate',$result);
	}
	
	
	public function contactmail()
  {
                    $from= $_POST['email'];
                    $fName = $_POST['name'];
                    

                   
                    // Recipient 
                    $to = 'ansib@e4technosolutions.com'; 
                     
                    // Sender 
                    
                    
                    $phone = $_POST['mobile'];
                     
                    // Email subject 
                    $subject = $_POST['subject'];

                    $message = $_POST['message'];  
                     
                    // Attachment file 
                   
                    
                    
                    // echo $file;
                     
                    // Email body content 
                    $htmlContent = ' 
                        <h3>Career mail</h3> 
                        <p>First name : '.$fName.'</p>
                        <p>Mail id : '.$from.'</p>
                        <p>Phone : '.$phone.'</p>
                        <p>Subject : '.$subject.'</p>
                        <p>Message : '.$message.'</p> 
                    '; 
                    
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
                    $mail->AddAddress($to, "Admin");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Contact mail";
                    $content = $htmlContent;
                    
                    
                    
                    
                    
                    // $mail->AddAttachment($targetfolder);
                    
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "faild";
                   
                    var_dump($mail);
                    } else {
                    echo "success";
                    
                    }
  }



// contactpage
// faqpage	
	public function faq()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'faq');
		$this->load->view('toottemplate',$result);
	}

// faqpage
// loginpage_and_reg	
		public function login()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'login');
		$this->load->view('toottemplate',$result);
	}

    
    public function register_user()
    {
    	$umailid = $this->input->post('mailid');

    	$getsameusercount = $this->TootModel->getsameusercount($umailid);

    	if($getsameusercount==0)
    	{

           $datapas = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
           $pass = substr(str_shuffle($datapas), 0, 8);

           $userpassword=base64_encode($pass);

           $insdate = date('Y-m-d');

           $data=array
           (
           	'user_mail'=>$umailid,
           	'user_password'=>$userpassword,
           	'user_status'=>1,
           	'user_date'=>$insdate
           );

           $res = $this->TootModel->insertuser($data);

           if($res==1)
           {
           	// echo "success";

            $data2=array
            (
              'username'=>$umailid,
              'password'=>$pass,
              'tomail'=>$umailid,
              'name'=>'User'
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
                    $mail->AddAddress($umailid, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "TooT Registration Confirmation";
                    $content = $this->load->view('register_mail_view',$data2,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "faild";
                   
                    var_dump($mail);
                    } else {
                    echo "success";
                    
                    }


           }
           else
           {
           	echo "failed";
           }
    	}
    	else
    	{
    		echo "userexist";
    	}

    }


    public function logincheck_user()
    {
    	$username = $this->input->post('username');
    	$passowrd = $this->input->post('userpass');

    	$getuser = $this->TootModel->getuserdetails($username);

    	if($getuser->num_rows()==1)
    	{
           $userdetails=$getuser->row();

           $userpasswod=base64_decode($userdetails->user_password);



           if($userpasswod==$passowrd)
           {
            $userlogindata = array(
     			  'userdisplay' => $userdetails->user_fname,
		        'cusername'  => $username,
		        'userid' => base64_encode($userdetails->user_id),
		        'userlogged_in' => TRUE		        
			    );

			    $this->session->set_userdata($userlogindata);
			    echo "success";
           }
           else
           {
           	echo "failed";
           }
    	}
    	else
    	{
    		echo "nouser";
    	}	

    }
    
    
     public function forgotpasswordsend()
    {
      $mailid = $this->input->post('mailid');

      $getformaildetails = $this->TootModel->getformaildetails($mailid);

      if($getformaildetails->num_rows()==1)
      {
         $userdtl = $getformaildetails->row();

         $name= $userdtl->user_fname;

         $forgotkey=rand(1000,10000);

         $forg_datetime=date('Y-m-d h:i:s');

         $data=array('user_pass_key'=>$forgotkey,'user_forgotkey_datetime'=>$forg_datetime);

         $res = $this->TootModel->insertforgtkey($data,$mailid);
         
         if($res==1)
         {

              $data2=array
                (
                  'name'=>$name,
                  'username'=>base64_encode($mailid),
                  'tomail'=>$mailid,
                  'resetcode'=>base64_encode($forgotkey)
                  
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
                    $mail->AddAddress($mailid, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "TooT Password Recovery";
                    $content = $this->load->view('forgotpass_mail_view',$data2,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "faild";
                   
                    var_dump($mail);
                    } else {
                    echo "success";
                    
                    }
           }
           else
           {
            echo "failed";
           }

      }
      else
      {
        echo "noexist";
      }

    }

    public function resetpassword()
    {
      $resetcode = base64_decode($this->input->get('cod'));

      $mailid = base64_decode($this->input->get('uname'));

      $a=array(
        'mailid'=>$mailid,
        'rescode'=>$resetcode,
        'content'=>'reset_password'
      );
      $this->load->view('toottemplate',$a);
    }

    public function checkreset()
    {
      $newpas = $this->input->post('newpas');
      $resmail = $this->input->post('resmail');
      $rescode = $this->input->post('rescode');

     

      $datetime = date('Y-m-d h:i:s');

      $getmaildetails = $this->TootModel->getmaildetails_rest($resmail);
      
      $paskey = $getmaildetails->user_pass_key;
      $paskeydate = $getmaildetails->user_forgotkey_datetime;

      if($paskey==$rescode)
      {
          $date1 = new DateTime($paskeydate);
            $date2 = new DateTime($datetime);
            
            $diff = $date2->diff($date1);
            
            $hours = $diff->h;
            $hours = $hours + ($diff->days*24);

            if($hours< 24)
            {
              $data1=array('user_password'=>base64_encode($newpas));
               $res123 = $this->TootModel->updatepass_frg($data1,$resmail);
               if($res123==1)
               {
                echo "success";
               }
               else
               {
                echo "failed";
               }
            }
            else
            {
              echo "expired";
            }
      }
      else
      {
        echo "invalidcod";
      }

    }



    public function logincheck_user_mail()
    {
      $username = $this->input->get('username');
      $passowrd = $this->input->get('userpass');

      $getuser = $this->TootModel->getuserdetails($username);

      if($getuser->num_rows()==1)
      {
           $userdetails=$getuser->row();

           $userpasswod=base64_decode($userdetails->user_password);



           if($userpasswod==$passowrd)
           {
              $userlogindata = array(
              'userdisplay' => $userdetails->user_fname,
              'cusername'  => $username,
              'userid' => base64_encode($userdetails->user_id),
              'userlogged_in' => TRUE           
              );

             $this->session->set_userdata($userlogindata);
            
              redirect('Home');
            
          
           }
           else
           {
            echo "failed";
           }
      }
      else
      {
        echo "nouser";
      } 

    }


    public function logoutuser()
    {
    	unset(
	        $_SESSION['userdisplay'],
	        $_SESSION['cusername'],
	        $_SESSION['userid'],
	        $_SESSION['userlogged_in']
	       );
		redirect('Home');
    }


// loginpage_and_reg
// myaccount	
	public function myaccount()
	{
	  if(isset($_SESSION['cusername']))
    {	
           
            $userid=base64_decode($_SESSION['userid']);	
            
            $getuserdetails=$this->TootModel->getuserdtls($userid);

			$result=array(
				'tabproducts'=>$this->TootModel->get_categories(),
        'offertext'=>$this->TootModel->getoffertext(),
        'city_list'=>$this->TootModel->getcity(),
                'userinf'=>$getuserdetails,
                'pagetype'=>'myaccount',
	            'content' => 'my-account');
			$this->load->view('toottemplate',$result);
	   }
	   else
	   {
	   	redirect('Home');
	   }
	}


	public function update_personalinfo()
	{
      if(isset($_SESSION['cusername']))
      {	
           
           $userid=base64_decode($_SESSION['userid']);

		$gender=$this->input->post('check_method');

		$date=date('Y-m-d');

		$newpass=$this->input->post('unewpass');

		if($newpass!='')
		{	

			$data=array
			(
	          'user_fname'=>$this->input->post('ufname'),
	          'user_lname'=>$this->input->post('ulname'),
	          'user_mail'=>$this->input->post('umail'),
	          'user_gender'=>$gender,
	          // 'user_password'=>base64_encode($newpass),
	          'user_dob'=>$this->input->post('udob'),
            'user_mobile'=>$this->input->post('umob'),
	          'user_date'=>$date
			);
	    }
	    else
	    {
	    	$data=array
			(
	          'user_fname'=>$this->input->post('ufname'),
	          'user_lname'=>$this->input->post('ulname'),
	          'user_mail'=>$this->input->post('umail'),
	          'user_gender'=>$gender,
	          'user_dob'=>$this->input->post('udob'),
            'user_mobile'=>$this->input->post('umob'),
	          'user_date'=>$date
			);
	    }

	    $res = $this->TootModel->updateuserinfo($userid,$data);

	    if($res==1)
	    {
	    	echo "success";
	    }
	    else
	    {
	    	echo "failed";
	    }

	  }
	  else
	  {
	  	redirect('Home');
	  }  
	   
	}

  // changepass

  public function changepassword()
  {
     if(isset($_SESSION['cusername']))
        {
            $userid=base64_decode($_SESSION['userid']);

            $newpass = $this->input->post('changnpass');

            $cunfpass = $this->input->post('changcpass');

            $currendpass = $this->input->post('changcrpass');

            $getsamepassuser = $this->TootModel->getuserdailspas($userid);

           $user_pass = base64_decode($getsamepassuser->user_password);

            if($user_pass==$currendpass)
            {
                   if($newpass==$cunfpass)
                   {
                      $data=array('user_password'=>base64_encode($newpass));

                      $res321 = $this->TootModel->updatepasswod($data,$userid);

                      if($res321==1)
                      {
                        echo "success";
                      }
                      else
                      {
                        echo "failed";
                      }
                   }
                   else
                   {
                     echo "passconfail";
                   }
            }
            else
            {
                   echo "passwordincorrect";
            }
        }
        else
        {
          redirect('Login');
        }
  }

  // changepass


	public function checkmailex()
	{
        if(isset($_SESSION['cusername']))
        {	
           
           $userid=base64_decode($_SESSION['userid']);

		   $mailid = $this->input->post('mailid');

		   $getsamemail = $this->TootModel->getsamemail($mailid);

		   if($getsamemail->num_rows()==0)
		   {
             echo "success";
		   }
		   else
		   {
              $samemaildetails=$getsamemail->row();
              $samemail_id=$samemaildetails->user_id;

             

              if($samemail_id==$userid)
              {
              	echo "success";
              }
              else
              {
              	echo "mailexist";
              }
		   }
	    }
	    else
	    {
	       redirect('Home');
	    }

	}

	public function checkcurpass()
	{
		if(isset($_SESSION['cusername']))
        {
          $userid=base64_decode($_SESSION['userid']);

		  $curpass = $this->input->post('curpass');

		  $getsamepassuser = $this->TootModel->getuserdailspas($userid);

		  $user_pass = base64_decode($getsamepassuser->user_password);

		  if($user_pass==$curpass)
		  {
             echo "success";
		  }
		  else
		  {
             echo "failed";
		  }


        }
        else
        {
        	redirect('Home');
        }

	}


	public function getadresedit()
	{
		if(isset($_SESSION['cusername']))
        {
          $userid=base64_decode($_SESSION['userid']);

          $adrs_id = $this->input->post('adrsid');

          $getadrsdtls=$this->TootModel->getadrsdetlsedit($userid,$adrs_id);

             echo json_encode($getadrsdtls);
           
         

        } 
        else
        {
        	redirect('Home');
        } 
	}


	public function updateadrs()
	{
       if(isset($_SESSION['cusername']))
        {
          $userid=base64_decode($_SESSION['userid']);


          $adrid = $this->input->post('adrid');

          $getadrscount = $this->TootModel->getadrscountedit($userid);
          $adrscount=$getadrscount->adrscount;
      
             $data=array(
               'addressprofile_userid'=>$userid,
               'addressprofile_fname'=>$this->input->post('adrfname'),
               'addressprofile_lname'=>$this->input->post('adrlname'),
               'addressprofile_mobile'=>$this->input->post('adrmob'),
               'addressprofile_block'=>$this->input->post('adrblock'),
               'addressprofile_hb'=>$this->input->post('adrhb'),
               'addressprofile_city'=>$this->input->post('adrarea'),
               'addressprofile_street'=>$this->input->post('adrstreet'), 
               'addressprofile_avenue'=>$this->input->post('adravenue'),  
               'addressprofile_more'=>$this->input->post('adrmore'),   
               'addressprofile_date'=>date('Y-m-d') 

               );
            
           if($adrid!='')
           {
               $res=$this->TootModel->updateadrs($data,$userid,$adrid);

              if($res==1)
              {
                echo "success";
              }
              else
              {
                echo "failed";
              } 
           } 
           else
           {
            echo "invalidadrs";
           } 
          	

        }
        else
        {
        	redirect('Home');
        }  
	}


  public function addnewaddress()
  {
    if(isset($_SESSION['cusername']))
        {
          $userid=base64_decode($_SESSION['userid']);

          $data = array
          (
            'addressprofile_userid'=>$userid,
            'addressprofile_fname'=>$this->input->post('adraddfname'),
            'addressprofile_lname'=>$this->input->post('adraddlname'),
            'addressprofile_city'=>$this->input->post('adraddarea'),
            'addressprofile_mobile'=>$this->input->post('adraddmob'),
            'addressprofile_mobile'=>$this->input->post('adraddmob'),
            'addressprofile_street'=>$this->input->post('adraddstreet'),
            'addressprofile_block'=>$this->input->post('adraddblock'),

            'addressprofile_hb'=>$this->input->post('adraddhb'),

            'addressprofile_avenue'=>$this->input->post('adraddavenue'),
            'addressprofile_more'=>$this->input->post('adraddmore'),

            'addressprofile_date'=>date('Y-m-d') 
          );

          $res = $this->TootModel->insertnewaddress($data);

          if($res==1)
          {
            echo "success";
          }
          else
          {
            echo "failed";
          }  

        }
        else
        {
          redirect('Login');
        }  
  }


  public function deleteadrress()
  {
    if(isset($_SESSION['cusername']))
        {
          $userid = base64_decode($_SESSION['userid']);

          $adrid = $this->input->post('adrid');

          $res = $this->TootModel->deleteaddress($adrid,$userid);
          if($res==1)
          {
            echo "success";
          }
          else
          {
            echo "failed";
          }
        }
        else
        {
          redirect('Login');
        }  
  }

	public function filladressview()
	{
		if(isset($_SESSION['cusername']))
        {
          $userid = base64_decode($_SESSION['userid']);
          
          $getadress['res'] = $this->TootModel->getadressusershow($userid);

          // if(empty($getadress))
          // {
          //    $getadress=(object) array
          //    (
          //      'addressprofile_fname'=>'',
          //      'addressprofile_lname'=>'',
          //      'addressprofile_company'=>'',
          //      'addressprofile_address'=>'',
          //      'addressprofile_state'=>'',
          //      'addressprofile_city'=>'',
          //      'addressprofile_street'=>'',
          //      'addressprofile_pin'=>''
          //    );

          //    echo json_encode($getadress);
          // }
          // else
          // {
          //    echo json_encode($getadress);
          // }	

          $this->load->view('frondendtable/addresses_display',$getadress);

        }
        else
        {
        	redirect('Home');
        }  

	}

// myaccount
// offerspage	
	public function offers()
	{ 
    // if offer image page is needed to go to offer products
		// $result=array(
		// 	'tabproducts'=>$this->TootModel->get_categories(),
  //     'offertext'=>$this->TootModel->getoffertext(),
  //     'offers'=>$this->TootModel->get_offers(),
  //           'content' => 'offers');
		// $this->load->view('toottemplate',$result);

    //to go to directly to offer product list
    redirect('index.php/TootController/offer_products');
	}

// offerspage

// offer productspage 
  public function offer_products()
  {
    //to go from offer page to offer product page
    // $discount_start = $this->input->get('discount_start');
    // $discount_end = $this->input->get('discount_end');
    // $sub_cat_id = $this->input->get('sub_cat_id');


    // $discount_start = base64_decode(strtr($discount_start, '-_,', '+/='));
    // $discount_end = base64_decode(strtr($discount_end, '-_,', '+/='));
    // $sub_cat_id = base64_decode(strtr($sub_cat_id, '-_,', '+/='));
    
    
    // $offerprods = $this->TootModel->get_offer_products($sub_cat_id,$discount_start,$discount_end);


    //to go to directly to offer product list
    $offerprods = $this->TootModel->get_all_offer_products();


    $prodcount = $offerprods->num_rows();
    
    

    $result=array(
            //'subid'=>$sub_cat_id,
            'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'subproducts'=>$offerprods->result(),
            //'dstart'=>$discount_start,
            //'dend'=>$discount_end,
            'prodcount'=>$prodcount,
            'content' => 'offer_products');
    $this->load->view('toottemplate',$result);
  }

//offer productspage
// productdetailspage	

	public function productdetails()
	{

    $pid=base64_decode($this->input->get('pid'));

    $getsingleprod=$this->TootModel->getsingleprod($pid);
    
    $getprodsubdetils_single=array();
    
        if(!empty($getsingleprod))
        {
            $prod_sub = $getsingleprod->product_subcategory;
            $getprodsubdetils_single = $this->TootModel->getprodsubdetils_single($prod_sub);
        
        }

		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
      'singleprod'=>$getsingleprod,
      'prod_subcat'=>$getprodsubdetils_single,
      'content' => 'product-details'
      );
		$this->load->view('toottemplate',$result);
	}

// productdetailspage
// productspage	
	public function products()
	{

        $subcatid = $this->input->get('sid');


    $subid = base64_decode(strtr($subcatid, '-_,', '+/='));
    
    $getsubdetils = $this->TootModel->getsubdetials($subid);

    $getsub_divisions = $this->TootModel->getsub_divisions($subid);

    $getsubprods = $this->TootModel->getsubcatprods($subid);

    $prodcount = $getsubprods->num_rows();

		$result=array(
            'subid'=>$subid,
			      'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'subproducts'=>$getsubprods->result(),
            'prodcount'=>$prodcount,
            'subdtl'=>$getsubdetils,
            'subdivs'=>$getsub_divisions,
            'content' => 'products'
             );
		$this->load->view('toottemplate',$result);
	}

// productspage


//divisionprods

public function divisionproducts()
{
 $divsid =  $this->input->get('divsid');

 $divprods = $this->TootModel->getdivcatprods($divsid);

 $prodcount = $divprods->num_rows();

 $getdivsubdetils = $this->TootModel->getdivsubdetils($divsid);


 $result=array(
            
            'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'divproducts'=>$divprods->result(),
            'prodcount'=>$prodcount,
            'subdtl'=>$getdivsubdetils,
            'content' => 'division_products'
             );
    $this->load->view('toottemplate',$result);
 
}

//divisionprods 

// new productspage 
  public function newproducts()
  {
      
    $newprods = $this->TootModel->getnewcatprods();  
    
    $prodcount = $newprods->num_rows();

    $result=array(
            'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'newproducts'=>$newprods->result(),
            'prodcount'=>$prodcount,
            'content' => 'new_products');
    $this->load->view('toottemplate',$result);
  }

// new productspage

// recruitmentpage	
		public function recruitment()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'recruitment');
		$this->load->view('toottemplate',$result);
	}
	
	
	public function recrutmail()
  {
      $from= $_POST['email'];
                    $fName = $_POST['fname'];
                    $lName = $_POST['lname'];

                    
                    $targetfolder = "./uploads";
                    
                    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
                    
                    $ok=1;
                    
                    $file_type=$_FILES['file']['type'];
                    
                        if ($file_type=="application/pdf") {
                        
                        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
                        
                         {
                        
                        //  echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
                        
                         }
                        
                         else
                         {
                        
                        //  echo "Problem uploading file";
                        
                         }
                    
                    }
                    
                    else 
                    {
                    
                        echo "You may only upload PDFs files.<br>";
                    
                    }
                    
                    
                    // Recipient 
                    $to = 'ansib@e4technosolutions.com'; 
                     
                    // Sender 
                    
                    
                    $phone = $_POST['mobile'];
                     
                    // Email subject 
                    $profession = $_POST['profession'];

                    $message = $_POST['message'];  
                     
                    // Attachment file 
                    $file = $targetfolder; 
                    
                    
                    // echo $file;
                     
                    // Email body content 
                    $htmlContent = ' 
                        <h3>Career mail</h3> 
                        <p>First name : '.$fName.'</p>
                        <p>Last name : '.$lName.'</p>
                        <p>Mail id : '.$from.'</p>
                        <p>Phone : '.$phone.'</p>
                        <p>Profession wanted : '.$profession.'</p>
                        <p>Message : '.$message.'</p> 
                    '; 
                    
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
                    $mail->AddAddress($to, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Career Request";
                    $content = $htmlContent;
                    
                    
                    
                    
                    
                    $mail->AddAttachment($targetfolder);
                    
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "faild";
                   
                    var_dump($mail);
                    } else {
                    echo "success";
                    
                    }
                    
  }

// recruitmentpage
// noticepage	
	public function notice()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'rgpd-notice');
		$this->load->view('toottemplate',$result);
	}

// noticepage	
// helppage	

	public function help()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'shopping-help');
		$this->load->view('toottemplate',$result);
	}

// helppage	
// sitemappage		
	public function sitemap()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
			'offers'=>$this->TootModel->get_offers(),
            'content' => 'sitemap');
		$this->load->view('toottemplate',$result);
	}

// sitemappage
// storepage	
		public function store()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
            'content' => 'store');
		$this->load->view('toottemplate',$result);
	}

// storepage
// salepage	
	public function sale()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
      'pagetext'=>$this->TootModel->gepagetext_sale(),
            'content' => 'terms-of-sale');
		$this->load->view('toottemplate',$result);
	}

// salepage	
// usepage		
	public function use()
	{
		$result=array(
			'tabproducts'=>$this->TootModel->get_categories(),
      'offertext'=>$this->TootModel->getoffertext(),
      'pagetext'=>$this->TootModel->gepagetext_use(),
            'content' => 'terms-of-use');
		$this->load->view('toottemplate',$result);
	}

// usepage	
//wishlist


  public function wishlistadding()
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

          $prodid = $this->input->post('pid');

          $getsameprodwishcount = $this->TootModel->getsameprodwishcount($prodid,$userid);

          $date=date('Y-m-d');

          if($getsameprodwishcount==0)
          {
             $data=array
             (
              'wishlist_prod_id'=>$prodid,
              'wishlist_user_id'=>$userid,
              'wishlist_date'=>$date
             );

             $res=$this->TootModel->insertwishlist($data);
             if($res==1)
             {
              echo "success";
             }
             else
             {
              echo "failed";
             }
          }
          else
          {
            echo "prodexist";
          } 

        }
        else
        {
          redirect('Login');
        }  
  }


  function getwishlistcount()
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

          $getwishcount = $this->TootModel->getwishcount($userid);

          echo $getwishcount;

        }
        else
        {
          echo "0";
        }   
  }

  public function wishlist()
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

          $getuserdetails=$this->TootModel->getuserdtls($userid);
          
          $result=array(   
              'tabproducts'=>$this->TootModel->get_categories(),
              'offertext'=>$this->TootModel->getoffertext(),
              'userinf'=>$getuserdetails,
              'pagetype'=>'wishlist',
              'content' => 'my-account'

             );
           $this->load->view('toottemplate',$result);

        }
        else
        {
          redirect('Login');
        }    
  }


  public function getwishlisttable()
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

      $res['wish']=$this->TootModel->getwishlistitems($userid);

      $this->load->view('frondendtable/wishlisttable',$res);
    }
    else
    {
      redirect('Login');
    }
  }


  public function removewishitem()
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

      $wishid = $this->input->post('wid');

      $res = $this->TootModel->removewishitem($userid,$wishid);

      if($res==1)
      {
        echo "success";
      }
      else
      {
        echo "failed";
      }
    }
    else
    {
      redirect('Login');
    }
  }


//wishlist  
//orders

public function getorders()
{
    if(isset($_SESSION['cusername']))
      {
          $userid = base64_decode($_SESSION['userid']);

          $a['getorders'] = $this->TootModel->getorders($userid);

          $this->load->view('frondendtable/orders_table',$a);
       
      }
      else
      {
        redirect('Login');
      }     
}

public function orderdetails()
{

  if(isset($_SESSION['cusername']))
      {
          $userid = base64_decode($_SESSION['userid']);

          $orderid = $this->input->get('oid');

          $generaldtls = $this->TootModel->getordergeneraldetals($orderid,$userid);

          $productdtails = $this->TootModel->getproductdtails($orderid,$userid);

          $addressdtls = $this->TootModel->getaddressdtls($userid);

          $result=array(
            'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'gen'=>$generaldtls,
            'adrs'=>$addressdtls,
            'prods'=>$productdtails,
            'content' => 'orderdetails');
         $this->load->view('toottemplate',$result);


      }
      else
      {
        redirect('Login');
      }       

}


public function cancelorderfull()
{
      if(isset($_SESSION['cusername']))
      {
          $userid = base64_decode($_SESSION['userid']);

          $orderid = $this->input->post('orderid');

          $getuserinfo = $this->TootModel->getuserinfocancel($userid);

          $umailid = $getuserinfo->user_mail;

          $res = $this->TootModel->cancelorder($orderid,$userid);

          if($res==1)
          {
              $data2=array
            (
              'orderid'=>$orderid,              
              'tomail'=>$umailid,
              'name'=>'User'
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
                    $mail->AddAddress($umailid, "User");
                    $mail->SetFrom("infotootq8@gmail.com", "TOOT Store Kuwait");
                    $mail->AddReplyTo("infotootq8@gmail.com", "TOOT Store Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Order Cancel Confirmation";
                    $content = $this->load->view('ordercancel_mail',$data2,TRUE);
                    
                    $mail->MsgHTML($content); 
                    if(!$mail->Send()) {
                    echo "faild";
                   
                    var_dump($mail);
                    } else {
                    echo "success";
                    
                    }
          }
          else
          {
            echo "failed";
          }  

      }
      else
      {
        redirect('Login');
      }  
}

//orders 
//search


public function Searchitem()
{
  $searchkey = $this->input->post('searchkey');

  $getsearchprds = $this->TootModel->getsearchprds($searchkey);


  $prodcount= $getsearchprds->num_rows();


   $result=array(
            'tabproducts'=>$this->TootModel->get_categories(),
            'offertext'=>$this->TootModel->getoffertext(),
            'searchprods'=>$getsearchprds->result(),
            'prodcount'=>$prodcount,
            'content' => 'search_view');
         $this->load->view('toottemplate',$result);


}

//search

//product sorting

public function sortpyprice_or_name_sub()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

 
  $res['priceprds'] = $this->TootModel->getpricenamesortprods_sub($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysizesheo_sub()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizenosheo_sortprods_sub($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysize_sub()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeno_sortprods_sub($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}


public function sortsizeltr_sub()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeltr_sortprods_sub($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

//product sorting

//product division sorting

public function sortpyprice_or_name_divs()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

 
  $res['priceprds'] = $this->TootModel->getpricenamesortprods_div($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysizesheo_divs()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizenosheo_sortprods_div($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysize_divs()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeno_sortprods_div($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}


public function sortsizeltr_divs()
{
  $subid = $this->input->post('subid');
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeltr_sortprods_div($subid,$sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}


//product division sorting

//product new sorting

public function sortpyprice_or_name_new()
{
  
  $sortkey = $this->input->post('sortkey');

 
  $res['priceprds'] = $this->TootModel->getpricenamesortprods_new($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysizesheo_new()
{
  
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizenosheo_sortprods_new($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysize_new()
{
  
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeno_sortprods_new($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}


public function sortsizeltr_new()
{
  
  $sortkey = $this->input->post('sortkey');

  $res['priceprds'] = $this->TootModel->getsizeltr_sortprods_ofr($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

//product new sorting

//product offer sorting

public function sortpyprice_or_name_ofr()
{
  
  $sortkey = $this->input->post('sortkey');
//   $subid = $this->input->post('subid');
//   $dstart = $this->input->post('dstart');
//   $dend = $this->input->post('dend');

 
  $res['priceprds'] = $this->TootModel->getpricenamesortprods_ofr($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysizesheo_ofr()
{
  
  $sortkey = $this->input->post('sortkey');
//   $subid = $this->input->post('subid');
//   $dstart = $this->input->post('dstart');
//   $dend = $this->input->post('dend');

  $res['priceprds'] = $this->TootModel->getsizenosheo_sortprods_ofr($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

public function sortpysize_ofr()
{
  
  $sortkey = $this->input->post('sortkey');
//   $subid = $this->input->post('subid');
//   $dstart = $this->input->post('dstart');
//   $dend = $this->input->post('dend');

  $res['priceprds'] = $this->TootModel->getsizeno_sortprods_ofr($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}


public function sortsizeltr_ofr()
{
  
  $sortkey = $this->input->post('sortkey');
//   $subid = $this->input->post('subid');
//   $dstart = $this->input->post('dstart');
//   $dend = $this->input->post('dend');

  $res['priceprds'] = $this->TootModel->getsizeltr_sortprods_ofr($sortkey);

  $this->load->view('frondendtable/sort_products',$res);
}

//product offer sorting

//news subscription

public function news_subscrioption()
{
   $mailid = $this->input->post('email');

   $res = $this->TootModel->getmailcount_subscrp($mailid);

   if($res==0)
   {
     $data=array
     (
      'newssub_mail'=>$mailid,
      'newssub_date'=>date('Y-m-d')
     );

     $res123 = $this->TootModel->insert_subscription($data);

     if($res123==1)
     {
      echo "success";
     }
     else
     {
      echo "failed";
     }
   }
   else
   {
    echo "subscribed";
   } 
}
//news subscription 

//checkout address listing

public function listaddress_check()
{
   if(isset($_SESSION['cusername']))
      {
          $userid = base64_decode($_SESSION['userid']);

          $getuseradrs['res'] = $this->TootModel->getuseradress_check($userid); 

          $this->load->view('frondendtable/listaddresscheck',$getuseradrs);

      }
      else
      {
        echo "";
      }    
}

public function showproperadrs_check()
{
    $adrid = $this->input->post('adrsid');

    $res = $this->TootModel->showproperadrs_check($adrid);

    echo json_encode($res);
}

//checkout address listing


}