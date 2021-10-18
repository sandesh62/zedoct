<?php
ob_start();
/**
 * Template Name: Registration
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
    <title>Registration | Zed</title>
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
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <style>
        iframe {
            height: 100px;
        }
    </style>
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
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        global $wpdb, $user_ID;
                        if ($user_ID) {
                            header("Location: " . home_url());
                        } else {

                            /* if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
                            {
                                $secret = '6LdAzmYbAAAAAOkATjmL2ASVmjZDFQIsinlODDCs';
                                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                                $responseData = json_decode($verifyResponse);
                                if(!$responseData->success)
                                {
                                    $errors['invaliddetail'] = "Robot verification failed, please try again.";
                                }
                            } */
                            
                            $cookie_name = "register_data";
                            setcookie($cookie_name, json_encode($_POST), time() + (86400 * 30), "/"); // 86400 = 1 day
                            $errors = array();
                            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
                            {
                                $secret = '6LdAzmYbAAAAAOkATjmL2ASVmjZDFQIsinlODDCs';
                                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                                $responseData = json_decode($verifyResponse);
                                if($responseData->success)
                                {
                                    $fname = $wpdb->escape($_POST['first_name']);
                                    $lname = $wpdb->escape($_POST['last_name']);
                                    $phone = $_POST['phone_number'] . $_POST['phoneNumber'];
                                    $ffname = $fname . " " . $lname;
                                    // Check email address is present and valid  
                                    $email = $wpdb->escape($_POST['user_email']);
                                    if (!is_email($email)) {
                                        $errors['email'] = "Please enter a valid email.";
                                    } elseif (email_exists($email)) {
                                        $errors['email'] = "This email address is already in use.";
                                    }
                                    $phoneExist = $wpdb->get_results("SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'phone_number' AND meta_value = '" . $phone . "'");
                                    if (!empty($phoneExist)) {
                                        $errors['phone'] = "This phone number is already in use";
                                    }
                                    // Check password is valid  
                                    if (0 === preg_match("/.{5,}/", $_POST['user_pass'])) {
                                        $errors['password'] = "Password must be at least six characters.";
                                    }
                                    if (0 === count($errors)) {
                                        $password = $_POST['user_pass'];
                                        $new_user_id = wp_create_user($email, $password, $email);
                                        $updata['ID'] = $new_user_id;
                                        $updata['display_name'] = $ffname;
                                        wp_update_user($updata);
                                        add_user_meta($new_user_id, 'first_name', $fname);
                                        add_user_meta($new_user_id, 'last_name', $lname);
                                        add_user_meta($new_user_id, 'phone_number', $phone);
                                        $success = 1;
                                        $user = get_user_by('id', $new_user_id);
                                        wp_set_current_user($new_user_id, $user->user_login);
                                        wp_set_auth_cookie($new_user_id);
                                        do_action('wp_login', $user->user_login, $user);
                                        $returnUrl = $wpdb->escape($_POST['redirect_to']);
                                        unset($_COOKIE['register_data']);
                                        setcookie('register_data', null, -1, '/');
                                        header("Location: " . $returnUrl);
                                    }
                                }else{
                                    $errors['invaliddetail'] = "Robot verification failed, please try again.";
                                    /* header("Location: " .BASE_URL."/login?f=2" );
                                    exit; */
                                }
                            }else{
                                $errors['invaliddetail'] = "Robot verification failed, please try again.";
                                /* header("Location: " .BASE_URL."/login?f=2" );
                                exit; */
                            }
                        }
                    }
                    $register_datajson = $_COOKIE['register_data'];
                    $register_data = json_decode(stripslashes($register_datajson), true);
                    ?>
                    <form id="regestartionForm" method="post" class="tp-accountWrapper" action="">
                        <div class="tp-accountInfo">
                            <div class="tp-accountInfoHeader">
                                <!-- <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a> -->
                                <!-- <a class="tp-accountBtn" href="login.html">
                                    <span class="">Log in</span>
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
                                <h2>Signup</h2>
                                <p>Register into ZedAid</p>
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
                                    /* $redirect_to = $_COOKIE[$cookie_name]; */
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
                                    <!-- <label for="name">First Name</label> -->
                                    <input value="<?= $_POST['first_name'] ? $_POST['first_name'] : ''; ?>" required type="text" id="first_name" name="first_name" placeholder="Your first name here.." maxlength="50">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!--<label for="name">Last Name</label>-->
                                    <input value="<?= $_POST['last_name'] ? $_POST['last_name'] : ''; ?>" required type="text" id="last_name" name="last_name" placeholder="Your last name here.." maxlength="50">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- <label for="name">Phone</label>-->
                                    <select name="phone_number" id="phone_number" class="phonedropdown">
                                        <option value="+91">+91</option>
                                    </select>
                                    <input value="<?= $_POST['phoneNumber'] ? $_POST['phoneNumber'] : ''; ?>" required type="text" id="phoneNumber" name="phoneNumber" class="num" placeholder="Your phone number here.." onkeypress="return onlyNumberKey(event)" maxlength="10">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!--  <label>Email</label> -->
                                    <input value="<?= $_POST['user_email'] ? $_POST['user_email'] : ''; ?>" required type="email" id="user_email" name="user_email" placeholder="Your email here.." maxlength="100">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <!--  <label>Password</label> -->
                                        <input required class="pwd2" type="password" placeholder="Your password here.." value="" id="user_pass" name="user_pass" maxlength="50">
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal3" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                    </span>
                                </div>
                                <!-- <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="pwd3" type="password" placeholder="Your password here.." value="ssres" name="pass">
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal2" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                    </span>
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="g-recaptcha" data-sitekey="6LdAzmYbAAAAAJXSolBDj1E1oGTXzHfSK1o1Jfbv"></div>
                                    <!-- <input type="hidden" title="Please verify this" class="required" name="keycode" id="keycode"> -->
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="tp-accountBtn" id="signup-btn">Signup</button>
                                    <p class="subText" style="margin-top:10px;">Already have an account? <a href="<?= BASE_URL; ?>login">Login</a></p>
                                </div>
                            </div>
                            <!-- <h4 class="or"><span>OR</span></h4>
                            <ul class="tp-socialLoginBtn">
                                <li><button class="facebook" tabindex="0" type="button"><span><i class="fa fa-facebook"></i></span></button></li>
                                <li><button class="twitter" tabindex="0" type="button"><span><i class="fa fa-twitter"></i></span></button></li>
                                <li><button class="linkedin" tabindex="0" type="button"><span><i class="fa fa-linkedin"></i></span></button></li>
                            </ul>
                            <p class="subText">Don't have an account? <a href="login.html">Create free account</a></p> -->
                        </div>
                    </form>
                    <script>
                        $("#regestartionForm").validate({
                            rules: {
                                phoneNumber: {
                                    required: true,
                                    maxlength: 10,
                                    minlength: 10
                                },
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
                                $("#signup-btn").html('Loading...');
                                $('#signup-btn').prop('disabled', true);
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
    <script>
        $(".reveal").on('click', function() {
            var $pwd = $(".pwd");
            if ($pwd.attr('type') === 'text') {
                $pwd.attr('type', 'password');
            } else {
                $pwd.attr('type', 'text');
            }
        });
        $(".reveal3").on('click', function() {
            var $pwd = $(".pwd2");
            if ($pwd.attr('type') === 'text') {
                $pwd.attr('type', 'password');
            } else {
                $pwd.attr('type', 'text');
            }
        });
    </script>
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