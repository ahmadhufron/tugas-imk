<!-- section -->
<section id="lomba" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_left">
                        <h2>Info Lomba</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="full blog_colum">
                    <h3 class="text-center mb-5" style="font-size: 40px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"><?php echo $detail->judul ?></h3>
                    <center>
                        <p><img src="<?php echo base_url('upload/info_lomba/' . $detail->foto); ?>" class="img img-responsive float-center"></p>
                        <p class="text-dark"><?php echo $detail->isi ?></p>
                    </center>
                </div>
            </div>
        </div>
        <div>
            <div class="col-lg text-center">

                <?php echo anchor('home/list_infolomba/' . $detail->id, '<div class="btn btn-lg btn-info mt-4 mb-5">Daftar Info Lomba</div>') ?>
            </div>
        </div>
    </div>
</section>
<!-- end section -->