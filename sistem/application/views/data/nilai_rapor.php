
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Radar Nilai Rapor</h3>
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
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div> -->
                        </div>
                        <form class="mg-b-20">
                            <div class="row gutters-8">
                                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
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
                                <!-- <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Name ..." class="form-control">
                                </div>
                                <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                    <input type="text" placeholder="Search by Class ..." class="form-control">
                                </div> -->
                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                            	<thead style="background-color:#2D5E89; color:#fff;">
                                <tr>
                                    <th rowspan="2" width="3%" style="vertical-align:middle;"><center>No</center></th>
                                    <th rowspan="2" width="30%" style="vertical-align:middle;"><center>Nama Siswa</center></th>
                                    <th rowspan="2" width="50%" style="vertical-align:middle;"><center>Mata Pelajaran</center></th>
                                    <th rowspan="2" width="3%" style="vertical-align:middle;"><center>KKM</center></th>
                                    <th colspan="3"><center>Pengetahuan</center></th>
                                    <th colspan="3"><center>Keterampilan</center></th>
                                    <!-- <th rowspan="2"><center>Aksi</center></th> -->

                                </tr>
                                <tr>
                                    <th>Angka</th>
                                    <th>Predikat</th>
                                    <th>Keterangan</th>
                                    <th>Angka</th>
                                    <th>Predikat</th>
                                    <th>Keterangan</th>
                                </tr>
                              </thead>
                               <!-- <thead style="background-color:#17a2b8; color:#fff;">
								<tr>
									<td rowspan="3">NO</td>
									<td rowspan="3" style="text-align: center;">KOMPETENSI DASAR</td>
									<td rowspan="3" style="text-align: center;">INDIKATOR</td>
									<td rowspan="3">MATERI PEMBELAJARAN</td>
									<td rowspan="3">KEGIATAN PEMBELAJARAN</td>
									<td rowspan="3">PENILAIAN</td>
									<td colspan="3" style="text-align: center;">ALOKASI</td>
									<td colspan="3" style="text-align: center;">PENDIDIKAN KARAKTER</td>
									<td rowspan="3">SUMBER BELAJAR</td>
									<td rowspan="3">Aksi</td>
                                     <td></td>
                                     <td></td>
								</tr>
                                <tr>
									<td>TM</td>
									<td style="text-align: center;">PS</td>
									<td style="text-align: center;">PI</td>
									<td style="text-align: center;">TM</td>
									<td style="text-align: center;">PS</td>
									<td style="text-align: center;">PI</td>
                                    <td></td>
								</tr>
								</thead> -->
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
                                        <td>Bahasa Indonesia</td>
                                        <td> 75</td>
                                        <td> 0</td>
                                        <td> D </td>
                                        <td><button style="background-color: yellow;">Belum</button></td>
                                        <td>0</td>
                                        <td>D</td>
                                        <td><button style="background-color: yellow;">Belum</button></td>
                                        <!-- <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
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
                                        <!-- <td class="text-center"><img src="img/figure/student2.png" alt="student"></td> -->
                                        <td>Alya Zafaranie Rahman</td>
                                        <td>Bahasa Inggris</td>
                                        <td> 75</td>
                                        <td> 0</td>
                                        <td> D </td>
                                        <td><button style="background-color: yellow;">Belum</button></td>
                                        <td>0</td>
                                        <td>D</td>
                                        <td><button style="background-color: yellow;">Belum</button></td>
                                       <!--  <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>