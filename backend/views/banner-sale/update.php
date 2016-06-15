<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerSale */

$this->title = 'Update Banner Sale: ' . ' ' . $model->idbanner;
$this->params['breadcrumbs'][] = ['label' => 'Banner Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbanner, 'url' => ['view', 'id' => $model->idbanner]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banner-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
