<?php

ob_start();
/**
 * Template Name: Login via Mobile
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Login Via Mobile | ZedAid</title>
    <link href="<?php echo bloginfo('template_directory'); ?>/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/odometer-theme-default.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/nice-select.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/signup.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>

<body>
    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!-- end preloader -->
    <div class="tp-login-area sec-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        global $wpdb, $user_ID;

                        if ($user_ID) {
                            header("Location: " . home_url());
                        } else {

                            $cookie_name = "loginmob_data";
                            setcookie($cookie_name, json_encode($_POST), time() + (86400 * 30), "/"); // 86400 = 1 day

                            $errors = array();
                            $phone = $_POST['phone_number'] . $_POST['phoneNumber'];
                            $mobilenumber = $phone;

                            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usermeta WHERE meta_key = 'phone_number' AND meta_value = '$mobilenumber'", OBJECT);

                            if ($results) {
                                $user_id = $results[0]->user_id;
                                $six_digit_random_number = mt_rand(100000, 999999);
                                $six_digit_random_number = '111111';

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
                                    $errors['email'] = "SMS not sent successfully";
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

                                    header("Location: " . BASE_URL . "otp");
                                }
                            } else {
                                $errors['email'] = "This phone number is not exist.";
                            }
                        }
                    }

                    $login_datajson = $_COOKIE['loginmob_data'];
                    $login_data = json_decode(stripslashes($login_datajson), true);


                    ?>
                    <form id="loginmobileForm" method="post" class="tp-accountWrapper" action="">
                        <div class="tp-accountInfo">
                            <div class="tp-accountInfoHeader">
                                <!-- <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a> -->
                                <!-- <a class="tp-accountBtn" href="register.html">
                                        <span class="">Create Account</span>
                                    </a> -->
                            </div>
                            <div class="image">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/login.png" alt="">
                            </div>
                            <div class="back-home">
                                <a class="tp-accountBtn" href="<?= BASE_URL; ?>">
                                    <span class="">Back To Home</span>
                                </a>
                            </div>
                        </div>
                        <div class="tp-accountForm form-style">
                            <div class="fromTitle">
                                <h2>Login Via Mobile</h2>
                                <p>Login Via Mobile into ZedAid</p>
                            </div>
                            <?php
                            if (isset($errors)) {
                                foreach ($errors as $error) {
                                    ?>
                                    <p class="text-danger"><?php echo $error; ?></p>
                            <?php
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <select name="phone_number" id="phone_number" class="phonedropdown">
                                        <option value="+91">+91</option>
                                    </select>
                                    <input value="<?= $_POST['phoneNumber'] ? $_POST['phoneNumber'] : ''; ?>" type="text" onkeypress="return onlyNumberKey(event)" id="phoneNumber" name="phoneNumber" placeholder="Your phone number here.." class="num" maxlength="10">
                                </div>



                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="tp-accountBtn" id="login-mobile-btn">Login Via Mobile</button>
                                </div>
                            </div>
                            <h4 class="or"><span>OR</span></h4>
                            <a href="<?= BASE_URL . 'login' ?>" class="tp-accountBtn" style="margin-top:0px;margin-bottom:30px;text-align:center;">Login Via Email</a>
                            <p class="subText">Don't have an account? <a href="<?= BASE_URL; ?>registration">Create free account</a></p>
                        </div>
                    </form>
                    <script>
                        $("#loginmobileForm").validate({
                            rules: {
                                phoneNumber: {
                                    required: true,
                                    maxlength: 10,
                                    minlength: 10
                                },
                            },
                            submitHandler: function(form) {
                                
                                $("#login-mobile-btn").html('Loading...');
                                $('#login-mobile-btn').prop('disabled', true);
                                form.submit();
                            }
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript files
    ================================================== -->
    <!-- Plugins for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
    <?php
    ob_flush();
    ?>
</body>
<script>
    function onlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</html>
<?php
get_footer();