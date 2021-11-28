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
                        <h6 class="m-0 font-weight-bold text-success"> <strong> Data Pengajuan Lomba </strong></h6>
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
                                                        <a href="<?= base_url('Tatausaha/detail_data') . '/' . $row->id; ?>" class="btn btn-sm btn-success btn-sm">Detail</a>

                                                        <a data-toggle="modal" data-target="#no_surat<?= $row->id ?>" class="btn btn-sm btn btn-outline-success">Setujui</a>

                                                        <a data-toggle="modal" data-target="#tolak_tu<?= $row->id ?>" class="btn btn-sm btn btn-outline-danger">Tolak</a>
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

                    <!-- Modal tolak prodi -->

                    <?php foreach ($data as $row) { ?>

                        <div class="modal fade" id="tolak_tu<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <form id="myForm" action="<?php echo site_url('Tatausaha/tolak/' . $row->id); ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="ket_tolak_tu">Keterangan*</label>

                                                <textarea class="form-control <?php echo form_error('ket_tolak_tu') ? 'is-invalid' : '' ?>" type="text" name="ket_tolak_tu" placeholder="Masukkan Isi Redaksi" maxlength="500" cols="5" rows="5"></textarea>


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

                    <!-- Modal Nomor Surat -->

                    <?php foreach ($data as $row) {



                        $tahun = date('Y');
                        $this->db->order_by('id', 'DESC');
                        $cek_ns = $this->db->where('YEAR(tgl_buat)', $tahun)->get('pengajuan_lomba');
                        if ($cek_ns->num_rows() == 0) {
                            $no_surat       = "001/UN7.5.13/KU/" . $tahun;
                        } /*else if ($cek_ns->row()->tahun == $tahun && $cek_ns->row()->no_surat == null) {
                    $no_surat       = "001/UN7.5.13/KU/" . $tahun;
                } */ else {
                            $noUrut = 1;
                            for ($i = 0; $i < $cek_ns->num_rows(); $i++) {

                                if ($cek_ns->row($i)->no_surat && $cek_ns->row($i)->id != $row->id) {
                                    $noUrut++;
                                }
                            }

                            /*$noUrut                  = substr($cek_ns->row()->no_surat, 0, 3);
                    $noUrut++;*/
                            $no_surat                =  sprintf("%03s", $noUrut) . "/UN7.5.13/KU/" . $tahun;
                        }


                    ?>

                        <div class="modal fade" id="no_surat<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <form id="myForm" action="<?php echo site_url('Tatausaha/no_surat/' . $row->id); ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="no_surat">Masukkan Nomor Surat(Keperluan Cetak Surat)*</label>

                                                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $no_surat; ?>" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="no_surat">Masukkan Tanggal(Keperluan Cetak Surat)*</label>

                                                <input type="text" class="form-control" id="tgl_surat" name="tgl_surat" value="<?php echo tanggal() ?>" required readonly>
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