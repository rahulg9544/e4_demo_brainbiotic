

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Contact Us</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <!-- <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Promo Code</button>
              </div>
            </div> -->
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
                      <h4 class="demo-sub-title">Location Address</h4>
                     <textarea class="form-control" id="contaddress" name="contaddress" required="required"></textarea>
                    </div>

                    


                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Phone Number</h4>
                      <input class="form-control" type="text" name="contphon" id="contphon" required="required" title="only numbers allowed">
                     </div>

                   

                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Mail id</h4>
                      <input class="form-control" type="email" name="contmail" id="contmail"  required="required" title="only numbers allowed">
                     </div>

                     


                     


                    <input type="hidden" name="contid" id="contid">


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
                url: "<?php echo base_url('index.php/Admin_contactus/get_continfo');?>/",
                data: '', 
               success: function(data){
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable();           
              }
             });
      }

     

         function editcontinf(id){
        $('#modalcaption').text("Edit Contact Info");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_contactus/editcontactinfo');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              // console.log(data);
              // $('#image_file').val('');
               
              $('#contid').val(res.contact_id);
              $('#contaddress').val(res.contact_address);
              $('#contphon').val(res.contact_phon);
              $('#contmail').val(res.contact_mail);
              
             
            }
        });
      }
      

      $("#idFormpromo").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_contactus/updatecontact');?>/",
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
 
      // function deletereview(id){
      //   var result = confirm("Are you want to delete?");
      //     if (result) {
      //         $.ajax({
      //         method: "POST",
      //         url: "<?php echo base_url('index.php/Admin_prodreview/delete_review');?>/",
      //         data: {id:id}, // serializes the form's elements.
      //        success: function(data){
      //         if(data == "success"){
      //             notifyresult('Data Deleted','success');
      //              getpromocode();
      //          }else{
      //             notifyresult('Error','danger');
      //          }
               

      //       }
      //   });
      //     }
        
      // }

   // function changepriority(id,status){
   //   $.ajax({
   //   method: "POST",
   //   url: "<?php echo base_url('index.php/adminpromocode/changepriority');?>/",
   //   data: {id:id,status: status}, // serializes the form's elements.
   //   success: function(data){
   //    //alert(data);
   //   if(data == "success"){
   //   notifyresult('Priority Updated','success');
   //   getpromocode();  
   //   }
   //   }
   //   }); 
   //   }

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
   
   