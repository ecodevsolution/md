<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/bootstrap.min.css',
		'fonts/css/font-awesome.min.css',
		'css/animate.min.css',
		'css/custom.css',
		'css/maps/jquery-jvectormap-2.0.1.css',
		'js/step-form-wizard/css/step-form-wizard.min.css',
		'css/icheck/flat/green.css',
		'css/floatexamples.css',
		
    ];
    public $js = [
		'js/bootstrap.min.js',
		'js/gauge/gauge.min.js',
		'js/gauge/gauge_demo.js',
		'js/chartjs/chart.min.js',
		'js/custom.js',
		'js/progressbar/bootstrap-progressbar.min.js',
		'js/nicescroll/jquery.nicescroll.min.js',
		'js/icheck/icheck.min.js',
		'js/moment.min.js',
		'js/datepicker/daterangepicker.js',
		'js/flot/jquery.flot.js',
		'js/flot/jquery.flot.pie.js',
		'js/flot/jquery.flot.orderBars.js',
		'js/flot/jquery.flot.time.min.js',
		'js/flot/date.js',
		'js/flot/jquery.flot.spline.js',
		'js/flot/jquery.flot.stack.js',
		'js/flot/curvedLines.js',
		'js/flot/jquery.flot.resize.js',
		'js/maps/jquery-jvectormap-2.0.1.min.js',
		'js/maps/gdp-data.js',
		'js/maps/jquery-jvectormap-world-mill-en.js',
		'js/maps/jquery-jvectormap-us-aea-en.js',
		
    ];   
    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
