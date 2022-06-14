<!-- Breadcubs Area End Here -->
<!-- Teacher Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Nilai Sikap Sosial</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

            </div>
        </div>
        <div class="table-responsive">
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
            <table id="dtable" class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th width="15px">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">Nama Siswa</label>
                            </div>
                        </th>
                        <th>Deskripsi / Kesimpulan Sosial</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
					foreach ($sikap as $row) { ?>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label"># <?php echo $row['s_nama'] ?></label>
                                </div>
                            </td>
                            <?php if ($row['deskripsi'] == "") { ?>
                                <td>Nilai Masih Kosong</td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#large-input<?php echo $row['idsiswa'] ?>">
                                            Input Nilai
                                        </button>
                                    </center>
                                </td>

                                <div class="modal fade" id="large-input<?php echo $row['idsiswa'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Input nilai Sosial - <?php echo $row['s_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="new-added-form" action="<?php echo base_url() . 'nilai/adding_sikap_so'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;"> 
                                                    <input type="hidden" name="idsiswa" value="<?php echo $row['idsiswa'] ?>" class="form-control" required>
													<div class="row">
                                                        <div class="col-12 form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="deskripsi" id="form-message" cols="10" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        <input type="submit" name="submit" value="Tambah" id="submit" class="footer-btn bg-linkedin"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <td><?php echo character_limiter($row['deskripsi'], 50); ?></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-ubah<?php echo $row['id'] ?>">
                                            Ubah Nilai
                                        </button>
                                    </center>
                                </td>
								
								<div class="modal fade" id="large-ubah<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Input nilai Spritual - <?php echo $row['s_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="new-added-form" action="<?php echo base_url() . 'nilai/edit_sikap_so'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;"> 
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control" required>
													<div class="row">
                                                        <div class="col-12 form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="deskripsi" id="form-message" cols="10" rows="4"><?php echo $row['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        <input type="submit" name="submit" value="Edit" id="submit" class="footer-btn bg-linkedin"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<br>
<br>
<br>