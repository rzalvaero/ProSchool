<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="GURU" || $this->session->userdata('type_users')=="ADMIN"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Pengumuman</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                    </div>
                </div>
                <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                <form class="new-added-form">
                    <div class="row">
                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                            <label>Judul</label>
                            <input type="text" placeholder="Input Title" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Tanggal Tampil</label>
                            <input type="date" placeholder="" class="form-control air-datepicker">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Tanggal Tutup</label>
                            <input type="date" placeholder="" class="form-control air-datepicker">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <div class="col-12 form-group">
                                            <label>Pesan Pengumuman</label>
                                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="message" id="form-message"
                                            cols="10" rows="4"></textarea>
                        </div>
                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else {} ?>
    

    <!-- Add Notice Area End Here -->
   
    <!-- All Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Pengumuman</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                        
                    </div>
                </div>
                <form class="mg-b-20">
                    <div class="row gutters-8">
                        <div class="col-lg-5 col-12 form-group">
                            <input type="text" placeholder="Cari dengan tanggal ..." class="form-control">
                        </div>
                        <div class="col-lg-5 col-12 form-group">
                            <input type="text" placeholder="Cari dengan judul ..." class="form-control">
                        </div>
                        <div class="col-lg-2 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">Cari</button>
                        </div>
                    </div>
                </form>
                <div class="notice-board-wrap">
                    <?php foreach ($pengumuman as $row) { ?>
                                <div class="notice-list">
                                        <div class="post-date bg-pink"><?php echo $row['tgl_tampil'] ?></div>
                                        <h6 class="notice-title"><a href="#"><?php echo $row['konten'] ?></a></h6>
                                        <div class="entry-meta"> <?php echo $row['judul'] ?> /
                                        <span>
                                        <?php
                                            $tgl1 = new DateTime(date("Y-m-d"));
                                            $tgl2 = new DateTime($row['tgl_tampil']);
                                            $d = $tgl2->diff($tgl1)->days + 1;
                                            echo $d." Days a go.";
                                        ?>
                                       </span>
                                </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- All Notice Area End Here -->
</div>