<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BannerAds */

$this->title = 'Create Banner Ads';
$this->params['breadcrumbs'][] = ['label' => 'Banner Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-ads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
