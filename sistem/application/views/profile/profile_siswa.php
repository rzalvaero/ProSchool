<div class="card-body">
    <div class="heading-layout1">
        <div class="item-title">
            <h3>Edit Profile</h3>
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
    <?php foreach($setting as $u){ ?>
    <?php echo $this->session->flashdata("msg");?>
    <form class="new-added-form" action="<?php echo base_url(). 'profile/update'; ?>" method="post">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Nama *</label>
                <input type="hidden" name="id" value="<?php echo $u->idsiswa ?>">
                <input type="hidden" name="type" value="siswa">
                <input type="text" name="name" value="<?php echo $u->s_nama ?>" placeholder="" class="form-control">
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>NISN *</label>
                <input type="text" value="<?php echo $u->s_nisn ?>" placeholder="" class="form-control" readonly>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Jenis Kelamin *</label>
                <select class="select2" name="gender">
                    <option value="<?php echo $u->s_jenis_kelamin ?>"><?php echo $u->s_jenis_kelamin ?></option>
                    <option value="L">Male</option>
                    <option value="P">Female</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Tanggal Lahir *</label>
                <input type="date" name="dob" placeholder="dd/mm/yyyy" value="<?php echo $u->s_tanggal_lahir ?>" class="form-control air-datepicker">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>No NIK</label>
                <input type="text" name="nik" placeholder="" value="<?php echo $u->s_nik ?>" class="form-control">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>E-Mail</label>
                <input type="email" name="email" value="<?php echo $u->s_email ?>" placeholder="" class="form-control">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Telepon</label>
                <input type="text" name="phone" placeholder=""  value="<?php echo $u->s_telepon ?>"  class="form-control">
            </div>
            <div class="col-xl-6 col-lg-6 col-12 form-group">
                <label>Orang Tua</label>
                <input type="text" name="parent" placeholder=""  value="<?php echo $u->s_wali ?>"  class="form-control">
            </div>
            <div class="col-12 form-group mg-t-8">
                    <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
                    <a href="<?php echo base_url();?>dashboard" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
            </div>
        </div>
    </form>
    <?php } ?>
</div>