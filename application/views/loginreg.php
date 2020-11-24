

       <!-- Page Title/Header Start -->
    <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Login </h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Login</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Category Banner Section Start -->
    
    <!-- Category Banner Section End -->
    
    <div class="section learts-mt-70">
          
			
			
        <div class="shopping_cart_area">
        <div class="container">  
            
               
                 <!--coupon code area start-->
                <div class="row no-gutters">
                <div class="col-lg-6">
                <form id="loginForm" method="POST"> 
                    <div class="user-login-register bg-gray-light">
                        <div class="login-register-title">
                            <h2 class="title">Login</h2>
                            <p class="desc">Great to have you back!</p>
                        </div>
                        <div class="login-register-form">
                                <div class="row learts-mb-n50">
                                    <div class="col-12 learts-mb-50">
                                        <input type="email" id="username" <?php if(isset($_COOKIE['remcusername'])) { ?> value="<?php echo $_COOKIE['remcusername'] ?>" <?php } ?> name="username" placeholder="Username or email address">
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <input type="password" <?php if(isset($_COOKIE['remcpassword'])) { ?> value="<?php echo $_COOKIE['remcpassword'] ?>" <?php } ?> id="userpass" name="userpass" placeholder="Password"></div>
                                    
                                    <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" value="1" id="rememberMe" name="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                                </div>

                                    <div class="col-12 text-center learts-mb-50">
                                        <button class="btn btn-dark btn-outline-hover-dark">login</button>
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <div class="row learts-mb-n20">
                                            <div class="col-12 learts-mb-20">
                                                <!-- <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                                </div> -->
                                            </div>
                                            <div class="col-12 learts-mb-20">
                                                <a href="<?php echo base_url(); ?>Forgotpassword" class="fw-400">Lost your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
              
              </form>

                </div>



                <div class="col-lg-6">

             <form id="regForm" method="POST">                   
                    <div class="user-login-register">
                        <div class="login-register-title">
                            <h2 class="title">Register</h2>
                            <p class="desc">If you don’t have an account, register now!</p>
                        </div>
                        <div class="login-register-form">
                                <div class="row learts-mb-n50">
								
									<div class="col-12 learts-mb-30">
                                        <input type="txt" placeholder="Your Name" id="regname" name="regname">
                                    </div>
									
                                    <div class="col-12 learts-mb-30">
                                        <input type="email" id="registerEmail" placeholder="Email address" id="regmail" name="regmail">
                                    </div>									
									
                                    <div class="col-12 learts-mb-30">
                                        <input type="number" placeholder="Mobile Number" id="regmob" name="regmob">
                                    </div>
										
                                    <div class="col-12 learts-mb-50">
                                        <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                    </div>
                                    <div class="col-12 text-center learts-mb-50">
                                        <button type="submit" class="btn btn-dark btn-outline-hover-dark">Register</button>
                                    </div>
                                </div>
                        </div>
                    </div>

             </form>

                </div>
            </div>
                <!--coupon code area end-->
             
        </div>     
    </div>
			
                
                        </div>
						<div class="clearfix"></div>
    
  

<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/plugins/notify.js"></script>

<script type="text/javascript">
    
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

<script type="text/javascript">
    

 $("#regForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/userreg');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                alert(data);
               if($.trim(data) == "success"){
                  notifyresult('Registration Successfull','success');
                  
                  
               }
               else if($.trim(data)=='exist')
               {
                  notifyresult('Maild id or Phone number already exist!','danger');
                  
                  
               }
               else{
                  notifyresult('System down.try later!','danger');
                 
                  
               }

              // show response from the php script.            
              }
             });
      });


 $("#loginForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/logincheck_user');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                alert(data);
               if($.trim(data) == "success"){
                  window.location.href="<?php echo base_url(); ?>Home";
                  
               }
               else if($.trim(data)=='nouser')
               {
                  notifyresult('User not exist!','danger');
                  
                  
               }
               else{
                  notifyresult('System down.try later!','danger');
                  
               }

              // show response from the php script.            
              }
             });
      });


</script>  


   
   

    