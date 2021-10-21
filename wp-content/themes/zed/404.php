<?php



get_header(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>BlueMagic-404-Not-Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/responsive.css" />
</head>

<body class="blue-magic-info-text">
    <!--start header-->
    <header>
        <div class="header-topbar">
            <div class="container">
                <div class="d-flex-container">
                    <div class="logo">
                        <a href="<?= BASE_URL; ?>">
                            <img src="<?php echo bloginfo('template_directory'); ?>/images/logo.png" alt="Blue Magic" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--end header-->
    <!-- start thankyou wrapper-->
    <section class="info-text-wrapper">
        <div class="container">
            <span class="thank-you-image">
                <img src="https://zedaid.org/wp-content/uploads/2021/07/aa-scaled.jpg" alt="404-Not-Found" width="1000px"/>
            </span>
            
            <a href="<?= BASE_URL; ?>" class="btn btn-primary">Go Home</a>
        </div>
    </section>
    <!-- end thank you wrapper-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://use.fontawesome.com/ac31ebd8bf.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/custom.js"></script>
</body>

</html>
<?php
get_footer();