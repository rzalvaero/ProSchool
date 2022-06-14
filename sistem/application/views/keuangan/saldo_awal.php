<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>


	<!-- Add Notice Area End Here -->
	<div class="col-8-xxxl col-12">
		<?php echo $this->session->flashdata("msg"); ?>
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
					<h3>Jurnal</h3>
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
							<th>No</th>
							<th>Kode Akun</th>
							<th>Keterangan</th>
							<th>Deskripsi</th>
							<th>Debit</th>
							<th>Kredit</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$db = $this->db->query("select kode_akun,keterangan,debet,credit,deskripsi from sr_invoice_body
join sr_account on sr_account.id_akun = sr_invoice_body.id_akun
order by kode_akun asc
		")->result();
						foreach ($db as $item){
						?>
								<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $item->kode_akun; ?></td>
								<td><?php echo $item->keterangan; ?></td>
								<td><?php echo $item->deskripsi; ?></td>
								<td><?php echo number_format($item->debet); ?></td>
								<td><?php echo number_format($item->credit); ?></td>
							</tr>

						<?php } ?>
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
