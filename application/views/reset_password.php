

<div class="page-title-section section gnrl_bg">
<div class="container">
<div class="row">
<div class="col">
<div class="page-title">
<h1 class="title">Reset Password </h1>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Reset Password</li>
</ul>
</div>
</div>
</div>
</div>
</div>



<div class="section section-padding">
<div class="container">
<div class="lost-password">
<p>Please reset your password here</p>

		<form id="forgpass" method="POST">

    

		<div class="row learts-mb-n30" style="margin-bottom: 20px;">
      <input type="hidden" name="resetcod" id="resetcod" value="<?php echo $rescode ?>">
    <input type="hidden" name="resetmail" id="resetmail" value="<?php echo $mailid ?>">
		<!-- <div class="col-12 learts-mb-30">
		<label for="usermailforg">Current password</label>
		<input type="password" name="cpass" id="cpass">
		<span id="cpasspan"></span> -->
    <label for="npass">New password</label>
    <input type="password" name="npass" id="npass">
    <span id="npasspan"></span>
    <label for="conpass">Confirm password</label>
    <input type="password" name="conpass" id="conpass">
    <span id="conpasspan"></span>
		</div>
		<div class="col-12 text-center learts-mb-30">
		<b class="btn btn-dark btn-outline-hover-dark" onclick="resetpassword();">reset password</b>
		</div>
		</div>
		 </form>
</div>
</div>
</div>
<div class="clearfix"></div>


<script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	
	function resetpassword()
	{
       // var cpass = $('#usermailforg').val();
       var npass = $('#npass').val();
       var conpass = $('#conpass').val();
       var resetcod = $('#resetcod').val();
       var resetmail = $('#resetmail').val();
       

		$.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/BabiesController/resetpassword_check');?>/",
                data: {npass:npass,conpass:conpass,resetmail:resetmail,resetcod:resetcod}, // serializes the form's elements.
               success: function(data){
                alert(data);
               	if(data=="success")
               	{
               		window.location.href="<?php echo base_url(); ?>Login-Register";
               	}
               	else if(data=="invalidcod" || data=="expired")
               	{
               		$('#conpasspan').text("Link is expired or invalid!");
               		$('#conpasspan').css('color','red');
               	}
                else if(data=="nouser")
                {
                  $('#conpasspan').text("User not exist!");
                  $('#conpasspan').css('color','red');
                }
               	else
               	{
               		$('#conpasspan').text("System down.try later!");
               		$('#conpasspan').css('color','red');
               	}
               
                
                                         
              }
             });
	}

</script>




