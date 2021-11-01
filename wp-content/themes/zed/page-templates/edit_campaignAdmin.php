<?php
/**
 * Template Name: Edit Campaign Admin
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
error_reporting(0);
get_header();
global $wpdb;
$user = wp_get_current_user();
if (empty($user->data->ID)) {
  // They're already logged in, so we bounce them back to the homepage.
  header("Location: " . home_url() . '/login');
}

$campaign_id = $_GET['id'];
$campaigns = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}campaigns WHERE status != 2  AND id = '" . $campaign_id . "' ORDER BY id DESC");
//$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE `status` = 1 AND admin_approved = 1 AND userId = '" . $userId . "' ORDER BY id DESC", ARRAY_A);

//$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");
$categories = $wpdb->get_row("SELECT * FROM wp_campaigns as scr RIGHT JOIN wp_campaigntypes as sc ON scr.campaign_typeId = sc.id WHERE scr.id = '".$campaign_id."'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="wpoceans">
  <title>Map | Zed</title>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

  <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>
  <style>
  .bootbox-body {
    text-align: center;
}
  button.bootbox-close-button.close {
   
     display: none !important;
}

.bootbox-body {
    text-align: center;
    font-size: large !important;
}
  .modal-footer {
      text-align:center;
  }
  .modal-footer .btn {
    margin-bottom: 0;
    margin-left: 5px;
    background-color: #337ab7 ;
    border-color: #2e6da4 ;
    padding: 10px 45px !important;
    font-size: medium !important;
}
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
    .para {
      color: #fff;
      margin: 0% 10%;
      background: #9e9e9ea1;
      padding: 20px;
      border-radius: 10px;
    }
    .tp-bg {
      background: url(https://zedaid.org/wp-content/uploads/2021/08/Customer_Attention.jpg);
      background-position: bottom;
      height: 400px;
    }
    .serach {
      display: inline-flex;
      width: 97%;
    }
    .gridview{
      box-shadow: 0px 1px 40px 0px rgb(40 63 116 / 10%);
      padding: 10px 20px;
      background: #fff;
      border-radius: 10px;
      width: 155% !important;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 10px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      margin-right: 29px;
      float: right;
      margin-top: -11%;
    }
    ul.register-now1 {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 0px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      float: right;
      border-top-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    .licause1 {
      margin-top: 3px !important;
      margin-bottom: 0 !important;
    }
    * {
      box-sizing: border-box;
    }
    body {
      background: #f2f2f2;
    }
    .licause {
      margin-top: 13px;
      margin-bottom: 20px;
    }
    a.btn.btn-default.btn-rounded.mb-4 {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
    }
    a.btn.btn-default.btn-rounded.mb-4.add {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 4px 19px;
      font-size: 14px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-left: 10px;
      border-radius: 0;
      margin-top: 0px;
    }
    .step1 {
    border: none;
    border-top: 3px double #333;
    color: #333;
    overflow: visible;
    text-align: center;
    height: 5px;
}

.step1:after {
    background: #fff;
    content: '§ Step 1';
    padding: 0 4px;
    position: relative;
    top: -13px;
}
    .step2 {
    border: none;
    border-top: 3px double #333;
    color: #333;
    overflow: visible;
    text-align: center;
    height: 5px;
}

.step2:after {
    background: #fff;
    content: '§ Step 2';
    padding: 0 4px;
    position: relative;
    top: -13px;
}
.step3 {
    border: none;
    border-top: 3px double #333;
    color: #333;
    overflow: visible;
    text-align: center;
    height: 5px;
}

.step3:after {
    background: #fff;
    content: '§ Step 3';
    padding: 0 4px;
    position: relative;
    top: -13px;
}



    .radiobtn{
      width: 8%;
      font-size: 15px;
      margin: 0px !important;
      padding-left: 20px;
      height: 25px;
      border-radius: 10px;
      border: none;
      background: none;
      box-shadow:none;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 45px;
      border-radius: 10px;
      width: 30%;
      text-align: center;
      font-size: 16px;
      margin-left: 13px;
      margin-bottom: 21px;
    }
    #regForm {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: "Hind Vadodara", sans-serif;
      padding: 40px;
      width: 70%;
      box-shadow:0px 14px 60px rgb(0 0 0 / 6%);
      margin-top: 12%;
      border-radius:10px;
      min-width: 300px;
      background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
      border-color: var(--ck-color-base-border);
      height: 200px;
    }
    h1 {
      text-align: center;
      font-weight: 500;
      margin-bottom: 30px !important;
    }
    input {
      padding: 10px;
      width: 100%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    textarea.invalid {
      background-color: #ffdddd;
    }
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    button {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
    }
    .modal-footer.d-flex.justify-content-center button {
      margin-top: 10px;
    }
    .modal-footer .btn {
    margin-bottom: 0;
    margin-left: 5px;
}
    .modal-footer.d-flex.justify-content-center {
    text-align: center;
}
    button.btn.btn-indigo:hover {
      color: #fff;
    }
    button:hover {
      opacity: 0.8;
    }
    #prevBtn {
      background-color: #bbbbbb;
    }
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    .step.active {
      opacity: 1;
    }
    a.tp-accountBtn {
      height: 40px;
      background: #fff;
      padding: 0px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-transform: capitalize;
      font-size: 14px;
      color: #000;
      border: 2px solid #3d3d8a;
      transition: all 0.4s ease-in-out 0s;
      border-radius: 10px;
      float: left;
      margin-top: 20px;
      text-decoration: none;
    }
    .back-home :hover {
      background: #3D3D8A;
      color: #fff;
    }
    .drp {
      padding: 10px;
      width: 100%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    .drp1 {
      padding: 10px;
      width: 15%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      margin-right: 12px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
      border-radius: var(--ck-border-radius);
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      height: 200px !important;
    }
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    .ck.ck-editor {
      position: relative;
      border-radius: 10px !important;
      margin: 50px 0px 50px 0px;
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;
    }
    th {
      background: #9e9e9e6e;
    }
    tr {
      background: #ddd;
    }
    tr:nth-child(even) {
      background-color: #fff;
    }
    .btn {
      margin-left: 0%;
    }
    .larges{
     width:75%;
   }
   
   .modal-header .close{
       display:none;
   }
   @media (max-width: 767px) {
       
       
       a.btn.btn-default.btn-rounded.mb-4 {
           padding:10px;
       }
       
       
       .licause {
           margin-right:6%;
       }
       .enddate {
    padding: 0px;
}
     .drp1 {
      width: 30%;  
      padding-left: 10px;
    }
    .larges{
     width:100%;
   }
   .btn {
    margin-left: 5%;
    background: none;
    border: none;
    }
    button {
      width:100%;
    }
    ul.register-now1 {
      width: 40%;
    }
    .bb{
        margin-bottom:18% !important;
        margin-left:-20%;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 54px;
      border-radius: 10px;
      width: 100%;
      text-align: center;
      font-size: 19px;
      margin-left: 0px;
    }
    }
      /* Piyush */
      .preloader1 {
        background-color: rgba(255,255,255,0.7);
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 1000;
      }
      #loading-image {
        position: absolute;
        top: 50%;
        left: 48%;
        z-index: 100;
      }
      .image-error{
        color: red;
      }
      .editor-error{
        color: red;
      }
      .col-lg-12.col-md-12.col-12.valid.space {
        margin: 15px;
      }
      textarea{
        padding: 10px;
        width: 100%;
        font-size: 15px;
        font-family: "Hind Vadodara", sans-serif;
        margin-bottom: 15px;
        padding-left: 20px;
        outline:none;
        border-radius: 10px;
        border: none;
        background: #fff;
        box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      }
      button.btn.btn-indigo {
        background: #3D3D8A;
        padding: 10px 45px;
        font-size: 17px;
      }
      .fa-send-o:before, .fa-paper-plane-o:before {
        content: "\f1d9";
        font-family: 'FontAwesome';
      }
      .fa-edit:before, .fa-pencil-square-o:before {
        content: "\f044";
        font-family: 'FontAwesome';
        font-size: 25px;
        font-style: normal;
        color: #3D3D8A;
      }
      .fa-trash:before {
        content: "\f1f8";
        font-family: 'FontAwesome';
        font-style: normal;
        font-size: 25px;
        margin-left: 17%;
        color: #f44336d6;
      }
      .modal-body {
        position: relative;
        padding: 15px;
        background: #cccccc4f;
        background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
      }
      .drop-zone {
        max-width: 100%;
        height: 50%;
        padding: 4% 4%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #cccccc;
        border: 4px dashed #3D3D8A;
        border-radius: 10px;
      }
      .modal-header .close {
        margin-top: -21px;
      }
      .drop-zone--over {
        border-style: solid;
      }
      .drop-zone__input {
        display: none !important;
      }
      .drop-zone__thumb {
        width: 100%;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
       background-size: contain;
      position: relative;
      background-repeat: no-repeat;
      background-position : center;
      }
      .drop-zone__thumb::after {
      display:none;
      }
      .fa-cloud-upload:before {
        content: "\f0ee";
        font-family: 'FontAwesome';
        font-style: normal;
        font-size: larger;
        color: #3D3D8A;
        margin-left: 20px;
      }

      .ck.ck-editor {
  
    margin: 20px 0px 40px 0px !important;
      }
      .regform
      {
        background-color: #ffffff;
        font-family: "Hind Vadodara", sans-serif;
        padding: 40px 20px;
        width: 100%;
        margin-top: 8% !important;
        margin: 0;
        box-shadow: 0px 14px 60px rgb(0 0 0 / 6%);
        border-radius: 10px;
        min-width: 300px;
        background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
        background-repeat: round;
      }
      .licause {
          margin-top: 10px;
          margin-bottom: 10px;
      }
      .new {
          display: inline-flex;
          width: 100%;
          justify-content: center;
      }
      .bb{
          margin-bottom:2%;
      }
      .modal {
        overflow-y:auto;
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
    <!-- start contact-pg-contact-section -->
    <section class="tp-blog-single-section section-pad" style="background: #eee;">
      <div class="container">
        <div class="row">
          <div class="widget search-widget ">
           
          </div>
          <div>
            <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
          </div>
        </div>
        <div class="col-md-8 bb"  style="margin-top: 2%;">
         
        </div>
        <div class="col-lg-12 regform" >
          <h1>Edit Campaign</h1>
          <form id="regform" method="post" class="tp-accountWrapper" action="<?=BASE_URL?>editCampAdmin.php" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="campaign_id" name="campaign_id" value="<?= $campaign_id;?>" >
          <input type="hidden" id="admin_approved" name="admin_approved" value="<?= $categories->admin_approved;?>" >
          <input type="hidden" id="zed_verified" name="zed_verified" value="<?= $categories->zed_verified;?>" >
          <input type="hidden" id="userId" name="userId" value="<?= $categories->userId;?>" >
          <input type="hidden" id="update_by" name="update_by" value="<?php echo $user->data->ID; ?>" >
          <input type="hidden" id="status" name="status" value="<?= $categories->status;?>" >

          <script>
              console.log(<?php echo $user->data->ID; ?>);
            </script>
          
          <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
          <hr class="step1" >
              <p>Campaign Type</p>
           <input type="hidden"
              id="campaign_typeId1" name="campaign_typeId1" value="<?= $categories->campaign_typeId;?>" >
 
     <select name="campaign_typeId" id="campaign_typeId" class="phonedropdown drp"  disabled>

                <option value="1" <?php if($categories->campaign_typeId=="1") echo 'selected="selected"'; ?>>Fundraiser</option>
                <option value="2" <?php if($categories->campaign_typeId=="2") echo 'selected="selected"'; ?>>Material donation</option>
                <option value="3" <?php if($categories->campaign_typeId=="3") echo 'selected="selected"'; ?>>Marketplace for charity products</option>
               
        </select>
  
  
  </div>  
            <div class="col-lg-13 col-md-12 col-12 valid" style="padding:0px;">
              <p>Campaign's Target</p>
              <input placeholder="How many lives will get the benefits of the campaign" 
            oninput="this.className = ''" id="lives_count" name="lives_count" value="<?= $categories->lives_count;?>" class="numberic_class" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
            </div> 
            <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
              <p>Campaign Address</p>
              <input placeholder="Address" name="address" value="<?= $categories->address;?>" oninput="this.className = ''" id="searchTextField">
              <div class="contact-map" id="mapholder" style="width: 100%;  height: 300px;border-radius: 10px;">
            </div>  
            </div> 
            <?php
      $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
      $results = (array) $results;

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
        function initialize() {

        

      //   $.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {
        //  var mapCenter = new google.maps.LatLng(data.latitude, data.longitude);
       //   setMap(mapCenter, data.latitude, data.longitude, '');
         
         
           latitude = <?= print $categories->latitude;?>;
           longitude = <?= print $categories->longitude;?>;

          var latlng = new google.maps.LatLng(latitude,longitude);
            // Set map options
            var myOptions = {
                zoom: 16,
                center: latlng,
                panControl: true,
                zoomControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
           
             // Create map object with options
             map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
          

             marker =  new google.maps.Marker({
		            	        position: new google.maps.LatLng(latitude, longitude),
		            	        map: map,
                          draggable:true,
                          animation: google.maps.Animation.DROP,
		            	    });


      /*  function addMarker(latLng, map) {
          marker =  new google.maps.Marker({
		            	        position: new google.maps.LatLng(latitude, longitude),
		            	        map: map,
                          draggable:true,
                          animation: google.maps.Animation.DROP,
		            	    });

            return marker;
        }*/



         //});

         

          var geocoder = new google.maps.Geocoder();

          var autocomplete = new google.maps.places.Autocomplete($("#searchTextField")[0], {});
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
              console.log(latitude);
             console.log(longitude);
             var map;
             map = new google.maps.Map(document.getElementById('mapholder'), {
			          center: mapCenter,
			          zoom: 16					
		        	});
              marker =  new google.maps.Marker({
		            	        position: new google.maps.LatLng(latitude, longitude),
		            	        map: map,
                          draggable:true,
                          animation: google.maps.Animation.DROP,
		            	    });


              google.maps.event.addListener(marker, 'dragend', function() 
              {
              geocodePosition(marker.getPosition());
              lat1 = this.getPosition().lat();
              long1 = this.getPosition().lng();

              console.log(lat1);
              console.log(long1);
              });

                function geocodePosition(pos) 
                {
                  geocoder = new google.maps.Geocoder();
                  geocoder.geocode
                    ({
                        latLng: pos
     
                    }, 
                        function(results, status) 
                        {
                            if (status == google.maps.GeocoderStatus.OK) 
                            {
                                $("#searchTextField").val(results[0].formatted_address);
                                $("#mapErrorMsg").hide(100);
                            } 
                            else 
                            {
                                $("#mapErrorMsg").html('Cannot determine address at this location.'+status).show(100);
                            }
                        }

                        
                    );
                }
              
            });
          });

        

        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function setMap(mapCenter, latitude = 0, longitude = 0, locations = '') {

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

              $shareurl = BASE_URL . 'campaign-detail/?id=' . $res['id'];

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

              $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
              $achieve_amount = 0;
              foreach ($resultsdonacc as $tt) {
                if ($tt['campaign_typeId'] == 3) {
                  $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
                } else {
                  $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                }
                $achieve_amount += $achieve_amountn;
              }
              
              $date1 = strtotime(date("Y-m-d"));
              $date2 = strtotime(date("Y-m-d", strtotime($res['end_date'])));
              if ($date1 > $date2) {
                $cstatus = "inactive";
                $btn = 'no';
              }else{
                $cstatus = "active";
              }
              
              if ($achieve_amount >= $goal_amount) {
                $cstatus = "inactive";
                $btn = 'no';
              } else {
                $btn = 'yes';
              }

              ?>['<a href="<?php echo $shareurl; ?>"><div class=""><img src="<?php echo $iimage; ?>" height="100" width="200" /></div><div class=""><?php echo $fundtitle; ?></div><div class="">Goal: <?php echo $currency . ' ' . $goal_amount; ?></div><div class=""><?= $btn == 'no' ? 'Closed' : 'Active'; ?></div></a>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['campaign_typeId']; ?>,12,'<?php echo $cstatus; ?>'],
            <?php } ?>
          ];
         
          var map = new google.maps.Map(document.getElementById('mapholder'), {
            zoom: 10,
            center: new google.maps.LatLng(latitude, longitude),
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
            
            // else {
            //     marker = new google.maps.Marker({
            //       position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            //       map: map
            //     });                
            // } 


            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }

        }
      </script>






<div class="col-lg-12 col-md-12 col-12" style="padding:10px">

<hr class="step2" >

<?php if ($categories->campaign_typeId=="1"){ ?>
      <div id="campaign_typeId1"  class="mainvalid" >
      <p>Goal Amount</p> 
        <div class="valid" style="display:inline-flex;width: 100%;">
       
          <select name="currency" class="phonedropdown drp1">
            <option value="INR">INR</option>
          </select>
          <input id="goal_amount" value="<?= $categories->goal_amount;?>" name="goal_amount"  placeholder="How much do you want to raise?" type="number"  class="numberic_class" value="<?= $categories->goal_amount;?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
        </div>

        <p class="valid">
        <p>Campaign Title</p> 
          <input placeholder="Campaign Title" value="<?= $categories->fundraiser_title;?>" oninput="this.className = ''"  name="fundraiser_title" maxlength="100"></p>

        <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
        <p>Select User Type</p> 
          <select name="user_type" id="user_type" class="phonedropdown drp">
            <option id="ngo" value="ngo" <?php if($categories->user_type=="ngo") echo 'selected="selected"'; ?>>NGO</option>
            <option id="individual_person" value="individual_person" <?php if($categories->user_type=="individual_person") echo 'selected="selected"'; ?>>Individual Person</option>
          </select>
        </div>
       
          <div class="ngodiv valid" <?php if ($categories->user_type == "individual_person"){?>style="display:none"<?php } ?> >
         <p>NGO Name</p> 
         <input placeholder="NGO Name" name="ngo_name" value="<?= $categories->ngo_name;?>" oninput="this.className = ''" maxlength="100"></div>
         
         
        
          <div class="individual_persondiv valid" <?php if ($categories->user_type == "ngo"){?>style="display:none"<?php } ?> >

          <div class="col-lg-12 col-md-12 col-12" style="padding:0px;">
          <p>Person</p> 
            <p><select name="individual_person" id="individual_person" class="phonedropdown drp" >
                <option value="Myself" <?php if($categories->individual_person=="Myself") echo 'selected="selected"'; ?>>Myself</option>
                <option value="Family Member" <?php if($categories->individual_person=="Family Member") echo 'selected="selected"'; ?>>Family Member</option>
                <option value="Friend" <?php if($categories->individual_person=="Friend") echo 'selected="selected"'; ?>>Friend</option>
                <option value="Pet or Animal" <?php if($categories->individual_person=="Pet or Animal") echo 'selected="selected"'; ?> >Pet or Animal</option>
              </select>
            </p>
          </div>
          <p>
          <p>Beneficiary Name</p> 
            <input placeholder="Beneficiary Name" name="beneficiary_name" value="<?= $categories->beneficiary_name;?>" oninput="this.className = ''" maxlength="50">
          </p>
          <div class="col-lg-12 col-md-12 col-12" style="padding:0px;">
          <p>Cause</p> 
            <p><select name="cause" id="cause" class="phonedropdown drp">
                <option value="Medical help" <?php if($categories->cause=="Medical help") echo 'selected="selected"'; ?>>Medical help</option>
                <option value="Educational help" <?php if($categories->cause=="Educational help") echo 'selected="selected"'; ?>>Educational help</option>
                <option value="Empowerment help" <?php if($categories->cause=="Empowerment help") echo 'selected="selected"'; ?>>Empowerment help</option>
                <option value="Shelter Homes" <?php if($categories->cause=="Shelter Homes") echo 'selected="selected"'; ?>>Shelter Homes</option>
                <option value="Rural Development" <?php if($categories->cause=="Rural Development") echo 'selected="selected"'; ?>>Rural Development</option>
                <option value="Sports Enablement" <?php if($categories->cause=="Sports Enablement") echo 'selected="selected"'; ?>>Sports Enablement</option>
                <option value="Natural Calamities" <?php if($categories->cause=="Natural Calamities") echo 'selected="selected"'; ?>>Natural Calamities</option>
                <option value="Rehabilitation" <?php if($categories->cause=="Rehabilitation") echo 'selected="selected"'; ?>>Rehabilitation</option>
              </select> </p>
          </div>

        </div>
        

      </div>



  
      <?php } elseif($categories->campaign_typeId=="2"){ ?>
      <div id="campaign_typeId2" class="mainvalid"  >

        <p class="valid">
        <p>Item Name</p> 
          <input type="text" id="item_name" maxlength="100" value="<?= $categories->item_name;?>" name="item_name" placeholder="Campaign Name">
        </p>

        <p class="valid">
        <p>Item Quantity</p> 
          <input type="number" min="1" name="item_qty" value="<?= $categories->item_qty;?>" placeholder="Item Quantity">
        </p>

        <p class="valid">
        <p>Location of Need</p> 
          <input type="text" id="location_of_need" name="location_of_need" value="<?= $categories->location_of_need;?>" placeholder="Location of the need">
        </p>

        <script>
          function initialize2() {

            var geocoder = new google.maps.Geocoder();

            var autocomplete = new google.maps.places.Autocomplete($("#location_of_need")[0], {});
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
                }
              });
            });

          }
          google.maps.event.addDomListener(window, 'load', initialize2);
        </script>

      </div>


      <?php } else {?>


      <div id="campaign_typeId3"  class="mainvalid" >

        <p class="valid">
        <p>Product Name</p> 
          <input type="text" maxlength="100" name="product_name" value="<?= $categories->product_name;?>" placeholder="Product Name">
        </p>

        <p class="valid">
        <p>Product Quantity</p> 
          <input type="number" name="product_qty" value="<?= $categories->product_qty;?>" placeholder="Product Quantity">
        </p>
        <p>Product Price</p> 
        <div class="valid" style="display:inline-flex;width: 100%;">
          <select name="currency" class="phonedropdown drp1">
            <option value="INR">INR</option>
          </select>
          <input type="text" id="product_price" name="product_price" value="<?= $categories->product_price;?>" placeholder="Product Price">
        </div>

        <p class="valid">
        <p>Location of Need</p> 
          <input type="text" id="product_location_of_need" value="<?= $categories->product_location_of_need;?>" name="product_location_of_need" placeholder="Location of the need">
        </p>

        <script>
          function initialize3() {

            var geocoder = new google.maps.Geocoder();

            var autocomplete = new google.maps.places.Autocomplete($("#product_location_of_need")[0], {});
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
                }
              });
            });

          }
          google.maps.event.addDomListener(window, 'load', initialize3);
        </script>

      </div>
      <?php } ?>

      <?php
      $end_date = date("Y-m-d");
      //$date = strtotime($end_date);
      //$date = strtotime("+7 day", $date);
      ?>
      <p class="valid">
        <p>Campaign End Date</p> 
        <input type="date" value="<?= $categories->end_date;?>" placeholder="Campaign End Date" id="txtDate" name="end_date">
      </p>

      <script>
        $(function() {
          var dtToday = new Date();

          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if (month < 10)
            month = '0' + month.toString();
          if (day < 10)
            day = '0' + day.toString();

          var maxDate = year + '-' + month + '-' + day;
          $('#txtDate').attr('min', maxDate);
        });
      </script>

    </div>


  
  <div class="col-lg-12 col-md-12 col-12" style="padding:0px">
  <hr class="step3" >
              <p>Short Description</p>
              <textarea name="short_description" id="editor" oninput="this.className = ''" placeholder="Short description for your fundraiser"><?=$categories->short_description; ?></textarea>

            </div>
            <script>
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      </script>

<div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px">
        <select name="img_type" id="img_type" class="phonedropdown drp">
          <option value="image" <?php if($categories->img_type =="image") echo 'selected="selected"'; ?>>Image</option>
          <option value="video" <?php if($categories->img_type == "video") echo 'selected="selected"'; ?>>Video</option>
        </select>
      </div>

            <div class="imagediv valid" <?php if ($categories->img_type == "video"){?>style="display:none"<?php } ?>>
              <div class="drop-zone">
                <span class="drop-zone__prompt"> <img src="<?= BASE_URL?>/fundraiserimg/<?= $categories->image; ?>" width="150"></span>
                <input type="file" name="myFile" id="myFile1" class="drop-zone__input" style="opacity: 0;"> <!-- style="display: none;" -->
                <!-- <input type="hidden" name="banner_img" id="banner_img" value=""> -->
              </div>
            </p>
          </div>

          <div class="videodiv valid" <?php if ($categories->img_type =="image"){?>style="display:none"<?php } ?>>
        <input type="text" id="youtubevideo" name="video" value="<?= $categories->video;?>" placeholder="Youtube video URL">
      </div>

          <script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");
        dropZoneElement.addEventListener("click", (e) => {
          inputElement.click();
        });
        inputElement.addEventListener("change", (e) => {
          if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
          }
        });
        dropZoneElement.addEventListener("dragover", (e) => {
          e.preventDefault();
          dropZoneElement.classList.add("drop-zone--over");
        });
        ["dragleave", "dragend"].forEach((type) => {
          dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
          });
        });
        dropZoneElement.addEventListener("drop", (e) => {
          e.preventDefault();
          if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
          }
          dropZoneElement.classList.remove("drop-zone--over");
        });
        });
        /**
        * Updates the thumbnail on a drop zone element.
        *
        * @param {HTMLElement} dropZoneElement
        * @param {File} file
        */
        function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
          dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }
        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
          thumbnailElement = document.createElement("div");
          thumbnailElement.classList.add("drop-zone__thumb");
          dropZoneElement.appendChild(thumbnailElement);
        }
        thumbnailElement.dataset.label = file.name;
        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
          const reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            //$('#banner_img').val(reader.result);
          };
        } else {
          thumbnailElement.style.backgroundImage = null;
        }
      }
      </script>

        </form>

 
      </div>
         <div class="licause " style="text-align: center;">
            <a href="javascript:void(0)" class="btn btn-default btn-rounded mb-4 openBtn" onclick="editCampaign()">Update Campaign</a>
        </div>
        <div class="new">
          <div class="licause " style="text-align: center;margin-right: 3%;">
              <?php if($categories->status == 1) {?> 
              <a href="#deactivateCampaign" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FCCE15;">Deactivate Campaign</a>
              <?php } else { ?>
              <a href="#activateCampaign" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FCCE15;">Activate Campaign</a>
              <?php } ?>
          </div>
          <div class="licause " style="text-align: center;">
              <a href="#deleteCampaign" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FB360E;">Delete Campaign</a>
          </div>
        </div> 
    </div>
      </div>   
  </div> <!-- end container -->         
  </div>

  <div class="modal fade" id="deactivateCampaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Deactivate Campaign</h4>
                <button type="button" class="close stopService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to deactivate this campaign?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close stopService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="deactivateCampaign('<?= $campaign_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>

  <div class="modal fade" id="activateCampaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Activate Campaign</h4>
                <button type="button" class="close resumeService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to activate this campaign?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close resumeService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="activateCampaign('<?= $campaign_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>

  <div class="modal fade" id="deleteCampaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Delete Campaign</h4>
                <button type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to delete this campaign?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="deleteCampaign('<?= $campaign_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>
  
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
  <script>
    // document.querySelector(".numberic_class").addEventListener("keypress", function (evt) {
    //     if (evt.which != 8 && evt.which != 0 && evt.which <script 48 || evt.which > 57)
    //     {
    //         evt.preventDefault();
    //     }
    // });
   


    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(input.files[0].type);
        if(input.files[0].type == 'image/jpeg' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/png' || input.files[0].type == 'image/PNG' || input.files[0].type == 'image/JPG'){
          $("#myFile").removeClass("invalid");
          $("#image_type").val("1");
          $(".image-error").css("display","none");
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $('#category_image').val(e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
          
        }else{
          /* invalid */
          $("#myFile").addClass("invalid");
          $("#image_type").val("0");
          valid = false;
          return false;
        }
      }
    }

    $('body #img_type').change(function() {
      if ($(this).val() == 'image') {
        $(".imagediv").css("display", "block");
        $(".videodiv").css("display", "none");
        $(".videodiv").removeClass("valid");
       
      } else {
        $(".videodiv").css("display", "block");
        $(".imagediv").css("display", "none");
        $(".imagediv").removeClass("valid");
        $(".videodiv").addClass("valid");
      }
    });
    
  

   

$('body #user_type').change(function() {
      if ($(this).val() == 'ngo') {
        $(".ngodiv").css("display", "block");
        $(".individual_persondiv").css("display", "none");
        $(".individual_persondiv").removeClass("valid");
        $(".ngodiv").addClass("valid");
      } else {
        $(".individual_persondiv").css("display", "block");
        $(".ngodiv").css("display", "none");
        $(".ngodiv").removeClass("valid");
        $(".individual_persondiv").addClass("valid");
      }
    });
        
       
  


    function editCampaign(){
      $('form#regform').submit();
    }

    function deactivateCampaign(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../deactivatecamp.php',
          data: 'campaign_id='+s_id,
          success: function(response)
          {
              jQuery('#deactivateCampaign').modal('hide');
              bootbox.alert("Campaign deactivated successfully.", function(){ 
                  window.location.reload(true);
              });
          }
      });
    }

    function activateCampaign(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../activatecamp.php',
          data: 'campaign_id='+s_id,
          success: function(response)
          {
              jQuery('#activateCampaign').modal('hide');
              bootbox.alert("Campaign activated successfully.", function(){ 
                  window.location.reload(true);
              });
          }
      });
    }

    function deleteCampaign(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../delete_campaign.php',
          data: 'campaign_id='+s_id,
          success: function(response)
          {
              jQuery('#deleteCampaign').modal('hide');
              bootbox.alert("Campaign deleted successfully.", function(){ 
                window.location.href='../my-account';
              });
          }
      });
    }

    function getImg(){
      var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');
      $('#icon-pin-src').attr('src',icon_img);
    }
  </script>
</body>
</html>
<?php
get_footer();
