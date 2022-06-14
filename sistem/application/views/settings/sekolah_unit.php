<!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row">
    <!-- Add Notice Area Start Here -->
	<div class="col-4-xxxl col-12">
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Buat Unit Sekolah</h3>
                    </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right">
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
                <form class="new-added-form" action="<?php echo base_url(). 'settings/addUnit'; ?>" method="post">
                    <div class="row">
                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                            <label>Nama Unit</label>
                            <input type="text" name="nama" placeholder="Nama unit Sekolah" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>NPSN</label>
                            <input type="text" name="npsn" placeholder="Ketik NPSN" class="form-control">
                        </div>
                        <div class="col-12-xxxl col-lg-3 col-12 form-group">
                            <label>NSS</label>
                            <input type="text" name="nss" placeholder="Ketik NSS" class="form-control">
                        </div>
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Kepala Sekolah</label>
                            <input type="text" name="kepsek" placeholder="Nama Kepala Sekolah" class="form-control">
                        </div>
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Telpon</label>
                            <input type="text" name="tel" placeholder="Ketik Telpon" class="form-control">
                        </div>
						<div class="col-12-xxxl col-lg-4 col-12 form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Ketik Email" class="form-control">
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
	<div class="col-8-xxxl col-12">
    <?php echo $this->session->flashdata("msg");?>
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Unit Sekolah</h3>
                                    </div>
                                 
                                    <div class="dropdown">
										<a href="<?php echo base_url();?>settings/sekolah" class="nav-link">
											<i class="flaticon-reload"></i>
										</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
									<!--<table width='100%' border='1' style='border-collapse: collapse;'>-->
                                    <table width='100%' class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Kepsek</th>
                                                <th>NPSN</th>
												<th>NSS</th>
                                                <th>Telpon</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach ($setting as $row) {
											 $id = $row['id'];
											 $nama_sekolah = $row['nama_sekolah'];
											 $kepsek = $row['kepsek'];
											 $npsn = $row['npsn'];
											 $nss = $row['nss'];
											 $no_telepon = $row['no_telepon'];
											 $email = $row['email'];
											 
											     echo "<tr>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='nama_sekolah' id='nametxt_".$id."' value='".$nama_sekolah."' >
												 </td>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='kepsek' id='kepsektxt_".$id."' value='".$kepsek."' >
												 </td>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='npsn' id='npsntxt_".$id."' value='".$npsn."' >
												 </td>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='nss' id='nsstxt_".$id."' value='".$nss."' >
												 </td>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='no_telepon' id='no_telepontxt_".$id."' value='".$no_telepon."' >
												 </td>";
												 echo "<td>
												 <input type='text' class='txtedit' data-id='".$id."' data-field='email' id='emailtxt_".$id."' value='".$email."' >
												 </td>";
												 echo "<td>
												 <a class='btn btn-primary' href='sekolah_profil/$id'>
													Pengaturan Profil
												 </a>
												 <a class='btn btn-primary' href='sekolah_images/$id'>
													Pengaturan Gambar
												 </a>
												 <a class='btn btn-danger' href='deleteUnit/$id'>
													Hapus Unit
												 </a>
												 </td>";
												 echo "</tr>";
											} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- All Notice Area Start Here -->
    
    <!-- All Notice Area End Here -->
</div>

 <!-- Script -->
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
            url: '<?php echo base_url();?>settings/updateUnit',
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
      </script>