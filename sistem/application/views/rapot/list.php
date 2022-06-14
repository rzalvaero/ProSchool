<div class="row">
    <!-- Add Notice Area Start Here -->
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Cetak Raport</h3>
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
                                                <th width="40%">Nama</th>
												<th width="50%">Cetak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 

											$no = 1;
											if (!empty($siswa_kelas)) {
												foreach ($siswa_kelas as $sk) {  
											?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $sk['s_nama']; ?></td>
													<td>
														<a href="<?php echo base_url('/cetakrapot/sampul1/'.$sk['idsiswa']);?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 1</a>
														<a href="<?php echo base_url('/cetakrapot/sampul2/'.$sk['idsiswa']);?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 2</a>
														<a href="<?php echo base_url('/cetakrapot/sampul4/'.$sk['idsiswa']);?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 4</a>
														<a href="<?php echo base_url('/cetakrapot/cetak/'.$sk['idsiswa']);?>" class="btn btn-success btn-sm" target="_blank" ></i> Raport</a>
														<a href="<?php echo base_url('/cetakrapot/prestasi_catatan/'.$sk['idsiswa']);?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> Prestasi&Catatan</a>
													</td>
												</tr>
											<?php 
													$no++;
												}
											} else {
												echo '<tr><td colspan="3">Belum ada data siswa</td></tr>';
											}
											?>
										</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>