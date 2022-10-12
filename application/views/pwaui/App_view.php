 <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

 <!DOCTYPE html>
 <html lang="fa" dir="rtl">

 <head>
 	<?php include "pwai.php" ?>
 	<meta charset="UTF-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>نرم افزار خیریه امام علی ابن ابیطالب (ع) گرگاب</title>

 	<link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
 	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous"> -->
 	<!-- MDB -->
 	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
 </head>

 <body class="scrollystyle">


 	<main class="font-sans">

 		<nav class="navbar ThemeStyle fixed-top pwa-nav">
 			<div class="container">
 				<a class="navbar-brand" href="<?= base_url('index.php/app') ?>">
 					<img src="<?= base_url('css/images/logo-blue.svg') ?>" alt="Bootstrap" width="60">
 				</a>
 				<div class="d-flex text-light">
 					<p id="application_title" class="navbar-text">خیریه امام علی(ع) گرگاب</p>
 				</div>
 			</div>
 		</nav>

 		<div id="loaderbg" class="fixed-bottom">
 			<div id="loader"></div>
 		</div>

 		<div class="d-none d-lg-block w-100" style="height: 40px;"></div>

 		<div id="pwacontect" class="container" style="margin-top: 90px;">
 			<!-- navication -->
 			<div class="row text-center p-3 text-light">
 				<a href="<?= base_url('index.php/App/sandoogh') ?>" class="col-4 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle w-100 p-2" style="height: 130px;"><img class="m-auto mt-3" src="<?= base_url('css/images/sadagheh.svg') ?>" alt="مدد جو" width="50px">
 							<p class="mt-2">صندوق</p>
 						</div>


 					</div>
 				</a>
 				<a href="<?= base_url() ?>index.php/App/openDonatePage" class="col-4 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle w-100 p-2" style="height: 130px;"><img class="m-auto mt-1" src="<?= base_url('css/images/مددجو.svg') ?>" alt="مدد جو" width="50px">
 							<p class="mt-2">نیکوکاری</p>
 						</div>
 					</div>
 				</a>
 				<a href="<?= base_url() ?>index.php/App/openprojects" class="col-4 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle  w-100 p-2" style="height: 130px;"><img class="m-auto mt-3" src="https://kheiriehemamali.ir/css/images/پروژه عمرانی.svg" alt="مدد جو" width="50px">
 							<p class="mt-2">پروژه ها</p>
 						</div>
 					</div>
 				</a>
 			</div>
 			<!-- end navication -->
 			<?php if (count($slideshows) > 0) : ?>
 				<div class="row mb-2 text-center align-items-center">
 					<div class="col-lg-6 d-none d-lg-block">
 						<h4 class="title-color"><?php echo $hadis_random_sadagheh['gala'] ?> :</h4>
 						<p><?php echo $hadis_random_sadagheh['arabi'] ?></p>
 						<p><?php echo $hadis_random_sadagheh['farsi'] ?></p>
 					</div>
 					<div class="col-lg-6">
 						<div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
 							<div class="carousel-inner card" style="display: block;">
 								<?php foreach ($slideshows as $slide) : ?>
 									<div class="carousel-item active">
 										<img src="<?= $slide['url'] ?>" class="d-block w-100" alt="...">
 									</div>
 								<?php endforeach; ?>
 							</div>
 							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
 								<svg xmlns="http://www.w3.org/2000/svg" width="40%" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
 									<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
 								</svg>
 								<span class="visually-hidden">Previous</span>
 							</button>
 							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
 								<svg xmlns="http://www.w3.org/2000/svg" width="40%" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
 									<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
 								</svg>
 								<span class="visually-hidden">Next</span>
 							</button>
 						</div>
 					</div>
 				</div>
 			<?php endif; ?>
 		</div>

 		<!-- wordpress posts  -->
 		<?php
			// Include Wordpress 
			define('WP_USE_THEMES', false);
			require('././blog/wp-blog-header.php');
			query_posts('showposts=4');
			?>
 		<div class="container px-4 py-1 " id="akhbar">
 			<h2 class="pb-2 border-bottom font-sans text-dark">آخرین مطالب و اخبار</h2>

 			<div class="row row-cols-1 row-cols-lg-4 align-items-center g-4 py-2 text-center text-light">
 				<?php
					while (have_posts()) : the_post();
					?>
 					<div class="col">
 						<a href="<?= base_url() ?>index.php/App/openpost?url=<?php the_permalink(); ?>">
 							<div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
 								<img src="<?= get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?= the_post_thumbnail_caption(); ?>">

 								<div class="card-body pb-5">
 									<section class="content">
 										<h6 class="card-title"><?php the_title(); ?></h6>
 										<p><?php the_excerpt(); ?></p>
 									</section>
 								</div>
 							</div>
 						</a>
 					</div>
 				<?php endwhile; ?>
 			</div>
 		</div>
 		<!-- end wordpress posts  -->

 		</div>


 		<!-- <div style="height: 100px;"></div>

       <div class="ThemeStyle fixed-bottom" style="border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;padding: 15px;">
          <ul class="nav justify-content-center">
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><img class="m-auto" src="https://kheiriehemamali.ir/css/images/خانواده.svg" alt="مدد جو" width="40px"></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="./index.html"><img class="m-auto" src="https://kheiriehemamali.ir/css/images/مددجو.svg" alt="مدد جو" width="40px"></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="#"><img class="m-auto" src="https://kheiriehemamali.ir/css/images/پروژه عمرانی.svg" alt="مدد جو" width="40px"></a>
             </li>
          </ul>
       </div> -->

 	</main>

 	<!-- Optional JavaScript; choose one of the two! -->

 	<!-- Option 1: Bootstrap Bundle with Popper -->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

 	<script src="<?= base_url('js/pwa.js'); ?>"></script>

 	<!-- Option 2: Separate Popper and Bootstrap JS -->

 	<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> -->
 	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script> -->


 </body>

 </html>
