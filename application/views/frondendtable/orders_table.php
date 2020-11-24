<h3>Orders</h3>
<div class="table-responsive">

<?php if($getorders->num_rows()!=0)

{

 ?>

<table class="table">
    <thead>
        <tr>
            <th>Order</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Actions</th>	 	 	 	
        </tr>
    </thead>
    <tbody>

    <?php foreach($getorders->result() as $row) { ?>    
        <tr>
            <td><?php echo $row->orders_uniq_id ?></td>
            <td>
                <?php $date=date_create($row->orders_date);

                echo date_format($date,"D M j");

                ?>

            </td>

             <?php 
       
       if($row->orders_cancel_status==1)
       { ?>
   
       <td><span style="color: red">Cancelled</span></td>

       <?php } else {

             if($row->orders_status==1) { ?>
    <td><span class="success">Processing</span></td>
  <?php }
  elseif ($row->orders_status==2) { ?>
    <td><span class="success">Shipped</span></td>
  <?php } else { ?>  
    <td><span class="success">Completed</span></td>
  <?php } 
   }
  ?>  
            
            <td>KWD <?php echo $row->orders_total_offer_amount ; ?></td>
            <td><a href="<?php echo base_url();?>Orderdetails?oid=<?php echo $row->orders_uniq_id ?>" class="view">view</a></td>
        </tr>

     <?php } ?>   
       
    </tbody>
</table>

<?php }
else
{    
 ?>

<h4 class="col-md-12" style="text-align: center;">No orders placed yet.</h4> 

<?php } ?>

</div>