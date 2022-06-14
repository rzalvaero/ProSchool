<footer class="bg-dark default-padding-top text-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <img src="<?php echo base_url();?>assets/img/logo-light.png" alt="Logo">
                            <p>
                                <?php echo $description ?>
							</p>
                            <p class="text-italic">
                                Silakan tulis email Anda dan dapatkan pembaruan, berita, dan dukungan kami yang luar biasa
                            </p>
                            <div class="subscribe">
                                <form action="#">
                                    <div class="input-group stylish-input-group">
                                        <input type="email" placeholder="Masukan Email Kamu" class="form-control" name="email">
                                        <button type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 item">
                        <div class="f-item link">
                            
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item address">
                            <h4>Kontak</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i> 
                                    <p>Email <span><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i> 
                                    <p>Telepon <span><?php echo $whatsapp ?></span></p>
                                </li>
                            </ul>
                            <div class="opening-info">
                                <h5>Jam Buka</h5>
                                <ul>
                                    <li> <span> Sen - Jum :  </span>
                                      <div class="pull-right"> 06.00 - 17.00 </div>
                                    </li>
                                    <li> <span> Sab : </span>
                                      <div class="pull-right"> 08.00 - 12.00 </div>
                                    </li>
                                    <li> <span> MIn : </span>
                                      <div class="pull-right closed"> Tutup </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2019. All Rights Reserved by <a href="#">DesaTech</a></p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Terms of user</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
	<script type="text/javascript">
                (function () {
                    var options = {
                        whatsapp: "+<?php echo $whatsapp ?>", // WhatsApp number62 
                        call_to_action: "Hubungi Kami", // Call to action
                        position: "right", // Position may be 'right' or 'left'
                    };
                    var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
                })();
	</script>