        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Category Label</th>

                      <th>Category home image</th>

                      <th>Page banner</th>
                    
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->category_label  ?></td>

                          <td><img src="<?php echo base_url();?>uploads/<?php echo $row->category_homepic?> " style="width:100px;height:50px;"></td>

                          <td><img src="<?php echo base_url();?>uploads/<?php echo $row->category_bannerpic?> " style="width:100px;height:50px;"></td>
                          
                   <td>  <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editcategory('<?php echo $row->category_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletecategory('<?php echo $row->category_id;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                    </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  