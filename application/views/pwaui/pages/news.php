<?php
require('./././blog/wp-blog-header.php');
define('WP_USE_THEMES', false);
query_posts('');
?>

<div class="container px-4" id="Omrany">
	<script>document.getElementById('application_title').innerHTML = "اخبار";</script>

	<div class="row row-cols-1 row-cols-lg-3 align-items-center g-4 py-2 text-center text-light">

		<?php while (have_posts()) : the_post(); ?>
			<div class="col">
				<div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
					<img src="<?= get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
					<div class="card-body">
						<h5 class="card-title"><?php the_title(); ?></h5>
						<a href="<?= base_url() ?>index.php/App/openpost?url=<?php the_permalink(); ?>" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">اطلاعات بیشتر</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>


	</div>
</div>
