<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerRight */

$this->title = 'Update Banner Right: ' . ' ' . $model->idbaner;
$this->params['breadcrumbs'][] = ['label' => 'Banner Rights', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbaner, 'url' => ['view', 'id' => $model->idbaner]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banner-right-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
