<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_division extends CI_Controller {

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
    
    	$this->load->model('Admin_subcategory_model');
    	$this->load->model('Admin_category_model');
    	$this->load->model('Admin_division_modal');
    	
	}
	public function index()
	{ 
		
		if(isset($_SESSION['username']))
		{
			
				$a['categoriesdpdwn'] = $this->Admin_category_model->display1('category');
				$a['content'] = 'admin_division_view';
			
			$this->load->view('admintemplate',$a);
		}
		else
		{
			redirect('Admin_login/login_admin');
		}

	}

	public function getsubcategory()
	{
      $cat = $this->input->post('cat');


      $data['subs'] = $this->Admin_division_modal->getsubs($cat);

      $this->load->view('admintables/div_subcatfill',$data);
	}

	public function getdivision()
	{
		$data['divs'] = $this->Admin_division_modal->getdivs();

      $this->load->view('admintables/admin_divisiontable_view',$data);
	}

	public function insertdivision()
	{
		$divid = $this->input->post('divid');

		$cat = $this->input->post('divcategory');

		$subcat = $this->input->post('divsub');

		$date = date('Y-m-d');

		$data=array
		(
          'division_name'=>$this->input->post('divname'),
          'division_cat'=>$cat,
          'division_subcat'=>$subcat,
          'division_desc'=>$this->input->post('divdesc'),
          'division_status'=>1,
          'division_date'=>$date
		);

        
		if($divid!='')
		{
          $res123 = $this->Admin_division_modal->updatedivision($divid,$data);
		}
		else
		{
		  
          $res123 = $this->Admin_division_modal->insertdivision($data);
		}

		if($res123==1)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}

	public function checkcatfill()
	{
		$cat = $this->input->post('cid');
		$data['subs'] = $this->Admin_division_modal->getsubs($cat);

      $this->load->view('admintables/div_subcatfill',$data);
	}

	public function editdivision()
	{
		$divid = $this->input->post('id');
		$data = $this->Admin_division_modal->getdiv_edit($divid);

		echo json_encode($data);
	}

	public function deletedivision()
	{
		$did = $this->input->post('id');

		$res = $this->Admin_division_modal->delete_division($did);

		if($res==1)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}	
 	}

}
