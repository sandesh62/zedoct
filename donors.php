<?php
require_once('wp-config.php');
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
error_reporting(0); 
global $wpdb;

$id = $_POST['id'];
$row = $_POST['row'];
$rowperpage = 3;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
$res = $results[0];
$campaign_typeId = $res->campaign_typeId;     
if($campaign_typeId == 1) {
$resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN (" . $id . ") and status = 1 AND paymetStatus = 1 ORDER BY id DESC limit $row, $rowperpage");
} else {
$resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN (" . $id . ") and status = 1 ORDER BY id DESC limit $row, $rowperpage");    
}


$html = '';
foreach ($resultsdona as $resul) {
    $fullName = explode(" ", $resul->fullName);
    if ($res->campaign_typeId == 2) {
        $goal_amount = $res->item_qty;
        $currency = 'Qty';
    } elseif ($res->campaign_typeId == 3) {
        $goal_amount = $res->product_price;
        $currency = $res->currency;
    } else {
        $goal_amount = $res->goal_amount;
        $currency = $res->currency;
    }
    if ($res->campaign_typeId == 3) {
        $amount = $resul->amount * $res->product_price;
    } else {
        $amount = $resul->amount;
    }
    $html .= '<div class="post" id="post_'.$id.'">
        <div class="img-holder">
            <h2 class="h2-f">'.$fullName[0][0] . $fullName[1][0].'</h2>
        </div>
        <div class="details">
            <h4>
            <a href="#">'.$resul->fullName.'</a>
            </h4>
            <span class="date">'.$currency . ' ' . number_format($amount).'</span>
        </div>
    </div>';
}

echo $html;
?>