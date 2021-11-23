<?php
ob_start();

/**
 * Template Name: start Campaign
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Start Campaign | Zed</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>

<style>
  * {
    box-sizing: border-box;
  }

   body {
      background: #f2f2f2;
   }

  /*Copied from bootstrap to handle input file multiple*/
  .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
  }
  /*Also */
  .btn-success {
    border: 1px solid #c5dbec;
    background: #d0e5f5;
    font-weight: bold;
    color: #2e6e9e;
  }
  .fileinput-button {
    position: relative;
    overflow: hidden;
  }
  .fileinput-button input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    opacity: 0;
    -ms-filter: "alpha(opacity=0)";
    font-size: 200px;
    direction: ltr;
    cursor: pointer;
  }
  .thumb {
    height: 155px;
    width: 155px;
    /*border: 1px solid #000;*/
  }
  ul.thumb-Images li {
    width: 170px;
    /*float: left;*/
    display: inline-block;
    vertical-align: top;
    height: 180px;
  }
  .img-wrap {
    position: relative;
    display: inline-block;
    font-size: 0;
  }
  .img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #d0e5f5;
    padding: 4px 2px 2px;
    color: #000;
    font-weight: bolder;
    cursor: pointer;
    opacity: 0.5;
    font-size: 23px;
    line-height: 10px;
    border-radius: 50%;
  }
  .img-wrap:hover .close {
    opacity: 1;
    background-color: #ff0000;
  }
  .FileNameCaptionStyle {
    font-size: 12px;
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

  @media (max-width: 767px) {
     .drp1 {
          width: 30%;  
          padding-left: 10px;
     }
     button {
         width:100%;
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
</style>
<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$cookie_name = "actual_link";
$cookie_value = $actual_link;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<body>
  <!-- start preloader -->
  <div class="preloader1" style="display: none;">
  <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
  </div>
  <!-- end preloader -->

  <?php
  global $wpdb;
  $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes", ARRAY_A);
  $user = wp_get_current_user();
  if (empty($user->data->ID)) {
    // They're already logged in, so we bounce them back to the homepage.
    header("Location: " . home_url() . '/login');
  }
  ?>

  <form method="post" id="regForm" enctype="multipart/form-data" action="<?= BASE_URL ?>submitfundrais.php">

    <input type="hidden" value="<?php echo $user->data->ID; ?>" name="userId" />

    <h1 class="section_between_space">Tell us about your Campaign</h1>

    <!-- One "tab" for each step in the form: -->

    <div class="tab mainvalid">
      <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
        <select name="campaign_typeId" id="campaign_typeId" class="phonedropdown drp">
          <?php foreach ($result as $row) {
            ?>
            <option value="<?= $row["id"]; ?>"><?= $row["title"]; ?></option>
          <?php
          } ?>
        </select>
      </div>
      <p class="valid">
        <input placeholder="Campaign’s Target (How many lives will get the benefits of the campaign)" 
            oninput="this.className = ''" id="lives_count" name="lives_count" class="numberic_class" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
      </p>
      <p class="valid">
        <input placeholder="Address" name="address" oninput="this.className = ''" id="searchTextField">
      </p>

      <div class="contact-map" id="mapholder" style="width: 100%;  height: 300px;border-radius: 10px;">
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

          $.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {
            var mapCenter = new google.maps.LatLng(data.latitude, data.longitude);
            setMap(mapCenter, data.latitude, data.longitude, '');
          });

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
    </div>

    <div class="tab">

      <div id="campaign_typeId1" class="mainvalid">

        <div class="valid" style="display:inline-flex;width: 100%;">
          <select name="currency" class="phonedropdown drp1">
            <option value="INR">INR</option>
          </select>
          <input id="goal_amount" name="goal_amount" placeholder="How much do you want to raise?" type="number" class="numberic_class" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;">
        </div>

        <p class="valid"><input placeholder="Campaign Title" oninput="this.className = ''" name="fundraiser_title" maxlength="100"></p>

        <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
          <select name="user_type" id="user_type" class="phonedropdown drp">
            <option value="ngo">NGO</option>
            <option value="individual_person">Individual Person</option>
          </select>
        </div>

        <p class="ngodiv valid">
          <input placeholder="NGO Name" name="ngo_name" oninput="this.className = ''" maxlength="100">
        </p>

        <div class="individual_persondiv valid" style="display:none">

          <div class="col-lg-12 col-md-12 col-12" style="padding:0px;">
            <p><select name="individual_person" id="individual_person" class="phonedropdown drp">
                <option value="Myself">Myself</option>
                <option value="Family Member">Family Member</option>
                <option value="Friend">Friend</option>
                <option value="Pet or Animal">Pet or Animal</option>
              </select>
            </p>
          </div>
          <p>
            <input placeholder="Beneficiary Name" name="beneficiary_name" oninput="this.className = ''" maxlength="50">
          </p>
          <div class="col-lg-12 col-md-12 col-12" style="padding:0px;">
            <p><select name="cause" id="cause" class="phonedropdown drp">
                <option value="Medical help">Medical help</option>
                <option value="Educational help">Educational help</option>
                <option value="Empowerment help">Empowerment help</option>
                <option value="Shelter Homes">Shelter Homes</option>
                <option value="Rural Development">Rural Development</option>
                <option value="Sports Enablement">Sports Enablement</option>
                <option value="Natural Calamities">Natural Calamities</option>
                <option value="Rehabilitation">Rehabilitation</option>
              </select> </p>
          </div>

        </div>

      </div>

      <div id="campaign_typeId2" class="mainvalid" style="display:none">

        <p class="valid">
          <input type="text" id="item_name" maxlength="100" name="item_name" placeholder="Campaign Name">
        </p>

        <p class="valid">
          <input type="number" value="1" min="1" name="item_qty" placeholder="Item Quantity">
        </p>

        <p class="valid">
          <input type="text" id="location_of_need" name="location_of_need" placeholder="Location of the need">
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

      <div id="campaign_typeId3" class="mainvalid" style="display:none">

        <p class="valid">
          <input type="text" maxlength="100" name="product_name" placeholder="Product Name">
        </p>

        <p class="valid">
          <input type="number" name="product_qty" placeholder="Product Quantity">
        </p>

        <div class="valid" style="display:inline-flex;width: 100%;">
          <select name="currency" class="phonedropdown drp1">
            <option value="INR">INR</option>
          </select>
          <input type="text" id="product_price" name="product_price" placeholder="Product Price">
        </div>

        <p class="valid">
          <input type="text" id="product_location_of_need" name="product_location_of_need" placeholder="Location of the need">
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
      <?php
      //$start_date = date("Y-m-d");
      $start_date = date("Y-m-d",strtotime("+30 days"));
     // $date = strtotime($start_date);
      //$date = strtotime("+30 day", $start_date);
      ?>
      <p class="valid">
        <p>Campaign End Date</p> 
        <input type="date" value="<?= $start_date; ?>" placeholder="Campaign End Date" id="txtDate" name="end_date">
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

    <div class="tab mainvalid">

      <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px">
        <select name="img_type" id="img_type" class="phonedropdown drp">
          <option value="image">Image</option>
          <option value="video">Video</option>
        </select>
      </div>

      <!--<div style="text-align:center;" class="imagediv valid">
        <input onchange="readURL(this);" type="file" id="myFile" name="image">
        <p class="image-error" style="display:none;">Please use jpg/png images only</p>
        <img height="250" width="300" id="blah" src="<?php echo BASE_URL ?>fundraiserimg/sampleimg.png" alt="your image" />
        <input type="hidden" name="image_type" id="image_type" value="">
        <input type="hidden" name="image_type" id="image_size" value="">
      </div>

      <div class="videodiv valid" style="display:none;">
        <input type="text" id="youtubevideo" name="video" placeholder="Youtube video URL">
        </div>-->
      <div style="text-align:center;" class="imagediv valid">
      <span class="btn btn-success fileinput-button" >
            <span>Select Attachment</span>
            <input type="file" name="files[]" id="files"  multiple accept="image/jpeg, image/png, image/gif," required /><br />
        </span>
        <output id="Filelist"></output>
        <div id="hiddfiles"></div>    
        </div>
        <div class="videodiv valid" style="display:none;">
        <input type="text" id="youtubevideo" name="video" placeholder="Youtube video URL" required />
      </div>
    </div>

    <div class="tab mainvalid">
      <div class="">
        <textarea name="short_description" id="editor" oninput="this.className = ''" placeholder="Short description for your fundraiser"></textarea>
      </div>
      <p class="editor-error" style="display:none;">Please enter description!</p>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      </script>
       <div class="md-form mb-5" style="display: inline-flex;">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"> <p> I have read and agree to the <a href="https://zedaid.org/term-of-use/" target="_blank" >terms and conditions*</a></p>                                
                        </div>
    </div>

    <!-- <div class="back-home">
      <a class="tp-accountBtn" href="<?= BASE_URL ?>">
        <span class="">Back To Home</span>
      </a>
    </div> -->

    <div style="overflow:auto;">
      <div style="text-align:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>

  </form>

  <script>
    document.querySelector(".numberic_class").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
    });

    $(document).ready(function() {
      $("#editor1").css('display', 'none');
      $(window).keydown(function(event) {
        if (event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    });

//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);
//To save an array of attachments
var AttachmentArray = [];
//counter for attachment array
var arrCounter = 0;
//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;
//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";
function init() {
  //add javascript handlers for the file upload event
  document
    .querySelector("#files")
    .addEventListener("change", handleFileSelect, false);
}
//the handler for file upload event
function handleFileSelect(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;
  console.log("FILE _ COUNT == ",e.target.files.length);
  //To obtaine a File reference
  var files = e.target.files;
  //$('#files').val(files);

  console.log("FILES == ",files);

  $('#imgList').html('');
  
    var cnt = 0;
  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
      console.log("COUNT == ",cnt);

      console.log("INPUT: "+ files[i].name);

      /* var hiddfiles = '<input type="hidden" value="'+files[i].name+'" name="fname[]"><input type="hidden" value="'+files[i].type+'" name="ftype[]"><input type="hidden" value="'+files[i].size+'" name="fsize[]"><input type="hidden" value="'+files[i].tmp_name+'" name="ftmp_name[]">';
      jQuery('#hiddfiles').append(hiddfiles); */

      //console.log("FILES ARRAY == ",files[i]);
     
      cnt = cnt+1;
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();
    // Closure to capture the file information and apply validation.
    fileReader.onload = (function(readerEvt) {
      return function(e) {

        //var hiddfiles = '<input type="hidden" value="'+e.target.result+'" name="hiddfiles[]" id="hiddfiles" accept="image/jpeg, image/png, image/gif,"/>';
        //jQuery('#hiddfiles').append(hiddfiles);

        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt);
        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt);

        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt);
      };
    })(f);
    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files")
    .addEventListener("change", handleFileSelect, false);
}
//To remove attachment once user click on x button
jQuery(function($) {
  $("div").on("click", ".img-wrap .close", function() {
    var id = $(this)
      .closest(".img-wrap")
      .find("img")
      .data("id");
    //to remove the deleted item from array
    var elementPos = AttachmentArray.map(function(x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArray.splice(elementPos, 1);
    }
    //document.getElementById('files')
    //to remove image tag
    $(this)
      .parent()
      .find("img")
      .not()
      .remove();
    //to remove div tag that contain the image
    $(this)
      .parent()
      .find("div")
      .not()
      .remove();
    //to remove div tag that contain caption name
    $(this)
      .parent()
      .parent()
      .find("div")
      .not()
      .remove();
    //to remove li tag
    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
  });
});
//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions
  if (CheckFileType(readerEvt.type) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/gif files"
    );
    e.preventDefault();
    return;
  }
  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt.size) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 2 MB"
    );
    e.preventDefault();
    return;
  }
  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 5 files. According to upload conditions you can upload 5 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
}
//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/gif") {
    return true;
  } else {
    return false;
  }
  return true;
}
//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
  if (fileSize < 2000000) {
    return true;
  } else {
    return false;
  }
  return true;
}
//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 4) {
    return false;
  } else {
    return true;
  }
}
//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt) {
  
  var li = document.createElement("li");

  ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap"> <span class="close">&times;</span>' +
      '<img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/>' + "</div>"
  ].join("");
  var div = document.createElement("div");
  div.className = "FileNameCaptionStyle";
  li.appendChild(div);
  div.innerHTML = [readerEvt.name].join("");
  document.getElementById("Filelist").insertBefore(ul, null);
}
//Fill the array of attachment
function FillAttachmentArray(e, readerEvt) {
  AttachmentArray[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size
  };
  arrCounter = arrCounter + 1;
}

//end of file upload script
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
        $(".ngodiv").addClass("valid");
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

    $('body #campaign_typeId').change(function() {
      if ($(this).val() == '1') {
        $("#campaign_typeId1").css("display", "block");
        $("#campaign_typeId2").css("display", "none");
        $("#campaign_typeId3").css("display", "none");
        $("#campaign_typeId3").removeClass("mainvalid");
        $("#campaign_typeId2").removeClass("mainvalid");
        $("#campaign_typeId1").addClass("mainvalid");
      } else if ($(this).val() == '2') {
        $("#campaign_typeId2").css("display", "block");
        $("#campaign_typeId1").css("display", "none");
        $("#campaign_typeId3").css("display", "none");
        $("#campaign_typeId3").removeClass("mainvalid");
        $("#campaign_typeId1").removeClass("mainvalid");
        $("#campaign_typeId2").addClass("mainvalid");
      } else if ($(this).val() == '3') {
        $("#campaign_typeId3").css("display", "block");
        $("#campaign_typeId1").css("display", "none");
        $("#campaign_typeId2").css("display", "none");
        $("#campaign_typeId2").removeClass("mainvalid");
        $("#campaign_typeId1").removeClass("mainvalid");
        $("#campaign_typeId3").addClass("mainvalid");
      }
    });

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        console.log(currentTab);
        
        if(currentTab == 4){
          showTab(3);
        }

        // ... the form gets submitted:
        $("#nextBtn").prop('disabled', true);
        
        $("#editor1").css('display', 'block');
        $(".editor1").css('display', 'block');
        
        
        $(".preloader1").css('display', 'block');
        //document.getElementById("nextBtn").innerHTML = "<i class='fa fa-spinner fa-spin '></i> Processing";
        document.getElementById("regForm").submit();
        return false;
      }
      
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      console.log("Valid: "+currentTab);
      // This function deals with validation of the form fields
      var x, y, z, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      if(currentTab == 3){
        //z = document.getElementById("editor").value;
        var z = $('.ck-content').text();
        console.log("Valid: "+z);
        
        // If a field is empty...
        if (z == "") {
          var v = document.getElementById("editor");
          v.className += "invalid ";
          $(".editor-error").css("display","");
          valid = false;
        } else {
          var v = document.getElementById("editor");
          v.className += "";
          $(".editor-error").css("display","none");
          valid = true;
        }
      }

      
      /* z = x[3].getElementsByTagName("textarea"); */
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {

        if (!$(y[i]).closest('.mainvalid').is(':visible')) {} else {
          if (!$(y[i]).closest('.valid').is(':visible')) {} else {

            isyouTubeUrl = true;
            var youtubevideo = $("#youtubevideo").val(); //get the url from the input by the id url
            if (youtubevideo) {
              var _videoUrl = youtubevideo;
              var isyouTubeUrl = /((http|https):\/\/)?(www\.)?(youtube\.com)(\/)?([a-zA-Z0-9\-\.]+)\/?/.test(_videoUrl);
            }

            if (isyouTubeUrl == false) {

              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;

            } else {

              // If a field is empty...
              if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
              } else {
                valid = true;
              }

              /* if (z[i].value == "") {
                // add an "invalid" class to the field:
                z[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
              } else {
                valid = true;
              } */

            }
          }
        }

      }

      if(currentTab == 2){/*
        var image_type = $("#image_type").val();
        var videodiv1 = $("#youtubevideo").val();
        if(image_type == 0 && videodiv1 == 0){
          $("#myFile").addClass("invalid");
          $(".image-error").css("display","");
          valid = false;
        } else {
          valid = true;
          $(".image-error").css("display","none");
        }*/
    if(AttachmentArray.length==0){
      alert("please upload files"  );
      console.log("please upload files");
      valid = false;
    }else{
      console.log("AttachmentArray == ", AttachmentArray.length);
      valid = true;        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>
  <?php
  ob_flush();
  ?>
</body>

</html>
<?php
get_footer();