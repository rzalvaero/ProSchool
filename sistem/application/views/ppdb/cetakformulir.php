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
  <title>CetakFormulir - Peserta PPDB Online</title>
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
          <li><a href="<?php echo base_url();?>portal">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Cetak Formulir </li>
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
            <h3 class="title-w3l">Cetak Formulir Pendaftaran</h3><br/>
            <!--<p class="mb-5">CETAK FORMULIR PENDAFTARAN</p>-->
          </div>
          <div class="form-inner-cont">
            <?php echo $this->session->flashdata("msg");?>
            <form action="<?php echo base_url(); ?>ppdb/cetak_formulir" method="POST" class="signin-form">

              <div class="form-input" data-aos="fade-up">
                <input type="text" name="no_pendaftaran" placeholder="Masukan No Pendaftaran*" required/>
              </div>
              <div class="text-center mt-3">
                <button class="btn btn-style btn-primary" type="submit"><i class="fas fa-print"></i> Cetak</button>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!-- //contacts-5-grid -->
    </div>
  </div>

  <!-- //contact-section -->
  <!-- footer -->
  <footer class="w3l-footer-29-main">
    <div class="footer-29-w3l py-5">
      <div class="container py-lg-5 py-md-3">
        <div class="w3l-footer-texthny-inf text-center">
          <h6 class="foot-sub-title mb-1">LET’S WORK TOGETHER</h6>
          <h4><a href="mailto:seogexample@mail.com" class="mail">Seogexample@mail.com</a></h4>
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