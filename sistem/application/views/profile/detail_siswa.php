<div class="card-body">
    <div class="heading-layout1">
        <div class="item-title">
            <h3>Tentang</h3>
        </div>
       <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" 
            data-toggle="dropdown" aria-expanded="false">...</a>

        </div>
    </div>
    <div class="single-info-details">
        <div class="item-img">
            <img src="<?php echo base_url();?>assets/img/figure/teacher.jpg" alt="teacher">
        </div>
        <div class="item-content">
            <div class="header-inline item-header">
                <div class="header-elements">
                    <ul>
						<?php if ($this->session->userdata('type_users') == "ADMIN" || $this->session->userdata('type_users') == "GURU") { ?>
                        <li><a href="<?php echo base_url();?>siswa/edit/<?php echo $this->uri->segment('3');?>"><i class="far fa-edit"></i></a></li>
						<?php }else{ ?>
						<li><a href="<?php echo base_url();?>profile/setting"><i class="far fa-edit"></i></a></li>
						<?php } ?>
						<li><a onclick="window.print();" class="noPrint"><i class="fas fa-print"></i></a></li>
                        <!--<li><a href="#"><i class="fas fa-download"></i></a></li>-->
                    </ul>
                </div>
            </div>
            <p></p>
            <div class="info-table table-responsive">
                <table class="table text-nowrap">
                <?php foreach ($detail as $row) { ?>
                    <tbody>
                        <tr>
                            <td>Nama:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_tanggal_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td>NISN:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_nisn'] ?></td>
                        </tr>
                        
                        <tr>
                            <td>E-mail:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_email'] ?></td>
                        </tr>
                        <tr>
                            <td>Telepon:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['s_telepon'] ?></td>
                        </tr>

                        <tr>
                            <td>Kelas:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['k_romawi'] ?> / <?php echo $row['k_keterangan'] ?></td>
                        </tr>
                        <tr>
                            <td>Unit:</td>
                            <td class="font-medium text-dark-medium"><?php echo $row['nama_sekolah'] ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            <div class="col-12 form-group mg-t-8">
                                <!-- <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>-->
                                <a style="float:right;margin: 0px 20px 0px 0px;" href="<?php echo base_url();?>" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
            </div>
        </div>
    </div>
</div>