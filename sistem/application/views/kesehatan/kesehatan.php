<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Kesehatan</h3>
						</div>
						<div class="dropdown">

						</div>
					</div>
					<form class="new-added-form" action="<?php echo base_url(). 'kesehatan/save_kesehatan'; ?>" method="post">
						<div class="row">


							<div class="col-12-xxxl col-lg-12 col-12 form-group">
								<label>Nama Kesehatan</label>
								<input type="text" placeholder="Tulis Nama Kesehatan" name="ks_aspek" class="form-control">
								<!--								unit session-->
								<input type="hidden" name="unit" value="<?php echo $this->session->userdata('unit'); ?>">
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
						<table id="dtable" class="table display data-table text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Kesehatan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$unit = $this->session->userdata('unit');
							$row_siswa = $this->db->query("select * from sr_kesehatan where unit = '$unit'")->result();
							$no = 1; ?>

							<?php foreach ($row_siswa as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->ks_aspek ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->idkesehatan;?>" data-toggle="modal"><i
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
												<h2>Hapus Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/delete_kesehatan') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->ks_aspek;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="editModal<?php echo $product->idkesehatan;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/setting_kesehatan_update') ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nama Kesehatan</label>
															<input type="text" placeholder="Tulis Nama Kesehatan" name="ks_aspek" class="form-control" value="<?php echo $product->ks_aspek;?>">
														</div>
														<input type="hidden" placeholder="Tulis Nama Kesehatan" name="unit" class="form-control" value="<?php echo $product->unit;?>">


													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Edit</button>
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
				<h2>Tambah Ekstra</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Nama Ekstra</label>
								<input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra">
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
	<?php } else { ?>
	<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Kesehatan</h3>
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
					<form class="new-added-form" action="<?php echo base_url(). 'kesehatan/save_kesehatan'; ?>" method="post">
						<div class="row">

							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Unit</label>
								<select name="unit" id="unit" class="form-control select2">
									<option value="">Pilih Unit</option>
									<?php
									$unit = $this->session->userdata('unit');
									$row = "select * from web_unit";
									$row_siswa = $this->db->get('web_unit')->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->id; ?>"><?php echo $product->nama; ?></option>
									<?php endforeach;
									?>
								</select>
							</div>
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Nama Kesehatan</label>
								<input type="text" placeholder="Tulis Nama Kesehatan" name="ks_aspek" class="form-control">
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
						<table id="dtable" class="">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Kesehatan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php foreach ($list as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->ks_aspek ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->idkesehatan;?>" data-toggle="modal"><i
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
												<h2>Hapus Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/delete_kesehatan') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->ks_aspek;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="editModal<?php echo $product->idkesehatan;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/setting_kesehatan_update') ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nama Kesehatan</label>
															<input type="text" placeholder="Tulis Nama Kesehatan" name="ks_aspek" class="form-control" value="<?php echo $product->ks_aspek;?>">
														
														</div>


													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Edit</button>
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
				<h2>Tambah Ekstra</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Nama Ekstra</label>
								<input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra">
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
	<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

<script>

	$('#dtable').DataTable({
		"searching": false
		"bPaginate": false,
	});
	var scntDiv = $('#p_scents_tax');
	var i = $('#p_scents_tax .row').size() + 1;

	$("#addScnt_tax").click(function() {
		$('<div class="row"><div class="col-md-6"><label>Nama Ekstra</label><input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra"><a href="#" class="btn btn-xs btn-danger remScnt_tax">Hapus Baris</a></div><div class="col-md-6"><label>Besaran Ekstra</label><input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5"></div></div>').appendTo(scntDiv);
		i++;
		return false;
	});

	$(document).on("click", ".remScnt_tax", function() {
		if (i > 2) {
			$(this).parents('.row').remove();
			i--;
		}
		return false;
	});
</script>
