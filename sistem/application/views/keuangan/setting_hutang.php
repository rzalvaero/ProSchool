<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<?php } else {
	} ?>


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
							<th>Kode Akun Hutang</th>
							<th>Nama POS Hutang</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>2-20101 - Hutang SMP</td>
							<td>Hutang Seragam</td>
							<td>Hutang Seragam</td>
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

									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>2-20101 - Hutang SMP</td>
							<td>Hutang Seragam</td>
							<td>Seragam Olahraga</td>
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

									</div>
								</div>
							</td>
						</tr>

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
