<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Sales report</div>
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

            <!-- Date range -->
                

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
                      <h4 class="demo-sub-title">Title 1</h4>
                      <textarea  class="form-control" name="abttitle1" id="abttitle1" ></textarea>
                    </div>

                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">content 1</h4>
                      <textarea   class="form-control" name="abtcontent1" id="abtcontent1" ></textarea>
                    </div>


                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Title 2</h4>
                      <textarea  class="form-control" name="abttitle2" id="abttitle2" ></textarea>
                    </div>

                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">content 2</h4>
                      <textarea   class="form-control" name="abtcontent2" id="abtcontent2" ></textarea>
                    </div>


                     <div class="form-group col-sm-6">
                       <h4 class="demo-sub-title">Banner Image</h4>
                      <input class="form-control focus" type="file" name="menu_image1"  id="aboutimagebaner" >
                     <input type="hidden" name="image1" id="image1">
                     <div id="imagefill1"></div>
                                    
                     </div>


                     <div class="form-group col-sm-6">
                       <h4 class="demo-sub-title">Content Image</h4>
                      <input class="form-control focus" type="file" name="menu_image2"  id="aboutimagecntnt" >
                     <input type="hidden" name="image2" id="image2">
                     <div id="imagefill2"></div>
                                    
                     </div>


                    <input type="hidden" name="abtid" id="abtid">


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
          getsalesreport();

 // $('input[id$=fromdate]').datepicker({});

 // $('input[id$=todate]').datepicker({});

      });

      function getsalesreport(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_reports/getsalesreport');?>/",
                data: '', 
               success: function(data){
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable({
                  "order": [[ 0, "desc" ]],
                  dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [100, 250, 300, -1], [10, 25, 50, "All"] ]
 });           
              }
             });
      }

      function getdatewisereports()
      {
        var from = $('#fromdate').val();
        var to = $('#todate').val();

        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_reports/getsalesreport_datewise');?>/",
                data: {from:from,to:to}, 
               success: function(data){
                $('#tablefillextendcat').html(data);
                $('#tablefillcat').DataTable({
                  "order": [[ 0, "desc" ]],
                  dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [100, 250, 300, -1], [10, 25, 50, "All"] ]
 });           
              }
             });


      }

   
     
    
</script>
   
   