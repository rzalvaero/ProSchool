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
<!--						<h3>Daftar Pajak</h3>-->
						<button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark " data-toggle="modal" data-target="#addTax"><i class="fa fa-plus"></i> Tambah Pajak</button>

					</div>



					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
						   aria-expanded="false">...</a>
					</div>
				</div>
				<div class="table-responsive">
					<table id="dtable" class="table table-hover table display data-table text-nowrap">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Pajak</th>
							<th>Besaran Pajak</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>PPH</td>
							<td>2.5 %</td>
							<td>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									   aria-expanded="false">
										<span class="flaticon-more-button-of-three-dots"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item"
										   href=""><i
													class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
										<a class="dropdown-item"
										   href="#delModal3" data-toggle="modal"><i
													class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>

									</div>
								</div>

							</td>
						</tr>
						<div class="modal modal-default fade" id="delModal3">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi
											penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/tax/delete/3" method="post"
											  accept-charset="utf-8">
											<input type="hidden" name="delName" value="PPH">
											<button type="button" class="btn btn-default pull-left"
													data-dismiss="modal"><span class="fa fa-close"></span> Batal
											</button>
											<button type="submit" class="btn btn-danger"><span
														class="fa fa-check"></span> Hapus
											</button>
										</form>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>2</td>
							<td>PPN</td>
							<td>10 %</td>
							<td>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									   aria-expanded="false">
										<span class="flaticon-more-button-of-three-dots"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item"
										   href=""><i
													class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
										<a class="dropdown-item"
										   href="#delModal3" data-toggle="modal"><i
													class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>

									</div>
								</div>
							</td>
						</tr>
						<div class="modal modal-default fade" id="delModal1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi
											penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/tax/delete/1" method="post"
											  accept-charset="utf-8">
											<input type="hidden" name="delName" value="PPN">
											<button type="button" class="btn btn-default pull-left"
													data-dismiss="modal"><span class="fa fa-close"></span> Batal
											</button>
											<button type="submit" class="btn btn-danger"><span
														class="fa fa-check"></span> Hapus
											</button>
										</form>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>3</td>
							<td>PPN + PPH</td>
							<td>12.5 %</td>
							<td>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									   aria-expanded="false">
										<span class="flaticon-more-button-of-three-dots"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item"
										   href=""><i
													class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
										<a class="dropdown-item"
										   href="#delModal3" data-toggle="modal"><i
													class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>

									</div>
								</div>
							</td>
						</tr>
						<div class="modal modal-default fade" id="delModal2">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi
											penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/tax/delete/2" method="post"
											  accept-charset="utf-8">
											<input type="hidden" name="delName" value="PPN + PPH">
											<button type="button" class="btn btn-default pull-left"
													data-dismiss="modal"><span class="fa fa-close"></span> Batal
											</button>
											<button type="submit" class="btn btn-danger"><span
														class="fa fa-check"></span> Hapus
											</button>
										</form>
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
