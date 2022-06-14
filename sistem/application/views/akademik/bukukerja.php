<style>
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>
<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "GURU" || $this->session->userdata('type_users') == "ADMIN") { ?>
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Buku Kerja Guru</h3>
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
                    <form class="new-added-form" action="<?php echo base_url() . 'bukukerja/add'; ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Unit</label>
                                <div class="form-group">
                                    <?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
                                        <select class="select2" name="unit" id="unit">
                                            <option value="0">Default select</option>
                                            <?php foreach ($dropdown as $a) : ?>
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

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Nomer Buku kerja</label>
                                <select class="select2" name="no">
                                    <option value="0">Default select</option>
                                    <option value="Buku kerja nomer 1">Buku kerja nomer 1</option>
                                    <option value="Buku kerja nomer 2">Buku kerja nomer 2</option>
                                    <option value="Buku kerja nomer 3">Buku kerja nomer 3</option>
                                    <option value="Buku kerja nomer 4">Buku kerja nomer 4</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <label>Uploads</label>
                                <div class="upload-btn-wrapper">
                                    <button class="btn">Upload a file</button>
                                    <input type="file" name="file_name" required/>
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

    <!-- All Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
        <?php echo $this->session->flashdata("msg"); ?>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Daftar Kelas</h3>
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
                                        <label class="form-check-label">Unit</label>
                                    </div>
                                </th>
                                <th>Matapelajaran</th>
                                <th>Nomer buku kerja</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bukukerja as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">
                                            <?php echo $row['unitnya'] ?>
                                            </label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['matapelajaran'] ?></td>
                                    <td><?php echo $row['nomer'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!--<a class="dropdown-item" href="<?php echo base_url('/bukukerja/edit/' . $row['bukukerja_id']); ?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
                                                <a class="dropdown-item" target="_blank" href="<?php echo base_url('/assets/doc/bukukerja/' . $row['files']); ?>"><i class="fas fa-print text-dark-pastel-green"></i>Download</a>
                                                <a class="dropdown-item" href="<?php echo base_url('/bukukerja/deletes/' . $row['bukukerja_id']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>

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
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
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