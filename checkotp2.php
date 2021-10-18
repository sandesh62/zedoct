<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$otp = $_POST['enterotp'];
$mobilenumber = $_POST['mobilenumber'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usermeta WHERE meta_key = 'billing_phone' AND meta_value = '$mobilenumber'", OBJECT);
if ($results) {
    $user_id = $results[0]->user_id;
    $results2 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE ID = '$user_id' AND otp = '$otp'", OBJECT);
    if ($results2) {
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        echo '1';
    } else {
        // wp_set_current_user($user_id);
        // wp_set_auth_cookie($user_id);
        echo 'wrongotp';
        // echo ''; //wrongotp
    }
} else {
    echo 'norecord';
}


exit;
