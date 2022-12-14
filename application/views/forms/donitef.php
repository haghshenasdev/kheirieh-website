<section class="py-2 container">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-8 lg-start d-block d-lg-none mx-auto text-center p-4 animated zoomIn">
			<h4 class="title-color"><?php echo $hadis_random_sadagheh['gala'] ?> :</h4>
			<p><?php echo $hadis_random_sadagheh['arabi'] ?></p>
			<p><?php echo $hadis_random_sadagheh['farsi'] ?></p>
		</div>

		<div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-4 text-light animated bounceInUp">
			<?php
			echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			if (!empty($error_msg)) {
				echo '<div class="alert alert-danger alert-dismissible" role="alert">' . $error_msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
			echo form_open($this->donatepay->MainRoute . "/pay/" . $type_data->type_name, array('id' => 'my-form'));
			if (is_array($all_type) || $type_data->type_name == 'komak') :
			?>
				<div class="mb-3">
					<label for="type" class="col-form-label">نوع و مواد مصرف :</label>
					<select onchange="ShowInfos()" class="form-select" id="type" name="type" aria-label="Default select example">
						<?php foreach ($all_type as $row) : ?>

							<?php if ($row->is_active == 1 && is_null($row->sub)) : ?>
								<option <?php if($row->defult == 1) echo 'selected' ?> value="<?php echo $row->id ?>">
									<?php echo $row->title ?>
								</option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="px-2 mb-3" id="tozih"></div>
				<script>
					function ShowInfos() {
						const el = document.getElementById("type");
						var i = el.selectedIndex;
						var op = el.options;
						const http = new XMLHttpRequest();
						http.onload = function() {
							document.getElementById("tozih").innerHTML = this.responseText;
						}
						http.open("GET", "<?= base_url('index.php/TypeDescription/getdescriptionty/') ?>" + op[i].value, true);
						http.send();
					}
					ShowInfos();

					function Showtow() {
						const el = document.getElementById("type_sub");
						var i = el.selectedIndex;
						var op = el.options;
						const http = new XMLHttpRequest();
						http.onload = function() {
							document.getElementById("tozih2").innerHTML = this.responseText;
						}
						http.open("GET", "<?= base_url('index.php/TypeDescription/getdescriptionty/') ?>" + op[i].value, true);
						http.send();
					}
				</script>
			<?php else : ?>
				<h4 class="text-center">پرداخت جهت <?= $title ?></h4>
			<?php endif; ?>


			<label for="message-text" class="col-form-label px-3"> مبلغ: </label>
			<div class="input-group mb-3">

				<input id="amount" name="amount" class="form-control" type="number" value="<?= set_value('amount') ?>" aria-label="Amount (to the nearest dollar)">
				<span class="input-group-text">تومان</span>
			</div>

			<?php if ($isUserLoggedIn) : ?>
				<!-- is logined -->
			<?php else : ?>
				<div class="">
					<label class="col-form-label">
						<p>
							توجه : 
							ترجیحا وارد حساب کاربری خود شوید یا حساب کاربری ایجاد کنید (بدون ثبت نام هم امکان پرداخت وجود دارد)
							<a class="btn btn-outline-light ThemeStyle-border" href="<?= $this->userssystem->route_registration ?>">ثبت نام </a>
							<a class="btn btn-outline-light ThemeStyle-border" href="<?= $this->userssystem->route_login ?>">ورود</a>
						</p>
					</label>
				</div>

				<div>
					<label for="phone" class="col-form-label">شماره تماس :</label>
					<input type="number" class="form-control" id="phone" name="phone" value="<?= (set_value('phone') == '') ? get_cookie('phone') : set_value('phone') ?>">
				</div>

				<div class="mb-3">
					<label for="name" class="col-form-label">نام :</label>
					<input type="name" class="form-control" id="name" name="name">
				</div>
			<?php endif; ?>

			<script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
				function onSubmit(token) {
					document.getElementById("my-form").submit();
				}
			</script>

			<div class="d-grid gap-2 mt-3">
				<button class="btn btn-light mt-3 ThemeStyle-border px-5 g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" onclick="this.innerHTML = '<span class=\'spinner-border spinner-border-sm text-dark\' role=\'status\'></span> درحال انتقال به درگاه پرداخت...'" data-callback='onSubmit' data-action='submit' type="submit"> پرداخت</button>
				<button class="btn btn-outline-light ThemeStyle-border" type="button" onclick="history.back()">بازگشت به صفحه اصلی</button>
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
