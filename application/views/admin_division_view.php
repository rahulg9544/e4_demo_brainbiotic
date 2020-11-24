

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Division Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Division</button>
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
          <div class="block-header bg-success" id="modalcaption"></div>
          <div class="modal-body">
           <form method="POST"  id="idFormsubcategory" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Division Name</h4>
                      <input class="form-control focus" type="text" required="required" name="divname" id="divname" title="only characters allowed">
                    </div>

                    <div class="row m-b-2">
                    <div class="form-group col-sm-6 ">
                      <h4 class="demo-sub-title">Select Category</h4>
                      <select class="form-control c-select" name="divcategory" onchange="getsubcatsdivs();" required="required" id="divcategory" >
                        <option value="">select</option>
                        <?php foreach($categoriesdpdwn as $categories){?>
                        <!-- <option value="admin" data-subtext="(High priority)">Admin</option> -->
                        <option value="<?php echo $categories->category_id;?>"><?php echo $categories->category_label;?></option>
                      <?php }?>
                        <!-- <option value="dealer">Dealer</option> -->
                      </select>
                    </div>
                    
                    <input type="hidden" name="divid" id="divid">
                  </div>
                  
                    
                    <div class="form-group col-sm-6 ">
                      <h4 class="demo-sub-title">Select Subcategory</h4>
                      <div id="replacediv">
                      <select class="form-control c-select" name="divsub" required="required" id="divsub">

                        <option value="">select</option>
                        
                      </select>
                      </div>
                    </div>

                    <div class="form-group col-sm-6 ">
                      <h4 class="demo-sub-title">Description</h4>
                      
                      <textarea class="form-control" id="divdesc" name="divdesc"></textarea>
                    </div>
                    
                    
                  </div>
                  
                     
                     
                 
                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-success"  type="submit" value = "save">Save</button>
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
           </form>
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getdivision();
         
           

      });
        
      
      function getsubcatsdivs()
      {
        var cat = $('#divcategory').val();
        // alert("hai");
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_division/getsubcategory');?>/",
                data:{cat,cat}, // serializes the form's elements.
               success: function(data){
              //  alert(data);
                $('#replacediv').html(data);
                
                           
              }
             });
      }


      function getdivision(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_division/getdivision');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                          
              }
             });
      }
      function clearall(){
         $('#modalcaption').text("Add Division");
        $('#divid').val('');
         $('#divcategory').val('');
         $('#divsub').val('');
        $('#divname').val('');
        $('#divdesc').val('');
         
          getdivision();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#idFormsubcategory").submit(function(e) {
       
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_division/insertdivision');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
                alert(data);
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                   getdivision();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });


      function goingedit(id,cid)
      {
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_division/checkcatfill');?>/",
              data: {cid:cid}, // serializes the form's elements.
             success: function(data){
             
             $('#trackermodal').modal('show');
             $('#replacediv').html(data);

              editsubcategory(id);
              
            }
           });  
      }
      
      function editsubcategory(id){
        $('#modalcaption').text("Edit Division");
        
       
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_division/editdivision');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
               console.log(data);
              var res = JSON.parse(data);
            
                $('#divid').val(res.division_id);
                 $('#divcategory').val(res.division_cat);
                 $('#divsub').val(res.division_subcat);
                $('#divname').val(res.division_name);
                $('#divdesc').val(res.division_desc);

            
            }
        });
      }
      
      function deletesubcategory(id,img){

        var result = confirm("Are you want to delete?");
        
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_division/deletedivision');?>/",
              data: {id:id,imagename:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getdivision();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
     
     
    </script>
   
   