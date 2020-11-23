<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminproducts extends CI_Controller {

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
    
    	$this->load->model('Product_modal');
    	$this->load->model('user_modal');
    	$this->load->library('encryption');
    //	$this->load->library('randomgenerate');
    	
	}
	public function index()
	{ 
		$filt = "";
		if(isset($_SESSION['adminusertp'])){
			$categories = $this->Product_modal->displayall('category');
			$subcategories = $this->Product_modal->displayall('subcategory');
			if($_SESSION['adminusertp'] == 'agent' ){
				$usid = $this->encryption->decrypt($_SESSION['adminuserid']);
				$filt = " AND user.user_id = '$usid'";
			}else{
				$filt = "";
			}
			$store = $this->Product_modal->store_user($filt);
			$brand = $this->Product_modal->display_approved_brand('brand');
			$agents = $this->user_modal->display('user');
			$vendors =$this->Product_modal->getvenors();
	        $a = array(
	            'vendors'=>$vendors,
	        	'agents' => $agents,
	        	'brand' => $brand,
	        	'stores' => $store,
	        	'categorydpdwn' => $categories,
	        	'subcategorydpdwn' => $subcategories,
	        	'content' => 'adminproductmanage_view');
			$this->load->view('admintemplate',$a);
		}else{
			$this->load->view('adminlogin_view');
		}
	}
	 public function insertproduct()
		{

                   
     $prodid=$this->input->post('productid');
     $purchaserate=$this->input->post('purchase_rate');
     $productcomm=$this->input->post('productcomm');
     $prodaddedcomm=$this->input->post('prodaddedcomm');
     $brand=$this->input->post('productbrand');
     $tax=$this->input->post('producttax');
     $display=$this->input->post('productdisplay');

     $prodcategoryid=$this->input->post('category');
	 $subprodcategoryid=$this->input->post('subcategory');
	 $productcode=$this->input->post('productcode');
	 $prodname=$this->input->post('productname');
	 $productrate=$this->input->post('productrate');
	 $stores = $this->input->post('stores');
	 $productdesc=$this->input->post('productdesc');
	 $productdiscount=$this->input->post('productdiscount');
	 $productdiscountprice=$this->input->post('productdiscountprice');
     $productmeasureunit=$this->input->post('productmeasureunit');
	 $imagehid = $this->input->post('imagehid');
	 $productavailable=$this->input->post('productavailable');
						$sellprice=$this->input->post('sellprice');

	$product_rating=$this->input->post('product_rating');
	$product_short_desc=$this->input->post('product_short_desc');
	$productpacktype=$this->input->post('productavailableon');
	$productstockqty=$this->input->post('productstkqty');


		 if($_SESSION['adminusertp'] == 'admin')
		 {
		 	// $agents = $this->input->post('agents');
		 	$agents = $this->input->post('prodvendrname');
		 }
		 else
		 {
		 	$agents = $this->encryption->decrypt($_SESSION['adminuserid']);
	 	
		 }

		 // echo $agents;
		 // 	die();
		 $date = date('Y-m-d');

						// $prodimage=$this->input->post('image_file');
						 // new one start
						 $this->load->library('upload');
                
				           $this->upload->initialize(array(
				                "upload_path"       =>  "imageupload/",
				                "allowed_types"     =>  "gif|jpg|png",
				                "max_size"          =>  '',
				                "min_width"         =>  '600',
				                "min_height"        =>  '400'
				            ));
					
					$filename = '' ;
					$this->load->library('image_lib');
					if($this->upload->do_multi_upload("image_file")) {

						$data['upload_data'] = $this->upload->get_multi_upload_data();
						// foreach($data['upload_data'] as $upld){
							
						
							for($i=0;$i<count($data['upload_data']);$i++){
								// imageresize start
									$config['image_library'] = 'gd2';
								    $config['source_image'] = 'imageupload/'.$data['upload_data'][$i]['file_name'];
								    $renameimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data'][$i]['file_name']);
								    $imgname = date('Ymd_his').$renameimage;
								    $config['new_image'] = 'imageupload/'.$imgname;
								    $config['create_thumb'] = FALSE;
								    $config['maintain_ratio'] = FALSE;
								    $config['width']     = 600;
								    $config['height']   = 400;
									$this->image_lib->clear();
								    $this->image_lib->initialize($config);
								    $this->image_lib->resize();
							    // image resize end
								if($i == (count($data['upload_data']) - 1)){
									$filename = $filename .$imgname;
									if($imagehid != ''){
										$filename = $filename.','.$imagehid ;
									}
								}else{
									$filename = $filename.$imgname.',';
								}
								unlink('imageupload/'.$data['upload_data'][$i]['file_name']);
							}


						
					} 
					else
					{
						echo "inavlidimage";
						die();
					}

					// else {    
				                
				  //               $errors = array('error' => $this->upload->display_errors('<p class = "bg-danger">', '</p>'));               
				            
				  //               foreach($errors as $k => $error){
				  //                   echo $error;
				  //               }
				  //           }
										 // new one end

    					// runnning code start
						// $config['upload_path'] = 'imageupload/'; 
			   //        	$config['allowed_types'] = 'jpg|jpeg|png|gif';
			   //        	$this->load->library('upload',$config); 
			   //        	$this->upload->initialize($config);
			   //         	$data = array('upload_data' => $this->upload->data());
			   //          if (!$this->upload->do_upload('image_file'))
			   //          {	
			   //              $error = array('error' => $this->upload->display_errors());
			   //          } else {
			   //              $data = array('upload_data' => $this->upload->data());
			               
			   //          }


                      
 			// runnning code end
			if(isset($_SESSION['adminusertp']))
			{
				if($_SESSION['adminusertp'] == 'admin')
				{
					$approval = 1;
				}
				else
				{
					$approval = '';
				}
			}
			else
			{
				$approval = '';
			}

			
          if(!$this->upload->do_multi_upload("image_file"))
			{
			    $filename = $imagehid;

			}else{
         		if(!empty($prodid)){
         			$searchString = ',';

					if( strpos($imagehid, $searchString) !== false ) {
					    $eximagehids = explode($searchString, $imagehid);
					    for ($i=0;$i<count($eximagehids);$i++) {
					    
							if(!empty($imagehid)){
								// unlink('imageupload/'.$eximagehids[$i]);
							}
					    }
					}else{
						
						if(!empty($imagehid)){
							$unlink_path = 'imageupload/'.$imagehid;
							// unlink($unlink_path);
						}	
					}				
				}
				// $filename = $data['upload_data']['file_name'];
			}
			$i= 0;

			if(!empty($stores)){
			foreach ($stores as $names)
			{
				// $stexp = explode("-", $names);
				// if(!empty($prodid)){
				//  $inserdata[$i]['prod_id'] = $prodid;
				// }

			//	$inserdata[$i]['prod_unique_id'] = $this->randomgenerate->random_string(8,"PRD");

				

		        $inserdata[$i]['prod_store_id'] = $names;

		        $inserdata[$i]['prod_cat_id'] = $prodcategoryid;
		        $inserdata[$i]['prod_sub_cat_id'] = $subprodcategoryid;

		        $inserdata[$i]['prod_brand_id'] = $brand;
		        $inserdata[$i]['prod_agent_id'] = $agents;
		        $inserdata[$i]['prod_priority'] = $display;

		        $inserdata[$i]['prod_code'] = $productcode;
		        $inserdata[$i]['prod_name'] = $prodname;
		        $inserdata[$i]['prod_rate'] = $productrate;
		        $inserdata[$i]['prod_purchase_rate'] = $purchaserate;
		        
		        $inserdata[$i]['prod_descr'] = $productdesc;
		        $inserdata[$i]['prod_disc'] = $productdiscount;
		        $inserdata[$i]['prod_disc_price'] = $productdiscountprice;
		        $inserdata[$i]['prod_sell_price'] = $sellprice;
		        $inserdata[$i]['prod_uom'] = $productmeasureunit;
		        $inserdata[$i]['prod_tax'] = $tax;
		        $inserdata[$i]['prod_image'] = $filename;
		        $inserdata[$i]['prod_deactive'] = $productavailable;
		        $inserdata[$i]['prod_admin_approved'] = $approval;
		        $inserdata[$i]['prod_packtype'] = $productpacktype;
		        $inserdata[$i]['prod_stock_qty'] = $productstockqty;
		        $inserdata[$i]['prod_addedcomm'] = $prodaddedcomm;
		        $inserdata[$i]['prod_commission'] = $productcomm;
		        $inserdata[$i]['prod_modified'] = $date;
		        $inserdata[$i]['prod_short_desc'] = $product_short_desc;
		        $inserdata[$i]['prod_rating'] = $product_rating;
		        
				$i++;
			}
		}
//print_r($inserdata);
	

	$storesingle = $this->input->post('storesingle');
	if(!empty($storesingle)){
		
		$data1= array('prod_store_id' =>$storesingle,'prod_cat_id' =>$prodcategoryid,'prod_sub_cat_id' =>$subprodcategoryid,'prod_brand_id' =>$brand,'prod_agent_id' =>$agents,'prod_priority' =>$display,'prod_code' =>$productcode,'prod_name' =>$prodname,'prod_rate' =>$productrate,'prod_purchase_rate' =>$purchaserate,'prod_descr' =>$productdesc,'prod_disc' =>$productdiscount,'prod_disc_price' =>$productdiscountprice,'prod_sell_price' => $sellprice,'prod_uom' =>$productmeasureunit,'prod_tax' =>$tax,'prod_image' =>$filename,'prod_deactive' =>$productavailable,'prod_admin_approved' =>$approval,'prod_packtype'=>$productpacktype,'prod_stock_qty'=>$productstockqty,'prod_addedcomm' =>$prodaddedcomm,'prod_commission' =>$productcomm,'prod_modified' =>$date,'prod_short_desc' =>$product_short_desc,'prod_rating' =>$product_rating );
	}

	else

	{
		$data1=array();
	}
	 			

	 			
	if(!empty($prodid)){
 	// $res = $this->Product_modal->product_update($prodid,$data1);
 	$res = $this->Product_modal->product_update($prodid,$data1);

 	if($res == 1)
					{	
						$response = array ("file_name" => $filename,
											"status" =>"success");
						echo json_encode($response);
						//echo "success";
					}else{
					
					    $response = array ("file_name" => "",
											"status" =>"failed");
						echo json_encode($response);
						//echo "failed";
					}
 	
	}
	else
	{
		//$res = $this->Product_modal->product_insertbatch($inserdata);
		$res = $this->Product_modal->product_insertbatch($data1);

		if($res != 0)
					{		
						$data4=array
						(
                           'review_prod_id'=>$res,
                           'review_vendor_id'=>$agents,
                           'review_rating'=>'5',
                           'review_date'=>$date
						);

						$res1 = $this->Product_modal->insertpreview($data4);

						if($res1==1)
						{
						$response = array ("file_name" => $filename,
											"status" =>"success");
						echo json_encode($response);
						//echo "success";
						}
						else
						{
						$response = array ("file_name" => "",
											"status" =>"failed");
						echo json_encode($response);
						//echo "failed";
						}	
					}
					else
					{
						$response = array ("file_name" => "",
											"status" =>"failed");
						echo json_encode($response);
						//echo "failed";
					}
	}
// echo $res;					 
// die();		

					

				// }
					// else{
					
					// 	echo "failed";
					// }
		}


		public function deleteimage(){
			$id = $this->input->post('id');
			$check = $this->input->post('check');
			if($check == 'first'){
				$img = $this->input->post('img').',';
			}else if($check == 'last'){
				$img = ','.$this->input->post('img');
			}else{
				$img = $this->input->post('img');
			}
			
			
		 	$resdelete = $this->Product_modal->deleteprodimg($id,$img);
		 	if($resdelete > 0){
		 		$unlink_path = 'imageupload/'.$this->input->post('img');
		 		unlink($unlink_path);
		 	}
		 	$resimage = $this->Product_modal->findprodimg($id);
		 	
	
		 		$data = array('resprim' => $id,'images' => $resimage,'status' => $resdelete);
		 		echo json_encode($data);
		 		
		 	// $a['tabledata'] = $this->Product_modal->display('product');
		 	// $this->load->view('admintables/adminproducttable_view',$a);
		 }
		 public function getproduct(){
		 	$userid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 	if($userid == 'admin001'){
		 		$a['tabledata'] = $this->Product_modal->displayprodadmin();
		 	}else{
		 		$a['tabledata'] = $this->Product_modal->displaybyproduserid('product',$userid);
		 	} 
		// 	echo $userid;

		// 	print_r( $a['tabledata']);// = $this->Product_modal->display('product');
		 	//die();
		 	$this->load->view('admintables/adminproducttable_view',$a);
		 }
		 
		 public function getsubcategorydrpdwn(){
		 	$id = $this->input->post('id');
		 		$subid = $this->Product_modal->displaysubcategory($id);
		 	
		 		echo $subid->sub_id;
		 	// $a['tabledata'] = $this->Product_modal->display('product');
		 	// $this->load->view('admintables/adminproducttable_view',$a);
		 }
		 public function getcategorydrpdwn(){
		 	$id = $this->input->post('id');
		 		$catid = $this->Product_modal->displaycategory($id);
		 	
		 		echo $catid->sub_cat_id;
		 	// $a['tabledata'] = $this->Product_modal->display('product');
		 	// $this->load->view('admintables/adminproducttable_view',$a);
		 }
		 public function approveproduct(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Product_modal');
		 	$res = $this->Product_modal->approveproduct($id);
		 	if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}
		 }
		 
		 public function rejectproduct(){
		 	$id=$this->input->post('id');
		 	$reason=$this->input->post('reason');
		 	$this->load->model('Product_modal');
		 	$res = $this->Product_modal->rejectproduct($id,$reason);
		 	if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}
		 }
		 public function editproduct(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Product_modal');
		 	$resrow = $this->Product_modal->editproduct($id,'product');
		 	// $res = array('productid'=> $resrow->prod_id,'productname' => $resrow->prod_name,
		 	// 	'productimage' => $resrow->prod_image
		 	// );
			echo json_encode($resrow);
		 }
		 
		 public function viewreason(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Product_modal');
		 	$resrow = $this->Product_modal->editproduct($id,'product');
		 	// $res = array('productid'=> $resrow->prod_id,'productname' => $resrow->prod_name,
		 	// 	'productimage' => $resrow->prod_image
		 	// );
		 	echo json_encode($resrow);
		 }
		 public function productavailable(){
		 	$id = $this->input->post('id');
		 	$status = $this->input->post('status');
		 	$this->load->model('Product_modal');
		 	$res = $this->Product_modal->productavailable($id,$status);
		 	if($res == 1){
		 		echo "success";
		 	}else{
		 		echo "failed";
		 	}
		 	
		 }
		 
		 	 public function deleteproduct()
			{
				$prodid = $this->input->post('id');
				$imagename = $this->input->post('imagename');
				$unlink_path = 'imageupload/'.$imagename;
					if(!empty($imagename)){
						unlink($unlink_path);
					}	
				$res = $this->Product_modal->delete_product($prodid);				 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}	
			}
		
		 
		 
	



}
