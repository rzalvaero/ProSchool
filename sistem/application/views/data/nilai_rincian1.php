
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Hasil Pengolahan Nilai</h3>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url();?>profile/setting"><i class="far fa-edit"></i>Edit</a>
                                    <a onclick="window.print();" class="dropdown-item noPrint" href="#"><i class="fas fa-print"></i>Cetak</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-download"></i>Unduh</a>
                                </div>
                            </div>
                           <!-- <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" 
                                data-toggle="dropdown" aria-expanded="false">...</a>
        
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div> -->
                        </div>
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <!-- <label>Pilih Kelas</label> -->
                                    <select type="text" placeholder="Cari Berdasarkan Kelas ..." class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <option value="1">Play</option>
                                        <option value="2">Nursery</option>
                                        <option value="3">One</option>
                                        <option value="3">Two</option>
                                        <option value="3">Three</option>
                                        <option value="3">Four</option>
                                        <option value="3">Five</option>
                                    </select>
                                </div>
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <!-- <label>Pilih Kelas</label> -->
                                    <select type="text" placeholder="Cari Berdasarkan Kelas ..." class="form-control">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <option value="1">Play</option>
                                        <option value="2">Nursery</option>
                                        <option value="3">One</option>
                                        <option value="3">Two</option>
                                        <option value="3">Three</option>
                                        <option value="3">Four</option>
                                        <option value="3">Five</option>
                                    </select>
                                </div>
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <!-- <label>Pilih Kelas</label> -->
                                    <select type="text" placeholder="Cari Berdasarkan Kelas ..." class="form-control">
                                        <option value="">Pilih Tipe Nilai</option>
                                        <option value="1">Play</option>
                                        <option value="2">Nursery</option>
                                        <option value="3">One</option>
                                        <option value="3">Two</option>
                                        <option value="3">Three</option>
                                        <option value="3">Four</option>
                                        <option value="3">Five</option>
                                    </select>
                                </div>
                                <!-- <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Cara Berdasarkan Mata Pelajaran ..." class="form-control">
                                </div> -->
                                <!-- <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Cari Berdasarkan Tipe Nilai ..." class="form-control">
                                </div> -->
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="basic-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Rincian Nilai Siswa</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-selected="false">Pengelohan Nilai Per KD</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-selected="false">Nilai Rapor</a>
                                </li>
                            </ul>
							
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                     <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th> 
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </th>
                                        <!-- <th>Photo</th> -->
                                        <th>Nama</th>
										<th>Mata Pelajaran</th>
                                        <th>Kompetensi Dasar</th>
                                        <th>Penilaian Harian</th>
										<th>Aksi</th>
                                        <th>Nilai UTS</th>
										<th>Aksi</th>
                                        <th>Nilai UAS</th>
										<th>Aksi</th>
                                        <!-- <th>Address</th>
                                        <th>Phone</th>
                                        <th>E-mail</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $no = 0;
					foreach ($sikap as $row) {  $no++;?>
                        <tr>
                            <td><?php echo $no ?></td>
							<td><?php echo $row['s_nama'] ?></td>
							<td><?php echo $row['mp_nama'] ?></td>
							<td>KD 1</td>
                            <?php if ($row['np_harian'] == "") { ?>
                                <td>Nilai Masih Kosong</td>
								 <td></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#large-input<?php echo $row['idsiswa'] ?>">
                                            Input Nilai
                                        </button>
                                    </center>
                                </td>
							
							
                                <div class="modal fade" id="large-input<?php echo $row['idsiswa'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Input nilai Spritual - <?php echo $row['s_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="new-added-form" action="<?php echo base_url() . 'nilai/adding_sikap_sp'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;"> 
                                                    <input type="hidden" name="idsiswa" value="<?php echo $row['idsiswa'] ?>" class="form-control" required>
													<div class="row">
                                                        <div class="col-12 form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="deskripsi" id="form-message" cols="10" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        <!--<button type="submit" class="footer-btn bg-linkedin">
                                                            Tambah</button>-->
														<input type="submit" name="submit" value="Tambah" id="submit" class="footer-btn bg-linkedin"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
							
                                <td><center><?php echo character_limiter($row['np_harian'], 50); ?>
                                </center><td>
                                    <center>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-ubah<?php echo $row['id'] ?>">
                                            Ubah Nilai
                                        </button>
                                    </center>
                                </td>
								 <td><center><?php echo character_limiter($row['np_harian'], 50); ?>
                                </center><td>
                                    <center>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-ubah<?php echo $row['id'] ?>">
                                            Ubah Nilai
                                        </button>
                                    </center>
                                </td>
								 <td><center><?php echo character_limiter($row['np_harian'], 50); ?>
                                </center><td>
                                    <center>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-ubah<?php echo $row['id'] ?>">
                                            Ubah Nilai
                                        </button>
                                    </center>
                                </td>
								
								<div class="modal fade" id="large-ubah<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Input nilai Spritual - <?php echo $row['s_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="new-added-form" action="<?php echo base_url() . 'nilai/edit_sikap_sp'; ?>" method="POST" onSubmit="document.getElementById('submit').disabled=true;"> 
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control" required>
													<div class="row">
                                                        <div class="col-12 form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="deskripsi" id="form-message" cols="10" rows="4"><?php echo $row['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Keluar</button>
                                                        <input type="submit" name="submit" value="Edit" id="submit" class="footer-btn bg-linkedin"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </tr>
                    <?php } ?>
                                   
                                   
                                </tbody>
                            </table>
                        </div>
						
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                     <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th> 
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </th>
                                        <!-- <th>Photo</th> -->
                                        <th>Nama</th>
                                        <th>Kompetensi Dasar</th>
                                        <th>Nilai Akhir KD</th>
                                        <th>Predikat</th>
                                        <!-- <th>Section</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#001</label>
                                            </div>
                                        </td>
                                        <!-- <td class="text-center"><img src="img/figure/student2.png" alt="student"></td> -->
                                        <td>Aji Putra Arshavin</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                       <!--  <td>A</td>
                                        <td>TA-107 Newyork</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td>
                                         <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#002</label>
                                            </div>
                                        </td>
                                        <!-- <td class="text-center"><img src="img/figure/student3.png" alt="student"></td> -->
                                        <td>Damar Lestari</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <!-- <td>A</td>
                                        <td>59 Australia, Sydney</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td>
                                         <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th> 
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </th>
                                        <!-- <th>Photo</th> -->
                                        <th>Nama</th>
                                        <th>Angka</th>
                                        <th>Predikat</th>
                                        <th>Deskripsi</th>
                                       <!--  <th>Section</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#001</label>
                                            </div>
                                        </td>
                                        <!-- <td class="text-center"><img src="img/figure/student2.png" alt="student"></td> -->
                                        <td>Bintang Rakha Raqila</td>
                                        <td>0</td>
                                        <td>D</td>
                                        <td>Capaian kompetensi belum tuntas dan perlu bimbingan.</td>
                                        <!-- <td>A</td>
                                        <td>TA-107 Newyork</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td>
                                         <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#002</label>
                                            </div>
                                        </td>
                                        <!-- <td class="text-center"><img src="img/figure/student3.png" alt="student"></td> -->
                                        <td>Faris Husnul Arfan</td>
                                        <td>0</td>
                                        <td>D</td>
                                        <td>Capaian kompetensi belum tuntas dan perlu bimbingan.</td>
                                        <!-- <td>A</td>
                                        <td>59 Australia, Sydney</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td>
                                         <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>