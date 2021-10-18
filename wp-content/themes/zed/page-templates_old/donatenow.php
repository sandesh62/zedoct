<?php

/**
 * Template Name: Donate Now
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Donate Now | Zed</title>
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
    <link href="<?php echo bloginfo('template_directory'); ?>/css/signup.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>
</head>

<body>

    <?php
    global $wpdb;
    ?>

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
    <div class="tp-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $id = $_GET['id'];
                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
                    $res = $results[0];
                    $campaign_typeId = $res->campaign_typeId;
                    ?>
                    <form class="tp-accountWrapper dmain" method="post" action="<?php echo BASE_URL; ?>submitdonate2.php">

                        <input type="hidden" id="campaign_Id" value="<?php echo $id; ?>" name="campaign_Id" />
                        <input type="hidden" id="campaign_typeId" value="<?php echo $campaign_typeId; ?>" name="campaign_typeId" />

                        <div class="tp-accountForm form-style dform">
                            <div class="fromTitle">
                                <h2>Choose a Donation Amount</h2>
                            </div>
                            <div class="row">
                                <div class=""></div>
                                <div class="col-lg-12 col-md-12 col-12 hr">
                                    <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" class="hr-top">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input type="checkbox" id="anonymous" name="anonymous" value="1">
                                    <label style="margin-left:25px;" for="anonymous">Anonymous</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input type="text" id="emailId" name="emailId" placeholder="Enter Email">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input type="text" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number">
                                </div>

                                <div class="col-lg-2 col-md-12 col-12">
                                    <select class="phonedropdown" name="currency">
                                        <!-- <option value="USD">USD</option> -->
                                        <option value="INR">INR</option>
                                        <!-- <option value="AED">AED</option> -->
                                        <!-- <option value="Pound">Pound</option> -->
                                    </select>
									<input type="text" id="amount" name="amount" placeholder="How much do you want to donate?" class="num">
                                </div>
                                <div class="col-lg-10 col-md-12 col-12">
                                    
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input type="text" id="address" name="address" placeholder="Enter Address">
                                </div>


                                <script>
                                    function initialize31() {

                                        var geocoder = new google.maps.Geocoder();

                                        var autocomplete = new google.maps.places.Autocomplete(jQuery("#address")[0], {});
                                        google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                            var place = autocomplete.getPlace();
                                            var address = place.formatted_address;
                                            geocoder.geocode({
                                                'address': address
                                            }, function(results, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                    var latitude = results[0].geometry.location.lat();
                                                    var longitude = results[0].geometry.location.lng();

                                                    var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                                    setMap(mapCenter, latitude, longitude, '');
                                                }
                                            });
                                        });

                                    }
                                    google.maps.event.addDomListener(window, 'load', initialize31);
                                </script>

                                <div class="col-lg-12 col-md-12 col-12">
                                    <p style="margin-top:10px" class="subText">All Payment updates will be sent on this <a href="<?= BASE_URL ?>registration/">Mobile Number</a></p>
                                    <button type="submit" class="tp-accountBtn btn-top">Proceed To Pay</button>
                                </div>
                            </div>
                            <p class="subText italic-font">By continuing you agree to our <a href="<?= BASE_URL ?>registration/">Terms of Service</a> and <a href="<?= BASE_URL ?>registration/">Privacy Policy</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript files
    ================================================== -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <!-- Plugins for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
</body>

</html>