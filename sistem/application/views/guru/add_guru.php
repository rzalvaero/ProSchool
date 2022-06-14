
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                
                <!-- Breadcubs Area End Here -->
                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Tambah Guru</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                            </div>
                        </div>
                         <?php echo $this->session->flashdata("msg");?>
                        <form class="new-added-form" action="<?php echo base_url(). 'guru/adding'; ?>" method="post">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Nama Depan *</label>
                                    <input type="text" placeholder="Nama Depan" name="depan" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Nama Belakang *</label>
                                    <input type="text" placeholder="Nama Belakang" name="belakang" class="form-control" required>
                                </div>
                                <div class="col-xl-2 col-lg-6 col-12 form-group">
                                    <label>Gelar *</label>
                                    <input type="text" placeholder="Gelar" name="gelar" class="form-control">
                                </div>
                                <div class="col-xl-2 col-lg-6 col-12 form-group">
                                    <label>Telepon *</label>
                                    <input type="number" placeholder="Telepon" name="telpon" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Email *</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Password *</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Unit *</label>
                                    <select class="select2" name="unit" required>
                                        <option value="">Please Select Unit *</option>
                                        <?php foreach ($dropdown as $a) : ?>
                                            <option value="<?=$a->id?>"><?=$a->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="col-12 form-group mg-t-8">
                                    <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Next</button>
                                    <button style="float:right;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->
            </div>
