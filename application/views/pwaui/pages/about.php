<img class="img-fluid ThemeStyle-border my-4" src="<?= base_url('css\images\2خیریه.jpg') ?>" alt="">
<div class="card p-3 text-center ThemeStyle-border" style="border-radius: 40px !important;">
	<p>
	</p>
	<h1 class="my-h1">
		خیریه امام علی ابن ابیطالب علیه السلام شهر گرگاب
	</h1>
	فعالیت خود را به صورت رسمی از تاریخ 1392/01/26 با هدف کمک به
	نیاز مندان و انجام امور خیر در حوزه های حمایتی و عمرانی و... آغاز کرده است .
	<p></p>
	<h1 class="my-h1">
		شماره کارت خیریه :
	</h1>
	<div class="col-lg-6 m-auto text-center">
		<div title="کپی کردن" id="numcardkesavarzi-card" class=" ThemeStyle text-light text-center p-5">
			<img src="<?= base_url('css/images/Bank.svg'); ?>" class="d-block mx-lg-auto img-fluid float-lg-end m-auto" alt="بانک کشاورزی" loading="lazy" width="70px">
			<p class="m-auto fs-2" style=" margin-top: 100px;" id="numcardkesavarzi">6037707000032791</p>
			<p class="m-auto" style=" margin-top: 100px;">شماره حساب : 659771973</p>
			<p class="m-auto" style="font-size: 15px;">خیریه امام علی ابن ابیطالب (ع) گرگاب</p>
		</div>

		<div class="ThemeStyle text-light text-center p-5 mt-3">
			<img src="<?= base_url('css/images/1لوگوی صندوق انصار.svg'); ?>" class="d-block mx-lg-auto img-fluid float-lg-end m-auto" alt="صندوق انصار المهدی شهر گرگاب" loading="lazy" width="70px">
			<p class="m-auto fs-2" style=" margin-top: 100px;">شماره حساب : 11879431
			</p>
			<p class="m-auto" style=" margin-top: 100px;">صندوق قرض الحسنه انصار المهدی گرگاب</p>
			<p class="m-auto" style="font-size: 15px;">خیریه امام علی ابن ابیطالب (ع) گرگاب</p>
		</div>
	</div>
	<p></p>
	<div class="title-color">
		<p> آدرس : <?= $setting[4]->data ?> </p>
		<div class="col-lg-6 m-auto my-3 text-center text-light text-center">
			<a href="https://www.google.com/maps/place/%D8%AE%DB%8C%D8%B1%DB%8C%D9%87+%D8%A7%D9%85%D8%A7%D9%85+%D8%B9%D9%84%DB%8C+%D8%A7%D8%A8%D9%86+%D8%A7%D8%A8%DB%8C%D8%B7%D8%A7%D9%84%D8%A8+(%D8%B9)+%DA%AF%D8%B1%DA%AF%D8%A7%D8%A8%E2%80%AD/@32.8647729,51.5985803,18.62z/data=!4m5!3m4!1s0x0:0x377368e33047b8dc!8m2!3d32.8648579!4d51.5980984?hl=fa" target="_blank">
				<div class="map ThemeStyle-border"></div>
			</a>
		</div>
		<p>شماره تماس : 03145753131</p>
		<p>شماره ثبت خیریه : 10260679280</p>
	</div>

	<h1 class="my-h1">
		مجوز های آنلاین:
	</h1>

	<ul class="nav col-md-4 justify-content-center list-unstyled d-flex">

		<li class="ms-3 mt-4">
			<a class="text-muted" href="#">
				<!-- <img class="bi" src="<?php //echo base_url('css/images/اینماد.png'); 
											?>" alt="لوگوی اینماد" width="90"> -->
				<script src="https://www.zarinpal.com/webservice/TrustCode" type="text/javascript"></script>
			</a>
		</li>
		<li class="ms-3">
			<!-- <a class="text-muted" href="#"> -->
			<!-- <img class="bi" src="images/ساماندهی.png" alt="لوگوی ساماندهی" width="100"> -->
			<!-- </a> -->
			<img referrerpolicy='origin' id='rgvjjxlznbqenbqewlaorgvj' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=312243&p=xlaorfthuiwkuiwkaodsxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=312243&p=qftinbpdodrfodrfshwlqfti' />

		</li>
		<li class="ms-3 mt-2">
			<!-- <a class="text-muted" href="#"> -->
			<!-- <img class="bi" src="images/ساماندهی.png" alt="لوگوی ساماندهی" width="100"> -->
			<!-- </a> -->


			<a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=285400&amp;Code=u3UxWQEiwx7DeoBs71ep"><img referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=285400&amp;Code=u3UxWQEiwx7DeoBs71ep" alt="" style="cursor:pointer" id="u3UxWQEiwx7DeoBs71ep"></a>



		</li>
	</ul>
</div>
<script>
	document.getElementById('application_title').innerHTML = "درباره خیریه";
</script>
<script>
	const txt = document.getElementById("numcardkesavarzi");
	const elm = document.getElementById("numcardkesavarzi-card");
	elm.addEventListener("click", function() {
		navigator.clipboard.writeText(txt.innerText).then(function() {
			alert("شماره کارت کپی شد");
		});
	});
</script>
