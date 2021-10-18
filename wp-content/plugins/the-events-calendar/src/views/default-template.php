<?php

/**

 * Default Events Template

 * This file is the basic wrapper template for all the views if 'Default Events Template'

 * is selected in Events -> Settings -> Display -> Events Template.

 *

 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php

 *

 * @package TribeEventsCalendar

 * @version 4.6.23

 *

 */



if ( ! defined( 'ABSPATH' ) ) {

	die( '-1' );

}



get_header();

?>
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
</head>
<body>
<!-- <main id="tribe-events-pg-template" class="tribe-events-pg-template"> -->

	<?php //tribe_events_before_html(); ?>

	<?php tribe_get_view(); ?>

	<?php //tribe_events_after_html(); ?>

<!-- </main> --> <!-- #tribe-events-pg-template -->
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