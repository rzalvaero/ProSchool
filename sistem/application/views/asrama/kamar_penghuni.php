<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "GURU" || $this->session->userdata('type_users') == "ADMIN") { ?>
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Tambah Kamar Asrama</h3>
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
                    <form class="new-added-form" action="<?php echo base_url() . 'asrama/add_kamar'; ?>" method="POST">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>Nama Kamar</label>
                                <input name="nama" type="text" placeholder="Tulis Nama Kompetensi" class="form-control">
                            </div>

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Unit *</label>
                                <select class="select2" name="unit" required>
                                    <option value="">Please Select Unit *</option>
                                    <?php foreach ($unit as $a) : ?>
                                        <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Kategori</label>
                                <select class="select2" name="kategori" multiple="multiple" required>
                                    <option value="">Please Select Kategori *</option>
                                    <?php foreach ($kategori as $a) : ?>
                                        <option value="<?= $a->id_kategori ?>"><?= $a->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Kapasitas Kamar</label>
                                <input name="kapasitas" type="number" placeholder="Tulis Jumlah Kapasitas" class="form-control">
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
                        <h3>Daftar Kamar</h3>
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
                                <th>Nama Kamar</th>
                                <th>Kategori Kamar</th>
                                <th>Kapasitas Kamar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label"><?php echo $row['nama_unit'] ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['nama_kamar'] ?></td>
                                    <td><?php echo $row['nama_kategori'] ?></td>
                                    <td><?php echo $row['kapasitas_kamar'] ?> Orang</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="modal-trigger" data-toggle="modal" data-target="#right-slide-modal">
                                                Slide From Right
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- <a class="dropdown-item" href="<?php echo base_url('/asrama/bukudetail/' . $row['id_kamar']); ?>"><i
                                                                    class="fas fa-eye text-dark-pastel-blue"></i>Detail</a> 
                                                            <a class="dropdown-item" href="<?php echo base_url('/asrama/edit/' . $row['id_kamar']); ?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
                                                <a class="dropdown-item" href="<?php echo base_url('/asrama/deletes/' . $row['id_kamar']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="modal right-slide-modal fade" id="right-slide-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Woohoo, you're reading this text in a modal!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
                                    <button type="button" class="footer-btn bg-linkedin">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All Notice Area Start Here -->

    <!-- All Notice Area End Here -->
</div>