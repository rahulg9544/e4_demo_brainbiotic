<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TooT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="<?php echo base_url(); ?>/front_end_assets/images/favicon.ico" type="image/x-icon"/>


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/font-awesome.css">

    <!-- Theme-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/skin.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/demo.css">

    
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
        
        
    </script>
      <form class="login-form" id="adminlogin" autocomplete="off" method="post" action="<?php echo base_url(); ?>index.php/Admin_login/">
        <div class="p-a-3 text-xs-center"><a class="demo-logo" href="<?php echo base_url();?>">
        <img src="<?php echo base_url(); ?>img/logo/logo.png">  
        Dashboard</a></div>
        <div class="form-group">
          <label class="sr-only" for="formBasicEmail">Email Address</label>
          <input class="form-control" id="formBasicEmail" type="text" name="uname" placeholder="Email Address" autocomplete="off" required="required">
        </div>
        <div class="form-group">
          <label class="sr-only" for="formBasicPassword">Password</label>
          <input class="form-control" id="formBasicPassword" type="password" name="pass" placeholder="Password" autocomplete="off" required="required">
        </div>

        <div class="form-group row">
          <div class="col-md-4 pull-xs-left">
            <i class="btn btn-success btn-block" style="display: none;" id="signupgonew">New User</i>
          </div>
          <div class="col-md-4 pull-xs-right">
            <button class="btn btn-success btn-block" type="submit">Login</button>
          </div>
        </div>
      </form>

      
    </body>
  </head>
</html>