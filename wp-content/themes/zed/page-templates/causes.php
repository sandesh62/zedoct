<?php
/**
 * Template Name: Causes
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
global $wpdb;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Causes | Zed</title>
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
    <style>
        .bod {
            position: relative;
            text-align: center;
            color: white;
        }
        .top-left {
            position: absolute;
            top: 1px;
            left: 0;
            background-color: #3D3D8A;
            padding: 10px;
            color: #fff;
            border-bottom-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        input#vehicle1 {
            width: 15px;
            height: 15px;
        }
        .cause-top {
            background: #ffffff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 150px; /*change by : Jalpa | Change Date : 30 june 2021*/
        }
        .page-link.active {
            background-color: #3d3d8a;
            color: white;
        }
        .viewdetails{
            margin-right: 0 !important;
        }
        .cause-text ul li a {
            margin-right: 0 !important;   
        }
        .container1 {
            margin-top: 10px !important;
        }
        .container1 img{
            margin-right: 10px !important;
        }
        @media (max-width: 991px) {
            .tp-blog-sidebar {
                margin-left: 15px;
                margin-right: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader1" style="display: none;">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>
        <!-- end preloader -->
        <!-- .tp-breadcumb-area start -->
        <div class="tp-breadcumb-area tp-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcumb-wrap">
                            <h2>Browse Campaigns</h2>
                        </div>
                        <!-- .tp-counter-area start -->
                        <div class="tp-counter-area causeslistcounter">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php

                                        $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1)", ARRAY_A);
                                        $resultsdonaccxcam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND `status` = 1", ARRAY_A);
                                        $resultsdonaccx = $wpdb->get_results("SELECT sum(lives_count) as livecount FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
                                        $resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish'", ARRAY_A);
                                        ?>
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
                                                <p>CAMPAIGNS</p>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- .tp-breadcumb-area end -->
        <!-- start tp-blog-single-section -->
        <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <div class="container">
                <div class="row">
                    <?php
                    if (isset($_GET) && isset($_GET['c'])) {
                        $c = $_GET['c'];
                    } else {
                        $c = '';
                    }
                    if (isset($_GET) && isset($_GET['type'])) {
                        $type = $_GET['type'];
                    } else {
                        $type = '';
                    }
                    ?>
                    <div class="row">
                        <div class="widget search-widget ">
                            <form class="mapbyname" id="mapbyname" action="">
                                <div>
                                    <input type="hidden" name="type" value="<?= $type; ?>">
                                    <input type="text" name="c" value="<?= $c; ?>" class="form-control serach" placeholder="Search For Campaigns"/>
                                    <button class="btn" id="searchbtn" type="submit"><i class="ti-search icons"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col col-md-3 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <form>
                                        <ul>
                                            <!-- <li class="bor" onclick="window.location.href='<?= BASE_URL . 'browse-campaigns/?type=1'; ?>'"><a href="<?= BASE_URL . 'browse-campaigns/?type=1'; ?>"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" <?php if($type == '1'){?>checked<?php } ?>>Fundraiser</a></li>
                                            <li class="bor" onclick="window.location.href='<?= BASE_URL . 'browse-campaigns/?type=2'; ?>'"><a href="<?= BASE_URL . 'browse-campaigns/?type=2'; ?>"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" <?php if($type == '2'){?>checked<?php } ?>>Material donation</a></li>
                                            <li class="bor" onclick="window.location.href='<?= BASE_URL . 'browse-campaigns/?type=3'; ?>'"><a href="<?= BASE_URL . 'browse-campaigns/?type=3'; ?>"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" <?php if($type == '3'){?>checked<?php } ?>>Charity products</a></li> -->

                                            <?php 
                                            $type_arr = explode(',',$type);
                                            ?>
                                            <li class="bor"><input type="checkbox" class="cat_type" id="vehicle1" name="cattype" value="1" <?php if(in_array(1, $type_arr)){?>checked<?php } ?>>Fundraiser</li>
                                            <li class="bor"><input type="checkbox" class="cat_type" id="vehicle1" name="cattype" value="2" <?php if(in_array(2, $type_arr)){?>checked<?php } ?>>Material donation</li>
                                            <li class="bor"><input type="checkbox" class="cat_type" id="vehicle1" name="cattype" value="3" <?php if(in_array(3, $type_arr)){?>checked<?php } ?>>Marketplace for Charity Products</li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-9 col-sm-6 col-12">
                            <?php
                            $limit = 9;  
                            if (isset($_GET["pg"])) {
                                $page  = $_GET["pg"]; 
                            } 
                            else{ 
                                $page=1;
                            };  
                            $start_from = ($page-1) * $limit;
                            
                            if (!empty($c) && empty($type)) {
                                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (fundraiser_title LIKE '%" . $c . "%' OR item_name LIKE '%" . $c . "%' OR product_name LIKE '%" . $c . "%') AND admin_approved = 1 order by id DESC LIMIT $start_from, $limit", OBJECT);

                                $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}campaigns WHERE (fundraiser_title LIKE '%" . $c . "%' OR item_name LIKE '%" . $c . "%' OR product_name LIKE '%" . $c . "%') AND admin_approved = 1 order by id DESC", OBJECT);
                                
                            } else if(!empty($type) && !empty($c)){
                                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (fundraiser_title LIKE '%" . $c . "%' OR item_name LIKE '%" . $c . "%' OR product_name LIKE '%" . $c . "%') AND campaign_typeId IN (" . $type . ") AND admin_approved = 1 order by id DESC LIMIT $start_from, $limit", OBJECT);

                                $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}campaigns WHERE (fundraiser_title LIKE '%" . $c . "%' OR item_name LIKE '%" . $c . "%' OR product_name LIKE '%" . $c . "%') AND campaign_typeId IN (" . $type . ") AND admin_approved = 1 order by id DESC", OBJECT); 
                            } else {
                                if ($type) {
                                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $type . ") order by id DESC LIMIT $start_from, $limit", OBJECT);

                                    $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $type . ") order by id DESC", OBJECT); 
                                } else {
                                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 order by id DESC LIMIT $start_from, $limit", OBJECT);

                                    $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 order by id DESC", OBJECT); 
                                }
                            }

                            
                            $total_records = count($campaigns);  
                            $total_pages = ceil($total_records / $limit); 

                            if ($results) {
                                foreach ($results as $res) {
                                    $shareurl = BASE_URL . 'campaign-detail/?id=' . $res->id;
                                    if ($res->campaign_typeId == 1) {
                                        $donationurl = BASE_URL . 'donation/?id=' . $res->id;
                                        // $donationurl = "javascript:void(0)";
                                        $btntext = 'Donate';
                                    } else {
                                        $donationurl = BASE_URL . 'material-donation/?id=' . $res->id;
                                        $btntext = 'Show Interest';
                                    }
                                    $date1 = strtotime(date("Y-m-d"));
                                    $date2 = strtotime(date("Y-m-d", strtotime($res->end_date)));
                                    // Use comparison operator to 
                                    // compare dates
                                    if ($date1 > $date2) {
                                        $btn = 1;
                                        $btntext = 'Ended';
                                        $donationurl = $shareurl;
                                        $viewclass = 'viewdetails';
                                    } else {
                                        $btn = 1;
                                        $btntext = $btntext;
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
                                        //$goal_amount = $res->product_price * $res->product_qty;
                                        $goal_amount = $res->product_qty;
                                        //$currency = $res->currency;
                                        $currency = 'Qty';
                                    } else {
                                        $goal_amount = $res->goal_amount;
                                        $currency = $res->currency;
                                    }
                                    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN (" . $res->id . ")", ARRAY_A);
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
                                                //$achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
                                                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                                            } else {
                                                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                                            }
                                            $achieve_amount += $achieve_amountn;
                                        }
                                        $percn = $achieve_amount / $goal_amount * 100;
                                        
                                        if($percn>100){
                                            $percn=100;
                                        }
                                    }
                                    if ($res->image) {
                                        $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                                    } else {
                                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
                                    }
                                    $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $res->id . ") and status = 1 and ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1)");

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
                                                <div class="bod" onclick="window.location.href='<?= $shareurl; ?>'">
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
                                                <h3 class="cp-name"><a href="<?php echo $shareurl; ?>"><?php echo $fundtitle; ?></a></h3>
                                                <div class="container1" style="    overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/user.png" width="30">
                                                    <?php if($user_name == 'admin'){?>
                                                        <span>by ZedAid</span>
                                                    <?php } else {?>
                                                        <span>by <?= $user_name; ?></span>
                                                    <?php } ?> 
                                                </div>
                                                <div class="progress-section pbar">
                                                    <div class="process">
                                                        <div class="progress pbars">
                                                            <div class="progress-bar pbars" style="width:<?= $percn; ?>% !important;">
                                                                <div class="progress-value">
                                                                    <span><?= number_format($percn,2); ?></span>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pbar2">
                                                    <div> <?php echo $currency." ".number_format(str_ireplace(",","", $achieve_amount)); ?><div>Raised</div></div>
                                                    <!--<div><span>Raised:</span> <?php echo $currency.number_format(str_ireplace(",","", $achieve_amount)); ?></div>-->
                                                    <div> <?php echo $currency." ".number_format(str_ireplace(",","", $goal_amount)); ?><div>Goal</div></div>
                                                    <!--<div><span>Goal:</span> <?php echo $currency.number_format(str_ireplace(",","", $goal_amount)); ?></div>-->
                                                </div>
                                                <?php
                                                        if ($btn == 1) {
                                                            ?>
                                                    <ul>
                                                        <li class="licause"><a href="<?= $donationurl; ?>" class="dbtn <?= $viewclass; ?>"><?= $btntext; ?></a></li>
                                                    </ul>
                                                <?php
                                                }
                                                
                                                $now = strtotime(date("Y-m-d")); //time(); // or your date as well
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
                                                    <div><?php echo $resultsdonacc; ?><div>Donors</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } 
                                    $pagLink = "<div class='col-lg-12 col-md-12 col-sm-12 col-12'><ul class='pagination'>";  
                                    for ($i=1; $i<=$total_pages; $i++) {
                                        $active = '';
                                        if($i == $page){
                                            $active = "active";
                                        }
                                        if ($type) {
                                            $pagLink .= "<li class='page-item'><a class='page-link $active' href='".BASE_URL."browse-campaigns/?pg=".$i."&type=".$type."'>".$i."</a></li>";	
                                        }else{
                                            $pagLink .= "<li class='page-item'><a class='page-link $active' href='".BASE_URL."browse-campaigns/?pg=".$i."'>".$i."</a></li>";
                                        }
                                        
                                    }
                                    echo $pagLink . "</ul></div>"; 
                                 } else {
                                    ?>
                                <p class="text-center" style="color:black">No campaign found.</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div> <!-- end container -->
    </section>
    <!-- end tp-blog-single-section -->
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

    <script>
    $(document).ready(function() {
        $('input').keyup(function(event) {
            if (event.which === 13)
            {
                event.preventDefault();
                $('#mapbyname').submit();
            }
        });

        
        $('.cat_type').click(function(){
            var arr = [];
            $.each($("input[name='cattype']:checked"), function(){
                arr.push($(this).val());
            });
            var id = arr.join(",");
            var url = '<?= BASE_URL . 'browse-campaigns/?type=' ?>'+id;
            window.location.href=url;
        });
    });
    </script>
</body>
</html>
<?php
get_footer();
?>