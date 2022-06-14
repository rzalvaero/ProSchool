<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.6/css/bootstrap.min.css"/>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
<!-- Add Notice Area Start Here -->
<?php if ($this->session->userdata('type_users') == "GURU") { ?>
<div class="col-12-xxxl col-12 ">
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Pembayaran</h3>
				</div>
				<div class="dropdown">

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
			<form class="new-added-form" action="<?php echo base_url() . 'pembayaran/proses_cari_siswa'; ?>"
				  method="post">
				<div class="row">
					<div class="col-4 form-group">
						<label>Tahun Ajaran</label>
						<select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
							<option selected="selected">Tahun</option>

							<?php
							$tg_awal = date('Y') - 2;
							$tgl_akhir = date('Y') + 2;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>

					<div class="col-8 form-group">
						<label>Cari Siswa</label>
						<select name="nis" id="nis " class="select2">
							<option value="">Pilih Siswa</option>
							<?php
							$db = $this->db->query("SELECT s_nisn as nis,s_nama as nama_siswa,k_keterangan as nama_kelas FROM sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas order by s_nama asc")->result();
							foreach ($db as $row) {
								echo "<option value='$row->nis'>$row->nis - $row->nama_siswa</option>";
							}
							?>
						</select>
						<!--								<input id="cari-siswa" type="text" class="form-control " width="100" autofocus name="nis" placeholder="Nama Siswa" required>-->

					</div>


					<div class="col-12 form-group mg-t-8">
						<button style="float:right;" type="submit"
								class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-12-xxxl col-12">
	<?php echo $this->session->flashdata("msg"); ?>
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Informasi Siswa</h3>

				</div>
			</div>
			<div class="box box-success">
				<div class="box-header with-border">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Akun</label>
								<select name="akun_biaya" id="akun_biaya" class="select2 form-control">
									<option value="">Pilih Akun</option>
									<?php
									$db = $this->db->query("select * from sr_account where modul_keuangan = 'pendapatan'")->result();
									foreach ($db as $item):
										?>
										<option value="<?= $item->id_akun; ?>"><?= $item->kode_akun . '-' . $item->keterangan ?></option>
									<?php endforeach; ?>

								</select>
							</div>
						</div>
					</div>
					<!--							<h3 class="box-title">Informasi Siswa</h3>-->
				</div><!-- /.box-header -->
				<div class="box-body">
					<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill"
							   href="#data-siswa" role="tab" aria-controls="custom-content-below-home"
							   aria-selected="true">Informasi Data Siswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
							   href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile"
							   aria-selected="false">Transaksi Trakhir</a>
						</li>
					</ul>
					<div class="tab-content" id="custom-content-below-tabContent">
						<div class="tab-pane fade active show" id="data-siswa" role="tabpanel"
							 aria-labelledby="custom-content-below-home-tab">

							<div class="row">
								<div class="col-md-9">
									<table class="table table-bordered table-hover table-striped" style="width:100%"
									">
									<tbody>
									<tr>
										<td width="200">Tahun Ajaran</td>
										<td width="4">:</td>
										<td><strong>
												<!--															if null-->
												<?php
												if (!empty($tahun_ajaran)) {
													echo $tahun_ajaran;

												} else {
													'-';
												}
												?>
												<strong></td>
									</tr>
									<tr>
										<td>NIS</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($nis)) {

												echo $nis;

											} else {
												'-';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Nama Siswa</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($nama_siswa)) {

												echo $nama_siswa;

											} else {
												'-';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Unit Sekolah</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($unit)) {

												echo $unit;

											} else {
												'-';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Kelas</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($nama_kelas)) {

												echo $nama_kelas;

											} else {
												'-';
											}
											?>
										</td>
									</tr>
									<!--										<tr>-->
									<!--											<td>No. Whatsapp Ortu</td>-->
									<!--											<td>:</td>-->
									<!--											<td></td>-->
									<!--										</tr>-->
									</tbody>
									</table>
								</div>

								<div class="col-md-3">

									<img src="https://demo.adminsekolah.net/media/img/user.png"
										 class="img-thumbnail img-responsive">
								</div>

							</div>
						</div>
						<div class="tab-pane fade" id="data-transaksi" role="tabpanel"
							 aria-labelledby="custom-content-below-profile-tab">
							<div class="row">
								<div class="col-md-9">
									<div style="overflow-y:scroll;height:200px;">
										<table class="table table-bordered table-hover table-striped"
											   style="width:100%">
											<thead>
											<tr>
												<th class="text-sm">Pembayaran</th>
												<th class="text-sm">Bayar</th>
												<th class="text-sm">Tanggal</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if (!empty($pembayaran_bulanan_terakhir)) { ?>

												<?php foreach ($pembayaran_bulanan_terakhir->result_array() as $data) { ?>
													<tr>
														<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
														<td>Rp. <?php echo number_format($data['bayar']); ?></td>
														<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
													</tr>
												<?php } ?>

												<?php foreach ($pembayaran_bebas_terakhir->result_array() as $data) { ?>
													<tr>
														<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
														<td>Rp. <?php echo number_format($data['bayar']); ?></td>
														<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
													</tr>
												<?php } ?>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>

								<div class="col-md-3">

									<img src="https://demo.adminsekolah.net/media/img/user.png"
										 class="img-thumbnail img-responsive">
								</div>

							</div>

						</div>

					</div>
					<div class="custom-tab">
						<ul class="nav nav-tabs">
							<li class="active"><a class="nav-link" href="#tab_1" data-toggle="tab">Bulanan</a>
							</li>
							<li><a href="#tab_2" class="nav-link" data-toggle="tab">Bebas</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">

								<?php
								if (!empty($jenis_pembayaran_bulanan)) { ?>

									<?php foreach ($jenis_pembayaran_bulanan->result_array() as $data) {
										$q_tagihan = $this->db->query("select * from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa");
										$sisa_tagihan = $this->db->query("SELECT SUM(tagihan) as hitung FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa AND bayar = 0")->row();
										?>
										<div class="table-responsive">
											<table class="table table-bordered table-hover table-striped"
												   style="white-space: nowrap;">
												<thead>
												<tr>
													<th class="text-sm">Nama Pembayaran</th>
													<th class="text-sm">Sisa Tagihan</th>


													<?php foreach ($q_tagihan->result_array() as $d_tagihan) { ?>
														<th class="text-sm"><?php echo $d_tagihan['bulan']; ?></th>
													<?php } ?>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
													<td class="text-sm" style="background-color: yellow">
														Rp <?php echo number_format($sisa_tagihan->hitung); ?></td>
													<?php foreach ($q_tagihan->result_array() as $d_tagihan) {
														if ($d_tagihan['bayar'] == 0) {
															$style = 'style="background:red;color:#fff;"';
															$class = 'class="bayar-bulanan"';
															$confirm = 'Yakin Ingin Melakukan Pembayaran Pada Bulan Ini ?';
															$tagihan = 'Rp ' . number_format($d_tagihan['tagihan']);
														} else {
															$style = 'style="background:green;color:#fff;"';
															$class = 'class="hapus-bulanan"';
															$tagihan = date("d/m/Y", strtotime($d_tagihan['tanggal']));
															$confirm = 'Yakin Ingin Menghapus Pembayaran Pada Bulan Ini ?';
														}
														?>
														<td class="text-sm" <?php echo $style; ?>><a
																	style="color:#fff;" <?php echo $class; ?>
																	data-id_pembayaran_bulanan="<?php echo $d_tagihan['id_pembayaran_bulanan']; ?>"
																	data-nis="<?php echo $nis; ?>"
																	data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
																	data-tagihan="<?php echo $d_tagihan['tagihan']; ?>"
																	href=""><?php echo $tagihan; ?></a></td>
													<?php } ?>
												</tr>
												</tbody>
											</table>
										</div>
									<?php } ?>
								<?php } ?>

							</div>
							<div class="tab-pane" id="tab_2">
								<!-- End List Tagihan Bulanan -->

								<!-- List Tagihan Lainnya (Bebas) -->

								<div class="box-body">

									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped"
											   style="width:100%">
											<thead>
											<tr>
												<th>No</th>
												<th>Nama Pembayaran</th>
												<th>Sisa Tagihan</th>
												<th>Dibayar</th>
												<th>Status Bayar</th>
												<th>Aksi</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$no = 1;
											if (!empty($jenis_pembayaran_bebas)) {

												foreach ($jenis_pembayaran_bebas->result_array() as $data) {
													$q_tagihan = $this->db->query("SELECT * FROM sr_pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
													$bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
													$sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
													if ($sisa_tagihan > 0) {
														$status = '<button type="button" style="color:red;border: none" class="F"">Belum Lunas  <i class="fa fa-list-alt"> </i> </a>';
														$class = 'style="color:red;"';
													} else {
														$status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> Lunas <i class="fa fa-list-alt"> </i> </a>';
														$class = 'style="color:green;"';
													}
													?>
													<tr>
														<td><?php echo $no; ?></td>
														<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
														<td <?php echo $class; ?>>
															Rp <?php echo number_format($sisa_tagihan); ?></td>
														<td <?php echo $class; ?>>
															Rp <?php echo number_format($bayar->hitung); ?></td>
														<td <?php echo $class; ?>>
															<?php
															echo $status;
															?>
														</td>
														<td <?php echo $class; ?>>
															<?php if ($sisa_tagihan > 0) { ?>
																<a class="btn btn-success btn-xs bayar-bebas" href=""
																   data-toggle="modal" data-target="#modalAdd"
																   data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>"
																   data-nis="<?php echo $nis; ?>"
																   data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
																   data-tagihan="<?php echo $sisa_tagihan; ?>"
																   data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>"
																   data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i
																			class="fa fa-money"> </i> Bayar </a>
															<?php } ?>
														</td>
														<td>
															<?php if ($bayar->hitung > 0) { ?>
																<a class="btn btn-xs btn-danger"
																   href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>"
																   target="_blank"><i class="fa fa-print"> </i> Cetak
																</a>
															<?php } ?>
														</td>

													</tr>
													<?php $no++;
												}
											} ?>
											</tbody>
										</table>
									</div>
								</div>

							</div>

						</div>
					</div>
					<br>
					<div class="col-md-12">
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">Tagihan Bulanan</h3>
								<!-- /.card-tools -->
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table table-bordered table-hover table-striped" style="width:100%">
									<thead>
									<tr>
										<th class="text-sm">No</th>
										<th class="text-sm">Nama Pembayaran</th>
										<th class="text-sm">Total Tagihan</th>
										<th class="text-sm">Sudah Dibayar</th>
										<th class="text-sm text-center">Status</th>
										<th class="text-sm text-center">Bayar</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									if (!empty($pembayaran_bulanan)) {

										foreach ($pembayaran_bulanan->result_array() as $data) {
											$q_total = $this->db->query("SELECT SUM(tagihan) as hitung_tagihan, SUM(bayar) as hitung_bayar FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = '$data[id_jenis_pembayaran]' AND id_siswa = '$data[id_siswa]'")->row();
											?>
											<tr>
												<td class="text-sm"><?php echo $no; ?></td>
												<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' ' . $data['tahun_ajaran']; ?></td>
												<td class="text-sm">
													Rp. <?php echo number_format($q_total->hitung_tagihan); ?></td>
												<td class="text-sm">
													Rp. <?php echo number_format($q_total->hitung_bayar); ?></td>
												<td class="text-sm text-center">
													<?php
													if ($q_total->hitung_tagihan == $q_total->hitung_bayar) {
														echo '<text style="color:green">Lunas</text>';
													} else {
														echo '<text style="color:red"> Belum Lunas</text>';
													}
													?>
												</td>
												<td class="text-sm text-center">
													<a class="btn btn-info btn-xs btn-flat"
													   href="<?php echo base_url() . 'pembayaran/pembayaran_siswa_detail/' . $data['id_jenis_pembayaran'] . '/' . $data['id_siswa']; ?>"><i
																class="nav-icon fas fa-money-check-alt text-white"> </i>
														Bayar</a>
												</td>
											</tr>
											<?php $no++;
										}
									} ?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<br>
					<div class="box box-primary">
						<div class="col-md-12">
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Tagihan Lainnya</h3>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table class="table table-bordered table-hover table-striped" style="width:100%">
										<thead>
										<tr>
											<th class="text-sm">No</th>
											<th class="text-sm">Nama Pembayaran</th>
											<th class="text-sm">Sisa Tagihan</th>
											<th class="text-sm">Dibayar</th>
											<th class="text-sm">Status Bayar</th>
											<th class="text-sm">Bayar</th>
											<th class="text-sm">Cetak</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$no = 1;
										if (!empty($pembayaran_bebas)) {

											foreach ($pembayaran_bebas->result_array() as $data) {
												$q_tagihan = $this->db->query("SELECT * FROM sr_pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
												$bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
												$sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
												if ($sisa_tagihan > 0) {
													$status = '<a href="" style="color:red;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"><span class="input-group-append">
                  <button type="button" class="btn btn-danger btn-xs btn-flat">Belum Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
													$class = 'style="color:red;"';
												} else {
													$status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> <span class="input-group-append">
                  <button type="button" class="btn btn-success btn-xs btn-flat">Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
													$class = 'style="color:green;"';
												}
												?>
												<tr>
													<td class="text-sm"><?php echo $no; ?></td>
													<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
													<td class="text-sm" <?php echo $class; ?>>
														Rp <?php echo number_format($sisa_tagihan); ?></td>
													<td class="text-sm" <?php echo $class; ?>>
														Rp <?php echo number_format($bayar->hitung); ?></td>
													<td class="text-sm text-center" <?php echo $class; ?>>
														<?php
														echo $status;
														?>
													</td>
													<td class="text-sm text-center" <?php echo $class; ?>>
														<?php if ($sisa_tagihan > 0) { ?>
															<a class="btn btn-info btn-flat btn-xs bayar-bebas" href=""
															   data-toggle="modal" data-target="#modalAdd"
															   data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>"
															   data-nis="<?php echo $nis; ?>"
															   data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
															   data-tagihan="<?php echo $sisa_tagihan; ?>"
															   data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>"
															   data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i
																		class="fa fa-money"> </i> Bayar </a>
														<?php } ?>
													</td>
													<td class="text-sm text-center">
														<?php if ($bayar->hitung > 0) { ?>
															<a class="btn btn-xs btn-flat btn-danger"
															   href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>"
															   target="_blank"><i class="fa fa-print"> </i> Cetak </a>
														<?php } ?>
													</td>

												</tr>
												<?php $no++;
											}
										} ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>

			</div>
		</div>


		<!-- Add Notice Area End Here -->

		<!-- All Notice Area Start Here -->

		<!-- All Notice Area End Here -->
	</div>


	<div class="modal fade" id="modalView">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="tempat-view"></div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="modalAdd">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="info"></div>
					<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post"
						  onsubmit="return cek_bayar(this);">
						<input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
						<input class="nis" type="hidden" name="nis" readonly>
						<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
						<input class="tagihan" type="hidden" name="tagihan" readonly>
						<div class="form-group">
							<label>Nama Pembayaran</label>
							<input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" readonly>
						</div>
						<div class="form-group">
							<label>Sisa Tagihan (Rp)</label>
							<input type="text" class="form-control sisa_tagihan" name="sisa_tagihan" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Bayar</label>
							<input type="text" class="form-control tglcalendar" name="tanggal"
								   value="<?php echo date('d-m-Y'); ?>" required>
						</div>
						<div class="form-group">
							<label>Jumlah Bayar (Rp)</label>
							<input type="text" class="form-control rupiah bayar" name="bayar" required>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>

					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="modalEdit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="info"></div>
					<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_saveedit"
						  method="post" onsubmit="return cek_bayar(this);">
						<input class="id_pembayaran_bebas_dt" type="hidden" name="id_pembayaran_bebas_dt" readonly>
						<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
						<input class="nis" type="hidden" name="nis" readonly>
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control tanggal" name="tanggal" readonly>
						</div>
						<div class="form-group">
							<label>Jumlah Bayar (Rp)</label>
							<input type="text" class="form-control rupiah bayar" name="bayar" required>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<?php } else { ?>


		<div class="col-12-xxxl col-12 ">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Pembayaran</h3>
						</div>
						<div class="dropdown">

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
					<form class="new-added-form" action="<?php echo base_url() . 'pembayaran/proses_cari_siswa'; ?>"
						  method="post">
						<div class="row">
							<div class="col-4 form-group">
								<label>Tahun Ajaran</label>
								<select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
									<option selected="selected">Tahun</option>

									<?php
									$tg_awal = date('Y') - 2;
									$tgl_akhir = date('Y') + 2;
									for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
										echo "<option value='$i'";
										if (date('Y') == $i) {
											echo "selected";
										}
										echo ">$i</option>";
									}
									?>
								</select>
							</div>

							<div class="col-8 form-group">
								<label>Cari Siswa</label>
								<select name="nis" id="nis " class="select2">
									<option value="">Pilih Siswa</option>
									<?php
									$db = $this->db->query("SELECT s_nisn as nis,s_nama as nama_siswa,k_keterangan as nama_kelas FROM sr_siswa
join sr_kelas on sr_siswa.idkelas = sr_kelas.idkelas order by s_nama asc")->result();
									foreach ($db as $row) {
										echo "<option value='$row->nis'>$row->nis - $row->nama_siswa</option>";
									}
									?>
								</select>
								<!--								<input id="cari-siswa" type="text" class="form-control " width="100" autofocus name="nis" placeholder="Nama Siswa" required>-->

							</div>


							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit"
										class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Informasi Siswa</h3>

					</div>
				</div>
				<div class="box box-success">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Akun</label>
									<select name="akun_biaya" id="akun_biaya" class="select2 form-control">
										<option value="">Pilih Akun</option>
										<?php
										$db = $this->db->query("select * from sr_account where modul_keuangan = 'pendapatan'")->result();
										foreach ($db as $item):
											?>
											<option value="<?= $item->id_akun; ?>"><?= $item->kode_akun . '-' . $item->keterangan ?></option>
										<?php endforeach; ?>

									</select>
								</div>
							</div>
						</div>
						<!--							<h3 class="box-title">Informasi Siswa</h3>-->
					</div><!-- /.box-header -->
					<div class="box-body">
						<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill"
								   href="#data-siswa" role="tab" aria-controls="custom-content-below-home"
								   aria-selected="true">Informasi Data Siswa</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
								   href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile"
								   aria-selected="false">Transaksi Trakhir</a>
							</li>
						</ul>
						<div class="tab-content" id="custom-content-below-tabContent">
							<div class="tab-pane fade active show" id="data-siswa" role="tabpanel"
								 aria-labelledby="custom-content-below-home-tab">

								<div class="row">
									<div class="col-md-9">
										<table class="table table-bordered table-hover table-striped" style="width:100%"
										">
										<tbody>
										<tr>
											<td width="200">Tahun Ajaran</td>
											<td width="4">:</td>
											<td><strong>
													<!--															if null-->
													<?php
													if (!empty($tahun_ajaran)) {
														echo $tahun_ajaran;

													} else {
														'-';
													}
													?>
													<strong></td>
										</tr>
										<tr>
											<td>NIS</td>
											<td>:</td>
											<td>
												<?php
												if (!empty($nis)) {

													echo $nis;

												} else {
													'-';
												}
												?>
											</td>
										</tr>
										<tr>
											<td>Nama Siswa</td>
											<td>:</td>
											<td>
												<?php
												if (!empty($nama_siswa)) {

													echo $nama_siswa;

												} else {
													'-';
												}
												?>
											</td>
										</tr>
										<tr>
											<td>Unit Sekolah</td>
											<td>:</td>
											<td>
												<?php
												if (!empty($unit)) {

													echo $unit;

												} else {
													'-';
												}
												?>
											</td>
										</tr>
										<tr>
											<td>Kelas</td>
											<td>:</td>
											<td>
												<?php
												if (!empty($nama_kelas)) {

													echo $nama_kelas;

												} else {
													'-';
												}
												?>
											</td>
										</tr>
										<!--										<tr>-->
										<!--											<td>No. Whatsapp Ortu</td>-->
										<!--											<td>:</td>-->
										<!--											<td></td>-->
										<!--										</tr>-->
										</tbody>
										</table>
									</div>

									<div class="col-md-3">

										<img src="https://demo.adminsekolah.net/media/img/user.png"
											 class="img-thumbnail img-responsive">
									</div>

								</div>
							</div>
							<div class="tab-pane fade" id="data-transaksi" role="tabpanel"
								 aria-labelledby="custom-content-below-profile-tab">
								<div class="row">
									<div class="col-md-9">
										<div style="overflow-y:scroll;height:200px;">
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%">
												<thead>
												<tr>
													<th class="text-sm">Pembayaran</th>
													<th class="text-sm">Bayar</th>
													<th class="text-sm">Tanggal</th>
												</tr>
												</thead>
												<tbody>
												<?php
												if (!empty($pembayaran_bulanan_terakhir)) { ?>

													<?php foreach ($pembayaran_bulanan_terakhir->result_array() as $data) { ?>
														<tr>
															<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
															<td>Rp. <?php echo number_format($data['bayar']); ?></td>
															<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
														</tr>
													<?php } ?>

													<?php foreach ($pembayaran_bebas_terakhir->result_array() as $data) { ?>
														<tr>
															<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
															<td>Rp. <?php echo number_format($data['bayar']); ?></td>
															<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
														</tr>
													<?php } ?>
												<?php } ?>
												</tbody>
											</table>
										</div>
									</div>

									<div class="col-md-3">

										<img src="https://demo.adminsekolah.net/media/img/user.png"
											 class="img-thumbnail img-responsive">
									</div>

								</div>

							</div>

						</div>
						<div class="custom-tab">
							<ul class="nav nav-tabs">
								<li class="active"><a class="nav-link" href="#tab_1" data-toggle="tab">Bulanan</a>
								</li>
								<li><a href="#tab_2" class="nav-link" data-toggle="tab">Bebas</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">

									<?php
									if (!empty($jenis_pembayaran_bulanan)) { ?>

										<?php foreach ($jenis_pembayaran_bulanan->result_array() as $data) {
											$q_tagihan = $this->db->query("select * from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa");
											$sisa_tagihan = $this->db->query("SELECT SUM(tagihan) as hitung FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa AND bayar = 0")->row();
											?>
											<div class="table-responsive">
												<table class="table table-bordered table-hover table-striped"
													   style="white-space: nowrap;">
													<thead>
													<tr>
														<th class="text-sm">Nama Pembayaran</th>
														<th class="text-sm">Sisa Tagihan</th>


														<?php foreach ($q_tagihan->result_array() as $d_tagihan) { ?>
															<th class="text-sm"><?php echo $d_tagihan['bulan']; ?></th>
														<?php } ?>
													</tr>
													</thead>
													<tbody>
													<tr>
														<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
														<td class="text-sm" style="background-color: yellow">
															Rp <?php echo number_format($sisa_tagihan->hitung); ?></td>
														<?php foreach ($q_tagihan->result_array() as $d_tagihan) {
															if ($d_tagihan['bayar'] == 0) {
																$style = 'style="background:red;color:#fff;"';
																$class = 'class="bayar-bulanan"';
																$confirm = 'Yakin Ingin Melakukan Pembayaran Pada Bulan Ini ?';
																$tagihan = 'Rp ' . number_format($d_tagihan['tagihan']);
															} else {
																$style = 'style="background:green;color:#fff;"';
																$class = 'class="hapus-bulanan"';
																$tagihan = date("d/m/Y", strtotime($d_tagihan['tanggal']));
																$confirm = 'Yakin Ingin Menghapus Pembayaran Pada Bulan Ini ?';
															}
															?>
															<td class="text-sm" <?php echo $style; ?>><a
																		style="color:#fff;" <?php echo $class; ?>
																		data-id_pembayaran_bulanan="<?php echo $d_tagihan['id_pembayaran_bulanan']; ?>"
																		data-nis="<?php echo $nis; ?>"
																		data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
																		data-tagihan="<?php echo $d_tagihan['tagihan']; ?>"
																		href=""><?php echo $tagihan; ?></a></td>
														<?php } ?>
													</tr>
													</tbody>
												</table>
											</div>
										<?php } ?>
									<?php } ?>

								</div>
								<div class="tab-pane" id="tab_2">
									<!-- End List Tagihan Bulanan -->

									<!-- List Tagihan Lainnya (Bebas) -->

									<div class="box-body">

										<div class="table-responsive">
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%">
												<thead>
												<tr>
													<th>No</th>
													<th>Nama Pembayaran</th>
													<th>Sisa Tagihan</th>
													<th>Dibayar</th>
													<th>Status Bayar</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php
												$no = 1;
												if (!empty($jenis_pembayaran_bebas)) {

													foreach ($jenis_pembayaran_bebas->result_array() as $data) {
														$q_tagihan = $this->db->query("SELECT * FROM sr_pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
														$bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
														$sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
														if ($sisa_tagihan > 0) {
															$status = '<button type="button" style="color:red;border: none" class="F"">Belum Lunas  <i class="fa fa-list-alt"> </i> </a>';
															$class = 'style="color:red;"';
														} else {
															$status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> Lunas <i class="fa fa-list-alt"> </i> </a>';
															$class = 'style="color:green;"';
														}
														?>
														<tr>
															<td><?php echo $no; ?></td>
															<td><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
															<td <?php echo $class; ?>>
																Rp <?php echo number_format($sisa_tagihan); ?></td>
															<td <?php echo $class; ?>>
																Rp <?php echo number_format($bayar->hitung); ?></td>
															<td <?php echo $class; ?>>
																<?php
																echo $status;
																?>
															</td>
															<td <?php echo $class; ?>>
																<?php if ($sisa_tagihan > 0) { ?>
																	<a class="btn btn-success btn-xs bayar-bebas" href=""
																	   data-toggle="modal" data-target="#modalAdd"
																	   data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>"
																	   data-nis="<?php echo $nis; ?>"
																	   data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
																	   data-tagihan="<?php echo $sisa_tagihan; ?>"
																	   data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>"
																	   data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i
																				class="fa fa-money"> </i> Bayar </a>
																<?php } ?>
															</td>
															<td>
																<?php if ($bayar->hitung > 0) { ?>
																	<a class="btn btn-xs btn-danger"
																	   href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>"
																	   target="_blank"><i class="fa fa-print"> </i> Cetak
																	</a>
																<?php } ?>
															</td>

														</tr>
														<?php $no++;
													}
												} ?>
												</tbody>
											</table>
										</div>
									</div>

								</div>

							</div>
						</div>
						<br>
						<div class="col-md-12">
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Tagihan Bulanan</h3>
									<!-- /.card-tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table class="table table-bordered table-hover table-striped" style="width:100%">
										<thead>
										<tr>
											<th class="text-sm">No</th>
											<th class="text-sm">Nama Pembayaran</th>
											<th class="text-sm">Total Tagihan</th>
											<th class="text-sm">Sudah Dibayar</th>
											<th class="text-sm text-center">Status</th>
											<th class="text-sm text-center">Bayar</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$no = 1;
										if (!empty($pembayaran_bulanan)) {

											foreach ($pembayaran_bulanan->result_array() as $data) {
												$q_total = $this->db->query("SELECT SUM(tagihan) as hitung_tagihan, SUM(bayar) as hitung_bayar FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = '$data[id_jenis_pembayaran]' AND id_siswa = '$data[id_siswa]'")->row();
												?>
												<tr>
													<td class="text-sm"><?php echo $no; ?></td>
													<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' ' . $data['tahun_ajaran']; ?></td>
													<td class="text-sm">
														Rp. <?php echo number_format($q_total->hitung_tagihan); ?></td>
													<td class="text-sm">
														Rp. <?php echo number_format($q_total->hitung_bayar); ?></td>
													<td class="text-sm text-center">
														<?php
														if ($q_total->hitung_tagihan == $q_total->hitung_bayar) {
															echo '<text style="color:green">Lunas</text>';
														} else {
															echo '<text style="color:red"> Belum Lunas</text>';
														}
														?>
													</td>
													<td class="text-sm text-center">
														<a class="btn btn-info btn-xs btn-flat"
														   href="<?php echo base_url() . 'pembayaran/pembayaran_siswa_detail/' . $data['id_jenis_pembayaran'] . '/' . $data['id_siswa']; ?>"><i
																	class="nav-icon fas fa-money-check-alt text-white"> </i>
															Bayar</a>
													</td>
												</tr>
												<?php $no++;
											}
										} ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<br>
						<div class="box box-primary">
							<div class="col-md-12">
								<div class="card card-success">
									<div class="card-header">
										<h3 class="card-title">Tagihan Lainnya</h3>
										<!-- /.card-tools -->
									</div>
									<!-- /.card-header -->
									<div class="card-body">
										<table class="table table-bordered table-hover table-striped" style="width:100%">
											<thead>
											<tr>
												<th class="text-sm">No</th>
												<th class="text-sm">Nama Pembayaran</th>
												<th class="text-sm">Sisa Tagihan</th>
												<th class="text-sm">Dibayar</th>
												<th class="text-sm">Status Bayar</th>
												<th class="text-sm">Bayar</th>
												<th class="text-sm">Cetak</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$no = 1;
											if (!empty($pembayaran_bebas)) {

												foreach ($pembayaran_bebas->result_array() as $data) {
													$q_tagihan = $this->db->query("SELECT * FROM sr_pembayaran_bebas WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa")->row();
													$bayar = $this->db->query("SELECT COALESCE(SUM(bayar),0) as hitung FROM pembayaran_bebas_dt WHERE id_pembayaran_bebas = $q_tagihan->id_pembayaran_bebas")->row();
													$sisa_tagihan = $q_tagihan->tagihan - $bayar->hitung;
													if ($sisa_tagihan > 0) {
														$status = '<a href="" style="color:red;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"><span class="input-group-append">
                  <button type="button" class="btn btn-danger btn-xs btn-flat">Belum Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
														$class = 'style="color:red;"';
													} else {
														$status = '<a href="" style="color:green;" class="history-bayar" data-toggle="modal" data-target="#modalView" data-id_pembayaran_bebas="' . $q_tagihan->id_pembayaran_bebas . '" data-nis="' . $nis . '" data-id_siswa="' . $id_siswa . '" data-tahun_ajaran="' . $tahun_ajaran . '"> <span class="input-group-append">
                  <button type="button" class="btn btn-success btn-xs btn-flat">Lunas</button>
                  <button type="button" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-list-alt"></i> Lihat Detail</button>
                  </span> </a>';
														$class = 'style="color:green;"';
													}
													?>
													<tr>
														<td class="text-sm"><?php echo $no; ?></td>
														<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' - ' . $data['tahun_ajaran']; ?></td>
														<td class="text-sm" <?php echo $class; ?>>
															Rp <?php echo number_format($sisa_tagihan); ?></td>
														<td class="text-sm" <?php echo $class; ?>>
															Rp <?php echo number_format($bayar->hitung); ?></td>
														<td class="text-sm text-center" <?php echo $class; ?>>
															<?php
															echo $status;
															?>
														</td>
														<td class="text-sm text-center" <?php echo $class; ?>>
															<?php if ($sisa_tagihan > 0) { ?>
																<a class="btn btn-info btn-flat btn-xs bayar-bebas" href=""
																   data-toggle="modal" data-target="#modalAdd"
																   data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>"
																   data-nis="<?php echo $nis; ?>"
																   data-tahun_ajaran="<?php echo $tahun_ajaran; ?>"
																   data-tagihan="<?php echo $sisa_tagihan; ?>"
																   data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>"
																   data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i
																			class="fa fa-money"> </i> Bayar </a>
															<?php } ?>
														</td>
														<td class="text-sm text-center">
															<?php if ($bayar->hitung > 0) { ?>
																<a class="btn btn-xs btn-flat btn-danger"
																   href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>"
																   target="_blank"><i class="fa fa-print"> </i> Cetak </a>
															<?php } ?>
														</td>

													</tr>
													<?php $no++;
												}
											} ?>
											</tbody>
										</table>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
						</div>
					</div>

				</div>
			</div>


			<!-- Add Notice Area End Here -->

			<!-- All Notice Area Start Here -->

			<!-- All Notice Area End Here -->
		</div>


		<div class="modal fade" id="modalView">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="tempat-view"></div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

		<div class="modal fade" id="modalAdd">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="info"></div>
						<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post"
							  onsubmit="return cek_bayar(this);">
							<input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
							<input class="nis" type="hidden" name="nis" readonly>
							<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
							<input class="tagihan" type="hidden" name="tagihan" readonly>
							<div class="form-group">
								<label>Nama Pembayaran</label>
								<input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" readonly>
							</div>
							<div class="form-group">
								<label>Sisa Tagihan (Rp)</label>
								<input type="text" class="form-control sisa_tagihan" name="sisa_tagihan" readonly>
							</div>
							<div class="form-group">
								<label>Tanggal Bayar</label>
								<input type="text" class="form-control tglcalendar" name="tanggal"
									   value="<?php echo date('d-m-Y'); ?>" required>
							</div>
							<div class="form-group">
								<label>Jumlah Bayar (Rp)</label>
								<input type="text" class="form-control rupiah bayar" name="bayar" required>
							</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>

						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

		<div class="modal fade" id="modalEdit">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Pembayaran / Cicilan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="info"></div>
						<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_saveedit"
							  method="post" onsubmit="return cek_bayar(this);">
							<input class="id_pembayaran_bebas_dt" type="hidden" name="id_pembayaran_bebas_dt" readonly>
							<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
							<input class="nis" type="hidden" name="nis" readonly>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" class="form-control tanggal" name="tanggal" readonly>
							</div>
							<div class="form-group">
								<label>Jumlah Bayar (Rp)</label>
								<input type="text" class="form-control rupiah bayar" name="bayar" required>
							</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

		<?php } ?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

		<script>
			$(document).ready(function () {
				// $('#cari-siswa').onkeyup(function (){
				// 	alert('qweqa')
				// })
				$('#cari-siswa').typeahead({
					source: function (query, result) {
						$.ajax({
							url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
							data: 'query=' + query,
							dataType: "json",
							type: "POST",
							success: function (data) {
								result($.map(data, function (item) {
									return item;
								}));
							}
						});
					}
				});
			});

			$(".bayar-bebas").click(function () {
				$(".id_pembayaran_bebas").val($(this).attr('data-id_pembayaran_bebas'));
				$(".nis").val($(this).attr('data-nis'));
				$(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
				$(".tagihan").val($(this).attr('data-tagihan'));
				$(".sisa_tagihan").val($(this).attr('data-sisa_tagihan'));
				$(".nama_pembayaran").val($(this).attr('data-nama_pos_keuangan'));
			});

			$(document).on("click", ".edit-bayar", function () {
				$(".id_pembayaran_bebas_dt").val($(this).attr('data-id_pembayaran_bebas_dt'));
				$(".nis").val($(this).attr('data-nis'));
				$(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
				$(".tanggal").val($(this).attr('data-tanggal'));
				$(".bayar").val($(this).attr('data-bayar'));
			});


			$(".history-bayar").click(function () {
				var id_pembayaran_bebas = $(this).attr('data-id_pembayaran_bebas');
				var nis = $(this).attr('data-nis');
				var id_siswa = $(this).attr('data-id_siswa');
				var tahun_ajaran = $(this).attr('data-tahun_ajaran');
				$.get("<?php echo base_url(); ?>pembayaran/ajax_history_bayar", {
					id_pembayaran_bebas: id_pembayaran_bebas,
					nis: nis,
					tahun_ajaran: tahun_ajaran,
					id_siswa: id_siswa
				}, function (data) {
					$("#tempat-view").html(data);
				});
			});

			function cek_bayar(form) {
				var tagihan = $(".tagihan").val();
				var bayar = $(".bayar").val();


				if (parseInt(bayar) > parseInt(tagihan)) {
					var alert = ' <div class="alert alert-danger">' +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
						'<i class="fa fa-remove"></i>' +
						'</button>' +
						'<span style="text-align: left;">Jumlah Bayar Tidak Boleh Lebih Dari Sisa Tagihan</span>' +
						'</div>';
					$("#info").html(alert);
					return false;
				} else {
					return true;
				}
			}

			$(".bayar-bulanan").click(function () {
				var conf = confirm('Yakin Ingin Melakukan Pembayaran ?');
				if (conf) {
					var akun_biaya = $('#akun_biaya').val();
					if (akun_biaya == '') {
						alert('Akun Biaya Belum Dipilih');
					}
					var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
					var nis = $(this).attr('data-nis');
					var tahun_ajaran = $(this).attr('data-tahun_ajaran');
					var tagihan = $(this).attr('data-tagihan');


					$.post("<?php echo base_url(); ?>pembayaran/ajax_post_bayar_bulanan", {
						nis: nis,
						id_pembayaran_bulanan: id_pembayaran_bulanan,
						tahun_ajaran: tahun_ajaran,
						tagihan: tagihan,
						akun_biaya: akun_biaya
					}, function (data) {
						var res = JSON.parse(data);
						toastr.options.timeOut = 2000;
						toastr.success("Berhasil Melakukan Pembayaran");
						//window.location.reload(true)
						//document.location.href = "<?php //echo base_url(); ?>//pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
					});
				}

			});


			$(".hapus-bulanan").click(function () {
				var conf = confirm('Yakin Ingin Menghapus Pembayaran ?');
				if (conf) {
					var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
					var nis = $(this).attr('data-nis');
					var tahun_ajaran = $(this).attr('data-tahun_ajaran');
					var tagihan = $(this).attr('data-tagihan');

					$.post("<?php echo base_url(); ?>pembayaran/ajax_hapus_bayar_bulanan", {
						nis: nis,
						id_pembayaran_bulanan: id_pembayaran_bulanan,
						tahun_ajaran: tahun_ajaran,
						tagihan: tagihan
					}, function (data) {
						var res = JSON.parse(data);
						toastr.options.timeOut = 2000;
						toastr.success("Berhasil Menghapus Pembayaran");
						// window.location.reload(true)
						document.location.href = "<?php echo base_url(); ?>pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
					});
				}
			});

		</script>
