

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Promo Code Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Promo Code</button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="panel-wrapper">
            <div class="panel" >
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextendcat" >

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
           <form method="POST"  id="idFormpromo" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="row m-b-2">

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Code </h4>
                      <input class="form-control" type="text"  name="code" id="code" required="required">
                    </div>

                    


                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Max Amount </h4>
                      <input class="form-control" type="text"  pattern="[0-9\.]+" name="max_amount" id="max_amount" required="required" title="only numbers allowed">
                    </div>

                   

                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Min Cart Value </h4>
                      <input class="form-control" type="text" pattern="[0-9\.]+" name="min_cart" id="min_cart"  required="required" title="only numbers allowed">
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Expiry Date</h4>
                      <input class="form-control" type="date" name="exp_date" id="exp_date" placeholder="yyyy-mm-dd" required="required">
                    </div>


                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Status</h4>
                       <select class="form-control" name="promo_status" required="required" id="promo_status">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                       </select>
                     </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Code Type </h4>
                       <select class="form-control" name="code_type" required="required" id="code_type">
                        <option value="">Select Type</option>
                        <option value="1">Percentage</option>
                        <option value="0">Flat Amount</option>
                       </select>
                    </div>

                     <div class="form-group col-sm-6" id="percentage_input" >
                      <h4 class="demo-sub-title">Discount Percentage/amount</h4>
                      <input class="form-control" type="text" pattern="[0-9\.]+" name="percentage" id="percentage"  title="only numbers allowed">
                    </div>


                    <div class="form-group col-sm-6" id="percentage_input" >
                      <h4 class="demo-sub-title">Maximum No.of use per user</h4>
                      <input class="form-control" type="text" pattern="[0-9\.]+" name="nouse" id="nouse"  title="only numbers allowed">
                    </div>

                    


                    <input type="hidden" name="promoid" id="promoid">


                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-success"  type="submit" value = "save">Save</button>
          </div>
           </form>
        </div>
      </div>
    </div>



     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>


     <script type="text/javascript">
      $( document ).ready(function() {
          getpromocode();

      });
      function getpromocode(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminpromocode/get_promocode');?>/",
                data: '', 
               success: function(data){
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable({
                   "order": [[ 0, "desc" ]] 
                 });           
              }
             });
      }
      function clearall(){
         $('#modalcaption').text("Add Promo Code");
         $('#code').val('');
         $('#code_type').val('');
         $('#percentage').val('');
         $('#max_amount').val('');
         $('#min_cart').val('');
         $('#exp_date').val('');
         $('#promo_status').val('');
         $('#promoid').val('');
         $('#nouse').val('');
          getpromocode();  
      }
      

      $("#idFormpromo").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminpromocode/insert_promocode');?>/",
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               // alert(data);
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                   getpromocode();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }           
              }
             });
      });
      
      function editpromocode(id){
        $('#modalcaption').text("Edit Promo Code");
             $('#categoryimage').val('');
             $('#category_icon').val('');
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminpromocode/edit_promocode');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
              $("#categoryimage").prop('required',false);
              $('#categoryid').val(res.categoryid);
              $('#categoryname').val(res.categoryname);
              $('#category_priority').val(res.category_priority);
              $('#nouse').val(res.promo_use_per_user)
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>imageupload/'+res.categoryimage+'">')
              $('#iconfill').html('<img  style="width:100px;height:100px;"src="<?php echo base_url();?>imageupload/'+res.category_icon+'">')
              
              $('#imagehid').val(res.categoryimage);
              $('#icon_hidden').val(res.category_icon);
            }
        });
      }
      
      function deletepromocode(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/adminpromocode/delete_promocode');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getpromocode();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }

   function changepriority(id,status){
     $.ajax({
     method: "POST",
     url: "<?php echo base_url('index.php/adminpromocode/changepriority');?>/",
     data: {id:id,status: status}, // serializes the form's elements.
     success: function(data){
      //alert(data);
     if(data == "success"){
     notifyresult('Priority Updated','success');
     getpromocode();  
     }
     }
     }); 
     }

     function show_percentage(){

      var percentage_input = document.getElementById("percentage_input");
      var value = document.getElementById("code_type").value;

      if(value == 1)
      {
        percentage_input.style.display = "block";
        $("#percentage").prop('required',true);
      }
      else
      {
        percentage_input.style.display = "none";
      }
     
     }
</script>
   
   