<?php

ob_start();
/**
 * Template Name: OTP
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>OTP | Zed</title>
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
    <!-- <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div> -->
    <!-- end preloader -->
    <div class="tp-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        global $wpdb, $user_ID;

                        if ($user_ID) {
                            header("Location: " . home_url());
                        } else {
                            $errors = array();
                            $phone = $_POST['phone_number'] . $_POST['phoneNumber'];
                            $mobilenumber = $phone;

                            $otp = $_POST['enterotp'];

                            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usermeta WHERE meta_key = 'phone_number' AND meta_value = '$mobilenumber'", OBJECT);
                            if ($results) {
                                $user_id = $results[0]->user_id;
                                $results2 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE ID = '$user_id' AND otp = '$otp'", OBJECT);
                                if ($results2) {

                                    $user = get_user_by('id', $user_id);
                                    wp_set_current_user($user_id, $user->user_login);
                                    wp_set_auth_cookie($user_id);
                                    do_action('wp_login', $user->user_login, $user);

                                    $returnUrl = $wpdb->escape($_POST['redirect_to']);

                                    unset($_COOKIE['loginmob_data']);
                                    setcookie('loginmob_data', null, -1, '/');

                                    header("Location: " . $returnUrl);
                                } else {
                                    $errors['email'] = "OTP is wrong.";
                                }
                            } else {
                                $errors['email'] = "This phone number is not exist.";
                            }
                        }
                    }

                    $login_datajson = $_COOKIE['loginmob_data'];
                    $login_data = json_decode(stripslashes($login_datajson), true);

                    ?>
                    <form id="loginotpForm" method="post" class="tp-accountWrapper" action="">
                        <div class="tp-accountInfo">
                            <div class="tp-accountInfoHeader">
                                <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a>
                                <!-- <a class="tp-accountBtn" href="register.html">
                                        <span class="">Create Account</span>
                                    </a> -->
                            </div>
                            <div class="image">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/login.svg" alt="">
                            </div>
                            <div class="back-home">
                                <a class="tp-accountBtn" href="<?= BASE_URL; ?>">
                                    <span class="">Back To Home</span>
                                </a>
                            </div>
                        </div>
                        <div class="tp-accountForm form-style">
                            <div class="fromTitle">
                                <h2>Verify OTP</h2>
                                <p>OTP sent to your Mobile Number</p>
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

                                <?php
                                $cookie_name = "actual_link";
                                if (!isset($_COOKIE[$cookie_name])) {
                                    $redirect_to = BASE_URL . 'my-account';
                                } else {
                                    $redirect_to = $_COOKIE[$cookie_name];
                                }
                                ?>

                                <input type="hidden" name="redirect_to" value="<?= $redirect_to; ?>">

                                <div class="col-lg-12 col-md-12 col-12">
                                    <select name="phone_number" id="phone_number" class="phonedropdown">
                                        <option value="+91">+91</option>
                                    </select>
                                    <input readonly value="<?= $login_data['phoneNumber'] ? $login_data['phoneNumber'] : ''; ?>" type="text" id="phoneNumber" name="phoneNumber" placeholder="Your phone number here..">
                                </div>

                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- <label for="name">Email</label>   -->
                                    <input type="text" id="enterotp" name="enterotp" placeholder="Enter OTP here..">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="tp-accountBtn">Submit OTP</button>
                                </div>
                            </div>
                            <p class="subText" style="margin-top: 10px;">haven't received CODE? <a href="<?= BASE_URL; ?>">Resend OTP</a></p>
                        </div>
                    </form>
                    <script>
                        $("#loginotpForm").validate({
                            rules: {
                                phoneNumber: {
                                    required: true,
                                    maxlength: 10,
                                    minlength: 10
                                },
                                enterotp: {
                                    required: true,
                                    maxlength: 6,
                                    minlength: 6
                                },
                            },
                            submitHandler: function(form) {
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

</html>

x