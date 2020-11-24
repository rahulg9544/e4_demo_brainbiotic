
<?php

// print_r($cartitems);

 if($cartitems->num_rows()!=0)
{ ?>
 <table id="cart_summary" class="std">
                <thead>
                <tr>
                    <th class="cart_product first_item"></th>
                    <th class="cart_description item"></th>
                    
                    <th class="cart_unit item">Unit price</th>
                    <th class="cart_quantity item" width="50">Quantity</th>
                    <th class="cart_total last_item">Total</th>
                </tr>
                </thead>
                <tbody>

<?php

$carttotal=0;

 foreach($cartitems->result() as $row) { ?>                                                                                                                                                        
                    
<tr id="product_5806_17409_0_0" class="cart_item last_item address_0 even shopping-cart__cart">
    <td class="cart_product">

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

    </td>
    <td class="cart_description coinzer">
        <p class="s_title_block">
            <a class="link link--black"><?php echo $row->product_name; ?></a></p>

            <?php if(strpos($row->cart_color, '.') !== false){ ?>	
             <a span="">
             	<div style="display: flex;">Color : &nbsp;<div style="width: 38px;height: 37px;border: 0.5px solid;background: url('<?php echo base_url() ?>uploads/<?php echo $row->cart_color ?>');"></div></div><br><span>Size : <?php echo $row->cart_size ?></span>
             </a> 
            <?php } else { ?>  
             <a span="">
             	<div style="display: flex;">Color : &nbsp;<div style="width: 38px;height: 37px;border: 0.5px solid;background: <?php echo $row->cart_color ?>"></div></div><br><span>Size : <?php echo $row->cart_size ?></span>
             </a> 
            <?php } ?>  
    </td>

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

              <td class="cart_unit">
				<span class="price" id="product_price_5806_17409_0">
				<span> KWD <?php echo number_format($exp_prodselprise[$i],3); ?></span>
                
                <?php if($exp_proddscnt[$i]!=0 && $exp_proddscnt[$i]!='') { ?>

				<span class="without-reduction" style="text-decoration:line-through; color:#ccc;"> KWD <?php echo number_format($exp_prodmrp[$i],3); ?> </span>
		        </span>

                <?php } ?>

              </td>
			
			<?php }
		
	}

 } ?>

    <td class="cart_quantity">
        

                    <div class="qty ">
                        <span class="minus1 " onclick="changecartqty('<?php echo $row->cart_id?>','sub');">-</span>
                        <input type="number" class="count" id="qty<?php echo $row->cart_id?>" onchange="changecartqty('<?php echo $row->cart_id?>','inp');" name="qty" value="<?php echo $row->cart_quantity ?>">
                        <span class="plus1 " onclick="changecartqty('<?php echo $row->cart_id?>','add');">+</span>
                    </div>

                   
    </td>

<?php $totalprodprise = $prodprise*$row->cart_quantity; ?>

    <td class="cart_total">
		<span class="price" id="total_product_price_5806_17409_0">

			KWD <?php echo number_format($totalprodprise,3) ?>
			                                   	
        </span>

      <a rel="nofollow" onclick="removeitemcart('<?php echo $row->cart_id?>');" class="cart_quantity_delete" id="5806_17409_0_0" href="#"><span class="ion-ios-close-outline"></span></a>
                            
    </td>
</tr>

                    
 <?php

$carttotal=$carttotal+$totalprodprise;

  } ?> 

          
                </tbody>
                                <tfoot>

                </tfoot>
            </table>
<input type="hidden" name="carttotlinp" id="carttotlinp" value="<?php echo number_format($carttotal,3); ?>">
<input type="hidden" name="cartgshipcinp" id="cartgshipcinp" value="<?php echo number_format(0,3); ?>">

<?php $cgtotal =$carttotal+0 ?>

<input type="hidden" name="cartgtotlinp" id="cartgtotlinp" value="<?php echo number_format($cgtotal,3); ?>">

<?php } else { ?>   

<input type="hidden" name="carttotlinp" id="carttotlinp" value="0">

<input type="hidden" name="cartgshipcinp" id="cartgshipcinp" value="0">

<input type="hidden" name="cartgtotlinp" id="cartgtotlinp" value="0">


<h3 class="col-md-12" style="text-align: ">No Items Added to Your Cart</h3>     




<?php } ?>    