 <div class="container">

     <!-- Outer Row -->
     <div class="row justify-content-center">

         <div class="col-lg-7">

             <div class="card o-hidden border-0 shadow-lg my-5">
                 <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                         <div class="col-lg">
                             <div class="p-5">
                                 <div class="card-title text-center">
                                     <img src="assets/img/undip.jpg" alt="Universitas Diponegoro" style="width: 150px;">
                                     <h1 class="h2 text-gray-900 mb-2">Sistem Informasi Kemahasiswaan Sekolah Vokasi</h1>
                                     <h2 class="h4 text-gray-900 mb-4">Universitas Diponegoro</h2>
                                 </div>
                                 <?php if ($this->session->flashdata('message')) {
                                        echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                        echo $this->session->flashdata('message');
                                        echo '</div>';
                                    }
                                    ?>
                                 <div class="text-center">
                                 </div>
                                 <form class="user" method="post" action="<?= base_url('auth');  ?>">
                                     <div class="form-group">
                                         <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email');  ?>">
                                         <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                                     </div>
                                     <div class="form-group">
                                         <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                         <?= form_error('password', '<small class="text-danger pl-3">', '</small>');  ?>
                                     </div>
                                     <button type="submit" class="btn btn-primary btn-user btn-block">
                                         Login
                                     </button>
                                 </form>
                                 <hr>

                                 <div class="text-center">
                                     <a class="btn btn-primary" href="<?= base_url() ?>">SIKMA-VOKASI</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

     </div>

 </div>