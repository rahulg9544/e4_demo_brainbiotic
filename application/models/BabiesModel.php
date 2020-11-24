<?php 
class BabiesModel extends CI_Model 
{


   //common
  
    public function get_categories()
    {
        $this->db->from('category');
        $this->db->order_by('category_id','desc');
        $query = $this->db->get();

       
        
        return $query->result();
    }

    // public function get_sub_categories($category_id)
    // {
    //     $this->db->where('subcategory_category', $category_id);
    //     $query = $this->db->get('subcategory');
    //     return $query->result();
    // }

    // public function get_divisions($subcat)
    // {
    //     $this->db->where('division_subcat', $subcat);
    //     $query = $this->db->get('division');
    //     return $query->result();
    // }
    
     public function get_offers()
    {
        $selqry = 'SELECT * FROM offers LEFT JOIN subcategory ON offers.offers_sub_cat_id = subcategory.subcategory_id LEFT JOIN category ON subcategory.subcategory_category = category.category_id';
        $query = $this->db->query($selqry);  
        return $query->result(); 
    }

   //common
   

    // homepage
    
     function getslides()
     {
     	$this->db->order_by('banner_id ','desc');
     	$query = $this->db->get('banner');
     	return $query;
     }

     function getcategorieslides()
     {
        $query = $this->db->get('category');

        return $query->result();
     }

    // homepage

     //aboutpage

     function getaboutpagedetails()
     {
        $query= $this->db->get('about');
        return $query->row();
     }

     //aboutpage

     //contactpage

     function getcontactpagedetails()
     {
        $query= $this->db->get('contact');
        return $query->row();
     }

     //contactpage

    //loginregpage

     function getsameusercount($cusmail,$regmob)
     {
     	$squery="SELECT count(*) as sameucount FROM user WHERE user_mail = '$cusmail' OR user_mobile='$regmob'";
      $query1 = $this->db->query($squery);
      $query=$query1->row();
      return $query->sameucount;
     }

     function insertuser($data)
     {
     	$query=$this->db->insert('user',$data);
     	return $query;
     }

     function getuserdetails($username)
     {
     	$this->db->where('user_mail',$username);
		$query = $this->db->get('user');
		return $query;
     }

     //loginregpage

     // addaddresspage


     function getareas()
     {
        $query = $this->db->get('city');
        return $query->result();
     }

     function insertaddress($data)
     {
        $query = $this->db->insert('addressprofile',$data);
        return $query;
     }

     // addaddresspage

     //editaddress

     function getadrs_byid($adrs_id)
     {
        $this->db->where('addressprofile_id',$adrs_id);
        $query = $this->db->get('addressprofile');
        return $query->row();
     }

     function updateaddress($data,$adrsid)
     {
        $this->db->where('addressprofile_id',$adrsid);
        $query = $this->db->update('addressprofile',$data);
        return $query;
     }

     //editaddress

     //myaccout
      
      function getalladrress($userid)
      {
        // $this->db->where('addressprofile_userid',$userid);
        // $query = $this->db->get('addressprofile');
        
        $squery = "SELECT * FROM addressprofile LEFT JOIN city ON addressprofile_city=city_id WHERE addressprofile_userid='$userid'";
        $query = $this->db->query($squery);

        return $query->result();
      }

      function getpersonaldetails($userid)
      {
        $this->db->where('user_id',$userid);
        $query = $this->db->get('user');
        return $query->row();
      }

      function getsamemaildetils($mailid)
      {
         $this->db->where('user_mail',$mailid);
        $query = $this->db->get('user');
        return $query;
      }

      function updateuserinfo($data,$userid)
      {
         $this->db->where('user_id',$userid);
        $query = $this->db->update('user',$data);
        return $query;
      
      }

     //myaccout

     //checkout
      
      function insertuser_check($data1)
      {
        if($this->db->insert('user', $data1))
        {
            $insert_id = $this->db->insert_id();

            return  $insert_id;
        }
        else
        {
            return  0;
        }
        
      }

     //checkout 

     //forgotpass
     
     function insertforgtkey($data,$mailid)
     {
        $this->db->where('user_mail',$mailid);
        $query=$this->db->update('user',$data);
        return $query;
     }

     function getrestuserdetials($resetmail)
     {
        $this->db->where('user_mail',$resetmail);
        $query=$this->db->get('user');
        return $query;
     }

     function updatepass_frg($data1,$resetmail)
     {
        $this->db->where('user_mail',$resetmail);
      $query = $this->db->update('user',$data1);
      return $query;
     }


     //forgotpass 

     //deliverypolicypage

     function getdeliverypolicydtils()
     {
        $query = $this->db->get('termuse');
        return $query->row();
     }

     //deliverypolicypage

     // termsalespage

     function gettermsalesdtils()
     {
        $query = $this->db->get('termsale');
        return $query->row();
     }

     // termsalespage

     //returnpolicypage

     function getreturnplicydtils()
     {
         $query = $this->db->get('returnpolicy');
        return $query->row();
     }
     //returnpolicypage

     //faq
     
     function getfaqdtils()
     {
         $query = $this->db->get('faq');
         return $query->row();
     }

     //faq

     //trackorder
     
     function getorderdetails_track($orderID,$billingEmail,$userid)
     {
        $squery="SELECT * FROM orders LEFT JOIN addressprofile ON orders_adrs_id=addressprofile_id WHERE orders_uniq_id='$orderID' AND orders_user_id='$userid' AND (addressprofile_mail='$billingEmail' OR addressprofile_inv_mail='$billingEmail')";
        $query = $this->db->query($squery);

        if($query->num_rows==1)
        {
            return $query;
        }
        else
        {
           $query1=array();
           return $query1;
        }
     }

     function getorderproddetails_track($orderID)
     {
        $this->db->where('dc_order_id',$orderID);
        $query = $this->db->get('deliverycharge');
        return $query->result();
     }


     //trackorder




}	