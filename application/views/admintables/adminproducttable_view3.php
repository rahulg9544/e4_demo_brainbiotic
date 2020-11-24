
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>product name</th>
                       <?php if($_SESSION['adminusertp'] != 'agent' ) { ?>    <th>Vendor</th>
                  <?php } ?>
                      <th>product image</th>
                      <th>MRP</th>
                      <th>product purchase price</th>
                       <th>product discount(%)</th>
                       <th>product Selling price</th>
                       <th>product rating</th>
                       <th>product measure unit</th>
                       <th>product code</th>
                       <th>product available on</th>
                       <th>product in Stock</th>
                       <th>product available</th>
                       <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){
                      $id = $row->prod_id;
                      $searchString = ',';
                      $prodimg = '';
                      if( strpos($row->prod_image, $searchString) !== false ) {
                          $eximage = explode(',', $row->prod_image);
                              $prodimg = $eximage[0];
                      } 
                      else{
                        $prodimg = $row->prod_image;
                      }
                      ?>
                  		  <tr>
		                      <td><?php echo $row->prod_name?></td>
		                      <?php if($_SESSION['adminusertp'] != 'agent' ) { ?>    <th><?php echo $row->user_businessnameame?></th>
                  <?php } ?>
		                      <td><?php if(!empty($prodimg)){?>
                            <a href="<?php echo base_url();?>/imageupload/<?php echo $prodimg?>" target="_blank"> <img  style="width:100px;height:50px;" src="<?php echo base_url();?>/imageupload/<?php echo $prodimg?>"></img></a>
                          <?php }?></td>
                          <td><?php echo $row->prod_rate?></td>
                          <td><?php echo $row->prod_purchase_rate?></td>
                          <td><?php echo $row->prod_disc?> %</td>
                          <td><?php echo $row->prod_sell_price?></td>
                          <td><?php echo $row->prod_rating?></td>
                          <td><?php echo $row->prod_uom?></td>
                          <td><?php echo $row->prod_code?></td>
                          <td><?php echo $row->prod_packtype?></td>
                          <td><?php echo $row->prod_stock_qty?></td>
                          <td><center>
                            <?php if($row->prod_deactive == 0){?>
                            <button class="btn btn-success btn-xs" onclick="productavailable('<?php echo $row->prod_id;?>','yes');">Yes</button>
                          <?php } 
                           else{ ?> 
                       
                      <button class="btn btn-danger btn-xs" onclick="productavailable('<?php echo $row->prod_id;?>','no');">No</button>
                         <?php } ?>
                      </center></td>


                          <td> <?php if($row->prod_admin_approved == 1){?>


                                <?php 
                                if($_SESSION['adminusertp'] == 'admin'){ ?>
                                <button class="btn btn-success btn-xs" onclick="reject('<?php echo $row->prod_id;?>');" >Approved</button>
                                <?php }else{ ?>
                                <button class="btn btn-success btn-xs" >Approved</button>
                                <?php } ?>

                              
                          <?php }else{

                            if($row->prod_admin_approved != ''){?>

                                <?php 
                                if($_SESSION['adminusertp'] == 'admin'){ ?>
                                <button class="btn btn-danger btn-xs" onclick="approve('<?php echo $row->prod_id;?>');">Rejected</button>
                                <?php }else{ ?>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#trackermodalview" onclick="viewreason('<?php echo $row->prod_id;?>');" >Rejected</button>
                                <?php } ?>


                            <?php }else{?>

                               <?php 
                                if($_SESSION['adminusertp'] == 'admin') { ?>
                                <button class="btn btn-warning btn-xs" onclick="approve('<?php echo $row->prod_id;?>');" >Waiting</button>
                                <?php }
                                else
                                { ?>
                                <button class="btn btn-warning btn-xs" >Waiting</button>
                                <span>waiting for admin approvel</span>
                                <?php } ?>
                                  
                            <?php }
                         }?>          
                            </td>


		                      <td>
		                        <div class="media-right">
                        
                                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="viewproduct('<?php echo $row->prod_id;?>');"><i class="icon ion-eye"></i></button>
                              
                               
                              <button class="btn btn-success btn-xs"   onclick="editproduct('<?php echo $row->prod_id;?>');"><i class="icon ion-edit"></i></button>
		                          <button class="btn btn-danger btn-xs" onclick="deleteproduct('<?php echo $row->prod_id;?>','<?php echo $row->prod_image;?>');"><i class="icon ion-close"></i></button>
                            <!-- </div> -->
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
               