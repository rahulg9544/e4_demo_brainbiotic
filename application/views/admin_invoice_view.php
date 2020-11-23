<!-- saved from url=(0062)http://emailtemplatebuilders.com/Retinadroit/red/4_Layout.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    

 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>TooT</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


<script type="text/javascript">

function savePDF(butn)
 {

		var imgData;

			html2canvas($('#page1-div'),{
			useCORS:true,
			onrendered:function(canvas)
			{
				imgData = canvas.toDataURL('image/png');
				// var doc = new jsPDF('p','mm','a4');
				var doc = new jsPDF('p','pt','a4');
				
			

				var width = doc.internal.pageSize.getWidth();
                var height = doc.internal.pageSize.getHeight();

				// doc.addImage(imgData,'jpg',0,0,width, height)
				
				doc.addImage(imgData,'PNG',35,35)
				
				if(butn=='save')
				{
					window.open(doc.output('bloburl'), '_blank');	
				  doc.save('order_invoice');
				
				}
				else
				{
                var odrid = $('#ordridspan').text();
               

                var blob = doc.output('blob');

					var formData = new FormData();
					formData.append('pdf', blob);
					
					formData.append('odrid',odrid);
					
					
			
				$.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Checkout/invoicemailsend');?>/",
              data: formData, 
              processData: false,
			  contentType: false,
			   // beforeSend: function() {
			   //      $('.loading-bar').css("display", "block");
			   //  },
             success: function(data){
              alert(data);
              if($.trim(data)=="success")
              {
              	// window.location.href="http://localhost/EGSWA2/admin/index.php/Admin_members";
              	// alert("Idcard generated for user");


              }
              else
              {
              	// window.location.href="http://localhost/EGSWA2/admin/index.php/Admin_regform";
              	alert("something went wrong");
              }
               

            }
        });

	     }			
			}
		});
 }

</script>
<!-- saved from url=(0062)http://emailtemplatebuilders.com/Retinadroit/red/4_Layout.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    

 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title>TooT</title>
<style type="text/css">

	a								{text-decoration:none;}
	.AnnouncementTD				{color:#7f8c9d;font-family: sans-serif;font-size:16px;text-align:right;line-height:150%;}
	.AnnouncementTD a				{color:#7f8c9d;}

	.viewOnlineTD					{color:#ffffff;font-family: sans-serif;font-size:12px;text-align:left;line-height:22px;}
	.viewOnlineTD a					{color:#ffffff;}

	.menuTD						{color:#ffffff;font-family: sans-serif;font-size:12px;text-align:right;line-height:22px;}
	.menuTD a						{color:#ffffff;}	
	
	.buttonTD, .iconTextTD,.td528Button	{color:#ffffff;font-family: sans-serif;font-size:15px;font-weight:lighter;text-align:center;line-height:23px;}
	.iconTextTD							{text-align:left; font-size:13px;color:#c0c7d4;}
	.buttonTD a,.td528Button a			{color:#ffffff;display:block;}	
	.iconTextTD a					{color:#ff675f; font-weight:bold;}		
	
	.headerTD						{color:#7f8c9d;font-family: sans-serif;font-size:18px;text-align:center;line-height:25px;}
	.headerTD a						{color:#ff675f;}
	.header2TD,.iconHDTD			{color:#cfd6e2;font-family: sans-serif;font-size:17px;text-align:center;line-height:25px;}
	.header2TD a,.iconHDTD a		{color:#ff675f; font-weight:bold;}
	.header3TD						{color:#7f8c9d;font-family: sans-serif;font-size:17px;text-align:center;line-height:27px;}
	.header3TD a					{color:#ff675f; font-weight:bold;}
	.header4TD						{color:#7f8c9d;font-family: sans-serif;font-size:18px;text-align:left;line-height:25px;}
	.header4TD a					{color:#ff675f;}
	.headerPrcTD					{color:#7f8c9d;font-family: sans-serif;font-size:40px;text-align:center;}
	.headerPrcTD a					{color:#7f8c9d;}
	.iconHDTD						{color:#ffffff;}
	
	.RegularTextTD,
	.RegularText2TD,	
	.RegularText3TD	,
	.confLinkTD						{color:#7f8c9d;font-family: sans-serif; font-size:13px;text-align:left;line-height:23px;}
	.RegularText3TD					{text-align:center; font-size:15px;}
	.RegularTextTD a,
	.RegularText2TD a,
	.RegularText3TD a				{color:#ff675f; font-weight:bold;}
	.confLinkTD a					{color:#67bffd; font-weight:bold;word-break:break-all;}
	
	.invoiceTD						{color:#7f8c9d;font-family: sans-serif; font-size:19px;text-align:center;line-height:23px;}
	.invoiceTD a						{color:#ff675f;}
	.invCap							{color:#7f8c9d;font-family: sans-serif;text-align:center;font-size:15px;}
	.invCap a						{color:#7f8c9d;}
	.invReg							{color:#7f8c9d;font-family: sans-serif;font-size:13px;text-align:center;}
	.invReg a						{color:#7f8c9d;}
	.invInfoA						{color:#7f8c9d;font-family: sans-serif; font-size:12px;text-align:right;line-height:20px;}
	.invInfoA a						{color:#7f8c9d;pointer-events:none;}
	.invInfoB						{color:#7f8c9d;font-family: sans-serif; font-size:12px;text-align:left;line-height:20px;}
	.invInfoB a						{color:#7f8c9d;pointer-events:none;}	
	
	td a img							{text-decoration:none;border:none;}
	
	.companyAddressTD				{color:#7f8c9d;font-family: sans-serif;font-size:13px;text-align:center;line-height:190%;}
	.companyAddressTD a			{color:#7f8c9d;}
	.companyAddress2TD			{color:#7f8c9d;font-family: sans-serif;font-size:13px;text-align:center;line-height:190%;}
	.companyAddress2TD a			{color:#7f8c9d;pointer-events:none;}
	
	.mailingOptionsTD,.termsConTD,.termsCon2TD		{color:#888888;font-family: sans-serif;font-size:12px;text-align:center;line-height:170%;}
	.mailingOptionsTD a,.termsConTD a,.termsCon2TD a	{color:#888888;font-weight:bold;}
	
	.termsConTD {text-align:left;}
	.termsCon2TD {text-align:right;}
	.termsConTD a,.termsCon2TD a{font-weight:normal;}

	.ReadMsgBody{width:100%;}
	.ExternalClass{width:100%;}
	body{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-webkit-font-smoothing:antialiased;margin:0 !important;padding:0 !important;min-width:100% !important;}
		
     p{ font-size: 14px;} 
    
    .invoice{
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom:0px;
        font-family: sans-serif;
}

.invoice td,.invoice th {
    padding: 15px 10px;
    background: #fdfdfd;
    border: 1px solid #cecece;
    font-size: 14px;
    line-height: 22px;
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice .qty,.invoice .total,.invoice .unit {
    text-align: center;
    font-size: 14px;
}

.invoice .no {
   color: #191818;
   font-size: 1em;
   background: #fdfdfd;
}

.invoice .unit {
}

.invoice .total {
    background: #fdfdfd;
    color: #000;
}
.invoice a{ color:#3e3947; }
    .invoice a span{ font-size: 13px; }

.invoice tbody tr:last-child td {
    /* border: none */
}

.invoice tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 16px;
    border-top: 1px solid #aaa
}

.invoice tfoot tr:first-child td {
    border-top: none
}

.invoice tfoot tr:last-child td {
  color: #343399;
    font-size: 15px;
    border-top: 1px solid #343399;
}

.invoice tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}
    .thank-bt{ background: #343399; padding: 10px; width: 80%; margin: 0 auto; border-radius: 10px 10px 10px 10px; text-align: center; font-family: sans-serif; color: #fff; display: block; margin-top: 10px;}

    

@media only screen and (max-width: 599px) 
		   {
		body{min-width:100% !important;}  
                

		td[class=viewOnlineTD]						{text-align:center !important;}
		table[class=table600Logo]  					{width:440px !important;border-bottom-style:solid !important;border-bottom-color:#e1e1e1 !important;border-bottom-width:1px !important;}
		td[class=tdLogo]								{width:440px !important;}
		table[class=table600Menu]					{width:440px !important;}
		td[class=AnnouncementTD]					{width:440px !important;text-align:center !important;font-size:17px !important;}
		table[class=table600Menu] td					{height:20px !important;}
		table[class=tbl6AnctText] .menuTD			{text-align:center !important;font-size:13px !important;line-height:150% !important;}
		table[class=tbl6AnctText] 					{width:440px !important;}
		td[class=viewOnlineTD]						{width:440px !important;}
		td[class=menuTD]							{width:440px !important;font-weight:bold !important;}
		table[class=table600] 						{width:440px !important;}
		table[class=image600] img 					{width:440px !important; height:auto !important;}		
		table[class=AnncTable]						{width:100% !important;border:none !important;}
		table[class=table280d]						{width:440px !important; border-radius:0 0 0 0 !important;}
		td[class=LMrg]								{height:8px !important;}
		td[class=LMrg2]								{height:6px !important;}
		td[class=LMrg3]								{height:10px !important;}
		table[class=tblRgBrdr]						{border-right:none !important;}
		td[class=td147]								{width:215px !important;}
		table[class=table147]						{width:215px !important;}
		table[class=table147tblp]						{width:175px !important;}
		td[class=mrgnHrzntlMdl]						{width:10px !important;}
		td[class=mvd]								{height:30px !important;width:440px !important;}
		table[class=centerize]						{margin:0 auto 0 auto !important;}
		table[class=tblBtnCntr2]						{width:398px !important; margin:0 auto 0 auto !important;}
		td[class=table28Sqr] img						{width:440px !important;height:auto !important;margin:0 auto 0 auto !important; border-radius:4px 4px 0 0 !important;}
		td[class=tbl28Rctngl] img						{width:215px !important;height:auto !important;margin:0 auto 0 auto !important;}
		td[class=headerTD] 							{text-align:center !important;}
		td[class=header4TD]							{text-align:center !important;}
		td[class=headerPrcTD]						{font-size:25px !important;}
		td[class=RegularTextTD] 						{font-size:13px !important;}
		td[class=RegularText2TD] 					{height:0 !important; font-size:13px !important;}
		td[class=RegularText3TD] 					{font-size:13px !important;}
		td[class=mailingOptionsTD]					{text-align:center !important;}
		td[class=companyAddressTD]					{text-align:center !important;}
		td[class=esFrMb] 							{width:0 !important;height:0 !important;display:none !important;}
		table[class=table280brdr]					{width:440px !important;}
		table[class=table608]						{width:438px !important;}
		table[class=table518b] 						{width:398px !important;}
		table[class=table518] 						{width:398px !important;}
		table[class=table518c] 						{width:195px !important;}
		table[class=table518c2] 						{width:195px !important;}
		td[class=imgAltTxticTD] img					{width:398px !important;height:auto !important; margin:0 auto 17px auto !important;}
		td[class=iconPdngErase]						{width:0 !important; display:none !important;}
		td[class=table608]							{width:438px !important;}
		td[class=invReg]								{width:133px !important; font-size:14px !important;text-align:center !important;font-weight:lighter !important;}
		td[class=invInfoA]							{text-align:right !important;width:195px !important;}
		td[class=invInfoB]							{text-align:left !important;width:195px !important;}
		td[class=invoiceTD]							{width:390px !important; font-weight:bold;}
		td[class=td528Button]						{width:358px !important;}
		table[class=table528Button]					{width:358px !important;}
		table[class=table528Social]					{width:398px !important;}
		table[class=table250]						{width:177px !important;}
		}
		


@media only screen and (max-width: 479px) 
		   {
		body{min-width:100% !important;} 
		
		td[class=viewOnlineTD]						{text-align:center !important;}
		table[class=table600Logo]  					{width:100% !important;border-bottom-style:solid !important;border-bottom-color:#e1e1e1 !important;border-bottom-width:1px !important;}
		td[class=tdLogo]								{width:100% !important;}
		table[class=table600Menu]					{width:100% !important;}
		td[class=AnnouncementTD]					{width:100% !important;text-align:center !important;font-size:17px !important;}
		table[class=table600Menu] td					{height:20px !important;}
		table[class=tbl6AnctText] .menuTD			{text-align:center !important;font-size:12px !important;line-height:150% !important;}
		table[class=tbl6AnctText] 					{width:100%x !important;}
		td[class=viewOnlineTD]						{width:100% !important;}
		td[class=menuTD]							{width:100% !important;font-weight:bold !important;}
		table[class=table600] 						{width:100% !important;}
		table[class=image600] img 					{width:100% !important;height:auto !important;}
		table[class=table608]						{width:100% !important;}
		td[class=table608]							{width:100% !important;}
		table[class=table518] 						{width:100% !important;}
		table[class=table518b] 						{width:100% !important;}
		table[class=table518c] 						{width:100% !important;}
		table[class=table518c2] 						{width:100% !important; margin:20px 0 0 0 !important;}
		td[class=imgAltTxticTD] img					{width:268px !important;height:auto !important;margin:-4px auto 15px auto !important;}
		table[class=table280Button]					{width:264px !important;}
		table[class=centerize]						{margin:0 auto 0 auto !important;}
		table[class=tblBtnCntr2]						{width:264px !important; margin:0 auto 0 auto !important;}
		table[class=AnncTable]						{width:100% !important;border:none !important;}
		table[class=table280d]						{width:300px !important; border-radius:0 0 0 0 !important;} 
		td[class=LMrg]								{height:8px !important;}
		td[class=LMrg2]								{height:6px !important;}
		td[class=LMrg3]								{height:10px !important;}
		td[class=wz]									{width:15px !important;}
		table[class=tblRgBrdr]						{border-right:none !important;}
		td[class=td147]								{width:147px !important;}
		table[class=table147]						{width:147px !important;}
		table[class=table147tblp]						{width:117px !important;}
		td[class=mrgnHrzntlMdl]						{width:6px !important;}
		td[class=mvd]								{height:30px !important;width:300px !important;}
		td[class=iconPdngErase]						{width:0 !important; display:none !important;}
		td[class=table28Sqr] img						{width:300px !important;height:auto !important;margin:0 auto 0 auto !important; border-radius:4px 4px 0 0 !important;}
		td[class=tbl28Rctngl] img						{width:147px !important;height:auto !important;margin:0 auto 0 auto !important;}
		td[class=headerTD] 							{font-size:16px !important; font-weight:bold !important;text-align:center !important;}
		td[class=header4TD]							{font-size:16px !important; font-weight:bold !important;text-align:center !important;}
		td[class=iconHDTD] 							{font-size:16px !important;text-align:center !important;}
		td[class=headerPrcTD]						{font-size:18px !important;}
		td[class=RegularTextTD] 						{font-size:13px !important;text-align:left !important;}
		td[class=RegularText2TD] 					{height:0 !important;font-size:13px !important;}
		td[class=RegularText3TD] 					{font-size:13px !important;}
		td[class=mailingOptionsTD]					{text-align:center !important;}
		td[class=companyAddressTD]					{text-align:center !important;}
		td[class=esFrMb] 							{width:0 !important;height:0 !important;display:none !important;}
		table[class=table280brdr]					{width:300px !important;}
		td[class=invReg]								{width:89px !important; font-size:13px !important;text-align:center !important;}
		td[class=invInfoA]							{text-align:center !important;width:268px !important;}
		td[class=invInfoB]							{text-align:center !important;width:268px !important;}
		td[class=invoiceTD]							{width:250px !important;}
		td[class="buttonVrt"]							{height:16px !important;}
		td[class="buttonVrt2"]						{height:12px !important;}
		td[class="buttonVrt3"]						{height:10px !important;}
		td[class=td528Button]						{width:238px !important;}
		table[class=table528Button]					{width:238px !important;}
		table[class=table528Social]					{width:266px !important;}
		table[class=table250]						{width:117px !important;}
		td[class=termsCon2TD]						{text-align:center !important;}
		td[class=termsConTD]						{text-align:center !important;}
		}

    .headr{ background: #9d0b0b; width:730px;  height: 50px;  font-family:Geneva,Arial; padding: 0 15px;}
    .headr p{  float: left; 13px; float: left; color: #fff;}
    
    .titile-main{ color:#222;display:block;font-family:Geneva,Arial;font-size:28px;font-style:normal;font-weight:italic;line-height:30px;letter-spacing:normal;margin:0;margin-bottom:9px;text-align:left}
    .top-bt{ background: #8a0836; border-radius: 20px; padding: 10px 20px; color: #fff; float: right; margin-right: 10px; font-size: 14px; margin-top: 3px;}

</style>
</head>
<body style="background-color:#ededed; margin:0 auto; padding:0;">
<center> 
<div id="page1-div" style="width: 703px;border:1px solid">	        
 <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" style="table-layout:fixed;margin:0 auto;mso-table-lspace:0pt;mso-table-rspace:0pt; margin-bottom:0px; padding-top: 0px; border-top:4px solid #9d0b0b; ">
     
     
		<tbody><tr>
            
			<td align="center">  
              
                
				<table width="700" bgcolor="#ededed" align="center" cellpadding="0" cellspacing="0" border="0" class="table600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
                    
                    
                    
					<tbody><tr>
						<td width="618" class="tdLogo" bgcolor="#ededed" align="left"> 
<!--                          <div class="headr" width="730" style="text-align:left"> -->
<!--                            <p style="FONT-VARIANT: JIS04;-->
<!--    line-height: 40px;-->
<!--    background-color: #9d0b0b;-->
<!--    color: #fff;-->
<!--    margin-block-start: 0px !important;-->
<!--    margin-block-end: 0px !important;-->
<!--    margin:0 !important;-->
<!--    padding-left: 1%;">-->
<!--</p>-->
                              
                                
<!--                            </div>    -->
                            
							<table width="700" align="left" cellpadding="0" cellspacing="0" border="0" bgcolor="#e0dede" class="table600Logo" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
								<tbody><tr>
									
<td>
<table cellpadding="0" cellspacing="0" bgcolor="#e0dede" border="0" class="centerize" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
	<tbody><tr>
		<td valign="middle" align="left" height="60" style="line-height:1px;padding-left:15px; "><a href="#" target="_blank"><img src="<?php echo base_url(); ?>img/logo/logo.png" style="display:block;margin-top: 2%;margin-left: 69%;" alt="Logo Image" border="0" align="top" hspace="0" vspace="0" width="120" height="50"></a></td>
		
                                                                  </tr>
                                                
                                                <tr>
<td valign="top" style="border-collapse:collapse;color:#222;font-family:Geneva,Arial;font-size:14px;line-height:1.5;letter-spacing:normal;text-align:left;padding-top:10px;padding-bottom:10px;padding-right:15px;text-align:left;padding-left:15px">
<h4 class="titile-main">Don't leave this behind</h4>
<p style="color:black">Your Order has been Confirmed .Here is your Order Invoice</p>  
<p>Order Id : <span id="ordridspan" style="color: #9d0b0b;"><?php echo $ordid; ?></span>
</p>
<p>Order Date: <span id="orddatespn" style="color: #9d0b0b;"><?php echo $ordergen->orders_date ?></span></p> 
</td>
</tr>
                                                
										</tbody></table>
									</td>
								</tr>
							</tbody></table>
							
						</td>
					</tr> 
				</tbody></table>         
            	</td>
		</tr>
	</tbody></table>       
        
        
        
        
      
      
      
      
      
      <!-- INVOICE SECTION -->
<table width="100%" bgcolor="#ededed" align="center" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed; margin: 0 auto; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"> 
<tbody> 
 <tr> 
<td align="center"> 
<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" class="table600" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"> 
 <tbody> 
 <tr> <td>
 <table width="700" align="left" cellpadding="0" cellspacing="0" border="0" class="table600" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"> 
<tbody> 
<tr> <td> 
 
    
   <table class="invoice" border="0" cellspacing="0" cellpadding="0" style="background: #fff!important; width: 100%;">
<thead>
<tr>
<th style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="no">Product</th>
<th style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="text-left">Description</th>
   
<th style="border: 1px solid #dddddd;text-align: center;padding: 12px;"class="text-right total">Price</th>
 <th style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="text-right">Qty</th>

</tr>
</thead>
<tbody>

<?php



 if(!empty($res)) {

$ordertotal=0;
$orderqty=0;

  foreach($res as $row)
  {
 ?>	
    
<tr>
<td style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="no"><img src="<?php echo base_url(); ?>uploads/<?php echo $row->dc_prod_image?>" class="img-fluid invo-img" width="50px" height="50"></td>
<td style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="text-left"><h3>

<p style="color:black;font-weight: 600;margin:0"><?php echo $row->dc_prod_name?>,</p>



                    <?php if($row->dc_prod_color!='n/a' && $row->dc_prod_color!='') { ?>

                      	<div style="display: flex;margin: 0;padding-left: 28%;color:black;">
                    <p style="color:black;margin:0">size:<?php echo $row->dc_prod_size; ?> ,&nbsp;</p>

                    <?php if(strpos($row->dc_prod_color, '.') !== false){ ?>
                        Color : &nbsp;<div style="width: 20px;height: 20px;border: 0.25px solid;background: url('<?php echo base_url() ?>uploads/<?php echo $row->dc_prod_color ?>');"></div>

                    <?php } else { ?>

                        Color : &nbsp;<div style="width: 20px;height: 20px;border: 0.25px solid;background: <?php echo $row->dc_prod_color ?>"></div>

                    <?php } ?>

                    </div> 

                <?php } ?>  

</h3>
</td>

<td style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="total">KWD <?php echo $row->dc_prod_actualstoreprice?></td>
<td style="border: 1px solid #dddddd;text-align: center;padding: 12px;" class="unit"><?php echo $row->dc_prod_quantity?></td>    
</tr>
    
 <?php
$orderqty=$orderqty+$row->dc_prod_quantity;
$ordertotal=$ordertotal+($row->dc_prod_actualstoreprice*$orderqty);
 }
 } ?>



</tbody>

 </table>    
       <table width="100%" class="table518b" align="left" cellpadding="0" cellspacing="0" border="0" style="background: #fff; padding: 20px 20px;">
           
            <tr>
                <td style="text-align: center;">
                	<h3 style="padding: 16px">Total Quantity : <?php echo $orderqty ?></h3>
                </td>
            </tr>

            

            <tr>
                <td style="text-align: center;">
                	<h3 style="padding: 16px">Sub Total :KWD <span><?php echo number_format($ordertotal,3); ?></span></h3>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: center;">
                	<h3 style="padding: 16px">Delivery Charge :KWD <span><?php echo $ordergen->orders_delcharge ?></span></h3>
                </td>
            </tr>
            
            <?php 

              if($offertot!=0)
              {
                $offertot=$offertot+$ordergen->orders_delcharge;
              }
              else
              {
              	$offertot=$ordertotal+$ordergen->orders_delcharge;
              }

             ?>
            
            <tr>
                <td style="text-align: center;">
                	<h3 style="padding: 16px">Grand Total :KWD <span><?php echo number_format($offertot,3); ?></span></h3>
                </td>
            </tr>       
           
           <tr>
            
            <td><p class="RegularTextTD" style="font-size: 14px; color: #000; text-align: center;">If you have any questions or need any help, don't hesitate to contact our support team!</p></td>
            </tr> 
           
           
<!--        <tr>-->
    
<!--    <td style="padding: 30px 0px;" align="center"><a href="http://demo7.chrisansgroup.com/q8-dental-final-01/shopping-cart.html" style="padding: 10px 40px; background: #9d0b0b; color: #fff; border-radius: 20px; font-family: sans-serif; font-size: 16px;" target="_blank">-->
<!--Complete your order »</a>-->
<!--    </tr>    -->
       
       </table>
       
    <table width="100%" align="left" cellpadding="0" cellspacing="0" border="0" class="table518b" style="mso-table-lspace:0pt;mso-table-rspace:0pt; background: #f7f4f4; padding: 20px; text-align: center;">
 <tbody>
<tr>
<!--SHIPPING ADDRESS AND Payment Method Information-->
<td height="20" class="RegularTextTD" style="font-size: 18px; text-align: center; padding-bottom: 10px;">Your customer loyalty representative</td>
</tr>
     
    <tr>
<!--SHIPPING ADDRESS AND Payment Method Information-->
<td height="20" class="RegularTextTD" style="font-size: 18px; text-align: center; padding-bottom: 10px;">For any questions, please call M-F 6am - 8pm ET</td>
</tr> 
     
     <tr>
<!--SHIPPING ADDRESS AND Payment Method Information-->
<td height="20" class="RegularTextTD" style="font-size: 18px; text-align: center; padding-bottom: 10px;">+965 506 25 825 . support@tootq8i.com</td>
</tr> 
     
    <tr>
   
   </tr>   
</tbody>
       
       
       


       
       </table> 
       
       
       
       

    
    
    
    
    </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody></table>

      
      
      
    
      
   
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" style="table-layout:fixed;margin:0px auto; padding-top: 10px;">
       	<tbody><tr>
			<td align="center">
                  	<table width="618" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" class="table600">
					<tbody><tr>
						<td> 
                                          <table width="510" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" class="table600">         	
                                                <tbody><tr>
                                                      <td height="0" style="font-size:0;line-height:0;">&nbsp;</td>
                                                </tr>
                                                    
                                               
                                               
                                                <tr>
                                                      <td height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                </tr>
                                          </tbody></table>
						</td>
					</tr>
				</tbody></table>                                                      
            	</td>
		</tr>
	</tbody></table>
    

    
      <!--FOOTER ENDS HERE-->
</div>      
</center>



<center>
<button style="background-color: #9d0b0b;border-radius: 24px;color: white;border-color: #9d0b0b;padding: 1% 1%;" type="button" id="cmd" onclick="savePDF('save');">Download Invoice</button>
</center>

</body>
<script type="text/javascript">

// $( document ).ready(function() {
//           getdelivery();

//       });


setTimeout(function(){

 jQuery('#cmd').click();


}, 0);	
	

</script>



</html>