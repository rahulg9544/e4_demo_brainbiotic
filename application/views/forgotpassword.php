

<div class="page-title-section section gnrl_bg">
<div class="container">
<div class="row">
<div class="col">
<div class="page-title">
<h1 class="title">Lost Password </h1>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lost Password</li>
</ul>
</div>
</div>
</div>
</div>
</div>



<div class="section section-padding">
<div class="container">
<div class="lost-password">
<p>Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p>

		<form id="forgpass" method="POST">
		<div class="row learts-mb-n30">
		<div class="col-12 learts-mb-30">
		<label for="usermailforg">Enter Your Email Id</label>
		<input type="email" name="usermailforg" id="usermailforg">
		<span id="forgpasspan"></span>
		</div>
		<div class="col-12 text-center learts-mb-30">
		<b class="btn btn-dark btn-outline-hover-dark" onclick="sendpassword();">Send link</b>
		</div>
		</div>
		 </form>
</div>
</div>
</div>
<div class="clearfix"></div>


<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	
	function sendpassword()
	{
       var mailid = $('#usermailforg').val();

		$.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/sendpassword');?>/",
                data: {mailid:mailid}, // serializes the form's elements.
               success: function(data){
                alert(data);
               	if(data=="success")
               	{
               		$('#forgpasspan').text("Password reset link has been sent to your mail.Please check it will be valid for only 24 hours");
               		$('#forgpasspan').css('color','green');
               	}
               	else if(data=="mailnotexist")
               	{
               		$('#forgpasspan').text("User not exist!");
               		$('#forgpasspan').css('color','red');
               	}
               	else
               	{
               		$('#forgpasspan').text("System down.try later!");
               		$('#forgpasspan').css('color','red');
               	}
               
                
                                         
              }
             });
	}

</script>




