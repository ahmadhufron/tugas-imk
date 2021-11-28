<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('user') ?>">Dashboard</a>
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
                                                <th>Action</t>
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
                                                        <a href="<?= base_url('user/detail_prestasi') . '/' . $row->id; ?>" class="btn btn-success btn-sm">Detail</a>
                                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update<?= $row->id ?>"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i></button>
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
                                                <th>Action</t>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete Prestasi -->

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
                                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('User/delete/' . $row->id) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Edit Prestasi -->

                    <?php foreach ($prestasi as $row) { ?>

                        <div class="modal fade" id="update<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myForm" action="<?php echo site_url('User/update_prestasi/' . $row->id); ?>" method="post" enctype="multipart/form-data">


                                            <div class="form-group">
                                                <label for="nama">Nama*</label>
                                                <input required type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $this->session->userdata('name') ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="nim">NIM*</label>
                                                <input required type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $this->session->userdata('nim') ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="departemen">Departemen*</label>
                                                <input required type="text" class="form-control" id="departemen" name="departemen" value="<?= $row->departemen ?>" placeholder="Masukkan Departemen">
                                            </div>

                                            <div class="form-group">
                                                <label for="program_studi">Program Studi*</label>

                                                <select name="program_studi" id="inputState" class="form-control" required>
                                                    <?php if ($row->program_studi == '') { ?>
                                                        <option selected>Pilih...</option>
                                                    <?php } else { ?>
                                                        <option selected><?php echo $row->program_studi; ?></option>
                                                    <?php } ?>
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
                                                <label for="semester">Semester</label>
                                                <input required type="text" class="form-control" id="semester" name="semester" value="<?= $row->semester ?>" placeholder="Masukkan Semester">
                                            </div>

                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input required type="text" class="form-control" id="alamat" name="alamat" value="<?= $row->alamat ?>" placeholder="Masukkan Alamat">
                                            </div>

                                            <div class="form-group">
                                                <label for="no_hp">Nomor HP</label>
                                                <input required type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row->no_hp ?>" placeholder="Masukkan No HP">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_lomba">Nama Lomba</label>
                                                <input required type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="<?= $row->nama_lomba ?>" placeholder="Masukkan Nama Lomba">
                                            </div>

                                            <div class="form-group">
                                                <label for="penyelenggara">Penyelenggara</label>
                                                <input required type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="<?= $row->penyelenggara ?>" placeholder="Masukkan Penyelenggara">
                                            </div>

                                            <div class="form-group">
                                                <label for="tingkat">Tingkat</label>
                                                <select name="tingkat" id="inputState" class="form-control" required>
                                                    <?php if ($row->tingkat == '') { ?>
                                                        <option selected>Pilih...</option>
                                                    <?php } else { ?>
                                                        <option selected><?php echo $row->tingkat; ?></option>
                                                    <?php } ?>
                                                    <option value="Kabupaten">Kabupaten</option>
                                                    <option value="Provinsi">Provinsi</option>
                                                    <option value="Nasional">Nasional</option>
                                                    <option value="Internasional">Internasional</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_mulai_lomba">Tanggal Mulai Lomba</label>
                                                <input required type="date" class="form-control" id="tgl_mulai_lomba" name="tgl_mulai_lomba" value="<?= $row->tgl_mulai_lomba ?>" placeholder="Masukkan Tanggal Mulai Lomba">
                                            </div>

                                            <div class="form-group">
                                                <label for="tgl_selesai_lomba">Tanggal Selesai Lomba</label>
                                                <input required type="date" class="form-control" id="tgl_selesai_lomba" name="tgl_selesai_lomba" value="<?= $row->tgl_selesai_lomba ?>" placeholder="Masukkan Tanggal Selesai Lomba">
                                            </div>

                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input required type="text" class="form-control" id="tahun" name="tahun" value="<?= $row->tahun ?>" placeholder="Masukkan Tahun">
                                            </div>

                                            <div class="form-group">
                                                <label for="juara">Juara</label>
                                                <select name="juara" id="inputState" class="form-control" required>
                                                    <?php if ($row->juara == '') { ?>
                                                        <option selected>Pilih...</option>
                                                    <?php } else { ?>
                                                        <option selected><?php echo $row->juara; ?></option>
                                                    <?php } ?>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="Harapan 1">Harapan 1</option>
                                                    <option value="Harapan 2">Harapan 2</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="file">Upload Bukti (png/jpg)*</label>
                                                <input type="file" class="form-control" id="file" name="file">
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