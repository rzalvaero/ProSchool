<!DOCTYPE html>
<html>

<head>
	<title>Cetak Tabungan</title>

	<style>
		@media print {

			html,
			body {

				display: block;
				font-family: "Tahoma";
				margin: 0;
				font-size: 12px;
			}

			table {
				font-size: 12px;
				width: 100%;
				letter-spacing: 1px;
			}

			.table {
				width: 100%;
				border: solid #000 !important;
				border-width: 1px 1px 1px 1px !important;
			}

			.table td,
			.table th {
				font-weight: 100;
				/* border:solid #000 !important; */
				border-width: 0 1px 1px 0 !important;
				padding: 3px;
			}

			.table td.tf {
				font-weight: bold;
				border: solid #000 !important;
				border-width: 1px 0 0 0 !important;
			}

			.table th.th {
				font-weight: bold;
				border: solid #000 !important;
				border-width: 0 0 1px 0 !important;
			}


			@page {
				21.59cm 13.97cm;
			}
		}
	</style>

</head>

<body>
<?php


function tgl_indo($tanggal){
	$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<div style="float:left;width:450px;">
	<!--        --><?php
	//        if (empty($logo)) {
	//            $logo = "noimage.jpg";
	//        }
	//        ?>
	<!--        <img style="float:left;width:80px;height:80px;" src="--><?php //echo 'http://'.$_SERVER['SERVER_NAME'].'/assets/img/corefiles/'.$sekolah->logo; ?><!--">-->
	<h3 style="margin:0;"><?php echo $nama_sekolah; ?></h3>
	<p style="margin:0;"><?php echo $alamat; ?> </p>
	<p style="margin:0;">Telp. <?php echo $no_telepon;  ?></p>
	<p style="margin:0;">E-mail : <?php echo $email; ?></p>
</div>
<div style="float:right;">
	<table>
		<tr>
			<td>Tanggal </td>
			<td><?php echo date("d-m-Y"); ?></td>
		</tr>
		<tr>
			<td>NIS</td>
			<td><?php echo $nis; ?></td>
		</tr>
		<tr>
			<td>Nama </td>
			<td><?php echo $nama_siswa; ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><?php echo $nama_kelas; ?></td>
		</tr>

	</table>
</div>
<div style="clear:both"></div>

<br>


<div style="float:left;">
	<?php

	function bulan_kode($nama_bulan){
		$dataarr = array (
				'Januari' =>   '01',
				'Februari' =>   '02',
				'Maret' =>   '03',
				'April' =>   '04',
				'Mei' =>   '05',
				'Juni' =>   '06',
				'Juli' =>   '07',
				'Agustus' =>   '08',
				'September' =>   '09',
				'Oktober' =>   '10',
				'November' =>   '11',
				'Desember' =>   '12'
		);
		return $dataarr[$nama_bulan];
	}


	?>
	<table>

		<tr>
			<td style="font-size:14px;">BUKTI PEMBAYARAN : <b>INV.<?php echo date("d/M/Y").'.'.$nis; ?></b></td>
		</tr>
	</table>
</div>


<div style="clear:both"></div>
<br>
<table class="table" cellpadding="5" cellspacing="0">
	<thead>
	<tr>
		<th class="th" style="text-align:left;">Nama</th>
		<th class="th" style="text-align:left;">Catatan</th>
		<th class="th" style="text-align:left;">Debet</th>
		<th class="th" style="text-align:left;">Kredit</th>
	</tr>
	</thead>
	<tbody>
	<?php
	?>
	<tr>
		<td class="tf"><?=$list->s_nama?></td>
		<td class="tf"><?php echo $list->deskripsi ?></td>
		<td class="tf" style="text-align:left;"><?= $list->debet?></td>
		<td class="tf" style="text-align:right;"><?= $list->credit?></td>
	</tr>
	<tr>
		<?php
		?>
		<td class="tf" style="text-align:right;font-style:italic;">Saldo</td>
		<td class="tf" colspan="3" style="text-align:right;font-style:italic;"><?php echo terbilang($list->saldo); ?>  Rupiah</td>
	</tr>
	</tbody>
</table>


<br><br>
<div style="float:left;width:350px;">
	<p style="margin:0;">Ttd<p><br><br><br><br>
	<p style="margin:0;text-transform:uppercase;"></p>
	<p style="margin:0;">(<?= $list->s_nama;?> )</p>
</div>

<div style="float:left;width:350px;">
	<p style="margin:0;">Jakarta, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
	<p style="margin:0;">Mengetahui</p>
	<br><br><br><br><br>
	<p style="margin:0;text-transform:uppercase;"></p>
	<p style="margin:0;">(<?php echo $this->session->userdata("first_name"); ?>)</p>
</div>



</body>

</html>

<script>
	window.print();

</script>
