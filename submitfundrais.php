<?php
date_default_timezone_set('Asia/Kolkata'); // your user's timezone
$created_at = date('Y-m-d H:i:s');
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];
$address = $_POST['address'];
$url = "https://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$responseJson = curl_exec($ch);
curl_close($ch);
$response = json_decode($responseJson);
if ($response->status == 'OK') {
    $latitude = $response->results[0]->geometry->location->lat;
    $longitude = $response->results[0]->geometry->location->lng;
} else {
    $latitude = '0';
    $longitude = '0';
}
$campaign_typeId = $_POST['campaign_typeId'];
$lives_count = $_POST['lives_count'];
$currency = $_POST['currency'];
$goal_amount = $_POST['goal_amount'];
$fundraiser_title = $_POST['fundraiser_title'];
$user_type = $_POST['user_type'];
$ngo_name = $_POST['ngo_name'];
$individual_person = $_POST['individual_person'];
$beneficiary_name = $_POST['beneficiary_name'];
$cause = $_POST['cause'];
$item_name = $_POST['item_name'];
$item_qty = $_POST['item_qty'];
$location_of_need = $_POST['location_of_need'];
$end_date = date('Y-m-d',strtotime($_POST['end_date']));
$product_name = $_POST['product_name'];
$product_qty = $_POST['product_qty'];
$product_price = $_POST['product_price'];
$product_location_of_need = $_POST['product_location_of_need'];
if ($campaign_typeId == 2) {
    $fundtitle = $item_name;
} else if ($campaign_typeId == 3) {
    $fundtitle = $product_name;
} else {
    $fundtitle = $fundraiser_title;
}
$img_type = $_POST['img_type'];
$video = $_POST['video'];
$short_description = $_POST['short_description'];
$image = "";
if ($img_type == 'image') {
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        $file_name = rand() . $file_name;
        move_uploaded_file($file_tmp, "fundraiserimg/" . $file_name);
        $image = $file_name;
    }
} else {
    $video = $_POST['video'];
}
if ($image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $image;
} else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
}
// echo $file_tmp;
// echo "fundraiserimg/" . $file_name;
// exit;
// echo  "INSERT INTO `wp_campaigns`      
// (userId, campaign_typeId, lives_count, address, latitude, longitude, fundraiser_title, currency, goal_amount, user_type, ngo_name, individual_person, beneficiary_name, cause, item_name, item_qty, location_of_need,product_name,product_qty,product_price,product_location_of_need, image, video, short_description, end_date, created_at) 
// values ('" . $userId . "','" . $campaign_typeId . "','" . $lives_count . "','" . $address . "','" . $latitude . "','" . $longitude . "','" . $fundraiser_title . "','" . $currency . "','" . $goal_amount . "','" . $user_type . "','" . $ngo_name . "','" . $individual_person . "','" . $beneficiary_name . "','" . $cause . "','" . $item_name . "','" . $item_qty . "','" . $location_of_need . "','" . $product_name . "','" . $product_qty . "','" . $product_price . "','" . $product_location_of_need . "','" . $image . "','" . $video . "','" . $short_description . "','".$end_date."', '".$created_at."')"; 
// exit;
$sql2 = $wpdb->prepare(
    "INSERT INTO `wp_campaigns`      
       (userId, campaign_typeId, lives_count, address, latitude, longitude, fundraiser_title, currency, goal_amount, user_type, ngo_name, individual_person, beneficiary_name, cause, item_name, item_qty, location_of_need,product_name,product_qty,product_price,product_location_of_need, image, video, short_description, end_date, created_at) 
 values ('" . $userId . "','" . $campaign_typeId . "','" . $lives_count . "','" . $address . "','" . $latitude . "','" . $longitude . "','" . $fundraiser_title . "','" . $currency . "','" . $goal_amount . "','" . $user_type . "','" . $ngo_name . "','" . $individual_person . "','" . $beneficiary_name . "','" . $cause . "','" . $item_name . "','" . $item_qty . "','" . $location_of_need . "','" . $product_name . "','" . $product_qty . "','" . $product_price . "','" . $product_location_of_need . "','" . $image . "','" . $video . "','" . $short_description . "','".$end_date."', '".$created_at."')"
);
$wpdb->query($sql2);
$lastid = $wpdb->insert_id;
$user_info = get_userdata($userId);
$resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
$user_emailu = $resultsusers[0]->user_email;
$display_name = $resultsusers[0]->display_name;
$all_meta_for_user = get_user_meta($resultsusers[0]->ID);
$phoneu = $all_meta_for_user['billing_phone'][0];
$detaillink = BASE_URL . "campaign-detail-admin/?id=" . $lastid;
$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $campaign_typeId, OBJECT);
$res = $results[0];
$campt = $resultsc[0]->title;
//////
$subjectnn = "ZED$lastid - $campt - $fundtitle - $address - Has been initiated and waiting for ZedAid approval, it may take 48 hours to activate. Link : $detaillink";
$to2 = $user_emailu;
$subject2 = "ZED$lastid - $campt - $fundtitle - $address - Has been initiated and waiting for ZedAid approval";
$from2 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers2 .= 'From: ZED Foundation <' . $from2 . '>' . "\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from2 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$file = 'email/camp_created.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));
$message2 = str_replace('{{Name}}', $display_name , $message2);
$message2 = str_replace('{{campaign Name}}', $fundtitle , $message2);
$message2 = str_replace('{{title}}', $fundtitle , $message2);
$detaillink = BASE_URL . "campaign-detail/?id=" . $lastid;
$message2 = str_replace('{{RESET_LINK}}', $detaillink , $message2);
// Compose a simple HTML email message
// $message2 = '<html><body>';
// $message2 .= '<h3>Hello, ' . $display_name . '</h3>';
// $message2 .= '<p style="font-size:18px;">Your campaign created successfully. Thanks for showing your interest in ZED.</p>';
// $message .= '<h4>Campaign Details:</h4>';
// $message .= '<p><b>Campaign Title:</b>' . $fundtitle . '</p>';
// $message .= '<div style="background: url(' . $iimage . ') center center;background-size: cover;"></div>';
// $message .= html_entity_decode($short_description);
// $message .= '<p><b>Goal Amount:</b>' . $currency . ' ' . $goal_amount.'</p>';
// $message .= '</body></html>';
wp_mail($to2, $subject2, $message2, $headers2);

$smstext = 'Dear '.$display_name.', your campaign '.$fundtitle.' is created successfully. ZedAid will review it and approve soon within 24 hours.';
$curl2 = curl_init();
curl_setopt_array($curl2, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"DLT_TE_ID\":\"1307162620976143979\",\"sms\":[{\"message\":\"$smstext\",\"to\":[\"$phoneu\"]}]}",
    CURLOPT_HTTPHEADER => array(
        "authkey: 328268AKM9eIBEQ5eb00746P1",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
    ),
));
$response2 = curl_exec($curl2);
$er2r = curl_error($curl2);
curl_close($curl2);
if ($er2r) {
    // echo "cURL Error #:" . $err;
} else {
    // echo $response;
}
//////
$subjectnn = "ZED$lastid - $campt - $fundtitle - $address - Has been initiated and needs your approval. Link : $detaillink";
$to = 'info@zedaid.org';
$subject = "ZED$lastid - $campt - $fundtitle - $address - Has been initiated and needs your approval";
$from = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>' . "\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$file = 'email/camp_approval.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message = fread($myfile,filesize($file));
$message = str_replace('{{campaign Name}}', $fundtitle , $message);
$message = str_replace('{{title}}', $fundtitle , $message);
$message = str_replace('{{UNIT}}', $currency , $message);
$message = str_replace('{{AMOUNT}}', $goal_amount , $message);
// Compose a simple HTML email message
// $message = '<html><body>';
// $message .= '<h3>Hello, admin</h3>';
// $message .= '<p style="font-size:18px;">Your have one campaign request, Name: <b>' . $fundtitle . '</b>.</p>';
// $message .= '<h4>Campaign Details:</h4>';
// $message .= '<p><b>Campaign Title:</b>' . $fundtitle . '</p>';
// $message .= '<div style="background: url(' . $iimage . ') center center;background-size: cover;"></div>';
// $message .= html_entity_decode($short_description);
// $message .= '<p><b>Goal Amount:</b>' . $currency . ' ' . $goal_amount.'</p>';
// $message .= '</body></html>';
wp_mail($to, $subject, $message, $headers);

$smstextAdmin = 'Dear Admin, you have received a new campaign for approval on ZedAid. Kindly approve. Link : '.$detaillink;
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"DLT_TE_ID\":\"1307163394000623430\",\"sms\":[{\"message\":\"$smstextAdmin\",\"to\":[\"9892489040\"]}]}",
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
header("Location: " . BASE_URL . "thank-you/?id=" . $lastid);
