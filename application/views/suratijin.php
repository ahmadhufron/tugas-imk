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

<!DOCTYPE html>
<html>

<head>
    <title>Surat Delegasi</title>
    <style type="text/css">
        .upper {
            text-transform: uppercase;
        }

        .lower {
            text-transform: lowercase;
        }

        .cap {
            text-transform: capitalize;
        }

        .small {
            font-variant: small-caps;
        }

        .contoh1 {
            font-size: 8px;
            line-height: 14px;
        }

        p.indent {
            padding-left: 1.8em
        }
    </style>
</head>

<body bgcolor="white">


    <form>
        <table align="left" border="0">
            <tr>
                <td rowspan="5"><img src="<?php echo base_url(); ?>assets/img/undip.jpg" alt="Logo Surat" width="110" height="130"></td>
            </tr>
        </table>
    </form>

    <form>
        <table style="padding-top: 30px" align="right" border="0">
            <tr>
                <td align="right" class="contoh1">
                    <font color="#000139" face="Arial">
                        Jalan Prof H. Soedarto, S.H.</br>
                        Tembalang, Semarang Kode Pos 50275</br>
                        Tel./Faks.(024)7471379</br>
                        www.vokasi.undip.ac.id</br>
                        email: vokasi@live.undip.ac.id</br>
                    </font>
                </td>
            </tr>
        </table>
    </form>

    <form>
        <table style="padding-top: 30px">
            <tr>
                <td>
                    <font color="#000139" face="Times New Roman" size="3">
                        <left><b>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</b></left>
                    </font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="#000139" face="Times New Roman" size="5">
                        <left><b>UNIVERSITAS DIPONEGORO</b></left>
                    </font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color=" #000139" face="Times New Roman" size="4">
                        <left><b>SEKOLAH VOKASI</b></left>
                    </font>
                </td>
            </tr>
        </table>
    </form>



    <font face=" Arial" size="5">
        <p align="center">
    </font><br>
    <font face="Arial" size="4"> <u> <b>SURAT TUGAS</b></u></br>Nomor: <?php echo $detail->no_surat; ?> </p>
    </font>
    <form>
        <table align="center" border="0">
            <tr>
                <td align="left" colspan="3">Dekan Sekolah Vokasi Universitas Diponegoro dengan ini menugaskan mahassiswa tersebut dibawah ini, sebagai Delegasi Lomba <?php echo $detail->nama_lomba; ?>:</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <table border="1" width="700px" cellpadding="10">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    <tr>
                        <td align="center"><?= $id++; ?></td>
                        <td align="center"><?php echo $detail->nama; ?></br><?php echo $detail->nim; ?></td>
                        <td align="center"><?php echo $detail->program_studi; ?></td>

                    </tr>
                </tbody>
            </table>
            </br>


            <tr>
                <td align="left" colspan="3">Untuk mengikuti Lomba <b><?php echo $detail->nama_lomba; ?></b>, yang akan diselenggarakan pada:</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr></br>
            </br>
            <tr>
                <td align="left" width="250" class="indent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Mulai</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td align="left"><?php echo format_indo($detail->tgl_mulai_lomba) ?></td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Selesai</td>
                <td>&nbsp;&nbsp;:</td>
                <td align="left"><?php echo format_indo($detail->tgl_selesai_lomba) ?></td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td align="left"><?php echo $detail->penyelenggara; ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr></br>
            </br>

            <tr>
                <td align="left" colspan="3">Demikian agar dapat dilaksanakan dengan sebaik-baiknya dan penuh tanggungjawab.</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
        </table>
    </form>
    </br>

    <form>
        <table align="right" border="0">
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semarang, <?php echo $detail->tgl_surat; ?></br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dekan
                </td>
            </tr>
            <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">
                    Prof. Dr. Ir. Budiyono, M.Si</br>
                    NIP. 196602201991021001
                </td>
            </tr>
        </table>
    </form>

    </br>
    </br>
    </br>

    <form>
        <table>
            <tr>
                <td align="left" colspan="3">Tembusan :
                </td>
            </tr>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;1. Wakil Dekan I Sekolah Vokasi</td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;2. Wakil Dekan II Sekolah Vokasi</td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;3. Kaprodi <?php echo $detail->program_studi; ?></td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;4. Yang Bersangkutan</td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;5. Arsip.</td>
            </tr></br>
        </table>
    </form>

    <font face="Times New Roman" size="3">
        <div align="center"> <u> <b>Mengetahui,</b></u></div>
    </font></br>
    <font face="Times New Roman" size="3">
        <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instansi/Perusahaan tempat tujuan</td></br>
        <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala</td>

    </font>
    </br>
    </br>
    </br>
    <form>
        <table>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;:</td>
            </tr></br>
            <tr>
                <td align="left" width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP&nbsp;&nbsp;&nbsp;&nbsp;:</td>
            </tr></br>
            </tr>
        </table>

    </form>

    <script>
        window.print();
    </script>

</body>

</html>