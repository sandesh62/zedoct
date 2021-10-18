<?php
require_once('wp-config.php');
global $wpdb;

$id = ltrim(rtrim($_POST['id'], ','), ',');
$type = $_POST['type'];
if ($type == 'category') {
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails WHERE categoryId IN (" . $id . ")", ARRAY_A);
    } else {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails", ARRAY_A);
    }
}else{
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails WHERE `status` IN (" . $id . ")", ARRAY_A);
    } else {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails", ARRAY_A);
    }
}

$alldata = array();
$i = 0;
foreach ($resultscc as $res) {

    $categoryName = '<span style="color:#2EC4F7 !important;">' . $res['categoryName'] . '</span>';
    $title = $res['title'];

    if ($res['categoryId'] == 1) {
        $mstatus = $res['status'];
    } else if ($res['categoryId'] == 2) {
        $mstatus = $res['status'];
    } else if ($res['categoryId'] == 3) {
        $mstatus = $res['status'];
    } else if ($res['categoryId'] == 4) {
        $mstatus = $res['status'];
    }

    if ($res['status'] != 3) {
        $cc = '<a href="tel:' . $res['contactNumber1'] . '">' . $res['contactNumber1'] . '</a>';
    } else {
        $cc = $res['contactNumber1'];
    }

    if ($res['categoryId'] == 1) {
        $dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $categoryName . '<br><br>' . $title . '<br><br>Bed: ' . $res['bed'] . '<br>Bed with oxygen: ' . $res['oxygen'] . '<br>Bed: ' . $res['ventilator'] . '<br><br>Location: ' . $res['location'] . '<br><br>Contact: ' . $res['contactName'] . ' - ' . $cc . '</div>';
    } else if ($res['categoryId'] == 2) {
        $dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $categoryName . '<br><br>' . $title . '<br><br>Qty: ' . $res['quantity'] . '<br><br>Location: ' . $res['location'] . '<br><br>Contact: ' . $res['contactName'] . ' - ' . $cc . '</div>';
    } else if ($res['categoryId'] == 3) {
        $dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $categoryName . '<br><br>' . $title . '<br><br>Gender: ' . $res['gender'] . '<br>Blood Group: ' . $res['bloodGroup'] . '<br>Eligible date: ' . date("d F Y", strtotime($res['coronaEligibleDate'])) . '<br><br>Location: ' . $res['location'] . '<br><br>Contact: ' . $res['contactName'] . ' - ' . $cc . '</div>';
    } else if ($res['categoryId'] == 4) {
        $dhtml = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $categoryName . '<br><br>' . $title . '<br><br>Qty: ' . $res['quantity'] . '<br><br>Location: ' . $res['location'] . '<br><br>Contact: ' . $res['contactName'] . ' - ' . $cc . '</div>';
    }

    $alldata[$i][] = $dhtml;
    $alldata[$i][] = $res['latitude'];
    $alldata[$i][] = $res['longitude'];
    $alldata[$i][] = $res['categoryId'];
    $alldata[$i][] = $mstatus;
    $alldata[$i][] = '12';
    $i++;
}

echo json_encode($alldata);
exit;
