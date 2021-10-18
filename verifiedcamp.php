<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $id, OBJECT);
$res = $results[0];
if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
    $goal_amount = $res->item_qty;
    $currency = 'QTY';
} else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
    $goal_amount = $res->product_price * $res->product_qty;
    $currency = $res->currency;
} else {
    $fundtitle = $res->fundraiser_title;
    $goal_amount = $res->goal_amount;
    $currency = $res->currency;
}

$campTypeId = $res->campaign_typeId;
$targetDate = $res->end_date;

$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $id . ")", ARRAY_A);
$achieve_amount = 0;
foreach ($resultsdonacc as $tt) {
    if ($tt['campaign_typeId'] == 3) {
        $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
    } else {
        $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
    }
    $achieve_amount += $achieve_amountn;
}

if ($res->image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
} else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
}

$userId = $res->userId;
$resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
$user_email = $resultsusers[0]->user_email;
$display_name = $resultsusers[0]->display_name;
$all_meta_for_user = get_user_meta($resultsusers[0]->ID);
$phone = $all_meta_for_user['billing_phone'][0];

$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $res->campaign_typeId, OBJECT);
$res = $results[0];
$campt = $resultsc[0]->title;

$detaillink = BASE_URL . "fundraiser-detail-admin/?id=" . $id;

$subjectnn = "ZED$id - $campt - $fundtitle - $res->address - Has been approved and verified by ZedAid, you can track the progress at : $detaillink";

$to = $user_email;
$subject = "ZED$id - $campt - $fundtitle - $address - Has been approved and verified by ZedAid";
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if($campTypeId == 1) {
    $file = 'email/fundraiser_admin_verified.html';    
} else {
    $file = 'email/camp_admin_verified.html';
}


$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{Name}}', $display_name , $message2);
$message2 = str_replace('{{campaign Name}}', $fundtitle , $message2);
$message2 = str_replace('{{title}}', $fundtitle , $message2);
$message2 = str_replace('{{UNIT}}', $currency , $message2);
$message2 = str_replace('{{AMOUNT}}', number_format($goal_amount) , $message2);
$message2 = str_replace('{{TARGET_DATE}}', date("d M Y", strtotime($targetDate)) , $message2);

// Compose a simple HTML email message
/*$message = '<html><body>';
$message .= '<h3>Hello, ' . $display_name . '</h3>';
$message .= '<p style="font-size:18px;">Your campaign <b>' . $fundtitle . '</b> has beed approved and verified by admin.</p>';
$message .= '<h4>Campaign Details:</h4>';
$message .= '<p><b>Campaign Title:</b>' . $fundtitle . '</p>';
$message .= '<div style="background: url(' . $iimage . ') center center;background-size: cover;"></div>';
$message .= html_entity_decode($res->short_description);
$message .= '<p><b>Goal Amount:</b>' . $currency . ' ' . $goal_amount.'</p>';
$message .= '<p><b>Achived Amount:</b>' . $currency . ' ' . $achieve_amount.'</p>';
$message .= '</body></html>';*/

wp_mail($to, $subject, $message2, $headers);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"$subjectnn\",\"to\":[\"$phone\"]}]}",
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

$sql21 = $wpdb->prepare(
    "UPDATE `wp_campaigns` SET `admin_approved` = 1, `zed_verified` = 1 WHERE id = " . $id
);
$wpdb->query($sql21);

echo '1';
exit;
