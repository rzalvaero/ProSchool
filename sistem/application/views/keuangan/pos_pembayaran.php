<div class="row">
	<!-- Add Notice Area Start Here -->
	<!-- <?php if($this->session->userdata('type_users')=="GURU"){ ?> -->
	<div class="col-4-xxxl col-12">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Tambah Pos Pembayaran</h3>
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
				<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
				<form class="new-added-form" action="<?php echo base_url(). 'kelas/add'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Filter Unit</label>
							<select class="select2" name="tingkat" >
								<option>-- Pilih Unit --</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>

						</div>
						<!-- <div class="col-12-xxxl col-lg-4 col-12 form-group">
							<label>Nama Kelas</label>
							<input name="nama_kelas" type="text" placeholder="Tulis dalam Romawi" class="form-control">
						</div> -->

						<!--   <div class="col-12-xxxl col-lg-4 col-12 form-group">
							  <label>Keterangan</label>
							  <input  name="keterangan" type="text" placeholder="Tulis keterangan atau jurusan" class="form-control">
						  </div> -->

						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Akun Piutang</label>
							<select class="select2" name="tingkat" >
								<option>-- Pilih Akun Piutang --</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>

						</div>

						<!--  <div class="col-12 form-group mg-t-8">
								 <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
								 <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
						 </div> -->
					</div>
					<div class="row">
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Kode Akun</label>
							<select class="select2" name="tingkat" >
								<option>-- Pilih Kode Akun --</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>

						</div>
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Nama POS</label>
							<input  name="keterangan" type="text" placeholder="Contoh : SPP" class="form-control">
						</div>
						<div class="col-lg-12 col-12 form-group">
							<label>Keterangan *</label>
							<textarea class="textarea form-control" name="message" id="form-message" cols="10"
									  rows="6" placeholder="Contoh : Sumbangan Pendidikan"></textarea>
						</div>
					</div>
					<div class="col-12 form-group mg-t-8">
						<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
						<button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- <?php } else {} ?> -->


	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<!-- <?php echo $this->session->flashdata("msg");?> -->
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Daftar Kelas</h3>
					</div>

					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
						   aria-expanded="false">...</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table display data-table text-nowrap">
						<thead>
						<tr>
							<th>
								<div class="form-check">
									<input type="checkbox" class="form-check-input checkAll">
									<label class="form-check-label">No</label>
								</div>
							</th>
							<th>Kode Akun</th>
							<th>Akun Piutang</th>
							<th>Nama POS</th>
							<th>Keterangan</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<!-- <?php foreach ($kelas as $row) { ?> -->
						<tr>
							<td>
								<div class="form-check">
									<input type="checkbox" class="form-check-input">
									<label class="form-check-label"><?php echo $row['k_romawi'] ?></label>
								</div>
							</td>
							<td><?php echo $row['k_tingkat'] ?></td>
							<td><?php echo $row['k_keterangan'] ?></td>
							<td>
								<div class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"
									   aria-expanded="false">
										<span class="flaticon-more-button-of-three-dots"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<!--<a class="dropdown-item" href="<?php echo base_url('/kelas/edit/'.$row['idkelas']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
										<a class="dropdown-item" href="<?php echo base_url('/kelas/deletes/'.$row['idkelas']);?>"><i
												class="fas fa-times text-orange-red"></i>Hapus</a>

									</div>
								</div>
							</td>
						</tr>
						<!-- <?php } ?> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>
