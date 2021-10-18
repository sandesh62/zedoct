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
<footer class="footer-wrapper">
    <div class="container">
        <div class="footer-col box1">
            <div class="logo">
                <!--<img src="<?php echo bloginfo('template_directory'); ?>/images/logo.png" alt="Blue Magic" />-->
                <img src="<?php echo bloginfo('template_directory'); ?>/images/BlueMagicGroup.svg" alt="Blue Magic" height="83px" width="237px" />
                <!--<img src="https://jedaitestbed.in/bluemagicwp/wp-content/uploads/2021/01/BlueMagicGroup.svg" alt="Blue Magic" height="83px" width="237px" />-->
                <a href="javascript:void(0)"></a>
            </div>
            <div class="footer-social-media-list">
                <span>© BlueMagic Group 2021</span>
                <ul class="social-media-list">
                    <li>
                        <a href="https://www.facebook.com/bluemagicgroup" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="https://twitter.com/bluemagiclinic?lang=en" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li> -->
                    <li>
                        <a href="https://www.linkedin.com/company/18989993/admin/" target="_blank">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/bluemagicgroupclinic?igshid=vebkjayogfrd" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtube.com/channel/UC6zsn59JBMobdHBY-u4mwhw" target="_blank">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="https://www.bluemagiclinic.com/feed/" target="_blank">
                            <i class="fa fa-feed"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="footer-col box2">
            <h2 class="section-title">Link veloci
</h2>
            <ul class="quick-links-list">
                <li><a href="<?= BASE_URL; ?>"><i class="fa fa-angle-right "></i>Casa</a></li>
                <li><a href="<?= BASE_URL; ?>before-hair-transplant-operation/"><i class="fa fa-angle-right "></i>Prima dopo
</a></li>
                <li><a href="<?= BASE_URL; ?>packages-and-services/fue-hair-transplant/"><i class="fa fa-angle-right "></i>Zaffiro Micro FUE

                    </a></li>
                <li><a href="<?= BASE_URL; ?>our-media/"><i class="fa fa-angle-right "></i>Videos</a></li>
                <li><a href="<?= BASE_URL; ?>packages-and-services/dhi-hair-transplant/"><i class="fa fa-angle-right "></i>Penna DHI Choi
</a></li>
                <li><a href="<?= BASE_URL; ?>about-us/"><i class="fa fa-angle-right "></i>Chi siamo
</a></li>
                <li><a href="<?= BASE_URL; ?>packages-and-services/prp-therapy/"><i class="fa fa-angle-right "></i>Terapia PRP
</a></li>
                <li><a href="<?= BASE_URL; ?>blog/"><i class="fa fa-angle-right "></i>Blog</a></li>
                <!--<li><a href="<?= BASE_URL; ?>prp-hair-treatment/"><i class="fa fa-angle-right "></i>PRP Therapy</a></li>-->
                <li><a href="<?= BASE_URL; ?>press-and-award/"><i class="fa fa-angle-right "></i>Media</a></li>
                <li><a href="<?= BASE_URL; ?>experience/"><i class="fa fa-angle-right "></i>Esperienza
</a></li>
                <li><a href="<?= BASE_URL; ?>contact-us/"><i class="fa fa-angle-right "></i>Contattaci
</a></li>
            </ul>
        </div>
        <div class="footer-col box3">
            <p>Tutte le procedure vengono completate presso una struttura accreditata JCI e protette dalla nostra garanzia a vita d'oro
</p>
            <ul class="bagde-list">
                <li>
                    <span><img src="<?php echo bloginfo('template_directory'); ?>/images/bagde1.png" alt="B1" /></span>
                </li>
                <li>
                    <span><img src="<?php echo bloginfo('template_directory'); ?>/images/badge2.png" alt="B3" /></span>
                </li>
                <li>
                    <span><img src="<?php echo bloginfo('template_directory'); ?>/images/bagde3.png" alt="B2" /></span>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!-- end footer-->

<div class="wsp-chat desktop_show">
    <a href="http://api.whatsapp.com/send?phone=+447459614619&text=Hello BlueMagic Group Team,%0A%0AI am interested in having an hair transplant within your facilities.%0A%0ACan I a book a Patient Consultation?" target="_blank"><img src="<?php echo bloginfo('template_directory'); ?>/images/whatsapp_icon.png" /></a>
</div>
<div class="wsp-chat mobile_show">
    <a href="https://wa.me/+447459614619?text=Hello BlueMagic Group Team,%0A%0AI am interested in having an hair transplant within your facilities.%0A%0ACan I a book a Patient Consultation?" target="_blank"><img src="<?php echo bloginfo('template_directory'); ?>/images/whatsapp_icon.png" /></a>
</div>

<div class="modal" id="common-modal">
    <div class="modal-overlay"></div>
    <div class="moaal-body-wrapper">
        <p>
            <iframe src="https://www.youtube.com/embed/hipU6Zzkg04" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </p>
        <!-- <a href="#" rel="modal:close">Close</a> -->
    </div>
</div>
<a href="#" id="scroll" style="display: none;"><span></span></a>


<script>
    //each, prop, animate, math, text

    //.animate( properties [, duration ] [, easing ] [, callback ] )
    //"swing" - moves slower at the beginning/end, but faster in the middle
    //"linear" - moves in a constant speed
    //step : A function to be called after each step of the animation.  step takes: now and fx.
    //$(selector).prop(name,value)


    var a = 0;
    $(window).scroll(function() {

        var oTop = $('#counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        if (countTo == '365') {
                            $this.text(this.countNum);
                            //alert('finished');
                        } else {
                            $this.text(this.countNum + '+');
                            //alert('finished');
                        }

                    }

                });
            });
            a = 1;
        }

    });
</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://use.fontawesome.com/ac31ebd8bf.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.malihu.PageScroll2id.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jClocksGMT.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery.rotate.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/custom.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/customdev.js"></script>
</body>

</html>