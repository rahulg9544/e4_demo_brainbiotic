<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BabiesController extends CI_Controller {

function __construct() {
    	parent::__construct();
    	$this->load->model('BabiesModel');
    	$this->load->library('session');
    	// $this->load->library('encryption');
    	
	}	

// homepage
	public function index()
	{
	    
	    
		 $result=array(
		 	'slider'=>$this->BabiesModel->getslides(),
      'res'=>$this->BabiesModel->getcategorieslides(),
            'content' => 'index'
        );
		$this->load->view('babiestemplate',$result);

	}


  public function getcategorieslides()
  {
    $a['res'] = $this->BabiesModel->getcategorieslides();

    $this->load->view('frondendtable/catlidershow',$a);
  }


// homepage

// aboutpage
	public function about()
	{
	    
	    
		 $result=array(

            'details'=>$this->BabiesModel->getaboutpagedetails(),
		 	
            'content' => 'about'
        );
		$this->load->view('babiestemplate',$result);
	}


// aboutpage

// contactpage
	public function contact()
	{
	    
	    
		 $result=array(
		 	      'details'=>$this->BabiesModel->getcontactpagedetails(),
            'content' => 'contact'
        );
		$this->load->view('babiestemplate',$result);
	}

  public function sendcontactmail()
  {
       $name = $this->input->post('name');
       $email = $this->input->post('email');
       $phone = $this->input->post('phone');
       $subject = $this->input->post('subject');
       $message = $this->input->post('message');

       $to = "info@babiesmoments.com";

          $data2=array
                (
                  'name'=>$name,
                  'email'=>$email,
                  'phone'=>$phone,
                  'message'=>$message,
                  'subject'=>$subject
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
                    $mail->Username   = "babiesmoments598@gmail.com";

                    $mail->Password   = "babiesmoments@123";
                    
                    $mail->IsHTML(true);
                    $mail->AddAddress($to, "User");
                    $mail->SetFrom("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    $mail->AddReplyTo("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Contact Mail";
                    $content = $this->load->view('contact_mail',$data2,TRUE);
                    
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
		 	      'details'=>$this->BabiesModel->getfaqdtils(),
            'content' => 'faq'
        );
		$this->load->view('babiestemplate',$result);
	}


// faqpage

// deliverypolicypage
	public function deliverypolicy()
	{
	    
	    
		 $result=array(
		 	      'details'=>$this->BabiesModel->getdeliverypolicydtils(),
            'content' => 'deliverypolicy'
        );
		$this->load->view('babiestemplate',$result);
	}


// deliverypolicypage	

// returnpolicypage
	public function returnpolicypage()
	{
	    
	    
		 $result=array(
		 	       'details'=>$this->BabiesModel->getreturnplicydtils(),
            'content' => 'returnpolicypage'
        );
		$this->load->view('babiestemplate',$result);
	}


// returnpolicypage

// termsalespage
	public function termsalespage()
	{
	    
	    
		 $result=array(
		 	      'details'=>$this->BabiesModel->gettermsalesdtils(),
            'content' => 'termsalespage'
        );
		$this->load->view('babiestemplate',$result);
	}


// termsalespage

// loginregisterpage
	public function loginreg()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'loginreg'
        );
		$this->load->view('babiestemplate',$result);
	}

	public function userreg()
	{
		$cusname = $this->input->post('regname');
		$cusmail = $this->input->post('regmail');
		$regmob = $this->input->post('regmob');

		// echo $cusname.$cusmail.$regmob;
		// die();

		$getsameusercount = $this->BabiesModel->getsameusercount($cusmail,$regmob);

		if($getsameusercount==0)
		{
			 $datapas = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
           $pass = substr(str_shuffle($datapas), 0, 8);

           $userpassword=base64_encode($pass);

           $insdate = date('Y-m-d');

           $data=array
           (
           	'user_fname'=>$this->input->post('regname'),
           	'user_mail'=>$this->input->post('regmail'),
           	'user_password'=>$userpassword,
           	'user_mobile'=>$this->input->post('regmob'),
           	'user_status'=>1,
           	'user_date'=>$insdate
           );

           $res = $this->BabiesModel->insertuser($data);
   
           if($res==1)
           {
		           	   $data2=array
		            (
		              'username'=>$cusmail,
		              'password'=>$pass,
		              'tomail'=>$cusmail,
		              'name'=>$cusname
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
                    $mail->Username   = "babiesmoments598@gmail.com";

                    $mail->Password   = "babiesmoments@123";
                    
                    $mail->IsHTML(true);
                    $mail->AddAddress($cusmail, "User");
                    $mail->SetFrom("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    $mail->AddReplyTo("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Babies Moments Registration Confirmation";
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
			echo "exist";
		}
	}


	public function logincheck_user()
    {
    	$username = $this->input->post('username');
    	$passowrd = $this->input->post('userpass');
    	$rememberMe = $this->input->post('rememberMe');

    	$getuser = $this->BabiesModel->getuserdetails($username);

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


                if($rememberMe==1)
                {
                	$expiry = time()+ (10*365*24*60*60);

                	$this->input->set_cookie ("remcusername", $username, $expiry);
                	$this->input->set_cookie ("remcpassword", $userpasswod, $expiry);

                	echo "success";
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
    		echo "nouser";
    	}	

    }


	   public function logincheck_user_mail()
    {
      $username = $this->input->get('username');
      $passowrd = $this->input->get('userpass');

      $getuser = $this->BabiesModel->getuserdetails($username);

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


// loginregisterpage	


// myaccountpage
	public function myaccount()
	{
	   if(isset($_SESSION['cusername']))
     {	 
	    
			 $result=array(
			 	      
	            'content' => 'myaccount'
	        );
			$this->load->view('babiestemplate',$result);
	   }
	   else
	   {
            redirect('Home');
	   }		
	}

	public function listadrresses()
	{
	  if(isset($_SESSION['cusername']))
       {

          $userid=base64_decode($_SESSION['userid']);	

		  $a['res']=$this->BabiesModel->getalladrress($userid);

		  $this->load->view('frondendtable/addresses_display',$a);
	   }
	   else
	   {
            redirect('Home');
	   }	
	}

  public function getpersonalinfo()
  {
     if(isset($_SESSION['cusername']))
     {

          $userid=base64_decode($_SESSION['userid']); 

          $res=$this->BabiesModel->getpersonaldetails($userid);

          echo json_encode($res);
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
          $cur_pass = $this->input->post('curpass');

          $userid=base64_decode($_SESSION['userid']); 

          $res=$this->BabiesModel->getpersonaldetails($userid);

          if(base64_decode($res->user_password)==$cur_pass)
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


  public function updatePersonalinfo()
  {
    if(isset($_SESSION['cusername']))
     {

       $userid=base64_decode($_SESSION['userid']);

       $fname = $this->input->post('fname');

       $mailid = $this->input->post('mailid'); 

       $getsamemail = $this->BabiesModel->getsamemaildetils($mailid);

         if($getsamemail->num_rows()==0)
        {
            if($fname=='')
           {
               $data=array
               (
                'user_fname'=>$fname,
                'user_lname'=>$this->input->post('lname'),
                'user_displayname'=>$this->input->post('disname'),
                'user_mail'=>$mailid
               );

           }
           else
           {
               $data=array
               (
                'user_fname'=>$fname,
                'user_lname'=>$this->input->post('lname'),
                'user_displayname'=>$this->input->post('disname'),
                'user_mail'=>$mailid,
                'user_password'=>base64_encode($this->input->post('newpas'))
               );
           }

           $res321 = $this->BabiesModel->updateuserinfo($data,$userid);

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

           $samemaildtls = $getsamemail->row();

           if($samemaildtls->user_id==$userid)
           {

                if($fname=='')
                 {
                     $data=array
                     (
                      'user_fname'=>$fname,
                      'user_lname'=>$this->input->post('lname'),
                      'user_displayname'=>$this->input->post('disname'),
                      'user_mail'=>$mailid
                     );

                 }
                 else
                 {
                     $data=array
                     (
                      'user_fname'=>$fname,
                      'user_lname'=>$this->input->post('lname'),
                      'user_displayname'=>$this->input->post('disname'),
                      'user_mail'=>$mailid,
                      'user_password'=>base64_encode($this->input->post('newpas'))
                     );
                 }

                $res321 = $this->BabiesModel->updateuserinfo($data,$userid);

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
             echo "mailexist";
           }

        }

       
     }
     else
     {
       redirect('Home');
     } 

  }


// myaccountpage	

// addaddresspage
	public function addaddress()
	{
	   if(isset($_SESSION['cusername']))
       {
	    
			 $result=array(
			 	
			 	'area' => $this->BabiesModel->getareas(),
	            'content' => 'add_address'
	        );
			$this->load->view('babiestemplate',$result);
	   }
	   else
	   {
            redirect('Home');
	   }	
	}



	public function insertaddress()
	{
		if(isset($_SESSION['cusername']))
       {
            $userid=base64_decode($_SESSION['userid']);

            $inv_fname = $this->input->post('invfname');
            $inv_lname = $this->input->post('invlname');
            $inv_mail = $this->input->post('invmail');
            $invstreet = $this->input->post('invstreet');
            $invarea = $this->input->post('invarea');
            $invblock = $this->input->post('invblock');
            $invavenuebld = $this->input->post('invavenuebld');
            $invhousflat = $this->input->post('invhousflat');
            $invmobile = $this->input->post('invmobile');
            $invmail = $this->input->post('invmail');

            $addressinvo = $this->input->post('addressinvo');

            if($addressinvo!=1)
            {
              $addressinvo=0;
            }

            if($inv_fname=='')
            {
            	$inv_fname = $this->input->post('adrfname');
            }

            if($inv_lname=='')
            {
            	$inv_lname = $this->input->post('adrlname');
            }

            if($inv_mail=='')
            {
            	$inv_mail = $this->input->post('adrmail');
            }

            if($invstreet=='')
            {
            	$invstreet = $this->input->post('adrstreet');
            }

            if($invarea=='')
            {
            	$invarea = $this->input->post('adrarea');
            }

            if($invblock=='')
            {
            	$invblock = $this->input->post('adrblock');
            }

            if($invavenuebld=='')
            {
            	$invavenuebld = $this->input->post('adravenubuld');
            }

            if($invhousflat=='')
            {
            	$invhousflat = $this->input->post('adrhousflat');
            }

            if($invmobile=='')
            {
            	$invmobile = $this->input->post('adrmobile');
            }

            if($invmail=='')
            {
              $invmail = $this->input->post('adrmail');
            }


            $data=array
            (
              'addressprofile_userid'=>$userid,
              'addressprofile_fname'=>$this->input->post('adrfname'),
              'addressprofile_lname'=>$this->input->post('adrlname'),
              'addressprofile_mobile'=>$this->input->post('adrmobile'),
              'addressprofile_city'=>$this->input->post('adrarea'),
              'addressprofile_street'=>$this->input->post('adrstreet'),
              'addressprofile_block'=>$this->input->post('adrblock'),
              'addressprofile_hb'=>$this->input->post('adrhousflat'),
              'addressprofile_avenue'=>$this->input->post('adravenubuld'),
              'addressprofile_inv_fname'=>$inv_fname,
              'addressprofile_inv_lname'=>$inv_lname,
              'addressprofile_inv_mobile'=>$invmobile,
              'addressprofile_inv_city'=>$invarea,
              'addressprofile_inv_street'=>$invstreet,
              'addressprofile_inv_block'=>$invblock,
              'addressprofile_inv_hb'=>$invhousflat,
              'addressprofile_inv_avenue'=>$invavenuebld,
              'addressprofile_inv_status'=>$addressinvo,
              'addressprofile_mail'=>$this->input->post('adrmail'),
              'addressprofile_inv_mail'=>$invmail,
              'addressprofile_date'=>date('Y-m-d')
            );

            $res = $this->BabiesModel->insertaddress($data);

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


// addaddresspage
	
//editaddress

 public function Edit_address()
  {
     if(isset($_SESSION['cusername']))
       {

       $adrs_id = base64_decode($this->input->get('id')); 

      
       $result=array(
        
        'area' => $this->BabiesModel->getareas(),
        'adrs' => $this->BabiesModel->getadrs_byid($adrs_id),
              'content' => 'edit_address'
          );
      $this->load->view('babiestemplate',$result);
     }
     else
     {
            redirect('Home');
     }  
  }

  public function updateaddress()
  {
     if(isset($_SESSION['cusername']))
       {
            $userid=base64_decode($_SESSION['userid']);

            $adrsid = $this->input->post('adrsid');

            $inv_fname = $this->input->post('invfname');
            $inv_lname = $this->input->post('invlname');
            $inv_mail = $this->input->post('invmail');
            $invstreet = $this->input->post('invstreet');
            $invarea = $this->input->post('invarea');
            $invblock = $this->input->post('invblock');
            $invavenuebld = $this->input->post('invavenuebld');
            $invhousflat = $this->input->post('invhousflat');
            $invmobile = $this->input->post('invmobile');
            $invmail = $this->input->post('invmail');

            $addressinvo = $this->input->post('addressinvo');

            if($addressinvo!=1)
            {
              $addressinvo=0;
            }

            if($inv_fname=='')
            {
              $inv_fname = $this->input->post('adrfname');
            }

            if($inv_lname=='')
            {
              $inv_lname = $this->input->post('adrlname');
            }

            if($inv_mail=='')
            {
              $inv_mail = $this->input->post('adrmail');
            }

            if($invstreet=='')
            {
              $invstreet = $this->input->post('adrstreet');
            }

            if($invarea=='')
            {
              $invarea = $this->input->post('adrarea');
            }

            if($invblock=='')
            {
              $invblock = $this->input->post('adrblock');
            }

            if($invavenuebld=='')
            {
              $invavenuebld = $this->input->post('adravenubuld');
            }

            if($invhousflat=='')
            {
              $invhousflat = $this->input->post('adrhousflat');
            }

            if($invmobile=='')
            {
              $invmobile = $this->input->post('adrmobile');
            }

            if($invmail=='')
            {
              $invmail = $this->input->post('adrmail');
            }


            $data=array
            (
              'addressprofile_userid'=>$userid,
              'addressprofile_fname'=>$this->input->post('adrfname'),
              'addressprofile_lname'=>$this->input->post('adrlname'),
              'addressprofile_mobile'=>$this->input->post('adrmobile'),
              'addressprofile_city'=>$this->input->post('adrarea'),
              'addressprofile_street'=>$this->input->post('adrstreet'),
              'addressprofile_block'=>$this->input->post('adrblock'),
              'addressprofile_hb'=>$this->input->post('adrhousflat'),
              'addressprofile_avenue'=>$this->input->post('adravenubuld'),
              'addressprofile_inv_fname'=>$inv_fname,
              'addressprofile_inv_lname'=>$inv_lname,
              'addressprofile_inv_mobile'=>$invmobile,
              'addressprofile_inv_city'=>$invarea,
              'addressprofile_inv_street'=>$invstreet,
              'addressprofile_inv_block'=>$invblock,
              'addressprofile_inv_hb'=>$invhousflat,
              'addressprofile_inv_avenue'=>$invavenuebld,
              'addressprofile_inv_status'=>$addressinvo,
              'addressprofile_mail'=>$this->input->post('adrmail'),
              'addressprofile_inv_mail'=>$invmail,
              'addressprofile_date'=>date('Y-m-d')
            );

            $res = $this->BabiesModel->updateaddress($data,$adrsid);

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

//editaddress  

//deleteadress


public function deleteaddress()
{
  if(isset($_SESSION['cusername']))
  {
    $adrid = $this->input->post('adrid');

    $res = $this->BabiesModel->deleteadrs($adrid);
  }
  else
  {
    redirect('Home');
  }
}

//deleteadress  

// orderdetailspage
	public function Order_details()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'orderdetails'
        );
		$this->load->view('babiestemplate',$result);
	}


// orderdetailspage


// trackorderpage
	public function Track_order()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'trackorder'
        );
		$this->load->view('babiestemplate',$result);
	}

  public function ordertrackmail()
  {
    if(isset($_SESSION['cusername']))
       {
            $userid=base64_decode($_SESSION['userid']);
            $orderID =$this->input->post('orderID');
            $billingEmail =$this->input->post('billingEmail');

            $getordergendetails = $this->BabiesModel->getorderdetails_track($orderID,$billingEmail,$userid);

            if($getordergendetails->num_rows()==1)
            {
              $getorderproddetails=$this->BabiesModel->getorderproddetails_track($orderID);

              $result=array(
                'ordgen'=>$getordergendetails,
                'ordprod'=>$getorderproddetails,
                'content'=>'orderdetails'
              );

              $this->load->view('babiestemplate',$result);
            }
            else
            {
              echo "invalidorder";
            }

      }
  }


// trackorderpage		


// commingsoonpage
	public function commingsoon()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'commingsoon'
        );
		$this->load->view('babiestemplate',$result);
	}


// commingsoonpage

// discountofferpage
	public function discountoffer()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'discountoffer'
        );
		$this->load->view('babiestemplate',$result);
	}


// discountofferpage	

// categoryproductspage
	public function Categoryproducts()
	{


    $cid = base64_decode($this->input->get('cid'));
    $subid = base64_decode($this->input->get('subid'));
    $divid = base64_decode($this->input->get('divid'));

    if($cid!=0 && $subid!=0 && $divid!=0)
    {
       
    }
    elseif($cid!=0 && $subid=!0 && $divid==0)
    {

    }
    else
    {
      if($cid!=0 && $subid==0 && $divid==0)
      {

      }
    }
	    
	    
		 $result=array(
		 	
            'content' => 'categoryproducts'
        );
		$this->load->view('babiestemplate',$result);
	}


// categoryproductspage	


// productdetailspage
	public function Product_Details()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'productdetails'
        );
		$this->load->view('babiestemplate',$result);
	}


// productdetailspage	


// cartpage
	public function cart()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'cart'
        );
		$this->load->view('babiestemplate',$result);
	}


// cartpage	

// checkoutpage
	public function checkout()
	{
	    
	    
		 $result=array(
		 	      'area' => $this->BabiesModel->getareas(),
            'content' => 'checkout'
        );
		$this->load->view('babiestemplate',$result);
	}

  public function listadrresses_check()
  {
    if(isset($_SESSION['cusername']))
     {

            $userid=base64_decode($_SESSION['userid']); 

            $a['res']=$this->BabiesModel->getalladrress($userid);

            $this->load->view('frondendtable/addresses_display_check',$a);
     }
     else
     {
            redirect('Home');
     }  
  }

   public function Edit_address_check()
  {
     if(isset($_SESSION['cusername']))
       {

       $adrs_id = base64_decode($this->input->get('id')); 

      
       $result=array(
        
        'area' => $this->BabiesModel->getareas(),
        'adrs' => $this->BabiesModel->getadrs_byid($adrs_id),
              'content' => 'edit_address_check'
          );
      $this->load->view('babiestemplate',$result);
     }
     else
     {
            redirect('Home');
     }  
  }


  public function addaddress_check()
  {
     if(isset($_SESSION['cusername']))
     {
      
       $result=array(
        
        'area' => $this->BabiesModel->getareas(),
              'content' => 'add_address_check'
          );
      $this->load->view('babiestemplate',$result);
     }
     else
     {
            redirect('Home');
     }  
  }


  public function createaccount_checkout()
  {
     $inv_fname = $this->input->post('invfname');
            $inv_lname = $this->input->post('invlname');
            $inv_mail = $this->input->post('invmail');
            $invstreet = $this->input->post('invstreet');
            $invarea = $this->input->post('invarea');
            $invblock = $this->input->post('invblock');
            $invavenuebld = $this->input->post('invavenuebld');
            $invhousflat = $this->input->post('invhousflat');
            $invmobile = $this->input->post('invmobile');
            $invmail = $this->input->post('invmail');

            $addressinvo = $this->input->post('addressinvo');

            if($addressinvo!=1)
            {
              $addressinvo=0;
            }

            if($inv_fname=='')
            {
              $inv_fname = $this->input->post('adrfname');
            }

            if($inv_lname=='')
            {
              $inv_lname = $this->input->post('adrlname');
            }

            if($inv_mail=='')
            {
              $inv_mail = $this->input->post('adrmail');
            }

            if($invstreet=='')
            {
              $invstreet = $this->input->post('adrstreet');
            }

            if($invarea=='')
            {
              $invarea = $this->input->post('adrarea');
            }

            if($invblock=='')
            {
              $invblock = $this->input->post('adrblock');
            }

            if($invavenuebld=='')
            {
              $invavenuebld = $this->input->post('adravenubuld');
            }

            if($invhousflat=='')
            {
              $invhousflat = $this->input->post('adrhousflat');
            }

            if($invmobile=='')
            {
              $invmobile = $this->input->post('adrmobile');
            }

            if($invmail=='')
            {
              $invmail = $this->input->post('adrmail');
            }


            $mailid = $this->input->post('adrmail');

            $getsamemail = $this->BabiesModel->getsamemaildetils($mailid);


            if($getsamemail->num_rows()==0)
            {
                $data1=array
                (
                  'user_mail'=>$mailid,
                  'user_fname'=>$this->input->post('adrfname'),
                  'user_lname'=>$this->input->post('adrlname'),
                  'user_displayname'=>$this->input->post('adrfname'),
                  'user_password'=>base64_encode($this->input->post('adrpass')),
                  'user_status'=>1,
                  'user_date'=>date('Y-m-d')
                );


                $res111 = $this->BabiesModel->insertuser_check($data1);


                if($res111!=0)
                {
                    
                    $userid=$res111;

                       $data=array
                    (
                      'addressprofile_userid'=>$userid,
                      'addressprofile_fname'=>$this->input->post('adrfname'),
                      'addressprofile_lname'=>$this->input->post('adrlname'),
                      'addressprofile_mobile'=>$this->input->post('adrmobile'),
                      'addressprofile_city'=>$this->input->post('adrarea'),
                      'addressprofile_street'=>$this->input->post('adrstreet'),
                      'addressprofile_block'=>$this->input->post('adrblock'),
                      'addressprofile_hb'=>$this->input->post('adrhousflat'),
                      'addressprofile_avenue'=>$this->input->post('adravenubuld'),
                      'addressprofile_inv_fname'=>$inv_fname,
                      'addressprofile_inv_lname'=>$inv_lname,
                      'addressprofile_inv_mobile'=>$invmobile,
                      'addressprofile_inv_city'=>$invarea,
                      'addressprofile_inv_street'=>$invstreet,
                      'addressprofile_inv_block'=>$invblock,
                      'addressprofile_inv_hb'=>$invhousflat,
                      'addressprofile_inv_avenue'=>$invavenuebld,
                      'addressprofile_inv_status'=>$addressinvo,
                      'addressprofile_mail'=>$this->input->post('adrmail'),
                      'addressprofile_inv_mail'=>$invmail,
                      'addressprofile_date'=>date('Y-m-d')
                    );

                    $res = $this->BabiesModel->insertaddress($data);

                    if($res==1)
                    {

                       $userlogindata = array(
                        'userdisplay' => $this->input->post('adrfname'),
                        'cusername'  => $mailid,
                        'userid' => base64_encode($userid),
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


                
            }
            else
            {
              echo "mailexist";
            }


            
  }



// checkoutpage	


// Brandpage
	public function Brand()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'brands'
        );
		$this->load->view('babiestemplate',$result);
	}


// Brandpage

// brandproductspage
	public function Brand_products()
	{
	    
	    
		 $result=array(
		 	
            'content' => 'brandproducts'
        );
		$this->load->view('babiestemplate',$result);
	}


// brandproductspage

//forgotpassword

    public function forgotpassword()
  {
      
      
     $result=array(
      
            'content' => 'forgotpassword'
        );
    $this->load->view('babiestemplate',$result);
  }


  public function sendpassword()
  {
    $mailid = $this->input->post('mailid');

    $getsamemail = $this->BabiesModel->getsamemaildetils($mailid);

    // echo $getsamemail->num_rows();
    // echo $mailid;
    // die();

    if($getsamemail->num_rows()==1)
    {
       $userdetails = $getsamemail->row();

         $forgotkey=rand(1000,10000);

         $forg_datetime=date('Y-m-d h:i:s');

         $data=array('user_pass_key'=>$forgotkey,'user_forgotkey_datetime'=>$forg_datetime);

         $res = $this->BabiesModel->insertforgtkey($data,$mailid);
         
         if($res==1)
         {
           $data2=array
                (
                  'username'=>base64_encode($mailid),
                  'resetcode'=>base64_encode($forgotkey),
                  'tomail'=>$mailid,
                  'name'=>$userdetails->user_displayname
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
                    $mail->Username   = "babiesmoments598@gmail.com";

                    $mail->Password   = "babiesmoments@123";
                    
                    $mail->IsHTML(true);
                    $mail->AddAddress($mailid, "User");
                    $mail->SetFrom("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    $mail->AddReplyTo("babiesmoments598@gmail.com", "Babies Moments Kuwait");
                    //   $mail->AddCC("cc-recipient-email", "cc-recipient-name");
                    $mail->Subject = "Babies Moments Password Reset";
                    $content = $this->load->view('forgotpass_mail',$data2,TRUE);
                    
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
      echo "mailnotexist";
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
      $this->load->view('babiestemplate',$a);
  }


  public function resetpassword_check()
  {
    
    $npass = $this->input->post('npass');
    $conpass = $this->input->post('conpass');
    $resetmail = $this->input->post('resetmail');
    $resetcod = $this->input->post('resetcod');

    $datetime = date('Y-m-d h:i:s');

    $getrestuserdetials = $this->BabiesModel->getrestuserdetials($resetmail);

    

    if($getrestuserdetials->num_rows()==1)
    {
      $udetails = $getrestuserdetials->row();

      // echo base64_decode($udetails->user_pass_key);
      // die();
      
      $paskey = $udetails->user_pass_key;
      $paskeydate = $udetails->user_forgotkey_datetime;
      

      if($paskey==$resetcod)
      {
           $date1 = new DateTime($paskeydate);
            $date2 = new DateTime($datetime);
            
            $diff = $date2->diff($date1);
            
            $hours = $diff->h;
            $hours = $hours + ($diff->days*24);

             if($hours< 24)
            {
              $data1=array('user_password'=>base64_encode($npass));
               $res123 = $this->BabiesModel->updatepass_frg($data1,$resetmail);
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
    else
    {
      echo "nouser";
    }


  }



//forgotpassword  





}
