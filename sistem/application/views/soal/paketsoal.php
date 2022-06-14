<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>

<div class="row">   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Paket Soal</h3>
                                    </div>
                                    <div class="dropdown">
                       <button type="button" name="add" data-target="#tambah" data-toggle="modal" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Tambah Paket</button>
                    </div>       
                  </div>
                   <div class="table-responsive">
                    <table class="table display data-table text-nowrap" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Nama Paket</th>
                              <th>Mata Pelajaran</th>
                              
                             </tr>
                        </thead>
                        <tbody>                     
                            <?php
                               $no = 1;
                                 foreach ($paket_soal as $d):
                                    
                            ?>
                             <tr>
                               <td><?= $no++; ?></td>
                               <td><?= $d->nama_paket; ?></td>
                               <td><?= $d->mp_nama; ?></td>
                        
                            <!-- Modal Info Soal 
                               <td>
                                   <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                     <a class="dropdown-item" data-toggle="modal" data-toggle="modal" data-target="#info<?=$d->id;?>">
                                        <i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                     <a class="dropdown-item" data-toggle="modal" data-toggle="modal" data-target="#info<?=$d->id;?>">
                                        <i class="fas fa-times text-orange-red"></i>Hapus</a>
                                    </div>
                                </div> </td> -->                      
                            </tr>
         
                            </div>
                             <!-- Modal Info Soal -->
                      <div class="modal fade" id="tambahw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <form id="saveUserForm" action="<?php echo base_url().'soal/tambah_paket'; ?>"method="post">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Paket Soal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                             </div>
                              <div class="modal-body">
                             </div>
                            <div class="modal-body">
                            <div class="box-body">
                              <div class="box box-solid with-border info-soal">
                                 <div class="box-body">
                                   <div class="row gutters-8">
                                    <div class=" col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                        <label for="A">Nama Paket Soal</label>
                                     </div>
                                     <div class=" col-8-xxxl col-xl-8 col-lg-8 col-12 form-group">
                                         <input type="text" name="namapaket" id="namapaket" class="form-control" placeholder="Nama Paket Soal" required="">
                                     </div>
                                      <div class=" col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                        <label for="A">Pilih Mata Pelajaran</label>
                                     </div>
                                     <div class=" col-8-xxxl col-xl-8 col-lg-8 col-12 form-group">
                                     <select name="mapel" id="mapel" class="form-control select2" required="">
                                     <option value="">Pilih Mata Pelajaran</option>
                                       <?php foreach($mata_pelajaran as $lm){ ?>
                                      <option value="<?= $lm->idmata_pelajaran;?>"><?= $lm->mp_nama;?></option>
                                      <?php } ?>
                                      </select></div>
                                     
                                     <div class=" col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                         <label for="A">Jumlah Soal</label>
                                    </div>
                                    <div class=" col-8-xxxl col-xl-8 col-lg-8 col-8 form-group">
                                      <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Soal" required="">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                     <button type="submit" class="btn btn-gradient-yellow"><i class="fa fa-check"></i> Simpan</button>
                                      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i> Tutup</button>
                                 </div>
                                </div>
                                </form>
                              </div>
                             </div>
                            </div>
                         </div>
                     </div>
                 <?php endforeach; ?> 
                 </tbody>
               </table>
            </div>
         </div>
      </div>
    </div>
 </div>
</div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>

                      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                         <div class="modal-content">
                              <form id="saveUserForm" action="<?php echo base_url().'soal/tambah_paket'; ?>"method="post">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Paket Soal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                             </div>
                            <div class="modal-body">
                            <div class="box-body">
                               <div class="row gutters-8">
                                    <div class=" col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                        <label for="A">Nama Paket Soal</label>
                                     </div>
                                     <div class=" col-8-xxxl col-xl-8 col-lg-8 col-12 form-group">
                                         <input type="text" name="namapaket" id="namapaket" class="form-control" placeholder="Nama Paket Soal" required="">
                                     </div>
                                      <div class=" col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                        <label for="A">Pilih Mata Pelajaran</label>
                                     </div>
                                     <div class=" col-8-xxxl col-xl-8 col-lg-8 col-12 form-group">
                                     <select name="mapel" id="mapel" class="form-control select2" required="">
                                     <option value="">Pilih Mata Pelajaran</option>
                                       <?php foreach($mata_pelajaran as $lm){ ?>
                                      <option value="<?= $lm->idmata_pelajaran;?>"><?= $lm->mp_nama;?></option>
                                      <?php } ?>
                                      </select></div>
                                     
                                    
                                    <div class=" col-8-xxxl col-xl-8 col-lg-8 col-8 form-group">
                                      <input type="hidden" name="jumlah" id="jumlah" value="0" class="form-control" placeholder="Jumlah Soal" required="">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                     <button type="submit" class="btn btn-gradient-yellow"><i class="fa fa-check"></i> Simpan</button>
                                      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i> Tutup</button>
                                 </div>
                                </div>
                             
                                </form>
                              </div>
                             </div>
                            </div> 
                             </div>
                            
    </div>
 </div>
