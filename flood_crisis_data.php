<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$categoryId = $_POST['categoryId'];
$address = $_POST['address'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$description = $_POST['description'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$wpdb->insert('wp_flood_crisis_data', array(
    'userId' => $userId,
    'categoryId' => $categoryId,
    'name' => $name,
    'mobileNumber' => $phone_number,
    'email' => $email,
    'address' => $address,
    'description' => $description,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'createdAt' => date("Y-m-d H:i:s"),
    'updatedAt' => date("Y-m-d H:i:s"),
));
$date = date("Y-m-d H:i:s");
$last_status_updated_id = $wpdb->insert_id;

$user = get_userdata($userId);
$login_user_name = $user->data->display_name;
$user_email = $user->user_email;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id =" . $categoryId, OBJECT);
$res = $results[0];

$categoryName = $res->title;


$admin_email = get_option( 'admin_email' );
$to = $email; //info@zedaid.org


$subject = 'New iNeed! Request Register';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'. "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'CC: ' . $admin_email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/flood_created.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

// $message2 = str_replace('{{Name}}', $login_user_name , $message2);
$message2 = str_replace('{{FLOOD}}', $name, $message2);
$message2 = str_replace('{{REQUEST_TYPE}}', $categoryName, $message2);
$message2 = str_replace('{{NAME}}', $name, $message2);
$message2 = str_replace('{{EMAIL}}', $email, $message2);
$message2 = str_replace('{{CONTACT_NUMBER}}', $phone_number, $message2);
$message2 = str_replace('{{DESCRIPTION}}', $description, $message2);
$message2 = str_replace('{{LINK}}', "https://zedaid.org/i-need/", $message2);
wp_mail($to, $subject, $message2, $headers);

echo 'true';
exit;