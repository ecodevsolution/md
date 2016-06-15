<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainCategory */

$this->title = 'Update Main Category: ' . ' ' . $model->idmain;
$this->params['breadcrumbs'][] = ['label' => 'Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmain, 'url' => ['view', 'id' => $model->idmain]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
