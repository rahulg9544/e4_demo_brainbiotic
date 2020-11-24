
<h3>Delivery Adrress</h3>

<div class="col-md-9">

  <span><span class="col-md-5">Order Id</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $ord ?></b></span><br>

  <span><span class="col-md-5">Customer Name</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_fname." ".$address->addressprofile_lname ?></b></span><br>


   <span><span class="col-md-5">Phone</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $udtls->user_mobile ?></b></span><br>

  <span><span class="col-md-5">Address</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_address ?></b></span><br>

  <span><span class="col-md-5">State</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_state ?></b></span><br>

  <span><span class="col-md-5">City</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_city ?></b></span><br>

  <span><span class="col-md-5">Street </span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_street ?></b></span><br>

  <span><span class="col-md-5">Pin/Zipcode</span> <span class="col-md-1">:</span> <b class="col-md-6"><?php echo $address->addressprofile_pin ?></b></span><br>

  


</div>
<div class="col-md-3">
 
 <?php if($fulldetls->orders_cancel_status==0) { ?>

  <button class="btn btn-danger" id="fullordrcanbtn"  onclick = "cancelorderfull('<?php echo $ord ?>')" value = "cancel">Cancel Order</button>

<?php } else { ?>

  <button class="btn btn-danger" id="fullordrcanbtn" disabled="disabled" value = "cancel">Order Canceled</button>

<?php } ?>  

</div>
        
        <table class="table table-hover table-bordered  " id="tablefillmodal">
           <thead>
                    <tr>
                      <th>Products</th>
                      <th>Quantity</th>
                      <!-- <th>Price</th> -->
                      

                     
                      <!-- <th>Price + Commission</th>
                      <th>Price + Commission + Discount</th> -->
                      <!-- <th>Product Discount</th> -->
                      <!-- <th>Tax</th> -->
                      <th>Unit Price</th>
                      

                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $total = 0;
                    $deliverycharge=0;
                    foreach($tabledatamodal->result() as $row){
                      // if($row->dc_cancel_order == 0){
                      //     $total = $total + $row->dc_prod_actualstoreprice ;
                      //     $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      // }
                      // if($row->order_status == 1 && $row->dc_cancel_order == 1){
                         
                      //     $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      // }
                      //  if($row->order_status == 0 && $row->dc_cancel_order == 1){
                      //     $total = $total + 0;
                      //     $deliverycharge = 0 ;
                      // }

                       
                      // $total = $total +  ($row->dc_prod_tax * $row->cart_quantity) + ($row->dc_prod_commoffer * $row->cart_quantity)  ;
                if($row->order_status == 0 && $row->dc_cancel_order == 1)
                {
                   $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                  $total = $total + ($row->dc_prod_actualstoreprice*$row->cart_quantity) ;
                }
                else
                {
                      if($row->order_status == 1 && $row->dc_cancel_order == 1){
                        $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
    $total = $total + ($row->dc_prod_actualstoreprice*$row->cart_quantity) ;
                      }
                      else
                      {


                        
                        if($row->dc_cancel_order == 0 ){
                          $total = $total + ($row->dc_prod_actualstoreprice*$row->cart_quantity);
                          $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                        }
                        


                        }
                    }
                      ?>
                        <tr>
                          <td><?php echo $row->dc_prod_name;?></td>
                           <td><?php echo $row->cart_quantity?></td>
                          <!-- <td><?php echo $row->dc_prod_commoffer;?></td> -->
                         
                         
                          <!-- <td><?php echo $row->dc_prod_tax;?></td> -->
                          <td><?php echo 
                          number_format($row->dc_prod_actualstoreprice,3);?></td>
                       <!--    <td><div class="form-group col-sm-2" style="margin-top: 14px;">
                      
                    <?php if($row->dc_cancel_order == 0){?>
                      <button class="btn btn-danger"   onclick = "cancelorder('<?php echo $row->dc_id;?>','<?php echo $row->dc_order_id;?>','<?php echo $row->dc_date;?>','<?php echo $row->dc_time;?>')" value = "cancel">Cancel</button>
                    <?php }else{
                      if($row->dc_cancel_order == 1 && $row->order_status == 1){?>
                      
                      <center><button class="btn btn-secondary-outline" style="cursor:text">Shipped</button></center>
                    <?php }?>
                      <center><button class="btn btn-secondary-outline" style="cursor:text">Cancelled</button></center>
                    <?php 
                  } ?>
                    
                  </div></td> -->
                           <!-- <td><?php echo $row->prod_disc?></td> -->
                            
                             
                              
                          <!-- <td>
                            <div class="media-right">
                              <button class="btn btn-success btn-xs"   onclick="edituser('<?php echo $row->dc_id;?>');"><i class="icon ion-edit"></i></button>
                              <button class="btn btn-danger btn-xs" onclick="deleteuser('<?php echo $row->user_id;?>');"><i class="ion-close"></i></button>
                              </div>   
                          </td> -->

                        </tr>
                    <?php }?>
                    <!--<tr>-->
                   
                    <tr>
                      <td colspan="7" align="right">Cart Total = <?php 
                      echo number_format($total+$deliverycharge,3);?></td>
                    </tr>

                  </tbody>
                </table>
                
               <!--  <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Choose Delivery Boy</h4>
                      <select class="form-control c-select" name="dboy"  id="dboy" data-plugin="selectpicker">
                        <option value="0">select</option> -->
                       
                        
                     <!-- <?php $boyid = $tabledatamodal->row();
                    foreach($dboy as $boy){
                         
                      // if(!empty($tabledatamodal)){
                        $dboyid = $boyid->dc_agent_id;
                        if($dboyid == $boy->user_id){
                          ?><option value="<?php echo $boy->user_id;?>" selected><?php echo $boy->user_displayname;?></option><?php
                        }else{
                      // }
                      ?>
                      <option value="<?php echo $boy->user_id;?>" ><?php echo $boy->user_displayname;?></option>
                    
                    <?php }

                  } ?>
                          -->
                    <!--    
                      </select>

                    </div>
                    <div class="form-group col-sm-4">
                      <h4 class="demo-sub-title">Delivery Date</h4>
                      <div class="datepicker-wrapper open">
                        <input class="form-control"  type="date" value="<?php echo $boyid->dc_delivery_date;?>" id="ddate">
                      </div>
                    </div>
                    <div class="form-group col-sm-2" style="margin-top: 14px;">
                      <h4 class="demo-sub-title"></h4>
                    <button class="btn btn-success"   onclick="dboychoose('<?php echo $ord;?>','<?php echo $dat;?>','<?php echo $tim;?>');" value = "save">Save</button>
                  </div> -->
                
