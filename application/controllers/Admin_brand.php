<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_brand extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_brand_model');
	 }

	 public function index()
	{
   // if(isset($_SESSION['username']))
     //   {
        $Category = $this->Admin_brand_model->categories();
        $a = array('content' => 'admin_brand_view','cat' => $Category
        
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
		$result['res'] = $this->Admin_brand_model->display();
    $this->load->view('admintables/display_brand',$result);
	} 

	public function editrow()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_brand_model->edit($id);
		    echo json_encode($res);
  } 

   public function insertrow()
  {
    $id = $this->input->post('formnm');
   
      $ins_date = date('Y-m-d');

      $data1 = array
      (
       'brand_name'=>$this->input->post('namenm'),
       'brand_category'=>$this->input->post('categorynm'),
       'brand_date'=>$ins_date
      );
      
  

  if ($id=='')
  {
    $result1 = $this->Admin_brand_model->insert($data1);
  }
  else
  {
         $result1 = $this->Admin_brand_model->update($id,$data1);
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
       $res = $this->Admin_brand_model->delete($id);

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }

}