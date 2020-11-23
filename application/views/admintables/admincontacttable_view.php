
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>Location Address</th>
                      <th>Phone No</th>
                      <th>Mail id</th>
                     
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
		                      <td><?php echo $row->contact_address?></td>                          
                          <td><?php echo $row->contact_phon?></td>

                           <td><?php echo $row->contact_mail?></td>

                            
                            
                            <td>
                            <center>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  
                              onclick="editcontinf('<?php echo $row->contact_id;?>');"><i class="icon ion-edit"></i></button>
                              
                              </center>  
                          </td>
                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               