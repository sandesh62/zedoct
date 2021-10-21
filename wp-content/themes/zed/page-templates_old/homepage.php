<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
global $wpdb;
?>
<head>
    <style>
.details a, p {
    color: #fff;
}
</style>
</head>
<!-- start of hero -->
<section class="hero hero-style-2">
    <div class="hero-slider">
        <div class="slide" style="height:600px">
            <div class="container">
                <img src="<?php echo bloginfo('template_directory'); ?>/images/new.jpeg" alt class="slider-bg" />
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>Share A <span>SMILE</span></h2>
                        </div>
                        <!-- <div class="slide-subtitle">
                    <p>High Quality Charity Theme in Envato Market.</p>
                    <p>You Can Satisfied Yourself By Helping.</p>
                  </div>
                  <div class="btns">
                    <a href="donate.html" class="theme-btn">Donate Now</a>
                    <a href="about.html" class="theme-btn-s2">Know More</a>
                  </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" style="height:600px">
            <div class="container">
                <img src="<?php echo bloginfo('template_directory'); ?>/images/Banner2.jpeg" alt class="slider-bg" />
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>GiveHelp - GetHelp With <span>Transparency</span></h2>
                        </div>
                        <!-- <div class="slide-subtitle">
                    <p>High Quality Charity Theme in Envato Market.</p>
                    <p>You Can Satisfied Yourself By Helping.</p>
                  </div>
                  <div class="btns">
                    <a href="donate.html" class="theme-btn">Donate Now</a>
                    <a href="about.html" class="theme-btn-s2">Know More</a>
                  </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="slide" style="height:600px">
            <div class="container">
                <img src="<?php echo bloginfo('template_directory'); ?>/images/new.jpeg" alt class="slider-bg" />
                <div class="row">
                    <div class="col col-md-6 slide-caption">
                        <div class="slide-title">
                            <h2>Collaborative Channel across Locations for <span>Campaign</span></h2>
                        </div>
                        <!-- <div class="slide-subtitle">
                    <p>High Quality Charity Theme in Envato Market.</p>
                    <p>You Can Satisfied Yourself By Helping.</p>
                  </div>
                  <div class="btns">
                    <a href="donate.html" class="theme-btn">Donate Now</a>
                    <a href="about.html" class="theme-btn-s2">Know More</a>
                  </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of hero slider -->
</div>
<!--features start -->
<div class="features-area features-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="features-item-2">
                    <div class="features-icon" style="width: 100px;height: 100px;background: #ffffff;line-height: 100px;margin-right: 0px;color: #f57d4a;margin-left: 0px;margin: 0 auto;border-radius: 50%;align-items: center;">
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/mission.svg" width="50">
                    </div>
                    <div class="features-content">
                        <h3>Our Mission</h3>
                        <p style="padding-right:20px;padding-left:20px;">Providing a transparent and collaborative channel for people/NGOs to effectively help people in need across locations.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="features-item-2">
                    <div class="features-icon" style="width: 100px;height: 100px;background: #ffffff;line-height: 100px;margin-right: 0px;color: #f57d4a;margin-left: 0px;margin: 0 auto;border-radius: 50%;align-items: center;">
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/program.svg" width="50">
                    </div>
                    <div class="features-content">
                        <h3>Our Program</h3>
                        <p style="padding-right:20px;padding-left:20px;">Providing a platform to create various campaigns by individuals/NGOs for the people lacking the basic necessities of life</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="features-item-2">
                    <div class="features-icon" style="width: 100px;height: 100px;background: #ffffff;line-height: 100px;margin-right: 0px;color: #f57d4a;margin-left: 0px;margin: 0 auto;border-radius: 50%;align-items: center;">
                        <img src="<?php echo bloginfo('template_directory'); ?>/images/vision.svg" width="50">
                    </div>
                    <div class="features-content">
                        <h3>Our vision</h3>
                        <p style="padding-right:20px;padding-left:20px;">Creating more helping hands by bridging the gap between donors and the people lacking the necessities of life</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--features-features end -->
<!-- about-area start-->
<div class="about-style-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-title text-center" style="text-align:center">
                    <!--<span>About Us</span>-->
                    <h2>Who We Are?</h2>
                </div>
                <div class="about-img">
                    <img src="<?php echo bloginfo('template_directory'); ?>/images/videobanner.png" alt="">
                    <div class="video-btn">
                        <ul>
                            <li><a href="https://zedaid.org/wp-content/uploads/2021/02/Zed-Aid-Introduction-26-Jan-2021-final.mp4?_=1" class="video-btn" data-type="iframe">
                                    <i class="fi flaticon-play-button"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 col-sm-12 col-12">
                        <div class="about-content">
                            <div class="section-title">
                                <h2>About Us</h2>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at ,sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum</p> 
                            <p> and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum,Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                            <div class="btns">
                                <div><a class="theme-btn" href="about.html">More About Us..</a></div>
                            </div>
                            <div class="signature">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/img-1.png" alt="">
                            </div>
                        </div>
                    </div> -->
        </div>
    </div>
</div>
<!-- about-area end-->
<!-- .tp-counter-area start -->
<?php
$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1", ARRAY_A);
$resultsdonaccxcam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
$resultsdonaccx = $wpdb->get_results("SELECT sum(lives_count) as livecount FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
$resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish'", ARRAY_A);
?>
<div class="tp-counter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-counter-grids">
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="<?= count($resultsdonacc); ?>"><?= count($resultsdonacc); ?></span></h2>
                        </div>
                        <p>Life Enablers</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="<?= count($resultsdonaccxcam); ?>"><?= count($resultsdonaccxcam); ?></span></h2>
                        </div>
                        <p>CAMPAIGN</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="<?= $resultsdonaccx[0]['livecount'] ?>"><?= $resultsdonaccx[0]['livecount'] ?></span></h2>
                        </div>
                        <p>#ZedLives</p>
                    </div>
                    <div class="grid">
                        <div>
                            <h2><span class="odometer" data-count="<?= count($resultsdonaccxe); ?>"><?= count($resultsdonaccxe); ?></span></h2>
                        </div>
                        <p>ZED EVENTS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .tp-counter-area end -->
<!-- case-area-start -->
<div class="case-area section-padding">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="section-title text-center">
                <!-- <div class="thumb-text">
                    <span>A red flare silhouetted the</span>
                </div> -->
                <h2>Recent Campaigns</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 order by id DESC limit 3", OBJECT);
            if ($results) {
                foreach ($results as $res) {
                    $shareurl = BASE_URL . 'campaign-detail/?id=' . $res->id;
                    if ($campaign_typeId == 1) {
                        $donationurl = BASE_URL . 'donation/?id=' . $res->id;
                        $btntext = 'Donate';
                    } else {
                        $donationurl = BASE_URL . 'material-donation/?id=' . $res->id;
                        $btntext = 'Show Interest';
                    }
                    $date1 = date("Y-m-d");
                    $date2 = $res->end_date;
                    // Use comparison operator to 
                    // compare dates
                    if ($date1 > $date2) {
                        $btn = 1;
                        $btntext = 'Ended';
                        $ispastevent = true;
                        $donationurl = $shareurl;
                        $viewclass = 'viewdetails';
                    } else {
                        $btn = 1;
                        $btntext = $btntext;
                        $ispastevent = false;
                        $donationurl = $donationurl;
                        $viewclass = '';
                    }
                    if ($res->campaign_typeId == 2) {
                        $fundtitle = $res->item_name;
                    } else if ($res->campaign_typeId == 3) {
                        $fundtitle = $res->product_name;
                    } else {
                        $fundtitle = $res->fundraiser_title;
                    }
                    if ($res->campaign_typeId == 2) {
                        $goal_amount = $res->item_qty;
                        $currency = 'Qty';
                    } else if ($res->campaign_typeId == 3) {
                        $goal_amount = $res->product_price * $res->product_qty;
                        $currency = $res->currency;
                    } else {
                        $goal_amount = $res->goal_amount;
                        $currency = $res->currency;
                    }
                    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res->id . ")", ARRAY_A);
                    if ($res->id == 24) {
                        $achieve_amount = 80000;
                        $percn = 100;
                    } else if ($res->id == 25) {
                        $achieve_amount = 16000;
                        $percn = 100;
                    } else {
                        $achieve_amount = 0;
                        foreach ($resultsdonacc as $tt) {
                            if ($tt['campaign_typeId'] == 3) {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
                            } else {
                                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                            }
                            $achieve_amount += $achieve_amountn;
                        }
                        $percn = $achieve_amount / $goal_amount * 100;
                    }
                    if ($res->image) {
                        $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                    } else {
                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
                    }
                    $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $res->id . ") and status = 1");
                    $userId = $res->userId;
                    $user_name = '';
                    $user = get_user_by('ID', $userId);
                    if ( ! empty( $user ) ) {
                        $user_name = $user->display_name;
                    }
                    if(str_ireplace(",","", $achieve_amount) == str_ireplace(",","", $goal_amount)){
                        $btn = 1;
                        $btntext = 'Closed';
                        $donationurl = $shareurl;
                        $viewclass = 'viewdetails';
                    }
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="cause-item">
                            <div class="cause-top">
                                <div class="bod">
                                    <img src="<?php echo $iimage; ?>" alt="" width="100%">
                                    <?php
                                            $zed_verified = '';
                                            if ($res->zed_verified) {
                                                ?>
                                        <div class="top-left">ZED Verified</div>
                                    <?php
                                            }
                                            ?>
                                </div>
                            </div>
                            <div class="cause-text">
                                <h3><a href="<?php echo $shareurl; ?>"><?php echo $fundtitle; ?></a></h3>
                                <div class="container1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/program.svg" width="30">
                                    <span>by <?= $user_name; ?></span>
                                </div>
                                <div class="progress-section pbar">
                                    <div class="process">
                                        <div class="progress pbars">
                                            <div class="progress-bar pbars" style="width:<?= $percn; ?>% !important;">
                                                <div class="progress-value">
                                                    <span><?= $percn; ?></span>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pbar2">
                                    <div><span>Raised:</span> <?php echo $currency.$achieve_amount; ?></div>
                                    <div><span>Goal:</span> <?php echo $currency.$goal_amount; ?></div>
                                </div>
                                <?php
                                        if ($btn == 1) {
                                            ?>
                                    <ul>
                                        <li class="licause"><a href="<?= $donationurl; ?>" class="dbtn <?= $viewclass; ?>"><?= $btntext; ?></a></li>
                                    </ul>
                                <?php
                                        }
                                        $now =strtotime(date("Y-m-d")); // or your date as well
                                        $your_date = strtotime($res->end_date);
                                        $datediff = $your_date - $now;
                                        $daysleft = round($datediff / (60 * 60 * 24)+1);
                                        if ($res->end_date != '0000-00-00') {
                                            if ($daysleft > 0) {
                                                $daysleft = $daysleft;
                                            } else {
                                                $daysleft = 0;
                                            }
                                        } else {
                                            $daysleft = 0;
                                        }
                                        ?>
                                <div class="pbar2" style="margin-top:5px">
                                    <div>
                                        <?php
                                                if ($daysleft) {
                                                    ?>
                                            <?php echo $daysleft; ?><div>Days Left</div>
                                        <?php
                                                } else {
                                                    ?>
                                            <div>Campaign Ended</div>
                                        <?php
                                                }
                                                ?>
                                    </div>
                                    <?php
                                            if ($res->id == 24) {
                                                $resultsdonacc = 5;
                                            } else if ($res->id == 25) {
                                                $resultsdonacc = 2;
                                            } else {
                                                $resultsdonacc = count($resultsdona);
                                            }
                                            ?>
                                    <div> <?php echo $resultsdonacc; ?><div>Donors</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
</div>
<!-- case-area-end -->
<!-- start contact-pg-contact-section -->
<section class="contact-pg-contact-section section-padding bgs">
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
                <div class="contact-form-area">
                    <div class="section-title-s3 section-title-s5">
                        <p style="text-align:center;color:#3D3D8A;font-weight: 600;">Request a call back</p>
                        <h3 style="text-align:center">Let's make the world better, together</h3>
                    </div>
                    <div class="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="3450" title="Homepage Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end contact-pg-contact-section -->
<!--Start project area-->
<!-- <section id="protfolio" class="gallery-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12 sortable-gallery">
                        <div class="gallery-filters">
                            <div class="section-title">
                                <h2>Our Gallery</h2>
                            </div>
                            <ul>
                                <li><a data-filter="*" href="#" class="current">All</a></li>
                                <li><a data-filter=".Child" href="#">Child</a></li>
                                <li><a data-filter=".Charity" href="#">Charity</a></li>
                                <li><a data-filter=".Volunteering" href="#">Volunteering</a></li>               
                                <li><a data-filter=".Sponsorship" href="#">Sponsorship</a></li> 
                            </ul>
                        </div>
                        <div class="gallery-container gallery-fancybox masonry-gallery">
                            <div class="grid Charity Volunteering Sponsorship">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-1.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-1.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid Child Charity Volunteering">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-2.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-2.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid Charity Sponsorship">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-3.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-3.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid Child Volunteering">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-4.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-4.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid Charity Sponsorship">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-5.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-5.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="grid Child Charity Sponsorship Volunteering">
                                <a href="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-6.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/gallery/img-6.jpg" alt class="img img-responsive">
                                    <div class="icon">
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section> -->
<!--End project area-->
<!-- start team-section -->
<!-- <section class="team-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-6 col-lg-offset-3">
                        <div class="section-title text-center">
                            <span>Meet Our Team</span>
                            <h2>Our Expert Volunteer</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="team-grids clearfix">
                            <div class="grid">
                                <div class="img-holder">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/team/team-1.jpg" alt>
                                </div>
                                <div class="details">
                                    <h3><a href="volunteer.html">Devin Robertson</a></h3>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/team/team-2.jpg" alt>
                                </div>
                                <div class="details">
                                    <h3><a href="volunteer.html">Rickey Goodman</a></h3>
                                    <p>Volunteer</p>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/team/team-3.jpg" alt>
                                </div>
                                <div class="details">
                                    <h3><a href="volunteer.html">Jean Washington</a></h3>
                                    <p>Volunteer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section> -->
<!-- end team-section -->
<!-- start blog-section -->
<section class="blog-section home-section-padding">
    <div class="container">
        <div class="col-l2" >
            <div class="section-title text-center">
                <!-- <span>From Our Blog</span> -->
                <h2>Our Events</h2>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col col-xs-12">
                <div class="blog-grids clearfix">
                    <p class="text-center">No upcoming events yet.</p>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col col-xs-12 evecenter" >
                <div class="blog-grids clearfix evecenter1">
                    <?php
                    $resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish' ORDER BY ID DESC LIMIT 3", ARRAY_A);
                    
                    foreach ($resultsdonaccxe as $eve) {
                        $featured_img_url = get_the_post_thumbnail_url($eve['ID'], 'full');
                        $dates = get_the_date('dS M Y', $eve['ID'])
                        ?>
                        <div class="grid" onclick="window.location.href='<?= BASE_URL . 'event/'.$eve['post_name']; ?>'">
                            <div class="entry-media">
                                <img width="360" height="260" src="<?php echo $featured_img_url; ?>" alt="" />
                            </div>
                            <div class="details">
                                <h3>
                                    <a href="javascript:void(0)"><?= $eve['post_title']; ?></a>
                                </h3>
                                <p>
                                    <?= $eve['post_content']; ?>
                                </p>
                                <ul class="entry-meta">
                                    <li>
                                        <img width="50" height="50" src="<?php echo bloginfo('template_directory'); ?>/images/user.png" alt="" />
                                        <Span class="white-color">By </span> <a href="javascript:void(0)">ZED</a>
                                    </li>
                                    <li><?= $dates; ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- end blog-section -->
<!-- tp-cta-area start -->
<!-- <div class="tp-cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-cta-text">
                            <h2>You Can Help The Poor With Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse </p>
                            <div class="btns">
                                <a href="donate.html" class="theme-btn">Donate Now</a>
                                <a href="volunteer.html" class="theme-btn-s2">Join Us Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!-- tp-cta-area end -->
<!-- start blog-section -->
<!-- <section class="blog-section section-padding">
            <div class="container">
                <div class="col-l2">
                    <div class="section-title text-center">
                        <span>From Our Blog</span>
                        <h2>Latest News</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="blog-grids clearfix">
                            <div class="grid">
                                <div class="entry-media">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/1.jpg" alt="">
                                </div>
                                <div class="details">
                                    <h3><a href="blog-single.html">Best and less published their supplier lists.</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                    <ul class="entry-meta">
                                        <li>
                                            <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/7.jpg" alt="">
                                            By <a href="#">Lily Anne</a>
                                        </li>
                                        <li>Feb 12,2021</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="entry-media">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/2.jpg" alt="">
                                </div>
                                <div class="details">
                                    <h3><a href="blog-single.html">Best and less published their supplier lists.</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                    <ul class="entry-meta">
                                        <li>
                                            <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/7.jpg" alt="">
                                            By <a href="#">Lily Anne</a>
                                        </li>
                                        <li>Feb 12,2021</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="entry-media">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/3.jpg" alt="">
                                </div>
                                <div class="details">
                                    <h3><a href="blog-single.html">Best and less published their supplier lists.</a></h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                    <ul class="entry-meta">
                                        <li>
                                            <img src="<?php echo bloginfo('template_directory'); ?>/images/blog/7.jpg" alt="">
                                            By <a href="#">Lily Anne</a>
                                        </li>
                                        <li>Feb 12,2021</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section> -->
<!-- end blog-section -->
<!-- start team-section -->
<section class="team-section home-section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3">
                <div class="section-title text-center">
                    <!--<span>Meet Our Team</span>-->
                    <h2>Our Expert Volunteer</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12 teamcenter">
                <div class="team-grids clearfix temcenter2">
                    <div class="grid">
                        <div class="img-holder">
                            <img src="<?php echo bloginfo('template_directory'); ?>/images/founder1.jpg" alt>
                        </div>
                        <div class="details">
                            <h3><a href="volunteer.html">Mrs. Kiran Tushar Gangurde</a></h3>
                            <p>Founder</p>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-holder">
                            <img src="<?php echo bloginfo('template_directory'); ?>/images/founder2.jpg" alt>
                        </div>
                        <div class="details">
                            <h3><a href="volunteer.html">Mrs. Rajani Bharat Gangurde</a></h3>
                            <p>Co-Founder</p>
                        </div>
                    </div>
                    <!-- <div class="grid">
                                <div class="img-holder">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/team/team-3.jpg" alt>
                                </div>
                                <div class="details">
                                    <h3><a href="volunteer.html">Jean Washington</a></h3>
                                    <p>Volunteer</p>
                                </div>
                            </div> -->
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end team-section -->
<!-- news-letter-section start-->
<!-- <section class="news-letter-section">
            <div class="container">
                <div class="news-letter-wrap">
                    <div class="row">
                        <div class="col col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2">
                            <div class="newsletter">
                                <h3>Subscribe our Newsletter</h3>
                                <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas.</p>
                                <div class="newsletter-form">
                                    <form>
                                        <div>
                                            <input type="text" placeholder="Enter Your Email" class="form-control">
                                            <button class="bigCursor" type="submit">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section> -->
<!-- end container -->
<?php
get_footer();
