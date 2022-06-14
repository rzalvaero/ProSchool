<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>


<div class="row" style="width: 100%;">

	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<?php } else {
	} ?>
	<div class="col-4-xxxl col-12">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h5 class="m-0 text-dark">
							<i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul . ' 
              					<div class="btn-group btn-group-sm">' . $nama_pos_keuangan . ' ' . $tahun_ajaran . ' (' . $tipe_pembayaran . ')</div>'; ?>
						</h5>
					</div>
				</div>
				<br>
				<?php if ($tipe_pembayaran == 'bulanan') { ?>

				<div class="row">

					<div class="col-xl-6 col-lg-12 col-12 form-group">
						<label>Nominal Tarif Pembayaran</label>
						<input class="form-control rupiah tarif-all" type="text" required
							   placeholder="Terapkan Tarif Semua Bulan">
					</div>

				</div>
				<div class="col-12 form-group mg-t-8">
					<button style="float:right;" type="submit"
							class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark btn-all">Terapkan Tarif
					</button>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="col-8-xxxl col-12">
		<div class="card">
			<?php if ($tipe_pembayaran == 'bulanan') { ?>
			<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>keuangan/tarif_siswa_save"
				  method="post">

				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h5 class="m-0 text-dark">
								<i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul . ' 
             				 <div class="btn-group btn-group-sm"></div>'; ?></h5>
						</div>
					</div>
					<div class="form-group row">

					<div class="col-sm-12 ">

						<label for="">Akun</label>
						<select name="akun" id="akun" class="form-control select2" required>
							<option value="">Pilih Akun</option>
							<?php
							$db = $this->db->query("select * from sr_account where modul_keuangan = 'aset'")->result();
							foreach ($db as $item ):?>
								<option value="<?php echo $item->id_akun ?>"><?php echo $item->kode_akun.'-'.$item->keterangan ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 ">
							<label>Kelas</label>
							<input type="text" value="<?= $id_jenis_pembayaran ?>" name="id_jenis_pembayaran" hidden>
							<select id="id_kelas" class="form-control  id_kelas"  data-dropdown-css-class="select2-info" style="width: 100%; " name="id_kelas">
								<?php echo $combo_kelas; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 ">
							<label>Siswa</label>
							<select id="id_siswa" class="form-control select2 select2-info combo-siswa" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_siswa">
								<?php echo $combo_siswa; ?>
							</select>
						</div>
					</div>
					<?php $q_bulan = $this->db->query("SELECT * FROM sr_bulan ORDER BY id_bulan ASC"); ?>

					<?php foreach ($q_bulan->result_array() as $d_bulan) { ?>
						<div class="form-group row">
							<label class="col-sm-12 col-form-label"><?php echo $d_bulan['nama_bulan']; ?> (Rp)</label>
							<div class="col-sm-12 ">
								<input class="form-control" type="hidden"
									   name="nama_bulan_<?php echo $d_bulan['nama_bulan']; ?>"
									   value="<?php echo $d_bulan['nama_bulan']; ?>" readonly >
								<input class="form-control rupiah tagihan" type="text"
									   name="tagihan_<?php echo $d_bulan['nama_bulan']; ?>" placeholder="Tarif"
									   required>
							</div>
						</div>


					<?php } ?>
					<div class="col-12 form-group ">
						<button style="float:right;" type="submit"
								class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark btn-all">Simpan
						</button>
					</div>
				</div>
			</form>
			<?php } else { ?>
			<form class="form-horizontal" role="form" action="<?php echo base_url(); ?>keuangan/tarif_siswa_save_bebas"
				  method="post">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h5 class="m-0 text-dark">
								<i class="fas fa-hands-usd nav-icon text-info"></i> <?php echo $judul . ' 
             				 <div class="btn-group btn-group-sm"></div>'; ?></h5>
						</div>
					</div>
					<div class="form-group row">

						<div class="col-sm-12 ">

							<label for="">Akun</label>
							<select name="akun" id="akun" class="form-control select2" required>
								<option value="">Pilih Akun</option>
								<?php
								$db = $this->db->query("select * from sr_account where modul_keuangan = 'aset'")->result();
								foreach ($db as $item ):?>
									<option value="<?php echo $item->id_akun ?>"><?php echo $item->kode_akun.'-'.$item->keterangan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 ">
							<label>Kelas</label>
							<input type="text" value="<?= $id_jenis_pembayaran ?>" name="id_jenis_pembayaran" hidden>
							<select id="id_kelas" class="form-control  id_kelas"  data-dropdown-css-class="select2-info" style="width: 100%; " name="id_kelas">
								<?php echo $combo_kelas; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 ">
							<label>Siswa</label>
							<select id="id_siswa" class="form-control select2 select2-info combo-siswa" data-dropdown-css-class="select2-info" style="width: 100%; " name="id_siswa">
								<?php echo $combo_siswa; ?>
							</select>
						</div>
					</div>
						<div class="form-group row">
							<label class="col-sm-12 col-form-label">Tarif (Rp)</label>
							<div class="col-sm-12 ">
								<input class="form-control rupiah tagihan1" type="text"
									   name="tagihan1" placeholder="Tarif"
									   >
							</div>
						</div>


					<div class="col-12 form-group ">
						<button style="float:right;" type="submit"
								class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark btn-all">Simpan
						</button>
					</div>
				</div>
			</form>
			<?php } ?>
		</div>

	</div>

	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>

	</div>
</div>

<script>
	$('#id_kelas').on('change', function(){
		var id_kelas = $(this).val();
		$.get("<?php echo base_url(); ?>keuangan/ajax_combo_siswa",{id_kelas:id_kelas}, function(data) {
			$(".combo-siswa").html(data);
		});
	});
	$('.rupiah').inputmask('decimal', {
		allowMinus: false,
		autoGroup: true,
		groupSeparator: '.',
		rightAlign: false,
		autoUnmask: true,
		removeMaskOnSubmit: true
	});
	$(".btn-all").click(function () {
		var tarif = $(".tarif-all").val();
		$(".tagihan").val(tarif);
	});

</script>
