<!DOCTYPE html>
<html>
<head>
  <title>Laporan Hasil Ujian</title>
  <link href='<?php echo base_url(); ?>___/css/style_print.css' rel='stylesheet' media='' type='text/css'/>
</head>
<body>

<h3>Laporan Hasil Ujian</h3>
<hr style="border: solid 1px #000"><br>

<h4>Detil Ujian</h4>
<table class="table-bordered" style="margin-bottom: 0px">
    <?php
                               
                                 foreach ($head as $d):
                            ?>
  <tr><td width="30%">Mata Pelajaran</td><td><b><?= $d->mp_nama; ?></b></td></tr>
  <tr><td>Nama Guru</td><td width="70%"><b><?= $d->first_name; ?></b></td></tr>
  <tr><td>Nama Ujian</td><td width="70%"><b><?= $d->nama_ujian; ?></b></td></tr>
  <tr><td>Waktu</td><td><b><?= $d->waktu; ?> menit</b></td></tr>
   <?php endforeach; ?>
</table>
<br><br>
<h4>Hasil Ujian</h4>
<table class="table-bordered">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th width="55%">Nama Peserta</th>
      <th width="20%">Jumlah Benar</th>
      <th width="20%">Nilai</th>
    </tr>
  </thead>

  <tbody>
    <?php
                        $no = 1;        
                                 foreach ($ct as $d):
                            ?>
  <tr>
    <td ><?= $no++; ?></td>
    <td><b><?= $d->s_nama; ?></b></td>
  <td width="70%"><b><?= $d->jml_benar; ?></b></td>
 <td width="70%"><b><?= $d->nilai; ?></b></td></tr>
   <?php endforeach; ?>
  </tbody>
</table>


</body>
</html>
