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
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('wadek') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('wadek/kewirausahaan') ?>">Kewirausahaan</a>
            </li>
            <li class="breadcrumb-item active">Detail Kewirausahaan</li>
        </ol>
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
                    <label>Nama Usaha</label>
                    <input name="nama_usaha" type="text" class="form-control" placeholder="Nama Usaha" value="<?php echo $detail->nama_usaha; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label>Jenis Usaha</label>
                    <input name="jenis_usaha" type="text" class="form-control" placeholder="Jenis Usaha" value="<?php echo $detail->jenis_usaha; ?>" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">

                    <label>Bukti (png/jpg)</label><br />
                    <align=left><img style="width:500px;" src="<?php echo base_url('upload/kewirausahaan/' . $detail->bukti); ?>" alt="" disabled>

                </div>
            </div>


        </div>
    </div>
</div>