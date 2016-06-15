<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailCategory */

$this->title = 'Update Detail Category: ' . ' ' . $model->iddetail;
$this->params['breadcrumbs'][] = ['label' => 'Detail Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetail, 'url' => ['view', 'id' => $model->iddetail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
