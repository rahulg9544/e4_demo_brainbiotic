<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick-theme.css"/>
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.min.js"></script>
<style type="text/css">
  .slick-prev:before {
  color: green;
}
.slick-next:before {
  color: green;
}
</style>

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Product Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" 
                
                onclick="clearall();">Add product</button>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="container-fluid">
          <!-- from product other start -->
              <div class="panel-wrapper" style="display: none;" id="addeditform">
            <div class="panel">
              <div class="panel-heading">
                  <h4 class="panel-title"><div id="formheading"></div></h4>
                </div>
                <div class="panel-body">
                  <form method="POST"  action="" id="idFormproduct" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Name</h4>
                      <input class="form-control focus" type="text" required="required"  name="productname" id="productname">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Image<span style="font-size:10px">(width:600px ,height:400px)</span></h4>
                      <!-- <input class="form-control" type="file" placeholder="emailid" required="required" name="image_file" id="productimage"> -->
                      <input class="form-control" type="file"  name="image_file[]" id="productimage"  multiple="multiple" />
                      <input type="hidden" name="imagehid" id="imagehid">
                      <div id="imagefill"></div>
                      
                    </div>
                    <input type="hidden" name="productid" id="productid">
                  </div>
                  <div class="row m-b-2">
                    
                    
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">MRP</h4>
                      <input class="form-control  " type="text" required="required" name="productrate" pattern="[0-9.]+" title="only numbers allowed" id="productrate">
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Purchase Rate </h4>
                      <input class="form-control " type="text" required="required" name="purchase_rate" id="purchase_rate" pattern="[0-9.]+" title="only numbers allowed" >
                    </div>
                    <div class="form-group col-sm-6" style="display: none;">
                      <h4 class="demo-sub-title">Product Commission(%)</h4>
                      <input class="form-control " type="text"  name="productcomm" id="productcomm" pattern="[0-9]+" title="only numbers allowed" value = "10">
                    </div>
                    

                  </div>
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Discount(%)</h4>
                      <input class="form-control " type="text" name="productdiscount" id="productdiscount" pattern="[0-9]+" title="only numbers allowed">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Selling Price</h4>
                      <input class="form-control  " type="text" name="sellprice"   pattern="[0-9.]+" id="sellprice" required="required">
                    </div>
                    <div class="form-group col-sm-4" style="display: none;">
                      <h4 class="demo-sub-title">Strike Price</h4>
                      <input class="form-control  " type="text"  name="prodaddedcomm"  readonly="readonly" id="prodaddedcomm" required="required">
                    </div>

                    <div class="form-group col-sm-4" style="display: none;">
                      <h4 class="demo-sub-title">Product Actual Rate (COMMISSION + DISCOUNT)</h4>
                      <input class="form-control  " type="text"  name="productdiscountprice" id="productdiscountprice" readonly="readonly" required="required">
                    </div>
                  </div>
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Measure Unit</h4>
                      <input class="form-control " type="text" required="required" name="productmeasureunit" id="productmeasureunit">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Description</h4>
                      <!--<input class="form-control" type="text" name="productdesc" required="required" id="productdesc" pattern="[a-zA-Z0-9\s]+" title="special characters not allowed"></input> -->
                      <!-- <textarea id="productdesc" name="productdesc" class="form-control" data-plugin="summernote" ></textarea> -->
                      <textarea   class="summernote" name="productdesc" id="productdesc" data-plugin="summernote" ></textarea>
                    </div>
                  </div>
                  
                        <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Available on</h4>
                      
                      <select class="form-control " required="required" name="productavailableon" id="productavailableon">
                         
                         <option value="">Select</option>
                         <option value="Box">Box</option>
                         <option value="Pieces">Pieces</option>
                         <option value="Pack">Pack</option>

                      </select>
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">In stock Quantity</h4>
                     <input type="text" class="form-control " name="productstkqty" id="productstkqty" required="required" pattern="[0-9.]+" placeholder="Only numbers allowed">
                    </div>

                  </div>
                  
                  <div class="row m-b-2">
                    <script></script>
                    <div class="form-group col-sm-6">
                    <div id="displaymultiple">
                      <h4 class="demo-sub-title">Stores</h4>
                      <select class="form-control" name = "stores[]" id="stores" data-plugin="selectpicker" multiple="multiple" >
                        <!-- <option value="">select</option> -->
                        <?php foreach($stores as $rowstore){?>
<option value="<?php echo $rowstore->store_id;?>"><?php echo $rowstore->store_name;?></option>
                        <?php }?>
                      </select>
                    </div>
                      <!-- // dualone start -->
                      <div id="displaysingle">
                  <h4 class="demo-sub-title">Stores</h4>
  <select class="form-control" name = "storesingle" id="storesingle" data-plugin="selectpicker">
                        <!-- <option value="">select</option> -->
                        <?php foreach($stores as $rowstore){?>
<option value="<?php echo $rowstore->store_id;?>"><?php echo $rowstore->store_name;?></option>
                        <?php }?>
  </select>
                    </div>
             
                      <!-- dualone end -->
                    </div>
                 
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Category</h4>
                      <select class="form-control c-select" name="category" required="required" id="category" data-plugin="selectpicker">
                        <!-- <option value="">select</option> -->
                        <?php foreach($categorydpdwn as $catdpdwn){?>
                          <option value="<?php echo $catdpdwn->cat_id;?>" ><?php echo $catdpdwn->cat_name;?></option>
                        <?php }?>
                        
                       
                      </select>
                    </div>
                  </div>
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">SubCategory</h4>
                      <select class="form-control c-select" name="subcategory"  id="subcategory" data-plugin="selectpicker" >
                        <option value="">select</option>
                        <?php foreach($subcategorydpdwn as $subcatdpdwn){?>
                          <option value="<?php echo $subcatdpdwn->sub_id;?>" ><?php echo $subcatdpdwn->sub_name;?></option>
                        <?php }?>
                      </select>
                    </div>
                       <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Available</h4>
                      <select class="form-control c-select" name="productavailable" required="required" id="productavailable" data-plugin="selectpicker">
                        <!-- <option value="">select</option> -->
                        <option value="0" data-subtext="IN STOCK">YES</option>
                        <option value="1" data-subtext="OUT OF STOCK">NO</option>
                      </select>
                    </div>
<!--                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Stores</h4>
                      <select class="form-control" name = "stores" id="stores" data-plugin="selectpicker" multiple>
                        <?php foreach($stores as $rowstore){?>
                            <option value="<?php echo $rowstore->store_id;?>"><?php echo $rowstore->store_name;?></option>
                        <?php }?>
                      </select>
                    </div> -->
                     <!-- <div class="form-group col-sm-6"> 

                      <h4 class="demo-sub-title">Category</h4>
                      <select class="form-control c-select" name="productavailable" required="required" id="productavailable" data-plugin="selectpicker">
                        <option value="">select</option>
                        <option value="yes" data-subtext="IN STOCK">YES</option>
                        <option value="no" data-subtext="OUT OF STOCK">NO</option>
                      </select>
                    </div> -->
                  </div>
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Brand</h4>
                      <select class="form-control c-select" name="productbrand"  id="productbrand" data-plugin="selectpicker" >
                        <option value="">select</option>
                        <?php foreach($brand as $brands){?>
                          <option value="<?php echo $brands->brand_id;?>" ><?php echo $brands->brand_name;?></option>
                        <?php }?>
                      </select>
                    </div>
                       <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Priority</h4>
                      <select class="form-control c-select" name="productdisplay" required="required" id="productdisplay" data-plugin="selectpicker">
                        <!-- <option value="">Select</option> -->
                        <option value="0" data-subtext="DISPLAY IN HOME">HIGH</option>
                        <option value="1" data-subtext="NOT DISPLAY IN HOME">LOW</option> 
                      </select>
                    </div>
<!--                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Stores</h4>
                      <select class="form-control" name = "stores" id="stores" data-plugin="selectpicker" multiple>
                        <?php foreach($stores as $rowstore){?>
                            <option value="<?php echo $rowstore->store_id;?>"><?php echo $rowstore->store_name;?></option>
                        <?php }?>
                      </select>
                    </div> -->
                     <!-- <div class="form-group col-sm-6"> 

                      <h4 class="demo-sub-title">Category</h4>
                      <select class="form-control c-select" name="productavailable" required="required" id="productavailable" data-plugin="selectpicker">
                        <option value="">select</option>
                        <option value="yes" data-subtext="IN STOCK">YES</option>
                        <option value="no" data-subtext="OUT OF STOCK">NO</option>
                      </select>
                    </div> -->
                  </div>


                   <div class="row m-b-2">

                    <div class="form-group col-sm-6" style="display: none;">
                      <h4 class="demo-sub-title">Product Tax</h4>
                      <input class="form-control " type="text" name="producttax" id="producttax" value="0">
                    </div>


                    <?php if($_SESSION['adminusertp'] == 'admin'){?>
                    <div class="form-group col-sm-6" style="display: none;">
                      <h4 class="demo-sub-title">Agents</h4>
                      <!-- <input  style="border:0px;  "type="text" id="productsubcategoryview" readonly="readonly"> -->
                    <select class="form-control c-select"   name = "agents" id="agents" data-plugin="selectpicker"> 
                        <?php foreach($agents as $agent){?>
                          <option value="<?php echo $agent->user_id;?>" ><?php echo $agent->user_displayname;?></option>
                        <?php }?>
                      </select>
                  </div>
                <?php }?>
                 
                    <!-- <div class="form-group col-sm-6">-->
                    <!--  <h4 class="demo-sub-title">Product Short Description</h4>-->
                    <!--  <textarea   class="summernote1" name="product_short_desc" id="product_short_desc" data-plugin="summernote" ></textarea>-->
                    <!--</div>-->
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Short Description</h4>
                      <textarea   class="form-control" name="product_short_desc" id="product_short_desc" ></textarea>
                    </div>
                  </div>
                 

                   <div class="row m-b-2">
                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Product Code</h4>
                      <input class="form-control " type="text"  name="productcode" pattern="[a-zA-Z0-9\s]+" title="special characters not allowed" val="0" id="productcode">
                    </div>

                     <div class="form-group col-sm-6" style="display: none;">
                      <h4 class="demo-sub-title">Product Rating (Out of 5)</h4>
                      <input class="form-control " type="text" value="5" name="product_rating"  id="product_rating">
                    </div>
                    
                      <?php if(isset($_SESSION['adminusertp'])) { 
                       
                       if($_SESSION['adminusertp'] != 'agent' ){
                    
                      ?>

                    <div class="form-group col-sm-6" >
                      <h4 class="demo-sub-title">Vendor</h4>
                      <select class="form-control" name="prodvendrname" id="prodvendrname" required="required">
                        
                        <option value="">Select</option>

                        <?php foreach($vendors as $row) { ?>

                          <option value="<?php echo $row->user_id ?>"><?php echo $row->user_businessnameame ?></option>

                        <?php } ?> 

                      </select>
                    </div>

                 <?php }
                  } ?>
                    
                  </div>
                 

                <div class="row m-b-2">
                  <div class="form-group col-sm-4">
                    </div>
                  
                    <div class="form-group col-sm-2">
                      
                      <!-- <input class="form-control tn btn-primary btn-lg" type="submit" > -->
                      <button type="submit" class="form-control tn btn-success btn-lg" name="save" value="save">Save</button>
                    </div>
                    <!-- <div class="form-group col-sm-2">
                      
                      <button class="form-control tn btn-danger btn-lg" type="reset" value="reset">Reset</button>

                    </div> -->
                    <div class="form-group col-sm-2">
                        <a style="cursor: pointer;" class="form-control tn btn-danger btn-lg" onclick="cancelform();"><center>Cancel</center></a>                 
                  </div>
                  <div class="form-group col-sm-4">
                    </div>
                    
                </div>
               

          
           </form>
          </div>
               
                <!-- //fdsfsdf -->
                </div>
            </div>


          <!-- from product other end -->
          <div class="panel-wrapper" id="displaytable">
            <div class="panel" >
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextendcat" >
                <!-- <table class="table table-hover table-bordered  "  id="tablefill"> -->
<!--                   <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-right"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Cedric</td>
                      <td>Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Airi</td>
                      <td>Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Brielle</td>
                      <td>Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Herrod</td>
                      <td>Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Rhona</td>
                      <td>Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Colleen</td>
                      <td>Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Sonya</td>
                      <td>Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Jena</td>
                      <td>Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Quinn</td>
                      <td>Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Charde</td>
                      <td>Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Haley</td>
                      <td>Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                    <tr>
                      <td>Tatyana</td>
                      <td>Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>$320,800</td>
                      <td>
                        <div class="media-left"><a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Edit</a>
                          <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#trackermodal">Delete</a>
                          </div>   
                      </td>
                    </tr>
                  

                   
                  </tbody> -->
                <!-- </table> -->
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->

        </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->
    <!-- media modal start -->
   <!--  <div class="modal fade-scale side" id="mediamodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"><img class="img-fluid" src="assets/images/1.jpg" alt="">
          <div class="modal-body">
            <p><b>GENERAL INFO</b></p>
            <table class="table table-no-border small">
              <tr>
                <td>Type</td>
                <td>Image</td>
              </tr>
              <tr>
                <td>Dimensions</td>
                <td>1,600 x 5,446</td>
              </tr>
              <tr>
                <td>Size</td>
                <td>1 MB</td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->
    <!-- media modal end -->
    <!-- media library start -->
    <!-- #MEDIA-->
       <!--  <div class="container-fluid">

          <div class="panel-wrapper">
            <div class="panel">
              <div class="panel-body">
                <div class="file-group js-view-control grid-view"><a class="file-item selected" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-select.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object text-xs-center">
                      <div class="fa fa-file-word-o fa-lg"></div>
                    </div>
                    <div class="file-body">demo-.docx</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/1.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/2.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/3.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/5.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/6.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/7.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/8.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a><a class="file-item" href="" data-toggle="modal" data-target="#mediamodal">
                    <div class="file-object"><img src="assets/images/media/4.jpg" alt=""></div>
                    <div class="file-body">product-.jpg</div></a>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- END PAGE CONTENT-->

      <!-- </div> -->
      <!-- END VIEW WAPPER-->

    <!-- </div> -->
    <!-- END MAIN WRAPPER-->
    <!-- media library end -->
        <!-- new one start -->
    <div class="modal fade-scale" id="trackermodalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" id="trackermodalview">
        <div class="modal-content">
          <div class="block-header bg-success">Reason for reject</div>
            <div class="modal-body">
               
            
              <div class="">
                <div class="form-group col-sm-12">
                  <p id="reasontextview">  </p>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>




    <!-- new one end -->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-success">View Product</div>
            <div class="modal-body">
               <div class="row m-b-2" style="display: none;">
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Name</h4>
                  <input  style="border:0px;  "type="text" id="productnameview" readonly="readonly">
                 <input type="hidden" id="productidview" >

                </div>
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Commission</h4>
                 <input  style="border:0px;  "type="text" id="productcommisn" readonly="readonly">
                  
                </div>
               
              </div>

              <div class="row m-b-2">
                <div class="form-group col-sm-12">
                  <h4 class="demo-sub-title">Product Image<span style="font-size:10px">(min width:600 ,min height:400)</span></h4>
                  
                  <!-- <input class="form-control" type="file" placeholder="emailid" required="required" name="image_file" id="productimage"> -->
               
                  <div id="productimageview"   ></div>
                  
                </div>
               
              </div>
              <div class="row m-b-2" style="display: none;">
                
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Orginal Rate</h4>
                 <input  style="border:0px;  "type="text" id="productrateview" readonly="readonly">
                  
                </div>
               <div class="form-group col-sm-3">
                  <h4 class="demo-sub-title">Product Discount Rate</h4>
                 <input  style="border:0px;  "type="text" id="productdiscview" readonly="readonly">
                  
                </div>
              </div>
              <div class="row m-b-2" style="display: none;">
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Discount</h4>
                  <input  style="border:0px;  "type="text" id="productdiscountview" readonly="readonly">
                 

                </div>
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Category</h4>
                 <!-- <input  style="border:0px;  "type="text" id="productcategoryview" readonly="readonly"> -->
                 <select style="border:0px;" class="form-control" id="productcategoryview" disabled="disabled"data-toggle="dropdown">
                 <?php foreach($categorydpdwn as $catdpdwnview){?>
                          <option value="<?php echo $catdpdwnview->cat_id;?>" ><?php echo $catdpdwnview->cat_name;?></option>
                        <?php }?>
                  </select>
                </div>
               
              </div>
              <div class="row m-b-2" style="display: none;">
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Description</h4>
                  <input  style="border:0px;  "type="text" id="productdescrview" readonly="readonly">
                 

                </div>
                <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Subcategory</h4>
                  <!-- <input  style="border:0px;  "type="text" id="productsubcategoryview" readonly="readonly"> -->
                 <select class="form-control c-select"   id="productsubcategoryview" disabled="disabled" >
                        <!-- <option value="">select</option> -->
                        <?php foreach($subcategorydpdwn as $subcatdpdwnview){?>
                          <option value="<?php echo $subcatdpdwnview->sub_id;?>" ><?php echo $subcatdpdwnview->sub_name;?></option>
                        <?php }?>
                      </select>

                </div>

               
              </div>

          
            <div class="row m-b-2" style="display: none;">
              <div class="form-group col-sm-6">
                  <h4 class="demo-sub-title">Product Store</h4>
                <!--  <input  style="border:0px;  "type="text" id="productstoreview" readonly="readonly"> -->
                 <select class="form-control"  id="productstoreview" disabled ="disabled">
                        <!-- <option value="">select</option> -->
                    <?php foreach($stores as $rowstore){?>
                        <option value="<?php echo $rowstore->store_id;?>"><?php echo $rowstore->store_name;?></option>
                    <?php }?>
                  </select>
                  
              </div>
              <div class="form-group col-sm-6" >
                  <h4 class="demo-sub-title">Product Code</h4>
                 <input  style="border:0px;  "type="text" id="productcodeview" readonly="readonly">
                  
                </div>
               
              </div>
              <div class="row m-b-2 viewmodalsecondbody" style="display: none;">
                <div class="form-group col-sm-12">
                  <h4 class="demo-sub-title">Reason for reject</h4>
                  <textarea class="form-control focus" id="reasontext" required="required"></textarea>  
                  <input type="hidden" id="productidview" >
                   <input type="hidden" id="reason" value="Your product violated our terms and conditions. Please, let us know if you require additional information or further clarification regarding this matter." >

                </div>
              </div>

            </div>
            
               
       
   
            <div class="modal-footer">
     <!--        <?php if($_SESSION['adminusertp'] == 'admin'){?>
              <button class="btn btn-success viewmodalbody" onclick="approve();">Approve</button>
              <button class="btn btn-danger"  onclick="reject();">Reject</button>
            <?php }?> -->
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
              <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
      </div>
    </div>
</div>

<!-- firebase script put it on header of the template -->

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-storage.js"></script>
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyD5uA4flbdSg27s9Nuc2s2LeHCy1epurR8",
    authDomain: "dentaklik.firebaseapp.com",
    databaseURL: "https://dentaklik.firebaseio.com",
    projectId: "dentaklik",
    storageBucket: "dentaklik.appspot.com",
    messagingSenderId: "641587751147",
    appId: "1:641587751147:web:d0c21ee06236d7f3c0f6ae",
    measurementId: "G-TGFW39VNJJ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

<!-- firebase script put it on header of the template -->

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getproduct();

          $("#productimageview").slick({
                  infinite:true,
                  centerMode: true,
                  variableWidth: true,
                  dots: true,
                  speed: 500,
                  cssEase: 'linear',
                  useTransform:false,
          //      autoplay: true,
          //      autoplaySpeed: 6000,
                  arrows: true
              });

      });
      function getproduct(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminproducts/getproduct');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable();
                // $('#uploaded_image').html(data);  
                // if(chk == 0){
                  
                // var table = $('#tablefill');
                //   table.DataTable({
                //   paging: true,
                //   searching: true,
                //   ordering: true,
                //   autoWidth: false,
                //   info: false,
                //   stateSave: false,
                //   responsive: true
                //   });
                
                // }
                
                // var table = $('#tablefill').DataTable();
                
              // show response from the php script.            
              }
             });
      }
      function clearall(){
        
        $('#sellprice').val('');
        $('#purchase_rate').val('');
        $('#checkoper').val('add');
        $("#stores").prop('required',true);
        $("#displaymultiple").css("display", "block");
        $("#displaysingle").css("display", "none");
        var select = jQuery("#stores");
        // select.prop("multiple", select.prop("multiple"));

        /* Destroy the selectpicker and re-initialize. */
        select.selectpicker('destroy');
        // select.selectpicker();
        // select.attr('multiple','disabled');
        $('#formheading').text('Add Product');
        
        $( "#addeditform" ).fadeIn( "slow", function() {
        });
         // $( "#addeditform" ).fadeIn();
         $('#displaytable').hide();
        $('#producttax').val('');
         $('#productdisplay').selectpicker('val', '');
         $('#productbrand').selectpicker('val', '');
         $('#image_file').val('');
         $('#productid').val('');
         $('#productname').val('');
         $('#productimage').val('');
         $("#productimage").prop('required',true);
         $('#imagefill').html('');
         $('#imagehid').val('');
         $(".summernote").summernote("reset");
        //  $(".summernote1").summernote("reset");
        $('#product_short_desc').val('');
         $('#product_rating').val('');

          getproduct();
          // $('#stores').selectpicker('refresh');
          // $('#stores').selectpicker('render');

        
         // $('#stores').attr("multiple","true");
          $('#subcategory').selectpicker('val', '');
          $('#category').selectpicker('val', '');
          $('#stores').selectpicker('val', '');
          $('#productcode').val('');
          $('#productrate').val('');
          $('#productdesc').html('');
          $('#prodaddedcomm').val('');
          $('#productdiscount').val(0);
          $('#productdiscountprice').val('');
          $('#productmeasureunit').val('');
          $('#productavailable').selectpicker('val', '');
          $('#agents').selectpicker('val', '');

      }
      
      function cancelform(){
        $('#addeditform').hide();
        // $( "#addeditform" ).fadeOut( "slow", function() {
        // });
        $( "#displaytable" ).fadeIn( "slow", function() {
        });
      }
      
      // $('#productrate').on('input', function(){ 
      //   var offer = $('#productdiscount').val();
      //   if(offer > 0){
      //     var new_price = offer / this.value;
      //     var actpric = new_price * 100
      //     $('#productdiscountprice').val(actpric);
          
      //   }else{
      //    $('#productdiscountprice').val(this.value);
      //   }
        
      // });
      // $('#productdiscount').on('input', function(){ 
      //   var offer = $('#productdiscount').val();
      //    var price = $('#productdiscountprice').val();

      //   if(offer > 0){
      //     // var new_price = price * this.value / 100;
      //      var new_prices = offer / price;
      //     var actprics = new_prices * 100
      //     $('#productdiscountprice').val(actprics);

          
      //   }else{
      //    $('#productdiscountprice').val(price);
      //   }
        
      // });
      // oldeone start
       // $(function () {
       //      $("#productrate,#productdiscount,#productcomm").on('input',function () {
       //          // debugger;
       //          var num1 = parseFloat($("#productrate").val());
       //          var num2 = parseFloat($("#productdiscount").val());
       //          var num3 = parseFloat($("#productcomm").val());
       //          if(num2 > 0 && num1 > 0  && num3 > 0){
       //            // var num3perc = 100 - num3;
       //            var comm = num1 * num3 / 100;
       //            var totcomm = num1 + comm;
                  
       //             $("#prodaddedcomm").val(totcomm);
       //             var num2perc = 100 - num2;
       //             var disc = totcomm * num2perc  / 100;
       //            $("#productdiscountprice").val(disc);
       //          }else if(num2 == 0 && num1 > 0  && num3 > 0){
       //            var num3percant = 100 - num3;
       //            var comms = num1 * num3 / 100;

       //            var totcomms = num1 + comms;
       //            $("#prodaddedcomm").val(totcomms);
       //            $("#productdiscountprice").val(totcomms);  
       //          }else{
       //            $("#productdiscountprice").val('');
       //            $("#prodaddedcomm").val('');
       //          }
                
       //      })
       //  });
      // old one end
       $(function () {
            $("#sellprice").on('input',function () {
    


              var sellprice1 = parseFloat($("#sellprice").val());
              var prodrate1 = parseFloat($("#productrate").val());

         if(sellprice1>prodrate1)
         {
           alert("selling price cannot be greater than MRP");
           $("#sellprice").val('');
         }     
         else
         {
              var checknan = isNaN(sellprice1);
              
              if(sellprice1 <= prodrate1 && checknan == false){
                var prodcomm1 = parseFloat($("#productcomm").val());
                var proddisc = sellprice1 * 100 /prodrate1;
                var proddisc2 =  100 - proddisc;
                $("#productdiscount").val(proddisc2);
                var discprice = sellprice1 * prodcomm1 / 100 + sellprice1;
                $("#productdiscountprice").val(discprice);
              }else{ if(checknan){
                  $("#sellprice").val('');
                }
              }

          }
              // else{
              //   $("#sellprice").val('');
              //   alert('Enter amount less than product rate');
              // }
            });
        });
      $(function () {
            $("#productrate,#productdiscount,#productcomm").on('input',function () {


              // alert("hi");
                // debugger;
                // num2 = productdiscount
                // num1 = productrate
                // num3 = productcomm
                var productrate = parseFloat($("#productrate").val());
                var productdiscount = parseFloat($("#productdiscount").val());
                var productcomm = parseFloat($("#productcomm").val());
                if(productdiscount > 0 && productrate > 0  && productcomm > 0){
                  // var num3perc = 100 - num3;
                  var comm = productrate * productcomm / 100;
                  var totcomm = productrate + comm;
                    
                   $("#prodaddedcomm").val(totcomm);
                   var product_discount = productrate * productdiscount / 100;
                   var sell_price = productrate - product_discount;
                   var commission = sell_price*productcomm/100;
                   var total_sell_price = commission + sell_price;

                  $("#productdiscountprice").val(total_sell_price);
                   var product_discount = productrate * productdiscount / 100;
                   var sell_price = productrate - product_discount;
                   //alert(sell_price);
                  $("#sellprice").val(sell_price);
                }else if(productdiscount == 0 && productrate > 0  && productcomm > 0){
                  var num3percant = 100 - productcomm;
                  var comms = productrate * productcomm / 100;

                  var totcomms = productrate + comms;

                  $("#prodaddedcomm").val(totcomms);
                  $("#productdiscountprice").val(totcomms);
                  $("#sellprice").val(productrate);  
                }else{
                  $("#productdiscountprice").val('');
                  $("#prodaddedcomm").val('');
                  $("#sellprice").val('');  
                }
                
            })
        });
      $('#category').on('change', function() {

                 $.ajax({
                      method: "POST",
                      url: "<?php echo base_url('index.php/adminproducts/getsubcategorydrpdwn');?>/",
                     // data: form.serialize(), // serializes the form's elements.
                      data:{id:this.value}, 
                     success: function(data){
                         $('#subcategory').selectpicker('val', data);            
                    }
                   });
      });
       $('#subcategory').on('change', function() {

                 $.ajax({
                      method: "POST",
                      url: "<?php echo base_url('index.php/adminproducts/getcategorydrpdwn');?>/",
                     // data: form.serialize(), // serializes the form's elements.
                      data:{id:this.value}, 
                     success: function(data){
                         $('#category').selectpicker('val', data);            
                    }
                   });
      });
      $("#idFormproduct").submit(function(e) {
         e.preventDefault();

          //initialsie the array to be passed to firebase
          var productimage = document.getElementById('productimage');
          var count = productimage.files.length;

          var files_array = []; // array where every image is stored
          var i;
          
          for(i=0;i<count;i++)
          {
            var image = productimage.files[i];
            files_array.push(image); 
          }
          //initialsie the array to be passed to firebase
          


         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminproducts/insertproduct');?>/",
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
              alert(data);
             
               var response = JSON.parse(data);
               var file_names = response.file_name;
               var file_name_array = file_names.split(',');
               //alert(file_name_array);
               if(response.status == "success"){
                  // loop to insert image to firebase
                  var j;
          
                  for(j=0;j<count;j++)
                  {
                    var file = files_array[j];
                    var storageRef = firebase.storage().ref('uploads/' + file_name_array[j]);
                    storageRef.put(file);
                  }
                  // loop to insert image to firebase 
                 if(response.usertype=="agent")
                 {
                    alert("Your product is going for admin approvel.t will be available on the website after the approvel");
                    $('#addeditform').hide(); 
                  $( "#displaytable" ).fadeIn( "slow", function() {
                  });
                 }
                 else
                 {
                  notifyresult('Data Saved','success');
                  // $('#trackermodal').modal('hide');
                  $('#addeditform').hide(); 
                  $( "#displaytable" ).fadeIn( "slow", function() {
                  });
                 }
                   getproduct();
                   }
                   else
                   {
                      notifyresult('Error','danger');
                      $('#trackermodal').modal('hide');
                   }
              

              // show response from the php script.            
              }
             });
      });
      
      function editproduct(id){
        // $('#modalcaption').text("Edit product");
        $("#stores").prop('required',false);
        $("#displaymultiple").css("display", "none");
        $("#displaysingle").css("display", "block");
        $('#checkoper').val('edit');
        $('#productimage').val('');
        $("#productimage").prop('required',false);

        // var select = jQuery("#stores");
        // select.prop("multiple", !select.prop("multiple"));

        /* Destroy the selectpicker and re-initialize. */
        // select.selectpicker('destroy');
        // select.selectpicker();


        $('#formheading').text('Edit Product');
        $( "#addeditform" ).fadeIn( "slow", function() {
        });
         $('#displaytable').hide();
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/editproduct');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){

              var res = JSON.parse(data);
              
               $('#purchase_rate').val(res.prod_purchase_rate);
              $('#productid').val(res.prod_id);
              $('#productname').val(res.prod_name);
              var imgs = res.prod_image;
              
              var disprimg = '';
              if(imgs){

                var primg = imgs.split(",");
              for(j = 0;j < primg.length;j++){
                if(primg.length == 1){
                        check = 'one';
                         disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.prod_id+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                }else
                if(j == primg.length - 1){
                  check = 'last';
                  disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.prod_id+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                }else{
                  check = 'first';
                  disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.prod_id+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                }
              }
               }else{
                disprimg = "";
               }
             $('#imagefill').html(disprimg);
              
              $('#imagehid').val(res.prod_image);

         $('#producttax').val(res.prod_tax);
         $('#productdisplay').selectpicker('val', res.prod_priority);
         $('#productbrand').selectpicker('val', res.prod_brand_id);

        // select.prop("multiple", !select.prop("multiple"));
       // $('#stores').selectpicker('refresh');
        // $('#stores').selectpicker("multiple", false);
        $('#stores').selectpicker('val', res.prod_store_id);
        $('#storesingle').selectpicker('val', res.prod_store_id);
    
           $('#category').selectpicker('val', res.prod_cat_id);
   
           $('#subcategory').selectpicker('val', res.prod_sub_cat_id);
          $('#productcode').val(res.prod_code);
          $('#productrate').val(res.prod_rate);
          // $('#productdesc').html(res.prod_descr);
          var ss = res.prod_descr;
          $('.summernote').summernote('code', ss);

        //   var ss1 = res.prod_short_desc;
        //   $('.summernote1').summernote('code', ss1);
        
          $('#product_short_desc').val(res.prod_short_desc);

          // $('.summernote').html(res.prod_descr);
          $('#productdiscount').val(res.prod_disc);
          $('#sellprice').val(res.prod_sell_price);
          $('#productdiscountprice').val(res.prod_disc_price);
          $('#productmeasureunit').val(res.prod_uom);
          $('#prodaddedcomm').val(res.prod_addedcomm);
          $('#product_rating').val(res.prod_rating);
          
          $('#productstkqty').val(res.prod_stock_qty);

          $('#productavailableon').val(res.prod_packtype);
        
          $('#productavailable').selectpicker('val', res.prod_deactive);
          $('#agents').selectpicker('val', res.prod_agent_id);
          
          $('#prodvendrname').val(res.prod_agent_id);
            }
        });
      }
      
      function deleteproduct(id,img){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/deleteproduct');?>/",
              data: {id:id,imagename:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                 
                   getproduct();
               }else{
                  notifyresult('Data Deleted','success');
                  // notifyresult('Error','danger');
                  getproduct();
                
               }
               

            }
        });
          }
        
      }

      function approve(id){
       // var id = $('#productidview').val();
       
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/approveproduct');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
             // alert(data);
              if(data == "success"){
                  notifyresult('Product Approved','success');
                  $('#trackermodal').modal('hide');
                   getproduct();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }
               

            }
        });
          
        
      }
      
       function viewreason(id){

        
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/viewreason');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
              // alert(res.prod_reject_reason);
              
               
                // $('#reasontextview').val(res.prod_reject_reason);
                $('#reasontextview').html(res.prod_reject_reason);


            }
        });
            
            }
          
        
            function deleteimage(id,img,check){
              var result = confirm("Are you want to delete?");
               if (result) {
        
                  $.ajax({
                      method: "POST",
                      url: "<?php echo base_url('index.php/adminproducts/deleteimage');?>/",
                      data: {id:id,img:img,check:check}, // serializes the form's elements.
                     success: function(data){

                      var res = JSON.parse(data);
                      // console.log(data);
                      // alert(res.prod_reject_reason);
             
                      if(res.status == 1){

                        notifyresult('Image Removed','success');
                      }else{
                        notifyresult('Error','danger');
                      }
                      var imgs = res.images;
                      

                      var disprimg = '';
                    if(imgs){
                      var primg = imgs.split(",");
                   
                     for(j = 0;j < primg.length;j++){
                      if(primg.length == 1){
                        check = 'one';
                        disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.resprim+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                      }else
                      if(j == primg.length - 1){
                        check = 'last';
                        disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.resprim+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                      }else{
                        check = 'first';
                        disprimg = disprimg + '<div style="display:inline;"><img  style="width:100px;height:100px;hspace:20;"src="<?php echo base_url();?>/imageupload/'+primg[j]+'"><a title="Remove" style="cursor:pointer;position:absolute;margin-left:-15px;" onclick="deleteimage(\''+res.resprim+'\',\''+primg[j]+'\',\''+check+'\');"><i class="icon ion-close-circled"></i></a></div>' + '  ';
                      }
                    }
                     }else{
                      disprimg = "";
                     }
                     $('#imagefill').html(disprimg);
                      
                      $('#imagehid').val(res.images);
                       
                        

                    }
                });
              }
            
            }


      function reject(id){

        //var id = $('#productidview').val();
        // $('.viewmodalsecondbody').show();
        //$('.viewmodalbody').hide();
        // $('#reasontext').val() = "";
        // alert($('#reasontext').val());
        var reason = document.getElementById("reason").value;
       // alert(id);
       // alert(reason);
        // if($('#reasontext').val() != ''){
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/rejectproduct');?>/",
              data: {id:id,reason:reason}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Product Rejected','success');
                   $('#trackermodal').modal('hide');
                   getproduct();
               }else{
                  notifyresult('Error','danger');
                   $('#trackermodal').modal('hide');
               }
               

            }
        });
            // }
            // else{
            //   notifyresult('Enter reason for reject.','warning');
            // }
          
        
      }
            function productavailable(id,status){

      
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/productavailable');?>/",
              data: {id:id,status: status}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Product Updated','success');
                  
                   getproduct();
               }
               

            }
        });
            
          
        
      }
      
      
      function viewproduct(id){
        $('#productimageview').slick('removeSlide', null, null, true);
         $('#reasontext').val('');
        $('.viewmodalsecondbody').hide();
        $('.viewmodalbody').show();
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminproducts/editproduct');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
              
              $('#productidview').val(res.prod_id);
              $('#productnameview').val(res.prod_name);
             
             // $('#productimageview').html('<img  class="img-fluid" style="width:100%;height:330px;" src="<?php echo base_url();?>/imageupload/'+res.prod_image+'"><img  class="img-fluid" style="width:100%;height:330px;" src="<?php echo base_url();?>/imageupload/'+res.prod_image+'">');
              var imgs = res.prod_image;
              var primg = imgs.split(",");
              
              for(j = 0;j < primg.length;j++){
                $('#productimageview').slick('slickAdd','<img  class="img-fluid"  src="<?php echo base_url();?>/imageupload/'+primg[j]+'">');
                
              }
             
              
              $('#imagehid').val(res.prod_image);



            $('#productcommisn').val(res.prod_commission);

            $('#productstoreview').val(res.prod_store_id);
        
          $('#productcategoryview').val(res.prod_cat_id);
          $('#productsubcategoryview').val(res.prod_sub_cat_id);
          $('#productcodeview').val(res.prod_code);
          $('#productrateview').val(res.prod_rate);
          $('#productdescrview').val(res.prod_descr);
          $('#productdiscountview').val(res.prod_disc);
          $('#productdiscview').val(res.prod_disc_price);
          // $('#productmeasureunit').val(res.prod_uom);
        
          // $('#productavailable').selectpicker('val', res.prod_deactive);
            }
        });
        
      }

    </script>
   
   