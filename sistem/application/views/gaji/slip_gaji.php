<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.6/css/bootstrap.min.css" />

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
<!-- Add Notice Area Start Here -->
<div class="row">
<?php if ($this->session->userdata('type_users') == "GURU") { ?>
<div class="col-12-xxxl col-12 ">
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Gaji</h3>
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
			<form class="new-added-form" action="<?php echo base_url() .'gaji/proses_cari_pegawai'; ?>" method="post">
				<div class="row">
					<div class="col-3 form-group">
						<label>Tahun</label>
						<select name="tahun_ajaran" id="tahun_ajaran" class="form-control select2">
							<option selected="selected">Tahun</option>

							<?php
							$tg_awal = date('Y') - 2;
							$tgl_akhir = date('Y') + 2;
							for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
								echo "<option value='$i'";
								if (date('Y') == $i) {
									echo "selected";
								}
								echo ">$i</option>";
							}
							?>
						</select>
					</div>
					<div class="col-3 form-group">
						<label>Bulan</label>
						<select name="bulan" id="bulan" class="form-control select2">
							<option selected="selected">Bulan</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>

					<div class="col-6 form-group">
						<label>Cari Pegawai</label>
						<select name="nip" id="nip " class="select2">
							<option value="">Pilih Pegawai</option>
							<?php
							$db = $this->db->query("SELECT * FROM users
join sr_users on sr_users.idusers = users.id order by first_name asc")->result();
							foreach ($db as $row) {
								echo "<option value='$row->id'>$row->u_nbm_nip - $row->first_name</option>";
							}
							?>
						</select>
						<!--								<input id="cari-siswa" type="text" class="form-control " width="100" autofocus name="nis" placeholder="Nama Siswa" required>-->

					</div>


					<div class="col-12 form-group mg-t-8">
						<button style="float:right;" type="submit"
								class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari
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
				<div class="item-title">
					<h3>Informasi Slip Gaji</h3>
				</div>
			</div>
			<div class="box box-success">
				<div class="box-header with-border">
					<!--							<h3 class="box-title">Informasi Siswa</h3>-->
				</div><!-- /.box-header -->
				<div class="box-body">
					<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-siswa" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Informasi Data Siswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Transaksi Trakhir</a>
						</li>
					</ul>
					<div class="tab-content" id="custom-content-below-tabContent">
						<div class="tab-pane fade active show" id="data-siswa" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

							<div class="row">
								<div class="col-md-9">
									<table class="table table-bordered table-hover table-striped" style="width:100%"">
									<tbody>
									<tr>
										<td width="200">NIP</td>
										<td width="4">:</td>
										<td><strong>
												<!--															if null-->
												<?php
												if (!empty($u_nbm_nip)){
													echo $u_nbm_nip;

												}else{
													'-';
												}
												?>
												<strong></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($nama_pegawai)){

												echo $nama_pegawai;

											}else{
												'-';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($u_alamat_tinggal)){

												echo $u_alamat_tinggal;

											}else{
												'-';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Unit Sekolah</td>
										<td>:</td>
										<td>
											<?php
											if (!empty($unit)){

												echo $unit;

											}else{
												'-';
											}
											?>
										</td>
									</tr>
									</tbody>
									</table>
								</div>

								<div class="col-md-3">

									<img src="https://demo.adminsekolah.net/media/img/user.png"
										 class="img-thumbnail img-responsive">
								</div>

							</div>
						</div>
						<div class="tab-pane fade" id="data-transaksi" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
							<div class="row">
								<div class="col-md-9">
									<div style="overflow-y:scroll;height:200px;">
										<table class="table table-bordered table-hover table-striped" style="width:100%">
											<thead>
											<tr>
												<th class="text-sm">Tanggal</th>
												<th class="text-sm">Bulan</th>
												<th class="text-sm">Gaji</th>
												<th class="text-sm">Potongan</th>
												<th class="text-sm">Pendapatan</th>
												<th class="text-sm">Gaji Bersih</th>
												<th class="text-sm">Print</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if (!empty($idusers)) { ?>
												<?php
												$db = $this->db->query("select * from sr_gaji_karyawan_perbulan where id_user = '$idusers'")->result();
												foreach ($db as $item) :
													?>

													<tr>
														<td><?=$item->tanggal  ?></td>
														<td><?= date("M Y", strtotime($item->tanggal));  ?></td>
														<td><?= number_format($item->gaji_pokok);  ?></td>
														<td><?= number_format($item->gaji_potongan);  ?></td>
														<td><?= number_format($item->gaji_pendapatan_lain_lain);  ?></td>
														<td><?php
														$bersih =	($item->gaji_pokok + $item->gaji_pendapatan_lain_lain) - $item->gaji_potongan;
														echo number_format($bersih);
															?></td>
														<td>
															<a href="#editModal<?php echo $item->id_gaji_karyawan;?>" data-toggle="modal"><i
																		class="btn btn-dark btn-lg fa fa-print" data-toggle="modal"
																		title="Cetak"></i></a>
														</td>
													</tr>
													<div class="modal fade" id="editModal<?php echo $item->id_gaji_karyawan;?>" role="dialog">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<h2>Cetak Gaji</h2>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/cetakgaji') ?>">
																	<div class="modal-body">
																		<p>Anda yakin mau mencetak ?  </p>
																	</div>
																	<div class="modal-footer">
																		<input type="hidden" name="id_gaji_karyawan" value="<?php echo $item->id_gaji_karyawan;?>">
																		<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
																		<button type="submit" class="btn btn-success btn-lg">Cetak</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>

								<div class="col-md-3">

									<img src="https://demo.adminsekolah.net/media/img/user.png"
										 class="img-thumbnail img-responsive">
								</div>

							</div>

						</div>

					</div>

					<br>
					<?php if (!empty($u_nbm_nip)){ ?>

					<div class="box box-primary">
						<div class="col-md-12">
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Kelola Pengajian</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="">No Ref</label>
												<?php
												if (!empty($u_nbm_nip)){
												$db = $this->db->query("select count(id_gaji_karyawan) as jumlah from sr_gaji_karyawan")->row();
												$jumlah = $db->jumlah + 1;
												$no_auto = 'GK'.date('dmY').$u_nbm_nip.$jumlah;
												?>
												<input type="text" readonly value="<?=$no_auto;?>" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="">Akun</label>
												<?php
												$akun = $this->db->query("select * from sr_gaji_karyawan join sr_account on sr_account.id_akun = sr_gaji_karyawan.akun where id_user = '$idusers'")->row();
												?>
												<input type="text" value="<?php echo $akun->kode_akun.'-'.$akun->keterangan ?>" readonly  class="form-control">
												<input type="text" value="<?php echo $akun->id_akun ?>"  hidden>
											</div>
										</div>

										<?php } ?>
									</div>


								</div>

								<div class="row">
								<div class="card ui-tab-card col-md-9">
									<div class="card-body">
										<div class="heading-layout1 mg-b-25">
										</div>
										<div class="border-nav-tab">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#tab7" role="tab" aria-selected="true">Gaji Pokok</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Potongan</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-selected="false">Pendapatan Lain Lain</a>
												</li>
											</ul>
											<div class="tab-content">

												<div class="tab-pane fade show active" id="tab7" role="tabpanel">

													<div class="table-responsive">
														<table class="table card-table table-center text-nowrap " width="100%" id="table">
															<thead class="bg-primary text-white">
															<tr>
																<th class="text-white">No</th>
																<th class="text-white" >Nama</th>
																<th class="text-white" >Besaran</th>
																<th class="text-white"></th>

															</tr>
															</thead>
															<tbody class="addMoreProduct">
															<!--														foreach -->
															<?php
															$gaji = $this->db->query("
																select users.first_name,users.last_name,sr_setting_tunjangan.nominal_setting_tunjangan,sr_tarif_gaji_user.id_gaji,sr_setting_tunjangan.nama_setting_tunjangan from sr_tarif_gaji_user
																left join users on users.id = sr_tarif_gaji_user.id_user
																left join sr_setting_tunjangan on sr_setting_tunjangan.id_setting_tunjangan = sr_tarif_gaji_user.id_tunjangan
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_tunjangan != ''")->result();
															$no = 1;$total1 = 0;
															?>
															</tbody>
															<?php foreach ($gaji as $product): ?>
																<tr>
																	<td><?php echo $no++; ?></td></td>
																	<td>
																		<?php echo $product->nama_setting_tunjangan ?>
																	</td>
																	<td>
																		<?php echo number_format($product->nominal_setting_tunjangan) ?>
																	</td>
																	<td>

																</tr>
																<!--														total-->
																<?php $total1 += $product->nominal_setting_tunjangan; ?>

															<?php endforeach; ?>
															<tr style="background-color: #99D3FF">
																<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																<th colspan="2"><?=number_format($total1);?></th>
																<input type="text" value="<?=$total1;?>" name="total_pokok" id="total_pokok" hidden>
															</tr>



														</table>
													</div>
													<div class="">

													</div>
												</div>
												<div class="tab-pane fade" id="tab8" role="tabpanel">

													<div class="table-responsive">
														<table class="table card-table table-center text-nowrap " width="100%" id="table">
															<thead class="bg-primary text-white">
															<tr>
																<th class="text-white">No</th>
																<th class="text-white" >Nama</th>
																<th class="text-white" >Besaran</th>
																<th class="text-white"></th>

															</tr>
															</thead>
															<tbody class="addMoreProduct">
															<!--														foreach -->
															<?php
															$gaji = $this->db->query("
															select users.first_name,users.last_name,sr_setting_potongan.nominal_setting_potongan,sr_tarif_gaji_user.id_gaji,sr_setting_potongan.nama_setting_potongan from sr_tarif_gaji_user
	    left join users on users.id = sr_tarif_gaji_user.id_user
        left join sr_setting_potongan on sr_setting_potongan.id_setting_potongan = sr_tarif_gaji_user.id_potongan
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_potongan != ''")->result();
															$no = 1;$total2 = 0;
															?>
															</tbody>
															<?php foreach ($gaji as $product): ?>
																<tr>
																	<td><?php echo $no++; ?></td></td>
																	<td>
																		<?php echo $product->nama_setting_potongan ?>
																	</td>
																	<td>
																		<?php echo number_format($product->nominal_setting_potongan) ?>
																	</td>
																</tr>
																<!--														total-->
																<?php $total2 += $product->nominal_setting_potongan; ?>
															<?php endforeach; ?>
															<tr style="background-color: #99D3FF">
																<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																<th colspan="2"><?=number_format($total2);?></th>
																<input type="text" value="<?=$total2;?>" name="total_tunjangan" id="total_tunjangan"hidden>

															</tr>


														</table>
													</div>
												</div>
												<div class="tab-pane fade" id="tab9" role="tabpanel">

													<div class="table-responsive">
														<table class="table card-table table-center text-nowrap " width="100%" id="table">
															<thead class="bg-primary text-white">
															<tr>
																<th class="text-white">No</th>
																<th class="text-white" >Nama</th>
																<th class="text-white" >Besaran</th>
																<th class="text-white"></th>

															</tr>
															</thead>
															<tbody class="addMoreProduct">
															<!--														foreach -->
															<?php
															$gaji = $this->db->query("select users.first_name,users.last_name,sr_setting_pendapatan_lain_lain.nominal_setting_pendapatan_lain_lain,sr_tarif_gaji_user.id_gaji,sr_setting_pendapatan_lain_lain.nama_setting_pendapatan_lain_lain from sr_tarif_gaji_user
															left join users on users.id = sr_tarif_gaji_user.id_user
															left join sr_setting_pendapatan_lain_lain on sr_setting_pendapatan_lain_lain.id_setting_pendapatan_lain_lain = sr_tarif_gaji_user.id_lain
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_lain != ''")->result();
															$no = 1;$total = 0;
															?>
															</tbody>
															<?php foreach ($gaji as $product): ?>
																<tr>
																	<td><?php echo $no++; ?></td></td>
																	<td>
																		<?php echo $product->nama_setting_pendapatan_lain_lain ?>
																	</td>
																	<td>
																		<?php echo number_format($product->nominal_setting_pendapatan_lain_lain) ?>
																	</td>

																</tr>
																<!--														total-->
																<?php $total += $product->nominal_setting_pendapatan_lain_lain; ?>
															<?php endforeach; ?>
															<tr style="background-color: #99D3FF">
																<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																<th colspan="2"><?=number_format($total);?></th>
																<input type="text" value="<?=$total;?>" name="total_lain" id="total_lain"hidden>

															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card ui-tab-card col-md-3">
									<div class="card-body">

										<form action="<?php echo base_url(); ?>gaji/cetakgajislip" method="post" >
										<div class="card-header">
											Rekap Gaji
										</div>
											<div class="form-group text-center">
												<label for="">Gaji Pokok</label>

											<select name="akungaji" id="akungaji" class="select2" required>
												<option value=""> Pilih Akun </option>
												<?php
												$akun = $this->db->query("select * from sr_gaji_karyawan join sr_account on sr_account.id_akun = sr_gaji_karyawan.akun where id_user = '$idusers'")->row();
												$akungaji = $this->db->query("select * from sr_gaji_karyawan join sr_account where modul_keuangan ='aset'")->result();
												foreach ($akungaji as $gaji):
													?>
													<option value="<?= $gaji->id_akun ?>"><?=$gaji->keterangan ?></option>
												<?php endforeach; ?>
											</select>
											</div>
											<div class="form-group text-center">
											<label for="">Gaji Pokok</label>
											<input type="text"value="<?=number_format($total1);?>" class="form-control text-center">
										</div>
										<div class="form-group text-center">
											<label for="">Gaji Potongan</label>
											<input type="text"value="<?=number_format($total2);?>" class="form-control text-center">
										</div>
										<div class="form-group text-center">
											<label for="">Gaji Pendapatan Lain</label>
											<input type="text"value="<?=number_format($total);?>" class="form-control text-center">
										</div>
										<div class="form-group text-center">
											<label for="">Total</label>
											<?php
											$totalgaji = ($total + $total1) - $total2;
											?>
											<input type="text" readonly name="no_ref" value="<?=$no_auto;?>" class="form-control" hidden>
											<input type="text"value="<?=number_format($totalgaji);?>" class="form-control text-center">
											<input type="text" value="<?php echo $unit.'-'.$akun->kode_akun.'-'.$akun->keterangan ?>" name="nama_akun" hidden>
											<input type="text" value="<?php echo $akun->id_akun ?>" name="id_akun" hidden>
											<input type="text" value="<?php echo $akun->keterangan ?>" name="akun" hidden>
											<input type="text" value="<?php echo $unit ?>" name="nama_unit" hidden>
											<input type="text" value="<?php echo $nama_pegawai ?>" name="nama_pegawai" hidden>
											<input type="text" value="<?php echo $totalgaji ?>" name="nominal" hidden>
											<input type="text" value="<?php echo $idusers ?>" name="idusers" hidden>
											<input type="text" value="<?php echo $total ?>" name="lain" hidden>
											<input type="text" value="<?php echo $total1 ?>" name="gaji" hidden>
											<input type="text" value="<?php echo $total2 ?>" name="potongan" hidden>
											<input type="text" value="<?php echo $unit_id ?>" name="unit_id" hidden>


										</div>
										<div class="form-group text-center">
											<?php
											$date = date('Y-m');
											$db = $this->db->query("select * from sr_gaji_karyawan_perbulan where id_user = '$idusers' and tanggal like '$date%'")->num_rows();
											if ($db > 0){
											?>
										<a href="#rekapexist" data-toggle="modal"  class="btn btn-fill-lg btn-gradient-yellow">Rekap</a>

											<?php }else{ ?>
										<button type="submit" class="btn btn-fill-lg btn-gradient-yellow">Rekap</button>

													<?php } ?>
										</div>
										</form>
									</div>
								</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>


		<div class="modal fade" id="rekapexist">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Warning</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title">Gaji Sudah di input bulan ini</h4>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- Add Notice Area End Here -->

		<!-- All Notice Area Start Here -->

		<!-- All Notice Area End Here -->
	</div>


	<div class="modal fade" id="modalView">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="tempat-view"></div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="modalAdd">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="info"></div>
					<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post" onsubmit="return cek_bayar(this);">
						<input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
						<input class="nis" type="hidden" name="nis" readonly>
						<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
						<input class="tagihan" type="hidden" name="tagihan" readonly>
						<div class="form-group">
							<label>Nama Pembayaran</label>
							<input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" readonly>
						</div>
						<div class="form-group">
							<label>Sisa Tagihan (Rp)</label>
							<input type="text" class="form-control sisa_tagihan" name="sisa_tagihan" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Bayar</label>
							<input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
						</div>
						<div class="form-group">
							<label>Jumlah Bayar (Rp)</label>
							<input type="text" class="form-control rupiah bayar" name="bayar" required>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>

					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="modalEdit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Pembayaran / Cicilan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="info"></div>
					<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_saveedit" method="post" onsubmit="return cek_bayar(this);">
						<input class="id_pembayaran_bebas_dt" type="hidden" name="id_pembayaran_bebas_dt" readonly>
						<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
						<input class="nis" type="hidden" name="nis" readonly>
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control tanggal" name="tanggal" readonly>
						</div>
						<div class="form-group">
							<label>Jumlah Bayar (Rp)</label>
							<input type="text" class="form-control rupiah bayar" name="bayar" required>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	</div>
	</div>

	<?php } else { ?>

		<div class="col-12-xxxl col-12 ">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Gaji</h3>
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
					<form class="new-added-form" action="<?php echo base_url() .'gaji/proses_cari_pegawai'; ?>" method="post">
						<div class="row">
							<div class="col-3 form-group">
								<label>Tahun</label>
								<select name="tahun_ajaran" id="tahun_ajaran" class="form-control select2">
									<option selected="selected">Tahun</option>

									<?php
									$tg_awal = date('Y') - 2;
									$tgl_akhir = date('Y') + 2;
									for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
										echo "<option value='$i'";
										if (date('Y') == $i) {
											echo "selected";
										}
										echo ">$i</option>";
									}
									?>
								</select>
							</div>
							<div class="col-3 form-group">
								<label>Bulan</label>
								<select name="bulan" id="bulan" class="form-control select2">
									<option selected="selected">Bulan</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select>
							</div>

							<div class="col-6 form-group">
								<label>Cari Pegawai</label>
								<select name="nip" id="nip " class="select2">
									<option value="">Pilih Pegawai</option>
									<?php
									$db = $this->db->query("SELECT * FROM users
join sr_users on sr_users.idusers = users.id order by first_name asc")->result();
									foreach ($db as $row) {
										echo "<option value='$row->id'>$row->u_nbm_nip - $row->first_name</option>";
									}
									?>
								</select>
								<!--								<input id="cari-siswa" type="text" class="form-control " width="100" autofocus name="nis" placeholder="Nama Siswa" required>-->

							</div>


							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit"
										class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari
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
						<div class="item-title">
							<h3>Informasi Slip Gaji</h3>
						</div>
					</div>
					<div class="box box-success">
						<div class="box-header with-border">
							<!--							<h3 class="box-title">Informasi Siswa</h3>-->
						</div><!-- /.box-header -->
						<div class="box-body">
							<ul class="nav nav-tabs " id="custom-content-below-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-siswa" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Informasi Data Siswa</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#data-transaksi" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Transaksi Trakhir</a>
								</li>
							</ul>
							<div class="tab-content" id="custom-content-below-tabContent">
								<div class="tab-pane fade active show" id="data-siswa" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

									<div class="row">
										<div class="col-md-9">
											<table class="table table-bordered table-hover table-striped" style="width:100%"">
											<tbody>
											<tr>
												<td width="200">NIP</td>
												<td width="4">:</td>
												<td><strong>
														<!--															if null-->
														<?php
														if (!empty($u_nbm_nip)){
															echo $u_nbm_nip;

														}else{
															'-';
														}
														?>
														<strong></td>
											</tr>
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td>
													<?php
													if (!empty($nama_pegawai)){

														echo $nama_pegawai;

													}else{
														'-';
													}
													?>
												</td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td>
													<?php
													if (!empty($u_alamat_tinggal)){

														echo $u_alamat_tinggal;

													}else{
														'-';
													}
													?>
												</td>
											</tr>
											<tr>
												<td>Unit Sekolah</td>
												<td>:</td>
												<td>
													<?php
													if (!empty($unit)){

														echo $unit;

													}else{
														'-';
													}
													?>
												</td>
											</tr>
											</tbody>
											</table>
										</div>

										<div class="col-md-3">

											<img src="https://demo.adminsekolah.net/media/img/user.png"
												 class="img-thumbnail img-responsive">
										</div>

									</div>
								</div>
								<div class="tab-pane fade" id="data-transaksi" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
									<div class="row">
										<div class="col-md-9">
											<div style="overflow-y:scroll;height:200px;">
												<table class="table table-bordered table-hover table-striped" style="width:100%">
													<thead>
													<tr>
														<th class="text-sm">Tanggal</th>
														<th class="text-sm">Bulan</th>
														<th class="text-sm">Gaji</th>
														<th class="text-sm">Potongan</th>
														<th class="text-sm">Pendapatan</th>
														<th class="text-sm">Gaji Bersih</th>
														<th class="text-sm">Print</th>
													</tr>
													</thead>
													<tbody>
													<?php
													if (!empty($idusers)) { ?>
														<?php
														$db = $this->db->query("select * from sr_gaji_karyawan_perbulan where id_user = '$idusers'")->result();
														foreach ($db as $item) :
															?>

															<tr>
																<td><?=$item->tanggal  ?></td>
																<td><?= date("M Y", strtotime($item->tanggal));  ?></td>
																<td><?= number_format($item->gaji_pokok);  ?></td>
																<td><?= number_format($item->gaji_potongan);  ?></td>
																<td><?= number_format($item->gaji_pendapatan_lain_lain);  ?></td>
																<td><?php
																	$bersih =	($item->gaji_pokok + $item->gaji_pendapatan_lain_lain) - $item->gaji_potongan;
																	echo number_format($bersih);
																	?></td>
																<td>
																	<a href="#editModal<?php echo $item->id_gaji_karyawan;?>" data-toggle="modal"><i
																				class="btn btn-dark btn-lg fa fa-print" data-toggle="modal"
																				title="Cetak"></i></a>
																</td>
															</tr>
															<div class="modal fade" id="editModal<?php echo $item->id_gaji_karyawan;?>" role="dialog">
																<div class="modal-dialog modal-md">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h2>Cetak Gaji</h2>
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/cetakgaji') ?>">
																			<div class="modal-body">
																				<p>Anda yakin mau mencetak ?  </p>
																			</div>
																			<div class="modal-footer">
																				<input type="hidden" name="id_gaji_karyawan" value="<?php echo $item->id_gaji_karyawan;?>">
																				<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
																				<button type="submit" class="btn btn-success btn-lg">Cetak</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														<?php endforeach; ?>
													<?php } ?>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-md-3">

											<img src="https://demo.adminsekolah.net/media/img/user.png"
												 class="img-thumbnail img-responsive">
										</div>

									</div>

								</div>

							</div>

							<br>
							<?php if (!empty($u_nbm_nip)){ ?>

								<div class="box box-primary">
									<div class="col-md-12">
										<div class="card card-success">
											<div class="card-header">
												<h3 class="card-title">Kelola Pengajian</h3>
											</div>
											<!-- /.card-header -->
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="">No Ref</label>
															<?php
															if (!empty($u_nbm_nip)){
															$db = $this->db->query("select count(id_gaji_karyawan) as jumlah from sr_gaji_karyawan")->row();
															$jumlah = $db->jumlah + 1;
															$no_auto = 'GK'.date('dmY').$u_nbm_nip.$jumlah;
															?>
															<input type="text" readonly value="<?=$no_auto;?>" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="">Akun</label>
															<?php
															$akun = $this->db->query("select * from sr_gaji_karyawan join sr_account on sr_account.id_akun = sr_gaji_karyawan.akun where id_user = '$idusers'")->row();
															?>
															<input type="text" value="<?php echo $akun->kode_akun.'-'.$akun->keterangan ?>" readonly  class="form-control">
															<input type="text" value="<?php echo $akun->id_akun ?>"  hidden>
														</div>
													</div>

													<?php } ?>
												</div>


											</div>

											<div class="row">
												<div class="card ui-tab-card col-md-9">
													<div class="card-body">
														<div class="heading-layout1 mg-b-25">
														</div>
														<div class="border-nav-tab">
															<ul class="nav nav-tabs" role="tablist">
																<li class="nav-item">
																	<a class="nav-link active" data-toggle="tab" href="#tab7" role="tab" aria-selected="true">Gaji Pokok</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Potongan</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-selected="false">Pendapatan Lain Lain</a>
																</li>
															</ul>
															<div class="tab-content">

																<div class="tab-pane fade show active" id="tab7" role="tabpanel">

																	<div class="table-responsive">
																		<table class="table card-table table-center text-nowrap " width="100%" id="table">
																			<thead class="bg-primary text-white">
																			<tr>
																				<th class="text-white">No</th>
																				<th class="text-white" >Nama</th>
																				<th class="text-white" >Besaran</th>
																				<th class="text-white"></th>

																			</tr>
																			</thead>
																			<tbody class="addMoreProduct">
																			<!--														foreach -->
																			<?php
																			$gaji = $this->db->query("
																select users.first_name,users.last_name,sr_setting_tunjangan.nominal_setting_tunjangan,sr_tarif_gaji_user.id_gaji,sr_setting_tunjangan.nama_setting_tunjangan from sr_tarif_gaji_user
																left join users on users.id = sr_tarif_gaji_user.id_user
																left join sr_setting_tunjangan on sr_setting_tunjangan.id_setting_tunjangan = sr_tarif_gaji_user.id_tunjangan
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_tunjangan != ''")->result();
																			$no = 1;$total1 = 0;
																			?>
																			</tbody>
																			<?php foreach ($gaji as $product): ?>
																				<tr>
																					<td><?php echo $no++; ?></td></td>
																					<td>
																						<?php echo $product->nama_setting_tunjangan ?>
																					</td>
																					<td>
																						<?php echo number_format($product->nominal_setting_tunjangan) ?>
																					</td>
																					<td>

																				</tr>
																				<!--														total-->
																				<?php $total1 += $product->nominal_setting_tunjangan; ?>

																			<?php endforeach; ?>
																			<tr style="background-color: #99D3FF">
																				<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																				<th colspan="2"><?=number_format($total1);?></th>
																				<input type="text" value="<?=$total1;?>" name="total_pokok" id="total_pokok" hidden>
																			</tr>



																		</table>
																	</div>
																	<div class="">

																	</div>
																</div>
																<div class="tab-pane fade" id="tab8" role="tabpanel">

																	<div class="table-responsive">
																		<table class="table card-table table-center text-nowrap " width="100%" id="table">
																			<thead class="bg-primary text-white">
																			<tr>
																				<th class="text-white">No</th>
																				<th class="text-white" >Nama</th>
																				<th class="text-white" >Besaran</th>
																				<th class="text-white"></th>

																			</tr>
																			</thead>
																			<tbody class="addMoreProduct">
																			<!--														foreach -->
																			<?php
																			$gaji = $this->db->query("
															select users.first_name,users.last_name,sr_setting_potongan.nominal_setting_potongan,sr_tarif_gaji_user.id_gaji,sr_setting_potongan.nama_setting_potongan from sr_tarif_gaji_user
	    left join users on users.id = sr_tarif_gaji_user.id_user
        left join sr_setting_potongan on sr_setting_potongan.id_setting_potongan = sr_tarif_gaji_user.id_potongan
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_potongan != ''")->result();
																			$no = 1;$total2 = 0;
																			?>
																			</tbody>
																			<?php foreach ($gaji as $product): ?>
																				<tr>
																					<td><?php echo $no++; ?></td></td>
																					<td>
																						<?php echo $product->nama_setting_potongan ?>
																					</td>
																					<td>
																						<?php echo number_format($product->nominal_setting_potongan) ?>
																					</td>
																				</tr>
																				<!--														total-->
																				<?php $total2 += $product->nominal_setting_potongan; ?>
																			<?php endforeach; ?>
																			<tr style="background-color: #99D3FF">
																				<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																				<th colspan="2"><?=number_format($total2);?></th>
																				<input type="text" value="<?=$total2;?>" name="total_tunjangan" id="total_tunjangan"hidden>

																			</tr>


																		</table>
																	</div>
																</div>
																<div class="tab-pane fade" id="tab9" role="tabpanel">

																	<div class="table-responsive">
																		<table class="table card-table table-center text-nowrap " width="100%" id="table">
																			<thead class="bg-primary text-white">
																			<tr>
																				<th class="text-white">No</th>
																				<th class="text-white" >Nama</th>
																				<th class="text-white" >Besaran</th>
																				<th class="text-white"></th>

																			</tr>
																			</thead>
																			<tbody class="addMoreProduct">
																			<!--														foreach -->
																			<?php
																			$gaji = $this->db->query("select users.first_name,users.last_name,sr_setting_pendapatan_lain_lain.nominal_setting_pendapatan_lain_lain,sr_tarif_gaji_user.id_gaji,sr_setting_pendapatan_lain_lain.nama_setting_pendapatan_lain_lain from sr_tarif_gaji_user
															left join users on users.id = sr_tarif_gaji_user.id_user
															left join sr_setting_pendapatan_lain_lain on sr_setting_pendapatan_lain_lain.id_setting_pendapatan_lain_lain = sr_tarif_gaji_user.id_lain
															where sr_tarif_gaji_user.unit = '$unit_id' and sr_tarif_gaji_user.id_user = '$idusers' and id_lain != ''")->result();
																			$no = 1;$total = 0;
																			?>
																			</tbody>
																			<?php foreach ($gaji as $product): ?>
																				<tr>
																					<td><?php echo $no++; ?></td></td>
																					<td>
																						<?php echo $product->nama_setting_pendapatan_lain_lain ?>
																					</td>
																					<td>
																						<?php echo number_format($product->nominal_setting_pendapatan_lain_lain) ?>
																					</td>

																				</tr>
																				<!--														total-->
																				<?php $total += $product->nominal_setting_pendapatan_lain_lain; ?>
																			<?php endforeach; ?>
																			<tr style="background-color: #99D3FF">
																				<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
																				<th colspan="2"><?=number_format($total);?></th>
																				<input type="text" value="<?=$total;?>" name="total_lain" id="total_lain"hidden>

																			</tr>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="card ui-tab-card col-md-3">
													<div class="card-body">

														<form action="<?php echo base_url(); ?>gaji/cetakgajislip" method="post" >
															<div class="card-header">
																Rekap Gaji
															</div>
															<div class="form-group text-center">
																<label for="">Gaji Pokok</label>

																<select name="akungaji" id="akungaji" class="select2" required>
																	<option value=""> Pilih Akun </option>
																	<?php
																	$akun = $this->db->query("select * from sr_gaji_karyawan join sr_account on sr_account.id_akun = sr_gaji_karyawan.akun where id_user = '$idusers'")->row();
																	$akungaji = $this->db->query("select * from sr_gaji_karyawan join sr_account where modul_keuangan ='aset'")->result();
																	foreach ($akungaji as $gaji):
																		?>
																		<option value="<?= $gaji->id_akun ?>"><?=$gaji->keterangan ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
															<div class="form-group text-center">
																<label for="">Gaji Pokok</label>
																<input type="text"value="<?=number_format($total1);?>" class="form-control text-center">
															</div>
															<div class="form-group text-center">
																<label for="">Gaji Potongan</label>
																<input type="text"value="<?=number_format($total2);?>" class="form-control text-center">
															</div>
															<div class="form-group text-center">
																<label for="">Gaji Pendapatan Lain</label>
																<input type="text"value="<?=number_format($total);?>" class="form-control text-center">
															</div>
															<div class="form-group text-center">
																<label for="">Total</label>
																<?php
																$totalgaji = ($total + $total1) - $total2;
																?>
																<input type="text" readonly name="no_ref" value="<?=$no_auto;?>" class="form-control" hidden>
																<input type="text"value="<?=number_format($totalgaji);?>" class="form-control text-center">
																<input type="text" value="<?php echo $unit.'-'.$akun->kode_akun.'-'.$akun->keterangan ?>" name="nama_akun" hidden>
																<input type="text" value="<?php echo $akun->id_akun ?>" name="id_akun" hidden>
																<input type="text" value="<?php echo $akun->keterangan ?>" name="akun" hidden>
																<input type="text" value="<?php echo $unit ?>" name="nama_unit" hidden>
																<input type="text" value="<?php echo $nama_pegawai ?>" name="nama_pegawai" hidden>
																<input type="text" value="<?php echo $totalgaji ?>" name="nominal" hidden>
																<input type="text" value="<?php echo $idusers ?>" name="idusers" hidden>
																<input type="text" value="<?php echo $total ?>" name="lain" hidden>
																<input type="text" value="<?php echo $total1 ?>" name="gaji" hidden>
																<input type="text" value="<?php echo $total2 ?>" name="potongan" hidden>
																<input type="text" value="<?php echo $unit_id ?>" name="unit_id" hidden>


															</div>
															<div class="form-group text-center">
																<?php
																$date = date('Y-m');
																$db = $this->db->query("select * from sr_gaji_karyawan_perbulan where id_user = '$idusers' and tanggal like '$date%'")->num_rows();
																if ($db > 0){
																	?>
																	<a href="#rekapexist" data-toggle="modal"  class="btn btn-fill-lg btn-gradient-yellow">Rekap</a>

																<?php }else{ ?>
																	<button type="submit" class="btn btn-fill-lg btn-gradient-yellow">Rekap</button>

																<?php } ?>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.card -->
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>


				<div class="modal fade" id="rekapexist">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Warning</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">
								<h4 class="modal-title">Gaji Sudah di input bulan ini</h4>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- Add Notice Area End Here -->

				<!-- All Notice Area Start Here -->

				<!-- All Notice Area End Here -->
			</div>


			<div class="modal fade" id="modalView">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Lihat Pembayaran / Cicilan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div id="tempat-view"></div>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			<div class="modal fade" id="modalAdd">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Pembayaran / Cicilan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div id="info"></div>
							<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_save" method="post" onsubmit="return cek_bayar(this);">
								<input class="id_pembayaran_bebas" type="hidden" name="id_pembayaran_bebas" readonly>
								<input class="nis" type="hidden" name="nis" readonly>
								<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
								<input class="tagihan" type="hidden" name="tagihan" readonly>
								<div class="form-group">
									<label>Nama Pembayaran</label>
									<input type="text" class="form-control nama_pembayaran" name="nama_pembayaran" readonly>
								</div>
								<div class="form-group">
									<label>Sisa Tagihan (Rp)</label>
									<input type="text" class="form-control sisa_tagihan" name="sisa_tagihan" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal Bayar</label>
									<input type="text" class="form-control tglcalendar" name="tanggal" value="<?php echo date('d-m-Y'); ?>" required>
								</div>
								<div class="form-group">
									<label>Jumlah Bayar (Rp)</label>
									<input type="text" class="form-control rupiah bayar" name="bayar" required>
								</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>

							</form>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			<div class="modal fade" id="modalEdit">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Pembayaran / Cicilan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div id="info"></div>
							<form role="form" action="<?php echo base_url(); ?>pembayaran/pembayaran_bebas_saveedit" method="post" onsubmit="return cek_bayar(this);">
								<input class="id_pembayaran_bebas_dt" type="hidden" name="id_pembayaran_bebas_dt" readonly>
								<input class="tahun_ajaran" type="hidden" name="tahun_ajaran" readonly>
								<input class="nis" type="hidden" name="nis" readonly>
								<div class="form-group">
									<label>Tanggal</label>
									<input type="text" class="form-control tanggal" name="tanggal" readonly>
								</div>
								<div class="form-group">
									<label>Jumlah Bayar (Rp)</label>
									<input type="text" class="form-control rupiah bayar" name="bayar" required>
								</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-info btn-flat btn-block"><i class="fa fa-save"> </i> Simpan</button>
							</form>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
		</div>
		</div>

		<?php } ?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#cari-siswa').typeahead({
					source: function(query, result) {
						$.ajax({
							url: "<?php echo base_url(); ?>pembayaran/ajax_siswa",
							data: 'query=' + query,
							dataType: "json",
							type: "POST",
							success: function(data) {
								result($.map(data, function(item) {
									return item;
								}));
							}
						});
					}
				});
			});

			$(".bayar-bebas").click(function() {
				$(".id_pembayaran_bebas").val($(this).attr('data-id_pembayaran_bebas'));
				$(".nis").val($(this).attr('data-nis'));
				$(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
				$(".tagihan").val($(this).attr('data-tagihan'));
				$(".sisa_tagihan").val($(this).attr('data-sisa_tagihan'));
				$(".nama_pembayaran").val($(this).attr('data-nama_pos_keuangan'));
			});

			$(document).on("click", ".edit-bayar", function() {
				$(".id_pembayaran_bebas_dt").val($(this).attr('data-id_pembayaran_bebas_dt'));
				$(".nis").val($(this).attr('data-nis'));
				$(".tahun_ajaran").val($(this).attr('data-tahun_ajaran'));
				$(".tanggal").val($(this).attr('data-tanggal'));
				$(".bayar").val($(this).attr('data-bayar'));
			});


			$(".history-bayar").click(function() {
				var id_pembayaran_bebas = $(this).attr('data-id_pembayaran_bebas');
				var nis = $(this).attr('data-nis');
				var id_siswa = $(this).attr('data-id_siswa');
				var tahun_ajaran = $(this).attr('data-tahun_ajaran');
				$.get("<?php echo base_url(); ?>pembayaran/ajax_history_bayar", {
					id_pembayaran_bebas: id_pembayaran_bebas,
					nis: nis,
					tahun_ajaran: tahun_ajaran,
					id_siswa: id_siswa
				}, function(data) {
					$("#tempat-view").html(data);
				});
			});

			function cek_bayar(form) {
				var tagihan = $(".tagihan").val();
				var bayar = $(".bayar").val();


				if (parseInt(bayar) > parseInt(tagihan)) {
					var alert = ' <div class="alert alert-danger">' +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
						'<i class="fa fa-remove"></i>' +
						'</button>' +
						'<span style="text-align: left;">Jumlah Bayar Tidak Boleh Lebih Dari Sisa Tagihan</span>' +
						'</div>';
					$("#info").html(alert);
					return false;
				} else {
					return true;
				}
			}


			$(".bayar-bulanan").click(function() {
				var conf = confirm('Yakin Ingin Melakukan Pembayaran ?');
				if (conf) {
					var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
					var nis = $(this).attr('data-nis');
					var tahun_ajaran = $(this).attr('data-tahun_ajaran');
					var tagihan = $(this).attr('data-tagihan');

					$.post("<?php echo base_url(); ?>pembayaran/ajax_post_bayar_bulanan", {
						nis: nis,
						id_pembayaran_bulanan: id_pembayaran_bulanan,
						tahun_ajaran: tahun_ajaran,
						tagihan: tagihan
					}, function(data) {
						var res = JSON.parse(data);
						toastr.options.timeOut = 2000;
						toastr.success("Berhasil Melakukan Pembayaran");
						//window.location.reload(true)
						document.location.href = "<?php echo base_url(); ?>pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
					});
				}

			});


			$(".hapus-bulanan").click(function() {
				var conf = confirm('Yakin Ingin Menghapus Pembayaran ?');
				if (conf) {
					var id_pembayaran_bulanan = $(this).attr('data-id_pembayaran_bulanan');
					var nis = $(this).attr('data-nis');
					var tahun_ajaran = $(this).attr('data-tahun_ajaran');
					var tagihan = $(this).attr('data-tagihan');

					$.post("<?php echo base_url(); ?>pembayaran/ajax_hapus_bayar_bulanan", {
						nis: nis,
						id_pembayaran_bulanan: id_pembayaran_bulanan,
						tahun_ajaran: tahun_ajaran,
						tagihan: tagihan
					}, function(data) {
						var res = JSON.parse(data);
						toastr.options.timeOut = 2000;
						toastr.success("Berhasil Menghapus Pembayaran");
						// window.location.reload(true)
						document.location.href = "<?php echo base_url(); ?>pembayaran/pembayaran_siswa/" + res.tahun_ajaran + "/" + nis;
					});
				}
			});

		</script>
