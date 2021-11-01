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

$admin_approved = $_POST['admin_approved'];
$zed_verified = $_POST['zed_verified'];
$campaign_id = $_POST['campaign_id'];
$campaign_typeId1 = $_POST['campaign_typeId1'];
$lives_count = $_POST['lives_count'];
$currency = $_POST['currency'];
$goal_amount = $_POST['goal_amount'];
$fundraiser_title = $_POST['fundraiser_title'];
$user_type = $_POST['user_type'];

if ($user_type == 'ngo'){
    $ngo_name = $_POST['ngo_name'];
    $individual_person = NULL;
    $beneficiary_name = NULL;
    $cause = NULL;

}else{
    $ngo_name = NULL;
    $individual_person = $_POST['individual_person'];
    $beneficiary_name = $_POST['beneficiary_name'];
    $cause = $_POST['cause'];
}


$update_by = $_POST['update_by'];
$item_name = $_POST['item_name'];
$item_qty = $_POST['item_qty'];
$location_of_need = $_POST['location_of_need'];
$end_date = date('Y-m-d',strtotime($_POST['end_date']));
$product_name = $_POST['product_name'];
$product_qty = $_POST['product_qty'];
$product_price = $_POST['product_price'];
$product_location_of_need = $_POST['product_location_of_need'];
if ($campaign_typeId1 == 2) {
    
    $fundtitle = $item_name;
    $goal_amount = $item_qty;
    $currency = 'QTY';
} else if ($campaign_typeId1 == 3) {
    $fundtitle = $product_name;
    $goal_amount = $product_price * $product_qty;
    $currency = $currency;
} else {
    $fundtitle = $fundraiser_title;
    $goal_amount = $goal_amount;
    $currency = $currency;
}
$img_type = $_POST['img_type'];
//$video = $_POST['video'];

$status = $_POST['status'];


$short_description = $_POST['short_description'];
/*
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
}*/
// echo $file_tmp;
// echo "fundraiserimg/" . $file_name;
// exit;
// echo  "INSERT INTO `wp_campaigns`      
// (userId, campaign_typeId, lives_count, address, latitude, longitude, fundraiser_title, currency, goal_amount, user_type, ngo_name, individual_person, beneficiary_name, cause, item_name, item_qty, location_of_need,product_name,product_qty,product_price,product_location_of_need, image, video, short_description, end_date, created_at) 
// values ('" . $userId . "','" . $campaign_typeId . "','" . $lives_count . "','" . $address . "','" . $latitude . "','" . $longitude . "','" . $fundraiser_title . "','" . $currency . "','" . $goal_amount . "','" . $user_type . "','" . $ngo_name . "','" . $individual_person . "','" . $beneficiary_name . "','" . $cause . "','" . $item_name . "','" . $item_qty . "','" . $location_of_need . "','" . $product_name . "','" . $product_qty . "','" . $product_price . "','" . $product_location_of_need . "','" . $image . "','" . $video . "','" . $short_description . "','".$end_date."', '".$created_at."')"; 
// exit;

if($img_type == "image"){
    if(!empty($_FILES['myFile']['name'])){
        $temp = explode(".", $_FILES["myFile"]["name"]);
        $filename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "fundraiserimg/" . $filename);
    }else{
        $filename = $_POST['myFile'];
    }
    $video = NULL;
}else{
    
    $filename = NULL;
    
    $video = $_POST['video'];

}






$resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
$user_email = $resultsusers[0]->user_email;
$display_name = $resultsusers[0]->display_name;
$all_meta_for_user = get_user_meta($resultsusers[0]->ID);
$phone = $all_meta_for_user['billing_phone'][0];

$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $campaign_typeId, OBJECT);
$res = $results[0];
$campt = $resultsc[0]->title;

$detaillink = BASE_URL . "campaign-detail/?id=" . $id;

$subjectnn = "ZED$id - $campt - $fundtitle - $address - Has been approved and verified by ZedAid, you can track the progress at : $detaillink";

$to = $user_email;
$subject = "ZED$id - $campt - $fundtitle - $address - Campaign Details has been updated  by ZedAid";
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();



$file = 'email/camp_adminupdate.html';
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
    "UPDATE wp_campaigns SET lives_count = '".$lives_count."', address = '".$address."', latitude = '".$latitude."', longitude = '".$longitude."',img_type ='".$img_type."',  image = '".$filename."',video = '".$video."' ,fundraiser_title = '".$fundraiser_title."', goal_amount = '".$goal_amount."', user_type = '".$user_type."', ngo_name = '".$ngo_name."',individual_person = '".$individual_person."', beneficiary_name = '".$beneficiary_name."', cause = '".$cause."', item_name = '".$item_name."', item_qty = '".$item_qty."',location_of_need = '".$location_of_need."', product_name = '".$product_name."', product_qty = '".$product_qty."', product_price = '".$product_price."' ,product_location_of_need = '".$product_location_of_need."', short_description = '".$short_description."', end_date = '".$end_date."', created_at = '".$created_at."', status = '".$status."' WHERE id =". $campaign_id
);
$wpdb->query($sql21);

$sql22 = $wpdb->prepare(
        "INSERT INTO `wp_campaignsedit`      
           (campaignedit_id,admin_approved,zed_verified,userId, campaign_typeId, lives_count, address, latitude, longitude, fundraiser_title, currency, goal_amount, user_type, ngo_name, individual_person, beneficiary_name, cause, item_name, item_qty, location_of_need,product_name,product_qty,product_price,product_location_of_need,img_type, image, video, short_description, end_date, created_at,update_status,update_by) 
     values ('" . $campaign_id . "','" . $admin_approved . "','" . $zed_verified . "','" . $userId . "','" . $campaign_typeId1 . "','" . $lives_count . "','" . $address . "','" . $latitude . "','" . $longitude . "','" . $fundraiser_title . "','" . $currency . "','" . $goal_amount . "','" . $user_type . "','" . $ngo_name . "','" . $individual_person . "','" . $beneficiary_name . "','" . $cause . "','" . $item_name . "','" . $item_qty . "','" . $location_of_need . "','" . $product_name . "','" . $product_qty . "','" . $product_price . "','" . $product_location_of_need . "','" . $img_type . "','" . $filename . "','" . $video . "','" . $short_description . "','".$end_date."', '".$created_at."','1','".$update_by."')"
    );
$wpdb->query($sql22);



header("Location: " . BASE_URL . "edit-campaign-admin/?id=".$campaign_id);