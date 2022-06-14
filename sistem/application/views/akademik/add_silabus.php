<!-- Sidebar Area End Here -->
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Tambah Silabus</h3>
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
            <?php echo $this->session->flashdata("msg"); ?>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script> 
            <!-- <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script> -->
            <form class="new-added-form" action="<?php echo base_url() . 'silabus/adding'; ?>" method="post">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Kompetensi Dasar *</label>
                        <input type="text" placeholder="Kompetensi Dasar" name="kompetensi" class="form-control" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Unit *</label>
                        <select class="select2" name="unit" required>
                            <option value="">Please Select Unit *</option>
                            <?php foreach ($dropdown as $a) : ?>
                                <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Alokasi Waktu</label>
                        <select class="select2" name="alokasi">
                            <option selected>Default select</option>
                            <option value="3 Pertemuan / 3 x 40">3 Pertemuan / 3 x 40</option>
                            <option value="4 Pertemuan / 3 x 40">4 Pertemuan / 3 x 40</option>
                            <option value="4 Pertemuan / 4 x 40">4 Pertemuan / 4 x 40</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Teknik *</label>
                        <input type="text" placeholder="Teknik" name="tk_kd" class="form-control" required>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Bentuk instrument *</label>
                        <input type="text" placeholder="Bentuk instrument" name="bi_kd" class="form-control" required>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Instrument *</label>
                        <input type="text" placeholder="Instrument" name="in_kd" class="form-control" required>
                    </div>

                    <div class="col-6 form-group">
                        <label>Sumber Belajar</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="sumber" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Indikator</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="indikator" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Materi Pokok/
                            Materi
                            Pembelajaran</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="materi" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Keg.
                            Pembelajaran</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="kegiatan" id="form-message" cols="10" rows="4"></textarea>
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        <button style="float:right;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Add New Teacher Area End Here -->
</div>