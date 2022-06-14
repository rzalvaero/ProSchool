
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
<!--        <img style="float:left;width:80px;height:80px;" src="--><?php //echo 'http://'.$_SERVER['SERVER_NAME'].'/upload/'.$sekolah->logo; ?><!--">-->
        <h3 style="margin:0;"><?php echo $nama_sekolah; ?></h3>
        <p style="margin:0;"><?php echo $alamat; ?> </p>
        <p style="margin:0;">Telp. <?php echo $no_telepon;  ?></p>
        <p style="margin:0;">E-mail : <?php echo $email; ?></p>
    </div>
    <div style="float:right;">


        <table>
            <tr>
                <td>Tanggal Cetak </td>
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
        <table>

            <tr>
                <td style="font-size:14px;">BUKTI PEMBAYARAN</td>
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
            $no = 1;
            $total_bayar = 0;
            $tagihanx = 0;
            $pembayaran_bebas = $this->db->query("SELECT nama_pos,tingkat,tagihan,pembayaran_bebas_dt.bayar,pembayaran_bebas_dt.tanggal FROM pembayaran_bebas_dt 
                    INNER JOIN sr_pembayaran_bebas ON sr_pembayaran_bebas.id_pembayaran_bebas = pembayaran_bebas_dt.id_pembayaran_bebas 
                   	join sr_jenis_bayar on sr_pembayaran_bebas.id_jenis_pembayaran = sr_jenis_bayar.id_jenis_bayar
					join sr_pos_pembayaran on sr_pos_pembayaran.id_pos = sr_jenis_bayar.id_pos WHERE pembayaran_bebas_dt.id_pembayaran_bebas = '$id_pembayaran_bebas' ORDER BY id_pembayaran_bebas_dt ASC");
            foreach ($pembayaran_bebas->result_array() as $data) {
                $total_bayar += $data['bayar'];
                if ($no == 1) {
                    $tagihan = 'Rp ' . number_format($data['tagihan']);
                    $tagihanx = $data['tagihan'];
                } else {
                    $tagihan = '';
                }
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                    <td><?php echo $data['nama_pos'] . ' ' . $data['tingkat']; ?></td>
                    <td><?php echo $tagihan; ?></td>
                    <td style="text-align:right;">Rp <?php echo number_format($data['bayar']); ?></td>
                </tr>
                <?php $no++;
            }  ?>
            <tr>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf" style="text-align:left;">Total Pembayaran</td>
                <td class="tf" style="text-align:right;">Rp <?php echo number_format($total_bayar); ?></td>
            </tr>
            <tr>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf" style="text-align:left;"></td>
                <td class="tf" style="text-align:right;"><?php echo terbilang($total_bayar); ?> Rupiah</td>
            </tr>
            <tr>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf" style="text-align:left;">Sisa Tagihan</td>
                <td class="tf" style="text-align:right;">Rp <?php echo number_format($tagihanx - $total_bayar); ?></td>
            </tr>
            <tr>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf"></td>
                <td class="tf" style="text-align:left;"></td>
                <td class="tf" style="text-align:right;"><?php echo terbilang($tagihanx - $total_bayar); ?> Rupiah</td>
            </tr>
        </tbody>
    </table>


    <br><br>
    <div style="float:left;width:350px;">
        <p style="margin:0;">Ttd<p><br><br><br><br>
                <p style="margin:0;text-transform:uppercase;"></p>
                <p style="margin:0;">(<?php echo $nama_siswa; ?> )</p>
    </div>

    <div style="float:left;width:350px;">
        <p style="margin:0;">Bandar Lampung, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
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