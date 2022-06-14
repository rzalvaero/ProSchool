
<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8"
			src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
	<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Setting Tunjangan</h3>
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
					<form class="new-added-form" action="<?php echo base_url(). 'gaji/save_setting_tunjangan'; ?>" method="post">
						<div class="row">
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Nama Tunjangan</label>
								<input type="text" placeholder="Tulis Nama Tunjangan" name="nama_setting_tunjangan" class="form-control">
							</div>
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Nominal Tunjangan </label>
								<input type="text" placeholder="Contoh : 100000" name="nominal_setting_tunjangan"  class="form-control rupiah">
							</div>

							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-8-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">

						<div class="dropdown">
						</div>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="table table-hover table display data-table text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Tunjangan</th>
								<th>Nominal Tunjangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php foreach ($list as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->nama_setting_tunjangan ?>
									</td>
									<td>
										<?php echo number_format($product->nominal_setting_tunjangan) ?>
									</td>
									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->id_setting_tunjangan;?>" data-toggle="modal"><i
															class="fas fa-pencil-ruler " data-toggle="tooltip"title="Edit"></i>Edit</a>
												<a class="dropdown-item"
												   href="#delModal3" data-toggle="modal"><i
															class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delModal3" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus Setting Tunjangan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/delete_setting_tunjangan') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->nama_setting_tunjangan;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_setting_tunjangan" value="<?php echo $product->id_setting_tunjangan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="editModal<?php echo $product->id_setting_tunjangan;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Setting Tunjangan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/setting_tunjangan_update') ?>">
												<div class="modal-body">
													<div class="row">
														<input type="text" value="<?php echo $product->id_setting_tunjangan;?>" name="id_setting_tunjangan" hidden>
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nama Tunjangan</label>
															<input type="text" placeholder="Tulis Nama Tunjangan" name="nama_setting_tunjangan" class="form-control" value="<?php echo $product->nama_setting_tunjangan;?>">
														</div>
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nominal Tunjangan </label>
															<input type="text" placeholder="Contoh : 10 %" name="nominal_setting_tunjangan"  class="form-control" value="<?php echo $product->nominal_setting_tunjangan;?>">
														</div>

													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_setting_tunjangan" value="<?php echo $product->id_setting_tunjangan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-success">Edit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							<?php endforeach; ?>


							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Add Notice Area End Here -->

	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>

<div class="modal fade" id="addTax" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Tunjangan</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Nama Tunjangan</label>
								<input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra">
							</div>
							<div class="col-md-6">
								<label>Besaran Tunjangan</label>
								<input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5">
							</div>
						</div>
					</div>
					<br>
					<h6 ><a href="#" class="btn-fill-lg btn-gradient-yellow btn-sm" id="addScnt_tax"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('.rupiah').inputmask('decimal', {allowMinus:false, autoGroup: true, groupSeparator: '.', rightAlign: false, autoUnmask: true, removeMaskOnSubmit: true});
</script>
