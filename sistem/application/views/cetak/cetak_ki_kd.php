<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta charset='UTF-8'>
    <link rel="shortcut icon" href="<?= base_url('assets/kartu/logo/') . "unnamed.png"; ?>">
    <title><?php echo $mata_pelajaran ?> | <?php echo $kd; ?></title>
</head>
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
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
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<style>
    .ttd p {
        font-size: 18px;
    }

    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }


    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    h1 {
        margin: 0;
        font-size: 24px;
        text-align: center;
        line-height: 35px;
    }

    p {
        font-weight: 400;
        margin: 0;
        font-size: 12px;
        text-align: center;
    }

    /*tambahan*/
</style>

<body>
    <center>
        <div style="display:inline-block;vertical-align:middle;">
            <img style="vertical-align:middle;width:70px;margin:0 auto;" src="<?php
                                                                                echo base_url('assets/img/corefiles/' . $logo) ?>">
        </div>

        <div style="display:inline-block;vertical-align:middle;">
            <h1></h1>
            <h1><?php echo $nama_sekolah; ?></h1>
            <p><?php echo $alamat_sekolah; ?></p>
            <p><?php echo $kontak_sekolah; ?></p>
        </div>
    </center>
    <hr>
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="container-fluid">
                <div class="row">
                    <!-- DATA KELAS -->
                    <div class="col-md-8">

                        <div class="card card-info card-outline">

                            <div class="card-header">
                                <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i>
                                    <center> Kompetensi Inti - Kompetensi Dasar </center>
                                </h3>
                            </div>
                        </div>
                    </div>
                    Sekolah : <?php echo $nama_sekolah; ?><br />
                    <!-- Kelas : <br/>
                    Semester : 2<br/> -->
                    Mata Pelajaran : <?php echo $mata_pelajaran; ?><br/>
                    Jumlah Pertemuan :  <br />
					<br/>
					Tujuan kurikulum mencakup empat aspek kompetensi, yaitu (1)
					aspek kompetensi sikap spiritual, (2) sikap sosial, (3) pengetahuan, dan (4)
					keterampilan. Aspek-aspek kompetensi tersebut dicapai melalui proses
					pembelajaran intrakurikuler, kokurikuler, dan ekstrakurikuler.
					<br/><br/>
					Rumusan kompetensi sikap spiritual yaitu, “Menghayati dan
					mengamalkan ajaran agama yang dianutnya”. Sedangkan rumusan
					kompetensi sikap sosial yaitu, “Menghayati dan mengamalkan perilaku
					jujur, disiplin, santun, peduli (gotong royong, kerja sama, toleran, damai),
					bertanggung-jawab, responsif, dan proaktif melalui keteladanan,
					pemberian nasihat, penguatan, pembiasaan, dan pengkondisian secara
					berkesinambungan serta menunjukkan sikap sebagai bagian dari solusi
					atas berbagai permasalahan dalam berinteraksi secara efektif dengan
					lingkungan sosial dan alam serta dalam menempatkan diri sebagai
					cerminan bangsa dalam pergaulan dunia”. Kedua kompetensi tersebut
					dicapai melalui pembelajaran tidak langsung (indirect teaching) yaitu
					keteladanan, pembiasaan, dan budaya sekolah, dengan memperhatikan
					karakteristik mata pelajaran serta kebutuhan dan kondisi peserta didik.
					<br/><br/>
					Penumbuhan dan pengembangan kompetensi sikap dilakukan
					sepanjang proses pembelajaran berlangsung, dan dapat digunakan sebagai
					pertimbangan guru dalam mengembangkan karakter peserta didik lebih
					lanjut
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h5 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i>
                                    <center>(<?php echo $kd; ?>)</center>
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <table id="table" class="table display text-nowrap" cellspacing="0" width="100%" style="font-size:11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="text-align: center;">NO</th>
                                            <th rowspan="2" style="text-align: center;">KOMPETENSI DASAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <td>1</td>
                                    <td><?php echo $bagan; ?></td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- /.col -->
    </div>
    <br><br>
    <div class="ttd" style="float:right;text-align:left !important;">

        <p style="margin:0;">Jakarta, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
        <br><br><br><br><br>

        <!--<p style="margin:0;">(<?php echo $nama_siswa; ?>)</p>-->
    </div>

</body>

</html>