<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!-- start footer-->
<!-- news-letter-section end-->
<head>
    <style>
    .ti-youtube:before {
    content: "\e728";
    color: #EA1E15;
}
        @media (max-width: 767px){
            
        
        .abc{
            float:none;color:#fff !important
        }
    }
    @media (min-width: 768px){
        .abc{
            float:left !important;color:#fff !important
        }
    }
        </style>

</head>

<div class="tp-ne-footer">
    <!-- start tp-site-footer -->
    <footer class="tp-site-footer">
        <div class="tp-upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-3 col-sm-6">
                        <div class="widget about-widget">
                            <div class="logo widget-title">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt="blog">
                            </div>
                            <p>Creating more helping hands by bridging the gap between donors and the people lacking the necessities of life </p>
                            <ul>
                            <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                                <li>
                                    <div class="parallax-wrap">
                                        <div class="parallax-element">
                                            <a href="https://m.facebook.com/ZED-Foundation-102464085193955/?ref=bookmarks" target="_blank">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li>
                                    <div class="parallax-wrap">
                                        <div class="parallax-element">
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li> -->
                                <li>
                                    <div class="parallax-wrap">
                                        <div class="parallax-element">
                                            <a href="https://www.instagram.com/zedfoundation/" target="_blank">
                                                <i class="ti-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                 <li>
                                    <div class="parallax-wrap">
                                        <div class="parallax-element">
                                            <a href="https://www.youtube.com/watch?app=desktop&v=s5AMF3yb53E&t=3s" target="_blank">
                                                <i class="ti-youtube"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget link-widget">
                            <div class="widget-title">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <!--<li><a href="javascript:void(0)">How It Works</a></li>-->
                                <li><a href="<?= BASE_URL ?>covid-detail/">Covid Support</a></li>
                                <li><a href="<?= BASE_URL ?>privacy-policy/">Privacy Policy</a></li>
                                <li><a href="<?= BASE_URL ?>aml-policy/">AML Policy</a></li>
                                <li><a href="<?= BASE_URL ?>term-of-use/">Terms of Use</a></li>
                                <li><a href="<?= BASE_URL ?>refund-policy/">Refund Policy</a></li>
                                <li><a href="<?= BASE_URL ?>cancellation-policy/">Cancellation Policy</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-lg-offset-1 col-md-4 col-sm-6">
                        <div class="widget market-widget tp-service-link-widget">
                            <div class="widget-title">
                                <h3>Contact </h3>
                            </div>                            
                            <div class="contact-ft">
                                <ul>
                                    <!-- <li><i class="fi flaticon-pin"></i>28 Street, New York City, USA</li> -->
                                    <li><i class="fi flaticon-call"></i><a href="tel:+91 7208701981">+91 7208701981</a></li>
                                    <li><i class="fi flaticon-envelope"></i><a href="mailto:info@zedaid.org">info@zedaid.org</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col col-lg-3 col-md-3 col-sm-6">
                        <div class="widget instagram">
                            <div class="widget-title">
                                <h3>Instagram</h3>
                            </div>
                            <ul class="d-flex">
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div> <!-- end container -->
        </div>
        <div class="tp-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <span class="abc">Designed with
                            <i class="fa fa-heart text-primary"></i> by
                            <a href="https://innovuratech.com/" target="_blank" style="color:#fff !important">Innovura Technologies</a>
                        </span>
                        <span style="float:right;color:#fff !important">
                            Copyright © 2021 ZED Platforms - All Rights Reserved. </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end tp-site-footer -->
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<!-- Plugins for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
<!-- Custom script for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
<script>
    function startcamp() {
        $.cookie("actual_link", null, { path: '/' });
        <?php
        $cUrl = BASE_URL . "start-campaign/";
        $cUrll = BASE_URL . "login/";
        ?>
        $.cookie("actual_link", "<?= $cUrl; ?>", {
            path: '/'
        });
        window.location.replace("<?= $cUrll; ?>");
    }

    jQuery(document).ready(function () {
        window.onbeforeunload = function (e) {
            jQuery('.preloader1').css('display','block');
        }
        jQuery(window).load(function () {
            jQuery('.preloader1').css('display','none');
        });
    });
</script>
<?php
ob_flush();
?>
</body>

</html>