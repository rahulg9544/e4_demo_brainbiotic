
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                        <th>ID</th>
                      <th>Mail id</th>
                      <th>Date</th>
                      
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                  		      
                  		      <td><?php echo $row->newssub_id?></td>
                          <td><?php echo $row->newssub_mail?></td>
		                      
                          <td><?php echo $row->newssub_date?></td>
                          
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               