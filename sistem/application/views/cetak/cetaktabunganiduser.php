
<!DOCTYPE html>
<html>

<head>
	<title>Bukti Pembayaran</title>

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
<div class="row">
	<div class="col-md-6">
		<h3 style="margin:0;"><?php echo $nama_sekolah; ?></h3>
		<p style="margin:0;"><?php echo $alamat; ?> </p>
		<p style="margin:0;">Telp. <?php echo $no_telepon;  ?></p>
		<p style="margin:0;">E-mail : <?php echo $email; ?></p>

	</div>
	<div class="col-md-6">
		<table>

			<tr>
				<td>Tanggal </td>
				<td><?php echo date("d-m-Y"); ?></td>
			</tr>
			<tr>
				<td>NIS</td>
				<td><?php echo $nisn; ?></td>
			</tr>
			<tr>
				<td>Nama </td>
				<td><?php echo $first_name; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><?php echo $kelas; ?></td>
			</tr>


		</table>
	</div>
</div>
<div style="float:left;width:450px;">
	<!--        --><?php
	//        if (empty($logo)) {
	//            $logo = "noimage.jpg";
	//        }
	//        ?>
	<!--        <img style="float:left;width:80px;height:80px;" src="--><?php //echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/'.$sekolah->logo; ?><!--">-->
</div>
<div style="float:right;">





</div>
<div style="clear:both"></div>

<br>


<div style="float:left;">
	<table>

		<tr>
			<td style="font-size:14px;">BUKTI PEMBAYARAN : <b>INV.<?php echo date("d/M/Y").'.'.$nisn; ?></b></td>
		</tr>
	</table>
</div>


<div style="clear:both"></div>
<br>
<table class="table" cellpadding="5" cellspacing="0">
	<thead>
	<tr>
		<th class="th" style="text-align:left;">No</th>
		<th class="th" style="text-align:left;">Tanggal Bayar</th>
		<th class="th" style="text-align:left;">Pembayaran</th>
		<th class="th" style="text-align:left;">Tagihan</th>
		<th class="th" style="text-align:left;">Jumlah Bayar</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($list as $item):
		?>
		<tr>
			<td class="tf"><?=$item->s_nama?></td>
			<td class="tf"><?php echo $item->deskripsi ?></td>
			<td class="tf" style="text-align:left;"><?= number_format($item->debet)?></td>
			<td class="tf" style="text-align:right;"><?= number_format($item->credit)?></td>
			<td class="tf" style="text-align:right;"><?= number_format($item->saldo)?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>


<br><br>
<div class="row">
	<div class="col-md-6">
			<p style="margin:0;">Ttd<p><br><br><br><br>
			<p style="margin:0;text-transform:uppercase;"></p>
			<p style="margin:0;">(<?php echo $first_name; ?> )</p>
		</div>
	<div class="col-md-6">
		<p style="margin:0;">Jakarta, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
		<p style="margin:0;">Mengetahui</p>
		<br><br><br><br><br>
		<p style="margin:0;text-transform:uppercase;"></p>
		<p style="margin:0;">(<?php echo $this->session->userdata("first_name"); ?>)</p>
	</div>
</div>

</body>

</html>

<script>
	window.print();
</script>
