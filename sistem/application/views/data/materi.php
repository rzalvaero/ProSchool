<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "GURU" || $this->session->userdata('type_users') == "ADMIN") { ?>
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Tambah Materi</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                    <form class="new-added-form" action="<?php echo base_url() . 'materi/adding'; ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Judul</label>
                                <input name="judul" type="text" placeholder="Tulis Judul" class="form-control">
                            </div>

                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Mata Pelajaran</label>
                                <select class="select2" name="mapel_id">
                                    <?php foreach ($selectmatapelajaran as $a) : ?>
                                        <option value="<?= $a->idmata_pelajaran ?>"><?= $a->mp_nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Kelas</label>
                                <select class="select2" name="kelas_id">
                                    <?php foreach ($selectkelas as $a) : ?>
                                        <option value="<?= $a->idkelas ?>"><?= $a->k_romawi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Unit</label>
                                <select class="select2" name="unit">
                                    <?php foreach ($selectunit as $a) : ?>
                                        <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="col-12-xxxl col-lg-12 col-12 form-group custom-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab4" role="tab" aria-selected="true">Materi video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Materi File</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab4" role="tabpanel">
                                        <div class="form-group">
                                            <br /><label class="form-label" for="exampleInputEmail1">URL Video</label>
                                            <input name="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter URL">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab5" role="tabpanel">
                                        <div class="form-group">
                                            <br /><label class="form-label" for="exampleInputEmail1">Masukan FILE</label>
                                            <input class="form-control" name="files" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else {
    } ?>


    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
        <?php echo $this->session->flashdata("msg"); ?>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Daftar Materi</h3>
                    </div>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input checkAll">
                                        <label class="form-check-label">UNIT</label>
                                    </div>
                                </th>
                                <th>Kelas</th>
                                <th>Keterangan / Mata Pelajaran</th>
                                <th>Type</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materi as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label"><?php echo $row['namaunit'] ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['k_romawi'] ?></td>
                                    <td><?php echo $row['judul'] ?> / <b><?php echo $row['mp_nama'] ?></b></td>
                                    <td>
                                        <?php if ($row['video'] == '') { ?>
                                            <center>
                                                <a type="button" class="btn btn-primary" target="_blank" href="<?php echo base_url('assets/doc/materi/' . $row['file']); ?>">
                                                    Unduh Materi
                                                </a>
                                            </center>
                                        <?php } else { ?>
                                            <center>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" style="width:78px;" data-target="#large-modal<?php echo $row['id'] ?>">
                                                    Lihat Video
                                                </button>
                                            </center>
                                            <div class="modal fade" id="large-modal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Lihat Video Pembelajaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
															<iframe width="755" height="315" src="https://www.youtube.com/embed/<?php echo $row['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
														</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $row['tgl_posting'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php if ($this->session->userdata('type_users') == "SISWA") {?>
													<?php if ($row['video'] == '') { ?>
                                                        <a class="dropdown-item" target="_blank" href="<?php echo base_url('assets/doc/materi/' . $row['file']); ?>"><i class="fas fa-file text-dark-pastel-blue"></i>Download</a>
                                                    <?php } else { ?>
                                                        <a class="dropdown-item" href="https://www.youtube.com/watch?v=<?php echo $row['video'] ?>" target="_blank"><i class="fas fa-eye text-dark-pastel-blue"></i>Watch</a>
													<?php }} else { ?>
														<a class="dropdown-item" href="<?php echo base_url('/materi/deletes/' . $row['id']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>
                                                    <?php if ($row['video'] == '') { ?>
                                                        <a class="dropdown-item" target="_blank" href="<?php echo base_url('assets/doc/materi/' . $row['file']); ?>"><i class="fas fa-file text-dark-pastel-blue"></i>Download</a>
                                                    <?php } else { ?>
                                                        <a class="dropdown-item" href="https://www.youtube.com/watch?v=<?php echo $row['video'] ?>" target="_blank"><i class="fas fa-eye text-dark-pastel-blue"></i>Watch</a>
                                                <?php }} ?>

                                                <!-- <a class="dropdown-item" href="<?php echo base_url('/materi/edit/' . $row['id']); ?>"><i class="fas fa-cogs text-warning"></i>Edit</a> -->
                                                
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