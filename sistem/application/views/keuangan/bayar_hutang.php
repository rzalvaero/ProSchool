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
						<h3>Bayar Hutang</h3>
					</div>
				</div>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
				<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-5 col-12 form-group">

							<label>Periode Hutang <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
							<select name="pos_id" class="form-control select2">
								<option value="">-Pilih POS-</option>
								<option value="">2019 </option>
								<option value="">2020</option>
								<option value="">2021</option>
								<option value="">2022</option>
							</select>
						</div>

						<div class="col-12-xxxl col-lg-5 col-12 form-group">
							<label>Cari Kreditor</label>
							<input type="text" name="kreditor" class="form-control" placeholder="Cari Kreditor">

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

	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<h3>Setting Hutang</h3>

		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<button type="button" class="btn btn-fill-lg btn-gradient-yellow" data-toggle="modal" data-target="#addPoshutang"><i class="fa fa-plus"></i> Tambah</button>

					</div>

				</div>
				<div class="row">
					<div class="col-md-9">
						<table class="table table-striped">
							<tbody>
							<tr>
								<td width="200">Periode Hutang</td><td width="4">:</td>



								<td>2021/2022</td>



								<td width="200">Dicicil</td><td width="4">:</td>



								<td>10 Kali</td>

							</tr>
							<tr>
								<td>Nama Kreditur</td>
								<td>:</td>



								<td>Abdullah</td>

								<td width="200">Nominal per Cicilan</td><td width="4">:</td>



								<td>Rp 100.000</td>

							</tr>
							<tr>
								<td>Posisi</td>
								<td>:</td>



								<td>Guru SMA</td>

								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>No. Ref Hutang</td>
								<td>:</td>



								<td>HT01022101</td>

								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>No. Ref Hutang</td>
								<td>:</td>



								<td>01 Februari 2021</td>

								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Nominal Hutang</td>
								<td>:</td>



								<td>Rp 1.000.000</td>

								<td></td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-3">

						<img src="https://demo.adminsekolah.net/media/img/user.png" class="img-thumbnail img-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<h3>Setting Hutang</h3>

		<div class="card height-auto">
			<div class="card-body">
				<div class="row">

					<div class="col-md-5">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Transaksi Terakhir</h3>
							</div><!-- /.box-header -->

							<div class="box-body table-responsive">
								<div class="over">
									<table class="table table-responsive table-bordered" style="white-space: nowrap;">
										<tr class="info">
											<th>Tanggal</th>
											<th>Cicilan</th>
											<th>Nominal</th>
											<th>Keterangan</th>
										</tr>

									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Rekap Hutang</h3>
							</div>
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Total Hutang</label>
											<input type="text" class="form-control" name="total_setor" id="total_setor" value="Rp 1.000.000" placeholder="Total Setoran" readonly="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Total Terlunasi</label>
											<input type="text" class="form-control" name="total_tarik" id="total_tarik" value="Rp 100.000" placeholder="Total Penarikan" readonly="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Belum Lunas</label>
									<input type="text" class="form-control" readonly="" name="saldo" id="saldo"  value="Rp 900.000" placeholder="Sisa Hutang">
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Cetak Bukti Transaksi</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<form action="https://demo.adminsekolah.net/manage/bayarhutang/cetakBukti" method="GET" class="view-pdf">
									<input type="hidden" name="n" value="5">
									<input type="hidden" name="r" value="HT01022101">
									<div class="form-group">
										<label>Tanggal Transaksi</label>
										<div class="input-group date " data-date="2022-03-04" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
											<input class="form-control" readonly="" required="" type="text" name="d" value="2022-03-04">
										</div>
									</div>
									<button class="btn btn-success btn-block" formtarget="_blank" type="submit">Cetak</button>
								</form>
							</div>
						</div>
					</div>
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
									<input type="text" required="" name="poshutang_name[]" class="form-control" placeholder="Contoh: Hutang Pegawai">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" required="" name="poshutang_description[]" class="form-control" placeholder="Contoh: Hutang Pegawai">
								</div>
							</div>

						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
