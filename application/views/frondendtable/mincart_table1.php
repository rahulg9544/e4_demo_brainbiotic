<div class="cart_gallery">

<?php 

// if($miniacrt->num_rows()!=0) { 

if(!empty($miniacrt)) { 

  $cartsubtot=0;  
  $carttotal=0;


foreach($miniacrt as $row)
{ ?>
    


            <div class="cart_item">
               <div class="cart_img">

         <?php


$image = $row->product_image;

 
if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

     // $imagename2 = $exp_imagename[1];

?>    

             <a>
                <img src="<?php echo base_url(); ?>uploads/<?php echo $imagename ?>" alt="<?php echo $row->product_name; ?>">
            </a>

<?php } else { ?>


             <a>
                <img src="<?php echo base_url(); ?>uploads/<?php echo $image ?>" alt="<?php echo $row->product_name; ?>">
            </a>
<?php } ?> 

                   <!-- <a href="#"><img src="<?php echo base_url(); ?>img/product/dress.jpg" alt="" class="img-fluid"></a> -->



               </div>

                <div class="cart_info">


<?php
if($row->product_shoesizeno=='n/a' || $row->product_shoesizeno=='')
{
    $prodsizes=$row->product_sizeno; 
}
else
{
    $prodsizes=$row->product_shoesizeno; 
}

$prodcolors=$row->product_color;

$prodselprise=$row->product_sellpricewise;

$prodmrp=$row->product_mrpwise;

$proddscnt=$row->product_discountwise;

$exp_prodsizes = explode(',', $prodsizes);

$exp_prodcolors = explode(',', $prodcolors);

$exp_prodselprise = explode(',', $prodselprise);

$exp_prodmrp = explode(',', $prodmrp);

$exp_proddscnt = explode(',', $proddscnt);


$cartsize=$row->cart_size;

$cartclr=$row->cart_color;

$prodprise=0;

for($i=0;$i<count($exp_prodsizes);$i++)
{

    if($exp_prodsizes[$i]==$cartsize)
    
    {

        if($exp_prodcolors[$i]==$cartclr)
           {

        $prodprise=$exp_prodselprise[$i];

             ?>


              <a href="#"> <?php echo $row->product_name; ?></a>
                    <p><?php echo $row->cart_quantity; ?> x <span> KWD <?php echo number_format($exp_prodselprise[$i],3); ?> </span></p>
                    
                    <div style="display: flex;margin: 0">
                    <p>size:<?php echo $row->cart_size; ?> ,&nbsp;</p>

                    <?php if(strpos($row->cart_color, '.') !== false){ ?>
                        Color : &nbsp;<div style="width: 20px;height: 20px;border: 0.25px solid;background: url('<?php echo base_url() ?>uploads/<?php echo $row->cart_color ?>');"></div>

                    <?php } else { ?>

                        Color : &nbsp;<div style="width: 20px;height: 20px;border: 0.25px solid;background: <?php echo $row->cart_color ?>"></div>

                    <?php } ?>

                    </div> 
            
            <?php }
        
    }

 } ?>





                       
                </div>
                <div class="cart_remove">
                    <a onclick="removeitemcart_mini('<?php echo $row->cart_id?>');"><i class="ion-ios-close-outline"></i></a>
                </div>
            </div>


<?php

$cartsubtot=$cartsubtot+($prodprise*$row->cart_quantity);

$carttotal=$cartsubtot+0;

 }


} else { 

$cartsubtot=0;
$carttotal=0;

    ?>

<h4>Empty Cart</h4>
<?php } ?>
        </div>


        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">KWD <?php echo number_format($cartsubtot,3) ?></span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">KWD <?php echo number_format($carttotal,3) ?></span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
           <div class="cart_button">
                <a href="<?php echo base_url();?>Cart"><i class="fa fa-shopping-cart"></i> View cart</a>
            </div>
            <div class="cart_button">
                <a onclick="mincartcheckprocd();"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>

        </div>
