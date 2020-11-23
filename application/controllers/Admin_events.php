<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_events extends CI_Controller {

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
    
      $this->load->model('Admin_events_model');
      
  }

   public function index()
  {

        $a = array('content' => 'admin_events_view');
        $this->load->view('admintemplate',$a);

  }

  public function displayevents()
  {
    $result['res'] = $this->Admin_events_model->get_events();
  //  print_r($result['res']);
    $this->load->view('admintables/display_events',$result);
  } 

public function insertevent()
    {

      $id = $this->input->post('eventnm');

      $title = $this->input->post('title1');
   
      $ins_date = $this->input->post('date');

      $data1 = array
      (
       'title'=>$this->input->post('title1'),
       'date'=>$ins_date
      );
      
  

  if ($id=='')
  {
    $result1 = $this->Admin_events_model->insert_events($data1);
  }
  else
  {
         $result1 = $this->Admin_events_model->update_events($id,$data1);
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

  public function editevents()
      {
            $id = $this->input->post('id');
            $res = $this->Admin_events_model->get_eventsidedit($id);
            echo json_encode($res);
      } 
 
   public function delete()
    {
       $id = $this->input->post('id');  


       $res = $this->Admin_events_model->delete_events($id);

      //  echo $res;
      //  exit;

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }



}