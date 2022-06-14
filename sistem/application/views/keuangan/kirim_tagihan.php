<div class="row">
	<!-- Add Notice Area Start Here -->
	<?php if ($this->session->userdata('type_users') == "GURU") { ?>
	<?php } else {
	} ?>

	<div class="col-4-xxxl col-12">
		<div class="card height-auto">
			<div class="card-body">
				<div class="heading-layout1">
					<div class="item-title">
						<h3>Kirim Tagihan Siswa</h3>
					</div>

				</div>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
				<form class="new-added-form" action="<?php echo base_url() . 'kelas/add'; ?>" method="post">
					<div class="row">
						<div class="col-12-xxxl col-lg-3 col-12 form-group">

							<label>Tahun Ajaran <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
							<select name="pos_id" class="form-control select2">
								<option value="">-Pilih Tahun Ajaran-</option>
								<option value="">2019</option>
								<option value="">2020</option>
								<option value="">2021</option>
								<option value="">2022</option>
							</select>
						</div>

						<div class="col-12-xxxl col-lg-3 col-12 form-group">
							<label>Pilih Kelas</label>
							<select class="form-control select2" name="c" id="class_id" required="">
								<option value="">-- Pilih Kelas --</option>
								<option value="61">1 B</option>
								<option value="70">1 Madinah</option>
								<option value="74">2</option>
								<option value="71">2 Makkah</option>
								<option value="80">DIN SYAMSUDIN</option>
								<option selected value="60">HAMZAH</option>
								<option value="102">II A</option>
								<option value="57">KELAS 1</option>
								<option value="29">Kelas 2</option>
								<option value="64">Kelas 6</option>
								<option value="63">Kelas Ia</option>
								<option value="91">PRIMARY 1</option>
								<option value="4">SD 1</option>
								<option value="5">SD 2</option>
								<option value="6">SD 3</option>
								<option value="7">SD 4</option>
								<option value="8">SD 5</option>
								<option value="9">SD 6</option>
								<option value="18">SD Alumni</option>
								<option value="30">SD Kelas Alumni</option>
								<option value="104">SDITLH 1-A</option>
								<option value="105">SDITLH 1-B</option>
								<option value="106">SDITLH 1-C</option>
								<option value="95">TeensEnglish-Beginner</option>
								<option value="96">TeensEnglish-Proficient</option>
								<option value="3">TK-B</option>
								<option value="55">ujang</option>
								<option value="107">VI A</option>
								<option value="108">VI B</option>
								<option value="109">VI C</option>
							</select>
						</div>


						<div class="col-12 form-group mg-t-8">
							<div class="row"style="float: right;margin-left: 10px" >
								<div class="col-1">
								<button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cari</button>
								</div>

								</div>
							<div class="row"style="float: right" >
								<div class="col-2">
									<button type="submit" class="btn-lg btn-success"><i class="fa fa-whatsapp"></i>Kirim Tagihan</button>
								</div>

							</div>
							<div class="row"style="float: right" >
								<div class="col-2">
									<button type="submit" class=" btn-lg btn-success"><i class="fa fa-whatsapp"></i>Kirim Pemberitahuan</button>
								</div>

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Add Notice Area End Here -->

		<div class="card" style="width: 100%">
			<div class="card-body">
				<div class="heading-layout1">
				</div>
				<div class="row">
					<div class="col-md-12">
						<table id="dtable" class="table table-hover table display data-table text-nowrap" style="white-space: nowrap;">
							<thead>
							<tr>
								<th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
								<th>No.</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th>WA Ortu</th>
								<th>Total Tagihan</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="467">
								</td>
								<td>1</td>
								<td>3787</td>
								<td>ADAM ATHALLAH ZAFRAN</td>
								<td>HAMZAH</td>
								<td>+6285729224863</td>
								<td>
									Rp 0
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="468">
								</td>
								<td>2</td>
								<td>3788</td>
								<td>ADEEVA RAMEISYA ZAHRA</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 0
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="470">
								</td>
								<td>3</td>
								<td>3790</td>
								<td>AWLIYA FITRI</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="471">
								</td>
								<td>4</td>
								<td>3791</td>
								<td>AYNA LATISHA HUDIONO</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.280.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="472">
								</td>
								<td>5</td>
								<td>3792</td>
								<td>BIMO HERU PRAYOGO</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="473">
								</td>
								<td>6</td>
								<td>3793</td>
								<td>DANISH RAMADHAN</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="474">
								</td>
								<td>7</td>
								<td>3794</td>
								<td>DARYL NAUFAL CAHYONO</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="475">
								</td>
								<td>8</td>
								<td>3795</td>
								<td>DODY MULYA</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" class="checkbox" name="msg[]" id="msg" value="476">
								</td>
								<td>9</td>
								<td>3796</td>
								<td>FAQIH KHAIRY RAHMAN</td>
								<td>HAMZAH</td>
								<td>+</td>
								<td>
									Rp 2.520.000
								</td>
							</tr>
							<tr style="background-color: #f0f0f0;">
								<td colspan="6" align="center">
									<b>Total Tagihan Kelas HAMZAH</b>
								</td>
								<td>
									Rp 17.400.000
								</td>
							</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->

	<div class="modal fade" id="addPoshutang" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah POS Hutang</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="https://demo.adminsekolah.net/manage/poshutang/add_glob" method="post"
					  accept-charset="utf-8">
					<div class="modal-body">
						<div id="p_scents_poshutang">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Kode Akun</label>
										<select required="" name="poshutang_account_id[]" class="form-control">
											<option value="">-Pilih Kode Akun-</option>
											<option value="47">2-20101 - Hutang SMP</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Nama POS Hutang</label>
										<input type="text" required="" name="poshutang_name[]" class="form-control"
											   placeholder="Contoh: Hutang Pegawai">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" required="" name="poshutang_description[]"
											   class="form-control" placeholder="Contoh: Hutang Pegawai">
									</div>
								</div>

							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
