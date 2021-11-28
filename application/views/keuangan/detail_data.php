<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>


</div>


<!-- Basic Card Example -->

<div class="card-body">

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-info-circle"></i> Detail Data Pengajuan Lomba</h6>
            </div>

            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detail->nama ?></td>
                    </tr>

                    <tr>
                        <th>NIM</th>
                        <td><?php echo $detail->nim ?></td>
                    </tr>

                    <tr>
                        <th>Departemen</th>
                        <td><?php echo $detail->departemen ?></td>
                    </tr>

                    <tr>
                        <th>Program Studi</th>
                        <td><?php echo $detail->program_studi ?></td>
                    </tr>

                    <tr>
                        <th>Semester</th>
                        <td><?php echo $detail->semester ?></td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $detail->alamat ?></td>
                    </tr>

                    <tr>
                        <th>Nomor HP</th>
                        <td><?php echo $detail->no_hp ?></td>
                    </tr>

                    <tr>
                        <th>Nama Lomba</th>
                        <td><?php echo $detail->nama_lomba ?></td>
                    </tr>

                    <tr>
                        <th>Penyelenggara</th>
                        <td><?php echo $detail->penyelenggara ?></td>
                    </tr>

                    <tr>
                        <th>Tanggal Mulai Lomba</th>
                        <td><?php echo $detail->tgl_mulai_lomba ?></td>
                    </tr>

                    <tr>
                        <th>Tanggal Selesai Lomba</th>
                        <td><?php echo $detail->tgl_selesai_lomba ?></td>
                    </tr>

                    <tr>
                        <th>Proposal</th>

                        <td align=left>
                            <a href="<?= base_url() . 'upload/proposal/' . $detail->upload; ?>" target="_blank">
                                -Download File-
                            </a>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
</div>


</div>
</section>