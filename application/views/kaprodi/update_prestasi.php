<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        //date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}
?>
<?php error_reporting(0); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kaprodi') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('kaprodi/prestasi') ?>">Prestasi</a>
            </li>
            <li class="breadcrumb-item active">Edit Prestasi</li>
        </ol>
        <div>

            <form id="myForm" action="<?php echo site_url('Kaprodi/update_prestasi/' . $data->id); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input required type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $this->session->userdata('name') ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nim">NIM</label>
                        <input required type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= $this->session->userdata('nim') ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="departemen">Departemen</label>
                        <input required type="text" class="form-control" id="departemen" name="departemen" value="<?= $row->departemen ?>" placeholder="Masukkan Departemen">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="program_studi">Program Studi</label>
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
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="semester">Semester</label>
                        <input required type="text" class="form-control" id="semester" name="semester" value="<?= $row->semester ?>" placeholder="Masukkan Semester">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat">Alamat</label>
                        <input required type="text" class="form-control" id="alamat" name="alamat" value="<?= $row->alamat ?>" placeholder="Masukkan Alamat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_hp">Nomor HP</label>
                        <input required type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row->no_hp ?>" placeholder="Masukkan No HP">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input required type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="<?= $row->nama_lomba ?>" placeholder="Masukkan Nama Lomba">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="penyelenggara">Penyelenggara</label>
                        <input required type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="<?= $row->penyelenggara ?>" placeholder="Masukkan Penyelenggara">
                    </div>
                    <div class="form-group col-md-6">
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
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tgl_mulai_lomba">Tanggal Mulai Lomba</label>
                        <input required type="date" class="form-control" id="tgl_mulai_lomba" name="tgl_mulai_lomba" value="<?= $row->tgl_mulai_lomba ?>" placeholder="Masukkan Tanggal Mulai Lomba">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tgl_selesai_lomba">Tanggal Selesai Lomba</label>
                        <input required type="date" class="form-control" id="tgl_selesai_lomba" name="tgl_selesai_lomba" value="<?= $row->tgl_selesai_lomba ?>" placeholder="Masukkan Tanggal Selesai Lomba">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tahun">Tahun</label>
                        <input required type="text" class="form-control" id="tahun" name="tahun" value="<?= $row->tahun ?>" placeholder="Masukkan Tahun">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
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