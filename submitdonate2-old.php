
<?php
// require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//

$servername = 'localhost';
$database = 'zedaidNew';
$username = 'root';
$password = 'root@@123';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

$campaign_Id = $_POST['campaign_Id'];
$campaign_typeId = $_POST['campaign_typeId'];
$fullName = $_POST['fullName'];
$emailId = $_POST['emailId'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$anonymous = isset($_POST['anonymous']) ? $_POST['anonymous'] : 0;

$results = $conn->query("SELECT * FROM wp_campaigns WHERE id =" . $campaign_Id);
$row = mysqli_fetch_assoc($results);

$res = (object) $row;

if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
} else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
} else {
    $fundtitle = $res->fundraiser_title;
}

if ($res->image) {
    $iimage = 'https://zedaid.org/fundraiserimg/' . $res->image;
} else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
}
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $campaign_Id,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => $currency,
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $fullName,
    "description"       => "Donation",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
        "name"              => $fullName,
        "email"             => $emailId,
        "contact"           => $phonenumber,
    ],
    "notes"             => [
        "address"           => $address,
        "merchant_order_id" => $campaign_Id,
        "name"              => $fullName,
        "email"             => $emailId,
        "contact"           => $phonenumber,
        "order_id"          => $razorpayOrderId,
        "anonymous"          => $anonymous,
        "campaign_typeId"          => $campaign_typeId,
        "amount"          => $amount,
    ],
    "theme"             => [
        "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

// require("checkout/{$checkout}.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<div class="loadingBar">
    <div class="loadingBarText">
        <img src="https://zedaid.org/loder.png" alt="loader">
    </div>
</div>

<style>
    body{
        font-family: "Hind Vadodara", sans-serif !important;
    }
    .loadingBar,
    .loadingBarmodal {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 999999999;
    }

    element {}

    .loadingBarText img,
    .loadingBarTextmodal img {
        width: 50px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-animation: spin 1.5s linear infinite;
        -moz-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;
    }

    table {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }

    table,
    th,
    td {
        border: 1px solid #A4ABCB!important;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    #t01 tr:nth-child(even) {
        background-color: #eee;
    }

    #t01 tr:nth-child(odd) {
        background-color: #fff;
    }

    #t01 th {
        background-color: black;
        color: white;
    }

    @media only screen and (max-width: 600px) {
        table {
            width: 100% !important;
        }
    }
</style>

<table border="1" style="
    background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
">
    <tbody>

        <tr>
            <td colspan="2" style="text-align: center;"><img style="height: 250px; width: 250px;" src="<?= $iimage ?>" /></td>
        </tr>
        <tr>
            <td style="
    background: #3D3D8A;
    color: #fff;
">Campaign Name: <?= $fundtitle; ?></td>
            <td style="
    background: #3D3D8A;
    color: #fff;
">Amount: INR <?= $amount / 100; ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><button style="    border-radius: 3px;
    border: none;
    background: #3D3D8A;
    color: #fff;
    padding: 8px 12px;
    vertical-align: top;
    font-size: 13px;
    line-height: normal;
    -webkit-transition: 0.3s;
    transition: 0.3s;cursor: pointer;" id="rzp-button1">Confirm and Pay</button>
        </tr>
    </tbody>
</table>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script>
    function showLoadingBar() {
        jQuery('.loadingBar').show();
    }

    function hideLoadingBar() {
        jQuery('.loadingBar').hide();
    }
  
    jQuery(window).load(function() {
        showLoadingBar();
    });

    jQuery(window).on('load', function() {
        hideLoadingBar();
    });


    // Checkout details as a json
    var options = <?php echo $json ?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function(response) {
        console.log(response.razorpay_payment_id);
        console.log(response.razorpay_signature);
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key 
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
</script>
<?php

exit;
