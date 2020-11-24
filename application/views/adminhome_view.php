 <!-- PAGE CONTENT HERE-->
 <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script> 

 <!-- <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/demo/bar-chart.js"></script> -->
  
  
  
    
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Dashboard<b></b></h4>
                  <div class="small text-muted"></div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <!--<div class="pull-xs-right">-->
              <!--  <div class="small text-muted m-b-1">Live Data</div><span data-plugin="peityBar" data-peity="{ &quot;fill&quot;: [&quot;#ccc&quot;], &quot;width&quot;: 50 }">0,3,6,5,2,3,7,3,5,2</span>-->
              <!--</div>-->
            </div>
          </div>
        </div>

        <div class="container-fluid" style="height: 100%;overflow-y: auto;">
          <div class="row panel-wrapper js-grid-wrapper" >
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="<?php echo base_url();?>index.php/Admin_products">
                <div class="widget widget-v bg-aqua">
                  <div class="w-main w-center bg-aqua-lighten"><i class="fa fa-product-hunt"></i></div>
                  <div class="w-section">
                    <div class="small">PRODUCTS</div>
                    <div class="display-6"><?php echo $countproducts;?></div>
                     <!-- <div class="small">APPROVED PRODUCTS</div>
                    <div class="display-6"><?php echo $countproductsapprove;?></div> -->
                    <!-- <div class="small">+ 102 %</div> -->
                  </div>
                </div></a></div>
           
                 <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="<?php echo base_url();?>index.php/admindelivery">
                <div class="widget widget-v bg-primary">
                  <div class="w-main w-center bg-primary-lighten"><i class="fa fa-newspaper-o"></i></div>
                  <div class="w-section">
                   
                     <div class="small">TOTAL SALES</div>
                    <div class="display-6"><?php echo $subtotalofsales;?></div>
                     <div class="small">MONTHLY SALES</div>
                    <div class="display-6"><?php echo $monthlytotalsales;?></div>
                    <!-- <div class="small"><?php echo $countorders;?></div> -->
                  </div>
                </div></a></div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="<?php echo base_url();?>index.php/admindelivery">
                <div class="widget widget-v bg-success">
                  <div class="w-main w-center bg-success-lighten"><i class="fa fa-shopping-cart"></i></div>
                  <div class="w-section">

                    <div class="small">ORDERS</div>
                    <div class="display-6"><?php echo $countorders;?></div>
                    <div class="small">DELIVERED</div>
                    <div class="display-6"><?php echo $countdelivered;?></div>
                    
                  </div>
                  
                </div></a></div>
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer"><a href="<?php echo base_url();?>index.php/admindelivery">
                <div class="widget widget-v bg-warning">
                  <div class="w-main w-center bg-warning-lighten"><i class="fa fa-calendar-check-o"></i></div>
                  <div class="w-section">
                   
                     <div class="small">MONTHLY ORDERS</div>
                    <div class="display-6"><?php echo $countmonthlyordered;?></div>
                     <div class="small">MONTHLY DELIVERED</div>
                    <div class="display-6"><?php echo $countmonthlydelivered;?></div>
                    <!-- <div class="small"><?php echo $countorders;?></div> -->
                  </div>
                </div></a></div>
<!--             <div class="col-xs-12 col-sm-6 col-md-3 js-grid" ><a href=" <?php echo base_url();?>index.php/adminproducts" >
                <div class="widget widget-v bg-primary">
                  <div class="w-main w-center bg-primary-lighten"><i class="fa fa fa-bullseye"></i></div>

                  <div class="w-section">
                   
                      <div class="small">TOTAL COMMISSION</div><div class="display-6"><?php echo $totalcommiss;?></div>
                      
                  </div>
                </div></a></div> -->
           
            <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer" ><a href=" <?php echo base_url();?>index.php/user" >
                <div class="widget widget-v bg-primary">
                  <div class="w-main w-center bg-primary-lighten"><i class="fa fa-user"></i></div>

                  <div class="w-section">
                    <!-- <div class="small">USERS</div> -->
                   
                      
                      <div class="small">USERS</div><div class="display-6"><?php echo $allusers ?></div>
                
                    <!-- <div class="small">- 2 %</div> -->
                  </div>
                </div></a></div>

              <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer" ><a href=" <?php echo base_url();?>index.php/Adminpromocode" >
                <div class="widget widget-v bg-aqua">
                  <div class="w-main w-center bg-aqua-lighten"><i class="fa fa-shopping-bag"></i></div>

                  <div class="w-section">
                    
                   
                      <div class="small">PROMO CODES</div><div class="display-6"><?php echo $countpromo;?></div>
                      
                  </div>
                </div></a></div>


              <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer" ><a href=" <?php echo base_url();?>index.php/Admin_brand" >
                <div class="widget widget-v bg-warning">
                  <div class="w-main w-center bg-warning-lighten"><i class="fa fa-puzzle-piece"></i></div>

                  <div class="w-section">
                 
                   
                      <div class="small">BRANDS</div><div class="display-6"><?php echo $countbrands;?></div>
                  </div>
                </div></a></div>

              <div class="col-xs-12 col-sm-6 col-md-3 js-grid js-sizer" ><a href=" <?php echo base_url();?>index.php/Admin_banner" >
                <div class="widget widget-v bg-primary">
                  <div class="w-main w-center bg-primary-lighten"><i class="fa fa-object-ungroup"></i></div>

                  <div class="w-section">
              
                   
                      <div class="small">BANNERS</div><div class="display-6"><?php echo $countbanslide;?></div>
                      
                  </div>
                </div></a></div>
            
        
                <!-- datepicker start -->

            <!-- next -->
             <!--<div class="col-xs-12 col-sm-12 col-md-12 js-grid js-sizer">-->
             <!-- <div class="panel ">-->
             <!--   <div class="panel-heading">-->
             <!--     <h6 class="panel-title">Store</h6>-->
             <!--   </div>-->
              <!-- new one start -->
              <!--<div class=" panel-body col-sm-8">-->
                <!-- <h4 class="demo-sub-title">Date Range</h4> -->
                      <!-- <div class="daterange-wrapper">
                        <input class="form-control" name = "start" type="text" data-plugin="daterangepicker">
                      </div> -->
                <!-- <div class="datepicker-wrapper open ">
                  <div class="input-daterange input-group " data-plugin="datepicker">
                    <input class="form-control datesort" id="startdates" type="text" name="start" placeholder="dd/mm/yyyy" autocomplete="off" ><span class="input-group-addon">to</span>
                    <input class="form-control datesort" id="enddates" type="text" name="end" placeholder="dd/mm/yyyy" autocomplete="off">
                  </div>
                </div> -->
                <!-- new date form start -->
              <!--  <div class="form-group col-sm-6">-->
              <!--  <h4 class="demo-sub-title">Month</h4>-->
              <!--  <select class="form-control c-select datesort" name="monthsselect" required="required" id="monthsselect" data-plugin="selectpicker">-->
                  
              <!--    <option value="1">January</option>-->
              <!--    <option value="2">February</option>-->
              <!--    <option value="3">March</option>-->
              <!--    <option value="4">April</option>-->
              <!--    <option value="5">May</option>-->
              <!--    <option value="6">June</option>-->
              <!--    <option value="7">July</option>-->
              <!--    <option value="8">August</option>-->
              <!--    <option value="9">September</option>-->
              <!--    <option value="10">October</option>-->
              <!--    <option value="11">November</option>-->
              <!--    <option value="12">December</option>-->
              <!--  </select>-->
              <!--</div>-->

              <!--<div class="form-group col-sm-6">-->
              <!--  <h4 class="demo-sub-title">Year</h4>-->
              <!--  <select class="form-control c-select datesort" name="yearselect" required="required" id="yearselect" data-plugin="selectpicker">-->
                  
              <!--    <?php for($i=2019;$i<2031;$i++){?>-->
              <!--      <option value="<?php echo $i ;?>"><?php echo $i;?></option>-->
              <!--    <?php }?>-->
              <!--  </select>-->
              <!--</div>-->
                <!-- new date from end -->
              <!--</div>-->
              <!-- new one wnd -->
            <!--  <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextendcomm" >-->
               
            <!--  </div>-->
            <!--  </div>-->
            <!--</div>-->
                <!-- date picer end -->
               
             
        <div class="col-xs-12 col-sm-12 col-md-12 js-grid js-sizer" style="display: none;">
          <div class="panel" id="displaytable">
            <div class="panel" >
              <div class="panel-heading">
                <h6 class="panel-title">Delivered Products</h6>
              </div>
              <!-- new one start -->
             <!--  <div class=" panel-body col-sm-8">
                                    <h4 class="demo-sub-title">Date Range</h4>
                      <div class="datepicker-wrapper open">
                        <div class="input-daterange input-group" data-plugin="datepicker">
                          <input class="form-control" type="text" name="start" placeholder="dd/mm/yyyy"><span class="input-group-addon">to</span>
                          <input class="form-control" type="text" name="end" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                    </div> -->
              <!-- new one wnd -->
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextend" >
               
              </div>
            </div>
          </div>
        </div>
              <!-- new one end -->
          </div>
        </div>

        <!-- END PAGE CONTENT-->
        </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER -->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-success" id="modalcaption"></div>
              <div class="modal-body table-responsive" style="overflow-x:auto;" id="tablefillextendmodal" >

              </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
</div>
<div class="modal fade-scale" id="trackermodal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-success" id="modalcaption">PAY</div>

            <div class="modal-body">
            <form method="POST"  action="" id="paidform" enctype="multipart/form-data" accept-charset="utf-8">
              <div class="form-group col-sm-6">
                <h4 class="demo-sub-title">Month</h4>
                <select class="form-control c-select" name="monthsselectmodal" required="required" id="monthsselectmodal" data-plugin="selectpicker">
                  <!-- <option value="">Select</option> -->
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>

              <div class="form-group col-sm-6">
                <h4 class="demo-sub-title">Year</h4>
                <select class="form-control c-select" name="yearselectmodal" required="required" id="yearselectmodal" data-plugin="selectpicker">
                  <!-- <option value="">Select</option> -->
                  <?php for($i=2019;$i<2031;$i++){?>
                    <option value="<?php echo $i ;?>"><?php echo $i;?></option>
                  <?php }?>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <h4 class="demo-sub-title">Store</h4>
                <select class="form-control c-select" name="storeselectmodal" required="required" id="storeselectmodal" data-plugin="selectpicker">
                  <!-- <option value="">Select</option> -->
                  <?php foreach($allstores as $stores){?>
                    <option value="<?php echo $stores->store_id."-".$stores->store_name;?>"><?php echo $stores->store_name;?></option>
                  <?php } ?>
                  
                </select>
              </div>
                
                <div class="form-group  col-sm-6">
                  <h4 class="demo-sub-title">Balance</h4>
                      <input class="form-control" type="text" id="bal" name="bal" readonly="readonly">    
                </div>
                <div class="form-group  col-sm-6">
                  <h4 class="demo-sub-title">Paid Amount</h4>
                      <input class="form-control" type="text" id="pamnt" name="pamnt" readonly="readonly">    
                </div>
                <div class="form-group  col-sm-6">
                  <h4 class="demo-sub-title">Amount to pay</h4>
                      <input class="form-control" type="text" id="amountpaid" name="amountpaid" required="required">    
                </div>
              </div>   
              <div class="modal-body table-responsive" style="overflow-x:auto;" id="tablefillextendmodal2" >

              </div>
          <div class="modal-footer">
            <button class="btn btn-success"  type="submit" name="save">Pay</button>
           <!--  <button type="submit" class="form-control tn btn-success btn-lg" name="save" value="save">Save</button> -->
          </form>
            <button class="btn btn-success" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
</div>
       <script>
        $(document).ready(function () {
            // showGraph();
            var d = new Date();
            var n = d.getMonth();
            $('#monthsselect').val(n+1);
            var dy = new Date();
            var ny = d.getFullYear();
            $('#yearselect').val(ny);
            getdeliveryforhome();
            // $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        <?php if($_SESSION['adminusertp'] != 'admin'){ ?>
          storescalagent();
        $('.datesort').on('change', function() {
             storescalagent();

        });
      <?php }?>
      <?php if($_SESSION['adminusertp'] == 'admin'){ ?>
        storescaladmin();
        $('.datesort').on('change', function() {
             storescaladmin();

        });
      <?php }?>
      
    

        });

     
              function storescalagent(){

          var sdate = $('#monthsselect').val();
          var edate = $('#yearselect').val();
          storid = '';
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminhome/getstorescal');?>/",
                data: {stid:storid,startdates:sdate,enddates:edate},
               success: function(data){
                $('#tablefillextendcomm').html(data);
                $('#tablefillcomm').DataTable();
                           
              }
             });
      }
        function storescaladmin(){

          var sdate = $('#monthsselect').val();
          var edate = $('#yearselect').val();
          var storid = '';
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminhome/getstorescal');?>/",
                data: {stid:storid,startdates:sdate,enddates:edate},
               success: function(data){
                $('#tablefillextendcomm').html(data);
                
             
        //
    //         $('#tablefillcomm2').dataTable( {
    //     buttons: [
    //     'copy', 'excel', 'pdf'
    // ]
        
    //     } );

            var table = $('#tablefillcomm2').DataTable();

// $('#tablefillcomm2').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
// new $.fn.dataTable.Buttons( table, {
//     buttons: [
//         'excel', 'pdf'
//     ]
// } );

 new $.fn.dataTable.Buttons( table, {
     buttons: [
            { 
                extend: 'excel',
                className: 'btn-success' ,
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
              className: 'btn-success',
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }
        ]
} );
//   new $.fn.dataTable.Buttons( table, {
//     buttons: [
//         {
//             extend: 'colvis',
//             columns: ':gt(1)'
//         }
//     ]
// } );
table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
           
              }
             });
      }


       //  $(function() {
       //        $('#startdates').datepicker({ format: 'dd/mm/yyyy' }).val();
       // });

       // var storid;
        function storescal(stid){

          var sdate = $('#startdates').val();
          var edate = $('#enddates').val();
          
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminhome/getstorescal');?>/",
                data: {stid:stid,startdates:sdate,enddates:edate}, 
               success: function(data){
          
                $('#tablefillextendcomm').html(data);
                $('#tablefillcomm').DataTable();
                           
              }
             });
      }
      function getdeliveryforhome(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/adminhome/getdeliveryforhome');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefillcat').DataTable();
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
function viewdelivery(id,dat,tim){
        $('#modalcaption').text("View Delivery");

        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/admindelivery/modalviewdelivery');?>/",
              data: {id:id,dat:dat,tim:tim}, // serializes the form's elements.
             success: function(data){
                $('#tablefillextendmodal').html(data);
                // $('#tablefillmodal').DataTable();
            }
        });
      }
      function invoice(id,dat,tim){
         // var result = confirm("Are you want to change status?");
         //  if (result) {
    
            
             window.open("<?php echo base_url();?>index.php/admindelivery/prints?ci="+ id +"&d="+ dat + "&t="+ tim ,"_blank");
              
              
            
      // }
      }
      $("#paidform").submit(function(e) {
    
         e.preventDefault();


         var form = $(this);

         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/admin_store/insert_paid');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
           
               if(data == "success"){
               
                  notifyresult('Data Saved','success');
                  // $('#trackermodal').modal('hide');
                  // $('#addeditform').hide();
                  $('#trackermodal2').modal('hide');
                  storescaladmin(); 
                  // $( "#displaytable" ).fadeIn( "slow", function() {
                  // });
                  //  getproduct();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal2').modal('hide');
               }

              // show response from the php script.            
              }
             });
      });
      function paymodal(mnth,yr,strnm,bal,pamnt){
        // $('#monthsselect').val(mnth);
        $('#bal').val(bal);
        $('#pamnt').val(pamnt);
        
        $('#amountpaid').val('');
        $('#monthsselectmodal').selectpicker('val', mnth);
        $('#yearselectmodal').selectpicker('val', yr);
        $('#storeselectmodal').selectpicker('val', strnm);
            $('#trackermodal2').modal('show');
      }
//         
//           function showGraph()
//         {  {
//                 $.post("<?php echo base_url('index.php/adminhome/getdeliveryall');?>/",
//                 function (data)
//                 {
//                     console.log(data);
//                     alert(data);
//                      var name = [];
//                     var marks = [];

//                     for (var i in data) {
//                         name.push(data[i].dc_date);
//                         marks.push(data[i].dc_time);
//                     }
//                     alert(data.dc_date);

                    
//                     var barChartData = {
//   labels:name
//                         ,
//   datasets: [{
//     fillColor: "rgba(0,60,100,1)",
//     strokeColor: "black",
//     data: marks
//   }]
// }


                    
//                     var ctx = 
// document.getElementById("demo-bar-chart").getContext("2d");
// var barChartDemo = new Chart(ctx).Bar(barChartData, {
//   responsive: true,
//   barValueSpacing: 1
// });

                    
//                 });
//             }
//         }
        </script>