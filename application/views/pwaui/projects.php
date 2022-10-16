<div class="container px-4" id="Omrany">
<script>document.getElementById('application_title').innerHTML = "پروژه های عمرانی خیریه";</script>

    <div class="row row-cols-1 row-cols-lg-3 align-items-center g-4 py-2 text-center text-light">

      <?php

      foreach ($page_data as $row) :
      ?>
        <div class="col">
          <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
            <img src="<?= base_url('css/images/' . $row->page_name . '/' . $row->image_head); ?>" class="card-img-top" alt="<?= $row->title; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $row->title; ?></h5>

              <div class="progress">
                <div class="progress-bar bg-danger" style="width: <?= $row->pishraft . '%'; ?>;" role="progressbar" aria-valuenow="<?= $row->pishraft . '%'; ?>" aria-valuemin="0" aria-valuemax="100"><?= $row->pishraft . '%'; ?></div>
              </div>
              <a href="<?= base_url("index.php/App/projectshow/$row->page_name") ?>" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">اطلاعات بیشتر</a>
              <?php if($row->pishraft != '100'): ?>
              <a href="<?= base_url('index.php/App/openDonatePage') ?>" style="margin-top: 20px;" class="btn btn-outline-light ThemeStyle-border">مشارکت در پروژه</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="col">
        <div class="card ThemeStyle h-100 ThemeStyleShadow-Hover">
          <img src="<?= base_url('css/images/پروژه آخرت.jpg'); ?>" class="card-img-top" alt="...">
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
