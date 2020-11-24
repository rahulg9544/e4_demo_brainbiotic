
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Shoe Size</th> 
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
                        $shoe = explode(',',$row->product_shoesizeno ); 
                            for ($i=0; $i < count($shoe); $i++) 
                            { 
                              echo $shoe[$i]; ?><br>
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




                   

