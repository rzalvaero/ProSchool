<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="GURU" || $this->session->userdata('type_users')=="ADMIN"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Mata Pelajaran</h3>
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
                <form class="new-added-form" action="<?php echo base_url(). 'mapel/add'; ?>" method="post">
                    <div class="row">
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Kode</label>
                            <input name="kode" type="text" placeholder="Tulis kode Mapel" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Mata Pelajaran</label>
                            <input  name="mapel" type="text" placeholder="Nama Mata Pelajaran" class="form-control">
                        </div>

                        <?php if($this->session->userdata('type_users')=="ADMIN"){?>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Unit</label>
                                <select class="select2" name="unit" >
                                    <option disabled>Default select</option>
                                    <?php foreach ($dropdown as $a) : ?>
                                                <option value="<?=$a->id?>"><?=$a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php }else{ ?>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label></label>
                            <input  name="unit" type="hidden" placeholder="Nama Unit" value="<?php echo $this->session->userdata('unit')?>" class="form-control" readonly>
                            </div>
                        <?php } ?>
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
                                        <h3>Daftar Mata Pelajaran</h3>
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
                                                        <label class="form-check-label">Kode</label>
                                                    </div>
                                                </th>
                                                <th>Nama</th>
                                                <th>Unit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($mapel as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['mp_kode'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['mp_nama'] ?></td>
                                                <td><?php echo $row['mp_unit'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!--<a class="dropdown-item" href="<?php echo base_url('/mapel/edit/'.$row['idmata_pelajaran']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
                                                            <a class="dropdown-item" href="<?php echo base_url('/mapel/deletes/'.$row['idmata_pelajaran']);?>"><i
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