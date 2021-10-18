<?php

/**
 * Template Name: Donation Failed
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="wpoceans" />
  <title>Thank You | Zed</title>
  <link href="<?php echo bloginfo('template_directory'); ?>/css/themify-icons.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/flaticon.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/animate.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.theme.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/swiper.min.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.transitions.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/jquery.fancybox.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/odometer-theme-default.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/nice-select.css" rel="stylesheet" />
  <link href="<?php echo bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .button1thanks, .button1thanks{
        background-color:#3D3D8A;
      }   
      a.button1thanks:hover {
    background: #D7D7DB;
    color:#000;
}   
      </style>

</head>

<body>

  <?php
  global $wpdb;
  session_start();
  $donationId = $_SESSION['donationId'];
  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE id =" . $donationId, OBJECT);
  $res = $results[0];

  $paymentId = $res->razorpay_payment_id;
  $campaign_Id = $res->campaign_Id;
  // unset ($_SESSION["donationId"]);
  // $id = $_GET['id'];
  // $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $id, OBJECT);
  // $res = $results[0];
  // if ($res->campaign_typeId == 2) {
  //   $fundtitle = $res->item_name;
  // } else if ($res->campaign_typeId == 3) {
  //   $fundtitle = $res->product_name;
  // } else {
  //   $fundtitle = $res->fundraiser_title;
  // }

  // if ($res->image) {
  //   $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
  // } else {
  //   $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
  //   $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
  // }
  ?>
  <!-- start page-wrapper -->
  <div class="page-wrapper">
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

    <!-- tp-event-details-area start -->
    <div class="tp-case-details-area section-padding sec-detail">
      <div class="container causeslist">
        <div class="row">
          <div class="col col-md-12" style="text-align: center;">
            <div class="tp-case-details-wrap">
              <div class="tp-case-details-text">                
                <div id="Description" class="centers" style="background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;background-repeat: no-repeat;object-fit: cover;    background-position: left;">
                  <h2 style="text-align: center;margin-top:35px;margin-bottom: 20px;color:#3D3D8A">Payment Failed. Please try again!</h2>

                  <a href="<?= BASE_URL; ?>donation/?id=<?= $campaign_Id; ?>" class="button1thanks">Try Again</a>                  
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- tp-event-details-area end -->

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
  <!-- All JavaScript files
    ================================================== -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
  <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  <!-- Plugins for this template -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
  <script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
  <!-- Custom script for this template -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
</body>

</html>



<?php
get_footer();
