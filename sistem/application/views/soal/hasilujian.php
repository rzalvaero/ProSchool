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
                                        <h3>Hasil Ujian</h3>
                                    </div>
                                    <div class="dropdown">
                    </div>       
                  </div>
                   <div class="table-responsive">
                    <table class="table display data-table text-nowrap" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th width="25%">Nama Tes</th>
                              <th width="10%">Nama Guru</th>
                              <th width="15%">Aksi</th>
                             </tr>
                        </thead>
                        <tbody>                     
                            <?php
                               $no = 1;
                                 foreach ($ujian as $d):
                                    
                            ?>
                             <tr>
                               <td><?= $no++; ?></td>
                               <td><?= $d->nama_ujian; ?></td>
                               <td><?= $d->first_name; ?></td>
                               <td>
                                   <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                     <a class="dropdown-item" href="<?php echo base_url('/ujian/hasilujiandetail/'.$d->id);?>">
                                        <i class="fas fa-eye text-dark-pastel-green"></i>Lihat Hasil Ujian</a>
                                    </div>
                                </div>                        
                            </tr>
         
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
</div>
                <!-- Modal Info Soal -->
                      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog" role="document">
                         <div class="modal-content">
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
                                   <form name="f_ujian" id="f_ujian" onsubmit="return m_ujian_s();">
                                    <input type="hidden" name="id" id="id" value="0">
                                     <input type="hidden" name="total" id="total" value="0">  
            <table class="table display data-table text-nowrap" cellspacing="0" width="100%">
            <tr>
              <td style="width: 25%">Nama Ujian</td>
              <td style="width: 75%"><input type="text" class="form-control" name="nama_ujian" id="nama_ujian" required></td>
            </tr>
            <tr>
              <td>Acak Soal</td>
              <td><?php echo form_dropdown('acak', $pola_tes, '', 'class="form-control"  id="acak" onchange="return change_jenis();" required'); ?></td>
            </tr>
            <tr>
              <td>Tgl Mulai</td>
              <td>
                <input type="date" name='tgl_mulai' class="form-control" style="width: 200px; display: inline; float: left" id="tgl_mulai" placeholder="Tgl" required>
                <input type="time" name='wkt_mulai' class="form-control" style="width: 100px; display: inline; float: left" id="wkt_mulai" placeholder="Waktu" required>
              </td>
            </tr>

            <tr>
              <td>Tgl Selesai</td>
              <td>
                <input type="date" name='tgl_selesai' class="form-control" style="width: 200px; display: inline; float: left" id="tgl_selesai" placeholder="Tgl" required>
                <input type="time" name='wkt_selesai' class="form-control" style="width: 100px; display: inline; float: left" id="wkt_selesai" placeholder="Waktu" required>
              </td>
            </tr>

            <tr>
              <td>Waktu</td>
              <td><?php echo form_input('waktu', '', 'class="form-control" id="waktu" placeholder="menit" required style="width: 100px; display: inline; float: left"'); ?> <div style="float: left; margin: 4px 0 0 10px"> menit</div>
              </td>
            </tr>
            <tr>
              <td>Kode Soal</td>
              <td><?php echo form_input('kode', '', 'class="form-control"  id="kode" required'); ?></td>
            </tr>

            <tr style="display: none" id="tr_paket">
              <td>Paket Soal</td>
              <td>
              <select class="select2" name="unitpaket" >
                                    <option disabled>Default select</option>
                                    <?php foreach ($paket as $a) : ?>
                                                <option value="<?=$a->id?>"><?=$a->nama_paket ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
            </tr>
            <tr style="display: none" id="tr_mapel">
              <td>Mata Pelajaran</td>
              < <td>
              <select class="select2" name="unit" onchange="return __ambil_jumlah_soal(this.value);" >
                                    <option disabled>Default select</option>
                                    <?php foreach ($mapel as $a) : ?>
                                                <option value="<?=$a->id_soal?>"><?=$a->mp_nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
            </tr>
            <tr style="display: none" id="tr_jumlah_soal">
              <td>Jumlah soal</td>
              <td>
                <?php
                echo form_input('jumlah_soal_max', '', 'class="form-control" name="jumlah_soal_max" id="jumlah_soal_max" disabled style="float: left; width: 200px; display: inline"');
                echo form_input('jumlah_soal', '', 'class="form-control" name="Jumlah_soal" id="jumlah_soal" oninput="return totals();"  width: 200px; display: inline"'); ?>
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-minus-circle"></i> Tutup</button>
      </div>
      </form> </div>
                              </div>
                             </div>
                            </div>
                         </div>
                     </div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>
<script>
//ujian
function m_ujian_e(id) {
    $("#m_ujian").modal('show');
    $.ajax({
        type: "GET",
        url: "<?php echo base_url(); ?>ujian/det/" + id,
        success: function (data) {
            $("#id").val(data.id);
            $("#nama_ujian").val(data.nama_ujian);
            $("#mapel").val(data.id_mapel);
            $("#jumlah_soal").val(data.jumlah_soal);
            $("#waktu").val(data.waktu);
            $("#terlambat").val(data.terlambat);
            $("#tgl_mulai").val(data.tgl_mulai);
            $("#wkt_mulai").val(data.wkt_mulai);
            $("#tgl_selesai").val(data.tgl_selesai);
            $("#wkt_selesai").val(data.wkt_selesai);
            $("#acak").val(data.jenis);
            $("#kode").val(data.token);
            $("#paket").val(data.id_paket);
            $("#nama_ujian").focus();
            // console.log(data.id_mapel);
            __ambil_jumlah_soal(data.id_mapel);
            change_jenis();
        }
    });

    return false;
}


function m_ujian_s() {
    var f_asal = $("#f_ujian").serialize();

    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>ujian/simpan',
        data: f_asal,
        success: function(res) {
            if (res) {
                $("#tambah").modal('hide');
            } else {
                alert(res);
                $("#tambah").modal('hide');
             
            }            
        },
        error: function(xhr) {
            // console.log(xhr);
           
        }
    });

    return false;
}

function m_ujian_h(id) {
    if (confirm('Anda yakin..?')) {
        $.ajax({
            type: "GET",
            url: base_url + "m_ujian/hapus/" + id,
            success: function (response) {
                if (response.status == "ok") {
                    pagination("datatabel", base_url + "m_ujian/data", []);
                } else {
                    console.log('gagal');
                }
            }
        });
    }

    return false;
}
function refresh_token(id) {
    $.ajax({
        type: "GET",
        url: base_url + "adm/m_ujian/refresh_token/" + id,
        success: function (response) {
            if (response.status == "ok") {
                pagination("datatabel", base_url + "adm/m_ujian/data", []);
            } else {
                console.log('gagal');
            }
        }
    });

    return false;
}
function __ambil_jumlah_soal(id_mapel) {
    if (id_mapel == "") {
        id_mapel = 0;
    }
    $.ajax({
        type: "GET",
        url: "<?php echo base_url(); ?>ujian/jumlah_soal/" + id_mapel,
        beforeSend: function () {
            $("#f_ujian input, select, button").attr("readonly", true);
        },
        success: function (response) {
            $("#f_ujian input, select, button").attr("readonly", false);
            $("#jumlah_soal_max").val(response);
        }
    });
    return false;
}


function change_jenis() {
    let jenis = $("#acak").val();

    if (jenis == "acak") {
        $("#tr_mapel").show();
        $("#tr_jumlah_soal").show();
        $("#tr_paket").hide();
    } else if (jenis == "paket") {
        $("#tr_mapel").hide();
        $("#tr_jumlah_soal").hide();
        $("#tr_paket").show();
    }
}



function totals() {
    let maxsoal = parseInt($("#jumlah_soal_max").val());
    let soal    = parseInt($("#jumlah_soal").val());
   
    if (soal > maxsoal) {
         alert("Jumlah yang anda input melebihi jumlah soal yang ada");    
     $("#jumlah_soal").val('0');
    } else if (soal < 0) {
       alert("Jumlah yang anda input tidak sesuai");    
     $("#jumlah_soal").val('0');
    }
}
</script>

