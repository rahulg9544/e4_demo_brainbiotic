<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_aboutus extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
    	parent::__construct();
    
    	$this->load->model('Admin_aboutus_model');
    	
    	$this->load->library('encryption');

    }


    public function index()
    {
    
        	$a = array('content' => 'admin_aboutus_view');
			$this->load->view('admintemplate',$a);
		
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }

    public function updatetcinfo()
    {
    	$termsid=$this->input->post('abtid');


        $fillimg = $this->input->post('image1');

        $config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);
        

        $this->load->library('image_lib');
        
        if(!$this->upload->do_upload('menu_image1'))

        {
            $error = array('error'=> $this->upload->display_errors());
        }

        else
        {

        $data = array('upload_data' => $this->upload->data());


         $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$data['upload_data']['file_name'];
                    $renameimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data']['file_name']);
                    $imgname = date('Ymd_his').$renameimage;
                    $config['new_image'] = 'uploads/'.$imgname;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']     = 1600;
                    $config['height']   = 459;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

        }

       


        if ($_FILES['menu_image1']['size'] == 0)
      {
          $filename = $fillimg;

      }
      else
      {
        if(!empty($about_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        // $filename = $data['upload_data']['file_name'];
        $filename = $imgname;
      }




      $fillimg1 = $this->input->post('image2');
     

        $config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);
        
        $this->load->library('image_lib');
        
        if(!$this->upload->do_upload('menu_image2'))

        {
            $error = array('error'=> $this->upload->display_errors());
        }

        else
        {

        $data = array('upload_data' => $this->upload->data());

        $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$data['upload_data']['file_name'];
                    $renameimage1 = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data']['file_name']);
                    $imgname1 = date('Ymd_his').$renameimage1;
                    $config['new_image'] = 'uploads/'.$imgname1;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']     = 423;
                    $config['height']   = 478;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

        }


        if ($_FILES['menu_image2']['size'] == 0)
      {
          $filename2 = $fillimg;

      }
      else
      {
        if(!empty($about_id)){
          $unlink_path = 'uploads/'.$fillimg1;
          if(!empty($fillimg1)){
            unlink($unlink_path);
          }         
        }
        // $filename2 = $data['upload_data']['file_name'];
        $filename2 = $imgname1;
      }
    


    	$data1=array(
         'about_title1'=>$this->input->post('abttitle1'),
         'about_content1'=>$this->input->post('abtcontent1'),
         'about_banner_image'=>$filename,
         'about_content_image'=>$filename2,
         'about_date'=>date('Y-m-d')
    	);

    	if($termsid!='')
    	{
    		$res321=$this->Admin_aboutus_model->updatetermsinf($data1,$termsid);
    		if($res321==1)
    		{
    			echo "success";
    		}
    		else
    		{
    			echo "failed";
    		}	
    	}
    }


    public function editaboutinfo()
    {
    	$abtid=$this->input->post('id');

    	$res=$this->Admin_aboutus_model->getconinf_edit($abtid);
    	echo json_encode($res);
    }

    public function get_aboutinf()
    {
    	$a['tabledata'] = $this->Admin_aboutus_model->display_about();
		 	$this->load->view('admintables/adminabouttable_view',$a);
    }
}    