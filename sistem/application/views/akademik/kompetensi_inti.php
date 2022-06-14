<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="GURU" || $this->session->userdata('type_users')=="ADMIN"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Kompetensi Inti</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                <form class="new-added-form" action="<?php echo base_url(). 'kompetensi_inti/add'; ?>" method="POST">
                    <div class="row">
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kode Kompetensi</label>
                            <input name="kode" type="text" placeholder="Tulis Kode" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                            <label>Nama Kompetensi</label>
                            <input name="nama" type="text" placeholder="Tulis Nama Kompetensi" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kategori</label>
                            <select class="select2" name="kategori" >
                                <option selected>Pilih Kategori</option>
                                <option value="Keterampilan">Keterampilan</option>
                                <option value="Pengetahuan">Pengetahuan</option>
                            </select>
                        </div>
                        

                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else {} ?>
    
   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Kompetensi Inti</h3>
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
                                                        <label class="form-check-label">Kode KD</label>
                                                    </div>
                                                </th>
                                                <th>Nama Kompetensi</th>
                                                <th>Kategori Kompetensi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['kode_kd'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['nama_kd'] ?></td>
                                                <td><?php echo $row['kategori_kd'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- <a class="dropdown-item" href="<?php echo base_url('/kompetensi_inti/bukudetail/'.$row['idkompetensiinti']);?>"><i
                                                                    class="fas fa-eye text-dark-pastel-blue"></i>Detail</a>--> 
                                                            <a class="dropdown-item" href="<?php echo base_url('/kompetensi_inti/edit/'.$row['idkompetensiinti']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/kompetensi_inti/deletes/'.$row['idkompetensiinti']);?>"><i
                                                                    class="fas fa-times text-orange-red"></i>Hapus</a>
                                                            
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