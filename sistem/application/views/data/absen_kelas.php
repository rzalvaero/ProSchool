<div class="row">
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Kehadiran Kelas</h3>
                                    </div>
                                 
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label">Nama Kelas</label>
                                                    </div>
                                                </th>
                                                <th>Tingkat</th>
                                                <th>Keterangan / Jurusan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kelas as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['k_romawi'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['k_tingkat'] ?></td>
                                                <td><?php echo $row['k_keterangan'] ?></td>
                                                <td>
                                                    <a target="_target" href="<?php echo base_url('/absen/siswa/'.$row['idkelas']);?>">Check Kehadiran</a>
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