<table class="table table-hover table-bordered  " id="tablefillcat">
  <thead>
    <tr>

        <th>Title</th>
        <th>Image</th>
        <th>Date</th>
        <th>Description</th>
        <th>Operations</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
                  	
    foreach($res as $row){?>
      <tr>
     
         
          
          <td><?php echo $row->title?></td>

          <?php
        $imag = $row->image;
        ?>

        <td><?php if(!empty($imag)){?><img src="<?php echo base_url();?>uploads/blog/<?php echo $imag; ?> " style="width:100px;height:50px;"><?php }?></td>

         <td>
         <?php echo $row->date?>

           </td> 
             
          <td><?php echo $row->description; ?></td>

      
          <td><div class="media-right">

                   <button class="btn btn-success btn-xs"   onclick="editproduct('<?php echo $row->id;?>');"><i class="icon ion-edit"></i></button>

                  <button class="btn btn-danger btn-xs" onclick="deleteproduct('<?php echo $row->id;?>','<?php echo $row->image;?>');"><i class="icon ion-close"></i></button>
                
              </div></td>   
                           
      </tr>

  <?php }?>  
                
  </tbody>
</table>
  