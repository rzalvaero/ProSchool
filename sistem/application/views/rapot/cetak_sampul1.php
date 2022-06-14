<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<style type="text/css">
		body {font-family: arial; font-size: 12pt; border: solid 3px #000; padding-bottom: 100px}
		.table {border-collapse: collapse; border: solid 1px #999; width:100%}
		.table tr td, .table tr th {border:  solid 1px #999; padding: 3px; font-size: 12px}
		.rgt {text-align: right;}
		.ctr {text-align: center;}
	</style>
</head>
<body>
	<center>
		<br><br><br><br>
		 <?php
                               $no = 1;
                                 foreach ($sekolah as $d):
                            ?>
		<img src="<?php echo base_url(); ?>assets/img/logo.jpg"><br><br><br>
		<span style="font-size: 14pt"><b style="font-size: 18pt">LAPORAN</b><br>
		HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK<br>
		<?= $d->nama_sekolah; ?>
		</span>
		<br>
		<br>
		<br>
		<br>
		<br>
		<img src="<?php echo base_url(); ?>assets/img/logo10.png"><br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<p>Nama Peserta Didik</p>
		<div style="display: inline-block; font-weight: bold; padding: 15px; width: 300px; border: solid 1px #000"><?php echo $ds['s_nama']; ?></div><br>
		<p>NIS / NISN</p>
		<div style="display: inline-block; font-weight: bold; padding: 15px; width: 300px; border: solid 1px #000"><?php echo $ds['s_nik']." / ".$ds['s_nisn']; ?></div><br>
		<br>
		<br>
		<br>
		<?= $d->alamat; ?>

	 <?php endforeach; ?>


	</center>
	
</body>
</html>