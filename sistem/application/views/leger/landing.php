	<!-- Breadcubs Area Start Here -->
                
                <!-- Breadcubs Area End Here -->
                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Leger Pengetahuan</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                            </div>
                        </div>
						<form class="new-added-form" action="<?php echo base_url() ?>cetakrapot/leger" method="post">
                        <div class="row">
							<div class="col-10 form-group">
                                    <label>Cetak Nilai Leger Pengetahuan</label>
									<select name="kelas" class="form-control select2" required="">
										<option value="">Pilih Kelas...</option>
										<?php foreach($kelas as $lk){ ?>
										<option value="<?= $lk->idkelas;?>"><?= $lk->k_romawi;?> / <?= $lk->k_keterangan;?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-2 form-group">
                                    <label>Ukuran Kertas</label>
									<select name="ukuran" class="form-control select2" required="">
										<option value="">Pilih Kertas</option>
										<option value="A4">A4</option>
										<option value="letter">F4</option>
										
									</select>
								</div>
                                <div class="col-12 form-group mg-t-8">
                                    <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cetak</button>
                                </div>
                        </div>
						</form>
						
                    </div>

                </div>
				
				<div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Leger Esktrakulikuler</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                            </div>
                        </div>
						<form class="new-added-form" action="<?php echo base_url() ?>cetakrapot/ekstra" method="post">
						<div class="row">
							<div class="col-10 form-group">
                                    <label>Cetak Nilai Leger Esktrakulikuler</label>
									<select name="kelas" class="form-control select2" required="">
										<option value="">Pilih Kelas...</option>
										<?php foreach($kelas as $lk){ ?>
										<option value="<?= $lk->idkelas;?>"><?= $lk->k_romawi;?> / <?= $lk->k_keterangan;?></option>
										<?php } ?>
									</select>
								</div>
							<div class="col-2 form-group">
                                    <label>Ukuran Kertas</label>
									<select name="ukuran" class="form-control select2" required="">
										<option value="">Pilih Kertas</option>
										<option value="A4">A4</option>
										<option value="letter">F4</option>
										
									</select>
								</div>
                                <div class="col-12 form-group mg-t-8">
                                    <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Cetak</button>
                                </div>
                        </div>
						</form>
						
                    </div>

                </div>
			