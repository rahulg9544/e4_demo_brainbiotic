<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Categories</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add category</button>
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
                      <input type="hidden" id = "formid" name="formnm"/>
                      <h4 class="demo-sub-title">Category Label</h4>
                      <input class="form-control focus " type="text" required="required" name="namenm" id="nameid">
                    </div>  
                                       
                     </div>

                     <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Image</h4>
                      <input class="form-control focus" type="file" required="required" name="file" id="fileUpload">
                      <input class="form-control focus" type="hidden" name="imagehid" id="imagehid">
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
          getcategory();

      });
      var chk = 0;
      function getcategory(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_category/displaytable');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                          
              }
             });
      }
      function clearall(){
        $('#modalcaption').text("Add Categories");
        $('#nameid').val('');
        $('#divisionid').selectpicker('val', '');
       
        $('#formid').val('');
            
        getcategory();
           
      }


      $('#fileUpload').on("change",function () {
                  
                  var fileExtension = ['jpeg', 'jpg', 'png'];
                  if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                       alert("Only '.jpeg','.jpg','.png' formats are allowed.");
                       $('#fileUpload').val(''); 
                  }
                  if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height != 220 && width != 520) {
                        alert("Height and Width must not exceed 520 x 220.");
                        $('#fileUpload').val('');
                        return false;
                    }
                  
                };
 
            }
        } 

      });
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_category/insertrow');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

               if($.trim(data) == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                  getcategory();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getcategory();
               }

              // show response from the php script.            
              }
             });
      });




      function editcategory(id){
        $('#modalcaption').text("Edit Categories");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_category/editrow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getcategory();
              // console.log(data);
              $('#formid').val('');
              $('#nameid').val('');

              $('#formid').val(res.category_id);
              $('#nameid').val(res.category_label);

              $('#imagehid').val(res.cat_image);
              
              
                             
            }
        });
      }
      
      function deletecategory(id){
        var result = confirm("Do you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_category/deleterow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getcategory();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        }
     
    </script>
   
   