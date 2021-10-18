<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$fname = $wpdb->escape($_POST['reg_firstname']);
$lname = $wpdb->escape($_POST['reg_lastname']);
$countrycode = $wpdb->escape($_POST['countrycode']);
$mobilenumber = $wpdb->escape($_POST['mobilenumber']);
$reg_phone = $wpdb->escape($_POST['reg_phone']);

$ffname = $fname . " " . $lname;

$blogusers = get_users('meta_value=' . $mobilenumber);
// foreach ($blogusers as $user) {
$phone = $blogusers[0]->user_email;
// }

// Check email address is present and valid  
$email = $wpdb->escape($_POST['reg_email']);

if (!is_email($email)) {
    echo 'validemail';
} elseif (email_exists($email)) {
    echo 'emailexist';
} elseif ($phone) {
    echo 'phoneexist';
} else {
    $password = $_POST['reg_password'];

    $new_user_id = wp_create_user($email, $password, $email);

    $updata['ID'] = $new_user_id;
    $updata['display_name'] = $ffname;
    wp_update_user($updata);

    add_user_meta($new_user_id, 'first_name', $fname);
    add_user_meta($new_user_id, 'last_name', $lname);
    add_user_meta($new_user_id, 'billing_phone', $reg_phone);
    add_user_meta($new_user_id, 'xoo_ml_phone_display', $reg_phone);
    add_user_meta($new_user_id, 'xoo_ml_phone_code', $countrycode);
    add_user_meta($new_user_id, 'xoo_ml_phone_no', $mobilenumber);

    // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  

    $success = 1;

    $user = get_user_by('id', $new_user_id);
    wp_set_current_user($new_user_id, $user->user_login);
    wp_set_auth_cookie($new_user_id);
    do_action('wp_login', $user->user_login, $user);

    echo '1';
}

exit;
