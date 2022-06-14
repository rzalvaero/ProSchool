<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <div class="row">
    

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
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
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