<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
    <div class="page-error-box">
        <div class="error-code">404</div>
        <div class="error-title">Page not found</div>
        <a href="<?= Yii::$app->homeUrl; ?>" class="btn btn-rounded">Main page</a>
    </div>   