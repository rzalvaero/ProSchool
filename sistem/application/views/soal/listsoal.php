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
                                        <h3>Daftar Soal</h3>
                                    </div>
                                    <div class="dropdown">
                                        <form action="<?php echo base_url(); ?>soal">
    <input class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" type="submit" value="Tambah Soal" />
</form>
                       
                    </div>  
                  

                  </div>
                   <div class="table-responsive">
                    <table class="table display data-table text-nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Kelas</th>
                              <th>Mata Pelajaran</th>
                              <th>Soal</th>
                              <th>Aksi</th>
                             </tr>
                        </thead>
                        <tbody>                     
                            <?php
                               $no = 1;
                                 foreach ($soal as $d):
                            ?>
                             <tr>
                               <td><?= $no++; ?></td>
                               <td><?= $d->keterangan; ?></td>
                               <td><?= $d->mp_nama; ?></td>
                               <td><?= $d->judulsoal; ?></td>
                               <td>
                                   <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>
                                   <div class="dropdown-menu dropdown-menu-right">
                                     <a class="dropdown-item" data-toggle="modal" data-target="#info<?=$d->id_soal;?>">
                                        <i class="fas fa-eye text-orange-green"></i>Lihat</a>
                                        <a class="dropdown-item feed-id" data-toggle="modal" data-target="#tambah" data-id="<?= $d->no_soal; ?>">
                                        <i class="fas fa-cogs text-orange-green" ></i>Tambah</a>
                                        <a class="dropdown-item delete-id"  data-toggle="modal" data-iddel="<?= $d->no_soal; ?>" data-target="#myhapus">
                                        <i class="fas fa-eye text-orange-green"></i>Hapus</a>
                                    </div>
                                  </div>  
                                </td>                      
                             </tr>
                         <div class="modal fade" id="info<?=$d->id_soal;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">

                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Info Soal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                             </div>
                              <div class="modal-body">
                             </div>
                            <div class="modal-body">
                            <div class="box-body">
                              <div class="box box-solid with-border info-soal">
                                 <div class="box-body">
                                    <h5>Soal :</h5>
                                    <p><?= $d->judulsoaldetail; ?></p>
                                    <hr>
                                    <h5>Opsi A :</h5>
                                    <p><?= $d->opsi_a; ?></p>
                                    <h5>Opsi B :</h5>
                                    <p><?= $d->opsi_b; ?></p>
                                    <h5>Opsi C :</h5>
                                    <p><?= $d->opsi_c; ?></p>
                                    <h5>Opsi D :</h5>
                                    <p><?= $d->opsi_d; ?></p>
                                    <h5>Opsi E</h5>
                                    <p><?= $d->opsi_e; ?></p>
                                    <h4>Jawaban : </h4>
                                    <p><?= $d->jawaban; ?></p>
                                    </div>
                                    <div class="box-footer">
                                    <h5>Dibuat oleh : </h5>
                                    <p><?= $d->first_name; ?></p>
                                  </div>
                                </div>
                              </div>
                             </div>
                            </div>
                         </div>
                     </div>
                
               <div class="modal small fade" id="myhapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form id="saveUserForm" action="<?php echo base_url().'soal/delete_soal'; ?>" method="post">
            <div class="modal-header">
               
                 <h3 id="myModalLabel">Konfirmasi Hapus</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><i class="fa fa-warning modal-icon"></i>Apakah kamu yakin untuk menghapus soal ini ?
                    
            </div>
            <div class="modal-footer">
                    <input id="del_id" name="del_id"  value="" hidden="hidden" />
               <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Batal</button> <button class="btn btn-danger"  id="modalDelete" href="#" >Hapus</button>

            </div>
              </form>
        </div>
    </div>
     <?php endforeach; ?>
                 </tbody>
               </table>
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <form id="saveUserForm" action="<?php echo base_url().'soal/tambah_soalpaket'; ?>" method="post">
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
                                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap" cellspacing="0" width="100%">
                               <thead>
                           <tr>
                              <th>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                     <label class="form-check-label">Pilihan</label>
                                </div>
                                                </th>
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
                                <td>
                                <div class="form-check">
                                <input type="checkbox" name="paket[]" id="paket" value="<?= $d->id; ?>" class="form-check-input">
                                 <label class="form-check-label"><?= $no++; ?></label>
                                 </div>
                              </td>
                               <td><?= $d->nama_paket; ?></td>
                               <td><?= $d->mp_nama; ?></td>
                          </tr> 
                           <?php endforeach; ?> 
                      </tbody>
                     </table>
                          <div class="modal-footer">
                           <input id="soal_id" name="soal_id" type="hidden" value="" />
                             <button  href="#" class="btn btn-gradient-yellow"><i class="fa fa-check" id="simpan"></i> Simpan</button>
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
   </div>
   </div>
<script>
$(document).ready(function () {
$('body').on('click', '.feed-id',function(){
document.getElementById("soal_id").value = $(this).attr('data-id');
console.log($(this).attr('data-id'));
});
});
   
</script>
<script>
$(document).ready(function () {
$('body').on('click', '.delete-id',function(){
document.getElementById("del_id").value = $(this).attr('data-iddel');
console.log($(this).attr('data-iddel'));
});
});
   
</script>

                           