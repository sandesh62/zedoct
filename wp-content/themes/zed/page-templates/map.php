<?php

/**
 * Template Name: Map
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
    <title>Map | Zed</title>
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
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>
<style>
        input#vehicle1 {
    width: 15px;
    height: 15px;
}
.gm-style-iw-d {
    max-width: 307px !important;
    width: 261px !important;
}
  
    .\/ccc\/ img {
        width: 100%;
    height: 164px !important;
}

.gm-style img {
    max-width: none;
    width: 100%;
}
.gm-style .gm-style-iw-d {
    box-sizing: border-box;
    overflow: auto !important;
    width:200px;
    max-width:310px;
}

.gm-style .gm-style-iw-c {
    position: absolute;
    box-sizing: border-box;
    overflow: hidden;
    top: 0;
    left: 0;
    transform: translate(-50%,-100%);
    background-color: white;
    border-radius: 8px;
    padding: 0px;
    box-shadow: 0 2px 7px 1px rgb(0 0 0 / 30%);
}
 .top-left {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        top:0 !important;
    }
    .grn{
        background: #00BF00;
    color: #fff;
    font-weight: 400;
    padding: 6px;
    border-radius: 5px;
    }
    .red{
        background: #FF184A;
    color: #fff;
    font-weight: 400;
    padding: 6px;
    border-radius: 5px;
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
                            <h2>Browser Campaigns</h2>
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
        <!-- start contact-pg-contact-section -->
        <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <div class="container">
                <div class="row">
                    <div class="widget search-widget ">
                        <form>
                            <div>
                                <input type="text" class="form-control serach locationtextbox icon-input" placeholder="Enter address here" name="location" id="location">
                                <a><i class='fa fa-times-circle fa-2x times-icon' aria-hidden='true'></i></a>
                            </div>
                        </form>
                    </div>

                    <div>
                        <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
                    </div>

                    <!-- <div>
                        <input type="text" class="locationtextbox d-none required-input form-control" value="" name="location" id="location" placeholder="Enter address here" style="cursor: auto;padding: 10px !important;">
                    </div> -->

                    <div class="col-md-4">
                        <div class="tp-blog-sidebar">
                            <div class="widget category-widget">
                                <ul>
                                    <li class="bor"><a onclick="camptypeid(1)" href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check" name="camp_type[]" value="1"></a><img src="<?= BASE_URL ?>/wp-content/uploads/2021/07/image5.png" width="20" height="20" style="margin-right: 1% !important; color: #777 !important;"/>Fundraiser</li>
                                    <li class="bor"><a onclick="camptypeid(2)" href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="material_check" name="camp_type[]" value="2"></a><img src="<?= BASE_URL ?>/wp-content/uploads/2021/07/material_donation.png" width="20" height="20" style="margin-right: 1% !important; color: #777 !important;"/>Material donation</li>
                                    <li class="bor"><a onclick="camptypeid(3)" href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="charity_check" name="camp_type[]" value="3"></a><img src="<?= BASE_URL ?>/wp-content/uploads/2021/07/material.png" width="20" height="20" style="margin-right: 1% !important; color: #777 !important;"/>Marketplace for charity products</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="tp-blog-sidebar legendstextdesktop">
                            <div class="widget category-widget">
        
                                <label style="font-size: 18px;"><b>Legends</b></label>
        
                                <div class="row">
                                    <div class="col-md-5 line_spacing_top_15">
                                       <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/available.png" />
                                       <label style="font-size: 15px;display: inline;">Active</label>
                                    </div>
                                    <div class="col-md-7 line_spacing_top_15">
                                        <img src="<?= BASE_URL ?>/wp-content/uploads/2021/07/inactive-1.png" />
                                        <label style="font-size: 15px;display: inline;">Inactive</label>
                                    </div>
                                 </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-md-8">

                        <input type="hidden" value="" name="latitude" id="latitude">
                        <input type="hidden" value="" name="longitude" id="longitude">
                        <!-- <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen=""></iframe>
                        </div> -->

                        <div class="contact-map" id="mapholder2" style="width: 100%;  height: 500px;border-radius: 10px;"></div>

                        <p id="errorMap" class="d-none"></p>
                        <p id="errorMapCode" class="d-none"></p>

                    </div>

                    <?php

                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
                    $results = (array) $results;
                    ?>
                    <?php
                    $ipaddress = '';
                    if (getenv('HTTP_CLIENT_IP'))
                        $ipaddress = getenv('HTTP_CLIENT_IP');
                    else if (getenv('HTTP_X_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    else if (getenv('HTTP_X_FORWARDED'))
                        $ipaddress = getenv('HTTP_X_FORWARDED');
                    else if (getenv('HTTP_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    else if (getenv('HTTP_FORWARDED'))
                        $ipaddress = getenv('HTTP_FORWARDED');
                    else if (getenv('REMOTE_ADDR'))
                        $ipaddress = getenv('REMOTE_ADDR');
                    else
                        $ipaddress = 1;
                    ?>
                    <script>
                        $(document).ready(function() {
                            //$( ".times-icon" ).css("display","none");
                            $( ".times-icon" ).click(function() {
                                $( ".serach" ).val("");
                                initMap();
                            });
                            //Location
                            var map;

                            function initMap() {

                                var existingAddLat = $("#latitude").val();
                                var existingAddLng = $("#longitude").val();

                                var mapCenter = new google.maps.LatLng(existingAddLat, existingAddLng);
                                setMap(mapCenter);

                                var geocoder = new google.maps.Geocoder();

                                var autocomplete = new google.maps.places.Autocomplete($("#location")[0], {});
                                google.maps.event.addListener(autocomplete, 'place_changed', function() {

                                    var place = autocomplete.getPlace();
                                    var address = place.formatted_address;
                                    geocoder.geocode({
                                        'address': address
                                    }, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            var latitude = results[0].geometry.location.lat();
                                            var longitude = results[0].geometry.location.lng();

                                            $("#latitude").val(latitude);
                                            $("#longitude").val(longitude);

                                            console.log(latitude + "==" + longitude);

                                            var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                            setMap(mapCenter, latitude, longitude, '', 'search');
                                            
                                        }
                                    });
                                });
                            }

                            function displayLocation(position) {

                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };
                                $("#latitude").val(position.coords.latitude);
                                $("#longitude").val(position.coords.longitude);

                                var mapCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                                setMap(mapCenter);

                                var geocoder = geocoder = new google.maps.Geocoder();
                                geocoder.geocode({
                                    'latLng': mapCenter
                                }, function(results, status) {
                                    if (status == google.maps.GeocoderStatus.OK) {
                                        if (results[1]) {
                                            $("#location").val(results[1].formatted_address);
                                        }
                                    }
                                });
                            }

                            function displayError(error) {

                                $("#errorMap").removeClass("d-none");

                                var x = document.getElementById("errorMap");
                                var y = document.getElementById("errorMapCode");
                                y.innerHTML = error.code;

                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        x.innerHTML = "" //User denied the request for Geolocation.
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        x.innerHTML = "Sorry, we could not detect your location. Please select a area by typing in the search box above."
                                        break;
                                    case error.TIMEOUT:
                                        x.innerHTML = "" //The request to get user location timed out.
                                        break;
                                    case error.UNKNOWN_ERROR:
                                        x.innerHTML = "" //An unknown error occurred.
                                        break;
                                }
                            }

                            function setMap(mapCenter, latitude = 0, longitude = 0, locations = '', search = '') {
                                $("#errorMap").addClass("d-none");
                                $("#mapholder2").removeClass("d-none");

                                var locationvv = $("#location").val();

                                if (search) {
                                    $("#latitude").val(latitude);
                                    $("#longitude").val(longitude);
                                    var zoomv = 10;
                                } else {
                                    $("#latitude").val('20.5937');
                                    $("#longitude").val('78.9629');
                                    var zoomv = 4;
                                }

                                var latitudec = $("#latitude").val();
                                var longitudec = $("#longitude").val();
                                var selectedTypes = [];

                                if ($('#fundraiser_check').is(':checked')) {
                                     console.log("fundraiser_check == " + $("#fundraiser_check").val());
                                   selectedTypes.push($('#fundraiser_check').val());
                                }

                                if ($('#material_check').is(':checked')) {
                                    selectedTypes.push($('#material_check').val());
                                }

                                if ($('#charity_check').is(':checked')) {
                                    selectedTypes.push($('#charity_check').val());
                                }

                                var locations = [
                                    <?php

                                    foreach ($results as $res) {
                                        if ($res['campaign_typeId'] == 2) {
                                            $fundtitle = $res['item_name'];
                                        } else if ($res['campaign_typeId'] == 3) {
                                            $fundtitle = $res['product_name'];
                                        } else {
                                            $fundtitle = $res['fundraiser_title'];
                                        }

                                        $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

                                        if ($res['campaign_typeId'] == 2) {
                                            $goal_amount = $res['item_qty'];
                                            $currency = 'QTY';
                                        } else if ($res['campaign_typeId'] == 3) {
                                            $goal_amount = $res['product_price'];
                                            $currency = $res['currency'];
                                        } else {
                                            $goal_amount = $res['goal_amount'];
                                            $currency = $res['currency'];
                                        }

                                        if ($res['image']) {
                                            $iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
                                        } else {
                                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
                                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                        }
                                        
                                        $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN (" . $res['id'] . ")", ARRAY_A);
                                        if ($res['id'] == 24) {
                                            $achieve_amount = 80000;
                                            $percn = 100;
                                        } else if ($res['id'] == 25) {
                                            $achieve_amount = 16000;
                                            $percn = 100;
                                        } else {
                                            $achieve_amount = 0;
                                            foreach ($resultsdonacc as $tt) {
                                                if ($tt['campaign_typeId'] == 3) {
                                                    $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
                                                } else {
                                                    $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                                                }
                                                $achieve_amount += $achieve_amountn;
                                            }
                                        }

                                        /* if (str_ireplace(",","", $achieve_amount) >= str_ireplace(",","", $goal_amount)) {
                                            $btn = 'no';
                                        } else {
                                            $btn = 'yes';
                                        } */
                                        if ($res['zed_verified']) {
                                            $zed_verified = '<b class="top-left">ZED verified</b>';
                                        } else {
                                            $zed_verified = '';
                                        }

                                        $date1 = strtotime(date("Y-m-d"));
                                        $date2 = strtotime(date("Y-m-d", strtotime($res['end_date'])));
                                        if ($date1 > $date2) {
                                            $cstatus = "inactive";
                                            $btn = 'no';
                                        }else{
                                            $cstatus = "active";
                                        }

                                        if (str_ireplace(",","", $achieve_amount) >= str_ireplace(",","", $goal_amount)) {
                                            $cstatus = "inactive";
                                            $btn = 'no';
                                            $closed = '<b class="red">Closed</b>';
                                            $closedc = 'red';
                                        }else {
                                            $btn = 'yes';
                                            $closed = '<b class="grn">Active</b>';
                                            $closedc = 'green';
                                        }

                                        ?>['<a href="<?php echo $shareurl; ?>" style="text-decoration: none;color:#282828 !important;"><div class="/ccc/" style="text-align: center;"><img src="<?php echo $iimage; ?>" height="150" width="200" /></div><div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;margin-left: 5%;"><?php echo $fundtitle; ?></div><div class="" style="margin: 10px 0 0 0;margin-left: 5%;font-weight: 500;"><b style="font-weight: 500;">Goal:</b> <?php echo $currency . ' ' . $goal_amount; ?></div><div class="" style="margin: 10px 0 0 0;margin-left: 5%;font-weight: 500;"><b style="font-weight: 500;">Raised:</b></div><div class="" style="margin: 10px 0 0 0;text-align:center;color: <?= $closedc; ?>;"><b style="font-weight: 500;text-align:center"><?= $closed; ?></b></div><div class="" style="margin: 10px 0 0 0;margin-left: 5%;text-align:center"><b ><?= $zed_verified; ?></b></div></a>  ', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['campaign_typeId']; ?>, 12, '<?php echo $cstatus; ?>'],
                                    <?php } ?>
                                ];
                                // console.log('latitudec');
                                // console.log(latitudec);
                                // console.log(longitudec);
                                // console.log('longitudec');

                                console.log(locations);

                                var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                    zoom: zoomv,
                                    center: new google.maps.LatLng(latitudec, longitudec),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });

                                var infowindow = new google.maps.InfoWindow();

                                var marker, i;


                                for (i = 0; i < locations.length; i++) {
                                    var shouldInclude = false;
                                    
                                    if(selectedTypes.length > 0) {
                                        shouldInclude = selectedTypes.includes(locations[i][3].toString());        
                                    } else {
                                        shouldInclude = true;
                                    }

                                    if(shouldInclude) {
                                        if (locations[i][3] == 1) {
                                            
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-8-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-11-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-7-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-9-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/06/marker_charity-2.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-10-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }


                                }

                            }

                            // initMap();

                            if ($("#locationChecked").prop('checked') == true) {

                                $(".loc-input").addClass("required");

                                // $.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

                                //     console.log("data: " + data);

                                $("#latitude").val('20.5937');
                                $("#longitude").val('78.9629');
                                console.log("aa");
                                initMap();
                                console.log("bb");
                                $(".locationtextbox").removeClass("d-none");

                                // });

                            } else {
                                $(".loc-input").removeClass("required");
                                $(".locationtextbox").addClass("d-none");
                            }

                            $("#locationChecked").click(function() {
                                if ($(this).is(":checked")) {

                                    $(".loc-input").addClass("required");

                                    $(".locationtextbox").removeClass("d-none");

                                    var errorMapCode = $('#errorMapCode').html();
                                    if (errorMapCode <= 0) {
                                        console.log("1");
                                        initMap();
                                        console.log("2");
                                    }

                                    var location = $('#location').val();
                                    if (location != '') {
                                        $("#mapholder2").removeClass("d-none");
                                    } else {
                                        $("#location-error").removeClass("d-none");
                                    }
                                } else {
                                    $(".loc-input").removeClass("required");
                                    $("#mapholder2").addClass("d-none");
                                    $(".locationtextbox").addClass("d-none");
                                    $("#location-error").addClass("d-none");
                                }
                            });

                            //Location

                        });

                        function camptypeid(rid) {

                            console.log(rid);

                            var selected = new Array();

                            if ($('#fundraiser_check').is(':checked')) {
                                selected.push($('#fundraiser_check').val());
                            }

                            if ($('#material_check').is(':checked')) {
                                selected.push($('#material_check').val());
                            }

                            if ($('#charity_check').is(':checked')) {
                                selected.push($('#charity_check').val());
                            }                     

                            $.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: selected.join(",")
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {

                                    $("#errorMap").addClass("d-none");
                                    $("#mapholder2").removeClass("d-none");

                                    var latitudec = $("#latitude").val();
                                    var longitudec = $("#longitude").val();

                                    var locations = data;

                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var marker, i;

                                    for (i = 0; i < locations.length; i++) {

                                        if (locations[i][3] == 1) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-8-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-11-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-7-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-9-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/06/marker_charity-2.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-10-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }
                                }
                            });

                        }
                    </script>

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end contact-pg-contact-section -->
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
