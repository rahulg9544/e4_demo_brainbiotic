

       <!-- Page Title/Header Start -->
    <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Checkout </h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
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
          
	<?php if(isset($_SESSION['cusername'])) { ?>
    
    <input type="hidden" name="useridset" id="useridset" value="<?php echo $_SESSION['userid']; ?>">

    <?php } else { ?>    
    
    <input type="hidden" name="useridset" id="useridset" value="0">

    <?php } ?>  		
			
        <div class="shopping_cart_area">
        <div class="container">  
		<div class="row">
            <div class="col-lg-8 col-md-8">
            
			<div class="accordion" id="faq-accordion">

<!-- creataccount -->
                        <?php if(isset($_SESSION['cusername'])) { ?>
                                <div class="card" style="display: none;">
                        
                        <?php } else {  ?>

                        	<div class="card active">

                        <?php } ?>		

                                    <div class="card-header">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#faq-accordion-1">CREATE YOUR ACCOUNT</button>
                                    </div>

                                    <div id="faq-accordion-1" class="collapse show" data-parent="#faq-accordion">
                                        <div class="card-body">
                          
                        <form id="creatacForm" method="POST">

											<div class="row">
							
							
											<!--<div class="col-lg-12 mb-20">
											
											
											<div class="panel-default mrmrs">
                                    <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Mr </label>
									
									 <input id="payment_defult2" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment_defult2" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Mrs </label>

                                    </div> 
                                </div>-->
								
								<div class="clear-fix"></div>
								
											<div class="col-lg-6 mb-20">
												<label>First Name <span>*</span></label>
												<input type="text" id="adrfname" name="adrfname" required="required">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Last Name  <span>*</span></label>
												<input type="text" id="adrlname" name="adrlname" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Email <span>*</span></label>
												<input type="email" id="adrmail" name="adrmail" required="required">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Street Name  <span>*</span></label>
												<input type="text" id="adrstreet" name="adrstreet" required="required"> 
											</div>
											
											<div class="col-12 learts-mb-20">
                        <label for="bdCountry">Area <abbr class="required">*</abbr></label>
                        <select id="bdCountry" class="select2-basic" id="adrarea" name="adrarea" required="required">
						 <option value="">---Select---</option>
                            



				<?php foreach($area as $row) { ?>		
				 
                            <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>

                <?php } ?>
                        </select>
                    </div>
											
											<div class="col-lg-6 mb-20">
												<label>Block <span>*</span></label>
												<input type="text" id="adrblock" name="adrblock" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Avenue / Building <span>*</span></label>
												<input type="text" id="adravenubuld" name="adravenubuld" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>House No/ Flat No <span>*</span></label>
												<input type="text" id="adrhousflat" name="adrhousflat" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Mobile Number <span>*</span></label>
												<input type="text" id="adrmobile" name="adrmobile" required="required"> 
											</div>
											
											
											
											<!-- <div class="col-lg-12">											
											<h4>Create an account for Later Use?</h4>											
											</div> -->
											
											
											<div class="col-lg-6 mb-20">
												<label>Password <span>*</span></label>
												<input type="text" id="adrpass" name="adrpass" required="required">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Confirm Password <span>*</span></label>
												<input type="text" id="adrcpass" name="adrcpass" required="required">
												<span id="cunpasspan" style="color: red"></span> 
											</div>
											
											
											
											
																		
																						
									</div>
									
									
									<div class="row ">
											<!-- <div class="col-lg-12 mt-20 mb-20">
											<input id="addressinvo" type="checkbox" data-target="createp_account" value="1"/  onclick="makereq();">
                                    <label for="address" data-toggle="collapse" data-target="#newaddress" aria-controls="collapseOne" aria-controls="newaddress">Please use another address for invoice</label>
											
								
                                </div> -->

                                <div class="col-lg-12 mt-20 mb-20">
											<input id="addressinvo" name="addressinvo" type="checkbox" value="1" data-toggle="collapse" data-target="#newaddress" data-target="createp_account" onclick="makereq();" />
                                    <!-- <label for="address" data-toggle="collapse" data-target="#newaddress" aria-controls="collapseOne" aria-controls="newaddress">Please use another address for invoice</label> -->
                                    <label for="addressinvo" >Please use another address for invoice</label>
											
								
                                </div>
								
								<div class="clear-fix"></div>
								<div class="col-lg-12 mb-20">
								 <div id="newaddress" class="collapse one" data-parent="#newaddress">
								<div class="row">
								
								
								<div class="clear-fix"></div>		
																						
					                        <div class="col-lg-6 mb-20">
												<label>First Name <span>*</span></label>
												<input type="text" id="invfname" name="invfname">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Last Name  <span>*</span></label>
												<input type="text" id="invlname" name="invlname"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Email <span>*</span></label>
												<input type="email" id="invmail" name="invmail">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Street Name  <span>*</span></label>
												<input type="text" id="invstreet" name="invstreet"> 
											</div>
											
					<div class="col-12 learts-mb-20">
                        <label for="bdCountry2">Area <abbr class="required">*</abbr></label>
                        <select id="bdCountry2" class="select2-basic" id="invarea" name="invarea">
						 <option value="">---Select---</option>
                            <?php foreach($area as $row) { ?>		
				 
                            <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>

                <?php } ?>
                        </select>
                    </div>
											
											<div class="col-lg-6 mb-20">
												<label>Block <span>*</span></label>
												<input type="text" id="invblock" name="invblock"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Avenue / Building <span>*</span></label>
												<input type="text" id="invavenuebld" name="invavenuebld"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>House No/ Flat No <span>*</span></label>
												<input type="text" id="invhousflat" name="invhousflat"> 
											</div>

											<div class="col-lg-6 mb-20">
												<label>Mobile Number <span>*</span></label>
												<input type="text" id="invmobile" name="invmobile" > 
											</div>
											
											
										</div>								
								</div>
								
								</div>
								<div class="col-lg-12 ">
											<button class="btn btn-dark btn-outline-hover-dark" type="submit">Save</button>
											</div>			

							</div>	
				</form>							
											
                                        </div>
                                    </div>
                                </div>

<!-- creataccount -->


<!-- deliveryaddress -->                               
					 <?php if(isset($_SESSION['cusername'])) { ?>	

                                <div class="card active">

                     <?php } else { ?>

                     	        <div class="card">

                     <?php } ?>	        	

                                    <div class="card-header">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faq-accordion-2">DELIVERY</button>
                                    </div>

                                    <div id="faq-accordion-2" class="collapse <?php if(isset($_SESSION['cusername'])) { ?> show <?php } ?>" data-parent="#faq-accordion">
                                        <div class="card-body" id="adrressfillcheckout">
                                            
											
										  <!-- <div class="row">

                                            <div class="col-lg-12 mb-20">
											<div class="address_box">
											<h5><input id="add1" name="check_method" type="radio"/> jineesh K  <a href="add-new-address.html" class="edit-link">edit</a></h5>
												<p>ghghg, vcvcvc, 562 kuwait city, United Kingdom, 01234567890<p>
											
											</div>
											</div>
											
											
											<div class="col-lg-12 mb-20">
											<div class="address_box">
											<h5><input id="add2" name="check_method" type="radio"/> jineesh K  <a href="add-new-address.html" class="edit-link">edit</a></h5>
												<p>ghghg, vcvcvc, 562 kuwait city, United Kingdom, 01234567890<p>
											</div>
											</div>
											 
											 <div class="col-lg-6 mb-20">
											 <button class="btn btn-dark btn-outline-hover-dark" type="submit">Proceed with your order</button>
											 </div>											 											 
							              </div> -->

							              <p>Please create account first</p>	
											
											
                                        </div>
                                    </div>
                                </div>
								

<!-- deliveryaddress -->

<!-- payment -->
								
								<div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#faq-accordion-3"> PAYMENTS</button>
                                    </div>

                                    <div id="faq-accordion-3" class="collapse" data-parent="#faq-accordion">
                                        <div class="card-body">
                       
					    <div class="panel-default">
								<div class="col-lg-12 mt-20  mb-10">
									<input id="cashondelivery" name="check_method" type="radio" />
                                    <label for="cashondelivery" >Cash on Delivery <img src="<?php echo base_url(); ?>Babies Moments English/images/cash.png" alt=""></label>
                                </div>
								
								<div class="col-lg-12 mt-20  mb-10">
									<input id="knet" name="check_method" type="radio" />
                                    <label for="knet" >KNET <img src="<?php echo base_url(); ?>Babies Moments English/images/knet.png" alt=""></label>
                                </div>
								
								<div class="col-lg-12 mt-20 mb-10">
									<input id="card" name="check_method" type="radio"/>
                                    <label for="card" >VISA/ MASTER Card  <img src="<?php echo base_url(); ?>Babies Moments English/images/card.png" alt=""></label>
                                </div>	
								
					    </div>	
						
						 <div class="col-lg-12 mt-20 mb-20">
						<input id="terms" type="checkbox"  />
                                    <label for="terms" > I accept the Terms of purchase and Privacy policy</label>
									
					    </div>
						
						 <div class="col-lg-6 mt-20">
						<button class="btn btn-dark btn-outline-hover-dark" type="submit">Finalize order</button>
						 </div>
						
                      </div>
                                    </div>
                                </div>

 <!-- payment -->                               
                                
                                
                            </div>			
			   
			   <div class="clearfix"></div>
			   
			</div>
			
			
			<div class="col-lg-4 col-md-4">
			
			<div  class=" offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="#" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-22.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="#" class="title">ClevaSleep® Pod Cover</a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-23.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="#" class="title">Bamboo Baby Washcloth</a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-24.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="#" class="title">Bamboo Baby Muslin Cloths</a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount">KD 0.00</span>
                </div>
				<div class="sub-total">
                    <strong>Delivery Charges :</strong>
                    <span class="amount">KD 0.00</span>
                </div>
				
				 <div class="sub-total">
                    <strong>Grand Total :</strong>
                    <span class="amount">KD 0.00</span>
                </div>
            </div>
        </div>
    </div>
			
			</div>
			
			
			
			
			
			
		</div>  	
        </div>     
    </div>
			<div class="clearfix"></div>
                
                        </div>
						<div class="clearfix"></div>
    
    <!-- Products Section Start -->
    
    <!-- Products Section End -->
    
    
     

    <!-- Product Section Start -->
    
    <!-- Product Section End -->

   
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	
	 $( document ).ready(function() {

          getaddresses();

      });

      function getaddresses()
      {
        var userid = $('#useridset').val();
       
        if(userid!=0)
        {
        	$.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/listadrresses_check');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#adrressfillcheckout').html(data);
                                         
              }
             });
        }

        
      } 


       $("#creatacForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);

        var passwrd= $('#adrpass').val();
        var cpasswrd= $('#adrcpass').val();

        if(passwrd!='')
        {
           if(passwrd==cpasswrd)
           {
               $('#cunpasspan').text("");

           	   $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/createaccount_checkout');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                alert(data);
               if($.trim(data) == "success"){
                  
                  window.location.href="";
                  
               }
               
               else{
                  notifyresult('System down.try later!','danger');
                  
               }

              // show response from the php script.            
              }
             });
           }
           else
           {
           	  $('#cunpasspan').text("Confirmation missmatch");
           }
        }
        
         
      });
  

function makereq()
    {
    	

    	 if($('#addressinvo').prop("checked") == true)
    	 {
                $('#invfname').prop('required',true);
                $('#invlname').prop('required',true);
                $('#invmail').prop('required',true);
                $('#invstreet').prop('required',true);
                $('#invarea').prop('required',true);
                $('#invblock').prop('required',true);
                $('#invavenuebld').prop('required',true);
                $('#invhousflat').prop('required',true);
                $('#invmobile').prop('required',true);
         }
         else
         {
                

                $('#invfname').prop('required',false);
                $('#invlname').prop('required',false);
                $('#invmail').prop('required',false);
                $('#invstreet').prop('required',false);
                $('#invarea').prop('required',false);
                $('#invblock').prop('required',false);
                $('#invavenuebld').prop('required',false);
                $('#invhousflat').prop('required',false);
                $('#invmobile').prop('required',false);
         }
    }


</script>
    
    
  