<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<style type="text/css">
		
		body {font-family: arial; font-size: 11pt; width: 8.5in}
		.table {border-collapse: collapse; border: solid 1px #999; width:100%}
		.table tr td, .table tr th {border:  solid 1px #000; padding: 3px;}
		.table tr th {font-weight: bold; text-align: center}
		.rgt {text-align: right;}
		.ctr {text-align: center;}
		.tbl {font-weight: bold}

		table tr td {vertical-align: top}
		.font_kecil {font-size: 8px}
		
		
		h1 {
			font-weight: bold;
			font-size: 20pt;
			text-align: center;
		}
	  
		table {
			border-collapse: collapse;
			width: 90%;
		}
	  
		.table th {
			padding: 8px 8px;
			border:1px solid #000000;
			text-align: center;
		}
	  
		.table td {
			padding: 3px 3px;
			border:1px solid #000000;
		}
	  
		.text-center {
			text-align: center;
		}
	</style>
</head>
<body>
	<table>
			<?php
                               $no = 1;
                                 foreach ($sekolah as $d):
                            ?>
		<tr>
			<td width="10%">
			<img src="<?php echo base_url(); ?>assets/img/logo10.png" style="margin-top: 10px; width: 90px; height: 80px">
			</td>
			<td style="text-align: center"><b>
			<?= $d->nama_sekolah; ?><br></b>
			<span style="font-size: 10pt">Alamat : <?= $d->alamat; ?>. <br>
			Telp : <?= $d->no_telepon; ?> | Web : http://proschool.id/</span>
			</td>
		</tr>
		<tr><td colspan="2"><hr style="border: solid 2px #000"></td></tr>
		<br/>
		<tr><td colspan="2" style="text-align: center; font-weight: bold; font-size: 14pt">KETERANGAN DIRI TENTANG PESERTA DIDIK</td></tr>
		<tr><td colspan="2">
		<br/>
		<br/>
			<table width="100%">
				<tr><td width="3%">1.</td><td width="40%">Nama Peserta Didik (Lengkap)</td><td width="2%">:</td><td width="55%"><?= $d->s_nama; ?></td></tr>
				<tr><td>2.</td><td>Nomor Induk</td><td>:</td><td><?= $d->s_nik; ?></td></tr>
				<tr><td>3.</td><td>NISN</td><td>:</td><td><?= $d->s_nisn; ?></td></tr>
				<tr><td>4.</td><td>Tempat, Tanggal Lahir</td><td>:</td><td><?= $d->city_name; ?>, <?= $d->s_tanggal_lahir; ?></td></tr>
				<tr><td>5.</td><td>Jenis Kelamin</td><td>:</td><td><?= $d->s_jenis_kelamin; ?></td></tr>
				<tr><td>6.</td><td>Alamat Peserta Didik</td><td>:</td><td>Dusun <?= $d->s_dusun; ?>, Desa <?= $d->s_desa; ?>,<?= $d->s_kecamatan; ?></td></tr>
				<tr><td>7.</td><td>Orang Tua</td><td>:</td><td></td></tr>
				<tr><td></td><td>a. Nama Ayah</td><td>:</td><td><?= $d->s_wali; ?></td></tr>
				<tr><td></td><td>c. Alamat</td><td>:</td><td>Dusun <?= $d->s_dusun; ?>, Desa <?= $d->s_desa; ?>,<?= $d->s_kecamatan; ?></td></tr>
				<tr><td></td><td>d. Telepon/HP</td><td>:</td><td><?= $d->s_telepon; ?></td></tr>
				<tr><td>15.</td><td>Pekerjaan Orang Tua</td><td>:</td><td></td></tr>
				<tr><td></td><td>a. Ayah</td><td>:</td><td>Wiraswasta</td></tr>
				<tr><td></td><td>b. Ibu</td><td>:</td><td>Ibu Rumah Tangga</td></tr>
			</table>
		</td>
		</tr>		
	</table>
	<br><br>
	<div style="margin-left: 20%; display: inline; float: left; width: 3cm; height: 3.7cm; border: solid 1px #000"></div>
	<div style="margin-left: 120px; display: inline; float: left;">
		<?= $d->kabupaten; ?>, <?=
							 date("Y-m-d");
							?><br>
		Kepala Sekolah<br>
		<br>
		<br>
		<br>
		<br>
		<b><u><?= $d->kepsek; ?></u></b><br>
		NIP. <?= $d->u_nbm_nip; ?>
	</div>

	 <?php endforeach; ?>
</body>
</html>