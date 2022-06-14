<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>Galeri | <?php echo $title ?></title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootsnav.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>assets/js/html5/html5shiv.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Header 
    ============================================= -->
    <?php include "includes/header.php"?>
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(<?php echo base_url();?>assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Galeri</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Galeri</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Portfolio
    ============================================= -->
    <div id="portfolio" class="portfolio-area default-padding">
        <div class="container">
            <div class="portfolio-items-area text-center">
                <div class="row">
                    <div class="col-md-12 portfolio-content">
                        <div class="mix-item-menu active-theme">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".campus">Sekolah</button>
                            <button data-filter=".teachers">Kegiatan</button>
                            <button data-filter=".education">Pembelajaran</button>
                            <button data-filter=".ceremony">Event</button>
                            <button data-filter=".students">Ekstrakulikuler</button>
                        </div>
                        <!-- End Mixitup Nav-->

                        <div class="row magnific-mix-gallery masonary text-light">
                            <div id="portfolio-grid" class="portfolio-items col-4">
                                <div class="pf-item ceremony students">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item teachers ceremony">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item campus education">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item education students">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item campus">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item ceremony teachres">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item teachres">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pf-item ceremony students">
                                    <div class="item-effect">
                                        <img src="<?php echo base_url();?>assets/img/800x800.png" alt="thumb" />
                                        <div class="overlay">
                                            <a href="<?php echo base_url();?>assets/img/800x800.png" class="item popup-link"><i class="fa fa-expand"></i></a>
                                            <a href="#"><i class="fas fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->

    <!-- Start Footer 
    ============================================= -->
    <?php include "includes/footer.php"?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/equal-height.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.appear.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.custom.13711.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/count-to.js"></script>
    <script src="<?php echo base_url();?>assets/js/loopcounter.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootsnav.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>
</html>