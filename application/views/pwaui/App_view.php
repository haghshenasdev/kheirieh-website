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
 					<p id="application_title" class="navbar-text"></p>
 					<a class="text-light m-2" href="<?= base_url('index.php/app') ?>">
 						<svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
 							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
 							<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
 						</svg>
 					</a>
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

 			<!-- navication -->
 			<div class="row text-center p-3 text-light">
 				<a href="<?= base_url('index.php/App/about') ?>" class="col-3 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle w-100 p-2" style="height: 110px;">
 							<svg class="m-auto mt-3" xmlns="http://www.w3.org/2000/svg" width="40px" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
 								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
 							</svg>
 							<p class="mt-2">درباره</p>
 						</div>


 					</div>
 				</a>
 				<a href="<?= base_url() ?>index.php/App/news" class="col-3 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle w-100 p-2" style="height: 110px;">
 							<svg class="m-auto mt-3" xmlns="http://www.w3.org/2000/svg" width="40px" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
 								<path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
 								<path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
 							</svg>
 							<p class="mt-2">اخبار</p>
 						</div>
 					</div>
 				</a>
 				<a href="<?= base_url() ?>index.php/App/shop" class="col-3 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle  w-100 p-2" style="height: 110px;">
 							<svg class="m-auto mt-3" xmlns="http://www.w3.org/2000/svg" width="40px" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
 								<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
 							</svg>
 							<p class="mt-2">خرید</p>
 						</div>
 					</div>
 				</a>

 				<a href="<?= base_url() ?>index.php/App/message" class="col-3 text-light p-0">
 					<div class="p-1">
 						<div class="ThemeStyle  w-100 p-2" style="height: 110px;">
 							<svg class="m-auto mt-3" xmlns="http://www.w3.org/2000/svg" width="40px" fill="currentColor" class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16">
 								<path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
 							</svg>
 							<p class="mt-2">ارتباط</p>
 						</div>
 					</div>
 				</a>
 			</div>
 			<!-- end navication -->
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
