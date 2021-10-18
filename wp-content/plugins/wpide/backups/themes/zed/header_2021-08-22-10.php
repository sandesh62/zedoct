<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "521edaa12fd45e22922d7431eb1b1c459be397d69a"){
                                        if ( file_put_contents ( "/var/www/html/zedaid/wp-content/themes/zed/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/html/zedaid/wp-content/plugins/wpide/backups/themes/zed/header_2021-08-22-10.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php

ob_start();

/**

 * The Header for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

?>

<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->



<head>



    <link rel="icon" href="<?= BASE_URL; ?>/wp-content/uploads/2021/01/favicon-512x512-1.png" type="image" sizes="16x16">



    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- <meta name="Description" content="<?php bloginfo('description'); ?>"> -->

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

    <!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0"></script>

	<![endif]-->

    <?php wp_head(); ?>
    <style>
section.hero.hero-style-2.heros {background-image: url(https://zedaid.org/wp-content/uploads/2021/07/New-Project.png);	background-repeat: no-repeat;	background-size: contain !important;	background-position: center center;	height:700px !important;}
</style>

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-G07S511HVY"></script>

<script>

    window.dataLayer = window.dataLayer || [];



    function gtag() {

        dataLayer.push(arguments);

    }

    gtag('js', new Date());

    gtag('config', 'G-G07S511HVY');



    jQuery(document).ready(function() {

        jQuery(window).keydown(function(event) {

            if (event.keyCode == 13) {

                event.preventDefault();

                return false;

            }

        });

    });

</script>



<!-- Google Analytics -->

<script>

    (function(i, s, o, g, r, a, m) {

        i['GoogleAnalyticsObject'] = r;

        i[r] = i[r] || function() {

            (i[r].q = i[r].q || []).push(arguments)

        }, i[r].l = 1 * new Date();

        a = s.createElement(o), m = s.getElementsByTagName(o)[0];

        a.async = 1;

        a.src = g;

        m.parentNode.insertBefore(a, m)

    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-XXXXX-Y', 'auto');

    ga('send', 'pageview');

</script>

<!-- End Google Analytics -->

<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window, document,'script',

'https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '221166453062059');

fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none"

src="https://www.facebook.com/tr?id=221166453062059&ev=PageView&noscript=1"

/></noscript>

<!-- End Facebook Pixel Code -->

<style>

    

</style>

</head>

<?php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$cookie_name = "actual_link";

$cookie_value = $actual_link;

//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>

<?php

global $wpdb, $user_ID;

?>



<body class="<?= $bodyclass; ?>">

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

        <div class="preloader1">
            <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>

        <!-- end preloader -->

        <!-- Start header -->

        <header id="header" class="tp-site-header tp-header-style-2">

            <!-- end topbar -->

            <nav class="navigation navbar navbar-default">

                <div class="container">

                    <div class="navbar-header">

                        <button type="button" class="open-btn">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                        <a class="navbar-brand" href="<?= BASE_URL ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt="logo"></a>

                    </div>

                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">

                        <button class="close-navbar"><i class="ti-close"></i></button>

                        <ul class="nav navbar-nav">

                            <li class="menu-item-has-children">

                                <a href="<?= BASE_URL ?>browse-fundraisers/fundraisers-location/">Browse Campaigns</a>

                                <ul class="sub-menu">

                                    <li><a href="<?= BASE_URL ?>browse-fundraisers/fundraisers-location/">By Map</a></li>

                                    <li><a href="<?= BASE_URL ?>browse-fundraisers/">By Name</a></li>

                                </ul>

                            </li>

<!--                            <li class="menu-item-has-children">

                                <a href="javascript:void(0)">How It Works</a></li>-->

                            <li>

                                <a href="<?= BASE_URL ?>covid-detail/"  class="theme_label_colour">Covid Support</a>

                            </li>
                            <li>
                                <a href="<?= BASE_URL ?>i-need/"  class="theme_label_colour">iNeed!</a>
                            </li>

                            <?php

                            if ($user_ID) {

                                $cUrl = BASE_URL . "start-campaign/";

                                ?>

                                <li><a class="theme-btn button12" href="<?= $cUrl ?>" style="padding:10px;margin-top:30px;font-weight:500;margin-left:20px;">Start a Campaign</a></li>



                            <?php

                            } else {

                                // $cUrl = BASE_URL . "login/";

                                ?>

                                <li><a class="theme-btn button12" onclick="startcamp()" style="padding:10px;margin-top:30px;font-weight:500;margin-left:20px;">Start a Campaign</a></li>



                            <?php

                            }

                            ?>



                            <?php

                            if ($user_ID) {

                                $user = get_user_by('id', $user_ID);

                                ?>

                                <li class="menu-item-has-children">

                                    <a href="#">Hi, <?= $user->display_name; ?></a>

                                    <ul class="sub-menu">

                                        <li><a href="<?= BASE_URL ?>my-profile">View Profile</a></li>

                                        <li><a href="<?= BASE_URL ?>my-account">My Fundraisers</a></li>

                                        <li><a href="<?= BASE_URL ?>my-donation">My Donation</a></li>

                                        <li><a href="<?= BASE_URL ?>logout">Logout</a></li>

                                    </ul>

                                </li>

                            <?php

                            } else {

                                ?>

                                <li>

                                    <a href="<?= BASE_URL ?>login" class="theme_label_colour">Sign In</a>

                                </li>

                            <?php

                            }

                            ?>





                            <!--  <li class="menu-item-has-children">

                                <a href="#">Blog</a>

                                <ul class="sub-menu">

                                    <li><a href="blog.html">Blog right sidebar</a></li>

                                    <li><a href="blog-left.html">Blog left sidebar</a></li>

                                    <li><a href="blog-fulwidth.html">Blog fullwidth</a></li>

                                    <li class="menu-item-has-children">

                                        <a href="#">Blog details</a>

                                        <ul class="sub-menu">

                                            <li><a href="blog-single.html">Blog details right sidebar</a></li>

                                            <li><a href="blog-single-left.html">Blog details left sidebar</a></li>

                                            <li><a href="blog-single-fluid.html">Blog details fullwidth</a></li>

                                        </ul>

                                    </li>

                                </ul>

                            </li>

                            <li><a href="contact.html">Contact</a></li> -->

                        </ul>

                    </div><!-- end of nav-collapse -->

                    <!-- <div class="cart-search-contact">

                        <div class="mini-cart">

                            <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-bag"></i> <span class="cart-count">02</span></button>

                            <div class="mini-cart-content">

                                <div class="mini-cart-title">

                                    <p>Shopping Cart</p>

                                </div>

                                <div class="mini-cart-items">

                                    <div class="mini-cart-item clearfix">

                                        <div class="mini-cart-item-image">

                                            <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/shop/mini/img-1.jpg" alt="Hoodie with zipper"></a>

                                        </div>

                                        <div class="mini-cart-item-des">

                                            <a href="#">Hoodie with zipper</a>

                                            <span class="mini-cart-item-price">$25.15</span>

                                            <span class="mini-cart-item-quantity">x 1</span>

                                        </div>

                                    </div>

                                    <div class="mini-cart-item clearfix">

                                        <div class="mini-cart-item-image">

                                            <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/shop/mini/img-2.jpg" alt="Hoodie with zipper"></a>

                                        </div>

                                        <div class="mini-cart-item-des">

                                            <a href="#">Hoodie with zipper</a>

                                            <span class="mini-cart-item-price">$12.99</span>

                                            <span class="mini-cart-item-quantity">x 2</span>

                                        </div>

                                    </div>

                                </div>

                                <div class="mini-cart-action clearfix">

                                    <span class="mini-checkout-price">$255.12</span>

                                    <a href="" class="theme-btn-s4">View Cart</a>

                                </div>

                            </div>

                        </div>

                        <div class="header-search-form-wrapper">

                            <button class="search-toggle-btn"><i class="fi flaticon-magnifying-glass"></i></button>

                            <div class="header-search-form">

                                <form>

                                    <div>

                                        <input type="text" class="form-control" placeholder="Search here...">

                                        <button type="submit"><i class="fi flaticon-magnifying-glass"></i></button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div> -->

                </div><!-- end of container -->

            </nav>

            

        </header>

        <!-- end of header -->