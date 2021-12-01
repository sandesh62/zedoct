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


$results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_them WHERE floodCrisisId = '".$pid."'", OBJECT);

$supporter_email = $results_supports[0]->email;
$supporter_phone  = $results_supports[0]->mobile_number;
$supporter_name  = $results_supports[0]->name;
$supporter_org  = $results_supports[0]->organization_name;





/* Email to Request Owner */
$to = $supporter_email;
$subject = 'iNeed! - Request Support';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/contact_supporter.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{SUPPORTER_NAME}}', $supporter_name , $message2);
$message2 = str_replace('{{SUPPORTER_ORG}}', $supporter_org , $message2);
$message2 = str_replace('{{NAME}}', $name , $message2);
$message2 = str_replace('{{CONTACT_NUMBER}}', $phone_number, $message2);
$message2 = str_replace('{{EMAIL}}', $email, $message2);
$message2 = str_replace('{{DESCRIPTION}}', $supportDetails, $message2);

wp_mail($to, $subject, $message2, $headers);
/* End */

echo 'true';
exit;