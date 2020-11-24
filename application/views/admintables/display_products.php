<table class="table table-hover table-bordered  " id="tablefillcat">
  <thead>
    <tr>
        <th>ID</th>
        <th>Product Unique ID</th>    
      <!--  <th>Priority</th>-->
        <th>Name</th>
        <th>Image</th>
        <th>Stock Available</th>
        <th>Category</th>
        <th>Subcategory</th>
        <!--<th>Brand</th>-->
        <th>Purchase Rate</th>     
        <th>MRP Price</th>
        <th>Discount</th>
       <!-- <th>Discount Price</th>-->
        <th>Sell Price</th>
        <!-- <th>Description</th>
        <th>Composition</th>
        <th>Care Instructions</th>
        <th>Shipping & Return</th> -->
        <th>Quantity</th>
       <!-- <th>Shoe Size</th>
        <th>Color</th>
        <th>Stock Quantity</th>-->
        
    <!--    <th>Status</th>-->
        <th>Operations</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
                  	
    foreach($res as $row){?>
      <tr>
     
         
          <td><?php echo $row->product_id;?></td>
          <td><?php echo $row->product_unique_id;?></td>
          
        <!--  <td><?php echo $row->product_priority?></td>-->
           <td><?php echo $row->product_name?></td>
          <?php
        $searchString = ',';
        $prodimg = '';
        if( strpos($row->product_image, $searchString) !== false ) {
             $eximage = explode(',', $row->product_image);
            $prodimg = $eximage[0];
        } 
        else{
            $prodimg = $row->product_image;
        }
        ?>

        <td><?php if(!empty($prodimg)){?><img src="<?php echo base_url();?>uploads/<?php echo $prodimg?> " style="width:100px;height:50px;"><?php }?></td>

         <td>
             <center>
                            <?php if($row->product_available == 0){?>
                            <button class="btn btn-success btn-xs" onclick="productavailable('<?php echo $row->product_id;?>','yes');">Yes</button>
                          <?php } 
                           else{ ?> 
                       
                      <button class="btn btn-danger btn-xs" onclick="productavailable('<?php echo $row->product_id;?>','no');">No</button>
                         <?php } ?>
                      </center>

           </td> 
             
          <td><?php echo $row->category_label?></td>
          <td><?php echo $row->subcategory_name?></td>
          <!--<td><?php echo $row->product_brand?></td>-->
          <td><?php echo $row->product_purchase_rate?></td>
          <td><?php echo $row->product_rate?></td>
          <td><?php echo $row->product_discount?></td>
     <!--      <td><?php echo $row->product_discount_price?></td>-->
          <td><?php echo $row->product_sell_price?></td>
          <!--  <td><?php echo $row->product_desc?></td>
          <td><?php echo $row->product_composition?></td>
          <td><?php echo $row->product_instruction?></td>
           <td><?php echo $row->product_shipping?></td> -->
          <td>
            <?php
            $cat=$row->category_label;
             if($cat=='shoe'){
              ?>
              <div class="media-right">
              <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewshoemodal"  onclick="viewshoequantity('<?php echo $row->product_id;?>');">View</button>
              </div>
            <?php 
              }
            else{
              ?>
              <div class="media-right">
                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewmodal"  onclick="viewquantity('<?php echo $row->product_id;?>');">View</button>
              </div>
            <?php  
            }
            ?>
          </td>
      
          <td><div class="media-right">
                
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="viewproduct('<?php echo $row->product_id;?>');"><i class="icon ion-eye"></i></button>

                 <button class="btn btn-success btn-xs"   onclick="editproduct('<?php echo $row->product_id;?>');"><i class="icon ion-edit"></i></button>

                  <button class="btn btn-danger btn-xs" onclick="deleteproduct('<?php echo $row->product_id;?>','<?php echo $row->product_image;?>');"><i class="icon ion-close"></i></button>
                
              </div></td>   
                           
      </tr>

  <?php }?>  
                
  </tbody>
</table>
  