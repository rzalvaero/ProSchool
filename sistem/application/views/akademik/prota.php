<!-- ... -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "GURU" || $this->session->userdata('type_users') == "ADMIN") { ?>
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Tambah Prota</h3>
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
                    <form class="new-added-form" action="<?php echo base_url() . 'prota/add'; ?>" method="post">
                        <div class="row">
                            <?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
                                <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                    <label>Unit</label>
                                    <select class="select2" name="unit">
                                        <option selected>Default select</option>
                                        <?php foreach ($unit as $a) : ?>
                                            <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                    <label></label>
                                    <input name="unit" type="hidden" placeholder="Nama Unit" value="<?php echo $this->session->userdata('unit') ?>" class="form-control" >
                                </div>
                            <?php } ?>

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Semester</label>
                                <select class="select2" name="semester">
                                    <option selected>Default select</option>
                                    <?php foreach ($tahunajaran as $a) : ?>
                                        <option value="<?= $a->tp_tahun ?>"><?= $a->tp_tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>



                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Alokasi Waktu</label>
                                <select class="select2" name="alokasi">
                                    <option selected>Default select</option>
                                    <option value="3 Pertemuan / 3 x 40">3 Pertemuan / 3 x 40</option>
                                    <option value="4 Pertemuan / 3 x 40">4 Pertemuan / 3 x 40</option>
                                    <option value="4 Pertemuan / 4 x 40">4 Pertemuan / 4 x 40</option>
                                </select>
                            </div>

                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Pengetahuan</label>
                                <input name="pengetahuan" type="text" placeholder="Pengetahuan" value="<?php echo $this->session->userdata('unit') ?>" class="form-control" >
                            </div>

                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Keterampilan</label>
                                <input name="keterampilan" type="text" placeholder="Keterampilan" value="<?php echo $this->session->userdata('unit') ?>" class="form-control" >
                            </div>

                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" type="text" placeholder="Tulis keterangan" class="form-control" ></textarea>
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
                        <h3>Daftar Prota</h3>
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
                                        <label class="form-check-label">Semester</label>
                                    </div>
                                </th>
                                <th>Pengetahuan</th>
                                <th>Keterampilan</th>
                                <th>Alokasi Waktu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prota as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label"><?php echo $row['semester'] ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['pengetahuan'] ?></td>
                                    <td><?php echo $row['keterampilan'] ?></td>
                                    <td><?php echo $row['waktu'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!--<a class="dropdown-item" href="<?php echo base_url('/prota/edit/' . $row['id']); ?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
                                                <a class="dropdown-item" href="<?php echo base_url('/prota/deletes/' . $row['id']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>

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
<script>
    $('#timepicker').timepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap4'
    });
</script>