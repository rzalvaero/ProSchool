<div class="row">
    <!-- Add Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Edit Data Kompetinsi Inti</h3>
                    </div>
                </div>
               <form class="new-added-form" action="<?php echo base_url(). 'kompetensi_inti/edited'; ?>" method="post">
               <?php foreach ($data as $row) { ?>
                    <div class="row">
					<div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kode Kompetinsi</label>
							<input name="id" id="id"type="hidden" value="<?php echo $row['idkompetensiinti'] ?>" placeholder="Kode Kompetinsi" class="form-control">
                            <input name="kode" type="text" value="<?php echo $row['kode_kd'] ?>" placeholder="Kode Kompetinsi" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                            <label>Nama Kompetinsi</label>
                            <input name="nama" type="text" value="<?php echo $row['nama_kd'] ?>" placeholder="Nama Kompetinsi" class="form-control">
                        </div>
						  <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kategori</label>
                            <select class="select2" name="kategori" >
                                <option value="<?php echo $row['kategori_kd'] ?>"><?php echo $row['kategori_kd'] ?></option>
                                <option value="Keterampilan">Keterampilan</option>
                                <option value="Pengetahuan">Pengetahuan</option>
                            </select>
                        </div>
                       

                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <!-- All Notice Area End Here -->
</div>