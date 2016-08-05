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
        'css/lib/lobipanel/lobipanel.min.css',
		'css/lib/jqueryui/jquery-ui.min.css',
		'css/lib/bootstrap-sweetalert/sweetalert.css',
		'css/lib/font-awesome/font-awesome.min.css',		
		'css/main.css',
    ];
    public $js = [
		//'js/lib/jquery/jquery.min.js',
		//'js/lib/tether/tether.min.js',
		'js/lib/bootstrap/bootstrap.min.js',
		'js/plugins.js',
		'js/lib/jqueryui/jquery-ui.min.js',
		'js/lib/lobipanel/lobipanel.min.js',
		'js/loader.js',
		'js/lib/bootstrap-sweetalert/sweetalert.min.js',
		'js/app.js',
		'js/lib/jquery-tag-editor/jquery.tag-editor.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
