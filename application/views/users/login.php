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
				<label for="phone" class="col-form-label">شماره تماس :</label>
				<input type="number" class="form-control" id="phone" name="phone" value="<?= (set_value('phone') == '') ? get_cookie('phone') : set_value('phone') ?>">
			</div>
			<?php echo form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="password" class="col-form-label">رمز عبور :</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="password" class="col-form-label">
					حساب کاربری ندارید ؟ <a href="<?= $this->userssystem->route_registration ?>">ثبت نام</a>
				</label>
			</div>

			<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
				function onSubmit(token) {
					document.getElementById("my-form").submit();
				}
			</script> -->


			<div class="d-grid gap-2 mt-3">
				<input type="submit" name="loginSubmit" value="ورود" class="btn btn-light ThemeStyle-border px-5 g-recaptcha">
				<button class="btn btn-outline-light ThemeStyle-border" type="button" onclick="history.back()">بازگشت</button>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</section>
