<div class="col-4-xxxl col-12">
	<div class="card height-auto">
		<div class="card-body">
			<div class="heading-layout1">
				<div class="item-title">
					<h3>Laporan Jurnal (Kas Tunai)</h3>
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
			<form class="new-added-form" action="<?php echo base_url() . 'laporan/proses_jurnal_kas'; ?>" method="post">
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-12 form-group">
						<label>Tanggal Awal *</label>
						<input type="date" placeholder="dd/mm/yyyy" name="from" class="form-control"
							   data-position='bottom right'>
					</div>
					<div class="col-xl-3 col-lg-6 col-12 form-group">
						<label>Tanggal Akhir *</label>
						<input type="date" placeholder="dd/mm/yyyy" name="to" class="form-control"
							   data-position='bottom right'>
					</div>
<!--					<div class="col-xl-6 col-lg-6 col-12 form-group">-->
<!--						<label>Unit Sekolah *</label>-->
<!--						<select required="" name="unit" id="unit" class="form-control">-->
<!--								<option value="">-- Pilih Unit Sekolah --</option>-->
<!--								<option value="0">Semua Unit</option>-->
<!--							--><?php
//							$db = $this->db->get('web_unit')->result();
//							foreach ($db as $item) :
//							?>
<!--							<option value="--><?php //echo $item->id; ?><!--">--><?php //echo $item->nama; ?><!--</option>-->
<!--							--><?php //endforeach; ?>
<!--							</select>-->
<!--					</div>-->
					<input type="text" value="<?= $this->session->userdata('unit')  ?>" name="unit">

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
					<h3>Laporan Jurnal (Kas Tunai)</h3>
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
						<th>Tanggal</th>
						<th>Kode Akun</th>
						<th>Keterangan</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Penerimaan</th>
						<th>Pengeluaran</th>
					</tr>
					</thead>
					<tbody>

					<tr style="font-weight: bold;">
						<td>1</td>
						<td>1-10000</td>
						<td>AKTIVA</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>

					<tr style="font-weight: bold;">
						<td>2</td>
						<td>1-11200</td>
						<td>Aktiva  SD</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>

					<tr>
						<td>3</td>
						<td>1-11201</td>
						<td>Kas Tunai SD</td>
						<td><span class="caption" data-id="107">50000000</span> </td>
						<td><span class="caption" data-id="107">0</span></td>
						<td><span class="caption" data-id="107">0</span></td>
						<td><span class="caption" data-id="107">0</span></td>
						<td><span class="caption" data-id="107">0</span></td>
					</tr>

					<tr>
						<td>4</td>
						<td>1-11202</td>
						<td>Kas Bank SD</td>
						<td><span class="caption" data-id="108">0</span> </td>
						<td><span class="caption" data-id="108">0</span> </td>
						<td><span class="caption" data-id="108">0</span> </td>
						<td><span class="caption" data-id="108">0</span> </td>
						<td><span class="caption" data-id="108">0</span> </td>
					</tr>

					<tr>
						<td>5</td>
						<td>1-11203</td>
						<td>Kas Bank BRI Syariah SD</td>
						<td><span class="caption" data-id="109">0</span> </td>
						<td><span class="caption" data-id="109">0</span> </td>
						<td><span class="caption" data-id="109">0</span> </td>
						<td><span class="caption" data-id="109">0</span> </td>
						<td><span class="caption" data-id="109">0</span> </td>
					</tr>

					<tr style="font-weight: bold;">
						<td>6</td>
						<td>1-11300</td>
						<td>Piutang Siswa SD</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>

					<tr>
						<td>7</td>
						<td>1-11301</td>
						<td>Piutang Siswa SD</td>
						<td><span class="caption" data-id="111">100000000</span> </td>
						<td><span class="caption" data-id="111">0</span> </td>
						<td><span class="caption" data-id="111">0</span> </td>
						<td><span class="caption" data-id="111">0</span> </td>
						<td><span class="caption" data-id="111">0</span> </td>
					</tr>
					<tr style="font-weight: bold;">
						<td>8</td>
						<td>1-12000</td>
						<td>Konsumsi SD</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>
					<tr style="font-weight: bold;">
						<td>9</td>
						<td>2-20000</td>
						<td>PASIVA</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>

					<tr style="font-weight: bold;">
						<td>10</td>
						<td>3-30000</td>
						<td>MODAL</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
					</tr>
					<tr style="font-weight: bold;">
						<td>10</td>
						<td>3-30000</td>
						<td>MODAL</td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
						<td> - </td>
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
