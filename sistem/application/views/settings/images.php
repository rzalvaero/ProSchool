<div class="row">
                    <?php foreach($setting as $u){ ?>
                    <div>
                    <form action="<?php echo base_url(). 'settings/update_images'; ?>" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?php echo $u->id ?>" >
                    </div>
                    <div class="col-6-xxxl col-xl-6">
                        <div class="card account-settings-box height-auto">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-20">
                                    <div class="item-title">
                                        <h3>Pengaturan Gambar</h3>
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
                                <div class="all-user-box">
                                    
                                    <div class="media media-none--xs active">
                                        <div class="item-img">
                                            <img style="max-width: 100px;" src="<?php echo base_url('assets/img/corefiles/'.$u->logo); ?>" class="media-img-auto" alt="user">
                                        </div>
                                        <div class="media-body space-md">
                                            <h5 class="item-title">Logo</h5>
                                            <div class="item-subtitle"><a target="_blank" href="<?php echo base_url('assets/img/corefiles/'.$u->logo); ?>"><?php echo $u->logo ?></a></div>
                                            <input type="file" value="<?php echo $u->logo ?>" id="med_img" class="file_upload"  name="userfile"/>
                                        </div>
                                        
                                    </div>
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                            <img style="max-width: 100px;" src="<?php echo base_url('assets/img/corefiles/'.$u->ttd); ?>" class="media-img-auto" alt="user">
                                        </div>
                                        <div class="media-body space-md">
                                            <h5 class="item-title">Tanda Tangan</h5>
                                            <div class="item-subtitle"><a target="_blank" href="<?php echo base_url('assets/img/corefiles/'.$u->ttd); ?>"><?php echo $u->ttd ?></a></div>
                                            <input type="file" value="<?php echo $u->ttd ?>" id="med_img" class="file_upload"  name="userfile2"/>
                                        </div>
                                    </div>
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                            <img style="max-width: 100px;" src="<?php echo base_url('assets/img/corefiles/'.$u->stampel); ?>" class="media-img-auto" alt="user">
                                        </div>
                                        <div class="media-body space-md">
                                            <h5 class="item-title">Stampel</h5>
                                            <div class="item-subtitle"><a target="_blank" href="<?php echo base_url('assets/img/corefiles/'.$u->stampel); ?>"><?php echo $u->stampel ?></a></div>
                                            <input type="file" value="<?php echo $u->stampel ?>" id="med_img" class="file_upload"  name="userfile3"/>
                                        </div>
                                    </div>
                                    <div class="media media-none--xs">
                                        <div class="item-img">
                                            <img style="max-width: 100px;" src="<?php echo base_url('assets/img/corefiles/'.$u->design); ?>" class="media-img-auto" alt="user">
                                        </div>
                                        <div class="media-body space-md">
                                            <h5 class="item-title">Design</h5>
                                            <div class="item-subtitle"><a target="_blank" href="<?php echo base_url('assets/img/corefiles/'.$u->design); ?>"><?php echo $u->design ?></a></div>
                                            <input type="file" value="<?php echo $u->design ?>" id="med_img" class="file_upload"  name="userfile4"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6-xxxl col-xl-6">
                        <div class="card account-settings-box">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-20">
                                    <div class="item-title">
                                        <h3>Tampilan</h3>
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
                                <div class="user-details-box">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?php echo base_url('assets/img/corefiles/'.$u->logo); ?>" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo base_url('assets/img/corefiles/'.$u->ttd); ?>" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo base_url('assets/img/corefiles/'.$u->stampel); ?>" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo base_url('assets/img/corefiles/'.$u->design); ?>" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group mg-t-8">
                        <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                        <a href="<?php echo base_url();?>settings" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
                    </div>
                <div>
                    </form>
                </div>
                <?php } ?>
</div>