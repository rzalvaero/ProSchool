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
						<h3>Tabungan</h3>
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
				<form class="new-added-form" action="<?php echo base_url() . 'tabungan/proses_cari_tabungan_siswa'; ?>"
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
								   aria-selected="false">Transaksi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
								   href="#data-rekap" role="tab" aria-controls="custom-content-below-profile"
								   aria-selected="false">Data Rekap</a>
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
												if (!empty($nis) && !empty($tahun_ajaran)) {
													$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat = $tahun_ajaran order by idtabungan DESC")->result();
													foreach ($db as $item):
														?>
														<tr>
															<?php if ($item->debet == '0') { ?>
																<td>Setor</td>
															<?php } else { ?>
																<td>Tarik</td>
															<?php } ?>
															<td><?= number_format($item->debet) . '' . number_format($item->credit) ?></td>
															<td><?= $item->tanggal ?></td>
														</tr>
													<?php endforeach; ?>
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
							<div class="tab-pane fade" id="data-rekap" role="tabpanel"
								 aria-labelledby="custom-content-below-profile-tab">
								<div class="row">
									<div class="col-md-9 form-group">
										<div style="overflow-y:scroll;height:200px;">
											<div class="row">
												<div class="col-md-4">
													<?php if (!empty($nis) && !empty($tahun_ajaran)){ ?>
													<label for="Total ">Total Setoran</label>
													<?php
													$db = $this->db->query("select sum(saldo) as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' and debet != '0'")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>

												</div>
												<div class="col-md-4">
													<label for="Total ">Total Penarikan</label>
													<?php
													$db = $this->db->query("select sum(saldo) as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' and credit != '0'")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>
												</div>
												<div class="col-md-8">
													<label for="Total ">Saldo Saat Ini</label>
													<?php
													$db = $this->db->query("select saldo as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' order by idtabungan desc")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>

													<?php } ?>
												</div>
											</div>

										</div>
										<div>
										</div>
									</div>


									<div class="col-md-3">

										<img src="https://demo.adminsekolah.net/media/img/user.png"
											 class="img-thumbnail img-responsive">
									</div>

								</div>

							</div>


						</div>
					</div>
				</div>

			</div>

			<br>
			<div class="col-md-12">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Transaksi</h3>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="box-body">
							<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill"
									   href="#data-tabungan" role="tab" aria-controls="custom-content-below-home"
									   aria-selected="true">Setoran</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
									   href="#data-transaksi_tabungan" role="tab"
									   aria-controls="custom-content-below-profile" aria-selected="false">Penarikan</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade active show" id="data-tabungan" role="tabpanel"
									 aria-labelledby="custom-content-below-home-tab">

									<div class="row">
										<div class="col-md-9">
											<!--										button-->
											<?php if (!empty($nis)) { ?>
												<a href="#addTax" class="btn btn-success btn-lg mb-2 mt-2 ml-2 "
												   data-toggle="modal" data-toggle="tooltip">Setor</a>

											<?php } ?>
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%"
											">
											<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Kode</th>
												<th>Nominal</th>
												<th>Catatan</th>
												<th>deskripsi</th>
												<!--												<th>Aksi</th>-->
											</tr>

											</thead>
											<tbody>

											<?php
											if (!empty($nis) && !empty($tahun_ajaran)) {
												$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat='$tahun_ajaran' and debet != '0'")->result();

												?>
												<?php
												$no = 1;
												foreach ($db as $item): ?>
													<tr>
														<td><?= $no++; ?></td>
														<td><?= $item->tanggal; ?></td>
														<td>Setoran</td>
														<td><?= number_format($item->debet) ?></td>
														<td><?= $item->catatan ?></td>
														<td><?= $item->deskripsi ?></td>

													</tr>

												<?php endforeach;
											} ?>

											</tbody>
											</table>
										</div>
										<div class="col-md-3">
											<div class="card-header text-center">
												<h4>Cetak Tabungan</h4>
											</div>
											<form action="<?= base_url(); ?>tabungan/cetaktabungan" method="post">
												<div class="form-group">
													<label for="">Tanggal</label>
													<input type="date" class="form-control" name="tanggal">
												</div>
												<?php if (!empty($nis) && !empty($tahun_ajaran)) { ?>
													<input type="text" class="form-control" name="unit"
														   value="<?= $this->session->userdata('unit') ?>" hidden>
													<input type="text" class="form-control" name="nis"
														   value="<?= $nis ?>" hidden>
													<input type="text" class="form-control" name="tingkat"
														   value="<?= $tahun_ajaran ?>" hidden>
												<?php } ?>
												<!--										button-->
												<div class="text-center ">
													<button type="submit" class="btn btn-lg btn-success">CETAK</button>
												</div>
											</form>
										</div>

									</div>
								</div>
								<div class="tab-pane fade" id="data-transaksi_tabungan" role="tabpanel"
									 aria-labelledby="custom-content-below-profile-tab">
									<div class="row">
										<div class="col-md-9">
											<!--										button-->
											<?php if (!empty($nis)) { ?>
												<a href="#addTaxtarik" class="btn btn-warning btn-lg mb-2 mt-2 ml-2 "
												   data-toggle="modal" data-toggle="tooltip">Tarik</a>

											<?php } ?>
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%"
											">
											<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Kode</th>
												<th>Nominal</th>
												<th>Catatan</th>
												<th>deskripsi</th>
												<!--												<th>Aksi</th>-->
											</tr>

											</thead>
											<tbody>

											<?php
											if (!empty($nis) && !empty($tahun_ajaran)) {
												$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat='$tahun_ajaran' and credit != '0' ")->result();
												?>
												<?php
												$no = 1;
												foreach ($db as $item): ?>
													<tr>
														<td><?= $no++; ?></td>
														<td><?= $item->tanggal; ?></td>
														<td>Tarik</td>
														<td><?= number_format($item->credit) ?></td>
														<td><?= $item->catatan ?></td>
														<td><?= $item->deskripsi ?></td>

													</tr>

												<?php endforeach;
											} ?>

											</tbody>
											</table>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<br>
		</div>
	</div>
	<div class="modal fade" id="addTax" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Setoran</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url(); ?>tabungan/savesetor" method="post" enctype="multipart/form-data">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Tanggal</label>
									<input type="date" required name="tanggal" class="form-control">
								</div>
								<div class="col-md-12 form-group">
									<label>Jumlah Setoran</label>
									<input type="text" required name="debet" class="form-control rupiah">
								</div>
								<div class="col-md-12 form-group">
									<label>Catatan</label>
									<input type="text" required name="catatan" class="form-control">
								</div>
								<input type="text" value="<?= $nis; ?>" name="idsiswa" hidden>
								<input type="text" value="<?= $tahun_ajaran; ?>" name="tingkat" hidden>
								<input type="text" value="<?= $this->session->userdata('unit'); ?>" name="unit" hidden>
							</div>
						</div>
						<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addTaxtarik" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Setoran</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url(); ?>tabungan/savetarik" method="post" enctype="multipart/form-data">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Tanggal</label>
									<input type="date" required name="tanggal" class="form-control">
								</div>
								<div class="col-md-12 form-group">
									<label>Jumlah Setoran</label>
									<input type="text" required name="credit" class="form-control rupiah">
								</div>
								<div class="col-md-12 form-group">
									<label>Catatan</label>
									<input type="text" required name="catatan" class="form-control">
								</div>
								<input type="text" value="<?= $nis; ?>" name="idsiswa" hidden>
								<input type="text" value="<?= $tahun_ajaran; ?>" name="tingkat" hidden>
								<input type="text" value="<?= $this->session->userdata('unit'); ?>" name="unit" hidden>
							</div>
						</div>
						<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>


<?php }else{ ?>

<div class="row">
	<div class="col-12-xxxl col-12 ">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Tabungan</h3>
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
				<form class="new-added-form" action="<?php echo base_url() . 'tabungan/proses_cari_tabungan_siswa'; ?>"
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
								   aria-selected="false">Transaksi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
								   href="#data-rekap" role="tab" aria-controls="custom-content-below-profile"
								   aria-selected="false">Data Rekap</a>
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
												if (!empty($nis) && !empty($tahun_ajaran)) {
													$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat = $tahun_ajaran order by idtabungan DESC")->result();
													foreach ($db as $item):
														?>
														<tr>
															<?php if ($item->debet == '0') { ?>
																<td>Setor</td>
															<?php } else { ?>
																<td>Tarik</td>
															<?php } ?>
															<?php if ($item->debet != '0') { ?>
																<td><?= number_format($item->debet) ?></td>
															<?php } else { ?>
																<td><?= number_format($item->credit) ?></td>
															<?php } ?>
															<td><?= $item->tanggal ?></td>
														</tr>
													<?php endforeach; ?>
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
							<div class="tab-pane fade" id="data-rekap" role="tabpanel"
								 aria-labelledby="custom-content-below-profile-tab">
								<div class="row">
									<div class="col-md-9 form-group">
										<div style="overflow-y:scroll;height:200px;">
											<div class="row">
												<div class="col-md-4">
													<?php if (!empty($nis) && !empty($tahun_ajaran)){ ?>
													<label for="Total ">Total Setoran</label>
													<?php
													$db = $this->db->query("select sum(saldo) as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' and debet != '0'")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>

												</div>
												<div class="col-md-4">
													<label for="Total ">Total Penarikan</label>
													<?php
													$db = $this->db->query("select sum(saldo) as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' and credit != '0'")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>
												</div>
												<div class="col-md-8">
													<label for="Total ">Saldo Saat Ini</label>
													<?php
													$db = $this->db->query("select saldo as saldo from sr_tabungan where idsiswa = '$nis' and tingkat = '$tahun_ajaran' order by idtabungan desc")->row();
													?>
													<input type="text" value="<?= number_format($db->saldo) ?>"
														   class="form-control" readonly>

													<?php } ?>
												</div>
											</div>

										</div>
										<div>
										</div>
									</div>


									<div class="col-md-3">

										<img src="https://demo.adminsekolah.net/media/img/user.png"
											 class="img-thumbnail img-responsive">
									</div>

								</div>

							</div>


						</div>
					</div>
				</div>

			</div>

			<br>
			<div class="col-md-12">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Transaksi</h3>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="box-body">
							<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill"
									   href="#data-tabungan" role="tab" aria-controls="custom-content-below-home"
									   aria-selected="true">Setoran</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
									   href="#data-transaksi_tabungan" role="tab"
									   aria-controls="custom-content-below-profile" aria-selected="false">Penarikan</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade active show" id="data-tabungan" role="tabpanel"
									 aria-labelledby="custom-content-below-home-tab">

									<div class="row">
										<div class="col-md-9">
											<!--										button-->
											<?php if (!empty($nis)) { ?>
												<a href="#addTax" class="btn btn-success btn-lg mb-2 mt-2 ml-2 "
												   data-toggle="modal" data-toggle="tooltip">Setor</a>

											<?php } ?>
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%"
											">
											<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Kode</th>
												<th>Nominal</th>
												<th>Catatan</th>
												<th>deskripsi</th>
												<!--												<th>Aksi</th>-->
											</tr>

											</thead>
											<tbody>

											<?php
											if (!empty($nis) && !empty($tahun_ajaran)) {
												$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat='$tahun_ajaran' and debet != '0'")->result();

												?>
												<?php
												$no = 1;
												foreach ($db as $item): ?>
													<tr>
														<td><?= $no++; ?></td>
														<td><?= $item->tanggal; ?></td>
														<td>Setor</td>
														<td><?= number_format($item->debet) ?></td>
														<td><?= $item->catatan ?></td>
														<td><?= $item->deskripsi ?></td>

													</tr>

												<?php endforeach;
											} ?>

											</tbody>
											</table>
										</div>
										<div class="col-md-3">
											<div class="card-header text-center">
												<h4>Cetak Tabungan</h4>
											</div>
											<form action="<?= base_url(); ?>tabungan/cetaktabungan" method="post">
												<div class="form-group">
													<label for="">Tanggal</label>
													<input type="date" class="form-control" name="tanggal">
												</div>
												<?php if (!empty($nis) && !empty($tahun_ajaran)) { ?>
													<input type="text" class="form-control" name="unit"
														   value="<?= $unit_id; ?>" hidden>
													<input type="text" class="form-control" name="nis"
														   value="<?= $nis ?>" hidden>
													<input type="text" class="form-control" name="tingkat"
														   value="<?= $tahun_ajaran ?>" hidden>
												<?php } ?>
												<!--										button-->
												<div class="text-center ">
													<button type="submit" class="btn btn-lg btn-success">CETAK</button>
												</div>
											</form>
										</div>

									</div>
								</div>
								<div class="tab-pane fade" id="data-transaksi_tabungan" role="tabpanel"
									 aria-labelledby="custom-content-below-profile-tab">
									<div class="row">
										<div class="col-md-9">
											<!--										button-->
											<?php if (!empty($nis)) { ?>
												<a href="#addTaxtarik" class="btn btn-warning btn-lg mb-2 mt-2 ml-2 "
												   data-toggle="modal" data-toggle="tooltip">Tarik</a>

											<?php } ?>
											<table class="table table-bordered table-hover table-striped"
												   style="width:100%"
											">
											<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Kode</th>
												<th>Nominal</th>
												<th>Catatan</th>
												<th>deskripsi</th>
												<!--												<th>Aksi</th>-->
											</tr>

											</thead>
											<tbody>

											<?php
											if (!empty($nis) && !empty($tahun_ajaran)) {
												$db = $this->db->query("select * from sr_tabungan where idsiswa = '$nis' and tingkat='$tahun_ajaran' and credit != '0' ")->result();
												?>
												<?php
												$no = 1;
												foreach ($db as $item): ?>
													<tr>
														<td><?= $no++; ?></td>
														<td><?= $item->tanggal; ?></td>
														<td>Tarik</td>
														<td><?= number_format($item->credit) ?></td>
														<td><?= $item->catatan ?></td>
														<td><?= $item->deskripsi ?></td>

													</tr>

												<?php endforeach;
											} ?>

											</tbody>
											</table>
										</div>
										<div class="col-md-3">
											<div class="card-header text-center">
												<h4>Cetak Tabungan</h4>
											</div>
											<form action="<?= base_url(); ?>tabungan/cetaktabungan" method="post">
												<div class="form-group">
													<label for="">Tanggal</label>
													<input type="date" class="form-control" name="tanggal">
												</div>
												<?php if (!empty($nis) && !empty($tahun_ajaran)) { ?>
													<input type="text" class="form-control" name="unit"
														   value="<?= $unit_id; ?>" hidden>
													<input type="text" class="form-control" name="nis"
														   value="<?= $nis ?>" hidden>
													<input type="text" class="form-control" name="tingkat"
														   value="<?= $tahun_ajaran ?>" hidden>
												<?php } ?>
												<!--										button-->
												<div class="text-center ">
													<button type="submit" class="btn btn-lg btn-success">CETAK</button>
												</div>
											</form>
										</div>


									</div>

								</div>

							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<br>
		</div>
	</div>
	<div class="modal fade" id="addTax" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Setoran</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url(); ?>tabungan/savesetor" method="post" enctype="multipart/form-data">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Tanggal</label>
									<input type="date" required name="tanggal" class="form-control">
								</div>
								<div class="col-md-12 form-group">
									<label>Jumlah Setoran</label>
									<input type="text" required name="debet" class="form-control rupiah">
								</div>
								<div class="col-md-12 form-group">
									<label>Catatan</label>
									<input type="text" required name="catatan" class="form-control">
								</div>
								<input type="text" value="<?= $nis; ?>" name="idsiswa" hidden>
								<input type="text" value="<?= $tahun_ajaran; ?>" name="tingkat" hidden>
								<input type="text" value="<?= $this->session->userdata('unit'); ?>" name="unit" hidden>
							</div>
						</div>
						<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addTaxtarik" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Setoran</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url(); ?>tabungan/savetarik" method="post" enctype="multipart/form-data">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>Tanggal</label>
									<input type="date" required name="tanggal" class="form-control">
								</div>
								<div class="col-md-12 form-group">
									<label>Jumlah Setoran</label>
									<input type="text" required name="credit" class="form-control rupiah">
								</div>
								<div class="col-md-12 form-group">
									<label>Catatan</label>
									<input type="text" required name="catatan" class="form-control">
								</div>
								<input type="text" value="<?= $nis; ?>" name="idsiswa" hidden>
								<input type="text" value="<?= $tahun_ajaran; ?>" name="tingkat" hidden>
								<input type="text" value="<?= $this->session->userdata('unit'); ?>" name="unit" hidden>
							</div>
						</div>
						<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>

	<script>
		$('.rupiah').inputmask('decimal', {
			allowMinus: false,
			autoGroup: true,
			groupSeparator: '.',
			rightAlign: false,
			autoUnmask: true,
			removeMaskOnSubmit: true
		});
	</script>
