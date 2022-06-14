<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Pengunjung | Proschool</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tamu.css">
  <style>
    select {
      width: 150px;
      padding: 5px 35px 5px 5px;
      font-size: 16px;
      border: 1px solid #CCC;
      height: 34px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background: url(https://www.freepnglogos.com/uploads/tut-wuri-handayani-png-logo/darmasiswa-indonesian-scholarship-program-24.png) 96% / 15% no-repeat #EEE;
    }

    /* CAUTION: Internet Explorer hackery ahead */
    select::-ms-expand {
      display: none;
      /* Remove default arrow in Internet Explorer 10 and 11 */
    }

    /* Target Internet Explorer 9 to undo the custom arrow */
    @media screen and (min-width:0\0) {
      select {
        background: none\9;
        padding: 5px\9;
      }
    }
  </style>

</head>

<body>
  <div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
        <a href="<?php echo base_url();?>" class="button--transparent button--close">
          <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
            <g>
              <path fill="#ffffff" d="M1.293,15.293L11,5.586L12.414,7l-8,8H31v2H4.414l8,8L11,26.414l-9.707-9.707 C0.902,16.316,0.902,15.684,1.293,15.293z"></path>
            </g>
          </svg>
          <span class="visuallyhidden">Return to Product Page</span>
        </a>
        <div class="modal__circle"></div>
        <img src="<?php echo base_url();?>assets/img/tamu.png" class="modal__product" />
	    <!--<img src="https://cloud.githubusercontent.com/assets/3484527/19622568/9c972d44-987a-11e6-9dcc-93d496ef408f.png" class="modal__product" />-->
      </div>
      <div class="modal__content">
        <h2>Form Kunjungan</h2>
        <?php echo $this->session->flashdata("msg");?>
        <br/>
        <form class="new-added-form" action="<?php echo base_url(). 'tamu/adding'; ?>" method="post">
          <ul class="form-list">
            <li class="form-list__row">
              <label>Nama Tamu</label>
              <input type="text" name="nama" placeholder="Nama Pengunjung" required="" />
            </li>
            <li class="form-list__row">
              <label>Email</label>
              <input type="text" name="email" placeholder="Email Pengunjung" required="" />
            </li>
            <li class="form-list__row">
              <label>Phone / Whatsapp</label>
              <input type="number" name="phone" placeholder="Nomer Aktif" required="" />
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Tanggal Kunjungan</label>
                <div class="list__row">
                  <input type="date" name="date" placeholder="Tanggal Kunjungan" required="" />
                </div>
              </div>
              <div>
                <label>Kunjungan</label>
                <div class="list__row">
                  <select class="form-select form-select-sm" name="unit" aria-label=".form-select-sm example"  required="" >
                    <option readonly>Pilih</option>
                    <option value="1">TK</option>
                    <option value="2">SD</option>
                    <option value="3">SMP</option>
                    <option value="4">SMA</option>
                    <option value="5">SMK</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="form-list__row form-list__row--agree">
              <label>
                <input type="checkbox" name="save_cc" checked="checked">
                Saya menyetujui Formulir ini
              </label>
            </li>
            <li>
              <a style="width: 120px;background-color:red;" href="<?php echo base_url();?>" class="button">Kembali</a>
              <button style="width: 120px;height: 41px;" type="submit" class="button">Kirim</button>
            </li>
          </ul>
        </form>
      </div> <!-- END: .modal__content -->
    </div> <!-- END: .modal__container -->
  </div> <!-- END: .modal -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

  <script src="<?php echo base_url(); ?>assets/js/tamu.js"></script>

</body>

</html>