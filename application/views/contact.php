





       <!-- Page Title/Header Start -->
   <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Contact Us</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
 <div class="section section-padding contact">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Keep in touch with us</h2>
                <p>Been tearing your hair out to find the perfect gift for your loved ones? Try visiting our nationwide local stores. You can also contact us to become partner or distributor. Call us, send us an email or make an appointment now.</p>
            </div>
            <!-- Section Title End -->

            <!-- Contact Information Start -->
           <div class="row no-gutters row-cols-md-4 row-cols-1">
		   
		   <div class="icon-box3 col">
                    <div class="inner">
                        <div class="icon"><i class="ti-location-pin"></i></div>
                        <div class="content">
                            <h6 class="title">ADDRESS</h6>
                            <p><?php echo $details->contact_address ?></p>
                        </div>
                    </div>
                </div>

                <div class="icon-box3 col">
                    <div class="inner"><a href="https://web.whatsapp.com/" target="_blank">
                        <div class="icon"><i class="fa fa-whatsapp"></i></div>
                        <div class="content">
                            <h6 class="title">WHATSAPP</h6>
                            <p> <?php echo $details->contact_whatsapp ?></p>
                        </div></a>
                    </div>
                </div>

                
				
				<div class="icon-box3 col">
                    <div class="inner">
                        
						<div class="icon"><i class="ti-mobile"></i></div>
                        <div class="content">
                            <h6 class="title">PHONE</h6>
                            <p> <?php echo $details->contact_phon ?></p>
                        </div>
                    </div>
                </div>

                <div class="icon-box3 col">
                    <div class="inner">
                        <div class="icon"><i class="ti-email"></i></div>
                        <div class="content">
                            <h6 class="title">EMAIL</h6>
                            <p><?php echo $details->contact_mail ?></p>
                        </div>
                    </div>
                </div>
				
				

            </div>
            <!-- Contact Information End -->

        </div>
    </div>
    <!-- Contact Information & Map Section End -->
	
	 <div class="section contact">
        <div class="container">
		
		<div class="section-title2 text-center">
                <h2 class="title">Send a message</h2>
            </div>
	<div class="row">

			
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="contact-form">
                        <form id="contact-form1" method="post">
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <input type="text" placeholder="Your Name *" name="name" id="name">
                                </div>
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <input type="email" placeholder="Email *" name="email" id="email">
                                </div>
								 <div class="col-md-6 col-12 learts-mb-30">
                                    <input type="number" placeholder="Phone *" name="phone" id="phone">
                                </div>
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <input type="text" placeholder="Subject *" name="subject" id="subject">
                                </div>
                                <div class="col-12 learts-mb-30">
                                    <textarea placeholder="Message" name="message" id="message"></textarea>
                                </div>
                                <div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark" type="submit" id="subbtn">Submit</button></div>

             <span class="col-12" id="contactmailspan" style="font-size: 15px;font-weight: 600;text-align: center;"></span>

                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
	</div>
            </div>
	
	

    <!-- Contact Form Section Start -->
   
    <!-- Contact Form Section End -->

   
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
    

 $("#contact-form1").submit(function(e) {

        $('#subbtn').prop('disabled',true);

        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/sendcontactmail');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                $('#subbtn').prop('disabled',false);
               if($.trim(data) == "success"){
                  
                $('#contactmailspan').css('color','green');
                $('#contactmailspan').text('Contact mail sent successfully');
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');  
                $('#subject').val('');
                $('#message').val(''); 

                
                  
               }
              
               else
               {
                  $('#contactmailspan').css('color','red');
                  $('#contactmailspan').text('System down.try later!');

                  
                 
                  
               }

              // show response from the php script.            
              }
             });
      });
</script>
   
   

    