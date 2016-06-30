<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerAds */

$this->title = 'Update Banner Ads: ' . ' ' . $model->idbannerads;
$this->params['breadcrumbs'][] = ['label' => 'Banner Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbannerads, 'url' => ['view', 'id' => $model->idbannerads]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

