<?php
get_header();
ob_start();
/**
 * Template Name: Profile
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
global $wpdb, $user_ID;
if (!$user_ID) {
    header("Location: " . BASE_URL . 'login');
}
$userId = $user_ID;
$user_info = get_userdata($userId);
$new_user_data = get_user_meta($userId);
if ($new_user_data['first_name'][0]) {
    $first_name = $new_user_data['first_name'][0];
} else {
    $first_name = $new_user_data['first_name'][1];
}
if ($new_user_data['last_name'][0]) {
    $last_name = $new_user_data['last_name'][0];
} else {
    $last_name = $new_user_data['last_name'][1];
}
if ($new_user_data['phone_number'][0]) {
    $phoneNumber = $new_user_data['phone_number'][0];
} else {
    $phoneNumber = $new_user_data['phone_number'][1];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Profile | Zed</title>
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
    <link href="<?php echo bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <style>
        body {
            margin: 0;            
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }
        .card-body {
            padding: 30px;
        }
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }
        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }
        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }
        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }
        .text-right {
            text-align: right !important;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            margin-left: 0px;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .btn-secondary {
            color: #fff;
            background-color: #6c757d7a;
        }
        .btn-primary {
            color: #fff;
            background-color: #3D3D8A;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #6c757d7a;
            border: 1px solid #6c757d7a !important;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: #3D3D8A;
        }
        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }
        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }
        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }
        .account-settings .about p {
            font-size: 0.825rem;
        }
        .form-control {
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
            box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
            border: 1px solid #eee !important;
            border-radius: 10px;
            padding: 25px;
        }
        .text-primary {
            color: #3D3D8A;
            font-size: 20px;
            padding: 15px 0px 15px 0px;
        }
        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
        .tp-accountWrapper {
            background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
            background-repeat: no-repeat;
            background-size: cover;
        }
        @media (max-width: 1150px) {
        .gutters2{
            margin-top:23% !important;
        }
    }
    .gutters2{
            margin-top:10%;
        }
    </style>
</head>
<body>
    <div class="container" >
        <div class="row gutters gutters2">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" >
                <div class="card h-100">
                    <div class="card-body tp-accountWrapper">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name"><?= $first_name; ?> <?= $last_name; ?></h5>
                                <h6 class="user-email"><?= $user_info->user_email; ?></h6>
                            </div>
                            <!-- <div class="about">
                                <h5>About</h5>
                                <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
                <div class="card h-100 tp-accountWrapper">
                    <div class="card-body ">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            global $wpdb, $user_ID;
                            $errors = array();
                            $fname = $wpdb->escape($_POST['first_name']);
                            $lname = $wpdb->escape($_POST['last_name']);
                            $phone = $_POST['phone_number'] . $_POST['phoneNumber'];
                            $ffname = $fname . " " . $lname;
                            // Check email address is present and valid  
                            $email = $wpdb->escape($_POST['user_email']);
                            $phoneExist = $wpdb->get_results("SELECT user_id FROM $wpdb->users WHERE user_email = $email AND ID != '" . $user_ID . "'");
                            if (!is_email($email)) {
                                $errors['email'] = "Please enter a valid email.";
                            } elseif ($phoneExist) {
                                $errors['email'] = "This email address is already in use.";
                            }
                            $phoneExist = $wpdb->get_results("SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'phone_number' AND meta_value = '" . $phone . "' AND user_id != '" . $user_ID . "'");
                            if (!empty($phoneExist)) {
                                $errors['phone'] = "This phone number is already in use";
                            }
                            if (0 === count($errors)) {
                                $new_user_id = $user_ID;
                                if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                                    $password = $_POST['new_password'];
                                    $wpdb->update(
                                        $wpdb->users,
                                        ['user_pass' => md5($password)],
                                        ['ID' => $new_user_id]
                                    );
                                    $user = get_user_by('id', $new_user_id);
                                    wp_set_current_user($new_user_id, $user->user_login);
                                    wp_set_auth_cookie($new_user_id);
                                    do_action('wp_login', $user->user_login, $user);
                                }
                                update_user_meta($new_user_id, 'first_name', $fname);
                                update_user_meta($new_user_id, 'last_name', $lname);
                                $success = 1;
                                header("Location: " . BASE_URL . 'my-profile/');
                            }
                        }
                        ?>
                        <?php
                        if (isset($errors)) {
                            foreach ($errors as $error) {
                                ?>
                                <p class="text-danger"><?php echo $error; ?></p>
                        <?php
                            }
                        }
                        ?>
                        <form id="profileForm" method="post" class="tp-accountWrapper" action="">
                            <div class="row gutters ">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" value="<?= $_POST['first_name'] ? $_POST['first_name'] : $first_name; ?>" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" value="<?= $_POST['last_name'] ? $_POST['last_name'] : $last_name; ?>" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <!-- <div class="form-group">
                                        <select name="phone_number" id="phone_number" class="phonedropdown">
                                            <option value="+91">+91</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <input type="text" readonly value="<?= $phoneNumber; ?>" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="email" readonly value="<?= $_POST['user_email'] ? $_POST['user_email'] : $user_info->user_email; ?>" class="form-control" name="user_email" id="user_email" placeholder="Enter E-Mail ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Password Change</h6>
                                </div>
                                <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Current Password">
                                    </div>
                                </div> -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a href="<?= BASE_URL; ?>" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $("#profileForm").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            // phoneNumber: {
            //     required: true,
            //     maxlength: 10,
            //     minlength: 10
            // },
            // user_email: {
            //     required: true,
            //     maxlength: 100,
            // },
            new_password: {
                maxlength: 50,
                minlength: 6
            },
            confirm_password: {
                equalTo: "#new_password"
            }
        },
        messages: {
            confirm_password: " Enter Confirm Password Same as Password"
        },
        submitHandler: function(form) {
            form.submit();
        }
    })
</script>
<?php
ob_flush();
?>
</html>
<?php
get_footer();
