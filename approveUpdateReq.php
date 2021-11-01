<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaignsedit WHERE id =" . $id, OBJECT);
$res = $results[0];
$fundraiser_title = $res->fundraiser_title;

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

$ngo_name = $res->ngo_name;
$individual_person = $res->individual_person;
$beneficiary_name = $res->beneficiary_name;
$cause = $res->cause;
$user_type = $res->user_type;

$product_name = $res->product_name;
$product_location_of_need  = $res->product_location_of_need;
$end_date = $res->end_date;
$product_price = $res->product_price;
$product_qty = $res->product_qty;

$item_qty = $res->item_qty;
$item_name = $res->item_name;
$location_of_need = $res->location_of_need;

$goal_amount = $res->goal_amount;
$currency = $res->currency;
$lives_count = $res->lives_count;
$address = $res->address;
$latitude = $res->latitude;
$longitude = $res->longitude;

$campaignedit_id = $res->campaignedit_id;
$campTypeId = $res->campaign_typeId;
$achieve_amount = $res->achieve_amount;

$status = $res->status;
$img_type = $res->img_type;
$image = $res->image;
$video = $res->video;

$short_description = $res->short_description;
$created_at = $res->created_at;

$userId = $res->userId;




$resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
$user_email = $resultsusers[0]->user_email;
$display_name = $resultsusers[0]->display_name;
$all_meta_for_user = get_user_meta($resultsusers[0]->ID);
$phone = $all_meta_for_user['billing_phone'][0];

$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $res->campaign_typeId, OBJECT);
$res = $results[0];
$campt = $resultsc[0]->title;

$detaillink = BASE_URL . "campaign-detail/?id=" . $id;

$subjectnn = "ZED$id - $campt - $fundtitle - $res->address - Has been approved and verified by ZedAid, you can track the progress at : $detaillink";

$to = $user_email;
$subject = "ZED$id - $campt - $fundtitle - $address - Update Request has been approved and verified by ZedAid";
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();



$file = 'email/camp_editapproved.html';
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

$sql21 = $wpdb->prepare(
    "UPDATE `wp_campaignsedit` SET `update_status` = 1 WHERE id = " . $id
);


$wpdb->query($sql21);

$sql22 = $wpdb->prepare(
    "UPDATE wp_campaigns SET lives_count = '".$lives_count."', address = '".$address."', latitude = '".$latitude."', longitude = '".$longitude."',img_type ='".$img_type."',  image = '".$image."',video = '".$video."' ,fundraiser_title = '".$fundraiser_title."', goal_amount = '".$goal_amount."', user_type = '".$user_type."', ngo_name = '".$ngo_name."',individual_person = '".$individual_person."', beneficiary_name = '".$beneficiary_name."', cause = '".$cause."', item_name = '".$item_name."', item_qty = '".$item_qty."',location_of_need = '".$location_of_need."', product_name = '".$product_name."', product_qty = '".$product_qty."', product_price = '".$product_price."' ,product_location_of_need = '".$product_location_of_need."', short_description = '".$short_description."', end_date = '".$end_date."', created_at = '".$created_at."', status = '".$status."' WHERE id =". $campaignedit_id
);
$wpdb->query($sql22);

//$sql33= $sql21.";".$sql22;
//$mysqli->multi_query($sql33);

//echo '1';
exit;
