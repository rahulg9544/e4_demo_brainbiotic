
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Size Numbers</th>
                      <th>Size Letters</th> 
                      <th>Color</th> 
                      <th>Stock Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
    //print_r($res)   ;             
    foreach($res as $row){?>
                      <tr>
                        <td><?php    
                        $size = explode(',',$row->product_sizeno ); 
                            for ($i=0; $i < count($size); $i++) 
                            { 
                              echo $size[$i]; ?><br>
                          <?php  } ?>
                        </td>
                        <td><?php    
                        $sizeletter = explode(',',$row->product_sizeletter ); 
                            for ($i=0; $i < count($sizeletter); $i++) 
                            { 
                              echo $sizeletter[$i]; ?><br>
                          <?php  } ?>
                        </td>

                        <td><?php  
                          $color = explode(',',$row->product_color ); 
                            for ($i=0; $i < count($color); $i++) 
                            { 
                              echo $color[$i]; ?><br>
                          <?php  
                            } ?>            
                        </td>
                        
                        <td><?php  
                          $quantity = explode(',',$row->product_quantity ); 
                            for ($i=0; $i < count($quantity); $i++) 
                            { 
                              echo $quantity[$i]; ?><br>
                          <?php  
                            } ?>                        
                        </td>
                      </tr>
                  <?php } ?>
                    </tbody>
                  </table>




                   

