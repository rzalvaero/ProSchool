<!-- jQuery -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/https/dataTables.buttons.min.js"></script>
<!-- DataTables Button -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/https/buttons.dataTables.min.css">

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Radar Nilai Rapor</h3>
            </div>
            <!-- <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>profile/setting"><i class="far fa-edit"></i>Edit</a>
                    <a onclick="window.print();" class="dropdown-item noPrint" href="#"><i class="fas fa-print"></i>Cetak</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-download"></i>Unduh</a>
                </div>
            </div>-->
        </div>
        <div class="row gutters-8">
            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                <!-- <input type="text" placeholder="Search by Class..." class="form-control"> -->
                <tbody>
                    <tr>
                        <td>
                            <div class="error-message1"></div>
                            <?= form_dropdown('', $list_kelas, '', $list_kelas_attribute) ?>
                        </td>
                    </tr>
                </tbody>
            </div>
        </div>
    </div>
</div>

<div class="">
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs" id="divAkhir" style="display:none;">
                    <div class="card-header p-0 pt-1">
                        <!-- <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-rincian-tab" data-toggle="pill" href="#custom-tabs-one-rincian" role="tab" aria-controls="custom-tabs-one-rincian" aria-selected="true" style="margin: 5px 0px -5px 5px;">Rincian Nilai Rapor</a>
                  </li>
                  <!-- ./row li class="nav-item ml-auto">
                   <a class="btn btn-primary" onClick="return show_all_chart();">Grafik Seluruh Siswa</a>
                  </li>
                </ul>-->
                    </div>
                    <!-- <div class="card-body">
                <!-- <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-rincian" role="tabpanel" aria-labelledby="custom-tabs-one-rincian-tab">-->
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table id="tRincian" class="table display data-table text-nowrap">
                                        <div class="float-right">
                                            <input type="hidden" id="_idmapel" value="" />
                                            <input type="hidden" id="_idsiswa" value="" />
                                            <input type="hidden" id="_s_nama" value="" />
                                            <input type="hidden" id="_idkelas" value="" />
                                            <small><i>* Simbol (..) berarti kriteria nilai kolom tersebut seperti kkm atau interval predikat masih kosong dan belum diinput oleh administrator</i></small><br />
                                            <small><i>* Apabila baris kosong atau tidak ada data apapun berarti penilaian belum dilakukan oleh guru yang bersangkutan</i></small>
                                        </div>
                                        <thead style="background-color:#042954;">
                                            <tr>
                                                <th style="color: #fff;" rowspan="2" width="3%" style="vertical-align:middle;">
                                                    <center>No</center>
                                                </th>
                                                <th style="color: #fff;" rowspan="2" width="30%" style="vertical-align:middle;">
                                                    <center>Nama Siswa</center>
                                                </th>
                                                <th style="color: #fff;" rowspan="2" width="50%" style="vertical-align:middle;">
                                                    <center>Mata Pelajaran</center>
                                                </th>
                                                <th style="color: #fff;" rowspan="2" width="3%" style="vertical-align:middle;">
                                                    <center>KKM</center>
                                                </th>
                                                <th style="color: #fff;" colspan="3">
                                                    <center>Pengetahuan</center>
                                                </th>
                                                <th style="color: #fff;" colspan="3">
                                                    <center>Keterampilan</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="color: #fff;">Angka</th>
                                                <th style="color: #fff;">Predikat</th>
                                                <th style="color: #fff;">Keterangan</th>
                                                <th style="color: #fff;">Angka</th>
                                                <th style="color: #fff;">Predikat</th>
                                                <th style="color: #fff;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL -->
<div class="modal fade" id="modal_show_chart" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#293D55; color:white;">
                <h6 class="modal-title">Grafik Nilai Siswa Tahun Pelajaran <?= $tahun ?> (Semester <?= $semester ?>)</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
                <!--<button onclick="return printCanvas('pengetahuanChart','keterampilanChart','ptspasChart');" type="button" class="btn-info ml-auto"><i class="fa fa-edit"></i> Print</button>-->
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- MODAL -->
<div class="modal fade" id="modal_show_all_chart" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#293D55; color:white;">
                <h6 class="modal-title">Grafik Nilai Seluruh Siswa Tahun Pelajaran <?= $tahun ?> (Semester <?= $semester ?>)</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
                <!--<button onclick="return printCanvas('allChart');" type="button" class="btn-info ml-auto"><i class="fa fa-edit"></i> Print</button>-->
            </div>
            </form>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#sidemenu-button').click();
    });

    function printCanvas(canvas) {
        var dataUrl = document.getElementById(canvas).toDataURL(); //attempt to save base64 string to server using this var  
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'
        windowContent += '<head><title>Print Grafik Nilai Rata-Rata Seluruh Siswa</title></head>';
        windowContent += '<body>'
        windowContent += '<img src="' + dataUrl + '">';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('', '', 'width=1024,height=500');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        //printWin.close();
    }

    function show_chart(idmapel, idsiswa, snama, idkelas) {
        $('#_idmapel').val(idmapel);
        $('#_idsiswa').val(idsiswa);
        $('#_s_nama').val(snama);
        $('#_idkelas').val(idkelas);
        var idmapel = $('#_idmapel').val();
        var idsiswa = $('#_idsiswa').val();
        var snama = $('#_s_nama').val();
        var idkelas = $('#_idkelas').val();
        var token = 'access';
        $.ajax({
            url: "<?php echo base_url(); ?>nilai_akhir/nilai_siswa_chart",
            type: "post",
            data: {
                token: token,
                idmapel: idmapel,
                idsiswa: idsiswa,
                snama: snama,
                idkelas: idkelas
            },
            success: function(data) {

                $("#modal_show_chart").find(".modal-body").html(data);
            }
        });
        $('#modal_show_chart').modal('show');
    }

    function show_all_chart(idkelas) {
        $('#_idkelas').val(idkelas);
        var idkelas = $('#idkelas').val();
        var token = 'access';
        $.ajax({
            url: "<?php echo base_url(); ?>nilai_akhir/nilai_seluruh_siswa_chart",
            type: "post",
            data: {
                token: token,
                idkelas: idkelas
            },
            success: function(data) {
                $("#modal_show_all_chart").find(".modal-body").html(data);
            }
        });
        $("#modal_show_all_chart").modal("show");
    }
    $("#modal_show_chart").on("show.bs.modal", function() {
        alert('The modal will be displayed now!');
        var idmapel = $('#_idmapel').val();
        var idsiswa = $('#_idsiswa').val();
        var snama = $('#_s_nama').val();
        var idkelas = $('#_idkelas').val();
        var token = 'access';

        $.ajax({
            url: "<?php echo base_url(); ?>nilai_akhir/nilai_siswa_chart",
            type: "post",
            data: {
                token: token,
                idmapel: idmapel,
                idsiswa: idsiswa,
                snama: snama,
                idkelas: idkelas
            },
            success: function(data) {

                $("#modal_show_chart").find(".modal-body").html(data);
            }
        });
    });

    $('#modal_show_all_chart').on('show.bs.modal', function() {
        $('#modal_show_all_chart').find(".modal-body").html("<center>Mohon ditunggu, data sedang diproses ..</center>");
        var idkelas = $('#idkelas').val();
        var token = 'access';
        $.ajax({
            url: "<?php echo base_url(); ?>nilai_akhir/nilai_seluruh_siswa_chart",
            type: "post",
            data: {
                token: token,
                idkelas: idkelas
            },
            success: function(data) {
                $("#modal_show_all_chart").find(".modal-body").html(data);
            }
        });
    });

    function print_rapor(id) {
        var win = window.open(base_url + 'rapor/print/' + id, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    }

    function formValidation() {
        var idkelas = $('#idkelas').val();
        if ($.trim(idkelas) == '') {
            $('#divAkhir').fadeOut();
            showToast('Silahkan pilih kelas !', 1000, 'error');
            $(".error-message1").append('<div class="font-italic text-danger" id="error-message1"><small>* silahkan isi sesuai format yang diminta</small></div>');
            $('#jumlah_ph').val('');
        } else {
            return true;
        }
    }

    function removeErrorMessages() {
        $("#error-message1").remove();
    }

    $(document).ready(function() {
        $("#idkelas").on("change", function() {
            removeErrorMessages();
            if (formValidation()) {
                var idkelas = $('#idkelas').val();
                $('#divAkhir').fadeIn();
                fDatatables("tRincian", "<?php echo base_url(); ?>nilai_akhir/ajax_list/" + idkelas, "ASC");
                $('#_idkelas').val(idkelas);
                return false;
            };
        });
    })

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
            bLengthChange: false,
            bFilter: false,
			bSearching: false,
			bInfo: true,
            bAutoWidth: false,
            bSort: true,
			//new
			bJQueryUI: true,
			"aoColumnDefs": [
				{ "bSortable": false, "aTargets": [ 0, 1, 2] }, 
				{ "bSearchable": false, "aTargets": [ 0, 1, 2] }
			],
			/* "aoColumns": [
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"}, 
				{"sType": "html"},
				{"sType": "html"},
				{"sType": "html"}
			 ], */
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

    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })

    $(window).on('load', function() {
        $(".loading").fadeOut("slow");
    });
</script>