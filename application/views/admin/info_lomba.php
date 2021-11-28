<script src="<?php echo base_url() ?>assets/assets/tinymce/js/tinymce/tinymce.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-plus fa-fw"></i>Tambah Data Baru</button>
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
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Isi</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $id = 1;
                                            foreach ($info_lomba as $s) { ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?= $s->judul; ?></td>
                                                    <td align=center><img style="width:100px;" src="<?php echo base_url('upload/info_lomba/' . $s->foto); ?>" alt=""></td>
                                                    <td><?= $s->isi; ?></td>

                                                    <td>
                                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_info_lomba<?= $s->id ?>"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Isi</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type='text/javascript'>
                        tinymce.init({
                            selector: 'textarea',
                            height: 400,

                            plugins: [
                                'advlist autolink lists link image charmap print preview anchor',
                                'searchreplace visualblocks code fullscreen',
                                'insertdatetime media table paste code help wordcount'
                            ],
                            toolbar: 'undo redo | formatselect | ' +
                                'bold italic backcolor | alignleft aligncenter ' +
                                'alignright alignjustify | bullist numlist outdent indent | ' +
                                'removeformat | help',
                            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        });
                    </script>


                    <!-- Modal add -->

                    <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form id="myForm" action="<?php echo site_url('Admin/save_info_lomba') ?>" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="judul">Judul*</label>
                                            <input required type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Nama">
                                        </div>


                                        <div class="form-group">
                                            <label for="bukti">Upload Foto*</label>
                                            <input required type="file" class="form-control" id="foto" name="foto">
                                        </div>

                                        <div class="form-group">
                                            <label for="isi">Isi*</label>


                                            <textarea id="isi" class='editor' name='isi'>
      <?php if (isset($isi)) {
            echo $isi;
        } ?> 
      </textarea>

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

                    <!-- Modal Delete info lomba -->

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
                                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('Admin/delete_info_lomba/' . $s->id) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal Edit Info Lomba -->

                    <?php foreach ($info_lomba as $s) { ?>

                        <div class="modal fade" id="update_info_lomba<?= $s->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myForm" action="<?php echo site_url('Admin/update_info_lomba/' . $s->id); ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="judul">Judul*</label>
                                                <input required type="text" class="form-control" id="judul" name="judul" value="<?= $s->judul ?>" placeholder="Masukkan Nama">
                                            </div>


                                            <div class="form-group">
                                                <label for="foto">Upload Foto*</label>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>

                                            <div class="form-group">
                                                <label for="isi">Isi*</label>
                                                <textarea class="form-control" type="text" name="isi" placeholder="Masukkan Isi Redaksi" maxlength="500" cols="20" rows="20"><?php echo $s->isi ?></textarea>


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