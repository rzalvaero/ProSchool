	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
		<div class="row" style="width: 100%">
			<div class="col-4-xxxl col-12">
				<div class="card">
					<div class="card-body">
						<div class="heading-layout1">
							<div class="item-title">
								<h3>Setting Unit <?= $list->nama_unit_pos ?></h3>
							</div>
						</div>
						<form class="new-added-form" action="<?php echo base_url(). 'keuangan/tarif_unit_pos_save'; ?>" method="post">
							<div class="row">
								<!--							input hidden value id_unit_pos-->
								<input type="hidden" name="id_unit_pos" value="<?= $list->id_unit_pos ?>">
								<input type="hidden" name="tipe" value="pendapatan">
								<div class="col-12-xxxl col-lg-6 col-12 form-group">
									<label>Tambah Pendapatan</label>
									<!--							query dropdown select akun biaya-->
									<select name="id_akun_biaya" class="select2">
										<option value="">Pilih Akun Biaya</option>
										<?php foreach ($akun as $akun_biaya) { ?>
											<option value="<?= $akun_biaya['id_akun'] ?>"><?=$akun_biaya['kode_akun'].' - '.$akun_biaya['keterangan'] ?></option>
										<?php } ?>
										<input type="text" hidden value="<?=$unit ?>" name="unit" class="form-control">
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
							<div class="item-title">
								<h3>Data Tarif Pendapatan</h3>
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
									<th>Nama Unit Pos </th>
									<th>Setting</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; ?>
								<?php foreach ($tarif_pos_unit as $product): ?>
									<tr>
										<td><?php echo $no++; ?></td></td>

										<td>
											<?php echo $product->kode_akun ?>
										</td>
										<td>
											<?php echo $product->keterangan ?>
										</td>
										<td>
											<div class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"
												   aria-expanded="false">
													<span class="flaticon-more-button-of-three-dots"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item"
													   href=""><i
																class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
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
													<h2>Hapus Pajak Keuangan</h2>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_tarif_unit_pos') ?>">
													<div class="modal-body">
														<p>Anda yakin mau menghapus <b><?php echo $product->keterangan;?></b></p>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id_tarif_unit_pos" value="<?php echo $product->id_tarif_unit_pos;?>">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
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
	<?php } else { ?>
		<div class="row" style="width: 100%">
			<div class="col-4-xxxl col-12">
				<div class="card">
					<div class="card-body">
						<div class="heading-layout1">
							<div class="item-title">
								<h3>Setting Unit <?= $list->nama_unit_pos ?></h3>
							</div>
						</div>
						<form class="new-added-form" action="<?php echo base_url(). 'keuangan/tarif_unit_pos_save'; ?>" method="post">
							<div class="row">
								<!--							input hidden value id_unit_pos-->
								<div class="col-12-xxxl col-lg-6 col-12 form-group">
									<label>Unit</label>
										<?php
										$db = $this->db->query("select * from web_unit")->result_array();
										?>
										<select name="unit" id="unit" class="form-control select2">
										<?php foreach ($db as $akun_biaya) { ?>
											<option value="<?= $akun_biaya['id'] ?>"><?=$akun_biaya['nama']?></option>
										<?php } ?>
									</select>
								</div>
								<input type="hidden" name="tipe" value="pendapatan">
								<div class="col-12-xxxl col-lg-6 col-12 form-group">
									<label>Tambah Pendapatan</label>
									<!--							query dropdown select akun biaya-->
									<select name="id_akun_biaya" class="select2">
										<option value="">Pilih Akun Biaya</option>
										<?php foreach ($akun as $akun_biaya) { ?>
											<option value="<?= $akun_biaya['id_akun'] ?>"><?=$akun_biaya['kode_akun'].' - '.$akun_biaya['keterangan'] ?></option>
										<?php } ?>
										<input type="text" hidden value="<?=$unit ?>" name="unit" class="form-control">
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
							<div class="item-title">
								<h3>Data Tarif Pendapatan</h3>
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
									<th>Nama Unit Pos </th>
									<th>Setting</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; ?>
								<?php foreach ($tarif_pos_unit as $product): ?>
									<tr>
										<td><?php echo $no++; ?></td></td>

										<td>
											<?php echo $product->kode_akun ?>
										</td>
										<td>
											<?php echo $product->keterangan ?>
										</td>
										<td>
											<div class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"
												   aria-expanded="false">
													<span class="flaticon-more-button-of-three-dots"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item"
													   href=""><i
																class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
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
													<h2>Hapus Pajak Keuangan</h2>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_tarif_unit_pos') ?>">
													<div class="modal-body">
														<p>Anda yakin mau menghapus <b><?php echo $product->keterangan;?></b></p>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="id_tarif_unit_pos" value="<?php echo $product->id_tarif_unit_pos;?>">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
														<button type="submit" class="btn btn-danger">Hapus</button>
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
 <?php	} ?>
	<!-- Add Notice Area End Here -->

