<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
		src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>


<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<form class="new-added-form" action="<?php echo base_url(); ?>kasmasuk/savemasuk" method="post">

	<div class="row">
			<div class=" col-12">
				<div class="card height-auto">
					<div class="card-body">
						<div class="heading-layout1">
							<div class="item-title">
								<h3>Kas Masuk</h3>
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
							<div class="row">
								<?php $unit = $this->session->userdata('unit'); ?>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal" class="form-control" placeholder="tanggal"
										   id="tanggal">
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<label for="">No Ref</label>
									<input type="text" class="form-control" name="no_ref" id="no_ref">
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<label for="">Akun</label>
									<select name="id_akun" id="id_akun" class="select2">
										<option value="">Pilih Akun</option>
										<?php
										//								sr_account query
										$db = $this->db->query("select * from sr_account where modul_keuangan = 'aset' and unit = '$unit'")->result();
										foreach ($db as $item):
											?>
											<option value="<?= $item->id_akun ?>"> <?= $item->kode_akun . '-' . $item->keterangan ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">

									<label for="">Keterangan</label>
									<input type="text" name="keterangan" class="form-control" id="keterangan">
								</div>
								<div class="col-6-xxxl col-lg-6 col-12 form-group">
									<input type="text" name="unit" value="<?php echo $unit ?>" hidden>


									<label for="">Total</label>
									<h3 class="total"></h3>
								</div>
							</div>
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
							<table class="table card-table table-bordered">
								<thead>
								<tr>
									<th>Kode Akun</th>
									<th>Uraian</th>
									<th>Nominal (Rp)</th>
									<th>Unit Pos</th>
									<th class="text-center"></th>
									<th class="text-center"></th>
								</tr>
								</thead>
								<tbody class="addMoreProduct">
								<tr>
									<td>
										<select name="akun[]" id="akun" class="form-control akun" >
											<option value="0">Pilih Akun</option>
											<?php
											$db = $this->db->query("select * from sr_account where modul_keuangan ='pendapatan' order by keterangan")->result();
											foreach ($db as $item):
												?>
												<option value="<?= $item->id_akun ?>"><?= $item->kode_akun . '-' . $item->keterangan ?></option>
											<?php endforeach; ?>
										</select>
									</td>
									<td>
										<input type="text" class="form-control uraian" id="uraian" name="uraian[]"
											   placeholder="Uraian">
									</td>
									<td>
										<input type="number" class="form-control nominal" id="nominal" name="nominal[]">
									</td>
									<td>
										<select name="unit_pos[]" id="unit_pos" class="form-control  unit_pos">
											<option>Pilih Unit Pos</option>

											<?php
											$pos = $this->db->get('sr_pos_pembayaran')->result();
											foreach ($pos as $item):
												?>
												<option value="<?= $item->id_pos ?>"><?= $item->nama_pos ?></option>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>
								</tbody>
								<tr>
									<td>
										<button id="add" class="btn-lg btn-success add_more" type="button">Tambah
										</button>
									</td>
									<td></td>
								</tr>
						</div>
						<tr>
							<td colspan="1">
							</td>
							<td>
							</td>
							<td colspan="1">
								<div class="form-group">
									<label for="">Total</label>
									<h3 class="total"></h3>
									<input type="text" class="total_input" hidden name="total">
								</div>
							</td>
							<td></td>
							<td></td>
						</tr>
						</table>
					</div>
					<!--				button-->
					<button type="submit" class="btn btn-fill-lg btn-gradient-yellow">Save</button>
					<!-- /.box-header -->
				</div>
			</div>
		</div>
</div>
</form>

</div>


<!-- Add Notice Area End Here -->

<!-- All Notice Area Start Here -->

<!-- All Notice Area End Here -->


<?php } else { ?>

	<!-- Add Notice Area End Here -->

	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
	</div>


<?php } ?>

<script>

	$('.add_more').on('click', function () {
		var akun = $('.akun').html();
		var unit_pos = $('.unit_pos').html();
		var tr = '<tr><td><select class="form-control akun"  name="akun[]">' + akun + '</select> </td>' +
			'<td><input type="text" name="uraian[]" class="form-control uraian"></td>' +
			'<td><input type="text" name="nominal[]" class="form-control nominal"></td>' +
			'<td><select class="form-control unit_pos" name="unit_pos[]">' + unit_pos + '</select></td>' +
			'<td><a class="btn btn-danger btn-sm delete rounded-circle text-white"><i class="fa fa-trash"></i></a></td>';
		$('.addMoreProduct').append(tr);
	});
	$('.addMoreProduct').delegate('.delete', 'click', function () {
		var tr = $(this).parent().parent();
		var nominal = tr.find('.nominal').val();
		tr.find('.nominal').val(nominal);
		$(this).parent().parent().remove();
		TotalAmount()
	});
	$('.addMoreProduct').delegate('.nominal', 'keyup', function () {
		var tr = $(this).parent().parent();
		var nominal = tr.find('.nominal').val();
		tr.find('.nominal').val(nominal);
		TotalAmount()
	});

	function TotalAmount() {
		var total = 0;
		var tot1 = 0;
		$('.nominal').each(function (i, e) {
			var amount = $(this).val() - 0;
			total += amount;
		});
		var tot1 = new Intl.NumberFormat().format(total);
		$('.total').html(tot1);
		$('.total_input').val(total);
	}


</script>
