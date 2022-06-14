<div class="row">
    <!-- Add Notice Area Start Here -->
    
   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Walikelas</h3>
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
                                                        <label class="form-check-label">Nama Kelas</label>
                                                    </div>
                                                </th>
                                                <th>Walikelas</th>
                                                <th>Keterangan / Jurusan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kelas as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['k_romawi'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></td>
                                                <td><?php echo $row['k_keterangan'] ?></td>
                                                <td>
													<center>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal<?php echo $row['idkelas'] ?>">
																Setting Walikelas
															</button>
													</center>
													<div class="modal fade" id="large-modal<?php echo $row['idkelas'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Setting Walikelas</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form class="new-added-form" action="<?php echo base_url() . 'walikelas/update'; ?>" method="POST">
															<div class="modal-body">
																<div class="row">
																	<div class="col-12-xxxl col-lg-12 col-12 form-group">
																		<input name="id" type="hidden" value="<?php echo $row['idkelas'] ?>">
																		<select class="select2" name="walikelas" required>
																			<option value="">Pilih walikelas *</option>
																			<?php foreach ($dropdown as $a) : ?>
																				<option value="<?= $a->id ?>"><?= $a->first_name ?> <?= $a->last_name ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
																<button type="submit" class="footer-btn bg-linkedin">Tambah</button>
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