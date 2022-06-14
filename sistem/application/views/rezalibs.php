<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $post_subject ;?></title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center"></td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td>
                <b>Kepada Bapak / Ibu,  <?php echo $user_name ;?></b>
            </td>
          </tr>
          <tr>
            <td>Kunjungan</td>
            <td>:</td>
            <td><?php echo $user_visit ;?></td>
          </tr>
          <tr>
            <td>Telpon</td>
            <td>:</td>
            <td><?php echo $user_phone ;?></td>
          </tr>
          <tr>
            <td>Dibuat</td>
            <td>:</td>
            <td><?php echo $user_created ;?></td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <?php if ($status == 'Menunggu') { ?>
              <td colspan="3" style="text-align: center;">
                Data kunjungan tersebut telah kami terima, selanjutnya anda akan menerima email terkait kunjungan anda melalui email ini
              </td>       
            <?php } elseif($status == 'Ditolak') { ?>
              <td colspan="3" style="text-align: center;">
                Data kunjungan tersebut telah kami review, <span style="color:red;">dengan segala Maaf kami sampaikan bahwa permintaan kunjungan anda ditolak</span>. Silahkan kirim permintaan ulang dilain waktu!
              </td>
            <?php } else { ?>
              <td colspan="3" style="text-align: center;">
              Data kunjungan tersebut telah kami review, <span style="color:green;">Permintaan kunjungan anda kami setujui</span>, Silahkan datang tepat pada tanggal yang telah di tentukan!
            </td>
            <?php }  ?>
            
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p> Powered by PROSCHOOL <br>
        <a href="#" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a> </p>
    </div>
  </div>
</div>
</body>
</html>
