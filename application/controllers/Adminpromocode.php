<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpromocode extends CI_Controller {

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
    
    	$this->load->model('Promocode_modal');
    	$this->load->library('encryption');
    	
	}
	public function index()
	{ 
		
			$a['content'] = 'admin_promocode_view';
			
			$this->load->view('admintemplate',$a);
		
      
	}
    public function insert_promocode()
		{
			

                        $promoid=$this->input->post('promoid');
                        $code=$this->input->post('code');
                        $code_type=$this->input->post('code_type');
                        $percentage=$this->input->post('percentage');
                        $max_amount=$this->input->post('max_amount');
                        $min_cart=$this->input->post('min_cart');
						$exp_date=$this->input->post('exp_date');
						$nmbrofuse=$this->input->post('nouse');
						$time = strtotime($exp_date);
						$exp_date = date('Y-m-d',$time);
						$promo_status=$this->input->post('promo_status');
                        $date = date('Y-m-d h:i:sa');


	 			 $data1= array('promo_code' =>$code ,'promo_discount'=>$percentage,'promo_type ' => $code_type,'promo_expiry' => $exp_date,'promo_max_amount'=>$max_amount,'promo_min_cart_value' => $min_cart,'promo_status '=>$promo_status,'promo_use_per_user'=>$nmbrofuse,'promo_created '=>$date );

	 			// print_r($data1);

	 				if(!empty($promoid)){
					 	$res = $this->Promocode_modal->promo_update($promoid,$data1);
					 	
	 				}else{
	 					$res = $this->Promocode_modal->promo_insert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}
			
		}


		 public function get_promocode(){
		 	$a['tabledata'] = $this->Promocode_modal->display('promocode');
		 	$this->load->view('admintables/adminpromocode_view',$a);

		}


		 public function edit_promocode(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Promocode_modal');
		 	$resrow = $this->Promocode_modal->editcategory($id,'category');
		 	$res = array('categoryid'=> $resrow->cat_id,'categoryname' => $resrow->cat_name,
		 		'categoryimage' => $resrow->cat_image,'category_priority' => $resrow->cat_priority,'category_icon' => $resrow->cat_icon
		 	);
			echo json_encode($res);
		}



		public function delete_promocode()
		{
				$catid = $this->input->post('id');
				$res = $this->Promocode_modal->delete_promocode($catid);				 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}	
		}


 		public function changepriority(){
		 	$id = $this->input->post('id');
		 	$status = $this->input->post('status');
		 	$res = $this->Promocode_modal->priority($id,$status);
		 	if($res == 1){
		 		echo "success";
		 	}else{
		 		echo "failed";
		 	}
		 	
		 }			

}
