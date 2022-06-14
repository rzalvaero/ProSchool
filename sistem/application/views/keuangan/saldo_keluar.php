<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
		<div class="col-12-xxxl col-12">
			<?php echo $this->session->flashdata("msg"); ?>
			<div class="card height-auto">
				<div class="card-body">
					<div class="heading-layout1">
						<div class="item-title">
							<h3>Saldo Keluar</h3>
						</div>
<!--						button right-->
						<div class="dropdown">
							<a href="<?php echo base_url(); ?>kaskeluar/kas_keluar"class="btn btn-fill-lg btn-gradient-yellow">Tambah Kas Keluar</a>
						</div>

					</div>
					<div class="table-responsive">

						<table id="dtable" class="table table-hover  display data-table text-nowrap">
							<thead>
							<tr>
								<th>No</th>
								<th>Kas</th>
								<th>No. Ref</th>
								<th>Tanggal</th>
								<th>Kode Akun</th>
								<th>Keterangan</th>
								<th>Nominal (Rp.)</th>
								<th>Unit POS</th>
								<th>Total (Rp.)</th>
								<th>Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							$db = $this->db->query("SELECT * FROM sr_invoice_body WHERE status = 'keluar'")->result();
							foreach ($db as $item):
								?>
								<tr>
									<td><?=$no++ ?></td>
									<td><?=$item->akun ?></td>
									<td><?=$item->no_ref ?></td>
									<td><?=$item->tanggal ?></td>
									<td><?=$item->nama_akun ?></td>
									<td><?=$item->deskripsi ?></td>
									<td><?=number_format($item->nominal) ?></td>
									<td><?=$item->unit_pos ?> </td>
									<td><?=number_format($item->nominal)  ?> </td>
									<td>
										<?= $item->jenis ?>																							</td>
								</tr>
							<?php endforeach; ?>



							</tbody>
						</table>



					</div>
				</div>
			</div>
		</div>
	<?php } else {
	} ?>


	<!-- Add Notice Area End Here -->


	<!-- All Notice Area Start Here -->

	<!-- All Notice Area End Here -->
</div>


<div class="modal fade" id="addItem" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Unit POS</h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="https://demo.adminsekolah.net/manage/item/add_glob" method="post" accept-charset="utf-8">
				<div class="modal-body">
					<div id="p_scents_item">
							<div class="form-group">
							<label>Nama Unit POS</label>
							<input type="text" required="" name="item_name[]" class="form-control"
								   placeholder="Contoh: Pembangunan Gedung Sekolah">
							</div>
					</div>
<!--					<h6><a href="#" class="btn btn-xs btn-success" id="addScnt_item"><i class="fa fa-plus"></i><b>-->
<!--								Tambah Baris</b></a></h6>-->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var scntDiv = $('#p_scents_tax');
	var i = $('#p_scents_tax .row').size() + 1;

	$("#addScnt_tax").click(function () {
		$('<div class="row"><div class="col-md-6"><label>Nama Pajak</label><input type="text" required="" name="tax_name[]" class="form-control" placeholder="Contoh: Sekolah Dasar Putra"><a href="#" class="btn btn-xs btn-danger remScnt_tax">Hapus Baris</a></div><div class="col-md-6"><label>Besaran Pajak</label><input type="text" required="" name="tax_number[]" class="form-control" placeholder="NB: Jika Koma Gunakan Titik Contoh: 2.5"></div></div>').appendTo(scntDiv);
		i++;
		return false;
	});

	$(document).on("click", ".remScnt_tax", function () {
		if (i > 2) {
			$(this).parents('.row').remove();
			i--;
		}
		return false;
	});
</script>
