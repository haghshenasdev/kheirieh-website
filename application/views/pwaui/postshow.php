 <div style="height: 50px;"></div>
 <?php //file_get_contents($url) 
	?>

 <?php
	// Include Wordpress 

	
	define('WP_USE_THEMES', false);
	$postid = url_to_postid($url);
	if ($postid != 0) {
		$pot = get_post($postid);	
	?>
 	<script>
 		document.getElementById('application_title').innerHTML = "<?= $pot->post_title ?>";
 	</script>
 <?php
		echo $pot->post_content;
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
