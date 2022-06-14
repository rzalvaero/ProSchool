<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
	<div class="mobile-sidebar-header d-md-none">
		<div class="header-logo">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo1.png" alt="logo"></a>
		</div>
	</div>
	<?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
		<div class="sidebar-menu-content">
			<ul class="nav nav-sidebar-menu sidebar-toggle-view">
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link">
						<i class="flaticon-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Akademik</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>guru" class="nav-link"><i class="fas fa-angle-right"></i>Guru</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>walikelas" class="nav-link"><i class="fas fa-angle-right"></i>Guru Kelas/Wali Kelas</a>
						</li>
						<li class="nav-item">
					        <a href="<?php echo base_url(); ?>wali_murid/wali_murid" class="nav-link"><i class="fas fa-angle-right"></i><span>Wali Murid</span></a>
				        </li>
				        <li class="nav-item">
							<a href="<?php echo base_url(); ?>siswa" class="nav-link"><i class="fas fa-angle-right"></i>Siswa</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kelas" class="nav-link"><i class="fas fa-angle-right"></i>Kelas</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>mapel" class="nav-link"><i class="fas fa-angle-right"></i>Mata Pelajaran</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kompetensi_inti" class="nav-link"><i class="fas fa-angle-right"></i>Kompetensi Inti</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kompetensi_dasar" class="nav-link"><i class="fas fa-angle-right"></i>Kompetinsi Dasar</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>rpp" class="nav-link"><i class="fas fa-angle-right"></i>RPP</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>silabus" class="nav-link"><i class="fas fa-angle-right"></i>Silabus</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>bukukerja" class="nav-link"><i class="fas fa-angle-right"></i>Buku Kerja</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>prota" class="nav-link"><i class="fas fa-angle-right"></i>Prota</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>master/master_kkm" class="nav-link"><i class="fas fa-angle-right"></i>KKM</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>master/master_inteval" class="nav-link"><i class="fas fa-angle-right"></i>Interval Predikat</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kesehatan/kesehatan" class="nav-link"><i class="fas fa-angle-right"></i>Kesehatan</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>LMS</span></a>
					<ul class="nav sub-group-menu">
					    <li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"></i><span>GURU</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>materi" class="nav-link"><i class="fas fa-angle-right"></i><span>Materi</span></a>
								</li>
								<li class="nav-item sidebar-nav-item">
												<a href="#" class="nav-link"><i class="fas fa-angle-right"></i><span>Soal</span></a>
    					<ul class="nav sub-group-menu">
    						<!-- <li class="nav-item">
    									<a href="<?php echo base_url(); ?>soal" class="nav-link"><i class="fas fa-angle-right"></i>Tambah Soal</a>
    								</li> -->
    						<li class="nav-item">
    							<a href="<?php echo base_url(); ?>soal/list" class="nav-link"><i class="fas fa-angle-right"></i>List Soal</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?php echo base_url(); ?>soal/paketsoal" class="nav-link"><i class="fas fa-angle-right"></i>Paket Soal</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?php echo base_url(); ?>ujian/tambahujian" class="nav-link"><i class="fas fa-angle-right"></i>Jadwal Ujian</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?php echo base_url(); ?>ujian/hasilujian" class="nav-link"><i class="fas fa-angle-right"></i>Hasil Ujian</a>
    						</li>
    							</ul>
						</li>
							</ul>
						</li>
					<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"></i><span>SISWA</span></a>
						<ul class="nav sub-group-menu">
							<li class="nav-item sidebar-nav-item">
					            <a href="#" class="nav-link"><i class="fas fa-angle-right"></i><span>Ujian</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>ujian/jadwalujian" class="nav-link"><i class="fas fa-angle-right"></i>Jadwal Ujian</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fas fa-angle-right"></i>Nilai Ujian</a>
						</li>
					    </ul>
				    </li>
							</ul>
						</li>
					</ul>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>E-Raport</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/rincian" class="nav-link"><i class="fas fa-file"></i>Rincian Nilai</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/radar" class="nav-link"><i class="fas fa-file"></i>Radar Nilai Rapor</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/sikap_sp" class="nav-link"><i class="fas fa-file"></i>Nilai Sikap Spritual</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/sikap_so" class="nav-link"><i class="fas fa-file"></i>Nilai Sikap Sosial</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/ekstrakurikuler" class="nav-link"><i class="fas fa-file"></i>Nilai Ekstrakurikuler</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>absen" class="nav-link"><i class="fas fa-file"></i>Kehadiran Siswa</a>
						</li>
						<!--<li class="nav-item">
                                    <a href="<?php echo base_url(); ?>nilai/cetak_rapor" class="nav-link"><i
                                            class="fas fa-file"></i>Cetak Rapor</a>
                                </li>-->
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>cetakrapot" class="nav-link"><i class="fas fa-file"></i>Cetak Rapor</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>cetakrapot/cetak_leger" class="nav-link"><i class="fas fa-file"></i>Cetak Leger Nilai</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="fas fa-users"></i><span>Kesiswaan</span></a>
					<!--isi disni-->
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>kepegawaian/kepegawaian" class="nav-link"><i class="flaticon-open-book"></i><span>Kepegawaian</span></a>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Perpustakaan</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku" class="nav-link"><i class="fas fa-angle-right"></i>Data Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/transaksi" class="nav-link"><i class="fas fa-angle-right"></i>Peminjaman</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/kembali" class="nav-link"><i class="fas fa-angle-right"></i>Pengembalian</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/kategori" class="nav-link"><i class="fas fa-angle-right"></i>Kategori Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/rak" class="nav-link"><i class="fas fa-angle-right"></i>Rak Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/denda" class="nav-link"><i class="fas fa-angle-right"></i>Denda</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>tamu/data" class="nav-link"><i class="flaticon-open-book"></i><span>Buku Tamu</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>PPDB</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>ppdb/data" class="nav-link"><i class="fas fa-angle-right"></i>Calon Pendaftar</a>
						</li>
					</ul>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Keuangan</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>keuangan/pembayaran_siswa" class="nav-link"><i class="fas fa-file"></i>Pembayaran Siswa</a>
						</li>
						<!--	<li class="nav-item">
									<a href="<?php echo base_url(); ?>keuangan/bukti_biaya_transfer_wali_murid" class="nav-link"><i
												class="fas fa-file"></i>Bukti Transfer Wali Murid</a>
								</li> -->
						<li class="nav-item">
							<a href="<?= base_url(); ?>tabungan/tabungan" class="nav-link"><i class="fas fa-file"></i>Tabungan Siswa</a>
						</li>

						<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Kas & Bank</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>keuangan/saldo_awal" class="nav-link"><i class="fas fa-angle-right"></i>Saldo Awal</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>kaskeluar/kas_keluar" class="nav-link"><i class="fas fa-angle-right"></i>Kas Keluar</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>kasmasuk/kas_masuk" class="nav-link"><i class="fas fa-angle-right"></i>Kas Masuk</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url(); ?>transfer/transfer" class="nav-link"><i class="fas fa-angle-right"></i>Transfer Kas</a>
								</li>
								<!--<li class="nav-item">
											<a href="#" class="nav-link"><i
														class="fas fa-angle-right"></i>Rekonsiliasi Bank</a>
										</li> -->
							</ul>
						</li>
						<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Penggajian</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>gaji/slip_gaji" class="nav-link"><i class="fas fa-angle-right"></i>Slip Gaji</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link"><i class="fas fa-angle-right"></i>Kirim Notif Gaji</a>
								</li>
							</ul>
						</li>
						<!--<li class="nav-item sidebar-nav-item">
									<a href="#" class="nav-link"><i
												class="flaticon-multiple-users-silhouette"></i><span>Hutang</span></a>
									<ul class="nav sub-group-menu">
										<li class="nav-item">
											<a href="<?php echo base_url(); ?>keuangan/pos_hutang" class="nav-link"><i class="fas fa-angle-right"></i>Pos Hutang</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo base_url(); ?>keuangan/bayar_hutang" class="nav-link"><i class="fas fa-angle-right"></i>Bayar Hutang</a>
										</li>
									</ul>
								</li> -->
						<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Laporan Keuangan</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>laporan/laporan_jurnal_kas" class="nav-link"><i class="fas fa-file"></i>Laporan Jurnal (Kas)</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>laporan/laporan_kas_bank" class="nav-link"><i class="fas fa-file"></i>Laporan Kas Bank</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>laporan/laporan_unit_pos" class="nav-link"><i class="fas fa-file"></i>Laporan Unit Pos</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>laporan/laporan_neraca" class="nav-link"><i class="fas fa-file"></i>Laporan Neraca</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>laporan/laporan_gaji" class="nav-link"><i class="fas fa-file"></i>Laporan Gaji</a>
								</li>
							</ul>
						</li>
						<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Laporan Tabungan</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>tabungan/tabunganall" class="nav-link"><i class="fas fa-angle-right"></i>Laporan Tabungan Siswa</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>keuangan/kirim_tagihan" class="nav-link"><i class="fas fa-file"></i>Kirim Tagihan</a>
						</li>

					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>kepegawaian/kepegawaian" class="nav-link"><i class="flaticon-bed"></i><span>Manajemen Aset/Sarpras</span></a>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-bed"></i><span>Manajemen Asrama</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>asrama" class="nav-link"><i class="fas fa-angle-right"></i>Daftar Kamar</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>asrama/penghuni" class="nav-link"><i class="fas fa-angle-right"></i>Penghuni Kamar</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link"><i class="flaticon-bed"></i><span>Manajemen Alumni</span></a>
				</li>
				
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>CMS Sekolah</span></a>
					<ul class="nav sub-group-menu">
					    <li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Dashboard Website</a>
						</li>
						<hr/>
						<span style="margin: 0px 0px 0px 60px;color: yellow;">Other</span>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Galeri</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Beasiswa</a>
						</li>
						<hr/>
						<span style="margin: 0px 0px 0px 60px;color: yellow;">Setting CMS</span>
						
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Slider</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Profil</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Kata Pembuka</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>#" class="nav-link"><i class="fas fa-angle-right"></i>Visi Misi</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item">
					<a href="https://app.prodoc.id" class="nav-link" target=_blank><i class="fa fa-file"></i><span>Prodoc E-DMS</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>annoucment" class="nav-link"><i class="flaticon-script"></i><span>Pengumuman</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>management/index" class="nav-link"><i class="flaticon-settings"></i><span>Manajemen User</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>settings" class="nav-link"><i class="flaticon-settings"></i><span>Pengaturan</span></a>
				</li>
				
			</ul>
		</div>
	<?php } elseif ($this->session->userdata('type_users') == "GURU") { ?>
		<div class="sidebar-menu-content">
			<ul class="nav nav-sidebar-menu sidebar-toggle-view">
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link">
						<i class="flaticon-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Akademik</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kelas" class="nav-link"><i class="fas fa-angle-right"></i>Kelas</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kompetensi_inti" class="nav-link"><i class="fas fa-angle-right"></i>Kompetensi Inti</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kompetensi_dasar" class="nav-link"><i class="fas fa-angle-right"></i>Kompetinsi Dasar</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>rpp" class="nav-link"><i class="fas fa-angle-right"></i>RPP</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>silabus" class="nav-link"><i class="fas fa-angle-right"></i>Silabus</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>bukukerja" class="nav-link"><i class="fas fa-angle-right"></i>Buku Kerja</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>prota" class="nav-link"><i class="fas fa-angle-right"></i>Prota</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>master/master_kkm" class="nav-link"><i class="fas fa-angle-right"></i>KKM</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>master/master_inteval" class="nav-link"><i class="fas fa-angle-right"></i>Interval Predikat</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>kesehatan/kesehatan" class="nav-link"><i class="fas fa-angle-right"></i>Kesehatan</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>materi" class="nav-link"><i class="flaticon-calendar"></i><span>Materi</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>absen" class="nav-link"><i class="flaticon-checklist"></i><span>Absensi</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Soal</span></a>
					<ul class="nav sub-group-menu">
						<!-- <li class="nav-item">
									<a href="<?php echo base_url(); ?>soal" class="nav-link"><i class="fas fa-angle-right"></i>Tambah Soal</a>
								</li> -->
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>soal/list" class="nav-link"><i class="fas fa-angle-right"></i>List Soal</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>soal/paketsoal" class="nav-link"><i class="fas fa-angle-right"></i>Paket Soal</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>ujian/tambahujian" class="nav-link"><i class="fas fa-angle-right"></i>Jadwal Ujian</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>ujian/hasilujian" class="nav-link"><i class="fas fa-angle-right"></i>Hasil Ujian</a>
						</li>
					</ul>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Nilai</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/rincian" class="nav-link"><i class="fas fa-file"></i>Rincian Nilai</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/radar" class="nav-link"><i class="fas fa-file"></i>Radar Nilai Rapor</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/sikap_sp" class="nav-link"><i class="fas fa-file"></i>Nilai Sikap Spritual</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/sikap_so" class="nav-link"><i class="fas fa-file"></i>Nilai Sikap Sosial</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>nilai/ekstrakurikuler" class="nav-link"><i class="fas fa-file"></i>Nilai Ekstrakurikuler</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>absen/siswa" class="nav-link"><i class="fas fa-file"></i>Kehadiran Siswa</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>cetakrapot" class="nav-link"><i class="fas fa-file"></i>Cetak Rapor</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>cetakrapot/cetak_leger" class="nav-link"><i class="fas fa-file"></i>Cetak Leger Nilai</a>
						</li>
					</ul>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Perpustakaan</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku" class="nav-link"><i class="fas fa-angle-right"></i>Data Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/transaksi" class="nav-link"><i class="fas fa-angle-right"></i>Peminjaman</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/kembali" class="nav-link"><i class="fas fa-angle-right"></i>Pengembalian</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/kategori" class="nav-link"><i class="fas fa-angle-right"></i>Kategori Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/rak" class="nav-link"><i class="fas fa-angle-right"></i>Rak Buku</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/denda" class="nav-link"><i class="fas fa-angle-right"></i>Denda</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>annoucment" class="nav-link"><i class="flaticon-script"></i><span>Pengumuman</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>news" class="nav-link"><i class="flaticon-chat"></i><span>Berita</span></a>
				</li>
			</ul>
		</div>
	<?php } else { ?>
		<div class="sidebar-menu-content">
			<ul class="nav nav-sidebar-menu sidebar-toggle-view">
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link">
						<i class="flaticon-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Profil</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>profile" class="nav-link"><i class="fas fa-angle-right"></i>Profil Siswa</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>wali_murid/wali_murid" class="nav-link"><i class="fas fa-angle-right"></i>Wali Siswa</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>materi" class="nav-link"><i class="flaticon-calendar"></i><span>Materi</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>meet" class="nav-link"><i class="flaticon-planet-earth"></i><span>Pertemuan Virtual</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Ujian</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>ujian/jadwalujian" class="nav-link"><i class="fas fa-angle-right"></i>Jadwal Ujian</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fas fa-angle-right"></i>Nilai Ujian</a>
						</li>
					</ul>
				</li>
				<!--<li class="nav-item sidebar-nav-item">
							<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Nilai</span></a>
							<ul class="nav sub-group-menu">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/rincian" class="nav-link"><i class="fas fa-file"></i>Rincian Nilai</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/radar" class="nav-link"><i class="fas fa-file"></i>Radar Nilai Rapor</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/sikap" class="nav-link"><i class="fas fa-file"></i>Nilai Sikap</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/ekstrakurikuler" class="nav-link"><i class="fas fa-file"></i>Nilai Ekstrakurikuler</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/kehadiran_siswa" class="nav-link"><i class="fas fa-file"></i>Kehadiran Siswa</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/cetak_rapor" class="nav-link"><i class="fas fa-file"></i>Cetak Rapor</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>cetakrapot/" class="nav-link"><i class="fas fa-file"></i>Cetak</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>nilai/leger" class="nav-link"><i class="fas fa-file"></i>Cetak Leger Nilai</a>
								</li>
							</ul>
						</li>
						-->



				<li class="nav-item">
					<a href="#" class="nav-link"><i class="flaticon-open-book"></i><span>Mata Pelajaran</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>absen" class="nav-link"><i class="flaticon-checklist"></i><span>Absensi</span></a>
				</li>
				<li class="nav-item sidebar-nav-item">
					<a href="#" class="nav-link"><i class="flaticon-books"></i><span>Perpustakaan</span></a>
					<ul class="nav sub-group-menu">
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>buku/transaksi" class="nav-link"><i class="fas fa-angle-right"></i>Transaksi Peminjaman</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>annoucment" class="nav-link"><i class="flaticon-script"></i><span>Pengumuman</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>news" class="nav-link"><i class="flaticon-chat"></i><span>Berita</span></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>cetak/kartu" target="_blank" class="nav-link"><i class="flaticon-books"></i><span>Cetak Kartu Siswa</span></a>
				</li>

			</ul>
		</div>
	<?php } ?>
</div>