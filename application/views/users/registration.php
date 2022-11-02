<section class="py-2 container">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-4 py-5 text-light animated bounceInUp">
			<?php
			//echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			echo form_open("", array('id' => 'my-form'));
			?>

			<?php
			if (!empty($success_msg)) {
				echo '<div class="alert alert-success alert-dismissible" role="alert">' . $success_msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			} elseif (!empty($error_msg)) {
				echo '<div class="alert alert-danger alert-dismissible" role="alert">' . $error_msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			}
			?>

			<div class="mb-3">
				<label for="name" class="col-form-label">نام و نام خانوادگی :</label>
				<input type="text" class="form-control" id="name" name="name" value="<?= (set_value('name') == '') ? get_cookie('name') : set_value('name') ?>">
			</div>
			<?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="phone" class="col-form-label">شماره تماس :</label>
				<input type="number" class="form-control" id="phone" name="phone" value="<?= (set_value('phone') == '') ? get_cookie('phone') : set_value('phone') ?>">
			</div>
			<?php echo form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="adres" class="col-form-label">آدرس کامل:</label>
				<textarea name="adres" id="adres" class="form-control" cols="30" rows="3"><?= (set_value('adres') == '') ? get_cookie('adres') : set_value('adres') ?></textarea>
			</div>
			<?php echo form_error('adres', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="email" class="col-form-label">ایمیل (اختیاری):</label>
				<input type="text" class="form-control" id="email" name="email" value="<?= (set_value('email') == '') ? get_cookie('email') : set_value('email') ?>">
			</div>
			<?php echo form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="password" class="col-form-label">رمز عبور :</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="conf_password" class="col-form-label">تکرار رمز عبور :</label>
				<input type="password" class="form-control" id="conf_password" name="conf_password">
			</div>
			<?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="password" class="col-form-label">
					حساب کاربری دارید ؟ <a href="<?= base_url('index.php/users/registration') ?>">وارد شوید</a>
				</label>
			</div>

			<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
				function onSubmit(token) {
					document.getElementById("my-form").submit();
				}
			</script> -->


			<div class="text-center">
				<!-- <input name="loginSubmit" class="btn btn-light mt-4 ThemeStyle-border px-5 g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" onclick="this.innerHTML = '<span class=\'spinner-border spinner-border-sm text-dark\' role=\'status\'></span> درحال ارسال...'" data-callback='onSubmit' data-action='submit' type="submit" value="ورود"> -->
				<input type="submit" name="signupSubmit" value="ثبت نام" class="btn btn-light mt-4 ThemeStyle-border px-5 g-recaptcha">
				<button class="btn btn-outline-light mt-4 ThemeStyle-border" type="button" onclick="history.back()">بازگشت</button>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</section>
