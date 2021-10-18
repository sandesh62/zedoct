<?php
require_once('wp-config.php');

global $wpdb;

$userId = $_POST['userId'];
$fullName = $_POST['fullName'];
$emailId = $_POST['emailId'];
$phonenumber = $_POST['phonenumber'];
$account_number = $_POST['account_number'];
$ifsc = $_POST['ifsc'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.razorpay.com/v1/contacts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n  \"name\": \"$fullName\",\n  \"email\": \"$emailId\",\n  \"contact\": \"$phonenumber\",\n  \"type\": \"employee\"\n}",
    CURLOPT_HTTPHEADER => array(
        "authorization: Basic cnpwX3Rlc3Rfazl5VmN1a05Wek9LRDE6QTQ4NUxCRUZ0NEVnVUxSZjFMVkQxTUNz",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 0a412d3f-6fea-1e3e-ea69-d66d5212df01"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$responsec = json_decode($response, true);

$contact_id = $responsec['id'];


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.razorpay.com/v1/fund_accounts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n  \"contact_id\": \"$contact_id\",\n  \"account_type\": \"bank_account\",\n  \"bank_account\": {\n    \"name\": \"$fullName\",\n    \"ifsc\": \"$ifsc\",\n    \"account_number\": \"$account_number\"\n  }\n}",
    CURLOPT_HTTPHEADER => array(
        "authorization: Basic cnpwX3Rlc3Rfazl5VmN1a05Wek9LRDE6QTQ4NUxCRUZ0NEVnVUxSZjFMVkQxTUNz",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: ee321fa7-4ccc-c7da-c501-09cccc9560c2"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$responsecv = json_decode($response, true);

$fund_account_id = $responsecv['id'];

/////
$dateTime = date("Y-m-d H:i:s");


// header("Location: " . BASE_URL . "donate-thank-you/");
if ($responsecv['error']) {
    echo $responsecv['error']['description'];
} else {
    echo '1';

    $sql2 = $wpdb->prepare(
        "INSERT INTO `wp_beneficiary`      
       (userId, fullName, emailId, phonenumber, account_number, ifsc, contact_id, fund_account_id, dateTime) 
 values ('" . $userId . "','" . $fullName . "','" . $emailId . "','" . $phonenumber . "','" . $account_number . "','" . $ifsc . "','" . $contact_id . "','" . $fund_account_id . "','" . $dateTime . "')"
    );
    $wpdb->query($sql2);
}
exit;
