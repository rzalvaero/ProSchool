<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta charset='UTF-8'>
    <link rel="shortcut icon" href="<?= base_url('assets/kartu/logo/') . "unnamed.png"; ?>">
    <title>Silabus | <?php echo $kompetensi_dasar; ?></title>
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
                                    <center> SILABUS </center>
                                </h3>
                            </div>
                        </div>
                    </div>
                    Sekolah : <?php echo $nama_sekolah; ?><br />
                    <!-- Kelas : <br/>
                    Semester : 2<br/>
                    Mata Pelajaran : <br/> -->
                    Jumlah Pertemuan : <?php echo $alokasi; ?> <br />
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h5 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i>
                                    <center> SILABUS : (<?php echo $kompetensi_dasar; ?>)</center>
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <table id="table" class="table display text-nowrap" cellspacing="0" width="100%" style="font-size:11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="text-align: center;">NO</th>
                                            <th rowspan="2" style="text-align: center;">KOMPETENSI DASAR</th>
                                            <th rowspan="2" style="text-align: center;">INDIKATOR</th>
                                            <th rowspan="2" style="text-align: center;">MATERI PEMBELAJARAN</th>
                                            <th rowspan="2" style="text-align: center;">KEGIATAN PEMBELAJARAN</th>
                                            <th rowspan="2" style="text-align: center;">ALOKASI</th>
                                            <th colspan="3" style="text-align: center;">PENILAIAN</th>
                                            <th rowspan="2">SUMBER BELAJAR</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center;">Teknik</th>
                                            <th style="text-align: center;">Bentuk Instrument</th>
                                            <th style="text-align: center;">Instrumen</th>
                                            <!-- <td></td> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <td>1</td>
                                    <td><?php echo $kompetensi_dasar; ?></td>
                                    <td><?php echo $indikator_kd; ?></td>
                                    <td><?php echo $materi_pembelajaran_kd; ?></td>
                                    <td><?php echo $kegiatan_pembelajaran_kd; ?></td>
                                    <td><?php echo $alokasi; ?></td>
                                    <td><?php echo $tk_kd; ?></td>
                                    <td><?php echo $bi_kd; ?></td>
                                    <td><?php echo $in_kd; ?></td>
                                    <td><?php echo $sumber; ?></td>
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