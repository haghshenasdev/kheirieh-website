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

       <div class="ThemeStyle row align-items-center fixed-top" style="border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        padding: 15px;
        box-shadow: 0 2px 3px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);">
          <div class="col-sm-1 col-4 ">
             <a href="<?= base_url('index.php/app') ?>" class="navbar-brand">
                <img class="w-100 mx-3" src="<?= base_url('css/images/logo-blue.svg') ?>" aria-label="خیریه امام علی ابن ابیطالب گرگاب">
             </a>
          </div>
          <div id="application_title_div" class="col-sm-11 col-8 d-flex justify-content-end text-light">
             <p id="application_title">خیریه امام علی(ع) گرگاب</p>
          </div>
       </div>

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

          <div class="row mb-2">
             <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner card" style="display: block;">
                   <div class="carousel-item active">
                      <img src="<?= base_url() ?>/css/images/alamdar/%D8%A8%DB%8C%D8%AA%20%D8%A7%D9%84%D8%B9%D8%A8%D8%A7%D8%B3.jpg" class="d-block w-100" alt="...">
                   </div>
                   <div class="carousel-item">
                      <img src="<?= base_url() ?>/css/images/orzans-115/%D8%A7%D9%88%D8%B1%DA%98%D8%A7%D9%86%D8%B3.jpg" class="d-block w-100" alt="...">
                   </div>
                </div>
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Next</span>
                </button> -->
             </div>
          </div>

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
