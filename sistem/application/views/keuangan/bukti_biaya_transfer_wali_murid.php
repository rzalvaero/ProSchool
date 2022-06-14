<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>

	<div class="col-4-xxxl col-12">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Bukti Biaya Transfer</h3>
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
				<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
				<form class="new-added-form" action="<?php echo base_url(). 'kelas/add'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-5 col-12 form-group">
							<label>Pilih Kelas</label>
							<select name="nama_kelas" id="nama_kelas" class="form-control">
								<option value="">Pilih Kelas</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
<!--							<input name="nama_kelas" type="text" placeholder="Tulis dalam Romawi" class="form-control">-->
						</div>

						<div class="col-12-xxxl col-lg-5 col-12 form-group">
							<label>Status</label>
							<select id="s" name="s" class="form-control" required>
								<option value="" > --- Pilih Status --- </option>
								<option value="all" >Semua</option>
								<option value="1" >Terverifikasi</option>
								<option value="0" >Dibatalkan</option>
								<option value="2" >Dibayar</option>
								<option value="3" >Ditolak</option>
							</select>
						</div>


						<div class="col-12 form-group mg-t-8">
							<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<div class="card height-auto">
			<div class="card-body">
				<div class="table-responsive">
					<table id="dtable" class="table table-hover  display data-table text-nowrap">
						<thead>
						<tr>
							<th>No</th>
							<th>NIS</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Tanggal Bayar</th>
							<th>Bukti Bayar</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>2019030002</td>
							<td>Amir</td>
							<td>SD - SD 1</td>
							<td>02-02-2022 11:40:03</td>
							<td><a href="https://demo.adminsekolah.net/uploads/prove/4.jpeg" target="_blank"><img src="https://demo.adminsekolah.net/uploads/prove/4.jpeg" width="70"></a></td>
							<td>Terima kasih, pembayaran Telah Diverifikasi</td>
							<td><label class="label label-success">DIVERIFIKASI [Sudah Diverifikasi Admin]</label></td>
							<td>
							</td>
						</tr>

						<div class="modal modal-default fade" id="verificationProve38">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi Verifikasi Transfer Wali Murid</h3>
									</div>
									<div class="modal-body">
										<center>
											<a href="prove/approve/38" type="button" class="btn btn-success">Verifikasi</a>
											<a href="prove/ignore/38" type="button" class="btn btn-danger">Tolak</a>
										</center>
									</div>
									<div class="modal-footer">
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>2</td>
							<td>2019030002</td>
							<td>Amir</td>
							<td>SD - SD 1</td>
							<td>31-01-2022 18:28:29</td>
							<td><a href="https://demo.adminsekolah.net/uploads/prove/1.jpeg" target="_blank"><img src="https://demo.adminsekolah.net/uploads/prove/1.jpeg" width="70"></a></td>
							<td>Terima kasih, pembayaran Telah Diverifikasi</td>
							<td><label class="label label-success">DIVERIFIKASI [Sudah Diverifikasi Admin]</label></td>
							<td>
							</td>
						</tr>

						<div class="modal modal-default fade" id="verificationProve37">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi Verifikasi Transfer Wali Murid</h3>
									</div>
									<div class="modal-body">
										<center>
											<a href="prove/approve/37" type="button" class="btn btn-success">Verifikasi</a>
											<a href="prove/ignore/37" type="button" class="btn btn-danger">Tolak</a>
										</center>
									</div>
									<div class="modal-footer">
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>3</td>
							<td>9999</td>
							<td>Muhammad</td>
							<td>SD - SD 1</td>
							<td>19-05-2021 08:58:19</td>
							<td><a href="https://demo.adminsekolah.net/uploads/prove/314-43016-sepatu-sneakers-dok-instagramaxwearapparel.jpg" target="_blank"><img src="https://demo.adminsekolah.net/uploads/prove/314-43016-sepatu-sneakers-dok-instagramaxwearapparel.jpg" width="70"></a></td>
							<td>bayar spp</td>
							<td><label class="label label-warning">DIBAYAR [Menunggu Verifikasi Admin]</label></td>
							<td>
								<a href="#verificationProve4" data-toggle="modal" class="btn btn-xs btn-success">Verifikasi Transaksi</a>
							</td>
						</tr>

						<div class="modal modal-default fade" id="verificationProve4">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi Verifikasi Transfer Wali Murid</h3>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<center>
											<a href="prove/approve/4" type="button" class="btn btn-success">Verifikasi</a>
											<a href="prove/ignore/4" type="button" class="btn btn-danger">Tolak</a>
										</center>
									</div>
									<div class="modal-footer">
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>

						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>

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
								<label>Nama Pajak</label>
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
