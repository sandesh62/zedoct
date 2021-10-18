<?php
error_reporting(0);
/**
 * Template Name: My Donation
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
$user = wp_get_current_user();
$user_email = $user->user_email;

$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND emailId = '" . $user_email . "'", ARRAY_A);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>My Donation | Zed</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
        }

        /* Style the tab */
        .tab {
            float: left;
            width: 10%;
            margin: 20px 50px 0px 50px;
            position: fixed;
        }

        .tp-blog-sidebar .category-widget ul a:hover {
            display: block;
            color: #fff;
        }

        .ff {
            font-style: unset;
            margin-right: 10px;
            font-size: 25px;
        }

        .section-pad {
            padding: 20px 0;
            min-height: 800px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: #3d3d8a30;
            color: #000;
            padding: 10px;
            width: 40%;
            border: none;
            outline: none;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
            border-radius: 10px;
            margin: 20px 0px 20px 0px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #3D3D8A;
            color: #fff;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #3D3D8A;
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 5px 10px 0 rgb(63 81 181 / 44%);
        }

        .pbars {
            width: 100% !important;
        }

        .progress .progress-bar {
            border-radius: 15px;
            box-shadow: none;
            position: relative;
            animation: animate-positive 4s;
            width: 5% !important;
            background: #8bc34a;
            height: 5px;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 10px 12px 10px 160px;
            border: none;
            width: 100%;
            border-left: none;
        }

        .rai {
            margin-left: 16% !important;
            display: inline-flex;
        }

        .tp-blog-sidebar .category-widget ul>li+li {
            float: right;
            margin-top: 0px;
        }

        .tp-blog-sidebar .category-widget ul a {
            display: block;
            color: #fff;
        }

        .licause a {
            color: #fff !important;
        }

        .tp-blog-sidebar .category-widget ul li {
            font-size: 18px;
            position: relative;
            padding-bottom: 0px;
        }

        .dbtn {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        li.rai2 span {
            margin-right: 110%;
        }

        li.licause {
            width: 400px;
        }

        .rai3 {
            margin-left: 140% !important;
            color: #000;
        }

        .cause-text {
            padding: 20px;
            padding-top: 0;
            text-align: center;
            background: #fff;
            border-top: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .licause {
            margin-top: 20px;
            margin-bottom: 0px;
        }

        .bod {
            background: none;
            border: none;
            width: 50%;
            margin-right: 20px;
        }

        .cause-text ul li a {
            padding: 10px 20px;
            background: #3d3d8a;
            margin-top: 10px;
            border-radius: 10px;
            color: #fff;
            font-weight: 500;
            box-shadow: 0 0 7px #ffffff;
            width: 400px;
        }
    </style>
</head>

<body>

    <div class="tab">
        <p><a href="<?= BASE_URL ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" class="margin-5" alt=""></a> </p>
    </div>
    <div id="usa" class="tabcontent">
        <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-12">
                        <div class="tp-blog-sidebar">

                            <?php
                            if ($resultsdonacc) {
                                foreach ($resultsdonacc as $resul) {

                                    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id = " . $resul['campaign_Id']);
                                    $recs = $resultscc[0];

                                    if ($recs->campaign_typeId == 2) {
                                        $fundtitle = $recs->item_name;
                                    } else if ($recs->campaign_typeId == 3) {
                                        $fundtitle = $recs->product_name;
                                    } else {
                                        $fundtitle = $recs->fundraiser_title;
                                    }

                                    if ($recs->image) {
                                        $iimage = BASE_URL . 'fundraiserimg/' . $recs->image;
                                    } else {
                                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $recs->video);
                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
                                    }

                                    ?>

                                    <div class="widget category-widget container">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img style="width: 150px;height: 150px;" src="<?= $iimage ?>" />
                                            </div>

                                            <div class="col-md-10">
                                                <p style="color:#000;font-weight:400;">Fundraiser Title : <?php echo $fundtitle; ?></p>
                                                <p style="color:#000;font-weight:400;">Email : <?php echo $resul['emailId']; ?></p>
                                                <p style="color:#000;font-weight:400;">Address : <?php echo $resul['address']; ?></p>
                                                <p style="color:#000;font-weight:400;">Phone No : <?php echo $resul['phonenumber']; ?></p>

                                                <p style="color:#000;font-weight:400;"><b>INR <?php echo $resul['amount']; ?></b> </p>
                                            </div>
                                        </div>

                                    </div>

                                <?php }
                                } else { ?>
                                <h4>No donation found.</h4>
                            <?php
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>