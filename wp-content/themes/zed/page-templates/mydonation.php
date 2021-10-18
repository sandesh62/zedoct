<?php
error_reporting(0);
/**
 * Template Name: My Donation
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

 
get_header();
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

    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
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

        .tp-blog-sidebar {
            margin-top: 4%;
        }
        .tp-blog-sidebar .category-widget ul a:hover {
            display: block;
            /* color: #fff; */
        }
        .paginate_button.active a{
            color: white !important;
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
            /* float: right; */
            margin-top: 0px;
        }

        .tp-blog-sidebar .category-widget ul a {
            display: block;
            /* color: #fff; */
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
        
    .ti-youtube:before {
    content: "\e728";
    color: #EA1E15;
}
        @media (max-width: 767px){
            
        
        .abc{
            float:none;color:#fff !important
        }
    }
    @media (min-width: 768px){
        .abc{
            float:left !important;color:#fff !important
        }
    }
    </style>
</head>
<?php 
global $wpdb, $user_ID;

if (!$user_ID) {
    header("Location: " . BASE_URL . 'login');
}
$userId = $user_ID;
$user = wp_get_current_user();
$user_email = $user->user_email;

$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND emailId = '" . $user_email . "' ORDER BY id DESC", ARRAY_A);
?>
<body>
    <div class="page-wrapper">
        <div class="preloader1" style="display: none;">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>

        <!-- tp-event-details-area start -->
        <div class="tp-case-details-area section-padding sec-detail">
            <div class="container causeslist">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-12 sec-detail">
                        <div class="tp-blog-sidebar">
                            <div class="widget category-widget">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Fundraiser Title</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone No. </th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                <tr>
                                                    <td><img style="width: 50px;height: 50px;" src="<?= $iimage ?>" /></td>
                                                    <td><?php echo $fundtitle; ?></td>
                                                    <td><?php echo $resul['emailId']; ?></td>
                                                    <td><?php echo $resul['address']; ?></td>
                                                    <td><?php echo $resul['phonenumber']; ?></td>                                 
                                                    <td>INR <?php echo $resul['amount']; ?></td>  
                                                </tr>
                                        <?php } 
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 

    <div class="tp-ne-footer">
        <!-- start tp-site-footer -->
        <footer class="tp-site-footer">
            <div class="tp-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt="blog">
                                </div>
                                <p>Creating more helping hands by bridging the gap between donors and the people lacking the necessities of life </p>
                                <ul>
                                <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://m.facebook.com/ZED-Foundation-102464085193955/?ref=bookmarks" target="_blank">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://www.instagram.com/zedfoundation/" target="_blank">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://www.youtube.com/channel/UCIJGrVCT23zxHX0SMwOgjYw" target="_blank">
                                                    <i class="ti-youtube"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Useful Links</h3>
                                </div>
                                <ul>
                                    <!--<li><a href="javascript:void(0)">How It Works</a></li>-->
                                    <li><a href="<?= BASE_URL ?>covid-detail/">Covid Support</a></li>
                                    <li><a href="<?= BASE_URL ?>privacy-policy/">Privacy Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>aml-policy/">AML Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>term-of-use/">Terms of Use</a></li>
                                    <li><a href="<?= BASE_URL ?>refund-policy/">Refund Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>cancellation-policy/">Cancellation Policy</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-lg-offset-1 col-md-4 col-sm-6">
                            <div class="widget market-widget tp-service-link-widget">
                                <div class="widget-title">
                                    <h3>Contact </h3>
                                </div>                            
                                <div class="contact-ft">
                                    <ul>
                                        <!-- <li><i class="fi flaticon-pin"></i>28 Street, New York City, USA</li> -->
                                        <li><i class="fi flaticon-call"></i><a href="tel:+91 7208701981">+91 7208701981</a></li>
                                        <li><i class="fi flaticon-envelope"></i><a href="mailto:info@zedaid.org">info@zedaid.org</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget instagram">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="tp-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <span class="abc">Designed with
                                <i class="fa fa-heart text-primary"></i> by
                                <a href="https://innovuratech.com/" target="_blank" style="color:#fff !important">Innovura Technologies</a>
                            </span>
                            <span style="float:right;color:#fff !important">
                                Copyright © 2021 ZED Platforms - All Rights Reserved. </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end tp-site-footer -->
    </div>
</div>
<!-- end of page-wrapper -->
<div id="magic-cursor">
    <div id="ball">
        <div id="ball-drag-x"></div>
        <div id="ball-drag-y"></div>
        <div id="ball-loader"></div>
    </div>
</div>

</body>
<!-- All JavaScript files
    ================================================== -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<!-- Plugins for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
<!-- Custom script for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>

<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script>
    function startcamp() {
        $.cookie("actual_link", null, { path: '/' });
        <?php
        $cUrl = BASE_URL . "start-campaign/";
        $cUrll = BASE_URL . "login/";
        ?>
        $.cookie("actual_link", "<?= $cUrl; ?>", {
            path: '/'
        });
        window.location.replace("<?= $cUrll; ?>");
    }

    jQuery(document).ready(function () {
        window.onbeforeunload = function (e) {
            jQuery('.preloader1').css('display','block');
        }
        jQuery(window).load(function () {
            jQuery('.preloader1').css('display','none');
        });
    });
</script>
</html>
<?php
//get_footer();
?>
<script>
jQuery(document).ready(function() {
    jQuery('#example').DataTable({
        "scrollX": true
    });
});
</script>