        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Division name</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($divs as $row){?>
                  		  <tr>
                           <td><?php echo $row->division_name?></td>
		                      <td><?php echo $row->category_label?></td>
                          <td><?php echo $row->subcategory_name?></td>
		                      <td><?php echo $row->division_desc?></td>
                          <td>
		                        <div class="media-right">
                              <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#trackermodal"  onclick="goingedit('<?php echo $row->division_id;?>','<?php echo $row->division_cat;?>');"><i class="icon ion-edit"></i></button>
		                          <button class="btn btn-danger btn-xs" onclick="deletesubcategory('<?php echo $row->division_id;?>');"><i class="icon ion-close"></i></button>
		                          </div>   
                     	 		</td>
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
               