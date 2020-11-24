
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>Offer Text</th>
                      <th>Offer Text Arabic</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                          <td><?php echo $row->offertext_text?></td>
		                      
                          <td><?php echo $row->offertext_text_arabic?></td>
                          <td>
                            
  <div class="media-right">
    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal" onclick="editcontinf('<?php echo $row->offertext_id;?>');"><i class="icon ion-edit"></i>
    </button>
   </div> 
                                
                          </td>
                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               