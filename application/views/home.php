
<div class="container pb-3">
  <div class="row mt-2">
    <div class="col-md-6 text-center p-3 py-4" id="hadis">
      <h4><?= $hadis_random['gala'] ?> :</h4>
      <p><?= $hadis_random['arabi'] ?></p>
      <p><?= $hadis_random['farsi'] ?></p>
      <div class="row mt-3">
        <div class="col-lg col-10 m-auto p-2">
          <a href="<?= base_url('index.php/form_controler/pay/sadagheh') ?>" class="w-100 btn btn-outline-light" dideo-checked="true">پرداخت سریع صدقه</a>
        </div>
        <div class="col-lg col-10 m-auto p-2">
          <a href="<?= base_url('index.php/form_controler/pay/komak') ?>" class="w-100 btn btn-outline-light" dideo-checked="true">کمک کردن</a>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#Amar"><img src="<?= base_url('css/images/arrow-down.svg'); ?>" alt="scrool down" class="mt-1 d-block d-lg-none m-auto animated infinite fadeInDown" width="35px"></a>

</div>

<div id="Amar" class="container-fluid py-5">
  <div class="row mb-5 text-center align-items-center">
    <div class="col-lg-3 d-none d-lg-block ThemeStyle-90 right-elm animated fadeInRight"></div>

    <div class="col-lg-2 gy-3">
      <div class="card animated fadeInUp ThemeStyle text-center Amar-Card ThemeStyleShadow-Hover">
        <img class="m-auto" src="<?= base_url('css/images/مددجو.svg'); ?>" alt="مدد جو" width="100px">
        <h2 id="madadjoo"></h2>
        <h5>مددجو</h5>
      </div>
    </div>
    <div class="col-lg-2 gy-3">
      <div class="card animated fadeInUp ThemeStyle text-center Amar-Card ThemeStyleShadow-Hover">
        <img class="m-auto" src="<?= base_url('css/images/خانواده.svg'); ?>" alt="خانواده" width="100px">
        <h2 id="khanevar"></h2>
        <h5>خانوار</h5>
      </div>
    </div>
    <div class="col-lg-2 gy-3">
      <div class="card animated fadeInUp ThemeStyle text-center Amar-Card ThemeStyleShadow-Hover">
        <img class="m-auto" src="<?= base_url('css/images/پروژه عمرانی.svg'); ?>" alt="پروژه عمرانی" width="100px">
        <h2 id="project-omrani"></h2>
        <h5>پروژه عمرانی</h5>
      </div>
    </div>

    <div class="col-lg-3 d-none d-lg-block ThemeStyle-90 left-elm animated fadeInLeft"></div>
  </div>
</div>


<div id="about" class="container text-center text-lg-start">
  <h2 class="pb-2 border-bottom font-sans">درباره خیریه</h2>
  <div class="row mx-auto tozihat align-items-center">
    <div class="col-lg-6">
      <p>
      <h1 class="my-h1">
        خیریه امام علی ابن ابیطالب علیه السلام شهر گرگاب
      </h1>
      فعالیت خود را به صورت رسمی از تاریخ 1392/01/26 با هدف کمک به
      نیاز مندان و انجام امور خیر در حوزه های حمایتی و عمرانی و... آغاز کرده است .
      <p>
      <div class="m-auto title-color">
        <p> آدرس : <?= $setting[4]->data ?> </p>
        <p>شماره تماس : 03145753131</p>
        <p>شماره ثبت خیریه : 10260679280</p>
      </div>
    </div>
    <div class="col-lg-6 text-center text-light text-center">
      <a href="https://www.google.com/maps/place/%D8%AE%DB%8C%D8%B1%DB%8C%D9%87+%D8%A7%D9%85%D8%A7%D9%85+%D8%B9%D9%84%DB%8C+%D8%A7%D8%A8%D9%86+%D8%A7%D8%A8%DB%8C%D8%B7%D8%A7%D9%84%D8%A8+(%D8%B9)+%DA%AF%D8%B1%DA%AF%D8%A7%D8%A8%E2%80%AD/@32.8647729,51.5985803,18.62z/data=!4m5!3m4!1s0x0:0x377368e33047b8dc!8m2!3d32.8648579!4d51.5980984?hl=fa" target="_blank">
        <div class="map ThemeStyle-border"></div>
      </a>
    </div>
  </div>
</div>

<div class="container px-4 py-5" id="komak">
  <div class="row">
    <div class=" col-lg-6 text-center text-lg-start">
      <h2 class="fw-bold lh-1 mb-3 title-color">راه های کمک به خیریه</h2>
      <p class="mt-3">شما می توانید از طریق شماره کارت و شماره حساب خیریه امام علی ابن ابیطالب (ع) شهر گرگاب در امور خیر مشارکت فرمایید .
      </p>
      <p>پس از واریز مبلغ لطفا از طریق شماره تماس خیریه نیت خود را اعلام کنید. (در صورت عدم اعلام وجه به عنوان صدقه در نظر گرفته می شود .)</p>
      <p>همچنین خیرین عزیز می توانند نذورات خود را به حساب خیریه در صندوق قرض الحسنه انصار المهدی شهر گرگاب در مکان جنب مسجد صاحب الزمان شهر گرگاب واریز نمایند .</p>
      <p>جهت دسترسی راحت تر و اطلاع از اخبار و سایر خدمات خیریه می توانید از نرم افزار های اندرویدی خیریه امام علی ابن ابیطالب گرگاب استفاده نماید <a href="#download-app">دریافت نرم افزار ها</a></p>
    </div>
    <div class="col-lg-6 text-center">
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

  </div>
</div>

<?php if ($setting[7]->data == 1) : ?>
  <div id="download-app" class="ThemeStyle-gradient">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-lg-6 text-light text-center">
          <img src="<?= base_url('css/images/aplication-logo.png'); ?>" class="m-auto mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" width="100">
            <div class="d-grid gap-2 mt-3">
              <a href="<?= $setting[8]->data ?>" class="btn btn-outline-light"><img src="<?= base_url('css/images/download.svg'); ?>" alt="آیکون دانلود" width="20px"> دانلود نسخه اندروید </a>
              <a href="<?= base_url('index.php/app')?>" class="btn btn-outline-light"> نسخه تحت وب (PWA)</a>
            </div>
          <div class="row mt-2">
            <div class="col">
          <a href="https://myket.ir/app/ir.kheirieh.emamali.gorgab?utm_source=search-ads-gift&utm_medium=cpc"><img class="w-100" src="https://myket.ir/core/images/logo/get1-fa.png" /> </a>
            </div>
            <div class="col">
          <a href="https://cafebazaar.ir/app/ir.kheirieh.emamali.gorgab" dideo-checked="true"><img class="w-100" src="https://cdn.developers.cafebazaar.ir/2021/05/bazaar-badge2-300x89.png" alt="" ></a>
            </div>
            </div>
        </div>

        <div class="col-lg-6 text-center m-auto my-5">
          
          <div class="d-block mx-lg-auto img-fluid text-light" width="100%" height="50">
          <h3 style="margin-top: 20px;" class="lh-1 mb-3">دانلود نرم افزار خیریه</h3>
            <p>نرم افزار خیریه امکان کمک به نیاز مندان ، پرداخت صدقه و مشارکت در امور خیر و عام المنفعه را در هر زمان و همه جا فراهم می کند .</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php if (false) : ?>
  <div class="container px-4 py-5 " id="Omrany">
    <h2 class="pb-2 border-bottom font-sans">پویش ها</h2>

    <div class="row row-cols-1 row-cols-lg-4 align-items-center g-4 py-5 text-center text-light">

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="images/پروژه آخرت.jpg" class="card-img-top-index" alt="...">
          <div class="card-body">
            <h5 class="card-title">پویش نمونه</h5>
            <p>توضیحات این پویش</p>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <a href="#download-app" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">شرکت در پویش</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="images/پروژه آخرت.jpg" class="card-img-top-index" alt="...">
          <div class="card-body">
            <h5 class="card-title">پویش نمونه</h5>
            <p>توضیحات این پویش</p>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">30%</div>
            </div>
            <a href="#download-app" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">شرکت در پویش</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="images/پروژه آخرت.jpg" class="card-img-top-index" alt="...">
          <div class="card-body">
            <h5 class="card-title">پویش نمونه</h5>
            <p>توضیحات این پویش</p>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">60%</div>
            </div>
            <a href="#download-app" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">شرکت در پویش</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="<?= base_url('images/پروژه آخرت.jpg'); ?>" class="card-img-top-index" alt="...">
          <div class="card-body">
            <h5 class="card-title">پویش نمونه</h5>
            <p>توضیحات این پویش</p>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">30%</div>
            </div>
            <a href="#download-app" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">شرکت در پویش</a>
          </div>
        </div>
      </div>


    </div>
  </div>
<?php endif; ?>
<!-- wordpress posts  -->
<?php if ($setting[5]->data == 1) :
  // Include Wordpress 
  define('WP_USE_THEMES', false);
  require('././blog/wp-blog-header.php');
  query_posts('showposts=4');
?>
  <div class="container px-4 py-5 " id="akhbar">
    <a class="nav-link" href="<?= $menus[3]->url; ?>">
      <h2 class="pb-2 border-bottom font-sans text-dark">آخرین مطالب و اخبار</h2>
    </a>

    <div class="row row-cols-1 row-cols-lg-4 align-items-center g-4 py-5 text-center text-light">
      <?php
      while (have_posts()) : the_post();
      ?>
        <div class="col">
          <a href="<?php the_permalink(); ?>">
            <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
              <img src="<?= get_the_post_thumbnail_url(); ?>" class="card-img-top-index" alt="<?= the_post_thumbnail_caption(); ?>">

              <div class="card-body pb-5">
                <section class="content">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <p><?php the_excerpt(); ?></p>
                </section>
              </div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
<!-- end wordpress posts  -->


<?php if ($setting[11]->data == 1) : ?>
  <div id="donite" class="ThemeStyle-gradient">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-lg-6 text-light text-center">
          <img src="<?= base_url('css/images/مددجو.svg'); ?>" class="m-auto mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" width="100">
          <h3 style="margin-top: 20px;" class="  lh-1 mb-3">صدقه و کمک آنلاین</h3>
          <div class="d-grid gap-2">
            <a href="<?= base_url('index.php/form_controler/pay/sadagheh') ?>" class="btn btn-outline-light">پرداخت سریع صدقه</a>
            <a href="<?= base_url('index.php/form_controler/pay/komak') ?>" class="btn btn-outline-light">کمک کردن</a>
          </div>
        </div>

        <div class="col-10 col-sm-8 col-lg-6">
          <div class="d-block mx-lg-auto img-fluid d-none d-lg-block text-center text-light" width="7" height="50">
            <h4><?= $hadis_random_sadagheh['gala']; ?> :</h4>
            <p class="mt-3"><?= $hadis_random_sadagheh['arabi']; ?></p>
            <p><?= $hadis_random_sadagheh['farsi']; ?></p>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($setting[6]->data == 1) : ?>
  <div class="container px-4 py-4" id="Omrany">
    <h2 class="pb-2 border-bottom font-sans">پروژه های عمرانی خیریه</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-center g-4 py-5 text-center text-light">

      <?php

      foreach ($page_data as $row) :
      ?>
        <div class="col">
          <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
            <img src="<?= base_url('css/images/' . $row->page_name . '/' . $row->image_head); ?>" class="card-img-top-index" alt="<?= $row->title; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $row->title; ?></h5>

              <div class="progress">
                <div class="progress-bar bg-danger" style="width: <?= $row->pishraft . '%'; ?>;" role="progressbar" aria-valuenow="<?= $row->pishraft . '%'; ?>" aria-valuemin="0" aria-valuemax="100"><?= $row->pishraft . '%'; ?></div>
              </div>
              <a href="index.php/Project_C/index/<?= $row->page_name; ?>" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">اطلاعات بیشتر</a>
              <?php if ($row->pishraft != '100') : ?>
                <a href="<?= base_url('index.php/form_controler/pay/komak') ?>" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">مشارکت در پروژه</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="<?= base_url('css/images/پروژه آخرت.jpg'); ?>" class="card-img-top-index" alt="...">
          <div class="card-body">
            <h5 class="card-title">شما بانی پروژه های خیر شوید</h5>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <a href="#komak" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">مشارکت در پروژه</a>
          </div>
        </div>
      </div>


    </div>
  </div>
<?php endif; ?>


<!--footer-->
<?php include_once 'layout/footer.php' ?>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?= base_url('js/my-js.js'); ?>"></script>

<?php

$madadjoo = (int) $setting[0]->data;
$khanevar = (int) $setting[1]->data;
$project_omrani = (int) $setting[2]->data;

?>
<script type="text/javascript">
  var madadjoo = "<?= "$madadjoo" ?>";
  var khanevar = "<?= "$khanevar" ?>";
  var project_omrani = "<?= "$project_omrani" ?>";

  window.onload = vmsNumber(madadjoo, "madadjoo");
  window.onload = vmsNumber(khanevar, "khanevar");
  window.onload = vmsNumber(project_omrani, "project-omrani");
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</main>
</body>

</html>
