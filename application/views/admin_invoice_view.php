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
				
				
					window.open(doc.output('bloburl'), '_blank');	
				  doc.save('order_invoice');
				
				
         
	     			
			}
		});
 }

</script>


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

.invoice .qty,.invoice .total,.invoice .unit, .invoice h3{
    text-align: center;
    font-size: 14px;
}

.invoice .no {
   color: #191818;
   font-size: 1em;
   background: #fdfdfd;
   text-align:center;
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

    .headr{ background: #9e090e; width:672px;;  height: 50px;  font-family:Geneva,Arial; padding: 0 15px;}
    .headr p{  float: left; 13px; float: left; color: #fff;}
    
    .titile-main{ color:#222;display:block;font-family:Geneva,Arial;font-size:18px;font-style:normal;font-weight:italic;line-height:20px;letter-spacing:normal;margin:0;margin-bottom:5px;text-align:left}
    .top-bt{ background: #bf5c5e; border-radius: 20px; padding: 10px 20px; color: #fff; float: right; margin-right: 10px; font-size: 14px; margin-top: 3px;}

</style>
</head>
<body style="background-color:#ededed; margin:0 auto; padding:0;">
<center> 
<div id="page1-div" style="width: 702px;border:1px solid">	        
 <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" style="table-layout:fixed;margin:0 auto;mso-table-lspace:0pt;mso-table-rspace:0pt; margin-bottom:0px; padding-top: 0px; border-top:4px solid #9e090e; ">
     
     
		<tbody><tr>
            
			<td align="center">  
              
                
				<table width="700" bgcolor="#ededed" align="center" cellpadding="0" cellspacing="0" border="0" class="table600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
                    
                    
                    
					<tbody><tr>
						<td width="700" class="tdLogo" bgcolor="#ededed" align="left"> 
                          <div class="headr"> 
                            <p>
Call +123 456789 Extended hours M-F 6am-8pm</p>
                              
                            <a href="#" class="top-bt">My Account</a>  
                            <a href="#" class="top-bt">My Cart</a>    
                            </div>    
                            
							<table width="700" align="left" cellpadding="0" cellspacing="0" border="0" bgcolor="#e0dede" class="table600Logo" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
								<tbody><tr>
									<!--LOGO IMAGE'S WIDTH MUST BE 300px-->
									<!--HEIGHT MUST BE 200 px-->
									<!--Open the "logo.PSD" in photoshop-->
									<!--Add your logo, center it VERTICALLY as I did by default (this ensures to have some space at top and bottom as A padding)-->
									<!--FOR BEST RESULTS:MAKE YOUR IMAGE'S WIDTH JUST AS WIDE AS YOUR LOGO (NO SPACING at both LEFT and RIGHT sides at PSD File)-->
									<td>
										<table cellpadding="0" cellspacing="0" bgcolor="#e0dede" border="0" class="centerize" style="mso-table-lspace:0pt;mso-table-rspace:0pt; padding-top: 20px; padding-bottom: 20px;">
											<tbody><tr>
												<td valign="middle" align="left" height="60" style="line-height:1px;padding-left:15px; "><a href="#" target="_blank"><img src="<?php echo base_url(); ?>img/logo/logo.png" style="display:block;" alt="Logo Image" border="0" align="top" hspace="0" vspace="0" width="176" ></a></td>
                                                
                                                <td valign="top" style="border-collapse:collapse;color:#222;font-family:Geneva,Arial;font-size:14px;line-height:1.5;letter-spacing:normal;text-align:left;padding-top:10px;padding-bottom:10px;padding-right:15px;text-align:left;padding-left:15px">
<h4 class="titile-main">Don't leave this behind</h4>
<!-- <p>We saved all of the great items you've added to you cart so when you're ready<br> to buy, simply <a href="#" target="_blank">complete your purchase</a>.</p>    
 -->
<p>Your Order has been Confirmed .Here is your Order Invoice</p>
<p>Order Id : <span id="ordridspan" style="color: #cc1253;"><?php echo $ordid; ?></span>
</p>
<p>Order Date: <span id="orddatespn" style="color: #cc1253;"><?php echo $ordergen->orders_date ?></span></p>
</td>
                                                
												
                                                                  </tr>
                                                
                                                <tr>

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
		
		
		<tr>
		
		</tr>
		
	</tbody></table>       
        
        
        
        
      
      
      
      
      
      <!-- INVOICE SECTION -->
<table width="700" bgcolor="#ededed" align="center" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed; margin: 0 auto; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"> 
<tbody> 



 <tr> 
<td align="center"> 


  <table width="700" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #c9c9c9;">
  <tr>
    <td style="border-right:1px solid #c9c9c9; padding:10px 5px;">&nbsp;</td>
    <td style="border-right:1px solid #c9c9c9; padding:10px 5px; font-size:16px; font-weight:bold; font-family:Geneva,Arial;color:#666666;">Product</td>
    <td style="border-right:1px solid #c9c9c9; padding:10px 5px; font-size:16px; font-weight:bold;font-family:Geneva,Arial;color:#666666;">Qty</td>
    <td style="border-right:1px solid #c9c9c9; padding:10px 5px; font-size:16px; font-weight:bold;font-family:Geneva,Arial;color:#666666;">Price in KD</td>
    <td style=" padding:10px 5px; font-size:16px; font-weight:bold;font-family:Geneva,Arial;color:#666666;">Total in KD</td>
  </tr>


<?php


 if(!empty($res)) {
$i=1;
$ordertotal=0;
$orderqty=0;

  foreach($res as $row)
  {
 ?>	

<tr>
<td style="border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9; padding:10px 5px; font-size:14px;  font-family:Geneva,Arial;color:#666666;"><?php echo $i ?></td>
<td style="border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9; padding:10px 5px; font-size:14px; font-family:Geneva,Arial;color:#666666;"><?php echo $row->dc_prod_name?></td>
<td style="border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9; padding:10px 5px; font-size:14px;  font-family:Geneva,Arial;color:#666666;"><?php echo $row->dc_prod_quantity?></td>
<td style="border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9; padding:10px 5px; font-size:14px;  font-family:Geneva,Arial;color:#666666;"><?php echo $row->dc_prod_actualstoreprice ?></td>
<td style=" border-top:1px solid #c9c9c9; padding:10px 5px; font-size:14px;  font-family:Geneva,Arial;color:#666666;"><?php echo number_format($row->dc_prod_quantity*$row->dc_prod_actualstoreprice,3); ?></td>
</tr>
  
<?php

$orderqty=$orderqty+$row->dc_prod_quantity;
$ordertotal=$ordertotal+($row->dc_prod_actualstoreprice*$orderqty);

  $i++;  } } ?>

  <tr>
    
    
    
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #c9c9c9; ">
  <tr>
    <!-- <td  style=" border-right:1px solid #c9c9c9;width:18px; border-left:1px solid #c9c9c9; padding:10px 4px; font-size:15px;  ">&nbsp;</td> -->
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9; font-weight:bold; color:#FFFFFF; width:395px;  padding:10px 4px; font-size:15px;  font-family:Geneva,Arial;">Cart Subtotal</td>
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9;font-weight:bold; color:#FFFFFF; width:158px; padding:10px 4px; font-size:15px;  font-family:Geneva,Arial;">KWD <?php echo number_format($ordertotal,3); ?></td>
  </tr>
  <tr>
    
  <tr>
    <!-- <td  style=" border-right:1px solid #c9c9c9; border-left:1px solid #c9c9c9; padding:10px 4px; font-size:15px;  font-family:'Myriad Pro';">&nbsp;</td> -->
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9;border-top:1px solid #c9c9c9;font-weight:bold; color:#FFFFFF; padding:10px 4px; font-size:15px; font-family:Geneva,Arial; ">Shipping</td>
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9;font-weight:bold; color:#FFFFFF;  padding:10px 4px; font-size:15px; font-family:Geneva,Arial; ">KWD <?php echo $ordergen->orders_delcharge ?></td>
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
    <!-- <td  style=" border-right:1px solid #c9c9c9; border-left:1px solid #c9c9c9; padding:10px 4px; font-size:15px;  ">&nbsp;</td> -->
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9;border-top:1px solid #c9c9c9;font-weight:bold; color:#FFFFFF; padding:10px 4px; font-size:15px; font-family:Geneva,Arial;">Order Total</td>
    <td  style="background:#bf5c5e; border-right:1px solid #c9c9c9; border-top:1px solid #c9c9c9;font-weight:bold; color:#FFFFFF;  padding:10px 4px; font-size:15px; font-family:Geneva,Arial; ">KWD <?php echo number_format($offertot,3); ?></td>
  </tr>
</table>

    
    </td>
  </tr>
</table>

	<!--<div style="font-size:20px; font-family:Geneva,Arial; background:rgb(224, 222, 222); width:690px; text-align:left;color:#666666; margin:0 auto 0 auto; padding:10px 20px; border-bottom:1px solid #cccccd;">
        Customer Details
        </div>-->

    <div style=" width:662px; margin:0 auto; padding:20px 20px; background:rgb(224, 222, 222);">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td style="font-size:18px; font-family:Geneva,Arial; text-align:left; padding-bottom:15px;color:#333;">Shipping Address</td>
  </tr>
  <tr>
    <td style="font-size:15px; font-family:Geneva,Arial; text-align:left;color:#333; line-height:20px; "><?php echo $orderadrs->addressprofile_fname." ".$orderadrs->addressprofile_lname ?><br />
    House/building no : <?php echo $orderadrs->addressprofile_hb ?><br />
    Street : <?php echo $orderadrs->addressprofile_street ?>,<br />
Avenue : <?php echo $orderadrs->addressprofile_avenue ?><br />
Block : <?php echo $orderadrs->addressprofile_block ?><br />
Area : <?php echo $orderadrs->addressprofile_city ?><br />
Mob: <?php echo $orderadrs->addressprofile_mobile ?><br />
Additional note: <?php echo $orderadrs->addressprofile_more ?><br /></td>
    
  </tr>
</table>
</div>     
      
      
    
      
   
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" style="table-layout:fixed;margin:0px auto; padding-top: 10px;">
       	<tbody><tr>
			<td align="center">
                  	<table width="618" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" class="table600">
					<tbody><tr>
						<td> 
                                          <table width="550" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#ededed" class="table600">         	
                                                <tbody><tr>
                                                      <td height="0" style="font-size:0;line-height:0;">&nbsp;</td>
                                                </tr>
                                                    
                                                <tr><td align="center" style="font-family: sans-serif; padding: 10px 0px; text-align: center;"><a href="#" style="font-size: 13px; color: #000;" target="_blank">My Account <span style="margin-left: 5px; margin-right: 10px;">|</span> </a> 
    <a href="#" style="font-size: 13px; color: #000;" target="_blank">Order History <span  style="margin-left: 5px; margin-right: 10px;">|</span> </a>  
    <a href="#" style="font-size: 13px; color: #000;">Offers <span  style="margin-left: 5px; margin-right: 10px;">|</span></a> 
    <a href="#" style="font-size: 13px; color: #000;"> New Arrivals <span  style="margin-left: 5px; margin-right: 10px;">|</span></a> 
    </td></tr>    
                                                    
                                                <tr>
                                                	
                                                    
                                                      <td height="5" class="mailingOptionsTD">*Prices are subject to change without notice.<br>
                                                          
                                This invoice was Created from tootq8i.com.<br>
                                
© 2020 TooT., All rights reserved.                  
                                                    
                                                    
                                                    </td>
                                                      
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
    
<!-- <table width="100%" style="background: #ccc; padding: 10px;">
    <tr>
    
    <td align="center" style="font-family: sans-serif; padding: 10px 0px;"><p>You received this email from TooT<br>
If you would like to unsubscribe, <a href="">click here.</a></p></td>
    </tr>
    
    </table>
     -->
      <!--FOOTER ENDS HERE-->
      </div>
</center>

<center style="margin-top:20px">
<button style="background-color: #9d0b0b;border-radius: 24px;color: white;border-color: #9d0b0b;padding: 1% 1%;" type="button" id="cmd" onclick="savePDF('save');">Download Invoice</button>
</center>

</body></html>