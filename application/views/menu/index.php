                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">

                            <!-- Main row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"> Add New Menu</a>
                                        </div>
                                        <!-- Card Content - Collapse -->
                                        <div class="collapse show" id="collapseCardExample">
                                            <div class="card-body">

                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>');  ?>

                                                    <?= $this->session->flashdata('message'); ?>
                                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" id="datatables">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Menu</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1  ?>
                                                                        <?php foreach ($menu as $m) : ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $i;  ?></th>
                                                                                <td><?= $m['menu']; ?></td>

                                                                            </tr>
                                                                            <?php $i++; ?>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <!-- /.container-fluid -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End of Main Content -->

                    <!-- Modal -->
                    <!-- Button trigger modal -->

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('menu'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->

                    <?php foreach ($menu as $m) { ?>

                        <div class="modal fade" id="update_menu" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('menu'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>