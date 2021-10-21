<?php
/**
 * Template Name: Causes-Detail-Admin
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
      @media (max-width: 767px){
.byuseradded {
    margin-left: 0px !important;
    display: inline-flex;
    align-items: center;
    margin-top: 16px;
}
.byuseraddedimg {
    padding-top: 0px !important;
    margin-right: 10px;
}
      }
    </style>
</head>
<body>
  <?php
  global $wpdb;
  $btn_status = 'active';
  $result = explode('/', $_GET['id']);
  $id = $result[0];
  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved != 1  AND id =" . $id, OBJECT);
  $res = $results[0];
  if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $loggeduserid = $user->ID;
  } else {
    $loggeduserid = 0;
  }
  $userId = $res->userId;
  $campaign_typeId = $res->campaign_typeId;
  $resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $campaign_typeId, OBJECT);
  $res = $results[0];
  if ($res->image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
  } else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
  }
  $shareurl = BASE_URL . 'campaign-detail/?id=' . $id;
  if ($campaign_typeId == 1) {
    $donationurl = BASE_URL . 'donation/?id=' . $res->id;
    $btntext = 'Donate';
  } else {
    $donationurl = BASE_URL . 'material-donation/?id=' . $res->id;
    $btntext = 'Show Interest';
  }
  if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
    $campaign_name = 'Material donation';
  } else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
    $campaign_name = 'Charity products';
  } else {
    $fundtitle = $res->fundraiser_title;
    $campaign_name = 'Fundraiser';
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
  $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $id . ")", ARRAY_A);
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
    
    if($percn >100) {
        $percn = 100;
    } 
  }
  // $achieve_amount = 0;
  // foreach ($resultsdonacc as $tt) {
  //   if ($tt['campaign_typeId'] == 3) {
  //     $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
  //   } else {
  //     $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
  //   }
  //   $achieve_amount += $achieve_amountn;
  // }
  // $percn = $achieve_amount / $goal_amount * 100;
  if (str_replace(',', '', $achieve_amount) >= str_replace(',', '', $goal_amount)) {
    $btn = 'no';
  } else {
    $btn = 'yes';
  }
  //$localIP = getHostByName(getHostName());
  $localIP = $_SERVER['REMOTE_ADDR'];  
  $resultsip = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE ipAddress = '" . $localIP . "' AND campaign_Id =" . $id, ARRAY_A);
  if ($resultsip) { } else {
    $sql2 = $wpdb->prepare(
      "INSERT INTO `wp_campaigncount`
           (ipAddress, campaign_Id)
     values ('" . $localIP . "','" . $id . "')"
    );
    $wpdb->query($sql2);
  }


  $allresultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $id . ") and status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) ORDER BY id DESC ");
  $allcount = count($allresultsdona);

  $rowperpage = 3;
  $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $id . ") and status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) ORDER BY id DESC LIMIT 0, $rowperpage");
  
  $perc = ($achieve_amount * 100) / $goal_amount;
  $date1 = date("Y-m-d");
  $date2 = $res->end_date;
  // Use comparison operator to 
  // compare dates
  if ($date1 > $date2) {
    $btn = 0;
    $donationurl = $shareurl;
    $btn_status = 'inactive';
  } else {
    $btn = 1;
    $donationurl = $donationurl;
  }

  $userId = $res->userId;
  $user_name = '';
  $user = get_user_by('ID', $userId);
  if ( ! empty( $user ) ) {
      $user_name = $user->display_name;
  }

  if(str_ireplace(",","", $achieve_amount) == str_ireplace(",","", $goal_amount)){
      $btn = 1;
      $btntext = 'Closed';
      $btn_status = 'inactive';
      $donationurl = $shareurl;
      $viewclass = 'viewdetails';
  }

  ?>
  <!-- start page-wrapper -->
  <div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader1" style="display: none;">
    <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
    </div>
    <!-- end preloader -->
    <!-- tp-event-details-area start -->
    <div class="tp-case-details-area section-padding sec-detail">
      <div class="container causeslist">
        <div class="row">
          <div class="col col-md-8">
            <div class="tp-case-details-wrap">
              <div class="tp-case-details-text">
                <div id="Description">
                  <div class="tp-case-details-img">
                    <?php
                    if ($res->image) {
                        ?>
                        <img src="<?php echo $iimage; ?>" alt="" />
                    <?php
                    } else {
                        ?>
                        <iframe width="750" height="300" src="https://www.youtube.com/embed/<?= str_replace("https://www.youtube.com/watch?v=", "", $res->video); ?>">
                        </iframe>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="tp-case-content">
                    <div class="tp-case-text-top">
                      <h2><?php echo $fundtitle; ?></h2>

                      <div style="margin-bottom:20px">
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/date.png" width="30"> <?= date("d M Y", strtotime($res->end_date)); ?> 
                      <span style="margin-left:20px">
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/type.png" width="30"> <?= $campaign_name; ?>
                      </span>
                      <span class="byuseradded" style="">
                      <img class="byuseraddedimg" src="<?php echo bloginfo('template_directory'); ?>/images/user.png" width="30"> 
                      
                      <?php
                      if ($user_name == 'admin') {
                          echo 'ZedAid';
                      }else{
                          echo $user_name;
                      } 
                      ?>
                      
                      </span>
                      </div>

                      <div class="progress-section">
                        <div class="process">
                          <div class="progress">
                            <div class="progress-bar" style="width:<?= $percn; ?>% !important;">
                              <div class="progress-value">
                                <span><?= number_format($percn,2); ?></span>%
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <ul>
                        <li><span>Raised:</span> <?= $currency; ?> <?php echo $achieve_amount ? number_format(str_ireplace(",","", $achieve_amount)) : 0; ?></li>
                        <li><span>Goal:</span> <?= $currency; ?> <?php echo number_format(str_ireplace(",","", $goal_amount)); ?></li>
                        <?php
                        if ($res->id == 24) {
                          ?>
                          <li><span>Donor:</span> 5</li>
                        <?php
                        } else if ($res->id == 25) {
                          ?>
                          <li><span>Donor:</span> 2</li>
                        <?php
                        } else {
                          ?>
                          <li><span>Donor:</span> <?php echo count($allresultsdona); ?></li>
                        <?php
                        }
                        ?>
                      </ul>
                      <div class="case-b-text">
                        <p>
                          <?php
                          echo html_entity_decode($res->short_description);
                          ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col px-2" id="payment-options">
                <div class="card-shadow mb-3 mb-md-4-5 bg-white mt-1 col-lg-12 b-con no-pad redi">
                  <div class="card__heading px-3 py-3 py-md-1 d-block w-100">
                    <h4 class="mb-0 text--20">Donate via Bank Transfer</h4>
                  </div>
                  <hr class="mt-0 mb-0">
                  <div class="p-3 h-100 d-inline-block w-100 align-top">
                    <p>Transfer directly to the Bank account of the Fundraiser. Only INR transfers are allowed.</p>
                    <ul class="list-unstyled">
                      <li>- Account number : <span class="b-level"> 700701717155363</span></li>
                      <li>- Account name : <span class="b-level"> Yuvaan</span></li>
                      <li>- IFSC code : <span class="b-level"> YESB0CMSNOC</span></li>
                      <li>(The digit after B is <b>Zero</b> and the letter after N is <b>O</b> for Orange)</li>
                      <li>For UPI Transaction: <b>supportayan37@yesbankltd</b></li>
                      <li><b>Donations via Yes Bank UPI and Account Transfers are safe with ZEDAID.</b></li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- <div class="tp-blog-single-section wrap-even">
              <div class="comments-area">
                <div class="comments-section">
                  <h3 class="comments-title">Comments</h3>
                  <ol class="comments">
                    <li class="comment even thread-even depth-1" id="comment-1">
                      <div id="div-comment-1">
                        <div class="comment-theme">
                          <div class="comment-image"><img src="<?php echo bloginfo('template_directory'); ?>/images/blog-details/comments-author/img-1.jpg" alt=""></div>
                        </div>
                        <div class="comment-main-area">
                          <div class="comment-wrapper">
                            <div class="comments-meta">
                              <h4>John Abraham <span class="comments-date">Octobor 28,2018 At 9.00am</span></h4>
                            </div>
                            <div class="comment-area">
                              <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, </p>
                              <div class="comments-reply">
                                <a class="comment-reply-link" href="#"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ol>
                </div> 
              </div> 
              <div class="comment-respond">
                <h3 class="comment-reply-title">Leave a Comment</h3>
                <form method="post" id="commentform" class="comment-form">
                  <div class="form-inputs">
                    <input placeholder="Name" type="text">
                    <input placeholder="Email" type="email">
                    <input placeholder="Website" type="url">
                  </div>
                  <div class="form-textarea">
                    <textarea id="comment" placeholder="Write Your Comments..."></textarea>
                  </div>
                  <div class="form-submit">
                    <input id="submit" value="Reply" type="submit">
                  </div>
                </form>
              </div>
            </div> -->
          </div>
          <div class="col col-md-4">
            <div class="tp-blog-sidebar">
              <div class="p-1 mt-1 mb-3 d-none d-sm-block box-stick__border-light">
                <!-- <div class="h-100 d-inline-block w-100 align-top text-center mt-0 px-1 ">
                  <div class="circle-con "> <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 25%;" version="1.1" width="100%" height="100%">
                      <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                          <stop offset="0%" stop-color="#00bc9b"></stop>
                          <stop offset="100%" stop-color="#6eb738"></stop>
                        </linearGradient>
                      </defs>
                      <circle id="percentCircle" cx="-15" cy="27" r="60" stroke-width="8px" stroke="url(#gradient)" fill="#f9f9f9" stroke-linecap="round" transform="translate(110,50) rotate(90) scale(-1, 1)" stroke-dasharray="376.99111843077515" stroke-dashoffset="376.99111843077515" style="stroke-dashoffset: 0;"></circle>
                      <text class="custom-raisedPercent" id="percentText" x="50" y="58" fill="#8d8d8d" font-family="Hind Vadodara,sans-serif" font-size="28" data-percent="<?= $percn; ?>"><?= $percn; ?>%</text>
                      <text class="completion-progress__days" y="82" x="57" fill="#8d8d8d">funded </text>
                      <text class="completion-progress__days" y="100" x="50" fill="#8d8d8d"> in 0 days </text>
                    </svg>
                  </div>
                </div> -->
                <style>
                  .circle_percent {font-size:160px; width:1em; height:1em; position: relative; background: #eee; border-radius:50%; overflow:hidden; display:inline-block; margin:20px;}
                  .circle_inner {position: absolute; left: 0; top: 0; width: 1em; height: 1em; clip:rect(0 1em 1em .5em);}
                  .round_per {position: absolute; left: 0; top: 0; width: 1em; height: 1em; background: #8bc34a; clip:rect(0 1em 1em .5em); transform:rotate(180deg); transition:1.05s;}
                  .percent_more .circle_inner {clip:rect(0 .5em 1em 0em);}
                  .percent_more:after {position: absolute; left: .5em; top:0em; right: 0; bottom: 0; background: #8bc34a; content:'';}
                  .circle_inbox {position: absolute; top: 10px; left: 10px; right: 10px; bottom: 10px; background: #fff; z-index:3; border-radius: 50%;}
                  .percent_text {position: absolute; font-size: 36px; left: 50%; top: 50%; transform: translate(-50%,-50%); z-index: 3;}
                  .load-more{background: #3d3d8a; color: #fff; border: none; box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%); padding: 10px 20px; border-radius: 10px;}
                  .load-more:focus{color: white; text-decoration: none !important;}
                </style>
                <div class="h-100 d-inline-block w-100 align-top text-center mt-0 px-1 ">
                  <div class="circle_percent" data-percent="<?= $percn; ?>">
                    <div class="circle_inner">
                        <div class="round_per"></div>
                      </div>
                  </div>
                </div>
                
                <div class="h-100 d-inline-block w-100 align-top mt-0 side-t-con text-center ">
                  <h4 class="d-block box-stick__color-grey text-center ">
                    <span class="custom-raisedAmount" style="font-weight:700"> <?= $currency; ?> <?php echo $achieve_amount ? number_format(str_ireplace(",","", $achieve_amount)) : 0; ?> Raised</span>
                    <span class="box-stick__color-light">of <?= $currency; ?> <?php echo number_format(str_ireplace(",","", $goal_amount)); ?></span>
                  </h4>
                </div>
                <div class="cause-text">
                  <?php
                  /*if ($btn == 1) {
                    ?>
                    <ul>
                      <?php if($btn_status == 'active'){?>
                        <li class="licause wiggle" style="margin-top:20%;"><a style="background-color:#3EBA64;padding-top:20px;padding-bottom:15px" href="<?= $donationurl; ?>"><span style="font-weight:600;font-size:23px"><?= $btntext ?></span></a></li>
                      <?php }else{ ?>
                        <li class="licause" style="margin-top:20%;"><a style="background-color:#ccc;padding-top:20px;padding-bottom:15px" href="javascript::void()"><span style="font-weight:600;font-size:23px"><?= $btntext ?></span></a></li>
                      <?php } ?>
                    </ul>
                  <?php
                  }*/
                  if ($campaign_typeId == 1) { ?>
                  <h3 class="share-s">Every social media share can bring ₹5,000</h3>
                  <?php } else { ?>
                  <h3 class="share-s">Every social media share can bring 5 helping hands</h3>
                  <?php
                  }
                  $sharelinnk = BASE_URL . 'campaign-detail?id=' . $id;
                  ?>
                  <ul>
                    <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= $sharelinnk; ?>&t=<?= $fundtitle; ?>" class="bn"><i class="ti-facebook fb"></i></a></li>
                    <li><a target="_blank" href="http://twitter.com/share?text=<?= $fundtitle; ?>&url=<?= $sharelinnk; ?>" class="bn"><i class="ti-twitter-alt tw"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/shareArticle?url=<?= $sharelinnk; ?>&title=<?= $fundtitle; ?>" class="linkedin"><i class="ti-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
              <?php
              if ($resultsdona) {
                ?>
                <input type="hidden" id="row" value="0">
                <input type="hidden" id="all" value="<?php echo $allcount; ?>">
                <input type="hidden" id="hid" value="<?php echo $id; ?>">                

                <div class="widget recent-post-widget">
                  <h3>All Donations</h3>
                  <div class="posts">
                      <?php
                      foreach ($resultsdona as $resul) {
                        if ($resul->anonymous == 0) {
                            $fullName = explode(" ", $resul->fullName);
                            $username = $resul->fullName;
                        }else{
                            $fullName = "Anonymous";
                            $username = "Anonymous";
                        }
                        if ($res->campaign_typeId == 2) {
                          $goal_amount = $res->item_qty;
                          $currency = 'Qty';
                        } else if ($res->campaign_typeId == 3) {
                          $goal_amount = $res->product_qty;
                        //   $currency = $res->currency;
                          $currency = 'Qty';
                        } else {
                          $goal_amount = $res->goal_amount;
                          $currency = $res->currency;
                        }
                        if ($res->campaign_typeId == 3) {
                        //   $amount = $resul->amount * $res->product_price;
                            $amount = $resul->amount;

                        } else {
                          $amount = $resul->amount;
                        }
                      ?>
                      <div class="post" id="post_<?php echo $id; ?>">
                        <div class="img-holder">
                          <h2 class="h2-f"><?php echo $fullName[0][0] . $fullName[1][0]; ?></h2>
                        </div>
                        <div class="details">
                          <h4>
                            <a href="#"><?php echo $username; ?></a>
                          </h4>
                          <span class="date"><?php echo $currency . ' ' . number_format($amount); ?></span>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="text-center"><br>
                    
                    <?php 
                    if( $rowperpage < $allcount ){?>
                    <a href="javascript::void()" class="load-more dbtn">Load More</a>
                    <?php } ?>

                    </div>
                  </div>
                </div>
              <?php
              }
              if ($id == 25) {
                ?>
                <div class="widget recent-post-widget">
                  <h3>All Donations</h3>
                  <div class="posts">
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">A</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Avinash</a>
                        </h4>
                        <span class="date">INR 9,000</span>
                      </div>
                    </div>
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">ZF</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Zed Foundation</a>
                        </h4>
                        <span class="date">INR 7,000</span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              if ($id == 24) {
                ?>
                <div class="widget recent-post-widget">
                  <h3>All Donations</h3>
                  <div class="posts">
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">PM</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Pettick Mouse</a>
                        </h4>
                        <span class="date">INR 20,000</span>
                      </div>
                    </div>
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">HM</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Hettick Mouse</a>
                        </h4>
                        <span class="date">INR 10,000</span>
                      </div>
                    </div>
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">M</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Milon</a>
                        </h4>
                        <span class="date">INR 10,000</span>
                      </div>
                    </div>
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">CB</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Christ Boss</a>
                        </h4>
                        <span class="date">INR 20,000</span>
                      </div>
                    </div>
                    <div class="post">
                      <div class="img-holder">
                        <h2 class="h2-f">VB</h2>
                      </div>
                      <div class="details">
                        <h4>
                          <a href="#">Vibha Boss</a>
                        </h4>
                        <span class="date">INR 20,000</span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
              <!-- <div class="widget tag-widget">
                  <h3>Tags</h3>
                  <ul>
                    <li><a href="#">Donations</a></li>
                    <li><a href="#">Charity</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Non Profit</a></li>
                    <li><a href="#">Poor People</a></li>
                    <li><a href="#">Helping Hand</a></li>
                    <li><a href="#">Video</a></li>
                  </ul>
                </div> -->
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
?>

<script>
  jQuery(".circle_percent").each(function() {
    var $this = $(this),
    $dataV = $this.data("percent"),
    $dataDeg = $dataV * 3.6,
    $round = $this.find(".round_per");
  $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");	
  $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
  $this.prop('Counter', 0).animate({Counter: $dataV},
  {
    duration: 2000, 
    easing: 'swing', 
    step: function (now) {
            $this.find(".percent_text").text(<?= number_format($percn,2); ?>+"%");
        }
    });
  if($dataV >= 51){
    $round.css("transform", "rotate(" + 360 + "deg)");
    setTimeout(function(){
      $this.addClass("percent_more");
    },1000);
    setTimeout(function(){
      $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
    },1000);
  } 
});

$(document).ready(function(){

// Load more data
$('.load-more').click(function(){
    var row = Number($('#row').val());
    var allcount = Number($('#all').val());
    var hid = $('#hid').val();
    
    var rowperpage = 3;
    row = row + rowperpage;

    if(row <= allcount){
        console.log("if"); 

        $("#row").val(row);

        $.ajax({
            url: '../donors.php',
            type: 'post',
            data: {row:row,id:hid},
            beforeSend:function(){
                $(".load-more").text("Loading...");
            },
            success: function(response){
                console.log("response"); 
                console.log(response);
                // Setting little delay while displaying new content
                setTimeout(function() {
                    // appending posts after last post with class="post"
                    $(".post:last").after(response).show().fadeIn("slow");

                    var rowno = row + rowperpage;

                    // checking row value is greater than allcount or not
                    if(rowno > allcount){

                        // Change the text and background
                        $('.load-more').text("");
                        $(".load-more").removeClass("load-more");
                        //$('.load-more').css("background","darkorchid");
                    }else{
                        $(".load-more").text("Load more");
                    }
                }, 2000);

            }
        });
    }else{
        console.log("else"); 
        $('.load-more').text("Loading...");

        // Setting little delay while removing contents
        setTimeout(function() {

            // When row is greater than allcount then remove all class='post' element after 3 element
            $('.post:nth-child(3)').nextAll('.post').remove();

            // Reset the value of row
            $("#row").val(0);

            // Change the text and background
            $('.load-more').text("Load more");
            $('.load-more').css("background","#15a9ce");
            
        }, 2000);


    }

});

});
</script>