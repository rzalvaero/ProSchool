<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PPDB - ProSchool</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #2c2c2c;
        }

        body a {
            color: inherit;
            text-decoration: none;
        }

        .header__btn {
            transition-property: all;
            transition-duration: 0.2s;
            transition-timing-function: linear;
            transition-delay: 0s;
            padding: 10px 20px;
            display: inline-block;
            margin-right: 10px;
            background-color: #fff;
            border: 1px solid #2c2c2c;
            border-radius: 3px;
            cursor: pointer;
            outline: none;
        }

        .header__btn:last-child {
            margin-right: 0;
        }

        .header__btn:hover,
        .header__btn.js-active {
            color: #fff;
            background-color: #2c2c2c;
        }

        .header {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }

        .header__title {
            margin-bottom: 30px;
            font-size: 2.1rem;
        }

        .content {
            width: 95%;
            margin: 0 auto 50px;
        }

        .content__title {
            margin-bottom: 40px;
            font-size: 20px;
            text-align: center;
        }

        .content__title--m-sm {
            margin-bottom: 10px;
        }

        .multisteps-form__progress {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
        }

        .multisteps-form__progress-btn {
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            position: relative;
            padding-top: 20px;
            color: rgba(108, 117, 125, 0.7);
            text-indent: -9999px;
            border: none;
            background-color: transparent;
            outline: none !important;
            cursor: pointer;
        }

        @media (min-width: 500px) {
            .multisteps-form__progress-btn {
                text-indent: 0;
            }
        }

        .multisteps-form__progress-btn:before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 13px;
            height: 13px;
            content: '';
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            border: 2px solid currentColor;
            border-radius: 50%;
            background-color: #fff;
            box-sizing: border-box;
            z-index: 3;
        }

        .multisteps-form__progress-btn:after {
            position: absolute;
            top: 5px;
            left: calc(-50% - 13px / 2);
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            display: block;
            width: 100%;
            height: 2px;
            content: '';
            background-color: currentColor;
            z-index: 1;
        }

        .multisteps-form__progress-btn:first-child:after {
            display: none;
        }

        .multisteps-form__progress-btn.js-active {
            color: #007bff;
        }

        .multisteps-form__progress-btn.js-active:before {
            -webkit-transform: translateX(-50%) scale(1.2);
            transform: translateX(-50%) scale(1.2);
            background-color: currentColor;
        }

        .multisteps-form__form {
            position: relative;
        }

        .multisteps-form__panel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            opacity: 0;
            visibility: hidden;
        }

        .multisteps-form__panel.js-active {
            height: auto;
            opacity: 1;
            visibility: visible;
        }

        .multisteps-form__panel[data-animation="scaleOut"] {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .multisteps-form__panel[data-animation="scaleOut"].js-active {
            transition-property: all;
            transition-duration: 0.2s;
            transition-timing-function: linear;
            transition-delay: 0s;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .multisteps-form__panel[data-animation="slideHorz"] {
            left: 50px;
        }

        .multisteps-form__panel[data-animation="slideHorz"].js-active {
            transition-property: all;
            transition-duration: 0.25s;
            transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
            transition-delay: 0s;
            left: 0;
        }

        .multisteps-form__panel[data-animation="slideVert"] {
            top: 30px;
        }

        .multisteps-form__panel[data-animation="slideVert"].js-active {
            transition-property: all;
            transition-duration: 0.2s;
            transition-timing-function: linear;
            transition-delay: 0s;
            top: 0;
        }

        .multisteps-form__panel[data-animation="fadeIn"].js-active {
            transition-property: all;
            transition-duration: 0.3s;
            transition-timing-function: linear;
            transition-delay: 0s;
        }

        .multisteps-form__panel[data-animation="scaleIn"] {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        .multisteps-form__panel[data-animation="scaleIn"].js-active {
            transition-property: all;
            transition-duration: 0.2s;
            transition-timing-function: linear;
            transition-delay: 0s;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->

    <!--PEN HEADER-->
    <header class="header">
        <h1 class="header__title" style="font-size:15px;">FORMULIR PENERIMAAN PESERTA DIDIK BARU</h1>
    </header>
    <!--PEN CONTENT     -->
    <div class="content">
        <!--content inner-->
        <div class="content__inner">
            <div class="container overflow-hidden">
                <!--multisteps-form-->
                <div class="multisteps-form">
                    <!--progress bar-->
                    <div class="row">
                        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="User Info"><img src="https://img.icons8.com/color/45/000000/i-skin-type-3.png" /></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Address"><img src="https://img.icons8.com/color/45/000000/self-esteem.png" /></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Order Info"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/40/000000/external-period-university-flaticons-flat-flat-icons.png" /></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Order Info"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/48/000000/external-father-family-life-flaticons-flat-flat-icons.png" /></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Order Info"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/48/000000/external-mother-family-life-flaticons-flat-flat-icons.png" /></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Order Info"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/48/000000/external-sister-family-life-flaticons-flat-flat-icons.png" /></button>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-8 m-auto">
                            <?php echo $this->session->flashdata("msg");?>
                            <form class="multisteps-form__form" action="<?php echo base_url(). 'ppdb/adding'; ?>" method="post">
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Peserta</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" name="nama" type="text" placeholder="Nama Lengkap" />
                                            </div>
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="nik" type="number" placeholder="NIK" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                           <div class="col-12 col-sm-4">
                                                <select class="multisteps-form__select form-control" name="agama">
                                                    <option selected="selected" >Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Khatolik">Khatolik</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <select class="multisteps-form__select form-control" name="jenis">
                                                    <option selected="selected" >Jenis Pendaftaran</option>
                                                    <option value="Baru">Baru</option>
                                                    <option value="Pindahan">Pindahan</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="jalur">
                                                    <option selected="selected" >Jalur Pendaftaran</option>
                                                    <option value="Umum">Umum</option>
                                                    <option value="Prestasi">Prestasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="hobi" type="text" placeholder="Hobi" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="cita" type="text" placeholder="Cita-Cita" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="jenkel">
                                                    <option selected="selected">Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="tempat" type="text" placeholder="Tempat Lahir" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="tanggal" type="date" placeholder="Tanggal Lahir" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="email" type="text" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Pribadi</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="text" name="telpon" placeholder="Nomer HP" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control"  name="tinggal">
                                                    <option selected="selected">Tempat Tinggal</option>
                                                    <option value="Kos">Kos</option>
                                                    <option value="Rumah Sendiri">Rumah Sendiri</option>
                                                    <option value="Panti Asuhan">Panti Asuhan</option>
                                                    <option value="Wali">Wali</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-2 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="rt" type="text" placeholder="RT" />
                                            </div>
                                            <div class="col-12 col-sm-2 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="rw" type="text" placeholder="RW" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col">
                                                <textarea class="multisteps-form__input form-control" name="alamat" type="text" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <select class="multisteps-form__select form-control" name="province" id="province">
                                                    <option>Pilih Provinsi</option>
                                                    <?php foreach ($province->result() as $row) : ?>
                                                        <option value="<?php echo $row->province; ?>"><?php echo $row->province; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0" name="kota" id="kota">
                                                <select class="kota multisteps-form__select form-control">
                                                    <option>Pilih Kota</option>
                                                </select>
                                            </div>
                                            <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="kodepos" type="text" placeholder="Kode POS" />
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                                <!--single form panel-->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Periodik</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="asal" type="text" placeholder="Asal Sekolah" />
                                            </div>
                                            <div class="col-12 col-sm-8 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="alamatsekolah" type="text" placeholder="Alamat Sekolah" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="tinggi" type="number" placeholder="Tinggi" />
                                            </div>
                                            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="berat" type="number" placeholder="Berat" />
                                            </div>
                                            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="jarak" type="number" placeholder="Jarak" />
                                            </div>
                                            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="saudara" type="number" placeholder="Saudara Kandung" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Ayah</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-12  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="text" name="ayah" placeholder="Nama Ayah Kandung *" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" type="text" name="ayahlahir" placeholder="Tahun Lahir *" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ayahpendidikan">
                                                    <option selected="selected">Pendidikan</option>
                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ayahpekerjaan">
                                                    <option selected="selected">Pekerjaan</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Pedagang">Pedagang</option>
                                                    <option value="Petani">Petani</option>
                                                    <option value="Peternak">Peternak</option>
                                                    <option value="PNS/POLRI/TNI">PNS/POLRI/TNI</option>
                                                    <option value="Wirausaha">Wirausaha</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Lainya">Lainya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">

                                            <div class="col-12 col-sm-12 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ayahpendapatan">
                                                    <option selected="selected">Pendapatan</option>
                                                    <option value="1.000.000 - 1.999.990">1.000.000 - 1.999.990</option>
                                                    <option value="2.000.000 - 4.999.990">2.000.000 - 4.999.990</option>
                                                    <option value="5.000.000 - 10.000.000">5.000.000 - 10.000.000</option>
                                                    <option value="500.000 - 999.000">500.000 - 999.000</option>
                                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                                    <option value="Lebih dari 10.000.0000">Lebih dari 10.000.0000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Ibu</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-12  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="ibu" type="text" placeholder="Nama Ibu Kandung *" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="ibulahir" type="text" placeholder="Tahun Lahir *" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ibupendidikan">
                                                    <option selected="selected">Pendidikan</option>
                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ibupekerjaan">
                                                    <option selected="selected">Pekerjaan</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Pedagang">Pedagang</option>
                                                    <option value="Petani">Petani</option>
                                                    <option value="Peternak">Peternak</option>
                                                    <option value="PNS/POLRI/TNI">PNS/POLRI/TNI</option>
                                                    <option value="Wirausaha">Wirausaha</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Lainya">Lainya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">

                                            <div class="col-12 col-sm-12 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="ibupendapatan">
                                                    <option selected="selected">Pendapatan</option>
                                                    <option value="1.000.000 - 1.999.990">1.000.000 - 1.999.990</option>
                                                    <option value="2.000.000 - 4.999.990">2.000.000 - 4.999.990</option>
                                                    <option value="5.000.000 - 10.000.000">5.000.000 - 10.000.000</option>
                                                    <option value="500.000 - 999.000">500.000 - 999.000</option>
                                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                                    <option value="Lebih dari 10.000.0000">Lebih dari 10.000.0000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Data Wali</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-12  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="wali" type="text" placeholder="Nama Wali" />
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-4  mt-4 mt-sm-0">
                                                <input class="multisteps-form__input form-control" name="walilahir" type="text" placeholder="Tahun Lahir *" />
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control">
                                                    <option selected="selected">Pendidikan</option>
                                                    <option value="SD Sederajat">SD Sederajat</option>
                                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                                    <option value="D1">D1</option>
                                                    <option value="D2">D2</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="walipekerjaan">
                                                    <option selected="selected">Pekerjaan</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Pedagang">Pedagang</option>
                                                    <option value="Petani">Petani</option>
                                                    <option value="Peternak">Peternak</option>
                                                    <option value="PNS/POLRI/TNI">PNS/POLRI/TNI</option>
                                                    <option value="Wirausaha">Wirausaha</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Lainya">Lainya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">

                                            <div class="col-12 col-sm-12 mt-4 mt-sm-0">
                                                <select class="multisteps-form__select form-control" name="walipendapatan">
                                                    <option selected="selected">Pendapatan</option>
                                                    <option value="1.000.000 - 1.999.990">1.000.000 - 1.999.990</option>
                                                    <option value="2.000.000 - 4.999.990">2.000.000 - 4.999.990</option>
                                                    <option value="5.000.000 - 10.000.000">5.000.000 - 10.000.000</option>
                                                    <option value="500.000 - 999.000">500.000 - 999.000</option>
                                                    <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                                    <option value="Lebih dari 10.000.0000">Lebih dari 10.000.0000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                                            <button class="btn btn-success ml-auto" style="width:150px;" type="submit" title="Send">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                                <!--single form panel-->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script>
    <script>
        //DOM elements
        const DOMstrings = {
            stepsBtnClass: 'multisteps-form__progress-btn',
            stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
            stepsBar: document.querySelector('.multisteps-form__progress'),
            stepsForm: document.querySelector('.multisteps-form__form'),
            stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
            stepFormPanelClass: 'multisteps-form__panel',
            stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
            stepPrevBtnClass: 'js-btn-prev',
            stepNextBtnClass: 'js-btn-next'
        };


        //remove class from a set of items
        const removeClasses = (elemSet, className) => {

            elemSet.forEach(elem => {

                elem.classList.remove(className);

            });

        };

        //return exect parent node of the element
        const findParent = (elem, parentClass) => {

            let currentNode = elem;

            while (!currentNode.classList.contains(parentClass)) {
                currentNode = currentNode.parentNode;
            }

            return currentNode;

        };

        //get active button step number
        const getActiveStep = elem => {
            return Array.from(DOMstrings.stepsBtns).indexOf(elem);
        };

        //set all steps before clicked (and clicked too) to active
        const setActiveStep = activeStepNum => {

            //remove active state from all the state
            removeClasses(DOMstrings.stepsBtns, 'js-active');

            //set picked items to active
            DOMstrings.stepsBtns.forEach((elem, index) => {

                if (index <= activeStepNum) {
                    elem.classList.add('js-active');
                }

            });
        };

        //get active panel
        const getActivePanel = () => {

            let activePanel;

            DOMstrings.stepFormPanels.forEach(elem => {

                if (elem.classList.contains('js-active')) {

                    activePanel = elem;

                }

            });

            return activePanel;

        };

        //open active panel (and close unactive panels)
        const setActivePanel = activePanelNum => {

            //remove active class from all the panels
            removeClasses(DOMstrings.stepFormPanels, 'js-active');

            //show active panel
            DOMstrings.stepFormPanels.forEach((elem, index) => {
                if (index === activePanelNum) {

                    elem.classList.add('js-active');

                    setFormHeight(elem);

                }
            });

        };

        //set form height equal to current panel height
        const formHeight = activePanel => {

            const activePanelHeight = activePanel.offsetHeight;

            DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

        };

        const setFormHeight = () => {
            const activePanel = getActivePanel();

            formHeight(activePanel);
        };

        //STEPS BAR CLICK FUNCTION
        DOMstrings.stepsBar.addEventListener('click', e => {

            //check if click target is a step button
            const eventTarget = e.target;

            if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
                return;
            }

            //get active button step number
            const activeStep = getActiveStep(eventTarget);

            //set all steps before clicked (and clicked too) to active
            setActiveStep(activeStep);

            //open active panel
            setActivePanel(activeStep);
        });

        //PREV/NEXT BTNS CLICK
        DOMstrings.stepsForm.addEventListener('click', e => {

            const eventTarget = e.target;

            //check if we clicked on `PREV` or NEXT` buttons
            if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
                return;
            }

            //find active panel
            const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

            let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

            //set active step and active panel onclick
            if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
                activePanelNum--;

            } else {

                activePanelNum++;

            }

            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);

        });

        //SETTING PROPER FORM HEIGHT ONLOAD
        window.addEventListener('load', setFormHeight, false);

        //SETTING PROPER FORM HEIGHT ONRESIZE
        window.addEventListener('resize', setFormHeight, false);

        //changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

        const setAnimationType = newType => {
            DOMstrings.stepFormPanels.forEach(elem => {
                elem.dataset.animation = newType;
            });
        };

        //selector onchange - changing animation
        const animationSelect = document.querySelector('.pick-animation__select');

        animationSelect.addEventListener('change', () => {
            const newAnimationType = animationSelect.value;

            setAnimationType(newAnimationType);
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#province').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>ppdb/get_subprovinsi",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].city_name + '">' + data[i].city_name + '</option>';
                        }
                        $('.kota').html(html);

                    }
                });
            });
        });
    </script>

</body>

</html>