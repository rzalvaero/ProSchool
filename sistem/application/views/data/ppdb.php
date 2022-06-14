<div class="row">
    <!-- Add Notice Area Start Here -->
	<div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Pendaftaran</h3>
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
                                                        <label class="form-check-label">No Pendaftaran</label>
                                                    </div>
                                                </th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ppdb as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['no_pendaftaran'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['nama_siswa'] ?></td>
                                                <td><?php echo $row['asal_sekolah'] ?></td>
                                                <td><?php echo $row['tanggal_daftar'] ?></td>
                                                <td>
                                                    <?php if($row['status']=="1"){ ?>
                                                        <button type="button" style="width: 145px;" class="btn-fill-lmd btn-sm radius-30 text-light shadow-dark-pastel-green bg-dark-pastel-green">Dikonfirmasi</button>
                                                    <?php }else{ ?>
                                                        <button type="button" class="btn-fill-lmd btn-sm radius-30 text-light shadow-red bg-red">Belum diKonfirmasi</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        
                                                        <?php if($row['status']=="0"){ ?>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url('/ppdb/terima/'.$row['id_ppdb']);?>"><i
                                                                    class="fas fa-check text-primary"></i>Terima</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/ppdb/tolak/'.$row['id_ppdb']);?>"><i
                                                                    class="fas fa-times text-orange-red"></i>Tolak</a>
                                                            <a class="dropdown-item" target="_blank" href="<?php echo base_url('/ppdb/download/'.$row['no_pendaftaran']);?>"><i
                                                                    class="fas fa-print text-dark-pastel-green"></i>Cetak</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/ppdb/deletes/'.$row['id_ppdb']);?>"><i
                                                                    class="fas fa-trash text-orange-red"></i>Hapus</a>
                                                            
                                                            </div>
                                                        <?php }elseif($row['status']=="1"){ ?>
                                                            <!--<div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url('/ppdb/terima/'.$row['id_ppdb']);?>"><i
                                                                    class="fas fa-check text-primary"></i>Check Pembayaran</a>
                                                            </div>-->
                                                        <?php } else { ?>

                                                        <?php } ?>
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