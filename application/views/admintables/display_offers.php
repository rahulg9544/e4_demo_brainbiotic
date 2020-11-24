        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                        <th>ID</th>
                      <th>Subcategory Name</th>
                      <th>Offer Text</th>
                      <th>Offer Image</th>
                      <th>Discount</th>
                      <th>Offer Status</th>
                      <th>Operations</th>
                     
                    </tr>
                  </thead>
                  <tbody>


                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
                  		      <td><?php echo $row->offers_id  ?></td>
		                      <td><?php echo $row->subcategory_name  ?></td>
                          <td><?php echo $row->offers_text1." ".$row->offers_text2  ?></td>
                          <td><img src="<?php echo base_url();?>uploads/<?php echo $row->offers_image?> " style="width:80px;height:120px;"></td>

                          <td><?php echo $row->offers_start_percetage."% - ".$row->offers_end_percentage."%"  ?></td>
                         

                          <td><center>
                            <?php if($row->offers_status == 0){?>
                            <button class="btn btn-success btn-xs" onclick="status_change('<?php echo $row->offers_id;?>','0');">Active</button>
                          <?php } 
                           else{ ?> 
                       
                      <button class="btn btn-danger btn-xs" onclick="status_change('<?php echo $row->offers_id;?>','1');">Inactive</button>
                         <?php } ?>
                      </center></td> 

               <td>  <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editoffer('<?php echo $row->offers_id;?>');" style="margin-left: 10px; cursor: pointer;" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deleteoffer('<?php echo $row->offers_id;?>');" style="margin-left: 30px; cursor: pointer;" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                    </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  