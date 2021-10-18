<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];

$resultsu = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id =" . $userId, OBJECT);
$resu = $resultsu[0];
$display_name = $resu->display_name;

$withdrawamt = $_POST['withdrawamt'];

$resultsbank = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}beneficiary WHERE status = 1 AND userId = '" . $userId . "'", ARRAY_A);
$account_number = $resultsbank[0]['account_number'];
$fund_account_id =  $resultsbank[0]['fund_account_id'];

$cid = $_POST['cid'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $cid, OBJECT);
$res = $results[0];

if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
} else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
} else {
    $fundtitle = $res->fundraiser_title;
}


$withdrawal_amount =  $res->withdrawal_amount ? $res->withdrawal_amount : 0;
$withdrawal_amountn = $withdrawal_amount + $withdrawamt;

$perc = ($withdrawal_amountn * 2) / 100;
$zedprice = $withdrawal_amountn - $perc;

$perc2 = ($zedprice * 2) / 100;
$totamtaa = $zedprice - $perc2;

$to2 = 'info@zedaid.org';
$subject2 = 'Withdraw by fundraiser';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers2 .= 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message2 = '<html><body>';
$message2 .= '<h3>Hello, admin</h3>';
$message2 .= '<p style="font-size:18px;">Fundraiser withdraw of <b>' . $fundtitle . '</b>, Amount of <b>' . $totamtaa . '</b>.</p>';
$message2 .= '</body></html>';

mail($to2, $subject2, $message2, $headers2);

// foreach ($resultscc as $ress) {

// $amount = $ress['campaignCreator'] * 100;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.razorpay.com/v1/payouts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n  \"account_number\": \"$account_number\",\n  \"fund_account_id\": \"$fund_account_id\",\n  \"amount\": $totamtaa,\n  \"currency\": \"INR\",\n  \"mode\": \"NEFT\",\n  \"purpose\": \"refund\",\n  \"queue_if_low_balance\": true,\n  \"reference_id\": \"Acme Transaction ID $cid\",\n  \"narration\": \"Withdrawal\",\n  \"notes\":{\n    \"random_key_1\": \"Make it so.\",\n    \"random_key_2\": \"Withdrawal.\"\n  }\n}",
    CURLOPT_HTTPHEADER => array(
        "authorization: Basic cnpwX3Rlc3Rfazl5VmN1a05Wek9LRDE6QTQ4NUxCRUZ0NEVnVUxSZjFMVkQxTUNz",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "0";
    exit;
} else {

    /// zed fund

    $amountt = $withdrawal_amountn * 100;
    $amountf = $perc * 100;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.razorpay.com/v1/orders",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"amount\": $amountt,\n  \"currency\": \"INR\",\n  \"transfers\": [\n    {\n      \"account\": \"acc_GkG4vhaH5jpC3k\",\n      \"amount\": $amountf,\n      \"currency\": \"INR\",\n      \"notes\": {\n        \"branch\": \"Acme Corp Bangalore North\",\n        \"name\": \"Gaurav Kumar\"\n      },\n      \"linked_account_notes\": [\n        \"branch\"\n      ]\n    }\n  ]\n}",
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic cnpwX3Rlc3Rfazl5VmN1a05Wek9LRDE6QTQ4NUxCRUZ0NEVnVUxSZjFMVkQxTUNz",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "0";
        exit;
    } else {


        $to2 = 'info@zedaid.org';
        $subject2 = 'Withdraw by Fundraiser';
        $from2 = 'info@zedaid.org';

        // To send HTML mail, the Content-type header must be set
        $headers2  = 'MIME-Version: 1.0' . "\r\n";
        $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers2 .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message2 = '<html><body>';
        $message2 .= '<h3>Hello, admin</h3>';
        $message2 .= '<p style="font-size:18px;">Fundraiser withdraw on campaign <b>' . $fundtitle . '</b>. Amount: INR ' . $withdrawamt . '</p>';
        $message2 .= '</body></html>';

        mail($to2, $subject2, $message2, $headers2);


        $sql21c = $wpdb->prepare(
            "UPDATE `wp_campaigns` SET `withdrawal_amount` = $withdrawal_amountn WHERE id = " . $cid
        );
        $wpdb->query($sql21c);

        // $sql21 = $wpdb->prepare(
        //     "UPDATE `wp_campaigndonations` SET `withdrawalStatus` = 1 WHERE id = " . $ress['id']
        // );
        // $wpdb->query($sql21);
        echo '1';
    }

    /// zed fund


}
// }

exit;
