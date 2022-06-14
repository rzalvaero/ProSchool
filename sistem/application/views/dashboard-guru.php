<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ELEARNING | Guru ProSchool</title>
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
                    <h3>Guru Dashboard</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Guru</li>
                        <?php echo $this->session->flashdata("msg"); ?>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
							<div class="col-6-xxxl col-lg-3 col-sm-6 col-12">
                                <div class="dashboard-summery-two">
                                    <div class="item-icon bg-light-magenta">
                                        <i class="flaticon-classmates text-magenta"></i>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-number"><span class="counter" data-num="<?php echo $siswa; ?>"><?php echo $siswa; ?></span></div>
                                        <div class="item-title">Jumlah Siswa</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6-xxxl col-lg-3 col-sm-6 col-12">
                                <div class="dashboard-summery-two">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-shopping-list text-blue"></i>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-number"><span class="counter" data-num="<?php echo $materi; ?>"><?php echo $materi; ?></span></div>
                                        <div class="item-title">Jumlah Materi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6-xxxl col-lg-3 col-sm-6 col-12">
                                <div class="dashboard-summery-two">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-mortarboard text-orange"></i>
                                    </div>
                                    <div class="item-content">
                                        <div class="item-number"><span class="counter" data-num="<?php echo $kelas; ?>"><?php echo $kelas; ?></span></div>
                                        <div class="item-title">Jumlah Kelas</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6-xxxl col-lg-3 col-sm-6 col-12">
                                <div class="dashboard-summery-two">
                                    <?php 
										$date 			= date('Y-m-d');
										$id 			= $this->session->userdata('id');
										$check_absen = $this->db->query("SELECT * FROM sr_absen WHERE idusers = '$id' AND tanggal_absen='$date'");
										if ($check_absen->num_rows() <> 0) {
									?>
										<div class="item-icon bg-light-green">
                                        <i class="flaticon-list text-green"></i>
										</div>
										<div class="item-content">
											<div class="item-number" style="font-size:25px;"><?php echo date("d M Y");?></div>
											<div class="item-title">Sudah Absen</div>
										</div>
									<?php } else { ?>
										<a href="<?php echo base_url();?>absen/getToday">
										<div class="item-icon bg-light-red">
                                        <i class="flaticon-list text-red"></i>
										</div>
										<div class="item-content">
											<div class="item-number" style="font-size:25px;"><?php echo date("d M Y");?></div>
											<div class="item-title">Lakukan Absen</div>
										</div>
										</a>
									<?php }?>
                                </div>
                            </div>
					
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row gutters-20">
                    <!--
                    <div class="col-12 col-xl-8 col-6-xxxl">
                        <div class="card dashboard-card-one pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Earnings</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        
                                    </div>
                                </div>
                                <div class="earning-report">
                                    <div class="item-content">
                                        <div class="single-item pseudo-bg-blue">
                                            <h4>Total Collections</h4>
                                            <span>75,000</span>
                                        </div>
                                        <div class="single-item pseudo-bg-red">
                                            <h4>Fees Collection</h4>
                                            <span>15,000</span>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a class="date-dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">Jan 20, 2019</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Jan 20, 2019</a>
                                            <a class="dropdown-item" href="#">Jan 20, 2021</a>
                                            <a class="dropdown-item" href="#">Jan 20, 2020</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="earning-chart-wrap">
                                    <canvas id="earning-line-chart" width="660" height="320"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 col-3-xxxl">
                        <div class="card dashboard-card-two pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Expenses</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        
                                    </div>
                                </div>
                                <div class="expense-report">
                                    <div class="monthly-expense pseudo-bg-Aquamarine">
                                        <div class="expense-date">Jan 2019</div>
                                        <div class="expense-amount"><span>$</span> 15,000</div>
                                    </div>
                                    <div class="monthly-expense pseudo-bg-blue">
                                        <div class="expense-date">Feb 2019</div>
                                        <div class="expense-amount"><span>$</span> 10,000</div>
                                    </div>
                                    <div class="monthly-expense pseudo-bg-yellow">
                                        <div class="expense-date">Mar 2019</div>
                                        <div class="expense-amount"><span>$</span> 8,000</div>
                                    </div>
                                </div>
                                <div class="expense-chart-wrap">
                                    <canvas id="expense-bar-chart" width="100" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-12 col-xl-6 col-3-xxxl">
                        <div class="card dashboard-card-three pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Siswa</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>


                                    </div>
                                </div>
                                <div class="doughnut-chart-wrap">
                                    <canvas id="student-chart" width="100" height="300"></canvas>
                                </div>
                                <div class="student-report">
                                    <div class="student-count pseudo-bg-blue">
                                        <h4 class="item-title">Siswa Perempuan</h4>
                                        <div class="item-number"><?php echo $female; ?></div>
                                    </div>
                                    <div class="student-count pseudo-bg-yellow">
                                        <h4 class="item-title">Siswa Laki-Laki</h4>
                                        <div class="item-number"><?php echo $male; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 col-4-xxxl">
                        <div class="card dashboard-card-four pd-b-20">
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
                    <div class="col-lg-6 col-xl-6 col-4-xxxl">
                        <div class="card dashboard-card-five pd-b-20">
                            <div class="card-body pd-b-14">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Lalu Lintas Situs</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>


                                    </div>
                                </div>
                                <h6 class="traffic-title">Pengunjung Unik</h6>
                                <div class="traffic-number"><?php echo $totalpengunjung ?></div>
                                <div class="traffic-bar">
                                    <div class="direct" data-toggle="tooltip" data-placement="top" title="Direct">
                                    </div>
                                    <div class="search" data-toggle="tooltip" data-placement="top" title="Search">
                                    </div>
                                    <div class="referrals" data-toggle="tooltip" data-placement="top" title="Referrals">
                                    </div>
                                    <div class="social" data-toggle="tooltip" data-placement="top" title="Social">
                                    </div>
                                </div>
                                <div class="traffic-table table-responsive">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td class="t-title pseudo-bg-red">Total Aktif</td>
                                                <td><?php echo $pengunjungonline ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="t-title pseudo-bg-Aquamarine">Pengunjung Hari Ini</td>
                                                <td><?php echo $pengunjunghariini ?></td>
                                            </tr>
                                            <tr>
                                                <td class="t-title pseudo-bg-blue">Total Pengunjung</td>
                                                <td><?php echo $totalpengunjung ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-4-xxxl">
                        <div class="card dashboard-card-six pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-17">
                                    <div class="item-title">
                                        <h3>Papan Pengumuman</h3>
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
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Content End Here -->
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
    <script>
        (function($) {
            "use strict";
            if ($("#student-chart").length) {
                var doughnutChartData = {
                    labels: ["Siswa Perempuan", "Siswa Laki-Laki"],
                    datasets: [{
                        backgroundColor: ["#304ffe", "#ffa601"],
                        data: [<?php echo $female; ?>, <?php echo $male; ?>],
                        label: "Total Students"
                    }, ]
                };
                var doughnutChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 65,
                    rotation: -9.4,
                    animation: {
                        duration: 2000
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true
                    },
                };
                var studentCanvas = $("#student-chart").get(0).getContext("2d");
                var studentChart = new Chart(studentCanvas, {
                    type: 'doughnut',
                    data: doughnutChartData,
                    options: doughnutChartOptions
                });
            }
        })(jQuery);
    </script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>

</html>