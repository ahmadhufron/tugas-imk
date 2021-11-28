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


                    <div class="card shadow mt-3 ml-4 mr-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-success"> <strong> DAFTAR PENGAJUAN LOMBA </strong></h6>
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

                                                <table id="example" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>NIM</th>
                                                            <th>Departemen</th>
                                                            <th>Program Studi</th>
                                                            <th>OPSI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $id = 1;
                                                        foreach ($data as $row) { ?>
                                                            <tr>
                                                                <td><?= $id++; ?></td>
                                                                <td><?php echo $row->nama; ?></td>
                                                                <td><?php echo $row->nim; ?></td>
                                                                <td><?php echo $row->departemen; ?>
                                                                <td><?php echo $row->program_studi; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('Keuangan/detail_data') . '/' . $row->id; ?>" class="btn btn-sm btn-success btn-sm">Detail</a>

                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <troot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>NIM</th>
                                                            <th>Departemen</th>
                                                            <th>Program Studi</th>
                                                            <th>OPSI</th>
                                                        </tr>
                                                    </troot>
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