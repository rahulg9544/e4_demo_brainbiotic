<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Subcategories</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Subcategory</button>
              </div>
            </div>

          </div>
        </div>
        <div class="container-fluid">
          <div class="panel-wrapper">
            <div class="panel" >
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextend" >
                
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
        </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-primary" id="modalcaption"></div>
          <div class="modal-body">
           <form method="POST" id="menuForm"  >

                  <div class="row m-b-2">

                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id ="formid" name="formnm"/>
                      <h4 class="demo-sub-title">Subcategory Name</h4>
                      <input class="form-control focus " type="text" required="required" name="namenm" id="nameid">
                    </div>  

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Subcategory Name Arabic</h4>
                      <input class="form-control focus " type="text" required="required" name="namear" id="namear_id">
                    </div>  
                                       
                     </div>

                   <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Category ID</h4>
                      <select class="form-control c-select" name="categorynm" required="required" id="categoryid" data-plugin="selectpicker">
                        <option value="">Select</option>
                        <?php foreach($cat as $catdpdwn){?>
                          <option value="<?php echo $catdpdwn->category_id;?>" ><?php echo $catdpdwn->category_label;?></option>
                        <?php }?>
                        
                       
                      </select>
                     
                    </div>  
                                       
                     </div>

                  
                  <div class="col-sm-12"> 
                  <div class="form-group col-sm-6">

                  <h4 class="demo-sub-title">Image</h4>
                  <input type="file" class="form-control focus" name="imagenm"  id="imageid" required="required">
                  <input type="hidden" name="image1nm" id="image1id">
                  <div id="imagefill"></div>

                  </div>
                  </div>

                    

                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary"  type="submit" >Save</button>
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
           </form>
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getsubcategory();

      });
      var chk = 0;
      function getsubcategory(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_subcategory/displaytable');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable({
                   "order": [[ 0, "desc" ]] 
                 });
                          
              }
             });
      }
      function clearall(){
        $('#modalcaption').text("Add Subcategory");
        $('#nameid').val(''); 
        $('#namear_id').val('');   
        $('#categoryid').selectpicker('val', '');
       
        $('#formid').val('');
         $('#imagefill').html("");
            
        getsubcategory();
           
      }
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_subcategory/insertrow');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                
               if($.trim(data) == "success"){
                  notifyresult('Subcategory Saved','success');
                  $('#trackermodal').modal('hide');
                  getsubcategory();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getsubcategory();
               }

              // show response from the php script.            
              }
             });
      });




      function editsubcategory(id){
        $('#modalcaption').text("Edit Subcategory");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_subcategory/editrow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getsubcategory();
              // console.log(data);
             $('#formid').val('');
             $('#nameid').val('');
             $('#namear_id').val('');
             $('#categoryid').selectpicker('val', '');

              $('#formid').val(res.subcategory_id);
              $('#nameid').val(res.subcategory_name);
              $('#namear_id').val(res.subcategory_name_ar);
              $('#categoryid').selectpicker('val', res.subcategory_category); 

              $('#imageid').prop('required',false);
              $('#imageid').val('');
                  $('#image1id').val(res.subcategory_image); 
                  $('#imagefill').html('<img style="width:250px; height:200px;" src="<?php echo base_url();?>/uploads/'+res.subcategory_image+'">')
                             
            }
        });
      }
      
      function deletesubcategory(id){
        var result = confirm("Do you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_subcategory/deleterow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getsubcategory();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        }
     
    </script>
   
   