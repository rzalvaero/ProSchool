<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="SISWA"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Ekstrakulikuler</h3>
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
                <form class="new-added-form" action="<?php echo base_url(). 'nilai/addekstra'; ?>" method="post">
                    <div class="row">
                       
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>Pilih Ekstrakulikuler</label>
                            <select class="select2" name="ekstra" >
                                <?php foreach ($list_ekstra as $a) : ?>
                                    <option value="<?= $a->idekstra ?>"><?= $a->e_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else {} ?>
    
   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Ekstrakulikuler</h3>
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
                                                        <label class="form-check-label">Tahun Ajaran</label>
                                                    </div>
                                                </th>
                                                <th>Ekstrakulikuler yang di Ikuti</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ekstrakurikuler as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['tahun_ajaran'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['e_nama'] ?></td>
                                                <td>
												<center>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal<?php echo $row['id_nilai_ekstrakulikuler'] ?>">
													Nilai
												</button>
												</center>
												<div class="modal fade" id="large-modal<?php echo $row['id_nilai_ekstrakulikuler'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Nilai Ekstrakulikuler</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="row">
																<div class="col-12-xxxl col-lg-4 col-12 form-group">
																		<label>Nilai</label>
																		<input type="text" value="<?php echo $row['nilai'] ?>" class="form-control" disabled>
																	</div>
																	<div class="col-12-xxxl col-lg-8 col-12 form-group">
																		<label>Keterangan</label>
																		<input type="text" value="<?php echo $row['deskripsi'] ?>" class="form-control" disabled>
																	</div>
																
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
															</div>
															</form>
														</div>
													</div>
												</div>
												</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>