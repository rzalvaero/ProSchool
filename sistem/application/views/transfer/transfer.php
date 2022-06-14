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
							<h3>Transfer</h3>
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
					<form class="new-added-form" action="<?php echo base_url() . 'transfer/proses_transfer'; ?>" method="post">
						<div class="row">
							<?php $unit = $this->session->userdata('unit');?>
							<input type="text" name="unit" value="<?php echo $unit ?>" hidden>
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<label>Nama Akus</label>

								<select name="akun" id="akun" class="select2 form-control">
									<option value="">Pilih Akun</option>
									<?php
									$unit = $this->session->userdata('unit');
									$row_siswa = $this->db->query("select * from sr_account where unit='$unit' and modul_keuangan = 'aset'")->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->id_akun; ?>"><?php echo $product->kode_akun.' - '.$product->keterangan; ?></option>
									<?php endforeach;
									?>
								</select>
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
<!--					<div class="row">-->
<!--						<div class="col-md-12">-->
<!--								<label for="">Unit Sekolah</label>-->
<!--								<h3>--><?//=$nama_unit ?><!--</h3>-->
<!--						</div>-->
<!--					</div>-->
					<?php if (!empty($nama_unit) && !empty($kode_akun)) { ?>
					<table class="table table-hover">
						<tr>
							<td>
								<label for="">Unit Sekolah</label>
							</td>
							<td>
								<h3>&nbsp;:&nbsp;</h3>
							</td>
							<td>
								<h4><?=$nama_unit ?></h4>
							</td>
						</tr>
						<tr>
							<td>
								<label for="">Akun</label>
							</td>
							<td>
								<h5>&nbsp;:&nbsp;</h5>
							</td>
							<td>
								<h5><?=$kode_akun.'-'.$keterangan ?></h5>
							</td>

						</tr>
					</table>
					<?php } ?>

				</div>
			</div>
		</div>

		<div class="col-12-xxxl col-12">
			<div class="card card-height">
				<div class="card-body">
					<div class="card-heading">
						<a href="#" data-toggle="modal" data-target="#addTax" class="btn btn-fill-md btn-gradient-yellow text-white">Transfer</a>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="table table-hover table display data-table text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Nominal</th>
								<th>keterangan</th>
								<th>User</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php
							if (!empty($id_akun)){
							$q = $this->db->query("select * from sr_history_transfer
join sr_account on sr_history_transfer.akun_sumber = sr_account.id_akun
join web_unit on web_unit.id = sr_history_transfer.unit where akun_sumber = '$id_akun'")->result();
							?>
							<?php foreach ($q as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									</td>
									<td>
										<?php echo $product->tanggal ?>
									</td>
									<td>
										<?php echo $product->nominal ?>
									</td>
									<td>
										<?php echo $product->keterangan ?>
									</td>
									<td>
										<?php echo $product->id_user ?>
									</td>


								</tr>


							<?php endforeach; ?>

							<?php } ?>

							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="modal fade" id="addTax" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Transfer Kas</h2>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo base_url(); ?>transfer/savetransfer" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_tax form-group">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label>Tanggal</label>
								<input type="date" required="" name="tanggal" class="form-control">
							</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label>Akun Tujuan</label>
								<select name="akun_tujuan" id="akun_tujuan" class=" form-control">
									<option value="">Pilih Akun </option>
								<?php
								$db = $this->db->query("select * from sr_account where modul_keuangan = 'aset'")->result();
								foreach ($db as $item):
								?>
								<option value="<?=$item->id_akun ?>"><?=$item->kode_akun.'-'.$item->keterangan ?></option>
								<?php endforeach; ?>
								</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label for="">Nominal</label>
								<input type="text" name="nominal" class="form-control rupiah" >
									<?php
									if (!empty($nama_unit) && !empty($nama_unit)){ ?>
										<input type="text" value="<?=$id_akun ?>" name="akunfrom" hidden>
										<input type="text" value="<?=$unit?>" name="unit"hidden>
									 <?php } ?>
							</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">

								<label for="">Keterangan</label>
								<textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
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
	<div class="row">
		<div class=" col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Transfer</h3>
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
					<form class="new-added-form" action="<?php echo base_url() . 'transfer/proses_transfer'; ?>" method="post">
						<div class="row">
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<label>Unit</label>
	<select name="unit" id="unit" class="form-control">
	<option value="">Pilih Unit</option>
								<?php
								$db =$this->db->query("select * from web_unit")->result();
								foreach ($db as $kode) :
								?>
									<option value="<?=$kode->id ?>"><?= $kode->nama ?></option>
								<?php endforeach; ?>
									</select>
							</div>
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<label>Nama Akus</label>

								<select name="akun" id="akun" class="select2 form-control">
									<option value="">Pilih Akun</option>
									<?php
									$row_siswa = $this->db->query("select * from sr_account where  modul_keuangan = 'aset'")->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->id_akun; ?>"><?php echo $product->kode_akun.' - '.$product->keterangan; ?></option>
									<?php endforeach;
									?>
								</select>
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
					<!--					<div class="row">-->
					<!--						<div class="col-md-12">-->
					<!--								<label for="">Unit Sekolah</label>-->
					<!--								<h3>--><?//=$nama_unit ?><!--</h3>-->
					<!--						</div>-->
					<!--					</div>-->
					<?php if (!empty($nama_unit) && !empty($kode_akun)) { ?>
						<table class="table table-hover">
							<tr>
								<td>
									<label for="">Unit Sekolah</label>
								</td>
								<td>
									<h3>&nbsp;:&nbsp;</h3>
								</td>
								<td>
									<h4><?=$nama_unit ?></h4>
								</td>
							</tr>
							<tr>
								<td>
									<label for="">Akun</label>
								</td>
								<td>
									<h5>&nbsp;:&nbsp;</h5>
								</td>
								<td>
									<h5><?=$kode_akun.'-'.$keterangan ?></h5>
								</td>

							</tr>
						</table>
					<?php } ?>

				</div>
			</div>
		</div>

		<div class="col-12-xxxl col-12">
			<div class="card card-height">
				<div class="card-body">
					<div class="card-heading">
						<a href="#" data-toggle="modal" data-target="#addTax" class="btn btn-fill-md btn-gradient-yellow text-white">Transfer</a>
					</div>
					<div class="table-responsive">
						<table id="dtable" class="table table-hover table display data-table text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Nominal</th>
								<th>keterangan</th>
								<th>User</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php
							if (!empty($id_akun)){
								$q = $this->db->query("select * from sr_history_transfer
join sr_account on sr_history_transfer.akun_sumber = sr_account.id_akun
join web_unit on web_unit.id = sr_history_transfer.unit where akun_sumber = '$id_akun'")->result();
								?>
								<?php foreach ($q as $product): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										</td>
										<td>
											<?php echo $product->tanggal ?>
										</td>
										<td>
											<?php echo $product->nominal ?>
										</td>
										<td>
											<?php echo $product->keterangan ?>
										</td>
										<td>
											<?php echo $product->id_user ?>
										</td>


									</tr>


								<?php endforeach; ?>

							<?php } ?>

							</tbody>
						</table>


					</div>
				</div>
			</div>
		</div>

	</div>
	</div>

	<div class="modal fade" id="addTax" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Transfer Kas</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="<?php echo base_url(); ?>transfer/savetransfer" method="post" accept-charset="utf-8">
					<div class="modal-body">
						<div id="p_scents_tax form-group">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Tanggal</label>
										<input type="date" required="" name="tanggal" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Akun Tujuan</label>
										<select name="akun_tujuan" id="akun_tujuan" class=" form-control">
											<option value="">Pilih Akun </option>
											<?php
											$db = $this->db->query("select * from sr_account where modul_keuangan = 'aset'")->result();
											foreach ($db as $item):
												?>
												<option value="<?=$item->id_akun ?>"><?=$item->kode_akun.'-'.$item->keterangan ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Nominal</label>
										<input type="text" name="nominal" class="form-control rupiah" >
										<?php
										if (!empty($nama_unit) && !empty($nama_unit)){ ?>
											<input type="text" value="<?=$id_akun ?>" name="akunfrom" hidden>
<!--											<input type="text" value="--><?//=$unit?><!--" name="unit"hidden>-->
										<?php } ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="Unit">Unit</label>
										<select name="unit" id="unit" class="form-control">
											<option value="">Pilih Unit</option>
											<?php
											$db =$this->db->query("select * from web_unit")->result();
											foreach ($db as $kode) :
												?>
												<option value="<?=$kode->id ?>"><?= $kode->nama ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">

										<label for="">Keterangan</label>
										<textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
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

<script>
	$('.rupiah').inputmask('decimal', {allowMinus:false, autoGroup: true, groupSeparator: '.', rightAlign: false, autoUnmask: true, removeMaskOnSubmit: true});

	$('#unit').on('click', function () {
		console.log($(this).val())
		var unit = $(this).val();
		$.get("<?php echo base_url(); ?>master/ajax_combo_kelas", {unit: unit}, function (data) {
			$(".combo-kelas").html(data);
		});
		$.get("<?php echo base_url(); ?>master/ajax_combo_mata_pelajaran", {unit: unit}, function (data) {
			$(".combo-matapelajaran").html(data);
		});
	});
</script>
