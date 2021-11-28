 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
         <li class="breadcrumb-item">
             <a href="<?= base_url('kaprodi') ?>">Dashboard</a>
         </li>
         <li class="breadcrumb-item active">Kewirausahaan</li>
     </ol>


     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>




 </div>
 <!-- Main content -->
 <section class="content">
     <div class="container-fluid">
         <!-- Main row -->
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h6 class="m-0 font-weight-bold text-success"> <strong> Kewirausahaan Mahasiswa </strong></h6>

                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                         <?php if ($this->session->flashdata('message')) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo $this->session->flashdata('message');
                                echo '</div>';
                            }
                            ?>
                         <?php if ($this->session->flashdata('form_error')) : ?>
                             <div class="alert alert-danger" role="alert">
                                 <?php echo $this->session->flashdata('form_error'); ?>
                             </div>
                         <?php endif; ?>
                         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                             <div class="row">
                                 <div class="col-sm-12">
                                     <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" id="datatables">
                                         <thead>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Nama</th>
                                                 <th>NIM</th>
                                                 <th>Departemen</th>
                                                 <th>Program Studi</th>
                                                 <th>Nama Usaha</th>
                                                 <th>Jenis Usaha</th>
                                                 <th>Action</th>

                                             </tr>
                                         </thead>
                                         <tbody>

                                             <?php
                                                $id_kwu = 1;
                                                foreach ($kewirausahaan as $s) {
                                                    if ($s->id_prodi == $_SESSION['id_prodi']) {
                                                ?>
                                                     <tr>
                                                         <td><?= $id_kwu++; ?></td>
                                                         <td><?= $s->nama; ?></td>
                                                         <td><?= $s->nim; ?></td>
                                                         <td><?= $s->departemen; ?></td>
                                                         <td><?= $s->program_studi; ?></td>
                                                         <td><?= $s->nama_usaha; ?></td>
                                                         <td><?= $s->jenis_usaha; ?></td>

                                                         <td>
                                                             <a href="<?= base_url('kaprodi/detail_kwu') . '/' . $s->id_kwu; ?>" class="btn btn-success btn-sm">Detail</a>
                                                             <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_kwu<?= $s->id_kwu ?>"><i class="fas fa-edit"></i></button>
                                                             <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i></button>
                                                         </td>
                                                     </tr>
                                             <?php }
                                                } ?>
                                         </tbody>
                                         <tfoot>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Nama</th>
                                                 <th>NIM</th>
                                                 <th>Departemen</th>
                                                 <th>Program Studi</th>
                                                 <th>Nama Usaha</th>
                                                 <th>Jenis Usaha</th>
                                                 <th>Action</th>

                                             </tr>
                                         </tfoot>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Modal Delete Kewirausahaan -->

                     <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">×</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                                 <div class="modal-footer">
                                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                     <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('Kaprodi/delete_kwu/' . $s->id_kwu) ?>">Delete</a>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Modal Edit Kewirausahaan -->

                     <?php foreach ($kewirausahaan as $s) { ?>

                         <div class="modal fade" id="update_kwu<?= $s->id_kwu ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <div class="modal-body">
                                         <form id="myForm" action="<?php echo site_url('Kaprodi/update_kwu/' . $s->id_kwu); ?>" method="post" enctype="multipart/form-data">

                                             <div class="form-group">
                                                 <label for="nama">Nama*</label>
                                                 <input required type="text" class="form-control" id="nama" name="nama" value="<?= $s->nama ?>" placeholder="Masukkan Nama">
                                             </div>

                                             <div class="form-group">
                                                 <label for="nim">NIM*</label>
                                                 <input required type="text" class="form-control" id="nim" name="nim" value="<?= $s->nim ?>" placeholder="Masukkan NIM">
                                             </div>

                                             <div class="form-group">
                                                 <label for="departemen">Departemen*</label>
                                                 <input required type="text" class="form-control" id="departemen" name="departemen" value="<?= $s->departemen ?>" placeholder="Masukkan Departemen">
                                             </div>

                                             <div class="form-group">
                                                 <label for="program_studi">Program Studi*</label>

                                                 <select required name="program_studi" id="program_studi" class=" selectpicker form-control" data-live-search="true">
                                                     <option value="">Pilih Program Studi</option>
                                                     <option value="D4-Rekayasa Perancangan Mekanik">D4-Rekayasa Perancangan Mekanik</option>
                                                     <option value="D4-Teknologi Rekayasa Kimia Industri">D4-Teknologi Rekayasa Kimia Industri</option>
                                                     <option value="D4-Teknologi Rekayasa Otomasi">D4-Teknologi Rekayasa Otomasi</option>
                                                     <option value="D4-Teknologi Rekayasa Konstruksi Perkapalan">D4-Teknologi Rekayasa Konstruksi Perkapalan</option>
                                                     <option value="D4-Teknik Infrastruktur Sipil Dan Perancangan">D4-Teknik Infrastruktur Sipil Dan Perancangan</option>
                                                     <option value="D4-Perencanaan Tata Ruang Dan Pertanahan">D4-Perencanaan Tata Ruang Dan Pertanahan</option>
                                                     <option value="D4-Teknik Listrik Industri">D4-Teknik Listrik Industri</option>
                                                     <option value="D4-Manajemen dan Administrasi">D4-Manajemen Dan Administrasi</option>
                                                     <option value="D4-Informasi dan Hubungan Masyarakat">D4-Informasi Dan Hubungan Masyarakat</option>
                                                     <option value="D4-Akuntansi Perpajakan">D4-Akuntansi Perpajakan</option>
                                                     <option value="D4-Bahasa Asing Terapan">D4-Bahasa Asing Terapan</option>
                                                     <option value="D4-Teknologi Perencanaan Wilayah Dan Kota">D4-Teknologi Perencanaan Wilayah Dan Kota</option>
                                                     <option value="D3-Hubungan Masyarakat">D3-Hubungan Masyarakat</option>
                                                     <option value="D3-Akuntansi">D3-Akuntansi</option>
                                                     <option value="D3-Manajemen Perusahaan">D3-Manajemen Perusahaan</option>
                                                     <option value="D3-Administrasi Pajak">D3-Administrasi Pajak</option>
                                                 </select>
                                             </div>


                                             <div class="form-group">
                                                 <label for="nama_usaha">Nama Usaha*</label>
                                                 <input required type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?= $s->nama_usaha ?>" placeholder="Nama Usaha">
                                             </div>

                                             <div class="form-group">
                                                 <label for="jenis_usaha">Jenis Usaha*</label>
                                                 <input required type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="<?= $s->jenis_usaha ?>" placeholder="Jenis Usaha">
                                             </div>

                                             <div class="form-group">
                                                 <label for="file">Upload Bukti*</label>
                                                 <input required type="file" class="form-control" id="file" name="file">
                                             </div>

                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                         <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                     </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </div>
         </div>
     </div>
 </section>