
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>

	<?php } else {
	} ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8"
			src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
	<div class="col-12">
		<div class="row">
			<div class="col-3">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<label for="nama">Unit</label><br>
							<label for="nama"><b><?=$list['nama'] ?></b></label>
						</div>
						<div class="form-group">
							<label for="nama">NIP</label><br>
							<label for="nama"><b><?=$list['u_nbm_nip'] ?></b></label>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label><br>
							<label for="nama"><b><?=$list['first_name'] ?></b></label>
						</div>
						<div class="form-group">
							<label for="nama">Jabatan</label><br>
							<label for="nama"><b><?=$list['u_tugas_tambahan']?></b></label>
						</div>
						<div class="form-group text-center" >

<!--							<a  id="update_gaji" href="#"  class="btn btn-fill-lg btn-gradient-yellow">Update Gaji</a>-->
							<a
							   href="#delModal3" data-toggle="modal"><i
										class="btn btn-fill-lg btn-gradient-yellow" data-toggle="tooltip"title="Update Gaji">Update Gaji  </i></a>
							<div class="modal fade" id="delModal3" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<h2>Cetak Gaji</h2>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
											<div class="modal-body">
												<p>Anda yakin mau Cetak Gaji <?=$list['first_name'] ?></p>
											</div>
											<div class="modal-footer">
												<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
												<button   id="update_gaji" class="btn btn-danger" >Cetak </button>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-9">
						<div class="card">
					<div class="card-body">
						<form action="<?php echo base_url() ;?>gaji/save_akun" method="post">
						<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="nama">Akun</label>

							<select name="akun_gaji" id="akun" class="form-control">
								<option value="">Pilih Akun</option>
								<?php foreach ($account as $key => $value) { ?>
									<option value="<?=$value->id_akun?>"<?php if (!empty($list_akun->akun_gaji) ? $list_akun->akun_gaji == $value->id_akun : '') echo 'selected="selected"';  ?>><?=$value->kode_akun?> - <?=$value->keterangan?></option>
								<?php } ?>
							</select>
						</div>
						<input type="text" value="<?php echo $list['idusers'] ?>" hidden name="id_user" id =id_users>
						<input type="text" value="<?php echo $list['id'] ?>"  name="unit" id="unitt" hidden>
					</div>
							<div class="col-6 mt-5">
						<div class="form-group">
						<button type="submit" class="btn-fill-sm text-white btn-gradient-yellow btn-hover-bluedark">Update</button>
						</div>


							</div>
						</div>
						</form>


					</div>
							<div class="card ui-tab-card">
								<div class="card-body">
									<div class="heading-layout1 mg-b-25">
									</div>
									<div class="border-nav-tab">
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#tab7" role="tab" aria-selected="true">Gaji Pokok</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Potongan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tab9" role="tab" aria-selected="false">Pendapatan Lain Lain</a>
											</li>
										</ul>
										<div class="tab-content">

											<div class="tab-pane fade show active" id="tab7" role="tabpanel">
												<form action="<?php echo base_url() ;?>gaji/tarif_gaji_detail" method="post">
													<div class="row">
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Gaji Pokok</label>
																<select name="id_tunjangan" id="id_tunjangan" class="form-control">
																	<option value="">Pilih Gaji Pokok</option>
																	<?php foreach ($tunjangan as $key => $value) { ?>
																		<option value="<?=$value->id_setting_tunjangan?>"><?=$value->nama_setting_tunjangan?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Tunjangan Jabatan</label>
																<!--														<select id="nominal" class="form-control select2 select2-info combo-nominal" data-dropdown-css-class="select2-info" style="width: 100%; " name="nominal_setting_tunjangan">-->
																<!--															--><?php //echo $combo_siswa; ?>
																<!--														</select>-->
																<input type="text" value="<?php echo $list['idusers'] ?>" hidden name="id_user">
																<input type="text" value="gaji_pokok" hidden name="deskripsi">
																<input type="text" value="<?php echo $list['id'] ?>"  name="unit" hidden>
																<input type="text" id="id_tunjangan" class="combo-nominal form-control" readonly>
															</div>
														</div>
														<div class="col-md-2 mt-5">
															<button type="submit" class="btn-fill-sm text-white btn-gradient-yellow btn-hover-bluedark add_more">
																<i class="fa fa-plus"></i></button>
														</div>
													</div>
												</form>
												<div class="table-responsive">
													<table class="table card-table table-center text-nowrap " width="100%" id="table">
														<thead class="bg-primary text-white">
														<tr>
															<th class="text-white">No</th>
															<th class="text-white" >Nama</th>
															<th class="text-white" >Besaran</th>
															<th class="text-white"></th>

														</tr>
														</thead>
														<tbody class="addMoreProduct">
<!--														foreach -->
														<?php
														$unit = $list['id'] ;
														$user = $list['idusers'];
														$gaji = $this->db->query("
																select users.first_name,users.last_name,sr_setting_tunjangan.nominal_setting_tunjangan,sr_tarif_gaji_user.id_gaji,sr_setting_tunjangan.nama_setting_tunjangan from sr_tarif_gaji_user
																left join users on users.id = sr_tarif_gaji_user.id_user
																left join sr_setting_tunjangan on sr_setting_tunjangan.id_setting_tunjangan = sr_tarif_gaji_user.id_tunjangan
															where sr_tarif_gaji_user.unit = '$unit' and sr_tarif_gaji_user.id_user = '$user' and id_tunjangan != ''")->result();
														$no = 1;$total = 0;
														?>
														</tbody>
														<?php foreach ($gaji as $product): ?>
														<tr>
															<td><?php echo $no++; ?></td></td>
															<td>
																<?php echo $product->nama_setting_tunjangan ?>
															</td>
															<td>
																<?php echo number_format($product->nominal_setting_tunjangan) ?>
															</td>
															<td>
																<button class="btn btn-sm btn-warning"data-toggle="modal"
																   href="#delModal3<?php echo $product->id_gaji ?>" >Hapus</button></td>
														</tr>
<!--														total-->
														<?php $total += $product->nominal_setting_tunjangan; ?>
															<div class="modal fade" id="delModal3<?php echo $product->id_gaji ?>" role="dialog">
																<div class="modal-dialog modal-md">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h2>Hapus Gaji Pokok</h2>
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/delete_tarif_gaji') ?>">
																			<div class="modal-body">
																				<p>Anda yakin mau menghapus <b></b></p>
																			</div>
																			<div class="modal-footer">
																				<input type="hidden" name="id_gaji" value="<?php echo $product->id_gaji;?>">
																				<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
																				<button type="submit" class="btn btn-danger">Hapus</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														<?php endforeach; ?>
														<tr style="background-color: #99D3FF">
															<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
															<th colspan="2"><?=number_format($total);?></th>
															<input type="text" value="<?=$total;?>" name="total_pokok" id="total_pokok" hidden>
														</tr>


													</table>
												</div>
												<div class="">

												</div>
											</div>
											<div class="tab-pane fade" id="tab8" role="tabpanel">
												<form action="<?php echo base_url() ;?>gaji/save_detail_potongan" method="post">
													<div class="row">
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Potongan Gaji</label>
																<select name="id_potongan" id="id_potongan" class="form-control">
																	<option value="">Pilih Potongan Gaji</option>
																	<?php foreach ($potongan as $key => $value) { ?>
																		<option value="<?=$value->id_setting_potongan?>"><?=$value->nama_setting_potongan?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Potongan Jabatan</label>
																<!--														<select id="nominal" class="form-control select2 select2-info combo-nominal" data-dropdown-css-class="select2-info" style="width: 100%; " name="nominal_setting_tunjangan">-->
																<!--															--><?php //echo $combo_siswa; ?>
																<!--														</select>-->
																<input type="text" value="<?php echo $list['idusers'] ?>" hidden name="id_user">
																<input type="text" value="potongan" hidden name="deskripsi">
																<input type="text" value="<?php echo $list['id'] ?>"  name="unit" hidden>
																<input type="text" id="id_potongan_text" class="combo-nominal_potongan form-control" readonly>
															</div>
														</div>
														<div class="col-md-2 mt-5">
															<button type="submit" class="btn-fill-sm text-white btn-gradient-yellow btn-hover-bluedark add_more">
																<i class="fa fa-plus"></i></button>
														</div>
													</div>
												</form>
												<div class="table-responsive">
													<table class="table card-table table-center text-nowrap " width="100%" id="table">
														<thead class="bg-primary text-white">
														<tr>
															<th class="text-white">No</th>
															<th class="text-white" >Nama</th>
															<th class="text-white" >Besaran</th>
															<th class="text-white"></th>

														</tr>
														</thead>
														<tbody class="addMoreProduct">
														<!--														foreach -->
														<?php
														$unit = $list['id'] ;
														$user = $list['idusers'];
														$gaji = $this->db->query("
															select users.first_name,users.last_name,sr_setting_potongan.nominal_setting_potongan,sr_tarif_gaji_user.id_gaji,sr_setting_potongan.nama_setting_potongan from sr_tarif_gaji_user
	    left join users on users.id = sr_tarif_gaji_user.id_user
        left join sr_setting_potongan on sr_setting_potongan.id_setting_potongan = sr_tarif_gaji_user.id_potongan
															where sr_tarif_gaji_user.unit = '$unit' and sr_tarif_gaji_user.id_user = '$user' and id_potongan != ''")->result();
														$no = 1;$total = 0;
														?>
														</tbody>
														<?php foreach ($gaji as $product): ?>
															<tr>
																<td><?php echo $no++; ?></td></td>
																<td>
																	<?php echo $product->nama_setting_potongan ?>
																</td>
																<td>
																	<?php echo number_format($product->nominal_setting_potongan) ?>
																</td>
																<td>
																	<button class="btn btn-sm btn-warning"data-toggle="modal"
																			href="#delModal3potongan<?php echo $product->id_gaji ?>" >Hapus</button></td>
															</tr>
															<!--														total-->
															<?php $total += $product->nominal_setting_potongan; ?>
															<div class="modal fade" id="delModal3potongan<?php echo $product->id_gaji ?>" role="dialog">
																<div class="modal-dialog modal-md">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h2>Hapus Potongan Gaji</h2>
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/delete_tarif_gaji') ?>">
																			<div class="modal-body">
																				<p>Anda yakin mau menghapus <b></b></p>
																			</div>
																			<div class="modal-footer">
																				<input type="hidden" name="id_gaji" value="<?php echo $product->id_gaji;?>">
																				<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
																				<button type="submit" class="btn btn-danger">Hapus</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														<?php endforeach; ?>
														<tr style="background-color: #99D3FF">
															<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
															<th colspan="2"><?=number_format($total);?></th>
															<input type="text" value="<?=$total;?>" name="total_tunjangan" id="total_tunjangan"hidden>

														</tr>


													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="tab9" role="tabpanel">
												<form action="<?php echo base_url() ;?>gaji/save_detail_lain" method="post">
													<div class="row">
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Pendapatan Gaji Lain</label>
																<select name="id_lain" id="id_pendapatan_lain" class="form-control">
																	<option value="">Pilih Pendapatan Gaji Lain</option>
																	<?php foreach ($lain as $key => $value) { ?>
																		<option value="<?=$value->id_setting_pendapatan_lain_lain?>"><?=$value->nama_setting_pendapatan_lain_lain?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label for="nama">Gaji Pendapatan lain lain</label>
																<input type="text" value="<?php echo $list['idusers'] ?>" hidden name="id_user">
																<input type="text" value="lain" hidden name="deskripsi">
																<input type="text" value="<?php echo $list['id'] ?>"  name="unit" hidden>
																<input type="text" id="id_lain" name="" class="combo-nominal_lain form-control" readonly>
															</div>
														</div>
														<div class="col-md-2 mt-5">
															<button type="submit" class="btn-fill-sm text-white btn-gradient-yellow btn-hover-bluedark add_more">
																<i class="fa fa-plus"></i></button>
														</div>
													</div>
												</form>
												<div class="table-responsive">
													<table class="table card-table table-center text-nowrap " width="100%" id="table">
														<thead class="bg-primary text-white">
														<tr>
															<th class="text-white">No</th>
															<th class="text-white" >Nama</th>
															<th class="text-white" >Besaran</th>
															<th class="text-white"></th>

														</tr>
														</thead>
														<tbody class="addMoreProduct">
														<!--														foreach -->
														<?php
														$unit = $list['id'] ;
														$user = $list['idusers'];
														$gaji = $this->db->query("select users.first_name,users.last_name,sr_setting_pendapatan_lain_lain.nominal_setting_pendapatan_lain_lain,sr_tarif_gaji_user.id_gaji,sr_setting_pendapatan_lain_lain.nama_setting_pendapatan_lain_lain from sr_tarif_gaji_user
															left join users on users.id = sr_tarif_gaji_user.id_user
															left join sr_setting_pendapatan_lain_lain on sr_setting_pendapatan_lain_lain.id_setting_pendapatan_lain_lain = sr_tarif_gaji_user.id_lain
															where sr_tarif_gaji_user.unit = '$unit' and sr_tarif_gaji_user.id_user = '$user' and id_lain != ''")->result();
														$no = 1;$total = 0;
														?>
														</tbody>
														<?php foreach ($gaji as $product): ?>
															<tr>
																<td><?php echo $no++; ?></td></td>
																<td>
																	<?php echo $product->nama_setting_pendapatan_lain_lain ?>
																</td>
																<td>
																	<?php echo number_format($product->nominal_setting_pendapatan_lain_lain) ?>
																</td>
																<td>
																	<button class="btn btn-sm btn-warning"data-toggle="modal"
																			href="#delModal3potongan<?php echo $product->id_gaji ?>" >Hapus</button></td>
															</tr>
															<!--														total-->
															<?php $total += $product->nominal_setting_pendapatan_lain_lain; ?>
															<div class="modal fade" id="delModal3potongan<?php echo $product->id_gaji ?>" role="dialog">
																<div class="modal-dialog modal-md">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h2>Hapus Potongan Gaji</h2>
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<form class="form-horizontal" method="post" action="<?php echo base_url('gaji/delete_tarif_gaji') ?>">
																			<div class="modal-body">
																				<p>Anda yakin mau menghapus <b></b></p>
																			</div>
																			<div class="modal-footer">
																				<input type="hidden" name="id_gaji" value="<?php echo $product->id_gaji;?>">
																				<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
																				<button type="submit" class="btn btn-danger">Hapus</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														<?php endforeach; ?>
														<tr style="background-color: #99D3FF">
															<th colspan="2" class="text-left" style="font-size: larger"><strong>Total</strong></th>
															<th colspan="2"><?=number_format($total);?></th>
															<input type="text" value="<?=$total;?>" name="total_lain" id="total_lain"hidden>

														</tr>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

				</div>
			</div>
		</div>
	</div>

	<script>
		$('#update_gaji').on('click',function (){

			let id_user = $('#id_users').val()
			let akun = $('#akun').val()
			if (akun == '')
			{
				swal({
					title: "Warning!",
					text: "Harus Isi Akun Terlebih Dahulu!",
					icon: "warning",
					button: "warning"
				});
				return false;
			}
			let unit = $('#unitt').val()
			let total_gaji = $('#total_pokok').val()
			let total_tunjangan = $('#total_tunjangan').val()
			let total_lain = $('#total_lain').val()
			var token = 'access';

			$.ajax({
				url: "<?=base_url('gaji/insert_gaji')?>",
				type: "post",
				data: {token:token,id_user:id_user,total_gaji:total_gaji,total_tunjangan:total_tunjangan,total_lain:total_lain,unit:unit,akun:akun},
				success: function(data){
					swal({
						title: "Berhasil!",
						text: "Berhasil Update Gaji Karyawan!",
						icon: "success",
						button: "OK!"
					});
					location.href = "<?=base_url('gaji/setting_gaji')?>";
					// $("#modal_show_chart").find(".modal-body").html(data);
				}
			});
		})
		$('#id_tunjangan').on('change', function(){
			var nama_tunjangan = $(this).val();
			$.get("<?php echo base_url(); ?>gaji/ajax_combo_nominal",{nama_tunjangan:nama_tunjangan}, function(data) {
				$(".combo-nominal").val(data);
			});
		});
		$('#id_potongan').on('change', function(){
			var nama_potongan = $(this).val();
			$.get("<?php echo base_url(); ?>gaji/ajax_combo_nominal_potongan",{nama_potongan:nama_potongan}, function(data) {
				$(".combo-nominal_potongan").val(data);
			});
		});
		$('#id_pendapatan_lain').on('change', function(){
			var nama_lain = $(this).val();
			$.get("<?php echo base_url(); ?>gaji/ajax_combo_nominal_lain",{nama_lain:nama_lain}, function(data) {
				$(".combo-nominal_lain").val(data);
			});
		});

</script>
