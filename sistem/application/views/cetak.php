<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
	<meta charset='UTF-8'>
	<link rel="shortcut icon" href="<?= base_url('assets/kartu/logo/') . "unnamed.png"; ?>">
	<title>Cetak Kartu Pelajar</title>
</head>
<style>
	@media print {
		* {
			-webkit-print-color-adjust: exact;
		}
	}

	@page {
		size: 21cm 30cm;
		margin: 5mm 7mm 5mm 7mm;
		/* change the margins as you want them to be. */
	}

	table {
		border-spacing: 0px;
	}

	/* cellspacing */

	th,
	td {
		padding: 0px;
	}
</style>

<body onload='window.print()' style="font-size: 12px;margin-top:0;position:absolute;">
	<div style="width: 925px; height: 267px; margin-bottom:10px; background-image: url('<?= base_url('assets/img/corefiles/') . $design; ?>');">
		<img style="border: 1px solid #ffffff;position: absolute;margin-left: 323px;margin-top: 112px;" src="<?= base_url('assets/img/corefiles/') . "users.png"; ?>" width="75.5px" height="94.4px">
		<img style="position: absolute;margin-left: 65px;margin-top: 135px;" src="<?= base_url('assets/img/corefiles/test.png'); ?>" width="75.5px" height="75.5px">
		<img style="position: absolute;margin-left: 20px;margin-top: 20px;" src="<?= base_url('assets/img/corefiles/') . $logo ?>" width="65.5px" height="75.5px">
		<img style="position: absolute;margin-left: 530px;margin-top: 150px;" src="<?= base_url('assets/img/corefiles/') . $ttd ; ?>" width="60px" height="55px">
		<img style="position: absolute;margin-left: 530px;margin-top: 150px;" src="<?= base_url('assets/img/corefiles/') . $stampel; ?>" width="60px" height="55px">
		<div style="padding-top: 5px;">
			<p style="margin-top: 10px; right:520px; position: absolute;font-family: Cambria;font-size: 18px;text-transform: uppercase;"><strong><?php echo $nama_sekolah; ?></strong></p>
			<p style="margin-top: 30px; right:520px; position: absolute;font-family: Cambria;font-size: 18px;text-transform: uppercase;"><strong><?php echo $kabupaten; ?></strong></p>
			<p style="margin-top: 50px; right:520px; position: absolute;font-family: Cambria;font-size: 25px;"><strong>KARTU PELAJAR</strong></p>
			<!--<p style="margin-top: 35px; right:265px; position: absolute;font-family: Cambria;font-size: 12px;"><strong><?php echo $nama_sekolah; ?></strong></p>-->
			<table style="margin-top: 90px; position: absolute; right:610px; text-align: right; font-family: Cambria;font-size: 12px;">
				<br><br>
				<tr>
					<td><?php echo $s_nisn; ?></td>
				</tr>
				<tr>
					<td><strong style="font-size: 12px;"><?php echo $nama_siswa; ?></strong></td>
				</tr>
				<tr>
					<td><?php echo $s_desa ; ?>, <?php echo $s_dob ; ?></td>
				</tr>
				<tr>
					<td><?php echo $s_email ; ?></td>
				</tr>
				</tr>
			</table>
		</div>
		<p style="font-family:Verdana; right:525px; margin-top: 210px; text-align:right; padding-left: 10px;font-size: 8px;  position: absolute;">Alamat: <?php echo $alamat ?> - Kode Pos <?php echo $kodepos ?><br> Email: <?php echo $email ?> | Telp. <?= $no_telepon; ?></p>
		<p style="margin-top:10px;margin-bottom:-5px; padding-left: 570px; color:white; font-family:monospace;font-size: 16px;text-align: right; padding-right: 20px"><strong>TATA TERTIB SEKOLAH</strong><br>
			<div style=" list-style-position: inside; padding-left: 600px; color:white;  font-family:arial, serif;font-size: 12px;text-align: right; padding-right: 20px">
				<ol>
					1. Disiplin, dan tepat waktu<br>
					2. Taat dan hormat kepada semua Guru dan karyawan <?php echo $nama_sekolah; ?><br>
					3. Mena'ati Peraturan di <?php echo $nama_sekolah; ?><br>
					4. Selalu menjaga nama baik <?php echo $nama_sekolah; ?><br>
					5. Siswa harus hadir sebelum jam pembelajaran<br>
				</ol>
			</div>
		</p>
		<p style="position: absolute;padding-left: 550px;margin-top: -10px;font-size: 10px; font-family: arial;">
			<?php echo $kabupaten; ?>,
			<?php
			$tanggal = date("j");
			$bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
			$bulan = $bulan[date("n")];
			$tahun = date("Y");
			echo $tanggal . " " . $bulan . " " . $tahun;
			?>
		</p><br>
		<p style="position: absolute;padding-left: 550px;margin-top: -10px;font-size: 10px; font-family: arial;">Mengetahui, <br>Kepala <?php echo $nama_sekolah; ?> <?php echo $kabupaten; ?></p>
		<br>
		<p style="position: absolute;padding-left: 550px;margin-top: 20px;font-size: 10px; font-family: arial;"><strong><u><?php echo $kepsek ; ?></u></strong></p>
	</div>

	</div>
</body>

</html>