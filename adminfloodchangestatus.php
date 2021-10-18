<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];

$data =array(
    'zed_verified' => 1
);
$wherecondition=array(
    'id'=>$id
);
$wpdb->update('wp_flood_crisis_data', $data, $wherecondition);

$results =  $wpdb->get_results("SELECT * FROM wp_flood_crisis_data WHERE id = '".$id."' LIMIT 1");
$uid = $results[0]->userId;
$requester_email = $results[0]->email;
$login_user_name = $results[0]->name;
$categoryId = $results[0]->categoryId;
$mobileNumber = $results[0]->mobileNumber;
$description = $results[0]->description;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id =" . $categoryId, OBJECT);
$res = $results[0];
$categoryName = $res->title;

$to = $requester_email;
$subject = 'iNeed! - Approved Request';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/flood_approved.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{NAME}}', $login_user_name , $message2);
$message2 = str_replace('{{EMAIL}}', $name , $message2);
$message2 = str_replace('{{CONTACT_NUMBER}}', $mobileNumber, $message2);
$message2 = str_replace('{{DESCRIPTION}}', $description, $message2);
$message2 = str_replace('{{REQUEST_TYPE}}', $categoryName, $message2);
$message2 = str_replace('{{LINK}}', "https://zedaid.org/i-need/", $message2);
wp_mail($to, $subject, $message2, $headers);
echo 'true';
exit;