<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>Profil | <?php echo $title ?></title>

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
	<?php include "includes/header.php" ?>
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(<?php echo base_url();?>assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Profil</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Profil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Students Profiel 
    ============================================= -->
    <div class="students-profiel adviros-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="<?php echo base_url();?>assets/img/800x800.png" alt="Thumb">
                </div>
                <div class="col-md-7 info main-content">
                    <!-- Star Tab Info -->
                    <div class="tab-info">
                        <!-- Tab Nav -->
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                    Profil
                                </a>
                            </li>
                            <!--<li>
                                <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                    Edit Profile
                                </a>
                            </li>-->
                        </ul>
                        <!-- End Tab Nav -->
                        <!-- Start Tab Content -->
                        <div class="tab-content tab-content-info">
                            <!-- Single Tab -->
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <p>
										<?php echo $desc ?>
									</p>
                                    <ul>
                                        <li>
                                            Telpon <span><?php echo $whatsapp ?></span>
                                        </li>
                                        <li>
                                            Email <span><?php echo $email ?></span>
                                        </li>
                                        <!--<li>
                                            Address <span>California, TX 70240 </span>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                            <!-- End Single Tab -->
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Tab Info -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Students Profile -->

    <!-- Start Footer 
    ============================================= -->
    <?php include "includes/footer.php" ?>
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