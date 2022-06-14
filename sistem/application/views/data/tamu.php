<div class="row">
    <!-- Add Notice Area Start Here -->
    
   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Tamu</h3>
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
                                                        <label class="form-check-label">Nama Tamu</label>
                                                    </div>
                                                </th>
                                                <th>Unit</th>
                                                <th>Email</th>
                                                <th>Telpon</th>
                                                <th>Dibuat</th>
                                                <th>Kunjungan</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($tamu as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['user_name'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['unit'] ?></td>
                                                <td><a href="mailto:<?php echo $row['user_email'] ?>"><?php echo $row['user_email'] ?></a></td>
                                                <td><a href="tel:<?php echo $row['user_phone'] ?>"><?php echo $row['user_phone'] ?></a></td>
                                                <td><?php echo $row['user_created'] ?></td>
                                                <td><?php echo $row['user_visit'] ?></td>
                                                <td>
                                                    <?php if($row['approve']=="0"){ ?>
                                                         <button type="button" class="btn-fill-lmd radius-30 text-light shadow-orange-peel bg-orange-peel btn-sm">Belum Dikonfirmasi</button>
                                                    <?php }elseif($row['approve']=="-1"){ ?>
                                                        <button type="button" class="btn-fill-lmd radius-30 text-light shadow-red bg-red btn-sm">Tidak Dikonfirmasi</button>
                                                    <?php }elseif($row['approve']=="1"){ ?>
                                                        <button type="button" class="btn-fill-lmd radius-30 text-light shadow-dark-pastel-green bg-dark-pastel-green btn-sm">Telah Dikonfirmasi</button>
                                                    <?php }else{ ?>
                                                        <button type="button" class="btn-fill-lmd radius-30 text-light shadow-dodger-blue bg-dodger-blue btn-sm">Telah Dikonfirmasi</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($row['approve']=="0"){ ?>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url('/tamu/terima/'.$row['id']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Terima</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/tamu/tolak/'.$row['id']);?>"><i
                                                                    class="fas fa-times text-orange-red"></i>Tolak</a>
                                                            
                                                        </div>
                                                    </div>
                                                    <?php }else{} ?>
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