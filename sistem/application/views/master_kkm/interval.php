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
	<div class=" col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Interval Predikat</h3>
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
					<form class="new-added-form" action="<?php echo base_url() . 'master/save_predikat'; ?>" method="post">
						<div class="row">
								<?php $unit = $this->session->userdata('unit');?>
								<input type="text" name="unit" value="<?php echo $unit ?>" hidden>
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>KKM</label>

								<select name="idkkm" id="idkkm" class="form-control" required>
									<option value="">Pilih KKM</option>
									<?php
									$unit = $this->session->userdata('unit');
									$row_siswa = $this->db->query("select k_romawi,k_keterangan,mp_nama,k_kkm,sr_kkm.* from sr_kkm
left join sr_kelas on sr_kkm.idkelas = sr_kelas.idkelas
left join sr_mata_pelajaran on sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran
where sr_kkm.unit = '$unit'
order by k_romawi asc ")->result_array();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product['idkkm']; ?>"><?php echo 'kelas :'. '' .$product['k_romawi'].' - '.$product['k_keterangan'].'-'.'Mata-pelajaran :'.$product['mp_nama'].'-'.'KKM :'.$product['k_kkm'] ?></option>

									<?php
										$kkm = $product['idkkm'];
										$nilai_kkm = $product['k_kkm'];
										$interval = (100 - $nilai_kkm)/3;?>
									<?php endforeach;
									?>


								</select>
							</div>
							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<div id="interval_result"></div>
							</div>

							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<table class="table-bordered table" style="width: 100%">

									<tr>
										<th colspan="2">(A) Sangat Baik</th>
									</tr>
									<tr>
										<th>A Min</th>
										<th>A Max</th>
									</tr>
									<tr>
										<td>
											<input type="number" class="form-control" placeholder="A Min" name="amin" required>
										</td>
										<td>
											<input type="number" class="form-control" placeholder="A Max" name="amax"required>

										</td>
									</tr>

									<tr >
										<th colspan="2"style="margin-top: 20px">(B) Baik</th>
									</tr>
									<tr>
										<th>B Min</th>
										<th>B Max</th>
									</tr>
									<tr>
										<td>
											<input type="number" class="form-control" placeholder="B Min" name="bmin"required>
										</td>
										<td>
											<input type="number" class="form-control" placeholder="B Max" name="bmax" required>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<table class="table-bordered table" style="width: 100%">

									<tr>
										<th colspan="2">(C) Cukup</th>
									</tr>
									<tr>
										<th>C Min</th>
										<th>C Max</th>
									</tr>
									<tr>
										<td>
											<input type="number" class="form-control" placeholder="C Min" name="cmin"required>
										</td>
										<td>
											<input type="number" class="form-control" placeholder="C Max" name="cmax"required>

										</td>
									</tr>

									<tr >
										<th colspan="2"style="margin-top: 20px">(D) Perlu Pertimbangan</th>
									</tr>
									<tr>
										<th>D Min</th>
										<th>D Max</th>
									</tr>
									<tr>
										<td>
											<input type="number" class="form-control" placeholder="D Min" name="dmin"required>
										</td>
										<td>
											<input type="number" class="form-control" placeholder="D Max" name="dmax"required>
										</td>
									</tr>
								</table>
							</div>

							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit"
										class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12-xxxl col-12">
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
								<th>Nama Kelas</th>
								<th>Nama Mata Pelajaran</th>
								<th>KKM</th>
								<th>Interval</th>
								<th>A Min</th>
								<th>A Max</th>
								<th>B Min</th>
								<th>B Max</th>
								<th>C Min</th>
								<th>C Max</th>
								<th>D Min</th>
								<th>D Max</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php
							$q = $this->db->query("select k_romawi,k_keterangan,mp_nama,sr_kkm.*,sr_interval_predikat.* from sr_interval_predikat
							 join sr_kkm on sr_kkm.idkkm = sr_interval_predikat.idkkm
							 join sr_kelas on sr_kkm.idkelas = sr_kelas.idkelas
							 join sr_mata_pelajaran on sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran
							where sr_kkm.unit = '$unit'
							order by k_romawi asc")->result();
							?>
							<?php foreach ($q as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									</td>

									<td>
										<?php echo '('.$product->k_romawi.')'.' 	- '.$product->k_keterangan ?>
									</td>
									<td>
										<?php echo $product->mp_nama ?>
									</td>
									<td>
										<?php echo $product->k_kkm ?>
									</td>
									<td>
										<?php
										$interval = (100 - $product->k_kkm)/3;
										echo number_format($interval,2) ?>
									</td>
									<td>
										<?php echo $product->amin ?>
									</td>
									<td>
										<?php echo $product->amax ?>
									</td>
									<td>
										<?php echo $product->bmin ?>
									</td>
									<td>
										<?php echo $product->bmax ?>
									</td>
									<td>
										<?php echo $product->cmin ?>
									</td>
									<td>
										<?php echo $product->cmax ?>
									</td>
									<td>
										<?php echo $product->dmin ?>
									</td>
									<td>
										<?php echo $product->dmax ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#delModal3" data-toggle="modal"><i
														class="fas fa-times text-orange-red" data-toggle="tooltip"
														title="Hapus"></i>Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delModal3" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus KKM</h2>
												<button type="button" class="close" data-dismiss="modal">&times;
												</button>
											</div>
											<form class="form-horizontal" method="post"
												  action="<?php echo base_url('master/delete_interval') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus KKM <?php echo $product->k_kkm; ?></p>
													<br>
													<b>Mata Pelajaran : <?php echo $product->mp_nama; ?></b>
													<br>
													<b>Kelas : <?php echo $product->k_romawi; ?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idinterval_predikat"
														   value="<?php echo $product->idinterval_predikat; ?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup
													</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="editModal<?php echo $product->idkkm; ?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit KKM</h2>
												<button type="button" class="close" data-dismiss="modal">&times;
												</button>
											</div>
											<form class="form-horizontal" method="post"
												  action="<?php echo base_url('keuangan/pajak_update') ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nama Pajak</label>
															<input type="text" placeholder="Tulis Nama Pajak"
																   name="nama_pajak" class="form-control"
																   value="<?php echo $product->idkkm; ?>">
														</div>
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nominal Pajak ( % ) </label>
															<input type="number" placeholder="Contoh : 10 %"
																   name="besaran_pajak" class="form-control"
																   value="<?php echo $product->idkkm; ?>">
														</div>

													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_pajak"
														   value="<?php echo $product->idkkm; ?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup
													</button>
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
				<h2>Tambah Pajak</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Nama Pajak</label>
								<input type="text" required="" name="tax_name[]" class="form-control"
									   placeholder="Contoh: Sekolah Dasar Putra">
							</div>
							<div class="col-md-6">
								<label>Besaran Pajak</label>
								<input type="text" required="" name="tax_number[]" class="form-control"
									   placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5">
							</div>
						</div>
					</div>
					<br>
					<h6><a href="#" class="btn-fill-lg btn-gradient-yellow btn-sm" id="addScnt_tax"><i
									class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
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
		<div class="row" style="width: 100%;">
			<div class="col-12-xxxl col-12">
				<div class="card height-auto">
					<div class="card-body">
						<div class="heading-layout1">
							<div class="item-title">
								<h3>Interval Predikat</h3>
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
						<form class="new-added-form" action="<?php echo base_url() . 'master/save_predikat'; ?>" method="post">
							<div class="row">
								<div class="col-3-xxxl col-lg-6 col-12 form-group">
									<label>Unit</label>
									<select name="unit" id="unit" class="form-control ">
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
								<div class="col-9-xxxl col-lg-6 col-12 form-group">
									<label>KKM</label>

									<select name="idkkm" id="idkkm" class="combo-kkm form-control " required>
									</select>
								</div>
								<div class="col-12-xxxl col-lg-6 col-12 form-group">
										<div id="interval_result"></div>
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<table class="table-bordered table" style="width: 100%">

										<tr>
											<th colspan="2">(A) Sangat Baik</th>
										</tr>
										<tr>
											<th>A Min</th>
											<th>A Max</th>
										</tr>
										<tr>
											<td>
												<input type="number" class="form-control" placeholder="A Min" name="amin" required>
											</td>
											<td>
												<input type="number" class="form-control" placeholder="A Max" name="amax"required>

											</td>
										</tr>

										<tr >
											<th colspan="2"style="margin-top: 20px">(B) Baik</th>
										</tr>
										<tr>
											<th>B Min</th>
											<th>B Max</th>
										</tr>
										<tr>
											<td>
												<input type="number" class="form-control" placeholder="B Min" name="bmin"required>
											</td>
											<td>
												<input type="number" class="form-control" placeholder="B Max" name="bmax" required>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<table class="table-bordered table" style="width: 100%">

										<tr>
											<th colspan="2">(C) Cukup</th>
										</tr>
										<tr>
											<th>C Min</th>
											<th>C Max</th>
										</tr>
										<tr>
											<td>
												<input type="number" class="form-control" placeholder="C Min" name="cmin"required>
											</td>
											<td>
												<input type="number" class="form-control" placeholder="C Max" name="cmax"required>

											</td>
										</tr>

										<tr >
											<th colspan="2"style="margin-top: 20px">(D) Perlu Pertimbangan</th>
										</tr>
										<tr>
											<th>D Min</th>
											<th>D Max</th>
										</tr>
										<tr>
											<td>
												<input type="number" class="form-control" placeholder="D Min" name="dmin"required>
											</td>
											<td>
												<input type="number" class="form-control" placeholder="D Max" name="dmax"required>
											</td>
										</tr>
									</table>
								</div>

								<div class="col-12 form-group mg-t-8">
									<button style="float:right;" type="submit"
											class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12-xxxl col-12">
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
									<th>Nama Kelas</th>
									<th>Nama Mata Pelajaran</th>
									<th>KKM</th>
									<th>Interval</th>
									<th>A Min</th>
									<th>A Max</th>
									<th>B Min</th>
									<th>B Max</th>
									<th>C Min</th>
									<th>C Max</th>
									<th>D Min</th>
									<th>D Max</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; ?>
								<?php
								$q = $this->db->query("select k_romawi,k_keterangan,mp_nama,sr_kkm.*,sr_interval_predikat.* from sr_interval_predikat
							 join sr_kkm on sr_kkm.idkkm = sr_interval_predikat.idkkm
							 join sr_kelas on sr_kkm.idkelas = sr_kelas.idkelas
							 join sr_mata_pelajaran on sr_mata_pelajaran.idmata_pelajaran = sr_kkm.idmata_pelajaran
							order by k_romawi asc")->result();
								?>
								<?php foreach ($q as $product): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										</td>

										<td>
											<?php echo '('.$product->k_romawi.')'.' 	- '.$product->k_keterangan ?>
										</td>
										<td>
											<?php echo $product->mp_nama ?>
										</td>
										<td>
											<?php echo $product->k_kkm ?>
										</td>
										<td>
											<?php
											$interval = (100 - $product->k_kkm)/3;
											echo number_format($interval,2) ?>
										</td>
										<td>
											<?php echo $product->amin ?>
										</td>
										<td>
											<?php echo $product->amax ?>
										</td>
										<td>
											<?php echo $product->bmin ?>
										</td>
										<td>
											<?php echo $product->bmax ?>
										</td>
										<td>
											<?php echo $product->cmin ?>
										</td>
										<td>
											<?php echo $product->cmax ?>
										</td>
										<td>
											<?php echo $product->dmin ?>
										</td>
										<td>
											<?php echo $product->dmax ?>
										</td>

										<td>
											<div class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"
												   aria-expanded="false">
													<span class="flaticon-more-button-of-three-dots"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-right">

													<a class="dropdown-item"
													   href="#delModal3" data-toggle="modal"><i
																class="fas fa-times text-orange-red" data-toggle="tooltip"
																title="Hapus"></i>Hapus</a>
												</div>
											</div>
										</td>
									</tr>
									<div class="modal fade" id="delModal3" role="dialog">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h2>Hapus KKM</h2>
													<button type="button" class="close" data-dismiss="modal">&times;
													</button>
												</div>
												<form class="form-horizontal" method="post"
													  action="<?php echo base_url('master/delete_interval') ?>">
													<div class="modal-body">
														<p>Anda yakin mau menghapus KKM <?php echo $product->k_kkm; ?></p>
														<br>
														<b>Mata Pelajaran : <?php echo $product->mp_nama; ?></b>
														<br>
														<b>Kelas : <?php echo $product->k_romawi; ?></b></p>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="idinterval_predikat"
															   value="<?php echo $product->idinterval_predikat; ?>">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup
														</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editModal<?php echo $product->idkkm; ?>" role="dialog">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h2>Edit KKM</h2>
													<button type="button" class="close" data-dismiss="modal">&times;
													</button>
												</div>
												<form class="form-horizontal" method="post"
													  action="<?php echo base_url('keuangan/pajak_update') ?>">
													<div class="modal-body">
														<div class="row">
															<div class="col-12-xxxl col-lg-6 col-12 form-group">
																<label>Nama Pajak</label>
																<input type="text" placeholder="Tulis Nama Pajak"
																	   name="nama_pajak" class="form-control"
																	   value="<?php echo $product->idkkm; ?>">
															</div>
															<div class="col-12-xxxl col-lg-6 col-12 form-group">
																<label>Nominal Pajak ( % ) </label>
																<input type="number" placeholder="Contoh : 10 %"
																	   name="besaran_pajak" class="form-control"
																	   value="<?php echo $product->idkkm; ?>">
															</div>

														</div>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id_pajak"
															   value="<?php echo $product->idkkm; ?>">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup
														</button>
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
						<h2>Tambah Pajak</h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form action="" method="post" accept-charset="utf-8">
						<div class="modal-body">
							<div id="p_scents_tax form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Nama Pajak</label>
										<input type="text" required="" name="tax_name[]" class="form-control"
											   placeholder="Contoh: Sekolah Dasar Putra">
									</div>
									<div class="col-md-6">
										<label>Besaran Pajak</label>
										<input type="text" required="" name="tax_number[]" class="form-control"
											   placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5">
									</div>
								</div>
							</div>
							<br>
							<h6><a href="#" class="btn-fill-lg btn-gradient-yellow btn-sm" id="addScnt_tax"><i
											class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
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
	$('#unit').on('click', function () {
		console.log($(this).val())
		var unit = $(this).val();
		$.get("<?php echo base_url(); ?>master/ajax_combo_kkm", {unit: unit}, function (data) {
			$(".combo-kkm").html(data);
		});

	});

	$('#idkkm').on('change', function (){
		var idkkm = $('#idkkm option:selected').val();
		console.log(idkkm)
		$.ajax({
			url: '<?=base_url('master/read_interval/')?>'+idkkm,
			dataType: 'html',
			success: function(data){
				console.log(data)
				if (data){
					$('#interval_result').show();
					$('#interval_result').html(data);
				}else{
					$('#interval_result').empty()
				}
				}
		});
	});

</script>
<script>
<!--	datatable child row-->
$(document).ready(function() {
	var table = $('#example').DataTable( {

	}
});
</script>
