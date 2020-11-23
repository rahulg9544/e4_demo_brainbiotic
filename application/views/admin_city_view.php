<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Delivery Charge</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Delivery Charge</button>
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
                      <input type="hidden" id="city_id" name="city_id"/>
                      <h4 class="demo-sub-title">City Name</h4>
                      <input class="form-control focus " type="text" required="required" name="city_name" id="city_name">
                    </div> 
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Minimum Value</h4>
                      <input class="form-control focus " type="text" required="required" name="min_value" id="min_value">
                    </div>   
                                       
                     </div>

                        <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id="city_id" name="city_id"/>
                      <h4 class="demo-sub-title">Delivery Charge</h4>
                      <input class="form-control focus " type="text" required="required" name="delivery_charge" id="delivery_charge">
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
                url: "<?php echo base_url('index.php/Admin_city/displaytable');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                          
              }
             });
      }
      function clearall(){
        $('#modalcaption').text("Add Delivery Charge");
        $('#city_id').val('');
        $('#city_name').val('');
        $('#min_value').val('');
        $('#delivery_charge').val('');
            
        getcategory();
           
      }
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_city/insertrow');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                // alert(data);
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
        $('#modalcaption').text("Edit Delivery Charge");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_city/editrow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getcategory();
              // console.log(data);
             $('#city_id').val('');
             $('#city_name').val('');
             $('#min_value').val('');
             $('#delivery_charge').val('');

             $('#city_id').val(res.city_id);
             $('#city_name').val(res.city_name);
             $('#min_value').val(res.min_value);
             $('#delivery_charge').val(res.delivery_charge);

                       
            }
        });
      }
      
      function deletecategory(id){
        var result = confirm("Do you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_city/deleterow');?>/",
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
   
   