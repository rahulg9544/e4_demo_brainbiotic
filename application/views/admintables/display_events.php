<table class="table table-hover table-bordered  " id="tablefillcat">
  <thead>
    <tr>
        <th>Slno</th>
        <th>Title</th>
        <th>Date</th>
        <th>Operations</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
      $i=1;            	
    foreach($res as $row){?>
      <tr>
     
         
          <td><?php echo $i++; ?></td>
          <td><?php echo $row->title?></td>

         <td>
         <?php echo $row->date?>

           </td> 
             
      
          <td><div class="media-right">

                   <button class="btn btn-success btn-xs"   onclick="editevent('<?php echo $row->id;?>');"><i class="icon ion-edit"></i></button>

                  <button class="btn btn-danger btn-xs" onclick="deleteevent('<?php echo $row->id;?>');"><i class="icon ion-close"></i></button>
                
              </div></td>   
                           
      </tr>

  <?php }?>  
                
  </tbody>
</table>
  