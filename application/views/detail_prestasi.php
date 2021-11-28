<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat">
                            </div>
                        </div>
                    </div>

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Prestasi Mahasiswa</h6>
                        </div>
                        <div class="card-body">

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

                            <div class="content-wrapper">
                                <div class="container-fluid">

                                    <div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nama</label>
                                                <input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $detail->nama ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>NIM</label>
                                                <input name="nim" type="text" class="form-control" placeholder="NIM" value="<?php echo $detail->nim; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Departemen</label>
                                                <input name="departemen" type="text" class="form-control" placeholder="Departemen" value="<?php echo $detail->departemen; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Program Studi</label>
                                                <input name="program_studi" type="text" class="form-control" placeholder="Program Studi" value="<?php echo $detail->program_studi; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Semester</label>
                                                <input name="semester" type="text" class="form-control" placeholder="Semester" value="<?php echo $detail->semester; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="<?php echo $detail->alamat; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nomor HP</label>
                                                <input name="no_hp" type="text" class="form-control" placeholder="Nomor HP" value="<?php echo $detail->no_hp; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Lomba</label>
                                                <input name="nama_lomba" type="text" class="form-control" placeholder="Nama Lomba" value="<?php echo $detail->nama_lomba; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Penyelenggara</label>
                                                <input name="penyelenggara" type="text" class="form-control" placeholder="Penyelenggara" value="<?php echo $detail->penyelenggara; ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tingkat</label>
                                                <input name="tingkat" type="text" class="form-control" placeholder="Tingkat" value="<?php echo $detail->tingkat; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tanggal Mulai Lomba</label>
                                                <input name="tgl_mulai_lomba" type="text" class="form-control" placeholder="Tanggal Mulai Lomba" value="<?php echo format_indo($detail->tgl_mulai_lomba) ?>" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tanggal Selesai Lomba</label>
                                                <input name="tgl_selesai_lomba" type="text" class="form-control" placeholder="Tanggal Selesai Lomba" value="<?php echo format_indo($detail->tgl_selesai_lomba) ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tahun</label>
                                                <input name="tahun" type="text" class="form-control" placeholder="Tahun" value="<?php echo $detail->tahun; ?>" disabled>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Juara</label>
                                                <input name="juara" type="text" class="form-control" placeholder="Juara" value="<?php echo $detail->juara; ?>" disabled>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">

                                                <label>Bukti (png/jpg)</label><br />
                                                <td align=left><img style="width:500px;" src="<?php echo base_url('upload/data/' . $detail->bukti); ?>" alt=""></td>
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