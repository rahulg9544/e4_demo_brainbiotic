
<ul class="mega_menu_inner home" style="overflow-y:hidden;">
                                                   
                                                   
                                                    
 <?php 


   foreach($tabproducts as $row){
            $catid = base64_encode($row->category_id);
            

            

 ?>                                                    

    <li class="submenu-nav-block"><a href="#"><?php echo $row->category_label; ?></a>
        <ul>

      <?php foreach($row->subs as $scategory){ 
       $subid = base64_encode($scategory->subcategory_id); ?>      

            <li><a href="<?php echo base_url();?>TootController/products" data-imagehover="<?php echo base_url();?>img/product/dress.jpg"><?php echo $scategory->subcategory_name; ?></a></li>
            
     <?php } ?>       

        </ul>
    </li>
    
                                            
  <?php } ?>                                                  
                <li class="submenu-nav-block highlight">
                <div class="views-field-field-sub-image">
                <img src="<?php echo base_url(); ?>img/menu-product/01.jpg" alt="">
                    <!--<p>Asterin Three Stone</p>-->
                    
                </div>
                </li>
                
                <div class="clearfix"></div>
            </ul>
                                        