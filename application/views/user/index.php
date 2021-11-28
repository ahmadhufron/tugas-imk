                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <?php if ($this->session->flashdata('message')) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo $this->session->flashdata('message');
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>



                    <div class="row">

                        <!-- Border Left Utilities -->
                        <div class="col-lg-12">

                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    My Profile
                                    <div>
                                        <a href="<?php echo base_url("user/profil") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    Pengajuan Lomba
                                    <div>
                                        <a href="<?php echo base_url("user/pengajuanlomba") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    Prestasi Mahasiswa
                                    <div>
                                        <a href="<?php echo base_url("user/prestasi") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body">
                                    Kewirausahaan Mahasiswa
                                    <div>
                                        <a href="<?php echo base_url("user/kewirausahaan") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>







                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->