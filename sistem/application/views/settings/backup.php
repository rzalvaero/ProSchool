<div class="card-body">
    <div class="heading-layout1">
        <div class="item-title">
            <h3>Backup Data</h3>
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
    <?php echo $this->session->flashdata("msg");?>
    <form class="mg-b-20">
        <div class="row gutters-8">
            
            <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">

            </div>
            <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                <a href="<?php echo base_url();?>settings/backup_data" style="text-align:center;" class="fw-btn-fill btn-gradient-yellow">Genrate Backup</a>
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
                            <label class="form-check-label">ID</label>
                        </div>
                    </th>
                    <th>Date Backup</th>
                    <th>Filename</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($backup as $row) { ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">#<?php echo $no++ ?></label>
                        </div>
                    </td>
                    <td><?php echo $row['datestamp'] ?></td>
                    <td><a href="<?php echo base_url('/assets/backup/'.$row['filedata']);?>"><?php echo $row['filedata'] ?></a></td>
                     <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="flaticon-more-button-of-three-dots"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo base_url('/settings/delete_backup/'.$row['id']);?>"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                <a class="dropdown-item" href="<?php echo base_url('/assets/backup/'.$row['filedata']);?>"><i class="fas fa-solid fa-download text-green-peel"></i>Download</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>