<?php

ob_start();

/**

 * Template Name: Login

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

    <title>Login | Zed</title>

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

    <div class="tp-login-area">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">



                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



                        global $wpdb, $user_ID;



                        if ($user_ID) {

                            // They're already logged in, so we bounce them back to the homepage.

                            header("Location: " . home_url());

                        } else {



                            $cookie_name = "login_data";

                            setcookie($cookie_name, json_encode($_POST), time() + (86400 * 30), "/"); // 86400 = 1 day



                            $errors = array();



                            //We shall SQL escape all inputs

                            $username = strtolower($wpdb->escape($_POST['user_email']));

                            $password = $wpdb->escape($_POST['user_pass']);

                            $returnUrl = $wpdb->escape($_POST['redirect_to']);



                            $login_data = array();

                            $login_data['user_login'] = $username;

                            $login_data['user_password'] = $password;



                            $user_verify = wp_signon($login_data, false);

                            $nameexplode = explode(' ', $user_verify->display_name);



                            if (is_wp_error($user_verify)) {

                                $errors['invaliddetail'] = "Invalid login details.";

                            } else {



                                unset($_COOKIE['login_data']);

                                setcookie('login_data', null, -1, '/');



                                header("Location: " . $returnUrl);

                            }

                        }

                    }



                    $login_datajson = $_COOKIE['login_data'];

                    $login_data = json_decode(stripslashes($login_datajson), true);



                    ?>

                    <form id="loginForm" method="post" class="tp-accountWrapper" action="">

                        <div class="tp-accountInfo">

                            <div class="tp-accountInfoHeader">

                               <!--  <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a>

                                <a class="tp-accountBtn" href="register.html">

                                        <span class="">Create Account</span>

                                    </a> -->

                            </div>

                            <div class="image">

                                <img src="<?php echo bloginfo('template_directory'); ?>/images/login.png" alt="">

                            </div>

                            <div class="back-home">

                                <a class="tp-accountBtn" href="<?= BASE_URL ?>">

                                    <span class="">Back To Home</span>

                                </a>

                            </div>

                        </div>

                        <div class="tp-accountForm form-style">

                            <div class="fromTitle">

                                <h2>Login Via Email</h2>

                                <p>Login Via Email into Zedaid Foundation</p>

                            </div>

                            <?php

                            if (isset($_GET)) {

                                if ($_GET['f'] == 't') {

                                    ?>

                                    <p class="text-center text-success">Check your email for the confirmation link.</p>

                                <?php

                                    } else if ($_GET['f'] == 'l') {

                                        ?>

                                    <p class="text-center text-success">Your password has been reset</p>

                                <?php

                                    }

                                }

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

                                    $f = BASE_URL.'forgot-password/';
                                    $l = BASE_URL.'login/';
                                    $r = BASE_URL.'registration/';

                                    if($_COOKIE[$cookie_name] == $l || $_COOKIE[$cookie_name] == $r || $_COOKIE[$cookie_name] == $f ){
                                        $redirect_to = BASE_URL;
                                    }else{
                                        $redirect_to = $_COOKIE[$cookie_name];
                                    }
                                }

                                ?>



                                <input type="hidden" name="redirect_to" value="<?= $redirect_to; ?>">



                                <div class="col-lg-12 col-md-12 col-12">

                                    <!-- <label for="name">Email</label>   -->

                                    <input value="<?= $_POST['user_email'] ? $_POST['user_email'] : ''; ?>" required type="email" id="user_email" name="user_email" placeholder="Your email here..">

                                </div>

                                <div class="col-lg-12 col-md-12 col-12">

                                    <!-- <label for="name">Password</label>    -->

                                    <input required class="pwd2" type="password" placeholder="Your password here.." value="" id="user_pass" name="user_pass">

                                </div>

                                <!-- <div class="col-lg-12 col-md-12 col-12">

                                    <div class="check-box-wrap">

                                        <div class="input-box">

                                            <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">

                                            <label for="fruit4">Remember Me</label>

                                        </div>

                                        <div class="forget-btn">

                                            <a href="forgot.html">Forgot Password?</a>

                                        </div>

                                    </div>

                                </div> -->

                                <div class="col-lg-12 col-md-12 col-12">

                                    <p style="margin-top:10px" class="subText">Forgot Your Password? <a href="<?= BASE_URL . 'forgot-password' ?>">Recover Now</a></p>

                                    <button type="submit" class="tp-accountBtn">Login</button>

                                </div>

                            </div>

                            <h4 class="or1"><span>OR</span></h4>

                            <!-- <ul class="tp-socialLoginBtn">

                                <li><button class="facebook" tabindex="0" type="button"><span><i class="fa fa-facebook"></i></span></button></li>

                                <li><button class="twitter" tabindex="0" type="button"><span><i class="fa fa-twitter"></i></span></button></li>

                                <li><button class="linkedin" tabindex="0" type="button"><span><i class="fa fa-linkedin"></i></span></button></li>

                            </ul> -->

                            <a href="<?= BASE_URL . 'login-via-mobile' ?>" class="tp-accountBtn" style="margin-top:0px;margin-bottom:30px;text-align:center;">Login Via Mobile</a>

                            <p class="subText">Don't have an account? <a href="<?= BASE_URL . 'registration' ?>">Create free account</a></p>

                        </div>

                    </form>

                    <script>

                        $("#loginForm").validate({

                            rules: {

                                user_email: {

                                    required: true,

                                    maxlength: 100,

                                },

                                user_pass: {

                                    required: true,

                                    maxlength: 50,

                                    minlength: 6

                                }

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

<?php

get_footer();