      <!-- Page Title/Header Start -->
    <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Edit Address </h1>
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
 
 <?php if(!empty($adrs)) { ?>

    <div class="section learts-mt-70">
          
			
			
        <div class="shopping_cart_area">
        <div class="container">  
            <form id="adaddressForm" method="POST"> 
               
                 <!--coupon code area start-->
					<div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
				 <div class="col-lg-2 col-12 "></div>
                <div class="col-lg-8 col-12 learts-mb-30 card-body add-new-address">
                    <div class="row">
							
					<input type="hidden" name="adrsid" id="adrsid" value="<?php echo $adrs->addressprofile_id ?>">			
								<div class="clear-fix"></div>
								
											<div class="col-lg-6 mb-20">
												<label>First Name <span>*</span></label>
												<input type="text" id="adrfname" name="adrfname" value="<?php echo $adrs->addressprofile_fname ?>" required="required">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Last Name  <span>*</span></label>
												<input type="text" id="adrlname" name="adrlname" value="<?php echo $adrs->addressprofile_lname ?>" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Email <span>*</span></label>
												<input type="email" id="adrmail" name="adrmail" value="<?php echo $adrs->addressprofile_mail ?>" required="required">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Street Name  <span>*</span></label>
												<input type="text" id="adrstreet" name="adrstreet" value="<?php echo $adrs->addressprofile_street ?>" required="required"> 
											</div>
											
											<div class="col-12 learts-mb-20">
                        <label for="bdCountry">Area <abbr class="required">*</abbr></label>
                        <select id="bdCountry" class="select2-basic" id="adrarea" name="adrarea" required="required">
						

                
                <!-- <option value="<?php echo $adrs->city_id ?>" selected><?php echo $adrs->city_name ?></option> -->

				<?php foreach($area as $row) { 

                   if($adrs->addressprofile_city!=$row->city_id)
                   {

					?>		
				 

                            <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>

                <?php  }

                else { ?>

                           <option value="<?php echo $row->city_id ?>" selected><?php echo $row->city_name ?></option>

                <?php } } ?>
                        </select>
                    </div>
											
											<div class="col-lg-6 mb-20">
												<label>Block <span>*</span></label>
												<input type="text" id="adrblock" name="adrblock" value="<?php echo $adrs->addressprofile_block ?>" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Avenue / Building <span>*</span></label>
												<input type="text" id="adravenubuld" name="adravenubuld" value="<?php echo $adrs->addressprofile_avenue ?>" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>House No/ Flat No <span>*</span></label>
												<input type="text" id="adrhousflat" name="adrhousflat" value="<?php echo $adrs->addressprofile_hb ?>" required="required"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Mobile Number <span>*</span></label>
												<input type="text" id="adrmobile" name="adrmobile" value="<?php echo $adrs->addressprofile_mobile ?>" required="required"> 
											</div>
											
											
																		
																						
									</div>
									
									
									<input type="hidden" name="invadrsstat" id="invadrsstat" value="<?php echo $adrs->addressprofile_inv_status; ?>">
									
								
									<div class="row ">
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
												<input type="text" id="invfname" name="invfname" value="<?php echo $adrs->addressprofile_inv_fname ?>">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Last Name  <span>*</span></label>
												<input type="text" id="invlname" name="invlname" value="<?php echo $adrs->addressprofile_inv_lname ?>"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Email <span>*</span></label>
												<input type="email" id="invmail" name="invmail" value="<?php echo $adrs->addressprofile_inv_mail ?>">    
											</div>
											<div class="col-lg-6 mb-20">
												<label>Street Name  <span>*</span></label>
												<input type="text" id="invstreet" name="invstreet" value="<?php echo $adrs->addressprofile_inv_street ?>"> 
											</div>
											
											<div class="col-12 learts-mb-20">
                        <label for="bdCountry2">Area <abbr class="required">*</abbr></label>
                        <select id="bdCountry2" class="select2-basic" id="invarea" name="invarea">

						 <!-- <option value="<?php echo $adrs->city_id ?>" selected><?php echo $adrs->city_name ?></option> -->

				<?php foreach($area as $row) { 

                   if($adrs->addressprofile_inv_city!=$row->city_id)
                   {

					?>		
				 

                            <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>

                <?php  }

                else { ?>

                           <option value="<?php echo $row->city_id ?>" selected><?php echo $row->city_name ?></option>

                <?php } } ?>
                        </select>
                    </div>
                        
											
											<div class="col-lg-6 mb-20">
												<label>Block <span>*</span></label>
												<input type="text" id="invblock" name="invblock" value="<?php echo $adrs->addressprofile_inv_block ?>"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>Avenue / Building <span>*</span></label>
												<input type="text" id="invavenuebld" name="invavenuebld" value="<?php echo $adrs->addressprofile_inv_avenue ?>"> 
											</div>
											
											<div class="col-lg-6 mb-20">
												<label>House No/ Flat No <span>*</span></label>
												<input type="text" id="invhousflat" name="invhousflat" value="<?php echo $adrs->addressprofile_inv_hb ?>"> 
											</div>

											<div class="col-lg-6 mb-20">
												<label>Mobile Number <span>*</span></label>
												<input type="text" id="invmobile" name="invmobile" value="<?php echo $adrs->addressprofile_inv_mobile ?>"> 
											</div>
											
											
											
											
										</div>								
								</div>
								
								</div>
								<div class="col-lg-12 ">
											<button class="btn btn-dark btn-outline-hover-dark" type="submit">Save</button>
											</div>			

							</div>	

								
									
									
                </div>

                        </div>
						</form>
						<div class="clearfix"></div>
    </div>
	</div>
	</div>
  

  <?php } ?>  

    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>


   <script type="text/javascript">

   	  $( document ).ready(function() {

          var inv_stat = $('#invadrsstat').val();
          
          if(inv_stat==1)
          {
          	$('#addressinvo').click();
          	$('#addressinvo').prop('checked',true);


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


    $("#adaddressForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/updateaddress');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                alert(data);
               if($.trim(data) == "success"){
                  
                  window.location.href="<?php echo base_url(); ?>Checkout";
                  
               }
               
               else{
                  notifyresult('System down.try later!','danger');
                  
               }

              // show response from the php script.            
              }
             });
      });



 </script>   