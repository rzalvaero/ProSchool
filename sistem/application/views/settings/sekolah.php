<div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Setting Sekolah</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <?php echo $this->session->flashdata("msg");?>
                                <?php foreach($setting as $u){ ?>
                                <form class="new-added-form" action="<?php echo base_url(). 'settings/update_sekolah'; ?>" method="post">
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Nama Sekolah*</label>
                                            <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                            <input type="text" placeholder="" name="nama" value="<?php echo $u->nama_sekolah ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Kepala Sekolah*</label>
                                            <input type="text" placeholder="" name="kepsek" value="<?php echo $u->kepsek ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>NPSN*</label>
                                            <input type="text" placeholder="" name="npsn" value="<?php echo $u->npsn ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>NSS*</label>
                                            <input type="text" placeholder="" name="nss" value="<?php echo $u->nss ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Nomer Telpon*</label>
                                            <input type="text" placeholder="" name="telpon" value="<?php echo $u->no_telepon ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                            <label>Provinsi</label>
                                            <input type="text" placeholder="" name="provinsi" value="<?php echo $u->provinsi ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                            <label>kelurahan</label>
                                            <input type="text" placeholder="" name="kelurahan" value="<?php echo $u->kelurahan ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" placeholder="" name="kecamatan" value="<?php echo $u->kecamatan ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                            <label>Kabupaten</label>
                                            <input type="text" placeholder="" name="kabupaten" value="<?php echo $u->kabupaten ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Email</label>
                                            <input type="text" placeholder="" name="kabupaten" value="<?php echo $u->email ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-8 col-12 form-group">
                                            <label>Alamat</label>
                                            <textarea type="text"  rows="15" cols="50" placeholder="" name="alamat" class="form-control"><?php echo $u->alamat ?></textarea>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                                            <a href="<?php echo base_url();?>settings" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>