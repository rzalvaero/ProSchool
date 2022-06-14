<!-- Sidebar Area End Here -->
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Tambah RPP</h3>
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
            <form class="new-added-form" action="<?php echo base_url() . 'rpp/adding'; ?>" method="post">
                <div class="row">
                    <div class="col-12-xxxl col-lg-4 col-12 form-group">
                        <label>Unit</label>
                        <div class="form-group">
                            <?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
                                <select class="select2" name="unit" id="unit">
                                    <option value="0">Default select</option>
                                    <?php foreach ($unit as $a) : ?>
                                        <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } else {
                                $unit = $this->session->userdata('unit');
                                $row = "select * from web_unit WHERE id ='$unit'";
                                $row_siswa                                    = $this->db->query($row)->row();
                                $data['id']                                 = $row_siswa->id;
                                $data['nama']                                 = $row_siswa->nama;
                            ?>
                                <select class="select2" name="unit" id="unit">
                                    <option>Select unit</option>
                                    <option value="<?php echo $unit ?>" selected><?php echo $data['nama'] ?></option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-12-xxxl col-lg-4 col-12 form-group" name="mapel" id="mapel">
                        <label>Mata Pelajaran</label>
                        <select class="mapel select2" name="mapel">
                            <option>Pilih Mata Pelajaran</option>
                        </select>
                    </div>

                    <div class="col-12-xxxl col-lg-4 col-12 form-group" name="kelas">
                        <label>Kelas</label>
                        <select class="select2" name="kelas">
                            <option>Pilih Kelas</option>
                            <?php foreach ($kelas as $a) : ?>
                                <option value="<?= $a->idkelas ?>"><?= $a->k_romawi . ' - ' . $a->k_keterangan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Tahun Ajaran</label>
                        <select class="select2" name="tahun">
                            <option>Pilih Tahun</option>
                            <?php foreach ($tahun as $a) : ?>
                                        <option value="<?php echo $a->tp_tahun  ?>"><?php echo $a->tp_tahun ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Alokasi Waktu</label>
                        <select class="select2" name="alokasi">
                            <option selected>Default select</option>
                            <option value="3 Pertemuan / 3 x 40">3 Pertemuan / 3 x 40</option>
                            <option value="4 Pertemuan / 3 x 40">4 Pertemuan / 3 x 40</option>
                            <option value="4 Pertemuan / 4 x 40">4 Pertemuan / 4 x 40</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Ketegori</label>
                        <select class="select2" name="kategori">
                            <option selected>Default select</option>
                            <option value="Pengetahuan">Pengetahuan</option>
                            <option value="Keterampilan">Keterampilan</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-lg-6 col-12 form-group">
                        <label>Nama RPP *</label>
                        <input type="text" placeholder="Nama RPP" name="nama" class="form-control" required>
                    </div>

                    <div class="col-6 form-group">
                        <label>Tujuan Pembelajaran</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="tujuan" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Materi Pembelajaran</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="materi" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Metode Pembelajaran </label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="metode" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Media Pembelajaran </label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="media" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Sumber Belajar</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="sumber" id="form-message" cols="10" rows="4"></textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Penilaian</label>
                        <textarea id="ckedtor" class="ckeditor textarea form-control" name="penilaian" id="form-message" cols="10" rows="4"></textarea>
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        <button style="float:right;"  href="<?php echo base_url(); ?>rpp" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</button>
                    </div>
                </div>
            </form>
			
        </div>
    </div>
    <!-- Add New Teacher Area End Here -->
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#unit').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>bukukerja/get_matapelajaran",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].mp_nama + '">' + data[i].mp_nama + '</option>';
                    }
                    $('.mapel').html(html);

                }
            });
        });
    });
</script>