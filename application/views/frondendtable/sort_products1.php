<?php 

// echo $subid;



if(!empty($priceprds)) { 
$q=0;
foreach($priceprds as $row)
{

$prodid = base64_encode($row->product_id);
    ?>                        


    <div class="col-lg-3 col-md-4 col-sm-6 col-6 ">
        <div class="single_product">
            <div class="product_thumb">


            <?php

$image = $row->product_image;

 
if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

     $imagename2 = $exp_imagename[1];

?>    

               <!--  <a class="primary_img" href="<?php echo base_url();?>index.php/TootController/productdetails"><img src="<?php echo base_url();?>img/product/belt.jpg" alt=""></a>
                <a class="secondary_img" href="<?php echo base_url();?>index.php/TootController/productdetails"><img src="<?php echo base_url();?>img/product/belt2.jpg" alt=""></a> -->

<a class="primary_img" href="<?php echo base_url();?>index.php/TootController/productdetails?pid=<?php echo $prodid ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $imagename ?>" alt=""></a>
            
<a class="secondary_img" href="<?php echo base_url();?>index.php/TootController/productdetails?pid=<?php echo $prodid ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $imagename2 ?>" alt=""></a>

<?php 
}
else
{ 
    ?>
     <a class="primary_img" href="<?php echo base_url();?>index.php/TootController/productdetails?pid=<?php echo $prodid ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $image ?>" alt=""></a>
            <a class="secondary_img" href="<?php echo base_url();?>index.php/TootController/productdetails?pid=<?php echo $prodid ?>"><img src="<?php echo base_url(); ?>uploads/<?php echo $image ?>" alt=""></a>
<?php } ?> 


<?php $proddescount = $row->product_discount; 

if($proddescount=='' || $proddescount==0)

{

} 
else { ?>


                <div class="label_product">
                    <span class="label_sale">-<?php echo $proddescount ?>%</span>
                </div>

<?php } ?>                

                <div class="action_links">
        <ul>

         <?php if(isset($_SESSION['cusername']) || isset($_SESSION['cgustid'])) { 
            
           
            ?>
            <li class="wishlist"><a onclick="additemwishlist(<?php echo $row->product_id ?>);" title="Add to Wishlist"><i class="icon-heart icons"></i></a></li> 

             <?php } else { ?>

            <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="icon-heart icons"></i></a></li>
            
            <?php } ?>  
            
            <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box<?php echo $row->product_id ?>"  title="quick view"> <i class="icon-magnifier-add icons"></i></a></li>
        </ul>
    </div>
            </div>
            <div class="product_content grid_content">
                <h4 class="product_name"><a href="<?php echo base_url();?>index.php/TootController/productdetails"><?php echo $row->product_name ?></a></h4>

<?php if($proddescount=='' || $proddescount==0)

{ ?>



                <div class="price_box"> 
                    <!-- <span class="old_price">KD 10</span> -->
                    <span class="current_price">KD <?php echo $row->product_sell_price ?></span>
                </div>
<?php } 
else { ?>      

                <div class="price_box"> 
                    <span class="old_price">KD <?php echo $row->product_rate ?></span>
                    <span class="current_price">KD <?php echo $row->product_sell_price ?></span>
                </div>
<?php } ?>                             
                <!--<div class="add_to_cart">
                                    <a href="#">+ Add to cart</a>
                                </div>-->
            </div>
            <div class="product_content list_content">
                <h4 class="product_name"><a href="#"><?php echo $row->product_name ?></a></h4>

<?php if($proddescount=='' || $proddescount==0)

{ ?>



                <div class="price_box"> 
                    <!-- <span class="old_price">KD 10</span> -->
                    <span class="current_price">KD <?php echo $row->product_sell_price ?></span>
                </div>
<?php } 
else { ?>      

                <div class="price_box"> 
                    <span class="old_price">KD <?php echo $row->product_rate ?></span>
                    <span class="current_price">KD <?php echo $row->product_sell_price ?></span>
                </div>
<?php } ?>
                
                
            </div>
        </div>
    </div>



       <!-- modal area start-->
    <div class="modal fade" id="modal_box<?php echo $row->product_id ?>" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="ion-android-close"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
    <div class="tab-content product-details-large">

    <?php if( strpos( $image,',') !== false ) 
     {
       
        
       $exp_images = explode(',', $image);

       for($i=0;$i<count($exp_images);$i++)
       { 

         if($i==0)
         {
        ?>

        <div class="tab-pane fade show active" id="tab<?php echo $i ?>" role="tabpanel" >
        <?php } else { ?>   
        <div class="tab-pane fade " id="tab<?php echo $i ?>" role="tabpanel" >
        <?php } ?> 

            <div class="modal_tab_img">
                <a href="#"><img src="<?php echo base_url(); ?>uploads/<?php echo $exp_images[$i] ?>" alt=""></a>    
            </div>
        </div>

    <?php }
     } else { ?>

        <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
            <div class="modal_tab_img">
                <a href="#"><img src="<?php echo base_url(); ?>uploads/<?php echo $image ?>" alt=""></a>    
            </div>
        </div>

    <?php } ?>    

       
    </div>
    <div class="modal_tab_button">    
        <ul class="nav product_navactive owl-carousel" role="tablist">

        <?php if( strpos( $image,',') !== false ) 
     {
       
        
       $exp_images = explode(',', $image);

       for($i=0;$i<count($exp_images);$i++)
       { ?>    
            <li >
                <a class="nav-link active" data-toggle="tab" href="#tab<?php echo $i ?>" role="tab" aria-controls="tab<?php echo $i ?>" aria-selected="false"><img src="<?php echo base_url(); ?>uploads/<?php echo $exp_images[$i] ?>" alt=""></a>
            </li>

        <?php }
     } else { ?>  
     
            <li >
                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="<?php echo base_url(); ?>uploads/<?php echo $image ?>" alt=""></a>
            </li>
      <?php } ?>        
            

        </ul>
    </div>    
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
    <div class="modal_title mb-10">
        <h2><?php echo $row->product_name ?></h2> 
    </div>
    <div class="modal_price mb-10">
        <span class="new_price" >KWD <span id="price<?php echo $q ?>"><?php echo $row->product_sell_price ?></span></span>    
       
    </div>
    <div class="modal_description mb-15">
        <p><?php echo $row->product_desc ?></p>    
    </div> 
                                   
                                   
                                    <div class=" product_d_action">
                              <div class="product__favorite">
                            
<div>
<span class="icon-heart"></span>
<span class="icon-heart"></span>
<span class="icon-heart"></span>
<span class="icon-heart"></span>
<span class="icon-heart"></span>
</div>
<!-- <button class="icon-heart add" onclick="javascript:('add', 1);wishDisplay(0); return false;" title="Add to Wishlist">
</button>
<button class="icon-heart active delete" onclick="javascript:('delete', '');wishDisplay(1);return false;" style="display:none;" title="Add to my wishlist">
</button> -->

<?php if(isset($_SESSION['cusername']) || isset($_SESSION['cgustid'])) { 
            
           
            ?>

<button class="icon-heart add" onclick="additemwishlist(<?php echo $row->product_id ?>);" title="Add to Wishlist">
</button>
<button class="icon-heart active delete" onclick="javascript:('delete', '');wishDisplay(1);return false;" style="display:none;" title="Add to my wishlist">
</button>

<?php } ?>



</div> 
                            </div>
                            
                            <div class="clear"></div>

<!-- sizes  -->                           
                            <div class="custom-radios">
                             <h6>Select Size</h6>


<?php

$subcatname = $row->subcategory_name;

if($subcatname=='Footwear' || $subcatname=='footwear' || $subcatname=='Sheos' || $subcatname=='sheos' )
{
  $size=$row->product_shoesizeno;
}
else
{
  $size=$row->product_sizeno;
}



$sizeunqary=array();

$colors=$row->product_color;

$price=$row->product_sellpricewise;

 if( strpos( $size,',') !== false ) 
     {
       
        
       $exp_size = explode(',', $size);

       $exp_colors = explode(',', $colors);

       $exp_price = explode(',', $price);

       for($i=0;$i<count($exp_size);$i++)
       {  

           if(in_array($exp_size[$i], $sizeunqary))
          {

          }
          else
          {    
           array_push($sizeunqary, $exp_size[$i]);  
              ?>   


  <div>
    <input type="radio" id="sizeno<?php echo $q ?>-<?php echo $i ?>" name="sizeno<?php echo $q ?>" value="<?php echo $exp_size[$i] ?>" onclick="colorshow('<?php echo $q ?>');" >

    <label for="sizeno<?php echo $q ?>-<?php echo $i ?>">
      <span><?php echo $exp_size[$i] ?>
      </span>
    </label>
  </div>

      <?php
          }
       }

   $allsizeclr='';

   for($j=0;$j<count($sizeunqary);$j++)
   {
     
     $jsize=$sizeunqary[$j];

     // $sizeviseclr=$jsize."-";

     $sizeviseclr=$jsize."-";

      for($p=0;$p<count($exp_size);$p++)
      {
        $psize=$exp_size[$p];
          if($jsize==$psize)
          {
             // $sizeviseclr.=$exp_colors[$p].",";
             $sizeviseclr.=$exp_colors[$p]."=".$exp_price[$p].",";
          }
      }

      if($allsizeclr=='')
      {
       $allsizeclr.= $sizeviseclr;
      }
      else
      {
        $allsizeclr.="/".$sizeviseclr;
      }  

   }

   // print_r($sizeunqary);


  
   // echo $allsizeclr;

?>

<input type="hidden" name="colrinput" id="colrinput<?php echo $q ?>" value="<?php echo $allsizeclr ?>">

<?php } else { ?>

<div>
    <input type="radio" id="sizeno<?php echo $q ?>-1" name="sizeno<?php echo $q ?>" value="<?php echo $size ?>" checked>
    <label for="sizeno-1">
      <span><?php echo $size ?>
      </span>
    </label>
</div>

<?php } ?>      
  


</div>

<!-- size -->


<div class="custom-radios2">

 <h6>Select Color</h6>
 <div id="colorfill<?php echo $q; ?>">
  <!-- <div>
    <input type="checkbox" id="color-01" name="color" value="color-01" checked>
    <label for="color-01" style="background: pink">
      <span>
      </span>
    </label>
  </div> -->
 </div> 

 <input type="hidden" id="selecolor<?php echo $q ?>" name="selecolor<?php echo $q ?>">

 <input type="hidden" id="selesize<?php echo $q ?>" name="selesize<?php echo $q ?>">
  
  <!-- <div>
    <input type="checkbox" id="color-02" name="color" value="color-02">
    <label for="color-02">
      <span>
      </span>
    </label>
  </div>
  
  <div>
    <input type="checkbox" id="color-03" name="color" value="color-03">
    <label for="color-03">
      <span>
      </span>
    </label>
  </div>

  <div>
    <input type="checkbox" id="color-04" name="color" value="color-04">
    <label for="color-04">
      <span>
      </span>
    </label>
  </div> -->
  
  
  
  
</div>
                                   
                                   
                                        
  <div class="modal_add_to_cart">
<?php if(isset($_SESSION['cusername'])) { 
            
            ?>
      <!-- <form action="#"> -->
          <input min="1" max="100" step="1" value="1" id="cartqtyinp<?php echo $q; ?>" type="number">
          <button onclick="additemcart('<?php echo $row->product_id ?>','<?php echo $q ?>')">add to cart</button>
      <!-- </form> -->
  <?php } ?>    
  </div>   
                                    </div>
  <div class="modal_social">
      <h2>Share this product</h2>
      <ul>
          <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
          <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
      </ul>    
  </div>      
                                </div>    
                            </div>    
                        </div>     
                    </div>
                </div>    
            </div>
        </div>
    <!-- </div> -->
    <!-- modal area end-->
    


  

<?php
$q++;

 } 
 } else { ?>   


 <h3 class="col-md-12" style="text-align: center;">No Products Available</h3>


 <?php } ?>                    
                   
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    <!--<div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>-->
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>