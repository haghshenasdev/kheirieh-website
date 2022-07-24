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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('css/images/logo.svg'); ?>">
    <title><?php echo $type_data[0]->title ?></title>
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
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 lg-start d-block d-lg-none mx-auto text-center p-4 animated zoomIn">
                    <h4 class="title-color"><?php echo $hadis_random_sadagheh['gala'] ?> :</h4>
                    <p><?php echo $hadis_random_sadagheh['arabi'] ?></p>
                    <p><?php echo $hadis_random_sadagheh['farsi'] ?></p>
                </div>

                <div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-5 text-light animated bounceInUp">
                    <h4 class="text-center">پرداخت جهت <?php echo $type_data[0]->title ?></h4>
                    <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    echo form_open("form_controler/pay/" . $type_data[0]->type_name, array('id' => 'my-form'));
                    if (is_array($all_type) || $type_data[0]->type_name == 'komak') :
                    ?>
                        <div class="mb-3">
                            <label for="type" class="col-form-label">نوع و مواد مصرف :</label>
                            <select onchange="ShowInfos()" class="form-select" id="type" name="type" aria-label="Default select example">
                                <?php foreach ($all_type as $row) : ?>
                                    <option selected value="<?php echo $row->id ?>"><?php echo $row->title ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 px-2"><label id="tozih"></label></div>
                        <script>
                            function ShowInfos() {
                                const el = document.getElementById("type");
                                var i = el.selectedIndex;
                                var op = el.options;
                                const http = new XMLHttpRequest();
                                http.onload = function() {
                                    document.getElementById("tozih").innerHTML = this.responseText;
                                }
                                http.open("GET", "<?= base_url('index.php/typedescription/getdescriptionty/') ?>"+ op[i].value, true);
                                http.send();
                            }
                            Window.onload = ShowInfos();
                        </script>
                    <?php endif; ?>


                    <label for="message-text" class="col-form-label px-3"> مبلغ: </label>
                    <div class="input-group mb-3">

                        <input id="amount" name="amount" class="form-control" type="number" value="<?= set_value('amount') ?>" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">تومان</span>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="col-form-label">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= (set_value('name') == '') ? get_cookie('name') : set_value('name') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">شماره تماس :</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= (set_value('phone') == '') ? get_cookie('phone') : set_value('phone') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">ایمیل (اختیاری):</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= (set_value('email') == '') ? get_cookie('email') : set_value('email') ?>">
                    </div>
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <script>
                        function onSubmit(token) {
                            document.getElementById("my-form").submit();
                        }
                    </script>


                    <div class="text-center">
                        <button class="btn btn-light mt-4 ThemeStyle-border px-5 g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" data-callback='onSubmit' data-action='submit' type="submit">پرداخت</button>
                        <a class="btn btn-outline-light mt-4 ThemeStyle-border" href="<?php echo base_url(); ?>">بازگشت به صفحه اصلی</a>
                    </div>

                    <?php echo form_close(); ?>

                </div>

                <div class="col-lg-6 col-md-8 lg-start d-none d-lg-block mx-auto text-center p-4">
                    <h4 class="title-color"><?php echo $hadis_random_sadagheh['gala'] ?> :</h4>
                    <p><?php echo $hadis_random_sadagheh['arabi'] ?></p>
                    <p><?php echo $hadis_random_sadagheh['farsi'] ?></p>
                </div>
            </div>
        </section>
    </main>
    <?php include_once('page-footer.php') ?>
</body>