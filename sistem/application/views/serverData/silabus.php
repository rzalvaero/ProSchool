    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Data Silabus</h3>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                    <br>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profile/setting"><i class="far fa-edit"></i>Edit</a>
                        <a onclick="window.print();" class="dropdown-item noPrint" href="#"><i class="fas fa-print"></i>Cetak</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-trash"></i>Hapus</a>
                    </div>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
                                <select class="select2" name="unit" id="unit">
                                    <option value="0">Default select</option>
                                    <?php foreach ($selectunit as $a) : ?>
                                        <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } else {
                                $unit = $this->session->userdata('unit');
                                $row = "select * from web_unit WHERE id ='$unit'";
                                $row_siswa                                    = $this->db->query($row)->row();
                                $data['id']                                     = $row_siswa->id;
                                $data['nama']                                 = $row_siswa->nama;
                            ?>
                                <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" readonly>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <button type="button" id="btn-filter" class="fw-btn-fill btn-gradient-yellow">Filter</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <a href="<?php echo base_url(); ?>silabus/add" align="center" class="fw-btn-fill btn-gradient-yellow" style="background-color:#021933;">Tambah Baru</a>
                        </div>
                    </div>
                </div>
            </form>
            <?php echo $this->session->flashdata("msg"); ?>
            <div class="table-responsive">
                <table id="table" class="table display text-nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center;">NO</th>
                            <th rowspan="2" style="text-align: center;">KOMPETENSI DASAR</th>
                            <th rowspan="2" style="text-align: center;">INDIKATOR</th>
                            <th rowspan="2" style="text-align: center;">MATERI PEMBELAJARAN</th>
                            <th rowspan="2" style="text-align: center;">KEGIATAN PEMBELAJARAN</th>
                            <th rowspan="2" style="text-align: center;">ALOKASI</th>
                            <th colspan="3" style="text-align: center;">PENILAIAN</th>
                            <th rowspan="2">SUMBER BELAJAR</th>
                            <th rowspan="2">AKSI</th>
                            <!-- <td></td> -->
                            <!-- <td></td> -->
                        </tr>
                        <tr>
                            <th style="text-align: center;">Teknik</th>
                            <th style="text-align: center;">Bentuk Instrument</th>
                            <th style="text-align: center;">Instrumen</th>
                            <!-- <td></td> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                      <tr>
                            <th rowspan="2" style="text-align: center;">NO</th>
                            <th rowspan="2" style="text-align: center;">KOMPETENSI DASAR</th>
                            <th rowspan="2" style="text-align: center;">INDIKATOR</th>
                            <th rowspan="2" style="text-align: center;">MATERI PEMBELAJARAN</th>
                            <th rowspan="2" style="text-align: center;">KEGIATAN PEMBELAJARAN</th>
                            <th rowspan="2" style="text-align: center;">ALOKASI</th>
                            <th colspan="3" style="text-align: center;">PENILAIAN</th>
                            <th rowspan="2">SUMBER BELAJAR</th>
                            <th rowspan="2">AKSI</th>
                            <!-- <td></td> -->
                            <!-- <td></td> -->
                        </tr>
                        <tr>
                            <th style="text-align: center;">Teknik</th>
                            <th style="text-align: center;">Bentuk Instrument</th>
                            <th style="text-align: center;">Instrumen</th>
                            <!-- <td></td> -->
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var table;

        $(document).ready(function() {

            //datatables
            table = $('#table').DataTable({
                "searching": false,
                "bLengthChange": false,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('silabus/ajax_list') ?>",
                    "type": "POST",
                    "data": function(data) {
                        data.unit = $('#unit').val();
                    }
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                }, ],

            });

            $('#btn-filter').click(function() { //button filter event click
                table.ajax.reload(); //just reload table
            });
            $('#btn-reset').click(function() { //button reset event click
                $('#form-filter')[0].reset();
                table.ajax.reload(); //just reload table
            });

        });
    </script>