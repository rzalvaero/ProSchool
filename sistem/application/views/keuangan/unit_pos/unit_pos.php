<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>
	<!-- Add Notice Area End Here -->
<div class="row">
	<div class="col-12-xxxl col-12">
		<div class="card">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
					<h3>Tambah Unit Pos</h3>
					</div>
				</div>
				<form class="new-added-form" action="<?php echo base_url(). 'keuangan/unit_pos_save'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-6 col-12 form-group">
							<label>Nama Unit Pos</label>
							<input type="text" placeholder="Tulis Nama Unit Pos" name="nama_unit_pos" class="form-control">
							<input type="text" hidden value="<?=$unit ?>" name="unit" class="form-control">
						</div>
						<div class="col-12 form-group mg-t-8">
							<button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
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
							<th>Nama Unit Pos </th>
							<th>Setting Tarif Pendapatan</th>
							<th>Setting Tarif Beban</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($list as $product): ?>
							<tr>
								<td><?php echo $no++; ?></td></td>

								<td>
									<?php echo $product->nama_unit_pos ?>
								</td>
								<td>
									<a data-toggle="tooltip" data-placement="top" title="Ubah"
									   class="btn btn-primary btn-xs"
									   href="<?php echo base_url() . 'keuangan/tarif_pos_unit/' . $product->id_unit_pos; ?>">
										Setting Tarif Pembayaran Pendapatan
									</a>
								</td>

								<td>
									<a data-toggle="tooltip" data-placement="top" title="Ubah"
									   class="btn btn-info btn-xs"
									   href="<?php echo base_url() . 'keuangan/tarif_pos_unit_beban/' . $product->id_unit_pos; ?>">
										Setting Tarif Pembayaran Beban
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
											   href="#editModal<?php echo $product->id_unit_pos;?>" data-toggle="modal"data-id="<?= $product->id_unit_pos;?>" data-name="<?= $product->nama_unit_pos;?>"><i
														class="fas fa-cogs text-dark-pastel-green btn-edit"></i>Edit</a>
											<a class="dropdown-item"
											   href="#delModal3" data-toggle="modal"><i
														class="fas fa-times text-orange-red" data-toggle="tooltip"title="Hapus"></i>Hapus</a>
										</div>
									</div>
								</td>
							</tr>
							<div class="modal fade" id="delModal3" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<h2>Hapus Unit Pos</h2>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<form class="form-horizontal" method="post" action="<?php echo base_url('keuangan/delete_unit_pos') ?>">
											<div class="modal-body">
												<p>Anda yakin mau menghapus <b><?php echo $product->nama_unit_pos;?></b></p>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id_unit_pos" value="<?php echo $product->id_unit_pos;?>">
												<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
												<button type="submit" class="btn btn-danger">Hapus</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						<div class="modal fade" id="editModal<?php echo $product->id_unit_pos;?>" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Unit Pos <?php echo $product->nama_unit_pos;?></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="<?php echo base_url('keuangan/unit_pos_update') ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label>Nama Unit Pos</label>
													<input type="text" placeholder="Tulis Nama Unit Pos" name="nama_unit_pos" class="form-control nama_unit" id="nama_unit" value="<?php echo $product->nama_unit_pos;?>" >
													<input type="text"  name="id_unit_pos" class="form-control id_unit_pos" id="id_unit_pos"value="<?php echo $product->id_unit_pos;?>"hidden>
												</div>
											</div>
											<div class="modal-footer">
												<input name="unit" class="unit" value="<?= $product->unit ?>" hidden>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary ">Update</button>
											</div>
											</form>

										</div>
									</div>
								</div>
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

