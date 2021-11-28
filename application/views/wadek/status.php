<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('wadek') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Status</li>
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
                        <h6 class="m-0 font-weight-bold text-success"> <strong> Status Pengajuan Lomba </strong></h6>
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
                                                <th>Program Studi</th>
                                                <th>Wakil Dekan 1</th>
                                                <th>Tata Usaha</th>
                                                <th>NIM</th>
                                                <th>Departemen</th>
                                                <th>Program Studi</th>
                                                <th>Nama Lomba</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 1;
                                            foreach ($data as $row) { ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?php echo $row->nama; ?></td>
                                                    <td align="center"><?php switch ($row->status_prodi) {
                                                                            case 0: ?><button type="button" class="btn btn-warning btn-sm">Proses</button><?php break;
                                                                                                                                                        case 1: ?><button data-toggle="modal" data-target="#detail_revisi<?= $row->id ?>" type="button" class="btn btn-warning btn-sm">DiTolak</button><?php break;
                                                                                                                                                                                                                                                                                                    case 3: ?> <button type="button" class="btn btn-success btn-sm">Selesai</button><?php break;
                                                                                                                                                                                                                                                                                                                                                                            } ?></td>
                                                    <td align="center"><?php if ($row->status_prodi == '3') {
                                                                            switch ($row->status_wd1) {
                                                                                case 0: ?><button type="button" class="btn btn-warning btn-sm">Proses</button><?php break;
                                                                                                                                                            case 1: ?><button data-toggle="modal" data-target="#detail_revisi_wd1<?= $row->id ?>" type="button" class="btn btn-warning btn-sm">DiTolak</button><?php break;
                                                                                                                                                                                                                                                                                                            case 3: ?> <button type="button" class="btn btn-success btn-sm">Selesai</button><?php break;
                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                } else { ?><button type="button" class="btn btn-danger btn-sm">Kosong</button></a><?php } ?></td>
                                                    <td align="center"><?php if ($row->status_wd1 == '3') {
                                                                            switch ($row->status_tu) {
                                                                                case 0: ?><button type="button" class="btn btn-warning btn-sm">Proses</button><?php break;
                                                                                                                                                            case 1: ?><button data-toggle="modal" data-target="#detail_revisi_tu<?= $row->id ?>" type="button" class="btn btn-warning btn-sm">DiTolak</button><?php break;
                                                                                                                                                                                                                                                                                                            case 3: ?> <button type="button" class="btn btn-success btn-sm">Selesai</button><?php break;
                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                } else { ?><button type="button" class="btn btn-danger btn-sm">Kosong</button><?php } ?></td>


                                                    <td><?php echo $row->nim; ?></td>
                                                    <td><?php echo $row->departemen; ?></td>
                                                    <td><?php echo $row->program_studi; ?></td>
                                                    <td><?php echo $row->nama_lomba; ?></td>
                                                    <td><a href="<?= base_url('Wadek/detail_data') . '/' . $row->id; ?>" class="btn btn-sm btn-success btn-sm">Detail</a></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <troot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Program Studi</th>
                                                <th>Wakil Dekan 1</th>
                                                <th>Tata Usaha</th>
                                                <th>NIM</th>
                                                <th>Departemen</th>
                                                <th>Program Studi</th>
                                                <th>Nama Lomba</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </troot>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Modal lihat Revisi Prodi-->

                        <?php foreach ($data as $row) { ?>

                            <div class="modal fade" id="detail_revisi<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <form id="myForm" action=" " method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="ket_tolak_prodi">Keterangan*</label>
                                                    <input required type="text" class="form-control" id="ket_tolak_prodi" name="ket_tolak_prodi" maxlength="500" cols="10" rows="10" value="<?= $row->ket_tolak_prodi ?>" readonly>
                                                </div>

                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        <!-- Modal lihat Revisi Wadek-->

                        <?php foreach ($data as $row) { ?>

                            <div class="modal fade" id="detail_revisi_wd1<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <form id="myForm" action=" " method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="ket_tolak_wd1">Keterangan*</label>
                                                    <input required type="text" class="form-control" id="ket_tolak_wd1" name="ket_tolak_wd1" maxlength="500" cols="10" rows="10" value="<?= $row->ket_tolak_wd1 ?>" readonly>
                                                </div>

                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Modal lihat Revisi TU-->

                        <?php foreach ($data as $row) { ?>

                            <div class="modal fade" id="detail_revisi_tu<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <form id="myForm" action=" " method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="ket_tolak_tu">Keterangan*</label>
                                                    <input required type="text" class="form-control" id="ket_tolak_tu" name="ket_tolak_tu" maxlength="500" cols="10" rows="10" value="<?= $row->ket_tolak_tu ?>" readonly>
                                                </div>

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
    </div>

</section>