<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$floodCrisisId = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$desc = $_POST['desc'];
$organization_name = $_POST['organization_name'];

$wpdb->insert('wp_support_them', array(
    'floodCrisisId' => $floodCrisisId,
    'userId' => $userId,
    'name' => $name,
    'mobile_number' => $phone_number,
    'email' => $email,
    'supportDetails' => $desc,
    'organization_name' => $organization_name,
    'createdAt' => date("Y-m-d H:i:s"),
    'updatedAt' => date("Y-m-d H:i:s"),
));
$date = date("Y-m-d H:i:s");

$wpdb->query($wpdb->prepare("UPDATE wp_flood_crisis_data SET last_status_updated_id='$userId', supporter_id='$userId', `status` = '3' WHERE id=$floodCrisisId"));

$results =  $wpdb->get_results("SELECT * FROM wp_flood_crisis_data WHERE id = '".$floodCrisisId."' LIMIT 1");
$uid = $results[0]->userId;
$user_email = $results[0]->email;
$requester_name = $results[0]->name;
$categoryId = $results[0]->categoryId;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id =" . $categoryId, OBJECT);
$res = $results[0];
$categoryName = $res->title;

$user = get_userdata($uid);
//$login_user_name = $user->data->display_name;
//$user_email = $user->user_email;

$to = $user_email;
$subject = 'Support Request';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ' . $from . "\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/flood_support_supporter.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{SUPPORTER_NAME}}', $name, $message2);
$message2 = str_replace('{{REQUEST_OWNER_NAME}}', $requester_name, $message2);
$message2 = str_replace('{{EMAIL}}', $email, $message2);
$message2 = str_replace('{{CONTACT_NUMBER}}', $phone_number, $message2);
$message2 = str_replace('{{REQUEST_TYPE}}', $categoryName, $message2);
$message2 = str_replace('{{DESCRIPTION}}', $desc , $message2);  
$message2 = str_replace('{{NGO}}', $organization_name , $message2);   
$message2 = str_replace('{{LINK}}', "https://zedaid.org/i-need/", $message2);
wp_mail($to, $subject, $message2, $headers);

/* Send to admin email */
$admin_email = get_option( 'admin_email' );
$to_admin = $email;
$subject_admin = 'Support Request';
$from_admin = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers_admin  = 'MIME-Version: 1.0' . "\r\n";
$headers_admin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'Reply-To: ' . $from_admin . "\r\n" .
    'CC: ' . $admin_email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file1 = 'email/flood_support_requester.html';
$myfile1 = fopen($file1, "r") or die("Unable to open file!");
$message = fread($myfile1,filesize($file1));

$message = str_replace('{{SUPPORTER_NAME}}', $name, $message);
$message = str_replace('{{REQUEST_TYPE}}', $categoryName, $message);
$message = str_replace('{{REQUEST_OWNER_NAME}}', $requester_name, $message);
$message = str_replace('{{EMAIL}}', $email, $message);
$message = str_replace('{{CONTACT_NUMBER}}', $phone_number, $message);
$message = str_replace('{{REQUEST_TYPE}}', $categoryName, $message);
$message = str_replace('{{DESCRIPTION}}', $desc, $message);
$message = str_replace('{{NGO}}', $organization_name , $message);
$message = str_replace('{{LINK}}', "https://zedaid.org/i-need/", $message);

wp_mail($to_admin, $subject_admin, $message, $headers_admin);

echo 'true';
exit;