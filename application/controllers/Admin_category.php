<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_category extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_category_model');
	 }

	 public function index()
	{
   // if(isset($_SESSION['username']))
     //   {
        $a = array('content' => 'admin_category_view'
        
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
		$result['res'] = $this->Admin_category_model->display();
    $this->load->view('admintables/display_category',$result);
	} 

	public function editrow()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_category_model->edit($id);
		    echo json_encode($res);
  } 

   public function insertrow()
  {
    $id = $this->input->post('formnm');

    $image1 = $this->input->post('image1');
    $image2 = $this->input->post('image2');
   
      $ins_date = date('Y-m-d');



      //home image

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
        }
     
        if ($_FILES['imagenm']['size'] == 0)
        {
          $filename = $image1;
        }
        else
        {
          if(!empty($id)){
              $unlink_path = 'uploads/'.$image1;
              if(!empty($image1)){
                unlink($unlink_path);
              }         
          }
          $filename = $data['upload_data']['file_name'];
        }

      //home image


      //banner image

       $config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('imagenmb'))
        {
          $error = array('error'=> $this->upload->display_errors());
        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
        }
     
        if ($_FILES['imagenmb']['size'] == 0)
        {
          $filename2 = $image2;
        }
        else
        {
          if(!empty($id)){
              $unlink_path = 'uploads/'.$image2;
              if(!empty($image2)){
                unlink($unlink_path);
              }         
          }
          $filename2 = $data['upload_data']['file_name'];
        }

      //banner image  




      $data1 = array
      (
       'category_label'=>$this->input->post('namenm'),
       'category_label_ar'=>$this->input->post('namear'),
       'category_homepic'=>$filename,
       'category_bannerpic'=>$filename2,
       'category_date'=>$ins_date
      );
      
  

  if ($id=='')
  {
    $result1 = $this->Admin_category_model->insert($data1);
  }
  else
  {
         $result1 = $this->Admin_category_model->update($id,$data1);
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
       $res = $this->Admin_category_model->delete($id);

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }

}