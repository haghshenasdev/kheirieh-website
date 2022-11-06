<?php if ($success) : ?>
	<section class="py-2 container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-8 lg-start d-block d-lg-none mx-auto text-center p-4">
				<h1>پرداخت با موفقیت انجام شد </h1>
				<p>با تشکر از کمک شما ، رسید کمک را می توانید با کلیک بروی دانلود و ذخیره فاکتور دریافت نمایید.</p>
			</div>

			<div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-5 text-light text-center animated bounceInUp">
				<img src="<?= base_url("css/images/logo-blue.svg") ?>" alt="" class="text-center m-auto mb-3" width="30%">
				<h4 class="text-center">رسید پرداخت جهت <?= $faktoorData['typeTitle'] ?></h4>
				<?php //$link = $this->faktoor_image->show_factoor_img_tag($faktoor); 
				?>

				<p class="text-center mt-3">مبلغ : <?= $faktoorData['amount'] ?></p>
				<p class="text-center mt-3">شماره ثبت : <?= $faktoorData['payId'] ?></p>
				<p class="text-center mt-3">زمان پرداخت : <?= $faktoorData['date'] ?></p>
				<p class="text-center mt-3"> نام پرداخت کننده : <?= $faktoorData['name'] ?></p>

				<div class="d-grid gap-2 mt-3">
					<button class="btn btn-light mt-3 ThemeStyle-border px-5 g-recaptcha" onclick="this.innerHTML = '<span class=\'spinner-border spinner-border-sm text-dark\' role=\'status\'></span> درحال ارسال...'" data-callback='onSubmit' data-action='submit' type="submit"> دانلود و ذخیره فاکتور</button>
					<a class="btn btn-outline-light ThemeStyle-border" type="button" onclick="history.go(-3)">بازگشت به صفحه اصلی</a>
				</div>
			</div>

			<div class="col-lg-6 col-md-8 lg-start d-none d-lg-block mx-auto text-center p-4">
				<h1>پرداخت با موفقیت انجام شد </h1>
				<p>با تشکر از کمک شما ، رسید کمک را می توانید از <a href="#">این جا</a> دریافت نمایید</p>
			</div>
		</div>
	</section>
<?php else : ?>
	<section class="py-2 container">
		<div class="row align-items-center text-center mt-5 mb-5">
			<h1 style="color: red;">پرداخت با شکست مواجه شد!</h1>
			<p class="mt-5" style="color: #9b120b;"> پرداخت انجام نشد . <br> کمک خود را نیز می توانید از طریق شماره کارت های خیریه واریز نمایید ، این شماره کارت ها در صفحه اصلی قابل روئیت است. </p>
			<p class="mt-5" style="color: #9b120b;">کد خطا : <?= $error ?></p>
		</div>
	</section>
<?php endif; ?>
