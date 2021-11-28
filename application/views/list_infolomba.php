<!-- section -->
<style>
    .geeks {
        width: 300px;
        height: 300px;
        overflow: hidden;
        margin: 0 auto;
    }

    .geeks img {
        width: 100%;
        transition: 0.5s all ease-in-out;
    }

    .geeks:hover img {
        transform: scale(1.5);
    }
</style>
<section id="lomba" class="section padding_layout_1 kotak-atas">
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
            <?php $id = 1;

            foreach ($info_lomba as $s) {

            ?>
                <div class="col-sm-4" overflow="hidden" padding="0" max-width="350px">
                    <div class="full blog_colum">
                        <h3><?php echo $s->judul ?></h3>
                        <div class="geeks">
                            <p><img src="<?php echo base_url('upload/info_lomba/' . $s->foto); ?>" class="img img-responsive inline" width=" 300px" height=" 200px" border=" 4px" solid=" #575D63" alt="Geeks Image"></p>
                        </div>
                        <?php $string = $s->isi;
                        $string1 = character_limiter($string, 6);
                        ?>
                        <p><?php echo $string1 ?></p>
                        <?php echo anchor('home/detail_info/' . $s->id, '<div class="btn btn-sm btn-dark ">Selengkapnya</div>') ?>
                    </div>
                </div>

            <?php $id++;
            } ?>
        </div>
        <div class=" col-lg text-center">

            <?php echo anchor('home/list_infolomba/' . $s->id, '<div class="btn btn-lg btn-info mt-4 mb-5">Info lengkap</div>') ?>
        </div>
    </div>
</section>
<!-- end section -->