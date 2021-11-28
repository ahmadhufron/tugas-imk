 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Breadcrumbs-->
     <ol class="breadcrumb">
         <li class="breadcrumb-item">
             <a href="<?= base_url('dekan') ?>">Dashboard</a>
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

                     <div class="card shadow mt-3 ml-4 mr-4">
                         <!-- Card Header - Accordion -->
                         <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                             <h6 class="m-0 font-weight-bold text-success"> <strong> Kewirausahaan Mahasiswa </strong></h6>
                         </a>
                         <!-- Card Content - Collapse -->
                         <div class="collapse show" id="collapseCardExample">
                             <div class="card-body">

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

                                                         <?php $id_kwu = 1;
                                                            foreach ($kewirausahaan as $s) { ?>
                                                             <tr>
                                                                 <td><?= $id_kwu++; ?></td>
                                                                 <td><?= $s->nama; ?></td>
                                                                 <td><?= $s->nim; ?></td>
                                                                 <td><?= $s->departemen; ?></td>
                                                                 <td><?= $s->program_studi; ?></td>
                                                                 <td><?= $s->nama_usaha; ?></td>
                                                                 <td><?= $s->jenis_usaha; ?></td>

                                                                 <td>
                                                                     <a href="<?= base_url('dekan/detail_kwu') . '/' . $s->id_kwu; ?>" class="btn btn-success btn-sm">Detail</a>

                                                                 </td>
                                                             </tr>
                                                         <?php } ?>
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


                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

     </div>

 </section>