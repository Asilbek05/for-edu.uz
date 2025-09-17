<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css',
        'https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css',
        'css/nucleo-icons.css',
        'css/nucleo-svg.css',
        'css/argon-dashboard.css?v=2.1.0',
    ];
    public $js = [
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',
        'js/plugins/perfect-scrollbar.min.js',
        'js/plugins/smooth-scrollbar.min.js',
        'js/plugins/chartjs.min.js',
        'https://kit.fontawesome.com/42d5adcbca.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];

}
