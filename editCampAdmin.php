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
} else if ($campaign_typeId1 == 3) {
    $fundtitle = $product_name;
} else {
    $fundtitle = $fundraiser_title;
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