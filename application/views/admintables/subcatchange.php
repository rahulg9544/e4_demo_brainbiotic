<h4 class="demo-sub-title">SubCategory</h4>
                      <select class="form-control c-select" name="subcategory" required="required" onchange="getsubsdivs();" id="subcategory" data-plugin="selectpicker" >
                        <option value="">select</option>
                        <?php foreach($subs as $subcatdpdwn){?>
                          <option value="<?php echo $subcatdpdwn->subcategory_name;?>"><?php echo $subcatdpdwn->subcategory_name;?></option>
                        <?php }?>
                      </select>