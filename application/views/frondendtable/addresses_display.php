 
<?php if(!empty($res)) { 
$i=1;
foreach($res as $row) {

$adrid = base64_encode($row->addressprofile_id);

	?>

                <div class="col-lg-12 mb-20" >
                                            <!--<h5>Your delivery address</h5>-->
                <div class="address_box" style="margin-bottom: 1%">
                <h5><input id="add<?php echo $i ?>" name="check_method" type="radio"/> <?php echo $row->addressprofile_fname." ".$row->addressprofile_lname ?>  
                    <a onclick="deleteadrs('<?php echo $row->addressprofile_id; ?>')" class="edit-link">delete</a><a style="margin-right:1% " href="<?php echo base_url(); ?>BabiesController/Edit_address?id=<?php echo $adrid; ?>" class="edit-link">edit</a></h5>
                    <p>mob:<?php echo $row->addressprofile_mobile ;?>, <?php echo $row->city_name ;?>, <?php echo $row->addressprofile_block ;?>, <?php echo $row->addressprofile_street ;?>, <?php echo $row->addressprofile_avenue ;?>, <?php echo $row->addressprofile_hb ;?><p>
                
                </div>
                </div>

 <?php $i++; } } ?>                               