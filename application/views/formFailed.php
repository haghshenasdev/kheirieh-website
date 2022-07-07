<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (isset($_GET["page"]) && array_key_exists($_GET["page"], $page_data)) { ?>
        <meta name="keywords" content="<?php $worlds = explode(" ", $page_data[$_GET["page"]]["title"]);
                                        foreach ($worlds as $key => $tag) {
                                            echo $tag;
                                            if ($key + 1 != count($worlds)) {
                                                echo ",";
                                            }
                                        } ?>" />
        <meta name="description" content="<?php echo $page_data[$_GET["page"]]["description"]; ?>" />
    <?php } else { ?>
        <meta name="keywords" content="خیریه , امام علی ابن ابیطالب علیه السلام , شهر گرگاب , کمک به نیازمندان , پروژه خیر, بیت العباس , مسکن جوانان , دانلود نرم افزار , مددجو , مددکار, مرکز جامع سلامت , اورژانس 115 , مدرسه امام علی ابن ابیطالب , امور خیر , وقف , صدقه آنلاین" />
        <meta name="description" content="وب سایت خیریه امام علی ابن ابیطالب شهر گرگاب ، دانلود نرم افزار های خیریه ، کمک کردن ، درباره خیریه و.." />
    <?php } ?>
    <meta name="subject" content="خیریه" />
    <meta name="copyright" content="خیریه امام علی ابن ابیطالب علیه السلام شهر گرگاب" />
    <meta name="language" content="fa" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="revisit-after" content="10 days">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('css/images/logo.svg'); ?>">
    <title>خطا در پرداخت</title>
</head>

<body>

    <main class="font-sans">

        <nav class="navbar navbar-expand-lg navbar-light text-center">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="<?php echo base_url(); ?>" class="navbar-brand">
                    <img src="<?php echo base_url('css/images/logo.svg'); ?>" class="bi me-2" aria-label="خیریه امام علی ابن ابیطالب گرگاب" width="90px" />
                </a>
                <div class="collapse navbar-collapse text-light" id="navbarTogglerDemo01">

                    <ul class="navbar-nav My-nav me-auto mb-2 mb-lg-0 justify-content-center">
                        <?php foreach ($menus as $row) : ?>
                            <li class="nav-item"><a href="<?php echo $this->show_menu->is_inerlink_show_menus($row->url); ?>" class="nav-link"><?php echo $row->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </nav>
        <section class="py-2 container">
            <div class="row align-items-center text-center mt-5 mb-5">
                <h1 style="color: red;">پرداخت با شکست مواجه شد!</h1>
                <p class="mt-5" style="color: #9b120b;">با عرض پوزش پرداخت انجام نشد . <br> کمک خود را نیز می توانید از طریق شماره کارت های خیریه واریز نمایید ، این شماره کارت ها در صفحه اصلی قابل روئیت است. </p>
                <!-- <div class="col-lg-6 col-md-8 lg-start d-block d-lg-none mx-auto text-center p-4">
                
                
            </div> -->
            </div>
        </section>
    </main>

    <?php include("page-footer.php"); ?>