
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      
                      <th>Title1</th>
                      <th>Title1 Arabic</th>
                      <th>Content1</th>
                      <th>Content1 Arabic</th>
                      <th>Title2</th>
                      <th>Title2 Arabic</th>
                      <th>Content2</th>
                      <th>Content2 Arabic</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                          
		                  <td><?php echo $row->faq_title1?></td>

                          <td><?php echo $row->faq_title1_ar?></td>
                           <td><?php echo $row->faq_content1?></td>

                          <td><?php echo $row->faq_content1_ar?></td>
                           <td><?php echo $row->faq_title2?></td>

                          <td><?php echo $row->faq_title2_ar?></td>
                           <td><?php echo $row->faq_content2?></td>

                          <td><?php echo $row->faq_content2_ar?></td>
                          
                          <td>
                            
  <div class="media-right">
    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal" onclick="editcontinf('<?php echo $row->faq_id ;?>');"><i class="icon ion-edit"></i>
    </button>
   </div> 
                                
                          </td>
                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               