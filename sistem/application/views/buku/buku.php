<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="GURU" || $this->session->userdata('type_users')=="ADMIN"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Buku</h3>
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
                <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                <form class="new-added-form" action="<?php echo base_url(). 'buku/add'; ?>" method="post">
                    <div class="row">
                    <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>Kategori</label>
                            <select class="select2" name="kategori" >
                                <option disabled>Default select</option>
                                <?php foreach ($kategori as $a) : ?>
                                            <option value="<?=$a->id_kategori?>"><?=$a->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                        <div class="col-12-xxxl col-lg-2 col-12 form-group">
                            <label>Rak / Lokasi</label>
                            <select class="select2" name="rak" >
                                <option disabled>Default select</option>
                                <?php foreach ($rak as $a) : ?>
                                            <option value="<?=$a->id_rak?>"><?=$a->nama_rak ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>ISBN</label>
                            <input name="isbn" type="text" placeholder="Tulis ISBN" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-2 col-12 form-group">
                            <label>Jumlah Buku</label>
                            <input name="jumlah" type="number" placeholder="Jumlah" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-2 col-12 form-group">
                            <label>Tahun Buku</label>
                            <input name="tahun" type="number" placeholder="Tahun" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Judul Buku</label>
                            <input name="judul" type="text" placeholder="Tulis Judul Buku" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Nama Pengarang</label>
                            <input name="pengarang" type="text" placeholder="Tulis Pengarang" class="form-control">
                        </div>

                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Penerbit</label>
                            <input  name="penerbit" type="text" placeholder="Tulis Penerbit" class="form-control">
                        </div>

                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else {} ?>
    
   
    <!-- Add Notice Area End Here -->
    <div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Daftar Buku Kelas</h3>
                                    </div>
                                 
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input checkAll">
                                                        <label class="form-check-label">ISBN</label>
                                                    </div>
                                                </th>
                                                <th>Nama Buku</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Buku</th>
                                                <th>Stok / Dipinjam</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($buku as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['isbn'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['title'] ?></td>
                                                <td><?php echo $row['penerbit'] ?></td>
                                                <td><?php echo $row['thn_buku'] ?></td>
                                                <td>
                                                    <?php echo $row['jml'] ?> / 
                                                    <?php
                                                        $id = $row['buku_id'];
                                                        $dd = $this->db->query("SELECT * FROM sr_perpuspinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
                                                        if($dd->num_rows() > 0 )
                                                        {
                                                            echo $dd->num_rows();
                                                        }else{
                                                            echo '0';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url('/buku/bukudetail/'.$row['id_buku']);?>"><i
                                                                    class="fas fa-eye text-dark-pastel-blue"></i>Detail</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/buku/edit/'.$row['id_buku']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('/buku/delete_buku/'.$row['id_buku']);?>"><i
                                                                    class="fas fa-times text-orange-red"></i>Hapus</a>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>