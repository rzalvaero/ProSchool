<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Auto Tanggal Penggajian</h3>
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
					<form class="new-added-form" action="<?php echo base_url(). 'gaji/save_tanggal'; ?>" method="post">
						<div class="row">
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Tanggal Gajian</label>
								<input type="date" placeholder="Tulis Tanggal Gajian" name="tanggal" class="form-control">
							</div>
							<input type="hidden" name="unit" value="<?php echo $this->session->userdata('unit'); ?>">
							<div class="col-12 form-group mg-t-8">
<!--								if button empty data -->
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
								<th>Tanggal Gajian</th>
								<th>Unit</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
<!--							query sr_tanggal_gajian-->
							<?php
//							unit
							$unit = $this->session->userdata('unit');
							$list = $this->db->query("SELECT * FROM sr_tanggal_gaji join web_unit on web_unit.id = sr_tanggal_gaji.unit where sr_tanggal_gaji.unit='$unit'")->result();
							?>
							<?php foreach ($list as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->tanggal ?>
									</td>
									<td>
										<?php echo $product->nama ?>
									</td>

								</tr>

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
				<h2>Tambah Pajak</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Tanggal Gajian</label>
								<input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra">
							</div>
							<div class="col-md-6">
								<label>Besaran Pajak</label>
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
	<?php } else { ?>
		<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Auto Tanggal Penggajian</h3>
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
					<form class="new-added-form" action="<?php echo base_url(). 'gaji/save_tanggal_admin'; ?>" method="post">
						<div class="row">
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Tanggal Gajian</label>
								<input type="date" placeholder="Tulis Tanggal Gajian" name="tanggal" class="form-control">
							</div>
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Tanggal Gajian</label>
							<select name="unit" id="unit" class="form-control">
								<option value="">Pilih Unit</option>
								<?php $select_unit = $this->db->query("select * from web_unit")->result(); ?>
								<?php foreach ($select_unit as $li): ?>
									<option value="<?php echo $li->id ?> "><?php echo $li->nama ?></option>
								<?php endforeach;?>
							</select>
							</div>
							<div class="col-12 form-group mg-t-8">
<!--								if button empty data -->
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
								<th>Tanggal Gajian</th>
								<th>Unit</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
<!--							query sr_tanggal_gajian-->
							<?php
//							unit
							$list = $this->db->query("SELECT * FROM sr_tanggal_gaji join web_unit on web_unit.id = sr_tanggal_gaji.unit ")->result();
							?>
							<?php foreach ($list as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->tanggal ?>
									</td>
									<td>
										<?php echo $product->nama ?>
									</td>

								</tr>

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
				<h2>Tambah Pajak</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Tanggal Gajian</label>
								<input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra">
							</div>
							<div class="col-md-6">
								<label>Besaran Pajak</label>
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
	<?php } ?>

<script>
	var scntDiv = $('#p_scents_tax');
	var i = $('#p_scents_tax .row').size() + 1;

	$("#addScnt_tax").click(function() {
		$('<div class="row"><div class="col-md-6"><label>Tanggal Gajian</label><input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra"><a href="#" class="btn btn-xs btn-danger remScnt_tax">Hapus Baris</a></div><div class="col-md-6"><label>Besaran Pajak</label><input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5"></div></div>').appendTo(scntDiv);
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
