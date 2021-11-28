<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('user') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pengajuan Lomba</li>
    </ol>

    <!-- Page Heading -->
    <div class="text-center">
        <h1 class="h3 mb-2 text-gray-800"><strong> FORM PERMOHONAN PENGAJUAN LOMBA SEKOLAH VOKASI </strong></h1>
        <h2 class="h3 mb-4 mt-2 text-gray-800"><strong> (Isi data dengan benar)</strong> </h2>
    </div>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

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


                            <form id="myForm" action="<?php echo site_url('User/save_pengajuanlomba') ?>" method="post" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label for="nama">Nama*</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $this->session->userdata('name') ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nim">NIM*</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $this->session->userdata('nim') ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="departemen">Departemen*</label>
                                    <input type="text" class="form-control" id="departemen" name="departemen" placeholder="Masukkan Departemen">
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
                                    <label for="semester">Semester*</label>
                                    <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                                </div>



                                <div class="form-group">
                                    <label for="alamat">Alamat di Semarang*</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">No.HP*</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                                </div>

                                <div class="form-group">
                                    <label for="nama_lomba">Nama Lomba/Kegiatan*</label>
                                    <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" placeholder="Nama Lomba/Kegiatan">
                                </div>


                                <div class="form-group">
                                    <label for="penyelenggara">Penyelenggara*</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                                </div>

                                <div class="form-group">
                                    <label for="tingkat">Tingkat*</label>
                                    <select required name="tingkat" id="tingkat" class=" selectpicker form-control" data-live-search="true">
                                        <option value="">Pilih Tingkat</option>
                                        <option value="Kabupaten">Kabupaten</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_mulai_lomba">Tgl Mulai Lomba*</label>
                                    <input type="date" class="form-control" id="tgl_mulai_lomba" name="tgl_mulai_lomba" placeholder="Tanggal Mulai Lomba">
                                </div>

                                <div class="form-group">
                                    <label for="tgl_selesai_lomba">Tgl Selesai Lomba*</label>
                                    <input type="date" class="form-control" id="tgl_selesai_lomba" name="tgl_selesai_lomba" placeholder="Tanggal Selesai Lomba">
                                </div>

                                <div class="form-group">
                                    <label for="file">Upload Proposal (pdf)*</label>

                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>