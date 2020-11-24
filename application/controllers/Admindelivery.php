<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindelivery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/dc_guide/general/urls.html
	 */
	function __construct() {
    	parent::__construct();
    	$this->load->model('delivery_modal');
    		$this->load->model('user_modal');
    	$this->load->library('pdf');
    	// $this->load->library('encryption');
   
	}
	public function index()
	{ 

		
        	$a = array('content' => 'admindeliverymanage_view');
			$this->load->view('admintemplate',$a);
		
	}


		 public function getdelivery()
		 {
		 	$this->load->model('delivery_modal');
		 	
		 		$a['tabledata'] = $this->delivery_modal->get_users();
		 	
		 		$this->load->view('admintables/admindeliverytable_view',$a);
		 }
		 public function modalviewdelivery(){
		 	$id=$this->input->post('id');
		 	$dat=$this->input->post('dat');
		 	$tim=$this->input->post('tim');
		 	$userid=$this->input->post('uid');
		 	
		 	$getadrsid = $this->delivery_modal->getorderadrsdel($id);
		 	
		 	$adrsid = $getadrsid->orders_adrs_id;
		 	
		 		$filt = "";
		 	
		 	$a['tabledatamodal'] = $this->delivery_modal->get_deliverymulitpleall($id,$dat,$tim,$filt);
		 	$a['ord'] = $id;
		 	$a['dat'] = $dat;
		 	$a['tim'] = $tim;

		 $a['udtls']=$this->delivery_modal->getuserdtldelvry($userid);
		 	// $a['dboy'] = $this->user_modal->dboy();
		 	$a['fulldetls']=$this->delivery_modal->getthisorderfulldetls($id);
		 	$a['address'] = $this->delivery_modal->getorderaddress($adrsid);
		 	$this->load->view('admintables/admindeliveryproducts_view',$a);
		 }
		 public function dboyassign(){
		 	$ord=$this->input->post('ord');
		 	$dt=$this->input->post('dt');
		 	$tm=$this->input->post('tm');
		 	$dboy=$this->input->post('dboy');
		 	$ddate=$this->input->post('ddate');
		 	$res = $this->delivery_modal->dboyassign($ord,$dt,$tm,$dboy,$ddate);

		  $qry_firebase = "SELECT * FROM firebase_user LEFT JOIN deliverycharge ON deliverycharge.dc_agent_id = firebase_user.firebase_user_id LEFT JOIN user ON user.user_id = firebase_user.firebase_user_id where firebase_user.firebase_user_id ='$dboy' order By firebase_user_id DESC ";

           $this->load->model('Android_service');
            $res1 = $this->Android_service->excute_qry($qry_firebase);

            $user_id = "";
            $user_name = "";
             
           foreach ($res1 as $key => $result) {
          
           $user_id = $result->firebase_user_id;
           $user_name = $result->user_displayname;

           }

		 	if($res == 1){
		 		$firebase_user = array();
                $firebase_user = array(
			 			"status" => 'success',
			 			"details" => $res1
			 		);
			 	echo json_encode($firebase_user);
			 	//echo $user_name;
		 	}else{
		 		echo "error";
		 	}
		 }
		  public function deliverystatus(){
		  	// $usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 	$id=$this->input->post('id');
		 	$dat=$this->input->post('dat');
		 	$tim=$this->input->post('tim');
		 	$order_id=$this->input->post('order_id');
		 	$res = $this->delivery_modal->deliverystatus($id,$dat,$tim,$order_id);
            
            if($res==1)
            {
            	echo "success";
            }
            else
            {
            	echo "failed";
            }	


		 // 	$qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user ON user.user_id = firebase_user.firebase_user_id LEFT JOIN deliverycharge ON deliverycharge.dc_user_id = user.user_id where deliverycharge.dc_order_id ='$order_id' order By firebase_user_id DESC ";
   //         $this->load->model('Android_service');
   //          $res1 = $this->Android_service->excute_qry($qry_firebase);

   //          $user_id = "";
   //          $user_name = "";
             
   //         foreach ($res1 as $key => $result) {
          
   //         $user_id = $result->firebase_user_id;
   //         $user_name = $result->user_displayname;

   //         }

   //      $message = "Dear ".$user_name." Thank you for shopping with us, Your order no ".$order_id." has been Delivered!";

   //         $date = date('Y-m-d');	

   //         $data1= array('notification_user_id' =>$user_id ,'notification_order_id' =>$order_id,'notification_title'=>"Order Delivered",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

   //         $this->load->model('Android_service');
		 //   $res2 = $this->Android_service->common_insert('notification',$data1);


		 // 	// if($res == 1){
		 // 	// 	echo 'success';
		 // 	// }else{
		 // 	// 	echo 'failed';
		 // 	// }
		 // 	if($res == 1){
			// $firebase_user = array();
   //          $firebase_user = array(
			//  			"status" => 'success',
			//  			"details" => $res1
			//  		);
			//  	echo json_encode($firebase_user);
			// }else{
			// 	echo 'Error';
			// }
		 	
		 }

		  public function shippedstatus(){
		  	// $usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 	$id=$this->input->post('id');
		 	$dat=$this->input->post('dat');
		 	$tim=$this->input->post('tim');
		 	$order_id=$this->input->post('order_id');
		 	$res = $this->delivery_modal->shippedstatus($id,$dat,$tim,$order_id);

		 		
		 	// $qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user ON user.user_id = firebase_user.firebase_user_id LEFT JOIN deliverycharge ON deliverycharge.dc_user_id = user.user_id where deliverycharge.dc_order_id ='$order_id' order By firebase_user_id DESC ";
    //         $this->load->model('Android_service');
    //         $res1 = $this->Android_service->excute_qry($qry_firebase);

           if($res1 == '1')
            {
			    echo 'success';
			}
			else
			{
				echo 'Error';
			}
   //          $user_id = "";
   //          $user_name = "";
             
   //         foreach ($res1 as $key => $result) {
          
   //         $user_id = $result->firebase_user_id;
   //         $user_name = $result->user_displayname;

   //         }

   //         $message = "Dear ".$user_name.", Your order no ".$order_id." is on its way!";

   //         $date = date('Y-m-d');	

   //         $data1= array('notification_user_id' =>$user_id ,'notification_order_id' =>$order_id,'notification_title'=>"Out For Delivery",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

   //         $this->load->model('Android_service');
		 //   $res2 = $this->Android_service->common_insert('notification',$data1);
		 	
		 // 	if($res == '1'){
			// $firebase_user = array();
   //          $firebase_user = array(
			//  			"status" => 'success',
			//  			"details" => $res1
			//  		);
			//  	echo json_encode($firebase_user);
			// }else{
			// 	echo 'Error';
			// }
		 	
		 }
		 
		 public function deleteuser()
			{
				$userid = $this->input->post('id');


				$this->load->model('delivery_modal');
				
				$res = $this->delivery_modal->delete_user($userid);
	 				
					 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}	
			}


			public function prints()
// public function printtest($serial_no)
	{
		$ids=$this->input->get('ci');
		 	$dats=$this->input->get('d');
		 	$tims=$this->input->get('t');
		 	if($_SESSION['adminusertp'] == 'admin'){
		 		$filt = "";
		 	}else{
		 		$usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 		$filt = " AND deliverycharge.dc_agent_id = '$usrid' ";
		 	}
		 	$result = $this->delivery_modal->get_deliverymulitpledual($ids,$dats,$tims,$filt);
// create a PDF object

// $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new PDF('P', 'mm', 'STATEMENT', true, 'UTF-8', false);
//start
$pdf->SetTitle("Dentaklik-Invoice");
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//end
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nilesh Zemse');
// $pdf->SetTitle('Invoices');
// $pdf->SetSubject('Invoice');
// $pdf->SetKeywords('PDF, Invoice');


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
// $pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 15); 
// *** Very IMP: Please use times font, so that if you send this pdf file in gmail as attachment and if user
//opens it in google document, then all the text within the pdf would be visible properly.

// add a page
// $pdf->AddPage();
$page_format = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 297),
    'CropBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 297),
    'BleedBox' => array ('llx' => 5, 'lly' => 5, 'urx' => 205, 'ury' => 292),
    'TrimBox' => array ('llx' => 10, 'lly' => 10, 'urx' => 200, 'ury' => 287),
    'ArtBox' => array ('llx' => 15, 'lly' => 15, 'urx' => 195, 'ury' => 282),
    'Dur' => 3,
    'trans' => array(
        'D' => 1.5,
        'S' => 'Split',
        'Dm' => 'V',
        'M' => 'O'
    ),
    'Rotate' => 0,
    'PZ' => 1,
);

// $pdf->AddPage('P', 'LETTER', TRUE);
$pdf->AddPage('P', $page_format, false, false);
// create some HTML content
$now = date("j F, Y");
$company_name = 'Q8dental';
$timestamp = time(); 

date_default_timezone_set('Asia/Kolkata');
$timeinv = date("h:i a");
$user_name = 'username';
$invoice_ref_id = '2013/12/03/0001';

// *** IMP: The value of $html and $html_terms can come from db
// But, If these values contain, other language special characters, then
// PDF is not getting generated. in that case should find such invalid charactes and 
// make use of its htmlentity substitute 
// for ex. If copyright is invalid character then use &copy; in html content


// $html on page 1 of PDF and $html_terms are on page 2 of PDF

// <tr>
//                 <td>Dear {user_name},<br>here is your invoice.</td>
//             </tr>
$serrow = $result->row();
if(!empty($serrow)){
	$ordernoid = $serrow->dc_order_id;
}else{
	$ordernoid = '';
}

$useradd = $serrow->address_country.','.$serrow->address_area.','.$serrow->address_streetno.','.$serrow->address_blockno.','.$serrow->address_hbno;
$resagent = $this->delivery_modal->findagent($serrow->dc_agent_id);
$store = $this->delivery_modal->findstore($serrow->prod_store_id);
$addr = $this->delivery_modal->findaddress($serrow->dc_address_id);

if(!empty($addr)){
	// $useradd = 'Address - '.$addr->address_addr.',City - '.$addr->address_city.',Pincode - '.$addr->address_pincode;
	$useradd = 'Country: '.$addr->address_country.', Area: '.$addr->address_area.', Street no: '.$addr->address_streetno.', Block no: '.$addr->address_blockno.', House/Building no: '.$addr->address_hbno;
}else{
	$useradd = '';
}
if(!empty($resagent)){
	$agentdesc = 'Name - '.$resagent->user_displayname.',Mobile - '.$resagent->user_phone;
}else{
	$agentdesc = '';
}
if(!empty($store)){
	$storedesc = 'Address - '.$store->store_address.',City - '.$store->store_city.',Pincode - '.$store->store_pincode;
	$gstno = $store->store_gst;
}else{
	$storedesc = '';
	$gstno = '';
}


$html = '';
$html .= '<table >
            <tr>
                <td colspan="2" align="center"><u><h1>Invoice</b></h1></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><u>{now}</u></td>
            </tr>
            <tr>
                <td colspan="2" align="left"><u>{timeinv}</u></td>
            </tr>
         </table>';

      $serial_no = 'serialno';
      $receipt_no = 'receiptno';

$html .= '<br><br>
          <table border="1" cellpadding="5">
            <tr>
                <td colspan="3">Order No #'.$ordernoid.'</td>
               
                            
            </tr>
            
            <tr>
             <td colspan="3" >Billing Address #'.$useradd.'</td>
             </tr>
             
             <tr>
             <td colspan="3" >Shop Details #'.$storedesc.'</td>
             </tr>
            
            <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantiy</th>
                      <th>Total (tax included)</th>
                    </tr>
                  </thead>';
            
$total_cash = 0;
$subtotal = 0;
$total_tax = 0;
if($result->num_rows() > 0){
foreach($result->result() as $key => $row) {
	
	if(floatval($row->dc_prod_tax) == 0.00){
		$prodtax = 0;
		$prodtaxext = 0;
		$total_tax = 0;
	}
	
	else{
		$prodtaxext = floatval($row->dc_prod_tax);
		$prodtax = floatval($row->dc_prod_tax);
		$total_tax = $prodtax;
	}
	
	// if(floatval($row->dc_prod_commoffer) == 0.00 	){
	// 	$prdiscext = 1;
	// 	$prdisc = 0;
	// 	$total_cash = 0.00;
	
	// }
	
	// else{


		// $prdisc = $row->dc_prod_actualstoreprice;
		$prdisc = $row->dc_prod_commoffer;
		$prdiscext = $row->dc_prod_commoffer;

		$total_cash = $total_cash + $row->dc_prod_actualstoreprice+$row->dc_prod_tax;
		
	// }
		
	
	// $total_cash = $prdiscext + $total_tax;
	
	
	// if($row->dc_cancel_order == 0){
	// 	$subtotal = $subtotal + $prdisc;	
 //        $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge;               
         
 //  	}
 //  	if($row->order_status == 1 && $row->dc_cancel_order == 1){
     
 //      $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
 //  	}
 //   	if($row->order_status == 0 && $row->dc_cancel_order == 1){
 //      $subtotal = $subtotal + 0;
 //      $deliverycharge = 0 ;
 //  	}
  	if($row->order_status == 0 && $row->dc_cancel_order == 1){
                  }else{
                    if($row->order_status == 1 && $row->dc_cancel_order == 1){
                      $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                    }else{


                      
                      if($row->dc_cancel_order == 0 ){
                        $subtotal = $subtotal + $row->dc_prod_commoffer ;
                        $deliverycharge = $row->dc_deliveryboy_charge + $row->dc_deliveryowner_charge ;
                      }
                      


                      }
                    } 
	
    $html .= '<tr>
        <td>' . $row->dc_prod_name.' ,'.$row->dc_prod_measure . '</td>
        <td>' . $row->cart_quantity . '</td>
        <td> €' . number_format($prdisc,2) . '</td>
    </tr>';
    
}
}

$html .= '
<tr>
		<td align="right" colspan="5"><b>Delivery Charge (Rs.)  '.number_format($row->dc_deliveryowner_charge,2).'</b></td>
</tr>
<tr>

                <td align="right" colspan="5"><b>Total Amount (Rs.)  '.number_format($subtotal+$row->dc_deliveryowner_charge,2).'</b></td>
                
            </tr>
		</table>';

// $html .= '<br><br>Some more text can come here...';

$html = str_replace('{now}',$now, $html);
$html = str_replace('{timeinv}',$timeinv, $html);
$html = str_replace('{company_name}',$company_name, $html);
$html = str_replace('{user_name}',$user_name, $html);
$html = str_replace('{invoice_ref_id}',$invoice_ref_id, $html);


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// add a page
// $pdf->AddPage();

// $html_terms = '
//         <table>
//             <tr>
//                 <td colspan="2"><u><b>Terms & Conditions</b></u></td>
//             </tr>
            
//             <tr>
//                 <td colspan="2" align="right">
//                 <ul>
//                     <li>Point one</li>
//                     <li>Point two</li>
//                     <li>Point three</li>
//                     <li>Point four</li>
//                     <li>Point five</li>
//                     <li>Point six</li>
//                     <li>Point seven</li>
//                     <li>Point eight</li>
//                     <li>Point nine</li>
//                     <li>Point ten</li>
//                 </ul>
//                 </td>
//             </tr>

//         </table>
//         ';
// // output the HTML content
// $pdf->writeHTML($html_terms, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf_file_name = 'invoice'.date("j F, Y").'.pdf';
$pdf->Output($pdf_file_name, 'I');
	}


public function invoiceprint()
{
	

	$uniqorderid = $this->input->get('od');

	$orderuserid = $this->input->get('uid');
    
    $this->load->model('TootModel');

    // $getinvoicedetils = $this->Checkout_model->getorderdetlsforinvoice($uniqorderid,$orderuserid);

    // $getordergenraldtls = $this->Checkout_model->getordergnrldtlsadmin($uniqorderid);

    $getinvoicedetils=$this->TootModel->getorderinvoicedtlscheck($orderuserid,$uniqorderid);


    $getordergenraldtls=$this->TootModel->getordergenraldtlscheck($orderuserid,$uniqorderid);
    
    $adrsid = $getordergenraldtls->orders_adrs_id;

        $orderadrs = $this->TootModel->getorderadrs($adrsid);

    $finalcheck_amnt=$getordergenraldtls->orders_total_offer_amount;
    
    // $this->load->view('frontendtables/display_invoice',$getinvoicedetils);
   $a=array(
     'ordergen'=>$getordergenraldtls,
     'ordid'=>$uniqorderid,
     'orderadrs'=>$orderadrs,
     'offertot'=>$finalcheck_amnt,
     'res'=>$getinvoicedetils     
   );
   
    
    // 'content'=>'invoice_view'
    // $this->load->view('admintemplate',$a);
   $this->load->view('admin_invoice_view',$a);
    
}		




public function cancelorderfull()
    {

    	$orderid = $this->input->post('orderid');


    	$data_dc=array('dc_cancel_order'=>1);

    	$data_orders=array('orders_cancel_status'=>1);

    	$res = $this->delivery_modal->cancelorderfull($orderid,$data_dc,$data_orders);

    	if($res==1)
    	{
    		echo "success";
    	}
    	else
    	{
    		echo "failed";
    	}


    }

		
	



}
