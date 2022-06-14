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
                                        <h3>Selesai Ujian</h3>
                                    </div>
</div>
      
        <div class="col-md-7">
          <div class="panel panel-default">
            <div class="panel-body">
                 <?php    
                    foreach ($detil_pakets as $detil_paket):
                 ?>
                <div class='alert alert-info'>Anda telah selesai mengikuti ujian ini pada : <strong style='font-size: 16px'><?php echo $detil_paket['tgl_selesai']; ?></strong>, dan mendapatkan nilai : <strong style='font-size: 16px'><?php echo $detil_paket['nilai']; ?></strong>
            <h4>Statistik</h4>
              <table class="table table-bordered">
                <tr>
                  <td width="35%">Jumlah benar</td>
                  <td width="65%"><?php echo $detil_paket['jml_benar']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah salah</td>
                  <td><?php echo $detil_paket['jml_salah']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah soal dikerjakan</td>
                  <td><?php echo $detil_paket['juml_dikerjakan']; ?></td>
                </tr>
              </table>
                <?php endforeach; ?>
                <form id="saveUserForm" action="<?php echo base_url(); ?>ujian/cetak_hasilujian" method="post">
              <a href="<?php echo base_url(); ?>ujian/jadwalujian" class="btn btn-gradient-yellow"><i id="simpan"></i>Kembali</a>
               
               <input  class="btn btn-gradient-yellow" type="submit" value="Cetak" />
              <input type="hidden" name="id_ujian" value="<?php echo $id_ujian; ?>">
          </form>
            </div>
          </div>
        </div>
    </div>
  </div>

 </div>



</div>

