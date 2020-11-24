
<div class="category-banner1-carousel" >
              
<?php foreach($res as $row) { 

$cid = base64_encode($row->category_id); 

    ?>

              <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="<?php echo base_url(); ?>BabiesController/Categoryproducts?cid=<?php echo $cid; ?>" class="image"><img src="<?php echo base_url(); ?>uploads/<?php echo $row->category_homepic ?>" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="<?php echo base_url(); ?>BabiesController/Categoryproducts?cid=<?php echo $cid; ?>"><?php echo $row->category_label ?></a>
                                    <!--<span class="number">16</span>-->
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

 <?php } ?>    


 </div>           

            