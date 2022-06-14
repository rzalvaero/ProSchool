<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>

	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Formulir Tanah</h3>

					</div>


				</div>
				<form class="new-added-form" action="<?php echo base_url() ?>sarpras/tambah_tanah_bangunan" method="post">
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Jenis Prasana</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Nama</label>
							<input type="text" placeholder="" name="alamat" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>No Sertifikat Tanah</label>
							<input type="text" placeholder="" name="luas_tanah" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Panjang (m)</label>
							<input type="text" placeholder="" name="luas_bangunan" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Lebar (m)</label>
							<input type="text" placeholder="" name="tahun_pembuatan" class="form-control">
				</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Luas (m2)</label>
							<input type="text" placeholder="" name="tahun_pembuatan" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Luas Lahan Tersedia (m2)</label>
							<input type="text" placeholder="" name="tahun_pembuatan" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Kepemilikan</label>
							<input type="text" placeholder="" name="tahun_pembuatan" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Ket Tanah</label>
							<input type="text" placeholder="" name="tahun_pembuatan" class="form-control">
						</div>
		</div>
					<br>
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Lokasi Tanah</h3>

						</div>
					</div>
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Alamat Jalan</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Rt</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Rw</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Nama Dusun</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Desa Keluarahan</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Kecamatan</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Kode Pos</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Lintang</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
						<div class="col-xl-3 col-lg-6 col-12 form-group">
							<label>Bujur</label>
							<input type="text" placeholder="" name="nama_pemilik" class="form-control">
						</div>
					</div>
			</div>

	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>

<script>
	var scntDiv = $('#p_scents_tax');
	var i = $('#p_scents_tax .row').size() + 1;

	$("#addScnt_tax").click(function() {
		$('<div class="row"><div class="col-md-6"><label>Nama Pajak</label><input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra"><a href="#" class="btn btn-xs btn-danger remScnt_tax">Hapus Baris</a></div><div class="col-md-6"><label>Besaran Pajak</label><input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5"></div></div>').appendTo(scntDiv);
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
