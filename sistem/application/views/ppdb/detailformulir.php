<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Seog Responsive web template, Bootstrap Web Templates" />
    <title>Peserta PPDB Online - <?php echo $no_pendaftaran; ?></title>
    <link href="//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ppdb/css/style-starter.css">
    <style>
        body {
            background-color: #eee
        }

        .mt-70 {
            margin-top: 70px
        }

        .mb-70 {
            margin-bottom: 70px
        }

        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(26, 54, 126, 0.125);
            border-radius: .25rem
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .scroll-area {
            overflow-x: hidden;
            height: 400px
        }

        .vertical-timeline {
            width: 100%;
            position: relative;
            padding: 1.5rem 0 1rem
        }

        .vertical-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 67px;
            height: 100%;
            width: 4px;
            background: #e9ecef;
            border-radius: .25rem
        }

        .vertical-timeline-element {
            position: relative;
            margin: 0 0 1rem
        }

        .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
            visibility: visible;
            animation: cd-bounce-1 .8s
        }

        .vertical-timeline-element-icon {
            position: absolute;
            top: 0;
            left: 60px
        }

        .vertical-timeline-element-icon .badge-dot-xl {
            box-shadow: 0 0 0 5px #fff
        }

        .badge-dot-xl {
            width: 18px;
            height: 18px;
            position: relative
        }

        .badge:empty {
            display: none
        }

        .badge-dot-xl::before {
            content: '';
            width: 10px;
            height: 10px;
            border-radius: .25rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -5px 0 0 -5px;
            background: #fff
        }

        .vertical-timeline-element-content {
            position: relative;
            margin-left: 90px;
            font-size: .8rem
        }

        .vertical-timeline-element-content .timeline-title {
            font-size: .8rem;
            text-transform: uppercase;
            margin: 0 0 .5rem;
            padding: 2px 0 0;
            font-weight: bold
        }

        .vertical-timeline-element-content .vertical-timeline-element-date {
            display: block;
            position: absolute;
            left: -90px;
            top: 0;
            padding-right: 10px;
            text-align: right;
            color: #adb5bd;
            font-size: .7619rem;
            white-space: nowrap
        }

        .vertical-timeline-element-content:after {
            content: "";
            display: table;
            clear: both
        }
    </style>
</head>

<body>
    <!--/header-w3l-->
    <div class="header-w3l">
        <!-- header -->
        <header id="site-header" class="fixed-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg stroke">
                    <a class="navbar-brand" href="index.html">
                        SE<span class="fab fa-xbox sub-logo"></span>G
                    </a>
                    <!-- if logo is image enable this   
            <a class="navbar-brand" href="#index.html">
                <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
            </a> -->
                    <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                        </span>
                    </button>
                    <?php include "header.php" ?>
                    <!-- toggle switch for light and dark theme -->
                    <div class="mobile-position">
                        <nav class="navigation">
                            <div class="theme-switch-wrapper">
                                <label class="theme-switch" for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    <div class="mode-container">
                                        <i class="gg-sun"></i>
                                        <i class="gg-moon"></i>
                                    </div>
                                </label>
                            </div>
                        </nav>
                    </div>
                    <!-- //toggle switch for light and dark theme -->
                </nav>
            </div>
        </header>
        <!-- //header -->
    </div>
    <!--//header-w3l-->
    <!--/w3l-inner-page-breadcrumb-->
    <section class="w3l-inner-page-breadcrumb">
        <div class="breadcrumb-bg py-5">
            <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
                <h2 class="title pt-5">Cetak Formulir</h2>
                <ul class="breadcrumbs-custom-path mt-3 text-center">
                    <li><a href="<?php echo base_url(); ?>ppdb/cetakformulir">Cetak Formulir</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Detail </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //w3l-inner-page-breadcrumb-->
    <!-- /contact-section -->
    <div class="w3l-contact-10 py-5" id="contact">
        <div class="form-41-mian py-lg-5 py-md-4 py-2">
            <div class="container">

                <div class="contacts-5-grid-main mt-4">

                    <div class="header-title text-center mx-auto">
                        <h6 class="title-subhny mb-2">PPDB</h6>
                        <h3 class="title-w3l">Cetak Formulir Pendaftaran</h3>
                    </div>
                    <div class="row d-flex justify-content-center mt-70 mb-70">
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Proses Pendaftaran - <?php echo $no_pendaftaran; ?></h5>
                                    <div class="scroll-area">
                                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                           
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                    <h4 class="timeline-title text-success">Pendaftaran Berhasil</h4> 
                                                        <p>Pendaftaran <b class="text-primary"><?php echo $no_pendaftaran; ?></b>
                                                        Berhasil dengan nama <b class="text-danger"><?php echo $nama_siswa; ?></b>.</p><hr/>
                                                        <p>Data dimasuk - <span class="text-success"><?php echo $tanggal_daftar; ?></span></p> 
                                                        <span class="vertical-timeline-element-date">1</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                    <h4 class="timeline-title text-success">Pendaftaran dapat dicetak</h4> 
                                                        <p>Pendaftaran telah di diterima, kamu bisa mencetak data formulir yang telah kamu berikan.</p>
                                                        <span class="vertical-timeline-element-date">2</span>
                                                        <hr/>
                                                        <a target="_blank" href="<?php echo base_url('/ppdb/download/'.$no_pendaftaran);?>" class="btn btn-primary btn-sm">Download</a>
                                                    </div>
                                                </div>
                                            </div>
											<?php 
											$date   = date("m Y");  
											//die(print_r($date));
											$notif  = $this->db->query("SELECT * FROM sr_invoice WHERE identification = '$no_pendaftaran'")->result_array();
											foreach ($notif as $row1) { 
											if($row1['status']=='Pending') {
											?>
												<div class="vertical-timeline-item vertical-timeline-element">
												   <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl <?php echo $statusbadge; ?>"> </i> </span>
														<div class="vertical-timeline-element-content bounce-in">
														<h4 class="timeline-title <?php echo $statustext; ?>">Pendaftaran belum dibayar</h4> 
															<p>Untuk melanjutkan pendaftaran kamu perlu melanjutkan pembayaran, pembayaran kamu akan terkonfirmasi automatis</p>
															<span class="vertical-timeline-element-date">3</span> 
															<hr/>
															<a target="_blank" href="<?php echo base_url('ppdb/pay/'.$no_pendaftaran);?>" class="btn btn-danger btn-sm" style="width: 89px;">Bayar</a>
														</div>
													</div> 
												</div>
											<?php }elseif($row1['status']=='Success'){ ?>
												<div class="vertical-timeline-item vertical-timeline-element">
												   <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"> </i> </span>
														<div class="vertical-timeline-element-content bounce-in">
														<h4 class="timeline-title text-success">Pendaftaran sudah dibayar</h4> 
															<p>Silahkan menunggu status konfirmasi atau hubungi pihak sekolah untuk mempercepat proses pendaftaran</p>
															<span class="vertical-timeline-element-date">3</span> 
															<hr/>
															<a target="_blank" href="<?php echo base_url('ppdb/pay/'.$no_pendaftaran);?>" class="btn btn-danger btn-sm" style="width: 89px;">Bayar</a>
														</div>
													</div> 
												</div>
											<?php }else{ ?>
												<p style="color:blue;">Masuk Seperti Biasa</p>
											<?php }} ?>
											<div class="vertical-timeline-item vertical-timeline-element">
                                               <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl <?php echo $statusbadge; ?>"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                    <h4 class="timeline-title <?php echo $statustext; ?>"><?php echo $status; ?></h4> 
                                                        <p><?php echo $status; ?></p>
                                                        <span class="vertical-timeline-element-date">4</span>
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
            </div>
            <!-- //contacts-5-grid -->
        </div>
    </div>

    <!-- //contact-section -->
    <!-- footer -->
    <footer class="w3l-footer-29-main">

        <!-- //footer -->
        <!-- copyright -->
        <section class="w3l-copyright">
            <div class="container">
                <div class="row bottom-copies">
                    <p class="col-lg-8 copy-footer-29">© 2020 Seog. All rights reserved. Design by <a href="https://w3layouts.com/" target="_blank">
                            W3Layouts</a></p>
                    <div class="col-lg-4 footer-list-29">
                        <ul class="d-flex text-lg-right">
                            <li><a href="#careers"> Careers</a></li>
                            <li class="mx-lg-5 mx-md-4 mx-3"><a href="#privacymy-lg-0 my-4">Privacy Policy</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            &#10548;
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
    </footer>
    <!--//footer-->
    <!-- Template JavaScript -->
    <script src="<?php echo base_url(); ?>assets/ppdb/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ppdb/js/theme-change.js"></script>
    <!-- owl carousel -->
    <script src="<?php echo base_url(); ?>assets/ppdb/js/owl.carousel.js"></script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function() {
            $("#owl-demo2").owlCarousel({
                loop: true,
                nav: false,
                margin: 50,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    736: {
                        items: 1,
                        nav: false
                    },
                    991: {
                        items: 2,
                        margin: 30,
                        nav: false
                    },
                    1080: {
                        items: 2,
                        nav: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->

    <script src="<?php echo base_url(); ?>assets/ppdb/js/bootstrap.min.js"></script>

</body>

</html>