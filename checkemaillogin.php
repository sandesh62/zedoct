<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$username = strtolower($wpdb->escape($_POST['reg_email']));
$password = $wpdb->escape($_POST['reg_password']);

$login_data = array();
$login_data['user_login'] = $username;
$login_data['user_password'] = $password;

$user_verify = wp_signon($login_data, false);

if (is_wp_error($user_verify)) {
    echo 'norecord';
} else {
    $user_id = $user_verify->ID;
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    echo '1';
}

exit;
