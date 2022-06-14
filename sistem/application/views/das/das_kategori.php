<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<div class="row">
	<!-- Add Notice Area Start Here -->
	<div class="row"style="width: 100%;">
		<div class="col-8-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="card-header">
							<a class="btn btn-fill-lg btn-gradient-yellow" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"> </i> Tambah Data</a>
						</div>
						<div class="dropdown">
						</div>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="">
							<thead>
							<tr>
								<th>No</th>
								<th>Jenis Dana</th>
								<th>Tahun Ajaran</th>
								<th>Total Dana</th>
								<th>Sisa Dana</th>
								<th>Tanggal</th>
								<th class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($das_kategori->result_array() as $data) {
//								$total_das = $this->db->query("SELECT SUM(saldo) as hitung FROM das INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE das.id_das_kategori = '$data[id_das_kategori]'")->row();
//
//								$total_das_bendahara = $this->db->query("SELECT SUM(saldo) as hitung FROM das_bendahara INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE das_bendahara.id_das_kategori = '$data[id_das_kategori]'")->row();
//
//								$total = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user
//                                    INNER JOIN das ON das_user.id_das = das.id_das
//                                    INNER JOIN das_kategori ON das.id_das_kategori = das_kategori.id_das_kategori  WHERE das.id_das_kategori = '$data[id_das_kategori]'")->row();

//								$total_bendahara = $this->db->query("SELECT SUM(sisa_saldo) as hitung, SUM(total_terima) as hitung_terima FROM das_user_bendahara
//                                    INNER JOIN das_bendahara ON das_user_bendahara.id_das_bendahara = das_bendahara.id_das_bendahara INNER JOIN das_kategori ON das_bendahara.id_das_kategori = das_kategori.id_das_kategori  WHERE das_bendahara.id_das_kategori = '$data[id_das_kategori]'")->row();
//
//								$total_all = $total_das->hitung - ($total->hitung_terima - $total->hitung);
//
//								$total_all_bendahara = $total_das_bendahara->hitung - ($total_bendahara->hitung_terima - $total_bendahara->hitung);
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['jenis_dana']; ?></td>
									<td>211</td>
									<td>Rp. <?php echo number_format($data['dana']); ?></td>
									<td>RP. <?php echo number_format($data['sisa_dana'] ); ?></td>
									<td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
									<td style="text-align:center;">
										<a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'das/das_kategori_hapus/' . $data['id_das_kategori']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> Hapus</a>
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
</div>

<div class="modal fade" id="modalAdd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Kategori RABS</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="info"></div>
				<form role="form" action="<?php echo base_url(); ?>das/das_kategori_save" method="post">
					<input class="id_das_kategori" type="hidden" name="id_das_kategori" readonly>
					<input class="tipe" type="hidden" name="tipe" value="add" readonly>
<!---->
					<div class="form-group">

						<label>Tahun Ajaran</label>
						<select name="tahun_ajaran" class="form-control" class="form-control select2">
							<option value="">-Pilih Tahun-</option>
							<!--									looping  tahun kedepan dan kebelakang-->
							<?php
							for($i=date('Y'); $i>=date('Y')-5; $i-=1){
								echo"<option value='$i'> $i </option>";
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Jenis Dana</label>
						<input type="text" class="form-control" name="jenis_dana" required>
					</div>

					<div class="form-group">
						<label>Jumlah Dana</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text text-danger">Rp.</span>
							</div>
							<input type="text" class="form-control rupiah" name="dana" value="" required="">
						</div>
					</div>

					<div class="form-group">
						<label>Tanggal</label>
						<input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!---->
<?php //} else { ?>
<!---->
<?php //} ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
	$('.rupiah').inputmask('decimal', {
		allowMinus: false,
		autoGroup: true,
		groupSeparator: '.',
		rightAlign: false,
		autoUnmask: true,
		removeMaskOnSubmit: true
	});
	$('#dtable').DataTable();
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
