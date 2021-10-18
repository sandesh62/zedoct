<?php
require_once 'wp-config.php';

global $wpdb;

$sql = $wpdb->prepare(
    "UPDATE `wp_campaigns` SET `status` = 0 WHERE DATE(end_date) < '" . date('Y-m-d') . "' AND `status` = '1'"
);
$wpdb->query($sql);