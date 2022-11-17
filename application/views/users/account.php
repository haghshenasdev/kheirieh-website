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
				<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
			</div>
			<?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="phone" class="col-form-label">شماره تماس :</label>
				<input type="phone" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>">
			</div>
			<?php echo form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="adres" class="col-form-label">آدرس کامل:</label>
				<textarea name="adres" id="adres" class="form-control" cols="30" rows="3"><?= $user['adres'] ?></textarea>
			</div>
			<?php echo form_error('adres', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="email" class="col-form-label">ایمیل (اختیاری):</label>
				<input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
			</div>
			<?php echo form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mt-3">
				<label class="col-form-label">فقط در صورت نیاز به تغییر رمز عبور قسمت های زیر را پر کنید:</label>
			</div>

			<div class="mb-3">
				<label for="old_password" class="col-form-label">رمز عبور قدیمی:</label>
				<input type="password" class="form-control" id="old_password" name="old_password">
			</div>
			<?php echo form_error('old_password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="password" class="col-form-label">رمز عبور :</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="mb-3">
				<label for="conf_password" class="col-form-label">تکرار رمز عبور :</label>
				<input type="password" class="form-control" id="conf_password" name="conf_password">
			</div>
			<?php echo form_error('conf_password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
				function onSubmit(token) {
					document.getElementById("my-form").submit();
				}
			</script> -->

			<div class="d-grid gap-2 mt-5">
				<input type="submit" name="updateSubmit" value="ذخیره تغییرات" class="btn btn-light ThemeStyle-border px-5 g-recaptcha">
				<a class="btn btn-danger ThemeStyle-border" href="<?= $this->userssystem->route_logout ?>">خروج از حساب کاربری</a>
				<button class="btn btn-outline-light ThemeStyle-border" type="button" onclick="history.back()">بازگشت</button>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</section>
