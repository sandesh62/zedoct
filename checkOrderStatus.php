<?php
$servername = 'localhost';
$database = 'zedaidNew';
$username = 'root';
$password = 'root@@123';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result_arr = $conn->query("SELECT * FROM wp_campaigndonations WHERE paymetStatus = '2' ORDER BY id DESC");
if ($result_arr->num_rows > 0) {
    while ($row = $result_arr->fetch_assoc()) {
        $razorpay_order_id = $row['razorpay_order_id'];
        $id = $result_arr_record['id'];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.razorpay.com/v1/orders/'.$razorpay_order_id.'/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic cnpwX2xpdmVfWk0zWHNMTnFsNzFDbEU6dEJDTUphUVBUY0NJV2xUM3VlTzYyZGRj'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $result_arr = json_decode($response, true);
        $items = $result_arr['items'];
        if (!empty($items)) {
            if ($items[0]['status'] == 'failed' || $items[0]['status'] == 'fail') {
                $sql_update = "UPDATE wp_campaigndonations SET paymetStatus = '0' WHERE razorpay_order_id = '".$razorpay_order_id."'";
                $conn->query($sql_update);
            } elseif ($items[0]['status'] == 'paid' || $items[0]['status'] == 'captured') {
                $razorpay_payment_id = $items[0]['id'];
                $invoice_id = date("Y").date("m").$id;
                
                $sql_update = "UPDATE wp_campaigndonations SET invoice_id = '".$invoice_id."', paymetStatus = '1', razorpay_payment_id = '".$razorpay_payment_id."' WHERE razorpay_order_id = '".$razorpay_order_id."'";
                $conn->query($sql_update);
            } else {
                return true;
            }
        }else{
            return true;
        }
        return true;
    }
}