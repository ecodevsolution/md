<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBank */

$this->title = 'Update User Bank: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->iduserbank]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-bank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
