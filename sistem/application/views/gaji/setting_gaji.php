<!-- Add Notice Area Start Here -->
<?php if ($this->session->userdata('type_users') == "GURU") { ?>

<?php } else {
} ?>

<div class="row">
	<div class="row">
		<div class="col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Jenis Jabatan</h3>
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
							<div class="col-12-xxxl col-lg-12 col-12 form-group">

								<label>Jabatan <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
								<select name="pos_id" class="form-control select2">
									<option value="">-Pilih Jabatan-</option>
									<option value="">Guru </option>
									<option value="">Kepala Sekolah</option>
									<option value="">Wali Kelas</option>
								</select>
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
		<!-- Add Notice Area End Here -->

		<?php echo $this->session->flashdata("msg"); ?>

		<!-- Data Table Area Start Here -->

		<div class="col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Setting Penggajian</h3>

						</div>


					</div>
					</form>						<!-- /.box-header -->
					<div class="table-responsive">
						<table class="table display data-table text-nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>Unit Sekolah</th>
								<th>Jabatan</th>
								<th>Status Kepegawaian</th>
								<th>Pendidikan Terakhir</th>
								<th>Setting</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1; ?>
							<?php foreach ($list as $row): ?>
								<tr>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input">
											<label class="form-check-label"><?php echo $no++ ?></label>

										</div>
									</td>
									<td><?php echo $row['u_nbm_nip'] ?></td>
									<td><?php echo $row['first_name'] ?></td>
									<td><?php echo $row['nama'] ?></td>
									<td><?php echo $row['u_tugas_tambahan'] ?></td>
									<td><?php echo $row['u_status_pegawai'] ?></td>
									<td><?php echo $row['u_jenjang'] ?></td>
									<td class="actions">
										<a data-toggle="tooltip" data-placement="top" title="Ubah"
										   class="btn btn-primary btn-xs"
										   href="<?php echo base_url() . 'gaji/tarif_gaji_detail/' . $row['idusers']; ?>">
											Setting Tarif Gaji
										</a>
										<a href="<?php echo base_url() . 'gaji/cetak_gaji/' . $row['idusers']; ?>" onclick="confirm('Cetak Gaji ? ')" class="btn btn-success" >Cetak</a>
									</td>

								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

		<!-- All Notice Area Start Here -->

		<!-- All Notice Area End Here -->
	</div>

	<div class="modal fade" id="addItem" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Unit POS</h4>

					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="https://demo.adminsekolah.net/manage/item/add_glob" method="post" accept-charset="utf-8">
					<div class="modal-body">
						<div id="p_scents_item">
							<div class="form-group">
								<label>Nama Unit POS</label>
								<input type="text" required="" name="item_name[]" class="form-control"
									   placeholder="Contoh: Pembangunan Gedung Sekolah">
							</div>
						</div>
						<!--					<h6><a href="#" class="btn btn-xs btn-success" id="addScnt_item"><i class="fa fa-plus"></i><b>-->
						<!--								Tambah Baris</b></a></h6>-->
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
		var scntDiv = $('#p_scents_tax');
		var i = $('#p_scents_tax .row').size() + 1;

		$("#addScnt_tax").click(function () {
			$('<div class="row"><div class="col-md-6"><label>Nama Pajak</label><input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra"><a href="#" class="btn btn-xs btn-danger remScnt_tax">Hapus Baris</a></div><div class="col-md-6"><label>Besaran Pajak</label><input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5"></div></div>').appendTo(scntDiv);
			i++;
			return false;
		});

		$(document).on("click", ".remScnt_tax", function () {
			if (i > 2) {
				$(this).parents('.row').remove();
				i--;
			}
			return false;
		});
	</script>
