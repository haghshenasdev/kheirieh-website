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

      <div class="ThemeStyle row align-items-center fixed-top" style="border-top-left-radius: 0px;
       border-top-right-radius: 0px;
       padding: 15px;
       box-shadow: 0 2px 3px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);">
         <div class="col-sm-1 col-3 btn-back">
            <button class="btn navbar-brand" onclick="history.back()">
               <svg xmlns="http://www.w3.org/2000/svg" width="30px" fill="currentColor" class="bi bi-forward-fill text-light" viewBox="0 0 16 16">
                  <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z" />
               </svg>
            </button>
            <!-- <a href="<?php //base_url('index.php/app') 
                           ?>" class="navbar-brand">
               <svg xmlns="http://www.w3.org/2000/svg" width="30px" fill="currentColor" class="bi bi-forward-fill text-light" viewBox="0 0 16 16">
                  <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z" />
               </svg>
            </a> -->
         </div>
         <div class="col-sm-11 col-9 d-flex justify-content-end text-light">

            <p id="application_title">خیریه امام علی ابن ابیطالب گرگاب</p>

         </div>

      </div>

      <div id="loaderbg">
         <div id="loader"></div>
      </div>


      <div id="pwacontect" class="container" style="margin-top: 90px;">