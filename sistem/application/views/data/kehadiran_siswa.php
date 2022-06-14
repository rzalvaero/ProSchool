
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Kehadiran Siswa</h3>
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
                                    <!-- <input type="text" placeholder="Search by Class..." class="form-control"> -->
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
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </th>
                                        <!-- <th>Photo</th> -->
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>Izin</th>
                                        <th>Sakit</th>
                                        <th>Tanpa Keterangan</th>
                                        <th>Wali Kelas</th>
                                        <th>Dibuat</th>
                                        <!-- <th>Date Of Birth</th>
                                        <th>Phone</th>
                                        <th>E-mail</th> -->
                                        <!-- <th>Aksi</th> -->
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
                                        <td>10 (AP.10.A)</td>
                                        <td>Alya Zafaranie Rahman</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>Widayati Asih Rusilah, S.Pd</td>
                                        <td>19-Jan-2022 / 17:41:05</td>
                                        <!-- <td>02/05/2001</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td> -->
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
                                        <td>10 (AP.10.A)</td>
                                        <td>Aji Putra Arshavin</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>Widayati Asih Rusilah, S.Pd</td>
                                        <td>19-Jan-2022 / 17:41:05</td>
                                        <!-- <td>02/05/2001</td>
                                        <td>+ 123 9988568</td>
                                        <td>kazifahim93@gmail.com</td> -->
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