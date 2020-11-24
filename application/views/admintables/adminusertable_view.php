        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>

            
                    <tr>
                        <th>ID</th>
                      <th>Username</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Gender</th>                    
                      <th>DOB</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Pincode</th>
                      
                      
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    

                    foreach($tabledata as $row){?>
                        <tr>
                            <td><?php echo $row->user_id?></td>
                          <td><?php echo $row->user_mail?></td>

                          <td><?php echo $row->user_fname?></td>
                          <td><?php echo $row->user_lname?></td>
                          <td><?php echo $row->user_gender?></td>
                          <td><?php echo $row->user_dob?></td>
                          <td><?php echo $row->user_mobile?></td>
                          <td><?php echo $row->addressprofile_address?></td>
                          <td><?php echo $row->addressprofile_state?></td>
                          <td><?php echo $row->addressprofile_city?></td>
                          <td><?php echo $row->addressprofile_pin?></td>
                          
                        
                          <td>
                            <div class="media-right">
                              
                          
                              <button class="btn btn-danger btn-xs" onclick="deleteuser('<?php echo $row->user_id;?>');"><i class="icon ion-close"></i></button>
                            
                              </div>   
                          </td>
                        </tr>
                    <?php }?>  
                  </tbody>
                </table>
               