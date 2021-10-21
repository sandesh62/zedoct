<?php
/**
 * Template Name: Material Donation Test
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="wpoceans">
  <title>Donate Now TEST | Zed</title>
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

  <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<body>
  <?php
  global $wpdb, $user_ID;

  $userId = $user_ID;
  $user_info = get_userdata($userId);
  $new_user_data = get_user_meta($userId);
  
  if ($new_user_data['first_name'][0]) {
      $first_name = $new_user_data['first_name'][0];
  } else {
      $first_name = $new_user_data['first_name'][1];
  }
  if ($new_user_data['last_name'][0]) {
      $last_name = $new_user_data['last_name'][0];
  } else {
      $last_name = $new_user_data['last_name'][1];
  }

  if (isset($new_user_data['xoo_ml_phone_no'][0])) {
      $phoneNumber = $new_user_data['xoo_ml_phone_no'][0];
  } else {
      $phoneNumber = $new_user_data['phone_number'][1];
  }

  if (isset($new_user_data['billing_email'][0])) {
      $email = $new_user_data['billing_email'][0];
  } else {
      $email = $new_user_data['email'][1];
  }

  ?>
  <!-- start preloader -->
  <!-- <div class="preloader">
    <div class="sk-folding-cube">
      <div class="sk-cube1 sk-cube"></div>
      <div class="sk-cube2 sk-cube"></div>
      <div class="sk-cube4 sk-cube"></div>
      <div class="sk-cube3 sk-cube"></div>
    </div>
  </div> -->
  <div class="preloader1" style="display: none;">
  <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
  </div>
  <!-- end preloader -->
  <div class="tp-login-area sec-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <?php
          $id = $_GET['id'];
          $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
          $res = $results[0];
          $campaign_typeId = $res->campaign_typeId;
          if ($res->campaign_typeId == 2) {
            $fundtitle = $res->item_name;
            $goal_amount = $res->item_qty;
            $currency = 'QTY';
          } else if ($res->campaign_typeId == 3) {
            $fundtitle = $res->product_name;
            $goal_amount = $res->product_price * $res->product_qty;
            $currency = $res->currency;
          } else {
            $fundtitle = $res->fundraiser_title;
            $goal_amount = $res->goal_amount;
            $currency = $res->currency;
          }
          ?>
          <form enctype="multipart/form-data" method="post" id="form1" class="tp-accountWrapper">
            <input type="hidden" id="campaign_Id" value="184" name="campaign_Id" />
            <input type="hidden" id="campaign_typeId" value="1" name="campaign_typeId" />
            <div class="tp-accountInfo">
                  <div class="tp-accountInfoHeader">
                      <!-- <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a> -->
                      <!-- <a class="tp-accountBtn" href="register.html">
                              <span class="">Create Account</span>
                          </a> -->
                  </div>
                  <div class="image">
                      <img src="<?php echo bloginfo('template_directory'); ?>/images/login.png" alt="">
                  </div>
                  <div class="back-home">
                      <a class="tp-accountBtn" href="<?= BASE_URL ?>">
                          <span class="">Back To Home</span>
                      </a>
                  </div>
              </div>
            <div class="tp-accountForm form-style">
              <div class="fromTitle">
                <h2>Donation</h2>
              </div>
              <div class="row">
                <div class=""></div>
                <div class="col-lg-12 col-md-12 col-12 hr">
                  <input type="text" id="fullName" name="fullName" value="<?= $first_name." ".$last_name; ?>" placeholder="Enter Full Name" class="hr-top">
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                  <input type="checkbox" id="anonymous" name="anonymous" value="1">
                  <label style="margin-left:25px;" for="anonymous">Anonymous</label>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                  <input type="text" id="emailId" name="emailId" value="<?= $email; ?>" placeholder="Enter Email">
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                  <input type="text" id="phonenumber" name="phonenumber" value="<?= $phoneNumber; ?>" placeholder="Enter Phone Number">
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
                <?php
                if ($campaign_typeId == 2) {
                  ?>
                  <div class="col-lg-12 col-md-12 col-12">
                    <input type="text" id="amount" name="amount" placeholder="Enter Qty">
                  </div>
                <?php
                } else if ($campaign_typeId == 3) {
                  ?>
                  <div class="col-lg-12 col-md-12 col-12">
                    Total Amount: <span id="demo"></span>
                    <input type="number" style="height: 44px !important;" oninput="myFunction()" id="amount" name="amount" placeholder="Enter Qty">
                  </div>
                  <!-- product_qty -->
                  <script>
                    function myFunction() {
                      var x = document.getElementById("amount").value;
                      document.getElementById("demo").innerHTML = '(' + <?= $res->product_price; ?> * x + ' ' + '<?php echo $currency; ?>' + ')';
                    }
                  </script>
                <?php
                } else {
                  ?>
                  <div class="col-lg-12 col-md-12 col-12">
                  <input type="text" id="amount" name="amount" placeholder="Enter Amount">
                  </div>
                <?php
                }
                ?>
              </div>
              <div class="col-lg-12 col-md-12 col-12">
                <!-- <p style="margin-top:10px" class="subText">All Payment updates will be sent on this <a href="<?= BASE_URL ?>registration/">Mobile Number</a></p> -->
                <p style="margin-top:10px" class="subText">All details will be shared via mobile (payment details/ campaign details)</p>
                <button type="submit" id="target" class="tp-accountBtn btn-top">Submit</button>
              </div>
            </div>
            <!-- <p class="subText italic-font">By continuing you agree to our <a href="<?= BASE_URL ?>registration/">Terms of Service</a> and <a href="<?= BASE_URL ?>registration/">Privacy Policy</a></p> -->
        </div>
        </form>
        <script>
          $(document).ready(function() {
              
            $("#okay-btn").click(function(event) {
                console.log("Okay Button Clicked");
                $('#donateint').modal('hide');
                javascript:history.go(-1);
            });  
              
            $("#targetold").click(function(event) {
              // alert("Handler for .submit() called.");
              var fullName = $("#fullName").val();
              var emailId = $("#emailId").val();
              var phonenumber = $("#phonenumber").val();
              var address = $("#address").val();
              var amount = $("#amount").val();
              var campaign_Id = $("#campaign_Id").val();
              var campaign_typeId = $("#campaign_typeId").val();
              if ($("#anonymous").prop("checked") == true) {
                var anonymous = 1;
              } else {
                var anonymous = 0;
              }
              $.ajax({
                url: '<?php echo BASE_URL . 'submitdonate.php' ?>',
                type: "POST",
                data: {
                  fullName: fullName,
                  emailId: emailId,
                  phonenumber: phonenumber,
                  address: address,
                  amount: amount,
                  campaign_Id: campaign_Id,
                  campaign_typeId: campaign_typeId,
                  anonymous: anonymous
                },
                success: function(response) {
                  console.log(response);
                  $('#donateint').modal('show');
                  event.preventDefault();
                },
                error: function(jqXHR, exception) {
                  getErrorMessage(jqXHR, exception);
                }
              });
              event.preventDefault();
            });

            $("#form1").validate({
                rules: {
                    emailId: {
                        required: true,
                        email: true,
                        maxlength: 100,
                    },
                    fullName: {
                        required: true,
                        maxlength: 50,
                    },
                    address: {
                        required: true
                    },
                    phonenumber: {
                        required: true,
                        phoneUS: true
                    },
                    amount: {
                        required: true,
                        maxlength: 10,
                        range:[1,<?= $res->item_qty; ?>]
                    },
                },
                submitHandler: function(form) {
                    $("#target").html('Loading...');
                    $('#target').prop('disabled', true);

                    // alert("Handler for .submit() called.");
                    var fullName = $("#fullName").val();
                    var emailId = $("#emailId").val();
                    var phonenumber = $("#phonenumber").val();
                    var address = $("#address").val();
                    var amount = $("#amount").val();
                    var campaign_Id = $("#campaign_Id").val();
                    var campaign_typeId = $("#campaign_typeId").val();
                    if ($("#anonymous").prop("checked") == true) {
                      var anonymous = 1;
                    } else {
                      var anonymous = 0;
                    }

                    $.ajax({
                      url: '<?php echo BASE_URL . 'submitdonate-test.php' ?>',
                      type: "POST",
                      data: {
                        fullName: fullName,
                        emailId: emailId,
                        phonenumber: phonenumber,
                        address: address,
                        amount: amount,
                        campaign_Id: campaign_Id,
                        campaign_typeId: campaign_typeId,
                        anonymous: anonymous
                      },
                      success: function(response) {
                        $("#target").html('Submit');
                        $('#target').prop('disabled', false);

                        console.log(response);
                        $('#donateint').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        //event.preventDefault();
                      },
                      error: function(jqXHR, exception) {
                        getErrorMessage(jqXHR, exception);
                      }

                    });
                }
            });

            $.validator.addMethod("phoneUS", function (phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^\d{10}$/);
            }, "Please specify a valid phone number");

          });
        </script>
      </div>
    </div>
  </div>
  </div>
  <div class="modal fade" id="donateint" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-image: url(https://zedaid.org/wp-content/uploads/2021/07/hh.jpg); height: 418px;
    background-repeat: no-repeat;">
        <div class="modal-header" style="padding: 15px 0px 0px 0px;">
          <h4 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $fundtitle; ?></h4>
        </div>
        <div class="modal-body">
          <h3 class="modal-title text-center">Thank you for your interest.</h3>
          <div class="line_spacing_top_15" style="text-align: center;">
              <button type="submit" id="okay-btn" class="tp-okayBtn" style="margin-top: 44%;">Okay</button>
          </div>
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
  <script>
    <?php
    $curl = BASE_URL . 'campaign-detail/?id=' . $id;
    ?>
    $('#donateint').on('hidden.bs.modal', function() {
        console.log("Outside Clicked");
      window.location.replace("<?= $curl; ?>");
    })
  </script>
</body>
</html>
<?php
get_footer();