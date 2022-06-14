<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="row">
    <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Input Nilai Pengetahuan</h3>
                    </div>

                </div>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
                <form class="new-added-form" action="<?php echo base_url() . 'kompetensi_inti/add'; ?>" method="POST">
                    <div class="row">
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kelas</label>
                            <div class="error-message1"></div>
                            <input type="hidden" name="_jumlah_nilai" id="_jumlah_nilai" value="">
                            <input type="hidden" name="_jumlah_data" id="_jumlah_data" value="">
                            <input type="hidden" name="_nilai_harian" id="_nilai_harian" value="">
                            <input type="hidden" name="_idnilai_harian" id="_idnilai_harian" value="">
                            <input type="hidden" name="_nilai_uts" id="_nilai_uts" value="">
                            <input type="hidden" name="_nilai_uas" id="_nilai_uas" value="">
                            <input type="hidden" name="_idnp_utsuas" id="_idnp_utsuas" value="">
                            <?= form_dropdown('', $list_kelas, '', $list_kelas_attribute) ?>
                        </div>
                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                            <label>Mata Pelajaran</label>
                            <?= form_dropdown('', $list_mapel, '', $list_mapel_attribute) ?>
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Pilih Penilaian</label>
                            <?= form_dropdown('', $list_kd, '', $list_kd_attribute) ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-4-xxxl col-12">
                <div class="card height-auto">
                    <!-- /.card -->
                    <div class="card-body" id="divPengetahuan" style="display:none;">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <div class="float-right"><small><i>* jika ada nama siswa anda yang tidak ada dalam daftar, silahkan klik tambah data atau reset data pada bagian bawah tabel</i></small></div>
                            <table id="tPengetahuan" class="table display data-table text-nowrap">
                                <thead style="background-color:#17a2b8; color:#fff;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nilai Harian <i class="float-right" style="font-size:12px;">(* jika penilaian sudah cukup dan masih ada kolom tersisa, silahkan input angka 1 untuk melewati penilaian)</i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="3"><a class="btn btn-info text-light float-right col-md-2" id="btn-save"> Simpan </a></th>
                                    </tr>
                                </tfoot>
                            </table><br />
                            <a href="#" onclick="return reset_harian();" class="btn btn-danger float-left text-light ml-auto col-2"><i class="fa fa-window-close"></i> Reset Data</a>
                            <a href="#" onclick="return tambah_siswa();" class="btn btn-primary float-right text-light ml-auto col-2"><i class="fa fa-plus"></i> Tambah Siswa</a>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.ukuran nya kecil-->
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card body" id="divUtsuas" style="display:none;">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <div class="float-right"><small><i>* jika ada nama siswa anda yang tidak ada dalam daftar, silahkan klik tambah data atau reset data pada bagian bawah tabel</i></small></div>
                                    <table id="tUtsuas" class="table table-bordered table-striped">
                                        <thead style="background-color:#17a2b8; color:#fff;">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Nilai UTS</th>
                                                <th>Nilai UAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="4"><a class="btn btn-info text-light float-right col-md-2" id="btn-save-utsuas"> Simpan </a></th>
                                            </tr>
                                        </tfoot>
                                    </table><br />
                                    <a href="#" onclick="return reset_utsuas();" class="btn btn-danger float-left text-light ml-auto col-2"><i class="fa fa-window-close"></i> Reset Data</a>
                                    <a href="#" onclick="return tambah_siswa();" class="btn btn-primary float-right text-light ml-auto col-2"><i class="fa fa-plus"></i> Tambah Siswa</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- MODAL -->
<div class="modal fade" id="modal_tambah_siswa" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#293D55; color:white;">
                <h6 class="modal-title">[Tambah Siswa]</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Data Siswa <span class="error-tab1"></span></a>
                                    </li>
                                </ul>
                            </div>
                            <form class="form-horizontal" method="post" name="f_siswa" id="f_siswa">
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                            <div class="card-body">
                                                <small class="float-right"><i>* gunakan fitur ini hanya jika ada siswa kelas anda namun namanya tidak tercantum dalam daftar penilaian</i></small>
                                                <div class="form-group">
                                                    <label for="old">Pilih Siswa</label>
                                                    <div class="error-message1"></div>
                                                    <?= form_dropdown('', $list_siswa, '', $list_siswa_attribute) ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="btn-tambah-siswa">Simpan</button>
            </div>
            </form>
        </div>
    </div>

    <!-- /.modal-content -->
    <script type="text/javascript">
        function tambah_siswa() {
            $('#modal_tambah_siswa').modal('show');
        }

        function formValidation() {
            var idkelas = $('#idkelas').val();
            var idmata_pelajaran = $('#idmata_pelajaran').val();
            var id_kompetensidasar = $('#id_kompetensidasar').val();

            if ($.trim(idkelas) == '') {
                showToast('Silahkan pilih kelas !', 1000, 'error');
                $(".error-message1").append('<div class="font-italic text-danger" id="error-message1"><small>* silahkan isi sesuai format yang diminta</small></div>');
                $('#jumlah_ph').val('');
            } else if ($.trim(idmata_pelajaran) == '') {
                showToast('Silahkan pilih mata pelajaran !', 1000, 'error');
                $(".error-message2").append('<div class="font-italic text-danger" id="error-message2"><small>* silahkan isi sesuai format yang diminta</small></div>');
                $('#jumlah_ph').val('');
            } else if ($.trim(id_kompetensidasar) == '') {
                showToast('Silahkan pilih penilaian KD !', 1000, 'error');
                $(".error-message3").append('<div class="font-italic text-danger" id="error-message3"><small>* silahkan isi sesuai format yang diminta</small></div>');
                $('#jumlah_ph').val('');
            } else {
                return true;
            }
        }

        function removeErrorMessages() {
            $("#error-message1").remove();
            $("#error-message2").remove();
            $("#error-message3").remove();
        }

        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $("#modal_tambah_siswa").on('hide.bs.modal', function() {
                $("#f_siswa")[0].reset();
                $("#list_siswa").trigger('change.select2');
            });

            $("#idkelas").on("change", function() {
                $('#idmata_pelajaran').val('');
                $('#id_kompetensidasar').val('');
                $('#divPengetahuan').fadeOut();
            });

            $("#idmata_pelajaran").on("change", function() {
                var idmata_pelajaran = $(this).val();
                var idkelas = $('#idkelas').val();

                $.ajax({
                    type: "POST",
                    data: {
                        idmata_pelajaran: idmata_pelajaran,
                        idkelas: idkelas
                    },
                    url: "<?php echo base_url(); ?>Nilai/check_kd",
                    success: function(data) {
                        $('#id_kompetensidasar').html(data);
                    }
                });
                return false;
            });

            $("#id_kompetensidasar").on("change", function() {
                removeErrorMessages();
                if (formValidation()) {
                    var idkelas = $('#idkelas').val();
                    var idmata_pelajaran = $('#idmata_pelajaran').val();
                    var id_kompetensidasar = $('#id_kompetensidasar').val();

                    if (id_kompetensidasar == 'utsuas') {
                        $('#divUtsuas').fadeIn();
                        $('#divPengetahuan').fadeOut();
                        fDatatables("tUtsuas", "<?php echo base_url(); ?>Nilai/ajax_list_uts_uas/" + idkelas + "/" + idmata_pelajaran, "ASC");
                        fDuplicate("tUtsuas", "nth-child(2)");
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url(); ?>Nilai/jumlah_nilai/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar,
                            success: function(result) {
                                //console.log(result.data);
                                $("#_jumlah_nilai").val(result.data._jumlah_nilai);
                                $("#_jumlah_data").val(result.data._jumlah_data);
                                // if (result.data.new_batch=='Y'){
                                //   showToast('Input data siswa baru untuk pertama kali telah terdeteksi, sehingga halaman harus direload',4000,'success');
                                //   <?php $this->session->unset_userdata('new_batch') ?>
                                //   setTimeout(function(){ location.reload(); }, 4000);
                                // }
                            }
                        });
                        return false;
                    } else if (id_kompetensidasar != 'utsuas' && id_kompetensidasar != '') {
                        $('#divPengetahuan').fadeIn();
                        $('#divUtsuas').fadeOut();
                        fDatatables("tPengetahuan", "<?php echo base_url(); ?>nilai/ajax_list/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar, "ASC");
                        fDuplicate("tPengetahuan", "nth-child(2)");
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url(); ?>nilai/jumlah_nilai/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar,
                            success: function(result) {
                                console.log(result);
                                $("#_jumlah_nilai").val(result.data._jumlah_nilai);
                                $("#_jumlah_data").val(result.data._jumlah_data);
                                // if (result.data.new_batch=='Y'){
                                //   showToast('Input data siswa baru untuk pertama kali telah terdeteksi, sehingga halaman harus direload',4000,'success');
                                //   <?php $this->session->unset_userdata('new_batch') ?>
                                //   setTimeout(function(){ location.reload(); }, 4000);
                                // }
                            }
                        });
                        return false;
                    }
                };
            });

            $("#f_siswa").on("submit", function(e) {
                e.preventDefault();
                var idmata_pelajaran = $('#idmata_pelajaran').val();
                var idkelas = $('#idkelas').val();
                var idsiswa = $('#list_siswa').val();
                console.log(idsiswa);
                var id_kompetensidasar = $('#id_kompetensidasar').val();
                if (idmata_pelajaran == '') {
                    showToast('Mata pelajaran belum dipilih!', 2000, 'warning');
                } else if (idkelas == '') {
                    showToast('Kelas belum dipilih!', 2000, 'warning');
                } else if (idsiswa == '') {
                    showToast('Siswa belum dipilih!', 2000, 'warning');
                } else if (id_kompetensidasar == '') {
                    showToast('Penilaian belum dipilih!', 2000, 'warning');
                } else {
                    $.ajax({
                        type: "POST",
                        data: {
                            idmata_pelajaran: idmata_pelajaran,
                            idkelas: idkelas,
                            idsiswa: idsiswa,
                            idkompetensi_dasar: id_kompetensidasar
                        },
                        url: "<?php echo base_url(); ?>Nilai/add_one_siswa",
                        success: function(r) {
                            if (r.status == 'ok') {
                                $('#f_siswa')[0].reset();
                                $('#modal_tambah_siswa').modal('hide');
                                showToast('Siswa berhasil ditambah!', 2000, 'success');
                                if (id_kompetensidasar == 'utsuas') {
                                    fDatatables("tUtsuas", "<?php echo base_url(); ?>nilai/ajax_list_uts_uas/" + idkelas + "/" + idmata_pelajaran, "ASC");
                                    fDuplicate("tUtsuas", "nth-child(2)");
                                } else {
                                    fDatatables("tPengetahuan", "<?php echo base_url(); ?>nilai/ajax_list/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar, "ASC");
                                    fDuplicate("tPengetahuan", "nth-child(2)");
                                }
                            } else if (r.status == 'ada') {
                                $('#f_siswa')[0].reset();
                                $('#modal_tambah_siswa').modal('hide');
                                showToast('Siswa sudah ada !', 2000, 'warning');
                            } else if (r.status == 'kelas') {
                                $('#f_siswa')[0].reset();
                                $('#modal_tambah_siswa').modal('hide');
                                showToast('Siswa bukan dari kelas yang anda ampu !', 2000, 'error');
                            }
                        }
                    });
                    return false;
                }
            });

            $(document).delegate("#nilai_harian", "change", function() {
                var nilai = $(this).val();
                if (nilai < 0) {
                    showToast('Nilai tidak boleh min (kurang dari 0)', 2000, 'warning');
                    $(this).val(0);
                } else if (nilai > 100) {
                    showToast('Nilai tidak boleh lebih dari 100', 2000, 'warning');
                    $(this).val(0);
                }
            });

            $(document).delegate("#nilai_uts,#nilai_uas", "change", function() {
                var nilai = $(this).val();
                if (nilai < 0) {
                    showToast('Nilai tidak boleh min (kurang dari 0)', 2000, 'warning');
                    $(this).val(0);
                } else if (nilai > 100) {
                    showToast('Nilai tidak boleh lebih dari 100', 2000, 'warning');
                    $(this).val(0);
                }
            });

            $("#btn-save").on("click", function() {
                //$(".loading").fadeIn("slow");
                var jumlah_nilai = $("#_jumlah_nilai").val();
                var jumlah_data = $("#_jumlah_data").val();
                var nilai_harian = $('input[name="nilai_harian[]"]').map(function() {
                    return $(this).val();
                }).get();
                var idnilai_harian = $('input[name="nilai_harian[]"]').map(function() {
                    return $(this).attr('data-id');
                }).get();

                var p = 0;
                var semua_nilai = '';
                var idnilai_pengetahuan = '';
                var total_data = jumlah_nilai * jumlah_data;

                for (i = 0; i < total_data; i++) {
                    p++;
                    var index = (total_data + p) - (total_data);
                    $("#_nilai_harian").val(nilai_harian[index - 1]);
                    var current_nilai = $("#_nilai_harian").val();
                    semua_nilai = semua_nilai + current_nilai + ',';
                    $("#_nilai_harian").val(semua_nilai);

                    $("#_idnilai_harian").val(idnilai_harian[index - 1]);
                    idnilai_pengetahuan = $("#_idnilai_harian").val();

                    if (((semua_nilai.split(',').length) - 1) == jumlah_nilai) {

                        $.ajax({
                            type: "POST",
                            data: {
                                semua_nilai: semua_nilai,
                                idnilai_pengetahuan: idnilai_pengetahuan
                            },
                            url: "<?php echo base_url(); ?>nilai/update_nilai",

                        });
                        $("#_nilai_harian").val('');
                        $("#_idnilai_harian").val('');
                        semua_nilai = '';
                        idnilai_pengetahuan = '';
                    }
                    if (p == total_data) {
                        $(".loading").fadeOut("slow");
                        showToast('Data berhasil disimpan !', 1000, 'success');
                    }
                }
            });

            $("#btn-save-utsuas").on("click", function() {
                //$(".loading").fadeIn("slow");

                var jumlah_nilai = $("#_jumlah_nilai").val();
                var jumlah_data = $("#_jumlah_data").val();
                var nilai_uts = $('input[name="nilai_uts[]"]').map(function() {
                    return $(this).val();
                }).get();
                var nilai_uas = $('input[name="nilai_uas[]"]').map(function() {
                    return $(this).val();
                }).get();
                var idnp_utsuas = $('input[name="nilai_uts[]"]').map(function() {
                    return $(this).attr('data-id');
                }).get();
                var p = 0;

                n_uts = '';
                n_uas = '';
                var total_data = jumlah_nilai * jumlah_data;

                for (i = 0; i < jumlah_data; i++) {
                    p++;
                    var index = (total_data + p) - (total_data);

                    $("#_nilai_uts").val(nilai_uts[index - 1]);
                    var n_uts = $("#_nilai_uts").val();

                    $("#_nilai_uas").val(nilai_uas[index - 1]);
                    var n_uas = $("#_nilai_uas").val();

                    $("#_idnp_utsuas").val(idnp_utsuas[index - 1]);
                    var idnp_utsuas_loop = $("#_idnp_utsuas").val();

                    $.ajax({
                        type: "POST",
                        data: {
                            n_uts: n_uts,
                            n_uas: n_uas,
                            idnp_utsuas_loop: idnp_utsuas_loop
                        },
                        url: "<?php echo base_url(); ?>nilai/update_nilai_utsuas",
                    });
                    if (p == jumlah_data) {
                        $(".loading").fadeOut("slow");
                        showToast('Data berhasil disimpan !', 1000, 'success');
                    }
                }
            });

        })

        function reset_harian() {
            var idkelas = $('#idkelas').val();
            var idmata_pelajaran = $('#idmata_pelajaran').val();
            var id_kompetensidasar = $('#id_kompetensidasar').val();
            if (confirm('Apakah anda yakin ingin mereset seluruh data..? ** PENTING ** Seluruh data penilaian akan direset menjadi 0')) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>nilai/reset_harian/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar,
                    success: function(r) {
                        if (r.status == 'ok') {
                            showToast('Data berhasil direset !', 1000, 'success');
                            fDatatables("tPengetahuan", "<?php echo base_url(); ?>nilai/ajax_list/" + idkelas + "/" + idmata_pelajaran + "/" + id_kompetensidasar, "ASC");
                            fDuplicate("tPengetahuan", "nth-child(2)");
                        } else {
                            showToast('Data gagal direset !', 1000, 'error');
                        }
                    }
                });
            }
            return false;
        }

        function reset_utsuas() {
            var idkelas = $('#idkelas').val();
            var idmata_pelajaran = $('#idmata_pelajaran').val();
            if (confirm('Apakah anda yakin ingin mereset seluruh data..? ** PENTING ** Seluruh data penilaian akan direset menjadi 0')) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>nilai/reset_utsuas/" + idkelas + "/" + idmata_pelajaran,
                    success: function(r) {
                        if (r.status == 'ok') {
                            showToast('Data berhasil direset !', 1000, 'success');
                            fDatatables("tUtsuas", "<?php echo base_url(); ?>nilai/ajax_list_uts_uas/')?>" + idkelas + "/" + idmata_pelajaran, "ASC");
                            fDuplicate("tUtsuas", "nth-child(2)");
                        } else {
                            showToast('Data gagal direset !', 1000, 'error');
                        }
                    }
                });
            }
            return false;
        }

        function fDatatables(tableid, target, order) {
            $('#' + tableid).DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'print',
                    <?php if ($this->uri->segment(2) == 'siswa') { ?> {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'LEGAL'
                        }
                    <?php } else {
                        echo "'pdf'";
                    } ?>
                ],
                processing: true,
                columnDefs: [],
                serverSide: true,
                bDestroy: true,
                bPaginate: true,
                bLengthChange: true,
                bFilter: true,
                bSort: true,
                bInfo: true,
                bAutoWidth: false,
                aaSorting: [
                    [<?php
                        if ($this->uri->segment(2) == 'kompetensi_dasar') {
                            echo "1";
                        } else {
                            echo "0";
                        } ?>, order]
                ],
                lengthMenu: [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "Semua"]
                ],
                ajax: {
                    url: target,
                    type: "POST",
                    error: function() { // error handling code
                        $('#' + tableid).css("display", "none");
                    }
                }
            });
        }

        function fDuplicate(tableid, target) {
            setTimeout(function() {
                var contents = {},
                    duplicates = false;
                $('#' + tableid + ' td:' + target).each(function() {
                    var tdContent = $(this).text();
                    if (contents[tdContent]) {
                        duplicates = true;
                        return false;
                    }
                    contents[tdContent] = true;
                });
                if (duplicates) {
                    location.reload();
                }
            }, 1500);
        }

        function showToast(message, timeout, type) {
            type = (typeof type === 'undefined') ? 'info' : type;
            toastr.options.timeOut = timeout;
            toastr[type](message);
        }
    </script>