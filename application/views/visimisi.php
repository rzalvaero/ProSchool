<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <title>VISI & MISI | <?php echo $title ?></title>

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
    
    <!-- End Header Top -->

    <!-- Header 
    ============================================= -->
    
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(<?php echo base_url();?>assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>VISI dan MISI</h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="#">Halaman</a></li>
                        <li class="active">Visi Misi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Faq With Left Sidebar 
    ============================================= -->
    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 faq-content">
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            Selamat Datang di Visi Misi kami
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        <?php echo $deskripsi; ?>
										</p>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($visimisi as $row) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                            VISI dan MISI
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac4" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                       <ul>
                                            <li><?php echo $row['desc'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							<?php }  ?>
							
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
                <!-- Start Sidebar -->
                <div class="left-sidebar col-md-4">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item -->
                            
                            <!-- End Sidebar Item -->

                            <!-- Sidebar Item -->
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>Kontak Kami</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="#">Email <span><?php echo $email;?></span></a>
                                        </li>
                                        <li>
                                            <a href="#">Telpon <span><?php echo $whatsapp;?></span></a>
                                        </li>
										<li>
                                            <a href="#">Tagline <span><?php echo $description;?></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->

                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
    <!-- End Faq -->

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