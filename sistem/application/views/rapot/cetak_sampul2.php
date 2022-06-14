<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<style type="text/css">
		body {font-family: arial; font-size: 12pt}
		.table {border-collapse: collapse; border: solid 1px #999; width:100%}
		.table tr td, .table tr th {border:  solid 1px #999; padding: 3px; font-size: 12px}
		.rgt {text-align: right;}
		.ctr {text-align: center;}
		table tr td {vertical-align: top}
	</style>
</head>
<body>
	<center>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php
                               $no = 1;
                                 foreach ($sekolah as $d):
                            ?>
		<b>LAPORAN</b><br><br>
		HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK<br>
		<?= $d->nama_sekolah; ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<table style="margin-left:10%; width: 70%">
			<tr>
				<td width="20%">Nama Sekolah</td>
				<td width="2%">:</td>
				<td width="50%"><?= $d->nama_sekolah; ?></td>
			</tr>
			<tr>
				<td>NIK/NPSN</td>
				<td>:</td>
				<td><?= $d->nss; ?> / <?= $d->npsn; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $d->alamat; ?></td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td>:</td>
				<td><?= $d->kelurahan; ?></td>
			</tr>
			<tr>
				<td>Kecamatan</td>
				<td>:</td>
				<td><?= $d->kecamatan; ?></td>
			</tr>
			<tr>
				<td>Kabupaten/Kota</td>
				<td>:</td>
				<td><?= $d->kabupaten; ?></td>
			</tr>
			<tr>
				<td>Propinsi</td>
				<td>:</td>
				<td><?= $d->provinsi; ?></td>
			</tr>
			<tr>
				<td>Website</td>
				<td>:</td>
				<td>www.proschool.id</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= $d->email; ?></td>
			</tr>
		</table>

	 <?php endforeach; ?>

	</center>
	
</body>
</html>