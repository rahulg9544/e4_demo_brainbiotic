<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminHero</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/font-awesome.css">

    <!-- Theme-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/skin.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/demo.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/html5shiv.js"></script>
    <script src="assets/scripts/respond.js"></script><![endif]-->
    <!-- <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/modernizr-custom.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/respond.js"></script> -->
<div id="preloads" style="display: none;">
            <ul class="loading">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
    <body class="f-dark login login-side" style=" background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/652/confectionary.png); overflow-y: auto;"  >
    
    	
    	<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
      <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/plugins/notify.js"></script>
    <script type="text/javascript">
    	// $('.js-top-center').on('click', function() {
    		function notifyresult($msg,$level){
    			return $.notify($msg, {
		          position: 'top center',
		          hideDuration: '5',
		          showAnimation: 'fadeIn',
		          hideAnimation: 'fadeOut',
		          className: $level
		        });
    		}
        
        
  

        // });
   
    </script>


      
                         <!--  <form class="login-form" method="POST"  id="adminsignup"  style="display: none;"> -->
                                <!-- <div class="row m-b-2"> -->

                     <form class="login-form" id="adminsignup" method="POST" autocomplete="off"   >
   
        <div class="p-a-3 text-xs-center"><a class="demo-logo" href="<?php echo base_url();?>">Online Shop Signup</a></div>
        
    <!--     <div class="row m-b-3">
          <div class="col-xs-6">
            <button class="btn btn-social m-b-2 btn-block btn-facebook" type="button"><i class="fa icon fa-facebook"></i>facebook</button>
          </div>
          <div class="col-xs-6">
            <button class="btn btn-social m-b-2 btn-block btn-twitter" type="button"><i class="fa icon fa-twitter"></i>twitter</button>
          </div>
        </div> -->
        <!-- <div class="row"> -->
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Full Name</h4>
                      <input class="form-control " type="text" required="required" name="userfullname" id="userfullname">
                    </div>
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title emailcheckexistlabel">User Name</h4>
                      <input class="form-control emailcheckexist" type="email" placeholder="emailid" required="required" name="usernamesignup" id="usernamesignup">
                    </div>
                    
                  <!-- </div> -->
                  <!-- <div class="row "> -->
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Password</h4>
                      <input class="form-control" type="text" required="required" name="userpassword" id="userpassword">
                    </div>
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Address</h4>
                      <textarea class="form-control" rows="2" name="useraddress" required="required" id="useraddress"></textarea>
                    </div>
                    
                    <input type="hidden" id = 'userid' name="userid"/>
                     <input type="hidden" id = 'userstatus' name="userstatus" value="0" />
                  <!-- </div> -->
                <!-- <div class="row"> -->
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">City</h4>
                      <input class="form-control" name="usercity" type="text" required="required" id="usercity">
                    </div>
                    <div class="form-group col-sm-12">
                      <h4 class="demo-sub-title">Pincode</h4>
                      <input class="form-control" name="userpincode" type="text" required="required" id="userpincode">
                    </div>
                    
                  <!-- </div> -->
                <!-- <div class="row"> -->
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Phone</h4>
                      <input class="form-control" name="userphone" type="text" required="required" id="userphone">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Level</h4>
                      <select class="form-control c-select" name="userlevel" required="required" id="userlevel" data-plugin="selectpicker">
                        <!-- <option value="">select</option>
                        <option value="admin" data-subtext="(High priority)">Admin</option> -->
                        <option value="agent">Agent</option>
                       <!--  <option value="dealer">Dealer</option> -->

                      </select>
                    <!-- </div> -->
                 <!-- <input type="file" multiple = "multiple" name="image_file[]" id="image_file"  /> -->
                     
                     
                 
                  </div>

        <!-- <div class="form-group">
          <div class="checkbox">
            <input id="formBasicRemember" type="checkbox" name="inputCheckbox" checked="" autocomplete="off">
            <label for="formBasicRemember">Remember Me</label>
          </div>
        </div> -->
        <!-- <div class="form-group row">
          <div class="col-md-4 pull-xs-right">
            <button class="btn btn-primary btn-block" type="button">Sign Up</button>
          </div>
        </div> -->
        <div class=" row">
          <div class="col-md-4 pull-xs-left">
            <i class="btn btn-success btn-block" id="signupgologin">Login</i>
          </div>
          <div class="col-md-4 pull-xs-right">
            <button class="btn btn-success btn-block" type="submit">Signup</button>
          </div>
        </div>

                
      </form>

    </body>
  </head>
</html>
<script type="text/javascript">

      
        $("#signupgologin").click(function(){
        $("#preloads").show();
        	
        	window.location.replace('<?php echo base_url();?>index.php/adminlogin');
          
        });
              $("#adminsignup").submit(function(e) {
         e.preventDefault(); 
         var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/user/insertuser');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false, 
               success: function(data){
               if(data == "success"){
                    // $('#adminsignup').hide();
                    // $('#adminlogin').show();

                     $('#userfullname').val('');
                      $('#usernamesignup').val('');
                      $('#userpassword').val('');
                      $('#useraddress').val('');
                      $('#userphone').val('');
                      // $('#userlevel').selectpicker('val', '');
                      $('#userid').val('');
                      $('#usercity').val('');
                      $('#userpincode').val('');
                  // notifyresult('new user created','success');
                  window.location.replace('<?php echo base_url();?>index.php/adminlogin');
                  // $( "#displaytable" ).fadeIn( "slow", function() {
                  // });
               }else{
                  notifyresult('Invalid Login','danger');
               }

              // show response from the php script.            
              }
             });
      });
//               $('body').on('input','.emailcheckupd',function(e){
//      var emailvalue = this.value;
//     $.ajax({
//         method: "POST",
//            url: "<?php echo base_url();?>index.php/user/emailcheckexistupd",
//            data:{emailvalue:emailvalue,userid:$('#userid').val()},
//            success: function(resp){
           
//             if(resp == 'success'){
//               $(':input[type="submit"]').prop('disabled', true);
//               jQuery('.emaillabelcheckupd').css('color', 'red');
//               jQuery('.emailcheckexistupd').css('color', 'red');
//             }else{
//               $(':input[type="submit"]').prop('disabled', false);
//                jQuery('.emaillabelcheckupd').css('color', 'black');
//                jQuery('.emailcheckexistupd').css('color', 'black');
//             }
 
//            }
//          });

    
// });
      $('body').on('input','.emailcheckexist',function(e){
     var emailvalue = this.value;
    $.ajax({
        method: "POST",
           url: "<?php echo base_url();?>index.php/user/emailcheckexist",
           data:{emailvalue:emailvalue},
           success: function(resp){
           
            if(resp == 'success'){
              $(':input[type="submit"]').prop('disabled', true);
              jQuery('.emailcheckexist').css('color', 'red');
              jQuery('.emailcheckexistlabel').css('color', 'red');
            }else{
              $(':input[type="submit"]').prop('disabled', false);
               jQuery('.emailcheckexist').css('color', 'black');
               jQuery('.emailcheckexistlabel').css('color', 'black');
            }
 
           }
         });

    
});
</script>