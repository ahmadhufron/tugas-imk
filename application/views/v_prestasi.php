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
                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-4 ml-4 mr-4">
                    <!-- Card Header - Accordion -->
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample1">
                        <div class="card-body">
                            <!-- Basic Card Example -->
                            <div class="card shadow-none mb-1 ml-4 mr-4 ">
                                <div class="card-body">
                                    <div class="form-group col-sm font-weight-bolder text-body mb-1">

                                        <div class="navbar-form navbar-left">
                                            <form action="<?php echo site_url('cariprestasi/search_keyword'); ?>" method="post">
                                                <label for="pencarian">Pencarian</label>
                                                <input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci.." />
                                                <button type="submit" class="btn btn-success" value="Search"> <i class="fa fa-search"></i>Cari</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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

                                                        <div class="scroll">

                                                            <table id="example" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>NIM</th>
                                                                        <th>Nama</th>
                                                                        <th>Departemen</th>
                                                                        <th>Program Studi</th>
                                                                        <th>Nama Kegiatan</th>
                                                                        <th>Tingkat</th>
                                                                        <th>Juara</th>
                                                                        <th>Tempat</th>
                                                                        <th>Tahun</th>
                                                                        <th>aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php $id = 1;
                                                                    foreach ($prestasi as $s) { ?>
                                                                        <tr>
                                                                            <td><?= $id++; ?></td>
                                                                            <td><?= $s->nim; ?></td>
                                                                            <td><?= $s->nama; ?></td>
                                                                            <td><?= $s->departemen; ?></td>
                                                                            <td><?= $s->program_studi; ?></td>
                                                                            <td><?= $s->nama_lomba; ?></td>
                                                                            <td><?= $s->tingkat; ?></td>
                                                                            <td><?= $s->juara; ?></td>
                                                                            <td><?= $s->penyelenggara; ?></td>
                                                                            <td><?= $s->tahun; ?></td>

                                                                            <td>
                                                                                <?php echo anchor('home/detail_prestasi/' . $s->id, '<div class="btn btn-sm btn-success btn-sm"><i class="fa fa-search-plus"></i>

                                                                    </div>') ?>

                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>NIM</th>
                                                                        <th>Nama</th>
                                                                        <th>Departemen</th>
                                                                        <th>Program Studi</th>
                                                                        <th>Nama Kegiatan</th>
                                                                        <th>Tingkat</th>
                                                                        <th>Juara</th>
                                                                        <th>Tempat</th>
                                                                        <th>Tahun</th>
                                                                        <th>aksi</th>
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
            </div>
        </div>
    </div>
</section>