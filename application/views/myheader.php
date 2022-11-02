<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="subject" content="خیریه" />
    <meta name="copyright" content="خیریه امام علی ابن ابیطالب علیه السلام شهر گرگاب" />
    <meta name="language" content="fa" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="revisit-after" content="10 days">

	<?php if(isset($tags)): ?>
		<meta name="keywords" content="<?= $tags ?>" />
	<?php endif; ?>
	<?php if(isset($description)): ?>
    	<meta name="description" content="<?= $description ?>" />
	<?php endif; ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('css/images/logo.svg'); ?>">
    <title><?= (isset($title)) ? $title : "" ?></title>
</head>

<body>

    <main class="font-sans">

        <nav id="navmyf" class="navbar navbar-expand-lg navbar-light text-center">
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
