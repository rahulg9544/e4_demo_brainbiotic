<table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Stock Status</th>
                                            <th class="product_total">Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
   <?php foreach($wish as $row) { 
   
   $prodid = base64_encode($row->product_id);
   
   ?>                                     
                                        <tr>
   <td class="product_remove"><a onclick="removewishitem(<?php echo $row->wishlist_id ?>);">X</a></td>

<?php

$image = $row->product_image;

 
if( strpos( $image,',') !== false ) 
  {
   
     $exp_imagename = explode(',', $image);

     $imagename = $exp_imagename[0];

     // $imagename2 = $exp_imagename[1];

?>



    <td class="product_thumb"><a href="#"><img src="<?php echo base_url();?>uploads/<?php echo $imagename ?>" alt=""></a></td>

<?php 
}
else
{ ?>

<td class="product_thumb"><a href="#"><img src="<?php echo base_url();?>uploads/<?php echo $row->product_image ?>" alt=""></a></td>

<?php 
} ?>

    <td class="product_name"><a href="#"><?php echo $row->product_name ?></a></td>
    <td class="product-price">KD <?php echo $row->product_sell_price ?></td>
    <?php if($row->product_available==0) { ?>
    <td class="product_quantity">In Stock</td>
    <?php } else { ?>
    <td class="product_quantity" style="color: red">Out of Stock</td>
    <?php } ?>
    <td class="product_total"><a href="<?php echo base_url();?>index.php/TootController/productdetails?pid=<?php echo $prodid ?>">Add To Cart</a></td>


                                        </tr>

                  <?php } ?>                     
                                    </tbody>
                                </table>