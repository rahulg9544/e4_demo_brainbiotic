      
<div class="col-auto learts-mb-20"><a href="<?php echo base_url(); ?>Add-address-checkout" class="btn btn-md btn-dark btn-outline-hover-dark"><i class="fa fa-plus"></i> Add New Address</a></div>

      <div class="row">

    <?php if(!empty($res)) {

    foreach($res as $row) { 

    $i=1;	

    $adrid = base64_encode($row->addressprofile_id);
 
    	?>
                                            <!-- <div class="col-lg-12 mb-20">
											<div class="address_box">
											<h5><input id="add1" name="check_method" type="radio"/> jineesh K  <a href="add-new-address.html" class="edit-link">edit</a></h5>
												<p>ghghg, vcvcvc, 562 kuwait city, United Kingdom, 01234567890<p>
											
											</div>
											</div> -->

											<div class="col-lg-12 mb-20" >
                                            <!--<h5>Your delivery address</h5>-->
							                <div class="address_box" style="margin-bottom: 1%">
							                <h5><input id="add<?php echo $i ?>" value="<?php echo $row->addressprofile_id; ?>" name="check_method" <?php if($i==1){ ?> checked <?php } ?> type="radio"/> <?php echo $row->addressprofile_fname." ".$row->addressprofile_lname ?>  
							                    <a style="margin-right:1% " href="<?php echo base_url(); ?>BabiesController/Edit_address_check?id=<?php echo $adrid; ?>" class="edit-link">edit</a></h5>
							                    <p>mob:<?php echo $row->addressprofile_mobile ;?>, <?php echo $row->city_name ;?>, <?php echo $row->addressprofile_block ;?>, <?php echo $row->addressprofile_street ;?>, <?php echo $row->addressprofile_avenue ;?>, <?php echo $row->addressprofile_hb ;?></p>
							                    <?php if($row->addressprofile_inv_status==1) { ?>

                                                <strong>Invoice address</strong>
							                    <p>mob:<?php echo $row->addressprofile_inv_mobile ;?>, <?php echo $row->city_name ;?>, <?php echo $row->addressprofile_inv_block ;?>, <?php echo $row->addressprofile_inv_street ;?>, <?php echo $row->addressprofile_inv_avenue ;?>, <?php echo $row->addressprofile_inv_hb ;?></p>
							                    
							                    <?php } ?>	
							                
							                </div>
							                </div>
											
											
		<?php $i++; } ?>									
											 
											 <div class="col-lg-6 mb-20">
											 <button class="btn btn-dark btn-outline-hover-dark" type="submit">Proceed with your order</button>
											 </div>	
        <?php } ?>

		</div>	