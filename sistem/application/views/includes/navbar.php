    <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="<?php echo base_url();?>">
                        <img style="-5px 0px 0px 10px" src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
                    </a>
                </div>
                 <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Cari . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    
                    <li class="navbar-item dropdown header-message">
						<?php 
						$date   = date("m Y");  
						$sqlnotif									= "SELECT COUNT(id) as total FROM web_calender WHERE DATE_FORMAT(waktu,'%m %Y') = '$date'";
						$row_notif									= $this->db->query($sqlnotif)->row();
						$notif		 								= $row_notif->total;
						?>
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Pesan</div>
                            <span><?php echo $notif ?></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title"><?php echo $notif ?> Pesan</h6>
                            </div>
                            <div class="item-content">
                                <?php 
                                $date   = date("m Y");  
                                //die(print_r($date));
                                $notif  = $this->db->query("SELECT * FROM web_calender WHERE DATE_FORMAT(waktu,'%m %Y') = '$date'")->result_array();
                                foreach ($notif as $row1) { ?>
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="<?php echo base_url();?>assets/img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name"><?php echo $row1['title']?></span> 
                                                <span class="item-time"><?php echo $row1['waktu']?></span> 
                                            </a>  
                                        </div>
                                        <?php if($row1['libur']=='1') { ?>
                                            <p style="color:red;">Libur</p>
                                        <?php }elseif($row1['libur']==''){ ?>
                                            <p style="color:blue;">Ada Kelas</p>
                                        <?php }else{ ?>
                                            <p style="color:blue;">Masuk Seperti Biasa</p>
                                        <?php }?>
                                    </div>
                                </div>
                                <?php } ?>
                                <!--
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="<?php echo base_url();?>assets/img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Maria Zaman</span> 
                                                <span class="item-time">18:30</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-yellow author-online">
                                        <img src="<?php echo base_url();?>assets/img/figure/student12.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Benny Roy</span> 
                                                <span class="item-time">10:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-pink">
                                        <img src="<?php echo base_url();?>assets/img/figure/student13.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Steven</span> 
                                                <span class="item-time">02:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-violet-blue">
                                        <img src="<?php echo base_url();?>assets/img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Joshep Joe</span> 
                                                <span class="item-time">12:35</span> 
                                            </a>  
                                        </div>
                                        <p>What is the reason of buy this item. 
                                        Is it usefull for me.....</p>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    </li>

                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Surat</div>
                            <!--<span></span>-->
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">Surat Acak</h6>
                            </div>
                            <div class="item-content">
							<?php 
								$surat  = $this->db->query("SELECT * FROM web_surat ORDER BY RAND() LIMIT 1")->result_array();
								foreach ($surat as $srt) { ?>
                                <div class="media">
                                    <div class="item-icon bg-skyblue">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title" style="float:right;">
										<?php echo $srt['ayat'] ?> Ayat / <?php echo $srt['asma'] ?><br/>
										QS. <?php echo $srt['nama'] ?> ( <?php echo $srt['arti'] ?> )</div>
                                        <span>
										<audio controls>
										  <source src="<?php echo $srt['audio'] ?>" type="audio/mpeg">
										  Your browser does not support the audio element.
										</audio>
										</span> 
										<br/><p>
										
										</p>
                                    </div>
                                </div>
							<?php } ?>
                            </div>
                        </div>
                    </li>
                    
                    <!--<li class="navbar-item dropdown header-language">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>IN</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Indonesia</a>
                        </div>
                    </li>-->

                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title"><?php echo $this->session->userdata('first_name')?><?php echo $this->session->userdata('last_name')?></h5>
                                <span>
                                    <?php echo $this->session->userdata('username')?>
                                    <?php echo $this->session->userdata('nama_kelas')?>
                                </span>
                            </div>
                            <div class="admin-img">
                                <img src="<?php echo base_url();?>assets/img/figure/admin.png" style="max-width:40px;" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title"><?php echo $this->session->userdata('first_name')?></h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="<?php echo base_url();?>profile"><i class="flaticon-user"></i>Akun</a></li>
                                    <li><a href="#"><i class="flaticon-list"></i>Tugas</a></li>
                                    <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Pesan</a></li>
                                    <li><a href="<?php echo base_url();?>profile/setting"><i class="flaticon-gear-loading"></i>Pengaturan Akun</a></li>
                                    <li><a href="<?php echo base_url();?>auth/logout"><i class="flaticon-turn-off"></i>Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>