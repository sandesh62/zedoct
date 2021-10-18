<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$pid = $_POST['pid'];
$statusid = $_POST['statusid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];

/* $results = $wpdb->get_results("SELECT * FROM wp_status_update_users WHERE phone_number = '$phone_number'");
if (!empty($results)) {
    $id = $results[0]->id;
}else{

} */

$wpdb->insert('wp_status_update_users', array(
    'covid_id' => $pid,
    'name' => $name,
    'phone_number' => $phone_number,
    'email' => $email,
    'status' => $statusid,
    'created_on' => date("Y-m-d H:i:s"),
));
$date = date("Y-m-d H:i:s");
$last_status_updated_id = $wpdb->insert_id;
/* $data =array(
    'status' => $statusid,
    'last_status_updated_id' => $last_status_updated_id
);
$wherecondition=array(
    'id'=>$pid
);
$wpdb->update('wp_covidlistdetails', $data, $wherecondition); */

//$user_query = new WP_User_Query( array('number' => $phone_number) );
$qry = "SELECT a.ID, a.user_login  
FROM wp_users a
JOIN wp_usermeta b ON a.ID = b.user_id 
WHERE b.meta_key = 'xoo_ml_phone_no' and b.meta_value like '$phone_number'   
ORDER BY a.user_nicename";
$user_query = $wpdb->get_results($qry);
if (!empty($user_query)) {
    $zed_verified = 1;
}else{
    $zed_verified = 0;
}

$wpdb->query($wpdb->prepare("UPDATE wp_covidlistdetails SET last_status_updated_id='$last_status_updated_id', `status` = '$statusid', zed_verified = '$zed_verified' WHERE id=$pid"));
echo 'true';
exit;