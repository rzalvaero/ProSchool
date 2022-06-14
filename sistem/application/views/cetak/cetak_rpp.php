<!DOCTYPE html>

<head>
    <title>RPP</title>
    <meta charset="utf-8">
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
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            /* /border: 1px solid; */
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>

</head>

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
    <div id=halaman>

        <h3 id=judul>RENCANA PELAKSANAAN PEMBELAJARAN</h3>

        <p></p>

        <table>
            <tr>
                <td style="width: 30%;">Sekolah</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $nama_sekolah; ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Mata Pelajaran </td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $mata_pelajaran; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Kelas/Semester </td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;"></td>
            </tr>
            <tr>
                <td style="width: 30%;">Tahun Pelajaran</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $idtahun_pelajaran; ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Alokasi Waktu</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php echo $alokasi; ?></td>
            </tr>
        </table>

        <p>Rencana Pembelajaran - <?php echo $mata_pelajaran; ?> dibagi menjadi :</p>
        <p>
            <b>I. Tujuan Pembelajaran</b><br />
            <?php echo $tujuan; ?>
        </p>

        <p>
            <b>II. Materi Pembelajaran</b><br />
            <?php echo $materi; ?>
        </p>

        <p>
            <b>III. Metode Pembelajaran</b><br />
            <?php echo $metode; ?>

        <p>
            <b>IV. Media Pembelajaran</b><br />
            <?php echo $media; ?>

        <p>
            <b>V. Sumber Pembelajaran</b><br />
            <?php echo $sumber; ?>
        </p>

        <p>
            <b>VI. Penilaian</b><br />
            <?php echo $penilaian; ?>
        </p>


        <div class="ttd" style="float:right;text-align:left !important;">

            <p style="margin:0;">Jakarta, <?php echo tgl_indo(date("Y-m-d")); ?> </p>
            <br><br><br><br><br>

        </div>
        <!-- <div style="width: 50%; text-align: left; float: right;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">Arbrian Abdul Jamal</div> -->

    </div>
</body>

</html>