<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick-theme.css"/>
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.min.js"></script>


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

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
                  <div class="display-6">Event Management</div>
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
                
                onclick="clearall();">Add Event</button>
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
                      <h4 class="demo-sub-title">Title</h4>
                      <input class="form-control" type="text" required="required"  name="title1" id="title1">
                    </div>
                  
                    <input type="hidden" name="eventnm" id="eventid">
                    
                  </div>

                  <div class="row m-b-2">
                      
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Date</h4>
                      <input class="form-control" type="date" required="required"  name="date" id="date">
                    </div>
                    
                  </div>


                 <!-- <div class="row m-b-2">   
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Description</h4>
                      <textarea class="form-control" name="descnm" id="descid"></textarea>
                    </div>
                   
                                    
                  </div> -->
                  
                
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
               
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->

        </div>
      <!-- END VIEW WAPPER-->

    </div>
   






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<!-- firebase script put it on header of the template -->

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.18.0/firebase-storage.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



<script src="<?php echo base_url(); ?>/AdminLTE-master/js/jquery-1.11.3.min.js"></script>
 <script src="<?php echo base_url(); ?>/AdminLTE-master/js/html5shiv.js"></script>
 <script src="<?php echo base_url(); ?>/AdminLTE-master/js/jquery-ui.js"></script>
 <script src="<?php echo base_url(); ?>/AdminLTE-master/js/modernizr-custom.js"></script>
 <script src="<?php echo base_url(); ?>/AdminLTE-master/js/respond.js"></script>
 <script src="<?php echo base_url(); ?>/AdminLTE-master/js/tether.min.js"></script>



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
         
     
    });

    function getproduct(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_events/displayevents');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable();
                         
              }
             });
      }

  //product edit    

   function editevent(id){

        $('#formheading').text('Edit Event');
        $( "#addeditform" ).fadeIn( "slow", function() {
        });
         $('#displaytable').hide();
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_events/editevents');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){

              var res = JSON.parse(data);

              // console.log(res);
              // return false;
              
              $('#title1').val(res.title);
              $('#date').val(res.date);
              $('#eventid').val(res.id);
            
                 
               
            }
            
        });
      }

//product edit



         function clearall(){
        
         $('#date').val('');
         $('#title1').val('');
         $('#formheading').text('Add Event');
         $( "#addeditform" ).fadeIn( "slow", function() {
          });
         $('#displaytable').hide();
      
         // getproduct();

      }

      
   function cancelform(){
        $('#addeditform').hide();
        $( "#displaytable" ).fadeIn( "slow", function() {
        });
      }
     




      $("#idFormproduct").submit(function(e) {
         e.preventDefault();
          
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_events/insertevent');?>/",
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               // alert(data);
                if(data == "success"){
                  notifyresult('Data Saved','success');
                  // $('#trackermodal').modal('hide');
                  $('#addeditform').hide(); 
                  $( "#displaytable" ).fadeIn( "slow", function() {                     
                  });
                  getproduct();
                }                           
                else
                {
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getproduct();
                }            
              }
          });
      });
      

      
      function deleteevent(id){

        var result = confirm("Do you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_events/delete');?>/",
              data: {id:id}, // serializes the form's elements.
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
        
          


    </script>
   
   