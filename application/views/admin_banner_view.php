<div class="page-header">
  <div class="row">
    <div class="col-md-4">
      <div class="media">
        <div class="media-body">
          <div class="display-6">Main Slider</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="pull-xs-right" role="toolbar">
               
              <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Slider</button> 
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

    <!--Below is the model for the editing popup section that appears on clicking the edit icon with modelid="trackermodal" -->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="block-header bg-primary" id="modalcaption"></div>
          <div class="modal-body">
           <form method="POST" id="prodForm">
             <input type="hidden" id = "pageid" name="pagenm"/>
            <div class="row m-b-2">
              
              <div class="col-sm-12">
                <div class="form-group col-sm-12">
                      
                  <h4 class="demo-sub-title">First Title</h4>
                  <input class="form-control focus" type="text" name="titlenm"  id="titleid" required="required">
                       
                </div>  
                    
                 <div class="form-group col-sm-12">

                  <h4 class="demo-sub-title">Second Title</h4>
                  <input type="text" class="form-control focus" name="shortdescnm" id="shortdescid" required="required"/>

                </div>

                <div class="form-group col-sm-12">

                  <h4 class="demo-sub-title">Image</h4>
                  <input type="file" class="form-control focus" name="imagenm"  id="imageid" required="required">
                  <input type="hidden" name="image1nm" id="image1id">
                  <div id="imagefill"></div>
                </div>
                 
                <div class="form-group col-sm-12">

                  <h4 class="demo-sub-title">Priority</h4>
                 <select class="form-control" id="prio" name="prio">
                   
                   <option value="">Select</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>

                 </select>
                </div>
                

                <div class="form-group col-sm-12">
                  <h4 class="demo-sub-title">FirstTitle Arabic</h4>
                  <textarea class="form-control focus" name="titlearnm" id="titlearid" required="required"></textarea>

                </div> 
                  <div class="form-group col-sm-12">
                  <h4 class="demo-sub-title">SecondTitle Arabic</h4>
                  <textarea class="form-control focus" name="shortdescarnm" id="shortdescarid"></textarea>

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
          gettable();

      });
      var chk = 0;
      function gettable(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_banner/displaybanner');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);   //fetches the requested HTMLsnippet & inserts it on the page
                $('#tablefill').DataTable();
                }
             });
      }


      
    function edit(id){
        $('#modalcaption').text("Edit Banner");
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_banner/editbanner');?>/",
                data: {id:id}, // serializes the form's elements.
                success: function(data){
                  // alert(data);
                  var res = JSON.parse(data);
                  gettable();
                //  console.log(data);
                   
                  $('#pageid').val(res.banner_id);   
                  $('#titleid').val(res.banner_title); 
                  $('#shortdescid').val(res.banner_shortdesc); 
                  $('#titlearid').val(res.banner_titlear); 
                  $('#shortdescarid').val(res.banner_shortdescar); 

                  $('#imageid').prop('required',false);
                  $('#image1id').val(res.banner_image); 
                  $('#imagefill').html('<img style="width:250px; height:200px;" src="<?php echo base_url();?>/uploads/'+res.banner_image+'">') 

                  } 
               
              });
      }

 
      $("#prodForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_banner/updatebanner');?>/",
              data: new FormData(this),    //creating a FormData object named 'data'
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                 alert(data);
               if($.trim(data) == "success"){
                  notifyresult('Data Saved','success');  
                  $('#trackermodal').modal('hide');    
                  gettable();  
               }else{
                  notifyresult('Error','danger');      
                  $('#trackermodal').modal('hide');   
                  gettable();  
               }

              // show response from the php script.            
              }
             });
      });
     
   function clearall(){
        
        $('#prodForm').val('');
        $('#pageid').val('');
        $('#titleid').val('');
        $('#shortdescid').val('');
        $('#imageid').val('');
        $('#image1id').val('');
        $('#imagefill').val('');
        $('#titlearid').val('');
        $('#shortdescarid').val('');
          $('#modalcaption').text("Add Slider");
        gettable();  
        
      //  $( "#addeditform" ).fadeIn( "slow", function() {
        //});
      }
</script>
   
   