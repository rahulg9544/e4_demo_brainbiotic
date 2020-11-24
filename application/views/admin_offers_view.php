<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Offers</div>
                 
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
              
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Offer</button>
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

                 <input type="hidden" id="formid" name="formnm"/>

                   <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Select Subcategory</h4>
                      <select class="form-control c-select" name="sub_cat_id" required="required" id="sub_cat_id" data-plugin="selectpicker">
                        <option value="">Select</option>
                        <?php foreach($offers as $catdpdwn){?>
                          <option value="<?php echo $catdpdwn->subcategory_id;?>" ><?php echo $catdpdwn->subcategory_name;?></option>
                        <?php }?>
                        
                      </select>
                     
                    </div>  
                                       
                     </div>

                   <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Offer Text 1</h4>
                      <input class="form-control focus " type="text" required="required" name="offer_text1" id="offer_text1">
                    </div>   
                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Offer Text 1</h4>
                      <input class="form-control focus " type="text" required="required" name="offer_text1_ar" id="offer_text1_ar">
                    </div>                  
                    </div>

                     <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Offer Text 2</h4>
                      <input class="form-control focus " type="text" required="required" name="offer_text2" id="offer_text2">
                    </div> 
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Offer Text 2</h4>
                      <input class="form-control focus " type="text" required="required" name="offer_text2_ar" id="offer_text2_ar">
                    </div>                  
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-3">
                      <h4 class="demo-sub-title">Discount From %</h4>
                      <input class="form-control focus " type="text" required="required" name="discount_start" id="discount_start">
                    </div>  
                     <div class="form-group col-sm-3">
                      <h4 class="demo-sub-title">Discount To %</h4>
                      <input class="form-control focus " type="text" required="required" name="discount_end" id="discount_end">
                    </div>                   
                    </div>

                 

                  
                  <div class="col-sm-12"> 
                  <div class="form-group col-sm-6">

                  <h4 class="demo-sub-title">Image<span style="font-size:10px">(width:500px ,height:748px)</span></h4>
                  <input type="file" class="form-control focus" name="imagenm"  id="imageid" required="required">
                  <input type="hidden" name="image1nm" id="image1id">
                  <div id="imagefill"></div>

                  </div>
                  </div>


                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Offer Status</h4>
                      <select class="form-control c-select" name="offer_status" required="required" id="offer_status" data-plugin="selectpicker">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>               
                     </div>





                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary"  type="submit" >Save</button>
          
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
                url: "<?php echo base_url('index.php/Admin_offers/displaytable');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                 console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable({
                   "order": [[ 0, "desc" ]] 
                 });
                          
              }
             });
      }
      function clearall(){
        $('#modalcaption').text("Add Offer");
        $('#offer_text1').val('');
        $('#offer_text1_ar').val(''); 
        $('#offer_text2').val(''); 
        $('#offer_text2_ar').val(''); 
        $('#discount_end ').val('');
        $('#discount_start ').val('');  
        $('#sub_cat_id ').selectpicker('val', '');
       // $('#offer_status ').selectpicker('val', '');
        $('#imageid ').val(''); 
        $('#formid').val('');
        getsubcategory();
           
      }
      

      $("#menuForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_offers/insertrow');?>/",
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




      function editoffer(id){
        $('#modalcaption').text("Edit Offer");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_offers/editrow');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getsubcategory();
              // console.log(data);
             $('#formid').val('');
             $('#offer_text1').val('');
             $('#offer_text1_ar').val('');
             $('#offer_text2').val('');
              $('#offer_text2_ar').val('');
             $('#discount_start').val('');
             $('#discount_end').val('');
             $('#sub_cat_id').selectpicker('val', '');
             $('#offer_status').selectpicker('val', '');

              $('#formid').val(res.offers_id);
              $('#offer_text1').val(res.offers_text1);
              $('#offer_text1_ar').val(res.offers_text1_ar);
              $('#offer_text2').val(res.offers_text2);
              $('#offer_text2_ar').val(res.offers_text2_ar);
              $('#discount_start').val(res.offers_start_percetage);
              $('#discount_end').val(res.offers_end_percentage);
              $('#sub_cat_id').selectpicker('val', res.offers_sub_cat_id); 
              $('#offer_status').selectpicker('val', res.offers_status ); 

              $('#imageid').prop('required',false);
                  $('#image1id').val(res.offers_image); 
                  $('#imagefill').html('<img style="width:250px; height:200px;" src="<?php echo base_url();?>/uploads/'+res.offers_image+'">')
                             
            }
        });
      }
      
      function deleteoffer(id){
        var result = confirm("Do you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_offers/deleterow');?>/",
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


function status_change(id,status){

              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_offers/status_change');?>/",
              data: {id:id,status: status}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Status Updated','success');
                  
                   getsubcategory();
               }
               

            }
        });
   
      }
     
    </script>
   
   