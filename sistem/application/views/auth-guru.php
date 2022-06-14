<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO REZA -->
    <?php 
	$pilihan  = $this->db->query("SELECT * FROM web_setting WHERE id = '1'")->result_array();
	foreach ($pilihan as $row) { ?>
    <title><?php echo $row['title'] ?> | Login Guru</title>
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $row['title'] ?>">
    <meta property="og:site_name" content="<?php echo $row['description'] ?> - Elearning by PROschools">
    <meta property="og:description" content="<?php echo $row['description'] ?>">
    <meta property="og:url" content="<?php echo $row['url'] ?>">
    <meta property="og:locale" content="id_ID">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="<?php echo $row['url'] ?>">
    <meta name="twitter:title" content="<?php echo $row['title'] ?>">
    <meta name="twitter:description" content="<?php echo $row['description'] ?>">
    <meta name="twitter:site" content="<?php echo $row['url'] ?>">
    <?php } ?>
    <!-- SEO REZA -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
    <!-- Modernize js -->
    <script src="<?php echo base_url();?>assets/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
                    <?php echo $this->session->flashdata("msg");?>
                </div>
                <form class="login-form" action="<?php echo base_url();?>auth/login_akses" method="POST">
                    <div class="form-group">
                        <label>Masukan Email</label>
                        <input type="hidden" name="type" value="1">
                        <input type="email" name="email" placeholder="Masukan Email" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi</label>
                        <input type="password" name="password" placeholder="Kata Sandi" class="form-password form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-checkbox form-check-input" value="" id="remember-me">
                            <label for="remember-me" class="form-check-label">Lihat Kata Sandi</label>
                        </div>
                        <a href="<?php echo base_url();?>" class="forgot-btn">Masuk Siswa ?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Masuk</button>
                    </div>
                </form>
                <!--<div class="login-social">
                    <p>or sign in with</p>
                    <ul>
                        <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="bg-twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#" class="bg-git"><i class="fab fa-github"></i></a></li>
                    </ul>
                </div>-->
            </div>
            <!--<div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div>-->
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
    });
    </script>
</body>

</html>