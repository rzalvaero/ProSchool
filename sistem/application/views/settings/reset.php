<div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Reset Setting</h3>
                                    </div>
                                    <div class="dropdown">
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
                                    </div>
                                </div>
                                
                               
                                
                                <div class="card ui-tab-card">
                                    <div class="card-body">
                                        <?php echo $this->session->flashdata("msg");?>
                                        <div class="vertical-tab">
                                            <ul class="nav nav-tabs flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab10" role="tab" aria-selected="true">Web Setup</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab11" role="tab" aria-selected="false">Visitor</a>
                                                </li>
                                                <!--<li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab12" role="tab" aria-selected="false">Settings</a>
                                                </li>-->
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tab10" role="tabpanel">
                                                    <p>Dengan ini kamu berarti setuju untuk mereset Web Setup dan Setting akan dikembalikan secara Default oleh System.</p>
                                                    <div class="col-12 form-group mg-t-8">
                                                        <!--<a href="<?php echo base_url();?>settings/reset_visitor" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Agree</a>-->
                                                        <button type="button" class="modal-trigger btn-fill-lg bg-blue-dark btn-hover-yellow" data-toggle="modal"
                                                        data-target="#reset-modal">
                                                        Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab11" role="tabpanel">
                                                    <p>Dengan ini kamu berarti setuju untuk mereset Web Visitor menjadi kembali dari 0 oleh System.</p>
                                                    <div class="col-12 form-group mg-t-8">
                                                        <!--<a href="<?php echo base_url();?>settings/reset_visitor" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Agree</a>-->
                                                        <button type="button" class="modal-trigger btn-fill-lg bg-blue-dark btn-hover-yellow" data-toggle="modal"
                                                        data-target="#visitor-modal">
                                                        Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab12" role="tabpanel">
                                                    <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                                        It has survived not only five centuries, but alsowhen an unknown printer took a galley of type 
                                                        and scrambled it to make a type specimen book. It has survived not only five centuries, but 
                                                        alsowhen an unknown printer took.When an unknown printer took a galley of type and scrambled 
                                                        it to make a type specimen book. It has survived not only five centuries, but alsowhen an 
                                                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has 
                                                        survived not only five centuries, but alsowhen an unknown printer took.</p>
                                                </div>
                                            </div>
                                            <!-- reset untuk web -->
                                            <div class="modal fade" id="reset-modal" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog success-modal-content" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="success-message">
                                                                <h3 class="item-title">Are u sure to Reset Web back to Default?</h3>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn-fill-lg bg-blue-dark btn-hover-yello" data-dismiss="modal">Cancel</button>
                                                            <a style="background:#ff0000db;" href="<?php echo base_url();?>settings/reset_web" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Agree</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- reset untuk visitor -->
                                            <div class="modal fade" id="visitor-modal" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog success-modal-content" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="success-message">
                                                                <h3 class="item-title">Are u sure to Reset visitor to Default?</h3>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn-fill-lg bg-blue-dark btn-hover-yello" data-dismiss="modal">Cancel</button>
                                                            <a style="background:#ff0000db;" href="<?php echo base_url();?>settings/reset_visitor" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Agree</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <a href="<?php echo base_url();?>settings" style="float:right;margin: 0px 20px 0px 0px;" type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
                                </div>
                            </div>