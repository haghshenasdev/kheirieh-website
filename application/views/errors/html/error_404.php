<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fa">

<head>
	<meta charset="utf-8">
	<title>404 صفحه یافت نشد !</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

	<link rel="stylesheet" href="https://kheiriehemamali.ir/css/style.css">

</head>

<body>
	<main class="font-sans">
		<div id="container">
			<div class="row mt-5 p-5">
				<div class="col-lg-5 g-4 p-5 ThemeStyle text-center text-light m-auto">
					<a href="./" class="navbar-brand">
						<img src="https://kheiriehemamali.ir/css/images/logo-blue.svg" alt="لوگو خیریه" class="w-50 mb-5" aria-label="خیریه امام علی ابن ابیطالب گرگاب" width="90px">
					</a>
					<h1>خطای 404</h1>
					<p>صفحه مورد نظر یافت نشد !</p>
					<?php if (array_key_exists('HTTP_REFERER',$_SERVER)) : ?>
						<a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="btn btn-outline-light">بازگشت به صفحه قبل</a>
					<?php endif; ?>
					<a href="./" class="btn btn-outline-light">بازگشت به صفحه اصلی</a>
				</div>
			</div>
		</div>
	</main>
</body>

</html>