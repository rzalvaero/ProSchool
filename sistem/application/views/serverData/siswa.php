    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Data Siswa</h3>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>
                                    <br>

                            </div>
                        </div>
                        <form>
                        <div class="row">   
							<div class="col-lg-3">                                        
								<div class="form-group">
								<?php if($this->session->userdata('type_users')=="ADMIN"){ ?>
                                <select class="select2" name="unit" id="unit">
                                    <option value="0">Pilih Unit</option>
									<?php foreach ($selectunit as $a) : ?>
                                            <option value="<?=$a->id?>"><?=$a->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
								<?php } else {
								$unit = $this->session->userdata('unit');	
								$row = "select * from web_unit WHERE id ='$unit'";
								$row_siswa									= $this->db->query($row)->row();
								$data['id'] 								= $row_siswa->id;
								$data['nama'] 								= $row_siswa->nama;
								?>
								<input type="text" value="<?php echo $data['nama']?>" class="form-control" readonly>
								<?php } ?>
                                </div>
							</div> 
							
                            <div class="col-lg-3">                                        
								<div class="form-group">
                                <select class="select2" name="kelas" id="kelas">
                                    <option value="0">Pilih Kelas</option>
                                        <?php foreach ($selectkelas as $a) : ?>
                                            <option value="<?=$a->idkelas?>"><?=$a->k_romawi ?></option>
                                        <?php endforeach; ?>
                                </select>
                                </div>
							</div> 
                            
                            <div class="col-lg-3">                                        
								<div class="form-group">
									<input type="number" name="nik" value="" class="form-control" id="nik" placeholder="NIK">
								</div>
							</div> 

							<div class="col-lg-3">   
								<div class="form-group">
									 <input type="number" name="nisn" value="" class="form-control" id="nisn" placeholder="NISN">
								</div>
							</div>
                            
							<div class="col-lg-3">                                      
								<div class="form-group">
                                    <a style="text-align:center;margin: 0px 20px 0px 0px;" href="<?php echo base_url();?>siswa/add" id="btn-filter" class="fw-btn-fill btn-gradient-yellow">Tambah Siswa</a>
                                </div>
							</div>   
							<div class="col-lg-6"> 
							</div> 
							<div class="col-lg-3">                                      
								<div class="form-group">
                                    <button  type="button" id="btn-filter" class="fw-btn-fill btn-gradient-yellow">Filter</button>
                                </div>
							</div>     
						</div>
                        </form>
                        <?php echo $this->session->flashdata("msg");?>
                        <div class="table-responsive">
						<table id="table" class="table display text-nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Lahir</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Lahir</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
        "searching": false,
        "bLengthChange": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('siswa/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.unit = $('#unit').val();
                data.kelas = $('#kelas').val();
                data.nisn = $('#nisn').val();
                data.nik = $('#nik').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
 
});
 
</script>
                