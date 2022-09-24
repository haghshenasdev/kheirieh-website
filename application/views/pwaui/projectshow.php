<main>
    <script>
        document.getElementById('application_title').innerHTML = "<?= $project_data[0]['title']; ?>";
    </script>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <p class="lead text-muted"><?php echo $project_data[0]['description']; ?></p>
            </div>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php

                $images = $this->read_image_folder->get_images($project_data[0]['page_name']);

                foreach ($images as $image) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="<?php echo base_url($image); ?>" data-fancybox-group="post_image_0" class="ari-fancybox" data-fancybox="post_image_0" dideo-checked="true">
                                <img src="<?php echo base_url($image); ?>" class="bd-placeholder-img card-img-top" alt="<?php echo $project_data[0]['title']; ?>" width="100%" height="225">
                            </a>
                        </div>

                    </div>

                <?php endforeach; ?>


            </div>
        </div>
    </div>

</main>

<script type="text/javascript" src="https://kheiriehemamali.ir/blog/wp-content/themes/soft-blog/assets/js/skip-link-focus-fix.min.js?ver=20151215" id="soft-blog-skip-link-focus-fix-js"></script>