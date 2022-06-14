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
                    <h3>Data RPP</h3>
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

                    <div class="col-lg-9">
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <a href="<?php echo base_url(); ?>rpp/add" align="center" class="fw-btn-fill btn-gradient-yellow" style="background-color:#021933;">Tambah Baru</a>
                        </div>
                    </div>
                </div>
            </form>
            <?php echo $this->session->flashdata("msg"); ?>
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
                            <th>Mata Pelajaran</th>
                            <th>Nama RPP</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rpp as $row) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label"><?php echo $row['idtahun_pelajaran'] ?></label>
                                    </div>
                                </td>
                                <td><?php echo $row['mata_pelajaran'] ?></td>
                                <td><?php echo $row['kd_nama'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
										   <a class="dropdown-item" href="<?php echo base_url('/rpp/edit/' . $row['idkompetensi_dasar']); ?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-blue"></i>Edit</a>
                                            <a class="dropdown-item" target="_blank" href="<?php echo base_url('/rpp/cetak/' . $row['idkompetensi_dasar']); ?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Cetak</a>
                                            <a class="dropdown-item" href="<?php echo base_url('/rpp/deletes/' . $row['idkompetensi_dasar']); ?>"><i class="fas fa-times text-orange-red"></i>Hapus</a>

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