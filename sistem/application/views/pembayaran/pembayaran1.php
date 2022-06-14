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
	<div class="row">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Filter Pembayaran Siswa </h3>
						</div>
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" role="button"
							   data-toggle="dropdown" aria-expanded="false">...</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
								<a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
					<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
						<div class="row">
							<div class="col-4 form-group">
								<label>Tahun Ajaran</label>
								<select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
									<option selected=”selected”>Tahun</option>

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
								<input name="keterangan" type="text" placeholder="Tulis Nama Siswa"
									   class="form-control">
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

	<?php } else { ?>
		<div class="col-12-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Filter Pembayaran Siswa </h3>
						</div>
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" role="button"
							   data-toggle="dropdown" aria-expanded="false">...</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
								<a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
								<a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
					<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
						<div class="row">
							<div class="col-4 form-group">
								<label>Tahun Ajaran</label>
								<select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
									<option selected=”selected”>Tahun</option>

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
								<input name="keterangan" type="text" placeholder="Tulis Nama Siswa"
									   class="form-control">
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

	<?php } ?>

<script>
	$('#unit').on('click', function () {
		console.log($(this).val())
		var unit = $(this).val();
		$.get("<?php echo base_url(); ?>master/ajax_combo_kelas", {unit: unit}, function (data) {
			$(".combo-kelas").html(data);
		});
		$.get("<?php echo base_url(); ?>master/ajax_combo_mata_pelajaran", {unit: unit}, function (data) {
			$(".combo-matapelajaran").html(data);
		});
	});
</script>
