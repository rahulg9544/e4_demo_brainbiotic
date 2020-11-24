

       <!-- Page Title/Header Start -->
   <div class="page-title-section section gnrl_bg" >
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Order Tracking </h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Order Tracking</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Category Banner Section Start -->
    
    <!-- Category Banner Section End -->
	
	 <!-- Order Tracking Section Start -->
    <div class="section section-padding">

        <div class="container">
            <div class="order-tracking">
                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                <form id="ortrackForm" method="post">
                    <div class="row learts-mb-n30">
                        <div class="col-12 learts-mb-30">
                            <label for="orderID">Order ID</label>
                            <input id="orderID" name="orderID" type="text" placeholder="Found in your order confirmation email.">
                        </div>
                        <div class="col-12 learts-mb-30">
                            <label for="billingEmail">Billing email</label>
                            <input id="billingEmail" name="billingEmail" type="text" placeholder="Email you used during checkout.">
                        </div>
                        <div class="col-12 text-center learts-mb-30">
                            <button class="btn btn-dark btn-outline-hover-dark" type="submit">Track</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Order Tracking Section End -->
   
<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>


<script type="text/javascript">
    
    $("#ortrackForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('BabiesController/ordertrackmail');?>/",
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


</script>