
<div class="row">
	
	
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Kehadiran</h3>
                                    </div>
                                 
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>
                                    </div>
                                </div>
								 <div class="table-responsive">
                                    <table class="table bs-table table-striped table-bordered text-nowrap">
                                        <thead style="background-color:#042954;">
                                            <tr>
                                                <th style="color: #fff;" class="text-left">Kehadiran Diri</th>
												<?php
												//mendapatkan tgl kemarin
												$tglskr = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
												$tglkemarin = date("Y-m-d", $tglskr);
												//mendapatkan tgl 30 hari kemarin
												$tgl_30_hari_lalu = mktime(0, 0, 0, date("m"), date("d") - 30, date("Y"));
												$tgllalu = date("Y-m-d", $tgl_30_hari_lalu);
												$tgl_skr = new DateTime($tglkemarin, new DateTimeZone("Europe/London"));
												$tgl_lalu = new DateTime($tgllalu, new DateTimeZone("Europe/London"));
												//looping
												do {
												?>
                                                <th style="color: #fff;">
													<?php echo $tgl_skr->format("d M Y"); ?>
												</th>
												<?php 
												$tgl_skr->modify("-1 day");
												} while ($tgl_skr >= $tgl_lalu); ?>
                                            </tr>
                                        </thead>
										<tbody>
                                            <tr>
												<td>
												<?php echo $this->session->userdata('first_name');?>
												</td>
                                                <?php
												//mendapatkan tgl kemarin
												$tglskr = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
												$tglkemarin = date("Y-m-d", $tglskr);
												//mendapatkan tgl 30 hari kemarin
												$tgl_30_hari_lalu = mktime(0, 0, 0, date("m"), date("d") - 30, date("Y"));
												$tgllalu = date("Y-m-d", $tgl_30_hari_lalu);
												$tgl_skr = new DateTime($tglkemarin, new DateTimeZone("Asia/Jakarta"));
												$tgl_lalu = new DateTime($tgllalu, new DateTimeZone("Asia/Jakarta"));
												//looping
												do {
												?>
                                                <td>
													<?php
														$idnya 			 = $this->session->userdata('id') ;
														$type_users 	 = $this->session->userdata('type_users') ;
														$looping		 = $tgl_skr->format("Y-m-d");
														//$rowtanggal  = $this->db->query("SELECT * FROM sr_absen WHERE idusers='$idnya' AND DATE_FORMAT(tanggal_absen,'%d') = '".$i."'")->result_array();
														$rowtanggal  = $this->db->query("SELECT A.tanggal_absen, A.idusers, A.tahun_ajaran, DATE_FORMAT(A.tanggal_absen,'%d') as shortdate FROM sr_absen A WHERE A.idusers='$idnya' AND type='$type_users' AND A.tanggal_absen = '".$looping."'")->result_array();
														foreach ($rowtanggal as $row1) {
													?>
															<i class="fas fa-check text-success"></i>
													<?php } ?>
												</td>
												<?php 
												$tgl_skr->modify("-1 day");
												} while ($tgl_skr >= $tgl_lalu); ?>
                                            </tr>
                                        </tbody>
									</table>
								</div>
                                <div class="table-responsive">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area Start Here -->
     <div class="col-12 col-xl-12 col-3-xxxl">
                        <div class="card dashboard-card-three pd-b-20">
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
                                    <canvas id="student-chart" width="100" height="300"></canvas>
                                </div>
                                <div class="student-report">
                                    <div class="student-count pseudo-bg-blue">
                                        <h4 class="item-title">Jumlah Hadir</h4>
                                        <div class="item-number"><?php echo $hari_masuk; ?></div>
                                    </div>
                                    <div class="student-count pseudo-bg-yellow">
                                        <h4 class="item-title">Jumlah tidak Hadir</h4>
                                        <div class="item-number"><?php echo $hari_kerja; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area End Here -->
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
 <script>
        (function($) {
            "use strict";
            if ($("#student-chart").length) {
                var doughnutChartData = {
                    labels: ["Siswa Perempuan", "Siswa Laki-Laki"],
                    datasets: [{
                        backgroundColor: ["#304ffe", "#ffa601"],
                        data: [<?php echo $hari_masuk; ?>, <?php echo $hari_kerja; ?>],
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
