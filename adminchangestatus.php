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
$wpdb->update('wp_covidlistdetails', $data, $wherecondition);
echo 'true';
exit;