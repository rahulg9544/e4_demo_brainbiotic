
        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>Title1</th>
                      <th>Content1</th>
                      <th>Title2</th>
                      <th>Content2</th>
                      <th>Banner Image</th>
                      <th>Contant Image</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($tabledata as $row){?>
                  		  <tr>
                          <td><?php echo $row->about_title1?></td>
		                      <td><?php echo $row->about_content1?></td>
                          <td><?php echo $row->about_title2?></td>
                          <td><?php echo $row->about_content2?></td> 

                     <td>
                            <a target="blank" href="<?php echo base_url();?>/uploads/<?php echo $row->about_banner_image ?>"><img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->about_banner_image ?>"></a>
                          </td>


                          <td>
                            <a target="blank" href="<?php echo base_url();?>/uploads/<?php echo $row->about_content_image ?>"><img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->about_content_image ?>"></a>
                          </td>

                          <td>
                            
  <div class="media-right">
    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal" onclick="editcontinf('<?php echo $row->about_id;?>');"><i class="icon ion-edit"></i>
    </button>
   </div> 
                                
                          </td>
                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>


               