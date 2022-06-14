<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<div class="col-4-xxxl col-12">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Jenis Pembayaran</h3>
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
				<form class="new-added-form" action="<?php echo base_url() . 'keuangan/save_jenis_pembayaran'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
							<input type="text" value="<?= $unit ?>" name="unit" hidden>
							<label>POS <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
							<select name="id_pos" class="form-control select2">
								<option value="">-Pilih POS-</option>
								<?php foreach($pos_bayar as $l){ ?>
									<option value="<?php echo $l['id_pos']; ?>"><?php echo $l['nama_pos']; ?>   </option>
								<?php } ?>
							</select>
						</div>

						<div class="col-12-xxxl col-lg-4 col-12 form-group">
							<label>Tingkat</label>
							<select name="tingkat" class="form-control" class="form-control select2">
								<option value="">-Pilih Tahun-</option>
								<!--									looping  tahun kedepan dan kebelakang-->
								<?php
								for($i=date('Y'); $i>=date('Y')-5; $i-=1){
									echo"<option value='$i'> $i </option>";
								}
								?>
							</select>

						</div>

						<div class="col-12-xxxl col-lg-4 col-12 form-group">
							<label>Tipe <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
							<select name="tipe" class="form-control" required="">
								<option value="">-Pilih Tipe-</option>
								<option value="bulanan" >Bulanan</option>
								<option value="bebas" >Bebas</option>
							</select>

						</div>

						<div class="col-12 form-group mg-t-8">
							<button style="float:right;" type="submit"
									class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save
							</button>
							<button style="float:right;margin: 0px 20px 0px 0px;" type="reset"
									class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset
							</button>
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
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Daftar Jenis Pembayaran</h3>
					</div>

					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
						   aria-expanded="false">...</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table display data-table text-nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>No.</th>
							<th>POS</th>
							<th>Nama Pembayaran</th>
							<th>Tipe</th>
							<th>Tahun</th>
							<th>Tarif Pembayaran</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;
						$unit = $this->session->userdata('unit');
						$query = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
						left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
						left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
                        where sr_pos_pembayaran.unit = '$unit'
						group by sr_jenis_bayar.id_pos")->result_array();

						?>

						<?php foreach ($query as $row): ?>
							<tr>
								<td>
									<div class="form-check">
										<input type="checkbox" class="form-check-input">
										<label class="form-check-label"><?php echo $no++ ?></label>

									</div>
								</td>
								<td><?php echo $row['nama_pos'] ?></td>
								<td><?php echo $row['keterangan'] ?></td>
								<td><?php echo $row['tipe'] ?></td>
								<td><?php echo $row['tingkat'] ?></td>

								<td>
									<a data-toggle="tooltip" data-placement="top" title="Ubah"
									   class="btn btn-primary btn-xs"
									   href="<?php echo base_url() . 'keuangan/tarif_pembayaran/' . $row['id_jenis_bayar']; ?>">
										Setting Tarif Pembayaran
									</a>
								</td>
							<td>
								<a data-placement="top" title="Ubah"
								   class="btn btn-danger btn-xs "
								   href="#editModal1<?php echo $row['id_jenis_bayar'] ?>" data-toggle="modal"data-toggle="tooltip">
									<i class="fa fa-trash"></i>&nbsp;Hapus
								</a>
							</td>
							</tr>

							<div class="modal fade" id="editModal1<?php echo $row['id_jenis_bayar'];?>" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<h2>Hapus Jenis Pembayaran</h2>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_jenis_pembayaran') ?>">
											<div class="modal-body">
												<p>Anda yakin mau menghapus <b><?php echo $row['nama_pos'] ?>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id_jenis_bayar" value="<?php echo $row['id_jenis_bayar'];?>">
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
	<?php } else { ?>
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Jenis Pembayaran</h3>
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
					<form class="new-added-form" action="<?php echo base_url() . 'keuangan/save_jenis_pembayaran'; ?>" method="post">
						<div class="row">
							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Unit </label>
									<?php $no=1; $db = $this->db->query('select * from web_unit')->result(); ?>
									<select name="unit" id="unit" class="select2">
										<option value="">-Pilih Unit-</option>

										<?php foreach ($db as $item) :?>
											<option value="<?= $item->id?>"><?= $item->nama ?></option>
										<?php endforeach; ?>
								</select>
							</div>
							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>POS <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
								<select name="id_pos" class="form-control select2">
									<option value="">-Pilih POS-</option>
									<?php foreach($pos_bayar as $l){ ?>
										<option value="<?php echo $l['id_pos']; ?>"><?php echo $l['nama_pos']; ?>   </option>
									<?php } ?>
								</select>
							</div>

							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Tingkat</label>
								<select name="tingkat" class="form-control" class="form-control select2">
									<option value="">-Pilih Tahun-</option>
									<!--									looping  tahun kedepan dan kebelakang-->
									<?php
									for($i=date('Y'); $i>=date('Y')-5; $i-=1){
										echo"<option value='$i'> $i </option>";
									}
									?>
								</select>

							</div>

							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Tipe <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
								<select name="tipe" class="form-control" required="">
									<option value="">-Pilih Tipe-</option>
									<option value="bulanan" >Bulanan</option>
									<option value="bebas" >Bebas</option>
								</select>

							</div>

							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit"
										class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save
								</button>
								<button style="float:right;margin: 0px 20px 0px 0px;" type="reset"
										class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset
								</button>
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
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Daftar Jenis Pembayaran</h3>
						</div>

						<div class="dropdown">
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
							   aria-expanded="false">...</a>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table display data-table text-nowrap" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>No.</th>
								<th>POS</th>
								<th>Nama Pembayaran</th>
								<th>Tipe</th>
								<th>Tahun</th>
								<th>Tarif Pembayaran</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no=1;
							$query = $this->db->query("select sr_pos_pembayaran.nama_pos,sr_account.keterangan,sr_jenis_bayar.tingkat,tipe,sr_jenis_bayar.id_jenis_bayar from sr_jenis_bayar
						left join sr_pos_pembayaran on sr_jenis_bayar.id_pos = sr_pos_pembayaran.id_pos
						left join sr_account on sr_pos_pembayaran.kode_akun = sr_pos_pembayaran.kode_akun
						group by sr_jenis_bayar.id_pos")->result_array();

							?>

							<?php foreach ($query as $row): ?>
								<tr>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input">
											<label class="form-check-label"><?php echo $no++ ?></label>

										</div>
									</td>
									<td><?php echo $row['nama_pos'] ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									<td><?php echo $row['tipe'] ?></td>
									<td><?php echo $row['tingkat'] ?></td>

									<td>
										<a data-toggle="tooltip" data-placement="top" title="Ubah"
										   class="btn btn-primary btn-xs"
										   href="<?php echo base_url() . 'keuangan/tarif_pembayaran/' . $row['id_jenis_bayar']; ?>">
											Setting Tarif Pembayaran
										</a>
									</td>
									<td>
										<a data-placement="top" title="Ubah"
										   class="btn btn-danger btn-xs "
										   href="#editModal<?php echo $row['id_jenis_bayar'] ?>" data-toggle="modal"data-toggle="tooltip">
											<i class="fa fa-trash"></i>&nbsp;Hapus
										</a>
									</td>
								</tr>

								<div class="modal fade" id="editModal<?php echo $row['id_jenis_bayar'];?>" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Hapus Jenis Pembayaran</h2>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_jenis_pembayaran') ?>">
												<div class="modal-body">
													<p>Anda yakin mau menghapus <b><?php echo $row['nama_pos'] ?>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id_jenis_bayar" value="<?php echo $row['id_jenis_bayar'];?>">
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
		</div>
	<?php } ?>


