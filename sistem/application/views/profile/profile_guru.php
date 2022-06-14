<div class="card-body">
    <div class="heading-layout1">
        <div class="item-title">
<!--            <h3>Edit Profile</h3>-->
        </div>
       <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" 
            data-toggle="dropdown" aria-expanded="false">...</a>
            <!--<div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
            </div>-->
            
        </div>
    </div>
   
    <?php echo $this->session->flashdata("msg");?>
    <form class="new-added-form" action="<?php echo base_url(). 'profile/update'; ?>" method="post">
        <div class="row">
            <?php foreach($setting_us as $u){ ?>
            <input type="hidden" name="id" value="<?php echo $u->id ?>">
            <input type="hidden" name="type" value="guru">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Nama Depan *</label>
                <input type="text" value="<?php echo $u->first_name ?>" name="first" placeholder="" class="form-control" >
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Nama Belakang *</label>
                <input type="text" value="<?php echo $u->last_name ?>" name="last" placeholder="" class="form-control" >
            </div>
				<div class="col-xl-6 col-lg-6 col-12 form-group">
					<label>Jabatan *</label>
										<select name="jabatan" class="form-control select2">
											<?php foreach($jabatan as $j){ ?>
												<option value="<?php echo $j->id_jabatan ?>"<?php if (!empty($s->u_tugas_tambahan) ? $j->id_jabatan == $u->u_tugas_tambahan : '' )'selected' ?>><?php echo $j->nama_jabatan ?></option>
											<?php } ?>
										</select>
				</div>
            <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label>Telpon *</label>
                <input type="text" value="<?php echo $u->phone ?>" name="phone" placeholder="" class="form-control" >
            </div>
            <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label>Email *</label>
                <input type="text" value="<?php echo $u->email ?>" name="email" placeholder="" class="form-control" >
            </div>
            <?php } ?>
            <?php foreach($setting_su as $u){ ?>
                <div class="col-xl-4 col-lg-6 col-12 form-group">
                <label>Tanggal Lahir *</label>
                <input name="dob" type="date" placeholder="dd/mm/yyyy" value="<?php echo $u->u_tanggal_lahir ?>" class="form-control air-datepicker">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Perguruan Tinggi *</label>
                <input type="text" name="perguruan_tinggi" value="<?php echo $u->u_perguruan_tinggi ?>" placeholder="Perguruan Tinggi" class="form-control" >
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Jurusan *</label>
                <input type="text" value="<?php echo $u->u_jurusan ?>" name="jurusan" placeholder="Jurusan" class="form-control" >
            </div>
            <div class="col-xl-2 col-lg-6 col-12 form-group">
                <label>Tahun Lulus *</label>
                <input type="number" value="<?php echo $u->u_tahun_lulus ?>" name="lulus" placeholder="Tahun Lulus" class="form-control" >
            </div>
            <div class="col-xl-2 col-lg-6 col-12 form-group">
                <label>Jenjang *</label>
                <input type="text" value="<?php echo $u->u_jenjang ?>" name="jenjang" placeholder="D3 / S1 / S2" class="form-control" >
            </div>
            <div class="col-xl-2 col-lg-6 col-12 form-group">
                <label>Sertifikasi *</label>
                <select class="select2" name="sertifikasi">
                    <option value="<?php echo $u->u_sertifikasi ?>"><?php echo $u->u_sertifikasi ?></option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>NPWP *</label>
                <input type="text" value="<?php echo $u->u_npwp ?>" name="npwp" placeholder="NPWP" class="form-control" >
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>NBM / NIP *</label>
                <input type="text" value="<?php echo $u->u_nbm_nip ?>" name="u_nbm_nip" placeholder="NBM / NIP" class="form-control" >
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>NUPTK *</label>
                <input type="text" value="<?php echo $u->u_nuptk_nuks ?>" name="u_nuptk_nuks" placeholder="NUPTK" class="form-control" >
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Jenis Kelamin *</label>
                <select class="select2" name="gender">
                    <option value="<?php echo $u->u_jenis_kelamin ?>"><?php echo $u->u_jenis_kelamin ?></option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Provinsi *</label>
                <select title="Select Country" name="province" class="select2" id="province">   
                            <option value="<?php echo $u->u_tl_idprovinsi ?>">-PILIH PROVINSI-</option>
                            <?php foreach($province->result() as $row):?>
                                <option value="<?php echo $row->province_id;?>"<?php if (!empty($s->u_tl_idprovinsi) ? $row->province_id == $s->u_tl_idprovinsi : '' )'selected' ?>><?php echo $row->province;?></option>
                            <?php endforeach;?>
                </select>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Kota *</label>
                <select class="kota select2" name="kota" id="kota">
                     <option value="<?php echo $u->u_tl_idkota ?>">-PILIH KOTA-</option>
                </select>
            </div>
            <div class="col-lg-12 col-12 form-group">
                <label>Alamat</label>
                <textarea name="address" class="textarea form-control" name="message" id="form-message" cols="10" rows="9"><?php echo $u->u_alamat_tinggal ?></textarea>
            </div>
				<div class="col-lg-12">
					<label for="status">Status</label>
					<select name="status" id="status" class="select2">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>
            <div class="col-12 form-group mg-t-8">
                    <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    <a href="<?php echo base_url();?>profile" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
            </div>
            <?php } ?>
        </div>
    </form>
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
                        html += '<option value="'+data[i].city_id+'">'+data[i].city_name+' - '+data[i].postal_code+'</option>';
                    }
                    $('.kota').html(html);
                     
                }
            });
        });
    });
</script>
