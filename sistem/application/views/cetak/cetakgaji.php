<!DOCTYPE html>
<html>

<head>
	<title>Bukti Pembayaran</title>

	<style>
		/*@media print {*/

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
		/*}*/
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
			<td>: <?php echo $u_nbm_nip; ?></td>
		</tr>
		<tr>
			<td>Nama </td>
			<td>: <?php echo $first_name; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>: <?php echo $phone; ?></td>
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
			<td style="font-size:14px;">BUKTI PEMBAYARAN : <b>INV.<?php echo date("d/M/Y").'.'.$first_name; ?></b></td>
		</tr>
	</table>
</div>


<div style="clear:both"></div>
<br>
<div class="row">
	<div class="col-md-4">
<table class="table" cellpadding="5" cellspacing="0">
	<thead>
	<tr>
		<th class="th" style="text-align:left;">Gaji Pokok</th>
		<th class="th" style="text-align:right;">Nominal</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$totalgaji=0;
	$gaji = $this->db->query("select * from sr_tarif_gaji_user
     join sr_setting_tunjangan on sr_tarif_gaji_user.id_tunjangan = sr_setting_tunjangan.id_setting_tunjangan
where id_user = '$id_user'
group by id_gaji")->result();
	foreach ($gaji as $item){
	?>
			<tr>
				<td><?=$item->nama_setting_tunjangan  ?> </td>
				<td style="float: right"><?=number_format($item->nominal_setting_tunjangan ) ?> </td>
			</tr>

	<?php $totalgaji+=$item->nominal_setting_tunjangan; }  ?>
	<tr>
		<td><h3>Total Gaji</h3></td>
		<td style="float:right;"><h4><?= number_format($totalgaji)?></h4></td>
	</tr>
	</tbody>
</table>
	</div>
	<div class="col-md-4">
		<table class="table" cellpadding="5" cellspacing="0"  >
			<thead>
			<tr>
				<th class="th" style="text-align:left;border-bottom-style: none">Potongan</th>
				<th class="th" style="text-align:right;border-bottom-style: none"></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$potongan=0;
			$gaji = $this->db->query("select * from sr_tarif_gaji_user
     join sr_setting_potongan on sr_setting_potongan.id_setting_potongan = sr_tarif_gaji_user.id_potongan
where id_user = '$id_user'
group by id_gaji")->result();
			foreach ($gaji as $item){
				?>
				<tr>
					<td><?=$item->nama_setting_potongan  ?> </td>
					<td style="float: right"><?=$item->nominal_setting_potongan  ?> </td>
				</tr>
			<?php $potongan +=$item->nominal_setting_potongan  ; }  ?>
			<tr>
				<td><h4>Total Potongan</h4></td>
				<td style="float:right;"><h4><?= number_format($potongan)?></h4></td>
			</tr>

			</tbody>
		</table>
	</div>

	<div class="col-md-4">
		<table class="table" cellpadding="5" cellspacing="0" >
			<thead>
			<tr>
				<th class="th" style="text-align:left;">Potongan</th>
				<th class="th" style="text-align:right;"></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$lain= 0;
			$gaji = $this->db->query("select * from sr_tarif_gaji_user
     join sr_setting_pendapatan_lain_lain on sr_tarif_gaji_user.id_lain = sr_setting_pendapatan_lain_lain.id_setting_pendapatan_lain_lain
where id_user = '$id_user'
group by id_gaji")->result();
			foreach ($gaji as $item){
				?>
				<tr>
					<td><?=$item->nama_setting_pendapatan_lain_lain  ?> </td>
					<td style="float: right"><?=$item->nominal_setting_pendapatan_lain_lain  ?> </td>
				</tr>
			<?php $lain+=$item->nominal_setting_pendapatan_lain_lain ; }  ?>
			<tr>
				<td><h4>Total Pendapatan Lain</h4></td>
				<td style="float:right;"><h4><?= number_format($lain)?></h4></td>
			</tr>

			</tbody>
		</table>
		<table class="table" cellpadding="5" cellspacing="0" >

			<tbody>
			<tr>
				<td><h4>Total</h4></td>
				<td style="float:right;"><h4><?= number_format($total)?></h4></td>
			</tr>

			</tbody>
		</table>
	</div>

</div>


<br><br>
<div style="float:left;width:350px;">
	<p style="margin:0;">Ttd<p><br><br><br><br>
	<p style="margin:0;text-transform:uppercase;"></p>
	<p style="margin:0;">(<?= $first_name;?> )</p>
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
