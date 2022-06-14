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
					<h3>Kas Masuk</h3>
					</div>


					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
						   aria-expanded="false">...</a>
					</div>
				</div>
				<div class="table-responsive">
<!--					<table id="dtable" class="table table-hover">-->
					<table id="dtable" class="table table-hover table display data-table text-nowrap">
						<thead>
						<tr>
							<th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
							<th>No</th>
							<th>Kas</th>
							<th>No. Ref</th>
							<th>Tanggal</th>
							<th>Kode Akun</th>
							<th>Keterangan</th>
							<th>Nominal (Rp.)</th>
							<th>Pajak</th>
							<th>Unit POS</th>
							<th>Total (Rp.)</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="128">
							</td>
							<td>1</td>
							<td>[Kas Tunai TK]</td>
							<td>GKTK000356745419022201</td>
							<td>19/02/2022</td>
							<td>5-50105 - Biaya Biaya Gaji Guru TK TK</td>
							<td>Gaji Guru TK Ceria Indah S.pd</td>
							<td>Rp. 2.987.100</td>
							<td>0 %</td>
							<td>Tidak Ada</td>
							<td>Rp. 2.987.100</td>
							<td>
								Gaji																							</td>
						</tr>
						<div class="modal modal-default fade" id="delModal128">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/kredit/delete/128" method="post" accept-charset="utf-8">
											<input type="hidden" name="delNoref" value="GKTK000356745419022201">
											<input type="hidden" name="delGaji" value="51">
											<input type="hidden" name="delName" value="Gaji Guru TK Ceria Indah S.pd">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
											<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
										</form>														</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>
								<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="127">
							</td>
							<td>2</td>
							<td>[Kas Tunai SD]</td>
							<td>JKSD1902220001</td>
							<td>19/02/2022</td>
							<td>5-50303 - Biaya Kirim Setoran SD</td>
							<td>Transfer Kas ke akun Kas Bank BRI Syariah SD</td>
							<td>Rp. 50.000.000</td>
							<td>0 %</td>
							<td>Tidak Ada</td>
							<td>Rp. 50.000.000</td>
							<td>
								Transfer Kas											</td>
						</tr>
						<div class="modal modal-default fade" id="delModal127">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/kredit/delete/127" method="post" accept-charset="utf-8">
											<input type="hidden" name="delNoref" value="JKSD1902220001">
											<input type="hidden" name="delGaji" value="">
											<input type="hidden" name="delName" value="Transfer Kas ke akun Kas Bank BRI Syariah SD">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
											<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
										</form>														</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>
								<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="126">
							</td>
							<td>3</td>
							<td>[Kas Bank BRI Syariah TK]</td>
							<td>JKTK1902220001</td>
							<td>19/02/2022</td>
							<td>5-50106 - Biaya Transport Dinas TK</td>
							<td>UANG MINYAK</td>
							<td>Rp. 20.000</td>
							<td>0 %</td>
							<td>Tidak Ada</td>
							<td>Rp. 20.000</td>
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
										   href="#delModal126" data-toggle="modal"><i
													class="fas fa-times text-orange-red" data-toggle="tooltip"
													title="Hapus"></i>Hapus</a>
										<a class="dropdown-item"
										   href="https://demo.adminsekolah.net/manage/kredit/cetakTrx/JKTK1902220001" target="_blank" data-toggle="modal"><i
													class="fas fa-print text-orange-red" data-toggle="tooltip"
													title="Hapus"></i>Print</a>
									</div>
								</div>

							</td>
						</tr>
						<div class="modal modal-default fade" id="delModal126">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/kredit/delete/126" method="post" accept-charset="utf-8">
											<input type="hidden" name="delNoref" value="JKTK1902220001">
											<input type="hidden" name="delGaji" value="">
											<input type="hidden" name="delName" value="UANG MINYAK">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
											<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
										</form>														</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<tr>
							<td>
								<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="129">
							</td>
							<td>4</td>
							<td>[Kas Tunai SD]</td>
							<td>JKSD1902220002</td>
							<td>19/02/2022</td>
							<td>5-50305 - Biaya Konsumsi SD</td>
							<td>Konsumsi Rapat</td>
							<td>Rp. 250.000</td>
							<td>0 %</td>
							<td>Tidak Ada</td>
							<td>Rp. 250.000</td>
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
										   href="#delModal126" data-toggle="modal"><i
													class="fas fa-times text-orange-red" data-toggle="tooltip"
													title="Hapus"></i>Hapus</a>
										<a class="dropdown-item"
										   href="https://demo.adminsekolah.net/manage/kredit/cetakTrx/JKTK1902220001" target="_blank" data-toggle="modal"><i
													class="fas fa-print text-orange-red" data-toggle="tooltip"
													title="Hapus"></i>Print</a>
									</div>
								</div>
								</td>
						</tr>
						<div class="modal modal-default fade" id="delModal129">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
									</div>
									<div class="modal-body">
										<p>Apakah anda yakin akan menghapus data ini?</p>
									</div>
									<div class="modal-footer">
										<form action="https://demo.adminsekolah.net/manage/kredit/delete/129" method="post" accept-charset="utf-8">
											<input type="hidden" name="delNoref" value="JKSD1902220002">
											<input type="hidden" name="delGaji" value="">
											<input type="hidden" name="delName" value="Konsumsi Rapat">
											<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
											<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
										</form>														</div>
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
