<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainCategory */

$this->title = 'Update Main Category: ' . ' ' . $model->idmain;
$this->params['breadcrumbs'][] = ['label' => 'Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmain, 'url' => ['view', 'id' => $model->idmain]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

