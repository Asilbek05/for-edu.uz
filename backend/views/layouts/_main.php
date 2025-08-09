<?php

/** @var yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="g-sidenav-show   bg-gray-100">
    <?php $this->beginBody() ?>

    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <?= Html::a(
                Html::img('@web/img/logo-ct-dark.png', [
                    'width' => '26px',
                    'height' => '26px',
                    'class' => 'navbar-brand-img h-100',
                    'alt' => 'main_logo'
                ]) .
                Html::tag('span', 'Creative Tim', ['class' => 'ms-1 font-weight-bold']),
                'https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html',
                [
                    'class' => 'navbar-brand m-0',
                    'target' => '_blank'
                ]
            ) ?>
        </div>

        <hr class="horizontal dark mt-0">

        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-tv-2 text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Dashboard', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/dashboard']),
                        ['class' => 'nav-link active']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-calendar-grid-58 text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Tables', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/tables']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-credit-card text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Billing', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/billing']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-app text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Virtual Reality', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/virtual-reality']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-world-2 text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'RTL', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/rtl']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-single-02 text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Profile', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/profile']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-single-copy-04 text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Sign In', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/login']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a(
                        Html::tag('div',
                            Html::tag('i', '', ['class' => 'ni ni-collection text-dark text-sm opacity-10']),
                            ['class' => 'icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center']
                        ) .
                        Html::tag('span', 'Sign Up', ['class' => 'nav-link-text ms-1']),
                        Url::to(['/site/signup']),
                        ['class' => 'nav-link']
                    ) ?>
                </li>
            </ul>
        </div>

        <div class="sidenav-footer mx-3">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <?= Html::img('@web/img/illustrations/icon-documentation.svg', [
                    'class' => 'w-50 mx-auto',
                    'alt' => 'sidebar_illustration'
                ]) ?>
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                    </div>
                </div>
            </div>

            <?= Html::a(
                'Documentation',
                'https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard',
                [
                    'class' => 'btn btn-dark btn-sm w-100 mb-3',
                    'target' => '_blank'
                ]
            ) ?>

            <?= Html::a(
                'Upgrade to pro',
                'https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree',
                [
                    'class' => 'btn btn-primary btn-sm mb-0 w-100',
                    'type' => 'button'
                ]
            ) ?>
        </div>
    </aside>


    <main class="main-content position-relative border-radius-lg ">

        <?= $this->render('_navbar') ?>

        <div class="container-fluid py-4">
            <?= $content ?>


        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <?= date('Y') ?>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        </div>
    </main>

    <?= $this->render('_fixed_plugin') ?>

    <?php
    $this->registerJs(<<<JS
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
JS
        , \yii\web\View::POS_END);

    // Tashqi JS fayllarni ro'yxatga olish
    $this->registerJsFile(
        'https://buttons.github.io/buttons.js',
        ['async' => true, 'defer' => true, 'position' => \yii\web\View::POS_END]
    );

    $this->registerJsFile(
        '@web/js/argon-dashboard.min.js?v=2.1.0',
        ['position' => \yii\web\View::POS_END]
    );
    ?>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>