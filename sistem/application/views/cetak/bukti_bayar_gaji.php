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
			<td><?php echo $u_nbm_nip; ?></td>
		</tr>
		<tr>
			<td>Nama </td>
			<td><?php echo $first_name; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $u_alamat_tinggal; ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><?php echo $phone; ?></td>
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
<table class="table" cellpadding="5" cellspacing="0">
	<thead>
	<tr>
		<th class="th" style="text-align:left;">Nama</th>
		<th class="th" style="text-align:left;">Tanggal</th>
		<th class="th" style="text-align:left;">Total Gaji</th>
		<th class="th">Jumlah Pembayaran</th>
	</tr>
	</thead>
	<tbody>
<!--	--><?php
//	$no = 1;
//	$total_bayar = 0;
//	$pembayaran_bulanan = $this->db->query("SELECT bulan,nama_pos,tagihan,bayar,tanggal,tingkat FROM sr_pembayaran_bulanan
//                   	join sr_jenis_bayar on sr_pembayaran_bulanan.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
//join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos
//WHERE id_pembayaran_bulanan IN($id_pembayaran_bulanan)");
//
//	foreach ($pembayaran_bulanan->result_array() as $data) {
//		$total_bayar += $data['bayar'];
//		?>
<!--		<tr>-->
<!--			<td>--><?php //echo $no; ?><!--</td>-->
<!--			<td>--><?php //echo $data['nama_pos'] . ' - ' . $data['tingkat'] . ' - ' . $data['bulan']; ?><!--</td>-->
<!--			<td>Rp --><?php //echo number_format($data['tagihan']); ?><!--</td>-->
<!--			<td style="text-align:right;">Rp --><?php //echo number_format($data['bayar']); ?><!--</td>-->
<!--		</tr>-->
<!--		--><?php //$no++;
//	}  ?>
	<tr>
		<td class="tf"><?=$first_name?></td>
		<td class="tf"></td>
		<td class="tf" style="text-align:left;">Total Pembayaran</td>
		<td class="tf" style="text-align:right;">Rp 9000</td>
	</tr>
	<tr>
		<td class="tf" colspan="4" style="text-align:right;font-style:italic;">klsfsl Rupiah</td>
	</tr>
	</tbody>
</table>


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
