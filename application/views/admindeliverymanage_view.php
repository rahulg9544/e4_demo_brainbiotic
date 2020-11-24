

        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6"> Order Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
               <!--  <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add delivery</button> -->
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
          <!-- <div class="modal-body"> -->
           <!-- <form method="POST"  id="idFormdelivery" enctype="multipart/form-data" accept-charset="utf-8"> -->
             <!-- <div class="panel" > -->
              <div class="modal-body table-responsive" style="overflow-x:auto;" id="tablefillextendmodal" >

              </div>
            <!-- </div> -->
                  
                     
                     
                 
                  <!-- </div> -->

          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Close</button>
            <!-- <button class="btn btn-success"  type="submit" value = "save">Save</button> -->
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
        <!--    </form> -->
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getdelivery();

      });

      function dboychoose(ord,dt,tm){

        document.getElementById('title').value = "New Order";
             
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/dboyassign');?>/",
                data: {ord:ord,dt:dt,tm:tm,dboy:$('#dboy').val(),ddate:$('#ddate').val()},
               success: function(data){

             var result = JSON.parse(data);
            
             for (var i = 0; i < result['details'].length ; i++) {
             
             var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
             firebase_id = firebase_id.substring(1, firebase_id.length-1);

              var user_name = JSON.stringify(result['details'][i]['user_displayname']);
             user_name = user_name.substring(1, user_name.length-1);

            document.getElementById('message').value = user_name+", You have new order "+ord;
            
             document.getElementById('redId').value = firebase_id;

             $('#single_firebase').trigger('click');
                }
                  notifyresult('Data Saved','warn');
                  getdelivery();
               
              }


             });
      }
      function getdelivery(){

           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/getdelivery');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // alert(data);
                // console.log(data);
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable({
                   "order": [[ 0, "asc" ]] 
                 });
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
         $('#modalcaption').text("Add Delivery");
        $('#image_file').val('');
         $('#deliveryid').val('');
        $('#deliveryname').val('');
         $('#deliveryimage').val('');
          $("#deliveryimage").prop('required',true);
         $('#imagefill').html('');
         $('#imagehid').val('');
          getdelivery();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#idFormdelivery").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admindelivery/insertdelivery');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               if(data == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                   getdelivery();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });
      
      function viewdelivery(id,dat,tim,uid){
       
        $('#modalcaption').text("View Delivery");

        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/modalviewdelivery');?>/",
              data: {id:id,dat:dat,tim:tim,uid:uid}, // serializes the form's elements.
             success: function(data){
                $('#tablefillextendmodal').html(data);
                // getdelivery();
                $('#tablefillmodal').DataTable();
            }
        });
      }


      function deliverystatus(id,dat,tim,user_name,order_id){
         var result = confirm("Are you want to change status?");
          if (result) {

              // document.getElementById('title').value = "Order Delivered";
              // document.getElementById('message').value = "Dear "+user_name+", Thank you for shopping with us, Your order no "+order_id+" has been Delivered!";
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/deliverystatus');?>/",
              data: {id:id,dat:dat,tim:tim,order_id:order_id}, // serializes the form's elements.
             success: function(data){
           //   alert(data);
            
              getdelivery();
              notifyresult('Status Changed','success');
                
            }
        });
      }
      }



      function shippedstatus(id,dat,tim,user_name,order_id){
         var result = confirm("Are you want to change status?");
          if (result) {
            // document.getElementById('title').value = "Out For Delivery";
            // document.getElementById('message').value = "Dear "+user_name+", Your order no "+order_id+" is on its way!";
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/shippedstatus');?>/",
              data: {id:id,dat:dat,tim:tim,order_id:order_id}, // serializes the form's elements.
             success: function(data){
              

              getdelivery();
              cuntbadge();
              notifyresult('Status Changed','success');
                
            }
        });
      }
      }
      
      function invoice(id,dat,tim){
         
            
             window.open("<?php echo base_url();?>index.php/admindelivery/prints?ci="+ id +"&d="+ dat + "&t="+ tim ,"_blank");
    
      }

       function invoice1(id,uid){
         
            
            //  window.location.href="<?php echo base_url(); ?>index.php/Admindelivery/invoiceprint?od="+id+"&&uid="+uid;
            
            window.open("<?php echo base_url(); ?>index.php/Admindelivery/invoiceprint?od="+id+"&&uid="+uid,"_blank");
    
      }

      function deletedelivery(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/deletedelivery');?>/",
              data: {id:id,imagename:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                   getdelivery();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }
    </script>


 <script type="text/javascript">

    function cancelorder(id,ordid,dcdate,dctime){
      
  var result = confirm("Are you sure you want to cancel order?");
if (result) {
    $.ajax({        
      method: "POST",
      url: "<?php echo base_url('index.php/Orderhistory/cancelorder');?>/",
      data:{id:id,ordid:ordid},
      success: function(data){

       alert(data);

       var result = JSON.parse(data);
       if(result['status'] == 'success'){
           if(result['order_cancel'] == "true")
           {
            document.getElementById('title').value = "Order Cancelled";

            getdelivery();
            
             for (var i = 0; i < result['details'].length ; i++) {
             
             var firebase_id = JSON.stringify(result['details'][i]['firebase_reg_id']);
             firebase_id = firebase_id.substring(1, firebase_id.length-1);

              var user_name = JSON.stringify(result['details'][i]['user_displayname']);
             user_name = user_name.substring(1, user_name.length-1);

              document.getElementById('message').value = "Dear "+user_name+", Thank you for shopping with us, Your order no "+ordid+" has been Cancelled!";
            
             document.getElementById('redId').value = firebase_id;

             $('#single_firebase').trigger('click');
           }
       // notification_agent(data);
           }
           else
           {

           }

         
          notifyresult('item cancelled','success');
          viewdelivery(ordid,dcdate,dctime);
           // $('#trackermodal').modal('hide');
           // $('#trackermodal').modal('show');
           // getshoppingitems();
           
        }
        else{
          notifyresult('item cancelled failed','danger')
        }
      
      }
     });
   }

  }

  
   function cancelorderfull(orderid)

   {
        var result = confirm("Are you sure you want to cancel order?");
        if (result) 
        {
          $.ajax({        
          method: "POST",
          url: "<?php echo base_url('index.php/Admindelivery/cancelorderfull');?>/",
          data:{orderid:orderid},
          success: function(data){

            $('#fullordrcanbtn').text('Order Canceled'); 
            
            $('#fullordrcanbtn').prop('disabled',true);

            getdelivery();

            $('#trackermodal').modal('hide');

           }

          });

        }
   }

  

//   function notification_agent(data)
//   {
//      var result = JSON.parse(data);

//       if(result['status'] == 'success'){

//          document.getElementById('title').value = "Order Cancelled";
//              for (var j = 0; j < result['agent_notification'].length ; j++) {
             
//              var firebase_id = JSON.stringify(result['agent_notification'][j]['firebase_reg_id']);
//              firebase_id = firebase_id.substring(1, firebase_id.length-1);

//               var user_name = JSON.stringify(result['agent_notification'][j]['user_displayname']);
//              user_name = user_name.substring(1, user_name.length-1);

//               document.getElementById('message').value = user_name+", Order no "+ordid+" has been Cancelled! Thank you for your services.";
            
//              document.getElementById('redId').value = firebase_id;

//              $('#single_firebase').trigger('click');
//            }

     
//   }
// }
 </script>          
               
   
   