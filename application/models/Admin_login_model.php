<?php 
class Admin_login_model extends CI_Model 
{
 
        function validate_login()
        {
                $username = $this->security->xss_clean($this->input->post('uname'));
         $password=$this->security->xss_clean($this->input->post('pass'));

                if($username=='admin@babiesmoments.com'&&$password=='babiesmoments@admin')
        {
                        $data=array(
                                'id'=>'0',
                                'type'=>'admin',
                                'username'=>$username,
                                'validate'=>true,
                                'admindisplay' => 'Admin',
                                'adminuser'  => $username,
                                'adminusertp' => 'admin',
                                'adminlogged_in' => TRUE,
                        );
                        $this->session->set_userdata($data);
                        
                        return true;
                        //print_r($data);
                }
                
        
                else{
                        return false;
                }
        }
}
?>