<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Logo */

$this->title = 'Update Logo: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Logos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->idlogo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
