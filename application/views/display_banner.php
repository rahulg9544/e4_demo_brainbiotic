<table class="table table-hover table-bordered  " id="tablefill">
  <thead>
    <tr><th>First Title</th>
        <th>Second Title</th>
        <th>FirstTitle Arabic</th>
        <th>SecondTitle Arabic</th>
        <th>Image</th>
        <th>Operations</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
           
    foreach($res as $row){?>
      <tr>
        <td><?php echo $row->banner_title ?></td>
        <td><?php echo $row->banner_shortdesc ?></td>
        <td><?php echo $row->banner_titlear ?></td>
        <td><?php echo $row->banner_shortdescar ?></td>
        <td><img src="<?php echo base_url();?>uploads/<?php echo $row->banner_image; ?>" height="60" width="60"></td>
       <td><div class="media-right" class="col-md-2">
                <div class="col-md-12">
                  <i data-toggle="modal" data-target="#trackermodal" onclick="edit('<?php echo $row->banner_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                </div>
            </div></td>   
                           
      </tr>

  <?php
  
  }
  
   ?>  
                
  </tbody>
</table>
  