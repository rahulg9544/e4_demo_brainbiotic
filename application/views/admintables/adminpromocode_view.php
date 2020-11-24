
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                        <th>ID</th>
                      <th>Promo code</th>
                      <th>Promo Type</th>
                      <th>Percentage Discount</th>
                      <th>Max Amount</th>
                      <th>Min Cart</th>
                      <th>ax no.of Use</th>
                      <th>Expiry Date</th>
                      <th>Promo Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                  		      <td><?php echo $row->promo_id?></td>
		                      <td><?php echo $row->promo_code?></td>
                          <?php if($row->promo_type == 0){?>
                          <td>Flat</td>
                          <td>N/A</td>
                          <?php 
                          }
                          else
                          {
                            ?>
                            <td>Percentage</td>
                            <td><?php echo $row->promo_discount?>%</td>
                            <?php
                          }
                          ?>
                          <td><?php echo $row->promo_max_amount?></td>
                          <td><?php echo $row->promo_min_cart_value?></td>
                           <td><?php echo $row->promo_use_per_user?></td>
                          <td><?php echo $row->promo_expiry?></td>
                          <td>
                          <center>
                            <?php if($row->promo_status == 1){?>
                            <button class="btn btn-success btn-xs" onclick="changepriority('<?php echo $row->promo_id;?>','1');">Active</button>
                          <?php } 
                           else{ ?> 
                          <button class="btn btn-danger btn-xs" onclick="changepriority('<?php echo $row->promo_id;?>','0');">Inactive</button>
                         <?php } ?>
                      </center></td>
                          <td>
		                        <div class="media-right">
                             <!--  <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="editpromocode('<?php echo $row->promo_id;?>');"><i class="icon ion-edit"></i></button> -->
		                          <button class="btn btn-danger btn-xs" onclick="deletepromocode('<?php echo $row->promo_id;?>');"><i class="icon ion-close"></i></button>
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               