<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerAds */

$this->title = 'Create Banner Ads';
$this->params['breadcrumbs'][] = ['label' => 'Banner Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

