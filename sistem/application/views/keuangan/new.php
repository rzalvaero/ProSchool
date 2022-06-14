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
					<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-siswa" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Informasi Data Siswa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Transaksi Trakhir</a>
				</li>
			</ul>
			<div class="tab-content" id="custom-content-below-tabContent">
				<div class="tab-pane fade active show" id="data-siswa" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

					<div class="row">
						<div class="col-md-9">
							<table class="table table-striped">
								<tbody>
								<tr>
									<td width="200">Tahun Ajaran</td>
									<td width="4">:</td>


									<td><strong><?php echo $tahun_ajaran; ?><strong></td>
								</tr>
								<tr>
									<td>NIS</td>
									<td>:</td>
									<td><?php echo $nis; ?></td>
								</tr>
								<tr>
									<td>Nama Siswa</td>
									<td>:</td>
									<td><?php echo $nama_siswa; ?></td>
								</tr>
								<tr>
									<td>Unit Sekolah</td>
									<td>:</td>
									<td><?php echo $unit; ?></td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td>:</td>
									<td><?php echo $nama_kelas; ?></td>
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


						<!--									<div class="box box-primary">-->
						<!--										<div class="box-header with-border">-->
						<!--											<h3 class="box-title">Jenis Pembayaran</h3>-->
						<!--										</div> /.box-header -->
						<!--										<div class="box-body">-->
						<!--											<div class="row">-->
						<!--												<div class="col-md-6">-->
						<!--													<label>No. Referensi</label>-->
						<!--													<input required="" name="kas_noref" id="kas_noref" class="form-control"-->
						<!--														   value="SPSMA602603032201" readonly="">-->
						<!--												</div>-->
						<!--												<div class="col-md-6">-->
						<!--													<label>Akun Kas *</label>-->
						<!--													<select required="" name="kas_account_id" id="kas_account_id"-->
						<!--															onchange="change_kas_account()" class="form-control">-->
						<!--														<option value="">-- Pilih Akun Kas --</option>-->
						<!--														<option value="55" selected>-->
						<!--															1-10801 - Kas Tunai SMA-->
						<!--														</option>-->
						<!--														<option value="59">-->
						<!--															1-10802 - Kas Bank SMA-->
						<!--														</option>-->
						<!--														<option value="123">-->
						<!--															1-10803 - Kas Bank BRI Syariah SMA-->
						<!--														</option>-->
						<!--														<option value="132">-->
						<!--															1-10804 - Kas Bank Mandiri SMA-->
						<!--														</option>-->
						<!--													</select>-->
						<!--												</div>-->
						<!--												<br>-->
						<!--											</div>-->
						<!--										</div>-->
						<!--									</div>-->

					</div>
				</div>
				<div class="tab-pane fade" id="data-transaksi" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
					<div class="row">
						<div class="col-md-9">
							<div style="overflow-y:scroll;height:200px;">
								<table class="table table-bordered table-hover table-striped" style="width:100%">
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
						<?php foreach ($jenis_pembayaran_bulanan->result_array() as $data) {
							$q_tagihan = $this->db->query("select * from sr_pembayaran_bulanan
join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa");
							$sisa_tagihan = $this->db->query("SELECT SUM(tagihan) as hitung FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = $data[id_jenis_pembayaran] AND id_siswa = $id_siswa AND bayar = 0")->row();
							?>
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped" style="white-space: nowrap;">
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
										<td class="text-sm" style="background-color: yellow">Rp <?php echo number_format($sisa_tagihan->hitung); ?></td>
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
											<td class="text-sm" <?php echo $style; ?>><a style="color:#fff;" <?php echo $class; ?> data-id_pembayaran_bulanan="<?php echo $d_tagihan['id_pembayaran_bulanan']; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $d_tagihan['tagihan']; ?>" href=""><?php echo $tagihan; ?></a></td>
										<?php } ?>
									</tr>
									</tbody>
								</table>
							</div>
						<?php } ?>

					</div>
					<div class="tab-pane" id="tab_2">
						<!-- End List Tagihan Bulanan -->

						<!-- List Tagihan Lainnya (Bebas) -->

						<div class="box-body">

							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped" style="width:100%">
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
											<td <?php echo $class; ?>>Rp <?php echo number_format($sisa_tagihan); ?></td>
											<td <?php echo $class; ?>>Rp <?php echo number_format($bayar->hitung); ?></td>
											<td <?php echo $class; ?>>
												<?php
												echo $status;
												?>
											</td>
											<td <?php echo $class; ?>>
												<?php if ($sisa_tagihan > 0) { ?>
													<a class="btn btn-success btn-xs bayar-bebas" href="" data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $sisa_tagihan; ?>" data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>" data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i class="fa fa-money"> </i> Bayar </a>
												<?php } ?>
											</td>
											<td>
												<?php if ($bayar->hitung > 0) { ?>
													<a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>" target="_blank"><i class="fa fa-print"> </i> Cetak </a>
												<?php } ?>
											</td>

										</tr>
										<?php $no++;
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
							foreach ($pembayaran_bulanan->result_array() as $data) {
								$q_total = $this->db->query("SELECT SUM(tagihan) as hitung_tagihan, SUM(bayar) as hitung_bayar FROM sr_pembayaran_bulanan WHERE id_jenis_pembayaran = '$data[id_jenis_pembayaran]' AND id_siswa = '$data[id_siswa]'")->row();
								?>
								<tr>
									<td class="text-sm"><?php echo $no; ?></td>
									<td class="text-sm"><?php echo $data['nama_pos_keuangan'] . ' ' . $data['tahun_ajaran']; ?></td>
									<td class="text-sm">Rp. <?php echo number_format($q_total->hitung_tagihan); ?></td>
									<td class="text-sm">Rp. <?php echo number_format($q_total->hitung_bayar); ?></td>
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
										<a class="btn btn-info btn-xs btn-flat" href="<?php echo base_url() . 'pembayaran/pembayaran_siswa_detail/' . $data['id_jenis_pembayaran'] . '/' . $data['id_siswa']; ?>"><i class="nav-icon fas fa-money-check-alt text-white"> </i> Bayar</a>
									</td>
								</tr>
								<?php $no++;
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
										<td class="text-sm" <?php echo $class; ?>>Rp <?php echo number_format($sisa_tagihan); ?></td>
										<td class="text-sm" <?php echo $class; ?>>Rp <?php echo number_format($bayar->hitung); ?></td>
										<td class="text-sm text-center" <?php echo $class; ?>>
											<?php
											echo $status;
											?>
										</td>
										<td class="text-sm text-center" <?php echo $class; ?>>
											<?php if ($sisa_tagihan > 0) { ?>
												<a class="btn btn-info btn-flat btn-xs bayar-bebas" href="" data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bebas="<?php echo $q_tagihan->id_pembayaran_bebas; ?>" data-nis="<?php echo $nis; ?>" data-tahun_ajaran="<?php echo $tahun_ajaran; ?>" data-tagihan="<?php echo $sisa_tagihan; ?>" data-sisa_tagihan="<?php echo number_format($sisa_tagihan); ?>" data-nama_pos_keuangan="<?php echo $data['nama_pos_keuangan'] . ' - ' . $tahun_ajaran; ?>"><i class="fa fa-money"> </i> Bayar </a>
											<?php } ?>
										</td>
										<td class="text-sm text-center">
											<?php if ($bayar->hitung > 0) { ?>
												<a class="btn btn-xs btn-flat btn-danger" href="<?php echo base_url() . 'pembayaran/cetak_bukti_bayar_bebas/' . $data['id_pembayaran_bebas'] . '/' . $id_siswa; ?>" target="_blank"><i class="fa fa-print"> </i> Cetak </a>
											<?php } ?>
										</td>

									</tr>
									<?php $no++;
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
