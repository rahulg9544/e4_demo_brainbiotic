<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E4Techno Solutions Admin</title>
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
    <script src="<?php echo base_url(); ?>/scripts/modernizr-custom.js"></script>
    <script src="<?php echo base_url(); ?>/scripts/respond.js"></script>

    <body class="cadetblue login login-transparent">
      <div class="col-md-12" style="text-align: center; color: white;margin-top: 50px; margin-bottom: 20px" >
        <h1>E4Technosolutions.com</h1>
        <h4>Admin</h4>

      </div>
      <form class="login-form widget" id="userlogin" autocomplete="off" action="<?php echo base_url(); ?>index.php/Admin_login/" method="POST">
        <div class="w-section"><a class="demo-logo white m-b-2" href="index.html"> Login Page</a>
          <p class="small"></p>
        </div>
        <div class="w-section">
          <div class="form-group">
            <label class="sr-only" for="formBasicEmail">Username</label>
            <input class="form-control form-control-border-b" id="formBasicEmail" type="text" name="uname" placeholder="Username" autocomplete="off" required="required">
          </div>
          <div class="form-group">
            <label class="sr-only" for="formBasicPassword">Password</label>
            <input class="form-control form-control-border-b" id="formBasicPassword" type="password" name="pass" placeholder="Password" autocomplete="off" required="required">
          </div>
          <div class="form-group text-xs-right">
            <input class="btn btn-success" type="submit" value="Login"></button>
            <!--<div class="form-group text-xs-right"><a class="text-white small" href="#"><i class="ion-arrow-right-c m-x-1"></i></a></div>-->
          </div>
        </div>
      </form>
    </body>
  </head>
</html>