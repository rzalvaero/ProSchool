<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="card height-auto">
    <div class="card-body">
		<?php echo $this->session->flashdata("msg");?>
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Nilai Ekstrakurikuler Siswa</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
				<!--<a href="<?php echo base_url();?>nilai/cetak_allekstra" target="_blank" class="btn btn-info">
				<i class="fas fa-print"></i> Cetak Semua
				</a>-->
            </div>
        </div>
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
										<th>Ekstrakurikuler</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ekstrakurikuler as $row) { ?>
									<tr>
										<td>
											<div class="form-check">
												<input type="checkbox" class="form-check-input">
												<label class="form-check-label">#001</label>
											</div>
										<td><?php echo $row['e_nama'] ?></td>
										<td>
											<center>
												<a href="<?php echo base_url('/nilai/cetak_ekstra/'.$row['idekstra']);?>" target="_blank" class="btn btn-success">
													Cetak Nilai
												</a>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal<?php echo $row['idekstra'] ?>">
													Input Nilai
												</button>
											</center>
											<div class="modal fade" id="large-modal<?php echo $row['idekstra'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Input Nilai Ekstrakurikuler</h5>
																<a href="<?php echo base_url();?>nilai/ekstrakurikuler"><span aria-hidden="true">&times;</span></a>
															</div>
															<form class="new-added-form" action="<?php echo base_url() . 'nilai/nilaiekstra_update'; ?>" method="POST">
															<div class="modal-body">
                                                        <table class="table display data-table text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input checkAll">
                                                                            <label class="form-check-label">Nama Siswa</label>
                                                                        </div>
                                                                    </th>
                                                                    <th>Kelas</th> 
                                                                    <th width="60px">Nilai</th>
                                                                    <th>Deskripsi</th> 
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $idnya = $row['idekstra'];
                                                                $pilihan  = $this->db->query("SELECT SNE.*, SE.e_nama, SK.* , SS.s_nama as siswanya FROM sr_nilai_ekstrakulikuler SNE
																LEFT JOIN sr_ekstra SE on SE.idekstra = SNE.id_ekstrakulikuler
																LEFT JOIN sr_siswa SS on SS.idsiswa = SNE.id_siswa
																LEFT JOIN sr_kelas SK on SK.idkelas = SNE.id_kelas
																WHERE SNE.id_ekstrakulikuler='$idnya'")->result_array();
                                                                foreach ($pilihan as $row1) {
																	$id = $row1['id_nilai_ekstrakulikuler'];
																	$siswa = $row1['siswanya'];
																	$romawi = $row1['k_romawi'];
																	$keterangan = $row1['k_keterangan'];
																	$nilai = $row1['nilai'];
																	$deskripsi = $row1['deskripsi'];
																	
																	echo "<tr>";
																	echo "<td>
																	".$siswa."
																	</td>";
																	echo "<td>
																	".$romawi." / ".$keterangan."
																	</td>";
																	echo "<td>
																	<input width='60px' min='0' max='100' type='number' class='txtedit' data-id='".$id."' data-field='nilai' id='nametxt_".$id."' value='".$nilai."' >
																	</td>";
																	echo "<td>
																	<input type='text' class='txtedit' data-id='".$id."' data-field='deskripsi' id='nametxt_".$id."' value='".$deskripsi."' >
																	</td>";
																	echo "</tr>";
																	?>
                                                                    <!--<tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input">
                                                                                <label class="form-check-label"><?php echo $row1['siswanya'] ?></label>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $row1['k_romawi'] ?> - <?php echo $row1['k_keterangan'] ?></td>
                                                                        <td><?php echo $row1['nilai'] ?></td>
                                                                        <td><?php echo $row1['deskripsi'] ?></td>
                                                                        <td></td>
                                                                    </tr>-->
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
															<div class="modal-footer">
																<a href="<?php echo base_url();?>nilai/ekstrakurikuler" class="footer-btn bg-dark-low">Keluar</a>
															</div>
															</form>
														</div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){

       // On text click
       $('.edit').click(function(){
          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus();

          // Hide clicked element
          $(this).hide();
       });

       // Focus out from a textbox
       $('.txtedit').focusout(function(){
          // Get edit id, field name and value
          var edit_id = $(this).data('id');
          var fieldname = $(this).data('field');
          var value = $(this).val();

          // assign instance to element variable
          var element = this;

          // Send AJAX request
          $.ajax({
            url: '<?php echo base_url();?>nilai/updateNilai',
            type: 'POST',
            data: { field:fieldname, value:value, id:edit_id },
            success:function(response){

              // Hide Input element
              $(element).hide();

              // Update viewing value and display it
              $(element).prev('.edit').show();
              $(element).prev('.edit').text(value);
            }
          });
        });
      });
	  
	  $(function () {
		  $("input").keydown(function () {
			// Save old value.
			if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
			$(this).data("old", $(this).val());
		  });
		  $("input").keyup(function () {
			// Check correct, else revert back to old value.
			if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
			  ;
			else
			  $(this).val($(this).data("old"));
		  });
		});
      </script>