<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "GURU" || $this->session->userdata('type_users') == "ADMIN") { ?>
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Tambah Penghuni Kamar</h3>
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
                    <form class="new-added-form" action="<?php echo base_url() . 'asrama/add_penghuni'; ?>" method="POST">
                        <div class="row">
                            <input name="kamar" value="<?php echo $idkamar ?>" type="hidden">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Unit</label>
                                <div class="form-group">
									<select class="select2" name="unit" id="unit">
                                            <option value="0">Default select</option>
                                            <?php foreach ($unit as $a) : ?>
                                                <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12-xxxl col-lg-6 col-12 form-group" name="siswa" id="siswa">
                                <label>Nama Penghuni</label>
                                <select class="siswa select2" name="siswa[]" multiple="multiple" required>
                                    <option>Pilih Nama Penghuni</option>
                                </select>
                            </div>

                            <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <a style="float:right;margin: 0px 20px 0px 0px;" href="<?php echo base_url(); ?>asrama" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
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
                        <h3>Daftar Penghuni Kamar</h3>
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
                                        <label class="form-check-label">Nama Kamar</label>
                                    </div>
                                </th>
                                <th>Nama Penghuni</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label"><?php echo $row['nama_kamar'] ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['s_nama'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo base_url('/asrama/deletes_penghuni/' . $row['id_penghuni']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#unit').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>asrama/get_siswa",
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
                        html += '<option value="' + data[i].idsiswa + '">' + data[i].s_nama + '</option>';
                    }
                    $('.siswa').html(html);

                }
            });
        });
    });
</script>