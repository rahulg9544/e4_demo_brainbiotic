

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Offer Text</div>
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

                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Offer text</h4>
                      <textarea  class="form-control" name="offertext" id="offertext" ></textarea>
                    </div>

                     <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Offer text arabic</h4>
                      <textarea  class="form-control" name="offertextar" id="offertextar" ></textarea>
                    </div>


                    <input type="hidden" name="offertext_id" id="offertext_id">


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
                url: "<?php echo base_url('index.php/Admin_offertext/get_offertext');?>/",
                data: '', 
               success: function(data){
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable();           
              }
             });
      }

      // function clearall(){
      //    $('#modalcaption').text("Add Promo Code");
      //    $('#code').val('');
      //    $('#code_type').val('');
      //    $('#percentage').val('');
      //    $('#max_amount').val('');
      //    $('#min_cart').val('');
      //    $('#exp_date').val('');
      //    $('#promo_status').val('');
      //    $('#promoid').val('');
      //     getpromocode();  
      // }

         function editcontinf(id){
          
        $('#modalcaption').text("Edit Offer Text");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_offertext/editoffertext');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
            //   alert(data);
              // $('#image_file').val('');
               
              $('#offertext_id').val(res.offertext_id);
              $('#offertext').val(res.offertext_text);
              $('#offertextar').val(res.offertext_text_arabic);
              
            }
        });
      }
      

      $("#idFormpromo").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_offertext/updateofrtext');?>/",
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               alert(data);
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
   
   