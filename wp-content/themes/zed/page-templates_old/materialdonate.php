<?php
/**
 * Template Name: Material Donation
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

  <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
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
        <div class="col-lg-12">
          <?php
          $id = $_GET['id'];
          $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
          $res = $results[0];
          $campaign_typeId = $res->campaign_typeId;
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
          ?>
          <form enctype="multipart/form-data" method="post" id="form1" class="tp-accountWrapper">
            <input type="hidden" id="campaign_Id" value="<?php echo $id; ?>" name="campaign_Id" />
            <input type="hidden" id="campaign_typeId" value="<?php echo $campaign_typeId; ?>" name="campaign_typeId" />
            <div class="tp-accountInfo">
                            <div class="tp-accountInfoHeader">
                                <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt=""></a>
                                <!-- <a class="tp-accountBtn" href="register.html">
                                        <span class="">Create Account</span>
                                    </a> -->
                            </div>
                            <div class="image">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/login.svg" alt="">
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
                  <script>
                    function myFunction() {
                      var x = document.getElementById("amount").value;
                      document.getElementById("demo").innerHTML = '(' + <?= $res->product_price; ?> * x + ' ' + '<?php echo $currency; ?>' + ')';
                    }
                  </script>
                <?php
                } else {
                  ?>
                  <input type="text" id="amount" name="amount" placeholder="Enter Amount">
                <?php
                }
                ?>
              </div>
              <div class="col-lg-12 col-md-12 col-12">
                <p style="margin-top:10px" class="subText">All Payment updates will be sent on this <a href="<?= BASE_URL ?>registration/">Mobile Number</a></p>
                <button type="submit" id="target" class="tp-accountBtn btn-top">Submit</button>
              </div>
            </div>
            <!-- <p class="subText italic-font">By continuing you agree to our <a href="<?= BASE_URL ?>registration/">Terms of Service</a> and <a href="<?= BASE_URL ?>registration/">Privacy Policy</a></p> -->
        </div>
        </form>
        <script>
          $(document).ready(function() {
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
                        $("#target").html('Submit');
                        $('#target').prop('disabled', false);

                        console.log(response);
                        $('#donateint').modal('show');
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
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $fundtitle; ?></h4>
        </div>
        <div class="modal-body">
          <h5 class="modal-title text-center">Thank you for interest.</h5>
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
    $curl = BASE_URL . 'fundraiser-detail/?id=' . $id;
    ?>
    $('#donateint').on('hidden.bs.modal', function() {
      window.location.replace("<?= $curl; ?>");
    })
  </script>
</body>
</html>