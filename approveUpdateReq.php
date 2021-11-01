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
