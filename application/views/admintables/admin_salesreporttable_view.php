
 <div class="col-md-6">

 <div class="row">

  <div class="col-md-5">
    
    <label>From</label>
   <input class="form-control input-group" type="date" name="fromdate" id="fromdate">

  </div>

  <div class="col-md-5">
    
    <label>To</label>
   <input class="form-control input-group" type="date" name="todate" id="todate">

  </div>
   
   <div class="col-md-2">

    <button class="btn btn-success" style="padding: 12%;margin: 34% 0;" id="searchdaterepbtn" onclick="getdatewisereports();"><i class="fa fa-search" aria-hidden="true"></i></button>
     
   </div>

 </div>

   
 </div>

        <table class="table table-hover table-bordered  " id="tablefillcat">
           <thead>
                    <tr>
                      <th>ID</th>
                      <th>Customer</th>
                      <th>Order id</th>
                      <th>Date</th>
                      <th>Amount</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	$i=1;
                  	foreach($res as $row){?>
                  		  <tr>
                          <td><?php echo $row->orders_id ?></td>
		                      <td><?php echo $row->user_fname." ".$row->user_lname ?></td>
                          <td><?php echo $row->orders_uniq_id?></td>
                          <td><?php echo $row->orders_date?></td>
                          <td><?php echo $row->orders_total_amount?></td> 

                   
                       
                    		</tr>
                  	<?php $i++; }?>  
                  </tbody>
                </table>


               