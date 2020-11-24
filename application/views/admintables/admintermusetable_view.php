
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                     
                      <th>Content</th>
                      <th>Content Arabic</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                          
		                      <td><?php echo $row->termuse_content?></td>
                          <td><?php echo $row->termuse_content_arab?>
                          <td>
                            
  <div class="media-right">
    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal" onclick="editcontinf('<?php echo $row->termuse_id;?>');"><i class="icon ion-edit"></i>
    </button>
   </div> 
                                
                          </td>
                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               