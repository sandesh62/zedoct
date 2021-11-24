<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$pid = $_POST['pid'];
$supportDetails = $_POST['supportDetails'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
/*
$wpdb->insert('wp_support_change_status', array(
    'floodCrisisId' => $pid,
    'userId' => $userId,
    'name' => $name,
    'mobileNumber' => $phone_number,
    'email' => $email,
    'supportDetails' => $supportDetails,
    'createdAt' => date("Y-m-d H:i:s"),
));*/
$date = date("Y-m-d H:i:s");
$last_status_updated_id = $wpdb->insert_id;

$wpdb->query($wpdb->prepare("UPDATE wp_support_them SET supportDetails='$supportDetails', `status` = '0' WHERE floodCrisisId=$pid"));

$wpdb->query($wpdb->prepare("UPDATE wp_flood_crisis_data SET last_status_updated_id='$userId', `status` = '0' WHERE id=$pid"));


$results =  $wpdb->get_results("SELECT * FROM wp_flood_crisis_data WHERE id = '".$pid."' LIMIT 1");
$uid = $results[0]->userId;
$requester_email = $results[0]->email;
$login_user_name = $results[0]->name;
$categoryId = $results[0]->categoryId;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id =" . $categoryId, OBJECT);
$res = $results[0];
$categoryName = $res->title;


exit;