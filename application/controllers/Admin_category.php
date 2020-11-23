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

    $img = $this->input->post('imagehid');
   
      $ins_date = date('Y-m-d');

      $config['upload_path'] = 'uploads/category';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['encrypt_name'] = TRUE;
      $config['remove_spaces'] = TRUE;
  
      $this->load->library('upload', $config);
  

  if ($id=='')
  {


    

    if ($this->upload->do_upload('file')) {

      $data = $this->upload->data();

      $image= $data['file_name']; 

    } 

    $data1 = array
    (
     'category_label'=>$this->input->post('namenm'),
     'category_date'=>$ins_date,
     'cat_image'=>$image
    );

    $result1 = $this->Admin_category_model->insert($data1);
  }
  else
  {
 

    if ($this->upload->do_upload('file')) {

      $data = $this->upload->data();

      $image= $data['file_name']; 

      $img_path='uploads/category/'.$img;
      @unlink($img_path);

    } 
    
    $data1 = array
    (
     'category_label'=>$this->input->post('namenm'),
     'category_date'=>$ins_date,
     'cat_image'=>$image
    );
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