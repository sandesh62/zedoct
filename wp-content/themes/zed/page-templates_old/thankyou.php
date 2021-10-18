<?php

/**
 * Template Name: Thank You
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
  <title>Detail Cause | Zed</title>
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
  $id = $_GET['id'];
  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $id, OBJECT);
  $res = $results[0];
  if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
  } else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
  } else {
    $fundtitle = $res->fundraiser_title;
  }

  if ($res->image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
  } else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
  }
  ?>
  <!-- start page-wrapper -->
  <div class="page-wrapper">
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

    <!-- tp-event-details-area start -->
    <div class="tp-case-details-area section-padding sec-detail">
      <div class="container causeslist">
        <div class="row">

          <div class="col col-md-12" style="text-align: center;">
            <div class="tp-case-details-wrap">
              <div class="tp-case-details-text">                
                <div id="Description" class="centers">
                <h2 style="text-align: center;margin-top:5px;margin-bottom: 20px;">Your Campaigns Is Under Review !</h2>
                  <div class="tp-case-details-img">
                    <img src="<?php echo $iimage; ?>" alt="" />
                  </div>
                  <div class="tp-case-content">
                    <div class="tp-case-text-top">
                      <h3><b>Campaigns Title:</b> <span style="font-size:25px"><?php echo $fundtitle; ?></span></h3>
                      
                    </div>
                  </div>

                  <a href="<?= BASE_URL; ?>" class="button1thanks">Go To Dashboard</a>

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
