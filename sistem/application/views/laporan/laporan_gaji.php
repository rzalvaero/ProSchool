<div class="col-4-xxxl col-12">
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Laporan Gaji Guru & Karyawan</h3>
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
			<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-12 form-group">
						<label>Pilih Tahun Ajaran</label>
						<select class="form-control" name="periode" id="period_id" required="">
								<option value="">--Pilih Tahun Ajaran--</option>
								<option value="8">2024/2025</option>
								<option value="7">2023/2024</option>
								<option value="6">2022/2023</option>
								<option value="5">2021/2022</option>
								<option value="4">2021/2022</option>
								<option value="3">2020/2021</option>
								<option value="1">2018/2019</option>
							</select>
					</div>
					<div class="col-xl-4 col-lg-6 col-12 form-group">
						<label>Pilih Bulan</label>
						<select class="form-control" name="month" id="month_id" required="">
								<option value="">--Pilih Bulan--</option>
								<option value="1">Juli</option>
								<option value="2">Agustus</option>
								<option value="3">September</option>
								<option value="4">Oktober</option>
								<option value="5">November</option>
								<option value="6">Desember</option>
								<option value="7">Januari</option>
								<option value="8">Februari</option>
								<option value="9">Maret</option>
								<option value="10">April</option>
								<option value="11">Mei</option>
								<option value="12">Juni</option>
							</select>
					</div>
					<div class="col-xl-4 col-lg-6 col-12 form-group">
						<label>Pilih Unit Sekolah</label>
							<select required="" name="majors_id" id="majors_id" class="form-control">
								<option value="">-- Pilih Unit Sekolah --</option>
								<option value="all">Semua Unit</option>
								<option value="2" >TK</option>
								<option value="3" >SD</option>
								<option value="4" >SMP</option>
								<option value="6" >SMA</option>
								<option value="7" >SMA Lazuardi</option>
							</select>
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
<div class="col-8-xxxl col-12">
	<?php echo $this->session->flashdata("msg"); ?>
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Laporan Gaji Guru & Karyawan</h3>
				</div>


				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
					   aria-expanded="false">...</a>
				</div>
			</div>
			<div class="table-responsive">
				<table id='dtable' class='table table-hover table display data-table text-nowrap'>
					<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Bulan</th>
						<th>Gaji</th>
						<th>Jumlah Potongan</th>
						<th>Gaji Diterima</th>
					</tr>
					</thead>
					<tbody>

					<tr style="font-weight: bold;">
						<td>1</td>
						<td>Fikih Firmansyah</td>
						<td>Karyawan</td>
						<td>Agustus 2021</td>
						<td>Rp 4.700.000</td>
						<td>Rp 10.000</td>
						<td>Rp 4.690.000</td>
					</tr>
					<tr style="font-weight: bold;">
						<td>2</td>
						<td>Muhammad Faisal Firmansyah</td>
						<td>Karyawan</td>
						<td>Agustus 2021</td>
						<td>Rp 5.000.000</td>
						<td>Rp 10.000</td>
						<td>Rp 4.600.000</td>
					</tr>
					</tbody>
					<tr>
						<td colspan = "5" id="saldo_awal">
						</td>
					</tr>
				</table>



			</div>
		</div>
	</div>
</div>

