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
  <title>Portal - Peserta PPDB Online</title>
  <link href="//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ppdb/css/style-starter.css">
</head>

<body>
  <!--/header-w3l-->
  <div class="header-w3l">
    <!-- header -->
    <header id="site-header" class="fixed-top">
      <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
          <a class="navbar-brand" href="index.html"><i class=""></i>
            PPDB<span class="fab fa-xbox sub-logo"> </span>
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
  <!--/w3l-banner-content-->
  <div class="w3l-banner-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 bannerhny-info pr-lg-5">
          <h3 class="mb-4">Portal - Peserta<span class="w3sub-color">
              PPDB </span>Online.</h3>
          <div class="separatorhny"></div>
          <?php echo $this->session->flashdata("msg"); ?>
          <p class="pr-lg-5 mt-md-4 mt-3">Untuk calon pendaftar tahun ajaran 2022/2023 bisa mendaftar melalui website ini atau langsung datang ke tempat pendaftaran
          </p>
          <a style="font-size:12px;" class="btn btn-style mt-sm-5 mt-4 mr-2" href="<?php echo base_url();?>ppdb">
            Daftar</a>
        </div>
        <div class="col-lg-6 bannerhny-info-img mt-lg-0 mt-5 pl-lg-5">
          <img src="<?php echo base_url(); ?>assets/ppdb/images/pic-1.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <!--//w3l-banner-content-->

  <div class="w3l-content-1 py-5">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="w3l-content-inf text-center">
        <h6 class="title-subhny mb-2">PPDB</h6>
        <h3 class="title-w3l mb-4">Portal - Peserta
        <span class="w3sub-color"> PPDB</span> Online.</h3>
        <p class="para-sub pr-lg-5 mt-md-4 mt-3 mx-auto">
          Memudahkan kamu untuk mendaftar di sekolah favorit kamu tanpa keluar dari rumah, Jadi kan era Digital semakin maju!
        </p>
        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="<?php echo base_url();?>ppdb">
          Daftar</a>
      </div>
    </div>
  </div>

  <div class="w3l-content-2 py-5">
    <div class="container py-md-5 py-2">
      <div class="row align-items-center">
        <div class="col-lg-6 whybox-wrap pr-lg-5">
          <div class="title-content text-left">
            <h6 class="title-subhny">Alur Pendaftaran</h6>
            <h3 class="title-w3l mb-sm-5 mb-4 pb-2">Bagaimana proses pendaftaran <span class="w3sub-color">
                PPDB </span> ?</h3>
          </div>
          <div class="whybox-wrap-grid mb-4">
            <div class="icon">
              <span class="fas fa-signal"></span>
            </div>
            <div class="info">
              <h4><a href="#url">Pendaftaran</a></h4>
              <p class="mt-3">Daftarkan diri untuk bergabung bersama kami.</p>
            </div>
          </div>
          <div class="whybox-wrap-grid mb-4">
            <div class="icon">
              <span class="fas fa-cubes icon-red"></span>
            </div>
            <div class="info">
              <h4><a href="#url">Verifikasi</a></h4>
              <p class="mt-3">Setelah dilakukan verifikasi dan anda telah lolos, silahkan untuk mencetak form pendaftaran.</p>
            </div>
          </div>
          <div class="whybox-wrap-grid mb-4">
            <div class="icon">
              <span class="fas fa-users icon-yellow"></span>
            </div>
            <div class="info">
              <h4><a href="#url">Seleksi</a></h4>
              <p class="mt-3">Jika anda di terima lakukan pembayaran untuk melanjutkan seleksi akan dimulai CBT.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 whybox-wrap-img mt-lg-0 mt-5 pl-lg-5">
          <div class="w3l-img-hr position-relative">
            <img src="<?php echo base_url(); ?>assets/ppdb/images/pic-4.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="w3l-bottom-grids-6 py-5" id="services">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="title-content text-center">
        <h6 class="title-subhny text-center">Seleksi</h6>
        <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Tahapan Seleksi
          <br> apa aja?
        </h3>
      </div>
      <div class="grids-area-hny text-center row mt-lg-4">

        <div class="col-lg-6 col-md-6 grids-feature mt-md-0 mt-4" style="flex:0 0 50%;max-width:50%;box-shadow:0 3px 20px 0px rgb(0 0 0 / 12%);border-radius:1.5rem !important;">
          <div class="area-box icon">
            <span style="margin:25px 0px 0px 0px;font-size:20px;" class="fas fa-laptop icon-red"></span>
            <h4><a href="#feature" class="title-head">Tes Akademik</a></h4>
            <p style="line-height: 20px;font-size: 15px;">Diambil dari nilai ujian yang dilakukan secara online berbasis Computer Based Test (CBT). <br><br><br></p>

          </div>
        </div>
        <div class="col-lg-6 col-md-6 grids-feature mt-lg-0 mt-4" style="flex:0 0 50%;max-width:50%;box-shadow:0 3px 20px 0px rgb(0 0 0 / 12%);border-radius:1.5rem !important;">
          <span style="margin:25px 0px 0px 0px;font-size:20px;" class="fas fa-chart-pie icon-yellow"></span>
          <h4><a href="#feature" class="title-head">Tes non Akademik</a></h4>
          <p style="line-height: 20px; font-size: 15px;">Diambil dari verifikasi berkas surat keterangan sehat dan tidak buta warna, wawancara siswa dan orang tua, serta kesemaptaan. <br><br></p>

        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- /bottom-grids-->
  <!-- //bottom-grids-->
  <!--/Content-mid-->
  <section class="w3l-content-mid py-5">
    <div class="container py-sm-4 py-2">
      <div class="row">
        <div class="col-lg-8">
          <div class="bottom-info">
            <div class="header-section">
              <h6 class="title-subhny mb-2">Kontak</h6>
              <h3 class="title-w3l">Masih binggung mengisi<span class="w3sub-color">
                  PPDB</span> kami?</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 align-self text-lg-right">
          <a href="#get" class="btn btn-style btn-primary mt-lg-0 mt-md-5 mt-4">Hubungi</a>
        </div>
      </div>
    </div>
  </section>
  <!--//Content-mid-->
  <!-- testimonials section -->

  <!-- //testimonials section -->
  <!-- /Thank-section -->
  <!-- 
  <section class="w3l-content-3 py-5">
    
    <div class="content-3-info py-3">
      <div class="container py-lg-4">
        <div class="welcome-left text-center">
          <h6 class="title-subhny mb-2">Thank you for Watching</h6>
          <h3 class="title-w3l two">Purchase the Workplace now and make
            everything easier</h3>

          <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="#">
            Purchase Now</a>
        </div>
      </div>
    </div>
  </section>
  -->
  <!-- footer -->
  <footer class="w3l-footer-29-main">
    <div class="footer-29-w3l py-5">
      <div class="container py-lg-5 py-md-3">
        <div class="w3l-footer-texthny-inf text-center">
          <h6 class="foot-sub-title mb-1">Kirim pesan kepada kami</h6>
          <h4><a href="mailto:seogexample@mail.com" class="mail">info@proschool.id</a></h4>
          <div class="main-social-footer-29 mt-4 mb-lg-5 mb-4">
            <a href="#facebook" class="facebook"><span class="fab fa-facebook-f"></span></a>
            <a href="#twitter" class="twitter"><span class="fab fa-twitter"></span></a>
            <a href="#instagram" class="instagram"><span class="fab fa-instagram"></span></a>
            <a href="#linkedin" class="linkedin"><span class="fab fa-linkedin-in"></span></a>
          </div>
        </div>
      </div>
    </div>
    <!-- //footer -->
    <!-- copyright -->
    <section class="w3l-copyright">
      <div class="container">
        <div class="row bottom-copies">
          <p class="col-lg-8 copy-footer-29">© <?php echo date('Y'); ?> . All rights reserved. Design by <a href="https://proschool.id/" target="_blank">
              Proschool</a></p>
          <div class="col-lg-4 footer-list-29">
            <ul class="d-flex text-lg-right">
              <li><a href="<?php echo base_url(); ?>ppdb">PPDB</a></li>
              <li class="mx-lg-5 mx-md-4 mx-3"><a href="<?php echo base_url(); ?>tamu">Bukutamu</a></li>
              <li><a href="<?php echo base_url(); ?>">Login</a></li>
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