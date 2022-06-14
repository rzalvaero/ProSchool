<div class="row">
	<!-- Add Notice Area Start Here -->
	<!-- <?php if($this->session->userdata('type_users')=="GURU"){ ?> -->
	<!-- <?php } else {} ?> -->

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
				<form class="new-added-form" action="<?php echo base_url(). 'keuangan/save_pos_pembayaran'; ?>" method="post">
					<input type="text" name="unit" value="<?php echo $unit ?>" hidden>
					<div class="row">
						<div class="col-12-xxxl col-lg-12 col-12 form-group">
							<label>Nama POS</label>
							<input  name="nama_pos" type="text" placeholder="Contoh : SPP" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Kode Akun</label>
							<select class="select2" name="kode_akun" >
								<option>-- Pilih Kode Akun --</option>
								<?php foreach($akun as $l){ ?>
									<option value="<?php echo $l['id_akun']; ?>"><?php echo $l['kode_akun']. ' - '.$l['keterangan']; ?>   </option>
								<?php } ?>

							</select>

						</div>
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Akun Piutang</label>
							<select class="select2" name="akun_piutang" >
								<option>-- Pilih Akun Piutang --</option>
								<?php foreach($akun_piutang as $l){ ?>
									<option value="<?php echo $l['id_akun']; ?>"><?php echo $l['kode_akun']. ' - '.$l['keterangan']; ?>   </option>
								<?php } ?>
							</select>

						</div>

						<div class="col-lg-12 col-12 form-group">
							<label>Keterangan *</label>
							<textarea class="textarea form-control" name="keterangan" id="form-message" cols="10"
									  rows="6" placeholder="Contoh : Sumbangan Pendidikan"></textarea>
						</div>
					</div>
					<div class="col-12 form-group mg-t-8">
						<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<!-- <?php echo $this->session->flashdata("msg");?> -->
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Daftar Pos Pembayaran</h3>
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
							<th>Nama POS</th>
							<th>Keterangan</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($list as $row): ?>
						<tr>
							<td>
								<div class="form-check">
									<input type="checkbox" class="form-check-input">
									<label class="form-check-label"><?php echo $no++ ?></label>

								</div>
							</td>
							<td><?php echo $row['nama_pos'] ?></td>
							<td><?php echo $row['keterangan'] ?></td>
							<td>
							<a class="btn btn-success" href="<?php echo base_url('/kelas/edit/'.$row['id_pos']);?>"><i
                                                                    class="fas fa-cogs text-white"></i>&nbsp;Edit</a>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>
