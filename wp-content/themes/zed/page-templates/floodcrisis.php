<?php /* Template Name: floodcrisis Page */ ?>

<?php
get_header();
?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />
<style>
    .bootbox-body {
        padding: 10px !important;
    }
    .dropdown-container a.active {
        color: white;
    }
    .bt-section-space {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    .d-none {
        display: none;
    }

    .legendstextmobile {
        display: none;
    }

    .legendstextdesktop {
        display: block;
    }
    .card{
        width: 100%;
        margin-top: 10px;
    }
    .enquire-btn {
        text-transform: uppercase;
        transform: rotate(-90deg);
        transform-origin: center;
        height: 45px;
        top: 63%;
        right: -56px;
        margin: auto 0;
        width: 150px;
        position: fixed;
        z-index: 99999;
    }
    .wp {
    padding: 10px 10px !important;
    background: #25D366 !important;
    margin-right: 10px;
    border-radius: 10px;
    color: #fff !important;
    box-shadow: 0 0 7px #ddd !important;
}
    .enquire-btn2 {
        text-transform: uppercase;
        transform: rotate(-90deg);
        transform-origin: center;
        height: 45px;
        top: 35%;
        right: -74px;
        margin: auto 0;
        width: 185px;
        position: fixed;
        z-index: 99999;
    }
    .sidenav {
        display: block;
    }
    .js-example-basic-multiple-limit{
        display: none;
    }
    #myModalLabel2 {
        text-align: left;
    }
    #myModalLabel3 {
        text-align: left;
    }

    button.like{
        width: 65px;
        height: 25px;
        margin: 0 auto;
        line-heigth: 50px;
        border-radius: 6%;
        color: rgba(0,150,136 ,1);
        background-color:rgba(38,166,154 ,0.3);
        border-color: rgba(0,150,136 ,1);
        border-width: 1px;
        font-size: 15px;
    }

    button.dislike{
        width: 65px;
        height: 25px;
        margin: 0 auto;
        line-heigth: 50px;
        border-radius: 6%;
        color: rgba(255,82,82 ,1);
        background-color: rgba(255,138,128 ,0.3);
        border-color: rgba(255,82,82 ,1);
        border-width: 1px;
        font-size: 15px;
    }
    .fa.fa-thumbs-o-up {
        vertical-align: text-top;
    }
    .fa.fa-thumbs-o-down {
        vertical-align: text-top;
    }

    @media (max-width:767px) {
        .card{
            width: 100%;
            margin-top: 42px !important;
        }

        .legendstextmobile {
            display: block;
        }

        .legendstextdesktop {
            display: none;
        }

        .modal.left .modal-dialog, .modal.right .modal-dialog {
            width: 100% !important;
        }
        .enquire-btn {
            text-transform: uppercase;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 94% !important;
            text-align: center;
            padding: 10px;
            transform: rotate(0deg) !important;
            width: 45%;
        }
        .enquire-btn2 {
            text-transform: uppercase;
            position: fixed;
            bottom: 0;
            left: 45%;
            right: 0;
            top: 94% !important;
            text-align: center;
            padding: 10px;
            transform: rotate(0deg) !important;
            width: 55%;
        }
        .bt-footer-bar.bt-copyright-left {
            margin-bottom: 40px;
        }

        .sidenav {
            display: none;
        }
        .main {
            margin-left: 0px !important;
        }
        .card {
            margin-top: 10px !important;
        }
        .js-example-basic-multiple-limit {
            display: block;
            margin-top: 15px !important;
            margin-left: 23px !important;
            width: 88% !important;
        }
        #myModalLabel2 {
        text-align: center;
        }
        #myModalLabel3 {
            text-align: center;
        }
    }

    /*******************************
    * MODAL AS LEFT/RIGHT SIDEBAR
    * Add "left" or "right" in modal parent div, after class="modal".
    * Get free snippets on bootpen.com
    *******************************/
    .modal{z-index: 999999 !important;}
    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 55%;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content,
    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body,
    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }

    /*Right*/
    .modal.right.fade .modal-dialog {
        right: -320px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }
    .modal.right.fade.in .modal-dialog {
        right: 0;
    }


    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
    }
    .modal-header {
        border-bottom-color: #EEEEEE;
        background-color: #FAFAFA;
    }

    /* Style the tab */
    .tab {
    float: left;
    /* border: 1px solid #ccc; */
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
    }

    /* Style the buttons inside the tab */
    .tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0px 16px;
        /* border: 1px solid #ccc; */
        /* width: 70%; */
        border-left: none;
        height: 300px;
        padding-top: 25px;
        width: 100%;
    }
    .tabcontent1{
        float: left;
        padding: 0px 16px;
        /* border: 1px solid #ccc; */
        /* width: 70%; */
        border-left: none;
        height: 300px;
        padding-top: 25px;
        width: 100%;
    }
    .modal-body {
        padding: 0px !important;
    }


    /* sidebar */
    /* Fixed sidenav, full height */
    .sidenav {
    height: 100%;
    width: 215px;
    position: absolute;
    margin-top: -10px;
    /* z-index: 1; */
    top: 57;
    left: 0;
    background-color: #FAFAFA;
    overflow-x: hidden;
    padding-top: 20px;
    min-height: 600px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 17px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover {
    color: white;
    }

    .sidenav a:active {
    color: white !important;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
    
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
    float: right;
    padding-right: 8px;
    padding-top: 6px;
    }

    .sidenav #nav-icon{
        display:none;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        
    }

    @media only screen and (max-width: 768px){
        .wsp-chat {
            bottom: 45px !important;
        }

        .serach{
            width: 100% !important;
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
        .gm-style .gm-style-iw-c {
            /* max-height: 450px !important; */
            height: 400vh !important;
        }
    }
    @media only screen and (min-device-width : 375px) and (max-device-width : 667px) {
        .gm-style .gm-style-iw-c {
            /* max-height: 450px !important; */
            height: 400vh !important;
        }
    }


    /* Main content */
    .main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 17px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    }

    .top-left {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        top:0 !important;
    }

    
    .link-box{
        border: 1px solid #ccc;
        
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    @media only screen and (max-width: 992px){
        .modal-body {
            padding-left: 0px;
        }
    }
    .gm-style .gm-style-iw-d {
        max-height: 450px !important;
    }
    .gm-style .gm-style-iw-c {
        max-height: 450px !important;
    }

    /* select{
	    -moz-appearance: none !important; 
	    -webkit-appearance: none !important; 
    } */
    .serach{
        width: 100%;
        margin-left: 0px;
    }
    
    .tp-blog-sidebar {
        margin-bottom: 20px;
    }
    .btn {
        min-width: 105px;
        height: 40px;
        margin: 0;
        padding: 0 20px;
        vertical-align: middle;
        border: 0;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 300;
        line-height: 40px;
        color: #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        text-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        -o-transition: all .3s;
        -moz-transition: all .3s;
        -webkit-transition: all .3s;
        -ms-transition: all .3s;
        transition: all .3s;
    }
    .btn-next {
        background: #3d3d8a;
    }
    .modal-body {
        position: relative;
        padding: 15px !important;
    }
    .pac-container {
        z-index: 1051 !important;
    }
</style>

<section class="bt-main-row bt-section-space sidebar-right section-padding sec-detail" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Give">
    <div class="container covid_page_section">
        
        <div class="widget search-widget section_between_space">
            <input type="text" class="form-control serach locationtextboxcontrol" value="" name="location" id="location" placeholder="Enter address here" style="cursor: auto;padding: 10px !important;">
        </div>

        <div class="row">

            <div class="col-md-4">

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap">
                </script>

                <div>
                    <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
                </div>
                <?php
                global $wpdb;
                $categorylist = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE type=2", ARRAY_A);
                $result_arr = (array) $categorylist;
                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                             $url = "https://";   
                        else  
                             $url = "http://";   
                        // Append the host(domain name, ip) to the URL.   
                        $url= $_SERVER['HTTP_HOST'];   
                        
                        // Append the requested resource location to the URL   
                        $url= $_SERVER['REQUEST_URI'];        



                //$url = 'http://https://jedaidevbed.in/zedaid/i-need/?id=31';
                $url_components = parse_url($url);
                parse_str($url_components['query'], $params);
                $request_id = array_key_exists('id',$params) ? $params['id'] : -1;
                $userId = get_current_user_id();
                $new_user_data = get_user_meta($userId);
                // $new_user = get_user($userId);
                if (isset($new_user_data['xoo_ml_phone_no'][0])) {
                    $loginPhoneNumber = $new_user_data['xoo_ml_phone_no'][0];
                } else {
                    $loginPhoneNumber = $new_user_data['phone_number'][1];
                }
                $user = wp_get_current_user();
                $emailid = $user->user_email;

                $admin_email = get_option( 'admin_email' );

				$adminEmails = get_users('role=Administrator');        
    			$isLoggedInUserAdmin = false;
            	foreach ($adminEmails as $admin) {
	       			if($admin->user_email == $emailid) {
	       				$isLoggedInUserAdmin = true;
	       				break;			
	       			}
	 			}


                ?>
                <div class="tp-blog-sidebar">
                    <div class="widget category-widget">
                        <div>
                            <?php if(!empty($result_arr)){
                                $i = 1;
                                foreach($result_arr as $rec){
                            ?>
                                <div class="bor <?php if($i > 1){?> line_spacing_top_15 <?php } ?>">
                                    <input type="checkbox" value="<?= $rec['id']; ?>" class="custom-control-input covidid" id="covidid<?= $rec['id']; ?>" 
                                    name="covidid" /> <label class="custom-control-label " for="covidid1">
                                    <img src="<?= $rec['icon']; ?>" width="20" height="20" /> <?= $rec['title']; ?> 
                                    <a class="add-icon" href="javascript:void(0)" onclick="openAddCollectionsPopup('<?= $rec['id']; ?>','<?= $rec['title']; ?>','<?= $userId; ?>')"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a>
                                    </label>
                                </div>
                            <?php $i++; } } ?>

                            <!-- <div class="bor line_spacing_top_15">
                                <input type="checkbox" value="2" class="custom-control-input covidid" id="covidid2" name="covidid" /> <label class="custom-control-label " for="covidid2"><img src="https://zedaid.org/wp-content/uploads/2021/04/injection.png" width="20" height="20" /> Remdesivir Injection <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdJLHyM_ABs6TGDKq4YlPY4Xt8RKek2HaLK-7EpZZOlNVfICg/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label></div>
                            <div class="bor line_spacing_top_15">
                                <input type="checkbox" value="3" class="custom-control-input covidid" id="covidid3" name="covidid" /> <label class="custom-control-label " for="covidid3"><img src="https://zedaid.org/wp-content/uploads/2021/04/plasma.png" width="20" height="20" /> Plasma <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSesttYE86RQjK9TpCJDi-TtDWtNlZAydxex2C2hqylWhzFJvQ/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label></div>
                            <div class="bor line_spacing_top_15">
                                <input type="checkbox" value="4" class="custom-control-input covidid" id="covidid4" name="covidid" /> <label class="custom-control-label " for="covidid4"><img src="https://zedaid.org/wp-content/uploads/2021/04/oxygen-tank.png" width="20" height="20" /> Oxygen Cylinder <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdDS0SZ_XOLkK8dG-9ACOPRQCXZv2sjKAXa3my7n0rht0g_yA/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label>
                            </div> -->
                        </div>
                    </div>
                </div>
             
                <div class="tp-blog-sidebar legendstextdesktop">
                    <div class="widget category-widget"  id="service_status">

                        <label style="font-size: 18px;"><b>Legends</b></label>

                        <div class="row">
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="0" class="service_status">
                                <img src="<?= BASE_URL ?>wp-content/uploads/2021/08/request_open.png" />
                                <label style="font-size: 15px;display: inline;">Request is open</label>
                            </div>
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="3" class="service_status">
                                <img src="<?= BASE_URL ?>wp-content/uploads/2021/08/orange_marker.png" />
                                <label style="font-size: 15px;display: inline;">Supporter has responded on Request.</label>
                            </div>
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="1" class="service_status">
                                <img src="<?= BASE_URL ?>wp-content/uploads/2021/07/inactive-1.png" />
                                <label style="font-size: 15px;display: inline;">Request is Closed</label>
                            </div>
                         </div>
                    </div>
                </div>

                <div class="legendstextdesktop">

                    <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Be the #ZEDAvengers! You can contribute your feedback/ information on availability of the facilities on our WhatsApp number. We will update the validated information on the map. Let’s save more #ZEDLives!!!</p>


                    <hr>

                    <!-- <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Disclaimer : ZedAid is extending helping hand in providing availability information of various Covid support requirements. Users are requested to check the authenticity of the contacts given before proceeding (be aware of scammers, fraudsters, black marketers)</p> -->

                </div>

                <input type="hidden" value="" name="latitude" id="latitude">
                <input type="hidden" value="" name="longitude" id="longitude">

            </div>

            <div class="col-md-8">

                <div id="mapholder2" class="d-none" style="width: 100%; height: 600px; position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"></div>
                </div>

                <p id="errorMap" class="d-none"></p>
                <p id="errorMapCode" class="d-none"></p>


            </div>

            <div class="col-md-4 legendstextmobile">
                <br>

                <div class="">
                    <label style="font-size: 18px;"><b>Legends:</b></label>
                    <div id="service_status1">
                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="0" class="service_status1">
                        <img style="width: 16px;" src="<?= BASE_URL ?>wp-content/uploads/2021/08/request_open.png"/>
                        <label style="font-size: 15px;display: inline;">Request is open</label>

                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="3" class="service_status1">
                        <img style="width: 16px;" src="<?= BASE_URL ?>wp-content/uploads/2021/08/orange_marker.png"/>
                        <label style="font-size: 15px;display: inline;">Supporter has responded on Request.</label>

                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="1" class="service_status1">
                        <img style="width: 16px;" src="<?= BASE_URL ?>wp-content/uploads/2021/07/inactive-1.png"/>
                        <label style="font-size: 15px;display: inline;">Request is Closed</label>
                    </div>

                </div>

                <hr>

                <div class="">
                    <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Be the #ZEDAvengers! You can contribute your feedback/ information on availability of the facilities on our WhatsApp number. We will update the validated information on the map. Let’s save more #ZEDLives!!!</b></p>

                    <hr>

                    <!-- <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Disclaimer : ZedAid is extending helping hand in providing availability information of various Covid support requirements. Users are requested to check the authenticity of the contacts given before proceeding (be aware of scammers, fraudsters, black marketers)</p> -->
                </div>

            </div>
            
            <?php
            //global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data WHERE `status` != '2'", ARRAY_A);
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
                jQuery(document).ready(function() {

                    //Location
                    var map;

                    function initMap() {

                        var existingAddLat = jQuery("#latitude").val();
                        var existingAddLng = jQuery("#longitude").val();
                        console.log(existingAddLat);

                        var mapCenter = new google.maps.LatLng(existingAddLat, existingAddLng);
                        setMap(mapCenter);

                        var geocoder = new google.maps.Geocoder();
                        
                        var autocomplete = new google.maps.places.Autocomplete(jQuery("#location")[0], {});
                        google.maps.event.addListener(autocomplete, 'place_changed', function() {

                            var place = autocomplete.getPlace();
                            var address = place.formatted_address;
                            geocoder.geocode({
                                'address': address
                            }, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    var latitude = results[0].geometry.location.lat();
                                    var longitude = results[0].geometry.location.lng();

                                    jQuery("#latitude").val(latitude);
                                    jQuery("#longitude").val(longitude);

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
                        jQuery("#latitude").val(position.coords.latitude);
                        jQuery("#longitude").val(position.coords.longitude);

                        var mapCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        setMap(mapCenter);

                        var geocoder = geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            'latLng': mapCenter
                        }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[1]) {
                                    jQuery("#location").val(results[1].formatted_address);
                                }
                            }
                        });
                    }

                    function displayError(error) {

                        jQuery("#errorMap").removeClass("d-none");

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
                        jQuery("#errorMap").addClass("d-none");
                        jQuery("#mapholder2").removeClass("d-none");
                        
                        var locationvv = jQuery("#location").val();

                        console.log("comig");
                        
                        if (search) {
                            jQuery("#latitude").val(latitude);
                            jQuery("#longitude").val(longitude);
                            var zoomv = 10;
                        } else {
                            jQuery("#latitude").val('20.5937');
                            jQuery("#longitude").val('78.9629');
                            var zoomv = 4;
                        }

                        var latitudec = jQuery("#latitude").val();
                        var longitudec = jQuery("#longitude").val();

                        var locations = [
                            <?php
                            foreach ($results as $res) {
                                $pid = $res['id'];
                                $title = $res['name'];
                                $status = $res['status'];
                                $supporter_id = $res['supporter_id'];
                                $mobileNumber = $res['mobileNumber'];
                                $emailAddress = $res['email'];
                                $categoryId = $res['categoryId'];

                                $cats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id = '".$categoryId."' LIMIT 1", ARRAY_A);
                                $categoryName = $cats[0]['title'];

                                //$results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_them WHERE floodCrisisId = '".$pid."' AND userId = '".$userId."' ", ARRAY_A);
                                $results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_them WHERE floodCrisisId = '".$pid."'", ARRAY_A);

                                $results_change_status = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_change_status WHERE floodCrisisId = '".$pid."'", ARRAY_A);

                                //$categoryName = '<span style="color:#2EC4F7 !important; float: left;">' . $res['categoryName'] . '</span> <span style="color:#2EC4F7 !important; float: right;cursor: pointer;"><a href="#" class="btn" style="color:#3d3d8a !important;" onclick="openPopup('.$pid.','.$status.');">Change Status</a></span>';

                                $categoryName = '<span style="color:#3d3d8a !important; float: left; margin-top:10px;">' . $categoryName . '</span>';
                                
                                /* if ($status == 1) {
                                    $categoryName .= '<br><span>Current Status: Available</span>';
                                }else if($status == 2){
                                    $categoryName .= '<br><span>Current Status: To Be Available</span>';
                                }else{
                                    $categoryName .= '<br><span>Current Status: Not Available</span>';
                                } */

                                //$lastUpdated = '<br><span style="color:black !important;">Last Updated: ' . date("d M Y h:i A", strtotime($res['updatedAt'])).'</span>';
                                $zed_verified = $res['zed_verified'];
                                $last_status_updated_id = $res['last_status_updated_id'];
                                $results2 = $wpdb->get_results("SELECT * FROM wp_status_update_users WHERE id = '$last_status_updated_id' LIMIT 1", ARRAY_A);
                                if(!empty($results2)){
                                    if ($zed_verified == 1) {
                                        $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b> <br><b class="top-left">ZED verified</b>' ;
                                    }else{
                                        $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b>' ;
                                    }
                                }else{
                                    if ($zed_verified == 1) {
                                        $verified_by = '<b class="top-left">ZED verified</b>';
                                    }else{
                                        $verified_by = '';
                                    }
                                }
                                $results = (array) $results;

                                $title1 = $title;

                                $lastUpdated = '<span style="color:black !important; font-size: 14px;">Last updatedAt: ' . date("d M Y h:i A", strtotime("+330 minutes", strtotime($res['updatedAt']))) . $verified_by . '</span>';

                                $supportDetails = '';
                                if (!empty($results_supports)) {
                                    if (!empty($results_supports[0]['organization_name'])) {
                                        $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['organization_name'].'</b><br>Contact: <b>'.$results_supports[0]['mobile_number'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
                                    }else{
                                        $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['name'].'</b><br>Contact: <b>'.$results_supports[0]['mobile_number'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
                                    }

                                    if(!empty($results_change_status)){
                                        $supportDetails .= '<br><br>Change Status Info:<br>Name: <b>'.$results_change_status[0]['name'].'</b><br>Contact: <b>'.$results_change_status[0]['mobileNumber'].'</b><br>Description: <b>'.$results_change_status[0]['supportDetails'].'</b>';
                                    }

                                    // $supportDetails = '<br>Name: <b>'.$results_supports[0]['name'].'</b><br>Support Info: <b>'.$results_supports[0]['supportDetails'].'</b>';

                                    if ( ($supporter_id == $userId && $userId != '0') || ($userId != '0' && $userId == $res['userId']) || ($emailid == $emailAddress) || ($emailid == $results_supports[0]['email']) || ($userId == '1') || $isLoggedInUserAdmin ) {
                                        if ($status == '0' || $status == '3') {
                                            $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$userId.');">Change Status</button>';
                                        }else{
                                            $chnageStatusBtn = '';
                                        }
                                    }else{
                                        if ($status == '0') {

                                            if($loginPhoneNumber != $mobileNumber){
                                                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.','.$userId.');">Support Them</button>';
                                            }else{
                                                $chnageStatusBtn = '';
                                            }
                                        }else{
                                            $chnageStatusBtn = '';
                                        }
                                    }
                                }else{
                                    $results_supports = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}support_change_status WHERE floodCrisisId = '".$pid."'", ARRAY_A);
                                    if (!empty($results_supports)) {
                                    $supportDetails = '<br>Supporter Info:<br>Name: <b>'.$results_supports[0]['name'].'</b><br>Contact: <b>'.$results_supports[0]['mobileNumber'].'</b><br>Description: <b>'.$results_supports[0]['supportDetails'].'</b>';
                                    }
                                    if ($status == '0') {
                                        if((($userId == $res['userId']) && $userId != 0) || ($emailid == $emailAddress) || ($userId == '1') || $isLoggedInUserAdmin){
                                            $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$userId.');">Change Status</button>';
                                        }else if ($loginPhoneNumber != $mobileNumber) {
                                            $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.','.$userId.');">Support Them</button>';
                                        } else if($userId == 0){
                                            $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopupSupportThem('.$pid.','.$status.','.$userId.');">Support Them</button>';
                                        }else{
                                            $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$userId.');">Change Status</button>';
                                        }
                                    }else{
                                        $chnageStatusBtn = '';
                                    }
                                }
                                $mstatus = $res['status'];
                                $link="https://zedaid.org/i-need/?id=$pid";
                                ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Location: <?php echo $res['address']; ?><br>Contact: <?php echo $res['mobileNumber']; ?><br>Description: <?php echo $res['description']; ?><br><br><?= $lastUpdated; ?><br><?= $supportDetails.$chnageStatusBtn; ?><br><br><?php echo 'Share via : '; ?>
                                <a target="_blank" href="https://api.whatsapp.com/send?text=<?= $link; ?>" class="bn"><i class="fa fa-whatsapp wp"></i></a><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= $link; ?>" class="bn"><i class="ti-facebook fb"></i></a><a target="_blank" href="http://twitter.com/share?text=<?= $link; ?>" class="bn"><i class="ti-twitter-alt tw"></i></a></div><br>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>,<?php echo $pid; ?>,  15],

                                <?php  
                            } ?>
                        ];

                        console.log(locations);

                        var map = new google.maps.Map(document.getElementById('mapholder2'), {
                            zoom: zoomv,
                            mapTypeControl: false,
                            center: new google.maps.LatLng(latitudec, longitudec),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        var infowindow = new google.maps.InfoWindow();

                        var marker, i;

                        for (i = 0; i < locations.length; i++) {
                            console.log(locations[i]);
                            console.log(locations[i]);

                            if (locations[i][3] == 8) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/rescue-gray.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 3) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/rescue-amber.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/rescue-red.png',
                                        map: map
                                    });
                                }
                            } else if(locations[i][3] == 9){
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/food-gray.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 3) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/food-amber.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/food-red.png',
                                        map: map
                                    });
                                }
                            } else if(locations[i][3] == 10){
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/medical-gray.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 3) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/medical-amber.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/medical-red.png',
                                        map: map
                                    });
                                }
                            } else if(locations[i][3] == 11){
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/finance-gray.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 3) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/finance-amber.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: '<?= BASE_URL ?>img/finance-red.png',
                                        map: map
                                    });
                                }
                            }
                            if ( locations[i][5] == <?php echo $request_id; ?> ) 
                            {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }  
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infowindow.setContent(locations[i][0]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }

                    }

                    // initMap();

                    if (jQuery("#locationChecked").prop('checked') == true) {

                        jQuery(".loc-input").addClass("required");

                        // jQuery.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

                        //     console.log("data: " + data);

                        jQuery("#latitude").val('20.5937');
                        jQuery("#longitude").val('78.9629');
                        console.log("aa");
                        initMap();
                        console.log("bb");
                        jQuery(".locationtextbox").removeClass("d-none");

                        // });

                    } else {
                        jQuery(".loc-input").removeClass("required");
                        jQuery(".locationtextbox").addClass("d-none");
                    }

                    jQuery("#locationChecked").click(function() {
                        if (jQuery(this).is(":checked")) {

                            jQuery(".loc-input").addClass("required");

                            jQuery(".locationtextbox").removeClass("d-none");

                            var errorMapCode = jQuery('#errorMapCode').html();
                            if (errorMapCode <= 0) {
                                console.log("1");
                                initMap();
                                console.log("2");
                            }

                            var location = jQuery('#location').val();
                            if (location != '') {
                                jQuery("#mapholder2").removeClass("d-none");
                            } else {
                                jQuery("#location-error").removeClass("d-none");
                            }
                        } else {
                            jQuery(".loc-input").removeClass("required");
                            jQuery("#mapholder2").addClass("d-none");
                            jQuery(".locationtextbox").addClass("d-none");
                            jQuery("#location-error").addClass("d-none");
                        }
                    });

                    //Location

                    jQuery('.covidid').click(function() {
                        var type="category";
                        console.log("Covid Clicked");
                        //showLoadingBar();
                        var rid = '';
                        if (jQuery(this).val() == 8) {
                            if (jQuery("#covidid9").prop('checked') == true) {
                                rid = rid + ',9';
                            }
                            if (jQuery("#covidid10").prop('checked') == true) {
                                rid = rid + ',10';
                            }
                            if (jQuery("#covidid11").prop('checked') == true) {
                                rid = rid + ',11';
                            }
                        }

                        if (jQuery(this).val() == 9) {
                            if (jQuery("#covidid8").prop('checked') == true) {
                                rid = rid + ',8';
                            }
                            if (jQuery("#covidid10").prop('checked') == true) {
                                rid = rid + ',10';
                            }
                            if (jQuery("#covidid11").prop('checked') == true) {
                                rid = rid + ',11';
                            }
                        }

                        if (jQuery(this).val() == 10) {
                            if (jQuery("#covidid8").prop('checked') == true) {
                                rid = rid + ',8';
                            }
                            if (jQuery("#covidid9").prop('checked') == true) {
                                rid = rid + ',9';
                            }
                            if (jQuery("#covidid11").prop('checked') == true) {
                                rid = rid + ',11';
                            }
                        }

                        if (jQuery(this).val() == 11) {
                            if (jQuery("#covidid10").prop('checked') == true) {
                                rid = rid + ',10';
                            }
                            if (jQuery("#covidid8").prop('checked') == true) {
                                rid = rid + ',8';
                            }
                            if (jQuery("#covidid9").prop('checked') == true) {
                                rid = rid + ',9';
                            }
                        }
                        
                        console.log(rid);
                        // return false;
                        if (this.checked) {

                            if (jQuery(this).val() == 8) {
                                rid = rid + ',8';
                            }

                            if (jQuery(this).val() == 9) {
                                rid = rid + ',9';
                            }

                            if (jQuery(this).val() == 10) {
                                rid = rid + ',10';
                            }

                            if (jQuery(this).val() == 11) {
                                rid = rid + ',11';
                            }
                            
                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filterfloodcrisis.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid,
                                    type: type
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {

                                    jQuery("#errorMap").addClass("d-none");
                                    jQuery("#mapholder2").removeClass("d-none");

                                    var latitudec = jQuery("#latitude").val();
                                    var longitudec = jQuery("#longitude").val();

                                    var locations = data;

                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        mapTypeControl: false,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var marker, i;

                                    console.log(locations);

                                    for (i = 0; i < locations.length; i++) {

                                        console.log(locations[i][3]);
                                        console.log(locations[i][4]);

                                        if (locations[i][3] == 8) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 9){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 10){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 11){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-red.png',
                                                    map: map
                                                });
                                            }
                                        }

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }

                                    // hideLoadingBar();
                                }
                            });

                        } else {

                            if (jQuery(this).val() == 1) {
                                rid = rid;
                            }

                            if (jQuery(this).val() == 2) {
                                rid = rid;
                            }

                            if (jQuery(this).val() == 3) {
                                rid = rid;
                            }

                            if (jQuery(this).val() == 4) {
                                rid = rid;
                            }
                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filterfloodcrisis.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid,
                                    type: type
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {

                                    jQuery("#errorMap").addClass("d-none");
                                    jQuery("#mapholder2").removeClass("d-none");

                                    var latitudec = jQuery("#latitude").val();
                                    var longitudec = jQuery("#longitude").val();

                                    var locations = data;

                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        mapTypeControl: false,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var marker, i;

                                    for (i = 0; i < locations.length; i++) {

                                        if (locations[i][3] == 8) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/rescue-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 9){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/food-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 10){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/medical-red.png',
                                                    map: map
                                                });
                                            }
                                        } else if(locations[i][3] == 11){
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-gray.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 3) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-amber.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>img/finance-red.png',
                                                    map: map
                                                });
                                            }
                                        }

                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                    }

                                    // hideLoadingBar();
                                }
                            });
                        }
                    });

                    jQuery('.service_status').click(function() {
                        var type="status";

                        var selected = new Array();
                        jQuery("#service_status input[type=checkbox]:checked").each(function () {
                            selected.push(this.value);
                        });
                        
                        jQuery.ajax({
                            type: "POST",
                            url: '<?php echo BASE_URL . 'filterfloodcrisis.php' ?>',
                            dataType: 'json',
                            data: {
                                id: selected.join(","),
                                type: type
                            }, //--> send id of checked checkbox on other page
                            success: function(data) {

                                jQuery("#errorMap").addClass("d-none");
                                jQuery("#mapholder2").removeClass("d-none");

                                var latitudec = jQuery("#latitude").val();
                                var longitudec = jQuery("#longitude").val();

                                var locations = data;

                                var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                    zoom: 4,
                                    mapTypeControl: false,
                                    center: new google.maps.LatLng(latitudec, longitudec),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });

                                var infowindow = new google.maps.InfoWindow();

                                var marker, i;

                                console.log(locations);

                                for (i = 0; i < locations.length; i++) {

                                    console.log(locations[i][3]);
                                    console.log(locations[i][4]);

                                    if (locations[i][3] == 8) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/rescue-gray.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/rescue-amber.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/rescue-red.png',
                                                map: map
                                            });
                                        }
                                    } else if(locations[i][3] == 9){
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/food-gray.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/food-amber.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/food-red.png',
                                                map: map
                                            });
                                        }
                                    } else if(locations[i][3] == 10){
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/medical-gray.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/medical-amber.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/medical-red.png',
                                                map: map
                                            });
                                        }
                                    } else if(locations[i][3] == 11){
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/finance-gray.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/finance-amber.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: '<?= BASE_URL ?>img/finance-red.png',
                                                map: map
                                            });
                                        }
                                    }

                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            infowindow.setContent(locations[i][0]);
                                            infowindow.open(map, marker);
                                        }
                                    })(marker, i));
                                }

                                // hideLoadingBar();
                            }
                        });
                    });
                });
            </script>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Disclaimer : ZedAid is extending helping hand in providing availability information of various iNeed requirements. Users are requested to check the authenticity of the contacts given before proceeding (be aware of scammers, fraudsters)</p>
            </div>
        </div>
        
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap1"></script> -->
        <script>
            jQuery(function () {
                var input = document.getElementById("keyword");
                var autocomplete = new google.maps.places.Autocomplete(input);

                //$('#addCollections').modal('show');

            });

        </script>
        <style>
            .pac-container {
                z-index: 10000 !important;
            }
            div.pac-container {
                z-index: 99999999999 !important;
            }
            .pac-logo::after{
                z-index: 99999999999 !important;
            }
            .btn.focus, .btn:focus, .btn:hover{
                color: white !important;
            }
        </style>


        <!-- Toggle the addCollections: -->
        <div class="modal fade" id="addCollections" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="collectionformreset()">&times;</button>
                        <h4 class="modal-title text-center" id="categoryNameTitle">Add Collections</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frm1" action="<?php echo BASE_URL ?>changestatus.php" enctype="multipart/form-data" method="post" class="f1">
                            <input type="hidden" value="<?= $userId; ?>" name="userId" id="userId" />
                            <input type="hidden" value="" name="hidcategoryId" id="hidcategoryId"/>
                            
                            <!-- <br> -->
                            <!-- <h4></h4> -->
                            <div class="mainvalid">
                                <div class="form-group valid">
                                    <label class="lbform">Name</label>
                                    <input type="text" id="name1" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                    <span id="error-name1"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Email</label>
                                    <input type="text" id="email1" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                    <span id="error-email1"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Phone Number</label>
                                    <input type="text" id="phone_number1" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                    <span id="error-mobile_number1"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Address</label>
                                    <input type="text" id="address1" name="address" placeholder="Enter Address" class="form-control">
                                    <span id="error-address1"></span>
                                </div>
                                <input type="hidden" name="lat" id="lat" value="19.076011">
                                <input type="hidden" name="lng" id="lng" value="72.877600">
                                <div class="form-group valid">
                                    <label class="lbform">Description</label>
                                    <textarea id="desc1" name="desc" class="form-control" maxlength="100"></textarea>
                                    <span id="error-desc1"></span>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" id="btn-submit-food" class="btn btn-next">Save</button>
                                <button type="button" id="btn-submit-loader-food" class="btn btn-next">Loading...</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
        
        <!-- Toggle the support them: -->
        <div class="modal fade" id="supportThem" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-next">
                        <button type="button" class="close"  style="color:white;" data-dismiss="modal" onclick="supportThemformreset()">&times;</button>
                        <h4 class="modal-title text-center" id="support_them_title" style="color:white;">Support Them</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frm2" action="<?php echo BASE_URL ?>support_them.php" enctype="multipart/form-data" method="post" class="f1">
                            <input type="hidden" value="<?= $userId; ?>" name="userId" id="userId" />
                            <input type="hidden" value="0" name="id" id="id"/>
                            
                            <!-- <br> -->
                            <!-- <h4></h4> -->
                            <div class="mainvalid">
                                <div class="form-group valid">
                                    <label class="lbform">Name</label>
                                    <input type="text" id="name2" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                    <span id="error-name2"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Email</label>
                                    <input type="text" id="email2" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                    <span id="error-email2"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Phone Number</label>
                                    <input type="text" id="phone_number2" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                    <span id="error-mobile_number2"></span>
                                </div>
                                
                                <div class="form-group valid">
                                    <label class="lbform">NGO/Organization Name</label>
                                    <input type="text" id="organization_name" value="" name="organization_name" placeholder="Enter NGO/Organization Name" maxlength="50" class="form-control">
                                    <span id="error-organization_name"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Description</label>
                                    <textarea id="desc2" name="desc" class="form-control" maxlength="100"></textarea>
                                    <span id="error-desc2"></span>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" id="btn-submit-support" class="btn btn-next">Save</button>
                                <button type="button" id="btn-submit-loader-support" class="btn btn-next">Loading...</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Toggle the status: -->
        <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="formreset()">&times;</button>
                        <h4 class="modal-title text-center" id="change_status">Change Status</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmChangeStatus" action="<?php echo BASE_URL ?>changestatus.php" enctype="multipart/form-data" method="post" class="f1">
                            <input type="hidden" value="<?= $userId; ?>" name="userId" />
                            <input type="hidden" value="" name="pid" id="pid"/>

                            <br>
                            <div class="mainvalid">
                                <div class="form-group valid">
                                    <label class="lbform">Name</label>
                                    <input type="text" id="name" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                    <span id="error-name"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Email</label>
                                    <input type="text" id="email" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                    <span id="error-email"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Phone Number</label>
                                    <input type="text" id="phone_number" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                    <span id="error-mobile_number"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Support Details</label>
                                    <textarea id="supportDetails" name="supportDetails" class="form-control"></textarea>
                                    <span id="error-supportDetails"></span>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" id="btn-submit" class="btn btn-next">Save</button>
                                <button type="button" id="btn-submit-loader" class="btn btn-next">Loading...</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- successmsg -->
        <div class="modal fade" id="successmsg" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center" id="exampleModalLongTitle">Change Status</h4>
                    </div>
                    <div class="modal-body">
                        <h2>Status change successfully.</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

    </div>
</section>
<?php
get_footer();
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

<script>
    jQuery('.status-available').css('display','none');
    jQuery('.status-tobeavailable').css('display','none');
    jQuery('.status-notavailable').css('display','none');

    function collectionformreset(){
        jQuery("#name1").val("");
        jQuery("#email1").val("");
        jQuery("#phone_number1").val("");
        jQuery("#address1").val("");
        jQuery("#desc1").val("");
        jQuery("#desc1").text("");
        jQuery("#addCollections").trigger("reset");
        jQuery("#error-name1").html("<span id='error-name1' style=''></span>");
        jQuery("#error-email1").html("<span id='error-email' style=''></span>");
        jQuery("#error-address1").html("<span id='error-address1' style=''></span>");
        jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''></span>");
        jQuery("#error-desc1").html("<span id='error-desc1' style=''></span>");
    }

    function supportThemformreset(){
        jQuery("#name2").val("");
        jQuery("#email2").val("");
        jQuery("#phone_number2").val("");
        jQuery("#desc2").val("");
        jQuery("#desc2").text("");        
        jQuery("#supportThem").trigger("reset");
        jQuery("#error-name2").html("<span id='error-name2' style=''></span>");
        jQuery("#error-email2").html("<span id='error-email2' style=''></span>");
        jQuery("#error-address2").html("<span id='error-address2' style=''></span>");
        jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''></span>");
    }

    function formreset(){
        jQuery("#name").val("");
        jQuery("#email").val("");
        jQuery("#phone_number").val("");
        jQuery("#supportDetails").val("");
        jQuery("#frmChangeStatus").trigger("reset");

        jQuery("#error-name").html("<span id='error-name' style=''></span>");
        jQuery("#error-email").html("<span id='error-email' style=''></span>");
        jQuery("#error-status").html("<span id='error-status' style=''></span>");
        jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''></span>");
    }

    jQuery('body').click(function (event) 
    {
        if(!jQuery(event.target).closest('#changeStatus').length && !jQuery(event.target).is('#changeStatus')) {
            jQuery("#name").val("");
            jQuery("#email").val("");
            jQuery("#phone_number").val("");
            jQuery("#supportDetails").val("");
            jQuery("#frmChangeStatus").trigger("reset");

            jQuery("#error-name").html("<span id='error-name' style=''></span>");
            jQuery("#error-email").html("<span id='error-email' style=''></span>");
            jQuery("#error-status").html("<span id='error-status' style=''></span>");
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''></span>");
        }
        
        if (!jQuery(event.target).closest('#addCollections').length && !jQuery(event.target).is('#addCollections')) {
            jQuery("#name1").val("");
            jQuery("#email1").val("");
            jQuery("#phone_number1").val("");
            jQuery("#address1").val("");
            jQuery("#desc1").val("");
            jQuery("#desc1").text("");
            jQuery("#addCollections").trigger("reset");
            jQuery("#error-name1").html("<span id='error-name1' style=''></span>");
            jQuery("#error-email1").html("<span id='error-email' style=''></span>");
            jQuery("#error-address1").html("<span id='error-address1' style=''></span>");
            jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''></span>");
            jQuery("#error-desc1").html("<span id='error-desc1' style=''></span>");
        }

        if (!jQuery(event.target).closest('#supportThem').length && !jQuery(event.target).is('#supportThem')) {

            jQuery("#name2").val("");
            jQuery("#email2").val("");
            jQuery("#phone_number2").val("");
            jQuery("#desc2").val("");
            jQuery("#desc2").text("");        
            jQuery("#supportThem").trigger("reset");
            jQuery("#error-name2").html("<span id='error-name2' style=''></span>");
            jQuery("#error-email2").html("<span id='error-email2' style=''></span>");
            jQuery("#error-address2").html("<span id='error-address2' style=''></span>");
            jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''></span>");
        }
    });

    function openPopup(pid, userId){
        /* if(userId == 0){
            window.location.href = "<?php echo get_site_url(); ?>/login";
        }else{  
            jQuery('#changeStatus').modal('show');
            jQuery('#pid').val(pid);
        } */
        jQuery('#changeStatus').modal('show');
        jQuery('#pid').val(pid);
    }

    function openPopupSupportThem(pid, status, userId){
        /* if(userId == 0){
            window.location.href = "<?php echo get_site_url(); ?>/login";
        }else{
            jQuery('#supportThem').modal('show');
            jQuery('#id').val(pid);
        } */
        jQuery('#supportThem').modal('show');
        jQuery('#id').val(pid);
    }

    function openAddCollectionsPopup(categoryId,categoryName,userId){

        var geocoder = new google.maps.Geocoder();

        var input = document.getElementById('address1');
        var autocomplete = new google.maps.places.Autocomplete(input);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();
            var address = place.formatted_address;
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    jQuery("#lat").val(latitude);
                    jQuery("#lng").val(longitude);

                    console.log(latitude + "==" + longitude);
                }
            });
        });

        /* if(userId == 0){
            window.location.href = "<?php echo get_site_url(); ?>/login";
        } */

		jQuery('#categoryNameTitle').text(categoryName);
        jQuery('#hidcategoryId').val(categoryId);
        jQuery('#addCollections').modal('show');
        //google.maps.event.addDomListener(window, 'load', initialize);
        //initialize();
    }

    jQuery('#btn-submit-loader-support').css('display', 'none');

    jQuery('#btn-submit-support').on('click', function() {
        
		jQuery('#btn-submit-support').css('display', 'none');
        jQuery('#btn-submit-loader-support').css('display', '');
        var validation_flag = '1';
        
        var name = document.getElementById("name2").value;
        if (name === '') {
            jQuery("#error-name2").html("<span id='error-name2' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-name2").html("<span id='error-name2' style=''>" + "</span>");
        }

        var email = document.getElementById("email2").value;
        if (email == '') {
            jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
        }

        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(mailformat)) {
            jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
        } else {
            if (email != '') {
                jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "You have entered an invalid email address!</span>");
                var validation_flag = '0';
            }
        }

        var mobile_number = document.getElementById("phone_number2").value;
        if (mobile_number == '') {
            jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
        }

        var phoneformat = /^\d{10}$/;
        if (mobile_number.match(phoneformat)) {
            jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
        } else {
            if (mobile_number != '') {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                var validation_flag = '0';
            }
        }

        var desc = document.getElementById("desc2").value;
        if (desc == '') {
            jQuery("#error-desc2").html("<span id='error-desc2' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-desc2").html("<span id='error-desc2' style=''>" + "</span>");
        }

        jQuery("#name2").keyup(function() {
            var name = document.getElementById("name2").value;
            if (name != '') {
                jQuery("#error-name2").html("<span id='error-name2' style=''>" + "</span>");
            } else {
                var validation_flag = '0';
            }
        });

        jQuery("#email2").keyup(function() {
            var email = document.getElementById("email2").value;
            if (email == '') {
                jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email2").html("<span id='error-email2 style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#phone_number2").keyup(function() {
            var mobile_number = document.getElementById("phone_number2").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#desc2").keyup(function() {
            var desc2 = document.getElementById("desc2").value;
            if (desc2 == '') {
                jQuery("#error-desc2").html("<span id='error-desc2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-desc2").html("<span id='error-desc2' style=''>" + "</span>");
            }
        });

        if (validation_flag == '1') {

            //jQuery( "#frmChangeStatus" ).submit();
            var userId = jQuery('#userId').val();
            var id = jQuery('#id').val();
            var name = jQuery('#name2').val();
            var email = jQuery('#email2').val();
            var phone_number = jQuery('#phone_number2').val();
            var desc = jQuery('#desc2').val();
            var organization_name = jQuery('#organization_name').val();
            
            jQuery.ajax({
                type: "POST",
                url: '../support_them.php',
                data: 'userId='+userId+'&name='+name+'&email='+email+'&phone_number='+phone_number+'&id='+id+'&desc='+desc+'&organization_name='+organization_name,
                success: function(response)
                {
                    jQuery('#btn-submit-support').css('display', '');
                    jQuery('#btn-submit-loader-support').css('display', 'none');
                    jQuery('#supportThem').modal('hide');
                    bootbox.alert("Interest for Support registered, you will be notified shortly!", function(){ 
                        jQuery("#frm2")[0].reset();
                        window.location.reload(true);
                    });
                }
            });
        }else{
            jQuery('#btn-submit-support').css('display', '');
            jQuery('#btn-submit-loader-support').css('display', 'none');
        }
    });

    
    jQuery('.alert-success').css('display', 'none');
    jQuery('#btn-submit-loader').css('display', 'none');
    jQuery('#btn-submit-loader-food').css('display', 'none');

    jQuery('#btn-submit-food').on('click', function() {
        jQuery('#btn-submit-food').css('display', 'none');
        jQuery('#btn-submit-loader-food').css('display', '');
        var validation_flag = '1';
        
        var name = document.getElementById("name1").value;
        if (name === '') {
            jQuery("#error-name1").html("<span id='error-name1' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-name1").html("<span id='error-name1' style=''>" + "</span>");
        }

        var email = document.getElementById("email1").value;
        if (email == '') {
            jQuery("#error-email1").html("<span id='error-email1' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-email1").html("<span id='error-email1' style=''>" + "</span>");
        }

        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(mailformat)) {
            jQuery("#error-email1").html("<span id='error-email1' style=''>" + "</span>");
        } else {
            if (email != '') {
                jQuery("#error-email1").html("<span id='error-email1' style='color: red;'>" + "You have entered an invalid email address!</span>");
                var validation_flag = '0';
            }
        }

        var mobile_number = document.getElementById("phone_number1").value;
        if (mobile_number == '') {
            jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
        }

        var phoneformat = /^\d{10}$/;
        if (mobile_number.match(phoneformat)) {
            jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
        } else {
            if (mobile_number != '') {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                var validation_flag = '0';
            }
        }

        var address1 = document.getElementById("address1").value;
        if (address1 === '') {
            jQuery("#error-address1").html("<span id='error-address1' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-address1").html("<span id='error-address1' style=''>" + "</span>");
        }

        var desc1 = document.getElementById("desc1").value;
        if (desc1 === '') {
            jQuery("#error-desc1").html("<span id='error-desc1' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-desc1").html("<span id='error-desc1' style=''>" + "</span>");
        }

        jQuery("#name1").keyup(function() {
            var name = document.getElementById("name1").value;
            if (name != '') {
                jQuery("#error-name1").html("<span id='error-name1' style=''>" + "</span>");
            } else {
                var validation_flag = '0';
            }
        });

        jQuery("#email1").keyup(function() {
            var email = document.getElementById("email1").value;
            if (email == '') {
                jQuery("#error-email").html("<span id='error-email1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email").html("<span id='error-email1' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email1").html("<span id='error-email' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email1").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#phone_number1").keyup(function() {
            var mobile_number = document.getElementById("phone_number1").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#desc1").keyup(function() {
            var desc1 = document.getElementById("desc1").value;
            if (desc1 != '') {
                jQuery("#error-desc1").html("<span id='error-desc1' style=''>" + "</span>");
            } else {
                var validation_flag = '0';
            }
        });

        if (validation_flag == '1') {

            //jQuery( "#frmChangeStatus" ).submit();
            var categoryId = jQuery('#hidcategoryId').val();
            var name = jQuery('#name1').val();
            var email = jQuery('#email1').val();
            var phone_number = jQuery('#phone_number1').val();
            var address = jQuery('#address1').val();
            var desc = jQuery('#desc1').val();
            var latitude = jQuery('#lat').val();
            var longitude = jQuery('#lng').val();
            var userId = jQuery('#userId').val();

            jQuery.ajax({
                type: "POST",
                url: '../flood_crisis_data.php',
                data: 'categoryId='+categoryId+'&address='+address+'&name='+name+'&email='+email+'&phone_number='+phone_number+'&description='+desc+'&latitude='+latitude+'&longitude='+longitude+'&userId='+userId,
                success: function(response)
                {
                    jQuery('#btn-submit-food').css('display', '');
                    jQuery('#btn-submit-loader-food').css('display', 'none');
                    jQuery('#addCollections').modal('hide');
                    bootbox.alert("Record added successfully.", function(){ 
                        jQuery("#frm1")[0].reset();
                        window.location.reload(true);
                    });
                }
            });
        }else{
            jQuery('#btn-submit-food').css('display', '');
            jQuery('#btn-submit-loader-food').css('display', 'none');
        }
    });

    jQuery('#btn-submit').on('click', function() {
		jQuery('#btn-submit').css('display', 'none');
        jQuery('#btn-submit-loader').css('display', '');
        var validation_flag = '1';

        var name = document.getElementById("name").value;
        if (name === '') {
            jQuery("#error-name").html("<span id='error-name' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-name").html("<span id='error-name' style=''>" + "</span>");
        }

        var email = document.getElementById("email").value;
        if (email == '') {
            jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
        }

        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(mailformat)) {
            jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
        } else {
            if (email != '') {
                jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                var validation_flag = '0';
            }
        }

        var supportDetails = document.getElementById("supportDetails").value;
        if (supportDetails === '') {
            jQuery("#error-supportDetails").html("<span id='error-supportDetails' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-supportDetails").html("<span id='error-supportDetails' style=''>" + "</span>");
        }

        var mobile_number = document.getElementById("phone_number").value;
        if (mobile_number == '') {
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "This field is required.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
        }

        var phoneformat = /^\d{10}$/;
        if (mobile_number.match(phoneformat)) {
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
        } else {
            if (mobile_number != '') {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                var validation_flag = '0';
            }
        }

        jQuery("#name").keyup(function() {
            var name = document.getElementById("name").value;
            if (name != '') {
                jQuery("#error-name").html("<span id='error-name' style=''>" + "</span>");
            } else {
                var validation_flag = '0';
            }
        });

        jQuery("#email").keyup(function() {
            var email = document.getElementById("email").value;
            if (email == '') {
                jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#phone_number").keyup(function() {
            var mobile_number = document.getElementById("phone_number").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }
        });

        jQuery("#supportDetails").keyup(function() {
            var supportDetails = document.getElementById("supportDetails").value;
            if (supportDetails === '') {
                jQuery("#error-supportDetails").html("<span id='error-supportDetails' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-supportDetails").html("<span id='error-supportDetails' style=''>" + "</span>");
            }
        });

        if (validation_flag == '1') {

            //jQuery( "#frmChangeStatus" ).submit();
            var pid = jQuery('#pid').val();
            var userId = jQuery('#userId').val();
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var phone_number = jQuery('#phone_number').val();
            var supportDetails = jQuery('#supportDetails').val();

            jQuery.ajax({
                type: "POST",
                url: '../changefloodstatus.php',
                data: 'pid='+pid+'&supportDetails='+supportDetails+'&name='+name+'&email='+email+'&phone_number='+phone_number+'&userId='+userId,
                success: function(response)
                {
                    jQuery('#btn-submit').css('display', '');
                    jQuery('#btn-submit-loader').css('display', 'none');
                    jQuery('#changeStatus').modal('hide');
                    bootbox.alert("Status change successfully.", function(){ 
                       window.location.reload(true);
                    });
                }
            });
        }else{
            jQuery('#btn-submit').css('display', '');
            jQuery('#btn-submit-loader').css('display', 'none');
        }
    });
</script>