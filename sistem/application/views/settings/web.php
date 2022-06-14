<div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Pengaturan Web</h3>
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
                                <form class="new-added-form" action="<?php echo base_url(). 'settings/update'; ?>" method="post">
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>URL Web*</label>
                                            <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                            <input type="text" placeholder="" name="url" value="<?php echo $u->url ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Title</label>
                                            <input type="text" placeholder="" name="title" value="<?php echo $u->title ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Tahun Pelajaran</label>
                                            <input type="text" placeholder="" name="tahunajaran" value="<?php echo $u->tahun_ajaran ?>" class="form-control">
                                        </div>
										<div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Email Sekolah*</label>
                                            <input type="text" placeholder="" name="email" value="<?php echo $u->email ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Group Whatsapp</label>
                                            <input type="text" placeholder="" name="whatsapp_group" value="<?php echo $u->whatsapp_group ?>" class="form-control">
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Maintaince</label>
                                            <select class="select2" name="maintenance">
                                                <option value="0"><?php echo $u->maintenance ?></option>
                                                <option value="iya">IYA</option>
                                                <option value="tidak">TIDAK</option>
                                            </select>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Description</label>
                                            <textarea type="text" placeholder="" name="description" class="form-control"><?php echo $u->description ?></textarea>
                                        </div>
                                    </div>
									
									<div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Pengaturan Lain</h3>
                                    </div>
									</div>
                                    <div class="row">
										<div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label>Ukuran Kertas</label>
                                            <select class="select2" name="setpaper">
                                                <option value="<?php echo $u->default_print ?>"><?php echo $u->default_print ?></option>
                                                <option value="a4">A4</option>
                                                <option value="letter">Letter</option>
                                                <option value="leger">Leger</option>
                                            </select>
                                        </div>
										<div class="col-12 form-group mg-t-8">
                                            <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            <a href="<?php echo base_url();?>settings" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>