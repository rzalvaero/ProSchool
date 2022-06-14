<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<div class=" col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<h3>Akun Biaya</h3>

		<div class="card height-auto">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table display data-table text-nowrap" cellspacing="0" width="100%">

						<thead>
						<tr>
							<th>No</th>
							<th>Kode Akun</th>
							<th>Unit</th>
							<th>Keterangan</th>
							<th>Jenis Akun</th>
							<th>Kategori</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1;
						$unit = $this->session->userdata('unit');
						?>
						<?php $db = $this->db->query("select * from sr_account where unit = '$unit' ") ?>
						<?php foreach ($list as $product): ?>
							<tr>
								<td><?php echo $no++; ?></td></td>

								<td>
									<?php echo $product->kode_akun ?>
								</td>

								<td>
									<?php echo $product->nama ?>
								</td>
								<td>
									<?php echo  substr($product->keterangan , 0, 30) ?>
								</td>
								<td>
									<!--									//if jenis_akun == 1 then akun utama-->
									<!--									//if jenis_akun == 2 then Sub Akun 1-->
									<!--									//if jenis_akun == 2 then Sub Akun 2-->
									<!--									//if jenis_akun == 4 then Sub Akun 3-->
									<?php if ($product->jenis_akun == 1) {
										echo "Akun Utama";
									} else if ($product->jenis_akun == 2) {
										echo "Sub Akun 1";
									} else if ($product->jenis_akun == 3) {
										echo "Sub Akun 2";
									} else {
										echo "Sub Akun 3";
									} ?>
								</td>
								<td>
									<?php echo  $product->kategori ?>
								</td>
								<td>
									<?php if ($product->jenis_akun == 1) { ?>
										<a class=" btn btn-primary"
										   href="#utama" data-toggle="modal">Tambah</a>
									<?php } ?>
									<?php if ($product->jenis_akun == 2) { ?>

										<a class=" btn btn-primary"
										   href="#sub_akun_1" data-toggle="modal"><i class="fa fa-plus"></i>Tambah</a>
										<a class=" btn btn-warning"
										   href="#delModal123<?php echo $product->id_akun;?>" data-toggle="modal"><i class="fa fa-pencil-ruler"></i>&nbsp;Edit</a>
										<a class=" btn btn-danger"
										   href="#hapus_sub_akun_1" data-toggle="modal"><i class="fa fa-trash"></i>&nbsp;Hapus</a>

										<div class="modal fade" id="delModal123<?php echo $product->id_akun;?>" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Edit Sub Akun 1</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form action="<?php echo site_url('keuangan/update_akun_biaya') ?>" method="post"  >
														<div class="modal-body">
															<div id="form-group">
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Kode Akun</label>
																			<input type="text" name="unit" value="<?= $unit ?>" hidden>
																			<input type="text" name="id_akun" value="<?= $product->id_akun ?>" hidden>
																			<input type="text" name="jenis_akun" value="2" hidden>
																			<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100" value="<?php echo $product->kode_akun ?>">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">

																			<label>Kategori</label>
																			<select name="kategori" id="kategori" class="form-control select2">
																				<option value="">Pilih Kategori</option>
																				<option value="keuangan"<?php if($product->kategori == 'keuangan') echo 'selected="selected"'; ?>>Keuangan</option>
																				<option value="pembayaran"<?php if($product->kategori == 'pembayaran') echo 'selected="selected"'; ?>>Pembayaran</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Jenis Akun</label>
																			<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
																				<option value="">Pilih Jenis Akun</option>
																				<option value="aset"<?php if($product->modul_keuangan == 'aset') echo 'selected="selected"'; ?>>Aset</option>
																				<option value="pendapatan"<?php if($product->modul_keuangan == 'pendapatan') echo 'selected="selected"'; ?>>Pendapatan</option>
																				<option value="biaya"<?php if($product->modul_keuangan == 'biaya') echo 'selected="selected"'; ?>>Biaya</option>
																				<option value="kewajiban"<?php if($product->modul_keuangan == 'kewajiban') echo 'selected="selected"'; ?>>Kewajiban</option>
																				<option value="modal"<?php if($product->modul_keuangan == 'modal') echo 'selected="selected"'; ?>>Modal</option>
																			</select>
																		</div>
																	</div>

																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Keterangan</label>
																			<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan" value="<?= $product->keterangan ?>">
																		</div>
																	</div>
																</div>
															</div>
															<br>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-success">Simpan</button>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="hapus_sub_akun_1" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Tambah Akun Utama</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_akun_biaya') ?>">
														<div class="modal-body">
															<p>Anda yakin mau menghapus <b><?php echo $product->keterangan;?></b></p>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id_akun" value="<?php echo $product->id_akun;?>">
															<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
															<button type="submit" class="btn btn-danger">Hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>


									<?php } ?>
									<?php if ($product->jenis_akun == 3) { ?>
										<a class=" btn btn-primary"
										   href="#sub_akun_2<?php echo $product->id_akun;?>" data-toggle="modal"><i class="fa fa-plus"></i>Tambah</a>
										<a class=" btn btn-warning"
										   href="#delModal126<?php echo $product->id_akun;?>" data-toggle="modal"><i class="fa fa-pencil-ruler"></i>&nbsp;Edit</a>
										<a class=" btn btn-danger"
										   href="#hapus_sub_akun_2" data-toggle="modal"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
										<div class="modal fade" id="hapus_sub_akun_2<?php echo $product->id_akun;?>" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Tambah Akun Utama</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_akun_biaya') ?>">
														<div class="modal-body">
															<p>Anda yakin mau menghapus <b><?php echo $product->keterangan;?></b></p>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id_akun" value="<?php echo $product->id_akun;?>">
															<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
															<button type="submit" class="btn btn-danger">Hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php } ?>
									<!--									<a onclick="deleteConfirm('--><?php //echo site_url('keuangan/akun_biaya/delete/'.$product->id_akun) ?><!--')"-->
									<!--									   href="#!" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>-->
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
<div class="modal fade" id="utama" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Akun Utama</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">

									<label>Kode Akun</label>
									<input type="text" name="unit" value="<?= $unit ?>" hidden>
									<input type="text" name="jenis_akun" value="1" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1000">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<input type="text" required="" name="kategori" class="form-control" placeholder="Tulis Kategori">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--sub akun 1 add-->
<div class="modal fade" id="sub_akun_1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Sub Akun 1</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Kode Akun</label>
									<input type="text" name="unit" value="<?= $unit ?>" hidden>
									<input type="text" name="jenis_akun" value="2" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control select2">
										<option value="">Pilih Kategori</option>
										<option value="keuangan">Keuangan</option>
										<option value="pembayaran">Pembayaran</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--sub akun 2 add-->
<div class="modal fade" id="sub_akun_2" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Sub Akun 2</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Kode Akun</label>
									<input type="text" name="unit" value="<?= $unit ?>" hidden>
									<input type="text" name="jenis_akun" value="3" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100.1">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control select2">
										<option value="">Pilih Kategori</option>
										<option value="keuangan">Keuangan</option>
										<option value="pembayaran">Pembayaran</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
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
<div class=" col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<h3>Akun Biaya</h3>

		<div class="card height-auto">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table display data-table text-nowrap" cellspacing="0" width="100%">

						<thead>
						<tr>
							<th>No</th>
							<th>Kode Akun</th>
							<th>Unit</th>
							<th>Keterangan</th>
							<th>Jenis Akun</th>
							<th>Kategori</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($list as $product): ?>
							<tr>
								<td><?php echo $no++; ?></td></td>

								<td>
									<?php echo $product->kode_akun ?>
								</td>
								<td>
									<?php echo $product->nama ?>
								</td>
								<td>
									<?php echo  substr($product->keterangan , 0, 30) ?>
								</td>
								<td>
									<!--									//if jenis_akun == 1 then akun utama-->
									<!--									//if jenis_akun == 2 then Sub Akun 1-->
									<!--									//if jenis_akun == 2 then Sub Akun 2-->
									<!--									//if jenis_akun == 4 then Sub Akun 3-->
									<?php if ($product->jenis_akun == 1) {
										echo "Akun Utama";
									} else if ($product->jenis_akun == 2) {
										echo "Sub Akun 1";
									} else if ($product->jenis_akun == 3) {
										echo "Sub Akun 2";
									} else {
										echo "Sub Akun 3";
									} ?>
								</td>
								<td>
									<?php echo  $product->kategori ?>
								</td>
								<td>
									<?php if ($product->jenis_akun == 1) { ?>
										<a class=" btn btn-primary"
										   href="#utama" data-toggle="modal">Tambah</a>
									<?php } ?>
									<?php if ($product->jenis_akun == 2) { ?>
										<a class=" btn btn-primary"
										   href="#sub_akun_1" data-toggle="modal"><i class="fa fa-plus"></i>Tambah</a>
										<a class=" btn btn-warning"
										   href="#delModal126<?php echo $product->id_akun;?>" data-toggle="modal"><i class="fa fa-pencil-ruler"></i>&nbsp;Edit</a>
										<a class=" btn btn-danger"
										   href="#hapus_sub_akun_1<?php echo $product->id_akun;?>" data-toggle="modal"><i class="fa fa-trash"></i>&nbsp;Hapus</a>

<!--										<a class="dropdown-item"-->
<!--										   href="#delModal3--><?php //echo $product->id_pajak;?><!--" data-toggle="modal"><i-->
<!--													class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>-->

										<div class="modal fade" id="delModal126<?php echo $product->id_akun;?>" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Edit Sub Akun 1</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form action="<?php echo site_url('keuangan/update_akun_biaya') ?>" method="post"  >
														<div class="modal-body">
															<div id="form-group">
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Unit</label>
																			<?php $no=1; $db = $this->db->query('select * from web_unit')->result(); ?>
																			<select name="unit" id="unit" class="select2 form-control">
																				<option value="">Pilih Unit</option>
																				<?php foreach ($db as $item) :?>
																					<option value="<?= $item->id?>"<?php if($product->unit == $item->id) echo 'selected="selected"'; ?>><?= $item->nama ?></option>
																				<?php endforeach; ?>
																			</select>

																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Kode Akun</label>
																			<input type="text" name="unit" value="<?= $unit ?>" hidden>
																			<input type="text" name="id_akun" value="<?= $product->id_akun ?>" hidden>
																			<input type="text" name="jenis_akun" value="2" hidden>
																			<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100" value="<?php echo $product->kode_akun ?>">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">

																			<label>Kategori</label>
																			<select name="kategori" id="kategori" class="form-control select2">
																				<option value="">Pilih Kategori</option>
																				<option value="keuangan"<?php if($product->kategori == 'keuangan') echo 'selected="selected"'; ?>>Keuangan</option>
																				<option value="pembayaran"<?php if($product->kategori == 'pembayaran') echo 'selected="selected"'; ?>>Pembayaran</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Jenis Akun</label>
																			<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
																				<option value="">Pilih Jenis Akun</option>
																				<option value="aset"<?php if($product->modul_keuangan == 'aset') echo 'selected="selected"'; ?>>Aset</option>
																				<option value="pendapatan"<?php if($product->modul_keuangan == 'pendapatan') echo 'selected="selected"'; ?>>Pendapatan</option>
																				<option value="biaya"<?php if($product->modul_keuangan == 'biaya') echo 'selected="selected"'; ?>>Biaya</option>
																				<option value="kewajiban"<?php if($product->modul_keuangan == 'kewajiban') echo 'selected="selected"'; ?>>Kewajiban</option>
																				<option value="modal"<?php if($product->modul_keuangan == 'modal') echo 'selected="selected"'; ?>>Modal</option>
																			</select>
																		</div>
																	</div>

																	<div class="col-md-12">
																		<div class="form-group">
																			<label>Keterangan</label>
																			<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan" value="<?= $product->keterangan ?>">
																		</div>
																	</div>
																</div>
															</div>
															<br>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-success">Simpan</button>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="modal fade" id="hapus_sub_akun_1<?php echo $product->id_akun;?>" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Hapus Pajak Keuangan</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_akun_biaya') ?>">
														<div class="modal-body">
															<p>Anda yakin mau menghapus <b><?php echo $product->kode_akun;?></b></p>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id_akun" value="<?php echo $product->id_akun;?>">
															<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
															<button type="submit" class="btn btn-danger">Hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>




									<?php } ?>
									<?php if ($product->jenis_akun == 3) { ?>
										<a class=" btn btn-primary"
										   href="#sub_akun_2" data-toggle="modal"><i class="fa fa-plus"></i>Tambah</a>
										<a class=" btn btn-warning"
										   href="#delModal126" data-toggle="modal"><i class="fa fa-pencil-ruler"></i>&nbsp;Edit</a>
										<a class=" btn btn-danger"
										   href="#hapus_sub_akun_2" data-toggle="modal"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
										<div class="modal fade" id="hapus_sub_akun_2" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h2>Tambah Akun Utama</h2>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_akun_biaya') ?>">
														<div class="modal-body">
															<p>Anda yakin mau menghapus <b><?php echo $product->keterangan;?></b></p>
														</div>
														<div class="modal-footer">
															<input type="hidden" name="id_akun" value="<?php echo $product->id_akun;?>">
															<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
															<button type="submit" class="btn btn-danger">Hapus</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php } ?>
									<!--									<a onclick="deleteConfirm('--><?php //echo site_url('keuangan/akun_biaya/delete/'.$product->id_akun) ?><!--')"-->
									<!--									   href="#!" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>-->
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
<div class="modal fade" id="utama" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Akun Utama</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">

									<label>Unit</label>
									<?php $no=1; $db = $this->db->query('select * from web_unit')->result(); ?>
									<select name="unit" id="unit" class="select2">
									<?php foreach ($db as $item) :?>
										<option value="<?= $item->id?>"><?= $item->nama ?></option>
									<?php endforeach; ?>
									</select>

								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kode Akun</label>
									<input type="text" name="jenis_akun" value="1" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1000">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control select2">
										<option value="">Pilih Kategori</option>
										<option value="keuangan">Keuangan</option>
										<option value="pembayaran">Pembayaran</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--sub akun 1 add-->
<div class="modal fade" id="sub_akun_1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Sub Akun 1</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Kode Akun</label>
									<input type="text" name="unit" value="<?= $unit ?>" hidden>
									<input type="text" name="jenis_akun" value="2" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control select2">
										<option value="">Pilih Kategori</option>
										<option value="keuangan">Keuangan</option>
										<option value="pembayaran">Pembayaran</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--sub akun 2 add-->
<div class="modal fade" id="sub_akun_2" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Tambah Sub Akun 2</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('keuangan/save_akun_biaya_utama') ?>" method="post"  >
				<div class="modal-body">
					<div id="form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Kode Akun</label>
									<input type="text" name="unit" value="<?= $unit ?>" hidden>
									<input type="text" name="jenis_akun" value="3" hidden>
									<input type="text" required="" name="kode_akun" class="form-control" placeholder="Contoh: 1-1100.1">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

									<label>Kategori</label>
									<select name="kategori" id="kategori" class="form-control select2">
										<option value="">Pilih Kategori</option>
										<option value="keuangan">Keuangan</option>
										<option value="pembayaran">Pembayaran</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Jenis Akun</label>
									<select name="modul_keuangan" id="modul_keuangan" class="form-control select2">
										<option value="">Pilih Jenis Akun</option>
										<option value="aset">Aset</option>
										<option value="pendapatan">Pendapatan</option>
										<option value="biaya">Biaya</option>
										<option value="kewajiban">Kewajiban</option>
										<option value="modal">Modal</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="keterangan" class="form-control" placeholder="Tulis Keterangan">
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php	} ?>


	<!-- Add Notice Area End Here -->


<script type="text/javascript">
	$(document).ready(function (e) {
		$(document).on("click", ".delete-modal", function (e) {
			var delete_id = $(this).attr('data-value');
			$('button[name="deleteBtn1"]').val(delete_id);
		});
	});
</script>
