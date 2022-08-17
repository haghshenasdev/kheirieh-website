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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">
 </head>

 <body class="scrollystyle">


    <main class="font-sans">

       <nav class="ThemeStyle navbar navbar-expand-lg navbar-light text-center" style="border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        padding: 15px;">
          <div class="container">

             <a href="<?= base_url('index.php/app') ?>" class="navbar-brand">
                <img src="<?= base_url('css/images/logo-blue.svg') ?>" class="" aria-label="خیریه امام علی ابن ابیطالب گرگاب" width="90px">
             </a>
             <div class="text-light">

                <p>خیریه امام علی ابن ابیطالب گرگاب</p>

             </div>
          </div>
       </nav>

       <div id="loaderbg">
          <div id="loader"></div>
       </div>


       <div id="pwacontect" class="container">
          <div class="row text-center p-3 text-light">
             <a href="./tajgool.html" class="col-4 nav-link">
                <div class="p-1">
                   <div class="ThemeStyle w-100 p-2"><img class="m-auto" src="https://kheiriehemamali.ir/css/images/پروژه عمرانی.svg" alt="مدد جو" width="50px">
                      <p class="mt-2">تاج گل</p>
                   </div>


                </div>
             </a>
             <a href="<?= base_url('index.php/form_controler/pay/komak') ?>" class="col-4 nav-link">
                <div class="p-1">
                   <div class="ThemeStyle w-100 p-2"><img class="m-auto" src="<?= base_url('css/images/مددجو.svg') ?>" alt="مدد جو" width="50px">
                      <p class="mt-2">نیکوکاری</p>
                   </div>
                </div>
             </a>
             <a href="<?= base_url('#Omrany') ?>" class="col-4 nav-link">
             <div class="p-1">
                <div class="ThemeStyle w-100 p-2"><img class="m-auto mt-3" src="https://kheiriehemamali.ir/css/images/پروژه عمرانی.svg" alt="مدد جو" width="50px">
                   <p class="mt-2">پروژه ها</p>
                </div>
             </div>
             </a>
          </div>

          <!-- <h2 class="pb-2 m-4 border-bottom font-sans text-dark">پویش ها</h2>
          <div class="sco scrollystyle text-center">

             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="ThemeStyle card h-100">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="card ThemeStyle h-100  ">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="card ThemeStyle h-100  ">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="card ThemeStyle h-100 ">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="card ThemeStyle h-100 ">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
             <div class="cw col-5 mx-3">
                <a href="https://kheiriehemamali.ir/blog/?p=274">
                   <div class="card ThemeStyle h-100  ">
                      <img src="https://kheiriehemamali.ir/blog/wp-content/uploads/2022/07/photo_2022-07-17_11-05-47.jpg" class="  " alt="توزیع سبد غذایی بین نیازمندان شهر گرگاب ">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title">توزیع سبد غذایی ویژه عید غدیر بین نیازمندان شهر گرگاب</h5>
                         </section>
                      </div>
                   </div>
                </a>
             </div>
          </div> -->

          <h2 class="pb-2 m-4 border-bottom font-sans text-dark">آخرین مطالب و اخبار</h2>
          <div class="sco scrollystyle text-center text-light">
             <?php
               // Include Wordpress 
               define('WP_USE_THEMES', false);
               require('./././blog/wp-blog-header.php');
               query_posts('showposts=4');
               while (have_posts()) : the_post();
               ?>
                <div class="cw col-sm-5 mx-3 mt-3">
                   <div onclick="openpost('<?= base_url() ?>','<?php the_permalink(); ?>')" class="card ThemeStyle h-100">
                      <img src="<?= get_the_post_thumbnail_url(); ?>" class="  " alt="<?= the_post_thumbnail_caption(); ?>">

                      <div class="card-body pb-5">
                         <section class="content">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                         </section>
                      </div>

                   </div>
                </div>

             <?php endwhile; ?>
          </div>

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
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    -->

 </body>

 </html>