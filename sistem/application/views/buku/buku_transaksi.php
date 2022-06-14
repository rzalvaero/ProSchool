<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if ($this->session->userdata('type_users') == "ADMIN" || $this->session->userdata('type_users') == "GURU") { ?>
        <div class="col-6-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Tambah Pinjam</h3>
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
                    <form class="new-added-form" action="<?php echo base_url('buku/prosespinjam'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="tambah" value="tambah">

                        <div class="row">
                            <table class="table table-striped">
                                <tr style="background:#021933">
                                    <td colspan="3" style="color: white; text-align: center;">Data Transaksi</td>
                                </tr>
                                <tr>
                                    <td>No Peminjaman</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="nopinjam" value="<?= $nop; ?>" readonly class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tgl Peminjaman</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" value="<?= date('Y-m-d'); ?>" name="tgl" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Siswa</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="">
                                            <span class="input-group-btn">
                                                <a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary" style="color:white;margin: 0px 0px 4px 1px;"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>:</td>
                                    <td>
                                        <div id="result_tunggu">
                                            <p style="color:red">* Belum Ada Hasil</p>
                                        </div>
                                        <div id="result"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lama Peminjaman</td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama" class="form-control">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- TABEL BUKU -->

                        <div class="row">
                            <table class="table table-striped">
                                <tr style="background:#021933">
                                    <td colspan="3" style="color: white; text-align: center;">Pinjam Buku</td>
                                </tr>
                                <tr>
                                    <td>Kode Buku</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control" autocomplete="off" name="buku_id" id="buku-search" placeholder="Contoh ID Buku : BK001" type="text" value="">
                                            <span class="input-group-btn">
                                                <a data-toggle="modal" style="color:white;margin: 0px 0px 4px 1px;" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data Buku</td>
                                    <td>:</td>
                                    <td>
                                        <div id="result_tunggu_buku">
                                            <p style="color:red">* Belum Ada Hasil</p>
                                        </div>
                                        <div id="result_buku"></div>
                                    </td>
                                </tr>
                            </table>

                            <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="TableAnggota" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal_body" class="modal-body fileSelection1">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table display data-tables text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $isi) {
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['s_nisn']; ?></td>
                                                <td><?= $isi['s_nama']; ?></td>
                                                <td><?= $isi['s_telepon']; ?></td>
                                                <td style="width:10%;">
                                                    <button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['idsiswa']; ?>">
                                                        <i class="fa fa-check"> </i> Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="TableBuku" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal_body" class="modal-body fileSelection1">
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table display data-tables text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ISBN</th>
                                            <th>Title</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Buku</th>
                                            <th>Stok Buku</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($buku as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['isbn']; ?></td>
                                                <td><?= $isi['title']; ?></td>
                                                <td><?= $isi['penerbit']; ?></td>
                                                <td><?= $isi['thn_buku']; ?></td>
                                                <td><?= $isi['jml']; ?></td>
                                                <td><?= $isi['tgl_masuk']; ?></td>
                                                <td style="width:17%">
                                                    <button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id']; ?>">
                                                        <i class="fa fa-check"> </i> Pilih
                                                    </button>
                                                    <a href="<?= base_url('buku/bukudetail/' . $isi['id_buku']); ?>" target="_blank">
                                                        <button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
    } ?>

    <!-- Add Notice Area End Here -->
    <div class="col-6-xxxl col-12">
        <?php echo $this->session->flashdata("msg"); ?>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Daftar Peminjaman</h3>
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
                                        <label class="form-check-label">No Pinjam</label>
                                    </div>
                                </th>
                                <th>Nama</th>
                                <th>Pinjam</th>
                                <th>Balik</th>
                                <th>Status</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pinjam as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label"><?php echo $row['pinjam_id'] ?></label>
                                        </div>
                                    </td>
                                    <td><?php echo $row['s_nama'] ?></td>
                                    <td><?php echo $row['lama_pinjam'] ?></td>
                                    <td><?php echo $row['tgl_balik'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                    <?php
                                        if ($row['status'] == 'Di Kembalikan') {
                                            echo $this->core->rp($total_denda->denda);
                                        } else {
                                            $jml = $this->db->query("SELECT * FROM sr_perpuspinjam WHERE pinjam_id = '".$row['pinjam_id']."'")->num_rows();
                                            $date1 = date('Ymd');
                                            $date2 = preg_replace('/[^0-9]/', '', $row['tgl_balik']);
                                            $diff = $date1 - $date2;
                                            if ($diff > 0) {
                                                echo $diff . 'hari';
                                                $dd = $this->core->get_tableid_edit('sr_perpusbiaya', 'stat', 'Aktif');
                                                echo '<br><span style="color:red;font-size:12px;">
												' . $this->core->rp($jml * ($dd->harga_denda * $diff)) . ' 
												</span><br><small style="color:#333;margin:1px 0px 0px 0px;">* Untuk ' . $jml . ' Buku</small>';
                                            } else {
                                                echo '<p style="color:green;margin:1px 0px 0px 0px;">
												Tidak Ada Denda</p>';
                                            }
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo base_url('/buku/prosespinjam?kembali=' . $row['pinjam_id']); ?>"><i class="fas fa-cogs text-dark-pastel-green"></i>Kembali Pinjam</a>
                                                <a class="dropdown-item" href="<?php echo base_url('/buku/delete_pinjam/' . $row['pinjam_id']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>

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

<script src="<?php echo base_url();?>js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {
        $('.data-tables').DataTable({
            paging: true,
            searching: true,
            info: false,
            lengthChange: false,
            lengthMenu: [20, 50, 75, 100],
            columnDefs: [{
                targets: [0, -1], // column or columns numbers
                orderable: false // set orderable for selected columns
            }],
        });
    });
</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
    // Restricts input for each element in the set of matched elements to the given inputFilter.
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
    }(jQuery));
    // Install input filters.
    $("#uintTextBox").inputFilter(function(value) {
        return /^\d*$/.test(value);
    });
    // Install input filters.
    $("#uintTextBox2").inputFilter(function(value) {
        return /^\d*$/.test(value);
    });
    $("#uintTextBox3").inputFilter(function(value) {
        return /^\d*$/.test(value);
    });
</script>
<script>
    $(".fileSelection1 #Select_File2").click(function(e) {
        document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
        $('#TableBuku').modal('hide');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('buku/buku'); ?>",
            data: 'kode_buku=' + $(this).attr("data_id"),
            beforeSend: function() {
                $("#result_buku").html("");
                $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html) {
                $("#result_buku").load("<?= base_url('buku/buku_list'); ?>");
                $("#result_tunggu_buku").html('');
            }
        });
    });
</script>
<script>
    $(".fileSelection1 #Select_File1").click(function(e) {
        document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
        $('#TableAnggota').modal('hide');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('buku/result'); ?>",
            data: 'kode_anggota=' + $(this).attr("data_id"),
            beforeSend: function() {
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html) {
                $("#result").html(html);
                $("#result_tunggu").html('');
            }
        });
    });
</script>

<script>
    // AJAX call for autocomplete 
    $(document).ready(function() {
        $("#buku-search").keyup(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('buku/buku'); ?>",
                data: 'kode_buku=' + $(this).val(),
                beforeSend: function() {
                    $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html) {
                    $("#result_buku").load("<?= base_url('buku/buku_list'); ?>");
                    $("#result_tunggu_buku").html('');
                }
            });
        });
    });
</script>