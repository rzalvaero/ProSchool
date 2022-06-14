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
                                        <h3>Konfirmasi Data</h3>
                                    </div>
</div>
      <form action="#" method="post" id="f_token" onsubmit="return konfirmasi_token();">
        <input type="hidden" name="id_ujian" id="id_ujian" value="<?php echo $detil_paket['id']; ?>">
        <input type="hidden" name="_token" id="_token" value="<?php echo $detil_paket['token']; ?>">
        <input type="hidden" name="_tgl_mulai" id="_tgl_mulai" value="<?php echo date('Y-m-d H:i:s'); ?>">
        <div class="col-md-7">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-bordered">
                <tr>
                  <td width="35%">Nama</td>
                  <td width="65%"><?php echo $detil_paket['nama_ujian']; ?></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><?php echo $this->session->userdata('first_name'); ?></td>
                </tr>
                <tr>
                  <td>Jml Soal</td>
                  <td><?php echo $detil_paket['jumlah_soal']; ?></td>
                </tr>
                <tr>
                  <td>Waktu</td>
                  <td><?php echo $detil_paket['waktu']; ?> menit</td>
                </tr>
                <tr>
                  <td>Kode Tes</td>
                  <td><input type="text" name="token" id="token" required="true" class="form-control col-md-3"></td>
                </tr>
              </table>
              <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-check-circle"></i> MULAI</button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

</div>


</div>
</div>
<script>
function konfirmasi_token() {
    var token_asli = $("#_token").val();
    var token_input = $("#token").val();
    var id = $("#id_ujian").val();

    if (token_asli != token_input) {
        alert("Token salah..!");
        return false;
    } else {
        alert("Token benar..!");
        window.location.assign("<?php echo base_url(); ?>ujian/ujian_ok/"+ id); 
    }

    return false;
}
</script>