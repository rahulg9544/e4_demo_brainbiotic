<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_city extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_city_model');
	 }

	 public function index()
	{
   // if(isset($_SESSION['username']))
     //   {
        $a = array('content' => 'admin_city_view'
        
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
		$result['res'] = $this->Admin_city_model->display();
    $this->load->view('admintables/display_city',$result);
	} 

	public function editrow()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_city_model->edit($id);
		    echo json_encode($res);
  } 

   public function insertrow()
  {
    $id = $this->input->post('city_id');
   
      $ins_date = date('Y-m-d');

      $data1 = array
      (
       'city_name'=>$this->input->post('city_name'),
       'min_value'=>$this->input->post('min_value'),
       'delivery_charge'=>$this->input->post('delivery_charge')
      );
      
  

  if ($id=='')
  {
    $result1 = $this->Admin_city_model->insert($data1);
  }
  else
  {
    $result1 = $this->Admin_city_model->update($id,$data1);
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
       $res = $this->Admin_city_model->delete($id);

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }

}