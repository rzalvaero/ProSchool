<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if($this->session->userdata('type_users')=="GURU"){ ?>
		<div class="col-4-xxxl col-12">
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Tambah Kode Kelompok</h3>
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
							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Kode</label>
								<input name="nama_kelas" type="text" placeholder="Tulis Kode " class="form-control">
							</div>

							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Jenis Akun</label>
							</div>
							<div class="col-12-xxxl col-lg-4 col-12 form-group">
								<label>Tingkat</label>
								<select class="select2" name="tingkat" >
									<option disabled>Default select</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>

							</div>

							<div class="col-12 form-group mg-t-8">
								<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
								<button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php } else {} ?>


	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg");?>
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Daftar Kode Kelompok</h3>
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
									<label class="form-check-label">Kelompok</label>
								</div>
							</th>
							<th>Keterangan</th>
							<th></th>
						</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>
