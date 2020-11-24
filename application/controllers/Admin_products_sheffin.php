<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_products extends CI_Controller {

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
    
      $this->load->model('Admin_products_model');
//      $this->load->library('encryption');
      $this->load->library('randomgenerate');
      
  }

   public function index()
  {
    //if(isset($_SESSION['username']))
   //     {
          
        $Brands = $this->Admin_products_model->getbrands();
        $Category = $this->Admin_products_model->accessories();
        $OtherCategory = $this->Admin_products_model->nonaccessories();
        $subcategory = $this->Admin_products_model->subcategories();
        $a = array('content' => 'admin_products_view',
                     'brandtype' => $Brands,'cat' => $Category,'catother' => $OtherCategory,
                     'sub' => $subcategory
                  );
        $this->load->view('admintemplate',$a);
   //     }
   //   else
   //     {
   //       $this->load->view('adminlogin_view');
   //     }
  }

  public function displayproducts()
  {
    $result['res'] = $this->Admin_products_model->get_products();
  //  print_r($result['res']);
    $this->load->view('admintables/display_products',$result);
  } 

public function insertproduct()
    {
        $id= $this->input->post('productnm');  
        $image_file=$this->input->post('image_file');
        $imagehid = $this->input->post('imagehid');

          $this->load->library('upload');
                    $this->upload->initialize(array(
                        "upload_path"       =>  "uploads/",
                        "allowed_types"     =>  "gif|jpg|png",
                        "max_size"          =>  '',
                        "width"         =>  '500',
                        "height"        =>  '748',
                        "maintain_ratio"=>  FALSE
                    ));
          
          $image_name = '';
          $this->load->library('image_lib');
          
   if($this->upload->do_multi_upload("image_file")) {
    //image uploaded
    $data['upload_data'] = $this->upload->get_multi_upload_data();
   
    for($i=0;$i<count($data['upload_data']);$i++){

                    //resize product_image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'uploads/'.$data['upload_data'][$i]['file_name'];
                    $renameimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data'][$i]['file_name']);
                    $imgname = date('Ymd_his').$renameimage;
                    $config['new_image'] = 'uploads/'.$imgname;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']     = 500;
                    $config['height']   = 748;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //resize product_image_end

      if($i == (count($data['upload_data']) - 1))
      {
        $image_name = $image_name.$imgname;

          if($imagehid != '')
          {
            $image_name = $image_name.','.$imagehid ;
          }
      }
      else
      {
        $image_name = $image_name.$imgname.',';
      }

      //unlink the original image & keep only resized image

      unlink('uploads/'.$data['upload_data'][$i]['file_name']);

    // echo count($data['upload_data']);
      }

    //  print_r($image_name);

      //update image field if previous image is removed & updated with new image

      if(!empty($id)){
                  $searchString = ',';
              if( strpos($imagehid, $searchString) !== false ) {
                  $eximagehids = explode($searchString, $imagehid);
                  for ($i=0;$i<count($eximagehids);$i++) {
                  
                  if(!empty($imagehid)){
                    // unlink('imageupload/'.$eximagehids[$i]);
                  }

                  }
              }
              else{
                
                if(!empty($imagehid)){
                  $unlink_path = 'uploads/'.$imagehid;
                  // unlink($unlink_path);
                } 
              }

       //update image field if previous image is removed & updated with new image

    }

  }


  else
  {
     //not uploaded
      if(empty($id))
            {
              echo "failed1";
              die();
            }
            else
            {
              // if it product update with image not getting updated
               $image_name = $imagehid;
            }
  }


//image upload end



//new fields insert & update

      $date=date('Y-m-d');

      $cat=$this->input->post('category');
      $subcatname=$this->input->post('subcategory');

      $getsubid = $this->Admin_products_model->getsubsid($subcatname);

      $subid=$getsubid->subcategory_id;
      
       $sizecolorchoice = $this->input->post('sizecolorchoice');

      if($sizecolorchoice==1)
      {  

      
// if  footwear & shoe
       if($subcatname=='Footwear' || $subcatname=='footwear' || $subcatname=='Sheos' || $subcatname=='sheos' )
       {

        $prodsize='';
        $prodsizeltr='';
    
          $shoesize = "". implode(',',$this->input->post('shoesize_nm'))."";

            $quantity = "". implode(',',$this->input->post('quantitynm'))."";

               $mrpwise = "". implode(',',$this->input->post('mrpwise'))."";

           $discountwise = "". implode(',',$this->input->post('discountwise'))."";

           $sellpricewise = "". implode(',',$this->input->post('sellpricewise'))."";

          $color ="". implode(',',$this->input->post('colors'))."";

          $exp_color=explode(',', $color);

        $colorcount=count($exp_color);


        $colorimagestring='';

          $config['upload_path']="./uploads";
          $config['allowed_types']='jpeg|jpg|png';
          $config['remove_spaces'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload',$config);
          $data = array('upload_data' => $this->upload->data());
          $this->upload->initialize($config);

// colour image section

        for($i=0;$i<$colorcount;$i++)
        {

          if(!$this->upload->do_upload('image_file1'.$i))
          {
              if(!empty($id))
              {
              $file_name = $this->input->post('imagehid1');
              $filenamewise = $file_name[$i];
              }
               else
               {
                 $error = array('error'=> $this->upload->display_errors());
                 $filenamewise='na';
               }
              
           
          }
          else
          {
            $data = array('upload_data' => $this->upload->data());
            $filenamewise = $data['upload_data']['file_name'];
          }
          
          if($i==0)
          {
            $colorimagestring.=$filenamewise;
          }
          else
          {
            $colorimagestring.=",".$filenamewise;
          }          

        }

         $color_status ="". implode(',',$this->input->post('colorstat'))."";
  
       }
// if footwear & shoe end  


// if not footwear & shoe
       else
       {

          $shoesize='';
           
          $prodsize = "". implode(',',$this->input->post('shoesize_nmp'))."";

          $prodsizeltr = "". implode(',',$this->input->post('psizeltr_nmp'))."";

            $quantity = "". implode(',',$this->input->post('quantitynmp'))."";

               $mrpwise = "". implode(',',$this->input->post('mrpwisep'))."";

           $discountwise = "". implode(',',$this->input->post('discountwisep'))."";

           $sellpricewise = "". implode(',',$this->input->post('sellpricewisep'))."";

          $color ="". implode(',',$this->input->post('colorsp'))."";

          $exp_color=explode(',', $color);

        $colorcount=count($exp_color);


        $colorimagestring='';

          $config['upload_path']="./uploads";
          $config['allowed_types']='jpeg|jpg|png';
          $config['remove_spaces'] = TRUE;
          $config['encrypt_name'] = TRUE;
          $this->load->library('upload',$config);
          $data = array('upload_data' => $this->upload->data());
          $this->upload->initialize($config);

// colour image section

        for($i=0;$i<$colorcount;$i++)
        {

          if(!$this->upload->do_upload('image_filep1'.$i))
          {
              if(!empty($id))
              {
              $file_name = $this->input->post('imagehid1p');
              $filenamewise = $file_name[$i];
              }
               else
               {
                 $error = array('error'=> $this->upload->display_errors());
                 $filenamewise='na';
               }
              
           
          }
          else
          {
            $data = array('upload_data' => $this->upload->data());
            $filenamewise = $data['upload_data']['file_name'];
          }
          
          if($i==0)
          {
            $colorimagestring.=$filenamewise;
          }
          else
          {
            $colorimagestring.=",".$filenamewise;
          }          

        }

        $color_status ="". implode(',',$this->input->post('colorstatp'))."";


       }  
// if not footwear & shoe       
        

     //    echo $colorimagestring;
    //     die();     

        $exp_colorimag=explode(',', $colorimagestring);
        $clornimagefinal='';

           // echo $colorimagestring."||".$color;
           // die();

         
         $exp_color_status=explode(',', $color_status);
         $total_colour_count = count($exp_color_status);

        // print_r($exp_color_status);

        for($s=0;$s<$total_colour_count;$s++)
        {
          if($exp_color_status[$s]=='Image')
          {
            if($s==0)
            {
              $clornimagefinal.=$exp_colorimag[$s];
            }
            else
            {
              $clornimagefinal.=",".$exp_colorimag[1];
            }
          }
          else
          {
            if($s==0)
            {
              $clornimagefinal.=$exp_color[$s];
            }
            else
            {
              $clornimagefinal.=",".$exp_color[$s];
            }
          }
        }
        
    
      }
     else
     {
        $shoesize='n/a';
        
        $prodsize="n/a";

        $quantity="n/a";

        $prodsizeltr='n/a';

        $mrpwise='n/a';

        $sellpricewise='n/a';

        $discountwise='n/a';

        $clornimagefinal='n/a';

     }       
        
        // colour image section   
          // echo $clornimagefinal;
          // die();        

    
        $data = array
        (
        'product_unique_id'=>$this->randomgenerate->random_string(8,"PRD"),
        'product_category'=>$cat,  
        'product_subcategory'=>$subid, 
        'product_division'=>$this->input->post('division'),
        'product_priority'=>$this->input->post('prioritynm'),
        'product_name'=>$this->input->post('namenm'),
        'product_size_status'=>$sizecolorchoice,
        'product_rate'=>$this->input->post('mrpnm'),
        'product_purchase_rate' =>$this->input->post('purchaserate_nm'),
        'product_discount' =>$this->input->post('discountpercent_nm'),
        'product_sell_price' =>$this->input->post('sellprice_nm'), 
        'product_desc' =>$this->input->post('descnm'),
        'product_iconic'=>$this->input->post('iconicproduct'),
        'product_composition' =>$this->input->post('compositionnm'),
        'product_instruction' =>$this->input->post('instructionnm'),
        'product_shipping' =>$this->input->post('shippingnm'),
        'product_image' =>$image_name,
        'product_sizeno' =>$prodsize,
        'product_sizeletter'=>$prodsizeltr,
        'product_shoesizeno' =>$shoesize,
        'product_quantity' =>$quantity,
        'product_mrpwise'=>$mrpwise,
        'product_sellpricewise'=>$sellpricewise,
        'product_discountwise'=>$discountwise,
        'product_available' =>$this->input->post('productavailable'),
        'product_color' =>$clornimagefinal,
        'product_brand' =>$this->input->post('brandnm'),
        'product_date'=>$date,
        'product_name_arab'=>$this->input->post('namenmarb'),
        'product_desc_arab'=>$this->input->post('descnmarb'),
        'product_composition_arab'=>$this->input->post('compositionnmarb'),
        'product_instruction_arab'=>$this->input->post('instructionnmarb'),
        'product_shipping_arab'=>$this->input->post('shippingnmarb')

        );
      
        
        $data1 = array
        (
        
        'product_category'=>$cat,  
        'product_subcategory'=>$subid, 
        'product_division'=>$this->input->post('division'),
        'product_priority'=>$this->input->post('prioritynm'),
        'product_name'=>$this->input->post('namenm'),
        'product_size_status'=>$sizecolorchoice,
        'product_rate'=>$this->input->post('mrpnm'),
        'product_purchase_rate' =>$this->input->post('purchaserate_nm'),
        'product_discount' =>$this->input->post('discountpercent_nm'),
        'product_sell_price' =>$this->input->post('sellprice_nm'), 
        'product_desc' =>$this->input->post('descnm'),
        'product_iconic'=>$this->input->post('iconicproduct'),
        'product_composition' =>$this->input->post('compositionnm'),
        'product_instruction' =>$this->input->post('instructionnm'),
        'product_shipping' =>$this->input->post('shippingnm'),
        'product_image' =>$image_name,
        'product_sizeno' =>$prodsize,
        'product_sizeletter'=>$prodsizeltr,
        'product_shoesizeno' =>$shoesize,
        'product_quantity' =>$quantity,
        'product_mrpwise'=>$mrpwise,
        'product_sellpricewise'=>$sellpricewise,
        'product_discountwise'=>$discountwise,
        'product_available' =>$this->input->post('productavailable'),
        'product_color' =>$clornimagefinal,
        'product_brand' =>$this->input->post('brandnm'),
        'product_date'=>$date,
        'product_name_arab'=>$this->input->post('namenmarb'),
        'product_desc_arab'=>$this->input->post('descnmarb'),
        'product_composition_arab'=>$this->input->post('compositionnmarb'),
        'product_instruction_arab'=>$this->input->post('instructionnmarb'),
        'product_shipping_arab'=>$this->input->post('shippingnmarb')

        );

       // print_r($data1);

      if($id=='')
      {
        $result1 = $this->Admin_products_model->insert_products($data);
      }
      else
      {
         $result1 = $this->Admin_products_model->update_products($id,$data1);
      } 

     // die();  

      if ($result1==1)
      {
         echo "success";
      }
      else
      {
         echo "failed";
      } 
    
  }



  public function editproducts()
  {
        $id = $this->input->post('id');
        $res = $this->Admin_products_model->get_productsidedit($id);
        echo json_encode($res);
  } 

  public function productavailable(){
      $id = $this->input->post('id');
      $status = $this->input->post('status');
   //   $this->load->model('Admin_products_model');
      $res = $this->Admin_products_model->productavailable($id,$status);
      if($res == 1){
        echo "success";
      }else{
        echo "failed";
      }
      
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
      
      
      $resdelete = $this->Admin_products_model->deleteprodimg($id,$img);
      if($resdelete > 0){
        $unlink_path = 'uploads/'.$this->input->post('img');
        unlink($unlink_path);
      }
      $resimage = $this->Admin_products_model->findprodimg($id);
      
  
        $data = array('resprim' => $id,'images' => $resimage,'status' => $resdelete);
        echo json_encode($data);
        
      // $a['tabledata'] = $this->product_modal->display('product');
      // $this->load->view('admintables/adminproducttable_view',$a);
     }
   

   public function delete()
    {
       $id = $this->input->post('id');  
       $res = $this->Admin_products_model->delete_products($id);

       $image=$this->input->post('imagename');
       $img_path='uploads/'.$image;
       unlink($img_path);   

       if($res == 1)
        {   
            echo "success";
        }else{  
            echo "failed";
        }
    }

    public function shoequantity(){
      $id=$this->input->post('id');
      $result['res'] = $this->Admin_products_model->get_quantity($id);
        //  print_r($result['res']);
      $this->load->view('display_shoequantity',$result);
    }

    public function quantity(){
      $id=$this->input->post('id');
      $result['res'] = $this->Admin_products_model->get_quantity($id);
        //  print_r($result['res']);
      $this->load->view('display_quantity',$result);
    }

    public function getsubcategorydrpdwn()
    {
        $id = $this->input->post('id');
        $name=$this->Admin_products_model->subname($id);
        $subname= $name->subcategory_id;
        
        $subid = $this->Admin_products_model->displaysubcategory($subname);
      
        echo $subid->subcategory_name;
     }

     public function getcategorydrpdwn()
     {
        $id = $this->input->post('id');
        $catid = $this->Admin_products_model->displaycategory($id);
      
        echo $catid->subcategory_category;
     }


     public function getscatsubcats()
     {
      $catid= $this->input->post('catid');
       
      $res['subs'] = $this->Admin_products_model->getsubsoncat($catid); 
      
      $this->load->view('admintables/subcatchange',$res); 

     }


       public function getdivisiononsub()
     {
        $sbname= $this->input->post('sbname');

        if(empty($sbname))
        {
          $subid = 0;
        }
        else
        {
           $getsbid = $this->Admin_products_model->getsubdetails($sbname);  

           $subid=$getsbid->subcategory_id;
        }

       

      //$subid=$this->input->post('sbid');
       
      $res['divs'] = $this->Admin_products_model->getdivsonsub($subid); 
      
      $this->load->view('admintables/divisionchange',$res);
     }


}