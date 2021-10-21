<?php /* Template Name: Covid detail Browse Fundraiser Location Page */ ?>

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
    }

    /* Main content */
    .main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 17px; /* Increased text to enable scrolling */
    padding: 0px 10px;
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


                <div class="tp-blog-sidebar">
                    <div class="widget category-widget">
                        <div>
                            <div class="bor">
                                <input type="checkbox" value="1" class="custom-control-input covidid" id="covidid1" 
                                name="covidid" /> <label class="custom-control-label " for="covidid1">
                                <img src="https://zedaid.org/wp-content/uploads/2021/04/hospital.png" width="20" height="20" /> Covid Hospital 
                                <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSfR0ZsMu09XUge0pGt9aVvZWtSozgu8clMkxJPgsJ8tO_xIZQ/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a>
                                </label></div>
                            <div class="bor line_spacing_top_15"><input type="checkbox" value="2" class="custom-control-input covidid" id="covidid2" name="covidid" /> <label class="custom-control-label " for="covidid2"><img src="https://zedaid.org/wp-content/uploads/2021/04/injection.png" width="20" height="20" /> Remdesivir Injection <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdJLHyM_ABs6TGDKq4YlPY4Xt8RKek2HaLK-7EpZZOlNVfICg/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label></div>
                            <div class="bor line_spacing_top_15"><input type="checkbox" value="3" class="custom-control-input covidid" id="covidid3" name="covidid" /> <label class="custom-control-label " for="covidid3"><img src="https://zedaid.org/wp-content/uploads/2021/04/plasma.png" width="20" height="20" /> Plasma <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSesttYE86RQjK9TpCJDi-TtDWtNlZAydxex2C2hqylWhzFJvQ/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label></div>
                            <div class="bor line_spacing_top_15"><input type="checkbox" value="4" class="custom-control-input covidid" id="covidid4" name="covidid" /> <label class="custom-control-label " for="covidid4"><img src="https://zedaid.org/wp-content/uploads/2021/04/oxygen-tank.png" width="20" height="20" /> Oxygen Cylinder <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdDS0SZ_XOLkK8dG-9ACOPRQCXZv2sjKAXa3my7n0rht0g_yA/viewform?usp=sf_link" target="_blank"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label></div>
                        </div>
                    </div>
                </div>
             
                <div class="tp-blog-sidebar legendstextdesktop">
                    <div class="widget category-widget" id="service_status">

                        <label style="font-size: 18px;"><b>Legends</b></label>

                        <div class="row">
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="1" class="service_status">
                                <img src="https://zedaid.org/wp-content/uploads/2021/04/available.png" />
                                <label style="font-size: 15px;display: inline;">Available</label>
                            </div>
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="2" class="service_status">
                                <img src="https://zedaid.org/wp-content/uploads/2021/04/to_be_available.png" />
                                <label style="font-size: 15px;display: inline;">To be Available</label>
                            </div>
                            <div class="col-md-12 line_spacing_top_15">
                                <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="3" class="service_status">
                                <img src="https://zedaid.org/wp-content/uploads/2021/04/not_available.png" />
                                <label style="font-size: 15px;display: inline;">Not Available</label>
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

                <div id="mapholder2" class="d-none" style="width: 100%; height: 500px; position: relative; overflow: hidden;">
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
                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="1" class="service_status1">
                        <img style="width: 16px;" src="https://zedaid.org/wp-content/uploads/2021/04/available.png" />
                        <label style="font-size: 15px;display: inline;">Available</label>
                        
                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="2" class="service_status1">
                        <img style="width: 16px;" src="https://zedaid.org/wp-content/uploads/2021/04/to_be_available.png" />
                        <label style="font-size: 15px;display: inline;">To be Available</label>

                        <input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="3" class="service_status1">
                        <img style="width: 16px;" src="https://zedaid.org/wp-content/uploads/2021/04/not_available.png" />
                        <label style="font-size: 15px;display: inline;">Not Available</label>
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
            global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails", ARRAY_A);
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
                                $title = $res['title'];
                                $status = $res['status'];
                                $categoryName = $res['categoryName'];

                                //$categoryName = '<span style="color:#2EC4F7 !important; float: left;">' . $res['categoryName'] . '</span> <span style="color:#2EC4F7 !important; float: right;cursor: pointer;"><a href="#" class="btn" style="color:#3d3d8a !important;" onclick="openPopup('.$pid.','.$status.');">Change Status</a></span>';

                                $categoryName = '<span style="color:#3d3d8a !important; float: left;">' . $res['categoryName'] . '</span>';
                                
                                if ($status == 1) {
                                    $categoryName .= '<br><span>Current Status: Available</span>';
                                }else if($status == 2){
                                    $categoryName .= '<br><span>Current Status: To Be Available</span>';
                                }else{
                                    $categoryName .= '<br><span>Current Status: Not Available</span>';
                                }

                                //$lastUpdated = '<br><span style="color:black !important;">Last Updated: ' . date("d M Y h:i A", strtotime($res['updatedAt'])).'</span>';
                                $zed_verified = $res['zed_verified'];
                                $last_status_updated_id = $res['last_status_updated_id'];
                                $results2 = $wpdb->get_results("SELECT * FROM wp_status_update_users WHERE id = '$last_status_updated_id' LIMIT 1", ARRAY_A);
                                if(!empty($results2)){
                                    if ($zed_verified == 1) {
                                        $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b> <br><b>Zedaid verified:</b> Yes' ;
                                    }else{
                                        $verified_by = ' | Updated By: <b>'.$results2[0]['name'].'</b> <br><b>Zedaid verified:</b> No' ;
                                    }
                                }else{
                                    if ($zed_verified == 1) {
                                        $verified_by = '<br><b>Zedaid verified:</b> Yes';
                                    }else{
                                        $verified_by = '<br><b>Zedaid verified:</b> No';
                                    }
                                }
                                $results = (array) $results;

                                $title1 = $title;

                                $lastUpdated = '<span style="color:black !important; font-size: 14px;">Last Updated: ' . date("d M Y h:i A", strtotime("+330 minutes", strtotime($res['updatedAt']))) . $verified_by . '</span>';

                                $chnageStatusBtn = '<input type="hidden" id="status-title-'.$pid.'" value="'.$title.'"><br><br><button type="button" class="btn btn-next" onclick="openPopup('.$pid.','.$status.');">Change Status</button>';

                                if ($res['categoryId'] == 1) {

                                    $mstatus = $res['status'];

                                    ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Bed: <?php echo $res['bed']; ?><br>Bed with oxygen: <?php echo $res['oxygen']; ?><br>Bed with ventilator: <?php echo $res['ventilator']; ?><br><br>Location: <?php echo $res['location']; ?><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?></a><?php $mstatus != 3 ? '' : ''; ?><br><?= $lastUpdated.$chnageStatusBtn; ?></div><br>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 2) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Qty: <?php echo $res['quantity']; ?><br><br>Location: <?php echo $res['location']; ?><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?></a><?php $mstatus != 3 ? '' : ''; ?><br><?= $lastUpdated.$chnageStatusBtn; ?></div><br>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 3) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Gender: <?php echo $res['gender']; ?><br>Blood Group: <?php echo $res['bloodGroup']; ?><br>Eligible date: <?php echo date("d F Y", strtotime($res['coronaEligibleDate'])); ?><br><br>Location: <?php echo $res['location']; ?><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?></a><?php $mstatus != 3 ? '' : ''; ?><br><?= $lastUpdated.$chnageStatusBtn; ?></div><br>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 4) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Qty: <?php echo $res['quantity']; ?><br><br>Location: <?php echo $res['location']; ?><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?></a><?php $mstatus != 3 ? '' : ''; ?><br><?= $lastUpdated.$chnageStatusBtn; ?></div><br>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                            <?php }
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


                            if (locations[i][3] == 1) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_not_available.png',
                                        map: map
                                    });
                                }
                            } else if (locations[i][3] == 2) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_to_be_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_not_available.png',
                                        map: map
                                    });
                                }

                            } else if (locations[i][3] == 3) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_not_available.png',
                                        map: map
                                    });
                                }
                            } else if (locations[i][3] == 4) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_not_available.png',
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
                        console.log("Covid Clicked");
                        //showLoadingBar();
                        var rid = '';
                        if (jQuery(this).val() == 1) {
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                        }

                        if (jQuery(this).val() == 2) {
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                        }

                        if (jQuery(this).val() == 3) {
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                        }

                        if (jQuery(this).val() == 4) {
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                        }

                        console.log(rid);
                        // return false;
                        if (this.checked) {

                            if (jQuery(this).val() == 1) {
                                rid = rid + ',1';
                            }

                            if (jQuery(this).val() == 2) {
                                rid = rid + ',2';
                            }

                            if (jQuery(this).val() == 3) {
                                rid = rid + ',3';
                            }

                            if (jQuery(this).val() == 4) {
                                rid = rid + ',4';
                            }

                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid
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

                                        if (locations[i][3] == 1) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_not_available.png',
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

                                    hideLoadingBar();
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
                                url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid
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

                                        if (locations[i][3] == 1) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_not_available.png',
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

                                    hideLoadingBar();
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
                                    
                        console.log("Id: "+selected.join(",")); 

                        jQuery.ajax({
                            type: "POST",
                            url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
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

                                    if (locations[i][3] == 1) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_not_available.png',
                                                map: map
                                            });
                                        }
                                    } else if (locations[i][3] == 2) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                map: map
                                            });
                                        }

                                    } else if (locations[i][3] == 3) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_not_available.png',
                                                map: map
                                            });
                                        }
                                    } else if (locations[i][3] == 4) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_not_available.png',
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

                                //hideLoadingBar();
                            }
                        });

                    });

                    jQuery('.service_status1').click(function() {
                        var type="status";

                        var selected = new Array();
                        jQuery("#service_status1 input[type=checkbox]:checked").each(function () {
                            selected.push(this.value);
                        });
                                    
                        console.log("Id: "+selected.join(",")); 

                        jQuery.ajax({
                            type: "POST",
                            url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
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

                                    if (locations[i][3] == 1) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/hospital_not_available.png',
                                                map: map
                                            });
                                        }
                                    } else if (locations[i][3] == 2) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/injection_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                map: map
                                            });
                                        }

                                    } else if (locations[i][3] == 3) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/plasma_not_available.png',
                                                map: map
                                            });
                                        }
                                    } else if (locations[i][3] == 4) {
                                        if (locations[i][4] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_available.png',
                                                map: map
                                            });
                                        } else if (locations[i][4] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                map: map
                                            });
                                        } else {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'https://zedaid.org/wp-content/uploads/2021/04/oxygen_not_available.png',
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

                                //hideLoadingBar();
                            }
                        });

                    });
                });
            </script>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Disclaimer : ZedAid is extending helping hand in providing availability information of various Covid support requirements. Users are requested to check the authenticity of the contacts given before proceeding (be aware of scammers, fraudsters, black marketers)</p>
            </div>
        </div>

        <div class="text-center">
            <button type="button" id="links" class="btn enquire-btn" data-toggle="modal" data-target="#myModal2" style="background: #3d3d8a; color: white;">
                Useful Links
            </button>

            <button type="button" id="contacts" class="btn enquire-btn2" data-toggle="modal" data-target="#myModal3" style="background: #3d3d8a; color: white;">
                Useful Contacts
            </button>
        </div>

        <?php 
            $userId = get_current_user_id();
        ?>
        <!-- Usefull Links Modal -->
        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2"><b>Useful Links</b></h4>
                    </div>

                    <div class="modal-body">
                        
                        <!-- <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                        </div> -->

                        <button class="tablinks" style="display:none;" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        
                        <div class="sidenav">
                            <?php 
                            global $wpdb;
                            $hospitals1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='1' AND `location` != 'PAN india' group by `location`", ARRAY_A);
                            
                            $hospitals2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='1' AND `location` = 'PAN india' group by `location`", ARRAY_A);
                            
                            if (count($hospitals1)>0 || count($hospitals2) > 0) {
                                
                                if (!empty($hospitals1) && !empty($hospitals2)) {
                                    $hospitals = aasort($hospitals1, 'location');
                                    $hospitals = array_merge($hospitals2, $hospitals1);
                                }else if(empty($hospitals1) && !empty($hospitals2)){
                                    $hospitals = $hospitals2;
                                }else{
                                    $hospitals = aasort($hospitals1, 'location');
                                }

                                ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Covid Hospital</button>                            
                            <div class="dropdown-container">
                                <?php foreach ($hospitals as $h) {?>
                                    <a href="#" onclick="openCity(event, '<?php echo $h['location'].'-Covid Hospital'; ?>')"><?php echo $h['location']; ?></a>
                                <?php } ?>
                            </div>

                            <?php
                            }
                            $injection1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='2' AND `location` != 'PAN india' group by `location`", ARRAY_A);
                            
                            $injection2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='2' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($injection1)>0 || count($injection2) > 0) {
                                
                                if (!empty($injection1) && !empty($injection2)) {
                                    $injection = aasort($injection1, 'location');
                                    $injection = array_merge($injection2, $injection1);
                                }else if(empty($injection1) && !empty($injection2)){
                                    $injection = $injection2;
                                }else{
                                    $injection = aasort($injection1, 'location');
                                }

                            ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Remdesivir Injection</button>
                            <div class="dropdown-container">
                                <?php foreach ($injection as $i) {?>
                                    <a href="#" onclick="openCity(event, '<?php echo $i['location'].'-Remdesivir Injection'; ?>')"><?php echo $i['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $plasma1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='3' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $plasma2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='3' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($plasma1)>0 || count($plasma2) > 0) {
                                
                                if (!empty($plasma1) && !empty($plasma2)) {
                                    $plasma = aasort($plasma1, 'location');
                                    $plasma = array_merge($plasma2, $plasma1);
                                }else if(empty($plasma1) && !empty($plasma2)){
                                    $plasma = $plasma2;
                                }else{
                                    $plasma = aasort($plasma1, 'location');
                                }

                            ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Plasma</button>
                            <div class="dropdown-container">
                                <?php foreach ($plasma as $p) {?>
                                    <a href="#" onclick="openCity(event, '<?php echo $p['location'].'-Plasma'; ?>')"><?php echo $p['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $cylinder1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='4' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $cylinder2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='4' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($cylinder1)>0 || count($cylinder2) > 0) {
                                
                                if (!empty($cylinder1) && !empty($cylinder2)) {
                                    $cylinder = aasort($cylinder1, 'location');
                                    $cylinder = array_merge($cylinder2, $cylinder1);
                                }else if(empty($cylinder1) && !empty($cylinder2)){
                                    $cylinder = $cylinder2;
                                }else{
                                    $cylinder = aasort($cylinder1, 'location');
                                }
                            ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Oxygen Cylinder</button>
                            <div class="dropdown-container">
                                <?php foreach($cylinder as $c){?>
                                    <a href="#" onclick="openCity(event, '<?php echo $c['location'].'-Oxygen Cylinder'; ?>')"><?php echo $c['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php } ?>

                        </div>

                        <!-- <select class="js-example-basic-multiple-limit" onchange="openCity(event, this.value)">
                            <?php 
                            global $wpdb;
                            $hospitals1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='1' AND `location` != 'PAN india' group by `location`", ARRAY_A);
                            
                            $hospitals2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='1' AND `location` = 'PAN india' group by `location`", ARRAY_A);
                            
                            if (count($hospitals1)>0 || count($hospitals2) > 0) {
                                
                                if (!empty($hospitals1) && !empty($hospitals2)) {
                                    $hospitals = aasort($hospitals1, 'location');
                                    $hospitals = array_merge($hospitals2, $hospitals1);
                                }else if(empty($hospitals1) && !empty($hospitals2)){
                                    $hospitals = $hospitals2;
                                }else{
                                    $hospitals = aasort($hospitals1, 'location');
                                }
                            ?>
                            <optgroup label="Covid Hospital" data-select2-id="638">
                                <?php foreach ($hospitals as $h) {?>
                                    <option value="<?php echo $h['location'].'-Covid Hospital'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $h['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $injection1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='2' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $injection2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='2' AND `location` = 'PAN india' group by `location`", ARRAY_A);
                            
                            if (count($injection1)>0 || count($injection2) > 0) {
                                
                                if (!empty($injection1) && !empty($injection2)) {
                                    $injection = aasort($injection1, 'location');
                                    $injection = array_merge($injection2, $injection1);
                                }else if(empty($injection1) && !empty($injection2)){
                                    $injection = $injection2;
                                }else{
                                    $injection = aasort($injection1, 'location');
                                }
                            ?>
                            <optgroup label="Remdesivir Injection" data-select2-id="684">
                                <?php foreach ($injection as $i) {?>
                                    <option value="<?php echo $i['location'].'-Remdesivir Injection'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $i['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $plasma1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='3' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $plasma2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='3' AND `location` = 'PAN india' group by `location`", ARRAY_A);
                            
                            if (count($plasma1)>0 || count($plasma2) > 0) {
                                
                                if (!empty($plasma1) && !empty($plasma2)) {
                                    $plasma = aasort($plasma1, 'location');
                                    $plasma = array_merge($plasma2, $plasma1);
                                }else if(empty($plasma1) && !empty($plasma2)){
                                    $plasma = $plasma2;
                                }else{
                                    $plasma = aasort($plasma1, 'location');
                                }
                            ?>
                            <optgroup label="Plasma" data-select2-id="628">
                                <?php foreach ($plasma as $p) {?>
                                    <option value="<?php echo $p['location'].'-Plasma'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $p['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $cylinder1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='4' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $cylinder2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='4' AND `location` = 'PAN india' group by `location`", ARRAY_A);
                            
                            if (count($cylinder1)>0 || count($cylinder2) > 0) {
                                
                                if (!empty($cylinder1) && !empty($cylinder2)) {
                                    $cylinder = aasort($cylinder1, 'location');
                                    $cylinder = array_merge($cylinder2, $cylinder1);
                                }else if(empty($cylinder1) && !empty($cylinder2)){
                                    $cylinder = $cylinder2;
                                }else{
                                    $cylinder = aasort($cylinder1, 'location');
                                }
                            ?>
                            <optgroup label="Oxygen Cylinder" data-select2-id="618">
                                <?php foreach ($cylinder as $c) {?>
                                    <option value="<?php echo $c['location'].'-Oxygen Cylinder'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $c['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>
                            
                        </select> -->

                        <?php 
                            global $wpdb;
                            $categories = $wpdb->get_results("SELECT * FROM wp_covidcategories WHERE id IN (1,2,3,4)", ARRAY_A);
                        ?>

                        <select class="js-example-basic-multiple-limit form-control" onchange="getCities(event, this.value, 'link')">
                            <option value="0">Select Category</option>
                            <?php foreach ($categories as $val) {?>
                                <option value="<?php echo $val['id']?>"><?php echo $val['title']; ?></option>
                            <?php } ?>
                        </select>

                        <p class="city-dropdown">
                        </p>

                        <div class="main">
                            <?php foreach ($hospitals as $h) {?>
                                <div id="<?php echo $h['location'].'-Covid Hospital'; ?>" class="tabcontent">          
                                    <?php 
                                    $listoflinks = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='1' AND `location` = '".$h['location']."' order by like_count DESC");
                                    foreach($listoflinks as $rec){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <a href="<?= $rec->link; ?>" target="_blank"><?= $rec->link; ?></a> 
                                                <?php if(!empty($rec->comments)){?>
                                                <br>
                                                <?= $rec->comments;
                                                }
                                                ?>
                                            </p>

                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec->id; ?>,1,<?= $rec->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec->id; ?>"><?= $rec->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec->id; ?>,0,<?= $rec->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec->id; ?>"><?= $rec->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach ($injection as $i) {?>
                                <div id="<?php echo $i['location'].'-Remdesivir Injection'; ?>" class="tabcontent">          
                                    <?php 
                                    $listoflinks1 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='2' AND `location` = '".$i['location']."' order by like_count DESC");
                                    foreach($listoflinks1 as $rec1){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><a href="<?= $rec1->link; ?>" target="_blank"><?= $rec1->link; ?></a> <?php if(!empty($rec1->comments)){?>
                                                <br>
                                                <?= $rec1->comments;
                                                }
                                                ?>
                                            </p>
                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec1->id; ?>,1,<?= $rec1->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec1->id; ?>"><?= $rec1->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec1->id; ?>,0,<?= $rec1->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec1->id; ?>"><?= $rec1->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach ($plasma as $p) {?>
                                <div id="<?php echo $p['location'].'-Plasma'; ?>" class="tabcontent">          
                                    <?php 
                                    $listoflinks2 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='3' AND `location` = '".$p['location']."' order by like_count DESC");
                                    foreach($listoflinks2 as $rec2){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><a href="<?= $rec2->link; ?>" target="_blank"><?= $rec2->link; ?></a> 
                                            <?php if(!empty($rec2->comments)){?>
                                                <br>
                                                <?= $rec2->comments;
                                                }
                                                ?>
                                            </p>

                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec2->id; ?>,1,<?= $rec2->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec2->id; ?>"><?= $rec2->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec2->id; ?>,0,<?= $rec2->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec2->id; ?>"><?= $rec2->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach($cylinder as $c) {?>
                                <div id="<?php echo $c['location'].'-Oxygen Cylinder'; ?>" class="tabcontent">          
                                    <?php 
                                    $listoflinks3 = $wpdb->get_results("SELECT * FROM wp_usefull_links WHERE category='4' AND `location` = '".$c['location']."' order by like_count DESC");
                                    foreach($listoflinks3 as $rec3){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><a href="<?= $rec3->link; ?>" target="_blank"><?= $rec3->link; ?></a>
                                            <?php if(!empty($rec3->comments)){?>
                                                <br>
                                                <?= $rec3->comments;
                                                }
                                                ?>
                                            </p>

                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec3->id; ?>,1,<?= $rec3->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec3->id; ?>"><?= $rec3->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'link', <?= $rec3->id; ?>,0,<?= $rec3->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec3->id; ?>"><?= $rec3->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->

        <!-- Usefull Contacts Modal -->
        <div class="modal right fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel3"><b>Useful Contacts</b></h4>
                    </div>

                    <div class="modal-body">
                        
                        <!-- <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                        </div> -->
                        <button class="tablinks" style="display:none;" onclick="openCity1(event, 'London')" id="defaultOpen1">London</button>
                        <div class="sidenav">
                            <!-- <a href="#about" onclick="openCity(event, 'London')" id="defaultOpen">Covid Hospital</a>
                            <a href="#services" onclick="openCity(event, 'Paris')">Remdesivir Injection</a>
                            <a href="#clients" onclick="openCity(event, 'Tokyo')">Plasma</a> -->
                            <?php 
                            global $wpdb;
                            $hospitals1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='1' AND `location` != 'PAN india' group by `location`", ARRAY_A);
                            
                            $hospitals2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='1' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($hospitals1)>0 || count($hospitals2) > 0) {
                                
                                if (!empty($hospitals1) && !empty($hospitals2)) {
                                    $hospitals = aasort($hospitals1, 'location');
                                    $hospitals = array_merge($hospitals2, $hospitals1);
                                }else if(empty($hospitals1) && !empty($hospitals2)){
                                    $hospitals = $hospitals2;
                                }else{
                                    $hospitals = aasort($hospitals1, 'location');
                                }
                                ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Covid Hospital</button>
                            <div class="dropdown-container">
                                <?php foreach ($hospitals as $h) {?>
                                    <a href="#" onclick="openCity1(event, '<?php echo $h['location'].'-Covid Hospital1'; ?>')"><?php echo $h['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $injection1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='2' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $injection2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='2' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($injection1)>0 || count($injection2) > 0) {
                                
                                if (!empty($injection1) && !empty($injection2)) {
                                    $injection = aasort($injection1, 'location');
                                    $injection = array_merge($injection2, $injection1);
                                }else if(empty($injection1) && !empty($injection2)){
                                    $injection = $injection2;
                                }else{
                                    $injection = aasort($injection1, 'location');
                                }
                                ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Remdesivir Injection</button>
                            <div class="dropdown-container">
                                <?php foreach ($injection as $i) {?>
                                    <a href="#" onclick="openCity1(event, '<?php echo $i['location'].'-Remdesivir Injection1'; ?>')"><?php echo $i['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $plasma1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='3' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $plasma2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='3' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($plasma1)>0 || count($plasma2) > 0) {
                                
                                if (!empty($plasma1) && !empty($plasma2)) {
                                    $plasma = aasort($plasma1, 'location');
                                    $plasma = array_merge($plasma2, $plasma1);
                                }else if(empty($plasma1) && !empty($plasma2)){
                                    $plasma = $plasma2;
                                }else{
                                    $plasma = aasort($plasma1, 'location');
                                }
                                ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Plasma</button>
                            <div class="dropdown-container">
                                <?php foreach ($plasma as $p) {?>
                                    <a href="#" onclick="openCity1(event, '<?php echo $p['location'].'-Plasma1'; ?>')"><?php echo $p['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $cylinder1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='4' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $cylinder2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='4' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($cylinder1)>0 || count($cylinder2) > 0) {
                                
                                if (!empty($cylinder1) && !empty($cylinder2)) {
                                    $cylinder = aasort($cylinder1, 'location');
                                    $cylinder = array_merge($cylinder2, $cylinder1);
                                }else if(empty($cylinder1) && !empty($cylinder2)){
                                    $cylinder = $cylinder2;
                                }else{
                                    $cylinder = aasort($cylinder1, 'location');
                                }
                            ?>
                            <button class="dropdown-btn"><i class="fa fa-plus"></i> Oxygen Cylinder</button>
                            <div class="dropdown-container">
                                <?php foreach($cylinder as $c){?>
                                    <a href="#" onclick="openCity1(event, '<?php echo $c['location'].'-Oxygen Cylinder1'; ?>')"><?php echo $c['location']; ?></a>
                                <?php } ?>
                            </div>
                            <?php } ?>

                        </div>

                        <!-- <select class="js-example-basic-multiple-limit" onchange="openCity1(event, this.value)">
                            <?php 
                            global $wpdb;
                            $hospitals1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='1' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $hospitals2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='1' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($hospitals1)>0 || count($hospitals2) > 0) {
                                
                                if (!empty($hospitals1) && !empty($hospitals2)) {
                                    $hospitals = aasort($hospitals1, 'location');
                                    $hospitals = array_merge($hospitals2, $hospitals1);
                                }else if(empty($hospitals1) && !empty($hospitals2)){
                                    $hospitals = $hospitals2;
                                }else{
                                    $hospitals = aasort($hospitals1, 'location');
                                }
                            ?>
                            <optgroup label="Covid Hospital" data-select2-id="638">
                                <?php foreach ($hospitals as $h) {?>
                                    <option value="<?php echo $h['location'].'-Covid Hospital1'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $h['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $injection1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='2' AND `location` != 'PAN india' group by `location`", ARRAY_A);
                            $injection2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='2' AND `location` = 'PAN india' group by `location`", ARRAY_A);

                            if (count($injection1)>0 || count($injection2) > 0) {
                                
                                if (!empty($injection1) && !empty($injection2)) {
                                    $injection = aasort($injection1, 'location');
                                    $injection = array_merge($injection2, $injection1);
                                }else if(empty($injection1) && !empty($injection2)){
                                    $injection = $injection2;
                                }else{
                                    $injection = aasort($injection1, 'location');
                                }
                            ?>
                            <optgroup label="Remdesivir Injection" data-select2-id="684">
                                <?php foreach ($injection as $i) {?>
                                    <option value="<?php echo $i['location'].'-Remdesivir Injection1'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $i['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $plasma1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='3' AND `location` != 'PAN india' group by `location`", ARRAY_A);

                            $plasma2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='3' AND `location` = 'Pan India' group by `location`", ARRAY_A);

                            if (count($plasma1)>0 || count($plasma2) > 0) {
                                
                                if (!empty($plasma1) && !empty($plasma2)) {
                                    $plasma = aasort($plasma1, 'location');
                                    $plasma = array_merge($plasma2, $plasma1);
                                }else if(empty($plasma1) && !empty($plasma2)){
                                    $plasma = $plasma2;
                                }else{
                                    $plasma = aasort($plasma1, 'location');
                                }
                            ?>
                            <optgroup label="Plasma" data-select2-id="628">
                                <?php foreach ($plasma as $p) {?>
                                    <option value="<?php echo $p['location'].'-Plasma1'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $p['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>

                            <?php 
                            $cylinder1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='4' AND `location` != 'Pan India' group by `location`", ARRAY_A);
                            
                            $cylinder2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='4' AND `location` = 'Pan India' group by `location`", ARRAY_A);

                            if (count($cylinder1)>0 || count($cylinder2) > 0) {
                                
                                if (!empty($cylinder1) && !empty($cylinder2)) {
                                    $cylinder = aasort($cylinder1, 'location');
                                    $cylinder = array_merge($cylinder2, $cylinder1);
                                }else if(empty($cylinder1) && !empty($cylinder2)){
                                    $cylinder = $cylinder2;
                                }else{
                                    $cylinder = aasort($cylinder1, 'location');
                                }
                            ?>
                            <optgroup label="Oxygen Cylinder" data-select2-id="618">
                                <?php foreach ($cylinder as $c) {?>
                                    <option value="<?php echo $c['location'].'-Oxygen Cylinder1'; ?>" data-select2-id="<?php echo $c->id; ?>"><?php echo $c['location']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>
                            
                        </select> -->

                        <?php 
                            global $wpdb;
                            $categories = $wpdb->get_results("SELECT * FROM wp_covidcategories WHERE id IN (1,2,3,4)", ARRAY_A);
                        ?>

                        <select class="js-example-basic-multiple-limit form-control" onchange="getCities(event, this.value, 'contact')">
                            <option value="0">Select Category</option>
                            <?php foreach ($categories as $val) {?>
                                <option value="<?php echo $val['id']?>"><?php echo $val['title']; ?></option>
                            <?php } ?>
                        </select>

                        <p class="city-dropdown1">
                        </p>

                        <div class="main">
                            <?php foreach ($hospitals as $h) {?>
                                <div id="<?php echo $h['location'].'-Covid Hospital1'; ?>" class="tabcontent1">          
                                    <?php 
                                    $listoflinks = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='1' AND `location` = '".$h['location']."' order by like_count DESC");
                                    foreach($listoflinks as $rec){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><b>Name:</b> <?= $rec->contactName; ?></p>
                                            <p class="card-text"><b>Mobile Number:</b> <a herf="tel:<?= $rec->contactNumber; ?>"><?= $rec->contactNumber; ?></a></p>
                                            
                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec->id; ?>,1,<?= $rec->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec->id; ?>"><?= $rec->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec->id; ?>,0,<?= $rec->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec->id; ?>"><?= $rec->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach ($injection as $i) {?>
                                <div id="<?php echo $i['location'].'-Remdesivir Injection1'; ?>" class="tabcontent1">          
                                    <?php 
                                    $listoflinks1 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='2' AND `location` = '".$i['location']."' order by like_count DESC");
                                    foreach($listoflinks1 as $rec1){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><b>Name:</b> <?= $rec1->contactName; ?></p>
                                            <p class="card-text"><b>Mobile Number:</b> <a herf="tel:<?= $rec1->contactNumber; ?>"><?= $rec1->contactNumber; ?></a></p>
                                            
                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec1->id; ?>,1,<?= $rec1->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec1->id; ?>"><?= $rec1->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec1->id; ?>,0,<?= $rec1->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec1->id; ?>"><?= $rec1->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach ($plasma as $p) {?>
                                <div id="<?php echo $p['location'].'-Plasma1'; ?>" class="tabcontent1">          
                                    <?php 
                                    $listoflinks2 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='3' AND `location` = '".$p['location']."' order by like_count DESC");
                                    foreach($listoflinks2 as $rec2){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><b>Name:</b> <?= $rec2->contactName; ?></p>
                                            <p class="card-text"><b>Mobile Number:</b> <a herf="tel:<?= $rec2->contactNumber; ?>"><?= $rec2->contactNumber; ?></a></p>
                                            
                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec2->id; ?>,1,<?= $rec2->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec2->id; ?>"><?= $rec2->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec2->id; ?>,0,<?= $rec2->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec2->id; ?>"><?= $rec2->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php foreach($cylinder as $c) {?>
                                <div id="<?php echo $c['location'].'-Oxygen Cylinder1'; ?>" class="tabcontent1">          
                                    <?php 
                                    $listoflinks3 = $wpdb->get_results("SELECT * FROM wp_usefull_contacts WHERE category='4' AND `location` = '".$c['location']."' order by like_count DESC");
                                    foreach($listoflinks3 as $rec3){
                                    ?>
                                    <div class="card" style="width: 100%; margin-top: 10px;">
                                        <div class="card-body">
                                            <p class="card-text"><b>Name:</b> <?= $rec3->contactName; ?></p>
                                            <p class="card-text"><b>Mobile Number:</b> <a herf="tel:<?= $rec3->contactNumber; ?>"><?= $rec3->contactNumber; ?></a></p>
                                            
                                            <button class="like" title="Like" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec3->id; ?>,1,<?= $rec3->like_count; ?>)">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"> <span class="like<?= $rec3->id; ?>"><?= $rec3->like_count; ?></span></i> 
                                            </button>
                                            <button class="dislike" title="Dislike" onclick="likedislike(<?= $userId; ?>, 'contact', <?= $rec3->id; ?>,0,<?= $rec3->deslike_count; ?>)">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"> <span class="deslike<?= $rec3->id; ?>"><?= $rec3->dislike_count; ?></span></i> 
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            
                        </div>
                    </div>

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->

        <!-- Toggle the status: -->
        <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="formreset()">&times;</button>
                        <h4 class="modal-title text-center" id="categoryNameTitle">Change Status</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmChangeStatus" action="<?php echo BASE_URL ?>changestatus.php" enctype="multipart/form-data" method="post" class="f1">
                            <input type="hidden" value="" name="userId" />
                            <input type="hidden" value="" name="pid" id="pid"/>
                            <input type="hidden" value="" name="type" id="type"/>
                            
                            <!-- <h3 id="status-title"></h3>
                            <h3 id="curr-status"></h3> -->
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div style="color:#3d3d8a" id="status-title"></div>
                                </div>
                                <div class="col-md-12 col-xs-12" style="font-size: 15px;">
                                    <span>Current Status:</span> <span id="curr-status"></span>
                                </div>
                            </div>
                            
                            <h4></h4>
                            <div class="mainvalid">
                                <div class="form-group valid">
                                    <label class="lbform">Change Status</label>

                                    <select class="form-control status-available" id="statusid" name="statusid">
                                        <option value="0">Select Status</option>
                                        <option value="2">To be Available</option>
                                        <option value="3">Not Available</option>
                                    </select>

                                    <select class="form-control status-tobeavailable" id="statusid" name="statusid">
                                        <option value="0">Select Status</option>
                                        <option value="1">Available</option>
                                        <option value="3">Not Available</option>
                                    </select>

                                    <select class="form-control status-notavailable" id="statusid" name="statusid">
                                        <option value="0">Select Status</option>
                                        <option value="1">Available</option>
                                        <option value="2">To be Available</option>
                                    </select>

                                    <span id="error-status"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Name</label>
                                    <input type="text" id="name" value="" name="name" placeholder="Enter Name" class="form-control">
                                    <span id="error-name"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Email</label>
                                    <input type="text" id="email" value="" name="email" placeholder="Enter Email" class="form-control">
                                    <span id="error-email"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Phone Number</label>
                                    <input type="text" id="phone_number" value="" name="phone_number" placeholder="Enter Phone Number" class="form-control">
                                    <span id="error-mobile_number"></span>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js
"></script>
<script>

    jQuery('.status-available').css('display','none');
    jQuery('.status-tobeavailable').css('display','none');
    jQuery('.status-notavailable').css('display','none');

    function formreset(){
        jQuery("#statusid").val("0");
        jQuery("#name").val("");
        jQuery("#email").val("");
        jQuery("#phone_number").val("");
        jQuery("#frmChangeStatus")[0].reset();

        jQuery("#error-name").html("<span id='error-name' style=''></span>");
        jQuery("#error-email").html("<span id='error-email' style=''></span>");
        jQuery("#error-status").html("<span id='error-status' style=''></span>");
        jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''></span>");
    }

    jQuery('body').click(function (event) 
    {
        if(!jQuery(event.target).closest('#changeStatus').length && !jQuery(event.target).is('#changeStatus')) {
            jQuery("#statusid").val("0");
            jQuery("#name").val("");
            jQuery("#email").val("");
            jQuery("#phone_number").val("");
            jQuery("#frmChangeStatus")[0].reset();

            jQuery("#error-name").html("<span id='error-name' style=''></span>");
            jQuery("#error-email").html("<span id='error-email' style=''></span>");
            jQuery("#error-status").html("<span id='error-status' style=''></span>");
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''></span>");
        }     
    });

    function openPopup(pid, status){
        jQuery('#changeStatus').modal('show');

        jQuery('#pid').val(pid);
        var status_title = jQuery('#status-title-'+pid).val();
        
        jQuery('#status-title').text(status_title);
        
        console.log("status: "+status);

        if(status == 1){

            console.log("STATUS 1");

            jQuery('.status-available').css('display','block');
            jQuery('.status-tobeavailable').css('display','none');
            jQuery('.status-notavailable').css('display','none');

            jQuery('#curr-status').text("Available");
        }else if(status == 2){
            console.log("STATUS 2");
            jQuery('.status-available').css('display','none');
            jQuery('.status-tobeavailable').css('display','block');
            jQuery('.status-notavailable').css('display','none');

            jQuery('#curr-status').text("To Be Available");
        }else{
            console.log("ELSE");
            jQuery('.status-available').css('display','none');
            jQuery('.status-tobeavailable').css('display','none');
            jQuery('.status-notavailable').css('display','block');

            jQuery('#curr-status').text("Not Available");
        }
    }

    jQuery('.alert-success').css('display', 'none');
    jQuery('#btn-submit-loader').css('display', 'none');

    jQuery('#btn-submit').on('click', function() {
		/* if(jQuery('#frmChangeStatus').valid()){
            
        } */
        
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

        var statusid = document.getElementById("statusid").value;
        if (statusid === '0') {
            jQuery("#error-status").html("<span id='error-status' style='color: red;'>" + "Please select status.</span>");
            var validation_flag = '0';
        } else {
            jQuery("#error-status").html("<span id='error-status' style=''>" + "</span>");
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

        jQuery("#statusid").change(function() {
            var statusid = document.getElementById("statusid").value;
            if (statusid === '') {
                jQuery("#error-status").html("<span id='error-status' style='color: red;'>" + "Please select status.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-status").html("<span id='error-status' style=''>" + "</span>");
            }
        });

        if (validation_flag == '1') {

            //jQuery( "#frmChangeStatus" ).submit();
            var pid = jQuery('#pid').val();
            var statusid = jQuery('#statusid').val();
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var phone_number = jQuery('#phone_number').val();

            jQuery.ajax({
                type: "POST",
                url: '../changestatus.php',
                data: 'pid='+pid+'&statusid='+statusid+'&name='+name+'&email='+email+'&phone_number='+phone_number,
                success: function(response)
                {
                    jQuery('#btn-submit').css('display', '');
                    jQuery('#btn-submit-loader').css('display', 'none');

                    //jQuery('.alert-success').css('display', 'block');
                    //alert("Status change successfully.");
                    //jQuery('#successmsg').modal('show');
                    bootbox.alert("Status change successfully.", function(){ 
                        window.location.reload(true);
                    });

                    /* location.reload('<?= BASE_URL?>/covid-detail'); */
                    
                    console.log(response);
                    jQuery('#changeStatus').modal('hide');

                    jQuery("#statusid").val("0");
                    jQuery("#name").val("");
                    jQuery("#email").val("");
                    jQuery("#phone_number").val("");
                    jQuery("#frmChangeStatus")[0].reset();
                }
            });
        }else{
            jQuery('#btn-submit').css('display', '');
            jQuery('#btn-submit-loader').css('display', 'none');
        }
    });

    function likedislike(userId, type, usefullDataId, isLike, totcount){
        if(userId == 0){
            if (type == 'link') {
                jQuery('#myModal2').modal().hide();
            }else{
                jQuery('#myModal3').modal().hide();
            }
            window.location.href = "<?php echo get_site_url(); ?>/login";
        }

        if (type == 'link') {
            var t = parseInt(totcount)+parseInt(1);
            if(isLike == 1){
                jQuery('.like'+usefullDataId).text(t);
            }else{
                jQuery('.dislike'+usefullDataId).text(t);
            }
        }

        jQuery.ajax({
            type: "POST",
            url: '../likedislike.php',
            data: 'userId='+userId+'&type='+type+'&usefullDataId='+usefullDataId+'&isLike='+isLike,
            success: function(response)
            {
                console.log(response);
                if (response != "failed")
                {
                    /* if(isLike == 1){
                        jQuery('.like'+usefullDataId).text(response);
                    }else{
                        jQuery('.dislike'+usefullDataId).text(response);
                    } */
                }
            }
        });
    }

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    function openCity(evt, cityName) {
        jQuery('.dropdown-container a').removeClass(' active');

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


    function openCity1(evt, cityName) {
        jQuery('.dropdown-container a').removeClass('active');
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent1");
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

    document.getElementById("defaultOpen1").click();

    
    function getCities2222(id, type) {
        jQuery('#loadingdiv' + id).css('display', '');
        jQuery('#acceptdivmain' + id).css('display', 'none');
        jQuery.ajax({
            type: "POST",
            url: '../adminchangestatus.php',
            data: 'categoryId='+categoryId+'&type='+type,
            success: function(response)
            {
                console.log(response);
                if (response != "failed")
                {
                    if(type == 'link'){
                        jQuery('.city-dropdown').html(response);
                    }else{
                        jQuery('.city-dropdown1').html(response);
                    }
                }
            }
        });
    }

    function getCities(evt, categoryId, type) {
        document.getElementById("defaultOpen").click();
        document.getElementById("defaultOpen1").click();
        jQuery.ajax({
            type: "POST",
            url: '../getcities.php',
            data: 'categoryId='+categoryId+'&type='+type,
            success: function(response)
            {
                console.log(response);
                if (response != "failed")
                {
                    if(type == 'link'){
                        jQuery('.city-dropdown').html(response);
                    }else{
                        jQuery('.city-dropdown1').html(response);
                    }
                }
            }
        });
    }
</script>