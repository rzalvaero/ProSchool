
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                
                <!-- Breadcubs Area End Here -->
                <!-- Add New Teacher Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Tambah Siswa</h3>
                            </div>
                           <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                            </div>
                        </div>
                        <?php echo $this->session->flashdata("msg");?>
                        <form class="new-added-form" action="<?php echo base_url(). 'siswa/adding'; ?>" method="post">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Nama Lengkap *</label>
                                    <input type="text" placeholder="Nama Lengkap" name="nama" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>NIK *</label>
                                    <input type="number" placeholder="NIK" name="nik" class="form-control">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>NISN *</label>
                                    <input type="number" placeholder="NISN" name="nisn" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Jenis Kelamin *</label>
                                    <select class="select2" name="gender">
                                        <option>-- Jenis Kelamin --</option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-12 form-group">
                                    <label>Email *</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                                </div>
                                <div class="col-xl-4 col-lg-3 col-12 form-group">
                                    <label>Telepon *</label>
                                    <input type="text" placeholder="Telepon" name="telpon" class="form-control">
                                </div>
                                <div class="col-xl-4 col-lg-3 col-12 form-group">
                                    <label>Tanggal Lahir *</label>
                                    <input type="date" placeholder="Tanggal Lahir" name="dob" class="form-control">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Kelas *</label>
                                    <select class="select2" name="kelas" required>
                                        <option value="">- Pilih Kelas-</option>
                                        <?php foreach ($selectkelas as $a) : ?>
                                            <option value="<?=$a->idkelas?>"><?=$a->k_romawi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label>Unit *</label>
                                    <select class="select2" name="unit" required>
                                        <option value="">- Pilih Unit -</option>
                                        <?php foreach ($selectunit as $a) : ?>
                                            <option value="<?=$a->id?>"><?=$a->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Provinsi *</label>
                                    <select title="Select Country" name="province" class="select2" id="province">   
                                                <option>- Pilih Provinsi-</option>
                                                <?php foreach($province->result() as $row):?>
                                                    <option value="<?php echo $row->province_id;?>"><?php echo $row->province;?></option>
                                                <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Kota *</label>
                                    <select class="kota select2" name="kota" id="kota">
                                        <option>- Pilih Kota -</option>
                                    </select>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button style="float:right; margin:0px 0px 0px 15px;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                                    <button style="float:right;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->
            </div>

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#province').change(function(){
                        var id=$(this).val();
                        $.ajax({
                            url : "<?php echo base_url();?>guru/get_subprovinsi",
                            method : "POST",
                            data : {id: id},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value="'+data[i].city_id+'">'+data[i].city_name+'</option>';
                                }
                                $('.kota').html(html);
                                
                            }
                        });
                    });
                });
            </script>
