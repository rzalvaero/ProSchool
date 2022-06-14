<script src="<?php echo base_url(); ?>___/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>___/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>___/plugin/countdown/jquery.plugin.min.js"></script>
<script src="<?php echo base_url(); ?>___/plugin/countdown/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>___/plugin/jquery_zoom/jquery.zoom.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">

    <link href="<?php echo base_url(); ?>___/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>___/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>___/plugin/fa/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    

    <div class="container col-md-12" style="margin-top: 70px">
        <div class="col-md-9">
            <!-- <form role="form" name="_form" method="post" id="_form"> -->
            <!-- <?= form_hidden('id_tes', $id_tes); ?> -->
            <div class="panel panel-default">
                <div class="panel-heading">Soal Ke <div class="btn btn-info" id="soalke"></div>

                    <div class="tbl-kanan-soal">
                        <button class="btn btn-warning" onclick="return selesai_ujian();"><i class="fa fa-minus-circle"></i> Selesai</button>
                        <div id="clock" style="font-weight: bold" class="btn btn-danger"></div>
                    </div>
                </div>

                <div class="panel-body">
                    <?php echo $html; ?>
                </div>

                <input type="hidden" id="step_ke" value="1">
                <input type="hidden" id="step_next" value="2">
                <input type="hidden" id="step_prev" value="0">
                <input type="hidden" id="step_total" value="<?= $no; ?>">

                <div class="panel-footer" style="overflow: hidden;">
                    <a class="action back btn btn-info btn-lg pull-left" rel="0" onclick="return back();"><i class="fa fa-chevron-left"></i> Back</a>


                    <!--
                        <a class="ragu_ragu btn btn-danger btn-lg" rel="1" onclick="return tidak_jawab();"><i class="fa fa-stop"></i> Ragu-ragu</a>
                        -->

                    <a class="action next btn btn-info btn-lg pull-right" rel="2" onclick="return next();"><i class="fa fa-chevron-right"></i> Next</a>

                    <!-- <a class="action submit btn btn-danger btn-lg pull-right" onclick="return selesai_ujian();"><i class="fa fa-stop"></i> Selesai Ujian</a> -->
                    <input type="hidden" name="jml_soal" value="<?php echo $no; ?>">
                </div>
            </div>
            <!-- </form> -->
        </div>

        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">Navigasi Jawaban Anda</div>
                <div class="panel-body" id="tampil_jawaban">
                </div>
            </div>
        </div>

    </div>

    


    

    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        id_tes = "<?php echo $id_tes; ?>";


        $(document).on("ready", function() {
            
            hitung_mundur();
            simpan(1, 0);
            buka(1);

            widget = $(".step");
            btnnext = $(".next");
            btnback = $(".back");
            btnsubmit = $(".submit");

            $(".step").hide();
            $(".back").hide();
            $("#widget_1").show();
        });

        widget = $(".step");
        total_widget = widget.length;


        simpan = function(id_step, is_selesai = 0) {
            //console.log(id_step);
            let form_data = $("#form_step_" + id_step).serialize();

            $.ajax({
                type: "POST",
                url: base_url + "ujian/simpan_ujian/" + id_tes,
                data: form_data,
                dataType: 'json',
                success: function(res) {
                    //console.log(res.jawaban);
                    if (res.success) {
                        let html_jawaban = '';
                        let no_step = 1;
                        if (res.jawaban.length > 0) {
                            $.each(res.jawaban, function(index, val) {
                               
                                html_jawaban += '<a href="#" class="btn btn-success mr-2" onclick="return buka(' + no_step + ');">' + no_step + '. ' + val.jawaban_user + '</a>';

                                no_step++;
                            });
                        }

                        $("#tampil_jawaban").html(html_jawaban);
                       
                    } else {
                        if (res.expired) {
                            window.open(base_url + 'ujian', '_self');
                        }
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            // console.log(form_data);

            // console.log(id_soal_step);
            // console.log(jawaban_step);

            // var f_asal = $("#_form").serialize();
            // f_asal += "&selesai=" + is_selesai;
            /*
            $.ajax({
                type: "POST",
                data: f_asal,
                url: base_url + "ikuti_ujian/simpan_ujian/" + id_tes,
                beforeSend: function() {
                    // console.log(f_asal);
                },
                success: function(r) {
                    let hasil_jawaban = "";

                    let i = 1;
                    $.each(r, function(k, v) {
                        if (v != "") {
                            hasil_jawaban += '<a class="btn btn-success btn_soal btn-sm" onclick="return buka(' + (i) + ');">' + (i) + ". " + v + "</a>";
                        } else {
                            hasil_jawaban += '<a class="btn btn-warning btn_soal btn-sm" onclick="return buka(' + (i) + ');">' + (i) + ". -</a>";
                        }
                        i++;
                    });

                    $("#tampil_jawaban").html(hasil_jawaban);
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
            */

            return false;
        }

        hitung_mundur = function() {
            <?php
            $tgl_selesai = $jam_selesai;
            $tgl_selesai = strtotime($tgl_selesai);

            $tgl_baru = date('F j, Y H:i:s', $tgl_selesai);
            ?>

            var waktu_selesai = new Date('<?php echo $tgl_baru; ?>');

            $('div#clock').countdown({
                until: waktu_selesai,
                serverSync: dari_server,
                alwaysExpire: true,
                format: 'HMS',
                compact: true,
                onExpiry: waktu_habis
            });
        }

        waktu_habis = function() {
            alert('Waktu telah selesai....!')
            // simpan(1);
            window.location.assign("<?php echo base_url(); ?>ujian/selesai_ujian/" + id_tes);
        }

        selesai_ujian = function() {
            if (confirm('Anda yakin akan mengakhiri ujian ini..?')) {
                // simpan(1);
                window.location.assign("<?php echo base_url(); ?>ujian/selesai_ujian/" + id_tes);
            }
            return false;
        }

        next = function() {
            // var berikutnya = $(".next").attr('rel');
            var step_ke = parseInt($("#step_ke").val());
            var step_next = parseInt($("#step_next").val());
            var step_prev = parseInt($("#step_prev").val());
            var step_total = parseInt($("#step_total").val());

            if (step_ke < step_total) {

                $(".step").hide();
                $("#widget_" + step_next).show();
                simpan(step_ke, 0);

                step_ke = step_next;
                $("#soalke").html(step_ke);
                $("#step_ke").val(step_ke);
                $("#step_next").val(step_ke + 1);
                $("#step_prev").val(step_ke - 1);

                $('.back').show();

                if (step_ke == step_total) {
                    $('.next').hide();
                }
            }
            // step_ke++;
            // step_next++;
            // step_prev++;

            // var soal_ke = $("#step_ke").val();
            // // var soal_ke = $(".ragu_ragu").attr('rel');

            // berikutnya = parseInt(berikutnya);
            // soal_ke = parseInt(soal_ke);

            // berikutnya = berikutnya > total_widget ? total_widget : berikutnya;

            // $("#soalke").html(berikutnya);


            // $(".next").attr('rel', (berikutnya + 1));
            // $(".back").attr('rel', (berikutnya - 1));
            // $(".ragu_ragu").attr('rel', (soal_ke + 1));

            // var sudah_akhir = berikutnya == total_widget ? 1 : 0;

            // $(".step").hide();
            // $("#widget_" + berikutnya).show();

            // if (sudah_akhir == 1) {
            //     $(".back").show();
            //     $(".next").hide();
            // } else if (sudah_akhir == 0) {
            //     $(".next").show();
            //     $(".back").show();
            // }

        }


        back = function() {
            var step_ke = parseInt($("#step_ke").val());
            var step_next = parseInt($("#step_next").val());
            var step_prev = parseInt($("#step_prev").val());
            var step_total = parseInt($("#step_total").val());

            if (step_ke > 1) {

                $(".step").hide();
                $("#widget_" + step_prev).show();
                simpan(step_ke, 0);

                step_ke = step_prev;
                $("#soalke").html(step_ke);
                $("#step_ke").val(step_ke);
                $("#step_next").val(step_ke + 1);
                $("#step_prev").val(step_ke - 1);

                $('.next').show();
                if (step_ke == 1) {
                    $('.back').hide();
                }
            }

            /*
            var back = $(".back").attr('rel');
            var soal_ke = $(".ragu_ragu").attr('rel');
            soal_ke = parseInt(soal_ke);

            back = parseInt(back);
            back = back < 1 ? 1 : back;

            $("#soalke").html(back);

            $(".back").attr('rel', (back - 1));
            $(".next").attr('rel', (back + 1));
            $(".ragu_ragu").attr('rel', (soal_ke - 1));

            $(".step").hide();
            $("#widget_" + back).show();

            var sudah_awal = back == 1 ? 1 : 0;

            $(".step").hide();
            $("#widget_" + back).show();

            if (sudah_awal == 1) {
                $(".back").hide();
                $(".next").show();
            } else if (sudah_awal == 0) {
                $(".next").show();
                $(".back").show();
            }

            simpan(soal_ke, 0);
            */
        }


        tidak_jawab = function() {
            var id_step = $(".ragu_ragu").attr('rel');
            $("#widget_" + id_step + " input[type=radio]").attr("checked", false);

            simpan(0);
        }


        dari_server = function() {
            var time = null;
            $.ajax({
                url: base_url + 'adm/get_servertime',
                async: false,
                dataType: 'text',
                success: function(text) {
                    time = new Date(text);
                },
                error: function(http, message, exc) {
                    time = new Date();
                }
            });
            return time;
        }

        buka = function(id_widget) {
            // $(".next").attr('rel', (id_widget + 1));
            // $(".back").attr('rel', (id_widget - 1));

            $("#soalke").html(id_widget);

            $(".step").hide();
            $("#widget_" + id_widget).show();
        }
    </script>
</body>

</html>
<script>
function konfirmasi_token() {
    var token_asli = $("#_token").val();
    var token_input = $("#token").val();
    var id = $("#id_ujian").val();

    if (token_asli != token_input) {
        alert("Token salah..!");
        return false;
    } else {
        alert("Token benar..!");
        window.location.assign("<?php echo base_url(); ?>ujian/ujian_ok/"+ id); 
    }

    return false;
}
</script>