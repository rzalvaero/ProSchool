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
                                <select class="select2" name="kategori">
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
                                <th>Penghuni Kamar</th>
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
                                    <td>
                                        <?php echo $row['kapasitas_kamar'] ?> Kapasitas
                                    </td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal<?php echo $row['id_kamar'] ?>">
                                                <?php
                                                $id = $row['id_kamar'];
                                                $dd = $this->db->query("SELECT * FROM sr_kamar_penghuni WHERE id_kamar = '$id'");
                                                if ($dd->num_rows() > 0) {
                                                    echo $dd->num_rows();
                                                } else {
                                                    echo '0';
                                                }
                                                ?> Penghuni
                                            </button>
                                        </center>


                                        <div class="modal fade" id="large-modal<?php echo $row['id_kamar'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Daftar Penghuni</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table display data-table text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input checkAll">
                                                                            <label class="form-check-label">Nama Kamar</label>
                                                                        </div>
                                                                    </th>
                                                                    <th>Nama Penghuni</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $idnya = $row['id_kamar'];
                                                                $pilihan  = $this->db->query("SELECT SK.nama_kamar, SS.s_nama FROM sr_kamar_penghuni SKP
                                                            LEFT JOIN sr_kamar SK on SK.id_kamar = SKP.id_kamar
                                                            LEFT JOIN sr_siswa SS on SS.idsiswa = SKP.id_siswa
                                                            WHERE SKP.id_kamar = '$idnya'")->result_array();
                                                                foreach ($pilihan as $row1) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input">
                                                                                <label class="form-check-label"><?php echo $row1['nama_kamar'] ?></label>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $row1['s_nama'] ?></td>
                                                                        <td></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        <a href="<?php echo base_url(); ?>asrama/penghuni_setting/<?php echo $row['id_kamar'] ?>" class="footer-btn bg-linkedin">Tambah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- <a class="dropdown-item" href="<?php echo base_url('/asrama/bukudetail/' . $row['id_kamar']); ?>"><i
                                                                    class="fas fa-eye text-dark-pastel-blue"></i>Detail</a> -->
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>asrama/penghuni_setting/<?php echo $row['id_kamar'] ?>"><i class="fas fa-cogs text-dark-pastel-green"></i>Check Penghuni</a>
                                                <a class="dropdown-item" href="<?php echo base_url('/asrama/deletes/' . $row['id_kamar']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus Kamar</a>

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