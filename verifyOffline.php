<?php
require_once('wp-config.php');
//require("wp-load.php");

$servername = 'localhost';
$database = 'zed';
$username = 'root';
$password = 'Shopotito@123';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('config.php');
require("wp-load.php");
require('tcpdf/tcpdf.php');
session_start();

$campaign_Id = $_GET['campaign_Id'];

$html = "<p>Your payment was successful</p>";

$results = $conn->query("SELECT * FROM wp_campaigns WHERE id =" . $campaign_Id);
$row = mysqli_fetch_assoc($results);

$res = (object) $row;

if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
} else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
} else {
    $fundtitle = $res->fundraiser_title;
}

$razorpay_order_id = $_GET['razorpay_order_id'];

$results1 = $conn->query("SELECT * FROM wp_campaigndonations WHERE razorpay_order_id = '" . $razorpay_order_id."'");
$row1 = mysqli_fetch_assoc($results1);
$res1 = (object) $row1;

/* $results1 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE razorpay_order_id =" . $razorpay_order_id, OBJECT);
echo "<pre>"; print_r($results1);
$res1 = $results1[0]; */

$amount = $res1->amount;

$userId = $res->userId;
$resultsusers = $conn->query("SELECT * FROM wp_users WHERE id = " . $userId);
$rowusers = mysqli_fetch_assoc($resultsusers);
$resultsusers = (object) $rowusers;

$user_email = $resultsusers->user_email;
$display_name = $resultsusers->display_name;

$phone = "";//$phonenumber;

if($res->user_type == "ngo") {
    $on_behalf_of = $res->ngo_name;       
}else {
    $on_behalf_of = $display_name;       
}

$shareurl = BASE_URL . 'campaign-detail/?id=' . $campaign_Id;


/* Email sent to the Campaigner*/
$to = $user_email;
$subject = 'Donation raised by user';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h3>Hello, ' . $display_name . '</h3>';
$message .= '<p style="font-size:18px;">You got one donation request on campaign <b>' . $fundtitle . '</b>.</p>';
$message .= '</body></html>';

wp_mail($to, $subject, $message, $headers);

$sqllog = "INSERT INTO wp_logs (module,request,response) VALUES ('RazorPayment_Email_Campaigner','" . $to . "','". $message ."')";
$conn->query($sqllog);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"You got one donation request on campaign $fundtitle.\",\"to\":[\"$meta_valuephone\"]}]}",
    CURLOPT_HTTPHEADER => array(
        "authkey: 328268AKM9eIBEQ5eb00746P1",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    // echo "cURL Error #:" . $err;
} else {
    // echo $response;
}
//////

$to2 = 'info@zedaid.org';
$subject2 = 'Donation raised by user';
$from2 = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message2 = '<html><body>';
$message2 .= '<h3>Hello, admin</h3>';
$message2 .= '<p style="font-size:18px;">Fundraiser got one donation request on campaign <b>' . $fundtitle . '</b>.</p>';
$message2 .= '</body></html>';

wp_mail($to2, $subject2, $message2, $headers2);

$sqllog = "INSERT INTO wp_logs (module,request,response) VALUES ('RazorPayment_Email_Admin','" . $to . "','". $message2 ."')";
$conn->query($sqllog);

$phone2 = '9408781162';

$curl2 = curl_init();

curl_setopt_array($curl2, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"Fundraiser got one donation request on campaign $fundtitle.\",\"to\":[\"$phone2\"]}]}",
    CURLOPT_HTTPHEADER => array(
        "authkey: 328268AKM9eIBEQ5eb00746P1",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
    ),
));

$response2 = curl_exec($curl2);
$err2 = curl_error($curl2);

curl_close($curl2);

if ($err2) {
    // echo "cURL Error #:" . $err;
} else {
    // echo $response;
}
/////

$perc = ($amount * 2) / 100;
$zedprice = $amount - $perc;

$perc2 = ($zedprice * 2) / 100;
$zedprice2 = $zedprice - $perc2;

$achieve_amount =  $res->achieve_amount ? $res->achieve_amount : 0;
$achieve_amountn = $achieve_amount + $zedprice2;

$sqliu = "UPDATE `wp_campaigns` SET `achieve_amount` = $amount WHERE id = " . $campaign_Id;
$conn->query($sqliu);

//$sqli = "INSERT INTO wp_campaigndonations (userId,invoice_id,razorpay_payment_id,paymetStatus,campaign_Id, campaign_typeId, anonymous, fullName, emailId, phonenumber, address, campaignCreator, zed, zedFoundation, amount, status) VALUES ('" . $userId . "','0','" . $razorpay_payment_id . "','1','" . $campaign_Id . "','" . $campaign_typeId . "','" . $anonymous . "','" . $fullName . "','" . $emailId . "','" . $phonenumber . "','" . $address . "','" . $zedprice2 . "','" . $perc . "','" . $perc2 . "','" . $amount . "','1')";

//$sqli = "INSERT INTO wp_campaigndonations (invoice_id,razorpay_payment_id,paymetStatus) VALUES ('" . $userId . "','0','" . $razorpay_payment_id . "','".$paymetStatus."')";
// $conn->query($sqli);
    
//if ($conn->query($sqli) === TRUE) {
$result_arr = $conn->query("SELECT * FROM wp_campaigndonations WHERE razorpay_order_id = '".$razorpay_order_id."'");
$result_arr_record = mysqli_fetch_assoc($result_arr);
$result_obj_record = (object) $result_arr_record;
$last_id = $result_obj_record->id;

$invoice_id = date("Y").date("m").$last_id;
$sql_update = "UPDATE wp_campaigndonations SET invoice_id = '".$invoice_id."', paymetStatus = '1' WHERE razorpay_order_id = '".$razorpay_order_id."'";
$conn->query($sql_update);

session_start();
$_SESSION['donationId'] = $last_id;

/* Generate PDF */
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ZedAid');
$pdf->SetTitle('ZedAid Invoice');
$pdf->SetSubject('ZedAid Invoice');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(0, 0, 0);
$pdf->setPrintHeader(false);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '<table style="background-color: #fff; color: #222" cellpadding="10">
<tbody>
<tr>
<td width="100%" align="center"><img src="https://zedaid.org/wp-content/themes/zed/images/zed.png" width="50"/></td>
</td>
</tbody>
</table>';
$html .= '
<table cellpadding="10">
<tbody>
<tr>
<td>Dear Donar , please find attached the donation receipt and the payment will reflect online in next 48 hrs. 
</td>
</tr>
<tr>
<td><b>Invoice:</b><br/>
&nbsp; Invoice Number: '.$invoice_id.' <br/>
&nbsp; Receipt Date: '.date("Y-m-d").' <br/>
&nbsp; Name: '.$display_name.' <br/>
&nbsp; Number: '.$phonenumber.'
</td>
</tr>
</tbody>
</table>';
$html .= '<br><br>';
$html .= '
<table cellpadding="10" border="1" align="center">
<tbody>
<tr>
<td>Donation Amount</td>
<td>INR '.$amount.'</td>
</tr>
<tr>
<td>Total</td>
<td>INR '.$amount.'</td>
</tr>
</tbody>
</table>';
$html .= '<br><br>';
$html .= '
<table cellpadding="10">
<tbody>
<tr>
<td><b>Please Note:</b><br/>
Dear Consumer, the bill payment will reflect in next 48 hours or in the next billing cycle, at your service provider’s end. 
</td>
</tr>
</tbody>
</table>';
$html .= '<br><br>';
$html .= '
<table cellpadding="10">
<tbody>
<tr>
<td><b>DECLARATION:</b><br/>
    This is not an invoice but only a confirmation of the receipt of the donation paid against campaign. 

</td>
</tr>
</tbody>
</table>';
$html .= '<br><br>';
$html .= '
<table cellpadding="10" align="center">
<tbody>
<tr>
<td>(This is computer generated receipt and does not require physical signature.)</td>
</tr>
<tr>
<td><a href="https://zedaid.org/term-of-use/">Terms & Conditions*</a></td>
</tr>
</tbody>
</table>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
/* ob_end_clean(); */
//Close and output PDF document

$file_path = '/var/www/html/zedaid/wp-content/uploads/';
$file_name = 'invoice_'.rand('1111','9999').time().'.pdf';
$full_path = $file_path.$file_name;
$pdf->Output($full_path, 'F');
/* End */

/* email sent to the Donor*/
$to = $emailId;
$subject = 'Receipt for Donation!';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/invoice_email.html'; 
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{Name}}', $display_name , $message2);
$message2 = str_replace('{{LINK}}', $shareurl , $message2); 
$message2 = str_replace('{{CAMPAIGNER NAME}}', $on_behalf_of , $message2);
$message2 = str_replace('{{TITLE}}', $fundtitle , $message2);
$message2 = str_replace('{{DONATION_AMOUNT}}', $currency ." ". $amount , $message2);
$message2 = str_replace('{{INVOICE_NUMBER}}', $invoice_id , $message2); 

wp_mail($to, $subject, $message2, $headers, $full_path);


$sqllog = "INSERT INTO wp_logs (module,request,response) VALUES ('RazorPayment_Email_Admin','" . $fundtitle . "','". $message2 ."')";
$conn->query($sqllog);


$html = '';
header("Location: https://zedaid.org/donation-thank-you/");
