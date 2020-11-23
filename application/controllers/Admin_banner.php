<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_banner extends CI_Controller {
	function __construct()
	 {
    	parent::__construct();
    	$this->load->model('Admin_banner_model');
	 }

	 public function index()
	{
    if(isset($_SESSION['username']))
        {
        $a = array('content' => 'admin_banner_view'
        
                  );
        $this->load->view('admintemplate',$a);
        }
      else
        {
          redirect('Admin_login/login_admin');
        }
	}
 
	public function displaybanner()
	{
		$result['res'] = $this->Admin_banner_model->get_banner();
    $this->load->view('display_banner',$result);
	} 

	public function editbanner()
  {
  	    $id = $this->input->post('id');
        $res = $this->Admin_banner_model->get_bannerid($id);
		    echo json_encode($res);
  } 

   public function updatebanner()
  {
        $id= $this->input->post('pagenm');  
        $fillimg = $this->input->post('image1nm');

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
       $date=date('Y-m-d');

        $data1 = array
        (
        'banner_title'=>$this->input->post('titlenm'),
        'banner_shortdesc'=>$this->input->post('shortdescnm'),
        'banner_titlear'=>$this->input->post('titlearnm'),
        'banner_shortdescar'=>$this->input->post('shortdescarnm'),
        'banner_image'=>$filename,
        'banner_date'=>$date
        );


      if ($id=='')
      {
        $result1 = $this->Admin_banner_model->insert_banner($data1);
      }
      else
      {
         $result1 = $this->Admin_banner_model->update_banner($id,$data1);
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

}