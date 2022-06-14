<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Cetak Raport</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>profile/setting"><i class="far fa-edit"></i>Edit</a>
                    <a onclick="window.print();" class="dropdown-item noPrint" href="#"><i class="fas fa-print"></i>Cetak</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-download"></i>Unduh</a>
                </div>
            </div>
        </div>
        
        <form class="mg-b-20" action="<?php echo base_url(); ?>nilai" method="POST" target="_blank">
            <div class="row gutters-8">
                <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                    <!-- <input type="text" placeholder="Search by Class..." class="form-control"> -->
                    <select class="select2" name="kelas">
                        <option value="">Pilih Kelas *</option>
                        <?php foreach ($dropdown as $a) : ?>
                            <option value="<?php echo base_url(); ?>nilai/leger_print/<?= $a->idkelas ?>" target="_blank"><?= $a->k_romawi ?> | <?= $a->k_keterangan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6-xxxl col-xl-6 col-lg-6 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                </div>
            </div>
        </form>
    </div>
</div>

