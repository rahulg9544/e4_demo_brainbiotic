<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_blogs extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  function __construct() {
      parent::__construct();
    
      $this->load->model('Admin_blogs_model');

      
  }

   public function index()
  {

        $a = array('content' => 'admin_blogs_view');
        $this->load->view('admintemplate',$a);

  }

  public function displayblogs()
  {
    $result['res'] = $this->Admin_blogs_model->get_blogs();
  //  print_r($result['res']);
    $this->load->view('admintables/display_blogs',$result);
  } 


public function insertblog()
      {
  
        $id = $this->input->post('blogid');
  
        $title = $this->input->post('title2');
     
        $ins_date = $this->input->post('date');

        $desc = $this->input->post('desc');
        
        $img = $this->input->post('imagehid');
  
    if ($id=='')
    {

      $config['upload_path'] = 'uploads/blog/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['encrypt_name'] = TRUE;
      $config['remove_spaces'] = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {

          $ajax['status'] = "error";
          $ajax['msg'] = strip_tags($this->upload->display_errors());

          echo json_encode($ajax);
          exit;

      } else {
          $data = $this->upload->data();

      }

      $data1 = array
        (
         'title'=>$title,
         'image'=>$data['file_name'],
         'date'=>$ins_date,
         'description'=>$desc
        );
      $result1 = $this->Admin_blogs_model->insert_blogs($data1);
    }
    else
    {

      $config['upload_path'] = 'uploads/blog/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['encrypt_name'] = TRUE;
      $config['remove_spaces'] = TRUE; 

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {

          $ajax['status'] = "error";
          $ajax['msg'] = strip_tags($this->upload->display_errors());

          if($ajax['msg'] == "You did not select a file to upload.")
          {
            $ajax['status'] = "success";
           // exit;
          }

          echo json_encode($ajax);
          exit;

      } else {
          $data = $this->upload->data();
       $img_path='uploads/blog/'.$img;
       @unlink($img_path); 
      }

      $data1 = array
        (
         'title'=>$title,
         'image'=>$data['file_name'],
         'date'=>$ins_date,
         'description'=>$desc
        );
           $result1 = $this->Admin_blogs_model->update_blogs($id,$data1);
    } 
  
  
    if ($result1==1)
    {
      $ajax['status'] = "success";
      echo json_encode($ajax);
    }
    else
    {
      $ajax['status'] = "failed";
      echo json_encode($ajax);
    } 
      
    }
    
  



  public function editblogs()
  {
        $id = $this->input->post('id');
        $res = $this->Admin_blogs_model->get_blogidedit($id);
        echo json_encode($res);
  } 

   

   public function delete()
    {
       $id = $this->input->post('id');  
       $res = $this->Admin_blogs_model->delete_blogs($id);

       $image=$this->input->post('imagename');
       $img_path='uploads/blog/'.$image;
       @unlink($img_path);   

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }



}