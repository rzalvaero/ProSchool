<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>

	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<?php } else {
	} ?>
<div class="row" style="width: 100%">

		<div class="col-12-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h5 class="m-0 text-dark">
								<i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul . ' 
             					 <div class="btn-group btn-group-sm">' . $nama_pos_keuangan . ' ' . $tahun_ajaran . ' (' . $tipe_pembayaran . ')</div>'; ?></h5>
						</div>
						<div class="dropdown">
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
								<a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

					<div class="card card-info card-outline">
						<div class="card-header">
							<form action="<?php echo base_url(); ?>keuangan/proses_tarif" class="form-horizontal" method="post">
								<input type="hidden" name="id_jenis_pembayaran" value="<?php echo $id_jenis_pembayaran; ?>">
								<div class="card-body">
									<div class="row">
										<div class="col-2 text-center">
											<select id="id_kelas" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" name="id_kelas">
												<?php echo $combo_kelas; ?>
											</select>
										</div>
										<div class="col-3">
											<button type="submit" class="btn btn-success  btn-lg"><i class="fa fa-search"> </i> Tampilkan</button>
										</div>
										<div class="col-7 text-right">
											<a class="btn btn-info btn-lg" href="<?php echo base_url() . 'keuangan/tarif_pembayaran_kelas/' . $id_jenis_pembayaran; ?>"><i class="fa fa-plus"> </i> Berdasarkan Kelas</a>
											<a class="btn btn-warning btn-lg" href="<?php echo base_url() . 'keuangan/tarif_pembayaran_siswa/' . $id_jenis_pembayaran; ?>"><i class="fa fa-user"> </i> Berdasarkan Siswa</a>
											<a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>keuangan/jenis_pembayaran"><i class="fa fa-repeat"> </i> Kembali</a>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- /.card-header -->
						<div class=" col-12">
							<?php echo $this->session->flashdata("msg"); ?>


						<div class="card-body table-responsive p-2">
							<table class="table display data-table text-nowrap" cellspacing="0" width="100%">
								<thead>
								<tr class="text-info">
									<th class="text-sm">No</th>
									<th class="text-sm">NIS</th>
									<th class="text-sm">Nama Siswa</th>
									<th class="text-sm">Kelas</th>
										<th class="text-sm">Tarif Pembayaran</th>
									<th class="text-sm">
										<center>Aksi</center>
									</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								if (!empty($siswa)) {
									foreach ($siswa->result_array() as $data) { ?>
										<tr>
											<td class="text-sm"><?php echo $no; ?></td>
											<td class="text-sm"><?php echo $data['s_nisn']; ?></td>
											<td class="text-sm"><?php echo $data['s_nama']; ?></td>
											<td class="text-sm"><?php echo $data['k_keterangan']; ?></td>
											<td class="text-sm">Rp <?php echo number_format($data['tagihan']); ?></td>
											<td style="text-align:center;">
												<?php if ($tipe_pembayaran == 'bulanan') { ?>
													<a class="btn btn-primary btn-xs view-tarif" href="" data-toggle="modal" data-target="#modalView" data-id_kelas="<?php echo $data['idkelas']; ?>" data-id_jenis_pembayaran="<?php echo $data['id_jenis_pembayaran']; ?>" data-id_siswa="<?php echo $data['idsiswa']; ?>" data-tipe_pembayaran="<?php echo $tipe_pembayaran; ?>"><i class="fa fa-search"> </i> Lihat Tarif </a>
													<a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'keuangan/tarif_pembayaran_hapus/' . $data['idsiswa'] . '/' . $data['idkelas'] . '/' . $data['id_jenis_pembayaran']; ?>"><i class="fa fa-trash"> </i> Hapus Tarif </a>
												<?php } else if ($tipe_pembayaran == 'bebas') {  ?>
													<a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'keuangan/tarif_pembayaran_hapus_bebas/' . $data['idsiswa'] . '/' . $data['idkelas'] . '/' . $data['id_jenis_pembayaran']; ?>"><i class="fa fa-trash"> </i> Hapus Tarif </a>
												<?php } ?>
											</td>
										</tr>
										<?php $no++;
									} ?>

								<?php } ?>
								</tbody>
							</table>
						</div>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
		</div>
	<div class="modal fade" id="modalView">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title">Detail Tarif Pembayaran</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div id="tempat-view"></div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>



	<!-- Add Notice Area End Here -->

	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>

<script>
	$(".view-tarif").click(function() {
		var id_kelas = $(this).attr('data-id_kelas');
		var id_siswa = $(this).attr('data-id_siswa');
		var id_jenis_pembayaran = $(this).attr('data-id_jenis_pembayaran');
		$.get("<?php echo base_url(); ?>keuangan/ajax_tarif_detail", {
			id_siswa: id_siswa,
			id_kelas: id_kelas,
			id_jenis_pembayaran: id_jenis_pembayaran
		}, function(data) {
			$("#tempat-view").html(data);
		});
	});
</script>

