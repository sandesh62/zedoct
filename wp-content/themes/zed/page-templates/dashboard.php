<?php
error_reporting(0);
/**
 * Template Name: DashboardFinal
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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Dashboard | Zed</title>
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->

    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    
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

        /* .tp-blog-sidebar .category-widget ul a:hover {
            display: block;
            color: #fff;
        } */
        .main_container {
            display: inline-flex;
            align-items: flex-end;
            margin-top: -10%;
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

        /* .tp-blog-sidebar .category-widget ul a {
            display: block;
            color: #fff;
        } */
        .pagination > .active > a{
            color: #fff !important;
        }

        .licause a {
            color: #fff !important;
        }
        @media (min-width: 1200px){
            .container {
                width: 104%;
            }
        }
        @media (min-width: 992px){
            .col-md-8 {
                width: 59.666667%;
            }
        }
        @media (max-width: 768px){
        .tab {
    
        width: 120%;
        margin: 20px 50px 0px 50px;
        position: unset;
        display: flex;
        align-items: baseline;
            
        }
        .tab p {
            width: 73%;
        }
        p.cols {
            display: none;
        }
        .dashdropdown {
            margin-bottom: 15px;
            padding-left: 5px;
            height: 50px;
            border: 1px solid #eee !important;
            border-radius: 10px;
            border: none;
            background: #fff;
            box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
            width:100%;
        }
        
        .tp-blog-sidebar .widget {
            margin: 0px 15px;
            width: 136%;
        }
        .tab button{
            margin:20px;
        }
        .tabcontent {
            float: left;
            padding: 0;
            border: none;
            width: 145%;
            border-left: none;
        }

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

       /* li.licause {
            width: 400px;
        }*/

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
        a#accept_btn {
            background: #3eba64;
            color: #fff !important;
            padding: 4px;
            border-radius: 5px;
        }
        a#decline_btn {
            background: #D62C5B;
            color: #fff !important;
            padding: 4px;
            border-radius: 5px;
        }
        .dbtnss{
            background: #3D3D8A;
            color: #fff !important;
            padding: 4px;
            border-radius: 5px;
        }

        .cause-text ul li a {
            padding: 10px 20px;
            background: #3d3d8a;
            margin-top: 10px;
            border-radius: 10px;
            color: #fff;
            font-weight: 500;
            box-shadow: 0 0 7px #ffffff;
            width: 200px;
        }
        .preloader1 {
          background-color: rgba(255,255,255,0.7);
          width: 100%;
          height: 100%;
          position: fixed;
          z-index: 1000;
        }
        .dashdropdown {
        width: 85% !important;
        }

          /* Piyush */

        /* .preloader1 {
            background-color: rgba(255, 255, 255, 0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 1000;
        }

        .preloader1::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: #3d3d8a;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        } */
        #loading-image {
            position: absolute;
            top: 50%;
            left: 48%;
            z-index: 100;
        }
        .col-md-2 {
            width: 20% !important;
        }
        @media (max-width: 768px){
            .dashdropdown {
                width: 100% !important;
            }
            .col-md-2 {
                width: 100% !important;
            }
            .tabcontent {
                width: 100% !important;
            }
            .tab {
                width: 100% !important;
                margin: 20px 50px 0px 10px !important;
            }
            .tp-blog-sidebar .widget {
                width: 100% !important;
                margin: 10px 0px 0px 0px !important;

            }
            .cause-text ul li a {
                width: auto;
            }
            .tp-blog-sidebar .widget {

            }

            .main_container {
                display: contents;
            }
        }
    </style>
</head>

<body>
    
    <!-- start preloader style="display: none;"-->
    <div class="preloader1">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
    </div>
    <!-- end preloader -->
    
    <?php
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND status in (0,1) AND userId =" . $userId, OBJECT);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
        $res = $resultsc[0];
        $idd = $_GET['id'];
    } else {
        $res = $results[0];
        $idd = $res->id;
    }
    $shareurl = BASE_URL . 'campaign-detail/?id=' . $idd;
    $editurl = BASE_URL . 'edit-campaign/?id=' . $idd;

    $today = date("Y-m-d");
    $resultsipa = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE campaign_Id IN (" . $idd . ") AND DATE_FORMAT(created_at, '%Y-%m-%d') = '" . $today . "'", ARRAY_A);

    foreach ($results as $resv) {
        $cid[] = $resv->id;
    }
    if ($cid) {
        $acids = implode(",", $cid);
    }

    /* status = 1 AND  */
    $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ")", OBJECT);

    $ddd = date("Y-m-d");
    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND DATE_FORMAT(created_at, '%Y-%m-%d') = '" . $ddd . "' AND campaign_Id IN(" . $idd . ")", ARRAY_A);

    if ($res->campaign_typeId == 2) {
        $goal_amount = $res->item_qty;
        $currency = 'Qty';

    } else if ($res->campaign_typeId == 3) {
        $goal_amount = $res->product_qty;
        $currency = 'Qty';
    } else {
        $goal_amount = $res->goal_amount;
        $currency = $res->currency;
    }

    $achieve_amountc = 0;
    foreach ($resultsdonacc as $tt) {
        if ($tt['campaign_typeId'] == 3) {
            $achieve_amountcn = $tt['amount'] ? $tt['amount'] : 0;
        } else {
            $achieve_amountcn = $tt['amount'] ? $tt['amount'] : 0;
        }
        $achieve_amountc += $achieve_amountcn;
    }

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
        // $percn = $achieve_amount / $goal_amount * 100;
        /* $totalRaiedAmount = 0;
        foreach ($resultsdonacc as $tt) {
            if ($tt['campaign_typeId'] == 3) {
                $totalRaiedAmountn = $tt['amount'] ? $tt['amount'] : 0;
            } else {
                $totalRaiedAmountn = $tt['amount'] ? $tt['amount'] : 0;
            }
            $totalRaiedAmount += $totalRaiedAmountn;
        }
        $percn = $totalRaiedAmount / $goal_amount * 100; */   

        $totalRaiedAmount = 0;
        foreach ($resultsdona as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalRaiedAmountn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalRaiedAmountn = $tt->amount ? $tt->amount : 0;
            }
            $totalRaiedAmount += $totalRaiedAmountn;
        }
        $percn = $totalRaiedAmount / $goal_amount * 100;   

        if($percn>100) {
            $percn = 100;
        }
        
        $totalRaiedAmounts = 0;
        foreach ($resultsdona as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalRaiedAmountsn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalRaiedAmountsn = $tt->amount ? $tt->amount : 0;
            }
            $totalRaiedAmounts += $totalRaiedAmountsn;
        }
    }
    ?>
    <?php
    if ($results) {
        ?>
        <div class="tab">
            <p><a href="<?= BASE_URL ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" class="margin-5" alt=""></a> </p>
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"><img src="<?php echo bloginfo('template_directory'); ?>/images/d1.png" width="80" alt=""></button>
            <p class="cols">Overview</p>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')"><img src="<?php echo bloginfo('template_directory'); ?>/images/d3.png" width="80" alt=""></button>
            <p class="cols">Withdraw</p>
            <button class="tablinks" onclick="openCity(event, 'usa')"><img src="<?php echo bloginfo('template_directory'); ?>/images/d4.png" width="80" alt=""></button>
            <p class="cols">Donations</p>
            
        </div>
        <div id="London" class="tabcontent">
            <section class="tp-blog-single-section section-pad" style="background: #eee;">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8 col-md-4 col-8">
                            <p>
                                <select name="individual_person" id="individual_person" class="dashdropdown drp fundlist">

                                    <?php
                                        foreach ($results as $resc) {
                                            if ($res->id == $resc->id) {
                                                $sel = "selected";
                                            } else {
                                                $sel = "";
                                            }
                                            if ($resc->campaign_typeId == 2) {
                                                $fundtitle = $resc->item_name;
                                            } else if ($resc->campaign_typeId == 3) {
                                                $fundtitle = $resc->product_name;
                                            } else {
                                                $fundtitle = $resc->fundraiser_title;
                                            }
                                            ?>
                                        <option <?php echo $sel; ?> value="<?php echo $resc->id; ?>"><?php echo $fundtitle; ?></option>
                                    <?php
                                        }
                                        ?>
                                </select>

                                <script>
                                    $(".fundlist").change(function() {
                                        var newurl = "<?php echo BASE_URL . 'my-account/?id=' ?>" + this.value;
                                        location.href = newurl;
                                    });
                                </script>

                            </p>
                        </div>

                        <div class="col-md-8 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div class="progress-section pbar">
                                        <div class="process">
                                            <div class="progress pbars">
                                                <div class="progress-bar pbars" style="width: <?= $percn; ?>% !important;">
                                                    <div class="progress-value">
                                                        <span><?= $percn; ?></span>%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pbar2">
                                        <div style="text-align:center;"> <?php echo $currency." ".number_format($totalRaiedAmount); ?><div>Raised</div></div>
                                        <!--<div><span>Raised:</span> <?php echo $currency.$achieve_amount; ?></div>-->
                                        <div style="text-align:center;"> <?php echo $currency." ".$goal_amount; ?><div>Goal</div></div>
                                        <!--<div><span>Goal:</span> <?php echo $currency.$goal_amount; ?></div>-->
                                        <!--
                                        <div class="rai"><span>Raised:</span>
                                            <p class="rai3">
                                            <?php echo $currency; ?> <?php echo $achieve_amount; ?>
                                            </p>
                                        </div>
                                        <div class="rai2"><span>Goal:</span> <?php echo $currency; ?> <?php echo $goal_amount; ?></div>-->
                                    </div>
                                    <div class="cause-text">
                                        <ul>
                                            <li class="licause"><a href="<?= $shareurl; ?>" class="dbtn">Go To Campaign</a></li>
                                            <li class="licause" style="padding-top: 20px;"><a href="<?= $editurl; ?>" class="dbtn">Edit Campaign</a></li>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                            <div class="tp-blog-sidebar col-md-12 main_container">
           
                                <div class="widget category-widget col-md-4" style="display:inline-flex;margin-right: 10px;">
                                    <div style="float:left">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/view.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center;col-md-4"> <?= count($resultsipa); ?> <br>views Today </div>
                                </div>
                                <div class="widget category-widget" style="display:inline-flex;margin-right: 10px;">
                                    <div style="float:left;">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/zero.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center !important;col-md-4"> <?php echo $currency; ?> <?= $achieve_amountc; ?> <br>Raised today </div>
                                </div>
                                <div class="widget category-widget" style="display:inline-flex;">
                                    <div style="float:left">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/users.png" alt="">
                                        </button>
                                    </div>
                                    <?php
                                        if ($res->id == 24) {
                                            $donn = 5;
                                        } else if ($res->id == 25) {
                                            $donn = 2;
                                        } else {
                                            $donn = count($resultsdona);
                                        }                                   ?>
                                    <div style="float:right;text-align: center;"> <?php echo $donn; ?> <br>Total Donors </div>
                                </div>
                            </div>                            
                            <div class="tp-blog-sidebar">
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:600">SHARE</p>
                                    </div>
                                    <div style="border:1px solid #ccc;border-radius:10px; padding:10px;">
                                        <p style="color:#3D3D8A;font-weight:600"> Campaign Tip:</p>
                                        <?php if($res->campaign_typeId == 1){?>
		                                       <p style="color:#000;">You are more likely to raise funds by sharing on Socialmedia</p>
                                        <?php } else { ?>
                                            <p style="color:#000;">You are more likely to raise by sharing on Socialmedia</p>
                                        <?php } ?>
                                    </div>
                                    <div class="cause-text" style="padding:0px">
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#25d366;width: 100%; color:#ffffff;" href="<?php echo 'https://web.whatsapp.com/send?text='. $shareurl?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#3b5998;width: 100%; color:#ffffff;" href="<?php echo 'https://www.facebook.com/sharer.php?u=' . $shareurl ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                        </ul>
                                        <!-- <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#0078ff" href="#"><i class="fab fa-facebook-messenger ff"></i>Share On Messenger</a></li>
                                        </ul> -->
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#1da1f2;width: 100%; color:#ffffff;" href="<?php echo 'https://twitter.com/share?url=' . $shareurl ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#be362b;width: 100%; color:#ffffff;" href="<?php echo 'mailto:?subject='. $fundtitle .'&amp;body=Check out this fundraiser ' . $shareurl?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <input type="text" style="display:none;" id="myInput" value="<?php echo $shareurl?>">
                                            <p id="p1" style="display:none;"><?php echo $shareurl?></p>
                                            <li style="width: 100%;" class=""><a style="color: #000;background: #fff;border: 2px solid #444;width: 100%;" href="javascript:void(0)" onclick="copyToClipboard('#p1')"><i class="fa fa-link" aria-hidden="true"></i> Copy Link</a></li>
                                        </ul>
                                        <div class="modal fade" id="copiedtext" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Copied on clipboard
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function copyToClipboard(element) {

                                                var $temp = $("<input>");
                                                $("body").append($temp);
                                                $temp.val($(element).text()).select();
                                                document.execCommand("copy");
                                                $temp.remove();

                                                $("#copiedtext").modal('show');
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <!-- <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget" style="display:inline-flex">
                                    <div style="float:left">
                                        <button style="width:60px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/view.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center;"> <?= count($resultsipa); ?> views Today </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget" style="display:inline-flex">
                                    <div style="float:left;">
                                        <button style="width:60px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/zero.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center !important;"> <?php echo $currency; ?> <?= $achieve_amountc; ?> Raised today </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget" style="display:inline-flex">
                                    <div style="float:left">
                                        <button style="width:60px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/users.png" alt="">
                                        </button>
                                    </div>
                                    <?php
                                        if ($res->id == 24) {
                                            $donn = 5;
                                        } else if ($res->id == 25) {
                                            $donn = 2;
                                        } else {
                                            $donn = count($resultsdona);
                                        }                                   ?>
                                    <div style="float:right;text-align: center;"> <?php echo $donn; ?> <br>Total Donors </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </section>

        </div>
        <div id="Paris" class="tabcontent">
            <section class="tp-blog-single-section section-pad" style="background: #eee;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-6 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:600">SHARE</p>
                                    </div>
                                    <div style="border:1px solid #ccc;border-radius:10px; padding:10px;">
                                        <p style="color:#3D3D8A;font-weight:600"> Fundraising Tip:</p>
                                        <p style="color:#000;">You are more likely to raise funds by sharing your fundraiser on Whatsapp</p>
                                    </div>
                                    <div class="cause-text">
                                        <ul style="margin-top: 0px;">
                                            <li><a style="background-color:#25d366" href="https://web.whatsapp.com/send?text=<?php echo $shareurl; ?>" target="_blank"><i class="fab fa-whatsapp ff"></i>Share On Whatsapp</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#3b5998" href="https://www.facebook.com/sharer.php?u=<?php echo $shareurl; ?>/" target="_blank"><i class="fab fa-facebook ff"></i>Share On Facebook</a></li>
                                        </ul>
                                        <!-- <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#0078ff" href="#"><i class="fab fa-facebook-messenger ff"></i>Share On Messenger</a></li>
                                        </ul> -->
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#1da1f2" href="https://twitter.com/share?url=<?php echo $shareurl; ?>/&amp;text=<?php echo $fundtitle; ?>" target="_blank"><i class="fab fa-twitter ff"></i>Share On Twitter</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#be362b" href="mailto:?subject=Your Subject&amp;body=Check out this fundraiser <?php echo $shareurl; ?>." target="_blank"><i class="far fa-envelope ff"></i>Share Via E-mail</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <input type="text" style="display:none;" id="myInput" value="<?php echo $shareurl; ?>">
                                            <p id="p1" style="display:none;"><?php echo $shareurl; ?></p>
                                            <li class=""><a style="color: #000;background: #fff;border: 2px solid #444;" href="javascript:void(0)" onclick="copyToClipboard('#p1')"><i class="fas fa-link ff"></i>Copy Share Link</a></li>
                                        </ul>
                                        <div class="modal fade" id="copiedtext" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Copied on clipboard
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function copyToClipboard(element) {

                                                var $temp = $("<input>");
                                                $("body").append($temp);
                                                $temp.val($(element).text()).select();
                                                document.execCommand("copy");
                                                $temp.remove();

                                                $("#copiedtext").modal('show');
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="Tokyo" class="tabcontent">
            <section class="tp-blog-single-section section-pad" style="background: #eee;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center">TOTAL RAISED</p>
                                        <p style="color:#000;font-weight:600;text-align:center">RS. 0</p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">See the Funds breakup in the
                                            <br><span style="color:#3D3D8A;font-weight:600;">Funds Summary</span>
                                        </p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">To withdraw please add bank details of
                                            <br>the beneficiary.</p>
                                    </div>
                                    <div class="comment-respond" style="margin-top:30px">
                                        <p style="color:#3D3D8A;font-weight:600;text-align:center">Please enter your Account Number
                                        </p>
                                        <form method="post" id="commentform" class="comment-form">
                                            <div class="form-inputs" style="text-align:center">
                                                <input placeholder="Account Number" type="text" style="float:none;text-align:center">
                                            </div>
                                            <div class="form-submit" style="text-align:center">
                                                <input id="submit" value="Add Beneficiary Documents" type="submit" style="max-width: 50%;float:none;text-align:center">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="usa" class="tabcontent">
            <section class="tp-blog-single-section section-pad" style="background: #eee;">
                <div class="container" style="width: 100%;">
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">  <!-- dt-responsive -->
                                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone No. </th>
                                                <th>Date|Time</th>
                                                <th>QTY</th>
                                                <th>Status</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($resultsdona) {
                                                foreach ($resultsdona as $resul) {

                                                    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $resul->campaign_Id, OBJECT);
                                                    $recs = $resultscc[0];
                                                    $campaign_typeId = $recs->campaign_typeId;
                                                    $campaign_Id = $recs->id;

                                                    if ($recs->campaign_typeId == 2) {
                                                        $fundtitle = $recs->item_name;
                                                    } else if ($recs->campaign_typeId == 3) {
                                                        $fundtitle = $recs->product_name;
                                                    } else {
                                                        $fundtitle = $recs->fundraiser_title;
                                                    }

                                                    if ($recs->campaign_typeId == 2) {
                                                        $goal_amount = $recs->item_qty;
                                                        $currency = 'QTY';
                                                    } else if ($recs->campaign_typeId == 3) {
                                                        $goal_amount = $recs->product_price;
                                                        $currency = $recs->currency;
                                                    } else {
                                                        $goal_amount = $recs->goal_amount;
                                                        $currency = $recs->currency;
                                                    }

                                                    if ($recs->image) {
                                                        $iimage = BASE_URL . 'fundraiserimg/' . $recs->image;
                                                    } else {
                                                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $recs->video);
                                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
                                                    }
                                                    $shareurl = BASE_URL . 'campaign-detail/?id=' . $recs->id;

                                                    ?>
                                            <tr>
                                                <td><?php echo $resul->fullName; ?></td>
                                                <td><?php echo $resul->emailId; ?></td>
                                                <td><?php echo $resul->address; ?></td>
                                                <td><?php echo $resul->phonenumber; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($resul->created_at)); ?> | <?php echo date("H:i:s", strtotime($resul->created_at)); ?></td>
                                                <?php if ($recs->campaign_typeId == 3) { ?>
                                                    <td><?php echo $currency; ?> <?php echo $resul->amount * $recs->product_price; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $currency; ?> <?php echo $resul->amount; ?></td>
                                                <?php  } ?>
                                                
                                                <?php if ($resul->status == 1) { ?>
                                                    <td><span style="color:#3EBA64">Accepted</span></td>
                                                <?php } else if ($resul->status == 2) { ?>
                                                    <td><span style="color:#D62C5B">Declined</span></td>
                                                <?php } else { ?>
                                                    <td>
                                                    <a href="javascript:void(0)" onclick="acceptdonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="acceptdiv<?php echo $resul->id; ?>" id="accept_btn" style="width:200px; color:#3EBA64">Accept</a>
                                                    
                                                    <a href="javascript:void(0)" onclick="declinedonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="declinediv<?php echo $resul->id; ?>" id="decline_btn" style="width:200px; color:#D62C5B">Decline</a>

                                                    <span style="color:#3EBA64; display:none;" id="acceptdiv<?php echo $resul->id; ?>">Accepted</span>
                                                    <span style="color:#D62C5B; display:none;" id="declinediv<?php echo $resul->id; ?>">Declined</span>

                                                    </td>
                                                <?php } ?>
                                                <?php if($resul->comment == 0){  ?>
                                                <td><a href="#donateComment" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #3d3d8a;color:#fff">Comment</a></td>
                                                <?php }else{ ?>
                                                    <td><?php echo $resul->comment; ?></td>
                                                    <?php } ?>

                                            </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

<!----modal--->
                <div class="modal fade" id="donateComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Comment</h4>
                <button type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body mx-3 text-center">
            <form id="frmChangeStatus" action="<?php echo BASE_URL ?>donate_comment.php" enctype="multipart/form-data" method="post" class="f1" >
            <label class="lbform">Please comment here</label>
            <textarea id="commentValue" name="commentValue" class="form-control" value=""></textarea>
               <!-- <p>Are you sure want to delete this campaign?</p>-->
            </form>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo loaderbtn" id="supporter-btn" style="background: #ccc;" type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo loaderbtn" id="supporter-btn" type="button" onclick="donateComment('<?= $campaign_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>  
<!---modal end--->
            </section>
        </div>
    <?php
    } else {
        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" style="text-align:center;">
                <h3 style="text-align:center;">No campaigns created.</h3>
                <br />
                <a href="<?= BASE_URL; ?>start-campaign/" class="button1thanks">Create Campaign</a>
            </div>
        </div>
    <?php
    }
    ?>
    <script>

function denateComment(s_id){
     // let delete_reason = document.getElementById("deleteReason").value;
      jQuery.ajax({
          type: "POST",
          url: '../donate_comment.php',
          data: 'campaign_id='+s_id+'&deleteReason='+delete_reason,
          success: function(response)
          {
              jQuery('#deleteCampaign').modal('hide');
            bootbox.alert("Campaign deleted successfully.", function(){ 
              window.location.href='../my-account';
             });
          }
      });
    }





        jQuery(document).ready(function() {
            jQuery('#example').DataTable({
                /* "scrollY": 200, */
                "scrollX": true
            });
        });

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        

        jQuery(document).ready(function () {
            // Get the element with id="defaultOpen" and click on it
            <?php if ($results) { ?>
            document.getElementById("defaultOpen").click();
            <?php } ?>

            window.onbeforeunload = function (e) {
                jQuery('.preloader1').css('display','block');
            }
            jQuery(window).load(function () {
                jQuery('.preloader1').css('display','none');
            });
        });
    </script>


<script>
    function acceptdonation(id, amt, cid) {
        // $("#accept_btn").html('Loading...');
        // $('#accept_btn').prop('disabled', true);
        $(".preloader1").css('display', 'block');
        $.ajax({
            url: '<?php echo BASE_URL . 'acceptdonation.php' ?>',
            type: "POST",
            data: {
                id: id,
                amt: amt,
                cid: cid
            },
            success: function(response) {
                console.log(id);
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $(".preloader1").css('display', 'none');
                $('#acceptdiv' + id).css('display', 'block');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            },
            error: function(jqXHR, exception) {
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $(".preloader1").css('display', 'none');
                $('#acceptdiv' + id).css('display', 'block');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            }

        });
    }

    function declinedonation(id, amt, cid) {
        $.ajax({
            url: '<?php echo BASE_URL . 'declinedonation.php' ?>',
            type: "POST",
            data: {
                id: id,
                amt: amt,
                cid: cid
            },
            success: function(response) {
                $('#acceptdiv' + id).css('display', 'none');
                $('#declinediv' + id).css('display', 'block');
                $('#acceptdivmain' + id).css('display', 'none');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            },
            error: function(jqXHR, exception) {
                $('#acceptdiv' + id).css('display', 'none');
                $('#declinediv' + id).css('display', 'block');
                $('#acceptdivmain' + id).css('display', 'none');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            }

        });
    }
    </script>

</body>

</html>