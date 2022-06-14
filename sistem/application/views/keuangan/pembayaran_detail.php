<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>


<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
				<div class="col-12-xxxl col-md-12">
					<div class="card card-purple">
						<div class="card-header">
							<h3 class="card-title">Informasi Tagihan Siswa</h3>


							<!-- /.card-tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="datatb" class="table table-bordered table-hover table-striped">
								<tbody>
								<tr>
									<td class="text-xs">Nama Siswa</td>
									<td class="text-xs">:</td>
									<td class="text-xs"><?php echo $nama_siswa; ?></td>
								</tr>
								<tr>
									<td class="text-xs">Kelas</td>
									<td class="text-xs">:</td>
									<td class="text-xs"><?php echo $nama_kelas; ?></td>
								</tr>
								<tr>
									<td class="text-xs">NIS</td>
									<td class="text-xs">:</td>
									<td class="text-xs"><?php echo $nis; ?></td>
								</tr>
								<tr>
									<td class="text-xs" style="width:100px;">Jenis Pembayaran</td>
									<td class="text-xs" style="width:5px;">:</td>
									<td class="text-xs"><?php echo $nama_pos_keuangan; ?></td>
								</tr>
								<tr>
									<td class="text-xs">Total Tagihan</td>
									<td class="text-xs">:</td>
									<td class="text-xs text-danger">Rp. <?php echo number_format($total_tagihan);  ?></td>
								</tr>
								</tbody>
							</table>
							<a class="btn btn-danger btn-flat" href="<?php echo base_url() . 'pembayaran/pembayaran/' . $tahun_ajaran . '/' . $nis; ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
						</div>
						<!-- /.card-body -->
					</div>


				</div>
				<div class="col-md-12">
					<div class="card card-danger card-outline">
						<div class="card-header">
							<h3 class="card-title">Informasi Tagihan Siswa</h3>


							<!-- /.card-tools -->
						</div>
						<form action="<?php echo base_url(); ?>pembayaran/cetak_bukti_bulanan_all" method="post" target="_blank">
							<input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
							<input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
							<div class="text-right mt-1 mr-2">
								<button class="btn btn-fill-lg btn-gradient-yellow"><i class="fa fa-print"> </i> Cetak yang dipilih</button>
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-2">
								<table id="datatb" class="table table-bordered table-hover table-striped">
									<thead>
									<tr class=" text-xs">
										<th></th>
										<th>No</th>
										<th>Bulan</th>
										<th>Tagihan</th>
										<th>Status</th>
										<th>Bayar</th>
										<th>Cetak</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach ($pembayaran_bulanan_detail->result_array() as $data) {

										$bulan = $data['bulan'];
										if ($data['tagihan'] == $data['bayar']) {
											$disable = '';
											$status = 'Lunas';
											$color = 'style="color:green;"';
											$icon = " <i class='fa fa-times'></i> ";
											$button = 'btn-success';
											$confirm = 'Anda akan menghapus pembayaran bulan ' . $bulan;
											$url = base_url() . 'pembayaran/pembayaran_bulanan_hapus/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa'];
											$toggle = '';
										} else {
											$disable = 'disabled';
											$status = 'Belum Lunas';
											$color = 'style="color:red;"';
											$icon = " <i class='fa fa-check'> </i> ";
											$button = 'btn-danger bayar-bulanan';
											$confirm = 'Anda akan melakukan pembayaran bulan ' . $bulan;
											$url = '#';
											$toggle = 'data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bulanan = "' . $data['id_pembayaran_bulanan'] . '" data-id_siswa = "' . $data['id_siswa'] . '"';
										}
										?>
										<tr <?php echo $color; ?> class='text-sm'>
											<td><input type="checkbox" name="id_pembayaran_bulanan[]" value="<?php echo $data['id_pembayaran_bulanan']; ?>" <?php echo $disable; ?>></td>
											<td><?php echo $no; ?></td>
											<td><?php echo $data['bulan']; ?></td>
											<td>Rp. <?php echo number_format($data['tagihan']); ?></td>
											<td>
												<?php
												echo $status;
												?>
											</td>
											<td class="text-center">
												<a class="btn <?php echo $button; ?> btn-xs" href="<?php echo $url; ?>" <?php echo $toggle; ?> onclick="return confirm('<?php echo $confirm; ?>');">
													<?php echo $icon; ?> </a>
											</td>
											<td class="text-center">
												<?php if ($data['tagihan'] == $data['bayar']) { ?>
													<a class="btn bg-navy btn-xs"  href="<?php echo base_url() . 'pembayaran/cetak_bukti_bulanan/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa']; ?>" target="_blank"><i class="fa fa-print"> </i> </a>
												<?php } ?>
											</td>
										</tr>
										<?php $no++;
									} ?>
									</tbody>
								</table>
							</div>
						</form>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
	<!-- Add Notice Area End Here -->
	<!-- All Notice Area Start Here -->
	<!-- All Notice Area End Here -->
<div class="modal fade" id="modalAdd">
	<div class="modal-dialog">
		<div class="modal-content bg-teal">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div id="info"></div>
				<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bulanan_save" method="post">
					<input class="id_pembayaran_bulanan" type="hidden" name="id_pembayaran_bulanan" readonly>
					<input class="id_siswa" type="hidden" name="id_siswa" readonly>

					<div class="form-group">
						<label>Tanggal Bayar</label>
						<input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
					</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button  class="btn btn-success btn-block"><i class="nav-icon fas fa-money-check-alt text-white"> </i> Lakukan Bayar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
	<?php } else { ?>
		<div class="col-12-xxxl col-md-12">
			<div class="card card-purple">
				<div class="card-header">
					<h3 class="card-title">Informasi Tagihan Siswa</h3>


					<!-- /.card-tools -->
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="datatb" class="table table-bordered table-hover table-striped">
						<tbody>
						<tr>
							<td class="text-xs">Nama Siswa</td>
							<td class="text-xs">:</td>
							<td class="text-xs"><?php echo $nama_siswa; ?></td>
						</tr>
						<tr>
							<td class="text-xs">Kelas</td>
							<td class="text-xs">:</td>
							<td class="text-xs"><?php echo $nama_kelas; ?></td>
						</tr>
						<tr>
							<td class="text-xs">NIS</td>
							<td class="text-xs">:</td>
							<td class="text-xs"><?php echo $nis; ?></td>
						</tr>
						<tr>
							<td class="text-xs" style="width:100px;">Jenis Pembayaran</td>
							<td class="text-xs" style="width:5px;">:</td>
							<td class="text-xs"><?php echo $nama_pos_keuangan; ?></td>
						</tr>
						<tr>
							<td class="text-xs">Total Tagihan</td>
							<td class="text-xs">:</td>
							<td class="text-xs text-danger">Rp. <?php echo number_format($total_tagihan);  ?></td>
						</tr>
						</tbody>
					</table>
					<a class="btn btn-danger btn-flat" href="<?php echo base_url() . 'pembayaran/pembayaran/' . $tahun_ajaran . '/' . $nis; ?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
				</div>
				<!-- /.card-body -->
			</div>


		</div>
		<div class="col-md-12">
			<div class="card card-danger card-outline">
				<div class="card-header">
					<h3 class="card-title">Informasi Tagihan Siswa</h3>


					<!-- /.card-tools -->
				</div>
				<form action="<?php echo base_url(); ?>pembayaran/cetak_bukti_bulanan_all" method="post" target="_blank">
					<input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
					<input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
					<div class="text-right mt-1 mr-2">
						<button class="btn btn-fill-lg btn-gradient-yellow"><i class="fa fa-print"> </i> Cetak yang dipilih</button>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-2">
						<table id="datatb" class="table table-bordered table-hover table-striped">
							<thead>
							<tr class=" text-xs">
								<th></th>
								<th>No</th>
								<th>Bulan</th>
								<th>Tagihan</th>
								<th>Status</th>
<!--								<th>Bayar</th>-->
								<th>Cetak</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($pembayaran_bulanan_detail->result_array() as $data) {

								$bulan = $data['bulan'];
								if ($data['tagihan'] == $data['bayar']) {
									$disable = '';
									$status = 'Lunas';
									$color = 'style="color:green;"';
									$icon = " <i class='fa fa-times'></i> ";
									$button = 'btn-success';
									$confirm = 'Anda akan menghapus pembayaran bulan ' . $bulan;
									$url = base_url() . 'pembayaran/pembayaran_bulanan_hapus/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa'];
									$toggle = '';
								} else {
									$disable = 'disabled';
									$status = 'Belum Lunas';
									$color = 'style="color:red;"';
									$icon = " <i class='fa fa-check'> </i> ";
									$button = 'btn-danger bayar-bulanan';
									$confirm = 'Anda akan melakukan pembayaran bulan ' . $bulan;
									$url = '#';
									$toggle = 'data-toggle="modal" data-target="#modalAdd" data-id_pembayaran_bulanan = "' . $data['id_pembayaran_bulanan'] . '" data-id_siswa = "' . $data['id_siswa'] . '"';
								}
								?>
								<tr <?php echo $color; ?> class='text-sm'>
									<td><input type="checkbox" name="id_pembayaran_bulanan[]" value="<?php echo $data['id_pembayaran_bulanan']; ?>" <?php echo $disable; ?>></td>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['bulan']; ?></td>
									<td>Rp. <?php echo number_format($data['tagihan']); ?></td>
									<td>
										<?php
										echo $status;
										?>
									</td>
									<td class="text-center">
										<?php if ($data['tagihan'] == $data['bayar']) { ?>
											<a class="btn bg-navy btn-xs"  href="<?php echo base_url() . 'pembayaran/cetak_bukti_bulanan/' . $data['id_pembayaran_bulanan'] . '/' . $data['id_siswa']; ?>" target="_blank"><i class="fa fa-print"> </i> </a>
										<?php } ?>
									</td>
								</tr>
								<?php $no++;
							} ?>
							</tbody>
						</table>
					</div>
				</form>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>


		<!-- Add Notice Area End Here -->

		<!-- All Notice Area Start Here -->

		<!-- All Notice Area End Here -->
		</div>



	<?php } ?>

<script>
	$(".bayar-bulanan").click(function() {
		$(".id_pembayaran_bulanan").val($(this).attr('data-id_pembayaran_bulanan'));
		$(".id_siswa").val($(this).attr('data-id_siswa'));
	});
</script>

<?php if ($this->session->flashdata('success')) {
	echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
} ?>

<?php if ($this->session->flashdata('error')) {
	echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
} ?>
