<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Elearning | Siswa Proschool</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- Modernize js -->
    <script src="<?php echo base_url(); ?>assets/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <?php include "includes/navbar.php" ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include "includes/menu.php" ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Dashboard Siswa</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Siswa</li>
                        <?php echo $this->session->flashdata("msg"); ?>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Student Info Area Start Here -->
                    <div class="col-4-xxxl col-12">
                        <div class="card dashboard-card-ten">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Tentang Saya</h3>
                                    </div>
                                    <div class="dropdown">
                                        <?php 
										$date 			= date('Y-m-d');
										$id 			= $this->session->userdata('id');
										$check_absen = $this->db->query("SELECT * FROM sr_absen WHERE idusers = '$id' AND tanggal_absen='$date'");
										if ($check_absen->num_rows() <> 0) {
										?>
											<a disabled class="btn btn-success" style="color:white;">
												Absen Siswa
											</a>

										<?php } else { ?>
											<a href="<?php echo base_url();?>absen/getToday" class="btn btn-warning">
												Absen Siswa
											</a>
										<?php }?>
                                    </div>
                                </div>
                                <div class="student-info">
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                            <img src="<?php echo base_url(); ?>assets/img/figure/student.png" class="media-img-auto" alt="student">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="item-title"><?php echo $this->session->userdata('username') ?></h3>
                                            <p>Siswa <b><?php echo $this->session->userdata('nama_kelas') ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Student Info Area End Here -->
                    <div class="col-8-xxxl col-12">
                        <div class="row">
                            <!-- Summery Area Start Here -->
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-magenta">
                                                <i class="flaticon-shopping-list text-magenta"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Papan Pengumuman</div>
                                                <div class="item-number"><span class="counter" data-num="12">12</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-blue">
                                                <i class="flaticon-calendar text-blue"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Examp</div>
                                                <div class="item-number"><span class="counter" data-num="06 ">06</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dashboard-summery-one">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="item-icon bg-light-yellow">
                                                <i class="flaticon-percentage-discount text-orange"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="item-content">
                                                <div class="item-title">Kehadiran</div>
                                                <div class="item-number"><span class="counter" data-num="94">94</span><span>%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Summery Area End Here -->
                            <!-- Exam Result Area Start Here -->
                            <!--<div class="col-lg-12">
                                <div class="card dashboard-card-eleven">
                                    <div class="card-body">
                                        <div class="heading-layout1">
                                            <div class="item-title">
                                                <h3>All Exam Results</h3>
                                            </div>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                                    aria-expanded="false">...</a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-box-wrap">
                                            <form class="search-form-box">
                                                <div class="row gutters-8">
                                                    <div class="col-lg-4 col-12 form-group">
                                                        <input type="text" placeholder="Search by Exam ..."
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-lg-3 col-12 form-group">
                                                        <input type="text" placeholder="Search by Subject ..."
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-lg-3 col-12 form-group">
                                                        <input type="text" placeholder="dd/mm/yyyy"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-lg-2 col-12 form-group">
                                                        <button type="submit"
                                                            class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="table-responsive result-table-box">
                                                <table class="table display data-table text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                        class="form-check-input checkAll">
                                                                    <label class="form-check-label">ID</label>
                                                                </div>
                                                            </th>
                                                            <th>Exam Name</th>
                                                            <th>Subject</th>
                                                            <th>Grade</th>
                                                            <th>Percent</th>
                                                            <th>Date</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0021</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>English</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0022</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>English</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0023</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>Chemistry</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0024</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>English</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0025</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>Chemistry</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0025</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>Chemistry</td>
                                                            <td>D</td>
                                                            <td>70.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0025</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>English</td>
                                                            <td>C</td>
                                                            <td>80.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0025</label>
                                                                </div>
                                                            </td>
                                                            <td>Class Test</td>
                                                            <td>English</td>
                                                            <td>B</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input">
                                                                    <label class="form-check-label">#0025</label>
                                                                </div>
                                                            </td>
                                                            <td>First Semister</td>
                                                            <td>English</td>
                                                            <td>A</td>
                                                            <td>99.00 > 100</td>
                                                            <td>22/02/2019</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <span
                                                                            class="flaticon-more-button-of-three-dots"></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-times text-orange-red"></i>Close</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!-- Exam Result Area End Here -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4-xxxl col-xl-6 col-12">
                        <div class="card dashboard-card-three">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Kehadiran</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>


                                    </div>
                                </div>
                                <div class="doughnut-chart-wrap">
                                    <canvas id="student-doughnut-chart" width="100" height="270"></canvas>
                                </div>
                                <div class="student-report">
                                    <div class="student-count pseudo-bg-blue">
                                        <h4 class="item-title">Tidak hadir</h4>
                                        <div class="item-number">28.2%</div>
                                    </div>
                                    <div class="student-count pseudo-bg-yellow">
                                        <h4 class="item-title">Hadir</h4>
                                        <div class="item-number">65.8%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4-xxxl col-xl-6 col-12">
                        <div class="card dashboard-card-thirteen">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Kalender</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>


                                    </div>
                                </div>
                                <div class="calender-wrap">
                                    <div id="fc-allcalender" class="fc-calender"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4-xxxl col-12">
                        <div class="card dashboard-card-six">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-17">
                                    <div class="item-title">
                                        <h3>Papan Pemberitahuan</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>


                                    </div>
                                </div>
                                <div class="notice-box-wrap">
                                    <?php foreach ($pengumuman as $row) { ?>
                                        <div class="notice-list">
                                            <div class="post-date bg-yellow"><?php echo $row['tgl_tampil'] ?></div>
                                            <h6 class="notice-title"><a href="#"><?php echo $row['konten'] ?></a></h6>
                                            <div class="entry-meta"> <?php echo $row['judul'] ?> /
                                                <span>
                                                    <?php
                                                    $tgl1 = new DateTime(date("Y-m-d"));
                                                    $tgl2 = new DateTime($row['tgl_tampil']);
                                                    $d = $tgl2->diff($tgl1)->days + 1;
                                                    echo $d . " Days a go.";
                                                    ?>
                                                </span>
                                            </div>
                                        <?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Area Start Here -->
                    <?php include "includes/footer.php" ?>
                    <!-- Footer Area End Here -->
                </div>
            </div>
            <!-- Page Area End Here -->
        </div>
        <!-- jquery-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
        <!-- Plugins js -->
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <!-- Popper js -->
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- Counterup Js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
        <!-- Moment Js -->
        <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
        <!-- Waypoints Js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
        <!-- Scroll Up Js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
        <!-- Full Calender Js -->
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
        <!-- Chart Js -->
        <script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
        <!-- Data Table Js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <!-- Custom Js -->
        <script>
            /*-------------------------------------
          Calender initiate 
        -------------------------------------*/
            var events = <?php echo json_encode($calender) ?>;

            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            $('#fc-allcalender').fullCalendar({
                header: {
                    center: 'basicDay,basicWeek,month',
                    left: 'title',
                    right: 'prev,next',
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                events: events
            })
        </script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>

</html>