<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_subcategory extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_subcategory_model');
	 }

	 public function index()
	{
   // if(isset($_SESSION['username']))
     //   {
    
        $Category = $this->Admin_subcategory_model->categories();
        $a = array('content' => 'admin_subcategory_view','cat' => $Category
        
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
		$result['res'] = $this->Admin_subcategory_model->display();
    $this->load->view('admintables/display_subcategory',$result);
	} 

	public function editrow()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_subcategory_model->edit($id);
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
          $filename = $data['upload_data']['file_name'];
        }


      $data1 = array
      (
       'subcategory_name'=>$this->input->post('namenm'),
       'subcategory_name_ar'=>$this->input->post('namear'),
       'subcategory_category'=>$this->input->post('categorynm'),
       'subcategory_image'=>$filename,
       'subcategory_date'=>$ins_date
      );
      

    if ($id=='')
    {
           $result1 = $this->Admin_subcategory_model->insert($data1);
    }
    else
    {
           $result1 = $this->Admin_subcategory_model->update($id,$data1);
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
       $res = $this->Admin_subcategory_model->delete($id);

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }

}