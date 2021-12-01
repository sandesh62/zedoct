<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$donateId = $_POST['id'];
$donate_comment = $_POST['donate_comment'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE id = " . $donateId, OBJECT);

$res = $results[0];

$fullname = $res->fullName;
$email = $res->emailId;
$phone = $res->phonenumber;
$amount = $res->amount;
$campaign_id = $res->campaign_Id;

$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id = " . $campaign_id, OBJECT);

if ($resultsc->campaign_typeId == 2) {
    $fundtitle = $resultsc->item_name;
    $currency = 'QTY';
   
} else if ($resultsc->campaign_typeId == 3) {
    $fundtitle = $resultsc->product_name;
    $currency = $resultsc->currency;
    
} else {
    $fundtitle = $resultsc->fundraiser_title;
    $currency = $resultsc->currency;
   
}




$to = $email;
$subject = 'Thankyou for the donation';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/donation_comment.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{Name}}', $fullname , $message2);
$message2 = str_replace('{{campaign Name}}', $fundtitle , $message2);
$message2 = str_replace('{{comment}}', $donate_comment , $message2);
$message2 = str_replace('{{UNIT}}', $currency , $message2);
$message2 = str_replace('{{amount}}', $amount , $message2);

// Compose a simple HTML email message
/*$message = '<html><body>';
$message .= '<h3>Hello, ' . $display_name . '</h3>';
$message .= '<p style="font-size:18px;">You got one donation request on campaign <b>' . $fundtitle . '</b>.</p>';
$message .= '<h4>Campaign Details:</h4>';
$message .= '<p><b>Campaign Title:</b>' . $fundtitle . '</p>';
$message .= '<div style="background: url(' . $iimage . ') center center;background-size: cover;"></div>';
$message .= html_entity_decode($recs->short_description);
$message .= '<p><b>Goal Amount:</b>' . $currency . ' ' . $goal_amount.'</p>';
$message .= '<p><b>Achived Amount:</b>' . $currency . ' ' . $achieve_amount.'</p>';
$message .= '</body></html>';*/

wp_mail($to, $subject, $message2, $headers);

/*
$curl = curl_init();
if ($res->campaign_typeId == 3) {
    $smstext = 'You have got one donation request on ZedAid campaign '.$fundtitle;
}else{
    $smstext = 'You have got one donation request on ZedAid campaign '.$fundtitle;
}
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"DLT_TE_ID\":\"1307163394028199382\",\"sms\":[{\"message\":\"$smstext\",\"to\":[\"$phone\"]}]}",
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

*/


$wpdb->query($wpdb->prepare("UPDATE wp_campaigndonations SET `comment` = '".$donate_comment."'  WHERE id=$donateId"));



 exit;
// header("Location: " . BASE_URL . "donate-thank-you/");



