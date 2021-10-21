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
    <?php
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND status = 1 AND userId =" . $userId, OBJECT);
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
    $resultsipa = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE campaign_Id IN(" . $idd . ")", ARRAY_A);

    foreach ($results as $resv) {
        $cid[] = $resv->id;
    }
    if ($cid) {
        $acids = implode(",", $cid);
    }
    $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $idd . ")", OBJECT);

    $ddd = date("Y-m-d");
    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND DATE_FORMAT(created_at, '%Y-%m-%d') = '" . $ddd . "' AND campaign_Id IN(" . $idd . ")", ARRAY_A);

    if ($res->campaign_typeId == 2) {
        $goal_amount = $res->item_qty;
        $currency = 'QTY';
    } else if ($res->campaign_typeId == 3) {
        $goal_amount = $res->product_price * $res->product_qty;
        $currency = $res->currency;
    } else {
        $goal_amount = $res->goal_amount;
        $currency = $res->currency;
    }

    $achieve_amountc = 0;
    foreach ($resultsdonacc as $tt) {
        if ($tt['campaign_typeId'] == 3) {
            $achieve_amountcn = $tt['amount'] ? $tt['amount'] * $res->product_price : 0;
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
        $percn = $achieve_amount / $goal_amount * 100;
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

                        <div class="col-md-5 col-md-6 col-sm-6 col-12">
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
                                    <ul class="pbar2">
                                        <li class="rai"><span>Raised:</span>
                                            <p class="rai3">
                                                <?php echo $achieve_amount; ?>
                                            </p>
                                        </li>
                                        <li class="rai2"><span>Goal:</span> <?php echo $currency; ?> <?php echo $goal_amount; ?></li>
                                    </ul>
                                    <div class="cause-text">
                                        <ul>
                                            <li class="licause"><a href="<?= $shareurl; ?>" class="dbtn">Go To Fundraiser</a></li>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                            <div class="tp-blog-sidebar" style="display: inline-flex;
    align-items: flex-end;margin-top: -14%;">
                                <div class="widget category-widget" style="display:inline-flex;margin-right:10px;">
                                    <div style="float:left">
                                        <button style="width:60px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/view.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center;"> <?= count($resultsipa); ?> views Today </div>
                                </div>
                                <div class="widget category-widget" style="display:inline-flex">
                                    <div style="float:left;">
                                        <button style="width:60px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/zero.png" alt="">
                                        </button>
                                    </div>
                                    <div style="float:right;text-align: center !important;"> <?php echo $currency; ?> <?= $achieve_amountc; ?> Raised today </div>
                                </div>
                            </div>                            
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
                            </div>
                        </div>
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
                                            <li><a style="background-color:#25d366" href="https://web.whatsapp.com/send?text=http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128" target="_blank"><i class="fab fa-whatsapp ff" aria-hidden="true"></i>Share On Whatsapp</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#3b5998" href="https://www.facebook.com/sharer.php?u=http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128/" target="_blank"><i class="fab fa-facebook ff" aria-hidden="true"></i>Share On Facebook</a></li>
                                        </ul>
                                        <!-- <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#0078ff" href="#"><i class="fab fa-facebook-messenger ff"></i>Share On Messenger</a></li>
                                        </ul> -->
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#1da1f2" href="https://twitter.com/share?url=http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128/&amp;text=Study Materials" target="_blank"><i class="fab fa-twitter ff" aria-hidden="true"></i>Share On Twitter</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#be362b" href="mailto:?subject=Your Subject&amp;body=Check out this fundraiser http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128." target="_blank"><i class="far fa-envelope ff" aria-hidden="true"></i>Share Via E-mail</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <input type="text" style="display:none;" id="myInput" value="http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128">
                                            <p id="p1" style="display:none;">http://localhost/zedfinal/ZEDAid/campaign-detail/?id=128</p>
                                            <li class=""><a style="color: #000;background: #fff;border: 2px solid #444;" href="javascript:void(0)" onclick="copyToClipboard('#p1')"><i class="fas fa-link ff" aria-hidden="true"></i>Copy Share Link</a></li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">

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

                                            ?>

                                        <div class="widget category-widget">
                                            <div>
                                                <?php if ($resul->anonymous) { ?>
                                                    <p style="color:#000;font-weight:400;">Anonymous</p>
                                                <?php } else {
                                                                ?>
                                                    <p style="color:#000;font-weight:400;">Name : <?php echo $resul->fullName; ?></p>
                                                    <p style="color:#000;font-weight:400;">Email : <?php echo $resul->emailId; ?></p>
                                                    <p style="color:#000;font-weight:400;">Address : <?php echo $resul->address; ?></p>
                                                    <p style="color:#000;font-weight:400;">Phone No : <?php echo $resul->phonenumber; ?></p>
                                                    <p style="color:#000;font-weight:400;">Date-Time : <?php echo date("d-m-Y", strtotime($resul->created_at)); ?> | <?php echo date("H:i:s", strtotime($resul->created_at)); ?></p>
                                                <?php
                                                            } ?>

                                                <?php if ($recs->campaign_typeId == 3) { ?>
                                                    <p style="color:#000;font-weight:400;"><?php echo $currency; ?> <?php echo $resul->amount * $recs->product_price; ?></p>
                                                <?php } else { ?>
                                                    <p style="color:#000;font-weight:400;"><?php echo $currency; ?> <?php echo $resul->amount; ?></p>
                                                <?php  } ?>

                                            </div>
                                            <div class="cause-text" style="padding:0px;padding-top:30px">
                                                <ul style="justify-content: left;">

                                                    <?php if ($resul->status == 1) { ?>
                                                        <li>
                                                            <a href="javascript:void(0)" class="lii2" style="width:200px">ACCEPTED</a>
                                                        </li>
                                                    <?php } else if ($resul->status == 2) { ?>
                                                        <li>
                                                            <a href="javascript:void(0)" class="lii" style="width:200px">DECLINED</a>
                                                        </li>
                                                    <?php } else { ?>

                                                        <div id="acceptdivmain<?php echo $resul->id; ?>">
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="acceptdonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="lii2" style="width:200px">ACCEPT</a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" onclick="declinedonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="lii" style="width:200px">DECLINE</a>
                                                            </li>
                                                        </div>

                                                        <div style="display:none" id="acceptdiv<?php echo $resul->id; ?>">
                                                            <li>
                                                                <a href="javascript:void(0)" class="lii2" style="width:200px">ACCEPTED</a>
                                                            </li>
                                                        </div>

                                                        <div style="display:none" id="declinediv<?php echo $resul->id; ?>">
                                                            <li>
                                                                <a href="javascript:void(0)" class="lii" style="width:200px">DECLINED</a>
                                                            </li>
                                                        </div>

                                                    <?php } ?>

                                                </ul>

                                                <script>
                                                    function acceptdonation(id, amt, cid) {
                                                        $.ajax({
                                                            url: '<?php echo BASE_URL . 'acceptdonation.php' ?>',
                                                            type: "POST",
                                                            data: {
                                                                id: id,
                                                                amt: amt,
                                                                cid: cid
                                                            },
                                                            success: function(response) {
                                                                $('#acceptdiv' + id).css('display', '');
                                                                $('#declinediv' + id).css('display', 'none');
                                                                $('#acceptdivmain' + id).css('display', 'none');
                                                                event.preventDefault();
                                                            },
                                                            error: function(jqXHR, exception) {
                                                                $('#acceptdiv' + id).css('display', '');
                                                                $('#declinediv' + id).css('display', 'none');
                                                                $('#acceptdivmain' + id).css('display', 'none');
                                                                event.preventDefault();
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
                                                                $('#declinediv' + id).css('display', '');
                                                                $('#acceptdivmain' + id).css('display', 'none');
                                                                event.preventDefault();
                                                            },
                                                            error: function(jqXHR, exception) {
                                                                $('#acceptdiv' + id).css('display', 'none');
                                                                $('#declinediv' + id).css('display', '');
                                                                $('#acceptdivmain' + id).css('display', 'none');
                                                                event.preventDefault();
                                                            }

                                                        });
                                                    }
                                                </script>

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
    <?php
    } else {
        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" style="text-align:center;">
                <h3 style="text-align:center;">No campaigns created.</h3>
                <br />
                <a href="<?= BASE_URL; ?>" class="button1thanks">Go To Home</a>
            </div>
        </div>
    <?php
    }

    ?>




    <script>
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

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>