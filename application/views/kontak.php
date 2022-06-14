<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>Kontak | <?php echo $title ?></title>

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
                    <h1>Kontak</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Hubungi Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact Info
    ============================================= -->
    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Contact Info -->
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Telpon</h4>
                                <span>+<?php echo $whatsapp ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Address</h4>
                                <span><?php echo $alamat ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email</h4>
                                <span><?php echo $email ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->

                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>

                <!-- Start Maps & Contact Form -->
                <div class="maps-form">
                    <div class="col-md-6 maps">
                        <h3>Lokasi Kami</h3>
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading">
                            <h3>Kontak Kami</h3>
                            <p>
                                Ingin mengetahui lebih tentang sekolah kami ? Kirim Pesan kepada Kami, staff kami akan menghubungi anda
                            </p>
                        </div>
                        <form action="<?php echo base_url();?>assets/mail/contact.php" method="POST" class="contact-form">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Nama" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Telepon" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Ceritakan tentang apa yang ingin anda tanyakan *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit" id="submit">
                                        Kirim Pesan <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Maps & Contact Form -->

            </div>
        </div>
    </div>
    <!-- End Contact Info -->

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