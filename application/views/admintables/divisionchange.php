 <h4 class="demo-sub-title">Division</h4>
                      <select class="form-control c-select" name="division"  id="division" >

                      <option value="">select</option> 	
                      
<?php foreach($divs as $row) { ?>

                        <option value="<?php echo $row->division_id ?>"><?php echo $row->division_name ?></option>

<?php } ?>                        
                        
                      </select>