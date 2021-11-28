<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('tatausaha') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Prestasi</li>
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
                        <h6 class="m-0 font-weight-bold text-success"> <strong> Prestasi Mahasiswa </strong></h6>
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
                                                <th>Nama Lomba</th>
                                                <th>Tingkat</th>
                                                <th>Tempat</th>
                                                <th>aksi</t>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $id = 1;
                                            foreach ($prestasi as $row) { ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?= $row->nama; ?></td>
                                                    <td><?= $row->nim; ?></td>
                                                    <td><?= $row->departemen; ?></td>
                                                    <td><?= $row->program_studi; ?></td>
                                                    <td><?= $row->nama_lomba; ?></td>
                                                    <td><?= $row->tingkat; ?></td>
                                                    <td><?= $row->penyelenggara; ?></td>

                                                    <td>
                                                        <a href="<?= base_url('tatausaha/detail_prestasi') . '/' . $row->id; ?>" class="btn btn-success btn-sm">Detail</a>

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
                                                <th>Nama Lomba</th>
                                                <th>Tingkat</th>
                                                <th>Tempat</th>
                                                <th>aksi</t>
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

</section>