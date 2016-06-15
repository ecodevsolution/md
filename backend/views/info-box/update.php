<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\InfoBox */

$this->title = 'Update Info Box: ' . ' ' . $model->idbox;
$this->params['breadcrumbs'][] = ['label' => 'Info Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbox, 'url' => ['view', 'id' => $model->idbox]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="info-box-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
