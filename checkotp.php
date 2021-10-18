<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$mobilenumber = $_POST['mobilenumber'];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usermeta WHERE meta_key = 'billing_phone' AND meta_value = '$mobilenumber'", OBJECT);
if ($results) {
    $user_id = $results[0]->user_id;
    $six_digit_random_number = mt_rand(100000, 999999);

    // wp_update_user(array(
    //     'ID' => $user_id,
    //     'otp' => $six_digit_random_number
    // ));  // correct email address

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"Login OTP $six_digit_random_number.\",\"to\":[\"$mobilenumber\"]}]}",
        CURLOPT_HTTPHEADER => array(
            "authkey: 328268AKM9eIBEQ5eb00746P1",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo '0';
    } else {
        $resultuu = $wpdb->update(
            'wp_users',
            array(
                'otp' => $six_digit_random_number
            ),
            array('ID' => $user_id),
            array('%s'),
            array('%d')
        );

        echo '1';
    }
} else {
    echo 'norecord';
}


exit;
