<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<?php } else {
	} ?>


	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<h3>Akun Biaya</h3>

		<div class="card height-auto">
			<div class="card-body">
				<div class="table-responsive">
					<table id='dtable' class='table table-hover table display data-table text-nowrap'>
						<thead>
						<tr>
							<th>No</th>
							<th>Kode Akun</th>
							<th>Keterangan</th>
							<th>Jenis Akun</th>
							<th>Kategori</th>
							<th>Unit Sekolah</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>

						<tr style="font-weight: bold;">
							<td>1</td>
							<td>1-10000</td>
							<td>AKTIVA</td>
							<td>Akun Utama</td>
							<td>
								#
							</td>
							<td>Semua Unit</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addAccount1" title="Tambah Sub Akun"><i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
						<div class="modal fade" id="addAccount1" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Tambah Sub Akun</h4>

										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add_glob" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" value="1-12100">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="1">
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<tr style="font-weight: bold;">
							<td>2</td>
							<td>1-10800</td>
							<td>Aktiva SMA</td>
							<td>Sub Akun 1</td>
							<td>
								#
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addSubAccount54" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editSubAccount54" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
							</td>
						</tr>
						<div class="modal fade" id="addSubAccount54" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add_glob" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" value="1-10805">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editSubAccount54" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10800">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Aktiva SMA ">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="1">
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<tr>
							<td>3</td>
							<td>1-10801</td>
							<td>Kas Tunai SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount55" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount55" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount55" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10801.2">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="55">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount55" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="55">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10801">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Kas Tunai  SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<tr>
							<td>4</td>
							<td>1-10801.1</td>
							<td>Kas berjalan</td>
							<td>Sub Akun 3</td>
							<td>
								Keuangan
							</td>
							<td>TK</td>
							<td align='left'>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editGrandchildAccount129" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteGrandchildAccount129" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="editGrandchildAccount129" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="129">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10801.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Kas berjalan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="55">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2" selected>TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteGrandchildAccount129">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/129"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10801.1">
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
							<td>5</td>
							<td>1-10802</td>
							<td>Kas Bank SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount59" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount59" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteChildAccount59" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount59" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10802.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="59">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount59" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="59">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10802">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Kas Bank  SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteChildAccount59">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/59"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10802">
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
							<td>6</td>
							<td>1-10803</td>
							<td>Kas Bank BRI Syariah SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount123" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount123" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteChildAccount123" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount123" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10803.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="123">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount123" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="123">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10803">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Kas Bank BRI Syariah SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteChildAccount123">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/123"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10803">
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
							<td>7</td>
							<td>1-10804</td>
							<td>Kas Bank Mandiri SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount132" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount132" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteChildAccount132" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount132" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10804.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="132">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount132" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="132">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10804">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Kas Bank Mandiri  SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="54">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteChildAccount132">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/132"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10804">
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

						<tr style="font-weight: bold;">
							<td>8</td>
							<td>1-10900</td>
							<td>Piutang SMA</td>
							<td>Sub Akun 1</td>
							<td>
								#
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addSubAccount56" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editSubAccount56" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
							</td>
						</tr>
						<div class="modal fade" id="addSubAccount56" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add_glob" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" value="1-10903">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="56">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editSubAccount56" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="56">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10900">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Piutang  SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="1">
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<tr>
							<td>9</td>
							<td>1-10901</td>
							<td>Piutang Siswa SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount57" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount57" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteChildAccount57" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount57" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10901.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="57">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount57" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="57">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10901">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Piutang Siswa SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="56">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteChildAccount57">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/57"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10901">
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
							<td>10</td>
							<td>1-10902</td>
							<td>Piutang SMA SMA</td>
							<td>Sub Akun 2</td>
							<td>
								Keuangan
							</td>
							<td>SMA</td>
							<td align='left'>
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal"
										data-target="#addChildAccount139" title="Tambah Sub Akun"><i
											class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
										data-target="#editChildAccount139" title="Edit Sub Akun"><i
											class="fa fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
										data-target="#deleteChildAccount139" title="Hapus Sub Akun"><i
											class="fa fa-trash"></i></button>
							</td>
						</tr>

						<div class="modal fade" id="addChildAccount139" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10902.1">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="139">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2">Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6">SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal fade" id="editChildAccount139" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Sub Akun</h4>
									</div>
									<form action="https://demo.adminsekolah.net/manage/account/add" method="post"
										  accept-charset="utf-8">
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<input type="hidden" required="" name="account_id"
															   class="form-control" value="139">
													</div>
													<div class="form-group">
														<label>Kode Akun</label>
														<input type="text" required="" readonly="" name="account_code"
															   class="form-control" placeholder="Masukkan Kode Akun"
															   value="1-10902">
													</div>
													<div class="form-group">
														<label>Keterangan</label>
														<input type="text" required="" name="account_description"
															   class="form-control" placeholder="Masukkan Keterangan"
															   value="Piutang SMA SMA">
													</div>
													<div class="form-group">
														<input type="hidden" required="" name="account_note"
															   class="form-control" value="56">
													</div>
													<div class="form-group">
														<label>Kategori <small data-toggle="tooltip"
																			   title="Wajib diisi">*</small></label>
														<select required="" name="account_category"
																class="form-control">
															<option value="">-Pilih Kategori-</option>
															<option value="1">Pembayaran</option>
															<option value="2" selected>Keuangan</option>
														</select>
													</div>
													<div class="form-group">
														<label>Unit Sekolah <small data-toggle="tooltip"
																				   title="Wajib diisi">*</small></label>
														<select required="" name="account_majors_id"
																class="form-control">
															<option value="">-Pilih Unit Sekolah-</option>
															<option value="2">TK</option>
															<option value="3">SD</option>
															<option value="4">SMP</option>
															<option value="6" selected>SMA</option>
															<option value="7">SMA Lazuardi</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="modal modal-default fade" id="deleteChildAccount139">
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
										<form action="https://demo.adminsekolah.net/manage/account/delete/139"
											  method="post" accept-charset="utf-8">
											<input type="hidden" name="delCode" value="1-10902">
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
<!-- Modal -->

<div class="modal fade" id="addPoshutang" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah POS Hutang</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="https://demo.adminsekolah.net/manage/poshutang/add_glob" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_poshutang">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Kode Akun</label>
									<select required="" name="poshutang_account_id[]" class="form-control">
										<option value="">-Pilih Kode Akun-</option>
										<option value="47">2-20101 - Hutang SMP</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama POS Hutang</label>
									<input type="text" required="" name="poshutang_name[]" class="form-control"
										   placeholder="Contoh: Hutang Pegawai">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="poshutang_description[]" class="form-control"
										   placeholder="Contoh: Hutang Pegawai">
								</div>
							</div>

						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
