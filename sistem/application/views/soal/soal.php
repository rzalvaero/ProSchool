<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Tambah Soal</h3>
                            </div>
                        </div>
                         <form class="new-added-form" action="<?php echo base_url().'soal/act_soal'; ?>" method="post">
                             <div id="dynamic_field">
                            <div class="row gutters-8">
                                <div class="col-8-xxxl col-xl-8 col-lg-8 col-12 form-group">
                                    <!-- <label>Pilih Kelas</label> -->
                                     <select name="mapel" class="form-control select2" required="">
                            <option value="">Pilih Mata Pelajaran...</option>
                            <?php foreach($mata_pelajaran as $lm){ ?>
                            <option value="<?= $lm->idmata_pelajaran;?>"><?= $lm->mp_nama;?></option>
                            <?php } ?>
                                      </select>
                                </div>
                                    <div class="col-4-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                    <!-- <label>Pilih Kelas</label> -->
                                    <select name="kelas" class="form-control select2" required="">
                            <option value="">Pilih Kelas...</option>
                            <?php foreach($kelas as $lk){ ?>
                            <option value="<?= $lk->idkelas;?>"><?= $lk->k_keterangan;?></option>
                            <?php } ?>
                        </select>
                                </div>
                            </div>
                        <div class="basic-tab">
                            <div class="col-md-12 form-group">
                        <label>Soal</label>
                         <textarea class="textarea form-control" name="soal[]" id="form-message"
                            cols="10" rows="8"></textarea>
                        </div>
                     <div class="row gutters-8">
                    <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="A">Opsi A</label>
                        <input type="text" name="a[]" class="form-control" placeholder="Jawaban A" required="">
                    </div>
                   <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="B">Opsi B</label>
                        <input type="text" name="b[]" class="form-control" placeholder="Jawaban B" required="">
                    </div>
                    <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="C">Opsi C</label>
                        <input type="text" name="c[]" class="form-control" placeholder="Jawaban C" required="">
                    </div>
                    <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="D">Opsi D</label>
                        <input type="text" name="d[]" class="form-control" placeholder="Jawaban D" required="">
                    </div>
                    <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="E">Opsi E</label>
                        <input type="text" name="e[]" class="form-control" placeholder="Jawaban E" required="">
                    </div>
                    <div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                        <label for="Jawaban">Jawaban</label>
                        <select name="jawaban[]" id="" class="form-control" required="">
                            <option value="">Pilih Jawaban...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    </div>
                    </div>
                    </div>
                      <div class="row gutters-6">
                   <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                       <button type="button" name="add" id="add" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Tambah Soal</button>
                
                    </div>  <br><br>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                       <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>   
                 </div></div>
             
               </form>

                  <input type="hidden" id="jumlah-form" value="1">      

                    </div>
                </div>


<script async="defer">
$(function(){
    CKEDITOR.replace('fieldSoal')
})
</script>

<?php
if ($this->session->flashdata('soal')) { ?>
  <script>
    Swal.fire('Sukses!', 'Soal berhasil ditambahkan', 'success');
  </script>

   
<?php
}
?>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1;
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'"><div class="basic-tab"><div class="col-md-12 form-group"><label>Soal</label><textarea class="ckeditor textarea form-control" name="soal[]" id="form-message"cols="10" rows="8"></textarea></div><div class="row gutters-8"><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="A">Opsi A</label><input type="text" name="a[]" class="form-control" placeholder="Jawaban A" required=""></div><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="B">Opsi B</label><input type="text" name="b[]" class="form-control" placeholder="Jawaban B" required=""></div><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="C">Opsi C</label><input type="text" name="c[]" class="form-control" placeholder="Jawaban C" required=""></div><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="D">Opsi D</label><input type="text" name="d[]" class="form-control" placeholder="Jawaban D" required=""></div><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="E">Opsi E</label><input type="text" name="e[]" class="form-control" placeholder="Jawaban E" required=""></div><div class=" col-6-xxxl col-xl-6 col-lg-6 col-12 form-group"><label for="Jawaban">Jawaban</label><select name="jawaban[]" id="" class="form-control" required=""><option value="">Pilih Jawaban...</option><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option></select><input type="hidden" class="form-control"></div></div></div><div class="row gutters-8"><div class="col-4-xxxl col-xl-4 col-lg-4 col-12 form-group"></div><div class="col-7-xxxl col-xl-7 col-lg-7 col-12 form-group"></div><div class="col-1-xxxl col-xl-1 col-lg-1 col-12 form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Hapus</button></div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
    function filePreview(input, preview_img_soal) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+preview_img_soal).html('<img src="'+e.target.result+'" width="100%"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
    function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
}
</script>