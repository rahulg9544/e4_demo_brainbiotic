<!DOCTYPE html>
<html lang="en-us">
  <head>
    <!-- Web config-->

    <!-- TABLE OF CONTENTS.
    Use search to find needed section.
    ===================================================================
    | 01. #CSS               | All CSS links and file paths           |
    | 02. #FAVICONS          | Favicon icon, app icons                |
    | 03. #BODY              | Body tag                               |
    | 04. #SIDEMENU          | Dashboard panel & left navigation      |
    | 05. #MAIN              | Dashboard right wrapper                |
    | 06. #VIEW              | Dashboard right wrapper inner wrapper  |
    | 07. #TOP               | Top header navigation                  |
    | 08. #TOP NAV           | Top header right navigation            |
    ===================================================================
    
    -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toot</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

     <link rel="icon" href="<?php echo base_url(); ?>/front_end_assets/images/favicon.ico" type="image/x-icon"/>
    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    
    

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url(); ?>/templateadmin/assets/stylesheets/demo.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick-theme.css"/>

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/modernizr-custom.js"></script>

    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/respond.js"></script>
    <!-- This page only-->

  
  </head>
<style type="text/css">
  /*map searchbox start*/
     #map {
        height: 100%;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
         width: auto !important;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        /*background-color: #4d90fe;*/
        font-size: 25px;
        font-weight: 500;
        /*padding: 6px 12px;*/
      }
      .pac-item {
    width: inherit !important;
}
/*map searchbox end*/
</style>

  <body class="f-green stellar minibar" >

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile">
              <div class="circle-box padding">
                <img src="<?php echo base_url(); ?>/templateadmin/assets/images/face/12.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b><!--<?php //echo strtoupper($_SESSION['admindisplay']);?>--></b><br>
               <!-- <?php if($_SESSION['adminusertp'] == "admin")
                {
                //  echo strtoupper($_SESSION['adminusertp']);
                }
                else
                {
                //  echo "VENDOR";
                }
                  ?>--></div></li>
        </ul>
        
        <ul class="nav">
          
        
               
     
        <li class="nav-item"><a class="nav-link"  href="<?php echo base_url();?>index.php/adminhome"><i class="icon ion-home"></i>
              <div class="menu-block-label">Home</div></a></li>
              
                 <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_products"><i class="icon ion-outlet"></i>
              <div class="menu-block-label">Product management</div></a></li>
              
               <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/admindelivery"><i class="icon ion-pizza"></i>
            <div class="menu-block-label">Order management</div></a></li>
          

           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_category"><i class="icon ion-network"></i>
              <div class="menu-block-label">Category management</div></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_subcategory"><i class="icon ion-merge"></i>
              <div class="menu-block-label">Subcategory</div></a></li>

            <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_division"><i class="icon ion-merge"></i>
            <div class="menu-block-label">Division</div></a></li>  


  <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_offers"><i class="icon ion-merge"></i>
            <div class="menu-block-label">Offers</div></a></li>  
            
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_brand" ><i class="icon ion-ribbon-a"></i>
              <div class="menu-block-label">Brand Management</div></a></li>
              
        
       

              <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_prod"><i class="icon ion-outlet"></i>-->
              <!--<div class="menu-block-label">Product Test</div></a></li>-->
          
              <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_deliverycharge"><i class="icon ion-bag"></i>-->
              <!--<div class="menu-block-label">Delivery Charge</div></a></li>-->
        


              <!--  <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_profile" ><i class="icon ion-ribbon-a"></i>-->
              <!--<div class="menu-block-label">Profile</div></a></li>-->

          


               <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Adminpromocode" ><i class="icon ion-star"></i>
              <div class="menu-block-label">Promo Code</div></a></li>


              <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_prodreview" ><i class="icon ion-star"></i>-->
              <!--<div class="menu-block-label">Reviews</div></a></li>-->
      
       
              <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_store"><i class="icon ion-bag"></i>-->
              <!--<div class="menu-block-label">Store Management</div></a></li>-->

             
               
          
           <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_banner"><i class="icon ion-map"></i>
              <div class="menu-block-label">Banner/Slider</div></a></li>
          <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_testimonials"><i class="icon ion-map"></i>-->
          <!--    <div class="menu-block-label">Testimonials</div></a></li>-->
               
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/user"><i class="icon ion-android-people"></i>
            <div class="menu-block-label">User management</div></a></li>
            
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_aboutus"><i class="icon ion-star"></i>
            <div class="menu-block-label">About page</div></a></li>
            
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_contactus"><i class="icon ion-star"></i>
            <div class="menu-block-label">Contact page</div></a></li>

            <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/Admin_termscond"><i class="icon ion-android-people"></i>-->
            <!--<div class="menu-block-label">T&C page</div></a></li> -->

         
          
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>

    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">
 
          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

           <a class="topbar-wrapper-logo demo-logo" href="<?php echo base_url();?>Adminhome">Toot</a>
          </div>
         
          <ul class="nav navbar-nav topbar-wrapper-nav">
        
<!-- new one start -->
<!--<li class="nav-item dropdown"><a class="nav-link" href="<?php //echo base_url('index.php/admindelivery');?>"  aria-haspopup="true" aria-expanded="true" title="ORDERS"><i class="icon ion-android-notifications-none"></i><span class="badge badge-danger status" id="countbadge"></span></a>
</li>-->
<!-- new one end -->
      
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>index.php/adminlogin/adminlogout" title="LOGOUT"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="#"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
          
          
        </div>
       <div id="preload">
            <ul class="loading">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
      
     
     <!-- loading content -->
        <?php $this->load->view($content);?>
        <!-- loading content -->
  
      
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/tether.min.js"></script>


    
    <!-- Theme js-->
    <!-- Concat all plugins js-->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/theme/theme-plugins.js"></script>
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/theme/main.js"></script>
    <!-- Below js just for this demo only-->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/demo/demo-skin.js"></script>
    

   
      <script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/bootstrap/js/migratecodejquery.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/templateadmin/assets/slickslider/slick/slick.min.js"></script>

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/plugins/notify.js"></script>

     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/plugins/jquery-labelauty.js"></script>


 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
 <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
 
 
      <!-- // for pdf end -->
    <script type="text/javascript">
      $( document ).ready(function() {
       
        // cuntbadge();
      });
      // function cuntbadge(){
      //   $.ajax({
      //        async: true,
      //       method: "POST",
      //       url: "<?php echo base_url('index.php/Adminhome/cuntbadge');?>/",
      //       data: '', // serializes the form's elements.
      //      success: function(data){
      //         document.getElementById("countbadge").innerHTML = data;
      //       }
      //    });
      // }
    	
    		function notifyresult($msg,$level){
          $('.notifyjs-corner').empty();
          return $.notify($msg, {
              position: 'top center',
              hideDuration: '5',
              showAnimation: 'fadeIn',
              hideAnimation: 'fadeOut',
              className: $level
            });
        }
        
   
    </script>
    
  </body>
  
</html>
