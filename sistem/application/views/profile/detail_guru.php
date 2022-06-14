<div class="card-body">
	<div class="heading-layout1">
		<div class="item-title">
			<h3>Tentang</h3>
		</div>
		<div class="dropdown">
			<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

		</div>
	</div>
	<div class="single-info-details">
		<div class="item-img">
			<img src="<?php echo base_url(); ?>assets/img/figure/teacher.jpg" alt="teacher">
		</div>
		<div class="item-content">
			<div class="header-inline item-header">
				<div class="header-elements">
					<ul>
						<?php if($this->session->userdata('type_users')=="ADMIN"){ ?>
						<li><a href="<?php echo base_url(); ?>guru/setting/<?php echo $this->uri->segment('3'); ?>"><i class="far fa-edit"></i></a></li>
						<?php }else{ ?>
						<li><a href="<?php echo base_url(); ?>guru/setting/<?php echo $this->session->userdata('id'); ?>"><i class="far fa-edit"></i></a></li>
						<?php } ?>
						<li><a onclick="window.print();" class="noPrint"><i class="fas fa-print"></i></a></li>
					</ul>
				</div>
			</div>
			<p></p>
			<div class="info-table table-responsive">
				<table class="table text-nowrap">
					<?php foreach ($detail as $row) { ?>
						<tbody>
							<tr>
								<td>Nama:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['first_name'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['u_jenis_kelamin'] ?></td>
							</tr>
							<tr>
								<td>Jabatan:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['nama_jabatan'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['u_tanggal_lahir'] ?></td>
							</tr>
							<tr>
								<td>NPWP:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['u_npwp'] ?></td>
							</tr>

							<tr>
								<td>E-mail:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['email'] ?></td>
							</tr>
							<tr>
								<td>No.HP:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['phone'] ?></td>
							</tr>
							<tr>
								<td>Perguruan Tinggi:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['u_perguruan_tinggi'] ?>
									/ <?php echo $row['u_jenjang'] ?></td>
							</tr>
							<tr>
								<td>Alamat:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['u_alamat_tinggal'] ?></td>
							</tr>
							<tr>
								<td>Unit:</td>
								<td class="font-medium text-dark-medium"><?php echo $row['unit'] ?></td>
							</tr>
							<tr>
								<td>Status Aktif:</td>
								<td class="font-medium text-dark-medium">
									<?php
									if ($row['status'] == '1') {
										echo 'Aktif';
									} else {
										echo 'Tidak Aktif';
									} ?>
								</td>
							</tr>
						</tbody>
					<?php } ?>
				</table>
				<table class="table text-nowrap">
					<tr>
						<th>Kelas yang diajar :
						</th>
						<th>
							<button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#large-modal<?php echo $this->uri->segment('3'); ?>">
								Tambah Kelas
							</button>
						</th>
					</tr>
					<div class="modal fade" id="large-modal<?php echo $this->uri->segment('3'); ?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Tambah Kelas</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form class="new-added-form" action="<?php echo base_url() . 'guru/adding_kelas_guru'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
										<input type="hidden" name="idguru" value="<?php echo $this->uri->segment('3'); ?>" class="form-control" required>
										<div class="row">
											<div class="col-12 form-group">
												<label>Kelas</label>
												<select class="select2" name="kelas_id">
													<?php foreach ($selectkelas as $a) : ?>
														<option value="<?= $a->idkelas ?>"><?= $a->k_romawi ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
											<input type="submit" name="submit" value="Tambah" id="submit" class="footer-btn bg-linkedin" />
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php foreach ($kelas as $row) { ?>
						<tbody>
							<tr>
								<td>
									<a href="#" style="padding:5px 15px;" class="btn-fill-lmd radius-30 text-light shadow-red bg-red">x</a>
								</td>
								<td class="font-medium text-dark-medium"><?php echo $row['k_romawi'] ?>
									- <?php echo $row['k_keterangan'] ?>
								</td>
								
							</tr>
						</tbody>
					<?php } ?>
				</table>
				<table class="table text-nowrap">
					<tr>
						<th>Mata Pelajaran :
							
						</th>
						<th>
							<button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#large-mapel<?php echo $this->uri->segment('3'); ?>">
								Tambah Mapel
							</button>
						</th>
						<div class="modal fade" id="large-mapel<?php echo $this->uri->segment('3'); ?>" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Tambah Mata Pelajaran</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form class="new-added-form" action="<?php echo base_url() . 'guru/adding_mapel_guru'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
											<input type="hidden" name="idguru" value="<?php echo $this->uri->segment('3'); ?>" class="form-control" required>
											<div class="row">
												<div class="col-12 form-group">
													<label>Mata Pelajaran</label>
													<select class="select2" name="mapel_id">
														<?php foreach ($selectmatapelajaran as $a) : ?>
															<option value="<?= $a->idmata_pelajaran ?>"><?= $a->mp_kode ?> - <?= $a->mp_nama ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
												<input type="submit" name="submit" value="Tambah" id="submit" class="footer-btn bg-linkedin" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</tr>
					<?php foreach ($mapel as $row) { ?>
						<tbody>
							<tr>
								<td class="font-medium text-dark-medium">
									<a href="#" style="padding:5px 15px;" class="btn-fill-lmd radius-30 text-light shadow-red bg-red">x</a>
								</td>
								<td class="font-medium text-dark-medium">
									<?php echo $row['mp_kode'] ?> - <?php echo $row['mp_nama'] ?>
								</td>
								
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>
			<div class="col-12 form-group mg-t-8">
				<!-- <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>-->
				<a style="float:right;margin: 0px 20px 0px 0px;" href="<?php echo base_url(); ?>" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
			</div>
		</div>
	</div>
</div>