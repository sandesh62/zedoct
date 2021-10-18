<?php



ob_start();

/**

 * Template Name: Password Reset

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

    <title>Reset Password | Zed</title>

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
    <div class="preloader1" style="display: none;">
  <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
  </div>

    <!-- end preloader -->

    <div class="tp-login-area sec-detail">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <?php

                    if (isset($_GET)) {

                        $time = $_GET['tm'];

                        $ctime = strtotime(date('Y-m-d H:i:s'));



                        $mins = round(abs($ctime - $time) / 60, 2);

                        if ($mins > 2) {

                            header("Location: " . home_url() . "/forgot-password/?f=t");

                        }

                    }



                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $new_password = $_POST['user_pass'];

                        global $wpdb;

                        if (isset($_GET)) {

                            $email = $_GET['em'];

                            $user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE md5(LCASE(user_email)) = '" . $email . "'", OBJECT);



                            $updata['ID'] = $user[0]->ID;

                            wp_set_password($new_password, $user[0]->ID);

                            //$updata['user_pass'] = $new_password;

                            //wp_update_user($updata);

                        }

                        header("Location: " . home_url() . "/login/?f=l");

                    }

                    ?>

                    <form id="forgotresetForm" method="post" class="tp-accountWrapper" action="">

                        <div class="tp-accountInfo">

                            <div class="tp-accountInfoHeader">

                                <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a>

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

                                <p>Reset Password Now</p>

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

                                    <input type="password" id="user_pass" name="user_pass" placeholder="Your password here..">

                                </div>

                                <div class="col-lg-12 col-md-12 col-12">

                                    <button type="submit" class="tp-accountBtn" id="reset-password">Reset Password</button>

                                </div>

                            </div>

                            <p class="subText" style="margin-top:10px">Don't have an account? <a href="<?= BASE_URL . 'registration' ?>">Create free account</a></p>

                        </div>

                    </form>

                    <script>

                        $("#forgotresetForm").validate({

                            rules: {

                                user_pass: {

                                    required: true,

                                    maxlength: 50,

                                    minlength: 6

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