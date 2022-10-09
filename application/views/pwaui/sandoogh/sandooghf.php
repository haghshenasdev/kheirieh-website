<section class="py-2 container">
            <div class="row align-items-center">
<script>
    document.getElementById('application_title').innerHTML = "درخواست صندوق صدقات";
</script>
                <div class="col-lg-6 col-md-8 mx-auto ThemeStyle p-4 py-5 text-light animated bounceInUp">
                    <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    echo form_open("App/sandoogh", array('id' => 'my-form'));
                    ?>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= (set_value('name') == '') ? get_cookie('name') : set_value('name') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="adres" class="col-form-label">آدرس کامل:</label>
                        <textarea name="adres" id="adres" class="form-control" cols="30" rows="3"><?= (set_value('adres') == '') ? get_cookie('adres') : set_value('adres') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">شماره تماس :</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="<?= (set_value('phone') == '') ? get_cookie('phone') : set_value('phone') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">ایمیل (اختیاری):</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= (set_value('email') == '') ? get_cookie('email') : set_value('email') ?>">
                    </div>
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