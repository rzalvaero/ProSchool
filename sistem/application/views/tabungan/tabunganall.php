<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
							<h3>Laporan Tabungan</h3>
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
					<form class="new-added-form" action="<?php echo base_url() . 'tabungan/proses_cari_tabungan'; ?>" method="post">
						<div class="row">
							<?php $unit = $this->session->userdata('unit');?>
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<label>Tanggal Awal</label>
								<input type="date" placeholder="Tanggal Awal" name="awal" id="awal" class="form-control"required>
							</div>
							<div class="col-6-xxxl col-lg-6 col-12 form-group">
								<label>Tanggal Akhir</label>
								<input type="date" placeholder="Tanggal Akhir" name="akhir" id="akhir" class="form-control"required>
							</div>
							<div class="col-3-xxxl col-lg-6 col-12 form-group">
								<label>Unit</label>

								<select name="unit" id="unit"
										class="form-control select2"required>
									<?php
									$unit = $this->session->userdata('unit');
									$row_siswa = $this->db->query("select * from web_unit ")->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->id; ?>"><?php echo $product->nama; ?></option>
									<?php endforeach;
									?>
								</select>
							</div>
							<div class="col-3-xxxl col-lg-6 col-12 form-group">
								<label>Nama Kelas</label>
								<select name="idkelas" id="idkelas" class="select2 form-control"required>
									<option value="">Pilih Kelas</option>
									<option value="0">Semua Kelas</option>
									<?php
									$row_siswa = $this->db->query("select * from sr_kelas where unit='$unit'")->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->idkelas; ?>"><?php echo $product->k_romawi.' - '.$product->k_keterangan; ?></option>
									<?php endforeach;
									?>

								</select>
							</div>
							<div class="col-3-xxxl col-lg-6 col-12 form-group">
								<label>Nama Siswa</label>

								<select name="idsiswa" id="idsiswa" class="select2 form-control" required>
									<option value="">Pilih Kelas</option>
									<option value="0">Semua Kelas</option>
									<?php
									$row_siswa = $this->db->query("select * from sr_siswa ")->result();
									?>
									<?php foreach ($row_siswa as $product): ?>
										<option value="<?php echo $product->idsiswa; ?>"><?php echo $product->s_nisn.' - '.$product->s_nama; ?></option>
									<?php endforeach;
									?>

								</select>
							</div>


							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit"
										class="btn-fill-lg btn-gradient-yellow "name="search"value="search">Cari
								</button>
<!--								<button style="float:right;" type="button"-->
<!--										class="btn-fill-lg bg-blue-dark  ml-4" name="pdf"value="pdf">Cetak PDF-->
<!--								</button>-->
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
						<table id="dtable" class="table table-hover table display  text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama </th>
								<th>Kelas</th>
								<th>Debit</th>
								<th>Kredit</th>
								<th>Saldo</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							<?php

							if (!empty($list)){
							?>
							<?php foreach ($list as $product): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									</td>
									<td>
										<?php echo $product->s_nisn ?>

									</td>
									<td>
										<?php echo $product->s_nama ?>
									</td>
									<td>
										<?php echo $product->k_romawi ?>
									</td>
									<td>
										<?php echo number_format($product->debet) ?>
									</td>
									<td>
										<?php echo number_format($product->credit) ?>
									</td>
									<td>
										<?php echo number_format($product->saldo) ?>
									</td>

									<td>

												<a href="#editModal<?php echo $product->s_nisn;?>" data-toggle="modal"><i
															class="btn btn-dark btn-lg fa fa-print" data-toggle="modal"
															title="Cetak"></i></a>
									</td>
								</tr>
									<div class="modal fade" id="editModal<?php echo $product->s_nisn;?>" role="dialog">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h2>Cetak Tabungan Siswa</h2>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<form class="form-horizontal" method="post" action="<?php echo base_url('tabungan/cetakidsiswa') ?>">
													<div class="modal-body">
														<p>Anda yakin mau mencetak <b><?php echo $product->s_nama;?></b></p>
													</div>
													<div class="modal-footer">
														<input type="hidden" name="idsiswa" value="<?php echo $product->s_nisn;?>">
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


<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$('#dtable').DataTable();

	$('#cetak').on('click',function (){

		let unit = $('#unit').val()
		let idsiswa = $('#idsiswa').val()
		let idkelas = $('#idkelas').val()
		let awal = $('#awal').val()
		let akhir = $('#akhir').val()
		var token = 'access';
		if (unit == '')
		{
			swal({
				title: "Warning!",
				text: "Harus Isi Unit Terlebih Dahulu!",
				icon: "warning",
				button: "warning"
			});
			return false;
		}
		if (idsiswa == '')
		{
			swal({
				title: "Warning!",
				text: "Harus Isi Siswa Terlebih Dahulu!",
				icon: "warning",
				button: "warning"
			});
			return false;
		}
		if (idkelas == '')
		{
			swal({
				title: "Warning!",
				text: "Harus Isi Kelas Terlebih Dahulu!",
				icon: "warning",
				button: "warning"
			});
			return false;
		}
		if (awal == '')
		{
			swal({
				title: "Warning!",
				text: "Harus Isi Awal Terlebih Dahulu!",
				icon: "warning",
				button: "warning"
			});
			return false;
		}
		if (akhir == '')
		{
			swal({
				title: "Warning!",
				text: "Harus Isi Akhir Terlebih Dahulu!",
				icon: "warning",
				button: "warning"
			});
			return false;
		}
		$.ajax({
			url: "<?=base_url('tabungan/cetaktabunganall')?>",
			type: "post",
			data: {token:token,unit:unit,idsiswa:idsiswa,idkelas:idkelas,awal:awal,akhir:akhir},
			success: function(data){
				swal({
					title: "Berhasil!",
					text: "Berhasil Update Gaji Karyawan!",
					icon: "success",
					button: "OK!"
				});
				location.href = "<?=base_url('tabungan/tabunganall')?>";
			}
		});
	})

</script>
