<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Elearning | ProShool</title>
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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
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
                    <ul>
                        <!--<li>
                            <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>ProSchool</li>-->
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <?php
                            //LIST SETTING
                            if ($page == 'setting_web') {
                                $this->load->view('settings/web');
                            } elseif ($page == 'sekolah_unit') {
                                $this->load->view('settings/sekolah_unit');
                            } elseif ($page == 'sekolah') {
                                $this->load->view('settings/sekolah');
                            } elseif ($page == 'setting_image') {
                                $this->load->view('settings/images');
                            } elseif ($page == 'setting_reset') {
                                $this->load->view('settings/reset');
                            } elseif ($page == 'setting_backup') {
                                $this->load->view('settings/backup');
                            } elseif ($page == 'setting_guru') {
                                $this->load->view('profile/profile_guru');
                            } elseif ($page == 'setting_siswa') {
                                $this->load->view('profile/profile_siswa');
                            } elseif ($page == 'profile_guru') {
                                $this->load->view('profile/detail_guru');
                            } elseif ($page == 'profile_siswa') {
                                $this->load->view('profile/detail_siswa');
                            } elseif ($page == 'Kode_Kelompok') {
                                $this->load->view('keuangan/kode_kelompok');
                            } elseif ($page == 'materi') {
                                $this->load->view('data/materi');
                            }
                            //LIST DATA
                            elseif ($page == 'ppdb') {
                                $this->load->view('data/ppdb');
                            }
                            //LIST ASRAMA
                            elseif ($page == 'asrama') {
                                $this->load->view('asrama/kamar');
                            } elseif ($page == 'asrama_penghuni') {
                                $this->load->view('serverData/kamar_penghuni');
                            } elseif ($page == 'asrama_setting') {
                                $this->load->view('asrama/kamar_setting');
                            }
                            //LIST AKADEMIK
                            elseif ($page == 'bukukerja') {
                                $this->load->view('akademik/bukukerja');
                            } elseif ($page == 'prota') {
                                $this->load->view('akademik/prota');
                            } elseif ($page == 'rpp') {
                                $this->load->view('akademik/rpp');
                            } elseif ($page == 'add_rpp') {
                                $this->load->view('akademik/add_rpp');
							} elseif ($page == 'edit_rpp') {
                                $this->load->view('akademik/edit_rpp');
                            }
                            //LIST AKADEMIN
                            elseif ($page == 'silabus') {
                                $this->load->view('serverData/silabus');
                            } elseif ($page == 'add_silabus') {
                                $this->load->view('akademik/add_silabus');
                            } elseif ($page == 'kompetensi_inti') {
                                $this->load->view('akademik/kompetensi_inti');
						    } elseif ($page == 'editkompetensi_inti') {
                                $this->load->view('akademik/editkompetensi_inti');
                            } elseif ($page == 'kompetensi_dasar') {
                                $this->load->view('akademik/kompetensi_dasar');
							} elseif ($page == '_kompetensi_dasar') {
                                $this->load->view('akademik/_kompetensi_dasar');
                            }
                            //LIST DATA
                            elseif ($page == 'pengumuman') {
                                $this->load->view('data/notice');
							} elseif ($page == 'absen') {
                                $this->load->view('data/absen');
							} elseif ($page == 'absen_siswa') {
                                $this->load->view('data/absen_siswa');
							} elseif ($page == 'absen_kelas') {
                                $this->load->view('data/absen_kelas');
							} elseif ($page == 'berita') {
                                $this->load->view('data/berita');
                            } elseif ($page == 'virtual') {
                                $this->load->view('data/virtual');
                            }
                            //LIST GURU
                            elseif ($page == 'guru') {
                                $this->load->view('serverData/guru');
                            } elseif ($page == 'add_guru') {
                                $this->load->view('guru/add_guru');
                            }

                            //LIST SISWA
                            elseif ($page == 'siswa') {
                                $this->load->view('serverData/siswa');
                            } elseif ($page == 'add_siswa') {
                                $this->load->view('siswa/add_siswa');
                            }
                            //LIST BUKU
                            elseif ($page == 'tamu') {
                                $this->load->view('data/tamu');
                            }
                            //LIST BUKU
                            elseif ($page == 'buku') {
                                $this->load->view('buku/buku');
                            } elseif ($page == 'buku_detail') {
                                $this->load->view('buku/buku_detail');
                            } elseif ($page == 'buku_transaksi') {
                                $this->load->view('buku/buku_transaksi');
                            } elseif ($page == 'buku_kategori') {
                                $this->load->view('buku/buku_kategori');
                            } elseif ($page == 'buku_rak') {
                                $this->load->view('buku/buku_rak');
                            } elseif ($page == 'buku_denda') {
                                $this->load->view('buku/buku_denda');
                            } elseif ($page == 'buku_kembali') {
                                $this->load->view('buku/buku_kembali');
                            }
                            //SOAL
                            elseif($page == 'soal') {
                                $this->load->view('soal/soal');
                            }
                            elseif($page == 'listsoal') {
                                $this->load->view('soal/listsoal');
                            }
                            elseif($page == 'paketsoal') {
                                $this->load->view('soal/paketsoal');
                            }
                            elseif($page == 'tambahujian') {
                                $this->load->view('soal/tambahujian');
                            }
                            elseif($page == 'hasilujian') {
                                $this->load->view('soal/hasilujian');
                            }
                             elseif($page == 'hasilujiandetail') {
                                $this->load->view('soal/hasilujiandetail');
                            }
                            elseif($page == 'jadwalujian') {
                                $this->load->view('soal/jadwalujian');
                            }
                             elseif($page == 'ujiansiswa') {
                                $this->load->view('soal/ujiansiswa');
                            }
                              elseif($page == 'tampilsoal') {
                                $this->load->view('soal/tampilsoal');
                            }
                            elseif($page == 'hasilujiansiswa') {
                                $this->load->view('soal/hasilujiansiswa');
                            }
                            //LIST KELAS
                            elseif ($page == 'kelas') {
                                $this->load->view('data/kelas');
                            }
							//LIST waliKELAS
                            elseif ($page == 'walikelas') {
                                $this->load->view('data/walikelas');
                            }
                            //LIST MAPEL
                            elseif ($page == 'mapel') {
                                $this->load->view('data/mapel');
                            }
                            //LIST NILAI
                            elseif ($page == 'nilai_leger') {
                                $this->load->view('data/nilai_leger');
                            } elseif ($page == 'nilai_sikap_sp') {
                                $this->load->view('data/nilai_sikap_sp');
							} elseif ($page == 'nilai_sikap_so') {
                                $this->load->view('data/nilai_sikap_so');
                            } elseif ($page == 'nilai_ekstrasiswa') { 
                                $this->load->view('data/nilai_ekstrasiswa');
							} elseif ($page == 'nilai_ekstrakurikuler') {
                                $this->load->view('data/nilai_ekstrakurikuler');
                            } elseif ($page == 'nilai_radar') {
                                $this->load->view('data/nilai_radar');
							} elseif ($page == 'nilai_siswa_chart') {
                                $this->load->view('data/nilai_siswa_chart');
							} elseif ($page == 'nilai_seluruh_siswa_chart') {
                                $this->load->view('data/nilai_seluruh_siswa_chart');
                            } elseif ($page == 'nilai_rincian') {
                                $this->load->view('data/nilai_rincian');
                            } elseif ($page == 'cetak_rapor') {
                                $this->load->view('data/cetak_rapor');
                            } elseif ($page == 'kehadiran_siswa') {
                                $this->load->view('data/kehadiran_siswa');
                            } elseif ($page == 'pos_pembayaran') {
                                $this->load->view('keuangan/pos_pembayaran/pos_pembayaran');
                            } elseif ($page == 'jenis_pembayaran') {
                                $this->load->view('keuangan/jenis_bayar/jenis_pembayaran');
                            } elseif ($page == 'tarif_bayar') {
                                $this->load->view('keuangan/jenis_bayar/tarif_pembayaran');
                            } elseif ($page == 'tarif_bayar_kelas') {
                                $this->load->view('keuangan/jenis_bayar/tarif_pembayaran_kelas');
                            } elseif ($page == 'tarif_bayar_siswa') {
                                $this->load->view('keuangan/jenis_bayar/tarif_pembayaran_siswa');
                            } elseif ($page == 'pajak_keuangan') {
                                $this->load->view('keuangan/pajak_keuangan/pajak_keuangan');
                            } elseif ($page == 'unit_pos') {
                                $this->load->view('keuangan/unit_pos/unit_pos');
                            } elseif ($page == 'tarif_pos_unit') {
                                $this->load->view('keuangan/unit_pos/tarif_unit_pos');
                            } elseif ($page == 'tarif_pos_unit_beban') {
                                $this->load->view('keuangan/unit_pos/tarif_unit_pos_beban');
                            } elseif ($page == 'setting_tarif_unit_pos') {
                                $this->load->view('keuangan/setting_tarif_unit_pos');
                            } elseif ($page == 'bukti_biaya_transfer_wali_murid') {
                                $this->load->view('keuangan/bukti_biaya_transfer_wali_murid');
                            } elseif ($page == 'saldo_awal') {
                                $this->load->view('keuangan/saldo_awal');
                            } elseif ($page == 'saldo_keluar') {
                                $this->load->view('keuangan/saldo_keluar');
                            } elseif ($page == 'kas_masuk') {
                                $this->load->view('keuangan/kas_masuk');
                            }
                            
                            //rapot new
                             elseif($page == 'cetak_rapot') {
                                $this->load->view('rapot/cetak_rapot');
                            }
                            elseif($page == 'cetak_list') {
                                $this->load->view('rapot/list');
                            }
                             elseif($page == 'cetak_prestasi') {
                                $this->load->view('rapot/cetak_prestasi');
                            }
                             elseif($page == 'cetak_sampul1') {
                                $this->load->view('rapot/cetak_sampul1');
                            }
                             elseif($page == 'cetak_sampul2') {
                                $this->load->view('rapot/cetak_sampul2');
                            }
                             elseif($page == 'cetak_sampul4') {
                                $this->load->view('rapot/cetak_sampul4');
                            }
							//cetak leger
							 elseif($page == 'cetak_leger') {
                                $this->load->view('leger/cetak');
                            }
                             elseif($page == 'cetak_ekstra') {
                                $this->load->view('leger/cetak_ekstra');
                            }
                             elseif($page == 'lager_landing') {
                                $this->load->view('leger/landing');
                            }
							 elseif($page == '_kompetensi_dasar') {
                                $this->load->view('guru/_kompetensi_dasar');
                            }
							
                            //gaji
                            elseif ($page == 'setting_gaji') {
                                $this->load->view('gaji/setting_gaji');
                            } elseif ($page == 'tarif_gaji_detail') {
                                $this->load->view('gaji/tarif_gaji_detail');
                            } elseif ($page == 'setting_tunjangan') {
                                $this->load->view('gaji/setting_tunjangan/setting_tunjangan');
                            } elseif ($page == 'setting_potongan') {
                                $this->load->view('gaji/setting_potongan/setting_potongan');
                            } elseif ($page == 'setting_pendapatan_lain_lain') {
                                $this->load->view('gaji/setting_pendapatan_lain_lain/setting_pendapatan_lain_lain');
                            } elseif ($page == 'slip_gaji') {
                                $this->load->view('keuangan/slip_gaji');
                            } elseif ($page == 'setting_hutang') {
                                $this->load->view('keuangan/setting_hutang');
                            } elseif ($page == 'pos_hutang') {
                                $this->load->view('keuangan/pos_hutang');
                            } elseif ($page == 'bayar_hutang') {
                                $this->load->view('keuangan/bayar_hutang');
                            } elseif ($page == 'kirim_tagihan') {
                                $this->load->view('keuangan/kirim_tagihan');
                            } elseif ($page == 'akun_biaya') {
                                $this->load->view('keuangan/akun_biaya/akun_biaya');
                            } elseif ($page == 'akun_biaya_utama_add') {
                                $this->load->view('keuangan/akun_biaya/akun_biaya_utama_add');
                            } elseif ($page == 'laporan_jurnal_kas') {
                                $this->load->view('laporan/laporan_jurnal_kas');
                            } elseif ($page == 'laporan_kas_bank') {
                                $this->load->view('laporan/laporan_kas_bank');
                            } elseif ($page == 'laporan_unit_pos') {
                                $this->load->view('laporan/laporan_unit_pos');
                            } elseif ($page == 'laporan_neraca') {
                                $this->load->view('laporan/laporan_neraca');
                            } elseif ($page == 'laporan_gaji') {
                                $this->load->view('laporan/laporan_gaji');
                            }
                            //bangunan dan sarana
                            elseif ($page == 'tanah_bangunan') {
                                $this->load->view('sarpras/tanah_bangunan');
                            } elseif ($page == 'tambah_tanah_bangunan') {
                                $this->load->view('sarpras/tambah_tanah_bangunan');
                            }
                            //jabatan & kepegawaaian
                            elseif ($page == 'setting_jabatan') {
                                $this->load->view('kepegawaian/jabatan/jabatan');
                            } elseif ($page == 'kepegawaian') {
                                $this->load->view('kepegawaian/kepegawaian');
                            } elseif ($page == 'add_kepegawaian') {
                                $this->load->view('kepegawaian/add_kepegawaian');
                            }
                            //kkm
                            elseif ($page == 'master_kkm') {
                                $this->load->view('master_kkm/kkm');
                            } elseif ($page == 'master_interval') {
                                $this->load->view('master_kkm/interval');
                            }
                            //setting sikap
                            elseif ($page == 'setting_sikap') {
                                $this->load->view('sikap/setting_sikap/sikap');
                            } elseif ($page == 'sikap') {
                                $this->load->view('sikap/butir_sikap');
                            } elseif ($page == 'ekstra') {
                                $this->load->view('ekstra/ekstra');
                            } elseif ($page == 'kesehatan') {
                                $this->load->view('kesehatan/kesehatan');
							} elseif ($page == 'edit_kesehatan') {
                                $this->load->view('kesehatan/edit_kesehatan');
                            }
                            //pembayaran
                            elseif ($page == 'pembayaran') {
                                $this->load->view('pembayaran/pembayaran');
                            }

                            //tanggal_gajian
                            elseif ($page == 'tanggal_gajian') {
                                $this->load->view('gaji/tanggal_gajian');
                            }
                            //tanggal_gajian
                          
							elseif($page == 'slip_gaji') {
								$this->load->view('gaji/slip_gaji');
							}
							elseif ($page == 'pembayaran'){
								$this->load->view('pembayaran/pembayaran');
							}
							elseif($page == 'pembayaran_siswa') {
								$this->load->view('keuangan/pembayaran_siswa');
							}
							elseif($page == 'pembayaran_siswa_detail') {
								$this->load->view('keuangan/pembayaran_detail');
							}
							elseif($page == 'dasindex') {
								$this->load->view('das/das');
							}
							elseif($page == 'das_kategori') {
								$this->load->view('das/das_kategori');
							}
							elseif($page == 'das_sumber_dana') {
								$this->load->view('das/das_sumber_dana');
							}
							elseif($page == 'wali_murid') {
								$this->load->view('wali_murid/wali_murod');
							}
							elseif($page == 'tabungan') {
								$this->load->view('tabungan/tabungan');
							}
							elseif($page == 'tabunganall') {
								$this->load->view('tabungan/tabunganall');
							}
							elseif($page == 'cetakalltabungan') {
								$this->load->view('cetak/cetakalltabungan');
							}
							elseif($page == 'cetaktabunganiduser') {
								$this->load->view('cetak/cetaktabunganiduser');
							}
							elseif($page == 'kaskeluar') {
								$this->load->view('kaskeluar/kaskeluar');
							}
							
							elseif($page == 'transfer') {
								$this->load->view('transfer/transfer');
							}
							/*Management user*/
							elseif($page == 'management') {
								$this->load->view('management/management');
							}

                            ?>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->
                <?php include "includes/footer.php" ?>
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
    <!-- Select 2 Js -->
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <!--<script src="<?php echo base_url(); ?>assets/js/datepicker.min.js"></script>-->
    <!-- Scroll Up Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!--//jquery input mask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.15/inputmask.es6.js" integrity="sha512-c3belhfQUuE+ArO2kB1+5OKtdlorl1McPevmAaSCqfLzIORlman15Hj7Dfda/IGmUNFfxcJLy2wGYL7T9VV18w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>