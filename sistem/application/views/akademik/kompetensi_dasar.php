<div class="row">
    <!-- Add Notice Area Start Here -->
    <?php if($this->session->userdata('type_users')=="GURU" || $this->session->userdata('type_users')=="ADMIN"){ ?>
        <div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Tambah Kompetensi Dasar</h3>
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
                <form class="new-added-form" action="<?php echo base_url(). 'kompetensi_dasar/add'; ?>" method="POST">
                    <div class="row">
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
                        <label>Unit</label>
                        <div class="form-group">
                            <?php if ($this->session->userdata('type_users') == "ADMIN") { ?>
                                <select class="select2" name="unit" id="unit">
                                    <option value="0">Default select</option>
                                    <?php foreach ($selectunit as $a) : ?>
                                        <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } else {
                                $unit = $this->session->userdata('unit');
                                $row = "SELECT * FROM web_unit WHERE id ='$unit'";
                                $row_siswa                                    = $this->db->query($row)->row();
                                $data['id']                                 = $row_siswa->id;
                                $data['nama']                                 = $row_siswa->nama;
                            ?>
                                <select class="select2" name="unit" id="unit">
                                    <option>Select unit</option>
                                    <option value="<?php echo $unit ?>" selected><?php echo $data['nama'] ?></option>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
						
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Mata Pelajaran</label>
							<select class="mapel select2" name="mapel">
								<option>Pilih Mata Pelajaran</option>
							</select>
                        </div>
						
                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Kompetensi Inti</label>
                            <select class="select2" name="kompetensi_inti" >
                                <option selected>Pilih Kompetensi Inti</option>
                                <?php foreach ($selectKI as $a) : ?>
                                    <option value="<?= $a->kode_kd ?> - <?= $a->nama_kd ?>"><?= $a->kode_kd ?> - <?= $a->nama_kd ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
						
						<div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>Bagan Kompetensi Inti</label>
                            <textarea id="ckedtor" class="ckeditor textarea form-control" name="bagan" id="form-message" cols="10" rows="4"></textarea>
						</div>

                        <div class="col-12 form-group mg-t-8">
                                <button style="float:right;" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Simpan</button>
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
                                        <h3>Daftar Kompetensi Dasar</h3>
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
                                                        <label class="form-check-label">Kompetensi Inti</label>
                                                    </div>
                                                </th>
                                                <th>Mata Pelajaran</th>
												<th>Kompetisi Dasar</th>
                                                <th>File</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kompetensi_dasar as $row) { ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                        <label class="form-check-label"><?php echo $row['kd'] ?></label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['mata_pelajarann'] ?></td>
												<td><?php echo $row['kd_nama'] ?></td>
                                                <td>
												<center>
													<a target="_blank" href="<?php echo base_url('/kompetensi_dasar/cetak/'.$row['id_kompetensidasar']);?>" class="btn btn-primary">
													Unduh
													</a>
												</center>
												</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="flaticon-more-button-of-three-dots"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" target="_blank" href="<?php echo base_url('/kompetensi_dasar/cetak/'.$row['id_kompetensidasar']);?>"><i
                                                                    class="fas fa-eye text-dark-pastel-blue"></i>Cetak</a> 
                                                            <!-- <a class="dropdown-item" href="<?php echo base_url('/kompetensi_dasar/edit/'.$row['id_kompetensidasar']);?>"><i
                                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>-->
                                                            <a class="dropdown-item" href="<?php echo base_url('/kompetensi_dasar/deletes/'.$row['id_kompetensidasar']);?>"><i
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#unit').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>bukukerja/get_matapelajaran",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].mp_nama + '">' + data[i].mp_nama + '</option>';
                    }
                    $('.mapel').html(html);

                }
            });
        });
    });
</script>