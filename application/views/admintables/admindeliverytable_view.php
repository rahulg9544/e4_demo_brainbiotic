<table class="table table-hover table-bordered  " id="tablefillcat">
<thead>
        <tr>
          <th>ID</th>    
          <th>OrderId</th>
          <th>Customer name</th>
          <th>Order Detials</th>
          <!-- <th>Customer address</th> -->
          <th>Customer phone no.</th>
          <th>Orderd Date And Time</th>
          
           
            <th>Delivery Date</th>
            <th>Payment mode</th>
          
          
          <th>Print</th>
          <th>Shipped</th>
          <th>Delivered</th>
          <th>Canceled</th>
        </tr>
      </thead>
      <tbody>

        <?php 
        $id=1;
        foreach($tabledata as $delivrow){ ?> 
        <tr>
            <td> 
            <?php echo $id;?>
          </td>
        <td> 
            <?php echo $delivrow->dc_order_id;?>
          </td>
         <td> 
            <?php echo $delivrow->addressprofile_fname." ".$delivrow->addressprofile_lname;?>
          </td>
           <td>
            <center>
              <button class="btn btn-primary btn-xs" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#trackermodal"  onclick="viewdelivery('<?php echo $delivrow->dc_order_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>','<?php echo $delivrow->dc_user_id;?>');"><i class="icon ion-eye" ></i></button>
              
              </center>   
          </td>
           
           <td>
            <?php 
            echo $delivrow->user_mobile ;?>
          </td>
          
          <td>
            <?php 
            $date=date_create($delivrow->dc_date);
            echo date_format($date,"d-m-Y");?>
            <?php 
            $time=date_create($delivrow->dc_time);
            echo date_format($time,"h:ia");?>
          </td>
         
           
            <td><?php if( $delivrow->dc_delivery_date != '0000-00-00'){
              $deldate=date_create($delivrow->dc_delivery_date);
              echo date_format($deldate,"d-m-Y");
              }
              else
              {
              echo "N/A";
            }?></td>
          

          
            <td><?php if( $delivrow->dc_payment_mode == 1)
            {
              
              echo "Cash on Delivery";
            }
            else
            {
              echo "Net banking";
            }?></td>
           

         
          <td>
            <center>
          
             <!--  <button class="btn btn-primary btn-xs"   onclick="invoice('<?php echo $delivrow->dc_order_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>');"><i class="icon ion-printer"></i></button> -->
             
             <?php if($delivrow->orders_cancel_status == 1)
             {
                 ?>
                  <button disabled="disabled" class="btn btn-primary btn-xs" target="blank"><i class="icon ion-printer"></i></button>
                  <?php
             }
             else
             {
                 ?>
              <button class="btn btn-primary btn-xs" target="blank"  onclick="invoice1('<?php echo $delivrow->dc_order_id;?>','<?php echo $delivrow->dc_user_id;?>');"><i class="icon ion-printer"></i></button>
              <?php
             }
             ?>
              
              </center>   
          </td>
          
          <td>
          <center>

            <?php if($delivrow->orders_cancel_status == 1)
            { ?>

              <button disabled="disabled" class="btn btn-danger btn-xs" >no</button>

            <?php
             } else {
             if($delivrow->order_status == 0){ ?>
                <button class="btn btn-danger btn-xs" onclick="shippedstatus('<?php echo $delivrow->dc_user_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>','<?php echo $delivrow->user_fname;?>','<?php echo $delivrow->dc_order_id;?>');">no</button>   
              <?php  }
              else{
                ?>
                <button class="btn btn-success btn-xs" >yes</button>
              <?php }
              } ?>
              
              </center>  
          </td>
          <td>
          <center>

            <?php if($delivrow->orders_cancel_status == 1)
            { ?>

              <button disabled="disabled" class="btn btn-danger btn-xs" >no</button>

            <?php
             } else {
             if($delivrow->dc_status == 0){ ?>
                <button class="btn btn-danger btn-xs" onclick="deliverystatus('<?php echo $delivrow->dc_user_id;?>','<?php echo $delivrow->dc_date;?>','<?php echo $delivrow->dc_time;?>','<?php echo $delivrow->user_fname;?>','<?php echo $delivrow->dc_order_id;?>');">no</button>
              <?php  }else{?>
                <button class="btn btn-success btn-xs" >yes</button>
              <?php } 

            } ?>
              
          </center>  
          </td>
          <td>
          <center>
            <?php if($delivrow->orders_cancel_status == 0){ ?>

                <button disabled="disabled" class="btn btn-success btn-xs" >No</button>

              <?php  }else{
               
               if($delivrow->orders_cancel_status == 1) { ?>
                <button disabled="disabled" class="btn btn-danger btn-xs">Yes</button>
              <?php }
               } ?>
              
          </center>  
          </td>
       </tr>
        <?php 
        $id++;
          }?>
  </tbody>
</table>




