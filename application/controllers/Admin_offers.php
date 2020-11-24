<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_offers extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_offers_model');
	 }

	 public function index()
	{
   // if(isset($_SESSION['username']))
     //   {
    
        $offers = $this->Admin_offers_model->subcategory();
        $a = array('content' => 'admin_offers_view','offers' => $offers
        
                  );
        $this->load->view('admintemplate',$a);
    //    }
   //   else
    //    {
    //      redirect('Admin_login/login_admin');
    //    }
	}
 
	public function displaytable()
	{
		$result['res'] = $this->Admin_offers_model->display();
    $this->load->view('admintables/display_offers',$result);
	} 

	public function editrow()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_offers_model->edit($id);
		    echo json_encode($res);
  } 

   public function insertrow()
  {
    $id = $this->input->post('formnm');
    $fillimg = $this->input->post('image1nm');
    $ins_date = date('Y-m-d');


        $config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imagenm'))
        {
          $error = array('error'=> $this->upload->display_errors());
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          // imageresize start
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$data['upload_data']['file_name'];
                    $renameimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data']['file_name']);
                    $imgname = date('Ymd_his').$renameimage;
                    $config['new_image'] = 'uploads/'.$imgname;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']     = 500;
                    $config['height']   = 748;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                  // image resize end
                    unlink('uploads/'.$data['upload_data']['file_name']);
        }
     
        if ($_FILES['imagenm']['size'] == 0)
        {
          $filename = $fillimg;
        }
        else
        {
          if(!empty($id)){
              $unlink_path = 'uploads/'.$fillimg;
              if(!empty($fillimg)){
                unlink($unlink_path);
              }         
          }
          //$filename = $data['upload_data']['file_name'];
          $filename = $imgname;
        }


      $data1 = array
      (
       'offers_sub_cat_id'=>$this->input->post('sub_cat_id'),
       'offers_text1'=>$this->input->post('offer_text1'),
       'offers_text2'=>$this->input->post('offer_text2'),
       'offers_text1_ar'=>$this->input->post('offer_text1_ar'),
       'offers_text2_ar'=>$this->input->post('offer_text2_ar'),
       'offers_image'=>$filename,
       'offers_start_percetage'=>$this->input->post('discount_start'),
       'offers_end_percentage'=>$this->input->post('discount_end'),
       'offers_status '=>$this->input->post('offer_status'),
      );
      
  

    if ($id=='')
    {
           $result1 = $this->Admin_offers_model->insert($data1);
    }
    else
    {
           $result1 = $this->Admin_offers_model->update($id,$data1);
    } 


    if ($result1==1)
    {
      echo "success";
    }
    else
    {
      echo "failed";
    } 

  }
   

  public function deleterow()
    {
       $id = $this->input->post('id');  
       $res = $this->Admin_offers_model->delete($id);

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }


     public function status_change(){
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $res = $this->Admin_offers_model->status_update($id,$status);
      if($res == 1){
        echo "success";
      }else{
        echo "failed";
      }
      
     }
     

}