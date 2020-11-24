

<select class="form-control c-select" required="required" id="divsub" name="divsub">

                        <option value="">select</option>

                   <?php foreach($subs as $row) { ?>  

                <option value="<?php echo $row->subcategory_id ?>"><?php echo $row->subcategory_name ?></option>

                   <?php } ?>   
                        
                      </select>