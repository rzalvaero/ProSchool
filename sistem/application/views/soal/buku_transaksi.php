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
        width: 80%;
    }

    table td,
    table th {
       
        padding: 8px;
    }


    table tr:nth-child(even) {
        
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
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
        font-size: 14px;
        text-align: center;
    }
</style>

<body>
    
  

            <div class="container-fluid">
                <div class="row">
                    <!-- DATA KELAS -->
                    <div class="col-md-8">
                        

                            <div class="card-header">
                                <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i>
                                     <?php
                               
                                 foreach ($mp as $mata_pelajaran):
                            ?>
                                    <center> Hasil Ujian <?php echo $mata_pelajaran['mp_nama']; ?></center>
                                  
                <?php endforeach; ?>
                                </h3>
                            </div>
                             <div class="col-md-7">
          <div class="panel panel-default">
            <div class="panel-body">
                 <?php
                               
                                 foreach ($detil_pakets as $detil_paket):
                            ?>
                <div class='alert alert-info'>Anda telah selesai mengikuti ujian ini pada : <strong style='font-size: 16px'><?php echo $detil_paket['tgl_selesai']; ?></strong>, <br>dan mendapatkan nilai : <strong style='font-size: 16px'><?php echo $detil_paket['nilai']; ?></strong>
            <h4>Statistik</h4>
              <table class="table" style="border: none;" >
                <tr>
                  <td width="7%">Jumlah benar</td>
                  <td width="65%"><?php echo $detil_paket['jml_benar']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah salah</td>
                  <td><?php echo $detil_paket['jml_salah']; ?></td>
                </tr>
              </table>
                <?php endforeach; ?>
            </div>


          </div>
            </div>
        </div>
<br>
        <div class="panel panel-default">
            <div class="panel-body">
                 <?php
                             $no = 1;    
                                 foreach ($soal as $soals):
                            ?>
              <table class="table"  cellspacing="0" cellpadding="0">
                <tr>
                  <td ><?= $no++; ?>.</td>
                  <td ><?php echo $soals['soal']; ?></td>
                </tr>
                <tr>
                  <td >A</td>
                  <td ><?php echo $soals['opsi_a']; ?></td>
                </tr>
                <tr>
                  <td >B</td>
                  <td ><?php echo $soals['opsi_b']; ?></td>
                </tr>
                <tr>
                  <td >C</td>
                  <td ><?php echo $soals['opsi_c']; ?></td>
                </tr>
                <tr>
                  <td >D</td>
                  <td ><?php echo $soals['opsi_d']; ?></td>
                </tr>
                <tr>
                  <td >E</td>
                  <td ><?php echo $soals['opsi_e']; ?></td>
                </tr>
              </table>
<br>
              Jawaban Anda <?php echo $soals['jawaban_user']; ?>
                <?php endforeach; ?>
            </div>

            
          </div>
            </div>
        </div>
</div>
</div>
        </div>
    </div><!-- /.col -->
    </div>
    <br><br>
    

</body>