<div class="row">
    <!-- Add Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Detail Buku</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </div>
               <form class="new-added-form" action="#" method="post">
               <?php foreach ($detail as $row) { ?>
                    <div class="row">
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>ISBN</label>
                            <input name="judul" type="text" value="<?php echo $row['isbn'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-8 col-12 form-group">
                            <label>Judul Buku</label>
                            <input name="judul" type="text" value="<?php echo $row['title'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Penerbit</label>
                            <input name="judul" type="text" value="<?php echo $row['penerbit'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Pengarang</label>
                            <input name="judul" type="text" value="<?php echo $row['pengarang'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-2 col-12 form-group">
                            <label>Tahun Terbit</label>
                            <input name="judul" type="text" value="<?php echo $row['thn_buku'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-2 col-12 form-group">
                            <label>Jumlah Buku</label>
                            <input name="judul" type="text" value="<?php echo $row['jml'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Kategori</label>
                            <input name="judul" type="text" value="<?php echo $row['penerbit'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Lokasi / Rak</label>
                            <input name="judul" type="text" value="<?php echo $row['penerbit'] ?>" placeholder="Tulis Judul" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Tanggal Masuk</label>
                            <input name="judul" type="text" value="<?php echo $row['tgl_masuk'] ?>" placeholder="Tulis Judul" class="form-control">
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