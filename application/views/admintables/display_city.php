        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>City Name</th>
                      <th>Min Value</th>
                      <th>Delivery Charge</th>
                    
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->city_name  ?></td>
                          <td><?php echo $row->min_value  ?></td>
                          <td><?php echo $row->delivery_charge  ?></td>
                          
                   <td>  <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editcategory('<?php echo $row->city_id;?>');" style="margin-left: 10px; cursor: pointer;" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletecategory('<?php echo $row->city_id;?>');" style="margin-left: 30px; cursor: pointer;" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                    </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  