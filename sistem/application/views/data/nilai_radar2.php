<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Radar Nilai Rapor</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>profile/setting"><i class="far fa-edit"></i>Edit</a>
                    <a onclick="window.print();" class="dropdown-item noPrint" href="#"><i class="fas fa-print"></i>Cetak</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-download"></i>Unduh</a>
                </div>
            </div>
        </div>
        <form class="mg-b-20" action="#" method="POST">
            <div class="row gutters-8">
                <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                    <!-- <input type="text" placeholder="Search by Class..." class="form-control"> -->
                    <select class="select2" name="kelas">
                        <option value="">Pilih Kelas *</option>
                        <?php foreach ($dropdown as $a) : ?>
                            <option value="<?php echo base_url(); ?>nilai/leger_print/<?= $a->idkelas ?>"><?= $a->k_romawi ?> | <?= $a->k_keterangan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    $(window).on('load',function () {
      $('#sidemenu-button').click();
    });

    function show_chart(idmapel,idsiswa,snama,idkelas)
    {
      $('#_idmapel').val(idmapel);
      $('#_idsiswa').val(idsiswa);
      $('#_s_nama').val(snama);
      $('#_idkelas').val(idkelas);
      $('#modal_show_chart').modal('show');
    }

    $('#modal_show_chart').on('show.bs.modal', function () {
      var idmapel = $('#_idmapel').val();
      var idsiswa = $('#_idsiswa').val();
      var snama = $('#_s_nama').val();
      var idkelas = $('#_idkelas').val();
      var token = 'access';
      
      $.ajax({
        url: "<?=base_url('administrator/Nilai_rapor/nilai_siswa_chart/')?>",
        type: "post",
        data: {token:token,idmapel:idmapel,idsiswa:idsiswa,snama:snama,idkelas:idkelas},
        success: function(data){
          $("#modal_show_chart").find(".modal-body").html(data);
        }
      });
    });

    $('#modal_show_all_chart').on('show.bs.modal', function () {
      $('#modal_show_all_chart').find(".modal-body").html("<center>Mohon ditunggu, data sedang diproses ..</center>"); 
      var idkelas = $('#idkelas').val();
      var token = 'access';
      $.ajax({
        url: "<?=base_url('administrator/Nilai_rapor/nilai_seluruh_siswa_chart/')?>",
        type: "post",
        data: {token:token,idkelas:idkelas},
        success: function(data){
          $("#modal_show_all_chart").find(".modal-body").html(data);
        }
      });
    });

    function print_rapor(id)
    {
      var win = window.open(base_url+'rapor/print/'+id, '_blank');
      if (win) {
          //Browser has allowed it to be opened
          win.focus();
      } else {
          //Browser has blocked it
          alert('Please allow popups for this website');
      }
    }

    function formValidation()
    {
        var idkelas = $('#idkelas').val();
        if ($.trim(idkelas)==''){
            $('#divAkhir').fadeOut();
            showToast('Silahkan pilih kelas !',1000,'error');
            $(".error-message1").append('<div class="font-italic text-danger" id="error-message1"><small>* silahkan isi sesuai format yang diminta</small></div>');
            $('#jumlah_ph').val('');
        } else {
            return true;
        }
    }
    
    function removeErrorMessages()
    {
    $("#error-message1").remove();
    }

    $(document).ready(function(){
        $("#idkelas").on("change", function( ) {
            removeErrorMessages();
            if(formValidation()){
            var idkelas = $('#idkelas').val();

            $('#divAkhir').fadeIn();
            fDatatables("tRincian","<?=base_url('administrator/Nilai_rapor/ajax_list/')?>"+idkelas,"ASC");
            return false;
            };
        });
    })
</script>
