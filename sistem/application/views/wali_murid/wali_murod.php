<!-- jQuery -->

<!-- DataTables -->

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>


<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<div class="row"style="width: 100%;">
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body" >
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Kesehatan</h3>
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
					<form class="new-added-form" action="<?php echo base_url(). 'kesehatan/save_kesehatan'; ?>" method="post">
						<div class="row">


							<div class="col-12-xxxl col-lg-6 col-12 form-group">
								<label>Nama Kesehatan</label>
								<input type="text" placeholder="Tulis Nama Kesehatan" name="id_wali_murid" class="form-control">
								<!--								unit session-->
								<input type="hidden" name="unit" value="<?php echo $this->session->userdata('unit'); ?>">
							</div>

							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-8-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">

						<div class="dropdown">
						</div>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Kesehatan</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$unit = $this->session->userdata('unit');
							$row_siswa = $this->db->query("select * from sr_kesehatan where unit = '$unit'")->result();
							$no = 1; ?>

							<?php foreach ($row_siswa as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->id_wali_murid ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->idkesehatan;?>" data-toggle="modal"><i
															class="fas fa-pencil-ruler " data-toggle="tooltip"title="Edit"></i>Edit</a>
												<a class="dropdown-item"
												   href="#delModal3" data-toggle="modal"><i
															class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delModal3" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/delete_kesehatan') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->id_wali_murid;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="editModal<?php echo $product->idkesehatan;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Kesehatan</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('kesehatan/setting_kesehatan_update') ?>">
												<div class="modal-body">
													<div class="row">
														<div class="col-12-xxxl col-lg-6 col-12 form-group">
															<label>Nama Kesehatan</label>
															<input type="text" placeholder="Tulis Nama Kesehatan" name="id_wali_murid" class="form-control" value="<?php echo $product->id_wali_murid;?>">
														</div>


													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="idkesehatan" value="<?php echo $product->idkesehatan;?>">
													<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
<div class="row"style="width: 100%;">

		<div class="col-12-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="card-header">

						<a href="#addTax"data-toggle="modal" class="btn btn-fill-lg btn-gradient-yellow"data-toggle="tooltip">Tambah Wali Murid</a>
					</div>
					<div class="heading-layout1">

						<div class="dropdown">
						</div>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="">
							<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama Siswa</th>
								<th>Nama Wali Murid</th>
								<th>No Telepon</th>
								<th>Email</th>
								<th>Agama</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php
							$db = $this->db->query("select * from sr_wali_murid join sr_siswa on sr_siswa.idsiswa = sr_wali_murid.idsiswa")->result();

							?>
							<?php foreach ($db as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->nik ?>
									</td>

									<td>
										<?php echo $product->s_nama ?>
									</td>

									<td>
										<?php echo $product->nama_lengkap ?>
									</td>

									<td>
										<?php echo $product->no_telp ?>
									</td>

									<td>
										<?php echo $product->email ?>
									</td>
									<td>
										<?php echo $product->agama ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->id_wali_murid;?>" data-toggle="modal"><i
															class="fas fa-pencil-ruler " data-toggle="tooltip"title="Edit"></i>Edit</a>
												<a class="dropdown-item"
												   href="#delModal3<?php echo $product->id_wali_murid;?>" data-toggle="modal"><i
															class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delModal3<?php echo $product->id_wali_murid;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus Wali Murid</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('wali_murid/delete_wali_murid') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->nama_lengkap;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_wali_murid" value="<?php echo $product->id_wali_murid;?>">
													<button class="btn btn-lg" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger btn-lg">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>

<!--							-->
								<div class="modal fade" id="editModal<?php echo $product->id_wali_murid;?>" role="dialog" >
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Wali Murid</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form action="<?php echo base_url('wali_murid/update_wali_murid') ?>" method="post" accept-charset="utf-8">
												<div class="modal-body">
													<div id="p_scents_tax form-group">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="id_wali_murid" value="<?= $product->id_wali_murid ?>" hidden>
																	<label>Nama Siswa</label>
																	<?php
																	$db= $this->db->query("select * from sr_siswa order by s_nama asc")->result();
																	?>
																	<select name="idsiswa" id="idsiswa" class="select2 form-control">
																		<option value="">Pilih Siswa</option>
																		<?php foreach ($db as $item) : ?>
																			<option value="<?php echo $item->idsiswa ?>"<?php if($product->idsiswa == $item->idsiswa) echo 'selected="selected"'; ?>><?php echo $item->s_nisn .'-'.$item->s_nama; ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Nama Wali Murid</label>
																	<input type="text" name="nama_lengkap" class="form-control" value="<?= $product->nama_lengkap ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>NIK</label>
																	<input type="text" name="nik" class="form-control"value="<?= $product->nik ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Tempat Lahir</label>
																	<input type="text" name="tempat_lahir" class="form-control"value="<?= $product->tempat_lahir ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Tanggal Lahir</label>
																	<input type="date" name="tanggal_lahir" class="form-control"value="<?= $product->tanggal_lahir ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Jenis Kelamin</label>
																	<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
																		<option value="">Pilih Jenis Kelamin</option>
																		<option value="Laki-laki"<?php if($product->jenis_kelamin == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-Laki</option>
																		<option value="Perempuan"<?php if($product->jenis_kelamin == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
																	</select>
																</div>
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label>Agama</label>
																	<select name="agama" id="agama" class="form-control">
																		<option value="">Pilih Agama</option>
																		<option value="Islam"<?php if($product->agama == 'Islam') echo 'selected="selected"'; ?>>Islam</option>
																		<option value="Kristen"<?php if($product->agama == 'Kristen') echo 'selected="selected"'; ?>>Kristen</option>
																		<option value="Budha"<?php if($product->agama == 'Budha') echo 'selected="selected"'; ?>>Budha</option>
																		<option value="Hindu"<?php if($product->agama == 'Hindu') echo 'selected="selected"'; ?>>Hindu</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Email</label>
																	<input type="email" name="email" class="form-control"value="<?= $product->email ;?>" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>No Telepon</label>
																	<input type="text" name="no_telp" class="form-control"value="<?= $product->no_telp ?>" >
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Alamat</label>
																	<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $product->alamat ?></textarea>
																</div>
															</div>

														</div>
													</div>
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success btn-lg">Simpan</button>
													<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
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

	<div class="modal fade" id="addTax" role="dialog" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Wali Murid</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="<?php echo base_url('wali_murid/save_wali_murid') ?>" method="post" accept-charset="utf-8">
					<div class="modal-body">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label>Nama Siswa</label>
										<?php
										$db= $this->db->query("select * from sr_siswa order by s_nama asc")->result();
										?>
										<select name="idsiswa" id="idsiswa" class="select2">
											<option value="">Pilih Siswa</option>
											<?php foreach ($db as $item) : ?>
												<option value="<?php echo $item->idsiswa ?>"><?php echo $item->s_nisn .'-'.$item->s_nama; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama Wali Murid</label>
										<input type="text" name="nama_lengkap" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>NIK</label>
										<input type="text" name="nik" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" name="tempat_lahir" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input type="date" name="tanggal_lahir" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="Laki-laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Agama</label>
											<select name="agama" id="agama" class="form-control">
												<option value="">Pilih Agama</option>
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Budha">Budha</option>
												<option value="Hindu">Hindu</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>No Telepon</label>
											<input type="text" name="no_telp" class="form-control" >
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
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
	<div class="row"style="width: 100%;">

		<div class="col-12-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="card-header">

						<a href="#addTax"data-toggle="modal" class="btn btn-fill-lg btn-gradient-yellow"data-toggle="tooltip">Tambah Wali Murid</a>
					</div>
					<div class="heading-layout1">

						<div class="dropdown">
						</div>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="">
							<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama Siswa</th>
								<th>Nama Wali Murid</th>
								<th>No Telepon</th>
								<th>Email</th>
								<th>Agama</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php
							$db = $this->db->query("select * from sr_wali_murid join sr_siswa on sr_siswa.idsiswa = sr_wali_murid.idsiswa")->result();

							?>
							<?php foreach ($db as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td></td>

									<td>
										<?php echo $product->nik ?>
									</td>

									<td>
										<?php echo $product->s_nama ?>
									</td>

									<td>
										<?php echo $product->nama_lengkap ?>
									</td>

									<td>
										<?php echo $product->no_telp ?>
									</td>

									<td>
										<?php echo $product->email ?>
									</td>
									<td>
										<?php echo $product->agama ?>
									</td>

									<td>
										<div class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"
											   aria-expanded="false">
												<span class="flaticon-more-button-of-three-dots"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item"
												   href="#editModal<?php echo $product->id_wali_murid;?>" data-toggle="modal"><i
															class="fas fa-pencil-ruler " data-toggle="tooltip"title="Edit"></i>Edit</a>
												<a class="dropdown-item"
												   href="#delModal3<?php echo $product->id_wali_murid;?>" data-toggle="modal"><i
															class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="delModal3<?php echo $product->id_wali_murid;?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus Wali Murid</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('wali_murid/delete_wali_murid') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $product->nama_lengkap;?></b></p>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_wali_murid" value="<?php echo $product->id_wali_murid;?>">
													<button class="btn btn-lg" data-dismiss="modal" aria-hidden="true">Tutup</button>
													<button type="submit" class="btn btn-danger btn-lg">Hapus</button>
												</div>
											</form>
										</div>
									</div>
								</div>

<!--							-->
								<div class="modal fade" id="editModal<?php echo $product->id_wali_murid;?>" role="dialog" >
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit Wali Murid</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form action="<?php echo base_url('wali_murid/update_wali_murid') ?>" method="post" accept-charset="utf-8">
												<div class="modal-body">
													<div id="p_scents_tax form-group">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" name="id_wali_murid" value="<?= $product->id_wali_murid ?>" hidden>
																	<label>Nama Siswa</label>
																	<?php
																	$db= $this->db->query("select * from sr_siswa order by s_nama asc")->result();
																	?>
																	<select name="idsiswa" id="idsiswa" class="select2 form-control">
																		<option value="">Pilih Siswa</option>
																		<?php foreach ($db as $item) : ?>
																			<option value="<?php echo $item->idsiswa ?>"<?php if($product->idsiswa == $item->idsiswa) echo 'selected="selected"'; ?>><?php echo $item->s_nisn .'-'.$item->s_nama; ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Nama Wali Murid</label>
																	<input type="text" name="nama_lengkap" class="form-control" value="<?= $product->nama_lengkap ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>NIK</label>
																	<input type="text" name="nik" class="form-control"value="<?= $product->nik ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Tempat Lahir</label>
																	<input type="text" name="tempat_lahir" class="form-control"value="<?= $product->tempat_lahir ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Tanggal Lahir</label>
																	<input type="date" name="tanggal_lahir" class="form-control"value="<?= $product->tanggal_lahir ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Jenis Kelamin</label>
																	<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
																		<option value="">Pilih Jenis Kelamin</option>
																		<option value="Laki-laki"<?php if($product->jenis_kelamin == 'Laki-laki') echo 'selected="selected"'; ?>>Laki-Laki</option>
																		<option value="Perempuan"<?php if($product->jenis_kelamin == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
																	</select>
																</div>
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label>Agama</label>
																	<select name="agama" id="agama" class="form-control">
																		<option value="">Pilih Agama</option>
																		<option value="Islam"<?php if($product->agama == 'Islam') echo 'selected="selected"'; ?>>Islam</option>
																		<option value="Kristen"<?php if($product->agama == 'Kristen') echo 'selected="selected"'; ?>>Kristen</option>
																		<option value="Budha"<?php if($product->agama == 'Budha') echo 'selected="selected"'; ?>>Budha</option>
																		<option value="Hindu"<?php if($product->agama == 'Hindu') echo 'selected="selected"'; ?>>Hindu</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>Email</label>
																	<input type="email" name="email" class="form-control"value="<?= $product->email ;?>" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label>No Telepon</label>
																	<input type="text" name="no_telp" class="form-control"value="<?= $product->no_telp ?>" >
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Alamat</label>
																	<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $product->alamat ?></textarea>
																</div>
															</div>

														</div>
													</div>
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success btn-lg">Simpan</button>
													<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
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

	<div class="modal fade" id="addTax" role="dialog" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah Wali Murid</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="<?php echo base_url('wali_murid/save_wali_murid') ?>" method="post" accept-charset="utf-8">
					<div class="modal-body">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label>Nama Siswa</label>
										<?php
										$db= $this->db->query("select * from sr_siswa order by s_nama asc")->result();
										?>
										<select name="idsiswa" id="idsiswa" class="select2">
											<option value="">Pilih Siswa</option>
											<?php foreach ($db as $item) : ?>
												<option value="<?php echo $item->idsiswa ?>"><?php echo $item->s_nisn .'-'.$item->s_nama; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Nama Wali Murid</label>
										<input type="text" name="nama_lengkap" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>NIK</label>
										<input type="text" name="nik" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" name="tempat_lahir" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input type="date" name="tanggal_lahir" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="Laki-laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Agama</label>
											<select name="agama" id="agama" class="form-control">
												<option value="">Pilih Agama</option>
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Budha">Budha</option>
												<option value="Hindu">Hindu</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>No Telepon</label>
											<input type="text" name="no_telp" class="form-control" >
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
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
<?php } ?>

<!---->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script>

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
