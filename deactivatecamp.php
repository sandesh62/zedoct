<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$campaign_id = $_POST['campaign_id'];

$campaigns = $wpdb->get_row("SELECT * FROM wp_campaigns WHERE id = '".$campaign_id."'");
$service_name = $services->service_name;
$user_id = $services->userId;
$start_date = date("d-m-Y", strtotime($services->start_date));
$end_date = date("d-m-Y", strtotime($services->end_date));
$description = $services->description;
$link = BASE_URL.'my-services';

$users = get_user_by('id',$user_id);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$wpdb->query($wpdb->prepare("UPDATE wp_campaigns SET `status` = '0' WHERE id=$campaign_id"));

$to0 = $user_email;
$subject0 =  "ZedAid - Service is deleted";
$from0 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers0  = 'MIME-Version: 1.0' . "\r\n";
$headers0 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers0 .= 'From: ZED Foundation <' . $from0 . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from0 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_request_admin.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message0 = fread($myfile,filesize($file));
$message0 = str_replace('{{NAME}}', $user_nicename , $message0);
$message0 = str_replace('{{SERVICE_NAME}}', $service_name , $message0);
$message0 = str_replace('{{START_DATE}}', $start_date , $message0);
$message0 = str_replace('{{END_DATE}}', $end_date , $message0);
$message0 = str_replace('{{DESCRIPTION}}', $description , $message0);
$message0 = str_replace('{{LINK}}', $link , $message0);
wp_mail($to0, $subject0, $message0, $headers0);

echo 'true';
exit;