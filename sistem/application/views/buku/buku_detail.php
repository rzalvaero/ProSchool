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
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

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
                                <input name="judul" type="text" value="<?php echo $row['isbn'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-8 col-12 form-group">
                                <label>Judul Buku</label>
                                <input name="judul" type="text" value="<?php echo $row['title'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Penerbit</label>
                                <input name="judul" type="text" value="<?php echo $row['penerbit'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-3 col-12 form-group">
                                <label>Pengarang</label>
                                <input name="judul" type="text" value="<?php echo $row['pengarang'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-2 col-12 form-group">
                                <label>Tahun Terbit</label>
                                <input name="judul" type="text" value="<?php echo $row['thn_buku'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-2 col-12 form-group">
                                <label>Jumlah Buku</label>
                                <input name="judul" type="text" value="<?php echo $row['jml'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-2 col-12 form-group">
                                <label>Jumlah Dipinjam</label>
                                <input name="judul" type="text" value="<?php
                                                                        $id = $row['buku_id'];
                                                                        $dd = $this->db->query("SELECT * FROM sr_perpuspinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
                                                                        if ($dd->num_rows() > 0) {
                                                                            echo $dd->num_rows();
                                                                        } else {
                                                                            echo '0';
                                                                        }
                                                                        ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>

                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Kategori</label>
                                <input name="judul" type="text" value="<?php echo $row['nama_kategori'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Lokasi / Rak</label>
                                <input name="judul" type="text" value="<?php echo $row['nama_rak'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Tanggal Masuk</label>
                                <input name="judul" type="text" value="<?php echo $row['tgl_masuk'] ?>" placeholder="Tulis Judul" class="form-control" readonly>
                            </div>


                            <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="button" data-toggle="modal" data-target="#large-modal" class="modal-trigger btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Peminjam</button>
                                <a href="<?php echo base_url(); ?>buku" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Kembali</a>
                            </div>

                            <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" style="width:70%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Daftar Peminjam</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="card height-auto">

                                                <div class="table-responsive">
                                                    <table class="table display data-table text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input checkAll">
                                                                        <label class="form-check-label">ID</label>
                                                                    </div>
                                                                </th>
                                                                <th>Nama</th>
                                                                <th>Jenkel</th>
                                                                <th>Telepon</th>
                                                                <th>Tgl Pinjam</th>
                                                                <th>Lama Pinjam</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $bukuid = $row['buku_id'];
                                                            $pin = $this->db->query("SELECT * FROM sr_perpuspinjam WHERE buku_id ='$bukuid' AND status = 'Dipinjam'")->result_array();
                                                            foreach ($pin as $si) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input">
                                                                            <label class="form-check-label"><?= $isi->anggota_id;?></label>
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $isi->nama;?></td>
                                                                    <td><?= $isi->jenkel;?></td>
                                                                    <td><?= $isi->telepon;?></td>
                                                                    <td><?= $si['tgl_pinjam'];?></td>
                                                                    <td><?= $si['lama_pinjam'];?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <!-- All Notice Area End Here -->
</div>