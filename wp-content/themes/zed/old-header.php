<?php

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
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0"></script>
	<![endif]-->
    <?php //wp_head(); 
    ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/jClocksGMT.css">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/responsive.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<meta name="google-site-verification" content="s9CcWYYTr4WU6RJYiujnE9bA9MQxqy0BjbqzFAcSp6E" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
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
fbq('init', '248538373489340');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=248538373489340&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108450792-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108450792-1');
</script>
<!-- Global site tag (gtag.js) - Google Ads: 405681226 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-405681226"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-405681226');
</script>
</head>
<?php
$parent_title = get_post_ancestors($post);

if ($parent_title) {
    $slug = get_post_field('post_name', $parent_title[0]);
} else {
    $slug = get_post_field('post_name', get_post());
}
if (get_page_template_slug(get_the_ID())) {
    if ($slug == 'hair-transplantation-turkey') {
        $bodyclass = "hair-transplant-in-turkey";
    } elseif ($slug == 'bluemagic-experience') {
        $bodyclass = "blue-magic-experience";
    } elseif ($slug == 'our-media') {
        $bodyclass = "our-media-wrapper-body";
    } elseif ($slug == 'faq') {
        $bodyclass = "faqs-body-wrapper";
    } elseif ($slug == 'contact-us') {
        $bodyclass = "contact-us-body";
    } elseif ($slug == 'flex-payments') {
        $bodyclass = "blue-magic-flex-payment";
    } elseif ($slug == 'press-and-award') {
        $bodyclass = "media-press-and-award";
    } elseif ($slug == 'our-services') {
        $bodyclass = "our-services";
    } elseif ($slug == 'our-book') {
        $bodyclass = "our-book-offer-popup";
    } else {
        $bodyclass = "";
    }
} else {
    $bodyclass = "blog-listing-wrapper-body";
}
?>

<body class="<?= $bodyclass; ?>">
    <script>
        var base_url = '<?= BASE_URL ?>';
    </script>
    <!--start header-->

    <header>

        <div class="header-topbar">

            <div class="container">

                <div class="d-flex-container">

                    <div class="logo">

                        <a href="<?= BASE_URL; ?>">

                            <!--<img src="<?php echo bloginfo('template_directory'); ?>/images/logo.png" alt="Blue Magic" />-->
                            <!--<img src="<?php echo bloginfo('template_directory'); ?>/images/BlueMagicGroup.svg" alt="Blue Magic" height="83px" width="237px" />-->
                            <img src="<?= BASE_URL; ?>/wp-content/uploads/2021/01/BlueMagicGroup.svg" alt="Blue Magic" height="83px" width="237px" />


                        </a>

                    </div>

                    <ul class="header-contact">

                        <li>

                            <span class="icon language"></span>

                            <div class="icon-info">

                                <b>Languages</b>

                                <?php echo do_shortcode('[gtranslate]'); ?>
                                <!-- <span>English <i class="fa fa-angle-down"></i></span> -->

                            </div>

                        </li>

                        <li>

                            <span class="icon call"></span>

                            <div class="icon-info">

                                <b>Call 24/7</b>

                                <span><a style="color: #42474c !important;" href="tel:+39 030 764 1043">+39 030 764 1043</a> <i class="fa fa-angle-down"></i></span>

                            </div>

                            <div class="overlay hide">

                                <span><a style="color: #42474c !important;" href="tel:+44 20 3936 0689">+44 20 3936 0689</a></span>

                                <span><a style="color: #42474c !important;" href="tel:+1 646-809-7654">+1 646-809-7654</a></span>

                            </div>

                        </li>

                        <li>

                            <span class="icon clock"></span>

                            <div class="icon-info">

                                <b>Open Hours</b>

                                <span>Mon - Sat: 9am to 6pm</span>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

        <a href="<?= BASE_URL; ?>flex-payments/" class="btn flex-payment responsve-fp">Flex Payment</button>

        </a>

        <span class="responsive-menu">

            <i class="menu-icon line1"></i>

            <i class="menu-icon line2"></i>

            <i class="menu-icon line3"></i>

        </span>

        <div class="navigation">

            <ul class="header-contact mobile-header-contact">
                <li>
                    <span class="icon language"></span>
                    <div class="icon-info">
                        <!-- <span>English <i class="fa fa-angle-down"></i></span> -->
                        <?php echo do_shortcode('[gtranslate]'); ?>
                    </div>
                </li>
                <li>
                    <span class="icon call"></span>
                    <div class="icon-info">
                        <span><a style="color: #42474c !important;" href="tel:+39 030 764 1043">+39 030 764 1043</a> <i class="fa fa-angle-down"></i></span>
                    </div>
                    <div class="overlay hide">
                        <span><a style="color: #42474c !important;" href="tel:+44 20 3936 0689">+44 20 3936 0689 </a></span>
                        <span><a style="color: #42474c !important;" href="tel:+1 646-809-7654">+1 646-809-7654</a></span>
                    </div>
                </li>
            </ul>

            <div class="container">

                <div class="d-flex-container p-0">

                    <div class="navbar">

                        <nav>

                            <ul>

                                <li><a href="<?= BASE_URL; ?>" class="<?= $slug == 'homepage' ? "active" : ""; ?>">Home</a></li>

                                <li><a href="<?= BASE_URL; ?>about-us/" class="<?= $slug == 'about-us' ? "active" : ""; ?>">About us</a></li>

                                <li class="dropdown"><a href="javascript:void(0)" class="<?= $slug == 'our-services' ? "active" : ""; ?>">Hair Transplant <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/hair-transplant/">Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/fue-hair-transplant/">Sapphire FUE Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/dhi-hair-transplant/">DHI Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/hair-transplant-for-women/">Hair Transplant For Women</a></li>
                                        <li>
                                            <a href="<?= BASE_URL; ?>packages-and-services/manual-hair-transplant/">Manual Hair transplant &nbsp;
                                                <button class="btn" style="background: #D1372A; margin-top: -2px; padding-right: 14px; padding-left: 14px; padding-top: 4px; padding-bottom: 3px; position: absolute;font-size: 11px; color: white;">Exclusive</button>
                                            </a>
                                        </li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/afro-hair-transplant/">Afro Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/beard-transplantation/">Beard Transplantation</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/eyebrow-transplantation/">Eyebrow Transplantation</a></li>
                                        <li><a href="<?= BASE_URL; ?>packages-and-services/prp-therapy/">Prp Hair Treatment</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="javascript:void(0)" class="<?= $slug == 'results-final' ? "active" : ""; ?>">Results <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= BASE_URL; ?>results-final/">Results</a></li>
                                        <li><a href="<?= BASE_URL; ?>testimonial/">Testimonials</a></li>
                                    </ul>
                                </li>

                                <!--<li><a href="<?= BASE_URL; ?>results-final/" class="<?= $slug == 'results-final' ? "active" : ""; ?>">Results</a></li>-->

                                <li class="dropdown"><a href="javascript:void(0)" class="<?= ($slug == 'before-hair-transplant-operation') || ($slug == 'faq') || ($slug == 'hair-transplantation-turkey')   ? "active" : ""; ?>">Patient Guide <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= BASE_URL; ?>before-hair-transplant-operation/" class="<?= $slug == 'before-hair-transplant-operation' ? "active" : ""; ?>">Before Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>after-hair-transplant-operation/" class="<?= $slug == 'after-hair-transplant-operation' ? "active" : ""; ?>">After Hair Transplant</a></li>
                                        <li><a href="<?= BASE_URL; ?>post-operative-hair-wash/">Post Operative Hair Wash</a></li>
                                        <li><a href="<?= BASE_URL; ?>hair-transplantation-turkey/" class="<?= $slug == 'hair-transplantation-turkey' ? "active" : ""; ?>">Hair Transplant in Turkey</a></li>
                                        <li><a href="<?= BASE_URL; ?>faq/" class="<?= $slug == 'faq' ? "active" : ""; ?>">FAQ'S</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="javascript:void(0)" class="<?= ($slug == 'press-and-award') || ($slug == 'our-book') || ($slug == 'bluemagic-experience') || ($slug == 'our-media') ? "active" : ""; ?>">Media <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= BASE_URL; ?>press-and-award/">Press Release</a></li>
                                        <li><a href="<?= BASE_URL; ?>experience/">The BlueMagic Group Experience</a></li>
                                        <li><a href="<?= BASE_URL; ?>our-media/">Photos/Videos</a></li>
                                        <!-- <li><a href="<?= BASE_URL; ?>our-media/">Videos</a></li> -->
                                        <li><a href="<?= BASE_URL; ?>our-book/">Our Book</a></li>
                                    </ul>
                                </li>

                                <li><a href="<?= BASE_URL; ?>blog/" class="<?= $bodyclass == 'blog-listing-wrapper-body' ? 'active' : ''; ?>">Blog</a></li>

                                <li><a href="<?= BASE_URL; ?>contact-us/" class="<?= $slug == 'contact-us' ? "active" : ""; ?>">Contact us</a></li>

                            </ul>

                        </nav>

                    </div>

                    <a href="<?= BASE_URL; ?>flex-payments/" class="btn flex-payment">Flex Payment</button>

                    </a>

                </div>



            </div>

        </div>

    </header>

    <!--end header-->