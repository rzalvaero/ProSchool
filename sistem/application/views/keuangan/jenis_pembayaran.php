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
					<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
						<div class="row">
							<div class="col-12-xxxl col-lg-4 col-12 form-group">

									<label>POS <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
									<select name="pos_id" class="form-control select2">
										<option value="">-Pilih POS-</option>
										<option value="">Catering </option>
										<option value="">SPP</option>
										<option value="">Buku Paket</option>
										<option value="">Kegiatan</option>
									</select>
							</div>

							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Tingkat</label>
								<select name="period_id" class="form-control" class="form-control select2">
									<option value="">-Pilih Tahun-</option>
									<option value="8" >2024/2025</option>
									<option value="7" >2023/2024</option>
									<option value="6" >2022/2023</option>
									<option value="5" >2021/2022</option>
									<option value="4" >2021/2022</option>
									<option value="3" >2020/2021</option>
									<option value="1" >2018/2019</option>
								</select>

							</div>

							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Tipe <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
								<select name="payment_type" class="form-control" required="">
									<option value="">-Pilih Tipe-</option>
									<option value="BULAN" >Bulanan</option>
									<option value="BEBAS" >Bebas</option>
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
	<?php } else {
	} ?>


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
					<table id="dtable " class="table table-hover table display data-table text-nowrap">
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
						<tr>
							<td>1</td>
							<td>Buku Paket SMP</td>
							<td>Buku Paket SMP - T.A 2022/2023</td>
							<td>Bulanan</td>
							<td>2022/2023</td>
							<td>
								<a data-toggle="tooltip" data-placement="top" title="Ubah"
								   class="btn btn-primary btn-xs"
								   href="https://demo.adminsekolah.net/manage/payment/view_bulan/403">
									Setting Tarif Pembayaran
								</a>
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
													class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
										<a class="dropdown-item"
										   href=""><i
													class="fas fa-times text-orange-red"></i>Hapus</a>

									</div>
								</div>
							</td>
						</tr>
						</tbody>
					</table>


					<!--                                    <table class="table display data-table text-nowrap">-->
					<!--                                        <thead>-->
					<!--                                            <tr>-->
					<!--                                                <th>-->
					<!--                                                    <div class="form-check">-->
					<!--                                                        <input type="checkbox" class="form-check-input checkAll">-->
					<!--                                                        <label class="form-check-label">Nama Kelas</label>-->
					<!--                                                    </div>-->
					<!--                                                </th>-->
					<!--                                                <th>Tingkat</th>-->
					<!--                                                <th>Keterangan / Jurusan</th>-->
					<!--                                                <th></th>-->
					<!--                                            </tr>-->
					<!--                                        </thead>-->
					<!--                                        <tbody>-->
					<!--                                        --><?php //foreach ($kelas as $row) { ?>
					<!--                                            <tr>-->
					<!--                                                <td>-->
					<!--                                                    <div class="form-check">-->
					<!--                                                        <input type="checkbox" class="form-check-input">-->
					<!--                                                        <label class="form-check-label">-->
					<?php //echo $row['k_romawi'] ?><!--</label>-->
					<!--                                                    </div>-->
					<!--                                                </td>-->
					<!--                                                <td>-->
					<?php //echo $row['k_tingkat'] ?><!--</td>-->
					<!--                                                <td>-->
					<?php //echo $row['k_keterangan'] ?><!--</td>-->
					<!--                                                <td>-->
					<!--                                                    <div class="dropdown">-->
					<!--                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"-->
					<!--                                                            aria-expanded="false">-->
					<!--                                                            <span class="flaticon-more-button-of-three-dots"></span>-->
					<!--                                                        </a>-->
					<!--                                                        <div class="dropdown-menu dropdown-menu-right">-->
					<!--                                                            <a class="dropdown-item" href="-->
					<?php //echo base_url('/kelas/edit/'.$row['idkelas']);?><!--"><i-->
					<!--                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
					-->
					<!--                                                            <a class="dropdown-item" href="-->
					<?php //echo base_url('/kelas/deletes/'.$row['idkelas']);?><!--"><i-->
					<!--                                                                    class="fas fa-times text-orange-red"></i>Hapus</a>-->
					<!--                                                            -->
					<!--                                                        </div>-->
					<!--                                                    </div>-->
					<!--                                                </td>-->
					<!--                                            </tr>-->
					<!--                                        --><?php //} ?>
					<!--                                        </tbody>-->
					<!--                                    </table>-->
				</div>
			</div>
		</div>
	</div>
	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>
