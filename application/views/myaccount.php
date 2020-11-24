
       <!-- Page Title/Header Start -->
    <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">My Account </h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
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
            <form action="#"> 
               
                 <!--coupon code area start-->
					<div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12 learts-mb-30">
                    <div class="myaccount-tab-list nav">
                        <a href="#dashboad" class="active" data-toggle="tab">Dashboard <i class="far fa-home"></i></a>
                        <a href="#orders" data-toggle="tab">Orders <i class="far fa-file-alt"></i></a>
                        <a href="#whish" data-toggle="tab">Whishlist <i class="far fa-heart"></i></a>
						<a href="#reserved" data-toggle="tab">My Reserved products <i class="far fa-bell"></i></a>
                        <a href="#address" data-toggle="tab">Address <i class="far fa-map-marker-alt"></i></a>
                        <a href="#account-info" data-toggle="tab">Account Details <i class="far fa-user"></i></a>

                        <a href="<?php echo base_url(); ?>BabiesController/logoutuser">Logout <i class="far fa-sign-out-alt"></i></a>
                    </div>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12 learts-mb-30">
                    <div class="tab-content">

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad">
                                <p>Hello <strong><?php if(isset($_SESSION['userdisplay'])) {  echo $_SESSION['userdisplay'];  } ?></strong> (not <strong><?php if(isset($_SESSION['userdisplay'])) {  echo $_SESSION['userdisplay'];  } ?></strong> ? <a href="<?php echo base_url(); ?>BabiesController/logoutuser">Log out</a>)</p>
                                <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders">
                            <div class="myaccount-content order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Pending</td>
                                                <td>KD 3000</td>
                                                <td><a href="<?php echo base_url(); ?>BabiesController/Order_details">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>July 22, 2018</td>
                                                <td>Approved</td>
                                                <td>KD 200</td>
                                                <td><a href="<?php echo base_url(); ?>BabiesController/Order_details">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>June 12, 2017</td>
                                                <td>On Hold</td>
                                                <td>KD 990</td>
                                                <td><a href="<?php echo base_url(); ?>BabiesController/Order_details">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="whish">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                     <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Product</th>
                            <th class="price">Unit Price</th>
                            <th class="add-to-cart">&nbsp;</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/DrainStopper.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">Drain Stopper</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/Squeezetoys.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">Squeeze toys</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/CloudDropletBathToys.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">Cloud & Droplet Bath Toys</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                    </tbody>
                </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
						
						<!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="reserved">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                     <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Product</th>
                            <th class="price">Unit Price</th>
                            <th class="add-to-cart">&nbsp;</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-5.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">SWADDLE BLANKET</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark disabled"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-3.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">BABY WASH & SHAMPOO 100ML</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="cart.html" class="btn btn-light btn-hover-dark"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                        <tr>
                            <td class="thumbnail"><a href="nursery-bed-moment-details.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-7.jpg"></a></td>
                            <td class="name"> <a href="nursery-bed-moment-details.html">Baby travel containers stackable</a></td>
                            <td class="price"><span>KD 00.00</span></td>
                            <td class="add-to-cart"><a href="#" class="btn btn-light btn-hover-dark disabled"><i class="fal fa-shopping-cart mr-2"></i>Add to Cart</a></td>
                            <td class="remove"><a href="#" class="btn">×</a></td>
                        </tr>
                    </tbody>
                </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address">
                            <div class="myaccount-content address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row learts-mb-n30">
								
								<div class="col-auto learts-mb-20"><a href="<?php echo base_url(); ?>Add-address" class="btn btn-md btn-dark btn-outline-hover-dark"><i class="fa fa-plus"></i> Add New Address</a></div>
								
                                <div id="tablefillextend">

                                           <!-- <div class="col-lg-12 mb-20">
											
											<div class="address_box">
											<h5><input id="add1" name="check_method" type="radio"/> jineesh K  
                                                <a href="add-new-address.html" class="edit-link">edit</a></h5>
												<p>ghghg, vcvcvc, 562 kuwait city, United Kingdom, 01234567890<p>
											
											</div>
											</div> -->

                                 </div>             
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
						
						

                       

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                    <form id="personalinfoForm" method="POST">
                                        <div class="row learts-mb-n30">
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="first-name">First Name <abbr class="required">*</abbr></label>
                                                    <input type="text" id="first-name" name="first-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="last-name">Last Name <abbr class="required">*</abbr></label>
                                                    <input type="text" id="last-name" name="last-name">
                                                </div>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="display-name">Display Name <abbr class="required">*</abbr></label>
                                                <input type="text" id="display-name" name="display-name">
                                                <p>This will be how your name will be displayed in the account section and in reviews</p>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="email">Email Addres <abbr class="required">*</abbr></label>
                                                <input type="email" id="email-adress" name="email-adress">
                                            </div>
                                            <div class="col-12 learts-mb-30 learts-mt-30">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="row learts-mb-n30">
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="current-pwd">Current password </label>
                                                            <input type="password" id="current-pwd" name="current-pwd">
                                                            <span id="curpasspan" style="color: red"></span>
                                                        </div>
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="new-pwd">New password </label>
                                                            <input type="password" id="new-pwd" name="new-pwd">
                                                        </div>
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="confirm-pwd">Confirm new password</label>
                                                            <input type="password" id="confirm-pwd" name="confirm-pwd">
                                                            <span id="confpasspan" style="color: red"></span>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <b onclick="submitcheck();" class="btn btn-dark btn-outline-hover-dark">Save Changes</b>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->
            </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
			
                
                        </div>
						<div class="clearfix"></div>
    
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
    
      $( document ).ready(function() {

          getaddresses();
          getpersonalinf();

      });

      function getaddresses()
      {
        
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/listadrresses');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                                         
              }
             });
      }

      function getpersonalinf()
      {
        
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/getpersonalinfo');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                
                var res = JSON.parse(data);
                
                $('#email-adress').val(res.user_mail);
                $('#first-name').val(res.user_fname);
                $('#last-name').val(res.user_lname);
                $('#display-name').val(res.user_displayname);
                                         
              }
             });
      }

      function deleteadrs(adrid)
      {
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/deleteaddress');?>/",
                data: {adrid:adrid}, // serializes the form's elements.
               success: function(data){
                // console.log(data);
                getaddresses();
                                         
              }
             });
      }

      
      function submitcheck()
      {
            if($('#new-pwd').val()!='')
            {   
                 if($('#current-pwd').val()=='')
                 {
                      $('#curpasspan').text('Please enter current password');
                 } 
                 else
                 {

                    var curpass = $('#current-pwd').val();

                     $.ajax({
                            method: "POST",
                            url: "<?php echo base_url('index.php/BabiesController/checkcurpass');?>/",
                            data: {curpass:curpass}, // serializes the form's elements.
                           success: function(data){
                            // alert(data);
                            if(data=="success")
                            {
                               $('#curpasspan').text('');

                                if($('#new-pwd').val() != $('#confirm-pwd').val())
                                  {
                                    $('#confpasspan').text('Confirm password is missmatching!');
                                  }
                                  else
                                  {
                                    $('#confpasspan').text('');

                                    pers_formsubmit();

                                  }
                            }
                            else
                            {
                               $('#curpasspan').text('Password Incorrect!');
                            }
                                                     
                          }
                         });
                    

                    
                 }
              
           }
           else
           {
            
              pers_formsubmit();
           }
      }


      function pers_formsubmit()
      {
                var mailid = $('#email-adress').val();
                var fname = $('#first-name').val();
                var lname = $('#last-name').val();
                var disname = $('#display-name').val();
                var curpass = $('#current-pwd').val();
                var newpas = $('#new-pwd').val();

                
                $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/updatePersonalinfo');?>/",
                data: {mailid:mailid,fname:fname,lname:lname,disname:disname,curpass:curpass,newpas:newpas}, // serializes the form's elements.
               success: function(data){
                
                alert(data);
                getpersonalinf();
                                         
              }
             });
      }

</script>

    
