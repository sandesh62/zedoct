<?php



ob_start();

/**

 * Template Name: Password Recovery

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

    <title>Forgot Password | Zed</title>

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



                            $cookie_name = "forgot_data";

                            setcookie($cookie_name, json_encode($_POST), time() + (86400 * 30), "/"); // 86400 = 1 day



                            $errors = array();



                            // Check email address is present and valid

                            $email = $wpdb->escape($_POST['user_email']);

                            if (!is_email($email)) {

                                $errors['email'] = "Please enter a valid email";

                            } elseif (!email_exists($email)) {

                                $errors['email'] = "This email address is not register";

                            } else {



                                $to = strtolower($email);

                                $tm = strtotime(date('Y-m-d H:i:s'));

                                $subject = 'Password Reset';

                                $sender = get_option('name');

                                $flink = BASE_URL . 'reset-password/?em=' . md5(trim(strtolower($email))) . '&tm=' . $tm;



                                $from = 'admin@zedaid.org';

                                $fromName = 'ZEDAid';



                                $message = "Visit this link for forgot password\n\n" . $flink;



                                // Additional headers 

                                $headers = 'From: ' . $fromName . '<' . $from . '>';



                                // Send email 

                                if (mail($to, $subject, $message, $headers)) {

                                    $success = 'Check your email address for you new password.';

                                    unset($_COOKIE['forgot_data']);

                                    setcookie('forgot_data', null, -1, '/');

                                    header("Location: " . home_url() . "/login/?f=t");

                                } else {

                                    $errors['email'] = "Email sending failed.";

                                }

                            }

                        }

                    }



                    $forgot_datajson = $_COOKIE['forgot_data'];

                    $forgot_data = json_decode(stripslashes($forgot_datajson), true);



                    ?>

                    <form id="forgotForm" method="post" class="tp-accountWrapper" action="">

                        <div class="tp-accountInfo">

                            <div class="tp-accountInfoHeader">

                                <!-- <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a> -->

                            </div>

                            <div class="image">

                                <img src="<?php echo bloginfo('template_directory'); ?>/images/login.png" alt="">

                            </div>

                            <div class="back-home">

                                <a class="tp-accountBtn" href="<?= BASE_URL ?>">

                                    Back To Home

                                </a>

                            </div>

                        </div>

                        <div class="tp-accountForm form-style">

                            <div class="fromTitle">

                                <h2>Reset Password</h2>

                                <p>Password Recovery By Zedaid Foundation</p>

                            </div>

                            <?php

                            if (isset($_GET)) {

                                if ($_GET['f'] == 't') {

                                    ?>

                                    <p class="text-center text-danger">Sorry, your password reset link has been expired! Please request a new link below.</p>

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

                                <div class="col-lg-12 col-md-12 col-12">

                                    <input value="<?= $_POST['user_email'] ? $_POST['user_email'] : ''; ?>" type="text" id="user_email" name="user_email" placeholder="Your email here.." maxlength="100">

                                </div>

                                <div class="col-lg-12 col-md-12 col-12">

                                    <button type="submit" class="tp-accountBtn" id="reset-password">Reset Password</button>

                                </div>

                            </div>

                            <p class="subText" style="margin-top:10px">Don't have an account? <a href="<?= BASE_URL . 'registration' ?>">Create free account</a></p>

                        </div>

                    </form>

                    <script>

                        $("#forgotForm").validate({

                            rules: {

                                user_email: {

                                    required: true,
                                    email: true,
                                    maxlength: 100,

                                }

                            },

                            submitHandler: function(form) {
                                $("#reset-password").html('Loading...');
                                $('#reset-password').prop('disabled', true);
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