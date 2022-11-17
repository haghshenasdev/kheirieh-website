<section class="py-2 container">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-4 py-5 text-light animated bounceInUp">
			<?php
			echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			echo form_open("App/sandoogh", array('id' => 'my-form'));
			?>

			<div class="mb-3">
				<label for="type" class="col-form-label">نوع درخواست صندوق صدقات :</label>
				<select class="form-select" id="type" name="type" aria-label="Default select example">
					<?php foreach ($all_type as $row) : ?>
						<?php if ($row->is_active == 1) : ?>
							<option <?php if ($row->defult == 1) echo 'selected' ?> value="<?php echo $row->id ?>">
								<?php echo $row->title ?>
							</option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
				<!-- end -->

			<?php if ($adresNull) : ?>
				<div class="mb-3">
					<label for="adres" class="col-form-label">آدرس کامل:</label>
					<textarea name="adres" id="adres" class="form-control" cols="30" rows="3"><?= (set_value('adres') == '') ? get_cookie('adres') : set_value('adres') ?></textarea>
				</div>
			<?php endif; ?>

			<div class="mb-3">
				<label for="description" class="col-form-label">توضیح (اختیاری):</label>
				<textarea name="description" id="description" class="form-control" cols="30" rows="3"><?= (set_value('description') == '') ? get_cookie('description') : set_value('description') ?></textarea>
			</div>
			<script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
				function onSubmit(token) {
					document.getElementById("my-form").submit();
				}
			</script>


			<div class="text-center">
				<button class="btn btn-light mt-4 ThemeStyle-border px-5 g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" onclick="this.innerHTML = '<span class=\'spinner-border spinner-border-sm text-dark\' role=\'status\'></span> درحال ارسال...'" data-callback='onSubmit' data-action='submit' type="submit">ثبت درخواست</button>
				<button class="btn btn-outline-light mt-4 ThemeStyle-border" type="button" onclick="history.back()">بازگشت به صفحه اصلی</button>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</section>
