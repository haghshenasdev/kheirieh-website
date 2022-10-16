 <?php //file_get_contents($url) 
	?>

 <?php

	define('WP_USE_THEMES', false);
	$postid = url_to_postid($url);
	if ($postid != 0) {
		$pot = get_post($postid);	
		$thum_url = get_the_post_thumbnail_url($pot->ID);
	?>
	<div class="row text-center mb-3" style="font-size: 15px;">
		<div class="col">تاریخ : <?= $pot->post_date ?></div>
		<div class="col">نویسنده : <?= get_user_by('id',$pot->post_author)->display_name  ?></div>
	</div>
	<?php if($thum_url != false): ?>
	<img class="image ThemeStyle-border my-4" src="<?= $thum_url ?>" alt="">
	<?php endif; ?>
	<div class="card p-3" style="border-radius: 40px !important;">
		<?= $pot->post_content; ?>
	</div>
 	<script>
 		document.getElementById('application_title').innerHTML = "<?= $pot->post_title ?>";
 	</script>
 <?php	
	} else {
		echo '404';
	}

	//var_dump($pots[0]);
	?>

 <!-- <script>
 	const title = document.getElementsByClassName("page-title");
 	document.getElementById('application_title').innerHTML = title[0].innerHTML;
 	title[0].remove();

 	document.getElementById('page-site-header').className += " ThemeStyle-border";
 	document.getElementById('masthead').remove();
 	document.getElementById('secondary').remove();
 	document.getElementById('colophon').remove();

 	const previous = document.getElementsByClassName("nav-previous")[0].getElementsByTagName('a')[0];
 	previous.setAttribute("href", "<?= base_url('index.php/App/openpost?url=') ?>" + previous.getAttribute("href"));
 	const next = document.getElementsByClassName("nav-next")[0].getElementsByTagName('a')[0];
 	next.setAttribute("href", "<?= base_url('index.php/App/openpost?url=') ?>" + next.getAttribute("href"));
 </script> -->
